<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\DB;
use App\Models\AllHistory;
use App\Models\RawInventory;
use App\Models\SkdSerial;
use App\Models\ProductSeries;
use App\Models\RawMetarial;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        if(!User::hasPermission(["add_product","edit_product","view_product"])){
            return redirect(url()->previous());
        }

        $products = Product::orderBy('name','desc')->get();
        return view('admin.product.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        if(!User::hasPermission(["add_product"])){
            return redirect(url()->previous());
        }

        $data['product_series']= ProductSeries::all();
        $data['product_models']= RawMetarial::where('model', "!=", null)->get();
        $data['ram_brand']= RawMetarial::where('skd_metarials', 'RAM')->groupby('brand')->get();
        $data['ram_type']= RawMetarial::where('skd_metarials', 'RAM')->groupby('skd_type')->get();
        $data['ram_size']= RawMetarial::where('skd_metarials', 'RAM')->orderBy('id','ASC')->groupby('skd_size')->get();
        $data['ram_speed']= RawMetarial::where('skd_metarials', 'RAM')->groupby('skd_others')->get();
        $data['ssd_brand']= RawMetarial::where('skd_metarials', 'SSD')->groupby('brand')->get();
        $data['ssd_type']= RawMetarial::where('skd_metarials', 'SSD')->groupby('skd_type')->get();
        $data['ssd_size']= RawMetarial::where('skd_metarials', 'SSD')->orderBy('id','ASC')->groupby('skd_size')->get();
        $data['m2_type']= RawMetarial::where('skd_metarials', 'SSD')->groupby('skd_others')->get();
        $data['barebone_brand']= RawMetarial::where('skd_metarials', 'Barebone')->groupby('brand')->get();
        $data['processors']= RawMetarial::where('processor', "!=", null)->groupby('processor')->get();
        $data['attribute'] = ProductAttribute::orderBy('attribute_name','ASC')->get();
      
        return view('admin.product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'editor'=>'required',
            't_image'=>'required',
            'g_image'=>'required',

        ]);

        $totalPrice = $request->base_price;
        if( $request->tax_type == 1){
            $totalPrice=$totalPrice+$request->tax_price;
        }if( $request->tax_type == 0){
            if($request->tax_price > 0){
                $newPrice=($request->tax_price/100)*$totalPrice;
                $totalPrice=round($totalPrice+$newPrice);
            }
        }

          $product = new Product();
          $product->name = $request->name;
          $product->category = $request->category;
          $product->prod_model = $request->prod_model;
          $product->sub_category = $request->sub_category;
          $product->status = $request->status;
          $product->series_name = $request->series_name;
          $product->slug = $request->slug;
          $product->min_qty = $request->min_qty;
          $product->max_qty = $request->max_qty;
          $product->unit_price = $totalPrice;
          if($request->tax_price !=''){
            $product->tax = $request->tax_price;
            $product->tax_type = $request->tax_type;
          } 
          $product->sku = $request->sku;
          $product->base_price = $request->base_price;
        //   $product->current_stock = $request->current_stock;
        //   $product->description=$request->description;
          $product->description=$request->editor;
          $product->meta_title=$request->meta_title;
          $product->meta_description=$request->meta_description;
          $product->cash_on_delivery=$request->cash_on_delivery;
          $product->shipping_type=$request->shipping_type;
          $product->status=$request->status;
          $product->ram=strtoupper($request->ram);
          if($product->ram == "4 GB"){
            $product->bus_speed="2666MHz";
          }else{
            $product->bus_speed="3200MHz";
          }
          $product->processor=$request->processor;
          $product->screen_size=$request->screen_size;
          $product->storage=strtoupper($request->storage);

          $image = array();
  
          if ($files = $request->t_image) {
             
              foreach ($files as $file) {
                  $image_name = md5(rand(1000, 10000));
                  # insert the image
                  $ext = strtolower($file->getClientOriginalExtension());
                  $image_full_name = $image_name. '.'.$ext;
                  $upload_path = 'backend/assets/images/products/multiple_images/';
                  $image_url = $upload_path.$image_full_name;
                  $file->move($upload_path, $image_full_name);
                  $image[] = $image_url;
              }
          }
          $product->photos = implode('|', $image);


        if ($single_image=$request->g_image) {

            $destinationPath = 'backend/assets/images/products/single_image/';

            $profileImage = date('YmdHis') . "." . $single_image->getClientOriginalExtension();

            $image_url = $destinationPath.$profileImage;

            $single_image->move($destinationPath, $profileImage);

        }
          $product->galary_photo = $image_url;

          if (!empty($request->kt_ecommerce_add_product_options)) {
            $product->attributes = json_encode($request->kt_ecommerce_add_product_options);
        }
        else {
            $product->attributes = json_encode(array());
        }
     
        $product->save();


        return redirect()->route('product.index')->with('successMsg','Product Successfully Saved');


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
    public function edit($id)
    {
        if(!User::hasPermission(["edit_product"])){
            return redirect(url()->previous());
        }
        // dd($id);
        $data['attribute'] = ProductAttribute::orderBy('attribute_name','ASC')->get();
        $data['products'] = Product::where('id',$id)->first();
        $data['product_series']= ProductSeries::all();
        $data['product_models']= RawMetarial::where('model', "!=", null)->get();
        $data['ram_brand']= RawMetarial::where('skd_metarials', 'RAM')->groupby('brand')->get();
        $data['ram_type']= RawMetarial::where('skd_metarials', 'RAM')->groupby('skd_type')->get();
        $data['ram_size']= RawMetarial::where('skd_metarials', 'RAM')->orderBy('id','ASC')->groupby('skd_size')->get();
        $data['ram_speed']= RawMetarial::where('skd_metarials', 'RAM')->groupby('skd_others')->get();
        $data['ssd_brand']= RawMetarial::where('skd_metarials', 'SSD')->groupby('brand')->get();
        $data['ssd_type']= RawMetarial::where('skd_metarials', 'SSD')->groupby('skd_type')->get();
        $data['ssd_size']= RawMetarial::where('skd_metarials', 'SSD')->orderBy('id','ASC')->groupby('skd_size')->get();
        $data['m2_type']= RawMetarial::where('skd_metarials', 'SSD')->groupby('skd_others')->get();
        $data['barebone_brand']= RawMetarial::where('skd_metarials', 'Barebone')->groupby('brand')->get();
        $data['attribute'] = ProductAttribute::orderBy('attribute_name','ASC')->get();
        $data['processors']= RawMetarial::where('processor', "!=", null)->groupby('processor')->get();
        return view('admin.product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request,[
        //     'name'=>'required',
        //     'unit'=>'required',
        //     'min_qty'=>'required',
        //     'max_qty'=>'required',
        //     'sku'=>'required',
        //     'description'=>'required',
        //     'variations'=>'required',
        //     'current_stock'=>'required',
        //     'cash_on_delivery'=>'required',
        //     'shipping_type'=>'required',
        //     'status'=>'required',
        //   ]);
        // dd($request->all());
          $product = Product::find($id);
 
          $totalPrice = $request->base_price;
          if( $request->tax_type == 1){
              $totalPrice=$totalPrice+$request->tax_price;
          }if( $request->tax_type == 0){
              if($request->tax_price > 0){
                $newPrice=($request->tax_price/100)*$totalPrice;
                $totalPrice=round($totalPrice+$newPrice);
              }
          }
          
          $product->name = $request->name;
          $product->category = $request->category;
          $product->prod_model = $request->prod_model;
          $product->sub_category = $request->sub_category;
          $product->status = $request->status;
          $product->series_name = $request->series_name;
          $product->slug = $request->slug;
          $product->min_qty = $request->min_qty;
          $product->max_qty = $request->max_qty;
          $product->unit_price = $totalPrice;
          $product->base_price = $request->base_price;
          if($request->tax_price !=''){
            $product->tax = $request->tax_price;
            $product->tax_type = $request->tax_type;
          }  
          $product->sku = $request->sku;
        //   $product->current_stock = $request->current_stock;
        //   $product->description=$request->description;
        $product->description=$request->editor;
      
          $product->meta_title=$request->meta_title;
          $product->meta_description=$request->meta_description;
          $product->cash_on_delivery=$request->cash_on_delivery;
          $product->shipping_type=$request->shipping_type;
          $product->status=$request->status;
          $product->ram=strtoupper($request->ram);
          if($product->ram == "4 GB"){
            $product->bus_speed="2666MHz";
          }else{
            $product->bus_speed="3200MHz";
          }
          $product->processor=$request->processor;
          $product->screen_size=$request->screen_size;
          $product->storage=strtoupper($request->storage);

          $image = array();
  
          if ($files = $request->t_image) {
             
              foreach ($files as $file) {
                  $image_name = md5(rand(1000, 10000));
                  # insert the image
                  $ext = strtolower($file->getClientOriginalExtension());
                  $image_full_name = $image_name. '.'.$ext;
                  $upload_path = 'backend/assets/images/products/multiple_images/';
                  $image_url = $upload_path.$image_full_name;
                  $file->move($upload_path, $image_full_name);
                  $image[] = $image_url;
              }
              $product->photos = implode('|', $image);
          }
         


        if ($single_image=$request->g_image) {

            $destinationPath = 'backend/assets/images/products/single_image/';

            $profileImage = date('YmdHis') . "." . $single_image->getClientOriginalExtension();

            $image_url = $destinationPath.$profileImage;

            $single_image->move($destinationPath, $profileImage);

            
            $product->galary_photo = $image_url;
        }
          
          if (!empty($request->kt_ecommerce_add_product_options)) {
            $product->attributes = json_encode($request->kt_ecommerce_add_product_options);
        }
        else {
            $product->attributes = json_encode(array());
        }

          $product->save();

          return redirect()->route('product.index')->with('successMsg','Product Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!is_null($product)) {
            $product->delete();
        }
        return redirect()->back()->with('successMsg','Product successfully Deleted');

        // dd($id);

        
        // $find_miller = Product::where('id', $request->product)->first();
        // if($find_miller) {
        //     $find_miller->delete();
        //     return response()->json(['message'=>"Successfully Deleted $find_miller->name"]);
        // }
    }
}