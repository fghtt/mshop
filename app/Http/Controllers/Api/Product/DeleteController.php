<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class DeleteController extends Controller
{
    /**
     * @param $id
     */
    public function __invoke($id)
    {
        $product = Product::find($id);
        $product->delete();
        return [];
    }
}
