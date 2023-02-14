<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Order::class;

    public function definition()
    {
       /* $latitude = ;
        $longitude = ;*/

        return [
            'date' => $this->faker->date('Y_m_d'),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'sum' => random_int(200, 15000),
            'point' => random_int(-90, 90) . ',' . random_int(-180, 180) ,
        ];
    }
}
