<?php

namespace App\Http\Controllers\Admin\Order;

class IndexController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        return view('admin.order.index');
    }
}
