<?php

namespace App\Http\Controllers\Admin\ProductsCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application
     */
    public function __invoke()
    {
        return view('admin.products_category.create');
    }
}
