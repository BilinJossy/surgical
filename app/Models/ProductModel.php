<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo('App\Models\CategoryModel','cid');
    }
    public function brand(){
        return $this->belongsTo('App\Models\BrandModel','bid');
    }
}
