<?php

namespace App\Http\Controllers\Product\Api;

use App\Http\Controllers\Product\BaseController;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;

class IndexController extends BaseController
{
    public function __invoke() 
    {
        $products = Product::available()->get();

        return ProductResource::collection($products);
    }
}
