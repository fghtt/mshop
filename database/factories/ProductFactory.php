<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductsCategory;
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

    protected $model = Product::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5),
            'preview' => $this->faker->url(),
            'discount' => random_int(1, 99),
            'description' => $this->faker->text(),
            'price' => random_int(200, 15000),
            'category_id' => ProductsCategory::get()->random()->id
        ];
    }
}
