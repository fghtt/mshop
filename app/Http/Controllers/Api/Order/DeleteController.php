<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;

class DeleteController extends BaseController
{
    /**
     * @param $id
     */
    public function __invoke($id)
    {
        Order::findOrFail($id)->products()->detach();
        Order::findOrFail($id)->delete();

        return response()
            ->json(['message' => trans('notifications.destroy.success'),])
            ->setStatusCode(\Illuminate\Http\Response::HTTP_OK);
    }
}
