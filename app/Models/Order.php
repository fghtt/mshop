<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class,
            'order_product',
            'order_id',
            'product_id');
    }

    /**
     * @param string $products
     * @return array
     */
    public function getProducts(string $products): array
    {
        $products = json_decode($products);
        $productsList = [];

        foreach ($products as $product) {
            for ($i = 0; $i < $product->count; $i++) {
                $productsList[] = $product->product_id;
            }
        }

        return $productsList;
    }

    /**
     * @return void
     */
    public function setSum()
    {
        $this->sum = 0;

        foreach ($this->products as $product) {
            $this->sum += $product->price;
        }
    }
}
