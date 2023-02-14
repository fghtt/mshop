<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\StoreRequest;
use App\Models\Product;

class StoreController extends BaseController
{
    /**
     * @param UpdateRequest $request
     * @param $id
     */
    public function __invoke(StoreRequest $request, $id)
    {
        $data = $request->validated();
        $this->service->store($data);
        return response()
            ->json(['message' => 'Accepted',])
            ->setStatusCode(202);
    }
}
