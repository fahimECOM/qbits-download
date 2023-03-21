<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Product;
use App\Models\ProductRegister;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\RawMetarial;
use App\Models\ProductSeries;
use App\Models\Ticket;
use App\Models\Conversation;
use App\Models\Product_Srial_Number;
use App\Models\ProductSerial;
use App\Models\Mail;
use App\Models\Action_History;
use App\Models\Shipment_Details;
use App\Models\ProductAttribute;
use Auth;
use DB;
use PDF;
use Crypt;
use Redirect;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.index');
    }


    public function dashboard()
    {
        if(Auth::user()->user_type == 'customer'){
            $data['id'] = Auth::user()->id;
            $data['customer'] = User::where('id',$data['id'])->get();
         
            return view('frontend.user.customer.profile',$data);
            // return view('frontend.user.customer.dashboard');
            // return view('admin.pages.dashboard.index');
        }
       
    }

    public function profile()
    {
        if(Auth::user()->user_type == 'customer'){
            $data['id'] = Auth::user()->id;
            $data['customer'] = User::where('id',$data['id'])->get();
        //  dd($data['customer']);
            return view('frontend.user.customer.profile',$data);
            // return view('admin.pages.dashboard.index');
        }
       
    }

    public function profileEdit()
    {
        if(Auth::user()->user_type == 'customer'){
            $data['id'] = Auth::user()->id;
            $data['editData'] = User::where('id',$data['id'])->get();
            // dd( $data['editData']);
            return view('frontend.user.customer.profileEdit',$data);
            // return view('admin.pages.dashboard.index');
        }
       
    }

    public function get_address_data(Request $request)
    {
        $html='';
        if($request->addressType == 'division'){
            $distArr = DB::table('address_details')->select('district')->where('division',$request->addressName)->distinct()->orderBy('district','ASC')->get();
            for($i = 0; $i < count($distArr); $i++){
                $dist = $distArr[$i]->district;
                $html.='<option value="'.$dist.'">'.$dist.'</option>';
            }
        }

        if($request->addressType == 'district'){
            $thanaArr = DB::table('address_details')->select('thana')->where('district',$request->addressName)->distinct()->orderBy('thana','ASC')->get();
            for($i = 0; $i < count($thanaArr); $i++){
                $thana = $thanaArr[$i]->thana;
                $html.='<option value="'.$thana.'">'.$thana.'</option>';
            }
        }

        return $html;
       
    }

    public function updateProfile(Request $request, $id) {
      $data = User::find($id);
    
      $data->save();

      return redirect()->route('user-profile')->with('successMsg','Product Successfully Updated');
    }


    // support Centers Admin


    // support Centers Customer
    public function orderNotFound(){
        
        return view('frontend.user.dashboard.supportCenters.tickets.noOrderMessage');
    }
    public function registerdProductList(){
        $data['customer'] = ProductRegister::orderBy('id', 'DESC')->get();
        return view('admin.layouts.supportCenters.productregistrationlist',$data);
    }

    public function overview()
    {
        if(Auth::user()->user_type == 'customer'){
        return view('frontend.user.dashboard.supportCenters.overview');
        }else{
        return view('admin.layouts.supportCenters.overview');
        }
    }
    public function ticketCreate()
    {
        if(Auth::user()->user_type == 'customer'){
            $id = Auth::user()->id;
            
            $data['products'] = OrderDetail::where('seller_id',$id)->get();
            $data['order'] = Order::where('user_id',$id)->first();
            $data['order_id'] = Order::where('user_id',$id)->get();
            
            if($data['order'] != ''){
                return view('frontend.user.dashboard.supportCenters.tickets.create',$data);
            }else{
                return view('frontend.user.dashboard.supportCenters.tickets.noOrderMessage');
            }

            }else{
            return view('admin.layouts.supportCenters.tickets.create');
            }
        
    }

    public function ticketList() {
        $data['list'] = Ticket::orderBy('id','desc')->get();
        
        if(Auth::user()->user_type == 'customer'){
            $data['id'] = Auth::user()->id ;
           
            $data['list'] = Ticket::where('user_id',$data['id'])->orderBy('id','desc')->get();
            return view('frontend.user.dashboard.supportCenters.tickets.list',$data);
            }else{
            return view('admin.layouts.supportCenters.tickets.list',$data);
            }
        
    }

    public function ticketView($id) {
        if(!User::hasPermission(["view_support_ticket","response_support_ticket"])){
            return redirect(url()->previous());
        }
        $data['Ticket'] = Ticket::find($id);
        $data['message'] = Conversation::where('Tracking_number',$data['Ticket']->Tracking_number)->get();
        return view('admin.layouts.supportCenters.tickets.userInfo',$data);
    }

    public function ticketEdit($id) {   
        $data['Ticket'] = Ticket::find($id); 
        $res = DB::table('conversations')->where('Tracking_number',$data['Ticket']->Tracking_number)->first();
        if($res != ''){
            $data['message'] = Conversation::where('Tracking_number',$data['Ticket']->Tracking_number)->get();
        }else{
            $data['message'] = '';
        }
        
        return view('frontend.user.dashboard.supportCenters.tickets.edit',$data);
    }

    public function statusUpdate(Request $request, $id) {   
        // $request->validate([
        //     't_image'=>'max:124',
        // ]);
        $data = Ticket::find($id);
        $data->status = $request->status; 
        $data->save();
        $email = Ticket::where('id',$data->id)->first()->email;
        $subject = Ticket::where('id',$data->id)->first()->subject;

        $ticket = new Conversation();
        $ticket->Tracking_number = $data->Tracking_number; 
        $ticket->user_id = $request->user_id; 
        $ticket->user_type = $request->user_type; 
        $ticket->status = $request->status; 
        $ticket->Conversation = $request->message;
        $image = array();
              if ($files = $request->t_image) {
                 
                  foreach ($files as $file) {
                      $image_name = md5(rand(1000, 10000));
                      # insert the image
                      $ext = strtolower($file->getClientOriginalExtension());
                      $image_full_name = $image_name. '.'.$ext;
                      $upload_path = 'backend/assets/images/TicketIssuImage/';
                      $image_url = $upload_path.$image_full_name;
                      $file->move($upload_path, $image_full_name);
                      $image[] = $image_url;
                    
                  }
      
              } else{
                $image_url = './avatar.png';
              }
              $ticket->photo = implode('|', $image); 
        $ticket->save();
        
        if($this->isOnline()){
            $mail_data = [
                'recipient' => env('MAIL_FOR_INFO'), //get email
                'Tracking' =>$data->Tracking_number,
                'fromEmail' => $email,
                'Qbits' => 'Qbits',
                'status' => $request->status,
                'fromName' => $request->name,
                'status' => $request->status,
                'subject' => $subject,
                'body'=>'you received a new sms'
 
            ];
        
            if($request->status == 'Close'){
                try {
                    \Mail::send('emails.ticket-close',$mail_data,function($message) use($mail_data){
                        $message->to($mail_data['fromEmail'])
                        ->from($mail_data['recipient'],$mail_data['Qbits'])              
                        ->subject($mail_data['subject']);
                    });
                } catch (\Exception $e) {
                    
                }
            }else{
                try {
                    \Mail::send('emails.user-conversation',$mail_data,function($message) use($mail_data){
                        $message->to($mail_data['fromEmail'])
                        ->from($mail_data['recipient'],$mail_data['Qbits'])              
                        ->subject($mail_data['subject']);
                    });
                } catch (\Exception $e) {
                    
                }
            }

            if(Auth::user()->user_type == 'customer'){
                return redirect()->route('support.ticket.list')->with('success','email sent');
            } else {
                return redirect()->route('admin.support.ticket.list')->with('success','email sent');
            }
            
         }else{
             return redirect()->back()->withInput()->with('error', 'Check your internet');
         }

         if(Auth::user()->user_type == 'customer'){
            return redirect()->route('support.ticket.list')->with('successMsg','Product Successfully Updated');
         } else {
            return redirect()->route('admin.support.ticket.list')->with('successMsg','Product Successfully Updated');
         }

    }

    public function isOnline($site = "https://youtube.com"){
        if(@fopen($site, "r")){
            return true;
        }else{
            return false;
        }
    }


    public function ticketUpdate(Request $request, $id) {
         // $request->validate([
        // 't_image' => 'max:510', //5MB 
        // ]);
        
        $data = Ticket::find($id);
        
        $ticket = new Conversation();
        $ticket->Tracking_number = $data->Tracking_number; 
        $ticket->user_id = $data->user_id; 
        $ticket->user_type = $request->user_type; 
        $ticket->status = $data->status; 
        $ticket->Conversation = $request->message;
        $image = array();
              if ($files = $request->t_image) {
                 
                  foreach ($files as $file) {
                      $image_name = md5(rand(1000, 10000));
                      # insert the image
                      $ext = strtolower($file->getClientOriginalExtension());
                      $image_full_name = $image_name. '.'.$ext;
                      $upload_path = 'backend/assets/images/TicketIssuImage/';
                      $image_url = $upload_path.$image_full_name;
                      $file->move($upload_path, $image_full_name);
                      $image[] = $image_url;
                    
                  }
      
              } else{
                $image_url = './avatar.png';
              }
              $ticket->photo = implode('|', $image);  
        $ticket->save();

        if(Auth::user()->user_type == 'customer'){
            return redirect()->route('support.ticket.list')->with('successMsg','Product Successfully Updated');
        } else {
            return redirect()->route('admin.support.ticket.list')->with('successMsg','Product Successfully Updated');  
        }
    }


    public function faq()
    {
        if(Auth::user()->user_type == 'customer'){
            return view('frontend.user.dashboard.supportCenters.faq');
            }else{
            return view('admin.layouts.supportCenters.faq');
            }
        
    }

    public function licenses()
    {
        if(Auth::user()->user_type == 'customer'){
            return view('frontend.user.dashboard.supportCenters.licenses');
            }else{
            return view('admin.layouts.supportCenters.licenses');
            }
        
    }

    public function contact()
    {
        if(Auth::user()->user_type == 'customer'){
            return view('frontend.user.dashboard.supportCenters.contact');
            }else{
            return view('admin.layouts.supportCenters.contact');
            }
        
    }

    public function ticketStore(Request $request){
        $res = DB::table('tickets')->first();
        if($res != ''){
            $number =  Ticket::orderBy('id','desc')->first()->id;
        }else{
            $number = 1;
        }
        
        $data = new Ticket();
        $data->Tracking_number = 'QBTN'.$number+1;
        $data->user_id = $request->user_id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->subject = $request->subject;
        $data->product_catagory = $request->product_catagory;
        $data->product_name = $request->product_name;
        $data->status = $request->status;
        $data->date =  date('Y-m-d',strtotime($request->date));
        $data->description = $request->description;
        $image = array();
  
          if ($files = $request->t_image) {
             
              foreach ($files as $file) {
                  $image_name = md5(rand(1000, 10000));
                  # insert the image
                  $ext = strtolower($file->getClientOriginalExtension());
                  $image_full_name = $image_name. '.'.$ext;
                  $upload_path = 'backend/assets/images/TicketIssuImage/';
                  $image_url = $upload_path.$image_full_name;
                  $file->move($upload_path, $image_full_name);
                  $image[] = $image_url;
                
              }
        
          }
          $data->photo = implode('|', $image);
       
        $data->save();

        if(Auth::user()->user_type == 'customer'){
            return redirect()->route('support.ticket.list');
        } else {
            return redirect()->route('admin.support.ticket.list'); 
        }
    }
// Sales

public function listing()
{
    if(Auth::user()->user_type == 'customer'){
        $id = Auth::user()->id;
        $order = Order::where('user_id',$id)->orderBy('id','desc')->get();
        return view('frontend.user.dashboard.sales.listing',compact('order'));

    }else{
        $order = Order::orderBy('id','desc')->get();
        return view('admin.layouts.sales.listing',compact('order'));
    }

}
public function invoice_listing()
{
        $order = Order::where('invoice','!=','')->orwhere('refund_request','Order Refunded')->orderBy('id','desc')->get();
        return view('admin.layouts.sales.invoice_listing',compact('order'));
}
public function invoice_pdf(Request $request, $id)
{ 

    if(!User::hasPermission(["view_pdf_invoice"])){
        return redirect(url()->previous());
    }

    $order_no = Order::where('id',$id)->first()->order_no;
    $order_info = Order::where('id',$id)->get();
    $invoice_details = OrderDetail::where('order_id',$order_no)->get();
    $pdf = PDF::loadView('admin.layouts.sales.pdf_invoice', ['invoice_details'=>$invoice_details, 'order_info'=>$order_info]);
    $pdf->setPaper('legal', 'potrait');
    return $pdf->stream();
}
public function refund_request()
{
        $order = Order::where('refund_request','Refund Pending')->orderBy('id','desc')->get();
        return view('admin.layouts.sales.refund_request',compact('order'));
}
public function orderAdd()
{
    return view('admin.layouts.sales.add-order');
}
public function orderEdit(){ 
    $id = Auth::user()->id;
    $data['orderData'] = Order::where('user_id',$id)->get();
 // $data['products'] = Product::orderBy('name','desc')->get();
    $data['products'] = Product::orderBy('name','desc')->get();

    return view('frontend.user.dashboard.sales.edit-order',$data);
}

//update single order details
public function update(Request $request, $id) {

      $order = Order::find($id);

      $orderDetails = OrderDetail::where('order_id',$request->order_id_no)->get();
    
      if(Auth::user()->user_type == 'customer'){
        $order->shipping_address = $request->address;
        $order->zilla = $request->zilla;
        $order->city = $request->city;
        $order->postal_code = $request->postal_code;
        $order->country = $request->country;
        $order->save();
        
      }else{
        if($order->delivery_status == 'processing' && $order->comments == 'delivery process'){
            $order->delivery_status = $request->delivery_status;
            $order->comments = '';
            $order->payment_status = 'paid';
            $order->save();

            foreach($orderDetails as $detail){
                OrderDetail::where('order_id', $request->order_id_no)->update(array('delivery_status' => $request->delivery_status, 'payment_status' => 'paid'));
            }

            //update shipment status
            Shipment_Details::where('invoice_number', $request->invoice_id)->update(array('shipping_status' => 'completed'));
            
        }else {
            $order->delivery_status = $request->delivery_status;  
            $order->comments = ''; 
            $order->invoice = $request->invoice_id;
            $date = date_create(date("Y-m-d H:i:s"),timezone_open("Asia/Dacca"));
            $order->invoice_date = date_format($date,"Y-m-d H:i:s");
            $order->save();

            foreach($orderDetails as $detail){
                OrderDetail::where('order_id', $request->order_id_no)->update(array('invoice_id' => $request->invoice_id, 'delivery_status' => $request->delivery_status, 'invoice_date' => date_format($date,"Y-m-d H:i:s")));
            }   
        }   
     }

     $userRole = User::where('id',$request->user_id)->select('user_type','name')->first();
     $data = new Action_History();
     $data->user_id = $request->user_id;
     $data->user_name = $userRole->name;
     $data->user_role = $userRole->user_type;
     $data->order_id = $request->order_id_no;
     $data->action_status = $request->delivery_status; 
     $data->save();

     if(Auth::user()->user_type == 'customer'){
        return redirect()->route('order.details',$id)->with('successMsg','Product Successfully Updated');
     } else {
        return redirect()->route('admin.order.details',$id)->with('successMsg','Product Successfully Updated');
     }
}

//get single order details
public function orderDetails($id) {   
    if(Auth::user()->user_type != 'customer'){
        if(!User::hasPermission(["view_sales_order","capture_cancel_sales_order"])){
            return redirect(url()->previous());
        }
    }

    $data['orderData'] = Order::find($id);
    $order_no= Order::where('id',$id)->first()->order_no;

    $data['products'] = Product::orderBy('name','desc')->get();
    $data['OrderDetail'] = OrderDetail::where('order_id',$order_no)->get();
    $data['OrderPrice'] = OrderDetail::where('order_id',$order_no)->sum('price');
    if(Auth::user()->user_type == 'customer'){
        return view('frontend.user.dashboard.sales.details',$data);
    }else{
        return view('admin.layouts.sales.details',$data);
    }
    
}

//order cancel request processed
public function order_canceled(Request $request) {

    $order_status = Order::where('order_no', $request->order_no)->where('user_id', $request->user_id)->select('delivery_status','product_serials')->first();

    if($order_status->delivery_status == 'pending'){
        $u_id = Auth::id();
        $userRole = User::where('id',$u_id)->select('user_type','name')->first();
        $action = new Action_History();
        $action->user_id = $u_id;
        $action->user_name = $userRole->name;
        $action->user_role = $userRole->user_type;
        $action->order_id = $request->order_no;
        $action->action_status = 'canceled'; 
        $action->save();
    }

    if($order_status->delivery_status == 'processing'){
        $u_id = Auth::id();
        $userRole = User::where('id',$u_id)->select('user_type','name')->first();
        $action = new Action_History();
        $action->user_id = $u_id;
        $action->user_name = $userRole->name;
        $action->user_role = $userRole->user_type;
        $action->order_id = $request->order_no;
        $action->action_status = 'canceled after captured'; 
        $action->save();
    }

    if($order_status->delivery_status != 'canceled'){

        if($order_status->product_serials == null) {
            //update order delivery status
            Order::where('order_no', $request->order_no)->where('user_id', $request->user_id)->update(array('delivery_status' => 'canceled'));
        } else {
            $all_products = Product_Srial_Number::where('order_no', $request->order_no)->where('user_id', $request->user_id)->get();
            foreach($all_products as $key => $product){
                Product_Srial_Number::where('order_no', $request->order_no)->where('user_id', $request->user_id)->update(array('status' => 0));
            }
            //update order delivery status
            Order::where('order_no', $request->order_no)->where('user_id', $request->user_id)->update(array('delivery_status' => 'canceled'));
        }
        

        //get all order details
        $order_details = OrderDetail::where('order_id',$request->order_no)->where('seller_id', $request->user_id)->get();
        foreach ($order_details as $key => $detail) {
            
            //update order details delivery status
            OrderDetail::where('id',$detail->id)->where('seller_id', $request->user_id)->update(array('delivery_status' => 'canceled'));

        }

        $user_role = User::where('id', $request->user_id)->select('user_type')->first();

        if($user_role->user_type != 'customer') {
            $order_date = date("d/m/Y",strtotime($request->order_date));
            //send email to customer
            if($this->isOnline()){
                $mail_data = [
                    'recipient' => env('MAIL_FOR_INFO'), //get email
                    'fromEmail' => $request->user_email,
                    'name' => $request->user_name,
                    'order' => $request->order_no,
                    'order_date' => $request->$order_date,
                    'subject'=> 'Order Has Been Canceled'

                ];
                try {
                    \Mail::send('emails.order-cancel',$mail_data,function($message) use($mail_data){
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


    

//refund confirm request processed here
public function refund_confirm(Request $request) {
    
    if($request->returnNote){
        $note = $request->returnNote;
    } else {
        $note = null;
    }

    //update order delivery status
    Order::where('order_no', $request->orderNo)->where('user_id', $request->userID)->update(array('refund_request' => 'Order Refunded', 'refund_type' => $request->refundType, 'product_return' => $request->productReturn, 'return_note' => $note, 'refund_amount' => $request->refundAmount));

    //post sell serial number status change
    if($request->productReturn == 'yes'){
        
        $all_products = Product_Srial_Number::where('order_no', $request->orderNo)->where('user_id', $request->userID)->get();
        foreach($all_products as $key => $product){
            Product_Srial_Number::where('order_no', $request->orderNo)->where('user_id', $request->userID)->update(array('status' => 0));
        }

        //update shipping status
        $orderDetails = Order::where('order_no',$request->orderNo)->where('user_id', $request->userID)->first();
        if($orderDetails) {
            if($orderDetails->delivery_status == 'processing' && $orderDetails->comments == 'delivery process'){
                Shipment_Details::where('invoice_number', $orderDetails->invoice)->update(array('shipping_status' => 'canceled'));
            }

            //product quantity updated
            $product_serials_str = str_replace( array( '[', ']', '"' ), '', $orderDetails->product_serials);
            $product_serials_str_arr = explode (",", $product_serials_str);
            if(count($product_serials_str_arr) > 0){
                foreach($product_serials_str_arr as $prod_serial) {
                    $detail = ProductSerial::where('prod_serial', $prod_serial)->first();
                    if($detail->flow_type == 'outflow'){
                        $detail->flow_type = 'inflow';
                        $detail->save(); 
                    }
                }
        
            }

            //bag quantity updated
            $all_bags_str = str_replace( array( '[', ']', '"' ), '', $orderDetails->bag_ids);
            if($all_bags_str == null) {
                $all_bags_str_arr = [];
            }else{
                $all_bags_str_arr = explode (",", $all_bags_str);
            }
            if(count($all_bags_str_arr) > 0){
                foreach($all_bags_str_arr as $bag) {
                    $product = Product::where('id', $bag)->first();
                    if($product){
                        $bag_updated_qty = $product->current_stock + 1;
                        $product->current_stock = $bag_updated_qty;
                        $product->save();
                    }  
                }
            }

            //keyboard quantity updated
            $all_keyboards_str = str_replace( array( '[', ']', '"' ), '', $orderDetails->keyboard_ids);
            if($all_keyboards_str == null) {
                $all_keyboards_str_arr = [];
            } else {
                $all_keyboards_str_arr = explode (",", $all_keyboards_str);
            }
            if(count($all_keyboards_str_arr) > 0){
                foreach($all_keyboards_str_arr as $keyboard) {
                    $product = Product::where('id', $keyboard)->first();
                    if($product){
                        $keyboard_updated_qty = $product->current_stock + 1;
                        $product->current_stock = $keyboard_updated_qty;
                        $product->save();
                    }  
                }
            }


            //get user info
            $userDetails = User::where('id', $request->userID)->first();
            if($userDetails){
                $u_name = $userDetails->name;
                $u_email = $userDetails->email;
            }

            if($this->isOnline()){
                $mail_data = [
                    'recipient' => env('MAIL_FOR_INFO'), //get email
                    'fromEmail' => $u_email,
                    'name' => $u_name,
                    'order' => $request->orderNo,
                    'orderId' => $request->orderId,
                    'subject'=> 'Shipment Has Been Canceled'
    
                ];
                try {
                    \Mail::send('emails.shipment-canceled',$mail_data,function($message) use($mail_data){
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

    /*
        //get all order details
        $order_details = OrderDetail::where('order_id',$request->orderNo)->where('seller_id', $request->userID)->get();
        foreach ($order_details as $key => $detail) {

            //get product current quantity
            $c_qty = DB::table('products')->where('id',$detail->product_id)->select('current_stock')->get();
            //get updated product quantity
            $u_qty = $c_qty[0]->current_stock + $detail->quantity;
            //updated product quantity into database
            DB::table('products')->where('id',$detail->product_id)->update(array('current_stock' => $u_qty));


            //updated bag quantity into database
            if($detail->bag_id){
                //get bag current quantity
                $c_bag_qty = DB::table('products')->where('id',$detail->bag_id)->select('current_stock')->get();
                //get updated bag quantity
                $u_bag_qty = $c_bag_qty[0]->current_stock + $detail->bag_quanity;
                //updated bag quantity into database
                DB::table('products')->where('id',$detail->bag_id)->update(array('current_stock' => $u_bag_qty));
            }

            //updated keyboard quantity into database
            if($detail->keyboard_id){
                //get keyboard current quantity
                $c_keyboard_qty = DB::table('products')->where('id',$detail->keyboard_id)->select('current_stock')->get();
                //get updated keyboard quantity
                $u_keyboard_qty = $c_keyboard_qty[0]->current_stock + $detail->keyboard_qty;
                //updated keyboard quantity into database
                DB::table('products')->where('id',$detail->keyboard_id)->update(array('current_stock' => $u_keyboard_qty));
            }

            //updated ram quantity into database
            if($detail->ram_id){
                //get ram current quantity
                $c_ram_qty = DB::table('products')->where('id',$detail->ram_id)->select('current_stock')->get();
                //get updated ram quantity
                $u_ram_qty = $c_ram_qty[0]->current_stock + $detail->ram_qty;
                //updated ram quantity into database
                DB::table('products')->where('id',$detail->ram_id)->update(array('current_stock' => $u_ram_qty));
            }

            //updated ssd quantity into database
            if($detail->ssd_id){
                //get ssd current quantity
                $c_ssd_qty = DB::table('products')->where('id',$detail->ssd_id)->select('current_stock')->get();
                //get updated ssd quantity
                $u_ssd_qty = $c_ssd_qty[0]->current_stock + $detail->ssd_qty;
                //updated ssd quantity into database
                DB::table('products')->where('id',$detail->ssd_id)->update(array('current_stock' => $u_ssd_qty));
            }
        }

        */
    }

    //send email to customer
    if($this->isOnline()){
        $mail_data = [
            'recipient' => env('MAIL_FOR_INFO'), //get email
            'fromEmail' => $request->userEmail,
            'name' => $request->userName,
            'order' => $request->orderNo,
            'amount' => $request->refundAmount,
            'subject'=> 'Your Order has been successfully refunded'

        ];
        try {
            \Mail::send('emails.order-refund',$mail_data,function($message) use($mail_data){
                $message->to($mail_data['fromEmail'])
                ->from($mail_data['recipient'],'Qbits Team')       
                ->subject($mail_data['subject']);
            });
        } catch (\Exception $e) {
            
        }

    }else{
        return redirect()->back()->withInput()->with('error', 'Check your internet');
    }

    $admin_id = Auth::id();
    $adminRole = User::where('id',$admin_id)->select('user_type','name')->first();
    $action = new Action_History();
    $action->user_id = $admin_id;
    $action->user_name = $adminRole->name;
    $action->user_role = $adminRole->user_type;
    $action->order_id = $request->orderNo;
    $action->action_status = 'Refund'; 
    $action->save();

    return response()->json(['status'=>'success']);

}



public function user_refund_request(Request $request) {
    $invoice_id = $request->invoice_no;
    $user_id = $request->user_id;
    $date = date('Y-m-d');
    if($invoice_id && $user_id) {
        //update refund status
        Order::where('invoice',$invoice_id)->where('user_id',$user_id)->update(array('refund_request' => 'Refund Pending', 'refund_request_date' => $date));

        //get user info
        $userDetails = User::where('id', $request->user_id)->first();
        if($userDetails){
            $u_name = $userDetails->name;
            $u_email = $userDetails->email;
        }
        if($this->isOnline()){
            $mail_data = [
                'recipient' => env('MAIL_FOR_INFO'), //get email
                'fromEmail' => $u_email,
                'name' => $u_name,
                'subject'=> 'On Refund Request'

            ];
            try {
                \Mail::send('emails.refund-request',$mail_data,function($message) use($mail_data){
                    $message->to($mail_data['fromEmail'])
                    ->from($mail_data['recipient'],'Qbits Team')              
                    ->subject($mail_data['subject']);
                });
            } catch (\Exception $e) {
                
            }

        }else{
            return redirect()->back()->withInput()->with('error', 'Check your internet');
        }
        return response()->json(['status'=>'success']);
    } else {
        return response()->json(['status'=>'error']);
    }

}

    public function buy(Request $request)
    {
       
        if($request->ajax() && isset($request->start)){
            $start = $request->start;
            $end = $request->end;
            $products = Product::where('sub_category','Sigma')->where('status','1')->whereBetween('unit_price', [$start, $end])->orderBy('unit_price','asc')->get();

             response()->json($products);
             return view("frontend.buy_price_search",compact('products'));
  

        }else if(isset($request->screen_size) ){
            $size = $request->screen_size;
            $products = Product::where('sub_category','Sigma')->where('status','1')->whereIn('screen_size', explode(',', $size) )->get();
            response()->json($products);
            return view("frontend.buy_price_search",compact('products'));
        }
        else if(isset($request->processor) ){
            $processor = $request->processor;
            $products = Product::where('sub_category','Sigma')->where('status','1')->whereIn('processor', explode(',', $processor) )->get();
            response()->json($products);
            return view("frontend.buy_price_search",compact('products'));
        }
        else if(isset($request->ram) ){
            $ram = $request->ram;
            $products = Product::where('sub_category','Sigma')->where('status','1')->whereIn('ram', explode(',', $ram) )->get();
            response()->json($products);
            return view("frontend.buy_price_search",compact('products'));
        }
        else if(isset($request->storage) ){
            $storage = $request->storage;
            $products = Product::where('sub_category','Sigma')->where('status','1')->whereIn('storage', explode(',', $storage) )->get();
            response()->json($products);
            return view("frontend.buy_price_search",compact('products'));
        }
        else{
            $max = Product::where('sub_category','Sigma')->max('unit_price');           
            $ram = Product::where('sub_category','Sigma')->select('ram')->groupBy('ram')->orderBy('ram','asc')->get('ram');
            $screen_size = Product::where('sub_category','Sigma')->select('screen_size')->groupBy('screen_size')->orderBy('screen_size','asc')->get('screen_size');
            $processor = Product::where('sub_category','Sigma')->select('processor')->groupBy('processor')->orderBy('processor','asc')->get('processor');
            $storage = Product::where('sub_category','Sigma')->select('storage')->groupBy('storage')->orderBy('storage','asc')->get('storage');          
            $products = Product::where('sub_category','Sigma')->where('status','1')->get();
            return view("frontend.buy",compact('products','max','ram','screen_size','processor','storage'));

        }


    }
    public function accessoriesbuy(Request $request)
    {
       
        if(isset($request->sub_categorys) ){

            $sub_category = $request->sub_categorys;
         
            $products = Product::where('category','Accessory')->where('status','1')->whereIn('sub_category', explode(',', $sub_category) )->where('unit_price', '!=',0)->get();
         
            response()->json($products);
            return view("frontend.accessories.accessoriesfilter",compact('products'));
        }
        else{
            $max = Product::where('sub_category','Sigma')->max('unit_price');           
            $ram = Product::where('sub_category','Sigma')->select('ram')->groupBy('ram')->orderBy('ram','asc')->get('ram');
            $screen_size = Product::where('sub_category','Sigma')->select('screen_size')->groupBy('screen_size')->orderBy('screen_size','asc')->get('screen_size');
            $sub_category = Product::where('category','Accessory')->select('sub_category')->groupBy('sub_category')->orderBy('sub_category','asc')->where('unit_price', '!=',0)->get('sub_category');
            $storage = Product::where('sub_category','Sigma')->select('storage')->groupBy('storage')->orderBy('storage','asc')->get('storage');          
            $products = Product::where('category','Accessory')->where('status','1')->where('unit_price', '!=',0)->get();
            // dd($screen_size);
            return view("frontend.accessories.accessoriesCategory",compact('products','max','ram','screen_size','storage','sub_category'));
        }


    }

    public function product_details($slug)
    {
   
        $products = Product::where('slug',$slug)->where('sub_category','Sigma')->first();
        $data['attributes']= ProductAttribute::orderBy('attribute_name','ASC')->get();

       $attributes= json_decode($products->attributes);

      
       $brand ='';
       $series ='';
       $processor ='';
       $ram ='';
       $model ='';
       $resolution ='';
       $storage ='';
       $graphics ='';
       $display ='';
       $display_type ='';
       $battery ='';
       $operating ='';
       $keyboard ='';
       $fingerprint ='';
       $networking ='';
       $bluetooth ='';
       $audio ='';
       $webcam ='';
       $ports ='';
       $viewing_angle ='';
       $backlight_type ='';
       $contrast_ratio ='';
       $wireless ='';
       $touchpad ='';
       $color ='';
       $weight ='';
       $warranty ='';
        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Brand'){
              
                $brand = $attributes[$i]->attribute_value;
            }
        }

        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Series'){
               
                $series = $attributes[$i]->attribute_value;
            }
        }
        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Processor'){
                $processor = $attributes[$i]->attribute_value;
            }
        }

        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Memory'){
                $ram = $attributes[$i]->attribute_value;
            }
        }
        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Model'){
               
                $model = $attributes[$i]->attribute_value;
            }
        }
        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Storage'){
                $storage = $attributes[$i]->attribute_value;
            }
        }

        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Graphics'){
                $graphics = $attributes[$i]->attribute_value;
            }
        }
        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Display'){
                $display = $attributes[$i]->attribute_value;
            }
        }
        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Display Type'){
                $display_type = $attributes[$i]->attribute_value;
            }
        }

        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Battery'){
                $battery = $attributes[$i]->attribute_value;
            }
        }
        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Operating System'){
                $operating = $attributes[$i]->attribute_value;
            }
        }

        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Keyboard'){
                $keyboard = $attributes[$i]->attribute_value;
            }
        }
        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Fingerprint Sensor'){
                $fingerprint = $attributes[$i]->attribute_value;
            }
        }

        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Networking'){
                $networking = $attributes[$i]->attribute_value;
            }
        }
        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Bluetooth'){
                $bluetooth = $attributes[$i]->attribute_value;
            }
        }
        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Resolution'){
                $resolution = $attributes[$i]->attribute_value;
            }
        }
        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Audio'){
                $audio = $attributes[$i]->attribute_value;
            }
        }
        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Camera'){
                $webcam = $attributes[$i]->attribute_value;
            }
        }

        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Ports & Connectors'){
                $ports = $attributes[$i]->attribute_value;
            }
        }

        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Color'){
                $color = $attributes[$i]->attribute_value;
            }
        }
        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Weight'){
                $weight = $attributes[$i]->attribute_value;
            }
        }

        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Warranty'){
                $warranty = $attributes[$i]->attribute_value;
            }
        }
        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Contrast Ratio'){
                $contrast_ratio = $attributes[$i]->attribute_value;
            }
        }
        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Viewing Angle'){
                $viewing_angle = $attributes[$i]->attribute_value;
            }
        }
        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Backlit Type'){
                $backlight_type = $attributes[$i]->attribute_value;
            }
        }
        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Wireless'){
                $wireless = $attributes[$i]->attribute_value;
            }
        }
        for($i = 0; $i < count($attributes); $i++){
            if($attributes[$i]->attribute_name == 'Touchpad'){
                $touchpad = $attributes[$i]->attribute_value;
            }
        }
        return view("frontend.product",compact('products','attributes','brand','series', 'model','resolution','viewing_angle','contrast_ratio','backlight_type','wireless','touchpad', 'display_type',
        'processor','ram','storage','graphics','display','battery','operating', 'keyboard','fingerprint','networking','bluetooth','audio','webcam','ports', 'color','weight','warranty'));
      

    }
    public function product_details_minipc($slug)
    {

        $products = Product::where('slug',$slug)->where('sub_category', 'Lania')->first();

       $attributes= json_decode($products->attributes);


       $brand ='';
       $series ='';
       $model ='';
       $processor ='';
       $ram ='';
       $storage ='';
       $graphics ='';
       $wireless ='';
       $battery ='';
       $operating ='';
       $keyboard ='';
       $fingerprint ='';
       $networking ='';
       $bluetooth ='';
       
       $audio ='';
       $touchpad ='';
       $webcam ='';
       $ports ='';
       $backlight_type ='';
       $color ='';
       $viewing_angle ='';
       $contrast_ratio ='';
       $wifi = '';
       $weight ='';
       $warranty ='';
       for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Brand'){
          
            $brand = $attributes[$i]->attribute_value;
        }
    }

    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Series'){
           
            $series = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Processor'){
            $processor = $attributes[$i]->attribute_value;
        }
    }

    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Memory'){
            $ram = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Storage'){
            $storage = $attributes[$i]->attribute_value;
        }
    }

    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Graphics'){
            $graphics = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Wireless'){
            $wireless = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Touchpad'){
            $touchpad = $attributes[$i]->attribute_value;
        }
    }

    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Battery'){
            $battery = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Operating System'){
            $operating = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Viewing Angle'){
            $viewing_angle = $attributes[$i]->attribute_value;
        }
    }

    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Keyboard'){
            $keyboard = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Fingerprint Sensor'){
            $fingerprint = $attributes[$i]->attribute_value;
        }
    }

    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Networking'){
            $networking = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Model'){
           
            $model = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Bluetooth'){
            $bluetooth = $attributes[$i]->attribute_value;
        }
    }

    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Audio'){
            $audio = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Camera'){
            $webcam = $attributes[$i]->attribute_value;
        }
    }

    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Ports & Connectors'){
            $ports = $attributes[$i]->attribute_value;
        }
    }

    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Color'){
            $color = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Wifi'){
           
            $wifi = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Contrast Ratio'){
            $contrast_ratio = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Backlit Type'){
            $backlight_type = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Weight'){
            $weight = $attributes[$i]->attribute_value;
        }
    }

    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Warranty'){
            $warranty = $attributes[$i]->attribute_value;
        }
    }

 
        return view("frontend.minipc.productDetails",compact('products','attributes','brand','model','series','backlight_type','contrast_ratio',
        'processor','ram','storage','graphics','wireless','touchpad', 'battery','operating','viewing_angle', 'keyboard','fingerprint','networking','bluetooth','audio','webcam','ports', 'color','weight','wifi', 'warranty'));
       
    }
    public function product_details1($slug)
    {

        $products = Product::where('slug',$slug)->where('category','Accessory')->first();
        $category =$products->category;

       $attributes= json_decode($products->attributes);


       $brand ='';
       $series ='';
       $model ='';
       $processor ='';
       $ram ='';
       $storage ='';
       $graphics ='';
       $display ='';
       $battery ='';
       $operating ='';
       $resolution ='';
       $keyboard ='';
       $fingerprint ='';
       $networking ='';
       $bluetooth ='';
       $audio ='';
       $webcam ='';
       $wifi = '';
       $ports ='';
       $color ='';
       $weight ='';
       $warranty ='';
       for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Brand'){
          
            $brand = $attributes[$i]->attribute_value;
        }
    }

    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Series'){
           
            $series = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Model'){
           
            $model = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Wifi'){
           
            $wifi = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Processor'){
            $processor = $attributes[$i]->attribute_value;
        }
    }

    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Memory'){
            $ram = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Storage'){
            $storage = $attributes[$i]->attribute_value;
        }
    }

    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Graphics'){
            $graphics = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Display'){
            $display = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Resolution'){
            $resolution = $attributes[$i]->attribute_value;
        }
    }

    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Battery'){
            $battery = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Operating System'){
            $operating = $attributes[$i]->attribute_value;
        }
    }

    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Keyboard'){
            $keyboard = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Fingerprint Sensor'){
            $fingerprint = $attributes[$i]->attribute_value;
        }
    }

    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Networking'){
            $networking = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Bluetooth'){
            $bluetooth = $attributes[$i]->attribute_value;
        }
    }

    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Audio'){
            $audio = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Camera'){
            $webcam = $attributes[$i]->attribute_value;
        }
    }

    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Ports and Connectors'){
            $ports = $attributes[$i]->attribute_value;
        }
    }

    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Color'){
            $color = $attributes[$i]->attribute_value;
        }
    }
    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Weight'){
            $weight = $attributes[$i]->attribute_value;
        }
    }

    for($i = 0; $i < count($attributes); $i++){
        if($attributes[$i]->attribute_name == 'Warranty'){
            $warranty = $attributes[$i]->attribute_value;
        }
    }

 
        return view("frontend.accessories.accessoriesDetails",compact('products','attributes','brand','series','model','resolution',
        'processor','ram','storage','graphics','display','battery','operating', 'keyboard','fingerprint','networking','bluetooth','audio','webcam','ports', 'color','weight','wifi','warranty'));
       
    }

    public function shopping_cart($id)
    {

        $products = Product::where('id',$id)->first();

        return view("frontend.shopping_cart",compact('products'));
        // dd($id);

    }

    public function cart_login(Request $request)
    {
        // dd($request->all());
        $user = User::whereIn('user_type', ['customer', 'seller'])->where('email', $request->email)->orWhere('phone', $request->email)->first();

       

        if($user != null){


            if(Hash::check($request->pwd, $user->password)){

                 auth()->login($user, true);
                // dd($user->id);
                $tempId = $request->session()->get('USER_CART_TEMP_ID');
                $carts = Cart::where('temp_session_id', $tempId)
                ->where('order_id', NULL)
                ->get();
                // $carts = Cart::where('ip_address', $tempId)
                // ->where('order_id', NULL)
                // ->get();

                DB::table('carts')->where('temp_session_id', $tempId)->update(array('user_id' => $user->id));
                // DB::table('carts')->where('ip_address', request()->ip())->update(array('user_id' => $user->id));

                // Toastr::Success('Login Successfully and Continue', '', ["positionClass" => "toast-top-right","progressBar" => "true"]);

                return view("frontend.checkout_process");

                // dd("You are logged in");
                // if($request->has('remember')){
                //     auth()->login($user, true);
                // }
                // else{
                //     auth()->login($user, false);
                // }

                // dd(Auth::check());

            }
            else {
                dd('Hello');
            }
        }
        return back;
    }

    public function cart_regi(Request $request){
        // dd($request->all());

        // $this->validate($request,[
        //     'f_name'=>['required', 'string', 'max:255'],
        //     'l_name'=>['required', 'string', 'max:255'],
        //     'email'=>['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'phone'=>['required', 'max:13', 'min:8', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        //     'password_confirmation' => ['required', 'string', 'min:8', 'confirmed'],
        //   ]);

        
        //   DB::table('useres')
        //     ->where(['user_id'=>$uid])
        //     ->where(['user_type'=>$user_type])
        //     ->get();
        //   dd($data);
        //   if($data['useremail']){
        //     return view('frontend.checkout_process',$data);
        //   } else{
        //     $data['useremail'] = "New Email";
        //     return view('frontend.checkout_process',$data);
        //   }

        //   $user = new User();
        //   $user->name = $request->f_name;
        //   $user->lname = $request->l_name;
        //   $user->email = $request->email;
        //   $user->phone = $request->phone;
        //   $user->address = $request->address;
        //   $user->password  = Hash::make($request->password);

        //   $user->save();

        //   if($user){


        //     if(Hash::check($request->password, $user->password)){

        //          auth()->login($user, true);
        //         // dd($user->id);

        //         $carts = Cart::where('ip_address', request()->ip())
        //         ->where('order_id', NULL)
        //         ->get();

        //         DB::table('carts')->where('ip_address', request()->ip())->update(array('user_id' => $user->id)); 


        //         Toastr::Success('Customer Registration Successfully and Continue', '', ["positionClass" => "toast-top-right","progressBar" => "true"]);

        //         return view("frontend.checkout_process");

        //         // dd("You are logged in");
        //         // if($request->has('remember')){
        //         //     auth()->login($user, true);
        //         // }
        //         // else{
        //         //     auth()->login($user, false);
        //         // }

        //         // dd(Auth::check());

        //     }
        //     else {
        //         dd('Hello');
        //     }
        // }


        
      
    }


    public function customer_update_profile(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        $user->name = $request->first_name;
        $user->lname = $request->last_name;
        // $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->division = $request->division;
        $user->district = $request->district;
        $user->thana = $request->thana;
        $user->postal_code = $request->postal_code;
        $user->save();
        if($request->new_password != null && ($request->new_password == $request->confirm_password)){
            $user->password = Hash::make($request->new_password);
        }

   

        if ($single_image=$request->avatar) {

            $destinationPath = 'backend/assets/images/products/single_image/';

            $profileImage = date('YmdHis') . "." . $single_image->getClientOriginalExtension();

            $image_url = $destinationPath.$profileImage;

            $single_image->move($destinationPath, $profileImage);
            $user->avatar = $image_url;
        }

          if($user->save()){
            // Toastr::Success('Customer Updated Successfully', '', ["positionClass" => "toast-top-right","progressBar" => "true"]);
            return redirect()->route('dashboard');
        }

    }

    public function search(Request $request)
    {

        // dd($request->all());

       $search = $request->search;
        $search_products = Product::orWhere('description','like','%'.$search.'%')
        ->orWhere('slug','like','%'.$search.'%')
        ->orWhere('name','like','%'.$search.'%')
        ->orWhere('unit_price','like','%'.$search.'%')
        ->orderBy('id','DESC')
        ->paginate(9);
        return view('frontend.search',compact('search','search_products'));
    }

    public function generateUserInvoice($id)
    {
        
        $order = Order::where('order_no',$id)->get('order_no');
        $order_no = $order[0]->order_no;
        $order_info = Order::where('order_no',$order_no)->get();
        $invoice_details = OrderDetail::where('order_id',$order_no)->get();
        $pdf = PDF::loadView('frontend.pdf.pdf_order',['invoice_details'=>$invoice_details, 'order_info'=>$order_info, 'order_no'=>$order_no]);
        $pdf->setPaper('legal', 'potrait');
        return $pdf->stream();
    }

    public function back()
    {
        return redirect()->route('dashboard');
    }

    public function getProduct(Request $request){
        $inid = $request->post('inid'); 

        $product = OrderDetail::with(['product'])->where('order_id',$inid)->get();
        $datatableselected = OrderDetail::with(['product'])->where('order_id',$inid)->first();
        
        if($datatableselected==''){
            $product = ProductRegister::with(['productname'])->where('serial_no',$inid)->get();
            $html='<option value="">Select ...</option>';
            foreach($product as $name){
                $html.='<option value="'.$name['productname']['name'].'" selected>'.$name['productname']['name'].'</option>';
            }
        }else{
            $product = OrderDetail::with(['product'])->where('order_id',$inid)->get();
            $html='<option value="">Select ...</option>';
            foreach($product as $name){
                $html.='<option value="'.$name['product']['name'].'" selected>'.$name['product']['name'].'</option>';
            }
           
        }
        echo $html;

      }

    public function getOrderno(Request $request){
       

         $inid = $request->post('inid');

         if($inid=="OrderNo"){
            $id = Auth::user()->id;
            $ticket_catagory = Order::where('user_id',$id)->get();
            $html='<option value="">Select ...</option>';
            foreach($ticket_catagory as $name){
                $html.='<option value="'.$name->order_no.'" >'.$name->order_no.'</option>';
            }
         }elseif($inid=="ProductSerialNo"){
            $id = Auth::user()->email;
            $ticket_catagory = ProductRegister::where('email',$id)->get();
            $html='<option value="">Select ...</option>';
            foreach($ticket_catagory as $name){
                $html.='<option value="'.$name->serial_no.'" >'.$name->serial_no.'</option>';
            }
         }
        // $product = OrderDetail::with(['product'])->where('order_id',$inid)->get();

        echo $html;

    }
    public function getmodel(Request $request){     
         $inid = $request->post('inid');
         $series_id = ProductSeries::where('series',$inid)->get('id');
         if($series_id[0]->id=="1"){
            $models = RawMetarial::where('series_id',$series_id[0]->id)->get();
            $html='<option value="">Select Model</option>';
            foreach($models as $name){
                $html.='<option value="'.$name->model.'" >'.$name->model.'</option>';
            }
         }elseif($series_id[0]->id=="2"){
            $models = RawMetarial::where('series_id',$series_id[0]->id)->get();
            $html='<option value="">Select Model</option>';
            foreach($models as $name){
                $html.='<option value="'.$name->model.'" >'.$name->model.'</option>';
            }
         }
        echo $html;

    }
    public function getcategory(Request $request){
         $inid = $request->post('inid');
         $categorys = ProductSeries::where('category',$inid)->get('series');
         $html='<option value="">Select Series</option>';
         foreach($categorys as $category){
             $html.='<option value="'.$category->series.'" >'.$category->series.'</option>';
         }
               
      
        echo $html;

    }
    public function getprocessor(Request $request){
         $inid = $request->post('inid');
         $processor = RawMetarial::where('model',$inid)->get('processor');
         $html='<input type="text" name="bb_processor" id="select-barebone-processor"
         class="form-control form-control-solid" value="'.$processor[0]->processor.'" readonly>
        ';      
        echo $html;
    }
    public function getProductprocessor(Request $request){
         $inid = $request->post('inid');
         $processor = RawMetarial::where('model',$inid)->get('processor');
         $html='<input type="text" name="processor" id="product-processor"
         class="form-control form-control-solid" value="Intel® Core™ '.$processor[0]->processor.'" readonly>
        ';      
        echo $html;
    }
    
    public function view_signin(Request $request){
        
        $prev_url_Arr = explode('/', url()->previous());
        $redirect_dashboard = '';
        if($request->redirect_dashboard){
            $redirect_dashboard = $request->redirect_dashboard;
        } else if($prev_url_Arr[3] == 'product' && $prev_url_Arr[4] == 'registration'){
            if(isset($prev_url_Arr[4])){
                if($prev_url_Arr[4] == 'registration') {
                    $redirect_dashboard = 'dashboard';
                }
            }
        }
      
        
        // dd(Auth::user());
        $user_login = session()->get('USER_LOGIN');
        $admin_login = session()->get('ADMIN_LOGIN');
        if(Auth::user() != null){
            if(Auth::user()->user_type == 'customer' && Auth::user()->user_type_status == 'reg' && $user_login == null){
                Auth::logout();
                Redirect::setIntendedUrl(url()->previous());
                return view("frontend.signin_new",compact('redirect_dashboard'));
            } else if((Auth::user()->user_type == 'super_admin' || Auth::user()->user_type == 'admin') && Auth::user()->user_type_status == 'reg' && $admin_login == null){
                Auth::logout();
                Redirect::setIntendedUrl(url()->previous());
                return view("frontend.signin_new",compact('redirect_dashboard'));
            } else if(Auth::user()->user_type == 'customer' && Auth::user()->user_type_status == 'reg' && $user_login != null){
                return redirect('/dashboard');
            } else if((Auth::user()->user_type == 'super_admin' || Auth::user()->user_type == 'admin') && Auth::user()->user_type_status == 'reg' && $admin_login != null){
                return redirect('/admin/dashboard');
            }
        } else{
            Redirect::setIntendedUrl(url()->previous());
            return view("frontend.signin_new",compact('redirect_dashboard')); 
        }
    }

    public function login_process(Request $request){
        
        $dashboard_redirect = $request->dashboard_redirect;
        if($dashboard_redirect){
            $request->session()->put('DASHBOARD_REDIRECT',$dashboard_redirect);
        }
        $user = User::where('email', $request->email)->where('user_type_status','reg')->orWhere('phone', $request->email)->first();

        // $result=DB::table('users')  
        //     ->where(['email'=>$request->email])
        //     ->get();
        if($user != null){

            if(Hash::check($request->password, $user->password)){
                if($user->status == 1){
                    $is_verify=$user->email_verified;
                    if($is_verify){
                        if($request->rememberme===null){
                            setcookie('login_email',$request->email,100);
                            setcookie('login_pwd',$request->password,100);
                        }else{
                        setcookie('login_email',$request->email,time()+60*60*24*100);
                        setcookie('login_pwd',$request->password,time()+60*60*24*100);
                        }

                        auth()->login($user, true);

                        $tempId = $request->session()->get('USER_CART_TEMP_ID');
                        $carts = Cart::where('temp_session_id', $tempId)
                    ->where('order_id', NULL)
                    ->get();
                    //     $carts = Cart::where('ip_address', request()->ip())
                    //    ->where('order_id', NULL)
                    //    ->get();
                        if($user->role_as > 0){
                            if($carts){
                                DB::table('carts')->where(['temp_session_id'=>$tempId])->delete();
                            }


                            //demo. remove when logout & middleware fixed.
                            // if($request->session()->has('USER_LOGIN')){
                            //     $request->session()->forget('USER_LOGIN');
                            // }


                            $request->session()->put('ADMIN_LOGIN',true);
                            // $request->session()->put('USER_ID',$user->id);
                            // $request->session()->put('USER_NAME',$user->name);
                            // Toastr::Success('Login Successfully and Continue', '', ["positionClass" => "toast-top-right","progressBar" => "true"]);
                            return response()->json(['status'=>'success','msg'=>'','user_type'=>'admin']);
                        } else {
                            if($carts) {
                                DB::table('carts')->where('temp_session_id', $tempId)->update(array('user_id' => $user->id)); 
                            }
                            
                            //demo. remove when logout & middleware fixed.
                            // if($request->session()->has('ADMIN_LOGIN')){
                            //     $request->session()->forget('ADMIN_LOGIN');
                            // }


                            $request->session()->put('USER_LOGIN',true);
                        //    $request->session()->put('USER_ID',$user->id);
                        //    $request->session()->put('USER_NAME',$user->name);
        
                            // Toastr::Success('Login Successfully and Continue', '', ["positionClass" => "toast-top-right","progressBar" => "true"]);
                            return response()->json(['status'=>'success','msg'=>'','user_type'=>'customer']);
                        }

                    }else{
                    $request->session()->put('USER_ID',$user->id);
                    $request->session()->put('USER_EMAIL',$request->email);
                    $request->session()->put('FIELD_NAME','Login');
                    $rand_code=rand(111111,999999);
                    DB::table('users')->where('id',$user->id )->update(array('verification_code' => $rand_code));
                    if($this->isOnline()){
                            $mail_data = [
                                'recipient' => env('MAIL_FOR_INFO'), //get email
                                'verification_code' =>$rand_code,
                                'fromEmail' => $request->email,
                                'fromName' => $request->name,
                                'body'=>$request->message,
                                'subject'=> 'Verification Code'
                
                            ];
                            try {
                                \Mail::send('emails.verification-code',$mail_data,function($message) use($mail_data){
                                    $message->to($mail_data['fromEmail'])
                                    ->from($mail_data['recipient'],'Qbits')              
                                    ->subject($mail_data['subject']);
                                });
                            } catch (\Exception $e) {
                    
                            }
                        
                            }else{
                                return redirect()->back()->withInput()->with('error', 'Check your internet');
                            }
                    return response()->json(['status'=>'error','msg'=>'','type'=>'verify_err','u_email'=>$request->email]);
                    }
                } else if($user->status == 2) {
                    return response()->json(['status'=>'error','msg'=>'This account is already removed!','type'=>'account_remove']);
                    
                } else if($user->status == 0) {
                    return response()->json(['status'=>'error','msg'=>'This account is currently diactivated!','type'=>'account_diactivate']);
                }
                
            }else {
                return response()->json(['status'=>'error','msg'=>'Please give correct password.', 'type' => 'pass_err']);
            } 
        }else{
            return response()->json(['status'=>'error','msg'=>'This email is not registered.','type'=>'email_err']);
        }
       return back;

    }
    

    public function guest_submit (Request $request){
        $guestUser = User::where('email',$request->g_email)->first();
        $tempId = $request->session()->get('USER_CART_TEMP_ID');
        $carts = Cart::where('temp_session_id', $tempId)
                    ->where('order_id', NULL)
                    ->get();
        // $carts = Cart::where('ip_address', request()->ip())
        //             ->where('order_id', NULL)
        //             ->get();
        if($guestUser){
            $isRegistered = User::where('email',$request->g_email)->where('user_type_status','reg')->first();
            if($isRegistered){
                return response()->json(['status'=>'error']);
            } else {
                $guestData = User::where('email',$request->g_email)->where('user_type_status','non-reg')->get();
                DB::table('users')->where('email', $request->g_email)->update(array('name' => $request->g_name, 'phone' => $request->g_phone, 'email_verified' => 0));
                $userId = $guestData[0]->id;
                $request->session()->put('GUEST_ID',$userId);
                $request->session()->put('GUEST_LOGIN',true);
                $request->session()->put('GUEST_EMAIL',$request->g_email);
                if($carts) {
                    DB::table('carts')->where('temp_session_id', $tempId)->update(array('user_id' => $userId));
                    // DB::table('carts')->where('ip_address', request()->ip())->update(array('user_id' => $userId));
                }
                return response()->json(['status'=>'success']);
            }
        } else {
            $rand_code=rand(111111,999999);
            $user = new User();
            $user->name = $request->g_name;
            $user->email= $request->g_email;
            $user->user_type_status= 'non-reg';
            $user->phone = $request->g_phone;
            $user->password = Hash::make($rand_code);
            $user->save();
            $userId = $user->id;
            $request->session()->put('GUEST_ID',$userId);
            $request->session()->put('GUEST_LOGIN',true);
            $request->session()->put('GUEST_EMAIL',$request->g_email);
            if($carts) {
                DB::table('carts')->where('temp_session_id', $tempId)->update(array('user_id' => $userId)); 
                // DB::table('carts')->where('ip_address', request()->ip())->update(array('user_id' => $userId)); 
            }
            return response()->json(['status'=>'success']);
        }
    }


    public function reg_submit (Request $request){
        
        $data['email']= $request->email;
        
        $data['useremail']  = User::where('email',$data['email'])->first('email');
        

        if($data['useremail'] != ''){
            $guestUser = User::where('email',$request->email)->where('user_type_status','non-reg')->first();
            if($guestUser){
                $guestData = User::where('email',$request->email)->where('user_type_status','non-reg')->get();
                $rand_code=rand(111111,999999);
                $phone = '';
                $pw = Hash::make($request->password);
                if($request->phone){
                    $phone = $request->phone;
                }
                DB::table('users')->where('email', $request->email)->update(array('name' => $request->name, 'user_type_status' => 'reg', 'phone' => $phone,'password' => $pw,'verification_code' => $rand_code));

                if($this->isOnline()){
                    $mail_data = [
                        'recipient' => env('MAIL_FOR_INFO'), //get email
                        'verification_code' =>$rand_code,
                        'fromEmail' => $request->email,
                        'fromName' => $request->name,
                        'subject'=> 'Verification Code'
         
                    ];
                    try {
                        \Mail::send('emails.verification-code',$mail_data,function($message) use($mail_data){
                            $message->to($mail_data['fromEmail'])
                            ->from($mail_data['recipient'],'Qbits')              
                            ->subject($mail_data['subject']);
                        });
                    } catch (\Exception $e) {
            
                    }
                 }else{
                     return redirect()->back()->withInput()->with('error', 'Check your internet');
                 }
                 $userId = $guestData[0]->id;
                 $request->session()->forget('USER_ID');
                 $request->session()->forget('USER_EMAIL');
                 $request->session()->put('USER_ID',$userId);
                 $request->session()->put('USER_EMAIL',$request->email);
                 return response()->json(['status'=>'success','u_email'=>$request->email]);
            } else{
                return response()->json(['status'=>'error','msg'=>'You Alreday have an account.Please Login']);
            }
        } else {
            $rand_code=rand(111111,999999);
            $user = new User();
            $user->name = $request->name;
            $user->email= $request->email;
            if($request->phone){
                $user->phone = $request->phone;
            } 
            $user->password = Hash::make($request->password);
            $user->verification_code = $rand_code;
            $user->save();
            if($this->isOnline()){
                $mail_data = [
                    'recipient' => env('MAIL_FOR_INFO'), //get email
                    'verification_code' =>$user->verification_code,
                    'fromEmail' => $request->email,
                    'fromName' => $request->name,
                    'subject'=> 'Verification Code'
     
                ];
                try {
                    \Mail::send('emails.verification-code',$mail_data,function($message) use($mail_data){
                        $message->to($mail_data['fromEmail'])
                        ->from($mail_data['recipient'],'Qbits')              
                        ->subject($mail_data['subject']);
                    });
                } catch (\Exception $e) {
        
                }
             }else{
                 return redirect()->back()->withInput()->with('error', 'Check your internet');
             }
            $userId = $user->id;
            $request->session()->forget('USER_ID');
            $request->session()->forget('USER_EMAIL');
            $request->session()->put('USER_ID',$userId);
            $request->session()->put('USER_EMAIL',$request->email);
            return response()->json(['status'=>'success','u_email'=>$request->email]);
        }
      }

      public function login_submit (Request $request){

        // dd($request->all());
        $user = User::where('email', $request->email)->where('user_type_status','reg')->orWhere('phone', $request->email)->first();
        $tempId = $request->session()->get('USER_CART_TEMP_ID');
       

        if($user != null){

            if(Hash::check($request->password, $user->password)){
                if($user->status == 1){
                    $isVerify = $user->email_verified;
                    if($isVerify){
                        auth()->login($user, true);
                        // dd($user->id);

                        $carts = Cart::where('temp_session_id', $tempId)
                        ->where('order_id', NULL)
                        ->get();

                        // $carts = Cart::where('ip_address', request()->ip())
                        // ->where('order_id', NULL)
                        // ->get();

                        if($user->role_as == 1){
                            if($carts){
                                DB::table('carts')->where(['temp_session_id'=>$tempId])->delete();
                                // DB::table('carts')->where(['ip_address'=>request()->ip()])->delete();
                            }

                            //demo. remove when logout & middleware fixed.
                            // if($request->session()->has('USER_LOGIN')){
                            //     $request->session()->forget('USER_LOGIN');
                            // }


                            $request->session()->put('ADMIN_LOGIN',true);
                            // $request->session()->put('USER_ID',$user->id);
                            // $request->session()->put('USER_NAME',$user->name);
                            // Toastr::Success('Login Successfully and Continue', '', ["positionClass" => "toast-top-right","progressBar" => "true"]);
                            return response()->json(['status'=>'success','msg'=>'','user_type'=>'admin']);
                        } else {
                            if($carts) {
                                DB::table('carts')->where('temp_session_id', $tempId)->update(array('user_id' => $user->id)); 
                                // DB::table('carts')->where('ip_address', request()->ip())->update(array('user_id' => $user->id)); 
                            }
        
                            //demo. remove when logout & middleware fixed.
                            // if($request->session()->has('ADMIN_LOGIN')){
                            //     $request->session()->forget('ADMIN_LOGIN');
                            // }


                            $request->session()->put('USER_LOGIN',true);
                            //    $request->session()->put('USER_ID',$user->id);
                            //    $request->session()->put('USER_NAME',$user->name);
                            DB::table('carts')->where('temp_session_id', $tempId)->update(array('user_id' => $user->id));
                            // DB::table('carts')->where('ip_address', request()->ip())->update(array('user_id' => $user->id));
                            // Toastr::Success('Login Successfully and Continue', '', ["positionClass" => "toast-top-right","progressBar" => "true"]);
                            return response()->json(['status'=>'success','msg'=>'','user_type'=>'customer']);
                        }

                        // dd("You are logged in");
                        // if($request->has('remember')){
                        //     auth()->login($user, true);
                        // }
                        // else{
                        //     auth()->login($user, false);
                        // }

                        // dd(Auth::check());
                    }else{
                        $request->session()->put('USER_ID',$user->id);
                        $request->session()->put('USER_EMAIL',$request->email);
                        $request->session()->put('FIELD_NAME','Login');
                        $rand_code=rand(111111,999999);
                        DB::table('users')->where('id',$user->id )->update(array('verification_code' => $rand_code));
                        if($this->isOnline()){
                            $mail_data = [
                                'recipient' => env('MAIL_FOR_INFO'), //get email
                                'verification_code' =>$rand_code,
                                'fromEmail' => $request->email,
                                'fromName' => $request->name,
                                'body'=>$request->message,
                                'subject'=> 'Verification Code'
                
                            ];
                            try {
                                \Mail::send('emails.verification-code',$mail_data,function($message) use($mail_data){
                                    $message->to($mail_data['fromEmail'])
                                    ->from($mail_data['recipient'],'Qbits')              
                                    ->subject($mail_data['subject']);
                                });
                            } catch (\Exception $e) {
                    
                            }                    
                        }else{
                            return redirect()->back()->withInput()->with('error', 'Check your internet');
                        }
                        return response()->json(['status'=>'error','msg'=>'','type'=>'verify_err','u_email'=>$request->email]);
                    }
                } else if($user->status == 2) {
                    return response()->json(['status'=>'error','msg'=>'This account is already removed!','type'=>'account_remove']);
                } else if($user->status == 0) {
                    return response()->json(['status'=>'error','msg'=>'This account is currently diactivated!','type'=>'account_diactivate']);
                }
                

            }
            else {
                return response()->json(['status'=>'error','msg'=>'Please give correct password.','type'=>'pass_err']);
            }
        } else{
            return response()->json(['status'=>'error','msg'=>'Please give correct email.','type'=>'email_err']);
        }
        return back;

      }



      public function code_submit(Request $request){
        
        if($request->session()->has('USER_ID')){
            $uid=$request->session()->get('USER_ID');
            $u_email=$request->session()->get('USER_EMAIL');
            $tempId = $request->session()->get('USER_CART_TEMP_ID');
            // $data  = User::where('id',$uid)->get();
            $user = User::where('email', $u_email)->orWhere('phone', $u_email)->first();
            if($user->verification_code == $request->verify_code){
                auth()->login($user, true);
                // dd($user->id);

                $carts = Cart::where('temp_session_id', $tempId)
                ->where('order_id', NULL)
                ->get();

                // $carts = Cart::where('ip_address', request()->ip())
                // ->where('order_id', NULL)
                // ->get();

                if($user->role_as == 1){
                    if($carts){
                        DB::table('carts')->where(['temp_session_id'=>$tempId])->delete();
                        // DB::table('carts')->where(['ip_address'=>request()->ip()])->delete();
                    }

                    
                    //demo. remove when logout & middleware fixed.
                    // if($request->session()->has('USER_LOGIN')){
                    //     $request->session()->forget('USER_LOGIN');
                    // }


                    $request->session()->put('ADMIN_LOGIN',true);
                    // $request->session()->put('USER_ID',$user->id);
                    // $request->session()->put('USER_NAME',$user->name);
                    DB::table('users')->where('id',$uid )->update(array('email_verified' => 1, 'verification_code' => "")); 
                    $request->session()->forget('USER_ID');
                    $request->session()->forget('USER_EMAIL');
                    if($request->session()->has('FIELD_NAME')){
                        // Toastr::Success('Login Successfully and Continue', '', ["positionClass" => "toast-top-right","progressBar" => "true"]);
                        $request->session()->forget('FIELD_NAME');
                    } else {
                        // Toastr::Success('Registration Successfully and Continue', '', ["positionClass" => "toast-top-right","progressBar" => "true"]);
                    }
                    return response()->json(['status'=>'success','msg'=>'','user_type'=>'admin']);
                }else{

                    if($carts){
                        DB::table('carts')->where('temp_session_id', $tempId)->update(array('user_id' => $user->id));
                        // DB::table('carts')->where('ip_address', request()->ip())->update(array('user_id' => $user->id));
                    }

                    //demo. remove when logout & middleware fixed.
                    // if($request->session()->has('ADMIN_LOGIN')){
                    //     $request->session()->forget('ADMIN_LOGIN');
                    // }

                    
                    $request->session()->put('USER_LOGIN',true);
                    DB::table('users')->where('id',$uid )->update(array('email_verified' => 1, 'verification_code' => "")); 
                    $request->session()->forget('USER_ID');
                    $request->session()->forget('USER_EMAIL');
    
                    if($request->session()->has('FIELD_NAME')){
                        // Toastr::Success('Login Successfully and Continue', '', ["positionClass" => "toast-top-right","progressBar" => "true"]);
                        $request->session()->forget('FIELD_NAME');
                    } else {
                        // Toastr::Success('Registration Successfully and Continue', '', ["positionClass" => "toast-top-right","progressBar" => "true"]);
                    }
                    return response()->json(['status'=>'success','msg'=>'','user_type'=>'customer']);
                }              
                
            }else{
                return response()->json(['status'=>'error','msg'=>'Please give a valid code.']);  
            }
        } else {

        }
        return back;  
      }


      public function forget_email_submit(Request $request){
        
        $user = User::where('email', $request->f_email)->where('user_type_status','reg')->orWhere('phone', $request->f_email)->first();

        if($user != null){
            $request->session()->put('FORGET_USER_EMAIL',$request->f_email);
            $rand_code=rand(111111,999999);
                    DB::table('users')->where('email',$request->f_email )->update(array('verification_code' => $rand_code));
                    if($this->isOnline()){
                        $mail_data = [
                            'recipient' => env('MAIL_FOR_INFO'), //get email
                            'verification_code' =>$rand_code,
                            'fromEmail' => $request->f_email,
                            'subject'=> 'Verification Code'
             
                        ];
                        try {
                            \Mail::send('emails.verification-code',$mail_data,function($message) use($mail_data){
                                $message->to($mail_data['fromEmail'])
                                ->from($mail_data['recipient'],'Qbits')              
                                ->subject($mail_data['subject']);
                            });
                        } catch (\Exception $e) {
                
                        }
                        
                     }else{
                         return redirect()->back()->withInput()->with('error', 'Check your internet');
                     }
            return response()->json(['status'=>'success','msg'=>'']);
        }else{
            return response()->json(['status'=>'error','msg'=>'This email is not registered.']);
        }
       return back;

    }
    
    public function forget_pass_code_submit(Request $request){
        
        if($request->session()->has('FORGET_USER_EMAIL')){
            $u_email=$request->session()->get('FORGET_USER_EMAIL');
            $user = User::where('email', $u_email)->orWhere('phone', $u_email)->first();
            if($user->verification_code == $request->verify_code){
                DB::table('users')->where('email',$u_email )->update(array('verification_code' => ""));             
                return response()->json(['status'=>'success','msg'=>'']);
            }else{
                return response()->json(['status'=>'error','msg'=>'Please give a valid code.']);  
            }
        } else {

        }
        return back;  
      }

    public function forget_password_submit(Request $request){

        $new_pass = $request->f_password;
        $u_email = $request->session()->get('FORGET_USER_EMAIL');

        if($new_pass && $u_email){
            $hash_pass = Hash::make($new_pass);
            DB::table('users')->where('email',$u_email )->update(array('password' => $hash_pass)); 
            $request->session()->forget('FORGET_USER_EMAIL');
            return response()->json(['status'=>'success','msg'=>'']);
        } else {
            $request->session()->forget('FORGET_USER_EMAIL');
            return response()->json(['status'=>'error','msg'=>'']);
        }
       return back;
    }


    //Tour result data placed here
    public function tour_data_placed(Request $request){
        

        $min_budget = 0;
        $max_budget = 0;
        if($request->budget == '20'){
            $min_budget = 20000.00;
            $max_budget = 40000.00;
        } else if($request->budget == '40'){
            $min_budget = 41000.00;
            $max_budget = 60000.00;
        } else if($request->budget == '60'){
            $min_budget = 61000.00;
            $max_budget = 100000.00;
        }

        
        $tour_questions_data = array($request->processor,$request->category,$request->memory,$request->storage,$request->budget,$request->memory_price,$request->storage_price);

        $question_answers = json_encode($tour_questions_data);

        if($request->category == 'Laptop'){
            $tour_products = Product::where('category',$request->category)
            ->Where('processor','like','%'.$request->processor.'%')
            ->Where('ram','like','%'.$request->memory.'%')
            ->Where('storage','like','%'.$request->storage.'%')   
            ->whereBetween('unit_price', [$min_budget, $max_budget])
            ->orderBy('id','DESC')
            ->get();
        } else {
            $tour_products = Product::where('category',$request->category)
            ->Where('processor','like','%'.$request->processor.'%')
            ->orderBy('id','DESC')
            ->get();
        }

        return view('frontend.tour_result',compact('tour_products','question_answers'));

        
    }
    Public function minipc(){

        return view("frontend.minipc.minipc");
    }
    Public function minipc_tech_spec(){
        return view("frontend.minipc.minipc_tech_spec");
    }

    
    
}