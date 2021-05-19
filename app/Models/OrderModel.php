<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;
    public function order(){
        return $this->belongsTo('App\Models\ProductModel','proid');
    }
    public function customer(){
        return $this->belongsTo('App\Models\customer','cid');
    }
}
