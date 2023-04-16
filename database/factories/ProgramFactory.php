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
            'description' => $this->faker->realText(rand(100, 200)),
            'created_by' => 1,
            'image' => 'default_program.png',

        ];
    }
}
