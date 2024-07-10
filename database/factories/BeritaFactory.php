<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();
        return [
            'user_id' => 1,
            'title' => $this->faker->sentence(),
            'description' => $this->faker->words(10, true),
            'slug' => Str::slug($title),
            'content' => $this->faker->sentence($nbWords = 50, $variableNbWords = true),
            'image_featured' => "no_image.jpg",
        ];
    }
}
