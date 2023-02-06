<?php

namespace App\Http\Controllers\Admin\Category\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\ProductsCategory;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, ProductsCategory $productsCategory)
    {
        return $productsCategory;
        $data = $request->validated();

        $productsCategory->update($data);

    }
}
