<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Srial_Number extends Model
{
    use HasFactory;
    
    protected $table = 'post_sell_serial_no';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productid(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
