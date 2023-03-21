@extends('frontend.user.dashboard.master')

@section('admin-content')


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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Orders Listing</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <span class="text-muted ">Home</span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">eCommerce</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
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
                    <li class="breadcrumb-item text-dark">Orders Listing</li>
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
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <!-- <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        <div class="input-group w-250px">
                            <input class="form-control form-control-solid rounded rounded-end-0"
                                placeholder="Pick date range" id="kt_ecommerce_sales_flatpickr" />
                            <button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1"
                                            transform="rotate(-45 7.05025 15.5356)" fill="currentColor" />
                                        <rect x="8.46447" y="7.05029" width="12" height="2" rx="1"
                                            transform="rotate(45 8.46447 7.05029)" fill="currentColor" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                        <div class="w-100 mw-150px">
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                data-placeholder="Status" data-kt-ecommerce-order-filter="status">
                                <option></option>
                                <option value="all">All</option>
                                <option value="Cancelled">Cancelled</option>
                                <option value="Completed">Completed</option>
                                <option value="Pending">Pending</option>

                            </select>
                        </div>
                    </div> -->
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-4" id="kt_ecommerce_sales_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="text-start min-w-100px ">Order ID</th>
                                <th></th>
                                <th class="text-start min-w-400px p-5">Product Name</th>
                                <th class="text-start min-w-100px p-5">Quantity</th>
                                <th class="text-start min-w-100px p-5">Total</th>
                                <th class="text-start min-w-100px p-5">Status</th>
                                <th class="text-start min-w-100px p-5">Date</th>
                                <th class="text-start min-w-100px p-5">Actions</th>
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
                                <td class="text-start" data-kt-ecommerce-order-filter="order_id">
                                    <div class="">
                                        <a href="" class="text-gray-600 ">{{$orders->order_no}}</a>
                                    </div>

                                </td>
                                <!--end::Order ID=-->
                                <!--begin::Customer=-->
                                <td>

                                    <!--begin:: Avatar -->
                                    <!-- <div class="symbol  symbol-40px overflow-hidden me-3">
																<a href="">
																	<div class="symbol-label">
																		<img src="{{(!empty($orders['customer']['avatar']))?url($orders['customer']['avatar']):url('/avatar.png')}}" alt="Ethan Wilder" class="w-100" />
																	</div>
																</a>
															</div> -->
                                    <!--end::Avatar-->
                                    <!-- <div class="ms-2">
															
																<a href="../../demo1/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bolder">{{$orders['customer']['name']}}</a>
																
															</div> -->

                                </td>
                                <td class="text-start">
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
                                    <div class="d-flex align-items-center">
                                        <!--begin:: Avatar -->
                                        <!-- <div class="symbol  symbol-40px overflow-hidden me-3">
																<a href="">
																	<div class="symbol-label">
																		<img src="{{(!empty($details['productid']['galary_photo']))?url($details['productid']['galary_photo']):url('/avatar.png')}}" alt="Ethan Wilder" class="w-100" />
																	</div>
																</a>
															</div> -->
                                        <!--end::Avatar-->

                                        <!--begin::Title-->
                                        <!-- <a
                                            class="text-gray-600 text-hover-primary fs-6 fw-bolder">{{$details['productid']['name']}}</a> -->
                                        <!--end::Title-->
                                        <?php if($details['bag_id']){?>
                                        <div class="ms-2 d-flex align-items-center" style="height: 100px">
                                            <?php } else {?>
                                            <div class="ms-2 d-flex align-items-center" style="height: 50px">
                                                <?php } ?>
                                                <!--begin::Title-->
                                                <?php if($details['productid']['sub_category'] == 'Lania'){
                                                        
                                                ?>
                                                <a class="text-gray-600 text-hover-primary fs-6 fw-bolder">{{$details['productid']['name']}}
                                                    {{$ram_name}} {{$ssd_name}} ( {{$keyboard_name}} +
                                                    {{$bag_name. ' : ' .$bag_color}} )</a>
                                                <?php } elseif($details['productid']['sub_category'] == 'Sigma') {?>
                                                <a class="text-gray-600 text-hover-primary fs-6 fw-bolder">{{$details['productid']['name']}}
                                                    ( {{$bag_name. ' : ' .$bag_color}} )</a>
                                                <?php } else { ?>
                                                <a
                                                    class="text-gray-600 text-hover-primary fs-6 fw-bolder">{{$details['productid']['name']}}</a>
                                                <?php } ?>
                                                <!--end::Title-->
                                            </div>

                                        </div>
                                        @endforeach
                                </td>

                                <td class="text-start pe-0">
                                    @foreach($orders['orderDetails'] as $key=>$details)
                                    <?php if($details['bag_id'] && count($orders['orderDetails']) > 1 ){?>
                                    <div class="d-flex align-items-center" style="height: 100px">
                                        <span class="px-2 fw-bolder" style="margin-top: -30px;">{{$details->quantity}}
                                            Pcs</span>
                                    </div>
                                    <?php } elseif($details['bag_id'] && count($orders['orderDetails']) == 1) {?>
                                    <div class="d-flex align-items-center" style="height: 100px">
                                        <span class="px-2 fw-bolder">{{$details->quantity}} Pcs</span>
                                    </div>
                                    <?php } else { ?>
                                    <div class="d-flex align-items-center" style="height: 50px">
                                        <span class="px-2 fw-bolder">{{$details->quantity}} Pcs</span>
                                    </div>
                                    <?php } ?>
                                    @endforeach
                                </td>
                                <td class="text-start">
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
                                <td class="text-start" data-order="Completed">
                                    <!--begin::Badges-->
                                    <div class="badge badge-light-success">
                                        <?php if($orders->refund_request == 'Order Refunded'){?>
                                        {{ucfirst($orders->refund_request)}}
                                        <?php } else {?>
                                        {{ucfirst($orders->delivery_status)}}
                                        <?php } ?>
                                    </div> <br>
                                    <!--end::Badges-->
                                </td>
                                <!--end::Status=-->
                                <!--begin::Total=-->


                                <!--end::Total=-->
                                <!--begin::Date Added=-->
                                <td class="text-start" data-order="2022-02-04">
                                    <span class="fw-bolder">{{date('d/m/Y',strtotime($orders->date))}}</span>
                                </td>

                                <!--end::Date Modified=-->
                                <!--begin::Action=-->
                                <td class="text-start">
                                    <div class="menu-item px-3">
                                        <a href="{{route('order.details',$orders->id)}}" class="menu-link px-3">View</a>
                                    </div>
                                    <!-- <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                       
                                        <span class="svg-icon svg-icon-5 m-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        </a>
                                
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                        data-kt-menu="true">

                                        @if($orders->delivery_status != 'Completed')
                                        <div class="menu-item px-3">
                                            <a href="{{route('order.edit',$orders->id)}}"
                                                class="menu-link px-3">Edit</a>
                                        </div> 
                                        @endif

                                    </div> -->
                                </td>

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
