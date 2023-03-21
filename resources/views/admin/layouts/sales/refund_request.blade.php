@extends('admin.master')

@section('admin-content')
<style>
    /* td.text-start.pe-0.quantity-flex {
        display: flex;
        justify-content: space-evenly;
        gap: 54px;
        flex-direction: column;
        align-items: center;
    } */

</style>

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Invoice Listing</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted"></li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Sales</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Invoice Listing</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post" style="z-index:1">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Products-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                        transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-ecommerce-order-filter="search"
                                class="form-control form-control-solid w-250px ps-14" placeholder="Search Order" />
                        </div>
                        <!--end::Search-->
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_sales_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

                                <th class="text-start min-w-100px">Invoice Number</th>
                                <th></th>
                                <th class="text-start min-w-100px">Customer</th>
                                <th class="text-start min-w-400px">Product Name</th>
                                <th class="text-start min-w-100px">Quantity</th>
                                <th class="text-start min-w-100px">Total</th>
                                <th class="text-start min-w-100px">Refund Status</th>
                                <th class="text-start min-w-100px">Refund Date</th>
                                @if(App\Models\User::hasPermission(["view_refund_order","complete_refund_order"]))
                                <th class="text-start min-w-100px">Actions</th>
                                @else
                                <th class=""></th>
                                @endif
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            @foreach($order as $key=>$orders)
                            <tr>
                                <!--begin::Checkbox-->
                                <!-- <td>
														<div class="form-check form-check-sm form-check-custom form-check-solid">
															<input class="form-check-input" type="checkbox" value="1" />
														</div>
													</td> -->
                                <!--end::Checkbox-->
                                <!--begin::Order ID=-->
                                <td data-kt-ecommerce-order-filter="order_id">
                                    <span href="" class="pe-5 mx-1 fw-bolder">{{$orders->invoice}}</span>
                                </td>
                                <td></td>
                                <!--end::Order ID=-->
                                <!--begin::Customer=-->
                                <td>
                                    <div class="d-flex align-items-start">
                                        <!--begin:: Avatar -->
                                        <!-- <div class="symbol  symbol-40px overflow-hidden me-3">
																<a href="">
																	<div class="symbol-label">
																		<img src="{{(!empty($orders['customer']['avatar']))?url($orders['customer']['avatar']):url('/avatar.png')}}" alt="Ethan Wilder" class="w-100" />
																	</div>
																</a>
															</div> -->
                                        <!--end::Avatar-->
                                        <div class="ms-2">
                                            <!--begin::Title-->
                                            <a href=""
                                                class="text-gray-600 fw-bolder">{{$orders['customer']['name']}}</a>
                                            <!--end::Title-->
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @foreach($orders['orderDetails'] as $key=>$details)
                                    <?php 
                                        //bag information
                                        if($details['bag_id']){
                                            $bag_name = '';
                                            $bag_color = '';
                                            $bags = App\Models\Product::where('sub_category','backpack')->where('id',$details['bag_id'])->where('status','1')->first();
                                            if($bags) {
                                                $bag_name = $bags->name;
                                                $bag_color = json_decode($bags->attributes)[0]->attribute_value;
                                            }
                                        }
                                        
                                        //keyboard information
                                        if($details['keyboard_id']){
                                            $keyboard_name = '';
                                            $keyboard_details = App\Models\Product::where('sub_category','keyboard-mouse')->where('id',$details['keyboard_id'])->where('status','1')->first();
                                            if($keyboard_details){
                                                $keyboard_name = $keyboard_details->name;
                                            }
                                        }

                                        //ram information
                                        $ram_name = '';
                                        if($details['ram_id']){
                                            $ram_details = App\Models\Product::where('sub_category','ram')->where('id',$details['ram_id'])->where('status','1')->first();
                                            if($ram_details){
                                                $ram_name = $ram_details->name;
                                            }
                                        }

                                        //ssd information 
                                        $ssd_name = '';
                                        if($details['ssd_id']){
                                            $ssd_details = App\Models\Product::where('sub_category','ssd')->where('id',$details['ssd_id'])->where('status','1')->first();
                                            if($ssd_details){
                                                $ssd_name = $ssd_details->name;
                                            }
                                        }
                                    ?>
                                    <div class="d-flex align-items-start">
                                        <?php if($details['bag_id']){?>
                                        <div class=" d-flex align-items-center py-5" style="">
                                            <?php } else {?>
                                            <div class=" d-flex align-items-center" style="height: 50px">
                                                <?php } ?>
                                                <!--begin::Title-->
                                                <?php if($details['productid']['sub_category'] == 'Lania'){
                                                    
                                            ?>
                                                <span class="fw-bolder">{{$details['productid']['name']}} {{$ram_name}}
                                                    {{$ssd_name}} ( {{$keyboard_name}} +
                                                    {{$bag_name. ' : ' .$bag_color}} )</span>
                                                <?php } elseif($details['productid']['sub_category'] == 'Sigma') {?>
                                                <span class="fw-bolder">{{$details['productid']['name']}} (
                                                    {{$bag_name. ' : ' .$bag_color}} )</span>
                                                <?php } else { ?>
                                                <span class="fw-bolder">{{$details['productid']['name']}}</span>
                                                <?php } ?>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        @endforeach
                                </td>

                                <td class="text-start pe-0 quantity-flex">
                                    @foreach($orders['orderDetails'] as $key=>$details)
                                    <?php if($details['bag_id'] && count($orders['orderDetails']) > 1 ){?>
                                    <div class="d-flex align-items-center" style="height: 100px">
                                        <span class=" fw-bolder" style="margin-top: -30px;">{{$details->quantity}}
                                            Pcs</span>
                                    </div>
                                    <?php } elseif($details['bag_id'] && count($orders['orderDetails']) == 1) {?>
                                    <div class="d-flex align-items-center" style="height: 100px">
                                        <span class=" fw-bolder">{{$details->quantity}} Pcs</span>
                                    </div>
                                    <?php } else { ?>
                                    <div class="d-flex align-items-center" style="height: 50px">
                                        <span class=" fw-bolder">{{$details->quantity}} Pcs</span>
                                    </div>
                                    <?php } ?>
                                    @endforeach

                                </td>
                                <td class="text-start pe-0">
                                    @php
                                    $discountPrice = 0;
                                    $order_coupon_amount =
                                    App\Models\Order::where('order_no',$orders->order_no)->select('coupon_amount')->first();
                                    $discountPrice = $order_coupon_amount->coupon_amount;
                                    $Totalprice =
                                    App\Models\OrderDetail::where('order_id',$orders->order_no)->sum('total_price');
                                    @endphp
                                    <span
                                        class="fw-bolder">&#2547;{{number_format(($Totalprice - $discountPrice),2, '.', ',')}}</span>
                                </td>
                                <td class="text-start pe-0" data-order="Completed">
                                    <!--begin::Badges-->
                                    <div class="badge badge-light-success">Pending</div>
                                    <br>
                                    <!--end::Badges-->
                                </td>
                                <!--end::Status=-->
                                <!--begin::Total=-->


                                <!--end::Total=-->
                                <!--begin::Date Added=-->
                                <td class="text-start" data-order="2022-02-04">
                                    <span
                                        class="fw-bolder">{{date('d/m/Y',strtotime($orders->refund_request_date))}}</span>
                                </td>


                                <!--begin::Action=-->
                                @if(App\Models\User::hasPermission(["view_refund_order","complete_refund_order"]))
                                <td class="text-start">
                                    <div class="menu-item">
                                        <a href="{{route('admin.order.details',$orders->id)}}"
                                            class="menu-link ">View</a>
                                    </div>
                                </td>
                                @else
                                <td class=""></td>
                                @endif
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>

                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Products-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->

@endsection
