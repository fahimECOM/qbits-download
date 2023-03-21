<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\FinishInventory;
use App\Models\Product;
use App\Models\AllHistory;
use App\Models\RawInventory;
use App\Models\SkdSerial;
use App\Models\ProductRegister;
use App\Models\ProductSeries;
use App\Models\RawMetarial;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Ticket;
use App\Models\Conversation;
use App\Models\Product_Srial_Number;
use App\Models\ProductSerial;
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
use Excel;
use App\Exports\UserExpport;
use Illuminate\Http\Request;


class FinishedProductController extends Controller
{
    public function inventory_view(){
        $data['products'] = Product::where('category', '!=' ,'Accessory')->get();
        return view('admin.layouts.finishedProducts.viewInventoryList',$data);
    }

    //view all created requisition list
    public function requisition_view(){
        // $this->getRQCreationQueueListHtml();
        $data['requisitions']=FinishInventory::whereColumn('skd_stockout_needed_confirm','>','skd_stockout_total_confirmed')->where('status','!=','2')->orderBy('id', 'DESC')->get();
        $data['Product_category']= ProductSeries::select("category")->groupBy("category")->get();  
        $data['Product_model']= RawMetarial::where('model', "!=", null)->get();
        $data['ram_brand']= RawMetarial::where('skd_metarials', 'RAM')->groupby('brand')->get('brand');
        $data['ssd_brand']= RawMetarial::where('skd_metarials', 'SSD')->groupby('brand')->get('brand');
        $data['barebone_brand']= RawMetarial::where('skd_metarials', 'Barebone')->groupby('brand')->get('brand');
        $data['products'] = Product::where('category', '!=' ,'Accessory')->get();
        return view('admin.layouts.finishedProducts.requisition',$data);
    }

    //view requisiton create form
    public function requisition_creation(){
        $data['requisitions']=FinishInventory::whereColumn('skd_stockout_needed_confirm','>','skd_stockout_total_confirmed')->where('status','!=','2')->orderBy('id', 'DESC')->get();
        $data['Product_category']= ProductSeries::select("category")->groupBy("category")->get();  
        $data['Product_model']= RawMetarial::where('model', "!=", null)->get();
        $data['ram_brand']= RawMetarial::where('skd_metarials', 'RAM')->groupby('brand')->get('brand');
        $data['ssd_brand']= RawMetarial::where('skd_metarials', 'SSD')->groupby('brand')->get('brand');
        $data['barebone_brand']= RawMetarial::where('skd_metarials', 'Barebone')->groupby('brand')->get('brand');
        $data['products'] = Product::where('category', '!=' ,'Accessory')->get();
        

        return view('admin.layouts.finishedProducts.requisition_create',$data);
    }

    public function building_queue_list(){
        $data['requisitions']=FinishInventory::whereColumn('skd_stockout_needed_confirm','skd_stockout_total_confirmed')->where('status','=','3')->orderBy('id', 'DESC')->get();
        return view('admin.layouts.finishedProducts.buildingQueueList',$data);
    }

    public function building_details(Request $request, $id){
        $data['rq_details'] = FinishInventory::where('rq_id',$id)->first();
        $data['rq_info'] = ProductSerial::where('rq_id',$id)->get();
        $data['total_finalized'] = ProductSerial::where('rq_id',$id)->where('building_progress_status','=','4')->count();
        return view('admin.layouts.finishedProducts.buildingDetails',$data);
    }

    public function stocking_queue_list(){
        $data['requisitions']=FinishInventory::whereColumn('product_stockin_needed_confirm','>','product_stockin_total_confirmed')->where('status','=','4')->orderBy('id', 'DESC')->get();
        return view('admin.layouts.finishedProducts.stockingQueueList',$data);
    }

    //get product details for requsition create
    public function get_product_nfo(Request $request){
        $product_info = Product::where('id',$request->inid)->get();
        $ramSize = explode(" ",$product_info[0]['ram'])[0];
        $bb_processor = explode(" ",$product_info[0]['processor'])[2];
        $ssd_storage = explode(" ",$product_info[0]['storage'])[0];

        $ram_brand= RawMetarial::where('skd_metarials', 'RAM')->groupby('brand')->get('brand');
        $ssd_brand= RawMetarial::where('skd_metarials', 'SSD')->groupby('brand')->get('brand');
        $barebone_brand= RawMetarial::where('skd_metarials', 'Barebone')->groupby('brand')->get('brand');

        $all_available_skd_serials = SkdSerial::where('flow_type','inflow')->select('skd_serial','skd_brand')->get();
        
        //ram
        $ram_4gb = 0;
        $ram_8gb = 0;
        $ram_16gb = 0;
        //ssd
        $ssd_512gb_hitachi = 0;
        $ssd_1tb_hitachi = 0;
        $ssd_512gb_qbits = 0;
        $ssd_1tb_qbits = 0;
        //barebone
        $bb_i3 = 0;
        $bb_i5 = 0;
        $bb_i7 = 0;

        foreach($all_available_skd_serials as $serial) {
            //ram
            if($serial->skd_serial[0] == 'R'){
                if($serial->skd_serial[1] == '2'){ //ram 4gb
                    $ram_4gb += 1;
                } else if($serial->skd_serial[1] == '3'){ //ram 8gb
                    $ram_8gb += 1;
                } else if($serial->skd_serial[1] == '4'){ //ram 16gb
                    $ram_16gb += 1;
                }
            } else if($serial->skd_serial[0] == 'S'){ //ssd
                if($serial->skd_serial[1] == '9'){ //ssd 512gb
                    if($serial->skd_brand == 'Hitachi') { //hitachi brand ssd
                        $ssd_512gb_hitachi += 1;
                    } else if($serial->skd_brand == 'Qbits') { //qbits brand ssd
                        $ssd_512gb_qbits += 1;  
                    }
                } else if($serial->skd_serial[1] == '0'){ //ssd 1tb
                    if($serial->skd_brand == 'Hitachi') { //hitachi brand ssd
                        $ssd_1tb_hitachi += 1;
                    } else if($serial->skd_brand == 'Qbits') { //qbits brand ssd
                        $ssd_1tb_qbits += 1;  
                    }
                }
            } else if($serial->skd_serial[0] == 'B'){ //barebone
                if($serial->skd_serial[1] == '3'){ //core i3
                    $bb_i3 += 1;
                } else if($serial->skd_serial[1] == '5'){ //core i5
                    $bb_i5 += 1;
                } else if($serial->skd_serial[1] == '7'){ //core i7
                    $bb_i7 += 1;
                }
            }
        }


        $html=' <div class="row  my-2">
        <div class="col-md-4 mb-3">
            <label for="product_type" class="col-form-label text-gray-800">Product Type</label>
            <input type="text" name="product_type" id="select_product_type"
                class="form-control form-control-solid" value="'.$product_info[0]->category.'"
                readonly>
            <p class="text-danger mt-2" id="error_product_type"></p>
        </div>
        <div class="col-md-4 mb-3">
            <label for="recipient-name" class="col-form-label text-gray-800">Quantity</label>
            <input type="number" name="requisition_quantity" id="requisition_quantity"
                class="form-control form-control-solid" min="1" onkeyup="limiter(this);">
            <p class="text-danger mt-2" id="error_requisition_quantity"></p>
        </div>
        <div class="col-md-4 mb-3">
            <label for="recipient-name" class="col-form-label text-gray-800">Purpose </label>
            <input type="text" name="requisition_purpose" id="requisition_purpose"
                class="form-control form-control-solid">
            <p class="text-danger mt-2" id="error_requisition_purpose"></p>
        </div>
    </div>
    <div class="row">
        <label for="message-text" class="text-gray-700 text-center fs-4  my-2">Select Barebone
            Information</label>
        <div id="Barebone" class="tab-content">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="message-text" class="col-form-label text-gray-800">Barebone
                        Series</label>
                        <input type="text" name="bb_type" id="select_bb_type"
                        class="form-control form-control-solid"
                        value="'.$product_info[0]->series_name.'" readonly>
                    <p class="text-danger mt-2" id="error_bb_type"></p>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="message-text" class="col-form-label text-gray-800">Barebone
                        Model</label>
                    <input type="text" name="bb_model" id="select_bb_model"
                        class="form-control form-control-solid"
                        value="'.$product_info[0]->prod_model.'" readonly>
                    <p class=" text-danger mt-2" id="error_bb_model">
                    </p>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="message-text" class="col-form-label text-gray-800">Barebone
                        Processor</label>
                    <p id="barebone-processor">
                        <input type="text" name="bb_processor" id="select-barebone-processor"
                            class="form-control form-control-solid"
                            value="'.$product_info[0]->processor.'" readonly>
                    </p>
                    <p class="text-danger" id="error_bb_processor"></p>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="message-text" class="col-form-label text-gray-800">Brand</label>
                    <select id="select-barebone-brand"
                        class="form-select form-select-solid coupon_status"
                        data-hide-search="true" name="bb_brand" data-placeholder="Status"
                        data-kt-ecommerce-product-filter="status">
                        <option value="">Select Barebone</option>';
                        foreach($barebone_brand as $key=>$brand){
                            if($bb_processor == 'i3') {
                                if($bb_i3 > 0) {
                                    $html= $html . '<option value="'.$brand->brand.'" selected>'.$brand->brand.'  <span>[Av.Qty: '.$bb_i3.']</span></option>';
                                } else {
                                    $html= $html . '<option value="" disabled selected>'.$brand->brand.'  <span>[Av.Qty: '.$bb_i3.']</span></option>';
                                }
                            } else if($bb_processor == 'i5') {
                                if($bb_i5 > 0) {
                                    $html= $html . '<option value="'.$brand->brand.'" selected>'.$brand->brand.'  <span>[Av.Qty: '.$bb_i5.']</span></option>';
                                } else {
                                    $html= $html . '<option value="" disabled selected>'.$brand->brand.'  <span>[Av.Qty: '.$bb_i5.']</span></option>';
                                }
                            } else if($bb_processor == 'i7') {
                                if($bb_i7 > 0) {
                                    $html= $html . '<option value="'.$brand->brand.'" selected>'.$brand->brand.'  <span>[Av.Qty: '.$bb_i7.']</span></option>';
                                } else {
                                    $html= $html . '<option value="" disabled selected>'.$brand->brand.'  <span>[Av.Qty: '.$bb_i7.']</span></option>';
                                }
                            }
                            
                        }
                        $html = $html . '
                    </select>
                    <p class="text-danger mt-2" id="error_bb_brand"></p>
                </div>

            </div>
        </div>
        <div id="SSD" class="tab-content">
            <div class="row ">
                <label for="message-text" class="text-gray-700 text-center fs-4  my-2">Select
                    SSD
                    Information</label>
                <div class="col-md-3 mb-3">
                    <label for="message-text" class="col-form-label text-gray-800">SSD
                        Size</label>
                    <p id="select-ssd-size">
                        <input type="text" name="ssd_size" id="select-ssd-size"
                            class="form-control form-control-solid"
                            value="'.$product_info[0]->storage.'" readonly>
                    </p>
                    <p class="text-danger mt-2" id="error_ssd_size"></p>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="message-text" class="col-form-label text-gray-800">SSD
                        Type</label>
                    <select id="select_ssd_type"
                        class="form-select form-select-solid coupon_status"
                        data-hide-search="true" name="ssd_type" data-placeholder="Status"
                        data-kt-ecommerce-product-filter="status">
                        <option value="">Select Type</option>
                        <option value="M.2" selected>M.2</option>
                    </select>
                    <p class="text-danger mt-2" id="error_ssd_type"></p>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="message-text" class="col-form-label text-gray-800">M.2
                        Type</label>
                    <select id="select_m2_type"
                        class="form-select form-select-solid coupon_status"
                        data-hide-search="true" name="m2_type" data-placeholder="Status"
                        data-kt-ecommerce-product-filter="status">
                        <option value="">Select M.2</option>
                        <option value="NVMe" selected>NVMe</option>
                    </select>
                    <p class="text-danger mt-2" id="error_m2_type"></p>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="message-text" class="col-form-label text-gray-800">Brand</label>
                    <select id="select-ssd-brand"
                        class="form-select form-select-solid coupon_status"
                        data-hide-search="true" name="ssd_brand" data-placeholder="Status"
                        data-kt-ecommerce-product-filter="status">
                        <option value="">Select SSD</option>';                       
                        foreach($ssd_brand as $key=>$brand){
                            if($ssd_storage == '512') {
                                if($brand['brand'] == 'Hitachi') {
                                    if($ssd_512gb_hitachi > 0){
                                        $html= $html . '<option value="'.$brand->brand.'">'.$brand->brand.'  <span>[Av.Qty: '.$ssd_512gb_hitachi.']</span></option>';
                                    } else{
                                        $html= $html . '<option value="" disabled>'.$brand->brand.'  <span>[Av.Qty: '.$ssd_512gb_hitachi.']</span></option>';
                                    }
                                } else if($brand['brand'] == 'Qbits') {
                                    if($ssd_512gb_qbits > 0){
                                        $html= $html . '<option value="'.$brand->brand.'">'.$brand->brand.'  <span>[Av.Qty: '.$ssd_512gb_qbits.']</span></option>';
                                    } else {
                                        $html= $html . '<option value="" disabled>'.$brand->brand.'  <span>[Av.Qty: '.$ssd_512gb_qbits.']</span></option>';
                                    }
                                    
                                }
                            } else if($ssd_storage == '1') {
                                if($brand['brand'] == 'Hitachi') {
                                    if($ssd_1tb_hitachi > 0){
                                        $html= $html . '<option value="'.$brand->brand.'">'.$brand->brand.'  <span>[Av.Qty: '.$ssd_1tb_hitachi.']</span></option>';
                                    } else {
                                        $html= $html . '<option value="" disabled>'.$brand->brand.'  <span>[Av.Qty: '.$ssd_1tb_hitachi.']</span></option>';
                                    }
                                } else if($brand['brand'] == 'Qbits') {
                                    if($ssd_1tb_qbits > 0){
                                        $html= $html . '<option value="'.$brand->brand.'">'.$brand->brand.'  <span>[Av.Qty: '.$ssd_1tb_qbits.']</span></option>';
                                    } else {
                                        $html= $html . '<option value="" disabled>'.$brand->brand.'  <span>[Av.Qty: '.$ssd_1tb_qbits.']</span></option>';
                                    }
                                    
                                }
                            }
                        }                        
                       $html = $html . '</select>
                    <p class="text-danger mt-2" id="error_ssd_brand"></p>
                </div>
            </div>
        </div>

        <div id="RAM" class="tab-content">
            <div class="row ">
                <label for="message-text" class="text-gray-700 text-center fs-4 my-2">Select Ram
                    Information</label>
                <div class="col-md-3 mb-3">
                    <label for="message-text" class="col-form-label text-gray-800">Ram
                        Size</label>
                    <p id="select_ram_type">
                        <input type="text" name="ram_size" id="select-ram-size""
                            class=" form-control form-control-solid"
                            value="'.$product_info[0]->ram.'" readonly>
                    </p>
                    <p class="text-danger mt-2" id="error_ram_size"></p>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="message-text" class="col-form-label text-gray-800">Ram
                        Type</label>

                    <select id="select_ram_type"
                        class="form-select form-select-solid coupon_status"
                        data-hide-search="true" name="ram_type" data-placeholder="Status"
                        data-kt-ecommerce-product-filter="status">
                        <option value="">Select Type</option>
                        <option value="DDR4" selected>DDR4</option>
                    </select>
                    <p class="text-danger mt-2" id="error_ram_type"></p>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="message-text" class="col-form-label text-gray-800">Bus
                    Speed</label>
                    <p id="select_ram_type">
                        <input type="text" name="bus_speed" id="select-bus-speed""
                            class=" form-control form-control-solid"
                            value="'.$product_info[0]->bus_speed.'" readonly>
                    </p>
                    <p class="text-danger mt-2" id="error_bus_speed"></p>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="message-text" class="col-form-label text-gray-800">Brand</label>
                    <select id="select-ram-brand"
                        class="form-select form-select-solid coupon_status"
                        data-hide-search="true" name="ram_brand" data-placeholder="Status"
                        data-kt-ecommerce-product-filter="status">
                        <option value="">Select Ram</option>';
                        foreach($ram_brand as $key=>$brand){
                            if($ramSize == '4') {
                                if($ram_4gb > 0) {
                                    $html= $html . '<option value="'.$brand->brand.'" selected>'.$brand->brand.'  <span>[Av.Qty: '.$ram_4gb.']</span></option>';
                                } else {
                                    $html= $html . '<option value="" disabled selected>'.$brand->brand.'  <span>[Av.Qty: '.$ram_4gb.']</span></option>';
                                }
                            } else if($ramSize == '8') {
                                if($ram_8gb > 0) {
                                    $html= $html . '<option value="'.$brand->brand.'" selected>'.$brand->brand.'  <span>[Av.Qty: '.$ram_8gb.']</span></option>';
                                } else {
                                    $html= $html . '<option value="" disabled selected>'.$brand->brand.'  <span>[Av.Qty: '.$ram_8gb.']</span></option>';
                                }
                            } else if($ramSize == '16') {
                                if($ram_16gb > 0) {
                                    $html= $html . '<option value="'.$brand->brand.'" selected>'.$brand->brand.'  <span>[Av.Qty: '.$ram_16gb.']</span></option>';
                                } else {
                                    $html= $html . '<option value="" disabled selected>'.$brand->brand.'  <span>[Av.Qty: '.$ram_16gb.']</span></option>';
                                }
                            }          
                        }
                        $html = $html . '        
                    </select>
                    <p class="text-danger mt-2" id="error_ram_brand"></p>
                </div>
            </div>
        </div>
    </div>';      
       echo $html;
   }


    //requisition details store into database
    public function requisition_store(Request $request){
        
        //Write validate message
        $validator = Validator::make($request->all(), [
            'bb_type' => 'required',
            'bb_model' => 'required',
            'bb_processor' => 'required',
            'bb_brand' => 'required',
            'ssd_type' => 'required',
            'm2_type' => 'required',
            'ssd_size' => 'required',
            'ssd_brand' => 'required',
            'ram_type' => 'required',
            'ram_size' => 'required',
            'bus_speed' => 'required',
            'ram_brand' => 'required',
            'product_type' => 'required',
            'requisition_quantity' => 'required',
            'requisition_purpose' => 'required',
        ],
        [
            'bb_type.required'=>'Series is required!',
            'bb_model.required'=>'Model is required!',
            'bb_processor.required'=>'Processor is required!',
            'bb_brand.required'=>'Brand is required!',
            'ssd_type.required'=>'SSD type is required!',
            'm2_type.required'=>'M.2 is required!',
            'ssd_size.required'=>'SSD size is required!',
            'ssd_brand.required'=>'SSD brand is required!',
            'ram_type.required'=>'RAM type is required!',
            'ram_size.required'=>'RAM size is required!',
            'bus_speed.required'=>'BUS speed is required!',
            'ram_brand.required'=>'RAM brand is required!',
            'product_type.required'=>'Product type required!',
            'requisition_quantity.required'=>'Quantity is required!',
            'requisition_purpose.required'=>'Purpose is required!',
            
        ]
    );


        // After pass all validation
        if($validator->passes()){
            $now = new \DateTime('now', new \DateTimeZone('UTC'));
            $num = dechex((int)$now->format('Uu'));
            $num = substr($num, -7);
            $count_skd_materials = FinishInventory::count();
            if($count_skd_materials == 0) {
                $identity_no = 1;
            }
            else{
                $raw_inventory_max_id = FinishInventory::max('rq_id');
                $identity_no = $raw_inventory_max_id + 1;

            }
            $rq_confirmation_list = DB::table('confirmation_menu_list')->where('confirmation_name','confirm_requisition_creation_proccess')->select('needed_confirm','needed_confirm_ids','needed_verify','needed_verify_ids')->first();
            $rq_stockin_confirmation_list = DB::table('confirmation_menu_list')->where('confirmation_name','confirm_requisition_stockin_process')->select('needed_confirm','needed_confirm_ids','needed_verify','needed_verify_ids')->first();
            
            $rq_processor = explode(" ",$request->bb_processor)[2];
            $ramSize = explode(" ",$request->ram_size)[0];
            $ssdSize = explode(" ",$request->ssd_size)[0];
            $busSpeed = substr($request->bus_speed,0,4);

            $data = new FinishInventory();
            $data->rq_id = $identity_no;
            $data->product_id = $request->product_info;
            $data->product_type = $request->product_type;
            $data->product_series = $request->bb_type;
            $data->bb_type = $request->bb_type;
            $data->bb_model = $request->bb_model; 
            $data->bb_brand = $request->bb_brand; 
            $data->bb_processor = $rq_processor; 
            $data->ssd_type = $request->ssd_type;
            $data->m2_type = $request->m2_type;
            $data->ssd_brand = $request->ssd_brand;
            $data->ssd_size = $ssdSize; 
            $data->ram_type = $request->ram_type;
            $data->ram_brand = $request->ram_brand;
            $data->ram_size = $ramSize;
            $data->bus_speed = $busSpeed;
            $data->quantity = $request->requisition_quantity;
            $data->comment = $request->requisition_purpose;
            $data->created_by = Auth::id();
            $data->rq_serial_no = strtoupper('RQ'. $num);

            //requisition creation process confirmation details
            $data->skd_stockout_needed_confirm = $rq_confirmation_list->needed_confirm;
            $data->skd_stockout_needed_confirm_ids = $rq_confirmation_list->needed_confirm_ids;
            $data->skd_stockout_needed_verify = $rq_confirmation_list->needed_verify;
            $data->skd_stockout_needed_verify_ids = $rq_confirmation_list->needed_verify_ids;

            //requisition stockin process confirmation details
            $data->product_stockin_needed_confirm = $rq_stockin_confirmation_list->needed_confirm;
            $data->product_stockin_needed_confirm_ids = $rq_stockin_confirmation_list->needed_confirm_ids;
            $data->product_stockin_needed_verify = $rq_stockin_confirmation_list->needed_verify;
            $data->product_stockin_needed_verify_ids = $rq_stockin_confirmation_list->needed_verify_ids;

            $data-> save();

            // === Start SKD Serials Booked After Requisition Create === //

            //get barebone skd from database
            if($rq_processor == 'i3') {
                $bb_skd_serials = SkdSerial::where('skd_serial', 'like', 'B3%')->where('flow_type','inflow')->where('skd_brand',$request->bb_brand)->limit($request->requisition_quantity)->get();
            } else if($rq_processor == 'i5') {
                $bb_skd_serials = SkdSerial::where('skd_serial', 'like', 'B5%')->where('flow_type','inflow')->where('skd_brand',$request->bb_brand)->limit($request->requisition_quantity)->get();
            } else if($rq_processor == 'i7') {
                $bb_skd_serials = SkdSerial::where('skd_serial', 'like', 'B7%')->where('flow_type','inflow')->where('skd_brand',$request->bb_brand)->limit($request->requisition_quantity)->get();
            }

            //get ssd skd from database
            if($ssdSize == '512') {
                $ssd_skd_serials = SkdSerial::where('skd_serial', 'like', 'S9%')->where('flow_type','inflow')->where('skd_brand',$request->ssd_brand)->limit($request->requisition_quantity)->get();
            } else if($ssdSize == '1') {
                $ssd_skd_serials = SkdSerial::where('skd_serial', 'like', 'S0%')->where('flow_type','inflow')->where('skd_brand',$request->ssd_brand)->limit($request->requisition_quantity)->get();
            }

            //get ram skd from database
            if($ramSize == '4') {
                $ram_skd_serials = SkdSerial::where('skd_serial', 'like', 'R2%')->where('flow_type','inflow')->where('skd_brand',$request->ram_brand)->limit($request->requisition_quantity)->get();
            } else if($ramSize == '8') {
                $ram_skd_serials = SkdSerial::where('skd_serial', 'like', 'R3%')->where('flow_type','inflow')->where('skd_brand',$request->ram_brand)->limit($request->requisition_quantity)->get();
            } else if($ramSize == '16') {
                $ram_skd_serials = SkdSerial::where('skd_serial', 'like', 'R4%')->where('flow_type','inflow')->where('skd_brand',$request->ram_brand)->limit($request->requisition_quantity)->get();
            }

            //update barebone skd flow type
            if(!empty($bb_skd_serials)) {
                foreach($bb_skd_serials as $bb_serial){
                    SkdSerial::where('skd_serial', $bb_serial->skd_serial)->update(array('flow_type' => 'booked'));
                }
            }

            //update ssd skd flow type
            if(!empty($ssd_skd_serials)) {
                foreach($ssd_skd_serials as $ssd_serial){
                    SkdSerial::where('skd_serial', $ssd_serial->skd_serial)->update(array('flow_type' => 'booked'));
                }
            }

            //update ram skd flow type
            if(!empty($ram_skd_serials)) {
                foreach($ram_skd_serials as $ram_serial){
                    SkdSerial::where('skd_serial', $ram_serial->skd_serial)->update(array('flow_type' => 'booked'));
                }
            }

            // === END SKD Serials Booked After Requisition Create === //

            $html = $this->getRQCreationQueueListHtml();
            
            return response()->json(['status'=>'success','html' => $html]);
        }else{
            return response()->json(['status'=>'error','errors'=>$validator->messages()]);
        }
    }

    //submit requisition confirm request function
    public function rq_creation_confirm(Request $request){
        $created_by = Auth::id();
        $admin_name = Auth::user()->name;
        $alldata = FinishInventory::where('rq_id', $request->confirm_rq_id)->first();

        if($alldata['skd_stockout_confirmed_ids'] == null){
            $cnfrm_id = '["'.Auth::id().'"]';
        } else {
            $rq_creation_cnfirm_id_str1 = str_replace( array(  ']'), '', $alldata['skd_stockout_confirmed_ids']);
            $cnfrm_id = $rq_creation_cnfirm_id_str1.',"'.Auth::id().'"]';
        }
        
        $total_cnfrm = $alldata['skd_stockout_total_confirmed'] + 1;
        FinishInventory::where('rq_id', $request->confirm_rq_id)->update(array('skd_stockout_confirmed_ids' => $cnfrm_id, 'skd_stockout_total_confirmed' => $total_cnfrm));
        if($alldata['skd_stockout_needed_confirm'] == $total_cnfrm){
            //update skd materials flow type when all confirmed done
            $res = str_replace( array( '[', ']', '"' ), '', $alldata['skd_serials']);
            $all_stockout_skd_arr = explode (",", $res);

            foreach($all_stockout_skd_arr as $skd_serial) {
                $inflow = SkdSerial::where('skd_serial', $skd_serial)->first();
                if($inflow->flow_type == 'booked') {
                    $inflow->flow_type = 'outflow';
                    $inflow->save(); 
                } else if($inflow->flow_type == 'inflow') {
                    $inflow->flow_type = 'outflow';
                    $inflow->save();

                    if($skd_serial[0] == 'R') {
                        if($skd_serial[1] == '2') {
                            $skd_seral = SkdSerial::where('skd_serial', 'like', 'R2%')->where('flow_type','booked')->where('skd_brand',$alldata->ram_brand)->first();
                        } else if($skd_serial[1] == '3') {
                            $skd_seral = SkdSerial::where('skd_serial', 'like', 'R3%')->where('flow_type','booked')->where('skd_brand',$alldata->ram_brand)->first();
                        } else if($skd_serial[1] == '4') {
                            $skd_seral = SkdSerial::where('skd_serial', 'like', 'R4%')->where('flow_type','booked')->where('skd_brand',$alldata->ram_brand)->first();
                        }
                    } else if($skd_serial[0] == 'S') {
                        if($skd_serial[1] == '9') {
                            $skd_seral = SkdSerial::where('skd_serial', 'like', 'S9%')->where('flow_type','booked')->where('skd_brand',$alldata->ssd_brand)->first();
                        } else if($skd_serial[1] == '0') {
                            $skd_seral = SkdSerial::where('skd_serial', 'like', 'S0%')->where('flow_type','booked')->where('skd_brand',$alldata->ssd_brand)->first();
                        }
                    } else if($skd_serial[0] == 'B') {
                        if($skd_serial[1] == '3') {
                            $skd_seral = SkdSerial::where('skd_serial', 'like', 'B3%')->where('flow_type','booked')->where('skd_brand',$alldata->bb_brand)->first();
                        } else if($skd_serial[1] == '5') {
                            $skd_seral = SkdSerial::where('skd_serial', 'like', 'B5%')->where('flow_type','booked')->where('skd_brand',$alldata->bb_brand)->first();
                        } else if($skd_serial[1] == '7') {
                            $skd_seral = SkdSerial::where('skd_serial', 'like', 'B7%')->where('flow_type','booked')->where('skd_brand',$alldata->bb_brand)->first();
                        }
                    }

                    
                    $skd_seral->flow_type = 'inflow';
                    $skd_seral->save();
                }
            }
            $alldata->status = 3;
            $alldata->save();

            //add product serial table
            for($i = 0; $i < $alldata['quantity']; $i++) {
                $prod_sl = new ProductSerial();
                $prod_sl->rq_id = $request->confirm_rq_id;
                $prod_sl->product_id = $alldata->product_id;
                $prod_sl-> save();
            }

            // data entry history table when one user confirm start
            $history = new AllHistory();
            $history->table_name = 'FinishInventory';
            $history->table_id = $alldata->id;
            $history->ens_id = $alldata->rq_id;
            $history->created_by = $created_by;
            $history->journal = '<span class=" text-gray-800">SKD out from the warehouse.</span>';
            $history->flow_type = 'outflow';
            $history->date = date('Y-m-d');
            $history-> save();

            $history = new AllHistory();
            $history->table_name = 'FinishInventory';
            $history->table_id = $alldata->id;
            $history->ens_id = $alldata->rq_id;
            $history->created_by = $created_by;
            $history->menu_name = 'Finish Product > Requisition > Creation Process';
            $history->flow_type = 'outflow';
            $history->journal = '<span class=" text-gray-800">Confirmed By ' .$admin_name. '</span>';
            $history->date = date('Y-m-d');
            $history-> save();

            // data entry history table end
            return response()->json(['status'=>'success', 'all_confirm' => 'yes']);
        } else {
            // data entry history table when one user confirm start
            $history = new AllHistory();
            $history->table_name = 'FinishInventory';
            $history->table_id = $alldata->id;
            $history->ens_id = $alldata->rq_id;
            $history->created_by = $created_by;
            $history->menu_name = 'Finish Product > Requisition > Creation Process';
            $history->journal = '<span class=" text-gray-800"> Confirmed By ' .$admin_name .'</span>';
            $history->date = date('Y-m-d');
            $history-> save();
            // data entry history table end

            $drawerHtml = $this->rqCreationDrawerViewHtml($request->confirm_rq_id);
            $queueListHtml = $this->getRQCreationQueueListHtml();

            return response()->json(['status'=>'success', 'all_confirm' => 'no', 'drawer_html' => $drawerHtml, 'queueListHtml' => $queueListHtml]);
        }
          
    }

    //submit requisition building complete request
    public function rq_building_complete($rq_id){

        $alldata = FinishInventory::where('rq_id', $rq_id)->first();
        $alldata->status = 4;
        $alldata->save();
        return redirect()->route('building.queue.list');
    }

    //submit requisition reject request function
    public function rq_creation_reject(Request $request){

        $alldata = FinishInventory::where('rq_id', $request->reject_rq_id)->first();

        //change skd serial flow_type 'booked' to 'inflow' when reject requisition request
        for($i = 0; $i < $alldata->quantity; $i++) {
            //ram skd flow_type change to inflow
            if($alldata->ram_size == '4') {
                $ram_serial = SkdSerial::where('skd_serial', 'like', 'R2%')->where('flow_type','booked')->where('skd_brand',$alldata->ram_brand)->first();
            } else if($alldata->ram_size == '8') {
                $ram_serial = SkdSerial::where('skd_serial', 'like', 'R3%')->where('flow_type','booked')->where('skd_brand',$alldata->ram_brand)->first();
            } else if($alldata->ram_size == '16') {
                $ram_serial = SkdSerial::where('skd_serial', 'like', 'R4%')->where('flow_type','booked')->where('skd_brand',$alldata->ram_brand)->first();
            }
            $ram_serial->flow_type = 'inflow';
            $ram_serial->save();


            //ssd skd flow_type change to inflow
            if($alldata->ssd_size == '512') {
                $ssd_serial = SkdSerial::where('skd_serial', 'like', 'S9%')->where('flow_type','booked')->where('skd_brand',$alldata->ssd_brand)->first();
            } else if($alldata->ssd_size == '1') {
                $ssd_serial = SkdSerial::where('skd_serial', 'like', 'S0%')->where('flow_type','booked')->where('skd_brand',$alldata->ssd_brand)->first();
            }
            $ssd_serial->flow_type = 'inflow';
            $ssd_serial->save();

            //barebone skd flow_type change to inflow
            if($alldata->bb_processor == 'i3') {
                $bb_serial = SkdSerial::where('skd_serial', 'like', 'B3%')->where('flow_type','booked')->where('skd_brand',$alldata->bb_brand)->first();
            } else if($alldata->bb_processor == 'i5') {
                $bb_serial = SkdSerial::where('skd_serial', 'like', 'B5%')->where('flow_type','booked')->where('skd_brand',$alldata->bb_brand)->first();
            } else if($alldata->bb_processor == 'i7') {
                $bb_serial = SkdSerial::where('skd_serial', 'like', 'B7%')->where('flow_type','booked')->where('skd_brand',$alldata->bb_brand)->first();
            }
            $bb_serial->flow_type = 'inflow';
            $bb_serial->save();
        }

        //update requisition table status
        $alldata->status = 2;
        $alldata->save();

        // requisition rejected history table start
        $history = new AllHistory();
        $history->table_name = 'FinishInventory';
        $history->table_id = $alldata->id;
        $history->ens_id = $alldata->rq_id;
        $history->created_by = Auth::id();
        $history->status = 'rejected';
        $history->menu_name = 'Finish Product > Requisition > Creation';
        $history->journal = '<span class=" text-gray-800"> Rejected By ' .Auth::user()->name .'</span>';
        $history->date = date('Y-m-d');
        $history-> save();
        // requisition rejected history table end
        return redirect()->route('requisition.view');
    }

    //submit requisition creation request verification functionality
    public function submit_rq_creation_request_verification(Request $request) {
        $single_rq_data = FinishInventory::where('rq_id', $request->rq_id)->first();
        $rq_creation_verified_ids_str = str_replace( array( '[', ']', '"' ), '', $single_rq_data['skd_stockout_verified_ids']);
        $rq_creation_verified_ids_arr = explode (",", $rq_creation_verified_ids_str);

        if(in_array(Auth::id(), $rq_creation_verified_ids_arr)){
            return response()->json(['status'=>'error']);
        } else {
            $rq_creation_request_skd_serials_str = str_replace( array( '"' ), '', $request->skd_serials);
            $rq_creation_request_skd_serials_arr = explode (",", $rq_creation_request_skd_serials_str);

            $skd_sls = "[";
            foreach($rq_creation_request_skd_serials_arr as $serial){
                if ($skd_sls == "[") {
                    $skd_sls = $skd_sls .'"'. $serial .'"';
                } else {
                    $skd_sls = $skd_sls .',"'. $serial .'"';
                }
            }
            $skd_sls = $skd_sls . "]";

            $total_rq_cr_request_verify_number = $single_rq_data['skd_stockout_total_verified'] + 1;

            if($single_rq_data['skd_stockout_verified_ids'] == null){
                $new_rq_creation_verified_ids_str = '["'.Auth::id().'"]';
            } else {
                $rq_creation_verified_ids_str = str_replace( array( ']'), '', $single_rq_data['skd_stockout_verified_ids']);
                $new_rq_creation_verified_ids_str = $rq_creation_verified_ids_str.',"'.Auth::id().'"]';
            }

            //update
            DB::table('finish_inventories')->where('rq_id', $request->rq_id)->update(array('skd_stockout_total_verified' => $total_rq_cr_request_verify_number, 'skd_stockout_verified_ids' => $new_rq_creation_verified_ids_str, 'skd_serials'=>$skd_sls));

            $rq_creation_drawer_html = $this->rqCreationDrawerViewHtml($request->rq_id);

            return response()->json(['status'=>'success', 'html_text'=>$rq_creation_drawer_html]);
        }
        
    }

    //requsition form barcode scan check functionality
    public function finished_product_requisition_form_barcode_check(Request $request) {
        
        if($request->rq_id) {
            FinishInventory::where('rq_id', $request->rq_id)->update(array('rq_frm_scan_status' => 1));
            $drawer_html = $this->rqCreationDrawerViewHtml($request->rq_id);
            return response()->json(['status'=>'success', 'drawer_html'=>$drawer_html]);
        } else {
            return response()->json(['status'=>'error']);
        }
    }

    //requisition creation details view functionality inside drawer
    public function rqCreationDrawerViewHtml($rq_id){
        $rq_info = FinishInventory::where('rq_id',$rq_id)->get();
        $html = '<div class="card rounded-0 w-100"><div class="card-header pe-5"><div class="card-title" style="text-transform: uppercase">RQ'.$rq_info[0]->rq_id.'</div>
        <div class="card-toolbar"><div class="d-flex align-items-center " style="place-content: end;">';
        $hasPermission = User::hasPermission(["confirm_reject_requisition_request"]);
        $btnhtml = '';
        $single_rq_data = FinishInventory::where('rq_id', $rq_id)->first();
        $needed_confirm_ids_str = str_replace( array( '[', ']', '"' ), '', $single_rq_data['skd_stockout_needed_confirm_ids']);
        $needed_confirm_ids_arr = explode (",", $needed_confirm_ids_str);
        $needed_verify_ids_str = str_replace( array( '[', ']', '"' ), '', $single_rq_data['skd_stockout_needed_verify_ids']);
        $needed_verify_ids_arr = explode (",", $needed_verify_ids_str);
        $rq_creation_verified_ids_str = str_replace( array( '[', ']', '"' ), '', $single_rq_data['skd_stockout_verified_ids']);
        $rq_creation_verified_ids_arr = explode (",", $rq_creation_verified_ids_str);

        $btnhtml = '';
        if($hasPermission){
            if(in_array(Auth::id(), $needed_confirm_ids_arr)){
                
                if($single_rq_data['skd_stockout_confirmed_ids'] == null){
                    if(in_array(Auth::id(), $needed_verify_ids_arr)){
                        if(in_array(Auth::id(), $rq_creation_verified_ids_arr)){
                            $btnhtml = '<button class="btn confirm btn-sm" onclick="confirmRQCreationAlertModal('.$rq_id.')">Confirm</button><button class="btn reject  btn-sm" onclick="rejectRQCreationModal('.$rq_id.')">Reject</button>';
                        } else {
                            $btnhtml = '<button class="btn confirm btn-sm" disabled>Confirm</button><button class="btn reject  btn-sm" onclick="rejectRQCreationModal('.$rq_id.')">Reject</button>';
                        }
                    } else {
                        
                        $btnhtml = '<button class="btn confirm btn-sm" onclick="confirmRQCreationAlertModal('.$rq_id.')">Confirm</button><button class="btn reject  btn-sm" onclick="rejectRQCreationModal('.$rq_id.')">Reject</button>';
                    }
                    
                } else {
                    $res = str_replace( array( '[', ']', '"' ), '', $single_rq_data['skd_stockout_confirmed_ids']);
                    $rq_creation_confirm_arr = explode (",", $res);
                    if(in_array(Auth::id(), $rq_creation_confirm_arr)){
                        $btnhtml = '<button class="btn confirm btn-sm" disabled>Confirmed</button>';
                    } else {
                        if(in_array(Auth::id(), $needed_verify_ids_arr)){
                            if(in_array(Auth::id(), $rq_creation_verified_ids_arr)){
                                $btnhtml = '<button class="btn confirm btn-sm" onclick="confirmRQCreationAlertModal('.$rq_id.')">Confirm</button><button class="btn reject  btn-sm" onclick="rejectRQCreationModal('.$rq_id.')">Reject</button>';
                            } else {
                                $btnhtml = '<button class="btn confirm btn-sm" disabled>Confirm</button><button class="btn reject  btn-sm" onclick="rejectRQCreationModal('.$rq_id.')">Reject</button>';
                            }
                        } else {
                            $btnhtml = '<button class="btn confirm btn-sm" onclick="confirmRQCreationAlertModal('.$rq_id.')">Confirm</button><button class="btn reject  btn-sm" onclick="rejectRQCreationModal('.$rq_id.')">Reject</button>';
                        }
                    }
                    
                }
            } 
            
        }

        // <button id="kt_drawer_verify_ens_serial_permanent_toggle" data-kt-drawer-permanent="true" class="btn ens-verify-btn btn-primary btn-sm" onclick="openVerifyBarcodeScaningModal('.$rq_id.','.$rq_info[0]->quantity.','.$rq_info[0]->ram_size.','.$rq_info[0]->ssd_size.','.$rq_info[0]->bb_processor[1].')">Verify</button>

        // Requisition Information
        $html = $html . $btnhtml . '<button class="btn close  btn-sm" id="kt_drawer_requisition_creation_drawer_close">Close</button></div></div></div><div class="card-body hover-scroll-overlay-y"><div class="text-center d-flex align-items-center" style="place-content: center;">
        <h1 class=" my-2 fs-3 d-flex align-items-center text-gray-800 ">Requisition Information</h1></div><div class="row my-5"><div class="col-md-6"><p class="fw-bolder fs-5 text-gray-700">Product: <span class="text-gray-800">'.$rq_info[0]->product_type.'</span></p>
        <p class="fw-bolder fs-5 text-gray-700">Product Quantity: <span class="text-gray-800">'.$rq_info[0]->quantity.'</span></p>';

        $html = $html . '</div><div class="col-md-6"><p class="fw-bolder fs-5 text-gray-700">Create By: <span class="text-gray-800">'.$rq_info[0]['userDetails']['name'].'</span></p>
        <p class="fw-bolder fs-5 text-gray-700">Create Date: <span class="text-gray-800">'.date('d M Y',strtotime($rq_info[0]->created_at)).'</span></p></div></div>
        <div class="text-center d-flex align-items-center mt-5" style="place-content: center;"><h1 class=" mt-2 fs-3 text-gray-800 ">SKD Material Information</h1></div><div class="row my-5 pb-5" style="background-color:#00000000;">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
        <thead>
            <tr class="text-end text-gray-600 fw-bolder fs-7 text-uppercase gs-2">
                <th class="text-start min-w-100px">SKD Material</th>
                <th class="text-start min-w-100px">Details</th>
                <th class="text-start min-w-100px">Quantity</th>';

                if(in_array(Auth::id(), $needed_verify_ids_arr)){
                    $html = $html . '<th class="text-start min-w-100px">Action</th>';
                }
                

        $html = $html .  '</tr>
        </thead>
        <tbody class="fw-bold text-gray-700" id="">
            <tr>
                <td>RAM</td>
                <td class="text-start pe-0">
                    <span class="fw-bolder">'.$rq_info[0]->ram_size.' GB '.$rq_info[0]->ram_type.' '.$rq_info[0]->bus_speed.' MHz</span>
                </td>
                <td class="text-start pe-0">
                    <span class="fw-bolder">'.$rq_info[0]->quantity.'</span>
                </td>';

                if(in_array(Auth::id(), $needed_verify_ids_arr)){
                    if(in_array(Auth::id(), $rq_creation_verified_ids_arr)){
                        $html = $html . '<td class="text-start pe-0"><button class="btn btn-secondary btn-sm" disabled><i class="fa-solid fa-check" style="color: #3ac104;font-size: 18px;"></i></button></td>';
                    } else {
                        $scanBtn = '<button class="btn btn-success btn-sm" onclick="openVerifyBarcodeScaningModal('.$rq_id.','.$rq_info[0]->quantity.','.$rq_info[0]->ram_size.','."'".$rq_info[0]->ram_brand."'".',1)">Scan</button>';  //Here, 1 = ram
                        if($rq_info[0]->rq_frm_scan_status == '0') {
                            $scanBtn = '<button class="btn btn-success btn-sm" disabled>Scan</button>'; 
                        }
                        $html = $html . '<td class="text-start pe-0" id="rq_creation_verify_checkmark_ram">'.$scanBtn.'</td>';
                    }
                }
                
            $html = $html . '</tr>
            <tr>
                <td>SSD</td>
                <td class="text-start pe-0">
                    <span class="fw-bolder">'.$rq_info[0]->ssd_size.' GB '.$rq_info[0]->ssd_type.' '.$rq_info[0]->m2_type.'</span>
                </td>
                <td class="text-start pe-0">
                    <span class="fw-bolder">'.$rq_info[0]->quantity.'</span>
                </td>';

                if(in_array(Auth::id(), $needed_verify_ids_arr)){
                    if(in_array(Auth::id(), $rq_creation_verified_ids_arr)){
                        $html = $html . '<td class="text-start pe-0"><button class="btn btn-secondary btn-sm" disabled><i class="fa-solid fa-check" style="color: #3ac104;font-size: 18px;"></i></button></td>';
                    } else {
                        $scanBtn = '<button class="btn btn-success btn-sm" onclick="openVerifyBarcodeScaningModal('.$rq_id.','.$rq_info[0]->quantity.','.$rq_info[0]->ssd_size.','."'".$rq_info[0]->ssd_brand."'".',2)">Scan</button>';  //Here, 2 = ssd
                        if($rq_info[0]->rq_frm_scan_status == '0') {
                            $scanBtn = '<button class="btn btn-success btn-sm" disabled>Scan</button>'; 
                        }
                        $html = $html . '<td class="text-start pe-0" id="rq_creation_verify_checkmark_ssd">'.$scanBtn.'</td>';
                    }
                }
                
            $html = $html . '</tr>
            <tr>
                <td>Barebone</td>
                <td class="text-start pe-0">
                    <span class="fw-bolder">core '.$rq_info[0]->bb_processor.' '.$rq_info[0]->bb_type.' '.$rq_info[0]->bb_model.'</span>
                </td>
                <td class="text-start pe-0">
                    <span class="fw-bolder">'.$rq_info[0]->quantity.'</span>
                </td>';

                if(in_array(Auth::id(), $needed_verify_ids_arr)){
                    if(in_array(Auth::id(), $rq_creation_verified_ids_arr)){
                        $html = $html . '<td class="text-start pe-0"><button class="btn btn-secondary btn-sm" disabled><i class="fa-solid fa-check" style="color: #3ac104;font-size: 18px;"></i></button></td>';
                    } else {
                        $scanBtn = '<button class="btn btn-success btn-sm" onclick="openVerifyBarcodeScaningModal('.$rq_id.','.$rq_info[0]->quantity.','.$rq_info[0]->bb_processor[1].','."'".$rq_info[0]->bb_brand."'".',3)">Scan</button>';  //Here, 3 = barebone
                        if($rq_info[0]->rq_frm_scan_status == '0') {
                            $scanBtn = '<button class="btn btn-success btn-sm" disabled>Scan</button>'; 
                        }
                        $html = $html . '<td class="text-start pe-0" id="rq_creation_verify_checkmark_bb">'.$scanBtn.'</td>'; //Here, 3 = barebone
                    }
                }

            $html = $html . '</tr>
        </tbody>
        </table><textarea type="text" name="rq_creation_all_skd_scanable_barcodes" id="rq_creation_all_skd_scanable_barcodes" style="display: none;"></textarea><input type="hidden" name="total_rq_creation_skd_stockout_varyfied_number" id="total_rq_creation_skd_stockout_varyfied_number" value=0>';
        if(in_array(Auth::id(), $needed_verify_ids_arr)){
            if(in_array(Auth::id(), $rq_creation_verified_ids_arr)){
                $html = $html . '<div class="text-center" id="rq_creation_verify_btn"><button type="button" class="btn btn-secondary w-25" disabled>Verified</button></div>';
            } else {
                $btnSubmit = '<button type="button" class="btn btn-primary w-25" onclick="submitRQCreationVerify('.$rq_id.')">Submit</button>';
                if($rq_info[0]->rq_frm_scan_status == '0') {
                    $btnSubmit = '<button class="btn btn-primary w-30" onclick="openModalForScanRQFrm(`'.$rq_info[0]->rq_serial_no.'`,`'.$rq_id.'`)">Scan Requsition Form</button>'; 
                }
                $html = $html . '<div class="text-center" id="rq_creation_verify_btn">'.$btnSubmit.'</div>';
            }
        } else {
            $html = $html . '<button type="button" class="btn btn-secondary w-25 mx-auto"> <a class="fw-bold text-gray-700" target="_blank" href="'.route('requisition.processing','.'.$rq_info[0]->rq_id.'.').'""> Download
            slip</a></button>'
            ;
        }
        
        return $html;
    }


    //requisition creation queue list table html generate funmctionality
    public function getRQCreationQueueListHtml(){
        $rqCreationQueueLists = FinishInventory::whereColumn('skd_stockout_needed_confirm','>','skd_stockout_total_confirmed')->where('status','!=','2')->orderBy('id', 'DESC')->get();
        // dd($rqCreationQueueLists);

        $queueListHtml = '';
        foreach($rqCreationQueueLists as $key=>$queue) {
            if($queue['skd_stockout_needed_confirm'] != $queue['skd_stockout_total_confirmed']) {
                $queueListHtml = $queueListHtml . '<tr><td></td><td class="text-start pe-0"><span class="fw-bolder">RQ'.$queue->rq_id.'</span></td>
                <td class="text-start pe-0"><span class="fw-bolder">'.$queue->product_type.'</span></td><td class="text-start pe-0" data-order="47"><span class="fw-bolder">Core '.$queue->bb_processor.'</span></td>
                <td class="text-start pe-0"><span class="fw-bolder">'.$queue->quantity.'</span></td><td class="" data-order="0"><span class="fw-bolder">'.$queue['userDetails']['name'].'</span></td>
                <td class="text-start"><span class="fw-bolder">'.date('d M Y',strtotime($queue->created_at)).'</span></td><td class="text-start pe-0" data-order="rating-3">';

                $needed_confirm_all_ids = $queue['skd_stockout_needed_confirm_ids'];
                $needed_confirm_all_ids_str = str_replace( array( '[', ']', '"' ), '', $needed_confirm_all_ids);
                $needed_confirm_all_ids_arr = explode (",", $needed_confirm_all_ids_str);

                $confirm_all_ids = $queue['skd_stockout_confirmed_ids'];
                $confirm_all_ids_str = str_replace( array( '[', ']', '"' ), '', $confirm_all_ids);
                $confirm_all_ids_arr = explode (",", $confirm_all_ids_str);

                if(count($confirm_all_ids_arr) > 0){
                    $rq_creation_confirmation_names = User::getUsersName($confirm_all_ids_arr);
                } else {
                    $rq_creation_confirmation_names = [];
                }

                $new_needed_confirm_all_ids_arr = [];
                for($i = 0; $i < count($needed_confirm_all_ids_arr); $i++){
                    if(!in_array($needed_confirm_all_ids_arr[$i], $confirm_all_ids_arr)){
                        array_push($new_needed_confirm_all_ids_arr,$needed_confirm_all_ids_arr[$i]);
                    }
                }
                
                if(count($needed_confirm_all_ids_arr) > 0){
                    $rq_creation_remaining_confirmation_names = User::getUsersName($new_needed_confirm_all_ids_arr);
                } else {
                    $rq_creation_remaining_confirmation_names = []; 
                }
                
                    
                $needed_confirm = $queue['skd_stockout_needed_confirm'];
                $total_confirmed = $queue['skd_stockout_total_confirmed'];
                $confirm = $needed_confirm - $total_confirmed;
                    
                for($x = 0; $x< $total_confirmed; $x++) {
                    
                    $queueListHtml = $queueListHtml . '<button type="button" class="btn-icon" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="'.$rq_creation_confirmation_names[$x].'"><i
                    class="fa-solid fa-check"></i></button>';
                }
                for($x = 0; $x< $confirm; $x++) {
                    
                    $queueListHtml = $queueListHtml . '<button type="button" class="btn-icon" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="'.$rq_creation_remaining_confirmation_names[$x].'"><i
                    class="fa-solid fa-minus"></i></button>';
                }

                $queueListHtml = $queueListHtml . '</td><td class="text-start"><div class="menu-item"><a id="requisition_details_drawer" data-kt-drawer-permanent="true" href=""
                class="menu-link rq_id_no"
                onclick="getRQID('.$queue->rq_id.')">View</a>
                 </div></td></tr>';

            }
        }
        return $queueListHtml;
    }

    //get requisition details inside drawer by id
    public function get_rq_details_by_id(Request $req){
        $rq_id = $req->rq_id;
        $drawerHtml = $this->rqCreationDrawerViewHtml($req->rq_id);    
        
        return $drawerHtml;
    }

    public function requisition_processing(Request $request, $id){
        $rq_id = preg_replace('/[^A-Za-z0-9\-]/', '', $id);
        $rq_info = FinishInventory::where('rq_id',$rq_id)->get();
  
          // $customPaper = array(0, 0, 115, 28);
          $pdf = PDF::loadView('admin.layouts.finishedProducts.requisitionPDF',['rq_info'=>$rq_info]);
          // $pdf = PDF::loadView('admin.layouts.inventory.requisitionPDF', ['barcodes'=>$row_inventory]);
          $pdf->setPaper('a4', 'potrait');
          return $pdf->stream();
      }
  
      //checking valid barcode for skd items in requisition form
      public function check_valid_barcode_for_requisition_creation(Request $request){
          //checking serial number length
          if(strlen($request->verify_rq_creation_current_code) == 10) {
              if($request->verify_barcode_scan_id == null) {
                $barcode_arr = [];
              } else {
                $barcode_arr = explode (",", $request->verify_barcode_scan_id);
              }
              
              if(count($barcode_arr) != $request->rq_creation_qty){
  
                  //checking already exist or not into database
                  $slcount = SkdSerial::where('skd_serial',$request->verify_rq_creation_current_code)->where('flow_type','outflow')->count();
                  if($slcount > 0){
                      return response()->json(['status'=>'error', 'error_type'=>'Already Exist', 'message'=>'This barcode is already entry before. Please try new barcode.']);
                  } else {
                      $validSkd = SkdSerial::where('skd_serial',$request->verify_rq_creation_current_code)->whereIn('flow_type', ['inflow','booked'])->where('skd_brand',$request->rq_creation_skd_brand)->count();
                      if($validSkd > 0) {
                          if($request->rq_creation_type == 'ram'){
                              if ($request->verify_rq_creation_current_code[0] == 'R' && $request->verify_rq_creation_current_code[1] == $request->rq_creation_size) {
      
                                  if (in_array($request->verify_rq_creation_current_code, $barcode_arr))
                                  {
                                      return response()->json(['status'=>'error', 'error_type'=>'Double Entry!', 'message'=>'This barcode is already scaned. Please try new barcode.']);
                                  }
                                  else
                                  {
                                      return response()->json(['status'=>'success', 'type'=>'ram']);
                                  }
                                  
                              } else {
                                  return response()->json(['status'=>'error', 'error_type'=>'Invalid Barcode!', 'message'=>'This barcode is not valid. Please scan a valid barcode.']);
                              }
      
                          } else if($request->rq_creation_type == 'ssd') {
      
                              if ($request->verify_rq_creation_current_code[0] == 'S' && $request->verify_rq_creation_current_code[1] == $request->rq_creation_size) {
      
                                  if (in_array($request->verify_rq_creation_current_code, $barcode_arr))
                                  {
                                      return response()->json(['status'=>'error', 'error_type'=>'Double Entry!', 'message'=>'This barcode is already scaned. Please try new barcode.']);
                                  }
                                  else
                                  {
                                      return response()->json(['status'=>'success', 'type'=>'ssd']);
                                  }
                                  
                              } else {
                                  return response()->json(['status'=>'error', 'error_type'=>'Invalid Barcode!', 'message'=>'This barcode is not valid. Please scan a valid barcode.']);
                              }
      
                          } else if($request->rq_creation_type == 'bb') {
      
                              if ($request->verify_rq_creation_current_code[0] == 'B' && $request->verify_rq_creation_current_code[1] == $request->rq_creation_size) {
      
                                  if (in_array($request->verify_rq_creation_current_code, $barcode_arr))
                                  {
                                      return response()->json(['status'=>'error', 'error_type'=>'Double Entry!', 'message'=>'This barcode is already scaned. Please try new barcode.']);
                                  }
                                  else
                                  {
                                      return response()->json(['status'=>'success', 'type'=>'bb']);
                                  }
                                  
                              } else {
                                  return response()->json(['status'=>'error', 'error_type'=>'Invalid Barcode!', 'message'=>'This barcode is not valid. Please scan a valid barcode.']);
                              }
      
                          } else {
                              return response()->json(['status'=>'error', 'error_type'=>'Something Wrong!', 'message'=>'Please try some time later.']);
                          }
                      } else {
                          return response()->json(['status'=>'error', 'error_type'=>'Error!', 'message'=>'This barcode is not valid. Please scan a valid barcode.']);
                      }
                      
                  }
  
              } else {
                  return response()->json(['status'=>'error', 'error_type'=>'Error!', 'message'=>'Already scaned all barcode.']);
              }
          } else {
              return response()->json(['status'=>'error', 'error_type'=>'Invalid Barcode!', 'message'=>'This barcode is not valid. Please scan a valid barcode.']);
          }
      }
  

    
    
      //get requisition product stockin details inside drawer
    public function get_stockin_queue_details_by_id(Request $req){
        return $this->prodStockinDrawerViewHtml($req->rq_id);
    }

    // generate drawer view html for product stockin
    public function prodStockinDrawerViewHtml($rq_id){
        $rq_info = FinishInventory::where('rq_id',$rq_id)->get();
        $html = '<div class="card rounded-0 w-100"><div class="card-header pe-5"><div class="card-title" style="text-transform: uppercase">'.$rq_info[0]->rq_serial_no.'</div>
        <div class="card-toolbar"><div class="d-flex align-items-center " style="place-content: end;">';
        $hasPermission = User::hasPermission(["confirm_reject_requisition_stockin"]);
        $btnhtml = '';
        $single_rq_data = FinishInventory::where('rq_id', $rq_id)->first();
        $needed_confirm_ids_str = str_replace( array( '[', ']', '"' ), '', $single_rq_data['product_stockin_needed_confirm_ids']);
        $needed_confirm_ids_arr = explode (",", $needed_confirm_ids_str);
        $needed_verify_ids_str = str_replace( array( '[', ']', '"' ), '', $single_rq_data['product_stockin_needed_verify_ids']);
        $needed_verify_ids_arr = explode (",", $needed_verify_ids_str);
        $rq_stockin_verified_ids_str = str_replace( array( '[', ']', '"' ), '', $single_rq_data['product_stockin_verified_ids']);
        $rq_stockin_verified_ids_arr = explode (",", $rq_stockin_verified_ids_str);

        $btnhtml = '';
        if($hasPermission){
            if(in_array(Auth::id(), $needed_confirm_ids_arr)){
                
                if($single_rq_data['product_stockin_confirmed_ids'] == null){
                    if(in_array(Auth::id(), $needed_verify_ids_arr)){
                        if(in_array(Auth::id(), $rq_stockin_verified_ids_arr)){
                            $btnhtml = '<button class="btn confirm btn-sm" onclick="confirmRQStockinAlertModal('.$rq_id.')">Confirm</button>';
                        } else {
                            $btnhtml = '<button class="btn confirm btn-sm" disabled>Confirm</button>';
                        }
                    } else {
                        
                        $btnhtml = '<button class="btn confirm btn-sm" onclick="confirmRQStockinAlertModal('.$rq_id.')">Confirm</button>';
                    }
                    
                } else {
                    $res = str_replace( array( '[', ']', '"' ), '', $single_rq_data['product_stockin_confirmed_ids']);
                    $rq_stockin_confirm_arr = explode (",", $res);
                    if(in_array(Auth::id(), $rq_stockin_confirm_arr)){
                        $btnhtml = '<button class="btn confirm btn-sm" disabled>Confirmed</button>';
                    } else {
                        if(in_array(Auth::id(), $needed_verify_ids_arr)){
                            if(in_array(Auth::id(), $rq_stockin_verified_ids_arr)){
                                $btnhtml = '<button class="btn confirm btn-sm" onclick="confirmRQStockinAlertModal('.$rq_id.')">Confirm</button>';
                            } else {
                                $btnhtml = '<button class="btn confirm btn-sm" disabled>Confirm</button>';
                            }
                        } else {
                            $btnhtml = '<button class="btn confirm btn-sm" onclick="confirmRQStockinAlertModal('.$rq_id.')">Confirm</button>';
                        }
                    }
                    
                }
            } 
            
        }

        // Requisition Information
        $html = $html . $btnhtml . '<button class="btn close  btn-sm" id="product_stockin_queueList_drawer_close">Close</button></div></div></div><div class="card-body hover-scroll-overlay-y"><div class="text-center d-flex align-items-center" style="place-content: center;">
        <h1 class=" my-2 fs-3 d-flex align-items-center text-gray-800 ">Requisition Information</h1></div><div class="row my-5"><div class="col-md-6"><p class="fw-bolder fs-5 text-gray-700">Product: <span class="text-gray-800">'.$rq_info[0]->product_type.'</span></p>
        <p class="fw-bolder fs-5 text-gray-700">Series: <span class="text-gray-800">'.$rq_info[0]->product_series.'</span></p>
        <p class="fw-bolder fs-5 text-gray-700">Product Model: <span class="text-gray-800">'.$rq_info[0]->bb_model.'</span></p> <br>';

        $html = $html . '<br> </div><div class="col-md-6"><p class="fw-bolder fs-5 text-gray-700">Create By: <span class="text-gray-800">'.$rq_info[0]['userDetails']['name'].'</span></p>
        <p class="fw-bolder fs-5 text-gray-700">Create Date: <span class="text-gray-800">'.date('d M Y',strtotime($rq_info[0]->created_at)).'</span></p>
        <p class="fw-bolder fs-5 text-gray-700">Product Quantity: <span class="text-gray-800">'.$rq_info[0]->quantity.'</span></p></div></div>
        <div class="text-center d-flex align-items-center mt-5" style="place-content: center;"><h1 class=" mt-2 fs-3 text-gray-800 ">Build Product Information</h1></div><br>
        <p class="fw-bolder fs-5 text-gray-700">Description: <span class="text-gray-700">Processor
        Core '.$rq_info[0]->bb_processor.', RAM '.$rq_info[0]->ram_size.' GB '.$rq_info[0]->ram_type.' '.$rq_info[0]->bus_speed.' MHz, SSD '.$rq_info[0]->ssd_size.'';
        if($rq_info[0]->ssd_size < 10){
            $html = $html . ' TB ';
        }else{
            $html = $html . ' GB ';
        }
        $html = $html . ''.$rq_info[0]->ssd_type.' '.$rq_info[0]->m2_type.' Brand '.$rq_info[0]->ssd_brand.'</span></p>
        <div class="row my-5 pb-5" style="background-color:#00000000;">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
        <thead>
            <tr class="text-end text-gray-600 fw-bolder fs-7 text-uppercase gs-2">
                <th class="text-start min-w-100px">Sr</th>
        
                <th class="text-start min-w-100px">Serial</th>';

                if(in_array(Auth::id(), $needed_verify_ids_arr)){
                    $html = $html . '<th class="text-start min-w-100px">Action</th>';
                }
                

        $html = $html . '</tr>
        </thead>
        <tbody class="fw-bold text-gray-700" id="">';
        $product_details =ProductSerial::where('rq_id',$rq_id)->get();
        foreach($product_details as $key=> $product){
            $html = $html . ' <tr>
            <td>#'.++$key. '</td>
       
            <td class="text-start pe-0">
                <span class="fw-bolder">'.$product->prod_serial.'</span>            
            </td>';

            if(in_array(Auth::id(), $needed_verify_ids_arr)){
                if(in_array(Auth::id(), $rq_stockin_verified_ids_arr)){
                    $html = $html . '<td class="text-start pe-0"><button class="btn btn-secondary btn-sm" disabled><i class="fa-solid fa-check" style="color: #3ac104;font-size: 18px;"></i></button></td>';
                } else {
                    $html = $html . '<td class="text-start pe-0" id="rq_stockin_verify_checkmark_'.$product->prod_serial.'"><button class="btn btn-success btn-sm" onclick="openVerifyProductBarcodeScaningModal(`'.$product->prod_serial.'`)">Scan</button></td>';
                }
            }
        }
            
                
            $html = $html . '</tr>

        </tbody>
        </table><input type="hidden" name="total_rq_product_stockin_varyfied_number" id="total_rq_product_stockin_varyfied_number" value=0>';
        if(in_array(Auth::id(), $needed_verify_ids_arr)){
            if(in_array(Auth::id(), $rq_stockin_verified_ids_arr)){
                $html = $html . '<div class="text-center" id="rq_stockin_verify_btn"><button type="button" class="btn btn-secondary w-25" disabled>Verified</button></div>';
            } else {
                $html = $html . '<div class="text-center" id="rq_stockin_verify_btn"><button type="button" class="btn btn-primary w-25" onclick="submitProdStockinVerify('.$rq_id.','.count($product_details).')">Verify</button></div>';
            }
        }
        
        return $html;
    }


    //product stockin queue list table html generate funmctionality
    public function getProductStockinQueueListHtml(){
        $prodStockinQueueLists = FinishInventory::whereColumn('product_stockin_needed_confirm','>','product_stockin_total_confirmed')->where('status','=','4')->orderBy('id', 'DESC')->get();

        $queueListHtml = '';

        foreach($prodStockinQueueLists as $key=>$queue) {
            if($queue['product_stockin_needed_confirm'] != $queue['product_stockin_total_confirmed']) {
                $queueListHtml = $queueListHtml . '<tr><td></td><td class="text-start pe-0"><span class="fw-bolder">RQ'.$queue->rq_id.'</span></td>
                <td class="text-start pe-0"><span class="fw-bolder">'.$queue->product_type.'</span></td><td></td>
                <td class="text-start pe-0"><span class="fw-bolder">'.$queue->quantity.'</span></td><td class="" data-order="0"><span class="fw-bolder">'.$queue['userDetails']['name'].'</span></td>
                <td class="text-start"><span class="fw-bolder">'.date('d M Y',strtotime($queue->created_at)).'</span></td><td class="text-start pe-0" data-order="rating-3">';

                $needed_confirm_all_ids = $queue['product_stockin_needed_confirm_ids'];
                $needed_confirm_all_ids_str = str_replace( array( '[', ']', '"' ), '', $needed_confirm_all_ids);
                $needed_confirm_all_ids_arr = explode (",", $needed_confirm_all_ids_str);

                $confirm_all_ids = $queue['product_stockin_confirmed_ids'];
                $confirm_all_ids_str = str_replace( array( '[', ']', '"' ), '', $confirm_all_ids);
                $confirm_all_ids_arr = explode (",", $confirm_all_ids_str);

                if(count($confirm_all_ids_arr) > 0){
                    $prod_stockin_confirmation_names = User::getUsersName($confirm_all_ids_arr);
                } else {
                    $prod_stockin_confirmation_names = [];
                }

                $new_needed_confirm_all_ids_arr = [];
                for($i = 0; $i < count($needed_confirm_all_ids_arr); $i++){
                    if(!in_array($needed_confirm_all_ids_arr[$i], $confirm_all_ids_arr)){
                        array_push($new_needed_confirm_all_ids_arr,$needed_confirm_all_ids_arr[$i]);
                    }
                }
                
                if(count($needed_confirm_all_ids_arr) > 0){
                    $prod_stockin_remaining_confirmation_names = User::getUsersName($new_needed_confirm_all_ids_arr);
                } else {
                    $prod_stockin_remaining_confirmation_names = []; 
                }
                
                    
                $needed_confirm = $queue['product_stockin_needed_confirm'];
                $total_confirmed = $queue['product_stockin_total_confirmed'];
                $confirm = $needed_confirm - $total_confirmed;
                    
                for($x = 0; $x< $total_confirmed; $x++) {
                    
                    $queueListHtml = $queueListHtml . '<button type="button" class="btn-icon" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="'.$prod_stockin_confirmation_names[$x].'"><i
                    class="fa-solid fa-check"></i></button>';
                }
                for($x = 0; $x< $confirm; $x++) {
                    
                    $queueListHtml = $queueListHtml . '<button type="button" class="btn-icon" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="'.$prod_stockin_remaining_confirmation_names[$x].'"><i
                    class="fa-solid fa-minus"></i></button>';
                }

                $queueListHtml = $queueListHtml . '</td><td class="text-start"><div class="menu-item"><a id="requisition_details_drawer" data-kt-drawer-permanent="true" href=""
                class="menu-link rq_id_no"
                onclick="getRQID('.$queue->rq_id.')">View</a>
                 </div></td></tr>';

            }
        }
        return $queueListHtml;
    }


    //submit product stockin requisition confirm request function
    public function rq_stockin_confirm(Request $request){

   
        $alldata = FinishInventory::where('rq_id', $request->stockin_confirm_rq_id)->first();

        if($alldata['product_stockin_confirmed_ids'] == null){
            $cnfrm_id = '["'.Auth::id().'"]';
        } else {
            $rq_stockin_cnfirm_id_str1 = str_replace( array(  ']'), '', $alldata['product_stockin_confirmed_ids']);
            $cnfrm_id = $rq_stockin_cnfirm_id_str1.',"'.Auth::id().'"]';
        }
        
        $total_cnfrm = $alldata['product_stockin_total_confirmed'] + 1;
        FinishInventory::where('rq_id', $request->stockin_confirm_rq_id)->update(array('product_stockin_confirmed_ids' => $cnfrm_id, 'product_stockin_total_confirmed' => $total_cnfrm));
        if($alldata['product_stockin_needed_confirm'] == $total_cnfrm){
            $all_product_serials = ProductSerial::where('rq_id', $request->stockin_confirm_rq_id)->get();
            //update skd materials flow type when all confirmed done
            $res = str_replace( array( '[', ']', '"' ), '', $alldata['skd_serials']);
            $all_stockout_skd_arr = explode (",", $res);

            foreach($all_product_serials as $product) {
                $prod_flow = ProductSerial::where('flow_type', null)->where('prod_serial', $product['prod_serial'])->first();
                $prod_flow->flow_type = 'inflow';
                $prod_flow->save(); 
            }
            $alldata->status = 5;
            $alldata->save();

            // data entry history table end
            return response()->json(['status'=>'success', 'all_confirm' => 'yes']);
        } else {
            

            $drawerHtml = $this->prodStockinDrawerViewHtml($request->stockin_confirm_rq_id);
            $queueListHtml = $this->getProductStockinQueueListHtml();

            return response()->json(['status'=>'success', 'all_confirm' => 'no', 'drawer_html' => $drawerHtml, 'queueListHtml' => $queueListHtml]);
        }
          
    }


    //handle product stockin verification request
    public function submit_product_stockin_verification(Request $request) {
        $single_rq_data = FinishInventory::where('rq_id', $request->rq_id)->first();
        $prod_stockin_verified_ids_str = str_replace( array( '[', ']', '"' ), '', $single_rq_data['product_stockin_verified_ids']);
        $prod_stockin_verified_ids_arr = explode (",", $prod_stockin_verified_ids_str);

        if(in_array(Auth::id(), $prod_stockin_verified_ids_arr)){
            return response()->json(['status'=>'error']);
        } else {

            $total_prod_stockin_verify_number = $single_rq_data['product_stockin_total_verified'] + 1;

            if($single_rq_data['product_stockin_verified_ids'] == null){
                $new_prod_stockin_verified_ids_str = '["'.Auth::id().'"]';
            } else {
                $prod_stockin_verified_ids_str = str_replace( array( ']'), '', $single_rq_data['product_stockin_verified_ids']);
                $new_prod_stockin_verified_ids_str = $prod_stockin_verified_ids_str.',"'.Auth::id().'"]';
            }

            //update
            DB::table('finish_inventories')->where('rq_id', $request->rq_id)->update(array('product_stockin_total_verified' => $total_prod_stockin_verify_number, 'product_stockin_verified_ids' => $new_prod_stockin_verified_ids_str));

            $prod_stockin_drawer_html = $this->prodStockinDrawerViewHtml($request->rq_id);

            return response()->json(['status'=>'success', 'html_text'=>$prod_stockin_drawer_html]);
        }
        
    }

    
    // Building Details serial generate start
    public function serial_generate(Request $req){
        $data['rq_info'] = 1;
        $id = 1;
        $data =  ProductSerial::find($id);
        $data->prod_serial =  "S7B6776F19";
        $data->save();
        return redirect()->route('building.details',$data);
    }
    public function serial_download($sl){
        // $row_inventory = ProductSerial::select('prod_serial')->first()->prod_serial;
        $customPaper = array(0, 0, 115, 28);
        $pdf = PDF::loadView('admin.layouts.finishedProducts.finalSerialGenaratePdf', ['barcodes'=>$sl]);
        $pdf->setPaper($customPaper, 'potrait');
        return $pdf->stream();
    }
    public function serial_lasering($sl,$pid){
        $customPaper = array(0, 0, 276, 102);
        $pdf = PDF::loadView('admin.layouts.finishedProducts.laseringBarcodePDF', ['barcodes'=>$sl,'prod_id'=>$pid]);
        $pdf->setPaper($customPaper, 'potrait');
        return $pdf->stream("D_Cover_".$sl.".pdf");
    }
    
    public function serial_label($sl,$pid){
        $product = Product::where('id',$pid)->select('sku','prod_model','processor')->first();
        $sku = '';
        $prod_model = '';
        $processor = '';
        if($product){
            $processor_arr = explode (" ", $product->processor);
            $sku = $product->sku;
            $prod_model = $product->prod_model;
            if(isset($processor_arr[2])){
                $processor = $processor_arr[2];
            }
        }
        
        // $customPaper = array(0, 0, 288, 384);
        $customPaper = array(0, 0, 216, 274);
        $pdf = PDF::loadView('admin.layouts.finishedProducts.labelPDF', ['barcodes'=>$sl,'prod_id'=>$pid,'sku'=>$sku,'prod_model'=>$prod_model,'processor'=>$processor]);
        $pdf->setPaper($customPaper, 'potrait');
        return $pdf->stream("Box_Label_".$sl.".pdf");
    }
    public function serial_c_cover($sl){
        $customPaper = array(0, 0, 115, 28);
        $pdf = PDF::loadView('admin.layouts.finishedProducts.c_coverBarcodePDF', ['barcodes'=>$sl]);
        $pdf->setPaper($customPaper, 'potrait');
        return $pdf->stream("C_Cover_".$sl.".pdf");
    }
    


    //Requisition Building Process
    public function assemble_parts_skd_barcode_check(Request $r) {
        //checking serial number length
        if(strlen($r->cur_barcode) == 10) {
            // $valid_barcode = SkdSerial::whereIn('flow_type',  ['inflow',null])->where('skd_serial',$r->cur_barcode)->count();
            $valid_barcode = SkdSerial::where('flow_type', 'outflow')->where('skd_serial',$r->cur_barcode)->count();
            if($valid_barcode < 1) {
                return response()->json(['status'=>'error', 'error_type'=>'Invalid Barcode!', 'message'=>'This barcode is not valid. Please scan a valid barcode.']);
            } else {
                if ($r->cur_barcode[0] == 'R' && $r->cur_barcode[1] == $r->ram_size) {
                    $ram_count = ProductSerial::where('ram_serial',$r->cur_barcode)->count();
                    if($ram_count > 0) {
                        return response()->json(['status'=>'error', 'error_type'=>'Already Exist!', 'message'=>'This barcode is already scaned before. Please try new one.']);
                    } else {
                        if($r->scanned_skd_type) {
                            $scanned_skd_type_arr = explode (",", $r->scanned_skd_type);
                            if(in_array('ram', $scanned_skd_type_arr)){
                                return response()->json(['status'=>'error', 'error_type'=>'Error!', 'message'=>'Already scanned RAM SKD barcode!']);
                            } else {
                                return response()->json(['status'=>'success', 'skd_type'=>'ram']);
                            }
                        } else {
                            return response()->json(['status'=>'success', 'skd_type'=>'ram']);
                        }
                    }
                } else if ($r->cur_barcode[0] == 'S' && $r->cur_barcode[1] == $r->ssd_size) {
                    $ssd_count = ProductSerial::where('ssd_serial',$r->cur_barcode)->count();
                    if($ssd_count > 0) {
                        return response()->json(['status'=>'error', 'error_type'=>'Already Exist!', 'message'=>'This barcode is already scaned before. Please try new one.']);
                    } else {
                        if($r->scanned_skd_type) {
                            $scanned_skd_type_arr = explode (",", $r->scanned_skd_type);
                            if(in_array('ssd', $scanned_skd_type_arr)){
                                return response()->json(['status'=>'error', 'error_type'=>'Error!', 'message'=>'Already scanned SSD SKD barcode!']);
                            } else {
                                return response()->json(['status'=>'success', 'skd_type'=>'ssd']);
                            }
                        } else {
                            return response()->json(['status'=>'success', 'skd_type'=>'ssd']);
                        }
                    }
                } else if ($r->cur_barcode[0] == 'B' && $r->cur_barcode[1] == $r->bb_processor) {
                    $bb_count = ProductSerial::where('bb_serial',$r->cur_barcode)->count();
                    if($bb_count > 0) {
                        return response()->json(['status'=>'error', 'error_type'=>'Already Exist!', 'message'=>'This barcode is already scaned before. Please try new one.']);
                    } else {
                        if($r->scanned_skd_type) {
                            $scanned_skd_type_arr = explode (",", $r->scanned_skd_type);
                            if(in_array('bb', $scanned_skd_type_arr)){
                                return response()->json(['status'=>'error', 'error_type'=>'Error!', 'message'=>'Already scanned Barebone SKD barcode!']);
                            } else {
                                return response()->json(['status'=>'success', 'skd_type'=>'bb']);
                            }
                        } else {
                            return response()->json(['status'=>'success', 'skd_type'=>'bb']);
                        }
                    }
                } else {
                    return response()->json(['status'=>'error', 'error_type'=>'Invalid Barcode!', 'message'=>'This barcode is not valid. Please scan a valid barcode.']);
                }
            }
        } else {
            return response()->json(['status'=>'error', 'error_type'=>'Invalid Barcode!', 'message'=>'This barcode is not valid. Please scan a valid barcode.']);
        }
    }


    // Requisition assemble parts submit
    public function assemble_parts_submit(Request $r) {
        $scanned_skd_barcodes_arr = explode (",", $r->assemble_skd_barcodes);
        $ram_serial = '';
        $ssd_serial = '';
        $bb_serial = '';
        foreach($scanned_skd_barcodes_arr as $code) {
            if($code[0] == 'R') {
                $ram_serial = $code;
            } else if($code[0] == 'S') {
                $ssd_serial = $code;
            } else if($code[0] == 'B') {
                $bb_serial = $code;
            } 
        }

        $now = new \DateTime('now', new \DateTimeZone('UTC'));
        $num = dechex((int)$now->format('Uu'));
        $serial = strtoupper(substr($num, -9));
        
        $alldata = ProductSerial::where('id', $r->prod_serial_table_id)->first();
        if($alldata) {
            $alldata->prod_serial = $serial;
            $alldata->ram_serial = $ram_serial;
            $alldata->ssd_serial = $ssd_serial;
            $alldata->bb_serial = $bb_serial;
            $alldata->building_progress_status = 1;
            $alldata->save();
            return response()->json(['status'=>'success', 'message'=>'Successfully parts assemble completed!']);
        } else {
            return response()->json(['status'=>'error', 'error_type'=>'Error!', 'message'=>'Something went wrong. Please try again later!']);
        }    
    }


    //D-Cover lasering complete
    public function lasering_complete(Request $r) {
        if($r->prod_sl_table_id) {
            ProductSerial::where('id', $r->prod_sl_table_id)->update(array('building_progress_status' => 2));
        }
        return redirect()->back();
    }

    //checking valid barcode for barebone when assemble Barebone & D Cover
    public function check_valid_barcode_barebone_assemble_dcover(Request $r) {
        $data =  ProductSerial::where('prod_serial', $r->prod_sl)->first();
        if($r->cur_code == $data->prod_serial) {
            return response()->json(['status'=>'success']);
        } else if($r->cur_code == $data->ram_serial) {
            return response()->json(['status'=>'success']);
        } else if($r->cur_code == $data->ssd_serial) {
            return response()->json(['status'=>'success']);
        } else if($r->cur_code == $data->bb_serial) {
            return response()->json(['status'=>'success']);
        } else {
            return response()->json(['status'=>'error', 'message'=>'Please scan a valid barcode']);
        }
    }

    //confirm C & D Cover assemble
    public function confirm_barebone_dcover_assemble(Request $r) {
        if($r->prod_sl) {
            ProductSerial::where('prod_serial', $r->prod_sl)->update(array('building_progress_status' => 3));
            return response()->json(['status'=>'success']);
        }
    }


    //requisition building process each product finalize complete
    public function requisition_building_finalize_product_complete(Request $r) {
        if($r->prod_sl) {
            ProductSerial::where('prod_serial', $r->prod_sl)->update(array('building_progress_status' => 4));
            $html = '<div class="subscribe_success_circle" style="margin-top: 0px"><img style="padding-top: 12px;padding-left: 11px;" src="'.asset('success_icon.png').'" alt="success" /></div><h3 class="text-center mb-5 lh-lg text-success">Download the barcode and put it on the box.</h3><div class="mx-auto text-center">
            <a class="me-1" href="'.route('serial.label',''.$r->prod_sl).'" download><button type="button" class="btn btn-secondary mt-5 me-5"><i class=" fa-solid fs-3 text-success fa-circle-down"></i> Download the Box Label</button></a>
            <button type="button" class="btn btn-secondary mt-5 me-5" onclick="window.location.reload();">Close</button></div>';

            return response()->json(['status'=>'success', 'html'=>$html]);                 
                    
        }
    }
}



