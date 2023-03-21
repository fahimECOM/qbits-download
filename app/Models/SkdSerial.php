<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkdSerial extends Model
{
    use HasFactory;
    public function rawInventoryDetails()
    {
        return $this->belongsTo(RawInventory::class, 'ens_id', 'ens_id');
    }
}