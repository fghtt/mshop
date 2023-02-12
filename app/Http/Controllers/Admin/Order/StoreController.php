<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Requests\Admin\Order\StoreRequest;

class StoreController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('admin.order.index');
    }
}
