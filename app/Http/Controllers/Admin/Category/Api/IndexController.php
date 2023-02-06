<?php

namespace App\Http\Controllers\Admin\Category\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductsCategoriesResource;
use App\Models\ProductsCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $products_categories = ProductsCategory::all();
        return ProductsCategoriesResource::collection($products_categories);
    }
}
