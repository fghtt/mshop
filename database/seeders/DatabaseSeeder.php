<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductsCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        ProductsCategory::factory(20)->create();
        $products = Product::factory(1000)->create();
        $orders = Order::factory(1000)->create();

        foreach($orders as $order) {
            $productsId = $products->random()->pluck('id');
            $order->products()->attach($products);
        }
    }
}
