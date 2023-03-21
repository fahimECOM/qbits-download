<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class AddressDetail extends Model
{
    protected $table = 'address_details';
    protected $guarded = [];
    protected $fillable = ['division','district','thana','sub_office','postal_code'];


    public static function getAllDistrict($division)
    {
        // dd("Hello");
        if (Auth::check()) {
            $allDistrict = AddressDetail::select('district')->where('division',$division)->distinct()->orderBy('district','ASC')->get();
            // dd($carts);
        }     

        return $allDistrict;
        
    }


    public static function getAllThana($district)
    {
        // dd("Hello");
        if (Auth::check()) {
            $allThana = AddressDetail::select('thana')->where('district',$district)->distinct()->orderBy('thana','ASC')->get();
            // dd($carts);
        }     

        return $allThana;
        
    }
}
