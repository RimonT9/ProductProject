<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;

class DeleteController extends BaseController
{
    public function __invoke($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->back();
    }
}
