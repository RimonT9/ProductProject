<?php

namespace App\Services\Product;

use App\Jobs\SendProductCreatedNotification;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $productDataJson = $data['DATA'];
            unset($data['DATA']);

            $product = Product::create($data);

            $product->update(['DATA' => $productDataJson]);

            $user = auth()->user();

            SendProductCreatedNotification::dispatch($user, $product->fresh());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $id)
    {
        try {
            DB::beginTransaction();    
            $product = Product::find($id);
            
            $productData = $data['DATA'];
            unset($data['DATA']);
            
            $product->update($data);
            $product->update(['DATA' => $productData]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
