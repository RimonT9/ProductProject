<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;

class ShowController extends BaseController
{
    public function __invoke($id) 
    {
        $product = Product::find($id);
        $productData = json_decode($product['DATA']);

        return view('product.show', compact('product', 'productData'));
    }
}
