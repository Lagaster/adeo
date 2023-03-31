<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program>
 */
class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->realText(20);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'image'=> $this->faker->imageUrl(640, 480, 'cats', true),
            'description' => $this->faker->realText(100),
            'created_by' => 1,

        ];
    }
}
