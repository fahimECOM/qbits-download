<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use PDF;
use Crypt;
use Redirect;
use Carbon\Carbon;
use App\Models\User;
use App\Models\RawInventory;
use App\Models\FinishInventory;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;

class AuthorizationController extends Controller
{
    //Use this function to view User Permission Setup page
    public function permission()
    {
        $data['admins'] = User::whereIn('user_type',  ['super_admin','admin'])->where('status','!=','2')->get();
        return view('admin.layouts.authorization.permission',$data);
    }

    //Use this function to remove any user permission
    public function remove_permission_from_scopesfield(Request $request) {

        if($request->prev_permissions != null) {
            $all_permission_arr = explode (",", $request->prev_permissions);

            if($request->new_permission == 'confirm_reject_ens_request') {
                if(in_array('verify_ens_request', $all_permission_arr)){
                    $verify_key = array_search('verify_ens_request', $all_permission_arr);
                    unset($all_permission_arr[$verify_key]);
                }
                $key = array_search($request->new_permission, $all_permission_arr);
                unset($all_permission_arr[$key]);
            } else if($request->new_permission == 'confirm_reject_requisition_request') {
                if(in_array('verify_requisition_request', $all_permission_arr)){
                    $verify_key = array_search('verify_requisition_request', $all_permission_arr);
                    unset($all_permission_arr[$verify_key]);
                }
                $key = array_search($request->new_permission, $all_permission_arr);
                unset($all_permission_arr[$key]);
            } else if($request->new_permission == 'confirm_reject_requisition_stockin') {
                if(in_array('verify_requisition_stockin', $all_permission_arr)){
                    $verify_key = array_search('verify_requisition_stockin', $all_permission_arr);
                    unset($all_permission_arr[$verify_key]);
                }
                $key = array_search($request->new_permission, $all_permission_arr);
                unset($all_permission_arr[$key]);
            } else {
                $key = array_search($request->new_permission, $all_permission_arr);
                unset($all_permission_arr[$key]);
            }

            
            
            $text = '';
            foreach($all_permission_arr as $permission){
                if($text){
                    $text = $text . ',' .$permission; 
                }else {
                    $text =$permission; 
                }
            }

           

            return response()->json(['status'=>'success', 'all_permission_arr'=>$text]);
            
        } 
    }

    // Add/Update User Role Permission Function
    public function add_update_new_user_permission(Request $request) {
        //Write validate message
        $validator = Validator::make($request->all(), [
                'full_name' => 'required|string',
                'designation' => 'required|string',
                'email' => 'required|email',
            ],
            [
                'full_name.required'=>'Name is required!',
                'designation.required'=>'Designation is required!',
                'email.required'=>'Email is required',
                'email.email'=>'Please enter a valid email!',
                
            ]
        );

        // After pass all validation
        if($validator->passes()){
            //get user details from database
            $user  = User::where('email',$request->email)->first();

            //If any user found from database with given email
            if($user){
                //checking request/form_type is 'Add User'
                if($request->form_type == 'add') {
                    return response()->json(['status'=>'exist']);
                } 
                //checking request/form_type is 'Update User'
                else if($request->form_type == 'update') {

                    // Get User Current Scopes from Update User Permission Form
                    $result = $this->getPermissionScopes($request->permission_scopes);
                    
                    // Checking user type is Super Admin or Admin
                    if($result['is_super_admin']) {
                        $user_type = 'super_admin';
                    } else {
                        $user_type = 'admin';
                    }
                    
                    // Update users details into database
                    User::where('id', $request->user_id)->update(array('designation' => $request->designation, 'scopes' => $result['scopes'], 'user_type' => $user_type ));

                    
                    //<==========>// START Update/Add "confirm_reject_ens_request" raw values from "confirmation_menu_list" table //<==========>//
                        
                        // get 'confirmation_menu_list' table data from database for only 'confirm_reject_ens_request' menu 
                        $confirmation_menu_list = DB::table('confirmation_menu_list')->where('confirmation_name','confirm_reject_ens_request')->select('needed_confirm','needed_confirm_ids','needed_verify','needed_verify_ids')->first();
                        
                        // convert 'needed_confirm_ids' values into Array
                        $confirmation_menu_list_ids = str_replace( array( '[', ']', '"' ), '', $confirmation_menu_list->needed_confirm_ids);
                        $new_confirmation_menu_list_ids_arr = explode (",", $confirmation_menu_list_ids);

                        // convert 'needed_verify_ids' values into Array
                        $confirmation_menu_list_verify_ids = str_replace( array( '[', ']', '"' ), '', $confirmation_menu_list->needed_verify_ids);
                        $new_confirmation_menu_list_verify_ids_arr = explode (",", $confirmation_menu_list_verify_ids);
                        
                        // Checking [SKD Materials => SKD Queue List => Verify option] is checked 
                        if($result['is_skd_ens_verify']) {
                            // Checking 'user_id' already exist in 'confirm_reject_ens_request' raw of 'needed_verify_ids' column
                            if(in_array($request->user_id, $new_confirmation_menu_list_verify_ids_arr)){
                                // User id is already present
                            }
                            //=== User id not present ===//
                            else {
                                //verify_ens_request updated in "confirmation_menu_list" table inside database
                                $new_verify_needed = $confirmation_menu_list->needed_verify + 1;
                                if($confirmation_menu_list->needed_verify_ids == null){
                                    $new_needed_verify_ids = '["'.$request->user_id.'"]';
                                } else {
                                    $needed_verify_ids = str_replace( array(  ']'), '', $confirmation_menu_list->needed_verify_ids);
                                    $new_needed_verify_ids = $needed_verify_ids.',"'.$request->user_id.'"]';
                                
                                }

                                //confirm_reject_ens_request updated in "confirmation_menu_list" table inside database
                                if(in_array($request->user_id, $new_confirmation_menu_list_ids_arr)){
                                    $new_needed_confirm_ids = $confirmation_menu_list->needed_confirm_ids;
                                    $new_confirm_needed = $confirmation_menu_list->needed_confirm;
                                } else {
                                    $new_confirm_needed = $confirmation_menu_list->needed_confirm + 1;
                                    if($confirmation_menu_list->needed_confirm_ids == null){
                                        $new_needed_confirm_ids = '["'.$request->user_id.'"]';
                                    } else {
                                        $needed_confirm_ids = str_replace( array(  ']'), '', $confirmation_menu_list->needed_confirm_ids);
                                        $new_needed_confirm_ids = $needed_confirm_ids.',"'.$request->user_id.'"]';
                                    
                                    }
                                }
                            
                                //update "confirmation_menu_list" table
                                DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_reject_ens_request')->update(array('needed_confirm' => $new_confirm_needed, 'needed_confirm_ids' => $new_needed_confirm_ids,'needed_verify' => $new_verify_needed, 'needed_verify_ids' => $new_needed_verify_ids));
                            }
                        } 
                        // Checking [SKD Materials => SKD Queue List => Verify option] is not checked
                        else {
                            // Checking 'user_id' already exist in 'confirm_reject_ens_request' raw of 'needed_verify_ids' column
                            if(in_array($request->user_id, $new_confirmation_menu_list_verify_ids_arr)){
                                //remove user id from 'confirm_reject_ens_request' raw of 'confirmation_menu_list' table
                                if($confirmation_menu_list->needed_verify > 0) {
                                    $new_needed_verify = $confirmation_menu_list->needed_verify - 1;
                                } else {
                                    $new_needed_verify = $confirmation_menu_list->needed_verify;
                                }
                                
                                $needed_verify_ids = str_replace( array( '[', ']', '"' ), '', $confirmation_menu_list->needed_verify_ids);
                                $new_needed_verify_ids_arr = explode (",", $needed_verify_ids);
                                if (($key = array_search($request->user_id, $new_needed_verify_ids_arr)) !== false) {
                                    unset($new_needed_verify_ids_arr[$key]);
                                }

                                if(count($new_needed_verify_ids_arr) > 0){
                                    $needed_verify_id_text = '[';
                                    for($i = 0; $i < count($new_needed_verify_ids_arr); $i++){
                                        if($needed_verify_id_text == '['){
                                            $needed_verify_id_text = $needed_verify_id_text.'"'.$new_needed_verify_ids_arr[$i].'"';
                                        } else {
                                            $needed_verify_id_text = $needed_verify_id_text . ',"'.$new_needed_verify_ids_arr[$i].'"';
                                        }
                                    }
                                    $needed_verify_id_text = $needed_verify_id_text . ']';
                                } else {
                                    $needed_verify_id_text = Null;
                                }
                                
                                //update 'confirmation_menu_list' table
                                DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_reject_ens_request')->update(array('needed_verify' => $new_needed_verify, 'needed_verify_ids' => $needed_verify_id_text));

                                // Checking [SKD Materials => SKD Queue List => Confirm/Reject option] is checked
                                if($result['is_skd_ens_queue_confirmation']){
                                    if(in_array($request->user_id, $new_confirmation_menu_list_ids_arr)){
                                        // User id is already present
                                    } else {
                                        //confirm_reject_ens_request updated in "confirmation_menu_list" table inside database
                                        $new_confirm_needed = $confirmation_menu_list->needed_confirm + 1;
                                        if($confirmation_menu_list->needed_confirm_ids == null){
                                            $new_needed_confirm_ids = '["'.$request->user_id.'"]';
                                        } else {
                                            $needed_confirm_ids = str_replace( array(  ']'), '', $confirmation_menu_list->needed_confirm_ids);
                                            $new_needed_confirm_ids = $needed_confirm_ids.',"'.$request->user_id.'"]';
                                        
                                        }
                                        DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_reject_ens_request')->update(array('needed_confirm' => $new_confirm_needed, 'needed_confirm_ids' => $new_needed_confirm_ids));
                                    }
                                } 
                                // Checking [SKD Materials => SKD Queue List => Confirm/Reject option] is not checked
                                else {
                                    // Checking 'user_id' already exist in 'confirm_reject_ens_request' raw of 'needed_verify_ids' column
                                    if(in_array($request->user_id, $new_confirmation_menu_list_ids_arr)){
                                        //remove user id from 'confirm_reject_ens_request' raw of 'confirmation_menu_list' table
                                        if($confirmation_menu_list->needed_confirm > 0) {
                                            $new_confirm_needed = $confirmation_menu_list->needed_confirm - 1;
                                        } else {
                                            $new_confirm_needed = $confirmation_menu_list->needed_confirm;
                                        }
                                        $needed_confirm_ids = str_replace( array( '[', ']', '"' ), '', $confirmation_menu_list->needed_confirm_ids);
                                        $new_confirm_ids_arr = explode (",", $needed_confirm_ids);
                                        if (($key = array_search($request->user_id, $new_confirm_ids_arr)) !== false) {
                                            unset($new_confirm_ids_arr[$key]);
                                        }
            
                                        if(count($new_confirm_ids_arr) > 0){
                                            $confirm_id_text = '[';
                                            for($i = 0; $i < count($new_confirm_ids_arr); $i++){
                                                if($confirm_id_text == '['){
                                                    $confirm_id_text = $confirm_id_text.'"'.$new_confirm_ids_arr[$i].'"';
                                                } else {
                                                    $confirm_id_text = $confirm_id_text . ',"'.$new_confirm_ids_arr[$i].'"';
                                                }
                                            }
                                            $confirm_id_text = $confirm_id_text . ']';
                                        } else {
                                            $confirm_id_text = Null;
                                        }
                                        //update into database
                                        DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_reject_ens_request')->update(array('needed_confirm' => $new_confirm_needed, 'needed_confirm_ids' => $confirm_id_text));
                                    
                                    } else {
                                        // User id not present
                                    }
                                }


                            } 
                            // Checking 'user_id' not exist in 'confirm_reject_ens_request' raw of 'needed_verify_ids' column
                            else {
                                // Checking [SKD Materials => SKD Queue List => Confirm/Reject option] is checked
                                if($result['is_skd_ens_queue_confirmation']){
                                    // Checking 'user_id' already exist in 'confirm_reject_ens_request' raw of 'needed_verify_ids' column
                                    if(in_array($request->user_id, $new_confirmation_menu_list_ids_arr)){
                                        // User id is already present
                                    } 
                                    //=== User id is not present ===//
                                    else {
                                        //confirm_reject_ens_request updated in "confirmation_menu_list" table inside database
                                        $new_confirm_needed = $confirmation_menu_list->needed_confirm + 1;
                                        if($confirmation_menu_list->needed_confirm_ids == null){
                                            $new_needed_confirm_ids = '["'.$request->user_id.'"]';
                                        } else {
                                            $needed_confirm_ids = str_replace( array(  ']'), '', $confirmation_menu_list->needed_confirm_ids);
                                            $new_needed_confirm_ids = $needed_confirm_ids.',"'.$request->user_id.'"]';
                                        
                                        }
                                        DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_reject_ens_request')->update(array('needed_confirm' => $new_confirm_needed, 'needed_confirm_ids' => $new_needed_confirm_ids));
                                    }
                                } 
                                // Checking [SKD Materials => SKD Queue List => Confirm/Reject option] is not checked
                                else {
                                    // Checking 'user_id' already exist in 'confirm_reject_ens_request' raw of 'needed_verify_ids' column
                                    if(in_array($request->user_id, $new_confirmation_menu_list_ids_arr)){
                                        //remove user id from 'confirm_reject_ens_request' raw of 'confirmation_menu_list' table
                                        if($confirmation_menu_list->needed_confirm > 0) {
                                            $new_confirm_needed = $confirmation_menu_list->needed_confirm - 1;
                                        } else {
                                            $new_confirm_needed = $confirmation_menu_list->needed_confirm;
                                        }
                                        $needed_confirm_ids = str_replace( array( '[', ']', '"' ), '', $confirmation_menu_list->needed_confirm_ids);
                                        $new_confirm_ids_arr = explode (",", $needed_confirm_ids);
                                        if (($key = array_search($request->user_id, $new_confirm_ids_arr)) !== false) {
                                            unset($new_confirm_ids_arr[$key]);
                                        }
            
                                        if(count($new_confirm_ids_arr) > 0){
                                            $confirm_id_text = '[';
                                            for($i = 0; $i < count($new_confirm_ids_arr); $i++){
                                                if($confirm_id_text == '['){
                                                    $confirm_id_text = $confirm_id_text.'"'.$new_confirm_ids_arr[$i].'"';
                                                } else {
                                                    $confirm_id_text = $confirm_id_text . ',"'.$new_confirm_ids_arr[$i].'"';
                                                }
                                            }
                                            $confirm_id_text = $confirm_id_text . ']';
                                        } else {
                                            $confirm_id_text = Null;
                                        }
                                        //update into database
                                        DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_reject_ens_request')->update(array('needed_confirm' => $new_confirm_needed, 'needed_confirm_ids' => $confirm_id_text));
                                    } 
                                    // Checking 'user_id' not exist in 'confirm_reject_ens_request' raw of 'needed_verify_ids' column
                                    else {
                                        // User id is not present
                                    }
                                }
                            }
                        }

                    //<==========>// END Update/Add "confirm_reject_ens_request" raw values from "confirmation_menu_list" table //<==========>//

                    
                    //<==========>// START Update/Add "confirm_requisition_creation_proccess" raw values from "confirmation_menu_list" table //<==========>//
                        
                        // get 'confirmation_menu_list' table data from database for only 'confirm_requisition_creation_proccess' menu 
                        $confirmation_menu_list_requisition_creation_proccess = DB::table('confirmation_menu_list')->where('confirmation_name','confirm_requisition_creation_proccess')->select('needed_confirm','needed_confirm_ids','needed_verify','needed_verify_ids')->first();
                        
                        // convert 'needed_confirm_ids' values into Array
                        $confirmation_menu_list_requisition_creation_proccess_ids = str_replace( array( '[', ']', '"' ), '', $confirmation_menu_list_requisition_creation_proccess->needed_confirm_ids);
                        $new_confirmation_menu_list_requisition_creation_proccess_ids_arr = explode (",", $confirmation_menu_list_requisition_creation_proccess_ids);

                        // convert 'needed_verify_ids' values into Array
                        $confirmation_menu_list_requisition_creation_verify_ids = str_replace( array( '[', ']', '"' ), '', $confirmation_menu_list_requisition_creation_proccess->needed_verify_ids);
                        $new_confirmation_menu_list_requisition_creation_verify_ids_arr = explode (",", $confirmation_menu_list_requisition_creation_verify_ids);
                        
                        // Checking [Finish Products => Requisition Creation Process => Verify option] is checked 
                        if($result['is_requisition_creation_process_verify']) {
                            // Checking 'user_id' already exist in 'confirm_requisition_creation_proccess' raw of 'needed_verify_ids' column
                            if(in_array($request->user_id, $new_confirmation_menu_list_requisition_creation_verify_ids_arr)){
                                // User id is already present
                            }
                            //=== User id not present ===//
                            else {
                                //verify_requisition_creation_proccess updated in "confirmation_menu_list" table inside database
                                $new_requisition_creation_verify_needed = $confirmation_menu_list_requisition_creation_proccess->needed_verify + 1;
                                if($confirmation_menu_list_requisition_creation_proccess->needed_verify_ids == null){
                                    $new_needed_requisition_creation_verify_ids = '["'.$request->user_id.'"]';
                                } else {
                                    $needed_requisition_creation_verify_ids = str_replace( array(  ']'), '', $confirmation_menu_list_requisition_creation_proccess->needed_verify_ids);
                                    $new_needed_requisition_creation_verify_ids = $needed_requisition_creation_verify_ids.',"'.$request->user_id.'"]';
                                }

                                //'confirm_requisition_creation_proccess' updated in "confirmation_menu_list" table inside database
                                if(in_array($request->user_id, $new_confirmation_menu_list_requisition_creation_proccess_ids_arr)){
                                    $new_needed_requisition_creation_confirm_ids = $confirmation_menu_list_requisition_creation_proccess->needed_confirm_ids;
                                    $new_requisition_creation_confirm_needed = $confirmation_menu_list_requisition_creation_proccess->needed_confirm;
                                } else {
                                    $new_requisition_creation_confirm_needed = $confirmation_menu_list_requisition_creation_proccess->needed_confirm + 1;
                                    if($confirmation_menu_list_requisition_creation_proccess->needed_confirm_ids == null){
                                        $new_needed_requisition_creation_confirm_ids = '["'.$request->user_id.'"]';
                                    } else {
                                        $needed_requisition_creation_confirm_ids = str_replace( array(  ']'), '', $confirmation_menu_list_requisition_creation_proccess->needed_confirm_ids);
                                        $new_needed_requisition_creation_confirm_ids = $needed_requisition_creation_confirm_ids.',"'.$request->user_id.'"]';
                                    
                                    }
                                }
                            
                                //update "confirmation_menu_list" table
                                DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_requisition_creation_proccess')->update(array('needed_confirm' => $new_requisition_creation_confirm_needed, 'needed_confirm_ids' => $new_needed_requisition_creation_confirm_ids,'needed_verify' => $new_requisition_creation_verify_needed, 'needed_verify_ids' => $new_needed_requisition_creation_verify_ids));
                            }
                        } 
                        // Checking [Finish Products => Requisition Creation Process => Verify option] is not checked
                        else {
                            // Checking 'user_id' already exist in 'confirm_requisition_creation_proccess' raw of 'needed_verify_ids' column
                            if(in_array($request->user_id, $new_confirmation_menu_list_requisition_creation_verify_ids_arr)){
                                //remove user id from 'confirm_requisition_creation_proccess' raw of 'confirmation_menu_list' table
                                if($confirmation_menu_list_requisition_creation_proccess->needed_verify > 0) {
                                    $new_needed_requisition_creation_verify = $confirmation_menu_list_requisition_creation_proccess->needed_verify - 1;
                                } else {
                                    $new_needed_requisition_creation_verify = $confirmation_menu_list_requisition_creation_proccess->needed_verify;
                                }
                                
                                $needed_requisition_creation_verify_ids = str_replace( array( '[', ']', '"' ), '', $confirmation_menu_list_requisition_creation_proccess->needed_verify_ids);
                                $new_needed_requisition_creation_verify_ids_arr = explode (",", $needed_requisition_creation_verify_ids);
                                if (($key = array_search($request->user_id, $new_needed_requisition_creation_verify_ids_arr)) !== false) {
                                    unset($new_needed_requisition_creation_verify_ids_arr[$key]);
                                }

                                if(count($new_needed_requisition_creation_verify_ids_arr) > 0){
                                    $needed_requisition_creation_verify_id_text = '[';
                                    for($i = 0; $i < count($new_needed_requisition_creation_verify_ids_arr); $i++){
                                        if($needed_requisition_creation_verify_id_text == '['){
                                            $needed_requisition_creation_verify_id_text = $needed_requisition_creation_verify_id_text.'"'.$new_needed_requisition_creation_verify_ids_arr[$i].'"';
                                        } else {
                                            $needed_requisition_creation_verify_id_text = $needed_requisition_creation_verify_id_text . ',"'.$new_needed_requisition_creation_verify_ids_arr[$i].'"';
                                        }
                                    }
                                    $needed_requisition_creation_verify_id_text = $needed_requisition_creation_verify_id_text . ']';
                                } else {
                                    $needed_requisition_creation_verify_id_text = Null;
                                }
                                
                                //update 'confirmation_menu_list' table
                                DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_requisition_creation_proccess')->update(array('needed_verify' => $new_needed_requisition_creation_verify, 'needed_verify_ids' => $needed_requisition_creation_verify_id_text));

                                // Checking [Finish Products => Requisition Creation Process => Confirm/Reject option] is checked
                                if($result['is_requisition_creation_process_confirmation']){
                                    if(in_array($request->user_id, $new_confirmation_menu_list_requisition_creation_proccess_ids_arr)){
                                        // User id is already present
                                    } else {
                                        //confirm_requisition_creation_proccess updated in "confirmation_menu_list" table inside database
                                        $new_requisition_creation_confirm_needed = $confirmation_menu_list_requisition_creation_proccess->needed_confirm + 1;
                                        if($confirmation_menu_list_requisition_creation_proccess->needed_confirm_ids == null){
                                            $new_needed_requisition_creation_confirm_ids = '["'.$request->user_id.'"]';
                                        } else {
                                            $needed_requisition_creation_confirm_ids = str_replace( array(  ']'), '', $confirmation_menu_list_requisition_creation_proccess->needed_confirm_ids);
                                            $new_needed_requisition_creation_confirm_ids = $needed_requisition_creation_confirm_ids.',"'.$request->user_id.'"]';
                                        
                                        }
                                        DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_requisition_creation_proccess')->update(array('needed_confirm' => $new_requisition_creation_confirm_needed, 'needed_confirm_ids' => $new_needed_requisition_creation_confirm_ids));
                                    }
                                } 
                                // Checking [Finish Products => Requisition Creation Process => Confirm/Reject option] is not checked
                                else {
                                    // Checking 'user_id' already exist in 'confirm_requisition_creation_proccess' raw of 'needed_verify_ids' column
                                    if(in_array($request->user_id, $new_confirmation_menu_list_requisition_creation_proccess_ids_arr)){
                                        //remove user id from 'confirm_requisition_creation_proccess' raw of 'confirmation_menu_list' table
                                        if($confirmation_menu_list_requisition_creation_proccess->needed_confirm > 0) {
                                            $new_requisition_creation_confirm_needed = $confirmation_menu_list_requisition_creation_proccess->needed_confirm - 1;
                                        } else {
                                            $new_requisition_creation_confirm_needed = $confirmation_menu_list_requisition_creation_proccess->needed_confirm;
                                        }
                                        $needed_requisition_creation_confirm_ids = str_replace( array( '[', ']', '"' ), '', $confirmation_menu_list_requisition_creation_proccess->needed_confirm_ids);
                                        $new_requisition_creation_confirm_ids_arr = explode (",", $needed_requisition_creation_confirm_ids);
                                        if (($key = array_search($request->user_id, $new_requisition_creation_confirm_ids_arr)) !== false) {
                                            unset($new_requisition_creation_confirm_ids_arr[$key]);
                                        }
            
                                        if(count($new_requisition_creation_confirm_ids_arr) > 0){
                                            $requisition_creation_confirm_id_text = '[';
                                            for($i = 0; $i < count($new_requisition_creation_confirm_ids_arr); $i++){
                                                if($requisition_creation_confirm_id_text == '['){
                                                    $requisition_creation_confirm_id_text = $requisition_creation_confirm_id_text.'"'.$new_requisition_creation_confirm_ids_arr[$i].'"';
                                                } else {
                                                    $requisition_creation_confirm_id_text = $requisition_creation_confirm_id_text . ',"'.$new_requisition_creation_confirm_ids_arr[$i].'"';
                                                }
                                            }
                                            $requisition_creation_confirm_id_text = $requisition_creation_confirm_id_text . ']';
                                        } else {
                                            $requisition_creation_confirm_id_text = Null;
                                        }
                                        //update into database
                                        DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_requisition_creation_proccess')->update(array('needed_confirm' => $new_requisition_creation_confirm_needed, 'needed_confirm_ids' => $requisition_creation_confirm_id_text));
                                    
                                    } else {
                                        // User id not present
                                    }
                                }


                            } 
                            // Checking 'user_id' not exist in 'confirm_requisition_creation_proccess' raw of 'needed_verify_ids' column
                            else {
                                // Checking [Finish Products => Requisition Creation Process => Confirm/Reject option] is checked
                                if($result['is_requisition_creation_process_confirmation']){
                                    // Checking 'user_id' already exist in 'confirm_requisition_creation_proccess' raw of 'needed_verify_ids' column
                                    if(in_array($request->user_id, $new_confirmation_menu_list_requisition_creation_proccess_ids_arr)){
                                        // User id is already present
                                    } 
                                    //=== User id is not present ===//
                                    else {
                                        //'confirm_requisition_creation_proccess' updated in "confirmation_menu_list" table inside database
                                        $new_requisition_creation_confirm_needed = $confirmation_menu_list_requisition_creation_proccess->needed_confirm + 1;
                                        if($confirmation_menu_list_requisition_creation_proccess->needed_confirm_ids == null){
                                            $new_needed_requisition_creation_confirm_ids = '["'.$request->user_id.'"]';
                                        } else {
                                            $needed_requisition_creation_confirm_ids = str_replace( array(  ']'), '', $confirmation_menu_list_requisition_creation_proccess->needed_confirm_ids);
                                            $new_needed_requisition_creation_confirm_ids = $needed_requisition_creation_confirm_ids.',"'.$request->user_id.'"]';
                                        
                                        }
                                        DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_requisition_creation_proccess')->update(array('needed_confirm' => $new_requisition_creation_confirm_needed, 'needed_confirm_ids' => $new_needed_requisition_creation_confirm_ids));
                                    }
                                } 
                                // Checking [Finish Products => Requisition Creation Process => Confirm/Reject option] is not checked
                                else {
                                    // Checking 'user_id' already exist in 'confirm_requisition_creation_proccess' raw of 'needed_verify_ids' column
                                    if(in_array($request->user_id, $new_confirmation_menu_list_requisition_creation_proccess_ids_arr)){
                                        //remove user id from 'confirm_requisition_creation_proccess' raw of 'confirmation_menu_list' table
                                        if($confirmation_menu_list_requisition_creation_proccess->needed_confirm > 0) {
                                            $new_requisition_creation_confirm_needed = $confirmation_menu_list_requisition_creation_proccess->needed_confirm - 1;
                                        } else {
                                            $new_requisition_creation_confirm_needed = $confirmation_menu_list_requisition_creation_proccess->needed_confirm;
                                        }
                                        $needed_requisition_creation_confirm_ids = str_replace( array( '[', ']', '"' ), '', $confirmation_menu_list_requisition_creation_proccess->needed_confirm_ids);
                                        $new_requisition_creation_confirm_ids_arr = explode (",", $needed_requisition_creation_confirm_ids);
                                        if (($key = array_search($request->user_id, $new_requisition_creation_confirm_ids_arr)) !== false) {
                                            unset($new_requisition_creation_confirm_ids_arr[$key]);
                                        }
            
                                        if(count($new_requisition_creation_confirm_ids_arr) > 0){
                                            $requisition_creation_confirm_id_text = '[';
                                            for($i = 0; $i < count($new_requisition_creation_confirm_ids_arr); $i++){
                                                if($requisition_creation_confirm_id_text == '['){
                                                    $requisition_creation_confirm_id_text = $requisition_creation_confirm_id_text.'"'.$new_requisition_creation_confirm_ids_arr[$i].'"';
                                                } else {
                                                    $requisition_creation_confirm_id_text = $requisition_creation_confirm_id_text . ',"'.$new_requisition_creation_confirm_ids_arr[$i].'"';
                                                }
                                            }
                                            $requisition_creation_confirm_id_text = $requisition_creation_confirm_id_text . ']';
                                        } else {
                                            $requisition_creation_confirm_id_text = Null;
                                        }
                                        //update into database
                                        DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_requisition_creation_proccess')->update(array('needed_confirm' => $new_requisition_creation_confirm_needed, 'needed_confirm_ids' => $requisition_creation_confirm_id_text));
                                    } 
                                    // Checking 'user_id' not exist in 'confirm_requisition_creation_proccess' raw of 'needed_verify_ids' column
                                    else {
                                        // User id is not present
                                    }
                                }
                            }
                        }

                    //<==========>// END Update/Add "confirm_requisition_creation_proccess" raw values from "confirmation_menu_list" table //<==========>//


                    //<==========>// START Update/Add "confirm_requisition_stockin_process" raw values from "confirmation_menu_list" table //<==========>//
                        
                        // get 'confirmation_menu_list' table data from database for only 'confirm_requisition_stockin_process' menu 
                        $confirmation_menu_list_requisition_stockin_proccess = DB::table('confirmation_menu_list')->where('confirmation_name','confirm_requisition_stockin_process')->select('needed_confirm','needed_confirm_ids','needed_verify','needed_verify_ids')->first();
                        
                        // convert 'needed_confirm_ids' values into Array
                        $confirmation_menu_list_requisition_stockin_proccess_ids = str_replace( array( '[', ']', '"' ), '', $confirmation_menu_list_requisition_stockin_proccess->needed_confirm_ids);
                        $new_confirmation_menu_list_requisition_stockin_proccess_ids_arr = explode (",", $confirmation_menu_list_requisition_stockin_proccess_ids);

                        // convert 'needed_verify_ids' values into Array
                        $confirmation_menu_list_requisition_stockin_verify_ids = str_replace( array( '[', ']', '"' ), '', $confirmation_menu_list_requisition_stockin_proccess->needed_verify_ids);
                        $new_confirmation_menu_list_requisition_stockin_verify_ids_arr = explode (",", $confirmation_menu_list_requisition_stockin_verify_ids);
                        
                        // Checking [Finish Products => Requisition Stockin => Verify option] is checked 
                        if($result['is_requisition_stockin_verify']) {
                            // Checking 'user_id' already exist in 'confirm_requisition_stockin_process' raw of 'needed_verify_ids' column
                            if(in_array($request->user_id, $new_confirmation_menu_list_requisition_stockin_verify_ids_arr)){
                                // User id is already present
                            }
                            //=== User id not present ===//
                            else {
                                //confirm_requisition_stockin_process updated in "confirmation_menu_list" table inside database
                                $new_requisition_stockin_verify_needed = $confirmation_menu_list_requisition_stockin_proccess->needed_verify + 1;
                                if($confirmation_menu_list_requisition_stockin_proccess->needed_verify_ids == null){
                                    $new_needed_requisition_stockin_verify_ids = '["'.$request->user_id.'"]';
                                } else {
                                    $needed_requisition_stockin_verify_ids = str_replace( array(  ']'), '', $confirmation_menu_list_requisition_stockin_proccess->needed_verify_ids);
                                    $new_needed_requisition_stockin_verify_ids = $needed_requisition_stockin_verify_ids.',"'.$request->user_id.'"]';
                                }

                                //'confirm_requisition_stockin_process' updated in "confirmation_menu_list" table inside database
                                if(in_array($request->user_id, $new_confirmation_menu_list_requisition_stockin_verify_ids_arr)){
                                    $new_needed_requisition_stockin_confirm_ids = $confirmation_menu_list_requisition_stockin_proccess->needed_confirm_ids;
                                    $new_requisition_stockin_confirm_needed = $confirmation_menu_list_requisition_stockin_proccess->needed_confirm;
                                } else {
                                    $new_requisition_stockin_confirm_needed = $confirmation_menu_list_requisition_stockin_proccess->needed_confirm + 1;
                                    if($confirmation_menu_list_requisition_stockin_proccess->needed_confirm_ids == null){
                                        $new_needed_requisition_stockin_confirm_ids = '["'.$request->user_id.'"]';
                                    } else {
                                        $needed_requisition_stockin_confirm_ids = str_replace( array(  ']'), '', $confirmation_menu_list_requisition_stockin_proccess->needed_confirm_ids);
                                        $new_needed_requisition_stockin_confirm_ids = $needed_requisition_stockin_confirm_ids.',"'.$request->user_id.'"]';
                                    
                                    }
                                }
                            
                                //update "confirmation_menu_list" table
                                DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_requisition_stockin_process')->update(array('needed_confirm' => $new_requisition_stockin_confirm_needed, 'needed_confirm_ids' => $new_needed_requisition_stockin_confirm_ids,'needed_verify' => $new_requisition_stockin_verify_needed, 'needed_verify_ids' => $new_needed_requisition_stockin_verify_ids));
                            }
                        } 
                        // Checking [Finish Products => Requisition Stockin => Verify option] is not checked
                        else {
                            // Checking 'user_id' already exist in 'confirm_requisition_stockin_process' raw of 'needed_verify_ids' column
                            if(in_array($request->user_id, $new_confirmation_menu_list_requisition_stockin_verify_ids_arr)){
                                //remove user id from 'confirm_requisition_stockin_process' raw of 'confirmation_menu_list' table
                                if($confirmation_menu_list_requisition_stockin_proccess->needed_verify > 0) {
                                    $new_needed_requisition_stockin_verify = $confirmation_menu_list_requisition_stockin_proccess->needed_verify - 1;
                                } else {
                                    $new_needed_requisition_stockin_verify = $confirmation_menu_list_requisition_stockin_proccess->needed_verify;
                                }
                                
                                $needed_requisition_stockin_verify_ids = str_replace( array( '[', ']', '"' ), '', $confirmation_menu_list_requisition_stockin_proccess->needed_verify_ids);
                                $new_needed_requisition_stockin_verify_ids_arr = explode (",", $needed_requisition_stockin_verify_ids);
                                if (($key = array_search($request->user_id, $new_needed_requisition_stockin_verify_ids_arr)) !== false) {
                                    unset($new_needed_requisition_stockin_verify_ids_arr[$key]);
                                }

                                if(count($new_needed_requisition_stockin_verify_ids_arr) > 0){
                                    $needed_requisition_stockin_verify_id_text = '[';
                                    for($i = 0; $i < count($new_needed_requisition_stockin_verify_ids_arr); $i++){
                                        if($needed_requisition_stockin_verify_id_text == '['){
                                            $needed_requisition_stockin_verify_id_text = $needed_requisition_stockin_verify_id_text.'"'.$new_needed_requisition_stockin_verify_ids_arr[$i].'"';
                                        } else {
                                            $needed_requisition_stockin_verify_id_text = $needed_requisition_stockin_verify_id_text . ',"'.$new_needed_requisition_stockin_verify_ids_arr[$i].'"';
                                        }
                                    }
                                    $needed_requisition_stockin_verify_id_text = $needed_requisition_stockin_verify_id_text . ']';
                                } else {
                                    $needed_requisition_stockin_verify_id_text = Null;
                                }
                                
                                //update 'confirmation_menu_list' table
                                DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_requisition_stockin_process')->update(array('needed_verify' => $new_needed_requisition_stockin_verify, 'needed_verify_ids' => $needed_requisition_stockin_verify_id_text));

                                // Checking [Finish Products => Requisition Stockin Process => Confirm/Reject option] is checked
                                if($result['is_requisition_stockin_confirmation']){
                                    if(in_array($request->user_id, $new_confirmation_menu_list_requisition_stockin_proccess_ids_arr)){
                                        // User id is already present
                                    } else {
                                        //confirm_requisition_stockin_proccess updated in "confirmation_menu_list" table inside database
                                        $new_requisition_stockin_confirm_needed = $confirmation_menu_list_requisition_stockin_proccess->needed_confirm + 1;
                                        if($confirmation_menu_list_requisition_stockin_proccess->needed_confirm_ids == null){
                                            $new_needed_requisition_stockin_confirm_ids = '["'.$request->user_id.'"]';
                                        } else {
                                            $needed_requisition_stockin_confirm_ids = str_replace( array(  ']'), '', $confirmation_menu_list_requisition_stockin_proccess->needed_confirm_ids);
                                            $new_needed_requisition_stockin_confirm_ids = $needed_requisition_stockin_confirm_ids.',"'.$request->user_id.'"]';
                                        
                                        }
                                        DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_requisition_stockin_process')->update(array('needed_confirm' => $new_requisition_stockin_confirm_needed, 'needed_confirm_ids' => $new_needed_requisition_stockin_confirm_ids));
                                    }
                                } 
                                // Checking [Finish Products => Requisition Stockin Process => Confirm/Reject option] is not checked
                                else {
                                    // Checking 'user_id' already exist in 'confirm_requisition_stockin_process' raw of 'confirmation_menu_list' table
                                    if(in_array($request->user_id, $new_confirmation_menu_list_requisition_stockin_proccess_ids_arr)){
                                        //remove user id from 'confirm_requisition_stockin_process' raw of 'confirmation_menu_list' table
                                        if($confirmation_menu_list_requisition_stockin_proccess->needed_confirm > 0) {
                                            $new_requisition_stockin_confirm_needed = $confirmation_menu_list_requisition_stockin_proccess->needed_confirm - 1;
                                        } else {
                                            $new_requisition_stockin_confirm_needed = $confirmation_menu_list_requisition_stockin_proccess->needed_confirm;
                                        }
                                        $needed_requisition_stockin_confirm_ids = str_replace( array( '[', ']', '"' ), '', $confirmation_menu_list_requisition_stockin_proccess->needed_confirm_ids);
                                        $new_requisition_stockin_confirm_ids_arr = explode (",", $needed_requisition_stockin_confirm_ids);
                                        if (($key = array_search($request->user_id, $new_requisition_stockin_confirm_ids_arr)) !== false) {
                                            unset($new_requisition_stockin_confirm_ids_arr[$key]);
                                        }
            
                                        if(count($new_requisition_stockin_confirm_ids_arr) > 0){
                                            $requisition_stockin_confirm_id_text = '[';
                                            for($i = 0; $i < count($new_requisition_stockin_confirm_ids_arr); $i++){
                                                if($requisition_stockin_confirm_id_text == '['){
                                                    $requisition_stockin_confirm_id_text = $requisition_stockin_confirm_id_text.'"'.$new_requisition_stockin_confirm_ids_arr[$i].'"';
                                                } else {
                                                    $requisition_stockin_confirm_id_text = $requisition_stockin_confirm_id_text . ',"'.$new_requisition_stockin_confirm_ids_arr[$i].'"';
                                                }
                                            }
                                            $requisition_stockin_confirm_id_text = $requisition_stockin_confirm_id_text . ']';
                                        } else {
                                            $requisition_stockin_confirm_id_text = Null;
                                        }
                                        //update into database
                                        DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_requisition_stockin_process')->update(array('needed_confirm' => $new_requisition_stockin_confirm_needed, 'needed_confirm_ids' => $requisition_stockin_confirm_id_text));
                                    
                                    } else {
                                        // User id not present
                                    }
                                }


                            } 
                            // Checking 'user_id' not exist in 'confirm_requisition_stockin_process' raw of 'confirmation_menu_list' table
                            else {
                                // Checking [Finish Products => Requisition Stockin Process => Confirm/Reject option] is checked
                                if($result['is_requisition_stockin_confirmation']){
                                    // Checking 'user_id' already exist in 'confirm_requisition_stockin_process' raw of 'needed_verify_ids' column
                                    if(in_array($request->user_id, $new_confirmation_menu_list_requisition_stockin_proccess_ids_arr)){
                                        // User id is already present
                                    } 
                                    //=== User id is not present ===//
                                    else {
                                        //'confirm_requisition_stockin_process' updated in "confirmation_menu_list" table inside database
                                        $new_requisition_stockin_confirm_needed = $confirmation_menu_list_requisition_stockin_proccess->needed_confirm + 1;
                                        if($confirmation_menu_list_requisition_stockin_proccess->needed_confirm_ids == null){
                                            $new_needed_requisition_stockin_confirm_ids = '["'.$request->user_id.'"]';
                                        } else {
                                            $needed_requisition_stockin_confirm_ids = str_replace( array(  ']'), '', $confirmation_menu_list_requisition_stockin_proccess->needed_confirm_ids);
                                            $new_needed_requisition_stockin_confirm_ids = $needed_requisition_stockin_confirm_ids.',"'.$request->user_id.'"]';
                                        
                                        }
                                        DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_requisition_stockin_process')->update(array('needed_confirm' => $new_requisition_stockin_confirm_needed, 'needed_confirm_ids' => $new_needed_requisition_stockin_confirm_ids));
                                    }
                                } 
                                // Checking [Finish Products => Requisition Stockin Process => Confirm/Reject option] is not checked
                                else {
                                    // Checking 'user_id' already exist in 'confirm_requisition_stockin_process' raw of 'needed_verify_ids' column
                                    if(in_array($request->user_id, $new_confirmation_menu_list_requisition_stockin_proccess_ids_arr)){
                                        //remove user id from 'confirm_requisition_stockin_process' raw of 'confirmation_menu_list' table
                                        if($confirmation_menu_list_requisition_stockin_proccess->needed_confirm > 0) {
                                            $new_requisition_stockin_confirm_needed = $confirmation_menu_list_requisition_stockin_proccess->needed_confirm - 1;
                                        } else {
                                            $new_requisition_stockin_confirm_needed = $confirmation_menu_list_requisition_stockin_proccess->needed_confirm;
                                        }
                                        $needed_requisition_stockin_confirm_ids = str_replace( array( '[', ']', '"' ), '', $confirmation_menu_list_requisition_stockin_proccess->needed_confirm_ids);
                                        $new_requisition_stockin_confirm_ids_arr = explode (",", $needed_requisition_stockin_confirm_ids);
                                        if (($key = array_search($request->user_id, $new_requisition_stockin_confirm_ids_arr)) !== false) {
                                            unset($new_requisition_stockin_confirm_ids_arr[$key]);
                                        }
            
                                        if(count($new_requisition_stockin_confirm_ids_arr) > 0){
                                            $requisition_stockin_confirm_id_text = '[';
                                            for($i = 0; $i < count($new_requisition_stockin_confirm_ids_arr); $i++){
                                                if($requisition_stockin_confirm_id_text == '['){
                                                    $requisition_stockin_confirm_id_text = $requisition_stockin_confirm_id_text.'"'.$new_requisition_stockin_confirm_ids_arr[$i].'"';
                                                } else {
                                                    $requisition_stockin_confirm_id_text = $requisition_stockin_confirm_id_text . ',"'.$new_requisition_stockin_confirm_ids_arr[$i].'"';
                                                }
                                            }
                                            $requisition_stockin_confirm_id_text = $requisition_stockin_confirm_id_text . ']';
                                        } else {
                                            $requisition_stockin_confirm_id_text = Null;
                                        }
                                        //update into database
                                        DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_requisition_stockin_process')->update(array('needed_confirm' => $new_requisition_stockin_confirm_needed, 'needed_confirm_ids' => $requisition_stockin_confirm_id_text));
                                    } 
                                    // Checking 'user_id' not exist in 'confirm_requisition_creation_proccess' raw of 'needed_verify_ids' column
                                    else {
                                        // User id is not present
                                    }
                                }
                            }
                        }

                    //<==========>// END Update/Add "confirm_requisition_stockin_process" raw values from "confirmation_menu_list" table //<==========>//

                    //Get all active super admin and admin user details from database
                    $admins = User::whereIn('user_type',  ['super_admin','admin'])->where('status','!=','2')->get();

                    //<==========>// Start create all active admin users list table in html//<==========>//
                    $html='';
                    foreach($admins as $admin){
                        $html = $html . '<tr><td></td><td class="text-start pe-0"><span class="fw-bolder">'.$admin['name'].'</span></td><td class="text-start pe-0"><span class="fw-bolder">'.$admin['email'].'</span></td>
                        <td class="text-start pe-0" data-order="47"><span class="fw-bolder ms-3">'.$admin['designation'].'</span></td>
                        <td class="text-start pe-0"><div class="fw-bolder ">'.date('d M Y',strtotime($admin['created_at'])).'</div></td>
                        <td class="text-start pe-0" data-order="rating-3">';

                        if($admin['status'] == 0){
                            $html = $html . '<div class="badge badge-light-danger">Deactive</div></td>';
                        } elseif ($admin['status'] == 1) {
                            $html = $html . '<div class="badge badge-light-success">Active</div></td>';
                        }
                                    

                        
                        $html = $html . '<td class="" data-order="0"></td><td class="text-start"><div class=""><button type="button" class="btn menu-link px-3" onclick="getUserPermission('.$admin['id'].')"><i class="fa-solid fa-pen-to-square text-primary" data-toggle="tooltip" data-placement="bottom" title="Edit"></i></button>
                        <button type="button" class="btn menu-link px-3" onclick="removeUserPermission('.$admin['id'].')"><i class="fa-solid fa-trash-can text-danger" data-toggle="tooltip" data-placement="bottom" title="Remove"></i></button></div></td></tr>';
                    
                    }
                    //<==========>// End create all active admin users list table in html//<==========>//
                    
                    //Return this html with json response
                    return response()->json(['status'=>'success', 'html' => $html]);

                }
            }
            //If no user found from database with given email
            else {
                // Get User Current Scopes from Add User Permission Form
                $result = $this->getPermissionScopes($request->permission_scopes);

                //<==========>// Start User Data Saved Into Database //<==========>//
                $user = new User();
                $user->name = $request->full_name;
                $user->email= $request->email;
                if($request->password){
                    $pw = $request->password;
                } else {
                    $pw = '123456789';
                }
                $user->password = Hash::make($pw);
                $user->designation = $request->designation;
                if($result['is_super_admin']) {
                    $user->user_type = 'super_admin';
                } else {
                    $user->user_type = 'admin';
                }
                $user->user_type_status = 'reg';
                $user->email_verified = 1;
                $user->role_as = 1;
                $user->scopes = $result['scopes'];
                $user->save();
                //<==========>// End User Data Saved Into Database //<==========>//

                // Get last user id which is saved into database
                $last_user_id = $user->id;

                //<==========>// START Update/Add "confirm_reject_ens_request" raw values from "confirmation_menu_list" table //<==========>//

                    // get 'confirmation_menu_list' table data from database for only 'confirm_reject_ens_request' menu 
                    $confirmation_menu_list = DB::table('confirmation_menu_list')->where('confirmation_name','confirm_reject_ens_request')->select('needed_confirm','needed_confirm_ids','needed_verify','needed_verify_ids')->first();

                    // Checking [SKD Materials => SKD Queue List => Confirm/Reject option] is checked or not checked 
                    if($result['is_skd_ens_queue_confirmation']){
                        $new_confirm_needed = $confirmation_menu_list->needed_confirm + 1;
                        if($confirmation_menu_list->needed_confirm_ids == null){
                            $new_needed_confirm_ids = '["'.$last_user_id.'"]';
                        } else {
                            $needed_confirm_ids = str_replace( array(  ']'), '', $confirmation_menu_list->needed_confirm_ids);
                            $new_needed_confirm_ids = $needed_confirm_ids.',"'.$last_user_id.'"]'; 
                        }
                    } else {
                        $new_confirm_needed = $confirmation_menu_list->needed_confirm;
                        $new_needed_confirm_ids = $confirmation_menu_list->needed_confirm_ids;
                    }

                    // Checking [SKD Materials => SKD Queue List => Verify option] is checked or not checked 
                    if($result['is_skd_ens_verify']){
                        $new_verify_needed = $confirmation_menu_list->needed_verify + 1;
                        if($confirmation_menu_list->needed_verify_ids == null){
                            $new_needed_verify_ids = '["'.$last_user_id.'"]';
                        } else {
                            $needed_verify_ids = str_replace( array(  ']'), '', $confirmation_menu_list->needed_verify_ids);
                            $new_needed_verify_ids = $needed_verify_ids.',"'.$last_user_id.'"]';
                        
                        }
                    } else {
                        $new_verify_needed = $confirmation_menu_list->needed_verify;
                        $new_needed_verify_ids = $confirmation_menu_list->needed_verify_ids;
                    }

                    // Update 'confirmation_menu_list' table data into database
                    DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_reject_ens_request')->update(array('needed_confirm' => $new_confirm_needed, 'needed_confirm_ids' => $new_needed_confirm_ids, 'needed_verify'=>$new_verify_needed, 'needed_verify_ids'=>$new_needed_verify_ids));

                //<==========>// END Update/Add "confirm_reject_ens_request" raw values from "confirmation_menu_list" table //<==========>//

                //<==========>// Start checking internet connection for sending email //<==========>//
                if($this->isOnline()){
                    //Mail data set
                    $mail_data = [
                        'recipient' => env('MAIL_FOR_INFO'), //get email
                        'fromEmail' => $request->email,
                        'fromName' => $request->full_name,
                        'fromPass' => $pw,
                        'subject'=> 'Qbits Login Credentials'
        
                    ];
                    try {
                        //Mail Send with login credential to new user/employee
                        \Mail::send('emails.login-credential',$mail_data,function($message) use($mail_data){
                            $message->to($mail_data['fromEmail'])
                            ->from($mail_data['recipient'],'Qbits')              
                            ->subject($mail_data['subject']);
                        });
                    } catch (\Exception $e) {
            
                    }
                
                } else {
                    return redirect()->back()->withInput()->with('error', 'Check your internet');
                }
                //<==========>// End checking internet connection for sending email //<==========>//

                //Get all active super admin and admin user details from database
                $admins = User::whereIn('user_type',  ['super_admin','admin'])->where('status','!=','2')->get();

                //<==========>// Start create all active admin users list table in html//<==========>//
                $html='';
                foreach($admins as $admin){
                    $html = $html . '<tr><td></td><td class="text-start pe-0"><span class="fw-bolder">'.$admin['name'].'</span></td><td class="text-start pe-0"><span class="fw-bolder">'.$admin['email'].'</span></td>
                                        <td class="text-start pe-0" data-order="47"><span class="fw-bolder ms-3">'.$admin['designation'].'</span></td>
                                        <td class="text-start pe-0"><div class="fw-bolder ">'.date('d M Y',strtotime($admin['created_at'])).'</div></td>
                                        <td class="text-start pe-0" data-order="rating-3">';
                                        
                    if($admin['status'] == 0){
                        $html = $html . '<div class="badge badge-light-danger">Deactive</div></td>';
                    } elseif ($admin['status'] == 1) {
                        $html = $html . '<div class="badge badge-light-success">Active</div></td>';
                    }
                                

                    $html = $html . '<td class="" data-order="0"></td><td class="text-start"><div class=""><button type="button" class="btn menu-link px-3" onclick="getUserPermission('.$admin['id'].')"><i class="fa-solid fa-pen-to-square text-primary" data-toggle="tooltip" data-placement="bottom" title="Edit"></i></button>
                    <button type="button" class="btn menu-link px-3" onclick="removeUserPermission('.$admin['id'].')"><i class="fa-solid fa-trash-can text-danger" data-toggle="tooltip" data-placement="bottom" title="Remove"></i></button></div></td></tr>';
                }
                //<==========>// End create all active admin users list table in html//<==========>//
                    
                //Return this html with json response
                return response()->json(['status'=>'success', 'html' => $html]);
            }
            
        } 
        // After not pass all validation
        else {
            return response()->json(['status'=>'error','errors'=>$validator->messages()]);
        }

    }


    //Use this function for get user permission scope values from database
    public function get_user_permission(Request $request) {
        $user= User::where('id',$request->user_id)->first();
        //Convert permission scopes into Array
        $res = str_replace( array( '[', ']', '"' ), '', $user['scopes']);
        $all_permission_arr = explode (",", $res);
        $user_dependency = $this->check_permission_any_dependency($request->user_id);
        return response()->json(['status'=>'success','user'=>$user, 'permissions'=>$all_permission_arr, 'is_user_dependency'=>$user_dependency['is_dependency'], 'ens_verify_remaining' => $user_dependency['ens_verify_remaining'], 'requisition_creation_process_verify_remaining' => $user_dependency['requisition_creation_process_verify_remaining'], 'requisition_stockin_process_verify_remaining' => $user_dependency['requisition_stockin_process_verify_remaining']]);
    }

    //Use this function for checking internet connection
    public function isOnline($site = "https://youtube.com"){
        if(@fopen($site, "r")){
            return true;
        }else{
            return false;
        }
    }

    //Use this function for user 'Disable' or 'Remove'
    public function user_remove_disable(Request $request) {
        //get user all dependency
        $user_dependency = $this->check_permission_any_dependency($request->userId);

        //User have any dependency
        if($user_dependency['is_dependency']){
            return response()->json(['status'=>'error','user_dependency'=>$user_dependency['is_dependency'],'ens_verify_remaining' => $user_dependency['ens_verify_remaining'], 'requisition_creation_process_verify_remaining' => $user_dependency['requisition_creation_process_verify_remaining'], 'requisition_stockin_process_verify_remaining' => $user_dependency['requisition_stockin_process_verify_remaining']]);
        }
        //User have not any dependency
        else {

            //get 'confirmation_menu_list' table data from database for only 'confirm_reject_ens_request' menu 
            $confirmation_menu_confirm_reject_ens_request = DB::table('confirmation_menu_list')->where('confirmation_name','confirm_reject_ens_request')->select('needed_confirm','needed_confirm_ids','needed_verify','needed_verify_ids')->first();

            //get 'confirmation_menu_list' table data from database for only 'confirm_requisition_creation_proccess' menu
            $confirmation_menu_confirm_requisition_creation_proccess = DB::table('confirmation_menu_list')->where('confirmation_name','confirm_requisition_creation_proccess')->select('needed_confirm','needed_confirm_ids','needed_verify','needed_verify_ids')->first();

            //get 'confirmation_menu_list' table data from database for only 'confirm_requisition_stockin_process' menu
            $confirmation_menu_confirm_requisition_stockin_process = DB::table('confirmation_menu_list')->where('confirmation_name','confirm_requisition_stockin_process')->select('needed_confirm','needed_confirm_ids','needed_verify','needed_verify_ids')->first();
           


            //<==========>// START [SKD Materials => SKD Queue List] //<==========>//

                //<==========>// Start remove user id from 'confirm_reject_ens_request' raw of 'needed_confirm_ids' column inside 'confirmation_menu_list' table //<==========>//

                    //convert needed confirm users id into array
                    $confirmation_menu_confirm_reject_ens_request_ids = str_replace( array( '[', ']', '"' ), '', $confirmation_menu_confirm_reject_ens_request->needed_confirm_ids);
                    $new_confirmation_menu_confirm_reject_ens_request_ids_arr = explode (",", $confirmation_menu_confirm_reject_ens_request_ids);
                    
                    // Checking user id is already exist in 'confirm_reject_ens_request' raw of 'needed_verify_ids' column
                    if(in_array($request->userId,$new_confirmation_menu_confirm_reject_ens_request_ids_arr)){
                        //remove user id from 'confirm_reject_ens_request' raw of 'confirmation_menu_list' table
                        if($confirmation_menu_confirm_reject_ens_request->needed_confirm > 0) {
                            $new_confirm_needed = $confirmation_menu_confirm_reject_ens_request->needed_confirm - 1;
                        } else {
                            $new_confirm_needed = $confirmation_menu_confirm_reject_ens_request->needed_confirm;
                        }
                        if (($key = array_search($request->userId, $new_confirmation_menu_confirm_reject_ens_request_ids_arr)) !== false) {
                            unset($new_confirmation_menu_confirm_reject_ens_request_ids_arr[$key]);
                        }

                        if(count($new_confirmation_menu_confirm_reject_ens_request_ids_arr) > 0){
                            $confirm_id_text = '[';
                            for($i = 0; $i < count($new_confirmation_menu_confirm_reject_ens_request_ids_arr); $i++){
                                if($confirm_id_text == '['){
                                    $confirm_id_text = $confirm_id_text.'"'.$new_confirmation_menu_confirm_reject_ens_request_ids_arr[$i].'"';
                                } else {
                                    $confirm_id_text = $confirm_id_text . ',"'.$new_confirmation_menu_confirm_reject_ens_request_ids_arr[$i].'"';
                                }
                            }
                            $confirm_id_text = $confirm_id_text . ']';
                        } else {
                            $confirm_id_text = Null;
                        }
                        
                        //update into database
                        DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_reject_ens_request')->update(array('needed_confirm' => $new_confirm_needed, 'needed_confirm_ids' => $confirm_id_text));
                    }

                //<==========>// END remove user id from 'confirm_reject_ens_request' raw of 'needed_confirm_ids' column inside 'confirmation_menu_list' table //<==========>//


                //<==========>// Start remove user id from 'confirm_reject_ens_request' raw of 'needed_verify_ids' column inside 'confirmation_menu_list' table //<==========>//
                
                    // convert 'needed_verify_ids' values into Array
                    $confirmation_menu_ens_request_verify_ids = str_replace( array( '[', ']', '"' ), '', $confirmation_menu_confirm_reject_ens_request->needed_verify_ids);
                    $new_confirmation_menu_ens_request_verify_ids_arr = explode (",", $confirmation_menu_ens_request_verify_ids);
                    
                    // Checking 'user_id' already exist in 'confirm_reject_ens_request' raw of 'needed_verify_ids' column
                    if(in_array($request->userId, $new_confirmation_menu_ens_request_verify_ids_arr)){

                        //remove user id from 'confirm_reject_ens_request' raw of 'confirmation_menu_list' table
                        if($confirmation_menu_confirm_reject_ens_request->needed_verify > 0) {
                            $new_needed_verify = $confirmation_menu_confirm_reject_ens_request->needed_verify - 1;
                        } else {
                            $new_needed_verify = $confirmation_menu_confirm_reject_ens_request->needed_verify;
                        }
                        
                        $needed_verify_ids = str_replace( array( '[', ']', '"' ), '', $confirmation_menu_confirm_reject_ens_request->needed_verify_ids);
                        $new_needed_verify_ids_arr = explode (",", $needed_verify_ids);
                        if (($key = array_search($request->userId, $new_needed_verify_ids_arr)) !== false) {
                            unset($new_needed_verify_ids_arr[$key]);
                        }

                        if(count($new_needed_verify_ids_arr) > 0){
                            $needed_verify_id_text = '[';
                            for($i = 0; $i < count($new_needed_verify_ids_arr); $i++){
                                if($needed_verify_id_text == '['){
                                    $needed_verify_id_text = $needed_verify_id_text.'"'.$new_needed_verify_ids_arr[$i].'"';
                                } else {
                                    $needed_verify_id_text = $needed_verify_id_text . ',"'.$new_needed_verify_ids_arr[$i].'"';
                                }
                            }
                            $needed_verify_id_text = $needed_verify_id_text . ']';
                        } else {
                            $needed_verify_id_text = Null;
                        }
                        
                        //update 'confirmation_menu_list' table
                        DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_reject_ens_request')->update(array('needed_verify' => $new_needed_verify, 'needed_verify_ids' => $needed_verify_id_text));
                    }

                //<==========>// END remove user id from 'confirm_reject_ens_request' raw of 'needed_verify_ids' column inside 'confirmation_menu_list' table //<==========>//

            //<==========>// END [SKD Materials => SKD Queue List] //<==========>//



            //<==========>// START [Finish Products => Requisition Creation Process] //<==========>//

                //<==========>// Start remove user id from 'confirm_requisition_creation_proccess' raw of 'needed_confirm_ids' column inside 'confirmation_menu_list' table //<==========>//

                    //convert needed confirm users id into array
                    $confirmation_menu_confirm_requisition_creation_proccess_ids = str_replace( array( '[', ']', '"' ), '', $confirmation_menu_confirm_requisition_creation_proccess->needed_confirm_ids);
                    $new_confirmation_menu_confirm_requisition_creation_proccess_ids_arr = explode (",", $confirmation_menu_confirm_requisition_creation_proccess_ids);
                    
                    // Checking user id is already exist in 'confirm_requisition_creation_proccess' raw of 'needed_verify_ids' column
                    if(in_array($request->userId,$new_confirmation_menu_confirm_requisition_creation_proccess_ids_arr)){
                        //remove user id from 'confirm_requisition_creation_proccess' raw of 'confirmation_menu_list' table
                        if($confirmation_menu_confirm_requisition_creation_proccess->needed_confirm > 0) {
                            $new_requisition_creation_confirm_needed = $confirmation_menu_confirm_requisition_creation_proccess->needed_confirm - 1;
                        } else {
                            $new_requisition_creation_confirm_needed = $confirmation_menu_confirm_requisition_creation_proccess->needed_confirm;
                        }
                        if (($key = array_search($request->userId, $new_confirmation_menu_confirm_requisition_creation_proccess_ids_arr)) !== false) {
                            unset($new_confirmation_menu_confirm_requisition_creation_proccess_ids_arr[$key]);
                        }

                        if(count($new_confirmation_menu_confirm_requisition_creation_proccess_ids_arr) > 0){
                            $requisition_creation_confirm_id_text = '[';
                            for($i = 0; $i < count($new_confirmation_menu_confirm_requisition_creation_proccess_ids_arr); $i++){
                                if($requisition_creation_confirm_id_text == '['){
                                    $requisition_creation_confirm_id_text = $requisition_creation_confirm_id_text.'"'.$new_confirmation_menu_confirm_requisition_creation_proccess_ids_arr[$i].'"';
                                } else {
                                    $requisition_creation_confirm_id_text = $requisition_creation_confirm_id_text . ',"'.$new_confirmation_menu_confirm_requisition_creation_proccess_ids_arr[$i].'"';
                                }
                            }
                            $requisition_creation_confirm_id_text = $requisition_creation_confirm_id_text . ']';
                        } else {
                            $requisition_creation_confirm_id_text = Null;
                        }
                        
                        //update into database
                        DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_requisition_creation_proccess')->update(array('needed_confirm' => $new_requisition_creation_confirm_needed, 'needed_confirm_ids' => $requisition_creation_confirm_id_text));
                    }

                //<==========>// END remove user id from 'confirm_requisition_creation_proccess' raw of 'needed_confirm_ids' column inside 'confirmation_menu_list' table //<==========>//

                //<==========>// Start remove user id from 'confirm_requisition_creation_proccess' raw of 'needed_verify_ids' column inside 'confirmation_menu_list' table //<==========>//
                
                    // convert 'needed_verify_ids' values into Array
                    $confirmation_menu_requisition_creation_proccess_verify_ids = str_replace( array( '[', ']', '"' ), '', $confirmation_menu_confirm_requisition_creation_proccess->needed_verify_ids);
                    $new_confirmation_menu_requisition_creation_proccess_verify_ids_arr = explode (",", $confirmation_menu_requisition_creation_proccess_verify_ids);
                    
                    // Checking 'user_id' already exist in 'confirm_requisition_creation_proccess' raw of 'needed_verify_ids' column
                    if(in_array($request->userId, $new_confirmation_menu_requisition_creation_proccess_verify_ids_arr)){

                        //remove user id from 'confirm_requisition_creation_proccess' raw of 'confirmation_menu_list' table
                        if($confirmation_menu_confirm_requisition_creation_proccess->needed_verify > 0) {
                            $new_requisition_creation_needed_verify = $confirmation_menu_confirm_requisition_creation_proccess->needed_verify - 1;
                        } else {
                            $new_requisition_creation_needed_verify = $confirmation_menu_confirm_requisition_creation_proccess->needed_verify;
                        }
                        
                        if (($key = array_search($request->userId, $new_confirmation_menu_requisition_creation_proccess_verify_ids_arr)) !== false) {
                            unset($new_confirmation_menu_requisition_creation_proccess_verify_ids_arr[$key]);
                        }

                        if(count($new_confirmation_menu_requisition_creation_proccess_verify_ids_arr) > 0){
                            $needed_requisition_creation_verify_id_text = '[';
                            for($i = 0; $i < count($new_confirmation_menu_requisition_creation_proccess_verify_ids_arr); $i++){
                                if($needed_requisition_creation_verify_id_text == '['){
                                    $needed_requisition_creation_verify_id_text = $needed_requisition_creation_verify_id_text.'"'.$new_confirmation_menu_requisition_creation_proccess_verify_ids_arr[$i].'"';
                                } else {
                                    $needed_requisition_creation_verify_id_text = $needed_requisition_creation_verify_id_text . ',"'.$new_confirmation_menu_requisition_creation_proccess_verify_ids_arr[$i].'"';
                                }
                            }
                            $needed_requisition_creation_verify_id_text = $needed_requisition_creation_verify_id_text . ']';
                        } else {
                            $needed_requisition_creation_verify_id_text = Null;
                        }
                        
                        //update 'confirmation_menu_list' table
                        DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_requisition_creation_proccess')->update(array('needed_verify' => $new_requisition_creation_needed_verify, 'needed_verify_ids' => $needed_requisition_creation_verify_id_text));
                    }

                //<==========>// END remove user id from 'confirm_requisition_creation_proccess' raw of 'needed_verify_ids' column inside 'confirmation_menu_list' table //<==========>//

            //<==========>// END [Finish Products => Requisition Creation Process] //<==========>//


            
            //<==========>// START [Finish Products => Requisition Stocking] //<==========>//

                //<==========>// Start remove user id from 'confirm_requisition_stockin_process' raw of 'needed_confirm_ids' column inside 'confirmation_menu_list' table //<==========>//

                    //convert needed confirm users id into array
                    $confirmation_menu_confirm_requisition_stockin_process_ids = str_replace( array( '[', ']', '"' ), '', $confirmation_menu_confirm_requisition_stockin_process->needed_confirm_ids);
                    $new_confirmation_menu_confirm_requisition_stockin_process_ids_arr = explode (",", $confirmation_menu_confirm_requisition_stockin_process_ids);
                    
                    // Checking user id is already exist in 'confirm_requisition_stockin_process' raw of 'needed_verify_ids' column
                    if(in_array($request->userId,$new_confirmation_menu_confirm_requisition_stockin_process_ids_arr)){
                        //remove user id from 'confirm_requisition_stockin_process' raw of 'confirmation_menu_list' table
                        if($confirmation_menu_confirm_requisition_stockin_process->needed_confirm > 0) {
                            $new_requisition_stockin_confirm_needed = $confirmation_menu_confirm_requisition_stockin_process->needed_confirm - 1;
                        } else {
                            $new_requisition_stockin_confirm_needed = $confirmation_menu_confirm_requisition_stockin_process->needed_confirm;
                        }
                        if (($key = array_search($request->userId, $new_confirmation_menu_confirm_requisition_stockin_process_ids_arr)) !== false) {
                            unset($new_confirmation_menu_confirm_requisition_stockin_process_ids_arr[$key]);
                        }

                        if(count($new_confirmation_menu_confirm_requisition_stockin_process_ids_arr) > 0){
                            $requisition_stockin_confirm_id_text = '[';
                            for($i = 0; $i < count($new_confirmation_menu_confirm_requisition_stockin_process_ids_arr); $i++){
                                if($requisition_stockin_confirm_id_text == '['){
                                    $requisition_stockin_confirm_id_text = $requisition_stockin_confirm_id_text.'"'.$new_confirmation_menu_confirm_requisition_stockin_process_ids_arr[$i].'"';
                                } else {
                                    $requisition_stockin_confirm_id_text = $requisition_stockin_confirm_id_text . ',"'.$new_confirmation_menu_confirm_requisition_stockin_process_ids_arr[$i].'"';
                                }
                            }
                            $requisition_stockin_confirm_id_text = $requisition_stockin_confirm_id_text . ']';
                        } else {
                            $requisition_stockin_confirm_id_text = Null;
                        }
                        
                        //update into database
                        DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_requisition_stockin_process')->update(array('needed_confirm' => $new_requisition_stockin_confirm_needed, 'needed_confirm_ids' => $requisition_stockin_confirm_id_text));
                    }

                //<==========>// END remove user id from 'confirm_requisition_stockin_process' raw of 'needed_confirm_ids' column inside 'confirmation_menu_list' table //<==========>//

                //<==========>// Start remove user id from 'confirm_requisition_stockin_process' raw of 'needed_verify_ids' column inside 'confirmation_menu_list' table //<==========>//
                
                    // convert 'needed_verify_ids' values into Array
                    $confirmation_menu_requisition_stockin_proccess_verify_ids = str_replace( array( '[', ']', '"' ), '', $confirmation_menu_confirm_requisition_stockin_process->needed_verify_ids);
                    $new_confirmation_menu_requisition_stockin_proccess_verify_ids_arr = explode (",", $confirmation_menu_requisition_stockin_proccess_verify_ids);
                    
                    // Checking 'user_id' already exist in 'confirm_requisition_stockin_process' raw of 'needed_verify_ids' column
                    if(in_array($request->userId, $new_confirmation_menu_requisition_stockin_proccess_verify_ids_arr)){

                        //remove user id from 'confirm_requisition_stockin_process' raw of 'confirmation_menu_list' table
                        if($confirmation_menu_confirm_requisition_stockin_process->needed_verify > 0) {
                            $new_requisition_stockin_needed_verify = $confirmation_menu_confirm_requisition_stockin_process->needed_verify - 1;
                        } else {
                            $new_requisition_stockin_needed_verify = $confirmation_menu_confirm_requisition_stockin_process->needed_verify;
                        }
                        
                        $needed_requisition_stockin_verify_ids = str_replace( array( '[', ']', '"' ), '', $confirmation_menu_confirm_requisition_stockin_process->needed_verify_ids);
                        $new_requisition_stockin_needed_verify_ids_arr = explode (",", $needed_requisition_stockin_verify_ids);
                        if (($key = array_search($request->userId, $new_confirmation_menu_requisition_stockin_proccess_verify_ids_arr)) !== false) {
                            unset($new_confirmation_menu_requisition_stockin_proccess_verify_ids_arr[$key]);
                        }

                        if(count($new_confirmation_menu_requisition_stockin_proccess_verify_ids_arr) > 0){
                            $needed_requisition_stockin_verify_id_text = '[';
                            for($i = 0; $i < count($new_confirmation_menu_requisition_stockin_proccess_verify_ids_arr); $i++){
                                if($needed_requisition_stockin_verify_id_text == '['){
                                    $needed_requisition_stockin_verify_id_text = $needed_requisition_stockin_verify_id_text.'"'.$new_confirmation_menu_requisition_stockin_proccess_verify_ids_arr[$i].'"';
                                } else {
                                    $needed_requisition_stockin_verify_id_text = $needed_requisition_stockin_verify_id_text . ',"'.$new_confirmation_menu_requisition_stockin_proccess_verify_ids_arr[$i].'"';
                                }
                            }
                            $needed_requisition_stockin_verify_id_text = $needed_requisition_stockin_verify_id_text . ']';
                        } else {
                            $needed_requisition_stockin_verify_id_text = Null;
                        }
                        
                        //update 'confirmation_menu_list' table
                        DB::table('confirmation_menu_list')->where('confirmation_name', 'confirm_requisition_stockin_process')->update(array('needed_verify' => $new_requisition_stockin_needed_verify, 'needed_verify_ids' => $needed_requisition_stockin_verify_id_text));
                    }

                //<==========>// END remove user id from 'confirm_requisition_stockin_process' raw of 'needed_verify_ids' column inside 'confirmation_menu_list' table //<==========>//

            //<==========>// START [Finish Products => Requisition Stocking] //<==========>//


            if($request->remove_disable == 'remove') {
                User::where('id', $request->userId)->update(array('scopes' => '[]', 'status' => 2));
                return response()->json(['status'=>'success']);
            } else if ($request->remove_disable == 'disable'){
                $user= User::where('id',$request->userId)->first();
                $res = str_replace( array( '[', ']', '"' ), '', $user['scopes']);
                $all_permission_scopes_arr = explode (",", $res);
    
                if($all_permission_scopes_arr[0] == "*"){
                     $allPermissionList =
                    ["add_user_permission","edit_user_permission","remove_user_permission","view_product","add_product","edit_product","skd_barcode_generate","entry_skd","view_ens_request","view_skd_inventory_history","view_finish_inventory","view_requisition_request","requisition_create","view_requisition_building_process","assembling_parts","lasering_dcover","dcover_joining_assemble_parts","finalize_product_building","view_requisition_stockin_queuelist","view_sales_order","capture_cancel_sales_order","view_sales_invoice","shipment_cancel_sales_invoice","complete_sales_invoice","view_pdf_invoice","view_refund_order","complete_refund_order","view_attribute","add_attribute","edit_attribute","delete_attribute","view_coupon","add_coupon","edit_coupon","delete_coupon","view_customer","view_registered_product_list","view_support_ticket","response_support_ticket","view_post_sell_serial_no","view_system_history"];
                    User::where('id', $request->userId)->update(array('scopes' => $allPermissionList, 'status' => 0));
                    return response()->json(['status'=>'success']);
                } else {
                    if (($key = array_search('confirm_reject_ens_request', $all_permission_scopes_arr)) !== false) {
                        unset($all_permission_scopes_arr[$key]);
                    }

                    if (($key = array_search('verify_ens_request', $all_permission_scopes_arr)) !== false) {
                        unset($all_permission_scopes_arr[$key]);
                    }

                    if(count($all_permission_scopes_arr) > 0){
                        $confirm_id_text = '[';
                        foreach($all_permission_scopes_arr as $permission){

                            if($confirm_id_text == '['){
                                $confirm_id_text = $confirm_id_text.'"'.$permission.'"';
                            } else {
                                $confirm_id_text = $confirm_id_text . ',"'.$permission.'"';
                            }
                        }
                        $confirm_id_text = $confirm_id_text . ']';
                    } else {
                        $confirm_id_text = Null;
                    }
                    
                    User::where('id', $request->userId)->update(array('scopes' => $confirm_id_text, 'status' => 0));
                    return response()->json(['status'=>'success']);
    
                }
            }  

        }
    }

    //Use this function for enable user access
    public function user_enable(Request $request){
        User::where('id', $request->user_id)->update(array('status' => 1));
        return response()->json(['status'=>'success']);
    }

    //Use this function to get user selected permission scopes in a array type format
    public function getPermissionScopes($permission_scopes) {
        $all_permission_arr = explode (",", $permission_scopes);

        // checking for make super admin or not AND skd ens queue list confirmation role
        $user_permission_arr = ['add_user_permission','edit_user_permission','remove_user_permission'];
        $is_super_admin = false;
        $is_skd_ens_queue_confirmation = false;
        $is_skd_ens_verify = false;
        $is_requisition_creation_process_confirmation = false;
        $is_requisition_creation_process_verify = false;
        $is_requisition_stockin_confirmation = false;
        $is_requisition_stockin_verify = false;
        if($all_permission_arr[0] == '*'){
            $is_super_admin = true;
            $is_skd_ens_queue_confirmation = true;
            $is_skd_ens_verify = true;
            $is_requisition_creation_process_confirmation = true;
            $is_requisition_creation_process_verify = true;
            $is_requisition_stockin_confirmation = true;
            $is_requisition_stockin_verify = true;
        } else {
            $result=array_intersect($all_permission_arr,$user_permission_arr);
            if(!empty($result)){
                $is_super_admin = true;
            }

            if(in_array('confirm_reject_ens_request', $all_permission_arr)){
                $is_skd_ens_queue_confirmation = true;
            }

            if(in_array('verify_ens_request', $all_permission_arr)){
                $is_skd_ens_verify = true;
            }

            if(in_array('confirm_reject_requisition_request', $all_permission_arr)){
                $is_requisition_creation_process_confirmation = true;
            }

            if(in_array('verify_requisition_request', $all_permission_arr)){
                $is_requisition_creation_process_verify = true;
            }

            if(in_array('confirm_reject_requisition_stockin', $all_permission_arr)){
                $is_requisition_stockin_confirmation = true;
            }

            if(in_array('verify_requisition_stockin', $all_permission_arr)){
                $is_requisition_stockin_verify = true;
            }
        }

        
        $scope_text = '[';
        for($i = 0; $i < count($all_permission_arr); $i++){
            if($scope_text == '['){
                $scope_text = $scope_text.'"'.$all_permission_arr[$i].'"';
            } else {
                $scope_text = $scope_text . ',"'.$all_permission_arr[$i].'"';
            }
        }
        $scope_text = $scope_text . ']';

        return array('scopes'=>$scope_text, 'is_super_admin'=>$is_super_admin, 'is_skd_ens_queue_confirmation'=>$is_skd_ens_queue_confirmation, 'is_skd_ens_verify'=>$is_skd_ens_verify, 'is_requisition_creation_process_confirmation'=>$is_requisition_creation_process_confirmation, 'is_requisition_creation_process_verify'=>$is_requisition_creation_process_verify, 'is_requisition_stockin_confirmation'=>$is_requisition_stockin_confirmation, 'is_requisition_stockin_verify'=>$is_requisition_stockin_verify);
    }

    // Use this function for checking user any dependency
    public function check_permission_any_dependency($u_id) {
            //default dependency boolean value set
            $is_dependency = false;

            //<==========>// START dependency check for [SKD Materials -> SKD Queue List -> Confirm/Reject] Permission Role //<==========>//

                //get user id from database which are need to be confirmed
                $pending_skd_queue_lists = RawInventory::where('needed_confirm','>','total_confirmed')->where('status','!=','2')->select('ens_id','needed_confirm_ids','confirmed_ids')->get();
                $ens_verify_remaining = '';
                foreach($pending_skd_queue_lists as $key => $pending_skd_queue){
                    //Convert needed_confirm_ids into array
                    $needed_confirm_ids = str_replace( array( '[', ']', '"' ), '', $pending_skd_queue['needed_confirm_ids']);
                    $needed_confirm_ids_arr = explode (",", $needed_confirm_ids);
                    //Checking which users need to be confirmed
                    if(in_array($u_id,$needed_confirm_ids_arr)){
                        //Convert confirm users id into Array
                        $confirm_ids = str_replace( array( '[', ']', '"' ), '', $pending_skd_queue['confirmed_ids']);
                        $confirm_ids_arr = explode (",", $confirm_ids);
                        //User is already confirmed of this ENS Request
                        if(in_array($u_id,$confirm_ids_arr)){
                            continue;
                        } 
                        //User is not confirmed of this ENS Request
                        else {
                            $is_dependency = true;
                            if($ens_verify_remaining){
                                $ens_verify_remaining = $ens_verify_remaining . ', ENS' . $pending_skd_queue['ens_id'];
                            } else {
                                $ens_verify_remaining = $ens_verify_remaining . 'ENS' . $pending_skd_queue['ens_id'];
                            }
                            continue;
                        }
                    } else {
                        continue;
                    }
                }
            //<==========>// END dependency check for [SKD Materials -> SKD Queue List -> Confirm/Reject] Permission Role //<==========>//



            //<==========>// START dependency check for [Finish Products -> Requisition -> Creation Process] Permission Role //<==========>//
                //get user id from database which are need to be confirmed
                $pending_requisition_creation_process_queue_lists = FinishInventory::where('skd_stockout_needed_confirm','>','skd_stockout_total_confirmed')->where('status','!=','2')->select('rq_id','skd_stockout_needed_confirm_ids','skd_stockout_confirmed_ids')->get();
                $requisition_creation_process_verify_remaining = '';
                foreach($pending_requisition_creation_process_queue_lists as $key => $pending_requisition_creation_process_queue){
                    //Convert skd_stockout_needed_confirm_ids into array
                    $skd_stockout_needed_confirm_ids = str_replace( array( '[', ']', '"' ), '', $pending_requisition_creation_process_queue['skd_stockout_needed_confirm_ids']);
                    $skd_stockout_needed_confirm_ids_arr = explode (",", $skd_stockout_needed_confirm_ids);
                    //Checking which users need to be confirmed
                    if(in_array($u_id,$skd_stockout_needed_confirm_ids_arr)){
                        //Convert confirm users id into Array
                        $skd_stockout_confirm_ids = str_replace( array( '[', ']', '"' ), '', $pending_requisition_creation_process_queue['skd_stockout_confirmed_ids']);
                        $skd_stockout_confirm_ids_arr = explode (",", $skd_stockout_confirm_ids);
                        //User is already confirmed of this Requesition Creation Request
                        if(in_array($u_id,$skd_stockout_confirm_ids_arr)){
                            continue;
                        }
                        //User is not confirmed of this Requesition Creation Request
                        else {
                            $is_dependency = true;
                            if($requisition_creation_process_verify_remaining){
                                $requisition_creation_process_verify_remaining = $requisition_creation_process_verify_remaining . ', RQ' . $pending_requisition_creation_process_queue['rq_id'];
                            } else {
                                $requisition_creation_process_verify_remaining = $requisition_creation_process_verify_remaining . 'RQ' . $pending_requisition_creation_process_queue['rq_id'];
                            }
                            continue;
                        }
                    } else {
                        continue;
                    }
                }
            //<==========>// END dependency check for [Finish Products -> Requisition -> Creation Process] Permission Role //<==========>//


            //<==========>// START dependency check for [Finish Products -> Requisition -> Stocking Queue List] Permission Role //<==========>//
                //get user id from database which are need to be confirmed
                $pending_requisition_stockin_process_queue_lists = FinishInventory::where('product_stockin_needed_confirm','>','product_stockin_total_confirmed')->where('status','!=','2')->select('rq_id','product_stockin_needed_confirm_ids','product_stockin_confirmed_ids')->get();
                $requisition_stockin_process_verify_remaining = '';
                foreach($pending_requisition_stockin_process_queue_lists as $key => $pending_requisition_stockin_process_queue){
                    //Convert product_stockin_needed_confirm_ids into array
                    $product_stockin_needed_confirm_ids = str_replace( array( '[', ']', '"' ), '', $pending_requisition_stockin_process_queue['product_stockin_needed_confirm_ids']);
                    $product_stockin_needed_confirm_ids_arr = explode (",", $product_stockin_needed_confirm_ids);
                    //Checking which users need to be confirmed
                    if(in_array($u_id,$product_stockin_needed_confirm_ids_arr)){
                        //Convert confirm users id into Array
                        $product_stockin_confirm_ids = str_replace( array( '[', ']', '"' ), '', $pending_requisition_stockin_process_queue['product_stockin_confirmed_ids']);
                        $product_stockin_confirm_ids_arr = explode (",", $product_stockin_confirm_ids);
                        //User is already confirmed of this Requesition Stocking Queue List
                        if(in_array($u_id,$product_stockin_confirm_ids_arr)){
                            continue;
                        }
                        //User is not confirmed of this Requesition Stocking Queue List
                        else {
                            $is_dependency = true;
                            if($requisition_stockin_process_verify_remaining){
                                $requisition_stockin_process_verify_remaining = $requisition_stockin_process_verify_remaining . ', RQ' . $pending_requisition_stockin_process_queue['rq_id'];
                            } else {
                                $requisition_stockin_process_verify_remaining = $requisition_stockin_process_verify_remaining . 'RQ' . $pending_requisition_stockin_process_queue['rq_id'];
                            }
                            continue;
                        }
                    } else {
                        continue;
                    }
                }
            //<==========>// END dependency check for [Finish Products -> Requisition -> Stocking Queue List] Permission Role //<==========>//

            //Return all dependency of that user
            return ['is_dependency'=> $is_dependency,'ens_verify_remaining' => $ens_verify_remaining, 'requisition_creation_process_verify_remaining' => $requisition_creation_process_verify_remaining, 'requisition_stockin_process_verify_remaining' => $requisition_stockin_process_verify_remaining];
    }
}
