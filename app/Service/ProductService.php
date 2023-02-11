<?php

namespace App\Service;

use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    /**
     * @param array $data
     * @return void
     */
    public function store(array $data)
    {
        $data['preview'] = Storage::disk('public')->put('/images', $data['preview']);
        Product::create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return void
     */
    public function update(int $id, array $data)
    {
        $product = Product::find($id);
        if(isset($data['preview'])) {
            Storage::disk('public')->delete($product->preview);
            $data['preview'] = Storage::disk('public')->put('/images', $data['preview']);
        }

        $product->update($data);
    }
}
