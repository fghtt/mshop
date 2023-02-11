<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        return view('admin.product.create');
    }
}
