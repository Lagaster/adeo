<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->realText(50);
        $slug = str_replace(' ', '-', strtolower($title));
        return [
            'title' => $title,
            'slug' => $slug,
            'subtitle' => $this->faker->realText(100),
            'body' => $this->faker->realText(1000),
            'image' => 'default_blog.png',
            'user_id' => 1
            
        ];
    }
}
