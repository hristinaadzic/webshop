<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

//    public function products(){
//        return $this->hasManyThrough(Product::class, 'product_volumes', 'productVolumeId', 'productId', 'id');
//    }
}
