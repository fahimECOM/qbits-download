<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\PurchaseOrder;
use App\Models\User;
use App\Models\Upazila;
use App\Models\Bank;
use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $districts = District::orderBy('name','asc')->get();
        $upzilas = Upazila::orderBy('name','asc')->get();
        $transports = User::orderBy('id','desc')->where('user_type','transport')->with('millerName','bank')->get();
        // dd($transports);
        return view('admin.transport.index',compact('transports', 'upzilas','districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        echo "Hi";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());

        // dd(count($request->kt_docs_repeater_advanced));
        // dd($request->all());
        // $transport = new Transport();
        // $name = $request->name;
        // $business_name = $request->business_name;
        $id = $request->id;

        // dd($id);

        if(isset($id) && !empty($id)) {
            $insert_transport_user = User::findOrFail($id);
        } else {
            $insert_transport_user = new User();
        }

        $arrayTostring = implode(',', $request->payment_type);
        $insert_transport_user->payment_type = $arrayTostring;


        // $insert_transport_user = new User();
        $insert_transport_user->name = $request->name;
        $insert_transport_user->business_name = $request->business_name;
        $insert_transport_user->user_type = 'transport';
        $insert_transport_user->phone = $request->phone;
        $insert_transport_user->email = $request->email;
        $insert_transport_user->address = $request->address;
        $insert_transport_user->bank_name = $request->bank_name;
        $insert_transport_user->branch_name = $request->branch_name;
        $insert_transport_user->acc_no = $request->acc_no;
        $insert_transport_user->save();

        // dd($insert_transport_user->id);

        if($insert_transport_user){

            for($i=0; $i < count($request->kt_docs_repeater_advanced); $i++) {
                $datasave = [
                 
                   'district_id'    =>   $request->kt_docs_repeater_advanced[$i]['district_id'],
                  'upazila_id'      =>  $request->kt_docs_repeater_advanced[$i]['upazila_id'],
                    'amount'        => $request->kt_docs_repeater_advanced[$i]['amount'],
                    'user_id'       => Auth::user()->id,
                    'agent_id'      => $insert_transport_user->id
                ];
                DB::table('transports')->insert($datasave);
            }

        }
        
        return redirect()->route('transport.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function show(Transport $transport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd('Hello');
    
          $purchaseorders = PurchaseOrder::find($id);
          $transportvendors= User::where('user_type','transport')->get();
          $own_banks = Bank::orderBy('name','asc')->where('type','own')->get();
          $po_numbers = PurchaseOrder::orderBy('product_name','asc')->where('order_type','transport')->where('id',$id)->first();
        //   dd($po_numbers);

          return view('admin.purchaseorder.edit_transport',compact('purchaseorders','transportvendors','own_banks','po_numbers'));    
    }

    // public function edit(Request $req) {
    //     // dd($req->transport);
    //     // need to add status in DB;
    //     $agent = User::where('id', $req->transport)->where('user_type','transport')->first();
    //     return response()->json($agent);
    // }





    public function trans_edit(Request $req)
    {

        // dd("Hello");

        // dd($req->transport);

        $agent = User::where('id', $req->transport)->where('user_type','transport')->with('transports')->first();
        // dd($agent);
       return response()->json($agent);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transport $transport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        // dd($request->all());


        $find_agent = User::where('id', $request->agent)->where('user_type','transport')->first();
        if($find_agent) {
            $find_agent->delete();
            return response()->json(['message'=>"Successfully Deleted $find_agent->name"]);
        }
    }

    public function transdetailshow(Request $request)
    {

        // dd($request->all());

        $tid = $request->post('trans_id');

        // dd($tid);

        $transport_details = Transport::orderBy('id','desc')->where('agent_id',$tid)->with('district','upazila')->first();

        // dd($transport_details);

        // dd($vendors_banks);


        $html = '<option value='. $transport_details->district->name. ','. $transport_details->upazila->name. ','.'Rate:৳'.$transport_details->amount.'>'. $transport_details->district->name. ', '. $transport_details->upazila->name. ', '.'  Rate: ৳'.$transport_details->amount.  '</option>';

        echo $html;

    }

    public function transpriceshow(Request $request)
    {

        // dd($request->all());

        $tid = $request->post('trans_id');

        // dd($tid);

        $transport_details = Transport::orderBy('id','desc')->where('agent_id',$tid)->first();

        // dd($transport_details);

        // dd($vendors_banks);

       


        $html = '<input type="number"  class ="form-control form-control-solid text-end" data-kt-element="price"'.'value='.$transport_details->amount.  '>';

        echo $html;

    }

    public function transbankshow(Request $request)
    {
        // dd($request->all());
        $vid = $request->post('trans_id');

        // dd($vid);

        $trans_banks = User::orderBy('id','desc')->where('id',$vid)->first();

        // dd($trans_banks);
        // $html = '<option value=' .$vendors_banks->id. '>'. $vendors_banks->name. '</option>';
        // $html = '<option value=' .$vendors_banks->name. '>'. $vendors_banks->name. '-' .$vendors_banks->acc_no .'</option>';
        $html = '<option value=' .$trans_banks->bank_name. ' title='.$trans_banks->acc_no . '>'. $trans_banks->bank_name.'</option><option value="--cash--">Cash</option>';
        echo $html;

    }






}
