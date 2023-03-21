<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mail;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Ticket;
use Auth;
use DB;
use PDF;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Hash;
class MailController extends Controller
{
    // basic email

    // public function send_basic_email(){
    //    $data = array('name'=> 'test');
    //    Mail::send(['text'=>'mail'],$data, function($message){
    //        $message->to('nrshagor.isharify@gmail.com', 'Gazi')->subject('laravel test');
    //        $message->from('nrshagor.isharify@gmail.com', 'test');
    //    });
    //    echo "email is send";
    // }
    // basic Attachment

    // public function send_attachment_email(){
    //    $data = array('name'=> 'test');
    //    Mail::send(mail,$data, function($message){
    //        $message->to('nrshagor.isharify@gmail.com', 'Gazi')->subject('laravel test Attachment');
    //        $message->attach('');
    //        $message->from('nrshagor.isharify@gmail.com', 'test');
    //    });
    //    echo "email is send";
    // }

    public function send_basic_email(){
        return view('mail');
    }
    public function sendSuccess(){
        
        return view('frontend.user.dashboard.supportCenters.tickets.create_message');
    }

    public function send(Request $request){
        $res = DB::table('tickets')->first();
        if($res != ''){
            $number =  Ticket::orderBy('id','desc')->first()->id;
        }else{
            $number = 0;
        }
        
        $data = new Ticket();
        $data->Tracking_number = 'QBTN'.((int)$number+1);
        $data->user_id = $request->user_id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->subject = $request->subject;
        $data->product_catagory = $request->product_catagory;
        $data->product_name = $request->product;
        $data->invoice_name = $request->invoice_name;
        $data->status = $request->status;
        $data->date =  date('Y-m-d',strtotime($request->date));
        $data->description = $request->message;
        
        $image = array();
  
          if ($files = $request->t_image) {
             
              foreach ($files as $file) {
                  $image_name = md5(rand(1000, 10000));
                  # insert the image
                  $ext = strtolower($file->getClientOriginalExtension());
                  $image_full_name = $image_name. '.'.$ext;
                  $upload_path = 'backend/assets/images/TicketIssuImage/';
                  $image_url = $upload_path.$image_full_name;
                  $file->move($upload_path, $image_full_name);
                  $image[] = $image_url;
                
              }

          } else{
            $image_url = '';
          }
          $data->photo = implode('|', $image);
         

        $data->save();

        $current_ticket_id = $data->id;
        // $request->validate([
        //     'name'=>'required',
        //     'email'=>'required|email',
        //     'subject'=>'required',
        //     'message'=>'required',
        //     'product_catagory'=>'required',
        //     'invoice_name'=>'required'
        // ]);
        if($this->isOnline()){
           $mail_data = [
               'recipient' => env('MAIL_FOR_INFO'), //get email
               'Tracking' =>$data->Tracking_number,
               'fromEmail' => $request->email,
               'Qbits' => 'Qbits',
               'fromName' => $request->name,
               'status' => $request->status,
               'subject' => $request->subject,
               'photos' => $image_url,
               'current_ticket_id' => $current_ticket_id,
               'body'=>$request->message

           ];
           try {
                //email send to support team.
                if($image_url == ''){
                    \Mail::send('emails.support-ticket-open-message-supportTeam',$mail_data,function($message) use($mail_data){
                        $message->to($mail_data['recipient'])
                        ->from($mail_data['fromEmail'],$mail_data['fromName'])              
                        ->subject($mail_data['subject']);
                    });
                } else {
                    \Mail::send('emails.support-ticket-open-message-supportTeam',$mail_data,function($message) use($mail_data){
                        $message->to($mail_data['recipient']);           
                        $message->attach($mail_data['photos'])
                        ->from($mail_data['fromEmail'],$mail_data['fromName'])              
                        ->subject($mail_data['subject']);
                    });
                }
                

                \Mail::send('emails.support-ticket-open-message',$mail_data,function($message) use($mail_data){
                    $message->to($mail_data['fromEmail'])
                    ->from($mail_data['recipient'],$mail_data['Qbits'])              
                    ->subject($mail_data['subject']);
                });

                //email send to customer
                // \Mail::send('emails.support-ticket-open-message',$mail_data,function($message) use($mail_data){
                //     $message->to($mail_data['fromEmail'])
                //     ->from($mail_data['fromEmail'],$mail_data['Qbits'])            
                //     ->subject($mail_data['subject']);
                // });
            } catch (\Exception $e) {
                
            }
           if(Auth::user()->user_type == 'customer'){
            return redirect()->route('send.email.success')->with('success','email sent');
           } else {
            return redirect()->route('admin.send.email.success')->with('success','email sent');
           }
           
        }else{
            return redirect()->back()->withInput()->with('error', 'Check your internet');
        }
    }
        public function isOnline($site = "https://youtube.com"){
            if(@fopen($site, "r")){
                return true;
            }else{
                return false;
            }
        }
    
}