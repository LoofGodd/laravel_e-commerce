<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['new', 'trending', 'suit-price', 'quality', 'promotion'];
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'description' => $this->faker->text,
            'short_description' => $this->faker->text,
            'categories' => $categories[$this->faker->numberBetween(0, count($categories) -1)] .', other',
            'feature' => $this->faker->numberBetween(0,1),
            'price' => $this->faker->randomFloat(2,10,100),
        ];
    }
}
