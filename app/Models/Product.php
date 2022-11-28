<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public  function categories(){
        return $this->belongsToMany(Category::class, 'product_categories', 'productId', 'categoryId');
    }

    public  function volumes(){
        return $this->belongsToMany(Volume::class, 'product_volumes', 'productId', 'volumeId');
    }

    public function brands(){
        return $this->belongsTo(Brand::class, 'brandId', 'id');
    }

    public function genders(){
        return $this->belongsTo(Gender::class);
    }
}
