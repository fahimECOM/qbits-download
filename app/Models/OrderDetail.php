<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class OrderDetail extends Model
{
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function productid(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function ramid(){
        return $this->belongsTo(Product::class,'ram_id','id');
    }
    public function ssdid(){
        return $this->belongsTo(Product::class,'ssd_id','id');
    }
    public function bagid(){
        return $this->belongsTo(Product::class,'bag_id','id');
    }
    public function keyboardid(){
        return $this->belongsTo(Product::class,'keyboard_id','id');
    }
}
