<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function productName()
    {
        return $this->hasMany(Order::class);
    }




    public function productstock()
    {

        return $this->hasMany(ProductStock::class, 'product_id');

    }


    public static function getProductName($pid)
    {

        $prod_name = Product::where('id', $pid)->select('name')->get();
        return $prod_name[0];  
        
    }


}
