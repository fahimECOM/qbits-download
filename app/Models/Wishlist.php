<?php

namespace App\Models;

use App\User;
use App\Address;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Wishlist extends Model
{
    
    protected $guarded = [];
    protected $fillable = ['price','tax','shipping_cost','discount','quantity','user_id','product_id'];

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


    public static function totalWishlists()
    {
        // dd("Hello");
        if (Auth::check()) {
            $wishlists = Wishlist::where('user_id', Auth::id())
            ->get();
            // dd($carts);
        }     

        return $wishlists;
        
    }


    public static function totalItems()
    {

        $wishlists = Wishlist::totalWishlists();

        $total_item = 0;

        foreach ($wishlists as $wishlist) {
            $total_item += $wishlist->quantity;
        }
        return $total_item;
        
    }

    public static function isWishlisted($pid)
    {

        $wishlists = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $pid)
            ->first();
        if($wishlists){
            return true;
        } else {
            return false;
        }
        
        
    }
}
