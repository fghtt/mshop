<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\SearchRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __invoke(SearchRequest $request)
    {
        $data = $request->validated();
        $products = Product::where('title', 'like', "%$data[title]%")
            ->get();
        return ProductResource::collection($products);
    }
}
