<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lname',
        'address',
        'phone',
        'email',
        'password',
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function millerName()
    {
        return $this->belongsToMany(Miller::class, "agent_millers", 'agent_id','miller_id');
    }

    public function transport()
    {

        return $this->hasOne(Transport::class);

    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, "agent_millers", 'agent_id','miller_id');
    }

    public function banks()
    {
        return $this->hasMany(Bank::class, 'agent_id');
    }

    public function transports()
    {
        return $this->hasMany(Transport::class, 'agent_id');
    }



    public function order()
    {

        return $this->hasOne(Order::class);

    }

    public function purchaseorder()
    {

        return $this->hasMany(PurchaseOrder::class);

    }


    public static function hasPermission(array $permission) {
        $user_scopes = User::where('id',Auth::id())->select('scopes')->first();
        $res = str_replace( array( '[', ']', '"' ), '', $user_scopes['scopes']);
        // dd($res);
        $array = explode(',', $res);
        // dd($array);
        if($array[0] == '*'){
            return true;
        } else {
            $result=array_intersect($array,$permission);
            // dd($result);
            if(!empty($result)){
                return true;
            }
            else {
                return false;
            }
        }
        
    }


    public static function getUsersName(array $users_id) {
        $users_name_arr = [];
        if($users_id[0] != ""){
            
            foreach($users_id as $userId){
                $user = User::where('id',$userId)->select('name')->first();
                array_push($users_name_arr,$user->name);
            }
            
        }
        return $users_name_arr;
        
    }



}