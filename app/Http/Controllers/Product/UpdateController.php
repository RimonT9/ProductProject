<?php

namespace App\Http\Controllers\Product;

use App\Http\Requests\Product\UpdateRequest;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, $id) 
    {
        $data = $request->validated();

        $product = $this->service->update($data, $id);

        return redirect()->route('product.index');
    }
}
