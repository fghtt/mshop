<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['preview'] = Storage::disk('public')->put('/images', $data['preview']);
        Product::create($data);
        return redirect()->route('admin.product.index');
    }
}
