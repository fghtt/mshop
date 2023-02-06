<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\ProductsCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $products_categories = ProductsCategory::all();
        return view('admin.category.index', compact('products_categories'));
    }
}
