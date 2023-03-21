<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('name','desc')->with('productstock')->get();
        return view('admin.product.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $image = $request->file('image');
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/banner'))
            {
                mkdir('uploads/product', 0777 , true);
            }
            $image->move('uploads/product',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $id = $request->id;
        if(isset($id) && !empty($id)) {
            $product = Product::findOrFail($id);
        } else {
            $product = new Product();
        }


        // $product = new Product();
        $product->name  = $request->name ;
        $product->unit = $request->unit;
        // $product->min_qty = $request->min_qty;
        // $product->max_qty = $request->max_qty;
        // $product->unit_price = $request->unit_price;
        // $product->photos = $imagename;
        // $product->low_stock_quantity = $request->low_stock_quantity;
        // $product->description = $request->description;
        $product->save();


        if($product){
                $datasave = [
                    'product_id'            =>  $product->id,
                    'product_name'            =>  $product->name,
                    'beginig_qty'           =>  0,
                    'updated_qty'           => 0,
                ];
                DB::table('product_stocks')->insert($datasave);
        }



        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
        $agent = Product::where('id', $req->product)->firstOrFail();
        return response()->json($agent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        
        $find_miller = Product::where('id', $request->product)->first();
        if($find_miller) {
            $find_miller->delete();
            return response()->json(['message'=>"Successfully Deleted $find_miller->name"]);
        }
    }
}
