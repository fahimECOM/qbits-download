<?php

namespace App\Http\Controllers;

use App\Utility\PayfastUtility;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Mail;
use Auth;
use DB;
// use PDF;
// use \PDF;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\InstamojoController;
use App\Http\Controllers\ClubPointController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\PublicSslCommerzPaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\PaytmController;
use App\CommissionHistory;
use App\BusinessSetting;
use App\Coupon;
use App\CouponUsage;
use App\User;
use App\Address;
use Session;
use App\Utility\PayhereUtility;
use App\Http\Controllers\ShurjoPayController as SPay;

class CheckoutController extends Controller
{


    public function index($value=null)
    {
        // dd($id);
        // dd("Hello Checkout");
        // $carts = Cart::where('product_id',$id)->first();
        // $products = Product::where('id',$id)->first();
        
        $carts = Cart::totalCarts();

        if($carts != '[]'){
            if(session()->has('GUEST_LOGIN')){
                return view("frontend.checkout_processing");
            } else{
                if (Auth::check()) {

                    return view("frontend.checkout_processing");
                    
                }else{
                    return view("frontend.checkout");
                    // dd('it is not Auth');
                }
            }
        } else {
            return redirect('/');
        }  
        
        

        // if($carts != '[]'){
        //     if($value == 'u0cEh1iPyFmUAGIuBclL'){
        //         if (Auth::check()) {

        //             return view("frontend.checkout_processing");
                    
        //         }else{
        //             return view("frontend.checkout");
        //             // dd('it is not Auth');
        //         }
        //     } else {
        //         return redirect('carts');
        //     }
        // } else {
        //     return redirect('/');
        // } 

    }

    public function checkout_check_qty(){
        $carts = Cart::totalCarts();
        
        if($carts != '[]'){
            foreach ($carts as $key => $cartItem) {
                $c_product = DB::table('products')->where('id',$cartItem['product_id'])->select('current_stock')->get();
                if($c_product[0]->current_stock < $cartItem['quantity']){
                    return response()->json(['status'=>'error','msg'=>'Available for purchase ','cartId'=>$cartItem['id'],'availableQty' => $c_product[0]->current_stock]);
                }
            }
        }
    }

    // public function checkout_processing()
    // {
    //     return view("frontend.checkout_processing");
    // }

    public function order_test(Request $request) {
        $orders = OrderDetail::where('order_id',921222)->get();
        $order_num = $orders[0]->order_id;
        $invoice = 'INV'.$order_num.'.pdf';
        $amount = OrderDetail::where('order_id',921222)->get()->sum('price');
        // $orders_new = Order::where('invoice',$orders[0]->order_id)->first();
        $data['recipient'] = 'najmulovi.isharify@gmail.com'; //get email
        $data['fromEmail'] = 'test@gmail.com';
        $data['orders'] = $orders;
        $data['amount'] = $amount;
        // $data['orders_new'] = $orders_new;
        $data['title'] = 'Invoice From myqbits.com';

        // $pdf = PDF::loadView('frontend.demo2',$data)
        //     ->setPaper('a4', 'portrait')
        //     ->setOptions(['dpi' => 96,
        //         'isHtml5ParserEnabled' => TRUE,
        //         'isRemoteEnabled' => TRUE,
        //         'enable_html5_parser' => TRUE,
        //         'enable_remote' => TRUE,
        //         'enable_css_float' => TRUE, 
        // 'chroot' => storage_path('/')]);
        
        // \Mail::send('frontend.demo2',$data,function($message) use ($data,$pdf,$invoice ){
        //     $message->to( $data['recipient'])
        //     ->subject('Order Invoice')
        //     ->attachData($pdf->output(),$invoice);
        // });

        // dd('Email has been sent');
        return view('frontend.demo2', $data);
    }

    public function order_placed(Request $request)
    {

        if($request->billing_dist_name){
            $billing_dist_name = $request->billing_dist_name;
        } else {
            $billing_dist_name = $request->billing_district;
        } 

        if($request->billing_thana_name){
            $billing_thana_name = $request->billing_thana_name;
        } else {
            $billing_thana_name = $request->billing_thana;
        }

        if($request->billing_div_name){
            $billing_div_name = $request->billing_div_name;
        } else {
            $billing_div_name = $request->billing_division;
        }

        // Order placed for Guest User
        if($request->session()->has('GUEST_LOGIN')){
            $userId = $request->session()->get('GUEST_ID');
            $guestEmail = $request->session()->get('GUEST_EMAIL');

            $carts = Cart::where('user_id', $userId)
                ->leftJoin('users', 'carts.user_id', '=', 'users.id')
                ->get();
            $request->session()->forget('GUEST_LOGIN');

            if($carts) {
                $order = new Order();
                $time = substr(time(),-4);
                $order->order_no = 'QB'.rand(00,99).$time;
                $order->user_id = $userId;
                $order->shipping_flat = $request->shipping_flat;
                $order->shipping_thana = $request->shipping_thana;
                $order->shipping_district = $request->shipping_district;
                $order->shipping_division = $request->shipping_division;
                $order->billing_flat = $request->billing_flat;
                $order->billing_district = $billing_dist_name;
                $order->billing_thana = $billing_thana_name;
                $order->billing_division = $billing_div_name;         
                $order->payment_type = $request->payment_method;
                $order->coupon_name = $request->coupon_code_name;
                $order->coupon_amount = $request->coupon_code_value;
                $order->tax_amount = $request->tax_amount;
                $order->save();

                //update billing address on user table
                DB::table('users')->where('email',$guestEmail)->update(array('address' => $request->billing_flat, 'division' => $billing_div_name, 'district' => $billing_dist_name, 'thana' => $billing_thana_name));
    
                if($order->id) {
                    foreach ($carts as $key => $cartItem) {
                       /* 
                        //get product current quantity
                        $c_qty = DB::table('products')->where('id',$cartItem['product_id'])->select('current_stock')->get();
                        //get updated product quantity
                        $u_qty = $c_qty[0]->current_stock - $cartItem['quantity'];
                        //updated product quantity into database
                        DB::table('products')->where('id',$cartItem['product_id'])->update(array('current_stock' => $u_qty));

                        //updated bag quantity into database
                        if($cartItem['bag_id']){
                            //get bag current quantity
                            $c_bag_qty = DB::table('products')->where('id',$cartItem['bag_id'])->select('current_stock')->get();
                            //get updated bag quantity
                            $u_bag_qty = $c_bag_qty[0]->current_stock - $cartItem['quantity'];
                            //updated bag quantity into database
                            DB::table('products')->where('id',$cartItem['bag_id'])->update(array('current_stock' => $u_bag_qty));
                        }

                        //updated keyboard quantity into database
                        if($cartItem['keyboard_id']){
                            //get keyboard current quantity
                            $c_keyboard_qty = DB::table('products')->where('id',$cartItem['keyboard_id'])->select('current_stock')->get();
                            //get updated keyboard quantity
                            $u_keyboard_qty = $c_keyboard_qty[0]->current_stock - $cartItem['keyboard_qty'];
                            //updated keyboard quantity into database
                            DB::table('products')->where('id',$cartItem['keyboard_id'])->update(array('current_stock' => $u_keyboard_qty));
                        }

                        //updated ram quantity into database
                        if($cartItem['ram_id']){
                            //get ram current quantity
                            $c_ram_qty = DB::table('products')->where('id',$cartItem['ram_id'])->select('current_stock')->get();
                            //get updated ram quantity
                            $u_ram_qty = $c_ram_qty[0]->current_stock - $cartItem['ram_qty'];
                            //updated ram quantity into database
                            DB::table('products')->where('id',$cartItem['ram_id'])->update(array('current_stock' => $u_ram_qty));
                        }

                        //updated ssd quantity into database
                        if($cartItem['ssd_id']){
                            //get ssd current quantity
                            $c_ssd_qty = DB::table('products')->where('id',$cartItem['ssd_id'])->select('current_stock')->get();
                            //get updated ssd quantity
                            $u_ssd_qty = $c_ssd_qty[0]->current_stock - $cartItem['ssd_qty'];
                            //updated ssd quantity into database
                            DB::table('products')->where('id',$cartItem['ssd_id'])->update(array('current_stock' => $u_ssd_qty));
                        }

                       */ 

                        //calculate total price for each cart
                        $total_price = $cartItem['unit_price'] * $cartItem['quantity'];

                        $order_detail = new OrderDetail;
                        $order_detail->order_id = $order->order_no;
                        $order_detail->seller_id = $userId;
                        $order_detail->product_id = $cartItem['product_id'];
                        $order_detail->price = $cartItem['unit_price'] * $cartItem['quantity'];
                        $order_detail->quantity = $cartItem['quantity'];
                        if($cartItem['bag_id']){
                            $order_detail->bag_id = $cartItem['bag_id'];
                            $order_detail->bag_quanity = $cartItem['bag_quanity'];
                            $order_detail->bag_unit_price = $cartItem['bag_unit_price'];
                            //update total price
                            $total_price = $total_price + ($cartItem['bag_unit_price'] * $cartItem['bag_quanity']);
                        }
                        if($cartItem['keyboard_id']){
                            $order_detail->keyboard_id = $cartItem['keyboard_id'];
                            $order_detail->keboard_type = $cartItem['keboard_type'];
                            $order_detail->keyboard_discount = $cartItem['keyboard_discount'];
                            $order_detail->keyboard_qty = $cartItem['keyboard_qty'];
                            $order_detail->keyboard_unit_price = $cartItem['keyboard_unit_price'];
                            //update total price
                            $total_price = $total_price + ($cartItem['keyboard_unit_price'] * $cartItem['keyboard_qty']);
                        }
                        if($cartItem['ram_id']){
                            $order_detail->ram_id = $cartItem['ram_id'];
                            $order_detail->ram_name = $cartItem['ram_name'];
                            $order_detail->ram_qty = $cartItem['ram_qty'];
                            $order_detail->ram_unit_price = $cartItem['ram_unit_price'];
                            //update total price
                            $total_price = $total_price + ($cartItem['ram_unit_price'] * $cartItem['ram_qty']);
                        }
                        if($cartItem['ssd_id']){
                            $order_detail->ssd_id = $cartItem['ssd_id'];
                            $order_detail->ssd_name = $cartItem['ssd_name'];
                            $order_detail->ssd_qty = $cartItem['ssd_qty'];
                            $order_detail->ssd_unit_price = $cartItem['ssd_unit_price'];
                            //update total price
                            $total_price = $total_price + ($cartItem['ssd_unit_price'] * $cartItem['ssd_qty']);
                        }
                        $order_detail->total_price = $total_price;
                        $order_detail->save();
                            
                    }
            
                        $orders = OrderDetail::where('order_id',$order->order_no)->get();

                        $request->session()->put('ORDER_ID',$order->order_no);
                        $request->session()->put('ORDER_NEW_ID',$orders[0]->order_id);

                        $order_new_id = session()->get('ORDER_NEW_ID');
                

                        $amount = OrderDetail::where('order_id',$order->order_no)->get()->sum('price');
                        $orders_new = Order::where('order_no',$order_new_id)->first();
            
                        //delete cart value
                        DB::table('carts')->where(['user_id'=>$userId])->delete();
                        //delete cart temp session id
                        $request->session()->forget('USER_CART_TEMP_ID');
                        
                        $guestUser = DB::table('users')->where('id',$userId)->where('user_type_status','non-reg')->get();
 
                        if($this->isOnline()){
                            $mail_data = [
                                'recipient' => env('MAIL_FOR_INFO'), //get email
                                'fromEmail' => $guestEmail,
                                'name' => $guestUser[0]->name,
                                'order' => $order_new_id,
                                'orders' => $orders,
                                'amount' => $amount,
                                'subject'=> 'Thanks for Your Order'
                
                            ];
                            try {
                                \Mail::send('emails.order-placed',$mail_data,function($message) use($mail_data){
                                    $message->to($mail_data['fromEmail'])
                                    ->from($mail_data['recipient'],'Qbits Team')              
                                    ->subject($mail_data['subject']);
                                });
                            } catch (\Exception $e) {
                                
                            }
            
                        }else{
                            return redirect()->back()->withInput()->with('error', 'Check your internet');
                        }
                        //order invoice email send for guest user
                        // if(session()->has('ORDER_ID') && session()->has('ORDER_NEW_ID')){

                        //     if($this->isOnline()){

                        //         $data['recipient'] = env('MAIL_FOR_INFO'); //get email
                        //         $data['fromEmail'] = $guestEmail;
                        //         $data['orders'] = $orders;
                        //         $data['amount'] = $amount;
                        //         $data['orders_new'] = $orders_new;
                        //         $data['subject'] = 'Invoice [#'.$order_new_id.'] From myqbits.com';
                        
                        //         $pdf = PDF::loadView('emails.order-invoice', $data);
    
                        //         //email send to support team.
                        //         try {
                        //              \Mail::send('emails.order-invoice', $data, function($message)use($data,$pdf) {
                        //                 $message->to($data["fromEmail"])
                        //                 ->subject($data["subject"])
                        //                 ->attachData($pdf->output(), "invoice.pdf");
                        //                 });
                        //          } catch (\Exception $e) {
                                     
                        //          }
                        //         return redirect()->route('send.email.success')->with('success','email sent');
                        //      }else{
                        //          return redirect()->back()->withInput()->with('error', 'Check your internet');
                        //      }
                        // }
            
                        //   dd($order_details);
                        // $this->order_confirmed($orders);
            
                        // Toastr::Success('Your order has been successfully placed', '', ["positionClass" => "toast-top-right","progressBar" => "true"]);
                        return response()->json(['status'=>'success','msg'=>'Your Order Has been successfully Placed']);
                
            } else {
                return response()->json(['status'=>'error','msg'=>'Your Order has not been placed.Something went wrong, Please try again later.']);
            }
    
               
        } else {
            return response()->json(['status'=>'error','msg'=>'']);
        }

        // Order placed for Registered User
        } else{
            $carts = Cart::where('user_id', Auth::user()->id)
                ->leftJoin('users', 'carts.user_id', '=', 'users.id')
                ->get();

            if($carts) {
                $order = new Order();
                $time = substr(time(),-4);
                $order->order_no = 'QB'.rand(00,99).$time;
                $order->user_id = auth()->user()->id;
                $order->shipping_flat = $request->shipping_flat;
                $order->shipping_thana = $request->shipping_thana;
                $order->shipping_district = $request->shipping_district;
                $order->shipping_division = $request->shipping_division;
                $order->billing_flat = $request->billing_flat;
                $order->billing_district = $billing_dist_name;
                $order->billing_thana = $billing_thana_name;
                $order->billing_division = $billing_div_name;         
                $order->payment_type = $request->payment_method;
                $order->coupon_name = $request->coupon_code_name;
                $order->coupon_amount = $request->coupon_code_value;
                $order->tax_amount = $request->tax_amount;
                $order->save();

                //update billing address on user table
                DB::table('users')->where('id',auth()->user()->id)->update(array('address' => $request->billing_flat, 'division' => $billing_div_name, 'district' => $billing_dist_name, 'thana' => $billing_thana_name));
    
                if($order->id) {
                    foreach ($carts as $key => $cartItem) {

                      /*  
                        //get product current quantity
                        $c_qty = DB::table('products')->where('id',$cartItem['product_id'])->select('current_stock')->get();
                        //get updated product quantity
                        $u_qty = $c_qty[0]->current_stock - $cartItem['quantity'];
                        //updated product quantity into database
                        DB::table('products')->where('id',$cartItem['product_id'])->update(array('current_stock' => $u_qty));

                        //updated bag quantity into database
                        if($cartItem['bag_id']){
                            //get bag current quantity
                            $c_bag_qty = DB::table('products')->where('id',$cartItem['bag_id'])->select('current_stock')->get();
                            //get updated bag quantity
                            $u_bag_qty = $c_bag_qty[0]->current_stock - $cartItem['quantity'];
                            //updated bag quantity into database
                            DB::table('products')->where('id',$cartItem['bag_id'])->update(array('current_stock' => $u_bag_qty));
                        }

                        //updated keyboard quantity into database
                        if($cartItem['keyboard_id']){
                            //get keyboard current quantity
                            $c_keyboard_qty = DB::table('products')->where('id',$cartItem['keyboard_id'])->select('current_stock')->get();
                            //get updated keyboard quantity
                            $u_keyboard_qty = $c_keyboard_qty[0]->current_stock - $cartItem['keyboard_qty'];
                            //updated keyboard quantity into database
                            DB::table('products')->where('id',$cartItem['keyboard_id'])->update(array('current_stock' => $u_keyboard_qty));
                        }

                        //updated ram quantity into database
                        if($cartItem['ram_id']){
                            //get ram current quantity
                            $c_ram_qty = DB::table('products')->where('id',$cartItem['ram_id'])->select('current_stock')->get();
                            //get updated ram quantity
                            $u_ram_qty = $c_ram_qty[0]->current_stock - $cartItem['ram_qty'];
                            //updated ram quantity into database
                            DB::table('products')->where('id',$cartItem['ram_id'])->update(array('current_stock' => $u_ram_qty));
                        }

                        //updated ssd quantity into database
                        if($cartItem['ssd_id']){
                            //get ssd current quantity
                            $c_ssd_qty = DB::table('products')->where('id',$cartItem['ssd_id'])->select('current_stock')->get();
                            //get updated ssd quantity
                            $u_ssd_qty = $c_ssd_qty[0]->current_stock - $cartItem['ssd_qty'];
                            //updated ssd quantity into database
                            DB::table('products')->where('id',$cartItem['ssd_id'])->update(array('current_stock' => $u_ssd_qty));
                        }

                      */
                        //calculate total price for each cart
                        $total_price = $cartItem['unit_price'] * $cartItem['quantity'];

                        $order_detail = new OrderDetail;
                        $order_detail->order_id = $order->order_no;
                        $order_detail->seller_id = auth()->user()->id;
                        $order_detail->product_id = $cartItem['product_id'];
                        $order_detail->price = $cartItem['unit_price'] * $cartItem['quantity'];
                        $order_detail->quantity = $cartItem['quantity'];
                        if($cartItem['bag_id']){
                            $order_detail->bag_id = $cartItem['bag_id'];
                            $order_detail->bag_quanity = $cartItem['bag_quanity'];
                            $order_detail->bag_unit_price = $cartItem['bag_unit_price'];
                             //update total price
                             $total_price = $total_price + ($cartItem['bag_unit_price'] * $cartItem['bag_quanity']);
                        }
                        if($cartItem['keyboard_id']){
                            $order_detail->keyboard_id = $cartItem['keyboard_id'];
                            $order_detail->keboard_type = $cartItem['keboard_type'];
                            $order_detail->keyboard_discount = $cartItem['keyboard_discount'];
                            $order_detail->keyboard_qty = $cartItem['keyboard_qty'];
                            $order_detail->keyboard_unit_price = $cartItem['keyboard_unit_price'];
                             //update total price
                             $total_price = $total_price + ($cartItem['keyboard_unit_price'] * $cartItem['keyboard_qty']);
                        }
                        if($cartItem['ram_id']){
                            $order_detail->ram_id = $cartItem['ram_id'];
                            $order_detail->ram_name = $cartItem['ram_name'];
                            $order_detail->ram_qty = $cartItem['ram_qty'];
                            $order_detail->ram_unit_price = $cartItem['ram_unit_price'];
                            //update total price
                            $total_price = $total_price + ($cartItem['ram_unit_price'] * $cartItem['ram_qty']);
                        }
                        if($cartItem['ssd_id']){
                            $order_detail->ssd_id = $cartItem['ssd_id'];
                            $order_detail->ssd_name = $cartItem['ssd_name'];
                            $order_detail->ssd_qty = $cartItem['ssd_qty'];
                            $order_detail->ssd_unit_price = $cartItem['ssd_unit_price'];
                            //update total price
                            $total_price = $total_price + ($cartItem['ssd_unit_price'] * $cartItem['ssd_qty']);
                        }
                        $order_detail->total_price = $total_price;
                        $order_detail->save();
                            
                    }

                        
                        $orders = OrderDetail::where('order_id',$order->order_no)->get();
                        
                        $request->session()->put('ORDER_ID',$order->order_no);
                        $request->session()->put('ORDER_NEW_ID',$orders[0]->order_id);
                        $order_new_id = session()->get('ORDER_NEW_ID');
            

                        $amount = OrderDetail::where('order_id',$order->order_no)->get()->sum('price');
                        $orders_new = Order::where('order_no',$order_new_id)->first();

                        //delete cart value
                        DB::table('carts')->where(['user_id'=>Auth::user()->id])->delete();
                        //delete cart temp session id
                        $request->session()->forget('USER_CART_TEMP_ID');

                        if($this->isOnline()){
                            $mail_data = [
                                'recipient' => env('MAIL_FOR_INFO'), //get email
                                'fromEmail' => Auth::user()->email,
                                'name' => Auth::user()->name,
                                'order' => $order_new_id,
                                'orders' => $orders,
                                'orders_new' => $orders_new,
                                'subject'=> 'Thanks for Your Order'
                
                            ];
                            try {
                                \Mail::send('emails.order-placed',$mail_data,function($message) use($mail_data){
                                    $message->to($mail_data['fromEmail'])
                                    ->from($mail_data['recipient'],'Qbits Team')              
                                    ->subject($mail_data['subject']);
                                });
                            } catch (\Exception $e) {
                                
                            }
            
                        }else{
                            return redirect()->back()->withInput()->with('error', 'Check your internet');
                        }
                        //order invoice email send for registered user
                        // if(session()->has('ORDER_ID') && session()->has('ORDER_NEW_ID')){
                        //     if($this->isOnline()){

                        //         $data['recipient'] = env('MAIL_FOR_INFO'); //get email
                        //         $data['fromEmail'] = Auth::user()->email;
                        //         $data['orders'] = $orders;
                        //         $data['amount'] = $amount;
                        //         $data['orders_new'] = $orders_new;
                        //         $data['subject'] = 'Invoice [#'.$order_new_id.'] From myqbits.com';
                        
                        //         $pdf = PDF::loadView('emails.order-invoice', $data);
    
                        //         //email send to support team.
                        //         try {
                        //              \Mail::send('emails.order-invoice', $data, function($message)use($data,$pdf) {
                        //                 $message->to($data["fromEmail"])
                        //                 ->subject($data["subject"])
                        //                 ->attachData($pdf->output(), "invoice.pdf");
                        //                 });
                        //          } catch (\Exception $e) {
                                     
                        //          }
                        //         return redirect()->route('send.email.success')->with('success','email sent');
                        //      }else{
                        //          return redirect()->back()->withInput()->with('error', 'Check your internet');
                        //      }
                        // }
                        
            
                        //   dd($orders_new->shipping_method);
            
                        
            
                        //   dd($orders);
                        
            
                        //   dd($order_details);
                        // $this->order_confirmed($orders);
            
                        // Toastr::Success('Your order has been successfully placed', '', ["positionClass" => "toast-top-right","progressBar" => "true"]);
                        return response()->json(['status'=>'success','msg'=>'Your Order Has been successfully Placed']);
                
            } else {
                return response()->json(['status'=>'error','msg'=>'Your Order has not been placed.Something went wrong, Please try again later.']);
            }
    
               
        } else {
            return response()->json(['status'=>'error','msg'=>'']);
        }
    } 
       
        
        
}

    public function print_invoice() {

        if(session()->has('ORDER_ID') && session()->has('ORDER_NEW_ID')){
            $order_id = session()->get('ORDER_ID');
            $order_new_id = session()->get('ORDER_NEW_ID');

            $orders = OrderDetail::where('order_id',$order_id)->get();
            // $amount = OrderDetail::where('order_id',$order_id)->get()->sum('price');
            $amount = OrderDetail::where('order_id',$order_id)->get()->sum('total_price');
            $orders_new = Order::where('order_no',$order_new_id)->first();

            // Toastr::Success('Your order has been successfully placed', '', ["positionClass" => "toast-top-right","progressBar" => "true"]);
            return view('frontend.order_invoice',compact('orders','orders_new','amount'))->with('successMsg','Your Order Has been successfully Placed');
        } else {
            return redirect('/');
        }
    }

    public function close_invoice() {
        session()->forget('ORDER_ID');
        session()->forget('ORDER_NEW_ID');
        session()->forget('GUEST_LOGIN');
        session()->forget('GUEST_ID');
        return redirect('/');
    }


    public function apply_coupon_code(Request $request)
    {
        $totalPrice=0;
	    $result=DB::table('coupons')  
		->where(['coupon_name'=>$request->coupon_code])
		->get();

        if(isset($result[0])){
            $value=$result[0]->coupon_amount;
            $type=$result[0]->coupon_types;
            $getAddToCartTotalItem = Cart::totalCarts();
            
            foreach($getAddToCartTotalItem as $list){
                // $totalPrice=$totalPrice+($list->quantity*$list->unit_price);
                $totalPrice=$totalPrice + ($list->total_price);
            }  
            if($result[0]->coupon_status==1){
                    $min_order_amt=$result[0]->min_order_amount;    
                    if($min_order_amt<=$totalPrice){
                        $status="success";
                        $msg="Coupon code applied";
                    }else{
                        $status="error";
                        $msg="Cart amount must be greater or equal  ৳$min_order_amt";
                    }
            }else{
                $status="error";
                $msg="Coupon code deactivated";   
            }
            
        }else{
            $status="error";
            $msg="Please enter valid coupon code";
        }
        
        $coupon_code_value=0;
        if($status=='success'){
            if($type== 1){
                $coupon_code_value=$value;
                $totalPrice=$totalPrice-$value;
            }if($type== 0){
                $newPrice=($value/100)*$totalPrice;
                $totalPrice=round(($totalPrice-$newPrice),2);
                $coupon_code_value=round($newPrice,2);
            }
        }
    
        return response()->json(['status'=>$status,'msg'=>$msg,'totalPrice'=>$totalPrice,'coupon_code_value'=>$coupon_code_value,'coupon_name'=>$request->coupon_code]);
    }


    public function checkout_done(Request $request)
    {
        // dd($request->all());
        // $this->validate($request,[
        //     'product_id'=>'required',
        //     'quantity'=>'required',
        //     'shipping_method'=>'required',
        //     'shipping_address'=>'required',
        //     'division'=>'required',
        //     'payment_method'=>'required',
            
        //   ]);

          $carts = Cart::where('user_id', Auth::user()->id)
                ->leftJoin('users', 'carts.user_id', '=', 'users.id')
                ->get();

                // dd($carts);

          



  
          $order = new Order();
          $time = substr(time(),-4);
          $order->order_no = '#'.rand(0000,9999).$time;
          $order->user_id = auth()->user()->id;
          $order->shipping_method = $request->shipping_method;
          $order->shipping_address = json_encode($request->shipping_address);
          $order->zilla = $request->division;
          $order->payment_type = $request->payment_method;
          $order->comments = $request->comments;
          $order->save();

          

          foreach ($carts as $key => $cartItem) {

            $order_detail = new OrderDetail;
                $order_detail->order_id = $order->order_no;
                $order_detail->seller_id = auth()->user()->id;
                $order_detail->product_id = $cartItem['product_id'];
                $order_detail->price = $cartItem['unit_price'] * $cartItem['quantity'];
                //End of storing shipping cost
                $order_detail->quantity = $cartItem['quantity'];
                $order_detail->save();



            
        }

          $orders = OrderDetail::where('order_id',$order->order_no)->get();
          $amount = OrderDetail::where('order_id',$order->order_no)->get()->sum('price');
          $orders_new = Order::where('order_no',$orders[0]->order_id)->first();

        //   dd($orders_new->shipping_method);

         

        //   dd($orders);

          
        DB::table('carts')->where(['user_id'=>Auth::user()->id])->delete();
        

        //   dd($order_details);
        // $this->order_confirmed($orders);

        // Toastr::Success('Your order has been successfully placed', '', ["positionClass" => "toast-top-right","progressBar" => "true"]);
        return view('frontend.order_confirmed',compact('orders','orders_new','amount'))->with('successMsg','Your Order Has been successfully Placed');

    }


    public function isOnline($site = "https://youtube.com"){
        if(@fopen($site, "r")){
            return true;
        }else{
            return false;
        }
    }
 

    public function order_confirmed($orders)
    {
        $orders = $orders;
        return view('frontend.order_confirmed',compact('orders'))->with('successMsg','Your Order Has been successfully Placed');
    }


    
}
