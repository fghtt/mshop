<?php

namespace App\Service;

use App\Models\Order;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class OrderService
{
    /**
     * @param array $data
     * @return void
     */
    public function store(array $data)
    {
        $products = $data['products'];
        $data['sum'] = 0;
        unset($data['products']);
        $order = Order::create($data);
        $order->products()->attach($order->getProducts($products));
        $order->setSum($products);
        $order->update();
    }

    /**
     * @param int $id
     * @param array $data
     * @return void
     */
    public function update(int $id, array $data)
    {
        $order = Order::find($id);
        $order->update($data);
    }
}
