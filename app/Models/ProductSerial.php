<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSerial extends Model
{
    use HasFactory;
    public function RQDetails()
    {
        return $this->belongsTo(FinishInventory::class, 'rq_id', 'rq_id');
    }
}
