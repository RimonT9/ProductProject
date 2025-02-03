<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SendProductWebhook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:product-webhook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending product information with the highest ID';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = config('products.webhook');
        $product = Product::orderBy('id', 'desc')->first();

        if($product) { 
            $response = Http::post($url, [
            'id' => $product->id,
            'article' => $product->ARTICLE,
            'name' => $product->NAME,
            'status' => $product->STATUS,
            'data' => $product->DATA,
            'updated_at' => $product->udpated_at, 
            ]);

            $this->info('Product Shipped: ' . $response->status());
        } else {
            $this->info('No products to ship');
        }
    }
}
