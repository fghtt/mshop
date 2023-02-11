<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
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
