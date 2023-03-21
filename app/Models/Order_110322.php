<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    public function productName()
    {
        return $this->belongsToMany(Product::class, "order_products", 'order_id','product_id');
    }




    public function orderproduct()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function bank()
    {

        return $this->belongsTo(Bank::class,'bank_id');

    }

    public function user()

    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function paymentstatus()

    {
        return $this->belongsTo(PaymentStatus::class, 'payment_status_id');
    }

    public function orderstatus()

    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }

   

}
