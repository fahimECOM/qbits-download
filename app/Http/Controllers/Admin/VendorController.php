<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\District;
use App\Models\PoList;
use App\Models\Upazila;
use App\Models\Bank;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {

        // User::orderBy('id','desc')->where('user_type','agents')->with('millerName','bank')->get()

        $vendors = User::orderBy('id','desc')->where('user_type','vendor')->get();

        // dd($vendors);

        $districts = District::orderBy('name','asc')->get();
        $upzilas = Upazila::orderBy('name','asc')->get();
        return view('admin.vendor.index',compact('vendors','districts','upzilas'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        
        $id = $request->id;
        if(isset($id) && !empty($id)) {
            $vendor = User::findOrFail($id);
        } else {
            $vendor = new User();
        }

        $arrayTostring = implode(',', $request->payment_type);
        $vendor->payment_type = $arrayTostring;


        // dd($request->all());
        // dd("Hello");
        // $vendor = new User();
        $vendor->name = $request->name;
        $vendor->business_name = $request->business_name;
        $vendor->district_id = $request->district_id;
        $vendor->upazila_id = $request->upazila_id;
        $vendor->user_type = "vendor";
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->address = $request->address;
        $vendor->save();

        if($vendor){

            for($i=0; $i < count($request->kt_docs_repeater_advanced); $i++) {
                $datasave = [
                    'name'              =>   $request->kt_docs_repeater_advanced[$i]['name'],
                    'branch_name'       =>  $request->kt_docs_repeater_advanced[$i]['branch_name'],
                    'acc_no'            => $request->kt_docs_repeater_advanced[$i]['acc_no'],
                    'acc_name'          => $request->kt_docs_repeater_advanced[$i]['acc_name'],
                    'status'            => 1,
                    'user_id'           => Auth::user()->id,
                    'agent_id'          => $vendor->id,
                    'type'              => 'vendor'
                ];
                DB::table('banks')->insert($datasave);
            }
        }


        return redirect()->route('vendor.index');
    }

    public function vendorshow(Request $request)
    {
        $vid = $request->post('vendor_id');

        // dd($vid);
        // echo "Hello";
        $vendors = User::orderBy('id','desc')->where('id',$vid)->first();

        $html ='<div style="margin-top:20px">'. '<span class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">'.$vendors->business_name . ' - ' .$vendors->name .'</span>'.'<br>'.'<span style="font-size:15px;">' .$vendors->phone. '</span>'.'<br>'.$vendors->address.'</div>';

        echo $html;
    }

    public function vendorbankshow(Request $request)
    {
        $vid = $request->post('vendor_id');

        // dd($vid);

        $vendors_banks = Bank::orderBy('id','desc')->where('agent_id',$vid)->first();

        // dd($vendors_banks);
        // $html = '<option value=' .$vendors_banks->id. '>'. $vendors_banks->name. '</option>';
        // $html = '<option value=' .$vendors_banks->name. '>'. $vendors_banks->name. '-' .$vendors_banks->acc_no .'</option>';
        $html = '<option value=' .$vendors_banks->name. ' title='.$vendors_banks->acc_no . '>'. $vendors_banks->name.'</option><option value="--cash--">Cash</option>';
        echo $html;

    }

    public function vendortransportshow(Request $request)
    {
        $vid = $request->post('vendor_id');

        // dd($vid);

        $PO_transports = PurchaseOrder::orderBy('id','desc')->where('agent_id',$vid)->first();

        // dd($vendors_banks);

        // $html = '<option value=' .$vendors_banks->id. '>'. $vendors_banks->name. '</option>';
        $html = '<option value=' .$PO_transports->id. '>'. $PO_transports->code. '</option>';

        echo $html;

    }




    public function vendorqtytype(Request $request)
    {
        // dd($request->all());
        $vid = $request->post('product_id');

        // dd($vid);

        $vendors_qty_type = Product::orderBy('id','desc')->where('name',$vid)->first();

        // dd($vendors_qty_type);

        $html = '<option value=' .$vendors_qty_type->id. '>'. $vendors_qty_type->unit. '</option>';

        echo $html;

    }

    public function polist(Request $request)
    {

        // dd("Hello");


        // dd($request->all());
        $polist = new PoList();
        if(isset($request->checked) && $request->checked != '' && $request->checked != NULL){
            for($i=0; $i < count($request->checked); $i++) {
                    if(isset($request->checked[$i]) && $request->checked[$i] != ''){
                        $polist->order_id = $request->checked[$i];
                }   
            }
        }
        $polist->save();

        if($polist){

            if(isset($request->checked) && $request->checked != '' && $request->checked != NULL){
                for($i=0; $i < count($request->checked); $i++) {
                    $result = PurchaseOrder::orderBy('id','desc')->where('id',$request->checked[$i])->get();

                    // dd($result);


                    $datasave = [
                        'product_name'     =>  $result[$i]->product_name,
                        
                    ];
                    DB::table('po_lists')->where('order_id',$request->checked[$i] )->update($datasave);
    
                }
            }
        }
        return back();

    }

    public function edit(Request $req) {
        // need to add status in DB;
        $agent = User::where('id', $req->vendor)->where('user_type','vendor')->with('banks')->firstOrFail();
        return response()->json($agent);
    }



    public function destroy(Request $request)
    {
        $find_vendor = User::where('id', $request->vendor)->where('user_type','vendor')->first();
        if($find_vendor) {
            $find_vendor->delete();
            return response()->json(['message'=>"Successfully Deleted $find_vendor->name"]);
        }
    }

    







}
