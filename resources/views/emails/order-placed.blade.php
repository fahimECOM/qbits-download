@extends('frontend.partials.email')
@section('title','Order Placed')
@section('content')

<p style="margin-bottom: 1.5em;">Dear {{$name}},</p>
<p style="margin-bottom: 1.5em;">We received your order and will get started on it right away. Our customer service member will get back to you shortly and will keep you updated. You can expect to receive a shipping confirmation email soon.</p>
<p style="margin-bottom: 1.5em;">Your order details are attached. Thanks for your purchase from <a href="https://www.myqbits.com" style="text-decoration: none;color: #444;"
        target="_blank">myqbits.com</a>.
</p>
<p style="margin-bottom: 1.5em;">Estimated Delivery: Within 7 days</p>
<p style="margin-bottom: 1.5em;">Order ID: <b>{{$order}}</b></p>

<div style="width: 722px; margin: 0 auto;margin-bottom: 20px;" class="invoice-table">
        <!--begin::Table-->
        <div class="table-responsive border-bottom mb-14">
            <table
                style="border: 1px solid #ddd;border-width: 1px 0 0 1px !important;border-collapse: collapse;width: 100%;">
                <thead>
                    <tr>
                        <th width="70%"
                            style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 500;">
                            Product</th>
                        <th width="12%"
                            style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 500;">
                            Quantity</th>
                        <th width="18%"
                            style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 500;">
                            Price</th>
                    </tr>
                </thead>
                <tbody>
    
                    @foreach($orders as $key=> $order)
                    <?php
                                
                                
                            //bag information
                                if($order->bag_id){
                                    $bag_name = '';
                                    $bag_color = '';
                                    
                                    $bags = App\Models\Product::where('sub_category','backpack')->where('id',$order->bag_id)->where('status','1')->first();
                                    if($bags) {
                                        $bag_name = $bags->name;
                                        $bag_color = json_decode($bags->attributes)[0]->attribute_value;
                                    }
                                }
                        ?>
                    <tr>
                        <td width="70%"
                            style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #222222;font-size: 16px;font-weight: 400;">
                            @if($order['productid']['category'] == 'Desktop')
                            <p style="min-height: 50px;">{{ substr($order['productid']['name'],0,50)}}
                                @if($order->ram_id != '')
                                {{$order['ramid']['name']}}
                                @endif
                                @if($order->ssd_id != '')
                                {{$order['ssdid']['name']}}
                                @endif
                                Windows 10 Pro Mini PC</p>
                            @elseif($order['productid']['category'] == 'Laptop')
                            <p style="min-height: 50px;">{{$order['productid']['name']}}</p>
                            @elseif($order['productid']['category'] == 'Accessory')
                            <p style="min-height: 50px;">{{$order['productid']['name']}}</p>
                            @endif
                            @if($order['productid']['category'] == 'Desktop')
                            <p style="color:#a1a1a6">{{$order['keyboardid']['name']}}</p>
                            @endif
                            @if($order['productid']['category'] == 'Desktop' || $order['productid']['category'] ==
                            'Laptop')
                            <p style="color:#a1a1a6">{{$order['bagid']['name']}} : {{ $bag_color}}</p>
                            @endif
                        </td>
    
                        <td width="12%"
                            style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 400;">
                            <p style="min-height: 50px;">{{$order->quantity}} Pcs</p>
                            @if($order['productid']['category'] == 'Desktop')
                            <p>{{$order->keyboard_qty}} Pcs</p>
                            @endif
                            <p >{{$order->bag_quanity}} Pcs
                            </p>
                        </td>
    
                        <td width="18%"
                            style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 18px;font-weight: 400;">
                            <p style="min-height: 50px;">Tk
                                {{number_format($order['productid']['unit_price']*$order->quantity + $order['ram_unit_price']*$order['ram_qty'] + $order['ssd_unit_price']*$order['ssd_qty'])}}
                            </p>
                            @if($order['productid']['category'] == 'Desktop')
                            <p>Tk {{number_format($order['keyboard_unit_price']*$order['keyboard_qty'])}}</p>
                            @endif
                            @if($order['productid']['category'] == 'Desktop' || $order['productid']['category'] ==
                            'Laptop')
                            <p>Tk {{number_format($order['bagid']['unit_price']*$order['bag_quanity'])}}</p>
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
                    <?php if($orders_new->coupon_amount){?>
                    <tr>
                        <td width="100%" colspan="3"
                            style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px 25px 15px 15px;">
                            <p class="d-flex justify-content-between">
                                <span style="color: #000000;font-size: 16px;font-weight: 500;">Total :
                                </span>
                                <span style="color: #000000;font-size: 16px;font-weight: 500; float: right;">Tk
                                    {{number_format($orders->sum('total_price') - $order['keyboard_unit_price']*$order['keyboard_qty'], 2, '.', ',')}}
                                </span>
                            </p>
                            <p class="d-flex justify-content-between">
                                <span style="color: #000000;font-size: 16px;font-weight: 500;">Discount :
                                </span>
                                <span style="color: #000000;font-size: 16px;font-weight: 500; float: right;">(-) Tk
                                    {{number_format($orders_new->coupon_amount, 2, '.', ',')}}
                                </span>
                            </p>
                        </td>
                    </tr>
                    <?php $grossTotal = ($orders->sum('total_price') - $order['keyboard_unit_price']*$order['keyboard_qty']) - $orders_new->coupon_amount;?>
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
                                    {{number_format($orders->sum('total_price'), 2, '.', ',')}}
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

<!-- <p style="margin-bottom: 1.5em;"><a href="https://myqbits.com/lania/details/Lania-11th-Gen-Intel-%20i7"
        style="text-decoration: none;" target="_blank">https://myqbits.com/lania/details/Lania-11th-Gen-Intel-%20i7</a>
</p> -->
<p style="margin-bottom: 1.5em;">For more information please visit: <a href="https://www.myqbits.com"
        target="_blank">Link</a></p>

<p style="margin-bottom: 0.25em;">Thank You,</p>
<p style="margin: 0;">Team Qbits</p>


@endsection