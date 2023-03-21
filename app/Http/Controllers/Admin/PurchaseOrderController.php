<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Product;
use App\Models\Transport;
use App\Models\ProductStock;
use App\Models\Order;
use App\Models\PurchaseOrder;
use App\Models\Bank;
use App\Models\PoList;
use Illuminate\Support\Facades\DB;
use App\Models\OrderProduct;
use App\Models\OrderStatus;
use App\Models\PaymentStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use now;
class PurchaseOrderController extends Controller
{

    public function index()
    {
        // $orders = Order::orderBy('id','desc')->with('user', 'productName', 'bank', 'paymentstatus', 'orderstatus')->get();
        $purchase_orders = PurchaseOrder::orderBy('id','desc')->with('user','orderstatus')->get();
       

        // dd($purchase_order_mains);

        // dd($purchase_orders);


        return view('admin.purchaseorder.index',compact('purchase_orders'));
    }


    public function create()
    {
        $vendors = User::orderBy('id','desc')->where('user_type','vendor')->get();
        $transports = User::orderBy('id','desc')->where('user_type','transport')->get();
        $transport_details = Transport::orderBy('id','desc')->with('district','upazila','user')->get();
        $purchase_order_mains = PurchaseOrder::orderBy('id','desc')->where('order_type','purchase')->where('order_status_id','2')->get();
        $purchase_order_transport_mains = PurchaseOrder::orderBy('id','desc')->where('order_type','transport')->where('order_status_id','1')->get();

        $products = Product::orderBy('name','desc')->get();
        $agents_banks = Bank::orderBy('name','asc')->where('type','vendor')->get();
        $own_banks = Bank::orderBy('name','asc')->where('type','own')->get();
        $order_statuses = OrderStatus::orderBy('name','desc')->get();
        $payment_statuses = PaymentStatus::orderBy('name','desc')->get();
        $po_lists = PoList::orderBy('product_name','desc')->get();
        // dd($po_lists);
        
        $purchase_orders = PurchaseOrder::orderBy('id','desc')->with('user','orderstatus')->where('order_type','purchase')->where('order_status_id','2')->get();

        if(session('success_message')){
            Alert::success('Form has been Successfully submitted', session('success_message'));
        }

        
        return view('admin.purchaseorder.create',compact('vendors','products','order_statuses','payment_statuses','agents_banks','own_banks','transports','transport_details','purchase_order_mains','purchase_order_transport_mains','purchase_orders','po_lists'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        
        
            $insert_purchase_order = new PurchaseOrder();
        
            if(isset($request->name) && $request->name != '' && $request->name != NULL){
                for($i=0; $i < count($request->name); $i++) {
                    if(isset($request->name[$i]) && $request->name[$i] != ''){
                        $insert_purchase_order->product_name = $request->name[$i];
                        $insert_purchase_order->agent_id = $request->vendor_id;
                 }   
                }

                $insert_purchase_order->order_type = 'purchase';

                if($request->order_status) {
                    $insert_purchase_order->order_status_id = $request->order_status_id;
                } else {
                    $insert_purchase_order->order_status_id = '1';
                }
                $insert_purchase_order->user_id = Auth::user()->id;
                $insert_purchase_order->comments = $request->notes;
                // $insert_purchase_order->bank_id = $request->pay_method;
                $insert_purchase_order->bank_name = $request->pay_method;
                $insert_purchase_order->payment_status = $request->payment_status;
                $insert_purchase_order->my_payment_method = $request->my_pay_method;
                $insert_purchase_order->date = $request->date;
                $insert_purchase_order->code = 'PO'.date('dmY').'-'.rand(1, 9);
                $insert_purchase_order->receive_date = $request->receive_date;
                $insert_purchase_order->save();

                    // dd($insert_purchase_order);
                    // dd($request->all());

                    if($insert_purchase_order){

    
                        for($i=0; $i < count($request->name); $i++) {
                                if(isset($request->name[$i]) && $request->name[$i] != ''){
                                $datasave = [
                                    'order_id'      =>  $insert_purchase_order->id,
                                    'product_name'    =>  $request->name[$i],
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

                    if($insert_purchase_order){
    
                        for($i=0; $i < count($request->name); $i++) {
        
                            if(isset($request->name[$i]))
            
                            {
                                if($request->name[$i] != ''){
            
                                    $previous_quantity = ProductStock::where('product_name', $request->name[$i])->first();
                                        ProductStock::where('product_name', $request->name[$i])
                                        ->update([
                                                'beginig_qty'            => $request->quantity[$i],
                                                'updated_qty'            => $previous_quantity->updated_qty + $request->quantity[$i],
                                                'avg_price'              =>  (($request->price[$i] * $request->quantity[$i]) + ($previous_quantity->avg_price * $previous_quantity->updated_qty))  / ($previous_quantity->updated_qty + $request->quantity[$i]),
                                            ]);
            
                                            if($request->order_status_id == '2'){
            
                                                ProductStock::where('product_name', $request->name[$i])
                                        ->update([
                                                'vendor_qty'            => $previous_quantity->updated_qty + $request->quantity[$i],
                                            ]);
                                            }
                                            if($request->order_status_id == '3'){
            
                                                ProductStock::where('product_name', $request->name[$i])
                                        ->update([
                                                'inhouse_qty'            => $previous_quantity->updated_qty + $request->quantity[$i],
                                            ]);
            
                                            }
            
                                   
                                }
            
                            }
                            
                        }
            
                    }
            }

        
        if(isset($request->transport_detail_name)){

            // dd($request->all());

                for($i=0; $i < count($request->transport_detail_name); $i++) {
                    if(isset($request->transport_detail_name[$i]) && $request->transport_detail_name[$i] != ''){
                        $insert_purchase_order->product_name = $request->transport_detail_name[$i];
                        $insert_purchase_order->agent_id = $request->transport_id;
                        $insert_purchase_order->PO_TPO_related_id  = $request->PO_name[$i];
                }   
            }
            $insert_purchase_order->order_type = 'transport';

            if($request->order_status_id) {
                $insert_purchase_order->order_status_id = $request->order_status_id;
            } else {
                $insert_purchase_order->order_status_id = '1';
            }
            $insert_purchase_order->user_id = Auth::user()->id;
            $insert_purchase_order->comments = $request->notes;

            if(isset($request->transport_related_po)){
            
                for($i=0; $i < count($request->transport_related_po); $i++) {
                        if(isset($request->transport_related_po[$i]) && $request->transport_related_po[$i] != ''){
                            $insert_purchase_order->PO_TPO_related_id = $request->transport_related_po[$i];
                    }   
                }
            }
            
            $insert_purchase_order->payment_status = $request->payment_status;
            $insert_purchase_order->my_payment_method = $request->my_pay_method;
            $insert_purchase_order->date = $request->date;
            $insert_purchase_order->code = 'TPO'.date('dmY').'-'.rand(1, 9);
            $insert_purchase_order->receive_date = $request->receive_date;
            $insert_purchase_order->save();
                // dd($insert_purchase_order->code);
                // dd($request->all());

                if($insert_purchase_order){
                   $result = PurchaseOrder::orderBy('id','desc')->where('code',$insert_purchase_order->PO_TPO_related_id)->get();
                //    dd($result);

                //    dd($result[0]->code);

                            $datasave = [
                                'PO_TPO_related_id'     =>  $insert_purchase_order->code,
                                
                            ];
                            DB::table('purchase_orders')->where('code',$result[0]->code )->update($datasave);
                       
                }

        }
  
        
        return back()->withSuccessMessage('success', 'Task Created Successfully!');
    }

    public function edit($id)
    {

        $products = Product::orderBy('name','desc')->get();

        // dd($products);

        // dd();
        $purchaseorder = PurchaseOrder::find($id);
        $po_numbers_purchases = PurchaseOrder::orderBy('product_name','asc')->where('order_type','purchase')->where('id',$id)->first();
        //   dd($purchaseorder);
        $orderproducts= OrderProduct::where('order_id', $id)->get();
        $own_banks = Bank::orderBy('name','asc')->where('type','own')->get();
        // dd($own_order_methods->id);
        // dd($orderproducts);
        // $orderproducts= SELECT * FROM `order_products` WHERE `order_id` =  $id;
      return view('admin.purchaseorder.edit',compact('purchaseorder','orderproducts','products','own_banks','po_numbers_purchases'));
    }
    

    public function update(Request $request, $id)
    {
                // dd($request->all());
                $order = PurchaseOrder::find($id);
                if(isset($request->name) && $request->name != '' && $request->name != NULL){
                $order->bank_name = $request->pay_method;
                $order->check_no = $request->check_no;
                $order->payment_status = $request->payment_status_id;
                $order->order_status_id = $request->order_status_id;
                $order->my_payment_method  = $request->my_pay_method;
                $order->date = $request->date;
                $order->receive_date = $request->receive_date;
                $order->save();
                // dd($order);
                if($order){

                    for($i=0; $i < count($request->name); $i++) {
                            if(isset($request->name[$i]) && $request->name[$i] != ''){
                            $datasave = [
                                'product_name'      =>  $request->name[$i],
                                'qty'               =>  $request->quantity[$i],
                                'comments'          =>  $request->description[$i],
                                'qty'               => $request->quantity[$i],
                                'qty_type'          => $request->unit[$i],
                                'unit_price'        => $request->price[$i],
                                'grand_total'       => $request->quantity[$i] * $request->price[$i],
                                'status'            => 1
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
                                $previous_quantity = ProductStock::where('product_name', $request->name[$i])->first();

                                // dd($previous_quantity->vendor_qty);

                                    ProductStock::where('product_name', $request->name[$i]);

                                        if($request->order_status_id == '2'){

                                            if($previous_quantity->updated_qty == '0'){

                                                ProductStock::where('product_name', $request->name[$i])
                                                ->update([
                                                        'vendor_qty'            => $previous_quantity->updated_qty + $request->quantity[$i],
                                                    ]);

                                            }else{

                                                ProductStock::where('product_name', $request->name[$i])
                                                ->update([
                                                        'vendor_qty'            => $request->quantity[$i],
                                                    ]);

                                            }

                                        }
                                        if($request->order_status_id == '3'){

                                            if($previous_quantity->updated_qty == '0'){

                                                ProductStock::where('product_name', $request->name[$i])
                                                ->update([
                                                        'inhouse_qty'            => $request->quantity[$i],
                                                    ]);

                                            }else{

                                                ProductStock::where('product_name', $request->name[$i])
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
            }

            if(isset($request->transport_detail_name)){

                // dd($request->all());
    
                    for($i=0; $i < count($request->transport_detail_name); $i++) {
                        if(isset($request->transport_detail_name[$i]) && $request->transport_detail_name[$i] != ''){
                            $order->product_name = $request->transport_detail_name[$i];
                            $order->agent_id = $request->transport_id;
                    }   
                }
                $order->order_status_id = $request->order_status_id;
                $order->user_id = Auth::user()->id;
                $order->comments = $request->notes;
                $order->payment_status = $request->payment_status_id;
                $order->check_no = $request->check_no;
                $order->my_payment_method = $request->my_pay_method;
                $order->date = $request->date;
                $order->receive_date = $request->receive_date;
                $order->save();
                    // dd($order);
                    // dd($request->all());
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
