<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Miller;
use App\Models\District;
use App\Models\Upazila;
use App\Models\User;
use App\Models\AgentMiller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MillerController extends Controller
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
        $millers = Miller::orderBy('id','asc')->get();
        return view('admin.miller.index',compact('millers','upzilas','districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;
        if(isset($id) && !empty($id)) {
            $miller = Miller::findOrFail($id);
        } else {
            $miller = new Miller();
        }

        $miller->contact_name = $request->contact_name;
        $miller->district_id  = $request->district_id;
        $miller->upazila_id  = $request->upazila_id;
        $miller->business_name = $request->business_name;
        $miller->email = $request->email;
        $miller->phone = $request->phone;
        $miller->address = $request->address;
        $miller->save();

        // if($miller){

        //     for($i=0; $i < count($request->kt_docs_repeater_advanced); $i++) {
        //         $datasave = [
        //             'name'           =>   $request->kt_docs_repeater_advanced[$i]['bank_name'],
        //             'branch_name'      =>  $request->kt_docs_repeater_advanced[$i]['branch_name'],
        //             'acc_no'        => $request->kt_docs_repeater_advanced[$i]['acc_no'],
        //             'status'       => 1,
        //             'user_id'       => Auth::user()->id,
        //             'agent_id'      => $miller->id,
        //             'type'          => 'millers'
        //         ];
        //         DB::table('banks')->insert($datasave);
        //     }
        // }



        return redirect()->route('miller.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Miller  $miller
     * @return \Illuminate\Http\Response
     */
    public function show(Miller $miller)
    {
        //
    }

    public function edit(Request $req) {
        // need to add status in DB;
        $agent = Miller::where('id', $req->miller)->firstOrFail();
        return response()->json($agent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Miller  $miller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Miller $miller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Miller  $miller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $find_miller = Miller::where('id', $request->miller)->first();
        if($find_miller) {
            $find_miller->delete();
            return response()->json(['message'=>"Successfully Deleted $find_miller->name"]);
        }
    }
}
