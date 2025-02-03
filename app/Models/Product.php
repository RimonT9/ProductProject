<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    protected $table = 'products';
    protected $guarded = false;

    public function scopeAvailable($query)
    {
        return $query->where('STATUS', 'available');
    }
}
