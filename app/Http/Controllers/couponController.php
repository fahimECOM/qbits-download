<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Ticket;
use App\Models\Conversation;
use App\Models\ProductRegister;
use App\Models\Coupon;
use App\Models\Mail;
use Auth;
use DB;
use PDF;
use Crypt;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Cart;
use App\Models\AllHistory;
use Illuminate\Support\Facades\Hash;
class couponController extends Controller
{
    public function coupon_view(){
        $data['coupon']= Coupon::all();
        return view('admin.layouts.coupon.coupon',$data);
    }
    public function coupon_store(Request $request){
        $data = new Coupon();
        $data->coupon_name= $request->coupon_name;
        $data->coupon_amount= $request->coupon_amount;
        $data->coupon_types= $request->coupon_types;
        $data->coupon_status= $request->coupon_status;
        $data->min_order_amount= $request->min_order_amount;
        $data->save();
        // history
        $table_max_id = Coupon::max('id');
        $history = new AllHistory();
        $history->table_name = 'Coupon';
        $history->table_id = $table_max_id;
        $history->menu_name = 'Coupon';
        $history->status = 'Created';
        $history->created_by = Auth::id();
        $history->journal = 'Coupon ' . $request->coupon_name .'<span class=" text-gray-800"> Created By ' .Auth::user()->name .'</span>';
        $history->date = date('Y-m-d');
        $history-> save();
        // end history
        return redirect()->route('coupon.view');
    }

    public function send_free_coupon(Request $request) {
        $valid_coupon = Coupon::where('types',1)->where('coupon_status',1)->first();
        if($valid_coupon){

            if($this->isOnline()){
                $mail_data = [
                    'recipient' => env('MAIL_FOR_INFO'), //get email
                    'fromEmail' => $request->user_coupon_email,
                    'coupon' => $valid_coupon['coupon_name'],
                    'subject'=> 'Promo Code for discount to your next purchase'
     
                ];
                try {
                    \Mail::send('emails.free-coupon-code',$mail_data,function($message) use($mail_data){
                        $message->to($mail_data['fromEmail'])
                        ->from($mail_data['recipient'],'Qbits')              
                        ->subject($mail_data['subject']);
                    });
                } catch (\Exception $e) {
                    
                }

             }else{
                 return redirect()->back()->withInput()->with('error', 'Check your internet');
             }
            return response()->json(['status'=>'available','msg'=>'We already send a coupon code to your email.']);
        } else {
            return response()->json(['status'=>'not_available','msg'=>'Sorry, No coupon available at this moment.Try later.']);
        }
    }


    public function get_coupon_details(Request $request){
        $cid = $request->coupon_id;
        $request->session()->put('COUPON_ID',$cid);
        $coupon_details = Coupon::where('id',$cid)->get();
        if($coupon_details){
            return response()->json(['status'=>'success','coupon_details'=>$coupon_details]);
        }else{
            return response()->json(['status'=>'error','coupon_details'=>$coupon_details]); 
        }
    }

    public function update_coupon_details(Request $request) {
        $cid = '';
        if($request->session()->has('COUPON_ID')){
            $cid = $request->session()->get('COUPON_ID');
        }
        $coupon_info = Coupon::where('id',$cid)->get();
       
        $coupon_types = $coupon_info[0]->coupon_types;
        $coupon_name = $coupon_info[0]->coupon_name;
        $coupon_amount = $coupon_info[0]->coupon_amount;
        $min_order_amount = $coupon_info[0]->min_order_amount;
        $coupon_status = $coupon_info[0]->coupon_status;

        Coupon::where('id', $cid)->update(array('coupon_name' => $request->coupon_name_edit,'coupon_amount' => $request->coupon_amount_edit,'min_order_amount' => $request->min_order_amount_edit,'coupon_types' => $request->coupon_types_edit,'coupon_status' => $request->coupon_status_edit));
                // history
                $new_coupon_info = [];
                $old_coupon_info = [];
                if($request->coupon_name_edit != $coupon_name ){
                    $new_coupon_info[] = 'New Coupon Name ' .$request->coupon_name_edit;
                    $old_coupon_info[] = 'Old Coupon Name ' .$coupon_name;
                }
                if($request->coupon_amount_edit != $coupon_amount){
                    $new_coupon_info[] = 'New Coupon amount ' .$request->coupon_amount_edit;
                    $old_coupon_info[] = 'Old Coupon amount ' .$coupon_amount;
                }
                if($request->coupon_types_edit != $coupon_types){
                    if($request->coupon_types_edit == 0){
                        $new_coupon_info[] = 'New Coupon Status Persentence';
                    }else{
                        $new_coupon_info[] = 'New Coupon Status Amount';
                    }
                   if($coupon_types == 0){
                    $old_coupon_info[] = 'Old Coupon Status Persentence ' ;
                   }else{
                    $old_coupon_info[] = 'Old Coupon Status Amount' ;
                   }
                }
                if($request->min_order_amount_edit != $min_order_amount){
                    $new_coupon_info[] = 'New Coupon Min Order Amount ' .$request->min_order_amount_edit;
                    $old_coupon_info[] = 'Old Coupon Min Order Amount ' .$min_order_amount;
                }
                if($request->coupon_status_edit != $coupon_status){
                    if($request->coupon_status_edit == 0){
                        $new_coupon_info[] = 'New Coupon Status In active';
                    }else{
                        $new_coupon_info[] = 'New Coupon Status Active';
                    }
                   if($coupon_status == 0){
                    $old_coupon_info[] = 'Old Coupon Status In active ' ;
                   }else{
                    $old_coupon_info[] = 'Old Coupon Status Active' ;
                   }
                   
                }
                $table_max_id = Coupon::max('id');
                $history = new AllHistory();
                $history->table_name = 'Coupon';
                $history->table_id = $table_max_id;
                $history->menu_name = 'Coupon';
                $history->status = 'Update';
                $history->created_by = Auth::id();
                $history->journal =   implode(" & ",$old_coupon_info) . '<span class=" text-gray-800"> Updated By ' .Auth::user()->name .'</span> And Now ' . implode(" & ",$new_coupon_info);
                $history->date = date('Y-m-d');
                $history-> save();
               
                // end history
            return response()->json(['status'=>'success']);
    }

    function delete_coupon_details(Request $request) {
        $c_id = $request->coupon_id;
        $coupon_info = Coupon::where('id',$c_id)->get();      
        $coupon_name = $coupon_info[0]->coupon_name;
        if($c_id){
        // history
        $table_max_id = Coupon::max('id');
        $history = new AllHistory();
        $history->table_name = 'Coupon';
        $history->table_id = $table_max_id;
        $history->menu_name = 'Coupon';
        $history->status = 'Deleted';
        $history->created_by = Auth::id();
        $history->journal = 'Coupon Name '. $coupon_name. '<span class=" text-gray-800"> Deleted By ' .Auth::user()->name .'</span>' ;
        $history->date = date('Y-m-d');
        $history-> save();
        // end history
            Coupon::where('id', $c_id)->delete();
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