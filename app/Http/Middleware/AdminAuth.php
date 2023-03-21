<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        if($request->session()->has('ADMIN_LOGIN')){
            
        }else{
            $user = Auth::user();
            if($user){
                // return redirect('signin');
                return redirect(url()->previous());
                
            } else {
                $request->session()->flash('error','Access Denied');
                if($request->session()->has('USER_LOGIN')){
                    $request->session()->forget('USER_LOGIN');
                    $request->session()->forget('USER_ID');
                    $request->session()->forget('USER_NAME');
                }
                if($request->session()->has('GUEST_ID')){
                    $request->session()->forget('GUEST_ID');
                    $request->session()->forget('GUEST_EMAIL');
                    $request->session()->forget('GUEST_LOGIN');
                }
                if($request->session()->has('ORDER_ID')){
                    $request->session()->forget('ORDER_ID');
                }
                if($request->session()->has('ORDER_NEW_ID')){
                    $request->session()->forget('ORDER_NEW_ID');
                }
                Auth::logout();
                return redirect('/');
            }
            
        }
        return $next($request);
    }
}