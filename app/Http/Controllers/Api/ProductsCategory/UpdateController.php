<?php

namespace App\Http\Controllers\Api\ProductsCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductsCategory\UpdateRequest;
use App\Models\ProductsCategory;

class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param $id
     */
    public function __invoke(UpdateRequest $request, $id)
    {
        $productsCategory = ProductsCategory::find($id);
        $data = $request->validated();

        $productsCategory->update($data);
    }
}
