<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductRegisterController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\wishlistController;
use App\Http\Controllers\couponController;
use App\Http\Controllers\ProductAttributesController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Admin\MillerController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\TransportController;
use App\Http\Controllers\Admin\districtController;
use App\Http\Controllers\Admin\upazilaController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\PurchaseOrderController;
use App\Http\Controllers\ProductSrialNumberController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\FinishedProductController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\SystemHistoryController;
use App\Exports\UserExpport;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', function () {
    if(Auth::check()) {
        return redirect(url('/admin'));
    }
    return view("auth.login");
});

 Route::get('/', function () {
        
        return view("frontend.index");
    })->name('index');


Route::get('/sigma-15', function () {
    
    return view("frontend.sigma");
})->name('sigma');


Route::get('sigma-15/tech-specs', function () {
    
    return view("frontend.tech_spec");
})->name('tech_spec');
// nrs minipc
    Route::group(['prefix' => 'lania'], function() {
        Route::get('/', [HomeController::class, 'minipc'])->name('minipc');
        Route::get('/tech-specs', [HomeController::class, 'minipc_tech_spec'])->name('minipc_tech_spec');
        
    });

// end nrs

Route::get('/driver', function () {
    
    return view("frontend.driver");
})->name('driver');


Route::get('/signup', function () {
    if(Auth::user()){
        return redirect('/');
    } else{
        return view("frontend.signup_new");
    }
})->name('signup');

Route::any('signin',[HomeController::class,'view_signin'])->name('signin');
// Route::get('/signin', function () {
//     if(Auth::user()){
//         return redirect('/');
//     } else{
//         // Redirect::setIntendedUrl(url()->previous());
//         return view("frontend.signin_new"); 
//     }
//     // if(session()->has('USER_ID')){
//     //     return redirect('/');
//     // } else {
//     //     return view("frontend.signin_new");
//     // }
// })->name('signin');

Route::get('/signin_user_redirect', function () {
    if(session()->has('DASHBOARD_REDIRECT')){
        session()->forget('DASHBOARD_REDIRECT');
        return redirect('dashboard');
    } else{
        return redirect()->intended();
    }
    
    
})->name('signin_user_redirect');

Route::get('/signin_admin_redirect', function () {    
    if(session()->has('DASHBOARD_REDIRECT')){
        session()->forget('DASHBOARD_REDIRECT');
        return redirect('admin/dashboard');
    } else{
        return redirect()->intended();
    }
})->name('signin_admin_redirect');

Route::get('/warranty', function () {
    return view("frontend.warranty");
})->name('warranty');

Route::get('/tour', function () {
    return view("frontend.tour");
})->name('tour');

Route::get('/tour/result', function () {
    return view("frontend.tour_result");
})->name('tour_result');


Route::get('/product/verification', function () {
    return view("frontend.product_registration_verification");
})->name('product.registration.verification');


// Route::get('/product', function () {
//     return view("frontend.product");
// })->name('product');


// login form submit route
Route::post('login_process',[HomeController::class,'login_process']);

Route::get('logout', function () {
    if(session()->has('USER_LOGIN')){
        session()->forget('USER_LOGIN');
        session()->forget('USER_ID');
        session()->forget('USER_NAME');
    }
    if(session()->has('ADMIN_LOGIN')){
        session()->forget('ADMIN_LOGIN');
        session()->forget('USER_ID');
        session()->forget('USER_NAME');
    }
    if(session()->has('ORDER_ID')){
        session()->forget('ORDER_ID');
    }
    if(session()->has('ORDER_NEW_ID')){
        session()->forget('ORDER_NEW_ID');
    }
    if(session()->has('GUEST_ID')){
        session()->forget('GUEST_ID');
        session()->forget('GUEST_EMAIL');
        session()->forget('GUEST_LOGIN');
    }
    Auth::logout();
    // Session::flush();
    return redirect('/');
});


Route::get('/checkout-login', function () {
    return view("frontend.checkout_login");
})->name('checkout-login');

Route::get('/checkout_registration', function () {
    return view("frontend.checkout_regi");
})->name('checkout_registration');


Route::get('/checkout-process', function () {
    return view("frontend.checkout_process");
})->name('checkout-process');

Route::get('/contact', function () {
    return view("frontend.contact");
})->name('contact');

// Route::get('/caliph', function () {
//      return view("frontend.caliph");
//     return view("frontend.minipc.minipc");
// })->name('caliph');

Route::get('/qbits/business', function () {
    return view("frontend.qbits_business");
})->name('qbits_business');

Route::get('/qbits/education', function () {
    return view("frontend.qbits_education");
})->name('qbits_education');

Route::get('/about', function () {
    return view("frontend.about");
})->name('about');

Route::get('/ordering/payment/policy', function () {
    return view("frontend.ordering_payment_policy");
})->name('ordering_payment_policy');

Route::get('/checkout/print', function () {
    return view("frontend.checkout_print");
})->name('checkout_print');

Route::get('/privacy', function () {
    return view("frontend.privacy");
})->name('privacy');

Route::get('/term', function () {
    return view("frontend.term");
})->name('term');

Route::get('/shipping', function () {
    return view("frontend.shipping");
})->name('shipping');

Route::get('/faq', function () {
    return view("frontend.faq");
})->name('faq');

Route::get('/return/policy', function () {
    return view("frontend.return_policy");
})->name('return_policy');

Route::get('/accessries/category', function () {
    return view("frontend.accessries_category");
})->name('accessries_category');

// Route::get('/caliph/category', function () {
//     return view("frontend.caliph_category");
// })->name('caliph_category');

// Route::get('/caliph/tech/specss', function () {
//     return view("frontend.caliph_tech_specs");
// })->name('caliph_tech_specs');


Route::get('/abc', function () {
    return "Hello";
})->name('abc');

Route::get('/test_order', [CheckoutController::class, 'order_test']);


// Route::get('/product', function () {
//     return view("frontend.product");
// })->name('product');

//--Private Route::[Najmul Ovi]--//
Route::group(['middleware'=>'private_auth'],function(){
    

    Route::post('add/serial', [ProductSrialNumberController::class, 'addserial']);
    Route::post('order/shipment/process', [ProductSrialNumberController::class, 'shipment_process']);
    Route::post('cancel/order', [HomeController::class, 'order_canceled']);
    Route::post('refund/confirm', [HomeController::class, 'refund_confirm']);
    Route::post('refund/request/user', [HomeController::class, 'user_refund_request']);

    
    

    //My Product List 
    Route::group(['prefix' => 'my'], function() {
        Route::get('/Product/list', [ProductRegisterController::class, 'view'])->name('view');
        // Route::post('/Product/store', [ProductRegisterController::class, 'Productstore'])->name('product.Product.store');
        // Route::get('/edit', [HomeController::class, 'orderEdit'])->name('order.edit');   `
        // Route::get('/details/{id}', [HomeController::class, 'orderDetails'])->name('order.details');
        // Route::post('/update/{id}', [HomeController::class, 'update'])->name('order.update');
        
    });

    Route::post('check_product_serial', [ProductSrialNumberController::class, 'check_product_serial']);
});

Route::group(['middleware'=>'invoice_auth'],function(){
    Route::get('/print/invoice', [CheckoutController::class, 'print_invoice'])->name('print_invoice');
    Route::get('/close/invoice', [CheckoutController::class, 'close_invoice'])->name('close_invoice');
    Route::get('/invoice/{id}', [HomeController::class, 'generateUserInvoice'])->name('invoice');
});


// Route::post('/user-profile-update/{id}', [HomeController::class, 'updateProfile'])->name('user-profile-update');
Route::group(['prefix' => 'category'], function() {
    Route::get('/sigma-15', [HomeController::class, 'buy'])->name('buy');
    Route::get('/accessories', [HomeController::class, 'accessoriesbuy'])->name('accessoriesbuy.buy');
});

Route::get('/product/details/{slug}', [HomeController::class, 'product_details'])->name('product_details');
Route::get('/lania/details/{slug}', [HomeController::class, 'product_details_minipc'])->name('product_details_minipc');
Route::get('/accessories/details/{slug}', [HomeController::class, 'product_details1'])->name('product_details1');



// Product Register 
Route::group(['prefix' => 'register'], function() {

// Route::get('/edit', [HomeController::class, 'orderEdit'])->name('order.edit');
// Route::get('/details/{id}', [HomeController::class, 'orderDetails'])->name('order.details');
// Route::post('/update/{id}', [HomeController::class, 'update'])->name('order.update');

});
Route::post('product-registration-submit', [ProductRegisterController::class, 'product_reg_submit']);
Route::post('product_reg_code_submit', [ProductRegisterController::class, 'code_submit']);

Route::post('prod_reg_submit',[ProductRegisterController::class,'Productstore']);
Route::get('/product/registration', [ProductRegisterController::class, 'product_registration_view'])->name('product_registration');
// Route::get('/product/registration', function () {
//     return view("frontend.product_registration");
// })->name('product_registration');




//end nrshagor

//start najmul ovi
Route::post('add_to_cart',[CartsController::class,'store']);
Route::post('add_to_wishlist',[wishlistController::class,'store']);
Route::post('quantity_updated_wishlist',[wishlistController::class,'quantity_updated_wishlist']);
Route::post('remove_from_wishlist',[wishlistController::class,'remove_from_wishlist']);
Route::post('convert_to_cart',[wishlistController::class,'convert_to_cart']);
Route::post('signup_submit',[HomeController::class,'reg_submit']);
Route::post('guest_submit',[HomeController::class,'guest_submit']);
Route::post('code_submit',[HomeController::class,'code_submit']);
Route::post('login_submit',[HomeController::class,'login_submit']);
Route::post('forget_email_submit',[HomeController::class,'forget_email_submit']);
Route::post('forget_pass_code_submit',[HomeController::class,'forget_pass_code_submit']);
Route::post('forget_password_submit',[HomeController::class,'forget_password_submit']);
Route::post('add_subscribe_email',[NewsletterController::class,'store']);
Route::post('send_free_coupon',[couponController::class,'send_free_coupon']);
//lania pre order process route
Route::post('lania-pre-order-process',[NewsletterController::class,'lania_pre_order_process']);
Route::view('/demo','frontend.demo');
Route::view('/demo3','frontend.demo3');

Route::post('test_check',[CartsController::class,'test_check'])->name('test_check');

Route::group(['prefix' => 'carts'], function() {
    Route::get('/', [CartsController::class, 'index'])->name('carts');
    Route::post('/store', [CartsController::class, 'store'])->name('carts.store');
    Route::post('/update', [CartsController::class, 'update'])->name('carts.update');
    Route::post('/update_product', [CartsController::class, 'update_product'])->name('carts.update_product');
    Route::delete('/delete', [CartsController::class, 'destroy'])->name('carts.delete');
});

Route::group(['prefix' => 'wishlists'], function() {
    Route::get('/', [wishlistController::class, 'index'])->name('wishlists');
    Route::post('/store', [wishlistController::class, 'store'])->name('wishlists.store');
    Route::delete('/delete', [wishlistController::class, 'destroy'])->name('wishlists.delete');
});


Route::group(['prefix' => 'checkout'], function() {
    Route::get('/', [CheckoutController::class, 'index'])->name('checkout');
    // Route::get('/processing', [CheckoutController::class, 'checkout_processing'])->name('checkout_processing');
    // Route::get('/processing/{value?}', [CheckoutController::class, 'index'])->name('checkout_processing');
    Route::get('/processing', [CheckoutController::class, 'index'])->name('checkout_processing');
    Route::post('/done', [CheckoutController::class, 'checkout_done'])->name('checkout_done');
    Route::get('/order_confirmed', [CheckoutController::class, 'order_confirmed'])->name('order_confirmed');
});

Route::post('apply_coupon_code',[CheckoutController::class,'apply_coupon_code']);
Route::post('/order_placed', [CheckoutController::class, 'order_placed']);
Route::get('/checkout_check_qty', [CheckoutController::class, 'checkout_check_qty'])->name('checkout_check_qty');


// Route::view('checkout_done', 'frontend/order_invoice');

// User Routes
Route::group(['middleware'=>'user_auth'],function(){
    Route::group(['prefix' => 'dashboard'], function() {
        Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
        Route::get('/user/profile', [HomeController::class, 'profile'])->name('user-profile');
        Route::get('/user/profile/edit', [HomeController::class, 'profileEdit'])->name('user-profile-edit');
    });

    Route::group(['prefix' => 'order'], function() {
        Route::get('/listing', [HomeController::class, 'listing'])->name('order.listing');
        Route::get('/invoice_pdf/{id}', [HomeController::class, 'invoice_pdf'])->name('invoice.pdf');
        Route::get('/refund/request', [HomeController::class, 'refund_request'])->name('refund.request');
        Route::get('/add', [HomeController::class, 'orderAdd'])->name('order.add');
        Route::get('/edit', [HomeController::class, 'orderEdit'])->name('order.edit');
        Route::get('/details/{id}', [HomeController::class, 'orderDetails'])->name('order.details');
        Route::post('/update/{id}', [HomeController::class, 'update'])->name('order.update');
        // Route::post('/add/serial/{id}', [ProductSrialNumberController::class, 'addserial'])->name('add.serial');
        
    });


    // support center
    Route::group(['prefix' => 'support'], function() {
        Route::get('/center', [HomeController::class, 'overview'])->name('support.center');
        Route::get('/basicEmail', [MailController::class, 'send_basic_email'])->name('email');
        Route::post('/send', [MailController::class, 'send'])->name('send.email');
        Route::get('/send/success', [MailController::class, 'sendSuccess'])->name('send.email.success');
        Route::get('/error', [HomeController::class, 'orderNotFound'])->name('order.not.found');
        Route::get('/ticket/create', [HomeController::class, 'ticketCreate'])->name('support.ticket.create');
        Route::post('/ticket/store', [HomeController::class, 'ticketStore'])->name('support.ticket.store');
        Route::get('/ticket/lists', [HomeController::class, 'ticketList'])->name('support.ticket.list');
        Route::get('/ticket/view/', [HomeController::class, 'ticketView1'])->name('support.ticket.view');
        Route::get('/ticket/info/{id}', [HomeController::class, 'ticketView'])->name('support.ticket.userInfo');
        Route::get('/ticket/{id}', [HomeController::class, 'ticketEdit'])->name('support.ticket.edit');
        Route::post('/ticket/update/{id}', [HomeController::class, 'ticketUpdate'])->name('support.ticket.update');
        Route::post('/ticket/status/Update/{id}', [HomeController::class, 'statusUpdate'])->name('support.ticket.status');
        Route::get('/faq', [HomeController::class, 'faq'])->name('support.faq');
        Route::get('/warranty', [HomeController::class, 'licenses'])->name('support.licenses');
        Route::get('/contact', [HomeController::class, 'contact'])->name('support.contact');
        Route::get('/registerd/product/list', [HomeController::class, 'registerdProductList'])->name('registerd.product.list');
    });
});

Route::post('/get_address_data', [HomeController::class, 'get_address_data']);

// Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin Routes
Route::group(['middleware'=>'admin_auth'],function(){

    Route::group(['prefix'=>'admin'],function(){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::group(['middleware'=>'user_permission_auth'],function(){
            Route::get('/customer', [DashboardController::class, 'customerList'])->name('admin.customer');
        });
        Route::get('/customer/view/{id}', [DashboardController::class, 'customerView'])->name('admin.customer.view');
        Route::get('/delete/{id}',[DashboardController::class, 'delete'])->name('customer.delete');
        Route::resource('product','App\Http\Controllers\Admin\ProductController');
        Route::resource('customers','App\Http\Controllers\Admin\DashboardController');    
        Route::get('/profile', [DashboardController::class, 'admin_profile'])->name('admin.profile');
        Route::get('/profile/edit', [DashboardController::class, 'admin_profile_edit'])->name('admin.profile.edit');
        Route::post('/profile/update', [DashboardController::class, 'admin_profile_update'])->name('admin.profile.update');
        Route::post('/password/update', [DashboardController::class, 'admin_password_update']);
        
    });

    // Inventory nrs
    Route::group(['prefix' => 'admin/skd'], function() {
        Route::group(['middleware'=>'user_permission_auth'],function(){
            Route::get('/barcode/generator', [InventoryController::class, 'barcode_Generator'])->name('barcode.generator');
            Route::post('/barcode/processing', [InventoryController::class, 'barcode_processing'])->name('barcode.processing');
            Route::get('/barcode/pdf', [InventoryController::class, 'barcode_pdf'])->name('barcode.pdf');
            Route::get('/queue/list', [InventoryController::class, 'queue_list'])->name('queue.list');
            Route::get('/inventory', [InventoryController::class, 'skdinventory'])->name('skd.inventory');
            Route::post('/reject', [InventoryController::class, 'skdreject'])->name('skd.reject');
        });
        Route::post('/ens/verify/submit', [InventoryController::class, 'ens_verify_submit']);
        Route::post('/ens/confirm', [InventoryController::class, 'ens_confirm'])->name('ens.confirm');
        
        Route::get('/completed/list', [InventoryController::class, 'completed_list'])->name('completed.list');
        Route::get('/add', [InventoryController::class, 'inventoryAdd'])->name('inventory.add');
        Route::get('/edit', [InventoryController::class, 'inventoryEdit'])->name('inventory.edit');
        Route::get('/details/{id}', [InventoryController::class, 'inventoryDetails'])->name('inventory.details');
        Route::post('/update/{id}', [InventoryController::class, 'update'])->name('inventory.update');
        
        Route::post('/get-ens-details-by-id', [InventoryController::class, 'get_ens_details_by_id']);
        Route::post('/get-inventory-details', [InventoryController::class, 'get_inventory_details']);
        Route::post('/get-ens-history', [InventoryController::class, 'get_ens_history']);
        Route::post('/get-skd-history-by-date', [InventoryController::class, 'get_skd_history_by_date']);
        Route::post('/get-verified-ens-skd-serials-list', [InventoryController::class, 'get_verified_ens_skd_serials_list']);
        Route::get('/reject/list', [InventoryController::class, 'reject_list'])->name('reject.list');       
        Route::post('/get-skd-serial-on-modal-by-ens-number', [InventoryController::class, 'get_skd_serial_on_modal_by_ens_number']);
        Route::get('/get-history-date-for-download', [InventoryController::class, 'get_history_date_for_download'])->name('history.download');
        // Route::post('/add/serial/{id}', [ProductSrialNumberController::class, 'addserial'])->name('add.serial');

        
    });
    // finished product nrs
    Route::group(['prefix' => 'admin/finished/product'], function() { 
            Route::get('/inventory', [FinishedProductController::class, 'inventory_view'])->name('inventory.view');
            Route::get('/requisition/creation', [FinishedProductController::class, 'requisition_creation'])->name('requisition.creation');
            Route::post('/requisition/get/product_info',[FinishedProductController::class, 'get_product_nfo'])->name('get-product-info');
            Route::get('/requisition/creation/view', [FinishedProductController::class, 'requisition_view'])->name('requisition.view');
            Route::post('/requisition/store', [FinishedProductController::class, 'requisition_store'])->name('requisition.store');
            Route::post('/get-rq-details-by-id', [FinishedProductController::class, 'get_rq_details_by_id']);
            Route::post('/get-stockin-queue-details-by-id', [FinishedProductController::class, 'get_stockin_queue_details_by_id']);
            Route::get('/requisition/creation/processing/{id}', [FinishedProductController::class, 'requisition_processing'])->name('requisition.processing');
            Route::get('/requisition/building/queue', [FinishedProductController::class, 'building_queue_list'])->name('building.queue.list');
            Route::get('/requisition/building/details/{id}', [FinishedProductController::class, 'building_details'])->name('building.details');
            //Building Details serial generate start
            Route::post('/serial/generate', [FinishedProductController::class, 'serial_generate'])->name('serial.generate');
            Route::get('/serial/download/{prodSl}', [FinishedProductController::class, 'serial_download'])->name('serial.download');
            Route::get('/serial/lasering/{prodSl?}/{prodId?}', [FinishedProductController::class, 'serial_lasering'])->name('serial.lasering');
            Route::get('/serial/label/{prodSl}/{prodId?}', [FinishedProductController::class, 'serial_label'])->name('serial.label');
            Route::get('/serial/c-cover/{prodSl}', [FinishedProductController::class, 'serial_c_cover'])->name('serial.c_cover');
            //Building Details serial generate end
            Route::post('/lasering/complete', [FinishedProductController::class, 'lasering_complete'])->name('lasering.complete');
            Route::any('/requisition/building/complete/{rqId}', [FinishedProductController::class, 'rq_building_complete'])->name('requisition.building.complete');
            Route::get('/requisition/stockin/queue', [FinishedProductController::class, 'stocking_queue_list'])->name('stocking.queue.list');
            Route::post('/rq/creation/reject', [FinishedProductController::class, 'rq_creation_reject'])->name('rq.creation.reject');
            Route::post('/rq/creation/confirm', [FinishedProductController::class, 'rq_creation_confirm']);
            Route::post('/check/valid/barcode/for/requisition/creation', [FinishedProductController::class, 'check_valid_barcode_for_requisition_creation']);
            Route::post('/rq/stockin/confirm', [FinishedProductController::class, 'rq_stockin_confirm']);
    });
    Route::post('submit-rq-creation-request-verification', [FinishedProductController::class, 'submit_rq_creation_request_verification']);
    Route::post('finished-product-requisition-form-barcode-check', [FinishedProductController::class, 'finished_product_requisition_form_barcode_check']);
    Route::post('assemble-parts-skd-barcode-check', [FinishedProductController::class, 'assemble_parts_skd_barcode_check']);
    Route::post('assemble-parts-submit', [FinishedProductController::class, 'assemble_parts_submit']);
    Route::post('check-valid-barcode-barebone-assemble-dcover', [FinishedProductController::class, 'check_valid_barcode_barebone_assemble_dcover']);
    Route::post('confirm-barebone-dcover-assemble', [FinishedProductController::class, 'confirm_barebone_dcover_assemble']);
    Route::post('requisition-building-finalize-product-complete', [FinishedProductController::class, 'requisition_building_finalize_product_complete']);
    Route::post('submit-product-stockin-verification', [FinishedProductController::class, 'submit_product_stockin_verification']);
    


    Route::group(['middleware'=>'user_permission_auth'],function(){
        // Authorization nrs
        Route::group(['prefix' => 'admin/authorization'], function() {
            Route::get('/permission', [AuthorizationController::class, 'permission'])->name('permission');
        });

        // MISC 
        Route::group(['prefix' => 'admin/misc'], function() {
            Route::get('/post/sell/serial/list', [ProductSrialNumberController::class, 'serialList'])->name('post.sell.serial.list');
            Route::get('/system/history', [SystemHistoryController::class, 'view_system_history'])->name('system.history');
        });
        

        // Attributes
        Route::group(['prefix' => 'admin/attributes'], function() {
            Route::get('/', [ProductAttributesController::class, 'attributes_view'])->name('attributes.view');
            Route::post('/store', [ProductAttributesController::class, 'attributes_store'])->name('attributes.store');
            Route::post('/get_attributes_details', [ProductAttributesController::class, 'get_attributes_details'])->name('attributes.get_attributes_details');
            Route::post('/update_attributes_details', [ProductAttributesController::class, 'update_attributes_details'])->name('attributes.update_attributes_details');
            Route::post('/delete_attributes_details', [ProductAttributesController::class, 'delete_attributes_details'])->name('attributes.delete_attributes_details');
        
        }); 

    });
    Route::post('admin/misc/system-history-get', [SystemHistoryController::class, 'view_system_history_get']);

    Route::group(['prefix' => '/admin/coupon'], function() {
        Route::group(['middleware'=>'user_permission_auth'],function(){
            Route::get('/', [couponController::class, 'coupon_view'])->name('coupon.view');
        });
        Route::post('/store', [couponController::class, 'coupon_store'])->name('coupon.store');
        Route::post('/get_coupon_details', [couponController::class, 'get_coupon_details'])->name('coupon.get_coupon_details');
        Route::post('/update_coupon_details', [couponController::class, 'update_coupon_details'])->name('coupon.update_coupon_details');
        Route::post('/delete_coupon_details', [couponController::class, 'delete_coupon_details'])->name('coupon.delete_coupon_details');
    
    });

    // Sales nrs
    Route::group(['prefix' => 'admin/order'], function() {

        Route::group(['middleware'=>'user_permission_auth'],function(){
            Route::get('/listing', [HomeController::class, 'listing'])->name('admin.order.listing');
            Route::get('/invoice', [HomeController::class, 'invoice_listing'])->name('admin.invoice.listing');
            Route::get('/refund/request', [HomeController::class, 'refund_request'])->name('admin.refund.request'); 
        });
        Route::get('/invoice_pdf/{id}', [HomeController::class, 'invoice_pdf'])->name('admin.invoice.pdf');
        Route::get('/details/{id}', [HomeController::class, 'orderDetails'])->name('admin.order.details');

        Route::get('/add', [HomeController::class, 'orderAdd'])->name('admin.order.add');
        Route::get('/edit', [HomeController::class, 'orderEdit'])->name('admin.order.edit');

        Route::post('/update/{id}', [HomeController::class, 'update'])->name('admin.order.update');
        //warranty card download
        Route::any('/download/warranty/complete/{prodInv?}', [ProductSrialNumberController::class, 'warranty_card_download_complete'])->name('warranty.download.complete');
        Route::any('/download/warranty/{prodSl}/{prodInv?}', [ProductSrialNumberController::class, 'warranty_card_download'])->name('warranty.download');
        
    });

    // support center
    Route::group(['prefix' => 'admin/support'], function() {
        Route::get('/center', [HomeController::class, 'overview'])->name('admin.support.center');
        Route::get('/basicEmail', [MailController::class, 'send_basic_email'])->name('admin.email');
        Route::post('/send', [MailController::class, 'send'])->name('admin.send.email');
        Route::get('/send/success', [MailController::class, 'sendSuccess'])->name('admin.send.email.success');
        Route::get('/error', [HomeController::class, 'orderNotFound'])->name('admin.order.not.found');
        Route::get('/ticket/create', [HomeController::class, 'ticketCreate'])->name('admin.support.ticket.create');
        Route::post('/ticket/store', [HomeController::class, 'ticketStore'])->name('admin.support.ticket.store');

        Route::group(['middleware'=>'user_permission_auth'],function(){
            Route::get('/ticket/lists', [HomeController::class, 'ticketList'])->name('admin.support.ticket.list');
            Route::get('/registered/product/list', [HomeController::class, 'registerdProductList'])->name('admin.registered.product.list');
        });

        Route::get('/ticket/view/', [HomeController::class, 'ticketView1'])->name('admin.support.ticket.view');
        Route::get('/ticket/info/{id}', [HomeController::class, 'ticketView'])->name('admin.support.ticket.userInfo');
        Route::get('/ticket/{id}', [HomeController::class, 'ticketEdit'])->name('admin.support.ticket.edit');
        Route::post('/ticket/update/{id}', [HomeController::class, 'ticketUpdate'])->name('admin.support.ticket.update');
        Route::post('/ticket/status/Update/{id}', [HomeController::class, 'statusUpdate'])->name('admin.support.ticket.status');
        Route::get('/faq', [HomeController::class, 'faq'])->name('admin.support.faq');
        Route::get('/warranty', [HomeController::class, 'licenses'])->name('admin.support.licenses');
        Route::get('/contact', [HomeController::class, 'contact'])->name('admin.support.contact');

        
    });

    Route::post('add-skd-items',[InventoryController::class,'add_skd_items']);
    Route::post('check-valid-barcode-entry',[InventoryController::class,'check_valid_barcode_entry']);
    Route::post('/check-valid-barcode-for-verify', [InventoryController::class, 'check_valid_barcode_for_verify']);
    Route::post('/submit-skd-serial-for-verify', [InventoryController::class, 'submit_skd_serial_for_verify']);

    Route::post('remove-permission-from-scopesfield',[AuthorizationController::class,'remove_permission_from_scopesfield']);
    Route::post('add-update-new-user-permission',[AuthorizationController::class,'add_update_new_user_permission']);
    Route::post('get-user-permission',[AuthorizationController::class,'get_user_permission']);
    Route::post('check-permission-any-dependency',[AuthorizationController::class,'check_permission_any_dependency']);
    Route::post('user-remove-disable',[AuthorizationController::class,'user_remove_disable']);
    Route::post('user-enable',[AuthorizationController::class,'user_enable']);
});

Route::post('/users/login/cart', [HomeController::class, 'cart_login'])->name('cart.login.submit');
Route::post('/users/signup/cart', [HomeController::class, 'cart_regi'])->name('cart.signup.submit');
Route::post('/customer/update/profile', [HomeController::class, 'customer_update_profile'])->name('customer.profile.update');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::post('/tour/results', [HomeController::class, 'tour_data_placed'])->name('tour_data');








Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// generate Invoice

//nrshagor
//Default Controller
//default 
Route::get('/back', [HomeController::class, 'back'])->name('back');
Route::post('/get/product',[HomeController::class, 'getProduct'])->name('get-products');
Route::post('/get/orderno',[HomeController::class, 'getOrderno'])->name('get-orderno');
// get model and processor
Route::post('/get/model',[HomeController::class, 'getmodel'])->name('get-model');
Route::post('/get/category',[HomeController::class, 'getcategory'])->name('get-category');
Route::post('/get/product/processor',[HomeController::class, 'getProductprocessor'])->name('get-product-processor');
Route::post('/get/processor',[HomeController::class, 'getprocessor'])->name('get-processor');


// nrshagor