<?php

namespace App\Http\Controllers\Admin\ProductsCategory\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductsCategory;
use Illuminate\Http\Request;

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
