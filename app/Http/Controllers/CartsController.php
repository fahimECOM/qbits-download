<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Cookie;
use Auth;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $carts = Cart::where('user_id', Auth::id())
            ->where('order_id', NULL)
            ->first();
        }else{
            $temp_id = session()->get('USER_CART_TEMP_ID');
            $carts = Cart::where('temp_session_id', $temp_id)
            ->where('order_id', NULL)
            ->first();
        }

        if($carts){
            return view("frontend.shopping_cart", compact('carts'));
        }else{
            // Toastr::warning('No Item has been found in Cart', '', ["positionClass" => "toast-top-right","progressBar" => "true"]);
            return view("frontend.shopping_cart");
        }

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = Product::where('id',$request->product_id)->first();

        $this->validate($request, [
                'product_id' => 'required'
            ],
            [
                'product_id.required' => 'Please Give A Product'
            ]
        );

        $cart = null;

        if($request->bag_id && $request->keyboard_id && $request->ram_id && $request->ssd_id){
            $bag_details = Product::where('id',$request->bag_id)->first();
            $keyboard_details = Product::where('id',$request->keyboard_id)->first();
            $ram_details = Product::where('id',$request->ram_id)->first();
            $ssd_details = Product::where('id',$request->ssd_id)->first();

            if (Auth::check()) {
                $cart = Cart::where('user_id', Auth::id())
                ->where('product_id', $request->product_id)
                ->where('bag_id', $request->bag_id)
                ->where('keyboard_id', $request->keyboard_id)
                ->where('ram_id', $request->ram_id)
                ->where('ssd_id', $request->ssd_id)
                ->first();
            }else{
                if($request->session()->has('USER_CART_TEMP_ID') != null){
                    $temp_id = $request->session()->get('USER_CART_TEMP_ID');
                    
                    $cart = Cart::where('temp_session_id', $temp_id)
                        ->where('product_id', $request->product_id)
                        ->where('bag_id', $request->bag_id)
                        ->where('keyboard_id', $request->keyboard_id)
                        ->where('ram_id', $request->ram_id)
                        ->where('ssd_id', $request->ssd_id)
                        ->first();
                                
                }
                // $cart = Cart::where('ip_address', request()->ip())
                // ->where('product_id', $request->product_id)
                // ->where('order_id', NULL)
                // ->first();
            }

            if (!is_null($cart)) {
                if($request->pqty == 0){
                    $cart->delete();
                } else{
                    // $cart->increment('quantity');
                    $cart->quantity = $cart->quantity + $request->pqty;
                    $cart->bag_quanity = $cart->bag_quanity + $request->pqty;
                    $cart->keyboard_qty = $cart->keyboard_qty + $request->pqty;
                    $cart->ram_qty = $cart->ram_qty + $request->pqty;
                    $cart->ssd_qty = $cart->ssd_qty + $request->pqty;
                    $tota_price = ($cart->unit_price * $cart->quantity) + ($cart->keyboard_unit_price * $cart->keyboard_qty) + ($cart->ram_unit_price * $cart->ram_qty) + ($cart->ssd_unit_price * $cart->ssd_qty);
                    $cart->total_price = $tota_price;
                    $cart->save();
                }
                
            }else{
                $cart = new Cart();
                if($request->session()->has('USER_CART_TEMP_ID')){
                    $user_tempId = $request->session()->get('USER_CART_TEMP_ID');
                } else {
                    $user_tempId = rand(1111,9999).time();
                    $request->session()->put('USER_CART_TEMP_ID',$user_tempId);
                }
                if (Auth::check()) {
                    $cart->user_id = Auth::id();
                }


                $cart_total_price = $request->prod_base_price * $request->pqty;
    
                $cart->temp_session_id = $user_tempId;
                $cart->product_id = $request->product_id;
                // $cart->unit_price = $request->prod_updated_price;
                $cart->unit_price = $request->prod_base_price;
                $cart->quantity = $request->pqty;
                $cart->bag_id = $request->bag_id;
                $cart->bag_quanity = $request->pqty;
                $cart->bag_unit_price = 0;

                $cart->keyboard_id = $request->keyboard_id;
                $cart->keyboard_qty = $request->pqty;
                $cart->keboard_type = $request->keyboard_type;
                if($request->keyboard_type == 'wireless'){
                    $cart->keyboard_discount = 'yes';
                    $cart->keyboard_unit_price = 1000;
                    //calculate cart total price
                    $cart_total_price = $cart_total_price + (1000 * $request->pqty);

                }else if($request->keyboard_type == 'free') {
                    $cart->keyboard_discount = 'no';
                    $cart->keyboard_unit_price = 0;
                } else {
                    
                }
                if($request->ram_id){
                    $cart->ram_id = $request->ram_id;  
                    $cart->ram_name = $request->ram_name; 
                    $cart->ram_qty = $request->pqty; 
                    $cart->ram_unit_price = $request->ram_unit_price;
                    //calculate cart total price
                    $cart_total_price = $cart_total_price + ($request->ram_unit_price * $request->pqty);

                }
                if($request->ssd_id){
                    $cart->ssd_id = $request->ssd_id; 
                    $cart->ssd_name = $request->ssd_name;
                    $cart->ssd_qty = $request->pqty;
                    $cart->ssd_unit_price = $request->ssd_unit_price;
                    //calculate cart total price
                    $cart_total_price = $cart_total_price + ($request->ssd_unit_price * $request->pqty);
                }
                $cart->total_price = $cart_total_price;
                $cart->save();     
            }


            if (Auth::check()) {
                $tempId = $request->session()->get('USER_CART_TEMP_ID');
                $carts = Cart::where('user_id', Auth::id())
                ->where('temp_session_id', $tempId)
                ->where('order_id', NULL)
                ->get();
                // dd($carts);
            }else{
                $tempId = $request->session()->get('USER_CART_TEMP_ID');
                $carts = Cart::where('temp_session_id', $tempId)->where('order_id', NULL)->get();
                // dd($carts);
                
            }


            $carts = Cart::totalCarts();

            $total_item = 0;

            foreach ($carts as $cart) {
                $total_item += $cart->quantity;
            }
            return response()->json(['totalItem'=>$total_item]);
            
        } else if($request->bag_id){
            $bag_details = Product::where('id',$request->bag_id)->first();

            if (Auth::check()) {
                $cart = Cart::where('user_id', Auth::id())
                ->where('product_id', $request->product_id)
                ->where('bag_id', $request->bag_id)
                ->first();
            }else{
                if($request->session()->has('USER_CART_TEMP_ID') != null){
                    $temp_id = $request->session()->get('USER_CART_TEMP_ID');
                    
                    $cart = Cart::where('temp_session_id', $temp_id)
                        ->where('product_id', $request->product_id)
                        ->where('bag_id', $request->bag_id)
                        ->first();
                                
                }
                // $cart = Cart::where('ip_address', request()->ip())
                // ->where('product_id', $request->product_id)
                // ->where('order_id', NULL)
                // ->first();
            }

            if (!is_null($cart)) {
                if($request->pqty == 0){
                    $cart->delete();
                } else{
                    // $cart->increment('quantity');
                    $cart->quantity = $cart->quantity + $request->pqty;
                    $cart->bag_quanity = $cart->bag_quanity + $request->pqty;
                    $cart->total_price = $cart->unit_price * $cart->quantity;
                    $cart->save();
                }
                
            }else{
                $cart = new Cart();
                if($request->session()->has('USER_CART_TEMP_ID')){
                    $user_tempId = $request->session()->get('USER_CART_TEMP_ID');
                } else {
                    $user_tempId = rand(1111,9999).time();
                    $request->session()->put('USER_CART_TEMP_ID',$user_tempId);
                }
                if (Auth::check()) {
                    $cart->user_id = Auth::id();
                }
    
                $cart->temp_session_id = $user_tempId;
                $cart->product_id = $request->product_id;
                $cart->unit_price = $request->prod_updated_price;
                $cart->total_price = $request->prod_updated_price * $request->pqty;
                $cart->quantity = $request->pqty;
                $cart->bag_id = $request->bag_id;
                $cart->bag_quanity = $request->pqty;
                $cart->save();
                
            }


            if (Auth::check()) {
                $tempId = $request->session()->get('USER_CART_TEMP_ID');
                $carts = Cart::where('user_id', Auth::id())
                ->where('temp_session_id', $tempId)
                ->where('order_id', NULL)
                ->get();
                // dd($carts);
            }else{
                $tempId = $request->session()->get('USER_CART_TEMP_ID');
                $carts = Cart::where('temp_session_id', $tempId)->where('order_id', NULL)->get();
                // dd($carts);
                
            }


            $carts = Cart::totalCarts();

            $total_item = 0;

            foreach ($carts as $cart) {
                $total_item += $cart->quantity;
            }
            return response()->json(['totalItem'=>$total_item]);

        } else {

            if (Auth::check()) {
                $cart = Cart::where('user_id', Auth::id())
                ->where('product_id', $request->product_id)
                ->first();
            }else{
                if($request->session()->has('USER_CART_TEMP_ID') != null){
                    $temp_id = $request->session()->get('USER_CART_TEMP_ID');
                    
                    $cart = Cart::where('temp_session_id', $temp_id)
                        ->where('product_id', $request->product_id)
                        ->first();
                                
                }
                // $cart = Cart::where('ip_address', request()->ip())
                // ->where('product_id', $request->product_id)
                // ->where('order_id', NULL)
                // ->first();
            }

            if (!is_null($cart)) {
                if($request->pqty == 0){
                    $cart->delete();
                } else{
                    // $cart->increment('quantity');
                    $cart->quantity = $cart->quantity + $request->pqty;
                    $cart->total_price = $cart->unit_price * $cart->quantity;
                    $cart->save();
                }
                
            }else{
                $cart = new Cart();
                if($request->session()->has('USER_CART_TEMP_ID')){
                    $user_tempId = $request->session()->get('USER_CART_TEMP_ID');
                } else {
                    $user_tempId = rand(1111,9999).time();
                    $request->session()->put('USER_CART_TEMP_ID',$user_tempId);
                }
                if (Auth::check()) {
                    $cart->user_id = Auth::id();
                }
    
                $cart->temp_session_id = $user_tempId;
                $cart->product_id = $request->product_id;
                $cart->unit_price = $request->product_price;
                $cart->total_price = $request->product_price * $request->pqty;
                $cart->quantity = $request->pqty;
                $cart->save();
                
            }


            if (Auth::check()) {
                $tempId = $request->session()->get('USER_CART_TEMP_ID');
                $carts = Cart::where('user_id', Auth::id())
                ->where('temp_session_id', $tempId)
                ->where('order_id', NULL)
                ->get();
                // dd($carts);
            }else{
                $tempId = $request->session()->get('USER_CART_TEMP_ID');
                $carts = Cart::where('temp_session_id', $tempId)->where('order_id', NULL)->get();
                // dd($carts);
                
            }


            $carts = Cart::totalCarts();

            $total_item = 0;

            foreach ($carts as $cart) {
                $total_item += $cart->quantity;
            }
            return response()->json(['totalItem'=>$total_item]);
        }

        // $cart = new Cart();
        //     if (Auth::check()) {
        //         $cart->user_id = Auth::id();
        //     }

        //     $cart->ip_address = request()->ip();
        //     $cart->product_id = $request->product_id;
        //     $cart->save();
        
    
        // $cart = new Cart();
        // if (Auth::check()) {
        //     $cart->user_id = Auth::id();
        // }

        // $cart->ip_address = request()->ip();
        // $cart->product_id = $request->product_id;
        // $cart->save();

        // dd($cart);
  

        // Toastr::success('Product Has Been Added To Cart !!',["positionClass" => "toast-top-right"]);

        // dd($cart);
        // Toastr::info('Item Added to Cart Successfully', '', ["positionClass" => "toast-top-right","progressBar" => "true"]);

        // return redirect()->back();
        // $carts= Cart::where('product_id',$request->product_id)->first();
        // return view("frontend.shopping_cart",compact('products','carts'));

    }

    public function test_check(Request $request){
        $is_redirect = '';
        if($request->redirect_dashboard){
            $is_redirect = $request->redirect_dashboard;
        }
        return view('frontend.demo',compact('is_redirect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $prod_id = $request->input('product_id');
        // dd($prod_id);
        $quantity = $request->input('quantity');

        // dd($quantity);

        $array = Cart::where('product_id',$prod_id)->first();
        $product = Product::where('id',$prod_id)->first();

        // dd($product->unit_price);


        $array->quantity = $quantity;
        $array->unit_price = $product->unit_price;
        $array->save();

        // dd($array);

     

        $grand_total_price = $array->quantity * $product->unit_price;
        $gross_total_price = $grand_total_price;

        return response()-> json([
            'gtprice' => '৳'.$grand_total_price. '',
            'stprice' => '৳'.$gross_total_price. '',
            'quantity' => 'X '.$quantity. ' PC/S',
            'status' => 'Item Updated to Cart Successfull',


        ]);




        // dd($abc);

        // dd($array->quantity);


      

        // if(Cookie::get('shopping_cart'))
        // {
        //     $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        //     $cart_data = json_decode($cookie_data, true);

        //     $item_id_list = array_column($cart_data, 'item_id');
        //     $prod_id_is_there = $prod_id;

        //     if(in_array($prod_id_is_there, $item_id_list))
        //     {
        //         foreach($cart_data as $keys => $values)
        //         {
        //             if($cart_data[$keys]["item_id"] == $prod_id)
        //             {
        //                 $cart_data[$keys]["item_quantity"] =  $quantity;
        //                 $item_data = json_encode($cart_data);
        //                 $minutes = 60;
        //                 Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
        //                 return response()->json(['status'=>'"'.$cart_data[$keys]["item_name"].'" Quantity Updated']);
        //             }
        //         }
        //     }
        // }
    }


    public function update_product(Request $request)
    {
        // dd($request->all());
        $prod_id = $request->input('product_id');
        // dd($prod_id);
        $quantity = $request->input('quantity');

        // dd($quantity);

        $array = Cart::where('product_id',$prod_id)->first();
        $product = Product::where('id',$prod_id)->first();

        // dd($product->unit_price);


        $array->quantity = $quantity;
        // $array->save();

        // dd($array);

     

        $grand_total_price = $array->quantity * $product->unit_price;
        $gross_total_price = ($array->quantity * $product->unit_price) + 50;

        return response()-> json([
            'gtprice' => '৳'.$grand_total_price. '',
            'stprice' => '৳'.$gross_total_price. '',
            'quantity' => 'X '.$quantity. ' PC/S',


        ]);

    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // dd($request->all());

        $cart = Cart::where('product_id',$request->product_id)->where('bag_id',$request->bag_id)->first();

        if (!is_null($cart)) {
            $cart->delete();
        }else{
            return redirect()->route('carts');
        }
        // Toastr::warning('Item has been remove from Cart', '', ["positionClass" => "toast-top-right","progressBar" => "true"]);
        // session()->flash('success', 'Cart Item Has Been Deleted Successfully !!');
        return response()-> json([
            'status' => 'Item Removed from Cart'
        ]);
    }

}
