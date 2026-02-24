<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        return [
            'title' => $title,
            'category' => fake()->randomElement(['Company News', 'Industry Updates', 'Technology', 'Events']),
            'slug' => Str::slug($title),
            'content' => fake()->paragraphs(5, true),
            'excerpt' => fake()->sentence(20),
            'published_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'image' => 'news/01KH34NCBF6A88EM301ZAPD2HX.jpeg', // Menggunakan file yang sudah ada agar tidak broken
            'youtube_id' => 'dQw4w9WgXcQ',
        ];
    }
}
