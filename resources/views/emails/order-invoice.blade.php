<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title></title>
<style>
    .invoice-content-section {
        background-color: #e1e1e1;
        font-family: "Roboto", sans-serif;
    }
    .invoice-area {
        max-width: 986px;
        background-color: #ffffff;
        margin: 0 auto;
        overflow: auto;
    }
    
</style>
</head>
<body>

<?php
    $guestId = '';
    if(session()->has('GUEST_ID')){
        $guestId = session()->get('GUEST_ID');
        $guestUser = App\Models\User::where('id',$guestId)->where('user_type_status','non-reg')->get();
    }
?>
<div class="invoice-content-section" id="invoice-content-section">
    <div class="invoice-area" id="invoice-print-area" >
        <div class="container d-flex justify-content-center align-items-center" style="width: 986px; height: 60px;background: #2699FB !important; color: #F5F5F7 !important; font-weight: bold; font-size: 16px; line-height: 21px;">
            <span>Thank you for your order</span>
        </div>
        <div style="max-width: 701px;border-bottom: 2px solid #ddd;margin: 40px auto 0;padding-bottom: 20px;">
            <div class="d-flex justify-content-between">
                <div>
                    <!--begin::Logo-->
                    <img src="{{ asset('frontend/assets/logo/qbits_logo_black.png')}}" style="width: 80px;opacity: 0.8" alt="qbits Logo" class="img-responsive">
                    <!--end::Logo-->
                </div>
                <div style="color: #272727;font-size: 18px; font-weight: 400;">
                    Date: 
                    <?php 
                        $d =  $orders_new->created_at;
                        echo date('M d, Y', strtotime($d));
                    ?>
                </div>
            </div>
        </div>
        <div style="width: 701px; margin: 20px auto;">
            <?php if($guestId){?>
            <p style="color: #272727;font-size: 18px; font-weight: 400;">Hi {{ $guestUser[0]->name}},</p>
            <?php } else {?>
            <p style="color: #272727;font-size: 18px; font-weight: 400;">Hi {{ auth()->user()->name}},</p>
            <?php }?>
            <?php $order_id = session()->get('ORDER_ID');?>
            <p style="color: #272727;font-size: 18px; font-weight: 400;margin-bottom: 40px;">Just to let you know, we've received your order #{{$order_id}},and it is now being processed:</p>
            <p style="color: #272727;font-size: 18px; font-weight: 400;margin-bottom: 40px;">Pay with cash upon delivery.</p>
            <p style="color: #000000;font-size: 16px;font-weight: 500;">[Order #{{$order_id}}]</p>
        </div>

        <div style="width: 701px; margin: 0 auto;margin-bottom: 20px;">
            <!--begin::Table-->
            <div class="table-responsive border-bottom mb-14">
                <table style="border: 1px solid #ddd;border-width: 1px 0 0 1px !important;border-collapse: collapse;width: 100%;">
                    <thead>
                        <tr>
                            <th width="70%" style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 500;">Product:</th>
                            <th width="12%" style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 500;">Quantity</th>
                            <th width="18%" style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 500;">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <?php 
                          $bag_name = '';
                          $bag_color = '';
                          $bags = App\Models\Product::where('sub_category','backpack')->where('id',$order->bag_id)->where('status','1')->first();
                          if($bags) {
                                $bag_name = $bags->name;
                                $bag_color = json_decode($bags->attributes)[0]->attribute_value;
                          }  
                        ?>                               
                        <tr>
                            <td  width="70%" style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #222222;font-size: 16px;font-weight: 400;">
                                <p>{{ $order->product->name}}</p>
                                <?php if($order->bag_id){?>
                                <br>
                                <span>
                                    {{$bag_name}} : {{ucfirst($bag_color)}}
                                </span>
                                <?php }?>
                            </td>
                            <td  width="12%" style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 400;">
                                {{$order->quantity}} Pcs
                                <?php if($order->bag_id){?>
                                    <br>
                                    <span>
                                        {{$order->quantity}} Pcs
                                    </span>
                                <?php }?>
                            </td>
                            <td  width="18%" style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 18px;font-weight: 400;">৳ {{number_format($order->price)}}</td>
                        </tr>
                        @endforeach                              
                        <tr>                 
                            <td  width="82%" colspan="2" style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 500;">Payment Method : </td>
                            @if( $orders_new->payment_type == 'Cash On Delivery')            
                            <td  width="18%" style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 18px;font-weight: 400;">Cash On Delivery</td>
                            @endif
                        </tr>
                        <?php if($orders_new->coupon_amount){?>
                            <tr>
                                <td  width="100%" colspan="3" style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px 25px 15px 15px;">
                                    <p class="d-flex justify-content-between">
                                        <span style="color: #000000;font-size: 16px;font-weight: 500;">Total : </span>
                                        <span style="color: #000000;font-size: 16px;font-weight: 500;">৳{{number_format($amount)}}</span>
                                    </p>  
                                    <p class="d-flex justify-content-between">
                                        <span style="color: #000000;font-size: 16px;font-weight: 500;">Discount: </span>
                                        <span style="color: #000000;font-size: 16px;font-weight: 500;">(-) ৳ {{number_format($orders_new->coupon_amount)}}</span>
                                    </p>
                                    {{-- <?php if($orders_new->coupon_amount){?>
                                    <p class="d-flex justify-content-between">
                                        <span style="color: #000000;font-size: 16px;font-weight: 500;">Tax: </span>
                                        <span style="color: #000000;font-size: 16px;font-weight: 500;">(+) ৳ {{number_format($orders_new->tax_amount)}}</span>
                                    </p> 
                                    <?php } ?> --}}
                                </td>
                            </tr>
                            <tr>
                                <td  width="100%" colspan="3" style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px 25px 15px 15px;">
                                    <p class="d-flex justify-content-between">
                                        <span style="color: #000000;font-size: 16px;font-weight: 500;">Gross Total : </strong></span>
                                        <span style="color: #000000;font-size: 16px;font-weight: 500;">৳ {{number_format($amount - $orders_new->coupon_amount)}}</span>
                                    </p>                             
                                </td>
                            </tr>
                            <?php }else{?>
                            {{-- <tr>
                                <td  width="100%" colspan="3" style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px 25px 15px 15px;">
                                    <p class="d-flex justify-content-between">
                                        <span style="color: #000000;font-size: 16px;font-weight: 500;">Total : </strong></span>
                                        <span style="color: #000000;font-size: 16px;font-weight: 500;">৳ {{number_format($amount)}}</span>
                                    </p>
                                </td>
                            </tr> --}}
                            <tr>
                                <td  width="100%" colspan="3" style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px 25px 15px 15px;">
                                    <p class="d-flex justify-content-between">
                                        <span style="color: #000000;font-size: 16px;font-weight: 500;">Gross Total : </strong></span>
                                        <span style="color: #000000;font-size: 16px;font-weight: 500;">৳ {{number_format($amount)}}</span>
                                    </p>                             
                                </td>
                            </tr>
                            <?php } ?>
                    </tbody>                   
                </table>
            </div>
            <!--end::Table-->
        </div>

        <div style="max-width: 701px; margin: 0 auto;"  class="pb-4">
            <div style="border: 1px solid #ddd;">
                <div class="ps-3 pt-2 pb-1">
                    <p style="color: #000000;font-size: 16px;font-weight: 500;">Billing Address</p>
                    <p style="color: #000000;font-size: 18px;font-weight: 400;">
                        {{$orders_new->billing_flat}}, {{$orders_new->billing_thana}}, {{$orders_new->billing_district}} <br>
                        {{$orders_new->billing_division}}
                    </p>
                    <?php if(session()->has('GUEST_ID')){?>
                        <p style="color: #000000;font-size: 18px;font-weight: 400;">{{$guestUser[0]->phone}}
                            <br>
                            {{ $guestUser[0]->email}}
                        </p>
                    <?php } else { if(auth()->user()->phone){?>
                    <p style="color: #000000;font-size: 18px;font-weight: 400;">{{auth()->user()->phone}}
                        <br>
                        {{ auth()->user()->email}}
                    </p>
                    <?php } else {?>
                    <p style="color: #000000;font-size: 18px;font-weight: 400;">
                        {{ auth()->user()->email}}
                    </p>
                    <?php }} ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>










                                            