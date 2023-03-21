<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinishInventory extends Model
{
    use HasFactory;


    public function userDetails()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
