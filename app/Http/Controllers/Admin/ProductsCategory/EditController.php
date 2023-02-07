<?php

namespace App\Http\Controllers\Admin\ProductsCategory;

use App\Http\Controllers\Controller;
use App\Models\ProductsCategory;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke(int $id)
    {
       $productsCategory = ProductsCategory::find($id);
       return view('admin.category.edit', compact('productsCategory'));
    }
}
