<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category',
        'slug',
        'content',
        'excerpt',
        'published_at',
        'date',
        'image',
        'youtube_id',
        'is_active',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'date' => 'date',
        'is_active' => 'boolean',
    ];

    /**
     * Mutator to automatically extract YouTube ID from URL.
     */
    public function setYoutubeIdAttribute($value)
    {
        $this->attributes['youtube_id'] = $this->extractYoutubeId($value);
    }

    /**
     * Accessor to ensure we get the ID even if raw URL is stored.
     */
    public function getVideoIdAttribute()
    {
        return $this->extractYoutubeId($this->attributes['youtube_id'] ?? '');
    }

    /**
     * Helper to extract YouTube ID.
     */
    protected function extractYoutubeId($value)
    {
        if (empty($value)) return null;

        // If it's already an ID (11 chars, alphanumeric/dash/underscore), return it
        if (preg_match('/^[a-zA-Z0-9_-]{11}$/', $value)) {
            return $value;
        }

        // Parse from URL
        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i';
        if (preg_match($pattern, $value, $matches)) {
            return $matches[1];
        }

        return $value; // Return original if parsing fails (fallback)
    }

    protected static function booted()
    {
        // Logic pembersihan dipindahkan ke Mutator setYoutubeIdAttribute
    }

    /**
     * Accessor untuk memastikan kita selalu mendapat ID yang bersih,
     * bahkan jika di database tersimpan URL lengkap (fallback proteksi).
     */
    public function getYoutubeIdAttribute($value)
    {
        if (empty($value)) return null;

        // Cek apakah value terlihat seperti URL
        if (Str::contains($value, ['youtube.com', 'youtu.be'])) {
            preg_match("/(?:(?:www\.|m\.)?youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^\"&?\/\s]{11})/", $value, $matches);
            return $matches[1] ?? $value;
        }

        return $value;
    }

    /**
     * Scope for published news
     */
    public function scopePublished($query)
    {
        return $query->where('is_active', true)
                    ->whereNotNull('published_at')
                    ->where('published_at', '<=', now());
    }

    /**
     * Scope for latest published news
     */
    public function scopeLatestPublished($query)
    {
        return $query->published()->latest('published_at');
    }
}
