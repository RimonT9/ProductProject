<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;

class EditController extends BaseController
{
    public function __invoke($id)
    {
        $product = Product::find($id);
        $productData = json_decode($product['DATA']);
        return view('product.edit', compact('product', 'productData'));
    }
}
