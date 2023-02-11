<?php

namespace App\Http\Controllers\Admin\ProductsCategory;

use App\Http\Controllers\Controller;
use App\Service\ProductsCategoryService;

class BaseController extends Controller
{
    public $service;

    /**
     * @param ProductService $service
     */
    public function __construct(ProductsCategoryService $service)
    {
        $this->service = $service;
    }
}
