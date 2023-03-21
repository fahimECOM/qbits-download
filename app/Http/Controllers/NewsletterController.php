<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NewsletterSubscription;
use App\Mail\LaniaPreOrder;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Mail;
// use App\Models\Mail;
use Auth;

class NewsletterController extends Controller
{
    //store subscriber email to database
    public function store(Request $request) {
        $subscriberCount = NewsletterSubscriber::where('email', $request->subscribe_email)->count();
        if($subscriberCount > 0){
            return response()->json(['status'=>'exists','msg'=>'There is already subscribed with this email']);
        } else {
            $newsletter = new NewsletterSubscriber;
            $newsletter->email = $request->subscribe_email;
            $newsletter->status = 1;
            $newsletter->save();

            if($this->isOnline()){
                try {
                    Mail::to($request->subscribe_email)->send(new NewsletterSubscription());
                } catch (\Exception $e) {
                    
                }

             }else{
                 return redirect()->back()->withInput()->with('error', 'Check your internet');
             }
            return response()->json(['status'=>'added','msg'=>'Thanks for subscribed.']);
        }
    }

    //lania pre order process
    public function lania_pre_order_process(Request $request) {

        $data = array('name' => $request->customer_name,'phone' => $request->customer_phone,'email' => $request->customer_email);

        if($this->isOnline()){
            try {
                Mail::to(env('MAIL_FOR_INFO'))->send(new LaniaPreOrder($data));
            } catch (\Exception $e) {
                
            }
        }else{
            return redirect()->back()->withInput()->with('error', 'Check your internet');
        }

        return response()->json(['status'=>'success']);


    }


    public function isOnline($site = "https://youtube.com"){
        if(@fopen($site, "r")){
            return true;
        }else{
            return false;
        }
    }
}
