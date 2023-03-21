<style rel='stylesheet'>
    @page {
        size: auto !important;
        margin: 0 !important;
    }

    .invoice-content-section {
        background-color: #e1e1e1;
        font-family: "Roboto", sans-serif;
    }

    .invoice-area {
        max-width: 986px;
        background-color: #ffffff;
        margin: 0 auto;
    }

    .print-btn {
        width: 175px;
        height: 55px;
        padding: 15px auto;
        border-radius: 30px;
        color: rgb(255, 255, 255);
        background-color: #2699FB;
        font-size: 16px;
        font-weight: 500;
        margin-right: 20px;
        outline: none;
        border: none;
    }

    .print-btn:hover {
        background-color: #0071E3;
        color: #fff;
    }

    .print-cancel-btn {
        width: 175px;
        height: 55px;
        padding: 15px 65px;
        border-radius: 30px;
        color: #272727;
        background-color: #E1E1E1;
        font-size: 16px;
        font-weight: 500;
        outline: none;
        border: none;
    }

    .print-cancel-btn:hover {
        background-color: #1486F9;
        color: #fff;
    }



    @media (max-width: 480px) {
        .invoice-thankyou {
            max-width: 100% !important;
        }

        .invoice-area {
            max-width: 100% !important;
        }

        .invoice-table {
            width: 100% !important;
            padding-left: 10px !important;
            padding-right: 10px !important;
        }

        .invoice-header {
            width: 100% !important;
            padding-left: 10px !important;
            padding-right: 10px !important;
        }

        .invoice-logo-date {
            width: 100% !important;
            padding-left: 10px !important;
            padding-right: 10px !important;
        }

        .invoice-billing {
            width: 100% !important;
            padding-left: 10px !important;
            padding-right: 10px !important;
        }

        .invoice-print-area {
            width: 100% !important;
            padding-left: 10px !important;
            padding-right: 10px !important;
        }

        .invoice-print-btn {
            flex-direction: column;
        }

        .print-btn {
            width: 100% !important;
            margin-bottom: 20px !important;
        }

        .print-cancel-btn {
            width: 100% !important;
            margin-bottom: 20px !important;
        }
    }

    /* Tab responsive css */
    @media (min-width: 481px) and (max-width: 820px) {
        .invoice-thankyou {
            max-width: 100% !important;
        }
    }

    @media (min-width: 821px) and (max-width: 1080px) {
        .invoice-area {
            max-width: 760px !important;
        }

        .invoice-thankyou {
            max-width: 100% !important;
        }

        .invoice-print-section {
            max-width: 760px !important;
        }
    }

</style>

<div style="max-width: 701px;border-bottom: 2px solid #ddd;margin: 40px auto 0;padding-bottom: 20px;"
    class="invoice-logo-date">
    <div>
        <div style="color: #272727;font-size: 18px; font-weight: 400;">

            <img src="{{public_path('frontend/assets/logo/qbits_logo_black.svg')}}" alt="Qbits Logo"
                style="display: block; margin-left: 0%; width: 100px;" />
            <p style=" float: right;">Order Date: {{date('d M Y',strtotime($order_info[0]->created_at))}}</p>
        </div>
        <div>

        </div>
    </div>
</div>
<?php
    $userInformation = App\Models\User::where('id', $order_info[0]->user_id)->first();
    $name = '';
    $phone = '';
    $email = '';
    if($userInformation){
        $name = $userInformation->name;
        $phone = $userInformation->phone;
        $email = $userInformation->email;
    }
?>
<div style=" width: 701px; margin: 20px auto;" class="invoice-header">
    <div style="width: 701px; margin: 5px auto;" class="invoice-header">
        <p style="color: #272727;font-size: 18px; font-weight: 400;">Hi {{$name}},</p>
        <p style="color: #272727;font-size: 18px; font-weight: 400;">Just to let you
            know, we've received your order <b>[{{$order_no}}],</b> and it is now being processed:</p>
        <p style="color: #272727;font-size: 18px; font-weight: 400;">Pay with cash upon
            delivery.</p>
        <!-- <p style="color: #000000;font-size: 18px;font-weight: 400;"><b>Phone Number:</b> {{$phone}}
        </p>
        <p style="color: #000000;font-size: 18px;font-weight: 400;"><b>Shipping Address:</b>
            {{$order_info[0]->shipping_flat}}, {{$order_info[0]->shipping_thana}},
            {{$order_info[0]->shipping_district}},
            {{$order_info[0]->shipping_division}}
        </p>
        <p> <b>Payment Method :</b> Cash On Delivery </p> -->

    </div>
</div>
<div style="width: 701px; margin: 0 auto;margin-bottom: 20px;" class="invoice-table">
    <!--begin::Table-->
    <div class="table-responsive border-bottom mb-14">
        <table
            style="border: 1px solid #ddd;border-width: 1px 0 0 1px !important;border-collapse: collapse;width: 100%;">
            <thead>
                <tr>
                    <th width="70%"
                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 500;">
                        Product:</th>
                    <th width="12%"
                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 500;">
                        Quantity</th>
                    <th width="18%"
                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 500;">
                        Price</th>
                </tr>
            </thead>
            <tbody>

                @foreach($invoice_details as $key=> $invoice)
                <?php
                            
                            
                        //bag information
                            if($invoice->bag_id){
                                $bag_name = '';
                                $bag_color = '';
                                
                                $bags = App\Models\Product::where('sub_category','backpack')->where('id',$invoice->bag_id)->where('status','1')->first();
                                if($bags) {
                                    $bag_name = $bags->name;
                                    $bag_color = json_decode($bags->attributes)[0]->attribute_value;
                                }
                            }
                    ?>
                <tr>
                    <td width="70%"
                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #222222;font-size: 16px;font-weight: 400;">
                        @if($invoice['productid']['category'] == 'Desktop')
                        <p style="min-height: 50px;">{{ substr($invoice['productid']['name'],0,50)}}
                            @if($invoice->ram_id != '')
                            {{$invoice['ramid']['name']}}
                            @endif
                            @if($invoice->ssd_id != '')
                            {{$invoice['ssdid']['name']}}
                            @endif
                            Windows 10 Pro Mini PC</p>
                        @elseif($invoice['productid']['category'] == 'Laptop')
                        <p style="min-height: 50px;">{{$invoice['productid']['name']}}</p>
                        @elseif($invoice['productid']['category'] == 'Accessory')
                        <p>{{$invoice['productid']['name']}}</p>
                        @endif
                        @if($invoice['productid']['category'] == 'Desktop')
                        <p style="color:#a1a1a6">{{$invoice['keyboardid']['name']}}</p>
                        @endif
                        @if($invoice['productid']['category'] == 'Desktop' || $invoice['productid']['category'] ==
                        'Laptop')
                        <p style="color:#a1a1a6">{{$invoice['bagid']['name']}} : {{ $bag_color}}</p>
                        @endif
                    </td>

                    <td width="12%"
                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 400;">
                        @if($invoice['productid']['category'] == 'Desktop' || $invoice['productid']['category'] ==
                        'Laptop')
                        <p style="min-height: 50px;">{{$invoice->quantity}} Pcs</p>
                        @endif
                        @if($invoice['productid']['category'] == 'Accessory')
                        <p>{{$invoice->quantity}} Pcs</p>
                        @endif
                        @if($invoice['productid']['category'] == 'Desktop')
                        <p>{{$invoice->keyboard_qty}} Pcs</p>
                        @endif
                        @if($invoice['productid']['category'] == 'Desktop' || $invoice['productid']['category'] ==
                        'Laptop')
                        <p style="">{{$invoice->bag_quanity}} Pcs
                        </p>
                        @endif
                        
                    </td>

                    <td width="18%"
                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 18px;font-weight: 400;">
                        @if($invoice['productid']['category'] == 'Desktop' || $invoice['productid']['category'] ==
                        'Laptop')
                        <p style="min-height: 50px;">Tk
                            {{number_format($invoice['productid']['unit_price']*$invoice->quantity + $invoice['ram_unit_price']*$invoice['ram_qty'] + $invoice['ssd_unit_price']*$invoice['ssd_qty'])}}
                        </p>
                        @endif
                        @if($invoice['productid']['category'] == 'Accessory')
                        <p>Tk
                            {{number_format($invoice['productid']['unit_price']*$invoice->quantity)}}
                        </p>
                        @endif
                        @if($invoice['productid']['category'] == 'Desktop')
                        <p>Tk {{number_format($invoice['keyboard_unit_price']*$invoice['keyboard_qty'])}}</p>
                        @endif
                        @if($invoice['productid']['category'] == 'Desktop' || $invoice['productid']['category'] ==
                        'Laptop')
                        <p>Tk {{number_format($invoice['bagid']['unit_price']*$invoice['bag_quanity'])}}</p>
                        @endif

                    </td>

                </tr>
                @endforeach
                <!-- <tr>
                    <td width="82%" colspan="2"
                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 500;">
                        Payment Method : </td>
                    <td width="18%"
                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 18px;font-weight: 400;">
                        Cash On Delivery</td>
                </tr> -->
                <tr>
                    <td width="82%" colspan="2"
                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 500;">
                        Payment Method : </td>
                    @if( $order_info[0]->payment_type == 'Cash On Delivery')
                    <td width="18%"
                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 18px;font-weight: 400;">
                        Cash On Delivery</td>
                    @endif
                </tr>
                <?php if($order_info[0]->coupon_amount){?>
                <tr>
                    <td width="100%" colspan="3"
                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px 25px 15px 15px;">
                        <p class="d-flex justify-content-between">
                            <span style="color: #000000;font-size: 16px;font-weight: 500;">Total :
                            </span>
                            <span style="color: #000000;font-size: 16px;font-weight: 500; float: right;">Tk
                                {{number_format($invoice_details->sum('total_price') - $invoice['keyboard_unit_price']*$invoice['keyboard_qty'], 2, '.', ',')}}
                            </span>
                        </p>
                        <p class="d-flex justify-content-between">
                            <span style="color: #000000;font-size: 16px;font-weight: 500;">Discount :
                            </span>
                            <span style="color: #000000;font-size: 16px;font-weight: 500; float: right;">(-) Tk
                                {{number_format($order_info[0]->coupon_amount, 2, '.', ',')}}
                            </span>
                        </p>
                    </td>
                </tr>
                <?php $grossTotal = ($invoice_details->sum('total_price') - $invoice['keyboard_unit_price']*$invoice['keyboard_qty']) - $order_info[0]->coupon_amount;?>
                <tr>
                    <td width="100%" colspan="3"
                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px 25px 15px 15px;">
                        <p class="d-flex justify-content-between">
                            <span style="color: #000000;font-size: 16px;font-weight: 500;">Gross Total :
                            </span>
                            <span style="color: #000000;font-size: 16px;font-weight: 500; float: right;">Tk
                                {{number_format($grossTotal, 2, '.', ',')}}
                            </span>
                        </p>
                    </td>
                </tr>
                <?php } else { ?>
                <tr>
                    <td width="100%" colspan="3"
                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px 25px 15px 15px;">
                        <p class="d-flex justify-content-between">
                            <span style="color: #000000;font-size: 16px;font-weight: 500;">Gross Total :
                            </span>
                            <span style="color: #000000;font-size: 16px;font-weight: 500; float: right;">Tk
                                {{number_format($invoice_details->sum('total_price'), 2, '.', ',')}}
                            </span>
                        </p>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!--end::Table-->
</div>
<div style="max-width: 701px; margin: 0 auto;" class="pb-4 invoice-billing">
    <div style="border: 1px solid #ddd;">
        <div class="ps-3 pt-2 pb-1">
            <p style="color: #000000;font-size: 16px;font-weight: 500; margin-left: 20px">Billing Address</p>
            </p>
            <p style="color: #000000;font-size: 18px;font-weight: 400; margin-left: 20px">
                {{$order_info[0]->shipping_flat}}, {{$order_info[0]->shipping_thana}},
                {{$order_info[0]->shipping_district}}
                <br>
                {{$order_info[0]->shipping_division}}
                <br>
                {{$email}}
                <br>
                {{$phone}}
            </p>
        </div>
    </div>
</div>
