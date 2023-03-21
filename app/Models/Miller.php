<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Miller extends Model
{
    use HasFactory;

    public function agent()
    {
        return $this->hasMany(User::class);
    }



}
