<?php

namespace App\Http\Controllers\Admin\ProductsCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductsCategory\StoreRequest;
use App\Models\ProductsCategory;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    /**
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('admin.products_category.index');
    }
}
