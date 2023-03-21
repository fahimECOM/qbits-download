<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class UserAuth
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
        if($request->session()->has('USER_LOGIN')){
            
        }else{
            $user = Auth::user();
            if($user){
                // return redirect('signin');
                return redirect(url()->previous());
            } else {
                $request->session()->flash('error','Access Denied');
                if($request->session()->has('ADMIN_LOGIN')){
                    $request->session()->forget('ADMIN_LOGIN');
                    $request->session()->forget('USER_ID');
                    $request->session()->forget('USER_NAME');
                }
                Auth::logout();
                return redirect('/');
            }
        }
        return $next($request);
    }
}