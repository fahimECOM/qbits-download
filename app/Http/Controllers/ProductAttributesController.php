<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\ProductAttribute;
use App\Models\Mail;
use Auth;
use DB;
// use PDF;
use Crypt;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ProductAttributesController extends Controller
{
    public function attributes_view(){
        $data['attributes']= ProductAttribute::orderBy('attribute_name','ASC')->get();
        return view('admin.layouts.attributes.attributes',$data);
    }

    public function attributes_store(Request $request){
        $data = new ProductAttribute();
        $data->attribute_name= $request->attribute_name;
        $data->attribute_category= $request->attribute_category;
        $data->status= 1;
        $data->save();
        return redirect()->route('attributes.view');
    }

    public function get_attributes_details(Request $request){
        $atr_id = $request->attribute_id;
        $request->session()->put('ATTRIBUTE_ID',$atr_id);
        $attribute_details = ProductAttribute::where('id',$atr_id)->get();
        if($attribute_details){
            return response()->json(['status'=>'success','attribute_details'=>$attribute_details]);
        }else{
            return response()->json(['status'=>'error','attribute_details'=>$attribute_details]); 
        }
    }

    public function update_attributes_details(Request $request) {
        $atr_id = '';
        if($request->session()->has('ATTRIBUTE_ID')){
            $atr_id = $request->session()->get('ATTRIBUTE_ID');
        }

        ProductAttribute::where('id', $atr_id)->update(array('attribute_name' => $request->attribute_name_edit,'attribute_category' => $request->attribute_category_edit,'status' => $request->attribute_status_edit));
        return response()->json(['status'=>'success']);
    }

    function delete_attributes_details(Request $request) {
        $atr_id = $request->attribute_id;
        if($atr_id){
            ProductAttribute::where('id', $atr_id)->delete();
            return response()->json(['status'=>'success']);
        }
    }


    public function isOnline($site = "https://youtube.com"){
        if(@fopen($site, "r")){
            return true;
        }else{
            return false;
        }
    }
}
