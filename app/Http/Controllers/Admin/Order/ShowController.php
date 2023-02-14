<?php

namespace App\Http\Controllers\Admin\Order;

use App\Models\Order;

class ShowController extends BaseController
{
    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke(int $id)
    {
       $order = Order::find($id);
       return view('admin.order.show', compact('order'));
    }
}
