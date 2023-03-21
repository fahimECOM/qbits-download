<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Order;
use App\Models\Product;
use Cookie;
use Auth;

class wishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $wishlists = Wishlist::where('user_id', Auth::id())
            ->first();
        }

        if($wishlists){
            return view("frontend.wishlist_cart", compact('wishlists'));
        }else{
            // Toastr::warning('No Item has been found in Wishlist', '', ["positionClass" => "toast-top-right","progressBar" => "true"]);
            return view("frontend.wishlist_cart");
            
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
    
        $products = Product::where('id',$request->prod_id)->first();
        $total_price = $products->unit_price * $request->p_qty;
        $wishlist = new Wishlist();
        if (Auth::check()) {
            $wishlist->user_id = Auth::id();
        }
        $wishlist->product_id = $request->prod_id;
        $wishlist->product_category = $products->category;
        $wishlist->unit_price = $products->unit_price;
        $wishlist->quantity = $request->p_qty;
        if($request->ramId){
            $wishlist->ram_id = $request->ramId;
        }
        if($request->ramName){
            $wishlist->ram_name = $request->ramName;
        }
        if($request->ram_price){
            $wishlist->ram_unit_price = $request->ram_price;
            $total_price = $total_price + ($request->ram_price * $request->ramQty);
        }
        if($request->ramQty){
            $wishlist->ram_qty = $request->ramQty;
        }
        if($request->ssdId){
            $wishlist->ssd_id = $request->ssdId;
        }
        if($request->ssdName){
            $wishlist->ssd_name = $request->ssdName;
        }
        if($request->ssd_price){
            $wishlist->ssd_unit_price = $request->ssd_price;
            $total_price = $total_price + ($request->ssd_price * $request->ssdQty);
        }
        if($request->ssdQty){
            $wishlist->ssd_qty = $request->ssdQty;
        }
        $wishlist->total_price = $total_price;
        $wishlist->save();
        return response()->json(['type'=>'success','msg'=>'Item added to wishlist successfully.']);

    }


    public function quantity_updated_wishlist(Request $request){
        $products = Product::where('id',$request->prod_id)->first();
        
        $this->validate($request, [
                'prod_id' => 'required'
            ],
            [
                'prod_id.required' => 'Please Give A Product'
            ]
        );

        if($request->ram_id && $request->ssd_id){
            if (Auth::check()) {
                $wishlist = Wishlist::where('user_id', Auth::id())
                ->where('product_id', $request->prod_id)
                ->where('ram_id', $request->ram_id)
                ->where('ssd_id', $request->ssd_id)
                ->first();
            }

            if (!is_null($wishlist)) {
                if($request->p_qty == 0){
                    $wishlist->delete();
    
                    $wishlists = Wishlist::totalWishlists();
                    $total_item = 0;
    
                    foreach ($wishlists as $wishlist) {
                        $total_item += $wishlist->quantity;
                    }
                    return response()->json(['type'=>'deleted','msg'=>'Item removed from wishlist successfully.','totalItem'=>$total_item]);
                } else{
                    $product_uqty = $wishlist->quantity + $request->p_qty;
                    $wishlist->quantity = $wishlist->quantity + $request->p_qty;
                    $wishlist->ram_qty = $wishlist->ram_qty + $request->p_qty;
                    $wishlist->ssd_qty = $wishlist->ssd_qty + $request->p_qty;
                    $wishlist->total_price = ($wishlist->unit_price * $product_uqty) + ($wishlist->ram_unit_price * $product_uqty) + ($wishlist->ssd_unit_price * $product_uqty);
                    $wishlist->save();
                    return response()->json(['type'=>'updated','msg'=>'Wishlist item quantity updated successfully.']);
                }
                
            }
        }else {
            if (Auth::check()) {
                $wishlist = Wishlist::where('user_id', Auth::id())
                ->where('product_id', $request->prod_id)
                ->first();
            }
    
    
    
            if (!is_null($wishlist)) {
                if($request->p_qty == 0){
                    $wishlist->delete();
    
                    $wishlists = Wishlist::totalWishlists();
                    $total_item = 0;
    
                    foreach ($wishlists as $wishlist) {
                        $total_item += $wishlist->quantity;
                    }
                    return response()->json(['type'=>'deleted','msg'=>'Item removed from wishlist successfully.','totalItem'=>$total_item]);
                } else{
                    $product_uqty = $wishlist->quantity + $request->p_qty;
                    $wishlist->quantity = $wishlist->quantity + $request->p_qty;
                    $wishlist->total_price = $wishlist->unit_price * $product_uqty;
                    $wishlist->save();
                    return response()->json(['type'=>'updated','msg'=>'Wishlist item quantity updated successfully.']);
                }
                
            }
        }

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $wishlist = Wishlist::where('user_id', Auth::id())->where('product_id',$request->prod_id)->first();

        if (!is_null($wishlist)) {
            $wishlist->delete();
        }else{
            return redirect()->route('wishlists');
        }
        // Toastr::warning('All Item has been removed from Wishlist', '', ["positionClass" => "toast-top-right","progressBar" => "true"]);
        // session()->flash('success', 'Cart Item Has Been Deleted Successfully !!');
        return response()-> json([
            'status' => 'Item Removed from Wishlist'
        ]);
    }


    function convert_to_cart(Request $request) {
        $products = Product::where('id',$request->product_id)->first();
        $cart=null;
        
        if($request->bag_id && $request->keyboard_id){
            $bag_details = Product::where('id',$request->bag_id)->first();
            $keyboard_details = Product::where('id',$request->keyboard_id)->first();
            $wishcart_details = Wishlist::where('id',$request->wishlist_id)->first();
            $ram_id = null;
            $ram_name = '';
            $ram_unit_price = 0;
            $ram_qty = 0;
            $ssd_id = null;
            $ssd_name = '';
            $ssd_unit_price = 0;
            $ssd_qty = 0;
            if($wishcart_details) {
                $ram_id = $wishcart_details->ram_id;
                $ram_name = $wishcart_details->ram_name;
                $ram_unit_price = $wishcart_details->ram_unit_price;
                $ram_qty = $wishcart_details->ram_qty;
                $ssd_id = $wishcart_details->ssd_id;
                $ssd_name = $wishcart_details->ssd_name;
                $ssd_unit_price = $wishcart_details->ssd_unit_price;
                $ssd_qty = $wishcart_details->ssd_qty;
            }

            if (Auth::check()) {
                $cart = Cart::where('user_id', Auth::id())
                ->where('product_id', $request->product_id)
                ->where('bag_id', $request->bag_id)
                ->where('keyboard_id', $request->keyboard_id)
                ->where('ram_id', $ram_id)
                ->where('ssd_id', $ssd_id)
                ->first();
            }

            if (!is_null($cart)) {
                    // $cart->increment('quantity');
                    $prod_qty = $cart->quantity + $request->product_qty;
                    $bag_qty = $cart->bag_quanity + $request->product_qty;
                    $keyboard_qty = $cart->keyboard_qty + $request->product_qty;
                    $ram_qty = $cart->ram_qty + $request->product_qty;
                    $ssd_qty = $cart->ssd_qty + $request->product_qty;

                    $cart->quantity = $prod_qty;
                    $cart->bag_quanity = $bag_qty;
                    $cart->keyboard_qty = $keyboard_qty;
                    $cart->ram_qty = $ram_qty;
                    $cart->ssd_qty = $ssd_qty;
                    $total_price = ($cart->unit_price * $prod_qty) + ($cart->keyboard_unit_price * $keyboard_qty) + ($cart->ram_unit_price * $ram_qty) + ($cart->ssd_unit_price * $ssd_qty);
                    $cart->total_price = $total_price;
                    $cart->save();
                    $wishlist = Wishlist::where('user_id', Auth::id())->where('id',$request->wishlist_id)->first();
                    $wishlist->delete();
                    $cart_item = Cart::totalItems();
                    $total_item = Wishlist::totalWishlists();
                    return response()->json(['type'=>'success','msg'=>'Item added to Cart successfully.','totalItem'=>$total_item,'cartItem'=>$cart_item]);
                
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


                $cart_total_price = $products->unit_price * $request->product_qty;
    
                $cart->temp_session_id = $user_tempId;
                $cart->product_id = $request->product_id;
                // $cart->unit_price = $request->prod_updated_price;
                $cart->unit_price = $products->unit_price;
                $cart->quantity = $request->product_qty;
                $cart->bag_id = $request->bag_id;
                $cart->bag_quanity = $request->product_qty;
                $cart->bag_unit_price = 0;

                $cart->keyboard_id = $request->keyboard_id;
                $cart->keyboard_qty = $request->product_qty;
                $cart->keboard_type = $request->keyboard_type;
                if($request->keyboard_type == 'wireless'){
                    $cart->keyboard_discount = 'yes';
                    $cart->keyboard_unit_price = 1000;
                    //calculate cart total price
                    $cart_total_price = $cart_total_price + (1000 * $request->product_qty);

                }else if($request->keyboard_type == 'free') {
                    $cart->keyboard_discount = 'no';
                    $cart->keyboard_unit_price = 0;
                } else {
                    
                }
                if($ram_id){
                    $cart->ram_id = $ram_id;  
                    $cart->ram_name = $ram_name; 
                    $cart->ram_qty = $ram_qty; 
                    $cart->ram_unit_price = $ram_unit_price;
                    //calculate cart total price
                    $cart_total_price = $cart_total_price + ($ram_unit_price * $request->product_qty);

                }
                if($ssd_id){
                    $cart->ssd_id = $ssd_id; 
                    $cart->ssd_name = $ssd_name;
                    $cart->ssd_qty = $ssd_qty;
                    $cart->ssd_unit_price = $ssd_unit_price;
                    //calculate cart total price
                    $cart_total_price = $cart_total_price + ($ssd_unit_price * $request->product_qty);
                }
                $cart->total_price = $cart_total_price;
                $cart->save();
                $wishlist = Wishlist::where('user_id', Auth::id())->where('id',$request->wishlist_id)->first();
                $wishlist->delete();
                $cart_item = Cart::totalItems();
                $total_item = Wishlist::totalWishlists();
                return response()->json(['type'=>'success','msg'=>'Item added to Cart successfully.','totalItem'=>$total_item,'cartItem'=>$cart_item]);  
            }

        } else if($request->bag_id) {
            $bag_details = Product::where('id',$request->bag_id)->first();

            if (Auth::check()) {
                $cart = Cart::where('user_id', Auth::id())
                ->where('product_id', $request->product_id)
                ->where('bag_id', $request->bag_id)
                ->where('order_id', NULL)
                ->first();
            }
    
    
            if (!is_null($cart)) {
                $prod_qty = $cart->quantity + $request->product_qty;
                $bag_qty = $cart->bag_quanity + $request->product_qty;
                $cart->quantity = $prod_qty;
                $cart->bag_quanity = $bag_qty;
                $cart->total_price = $cart->unit_price * $prod_qty;
                $cart->save();
                $wishlist = Wishlist::where('id',$request->wishlist_id)->first();
                $wishlist->delete();
                $cart_item = Cart::totalItems();
                $total_item = Wishlist::totalWishlists();
                return response()->json(['type'=>'success','msg'=>'Item added to Cart successfully.','totalItem'=>$total_item,'cartItem'=>$cart_item]);
                
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
                $cart->unit_price = $products->unit_price;
                $cart->quantity = $request->product_qty;
                $cart->bag_id = $request->bag_id;
                $cart->bag_quanity = $request->product_qty;
                $cart->total_price = $products->unit_price * $request->product_qty;
                $cart->save();
                $wishlist = Wishlist::where('user_id', Auth::id())->where('product_id',$request->product_id)->first();
                $wishlist->delete();
                $cart_item = Cart::totalItems();
                $total_item = Wishlist::totalWishlists();
                return response()->json(['type'=>'success','msg'=>'Item added to Cart successfully.','totalItem'=>$total_item,'cartItem'=>$cart_item]);
                
            }
        } else {
            if (Auth::check()) {
                $cart = Cart::where('user_id', Auth::id())
                ->where('product_id', $request->product_id)
                ->where('order_id', NULL)
                ->first();
            }
    
    
            if (!is_null($cart)) {
                $prod_qty = $cart->quantity + $request->product_qty;
                $cart->quantity = $prod_qty;
                $cart->total_price = $cart->unit_price * $prod_qty;
                $cart->save();
                $wishlist = Wishlist::where('product_id',$request->product_id)->first();
                $wishlist->delete();
                $cart_item = Cart::totalItems();
                $total_item = Wishlist::totalWishlists();
                return response()->json(['type'=>'success','msg'=>'Item added to Cart successfully.','totalItem'=>$total_item,'cartItem'=>$cart_item]);
                
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
                $cart->unit_price = $products->unit_price;
                $cart->quantity = $request->product_qty;
                $cart->total_price = $products->unit_price * $request->product_qty;
                $cart->save();
                $wishlist = Wishlist::where('user_id', Auth::id())->where('product_id',$request->product_id)->first();
                $wishlist->delete();
                $cart_item = Cart::totalItems();
                $total_item = Wishlist::totalWishlists();
                return response()->json(['type'=>'success','msg'=>'Item added to Cart successfully.','totalItem'=>$total_item,'cartItem'=>$cart_item]);
                
            }
        }
    }

    function remove_from_wishlist(Request $request) {
        $wishlist = Wishlist::where('user_id', Auth::id())->where('product_id',$request->product_id)->first();

        if (!is_null($wishlist)) {
            $wishlist->delete();
            return response()->json(['type'=>'success','msg'=>'Item removed from wishlist successfully.']);
            
        }else{
            return redirect()->route('buy');
        }
    }

}
