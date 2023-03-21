<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentMiller extends Model
{
    use HasFactory;

    // public function miller()
    // {

    //     return $this->belongsTo(Miller::class, 'miller_id');

    // }

    public function agent()
    {
        return $this->hasMany(User::class);
    }

    public function miller()
    {
        return $this->belongsTo(Miller::class, 'id');
    }


}
