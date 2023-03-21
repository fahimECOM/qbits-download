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
            $carts = Cart::where('ip_address', request()->ip())
            ->where('order_id', NULL)
            ->first();
        }

        if($carts){
            return view("frontend.shopping_cart", compact('carts'));
        }else{
            Toastr::warning('Item has been remove from Cart', '', ["positionClass" => "toast-top-right","progressBar" => "true"]);
            return redirect('/');
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
        // dd($request->all());

        $products = Product::where('id',$request->product_id)->first();
        
        $this->validate($request, [
            'product_id' => 'required'
        ],
        [
            'product_id.required' => 'Please Give A Product'
        ]
    );
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->where('order_id', NULL)
            ->first();
        }else{
            $cart = Cart::where('ip_address', request()->ip())
            ->where('product_id', $request->product_id)
            ->where('order_id', NULL)
            ->first();
        }

        // $cart = new Cart();
        //     if (Auth::check()) {
        //         $cart->user_id = Auth::id();
        //     }

        //     $cart->ip_address = request()->ip();
        //     $cart->product_id = $request->product_id;
        //     $cart->save();

        if (!is_null($cart)) {
            $cart->increment('quantity');
        }else{
            $cart = new Cart();
            if (Auth::check()) {
                $cart->user_id = Auth::id();
            }

            $cart->ip_address = request()->ip();
            $cart->product_id = $request->product_id;
            $cart->unit_price = $products->unit_price;
            $cart->quantity = $request->pqty;
            $cart->save();

            // dd($cart);
        }



        
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
        Toastr::info('Item Added to Cart Successfully', '', ["positionClass" => "toast-top-right","progressBar" => "true"]);

        return redirect()->back();
        // $carts= Cart::where('product_id',$request->product_id)->first();
        // return view("frontend.shopping_cart",compact('products','carts'));

        // return redirect()->back();

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

        $cart = Cart::where('product_id',$request->product_id)->first();

        if (!is_null($cart)) {
            $cart->delete();
        }else{
            return redirect()->route('carts');
        }
        Toastr::warning('Item has been remove from Cart', '', ["positionClass" => "toast-top-right","progressBar" => "true"]);
        // session()->flash('success', 'Cart Item Has Been Deleted Successfully !!');
        return response()-> json([
            'status' => 'Item Removed from Cart'
        ]);
    }
}
