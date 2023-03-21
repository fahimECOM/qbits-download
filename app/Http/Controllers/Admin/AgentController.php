<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Miller;
use App\Models\District;
use App\Models\Upazila;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    public function index()
    {
        $agents = User::orderBy('id','desc')->where('user_type','agents')->with('millerName','bank')->get();

        // dd($agents);


        $millers = Miller::all();
        $districts = District::orderBy('name','asc')->get();
        $upzilas = Upazila::orderBy('name','asc')->get();
        return view('admin.agent.index',compact('agents', 'millers','districts','upzilas'));
    }

    public function store(Request $request)
    {

        $id = $request->id;
        if(isset($id) && !empty($id)) {
            $agent = User::findOrFail($id);
        } else {
            $agent = new User();
        }


        // dd($request->all());
        // dd("Hello");
        
        $agent->name = $request->name;
        $agent->business_name = $request->business_name;
        // $agent->miller_id = $request->miller_id;
        $agent->district_id = $request->district_id;
        $agent->upazila_id = $request->upazila_id;
        $agent->user_type = "agents";
        $agent->email = $request->email;
        $agent->phone = $request->phone;
        $agent->bank_name = $request->bank_name;
        $agent->address = $request->address;
        $agent->save();

        // dd($agent);

        if($agent){

            for($i=0; $i < count($request->kt_docs_repeater_advanced); $i++) {
                $datasave = [
                    'name'           =>   $request->kt_docs_repeater_advanced[$i]['name'],
                    'branch_name'      =>  $request->kt_docs_repeater_advanced[$i]['branch_name'],
                    'acc_no'        => $request->kt_docs_repeater_advanced[$i]['acc_no'],
                    'status'       => 1,
                    'user_id'       => Auth::user()->id,
                    'agent_id'      => $agent->id,
                    'type'          => 'agents'
                ];
                DB::table('banks')->insert($datasave);
            }
        }

        if($agent){
            for($i=0; $i < count($request->miller_id); $i++) {
                $datasave = [
                   'miller_id'      =>  $request->miller_id[$i],
                   'agent_id'       =>   $agent->id,
                ];
                DB::table('agent_millers')->insert($datasave);
            }
        }
        return redirect()->route('agent.index');
        // return redirect()->route('agent.index')->withSuccessMessage("Data saved successfully.");
    }

    public function edit(Request $req) {

        // dd($req->all);

        // need to add status in DB;
        $agent = User::where('id', $req->agent)->with('banks')->firstOrFail();
        // dd($agent);
        return response()->json($agent);
    }



    public function destroy(Request $request) {
        $find_agent = User::where('id', $request->agent)->where('user_type','agents')->first();
        if($find_agent) {
            $find_agent->delete();
            return response()->json(['message'=>"Successfully Deleted $find_agent->name"]);
        }
    }
}
