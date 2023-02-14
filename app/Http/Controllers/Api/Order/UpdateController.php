<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\UpdateRequest;
use App\Models\Product;

class UpdateController extends BaseController
{
    /**
     * @param UpdateRequest $request
     * @param $id
     */
    public function __invoke(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        $this->service->update($id, $data);
        return response()
            ->json(['message' => 'Accepted',])
            ->setStatusCode(202);
    }
}
