<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRegister extends Model
{
    use HasFactory;
    public function productname(){
        return $this->belongsTo(Product::class,'model_name','series_name');
    }
    public function username(){
        return $this->belongsTo(User::class,'name','name');
    }
    public function invoice(){
        return $this->belongsTo(Product_Srial_Number::class,'serial_no','serial_number');
    }
}
