<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Transport;
use App\Models\ProductStock;
use App\Models\Order;
use App\Models\PurchaseOrder;
use App\Models\Bank;
use Illuminate\Support\Facades\DB;
use App\Models\OrderProduct;
use App\Models\OrderStatus;
use App\Models\PaymentStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class PurchaseOrderController extends Controller
{

    public function index()
    {
        $orders = Order::orderBy('id','desc')->with('user', 'productName', 'bank', 'paymentstatus', 'orderstatus')->get();

        // dd($orders);


        return view('admin.purchaseorder.index',compact('orders'));
    }


    public function create()
    {
        $vendors = User::orderBy('id','desc')->where('user_type','vendor')->get();
        $transports = User::orderBy('id','desc')->where('user_type','transport')->get();
        $transport_details = Transport::orderBy('id','desc')->with('district','upazila','user')->get();

        // dd($transport_details);
        $products = Product::orderBy('name','desc')->get();
        $agents_banks = Bank::orderBy('name','asc')->where('type','vendor')->get();
        $own_banks = Bank::orderBy('name','asc')->where('type','own')->get();
        $order_statuses = OrderStatus::orderBy('name','desc')->get();
        $payment_statuses = PaymentStatus::orderBy('name','desc')->get();
        // $agents = User::orderBy('id','desc')->where('user_type','agents')->with('millerName')->get();
        // $millers = Miller::all();
        // $districts = District::orderBy('name','asc')->get();
        // $upzilas = Upazila::orderBy('name','asc')->get();
        // return view('admin.purchaseorder.index',compact('agents', 'millers','districts','upzilas'));

        if(session('success_message')){
            Alert::success('Form has been Successfully submitted', session('success_message'));
        }

        
        return view('admin.purchaseorder.create',compact('vendors','products','order_statuses','payment_statuses','agents_banks','own_banks','transports','transport_details'));
    }

    public function store(Request $request)
    {
        dd($request->all());
        $insert_purchase_order = new PurchaseOrder();
        for($i=0; $i < count($request->transport_detail_name); $i++) {
            if(isset($request->transport_detail_name[$i]) && $request->transport_detail_name[$i] != ''){
                $insert_purchase_order->product_name = $request->name[$i];
                $insert_purchase_order->product_name = $request->transport_detail_name[$i];
        }   
    }
    $insert_purchase_order->order_type = 'Transport Purchase Order';
    if($request->order_status_id) {
        $insert_purchase_order->order_status_id = $request->order_status_id;
    } else {
        $insert_purchase_order->order_status_id = 1;
    }
    $insert_purchase_order->comments = $request->notes;
    $insert_purchase_order->payment_method = $request->my_pay_method;
    $insert_purchase_order->date = $request->date;
    $insert_purchase_order->receive_date = $request->receive_date;
    $insert_purchase_order->save();
        // dd($insert_purchase_order);
        // dd($request->all());

        if(isset($request->transport_detail_name)){

            // dd($request->all());
            $insert_order_purchase = new Order();
            $insert_order_purchase->user_id = Auth::user()->id;
            $insert_order_purchase->agent_id = $request->transport_id;
            $insert_order_purchase->bank_id = $request->pay_method;
            $insert_order_purchase->check_no = $request->check_no;
            $insert_order_purchase->payment_status_id = $request->payment_status_id;
            $insert_order_purchase->order_type = 'Transport Purchase Order';

            if($request->order_status_id) {
                $insert_order_purchase->order_status_id = $request->order_status_id;
            } else {
                $insert_order_purchase->order_status_id = 1;
            }
            $insert_order_purchase->comments = $request->notes;
            $insert_order_purchase->payment_method = $request->my_pay_method;
            $insert_order_purchase->date = $request->date;
            $insert_order_purchase->receive_date = $request->receive_date;
            $insert_order_purchase->save();

            // dd($insert_order_purchase);




        }else{

            if(isset($request->name)){

                if($request->name != ''){
    
                    $insert_order_purchase = new Order();
                    $insert_order_purchase->user_id = Auth::user()->id;
                    $insert_order_purchase->agent_id = $request->vendor_id;
                    $insert_order_purchase->bank_id = $request->pay_method;
                    $insert_order_purchase->check_no = $request->check_no;
                    $insert_order_purchase->payment_status_id = $request->payment_status_id;
                    $insert_order_purchase->order_type = 'Purchase Order';
    
                    if($request->order_status_id) {
                        $insert_order_purchase->order_status_id = $request->order_status_id;
                    } else {
                        $insert_order_purchase->order_status_id = 1;
                    }
                    $insert_order_purchase->comments = $request->notes;
                    $insert_order_purchase->payment_method = $request->my_pay_method;
                    $insert_order_purchase->date = $request->date;
                    $insert_order_purchase->receive_date = $request->receive_date;
                    $insert_order_purchase->save();
    
    
    
                    if($insert_order_purchase){
    
                        for($i=0; $i < count($request->name); $i++) {
                                if(isset($request->name[$i]) && $request->name[$i] != ''){
                                $datasave = [
                                    'order_id'      =>  $insert_order_purchase->id,
                                    'product_id'    =>  $request->name[$i],
                                    'qty'           =>  $request->quantity[$i],
                                    'comments'      =>  $request->description[$i],
                                    'qty'           => $request->quantity[$i],
                                    'qty_type'      => $request->unit[$i],
                                    'unit_price'    => $request->price[$i],
                                    'grand_total'   => $request->quantity[$i] * $request->price[$i],
                                    'status'        => 1
                                ];
                                DB::table('order_products')->insert($datasave);
                            }   
                        }     
                    }
                }
    
            }
            // dd($insert_order_purchase);
            // dd (count($request->all()));
            // dd($request->all());
            if($insert_order_purchase){
    
                for($i=0; $i < count($request->name); $i++) {
    
                    // dd($request->price[$i]);
    
                    // echo $request->name[$i];
    
                    if(isset($request->name[$i]))
    
                    {
                        if($request->name[$i] != ''){
    
                            $previous_quantity = ProductStock::where('product_id', $request->name[$i])->first();
                            // echo '<pre>';
                            // var_dump($previous_quantity);
                            // echo  $previous_quantity->updated_qty. 'Hello';
                            // dd ($previous_quantity->updated_qty);
                            // echo $request->name[$i] . 'hello';
                            // dd($previous_quantity->beginig_qty);
                            //  dd(($request->price[$i] + $previous_quantity->avg_price)  / ($previous_quantity->updated_qty + $request->quantity[$i]));
                                ProductStock::where('product_id', $request->name[$i])
                                ->update([
                                        'beginig_qty'            => $request->quantity[$i],
                                        'updated_qty'            => $previous_quantity->updated_qty + $request->quantity[$i],
                                        'avg_price'              =>  (($request->price[$i] * $request->quantity[$i]) + ($previous_quantity->avg_price * $previous_quantity->updated_qty))  / ($previous_quantity->updated_qty + $request->quantity[$i]),
                                    ]);
    
                                    if($request->order_status_id == '2'){
    
                                        ProductStock::where('product_id', $request->name[$i])
                                ->update([
                                        'vendor_qty'            => $previous_quantity->updated_qty + $request->quantity[$i],
                                    ]);
                                    }
                                    if($request->order_status_id == '3'){
    
                                        ProductStock::where('product_id', $request->name[$i])
                                ->update([
                                        'inhouse_qty'            => $previous_quantity->updated_qty + $request->quantity[$i],
                                    ]);
    
                                    }
    
                           
                        }
    
                    }
                    // dd($previous_quantity);
                }
    
            }



        }



        

        return back()->withSuccessMessage('success', 'Task Created Successfully!');
    }

    public function edit($id)
    {

        $products = Product::orderBy('name','desc')->get();

        // dd();
      $order = Order::find($id);
    //   dd($order);
    $orderproducts= OrderProduct::where('order_id', $id)->get();
    $own_order_methods= Bank::where('id', $order->payment_method)->first();
    // dd($own_order_methods->id);
    // dd($orderproducts);
    // $orderproducts= SELECT * FROM `order_products` WHERE `order_id` =  $id;
      return view('admin.purchaseorder.edit',compact('order','orderproducts','own_order_methods','products'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $order = Order::find($id);
        $order->bank_id = $request->pay_method;
        $order->check_no = $request->check_no;
        $order->payment_status_id = $request->payment_status_id;
        $order->order_status_id = $request->order_status_id;
        $order->payment_method = $request->my_pay_method;
        $order->date = $request->date;
        $order->receive_date = $request->receive_date;
        $order->save();
        // dd($order);

        if($order){

            for($i=0; $i < count($request->name); $i++) {
                    if(isset($request->name[$i]) && $request->name[$i] != ''){
                    $datasave = [
                        'product_id'    =>  $request->name[$i],
                        'qty'           =>  $request->quantity[$i],
                        'comments'      =>  $request->description[$i],
                        'qty'           => $request->quantity[$i],
                        'qty_type'      => $request->unit[$i],
                        'unit_price'    => $request->price[$i],
                        'grand_total'   => $request->quantity[$i] * $request->price[$i],
                        'status'        => 1
                    ];
                    DB::table('order_products')->where('order_id',$order->id )->update($datasave);
                }   
            }     
        }




        if($order){

            for($i=0; $i < count($request->name); $i++) {

                // dd($request->price[$i]);

                // echo $request->name[$i];

                if(isset($request->name[$i]))

                {
                    if($request->name[$i] != ''){
                        $previous_quantity = ProductStock::where('product_id', $request->name[$i])->first();

                        // dd($previous_quantity->vendor_qty);

                            ProductStock::where('product_id', $request->name[$i]);

                                if($request->order_status_id == '2'){

                                    if($previous_quantity->updated_qty == '0'){

                                        ProductStock::where('product_id', $request->name[$i])
                                        ->update([
                                                'vendor_qty'            => $previous_quantity->updated_qty + $request->quantity[$i],
                                            ]);

                                    }else{

                                        ProductStock::where('product_id', $request->name[$i])
                                        ->update([
                                                'vendor_qty'            => $request->quantity[$i],
                                            ]);

                                    }

                                }
                                if($request->order_status_id == '3'){

                                    if($previous_quantity->updated_qty == '0'){

                                        ProductStock::where('product_id', $request->name[$i])
                                        ->update([
                                                'inhouse_qty'            => $request->quantity[$i],
                                            ]);

                                    }else{

                                        ProductStock::where('product_id', $request->name[$i])
                                        ->update([
                                                'inhouse_qty'            => $previous_quantity->updated_qty,
                                                'vendor_qty'            => 0,
                                            ]);

                                    }

                                }
                    }

                }
                // dd($previous_quantity);
            }

        }

     return redirect()->route('purchaseorder.index')->withSuccessMessage('success', 'Task Updated Successfully!');

    }


    public function transordershow()
    {
        $transorders = Order::orderBy('id','desc')->where('order_type','Transport Purchase Order')->get();

        // dd($transorders);


        return view('admin.purchaseorder.transport_purchase_order_list',compact('transorders'));
    }





}
