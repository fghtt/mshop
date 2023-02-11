<?php

namespace App\Http\Controllers\Admin\ProductsCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\ProductsCategory;
use Illuminate\Http\Request;

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
        return redirect()->route('admin.products_category.index');
    }
}
