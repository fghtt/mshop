<?php

namespace App\Http\Controllers\Api\ProductsCategory;

use App\Http\Controllers\Controller;
use App\Models\ProductsCategory;

class DeleteController extends Controller
{
    /**
     * @param $id
     */
    public function __invoke($id)
    {
        $productsCategory = ProductsCategory::find($id);
        $productsCategory->delete();
        return [];
    }
}
