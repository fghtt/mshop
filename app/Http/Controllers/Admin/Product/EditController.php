<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke(int $id)
    {
       $product = Product::find($id);
       return view('admin.product.edit', compact('product'));
    }
}
