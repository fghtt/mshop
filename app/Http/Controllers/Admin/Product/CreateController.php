<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductsCategory;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        $productsCategories = ProductsCategory::all();
        return view('admin.product.create', compact('productsCategories'));
    }
}
