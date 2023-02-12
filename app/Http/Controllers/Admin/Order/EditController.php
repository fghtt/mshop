<?php

namespace App\Http\Controllers\Admin\Order;

use App\Models\Order;

class EditController extends BaseController
{
    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke(int $id)
    {
       $orders = Order::find($id);
       return view('admin.order.edit', compact('orders'));
    }
}
