<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserPermissionAuth
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
        $baseURL = url('');
        $fullURL = url()->current();
        $urlArr = explode($baseURL."/", $fullURL);
        
        if($urlArr[1] == 'admin/authorization/permission'){
            $has_permission = User::hasPermission(["add_user_permission","edit_user_permission","remove_user_permission"]);
            if($has_permission){

            } else {
                return redirect(url()->previous());
            }
        } else if($urlArr[1] == 'admin/skd/barcode/generator'){
            $has_permission = User::hasPermission(["skd_barcode_generate","entry_skd"]);
            if($has_permission){

            } else {
                return redirect(url()->previous());
            }
        } else if($urlArr[1] == 'admin/skd/barcode/processing' || $urlArr[1] == 'admin/skd/barcode/pdf'){
            $has_permission = User::hasPermission(["skd_barcode_generate"]);
            if($has_permission){

            } else {
                return redirect(url()->previous());
            }
        } else if($urlArr[1] == 'admin/skd/queue/list' || $urlArr[1] == 'admin/skd/reject'){
            $has_permission = User::hasPermission(["view_ens_request","confirm_reject_ens_request"]);
            if($has_permission){

            } else {
                return redirect(url()->previous());
            }
        } else if($urlArr[1] == 'admin/skd/inventory'){
            $has_permission = User::hasPermission(["view_skd_inventory_history"]);
            if($has_permission){

            } else {
                return redirect(url()->previous());
            } 
        } else if($urlArr[1] == 'admin/attributes/delete_attributes_details'){
            $has_permission = User::hasPermission(["view_attribute","edit_attribute"]);
            if($has_permission){
                
            } else {
                return redirect(url()->previous());
            }
        } else if($urlArr[1] == 'admin/attributes/update_attributes_details'){
            $has_permission = User::hasPermission(["view_attribute","edit_attribute"]);
            if($has_permission){
                
            } else {
                return redirect(url()->previous());
            }
        } else if($urlArr[1] == 'admin/attributes/get_attributes_details'){
            $has_permission = User::hasPermission(["view_attribute","edit_attribute"]);
            if($has_permission){
                
            } else {
                return redirect(url()->previous());
            }
        } else if($urlArr[1] == 'admin/attributes/store'){
            $has_permission = User::hasPermission(["view_attribute","add_attribute"]);
            if($has_permission){
                
            } else {
                return redirect(url()->previous());
            }
        } else if($urlArr[1] == 'admin/attributes'){
            $has_permission = User::hasPermission(["view_attribute","add_attribute","edit_attribute","delete_attribute"]);
            if($has_permission){

            } else {
                return redirect(url()->previous());
            }
        } else if($urlArr[1] == 'admin/coupon'){
            $has_permission = User::hasPermission(["view_coupon","add_coupon","edit_coupon","delete_coupon"]);
            if($has_permission){

            } else {
                return redirect(url()->previous());
            }
        } else if($urlArr[1] == 'admin/customer'){
            $has_permission = User::hasPermission(["view_customer"]);
            if($has_permission){

            } else {
                return redirect(url()->previous());
            }
        } else if($urlArr[1] == 'admin/order/listing'){
            $has_permission = User::hasPermission(["view_sales_order","capture_cancel_sales_order"]);
            if($has_permission){

            } else {
                return redirect(url()->previous());
            }
        } else if($urlArr[1] == 'admin/order/invoice'){
            $has_permission = User::hasPermission(["view_sales_invoice","shipment_cancel_sales_invoice","complete_sales_invoice","view_pdf_invoice"]);
            if($has_permission){

            } else {
                return redirect(url()->previous());
            }
        } else if($urlArr[1] == 'admin/order/refund/request'){
            $has_permission = User::hasPermission(["view_refund_order","complete_refund_order"]);
            if($has_permission){

            } else {
                return redirect(url()->previous());
            }
        } else if($urlArr[1] == 'admin/support/registered/product/list'){
            $has_permission = User::hasPermission(["view_registered_product_list"]);
            if($has_permission){

            } else {
                return redirect(url()->previous());
            }
        } else if($urlArr[1] == 'admin/support/ticket/lists'){
            $has_permission = User::hasPermission(["view_support_ticket","response_support_ticket"]);
            if($has_permission){

            } else {
                return redirect(url()->previous());
            }
        } else if($urlArr[1] == 'admin/misc/post/sell/serial/list'){
            $has_permission = User::hasPermission(["view_post_sell_serial_no"]);
            if($has_permission){

            } else {
                return redirect(url()->previous());
            }
        } else if($urlArr[1] == 'admin/misc/system/history'){
            $has_permission = User::hasPermission(["view_system_history"]);
            if($has_permission){

            } else {
                return redirect(url()->previous());
            }
        } else if($urlArr[1] == 'admin/authorization/permission'){
            $has_permission = User::hasPermission(["add_user_permission","edit_user_permission","remove_user_permission"]);
            if($has_permission){

            } else {
                return redirect(url()->previous());
            }
        }
        else{
            return redirect(url()->previous());
        }
        return $next($request);
    }
}