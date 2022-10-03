<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'body' => fake()->paragraph(),
            'published' => true,
        ];
    }

    public function unpublished() {
        return $this->state(function () {
            return [
                'published' => false,
            ];
        });
    }

    public function randomPublished()
    {
        return $this->state(function () {
            return [
                'published' => (bool)random_int(0, 1),
            ];
        });
    }
}
