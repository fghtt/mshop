<?php

namespace App\Service;

use App\Models\ProductsCategory;

class ProductsCategoryService
{
    /**
     * @param array $data
     * @return void
     */
    public function store(array $data)
    {
        ProductsCategory::create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return void
     */
    public function update(int $id, array $data)
    {
        $productsCategory = ProductsCategory::find($id);
        $productsCategory->update($data);
    }
}
