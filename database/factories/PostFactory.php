<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title"=>fake()->word(),
            "slug"=>fake()->word(),
            "keywords"=>fake()->realText(30),
            "description"=>fake()->realText(100),
            "content"=>fake()->realText(100),
            "category_id"=>Category::factory(),
            "published"=>fake()->boolean(50),
        ];
    }
}
