<?php

namespace App\Http\Controllers\Admin;

use App\Models\District;
use App\Models\Upazila;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class upazilaController extends Controller
{
    public function index(Request $request){
       $uid = $request->post('district_id');
       $upzilas = Upazila::orderBy('name','asc')->where('district_id', $uid)->get();


       $html = '<option value=""></option>';

       foreach($upzilas as $upzila){

        $html .= '<option value="'.$upzila->id.'">'.$upzila->name.'</option>';
       }

       echo $html;




    }




}
