<?php

namespace App\Http\Controllers\Admin\Order;

use App\Models\Order;

class CreateController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        $orders = Order::all();
        return view('admin.order.create', compact('orders'));
    }
}
