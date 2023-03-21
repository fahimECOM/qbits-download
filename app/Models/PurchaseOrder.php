<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function orderstatus()

    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }

}
