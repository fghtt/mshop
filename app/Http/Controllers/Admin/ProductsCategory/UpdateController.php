<?php

namespace App\Http\Controllers\Admin\ProductsCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductsCategory\UpdateRequest;
use App\Models\ProductsCategory;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    /**
     * @param UpdateRequest $request
     * @param $id
     */
    public function __invoke(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        $this->service->update($id, $request);
        return redirect()->route('admin.products_category.index');
    }
}
