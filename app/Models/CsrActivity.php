<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CsrActivity extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'date',
        'is_active',
    ];

    protected $casts = [
        'date' => 'date',
        'is_active' => 'boolean',
    ];
}
