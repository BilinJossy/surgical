<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    use HasFactory;
    public function cart(){
        return $this->belongsTo('App\Models\ProductModel','pid');
    }

}
