<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Product;
use App\Models\AllHistory;
use App\Models\RawInventory;
use App\Models\SkdSerial;
use App\Models\ProductSeries;
use App\Models\RawMetarial;
use App\Models\ProductRegister;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Ticket;
use App\Models\Conversation;
use App\Models\Product_Srial_Number;
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
use DateTime;
use Cookie;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Validator;
use Excel;
use App\Exports\UserExpport;
class InventoryController extends Controller
{
    public function skdinventory(){

        $data['inventorys'] = RawInventory::select('*')->groupBy('ssd_size','bb_processor','ram_size','ssd_brand','bb_brand','ram_brand')->get(); 

        // $data['queue'] = SkdSerial::select('*',DB::raw('count(*) as total'))->groupBy('ens_id')->get();
        return view('admin.layouts.inventory.skdInventory',$data);
    }
    public function inventoryAdd(){
        return view('admin.layouts.inventory.addInventory');
    }

    public function barcode_Generator(){
        $data['Product_Series']= ProductSeries::all();
        $data['Product_model']= RawMetarial::where('model', "!=", null)->get();

        $data['ram_brand']= RawMetarial::where('skd_metarials', 'RAM')->groupby('brand')->get();
        $data['ram_type']= RawMetarial::where('skd_metarials', 'RAM')->groupby('skd_type')->get();
        $data['ram_size']= RawMetarial::where('skd_metarials', 'RAM')->orderBy('id','ASC')->groupby('skd_size')->get();
        $data['ram_speed']= RawMetarial::where('skd_metarials', 'RAM')->groupby('skd_others')->get();
        $data['ssd_brand']= RawMetarial::where('skd_metarials', 'SSD')->groupby('brand')->get();
        $data['ssd_type']= RawMetarial::where('skd_metarials', 'SSD')->groupby('skd_type')->get();
        $data['ssd_size']= RawMetarial::where('skd_metarials', 'SSD')->orderBy('id','ASC')->groupby('skd_size')->get();
        $data['m2_type']= RawMetarial::where('skd_metarials', 'SSD')->groupby('skd_others')->get();
        $data['barebone_brand']= RawMetarial::where('skd_metarials', 'Barebone')->groupby('brand')->get();
        return view('admin.layouts.inventory.barcodeGenerator',$data);
    }

    public function barcode_processing(Request $request){
        $skd_type= $request->skd_type;
   
        $q=$request->qantity;
        $row_inventory = [];
        for($n = 0; $n < $q ; $n++){
            
            // $date = new DateTime(); 
            // $datetime = $date->format("yv");
            // $number1 = rand($datetime,9999);
            // $number2 = mt_rand(1111,9999);
            $now = new \DateTime('now', new \DateTimeZone('UTC'));
            $num = dechex((int)$now->format('Uu'));
            $num = substr($num, -8);
            if($skd_type == 'skd_bb'){
                $x = $request->skd_bb_sizes;
                $row_inventory[$n]=strtoupper('B'.$x.$num); 
            }
            else if($skd_type == 'skd_ram'){
                $x = $request->skd_ram_sizes;
                $row_inventory[$n]=strtoupper('R'.$x.$num); 
            }
            else if($skd_type == 'skd_ssd'){
                $x = $request->skd_ssd_sizes;
                $row_inventory[$n]=strtoupper('S'.$x.$num); 
            }
           
        }

        $customPaper = array(0, 0, 115, 28);
        $pdf = PDF::loadView('admin.layouts.inventory.barcodePDF', ['barcodes'=>$row_inventory]);
        $pdf->setPaper($customPaper, 'potrait');
        return $pdf->stream();

    //     if($request->product_type == 'Barebone'){
    //         $count = RawInventory::where('bb_type',$request->bb_type)->count();
    //     }
    //      else if($request->product_type == 'RAM'){
    //         $count = RawInventory::where('ram_size',$request->ram_size)->count();
    //     }
    //      else if($request->product_type == 'SSD'){
    //         $count = RawInventory::where('ssd_size',$request->ssd_size)->count();
    //     }

    //     $q=$request->qantity;
    //     for($n = 1; $n <= $q ; $n++){  
            
    //     $row_inventory = new RawInventory();
    //     $row_inventory->purchase_id=$request->purchase_id;
    //     $row_inventory->product_type=$request->product_type;
    //     if($request->product_type == 'RAM'){
    //         $row_inventory->ram_type=$request->ram_type;
    //         $row_inventory->ram_size=$request->ram_size;
    //         $row_inventory->bus_speed=$request->bus_speed;
    //         if($request->ram_size == '8'){   
    //             $row_inventory->serial_no='8'.$request->purchase_id.($count+$n); 
    //         }
    //        else if($request->ram_size == '16'){   
    //             $row_inventory->serial_no='8'.$request->purchase_id.($count+$n); 
    //         }
            
    //     }else if($request->product_type == 'SSD'){
    //         $row_inventory->ssd_type=$request->ssd_type;
    //         $row_inventory->m2_type=$request->m2_type;
    //         $row_inventory->ssd_size=$request->ssd_size;
    //         if($request->ssd_size == '512'){   
    //             $row_inventory->serial_no='512'.$request->purchase_id.($count+$n); 
    //         }
    //        else if($request->ssd_size == '1'){   
    //             $row_inventory->serial_no='1'.$request->purchase_id.($count+$n); 
    //         }
    //     }else if($request->product_type == 'Barebone'){
    //         $row_inventory->bb_type=$request->bb_type;
    //         $row_inventory->bb_model=$request->bb_model;
    //         $row_inventory->bb_processor=$request->bb_processor;
    //         if($request->bb_type == 'Sigma'){   
    //             $row_inventory->serial_no='S'.$request->purchase_id.($count+$n); 
    //         }
    //        else if($request->bb_type == 'Lania'){   
    //             $row_inventory->serial_no='12'.$request->purchase_id.($count+$n); 
    //             dd($row_inventory->serial_no);
    //         }
    //     }
    //     $row_inventory->flow_type=$request->flow_type;
        
    //     $row_inventory->save();
    // }
    // $barcode = RawInventory::where('product_type',$request->product_type)->get();
    // if($barcode === null){
   
    //     return redirect()->route('barcode.generator',compact('barcode'));
    // }else{
    //     $customPaper = array(0, 0, 115, 28);
    //     $barcode = RawInventory::where('product_type',$request->product_type)->first();
    //     $pdf = PDF::loadView('admin.layouts.inventory.barcodePDF', ['barcode'=>$barcode]);
    //     $pdf->setPaper($customPaper, 'potrait');
    //     return $pdf->stream();
      
    // }
//   return view('admin.layouts.inventory.barcodeGenerator',compact('barcode'));
    }

    public function completed_list(){
        return view('admin.layouts.inventory.completedList');
    }

    // add skd items for confirmation
    public function add_skd_items(Request $request) {
        if($request->product_type == 'Barebone'){
            $validator = Validator::make($request->all(),
                [
                    'purchase_id' => 'required|string',
                    'bb_type' => 'required|string',
                    'bb_brand' => 'required|string',
                    'bb_model' => 'required|string',
                    'bb_processor' => 'required|string',
                    'barcode_item_id' => 'required|string',
                ],
                [
                    'purchase_id.required'=>'Purchase ID required*',
                    'bb_type.required'=>'Series required*',
                    'bb_brand.required'=>'Brand required*',
                    'bb_model.required'=>'Model required*',
                    'bb_processor.required'=>'Processor required*',
                    'barcode_item_id.required'=>'Please scan barcode of your items before submit!',
                    
                ]
            );
        } else if($request->product_type == 'RAM'){
            $validator = Validator::make($request->all(),
                [
                    'purchase_id' => 'required|string',
                    'ram_type' => 'required|string',
                    'ram_brand' => 'required|string',
                    'ram_size' => 'required|numeric',
                    'bus_speed' => 'required|string',
                    'barcode_item_id' => 'required|string',
                ],
                [
                    'purchase_id.required'=>'Purchase ID required*',
                    'ram_type.required'=>'RAM type required*',
                    'ram_brand.required'=>'RAM brand required*',
                    'ram_size.required'=>'RAM size required*',
                    'bus_speed.required'=>'Bus speed required*',
                    'barcode_item_id.required'=>'Please scan barcode of your items before submit!',
                    
                ]
            );
        } else if($request->product_type == 'SSD'){
            $validator = Validator::make($request->all(),
                [
                    'purchase_id' => 'required|string',
                    'ssd_type' => 'required|string',
                    'ssd_brand' => 'required|string',
                    'm2_type' => 'required|string',
                    'ssd_size' => 'required|numeric',
                    'barcode_item_id' => 'required|string',
                ],
                [
                    'purchase_id.required'=>'Purchase ID required*',
                    'ssd_type.required'=>'SSD type required*',
                    'ssd_brand.required'=>'SSD brand required*',
                    'm2_type.required'=>'M.2 required*',
                    'ssd_size.required'=>'SSD size required*',
                    'barcode_item_id.required'=>'Please scan barcode of your items before submit!',
                    
                ]
            );
        } else {
            $validator = Validator::make($request->all(),
                [
                    'purchase_id' => 'required|string',
                    'product_type' => 'required|string',
                    'barcode_item_id' => 'required|string',
                ],
                [
                    'purchase_id.required'=>'Purchase ID required*',
                    'product_type.required'=>'Product type required*',
                    'barcode_item_id.required'=>'Please scan barcode of your skd\'s before submit!',
                    
                ]
            );
        }

        // After pass all validation
        if($validator->passes()){ 
            $barcode_arr = explode (",", $request->barcode_item_id);
            // $duplicate_arr = array();
            // foreach(array_count_values($barcode_arr) as $val => $c)
                // if($c > 1) $duplicate_arr[] = $val;
            // $vals = array_count_values($str_arr);
            // dd($duplicate_arr);
            // $barcode_arr_unique = collect($barcode_arr)->unique();
            if(count($barcode_arr) > 0) {
                $count_skd_materials = RawInventory::count();
                // dd($count_skd_materials);
                if($count_skd_materials == 0) {
                    $identity_no = 1;
                }
                else{
                    $raw_inventory_max_id = RawInventory::max('ens_id');
                    $identity_no = $raw_inventory_max_id + 1;

                }
            
                $ens_confirmation_list = DB::table('confirmation_menu_list')->where('confirmation_name','confirm_reject_ens_request')->select('needed_confirm','needed_confirm_ids','needed_verify','needed_verify_ids')->first();
                
                $confermation_needed = 'yes';

                $row_inventory = new RawInventory();
                $row_inventory->purchase_id = $request->purchase_id;
                $row_inventory->ens_id = $identity_no;
                $row_inventory->created_by = Auth::id();
                $row_inventory->status = 0;
                $row_inventory->product_type = $request->product_type;
                $row_inventory->qantity = count($barcode_arr);
                if($request->product_type == 'Barebone'){
                    $row_inventory->bb_type=$request->bb_type;
                    $row_inventory->bb_model=$request->bb_model;
                    $row_inventory->bb_brand=$request->bb_brand;
                    $row_inventory->bb_processor=$request->bb_processor;
                } else if($request->product_type == 'RAM'){
                    $row_inventory->ram_type=$request->ram_type;
                    $row_inventory->ram_size=$request->ram_size;
                    $row_inventory->ram_brand=$request->ram_brand;
                    $row_inventory->bus_speed=$request->bus_speed;
                } else if($request->product_type == 'SSD'){
                    $row_inventory->ssd_type=$request->ssd_type;
                    $row_inventory->m2_type=$request->m2_type;
                    $row_inventory->ssd_brand=$request->ssd_brand;
                    $row_inventory->ssd_size=$request->ssd_size;
                }
                $row_inventory->needed_confirm = $ens_confirmation_list->needed_confirm;
                $row_inventory->needed_confirm_ids = $ens_confirmation_list->needed_confirm_ids;
                $row_inventory->needed_verify = $ens_confirmation_list->needed_verify;
                $row_inventory->needed_verify_ids = $ens_confirmation_list->needed_verify_ids;

                if($ens_confirmation_list->needed_confirm < 1) {
                    $row_inventory->flow_type = 'inflow';
                }
                $row_inventory->save();

                foreach($barcode_arr as $key => $serial){
                    $skd_serial = new SkdSerial();
                    $skd_serial->ens_id = $identity_no;
                    $skd_serial->skd_serial = $serial;
                    //
                    if($request->product_type == 'Barebone'){
                        $skd_serial->skd_brand = $request->bb_brand;
                    } else if($request->product_type == 'RAM'){
                        $skd_serial->skd_brand = $request->ram_brand;
                    } else if($request->product_type == 'SSD'){
                        $skd_serial->skd_brand = $request->ssd_brand;
                    }
                    
                    if($ens_confirmation_list->needed_confirm < 1) {
                        $skd_serial->flow_type = 'inflow';
                    }
                    $skd_serial->save();
                }

            // ens Created history table start
            $table_max_id = RawInventory::max('id');
            $identity_no = $table_max_id + 1;
            $history = new AllHistory();
            $history->table_name = 'RawInventory';
            $history->table_id = $table_max_id;
            $history->menu_name = 'Inventory Setup';
            $history->ens_id = RawInventory::max('ens_id');
            $history->created_by = Auth::id();
            $history->journal = '<span class=" text-gray-800"> Requst Created By ' .Auth::user()->name .'</span>';
            $history->date = date('Y-m-d');
            $history-> save();
            // ens Created history table end
            if($ens_confirmation_list->needed_confirm < 1) {
                $table_max_id = RawInventory::max('id');
                $identity_no = $table_max_id + 1;
                $history = new AllHistory();
                $history->table_name = 'RawInventory';
                $history->table_id = $table_max_id;
                $history->menu_name = 'Inventory Setup';
                $history->ens_id = RawInventory::max('ens_id');
                $history->created_by = Auth::id();
                $history->journal = '<span class=" text-gray-800">Added to the SKD Inventory</span>';
                $history->date = date('Y-m-d');
                $history-> save();
                $confermation_needed = 'no';
                
            }

                return response()->json(['status'=>'success','total_entry'=>count($barcode_arr), 'confermation_needed'=>$confermation_needed]);
                     
            }
        } else {
            return response()->json(['status'=>'error','errors'=>$validator->messages()]);
        }
        
        
    }


    //checking skd serial number is valid or not when scaning barcode
    public function check_valid_barcode_entry(Request $request) {
        // dd($request->all());
        //checking serial number length
        if(strlen($request->cur_code) == 10) {
            //validation checking for RAM SKD Barcode Serial Number
            if($request->skd_name == 'RAM') {
                if($request->cur_code[0] == 'R'){
                    //checking for 4GB RAM
                    if($request->skd_type_val == '4') {
                        if($request->cur_code[1] == '2') {
                            //checking already exist or not into database
                            $slcount = SkdSerial::where('skd_serial',$request->cur_code)->count();
                            if($slcount > 0){
                                return response()->json(['status'=>'already_exist']);
                            } 
                            else {
                                if($request->bar_codes != null) {
                                    //checking double barcode scaning for same barcode serial number
                                    $barcode_arr = explode (",", $request->bar_codes);
                                    if (in_array($request->cur_code, $barcode_arr))
                                    {
                                        return response()->json(['status'=>'present']);
                                    }
                                    else
                                    {
                                        return response()->json(['status'=>'not_present']);
                                    }
                                } 
                                else {
                                    return response()->json(['status'=>'not_present']);
                                }
                                
                            }
                            
                        } else {
                            return response()->json(['status'=>'not_valid']);
                        }
                    }
                    //checking for 8GB RAM
                    else if($request->skd_type_val == '8') {
                        if($request->cur_code[1] == '3') {
                            //checking already exist or not into database
                            $slcount = SkdSerial::where('skd_serial',$request->cur_code)->count();
                            if($slcount > 0){
                                return response()->json(['status'=>'already_exist']);
                            } 
                            else {
                                if($request->bar_codes != null) {
                                    //checking double barcode scaning for same barcode serial number
                                    $barcode_arr = explode (",", $request->bar_codes);
                                    if (in_array($request->cur_code, $barcode_arr))
                                    {
                                        return response()->json(['status'=>'present']);
                                    }
                                    else
                                    {
                                        return response()->json(['status'=>'not_present']);
                                    }
                                } else {
                                    return response()->json(['status'=>'not_present']);
                                }
                                
                            }
                        } else {
                            return response()->json(['status'=>'not_valid']);
                        }
                    }
                    //checking for 16GB RAM
                    else if($request->skd_type_val == '16') {
                        if($request->cur_code[1] == '4') {
                            //checking already exist or not into database
                            $slcount = SkdSerial::where('skd_serial',$request->cur_code)->count();
                            if($slcount > 0){
                                return response()->json(['status'=>'already_exist']);
                            } 
                            else {
                                if($request->bar_codes != null) {
                                    //checking double barcode scaning for same barcode serial number
                                    $barcode_arr = explode (",", $request->bar_codes);
                                    if (in_array($request->cur_code, $barcode_arr))
                                    {
                                        return response()->json(['status'=>'present']);
                                    }
                                    else
                                    {
                                        return response()->json(['status'=>'not_present']);
                                    }
                                } else {
                                    return response()->json(['status'=>'not_present']);
                                }
                                
                            }
                        } else {
                            return response()->json(['status'=>'not_valid']);
                        }
                    }
                    //checking for 32GB RAM
                    else if($request->skd_type_val == '32') {
                        if($request->cur_code[1] == '5') {
                            //checking already exist or not into database
                            $slcount = SkdSerial::where('skd_serial',$request->cur_code)->count();
                            if($slcount > 0){
                                return response()->json(['status'=>'already_exist']);
                            } 
                            else {
                                if($request->bar_codes != null) {
                                    // checking double barcode scaning for same barcode serial number
                                    $barcode_arr = explode (",", $request->bar_codes);
                                    if (in_array($request->cur_code, $barcode_arr))
                                    {
                                        return response()->json(['status'=>'present']);
                                    }
                                    else
                                    {
                                        return response()->json(['status'=>'not_present']);
                                    }
                                } else {
                                    return response()->json(['status'=>'not_present']);
                                }
                                
                            }
                        } else {
                            return response()->json(['status'=>'not_valid']);
                        }
                    }
                } else {
                    return response()->json(['status'=>'not_valid']);
                }
            }

            //validation checking for SSD SKD Barcode Serial Number
            if($request->skd_name == 'SSD') {
                if($request->cur_code[0] == 'S'){
                    //checking for 512 GB SSD
                    if($request->skd_type_val == '512') {
                        if($request->cur_code[1] == '9') {
                            //checking already exist or not into database
                            $slcount = SkdSerial::where('skd_serial',$request->cur_code)->count();
                            if($slcount > 0){
                                return response()->json(['status'=>'already_exist']);
                            } 
                            else {
                                if($request->bar_codes != null) {
                                    //checking double barcode scaning for same barcode serial number
                                    $barcode_arr = explode (",", $request->bar_codes);
                                    if (in_array($request->cur_code, $barcode_arr))
                                    {
                                        return response()->json(['status'=>'present']);
                                    }
                                    else
                                    {
                                        return response()->json(['status'=>'not_present']);
                                    }
                                } else {
                                    return response()->json(['status'=>'not_present']);
                                }
                                
                            }
                        } else {
                            return response()->json(['status'=>'not_valid']);
                        }
                    }
                    //checking for 1 TB SSD
                    else if($request->skd_type_val == '1') {
                        if($request->cur_code[1] == '0') {
                            //checking already exist or not into database
                            $slcount = SkdSerial::where('skd_serial',$request->cur_code)->count();
                            if($slcount > 0){
                                return response()->json(['status'=>'already_exist']);
                            } 
                            else {
                                if($request->bar_codes != null) {
                                    //checking double barcode scaning for same barcode serial number
                                    $barcode_arr = explode (",", $request->bar_codes);
                                    if (in_array($request->cur_code, $barcode_arr))
                                    {
                                        return response()->json(['status'=>'present']);
                                    }
                                    else
                                    {
                                        return response()->json(['status'=>'not_present']);
                                    }
                                } else {
                                    return response()->json(['status'=>'not_present']);
                                }
                                
                            }
                        } else {
                            return response()->json(['status'=>'not_valid']);
                        }
                    }
                } else {
                    return response()->json(['status'=>'not_valid']);
                }
            }

            //validation checking for Barebone SKD Barcode Serial Number
            if($request->skd_name == 'Barebone') {
                if($request->cur_code[0] == 'B'){
                    //Checking for core i3 Barebone
                    if($request->skd_type_val == 'i3') {
                        if($request->cur_code[1] == '3') {
                            //checking already exist or not into database
                            $slcount = SkdSerial::where('skd_serial',$request->cur_code)->count();
                            if($slcount > 0){
                                return response()->json(['status'=>'already_exist']);
                            }
                            else {
                                if($request->bar_codes != null) {
                                    //checking double barcode scaning for same barcode serial number
                                    $barcode_arr = explode (",", $request->bar_codes);
                                    if (in_array($request->cur_code, $barcode_arr))
                                    {
                                        return response()->json(['status'=>'present']);
                                    }
                                    else
                                    {
                                        return response()->json(['status'=>'not_present']);
                                    }
                                } else {
                                    return response()->json(['status'=>'not_present']);
                                }
                                
                            }
                        } else {
                            return response()->json(['status'=>'not_valid']);
                        }
                    } 
                    //Checking for core i5 Barebone
                    else if($request->skd_type_val == 'i5') {
                        if($request->cur_code[1] == '5') {
                            //checking already exist or not into database
                            $slcount = SkdSerial::where('skd_serial',$request->cur_code)->count();
                            if($slcount > 0){
                                return response()->json(['status'=>'already_exist']);
                            } 
                            else {
                                if($request->bar_codes != null) {
                                    //checking double barcode scaning for same barcode serial number
                                    $barcode_arr = explode (",", $request->bar_codes);
                                    if (in_array($request->cur_code, $barcode_arr))
                                    {
                                        return response()->json(['status'=>'present']);
                                    }
                                    else
                                    {
                                        return response()->json(['status'=>'not_present']);
                                    }
                                } else {
                                    return response()->json(['status'=>'not_present']);
                                }
                                
                            }
                        } else {
                            return response()->json(['status'=>'not_valid']);
                        }
                    }
                    //Checking for core i7 Barebone
                    else if($request->skd_type_val == 'i7') {
                        if($request->cur_code[1] == '7') {
                            // checking already exist or not into database
                            $slcount = SkdSerial::where('skd_serial',$request->cur_code)->count();
                            if($slcount > 0){
                                return response()->json(['status'=>'already_exist']);
                            } 
                            else {
                                if($request->bar_codes != null) {
                                    // checking double barcode scaning for same barcode serial number
                                    $barcode_arr = explode (",", $request->bar_codes);
                                    if (in_array($request->cur_code, $barcode_arr))
                                    {
                                        return response()->json(['status'=>'present']);
                                    }
                                    else
                                    {
                                        return response()->json(['status'=>'not_present']);
                                    }
                                } else {
                                    return response()->json(['status'=>'not_present']);
                                }
                                
                            }
                        } else {
                            return response()->json(['status'=>'not_valid']);
                        }
                    }
                } else {
                    return response()->json(['status'=>'not_valid']);
                }
            }

        } else {
            return response()->json(['status'=>'not_valid']);
        }
    }

    public function queue_list(){
        $data['queues'] = SkdSerial::select('*',DB::raw('count(*) as total'))->groupBy('ens_id','skd_brand')->get();
        return view('admin.layouts.inventory.queueList',$data);
       
    }
    public function get_ens_details_by_id(Request $req){
       return $this->ensDrawerViewHtml($req->ens_id);  
    }

    public function ens_verify_submit(Request $request) {
        $alldata = RawInventory::where('ens_id', $request->ens_id)->first();
        if($alldata['needed_verify'] > 0){
            $ens_needed_verify_id_str = str_replace( array( '[', ']', '"' ), '', $alldata['needed_verify_ids']);
            $ens_needed_verify_id_arr = explode (",", $ens_needed_verify_id_str);
            if(in_array(Auth::id(), $ens_needed_verify_id_arr)){
                $ens_verified_id_str = str_replace( array( '[', ']', '"' ), '', $alldata['verified_ids']);
                $ens_verified_id_arr = explode (",", $ens_verified_id_str);
                if(in_array(Auth::id(), $ens_verified_id_arr)){
                    return response()->json(['status'=>'error', 'message'=>'Already verified']);
                } else {
                    $total_verified = $alldata['total_verified'] + 1;
                    if($alldata['verified_ids'] == null){
                        $verify_id = '["'.Auth::id().'"]';
                    } else {
                        $verify_id_str = str_replace( array(  ']'), '', $alldata['verified_ids']);
                        $verify_id = $verify_id_str.',"'.Auth::id().'"]';
                    }
                    RawInventory::where('ens_id', $request->ens_id)->update(array('total_verified' => $total_verified, 'verified_ids' => $verify_id));
                    //verify id updated into history
            // ens Created history table start
            $table_max_id = RawInventory::max('id');
            $identity_no = $table_max_id + 1;
            $history = new AllHistory();
            $history->table_name = 'RawInventory';
            $history->table_id = $table_max_id;
            $history->menu_name = 'SKD Queue Listing ';
            $history->ens_id = RawInventory::max('ens_id');
            $history->created_by = Auth::id();
            $history->journal = '<span class=" text-gray-800"> Verified By ' .Auth::user()->name .'</span>';
            $history->date = date('Y-m-d');
            $history-> save();
            // ens Created history table end

                    //end


                    $drawerUpdatedHtml = $this->ensDrawerViewHtml($request->ens_id);
                    return response()->json(['status'=>'success', 'drawer_html'=>$drawerUpdatedHtml]);
                }
                
            } else {
                return response()->json(['status'=>'error', 'message'=>'You have not permission to verify!']);
            }
        } else {
            return response()->json(['status'=>'error']); 
        }
    }

    public function ens_confirm(Request $request){
        $created_by = Auth::id();
        $admin_name = Auth::user()->name;
        $alldata = RawInventory::where('ens_id', $request->confirm_ens_id)->first();
        if($alldata['confirmed_ids'] == null){
            $cnfrm_id = '["'.Auth::id().'"]';
        }else{
            $ens_cnfirm_id_str1 = str_replace( array(  ']'), '', $alldata['confirmed_ids']);
            $cnfrm_id = $ens_cnfirm_id_str1.',"'.Auth::id().'"]';
        } 
            
        $total_cnfrm = $alldata['total_confirmed'] + 1;
        RawInventory::where('ens_id', $request->confirm_ens_id)->update(array('confirmed_ids' => $cnfrm_id, 'total_confirmed' => $total_cnfrm));
        if($alldata['needed_confirm'] == $total_cnfrm){
            //update flow type when all confirmed done
            $ens_count = SkdSerial::where('ens_id', $request->confirm_ens_id)->count();
            for($flow = 0; $flow < $ens_count; $flow ++ ){
                $inflow = SkdSerial::where('flow_type',NULL)->where('ens_id', $request->confirm_ens_id)->first();
                $inflow->flow_type = 'inflow';
                $inflow->save();
            };
            $alldata->flow_type = 'inflow';
            $alldata->save();
            // data entry history table when one user confirm start
            $history = new AllHistory();
            $history->table_name = 'RawInventory';
            $history->table_id = $alldata->id;
            $history->ens_id = $alldata->ens_id;
            $history->created_by = $created_by;
            $history->journal = '<span class=" text-gray-800">Added to the SKD Inventory</span>';
            $history->flow_type = $alldata->flow_type;
            $history->date = date('Y-m-d');
            $history-> save();
            $history = new AllHistory();
            $history->table_name = 'RawInventory';
            $history->table_id = $alldata->id;
            $history->ens_id = $alldata->ens_id;
            $history->created_by = $created_by;
            $history->menu_name = 'SKD Queue List';
            $history->flow_type = 'inflow';
            $history->journal = '<span class=" text-gray-800">Confirmed By ' .$admin_name. '</span>';
            $history->date = date('Y-m-d');
            $history-> save();

        // data entry history table end
            return response()->json(['status'=>'success', 'all_confirm' => 'yes']);
        } else {
            // data entry history table when one user confirm start
            $history = new AllHistory();
            $history->table_name = 'RawInventory';
            $history->table_id = $alldata->id;
            $history->ens_id = $alldata->ens_id;
            $history->created_by = $created_by;
            $history->menu_name = 'SKD Queue List';
            $history->journal = '<span class=" text-gray-800"> Confirmed By ' .$admin_name .'</span>';
            $history->date = date('Y-m-d');
            $history-> save();
            // data entry history table end

            $drawerHtml = $this->ensDrawerViewHtml($request->confirm_ens_id);
            $queueListHtml = $this->getSKDQueueListHtml();

            return response()->json(['status'=>'success', 'all_confirm' => 'no', 'drawer_html' => $drawerHtml, 'queueListHtml' => $queueListHtml]);
        }
        
    }

    public function ensDrawerViewHtml($ens_id){
        $alldata = SkdSerial::where('ens_id', $ens_id)->get();
        $skd_history = AllHistory::where('ens_id', $ens_id)->orderBy('id', 'DESC')->get();
        $skd_history_count = AllHistory::where('ens_id', $ens_id)->count();
        $html = '<div class="card rounded-0 w-100"><div class="card-header pe-5"><div class="card-title" style="text-transform: uppercase">ENS'.$alldata[0]['rawInventoryDetails']['ens_id'].' Details</div>
            <div class="card-toolbar"><div class="d-flex align-items-center " style="place-content: end;">';

        $hasPermission = User::hasPermission(["confirm_reject_ens_request"]);
        $btnhtml = '';
        if($hasPermission){
            $single_skd_data = RawInventory::where('ens_id', $ens_id)->first();
            $needed_confirm_ids_str = str_replace( array( '[', ']', '"' ), '', $single_skd_data['needed_confirm_ids']);
            $needed_confirm_ids_arr = explode (",", $needed_confirm_ids_str);
            $needed_verify_ids_str = str_replace( array( '[', ']', '"' ), '', $single_skd_data['needed_verify_ids']);
            $needed_verify_ids_arr = explode (",", $needed_verify_ids_str);

            if(in_array(Auth::id(), $needed_confirm_ids_arr)){
                if($single_skd_data['confirmed_ids'] == null){
                    if(in_array(Auth::id(), $needed_verify_ids_arr)){
                        $ens_verified_ids_str = str_replace( array( '[', ']', '"' ), '', $single_skd_data['verified_ids']);
                        $ens_verified_ids_arr = explode (",", $ens_verified_ids_str);
                        if(in_array(Auth::id(), $ens_verified_ids_arr)){
                            $btnhtml = '<button class="btn ens-verify-btn btn-primary btn-sm" disabled>Verified</button><button class="btn confirm btn-sm" onclick="confirmENSAlertModal('.$ens_id.')">Confirm</button><button class="btn reject  btn-sm" onclick="rejectModal('.$ens_id.')">Reject</button>';
                        } else {
                            $btnhtml = '<button id="kt_drawer_verify_ens_serial_permanent_toggle" data-kt-drawer-permanent="true" class="btn ens-verify-btn btn-primary btn-sm" onclick="verifyENSDrawer('.$ens_id.')">Verify</button><button class="btn confirm btn-sm" disabled>Confirm</button><button class="btn reject  btn-sm" onclick="rejectModal('.$ens_id.')">Reject</button>';
                        }
                    } else {
                        $btnhtml = '<button class="btn confirm btn-sm" onclick="confirmENSAlertModal('.$ens_id.')">Confirm</button><button class="btn reject  btn-sm" onclick="rejectModal('.$ens_id.')">Reject</button>';
                    }
                    
                } else {
                    $res = str_replace( array( '[', ']', '"' ), '', $single_skd_data['confirmed_ids']);
                    $ens_confirm_arr = explode (",", $res);
                    if(in_array(Auth::id(), $ens_confirm_arr)){
                        $ens_verified_ids_str = str_replace( array( '[', ']', '"' ), '', $single_skd_data['verified_ids']);
                        $ens_verified_ids_arr = explode (",", $ens_verified_ids_str);
                        if(in_array(Auth::id(), $ens_verified_ids_arr)){
                            $btnhtml = '<button class="btn ens-verify-btn btn-primary btn-sm" disabled>Verified</button><button class="btn confirm btn-sm" disabled>Confirmed</button>';
                        } else {
                            $btnhtml = '<button class="btn confirm btn-sm" disabled>Confirmed</button>';
                        }
                    } else {
                        if(in_array(Auth::id(), $needed_verify_ids_arr)){
                            $ens_verified_ids_str = str_replace( array( '[', ']', '"' ), '', $single_skd_data['verified_ids']);
                            $ens_verified_ids_arr = explode (",", $ens_verified_ids_str);
                            if(in_array(Auth::id(), $ens_verified_ids_arr)){
                                $btnhtml = '<button class="btn ens-verify-btn btn-primary btn-sm" disabled>Verified</button><button class="btn confirm btn-sm" onclick="confirmENSAlertModal('.$ens_id.')">Confirm</button><button class="btn reject  btn-sm" onclick="rejectModal('.$ens_id.')">Reject</button>';
                            }else{
                                $btnhtml = '<button id="kt_drawer_verify_ens_serial_permanent_toggle" data-kt-drawer-permanent="true" class="btn ens-verify-btn btn-primary btn-sm" onclick="verifyENSDrawer('.$ens_id.')">Verify</button><button class="btn confirm btn-sm" disabled>Confirm</button><button class="btn reject  btn-sm" onclick="rejectModal('.$ens_id.')">Reject</button>';
                            }
                        } else {
                            $btnhtml = '<button class="btn confirm btn-sm" onclick="confirmENSAlertModal('.$ens_id.')">Confirm</button><button class="btn reject  btn-sm" onclick="rejectModal('.$ens_id.')">Reject</button>';
                        }
                        
                    }
                    
                }
            } 
            
        }

        $skd_brand = '';
        if ($alldata[0]['rawInventoryDetails']['product_type'] == 'RAM') {
            $skd_brand = $alldata[0]['rawInventoryDetails']['ram_brand'];
        } else if($alldata[0]['rawInventoryDetails']['product_type'] == 'SSD') {
            $skd_brand = $alldata[0]['rawInventoryDetails']['ssd_brand'];
        } else if($alldata[0]['rawInventoryDetails']['product_type'] == 'Barebone') {
            $skd_brand = $alldata[0]['rawInventoryDetails']['bb_brand'];
        }

        // SKD Information
        $html = $html . $btnhtml . '<button class="btn close  btn-sm" id="kt_drawer_example_permanent_close">Close</button></div></div></div><div class="card-body hover-scroll-overlay-y"><div class="text-center d-flex align-items-center" style="place-content: center;">
                <h1 class=" my-2 fs-3 d-flex align-items-center text-gray-800 ">SKD Information</h1></div><div class="row my-5"><div class="col-md-6"><p class="fw-bolder fs-5 text-gray-700">SKD Category: <span class="text-gray-800">'.$alldata[0]['rawInventoryDetails']['product_type'].'</span></p>
                <p class="fw-bolder fs-5 text-gray-700">SKD Brand: <span class="text-gray-800">'.$skd_brand.'</span></p>';
                    
        if($alldata[0]['rawInventoryDetails']['product_type'] == 'Barebone'){
            $html = $html . '<p class="fw-bolder fs-5 text-gray-700">Barebone Type: <span class="text-gray-800">'.$alldata[0]['rawInventoryDetails']['bb_type'].'</span></p><p class="fw-bolder fs-5 text-gray-700">Barebone Model: <span class="text-gray-800">'.$alldata[0]['rawInventoryDetails']['bb_model'].'</span></p><p class="fw-bolder fs-5 text-gray-700">Barebone Processor: <span class="text-gray-800">Core '.$alldata[0]['rawInventoryDetails']['bb_processor'].'</span></p>';
        }elseif($alldata[0]['rawInventoryDetails']['product_type'] == 'RAM'){
            $html = $html . '<p class="fw-bolder fs-5 text-gray-700">RAM Type: <span class="text-gray-800">'.$alldata[0]['rawInventoryDetails']['ram_type'].'</span></p><p class="fw-bolder fs-5 text-gray-700">RAM Size: <span class="text-gray-800">'.$alldata[0]['rawInventoryDetails']['ram_size'].' GB</span></p><p class="fw-bolder fs-5 text-gray-700">Bus Speed: <span class="text-gray-800">'.$alldata[0]['rawInventoryDetails']['bus_speed'].'Mhz</span></p>';
        }elseif($alldata[0]['rawInventoryDetails']['product_type'] == 'SSD'){
            $ssd_size_type = 'TB';
            if ($alldata[0]['rawInventoryDetails']['ssd_size'] > 10) {$ssd_size_type = 'GB';}
            $html = $html . '<p class="fw-bolder fs-5 text-gray-700">SSD Type: <span class="text-gray-800">'.$alldata[0]['rawInventoryDetails']['ssd_type'].'</span></p><p class="fw-bolder fs-5 text-gray-700">'.$alldata[0]['rawInventoryDetails']['ssd_type'].' Type: <span class="text-gray-800">'.$alldata[0]['rawInventoryDetails']['m2_type'].'</span></p><p class="fw-bolder fs-5 text-gray-700">SSD Size: <span class="text-gray-800">'.$alldata[0]['rawInventoryDetails']['ssd_size'].' '.$ssd_size_type.'</span></p>';
        }

        $html = $html . '</div><div class="col-md-6"><p class="fw-bolder fs-5 text-gray-700">Purchase ID: <span class="text-gray-800">'.$alldata[0]['rawInventoryDetails']['purchase_id'].'</span></p><p class="fw-bolder fs-5 text-gray-700">Create By: <span class="text-gray-800">'.$alldata[0]['rawInventoryDetails']['userDetails']['name'].'</span></p>
                    <p class="fw-bolder fs-5 text-gray-700">Create Date: <span class="text-gray-800">'.date('d M Y',strtotime($alldata[0]['rawInventoryDetails']['created_at'])).'</span></p><p class="fw-bolder fs-5 text-gray-700">Total SKD Serial No <span class="text-gray-800">'.count($alldata).'</span></p></div></div>
                    <div class="text-center d-flex align-items-center mt-5" style="place-content: center;"><h1 class=" mt-2 fs-3 text-gray-800 ">Serial No</h1></div><div class="row my-5 pb-5" style="background-color:#00000000;">';
            
        $html1 = '';
        //serial number
        for($x = 0; $x < count($alldata); $x++){
            $html1 = $html1 . '<div class=" col-md-3"><p class="fs-5 fw-bolder text-gray-700">'.$alldata[$x]['skd_serial'].'</p></div>';
        }

        $html = $html . $html1 . '</div><div class="text-center d-flex align-items-center" style="place-content: center;"><h1 class=" my-2 fs-3 d-flex align-items-center text-gray-800 ">History</h1></div><div class="card-body p-0">
                <table class="table align-middle table-row-dashed  text-gray-700 fs-6 gy-5" id="kt_ecommerce_sales_table"><thead><tr><th scope="col">Date</th><th scope="col" >Journal</th></tr></thead><tbody>';
                $html2 = '';
                for($skd_history_loop = 0 ; $skd_history_loop < $skd_history_count; $skd_history_loop ++){
                    $html2 = $html2 .  '<tr><th scope="row">'.date('d M Y',strtotime($skd_history[$skd_history_loop]->created_at)).'</th><td>'.$skd_history[$skd_history_loop]->journal.' <i>'.date('h:i:A',strtotime($skd_history[$skd_history_loop]->created_at)).'</i></td></tr>';
                }
                $html = $html . $html2 .  '</tbody></table></div></div></div>';

      return $html;
    }

    public function getSKDQueueListHtml(){
        $skdQueueLists = SkdSerial::select('*',DB::raw('count(*) as total'))->groupBy('ens_id')->get();

        $queueListHtml = '';
        foreach($skdQueueLists as $key=>$queue) {
            if($queue['rawInventoryDetails']['needed_confirm'] != $queue['rawInventoryDetails']['total_confirmed']) {
                $queueListHtml = $queueListHtml . '<tr><td data-kt-ecommerce-order-filter="order_id"><span style="text-transform: uppercase" href="" class="px-0 mx-0 fw-bolder">ENS'.$queue['rawInventoryDetails']['ens_id'].'</span></td><td><div class="d-flex align-items-start"><div class="ms-2"><a href="" class="text-gray-600 fw-bolder">'.$queue['rawInventoryDetails']['product_type'].'</a></div></div></td>
                                <td class="text-start pe-0 quantity-flex"><span class="fw-bolder">'.$queue->total.'</span></td><td class="text-start pe-0"><span class="fw-bolder">'.date('d M Y',strtotime($queue->created_at)).'</span></td><td class="text-start pe-0" data-order="Completed"><div class="badge badge-light-primary">';
                
                if($queue->status == 0) {
                    $queueListHtml = $queueListHtml . '<span class="fw-bolder">Wating for confirmation</span>';
                }
                 
                $created_by = User::getUsersName([$queue['rawInventoryDetails']->created_by]);
                $queueListHtml = $queueListHtml . '</div><br></td><td><span class="fw-bolder">'.$created_by[0].'</span></td><td>';

                $needed_confirm_all_ids = $queue['rawInventoryDetails']['needed_confirm_ids'];
                $needed_confirm_all_ids_str = str_replace( array( '[', ']', '"' ), '', $needed_confirm_all_ids);
                $needed_confirm_all_ids_arr = explode (",", $needed_confirm_all_ids_str);

                $confirm_all_ids = $queue['rawInventoryDetails']['confirmed_ids'];
                $confirm_all_ids_str = str_replace( array( '[', ']', '"' ), '', $confirm_all_ids);
                $confirm_all_ids_arr = explode (",", $confirm_all_ids_str);

                if(count($confirm_all_ids_arr) > 0){
                    $skd_confirmation_names = User::getUsersName($confirm_all_ids_arr);
                } else {
                    $skd_confirmation_names = [];
                }

                $new_needed_confirm_all_ids_arr = [];
                for($i = 0; $i < count($needed_confirm_all_ids_arr); $i++){
                    if(!in_array($needed_confirm_all_ids_arr[$i], $confirm_all_ids_arr)){
                        array_push($new_needed_confirm_all_ids_arr,$needed_confirm_all_ids_arr[$i]);
                    }
                }
                
                if(count($needed_confirm_all_ids_arr) > 0){
                    $skd_remaining_confirmation_names = User::getUsersName($new_needed_confirm_all_ids_arr);
                } else {
                    $skd_remaining_confirmation_names = []; 
                }
                
                    
                $needed_confirm = $queue['rawInventoryDetails']['needed_confirm'];
                $total_confirmed = $queue['rawInventoryDetails']['total_confirmed'];
                $confirm = $needed_confirm - $total_confirmed;
                    
                for($x = 0; $x< $total_confirmed; $x++) {
                    
                    $queueListHtml = $queueListHtml . '<button type="button" class="btn-icon" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="'.$skd_confirmation_names[$x].'"><i
                    class="fa-solid fa-check"></i></button>';
                }
                for($x = 0; $x< $confirm; $x++) {
                    
                    $queueListHtml = $queueListHtml . '<button type="button" class="btn-icon" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="'.$skd_remaining_confirmation_names[$x].'"><i
                    class="fa-solid fa-minus"></i></button>';
                }

                $queueListHtml = $queueListHtml . '</td><td class="text-start"><div class="menu-item"><a id="kt_drawer_example_permanent_toggle" data-kt-drawer-permanent="true" href="" class="menu-link ens_id_no" onclick="getENSID('.$queue->ens_id.')">View</a></div></td></tr>';
            }
        }
        return $queueListHtml;
    }

    public function skdreject(Request $request){
        $ens_id = $request->rejectbtnvalue;
        $alldata = RawInventory::where('ens_id', $ens_id)->first();
        $alldata->status = 2;
        $alldata->save();
        $skd_serial_no = SkdSerial::where('ens_id', $ens_id)->delete();
        // ens rejected history table start
        $history = new AllHistory();
        $history->table_name = 'RawInventory';
        $history->table_id = $alldata->id;
        $history->ens_id = $alldata->ens_id;
        $history->created_by = Auth::id();
        $history->status = 'rejected';
        $history->menu_name = 'SKD Queue List';
        $history->journal = '<span class=" text-gray-800"> Rejected By ' .Auth::user()->name .'</span>';
        $history->date = date('Y-m-d');
        $history-> save();
        // ens rejected history table end
        return redirect()->route('queue.list');
    }

    public function get_inventory_details(Request $request) {
        $defaultStartDate = date('Y-m-d',strtotime('-1 month'));
        $defaultEndtDate = date('Y-m-d');
        if(isset($_COOKIE['start_date']) || isset($_COOKIE['end_date'])){
            $startDate=$_COOKIE['start_date'];
            $endDate=$_COOKIE['end_date'];
        }else{
            $startDate = $defaultStartDate;
            $endDate = $defaultEndtDate;
        }
       
      $skd_category = $request->skd_category;
      $search_type = $request->search_type;
      $skd_inventory = RawInventory::where('product_type',$skd_category)
      ->orderBy('id','DESC')
      ->where('ram_size',$search_type)
      ->orWhere('ssd_size',$search_type)
      ->orWhere('bb_processor',$search_type)
      ->get('ens_id');
      $ens_id = $skd_inventory[0]->ens_id;
      $skd_history = AllHistory::where('ens_id',$ens_id)->get();

      $days = '20';
      $months = '12';
      $years = '2022';
      $baseURL = url('');
      $url = $baseURL.'/admin/skd/get-history-date-for-download';
      setcookie('skd_category',$skd_category,time()+60*60*24*100);
      setcookie('search_type',$search_type,time()+60*60*24*100);
        $html = '<div class="card rounded-0 w-100">
        <div class="card-header pe-5">
            <div class="card-title">
                History
            </div>
            <div class="form-group row" style="align-content: center;align-items: center;justify-content: center;">
            <div class="col-lg-5 col-md-5 col-sm-5">
                <input type="hidden" value="'.$skd_category.'" id="skd_category">
                <input type="hidden" value="'.$search_type.'" id="skd_search_type">
                <div class="" id="">
                    <input type="date" value="'.@$startDate.'" class="form-control"  id="startDate" onchange="getSKDHistoryByDate()">
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1" style="width: 39px !important;">
                <p>To</p>
            </div>
           
            <div class="col-lg-5 col-md-5 col-sm-5">
           
                <div class="" id="">
                    <input type="date" value="'.@$endDate.'" class="form-control" id="endDate" onchange="getSKDHistoryByDate()">
                </div>
            </div>
        </div>
            <div class="card-toolbar">           
            <a class="btn" href="'.$url.'"> <i class=" fa-solid fs-3 text-success fa-circle-down"></i></a>
                <button class="btn close  btn-sm" id="kt_drawer_example_permanent_close">Close</button>
            </div>
        </div>
        <div class="card-body hover-scroll-overlay-y">';

    //   $html = $html . '<table class="table align-middle table-row-dashed  text-gray-700 fs-6 gy-5" id="kt_ecommerce_sales_table"><thead><tr><th scope="col">Date</th><th scope="col" >Journal</th></tr></thead>';
    //       $ens_history = AllHistory::where('ens_id',$skd_inventory[0]->ens_id)->get();
    //       foreach($ens_history as $key=>$history){
    //           $html = $html . '<tr><th scope="row">'.date('d M Y',strtotime($history->created_at)).'</th><td>'.$history->journal.' <i>'.date('h:i:A',strtotime($history->created_at)).'</i></td></tr>';
    //       }
    //       $html = $html .  '<tbody></div></tbody></table>
    //       </div>';
    $html = $html . '<div id="ens_id_details"> <table class="table align-middle table-row-dashed  text-gray-700 fs-6 gy-5" id="kt_ecommerce_sales_table"><thead><tr><th scope="col">Date</th><th scope="col" >Journal</th></tr></thead>';

         foreach($skd_inventory as $key=>$ens_id){

            $ens_history = AllHistory::select('*')->orderBy('created_at','DESC')->where('ens_id',$ens_id->ens_id)->whereBetween('date', [$startDate, $endDate])->get();
            foreach($ens_history as $key=>$history){
                $html = $html . '<tr><th scope="row">'.date('d M Y',strtotime($history->created_at)).'</th><td><a class="ens_no" onclick="openENSSerialModal('.$history->ens_id.')"><p class="inventory_jurnal">ENS'.$history->ens_id.'</a> '.$history->journal.' <i>'.date('h:i:A',strtotime($history->created_at)).'</i></p></td></tr>';
            }
            
         }

         $html = $html .  '</div><tbody></div></tbody></table>
         </div>';
        //  $html = $html . ' <table class="table align-middle table-row-dashed  text-gray-700 fs-6 gy-5" id="kt_ecommerce_sales_table"><thead><tr><th scope="col">Date</th><th scope="col" >Journal</th></tr></thead><tbody>';
        // foreach($skd_history as $key=>$history){
        //     $html = $html . '<tr><th scope="row">'.date('d M Y',strtotime($history->created_at)).'</th><td>'.$history->journal.' <i>'.date('h:i:A',strtotime($history->created_at)).'</i></td></tr>';
        // }
 
       
        return response()->json(['status'=>'success', 'html' => $html]);
    }


    // public function get_ens_history(Request $request){
    //     $ensId = $request->ensId;
    //     $Skd_Serial_No = SkdSerial::where('ens_id', $ensId)->get();
    //     $ens_history = AllHistory::where('ens_id',$ensId)->get();
    //     $html='<table class="table align-middle table-row-dashed  text-gray-700 fs-6 gy-5" id="kt_ecommerce_sales_table"><thead><tr><th scope="col">Date</th><th scope="col" >Journal</th></tr></thead><tbody>';
    //     foreach($ens_history as $key=>$history){
    //                 $html = $html .'<tr><th scope="row">'.date('d M Y',strtotime($history->created_at)).'</th><td>'.$history->journal.' <i>'.date('h:i:A',strtotime($history->created_at)).'</i></td></tr> <div class="text-center d-flex align-items-center mt-5" style="place-content: center;"><h1 class=" mt-2 fs-3 text-gray-800 ">Serial No</h1></div><div class="row my-5 pb-5" style="background-color:#00000000;">';
    //             }
    //     foreach($Skd_Serial_No as $key=>$serial){
    //             $html = $html .'<div class=" col-md-3"><p class="fs-5 fw-bolder text-gray-700">'.$serial->skd_serial.'</p></div>';
    //     }
    //     return response()->json(['status'=>'success', 'html' => $html]);
    // }


    public function get_skd_history_by_date(Request $request) {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $skd_category = $request->skd_category;
        $search_type = $request->skd_search_type;
        
        $skd_inventory = RawInventory::where('product_type',$skd_category)
        ->orderBy('id','DESC')
        ->where('ram_size',$search_type)
        ->orWhere('ssd_size',$search_type)
        ->orWhere('bb_processor',$search_type)
        ->get('ens_id');
        $html =  ' <table class="table align-middle table-row-dashed  text-gray-700 fs-6 gy-5" id="kt_ecommerce_sales_table"><thead><tr><th scope="col">Date</th><th scope="col" >Journal</th></tr></thead>';
        foreach($skd_inventory as $key=>$ens_id){

        $ens_history = AllHistory::select('*')
        ->orderBy('created_at','DESC')
        ->where('ens_id',$ens_id->ens_id)
        ->whereBetween('date', [$start_date, $end_date])
        ->get();   
            foreach($ens_history as $key=>$history){
                $html = $html . '<tr><th scope="row">'.date('d M Y',strtotime($history->date)).'</th><td><p class="inventory_jurnal"><a class="ens_no" onclick="openENSSerialModal('.$history->ens_id.')">ENS'.$history->ens_id.'</a> '.$history->journal.' <i>'.date('h:i:A',strtotime($history->created_at)).'</i></p></td></tr>';
            }
            
         }
         setcookie('start_date',$start_date,time()+60*60*24*100);
         setcookie('end_date',$end_date,time()+60*60*24*100);
        return response()->json(['status'=>'success', 'html' => $html]);
    }


    public function get_verified_ens_skd_serials_list(Request $request) {
        $all_serials = SkdSerial::where('ens_id',$request->ens_id)->where('flow_type',NULL)->select('skd_serial')->get();
        $html = '<div class="text-end pt-5 pe-3"><button class="btn close btn-sm" id="kt_drawer_verify_ens_serial_permanent_close">Close</button></div><h2 class="text-center mt-5 mb-3 text-danger">Total SKD Verified: 0</h2><div class="card-body pt-0" style="height: 700px;overflow-y: scroll;">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table"><thead><tr class="text-end text-gray-600 fw-bolder fs-5 text-uppercase gs-2">
                                <th class="text-start min-w-50px">Sl.</th><th class="text-start min-w-250px">Item Serial On The List</th><th class="text-start min-w-100px">Checked</th></tr></thead>
                        <tbody class="fw-bold text-gray-500" id="user-permission-list">';
        for($i = 0; $i < count($all_serials); $i++){
            $sl = $i + 1;
            $html = $html . '<tr><td class="text-start pe-0 "><span class="fw-bolder">'.$sl.'</span></td><td class="text-start pe-0"><span class="fw-bolder">'.$all_serials[$i]->skd_serial.'</span></td>
            <td class="text-start pe-0" data-order="47"><span class="fw-bolder ms-3"><i class="fa-solid fa-xmark skd-not-checked"></i></span></td></tr>';
        }
                            
        $html = $html . '</tbody></table></div><input type="hidden" id="total_veryfing_ens_serial" name="total_veryfing_ens_serial" value="'.count($all_serials).'"><input type="hidden" id="total_veryfied_ens_serial" name="total_veryfied_ens_serial" value="0"><div class="text-center mt-5"><button class="btn start-scaning-btn btn-sm me-5" id="kt_drawer_verify_ens_serial_permanent_close" onclick="openBarcodeScaningModal('.$request->ens_id.')">Start Scaning</button> <button class="btn verify-submit-btn btn-sm" onclick="submitVerifyENSRequest('.$request->ens_id.')">Submit</button></div>';
        return response()->json(['status'=>'success', 'html' => $html]);
    }


    public function check_valid_barcode_for_verify(Request $request) {
        // checking serial number length
        if(strlen($request->cur_code) == 10) {
            if($request->cur_code[0] == 'R' || $request->cur_code[0] == 'B' || $request->cur_code[0] == 'S'){
                
                if($request->bar_codes != null) {
                    //checking double barcode scaning for same barcode serial number
                    $barcode_arr = explode (",", $request->bar_codes);
                    if (in_array($request->cur_code, $barcode_arr))
                    {
                        return response()->json(['status'=>'present']);
                    }
                    else
                    {
                        return response()->json(['status'=>'not_present']);
                    }
                }  
                else {
                    return response()->json(['status'=>'not_present']);
                }
            } else {
                return response()->json(['status'=>'not_valid']);
            }
        } else {
            return response()->json(['status'=>'not_valid']);
        }
    }


    public function submit_skd_serial_for_verify(Request $request) {
        
        $all_skd_serials = SkdSerial::where('ens_id',$request->ens_number)->where('flow_type',NULL)->select('skd_serial')->get();
        $verify_barcode_serial_list = explode(",", $request->final_items_id);

        $veryfied_barcode_serials_arr = [];
        foreach($all_skd_serials as $key => $serial){
            if(in_array($serial->skd_serial,$verify_barcode_serial_list)){
                array_push($veryfied_barcode_serials_arr,$serial->skd_serial);
            }
        }

        
        if(count($veryfied_barcode_serials_arr) == count($all_skd_serials)){
            $title_clr = 'text-success';
        } else {
            $title_clr = 'text-danger';
        }

        $html = '<div class="text-end pt-5 pe-3"><button class="btn close btn-sm" id="kt_drawer_verify_ens_serial_permanent_close">Close</button></div><h2 class="text-center mt-5 mb-3 '.$title_clr.'">Total SKD Verified: '.count($veryfied_barcode_serials_arr).'</h2><div class="card-body pt-0" style="height: 700px;overflow-y: scroll;">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table"><thead><tr class="text-end text-gray-600 fw-bolder fs-5 text-uppercase gs-2">
                                <th class="text-start min-w-50px">Sl.</th><th class="text-start min-w-250px">Item Serial On The List</th><th class="text-start min-w-100px">Checked</th></tr></thead>
                        <tbody class="fw-bold text-gray-500" id="user-permission-list">';
        for($i = 0; $i < count($all_skd_serials); $i++){
            $sl = $i + 1;
            $html = $html . '<tr><td class="text-start pe-0 "><span class="fw-bolder">'.$sl.'</span></td><td class="text-start pe-0"><span class="fw-bolder">'.$all_skd_serials[$i]->skd_serial.'</span></td>
            <td class="text-start pe-0" data-order="47"><span class="fw-bolder ms-3">';
            if(in_array($all_skd_serials[$i]->skd_serial,$veryfied_barcode_serials_arr)){
                $html = $html . '<i class="fa-solid fa-check skd-checked"></i></span></td></tr>';
            } else {
                $html = $html . '<i class="fa-solid fa-xmark skd-not-checked"></i></span></td></tr>';
            }
            
        }
                            
        $html = $html . '</tbody></table></div><input type="hidden" id="total_veryfing_ens_serial" name="total_veryfing_ens_serial" value="'.count($all_skd_serials).'"><input type="hidden" id="total_veryfied_ens_serial" name="total_veryfied_ens_serial" value="'.count($veryfied_barcode_serials_arr).'"><div class="text-center mt-5"><button class="btn start-scaning-btn btn-sm me-5" id="kt_drawer_verify_ens_serial_permanent_close" onclick="openBarcodeScaningModal('.$request->ens_number.')">Start Scaning</button> <button class="btn verify-submit-btn btn-sm" onclick="submitVerifyENSRequest('.$request->ens_number.')">Submit</button> </div>';
        return response()->json(['status'=>'success', 'html' => $html]);
    }

    public function get_skd_serial_on_modal_by_ens_number(Request $request){
        $allSerials = SkdSerial::where('ens_id',$request->ens_id)->select('*')->get();
        $inflow = SkdSerial::where('ens_id',$request->ens_id)->where('flow_type','inflow')->select('*')->get();
        $outflow = SkdSerial::where('ens_id',$request->ens_id)->where('flow_type','outflow')->select('*')->get();
        $ensStatus = RawInventory::where('ens_id',$request->ens_id)->get();
        $rejected_id = AllHistory::where('ens_id',$request->ens_id)->where('status','rejected')->get();
        $html = '';
        if(($ensStatus[0]->flow_type == 'inflow') && ($ensStatus[0]->status == 0) ){
            $html = '<div class="text-center d-flex align-items-center mt-5" style="place-content: center;"><p class="fs-5 fw-bolder text-gray-700">Stock In Warehouse<p></div><div class="row my-5 pb-5" style="background-color:#00000000;">';
            if(($ensStatus[0]->status != 2) && (count($inflow)> 0 )){
             for($i=0; $i<count($inflow); $i++){
                    $html = $html. '<div class=" col-md-3"><p class="fs-5 fw-bolder text-success">'.$allSerials[$i]->skd_serial.'</p></div> ' ;
             }
            }

             if(($ensStatus[0]->status != 2) && (count($outflow)> 0 )){
                $html = $html . '<div class="text-center d-flex align-items-center mt-5" style="place-content: center;"><p class="fs-5 fw-bolder text-gray-700">Used<p></div><div class="row my-5 pb-5" style="background-color:#00000000;">';
             for($i=0; $i<count($outflow); $i++){
                $html = $html. '<div class=" col-md-3"><p class="fs-5 fw-bolder text-gray-500">'.$allSerials[$i]->skd_serial.'</p></div>' ;
             }
            }
        }else if(($ensStatus[0]->flow_type == null) && ($ensStatus[0]->status == 0) ){
            $html =  '<div class="row my-5 pb-5" style="background-color:#00000000;"><div class=" col-md-12"><p class="fs-5 text-center text-warning">This ENS Wating for all confirmation</p></div>' ;
        }else if(($ensStatus[0]->flow_type == null) &&($ensStatus[0]->status == 2) ){
            $html =  '<div class="row my-5 pb-5" style="background-color:#00000000;"><div class=" col-md-12"><p class="fs-5 text-center text-danger">This ENS '.$rejected_id[0]->journal.'</p></div>' ;
        }

        return response()->json(['status'=>'success', 'html' => $html]);

    }
    public function get_history_date_for_download(){
        $defaultStartDate = date('Y-m-d',strtotime('-1 month'));
        $defaultEndtDate = date('Y-m-d');
        if(isset($_COOKIE['start_date']) || isset($_COOKIE['end_date'])){
            $start_date=$_COOKIE['start_date'];
            $end_date=$_COOKIE['end_date'];
        }else{
            $start_date = $defaultStartDate;
            $end_date = $defaultEndtDate;
        }
        $search_type = $_COOKIE['search_type'];
        $skd_category = $_COOKIE['skd_category'];
      return  Excel::download(new UserExpport($start_date,$end_date,$skd_category,$search_type), ''.$skd_category.' '.$search_type.'.xlsx');
    }

}