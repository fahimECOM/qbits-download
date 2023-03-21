<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Ticket;
use Auth;
use DB;
use PDF;
use Validator;
use App\Models\AllHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class DashboardController extends Controller
{
    public function index(){
        $data['order'] = Order::orderBy('id','desc')->get();
        $res = DB::table('order_details')->first();
        if($res != ''){
            $data['date'] = OrderDetail::orderBy('created_at','desc')->first()->created_at;
               
        // $data['date'] = date('Y-m-d',strtotime($data['collectDate']));
        //month and date
        $data['sdate'] = date('Y-m-01',strtotime($data['date']));
        $data['edate'] = date('Y-m-30',strtotime($data['date']));
        $data['everyday'] = OrderDetail::where('created_at',$data['date'])->sum('price');
        $data['everydayOrder'] = OrderDetail::where('created_at',$data['date'])->get()->count();
        $data['everyMonth'] = OrderDetail::whereBetween('created_at',[$data['sdate'],$data['edate']])->sum('price');
        $data['everyMonthOrder'] = OrderDetail::whereBetween('created_at',[$data['sdate'],$data['edate']])->get()->count();
        //year 
        $data['sMonth'] = date('Y-01-01',strtotime($data['date']));
        $data['eMonth'] = date('Y-12-30',strtotime($data['date']));
        $data['everyYear'] = OrderDetail::whereBetween('created_at',[$data['sMonth'],$data['eMonth']])->sum('price');
        $data['everyYearOrder'] = OrderDetail::whereBetween('created_at',[$data['sMonth'],$data['eMonth']])->get()->count();
        $data['customer'] = User::whereBetween('created_at',[$data['sdate'],$data['edate']])->where('user_type','customer')->get();
        $data['customerCount'] = User::whereBetween('created_at',[$data['sdate'],$data['edate']])->where('user_type','customer')->get()->count();
        return view('admin.pages.dashboard.index',$data);
    }else{
        $data['sdate'] = date('Y-m-01');
        $data['edate'] = date('Y-m-30');
        $data['customer'] = User::whereBetween('created_at',[$data['sdate'],$data['edate']])->where('user_type','customer')->get();
        $data['customerCount'] = User::whereBetween('created_at',[$data['sdate'],$data['edate']])->where('user_type','customer')->get()->count();
        return view('admin.pages.dashboard.index',$data);
    }
    }
    public function customerList(){
        $customer = User::where('user_type','customer')->orderBy('name','desc')->get();
        
        return view('admin.layouts.customers.index',compact('customer'));

    }
    public function customerView($id){
        if(!User::hasPermission(["view_customer"])){
            return redirect(url()->previous());
        }

        $data['customer'] = User::find($id);
        $data['id'] = User::where('id',$id)->get('id');
        $data['sellerId'] = Order::where('user_id',$id)->get();
        $data['ticket'] = Ticket::where('user_id',$id)->get();
        return view('admin.layouts.customers.view',$data);

    }
      public function delete($id){
      
        $user = User::find($id);

        // if(file_exists('public/upload/user_img/' . $user->img) AND ! empty($user->img)) {
        //   unlink('public/upload/user_img/' . $user->img);
        // }
        $user->delete();
        return redirect()->route('admin.customer')->with('success','Data Delete Successfully');
      }

      // admin profile
      public function admin_profile(){
        $customer = User::all();
        return view('admin.layouts.admin.profile',compact('customer'));
      }

      public function admin_profile_edit(){
        $data['id'] = Auth::user()->id;
        $data['editData'] = User::where('id',$data['id'])->get();
        return view('admin.layouts.admin.editProfile',$data);
      }

      public function admin_profile_update(Request $request){
        // $check_password = Hash::check($request->check_current_password,$request->current_password);
       
            $user = Auth::user();
           
            $user_name = $user->name;
            $user_lname = $user->lname;
            $user_phone = $user->phone;

            if($request->full_name){
                $user->name = $request->full_name;
            }
            
            if($request->phone){
                $user->phone = $request->phone;
            }
            
            // if($check_password == 'ture' ){
            //     $user->password = Hash::make($request->new_password);
            // }
          
    
            if ($single_image=$request->avatar) {
    
                $destinationPath = 'backend/assets/images/products/single_image/';
    
                $profileImage = date('YmdHis') . "." . $single_image->getClientOriginalExtension();
    
                $image_url = $destinationPath.$profileImage;
    
                $single_image->move($destinationPath, $profileImage);
                $user->avatar = $image_url;
            }

            if($request->full_name || $request->phone || $request->avatar){
                $user->save();
            }
            // history
            $new_user_info = [];
            $old_user_info = [];
            if($request->full_name != $user_name ){
                $new_user_info[] = 'New User Name is ' .$request->full_name;
                $old_user_info[] = 'Old User Name was ' .$user_name;
            }
            if($request->phone != $user_phone){
                $new_user_info[] = 'New User Phone Number is ' .$request->phone;
                $old_user_info[] = 'Old User Phone Number was ' .$user_phone;
            }
           
            $table_max_id = User::max('id');
            $history = new AllHistory();
            $history->table_name = 'User';
            $history->table_id = $table_max_id;
            $history->menu_name = 'Edit Pro';
            $history->status = 'Update';
            $history->created_by = Auth::id();
            $history->journal =   implode(" & ",$old_user_info) . '<span class=" text-gray-800"> Updated By ' .Auth::user()->name .'</span> And Now ' . implode(" & ",$new_user_info);
            $history->date = date('Y-m-d');
            $history-> save();
           
            // end history
            return redirect(url()->previous());  
  
    }

    public function admin_password_update(Request $request){
        $validator = Validator::make($request->all(), [
                'check_current_password' => 'required',
                'new_password' => 'required|min:6',
            ],
            [
                'check_current_password.required'=>'Please enter your current password!',
                'new_password.required'=>'Please enter your new password!',
                'new_password.min'=>'Password should be min 6 character!',
                
            ]
        );

        // After pass all validation
        if($validator->passes()){
            $user = Auth::user();
            $check_password = Hash::check($request->check_current_password,$user->password);
            if($check_password){
                $user->password = Hash::make($request->new_password);
                $user->save();
                Auth::setUser(User::where('id', Auth::id())->first());
                return response()->json(['status'=>'success']);
            } else {
                return response()->json(['status'=>'wrong_password']);
            }
        } else {
            return response()->json(['status'=>'error','errors'=>$validator->messages()]);
        }
    }
  

}