<?php

namespace Database\Factories;

use App\Models\ProductsCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductsCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = ProductsCategory::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5),
            'alias' => $this->faker->unique()->word(),
            'discount' => random_int(1, 99),
        ];
    }
}
