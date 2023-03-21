<?php

namespace App\Models;

use App\User;
use App\Address;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Cart extends Model
{
    protected $guarded = [];
    protected $fillable = ['address_id','price','tax','shipping_cost','discount','coupon_code','coupon_applied','quantity','user_id','owner_id','product_id','variation','bag_id','bag_quanity'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }


    public static function totalCarts()
    {
        // dd("Hello");
        if (Auth::check()) {
            $tempId = session()->get('USER_CART_TEMP_ID');
            $carts = Cart::where('user_id', Auth::id())
            ->where('temp_session_id', $tempId)
            ->where('order_id', NULL)
            ->get();
            // dd($carts);
        }else{
            $tempId = session()->get('USER_CART_TEMP_ID');
            $carts = Cart::where('temp_session_id', $tempId)->where('order_id', NULL)->get();
            // dd($carts);
            
        }     

        return $carts;
        
    }





    public static function totalItems()
    {


        $carts = Cart::totalCarts();

        $total_item = 0;

        foreach ($carts as $cart) {
            $total_item += $cart->quantity;
        }
        return $total_item;
        
    }


}
