<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Services\Product\Service;

class BaseController extends Controller
{
    public $service;

    public function __Construct(Service $service) 
    {
        $this->service = $service;
    }
}
