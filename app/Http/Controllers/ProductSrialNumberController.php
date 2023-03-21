<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Product;
use App\Models\ProductRegister;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Ticket;
use App\Models\Conversation;
use App\Models\Shipment_Details;
use App\Models\Product_Srial_Number;
use App\Models\ProductSerial;
use App\Models\Action_History;
use App\Models\Mail;
use Auth;
use DB;
use PDF;
use Crypt;
use Redirect;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Hash;

class ProductSrialNumberController extends Controller
{
    public function check_product_serial(Request $request){
        $serialCheck = Product_Srial_Number::where('serial_number',$request->cur_serial_number)->where('status',1)->first();
        if($serialCheck){
            $sold = ProductSerial::where('prod_serial',$request->cur_serial_number)->where('flow_type','inflow')->first();
            if($sold) {
                return response()->json(['status'=>'error', 'error_type'=>'Already Used!','message'=>'This product is already used. Please try new one.']);
            } else {
                return response()->json(['status'=>'error', 'error_type'=>'Already Sold!','message'=>'This product is already sold. Please try new one.']);
            }
        } else {
            $valid_serial = ProductSerial::where('prod_serial',$request->cur_serial_number)->where('product_id',$request->product_id)->where('flow_type','inflow')->first();
            if($valid_serial){
                if($request->order_details != null) {
                    //checking double barcode scaning for same barcode serial number
                    $barcode_arr = explode (",", $request->order_details);
                    if (in_array($request->cur_serial_number, $barcode_arr))
                    {
                        return response()->json(['status'=>'error','error_type'=>'Double Scanned!','message'=>'This barcode is already scanned. Please try new one.']);
                    }
                    else{
                        return response()->json(['status'=>'success']);
                    }
                } else {
                    return response()->json(['status'=>'success']);
                }
                
            } else {
                return response()->json(['status'=>'error', 'error_type'=>'Invalid!','message'=>'This barcode is not valid. Please try a valid barcode.']);
            }
        }
        
    }

    public function addserial(Request $request)
    {
        $total_count = $request->total_product;
        $prod_serials = null;
        $bag_ids = null;
        $keyboard_ids = null;
        for($i = 0; $i < $total_count; $i++) {
            $product_serial = Product_Srial_Number::where('serial_number',$request->{'product_serial_' . $i})->where('status',0)->first();
            if(!$product_serial) {
                $product_serial = new Product_Srial_Number();
            }
            $product_serial->product_id = $request->{'product_id_'.$i};
            $product_serial->serial_number = $request->{'product_serial_' . $i};
            $product_serial->bag_id = $request->{'bag_id_' . $i};
            $product_serial->keyboard_id = $request->{'keyboard_id_' . $i};
            $product_serial->quantity = 1;
            $product_serial->product_unit_price = $request->{'product_unit_price_' . $i};
            $product_serial->bag_unit_price = 0;
            $product_serial->total_price = $request->{'total_price_' . $i};
            $product_serial->order_no = $request->order_no_id;
            $product_serial->invoice_no = $request->order_invoice_no;
            $product_serial->order_date = $request->order_date;
            $product_serial->invoice_date = $request->order_invoice_date;
            $product_serial->order_details_id = $request->{'order_details_id_' . $i};
            $product_serial->user_id = $request->{'user_id_' . $i};
            $product_serial->status = 1;
            $product_serial->save();

            $u_id = $request->{'user_id_' . $i};

            //add product all serials
            if($request->{'product_serial_' . $i}){
                if($prod_serials == null){
                    $prod_serials ='["'.$request->{'product_serial_' . $i}.'"';
                } else {
                    $prod_serials = $prod_serials .',"'. $request->{'product_serial_' . $i} .'"';
                }
            }

            //add all bag ids
            if($request->{'bag_id_' . $i}){
                if($bag_ids == null){
                    $bag_ids = '["'.$request->{'bag_id_' . $i}.'"';
                } else {
                    $bag_ids = $bag_ids .',"'.$request->{'bag_id_' . $i}.'"';
                }
            }

            //add all keyboard ids
            if($request->{'keyboard_id_' . $i}){
                if($keyboard_ids == null){
                    $keyboard_ids = '["'.$request->{'keyboard_id_' . $i}.'"';
                } else {
                    $keyboard_ids = $keyboard_ids .',"'.$request->{'keyboard_id_' . $i}.'"';
                }
            }
        }
        if($prod_serials != null){
            $prod_serials = $prod_serials . "]";
        }
        if($bag_ids != null) {
            $bag_ids = $bag_ids . "]";
        }
        if($keyboard_ids != null) {
            $keyboard_ids = $keyboard_ids . "]";
        }
        

        $order = Order::find($request->orderId);
        $order->product_serials = $prod_serials;  
        $order->bag_ids = $bag_ids;
        $order->keyboard_ids = $keyboard_ids;
        $order->save();

        return response()->json(['status'=>'success']);
        // return redirect()->route('order.details',$id)->with('successMsg','Product Successfully Updated');
    }

    public function warranty_card_download($prodSl,$prodInv) {
        $pdf = PDF::loadView('admin.layouts.sales.warrantycardPDF',['prod_sl'=>$prodSl,'prod_inv'=>$prodInv]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function warranty_card_download_complete($prodInv) {
        $order = Order::where('invoice',$prodInv)->first();
        $order->warranty_card = 1;
        $order->save();
        return redirect(url()->previous());
    }

    public function shipment_process(Request $request) {
        
        $admin = Auth::id();
        $order_address_details = Order::where('order_no',$request->order_no_id)->select('billing_flat','billing_thana','billing_district','billing_division')->first();
        
        $data = new Shipment_Details();
        $data->shipping_service_name = $request->shipping_service_name;     
        $data->tracking_number = $request->tracking_number;     
        $data->shipping_date = $request->date;  
        $data->invoice_number = $request->order_invoice_no;
        $data->shipping_address = $order_address_details->billing_flat.','.$order_address_details->billing_thana.','.$order_address_details->billing_district.','.$order_address_details->billing_division;
        $data->shipping_status = 'processing';
        $data->customer_id = $request->seller_user_id;
        $data->admin_id = $admin;
        $data->save();

        $admin_id = Auth::id();
        $adminRole = User::where('id',$admin_id)->select('user_type','name')->first();
        $action = new Action_History();
        $action->user_id = $admin_id;
        $action->user_name = $adminRole->name;
        $action->user_role = $adminRole->user_type;
        $action->order_id = $request->order_no_id;
        $action->action_status = 'shipment'; 
        $action->save();

        //product,bag,keyboard quantity updated
        $order_details = Order::where('invoice',$request->order_invoice_no)->select('product_serials','bag_ids','keyboard_ids','comments')->first();

         //product quantity updated
         $product_serials_str = str_replace( array( '[', ']', '"' ), '', $order_details->product_serials);
         $product_serials_str_arr = explode (",", $product_serials_str);
         if(count($product_serials_str_arr) > 0){
             foreach($product_serials_str_arr as $prod_serial) {
                 $detail = ProductSerial::where('prod_serial', $prod_serial)->first();
                 if($detail->flow_type == 'inflow'){
                     $detail->flow_type = 'outflow';
                     $detail->save(); 
                 }
             }
     
         }
 
         //bag quantity updated
         $all_bags_str = str_replace( array( '[', ']', '"' ), '', $order_details->bag_ids);
         if($all_bags_str == null) {
             $all_bags_str_arr = [];
         }else{
             $all_bags_str_arr = explode (",", $all_bags_str);
         }
         if(count($all_bags_str_arr) > 0){
             foreach($all_bags_str_arr as $bag) {
                 $product = Product::where('id', $bag)->first();
                 if($product){
                     $bag_updated_qty = $product->current_stock - 1;
                     $product->current_stock = $bag_updated_qty;
                     $product->save();
                 }  
             }
         }
 
         //keyboard quantity updated
         $all_keyboards_str = str_replace( array( '[', ']', '"' ), '', $order_details->keyboard_ids);
         if($all_keyboards_str == null) {
             $all_keyboards_str_arr = [];
         } else {
             $all_keyboards_str_arr = explode (",", $all_keyboards_str);
         }
         if(count($all_keyboards_str_arr) > 0){
             foreach($all_keyboards_str_arr as $keyboard) {
                 $product = Product::where('id', $keyboard)->first();
                 if($product){
                     $keyboard_updated_qty = $product->current_stock - 1;
                     $product->current_stock = $keyboard_updated_qty;
                     $product->save();
                 }  
             }
         }

         //update order comments by 'delivery process' to understand order already shipped
         $order = Order::where('invoice',$request->order_invoice_no)->first();
         $order->comments = 'delivery process';
         $order->save();


        if($data->id) {
            $user_details = User::where('id',$request->seller_user_id)->first();
            if($user_details){
                if($this->isOnline()){
                    $mail_data = [
                        'recipient' => env('MAIL_FOR_INFO'), //get email
                        'fromEmail' => $user_details->email,
                        'name' => $user_details->name,
                        'order' => $request->order_no_id,
                        'order_tracking' => $request->tracking_number,
                        'subject'=> 'Your Order Has Been Shipped'
        
                    ];
                    try {
                        \Mail::send('emails.order-shipment',$mail_data,function($message) use($mail_data){
                            $message->to($mail_data['fromEmail'])
                            ->from($mail_data['recipient'],'Qbits Team')              
                            ->subject($mail_data['subject']);
                        });
                    } catch (\Exception $e) {
                        
                    }
    
                }else{
                    return redirect()->back()->withInput()->with('error', 'Check your internet');
                }
            }  
        }

        return response()->json(['status'=>'success']);
    }
    
    public function serialList()
    {
      $serial_no = Product_Srial_Number:: where('status',1)->orderBy('id','desc')->get();
        return view('admin.layouts.misc.postSellSerialNo',compact('serial_no'));
    }

    public function isOnline($site = "https://youtube.com"){
        if(@fopen($site, "r")){
            return true;
        }else{
            return false;
        }
    }
}
