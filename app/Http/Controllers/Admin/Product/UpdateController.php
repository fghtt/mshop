<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param $id
     */
    public function __invoke(UpdateRequest $request, $id)
    {
        $product = Product::find($id);
        $data = $request->validated();
        $data['preview'] = Storage::disk('public')->put('/images', $data['preview']);
        $product->update($data);
        return redirect()->route('admin.product.index');
    }
}
