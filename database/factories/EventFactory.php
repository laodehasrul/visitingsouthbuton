<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
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
            'title' => $title,
            'description' => $this->faker->words(10, true),
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraph(),
            'image_featured' => "no_image.jpg",
            'date_time' => null
        ];
    }
}
