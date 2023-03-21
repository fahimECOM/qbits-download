<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Product;
use App\Models\AllHistory;
use App\Models\RawInventory;
use App\Models\SkdSerial;
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
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Validator;

class SystemHistoryController extends Controller
{
    //view system history
    public function view_system_history() {
        $defaultStartDate = date('Y-m-d',strtotime('-1 year'));
        $defaultEndtDate = date('Y-m-d');
     
        if(isset($_COOKIE['start_history_date']) || isset($_COOKIE['end_history_date'])){
            $start_date=$_COOKIE['start_history_date'];
            $end_date=$_COOKIE['end_history_date'];
        }else{
            $start_date = $defaultStartDate;
            $end_date = $defaultEndtDate;
        }
        $data['system_history'] = AllHistory::select('*')->orderBy('id','desc')->get();
        return view('admin.layouts.misc.systemHistory',$data);
    }
    public function view_system_history_get(Request $request){

        $system_history_by_date = AllHistory::select('*')->orderBy('id','desc')->whereBetween('date', [$request->start_date, $request->end_date])->get();
        setcookie('start_history_date',$request->start_date,time()+60*60*24*100);
        setcookie('end_history_date',$request->end_date,time()+60*60*24*100);
        $html ='';
        foreach($system_history_by_date as $key=>$history){
            $html = $html .'<tr>
            <td></td>

            <td class="text-start ">
                <span class="">'.$history->menu_name.'</span>
            </td>
            <td></td>

            <td class="text-center pe-0">
                <span class="">'.date('d M Y',strtotime($history->date)).'</span>
            </td>
            <td></td>
            <td class="text-center pe-0">
            <span class="">'.date('h:i A',strtotime($history->created_at)).'</span>
           </td>
           <td></td>
            <td class="text-start pe-0" data-order="47">';
            if($history->ens_id){
                if($history['rawInventoryDetails']['product_type'] == 'RAM'){
                $html = $html . '   <span class=" ">ENS'.$history->ens_id.' '. $history->journal.' for
                '.$history['rawInventoryDetails']['ram_size'].' GB
                '.$history['rawInventoryDetails']['product_type'].'
            </span>';
                }else if($history['rawInventoryDetails']['product_type'] == 'SSD'){
                    $html = $html . '   <span class=" ">ENS'.$history->ens_id.' '. $history->journal.' for
                    '.$history['rawInventoryDetails']['ssd_size'].' GB
                    '.$history['rawInventoryDetails']['product_type'].'
                </span>';
                }else if($history['rawInventoryDetails']['product_type'] == 'Barebone'){
                    $html = $html . '   <span class=" ">ENS'.$history->ens_id.' '. $history->journal.' for
                    '.$history['rawInventoryDetails']['bb_processor'].' GB
                    '.$history['rawInventoryDetails']['product_type'].'
                </span>';
                }          
            }else{
                $html = $html .   '<span class=" "> '. $history->journal.' </span>';
            }
        }

       

       
       

        return response()->json(['status'=>'success', 'html' => $html]);
    }
}