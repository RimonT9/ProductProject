<?php

namespace App\Http\Controllers\Product;

class CreateController extends BaseController
{
    public function __invoke()
    {
        return view('product.create');
    }
}
