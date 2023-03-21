@extends('admin.master')

@section('admin-content')

<style>
    /* success modal icon */
    .subscribe_success_circle {
        width: 38px;
        height: 38px;
        background: #1486F9;
        border-radius: 50%;
        margin: 0 auto;
        margin-top: 15px;
        margin-bottom: 20px;
    }

    button.btn-icon {
        background: #0000006d;
        border: 1px solid rgba(64, 64, 64, 0.351);
        width: 30px;
        height: 30px;
        border-radius: 50px;
        margin: 0;
        padding: 0;
        /* cursor: default; */
        cursor: pointer;
    }

    .fa-pen-to-square {
        color: #273f7b;
    }

    .fa-check {
        color: #00ff00;
    }

    .fa-xmark {
        color: #7e0a0a;
    }

    .btn-icon:hover .fa-pen-to-square {
        color: #819ee9;
    }


    .btn-icon:hover .fa-xmark {
        color: #c90000;
    }

    .fa-solid {
        margin: 0;
        padding: 0;
        font-size: 14px;
    }

    .confirm {

        background: rgba(58, 193, 4, 0.756);
        transition: 0.2s ease-in;

    }

    .confirm:hover {
        background: rgb(52, 208, 0);
    }

    .start-scaning-btn {
        background: rgba(58, 193, 4, 0.756);
        transition: 0.2s ease-in;
        padding: 15px;
        font-size: 18px;
    }

    .start-scaning-btn:hover {
        background: rgb(52, 208, 0);
    }

    .verify-submit-btn {
        background: rgb(66 146 252 / 93%);
        transition: 0.2s ease-in;
        padding: 15px;
        font-size: 18px;
    }

    .verify-submit-btn:hover {
        background: rgb(66 146 252 / 97%);
    }

    .reject {
        margin-left: 5px;
        color: rgba(255, 255, 255, 0.847);
        background: #EF5777;
        transition: 0.2s ease-in;

    }

    .reject:hover {
        background: #F53B57;
    }

    .close {
        margin-left: 5px;
        color: rgba(255, 255, 255, 0.847);
        background: #575fef2c;
        transition: 0.2s ease-in;

    }

    .close:hover {
        background: #3b73f51c;
    }

    .confirmed-tooltip-icon {
        border-radius: 50%;
        margin-right: 5px;
    }

    .confirmed-tooltip-name {
        padding-top: 10px;
    }

    .ens-verify-btn {
        margin-right: 5px;
    }

    /* Error Modal Icon */
    .error-cross-icon {
        border: 3px solid #ff00008a;
        padding: 8px;
        border-radius: 25px;
        height: 50px;
        width: 50px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 10px;
    }

    .skd-checked {
        height: 25px;
        width: 25px;
        border: 2px solid #0fdf0f8c;
        border-radius: 50%;
        padding: 3px;
        color: #00ff00de !important;
    }

    .skd-not-checked {
        height: 25px;
        width: 25px;
        border: 2px solid #ed2416cf;
        border-radius: 50%;
        padding: 5px;
        padding-top: 4px;
        color: #ef0a0ac4;
    }

    .alert-question-icon {
        border: 3px solid #f8e00cfa;
        padding: 8px;
        border-radius: 25px;
        height: 50px;
        width: 50px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 10px;
        margin-bottom: 30px;
    }

    /* Loading Spinner Css Start */
    .spinner-container {
        min-width: 225px;
        position: absolute;
        top: 50%;
        left: 50%;
        text-align: center;
        transform: translate(-50%, -50%);
        /* display: none; */
    }

    .loading-text {
        color: #808080;
        font: 2.25rem 'Montserrat' !important;
        letter-spacing: 3px;
    }

    /* Loading Spinner Css End*/

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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Requisition</h1>
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

                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Requisition</li>
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
    <div class="post d-flex flex-column-fluid" id="kt_post">
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
                            <input type="text" data-kt-ecommerce-product-filter="search"
                                class="form-control form-control-solid w-250px ps-14" placeholder="Search Product" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        <div class="w-100 mw-150px">
                            <!--begin::Select2-->
                            <!-- <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                data-placeholder="Status" data-kt-ecommerce-product-filter="status">
                                <option></option>
                                <option value="all">All</option>
                                <option value="1">Scheduled</option>
                                <option value="0">Inactive</option>
                            </select> -->
                            <!--end::Select2-->
                        </div>

                        <!--begin::Add Coupon-->
                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                            <button type="button" class="btn btn-md btn-primary" data-bs-toggle="modal"
                                data-bs-target="#requisitonModal" data-bs-whatever="@mdo">Request Requisition</button>
                        </div>
                        <!--end::Add Coupon-->


                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-end text-gray-400 fw-bolder fs-7 text-uppercase gs-2">
                                <th class="">
                                    <!-- <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                            data-kt-check-target="#kt_ecommerce_products_table .form-check-input"
                                            value="1" />
                                    </div> -->
                                </th>
                                <th class="text-start min-w-100px">Requisition ID</th>
                                <th class="text-start min-w-100px">Product</th>
                                <th class="text-start min-w-100px">Processor</th>
                                <th class="text-start min-w-100px">Quantity</th>
                                <th class="text-start min-w-100px">Created by</th>
                                <th class="text-start min-w-100px">Created date</th>
                                <th class="text-start min-w-100px mx-3">Confirmation</th>
                                <th class="text-start min-w-100px">Actions</th>

                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600" id="requisition_table_data">
                            @foreach($requisitions as $key=>$requisition)
                            <tr>
                                <!--begin::Checkbox-->
                                <td>
                                </td>
                                <!--end::Checkbox-->
                                <!--begin::Category=-->

                                <td class="text-start pe-0">
                                    <span class="fw-bolder">RQ{{$requisition->rq_id}}</span>
                                </td>
                                <!--end::Category=-->
                                <!--begin::SKU=-->
                                <td class="text-start pe-0">
                                    <span class="fw-bolder">{{$requisition->product_type}}</span>
                                </td>
                                <!--end::SKU=-->
                                <!--begin::Qty=-->
                                <td class="text-start pe-0" data-order="47">
                                    <span class="fw-bolder">Core {{$requisition->bb_processor}}</span>
                                </td>
                                <!--end::Qty=-->
                                <!--begin::Price=-->
                                <td class="text-start pe-0">
                                    <span class="fw-bolder">{{$requisition->quantity}}</span>
                                </td>
                                <!--end::Price=-->
                                <!--begin::Status=-->
                                <td class="" data-order="0">

                                    <span class="fw-bolder">{{$requisition['userDetails']['name']}}</span>

                                </td>
                                <!--end::Status=-->

                                <!--begin::Action=-->
                                <td class="text-start">

                                    <span class="fw-bolder">{{date('d M Y',
                                        strtotime($requisition->created_at))}}</span>
                                </td>
                                <!--end::Action=-->
                                <!--begin::Rating-->
                                <td class="text-start pe-0" data-order="rating-3">
                                    @php
                                    $needed_confirm_ids = $requisition->skd_stockout_needed_confirm_ids;

                                    $needed_confirm_ids_str = str_replace( array( '[', ']', '"' ), '',
                                    $needed_confirm_ids);
                                    $needed_confirm_ids_arr = explode (",", $needed_confirm_ids_str);
                                    $confirm_ids = $requisition->skd_stockout_confirmed_ids;
                                    $confirm_ids_str = str_replace( array( '[', ']', '"' ), '', $confirm_ids);
                                    $confirm_ids_arr = explode (",", $confirm_ids_str);



                                    if(count($confirm_ids_arr) > 0 && $confirm_ids_arr[0] != ''){
                                    $rq_creation_confirmation_names = App\Models\User::getUsersName($confirm_ids_arr);
                                    } else {
                                    $rq_creation_confirmation_names = [];
                                    }


                                    $new_needed_confirm_ids_arr = [];
                                    for($i = 0; $i < count($needed_confirm_ids_arr); $i++){
                                        if(!in_array($needed_confirm_ids_arr[$i], $confirm_ids_arr)){
                                        array_push($new_needed_confirm_ids_arr,$needed_confirm_ids_arr[$i]); } }
                                        if(count($needed_confirm_ids_arr)> 0 && $needed_confirm_ids_arr[0] != ''){
                                        $rq_creation_remaining_confirmation_names =
                                        App\Models\User::getUsersName($new_needed_confirm_ids_arr);
                                        } else {
                                        $rq_creation_remaining_confirmation_names = [];
                                        }




                                        $needed_confirm = $requisition->skd_stockout_needed_confirm;
                                        $total_confirmed = $requisition->skd_stockout_total_confirmed;
                                        $confirm = $needed_confirm - $total_confirmed;

                                        @endphp
                                        @for($x = 0; $x< $total_confirmed; $x++) <button type="button" class="btn-icon"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true"
                                            title="{{$rq_creation_confirmation_names[$x]}}"><i
                                                class="fa-solid fa-check"></i></button>
                                            @endfor
                                            @for($x = 0; $x< $confirm; $x++) <button type="button" class="btn-icon"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true"
                                                title="{{$rq_creation_remaining_confirmation_names[$x]}}"><i
                                                    class="fa-solid fa-minus"></i></button>
                                                @endfor
                                </td>
                                <!--end::Rating-->
                                <td class="text-start">

                                    <div class="menu-item">
                                        <a id="requisition_details_drawer" data-kt-drawer-permanent="true" href=""
                                            class="menu-link rq_id_no"
                                            onclick="getRQID('{{$requisition->rq_id}}')">View</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <!--end::Table row-->
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

<!-- Requisition Creation View Drawer -->
<div id="kt_drawer_requisition_creation_drawer" class="" data-kt-drawer="true" data-kt-drawer-activate="true"
    data-kt-drawer-toggle="#requisition_details_drawer"
    data-kt-drawer-close="#kt_drawer_requisition_creation_drawer_close" data-kt-drawer-overlay="false"
    data-kt-drawer-permanent="true" data-kt-drawer-width="{default:'400px', 'md': '600px'}">
    <div class="card rounded-0 w-100"></div>

</div>


<!-- Modal for Entry SKD Materials -->
<div class="modal fade" id="requisitonModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" id="entrySkdModalBody">
        <div class="modal-content">
            <div class="modal-header" style="justify-content: center;">
                <h5 class="modal-title fs-4" id="exampleModalLabel">Entry Requisition Details</h5>
            </div>
            <div class="modal-body">

                <form id="requisitionSubmitFrm">
                    @csrf
                    <div class="row  my-2">
                        <div class="col-md-4 mb-3">
                            <label for="recipient-name" class="col-form-label text-gray-800">Product Type</label>
                            <select id="select-product_type" class="form-select form-select-solid coupon_status"
                                data-hide-search="true" name="product_type" data-placeholder="Status"
                                data-kt-ecommerce-product-filter="status">
                                <option value="">Select category</option>
                                @foreach($Product_category as $key=> $category)
                                <option value="{{$category->category}}">{{$category->category}}</option>
                                @endforeach

                            </select>
                            <p class="text-danger mt-2" id="error_requisition_quantity"></p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="recipient-name" class="col-form-label text-gray-800">Quantity</label>
                            <input type="number" name="requisition_quantity" id="requisition_quantity"
                                class="form-control form-control-solid" min="1" onkeyup="limiter(this);">
                            <p class="text-danger mt-2" id="error_requisition_quantity"></p>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="recipient-name" class="col-form-label text-gray-800">Purpose </label>
                            <input type="text" name="purpose_id" id="purpose_id"
                                class="form-control form-control-solid">
                            <p class="text-danger mt-2" id="error_purpose_id"></p>
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
                                    <select id="select_bb_type" class="form-select form-select-solid coupon_status"
                                        data-hide-search="true" name="bb_type" data-placeholder="Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="">Select Series</option>
                                    </select>
                                    <p class="text-danger mt-2" id="error_bb_type"></p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="message-text" class="col-form-label text-gray-800">Barebone
                                        Model</label>
                                    <!-- <input type="text" name="bb_model" id="bb_model"
                                        class="form-control form-control-solid"> -->
                                    <select id="select_bb_model" class="form-select form-select-solid coupon_status"
                                        data-hide-search="true" name="bb_model" data-placeholder="Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="">Select Model</option>
                                    </select>
                                    <p class=" text-danger mt-2" id="error_bb_model">
                                    </p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="message-text" class="col-form-label text-gray-800">Barebone
                                        Processor</label>
                                    <p id="barebone-processor">
                                        <input type="text" name="bb_processor" id="select-barebone-processor"
                                            class="form-control form-control-solid" value="" readonly>
                                    </p>
                                    <!-- <select id="select-barebone-processor"
                                        class="form-select form-select-solid coupon_status" data-hide-search="true"
                                        name="bb_processor" data-placeholder="Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="">Select Processor</option>
                                        <option value=" i3">Core i3</option>
                                        <option value="i5">Core i5</option>
                                        <option value="i7">Core i7</option>
                                    </select> -->
                                    <p class="text-danger mt-2" id="error_bb_processor"></p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="message-text" class="col-form-label text-gray-800">Brand</label>
                                    <select id="select-barebone-brand"
                                        class="form-select form-select-solid coupon_status" data-hide-search="true"
                                        name="bb_brand" data-placeholder="Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="">Select Barebone</option>
                                        @foreach($barebone_brand as $key=>$brand)
                                        <option value="{{$brand->brand}}">{{$brand->brand}}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger mt-2" id="error_bb_brand"></p>
                                </div>

                            </div>
                        </div>
                        <div id="SSD" class="tab-content">
                            <div class="row ">
                                <label for="message-text" class="text-gray-700 text-center fs-4  my-2">Select SSD
                                    Information</label>
                                <div class="col-md-3 mb-3">
                                    <label for="message-text" class="col-form-label text-gray-800">SSD Type</label>
                                    <select id="select_ssd_type" class="form-select form-select-solid coupon_status"
                                        data-hide-search="true" name="ssd_type" data-placeholder="Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="">Select Type</option>
                                        <option value="M.2">M.2</option>
                                    </select>
                                    <p class="text-danger mt-2" id="error_ssd_type"></p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="message-text" class="col-form-label text-gray-800">M.2 Type</label>
                                    <select id="select_m2_type" class="form-select form-select-solid coupon_status"
                                        data-hide-search="true" name="m2_type" data-placeholder="Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="">Select M.2</option>
                                        <option value="NVME">NVME</option>
                                    </select>
                                    <p class="text-danger mt-2" id="error_m2_type"></p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="message-text" class="col-form-label text-gray-800">SSD Size</label>
                                    <select id="select-ssd-size" class="form-select form-select-solid coupon_status"
                                        data-hide-search="true" name="ssd_size" data-placeholder="Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="">Select Size</option>
                                        <option value="512">512 GB</option>
                                        </option>
                                        <option value="1">1 TB</option>
                                    </select>
                                    <p class="text-danger mt-2" id="error_ssd_size"></p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="message-text" class="col-form-label text-gray-800">Brand</label>
                                    <select id="select-ssd-brand" class="form-select form-select-solid coupon_status"
                                        data-hide-search="true" name="ssd_brand" data-placeholder="Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="">Select SSD</option>
                                        @foreach($ssd_brand as $key=>$brand)
                                        <option value="{{$brand->brand}}">{{$brand->brand}}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger mt-2" id="error_ssd_brand"></p>
                                </div>
                            </div>
                        </div>

                        <div id="RAM" class="tab-content">
                            <div class="row ">
                                <label for="message-text" class="text-gray-700 text-center fs-4 my-2">Select Ram
                                    Information</label>
                                <div class="col-md-3 mb-3">
                                    <label for="message-text" class="col-form-label text-gray-800">Ram Type</label>
                                    <select id="select_ram_type" class="form-select form-select-solid coupon_status"
                                        data-hide-search="true" name="ram_type" data-placeholder="Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="">Select Type</option>
                                        <option value="DDR4">DDR4</option>
                                    </select>
                                    <p class="text-danger mt-2" id="error_ram_type"></p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="message-text" class="col-form-label text-gray-800">Ram Size</label>
                                    <select id="select-ram-size" class="form-select form-select-solid coupon_status"
                                        data-hide-search="true" name="ram_size" data-placeholder="Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="">Select Size</option>
                                        <option value="4">4 GB</option>
                                        <option value="8">8 GB</option>
                                        <option value="16">16 GB</option>
                                        <option value="32">32 GB</option>
                                    </select>
                                    <p class="text-danger mt-2" id="error_ram_size"></p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="message-text" class="col-form-label text-gray-800">Bus Speed</label>
                                    <input type="text" name="bus_speed" id="bus_speed"
                                        class="form-control form-control-solid">
                                    <p class="text-danger mt-2" id="error_bus_speed"></p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="message-text" class="col-form-label text-gray-800">Brand</label>
                                    <select id="select-ram-brand" class="form-select form-select-solid coupon_status"
                                        data-hide-search="true" name="ram_brand" data-placeholder="Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="">Select Ram</option>
                                        @foreach($ram_brand as $key=>$brand)
                                        <option value="{{$brand->brand}}">{{$brand->brand}}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger mt-2" id="error_ram_brand"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input style="background: transparent;border: none;outline: none;color: #1E1E2D;" type="text"
                        class="test" id="serial_number_input_field" value="" />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="button" onclick="requisitionFormSubmit()">submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- RQ Creation SKD barcode scanner modal -->
<div class="modal fade" id="requisitionCreationBarcodeScannerModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="1" aria-labelledby="requisitionCreationBarcodeScannerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md p-5">
        <div class="modal-content p-5">
            <div class="modal-body">
                <h2 class="text-center mb-5">Scan <span id="rq_skd_type">All</span> SKD's Barcode</h2>
                <div class="mb-3">
                    <textarea type="text" name="verify_barcode_scan_id" id="verify_barcode_scan_id" readonly
                        onclick="verifyBarcodeFieldFocus()" class="form-control form-control-solid" rows="6" cols="5"
                        placeholder="Example :&#x0a;XX450XXXXX,XX450XXXXX"></textarea>
                    <div id="rq_error_verify_barcode_item_id" class="text-danger mb-2 mt-3"></div>
                </div>
                <input type="text" style="background: transparent;border: none;outline: none;color: #1E1E2D;"
                    class="test" id="verify_rq_creation_skd_serial_input_field" value=""
                    onchange="entryAllSKDSerialNumberForVerify()" />
                <textarea type="text" name="verify_barcode_item_id" id="verify_barcode_item_id"
                    class="form-control form-control-solid" rows="1" cols="5" style="display: none;"></textarea>
            </div>
            <input type="hidden" name="verify_rq_creation_current_code" id="verify_rq_creation_current_code" value="">
            <input type="hidden" name="verify_rq_creation_number" id="verify_rq_creation_number" value="">
            <input type="hidden" name="rq_creation_qty" id="rq_creation_qty" value="">
            <input type="hidden" name="rq_creation_size" id="rq_creation_size" value="">
            <input type="hidden" name="rq_creation_type" id="rq_creation_type" value="">
            <input type="hidden" id="rq_skd_serials_entry_number" value=0>
            <div class="mx-auto mb-5 text-center">
                <button type="button" class="btn btn-secondary me-5"
                    onclick="closeRQCreationBarcodeScannerModal()">Close</button>
                <button class="btn btn-primary" type="button" onclick="submitRQSerialsForVerify()">Submit</button>
            </div>
        </div>
    </div>
</div>


<!-- RQ Form barcode scanner modal -->
<div class="modal fade" id="rqFrmBarcodeScannerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1"
    aria-labelledby="rqFrmBarcodeScannerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md p-5">
        <div class="modal-content p-5">
            <div class="modal-body">
                <h2 class="text-center mb-5">Scan Requisition Form Barcode</h2>
                <div>
                    <textarea type="text" name="verify_rq_frm_barcode_scan_id" id="verify_rq_frm_barcode_scan_id"
                        readonly onclick="verifyRQFrmBarcodeFieldFocus()" class="form-control form-control-solid mt-3"
                        rows="2" cols="5"></textarea>
                    <div id="rq_error_verify_rq_frm_barcode_item_id" class="text-danger mb-2 mt-3"></div>
                </div>
            </div>
            <div class="mx-auto mb-5 text-center">
                <button type="button" class="btn btn-secondary me-5"
                    onclick="closeRQFrmBarcodeScannerModal()">Close</button>
            </div>
            <input type="text" style="background: transparent;border: none;outline: none;color: #1E1E2D;" class="test"
                id="verify_rq_frm_serial_input_field" value="" onchange="scanFormBarcodeVerify()" autocomplete="off" />
            <input type="hidden" name="rq_frm_id" id="rq_frm_id" value="" autocomplete="off">
            <input type="hidden" name="rqId" id="rqId" value="" autocomplete="off">
        </div>
    </div>
</div>

<!--== =================================================================================== ==-->
<!--== ==========  START::Modal - Requisition Create Success Alert Message   ========= ==-->
<!--== =================================================================================== ==-->
<div class="modal fade " id="requisition_create_success_alert_modal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="requisition_create_success_alert_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="subscribe_success_circle">
                    <img style="padding-top: 11px;padding-left: 10px;" src="{{ asset('success_icon.png') }}"
                        alt="success" />
                </div>

                <h1 class="text-center mt-5">Success!</h1>
                <p class="text-center mt-5 lh-lg">Successfully Requisition Request Created!</p>
            </div>
            <div class="mx-auto mt-5 mb-5">
                <button type="button" class="btn btn-secondary" style="margin-bottom: 20px;" data-bs-dismiss="modal"
                    onclick="closeSuccessRequisitionCreateAlert()">Close</button>
            </div>
        </div>
    </div>
</div>
<!--== =================================================================================== ==-->
<!--== ===========  END::Modal - Requisition Create Success Alert Message   ========== ==-->
<!--== =================================================================================== ==-->


<!-- SKD Barcode Scaning Error Modal-->
<div class="modal fade " id="rq_barcode_entry_verify_error_alert_modal" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="rq_barcode_entry_verify_error_alert_modalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h1 class="text-center error-cross-icon"><i class="fa-solid fa-xmark"
                        style="color: #ff00008a;font-size: 30px;"></i></h1>
                <h1 class="text-center mt-5" id="rq_barcode_verify_error_modal_title">Error!</h1>
                <p class="text-center mt-5" id="rq_barcode_verify_error_modal_text">Something went wrong. Please try
                    some time later.</p>
            </div>
            <div class="mx-auto mt-5 mb-5">
                <button type="button" class="btn btn-secondary" style="margin-bottom: 20px;" data-bs-dismiss="modal"
                    onclick="closeRQBarcodeEntryVerifyErrorAlertModal()">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Confirm RQ Creation Alert modal -->
<div class="modal fade" id="confirmRQCreationAlertModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="confirmRQCreationAlertModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md p-5">
        <div class="modal-content p-5">
            <div class="modal-body">
                <h1 class="text-center alert-question-icon"><i class="fa-solid fa-question"
                        style="color: #f8e00cfa;font-size: 30px;"></i></h1>
                <h1 class="text-center pb-2 mb-5">Are you sure ?</h1>
                <form id="confirmRQCreationRequestFrm">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3 justify-content-center text-center">
                            <div class="d-flex justify-content-center order-cancel-btn-field">
                                <button type="button" class="btn btn-secondary mx-5"
                                    data-bs-dismiss="modal">Close</button>
                                <input type="hidden" id="confirm_rq_id" name="confirm_rq_id" value="">
                                <button type="button" class="btn btn-primary"
                                    onclick="confirmRQCreationRequest()">Confirm</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<!-- reject modal -->
<!-- Button trigger modal -->
<div class="shipping-modal modal fade" id="rejectRQCreationModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="rejectRQCreationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md p-5">
        <div class="modal-content p-5">
            <div class="modal-body">
                <h1 class="text-center alert-question-icon"><i class="fa-solid fa-question"
                        style="color: #f8e00cfa;font-size: 30px;"></i></h1>
                <h1 class="text-center pb-2 mb-5">Are you sure ?</h1>
                <form action="{{route('rq.creation.reject')}}" id="RQCreationrejectvalue" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3 justify-content-center text-center">
                            <div class="d-flex justify-content-center order-cancel-btn-field">
                                <button type="button" class="btn btn-secondary mx-5"
                                    data-bs-dismiss="modal">Close</button>
                                <input type="hidden" id="reject_rq_id" name="reject_rq_id" value="">
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<div class="modal fade " id="rq_form_barcode_scan_success_alert_modal" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="rq_form_barcode_scan_success_alert_modalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="subscribe_success_circle">
                    <img style="padding-top: 11px;padding-left: 10px;" src="{{ asset('success_icon.png') }}"
                        alt="success" />
                </div>

                <h1 class="text-center mt-5">Success!</h1>
                <p class="text-center mt-5 lh-lg">Successfully scanned this requisition form!</p>
            </div>
            <div class="mx-auto mt-5 mb-5">
                <button type="button" class="btn btn-secondary" style="margin-bottom: 20px;"
                    data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- RQ Form Barcode Scaning Error Modal-->
<div class="modal fade " id="rq_form_barcode_scan_error_alert_modal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="rq_form_barcode_scan_error_alert_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h1 class="text-center error-cross-icon"><i class="fa-solid fa-xmark"
                        style="color: #ff00008a;font-size: 30px;"></i></h1>
                <h1 class="text-center mt-5" id="rq_form_barcode_scan_error_title">Invalid!</h1>
                <p class="text-center mt-5" id="rq_form_barcode_scan_error_text">Please scanning a valid barcode!</p>
            </div>
            <div class="mx-auto mt-5 mb-5">
                <button type="button" class="btn btn-secondary" style="margin-bottom: 20px;" data-bs-dismiss="modal"
                    onclick="closeRQFrmBarcodeScanErrorAlert()">Close</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery.js"></script>
<script>
    // get category

    jQuery('#select-product_type').change(function () {
        jQuery('#select_bb_type').html('');
        jQuery('#select_bb_model').html('<option value="">Select Model</option>');
        jQuery('#barebone-processor').html(
            '<input type="text" name="bb_processor" id="select-barebone-processor" class="form-control form-control-solid" value="" readonly>'
        );
        let inid = jQuery(this).val();
        jQuery.ajax({
            url: '/get/category',
            type: 'post',
            data: 'inid=' + inid + '&_token={{csrf_token()}}',
            success: function (result) {
                jQuery('#select_bb_type').html(result)
            }
        })
    });
    // get model
    jQuery('#select_bb_type').change(function () {
        let inid = jQuery(this).val();
        jQuery.ajax({
            url: '/get/model',
            type: 'post',
            data: 'inid=' + inid + '&_token={{csrf_token()}}',
            success: function (result) {
                jQuery('#select_bb_model').html(result)
            }
        })
    });
    // /get processor
    jQuery('#select_bb_model').change(function () {
        let inid = jQuery(this).val();
        jQuery.ajax({
            url: '/get/processor',
            type: 'post',
            data: 'inid=' + inid + '&_token={{csrf_token()}}',
            success: function (result) {
                jQuery('#barebone-processor').html(result)
            }
        })
    });









    function limiter(input) {
        if (input.value < 1) input.value = '';
        if (input.value > 1000) input.value = '';
    }

    function requisitionFormSubmit() {
        $('#error_bb_type').html('');
        $('#error_bb_model').html('');
        $('#error_bb_processor').html('');
        $('#error_ssd_type').html('');
        $('#error_m2_type').html('');
        $('#error_ssd_size').html('');
        $('#error_ram_type').html('');
        $('#error_ram_size').html('');
        $('#error_bus_speed').html('');
        $('#error_requisition_quantity').html('');
        $('#error_purpose_id').html('');
        var data = jQuery('#requisitionSubmitFrm').serialize();
        jQuery.ajax({
            url: '/admin/finished/product/requisition/store',
            data: data,
            type: 'post',
            success: function (result) {
                if (result.status == "success") {
                    $("#requisitionSubmitFrm").trigger("reset");
                    $('#requisitonModal').modal('hide');
                    $('#requisition_create_success_alert_modal').modal('show');
                    $('#requisition_table_data').html(result.html);
                } else if (result.status == "error") {
                    $.each(result.errors, function (i, error) {
                        $("#error_" + i).html(error);
                    });
                }

            }
        });
    }

    function verifyRQFrmBarcodeFieldFocus() {
        $("#verify_rq_frm_serial_input_field").focus();
    }

    function scanFormBarcodeVerify() {
        var text = $('#verify_rq_frm_serial_input_field').val();
        var rq_sl = $('#rq_frm_id').val();
        var rq_id = $('#rqId').val();
        if (text == rq_sl) {
            $('#verify_rq_frm_barcode_scan_id').val(text);
            jQuery.ajax({
                url: '/finished-product-requisition-form-barcode-check',
                data: 'rq_id=' + rq_id + '&_token=' + jQuery("[name='_token']").val(),
                type: 'post',
                success: function (result) {
                    if (result.status == 'success') {
                        $('#kt_drawer_requisition_creation_drawer').html(result.drawer_html);
                        $('#rqFrmBarcodeScannerModal').modal('hide');
                        $('#rq_form_barcode_scan_success_alert_modal').modal('show');
                    } else if (result.status == 'error') {
                        $("#rqFrmBarcodeScannerModal").css("opacity", "0");
                        $('#verify_rq_frm_barcode_scan_id').val('');
                        $('#verify_rq_frm_serial_input_field').val('');
                        $('#rq_form_barcode_scan_error_alert_modal').modal('show');
                        $('#rq_form_barcode_scan_error_title').html('Error!');
                        $('#rq_form_barcode_scan_error_text').html(
                            'Something went wrong! Please try again later.');
                    }

                }
            });
        } else {
            $("#rqFrmBarcodeScannerModal").css("opacity", "0");
            $('#verify_rq_frm_barcode_scan_id').val('');
            $('#verify_rq_frm_serial_input_field').val('');
            $('#rq_form_barcode_scan_error_alert_modal').modal('show');
            $('#rq_form_barcode_scan_error_title').html('Invalid!');
            $('#rq_form_barcode_scan_error_text').html('Please scanning a valid barcode!');
        }

    }

    function closeRQFrmBarcodeScanErrorAlert() {
        $('#rq_form_barcode_scan_error_alert_modal').modal('hide');
        $("#rqFrmBarcodeScannerModal").css("opacity", "1");
    }

    function closeSuccessRequisitionCreateAlert() {
        $('#requisition_create_success_alert_modal').modal('hide');
    }

    // requisition id get
    function getRQID(id) {
        var spinnerText =
            '<div class="spinner-container"><span class="loading-text me-3">LOADING</span><span><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></span></div>';
        $('#kt_drawer_requisition_creation_drawer').html(spinnerText);
        jQuery.ajax({
            url: '/admin/finished/product/get-rq-details-by-id',
            data: 'rq_id=' + id + '&_token=' + jQuery("[name='_token']").val(),
            type: 'post',
            success: function (result) {
                $('#kt_drawer_requisition_creation_drawer').html(result);
            }
        });

    }

    function openVerifyBarcodeScaningModal(rq_id, rq_qty, rq_size, rq_type) {
        $('#requisitionCreationBarcodeScannerModal').modal('show');
        $("#verify_rq_creation_skd_serial_input_field").focus();
        $('#verify_barcode_scan_id').val('');
        $('#verify_barcode_item_id').val('');
        $('#verify_rq_creation_skd_serial_input_field').val('');
        $('#rq_error_verify_barcode_item_id').html('');
        $('#rq_skd_serials_entry_number').val(0);
        $('#verify_rq_creation_number').val(rq_id);
        $('#rq_creation_qty').val(rq_qty);

        //checking for ram
        if (rq_type == '1') {
            $('#rq_skd_type').html(rq_qty + ' RAM');
            $('#rq_creation_type').val('ram');
            if (rq_size == '4') {
                $('#rq_creation_size').val(2); //4gb ram
            } else if (rq_size == '8') {
                $('#rq_creation_size').val(3); //8gb ram
            } else if (rq_size == '16') {
                $('#rq_creation_size').val(4); //16gb ram
            } else if (rq_size == '32') {
                $('#rq_creation_size').val(4); //32gb ram
            }
        }

        //checking for ssd
        if (rq_type == '2') {
            $('#rq_skd_type').html(rq_qty + ' SSD');
            $('#rq_creation_type').val('ssd');
            if (rq_size == '256') {
                $('#rq_creation_size').val(8); //256gb ssd
            } else if (rq_size == '512') {
                $('#rq_creation_size').val(9); //512gb ssd
            } else if (rq_size == '1') {
                $('#rq_creation_size').val(0); //1TB ssd
            }
        }

        //checking for barebone
        if (rq_type == '3') {
            $('#rq_skd_type').html(rq_qty + ' Barebone');
            $('#rq_creation_type').val('bb');
            $('#rq_creation_size').val(rq_size);
        }
    }


    function closeRQCreationBarcodeScannerModal() {
        $('#requisitionCreationBarcodeScannerModal').modal('hide');
    }

    function closeRQFrmBarcodeScannerModal() {
        $('#rqFrmBarcodeScannerModal').modal('hide');
    }

    // Barcode Field Auto Focus For Scanning SKD Items Barcode
    function verifyBarcodeFieldFocus() {
        document.getElementById("verify_rq_creation_skd_serial_input_field").focus();
    }

    // Enter Serial Number With Validation By Scanning Barcode
    function entryAllSKDSerialNumberForVerify() {
        var text = $('#verify_rq_creation_skd_serial_input_field').val();
        var br_c = $('#verify_barcode_scan_id').val();
        var total_serial_entry = parseInt($('#rq_skd_serials_entry_number').val());
        $('#verify_rq_creation_current_code').val(text);

        var verify_rq_creation_current_code = $('#verify_rq_creation_current_code').val();
        var verify_barcode_scan_id = $('#verify_barcode_scan_id').val();
        var rq_creation_qty = $('#rq_creation_qty').val();
        var rq_creation_type = $('#rq_creation_type').val();
        var rq_creation_size = $('#rq_creation_size').val();

        if (text) {
            jQuery.ajax({
                url: '/admin/finished/product/check/valid/barcode/for/requisition/creation',
                data: 'verify_rq_creation_current_code=' + verify_rq_creation_current_code +
                    '&verify_barcode_scan_id=' + verify_barcode_scan_id + '&rq_creation_qty=' +
                    rq_creation_qty + '&rq_creation_type=' + rq_creation_type + '&rq_creation_size=' +
                    rq_creation_size + '&_token=' + jQuery("[name='_token']").val(),
                type: 'post',
                success: function (result) {

                    if (result.status == 'success') {
                        $('#rq_skd_serials_entry_number').val(total_serial_entry + 1);
                        if (br_c) {
                            var n_br = br_c + ',' + text;
                            $('#verify_barcode_scan_id').val(n_br);
                            $("#verify_rq_creation_skd_serial_input_field").val('');
                        } else {
                            $('#verify_barcode_scan_id').val(text);
                            $("#rq_error_verify_barcode_item_id").html('');
                            $("#verify_rq_creation_skd_serial_input_field").val('');
                        }
                    } else if (result.status == 'error') {
                        // invalid barcode alert modal
                        $("#verify_rq_creation_skd_serial_input_field").val('');
                        $("#requisitionCreationBarcodeScannerModal").css("opacity", "0");
                        $('#rq_barcode_entry_verify_error_alert_modal').modal('show');
                        $('#rq_barcode_verify_error_modal_title').html(result.error_type);
                        $('#rq_barcode_verify_error_modal_text').html(result.message);
                        $("#verify_rq_creation_skd_serial_input_field").focus();
                    }

                }
            });
        } else {
            return false;
        }

    }

    // close RQ Barcode verify error alert modal
    function closeRQBarcodeEntryVerifyErrorAlertModal() {
        $('#rq_barcode_entry_verify_error_alert_modal').modal('hide');
        $("#requisitionCreationBarcodeScannerModal").css("opacity", "1");
        $("#verify_rq_creation_skd_serial_input_field").focus();
    }

    //open modal for scanning RQ Form
    function openModalForScanRQFrm(rq_sl, rq_id) {
        $('#rqFrmBarcodeScannerModal').modal('show');
        $('#rq_frm_id').val(rq_sl);
        $('#rqId').val(rq_id);
    }

    // add skd materials for confirmation after scanning barcode
    function submitRQSerialsForVerify() {
        $("#rq_error_verify_barcode_item_id").html('');
        var items_id = $("#verify_barcode_scan_id").val();
        var rq_creation_qty = $('#rq_creation_qty').val();
        var total_serial_entry = $('#rq_skd_serials_entry_number').val();
        if (items_id) {
            if (rq_creation_qty == total_serial_entry) {
                $('#verify_barcode_scan_id').val($('#verify_barcode_scan_id').val().replace(/^,/, '').replace(/,+$/, '')
                    .trim());
                var item_ids = $('#verify_barcode_scan_id').val().replace(/\n/g, ',').split(',');
                var rq_cr_skd_scanable_barcodes = $('#rq_creation_all_skd_scanable_barcodes').val();
                if (rq_cr_skd_scanable_barcodes) {
                    $('#rq_creation_all_skd_scanable_barcodes').val(rq_cr_skd_scanable_barcodes + ',' + item_ids);
                } else {
                    $('#rq_creation_all_skd_scanable_barcodes').val(item_ids);
                }
                var total_rq_cr_varyfied_number = parseInt($('#total_rq_creation_skd_stockout_varyfied_number').val());
                $('#total_rq_creation_skd_stockout_varyfied_number').val(total_rq_cr_varyfied_number + 1);
                var rq_type = $('#rq_creation_type').val();
                if (rq_type == 'ram') {
                    $('#rq_creation_verify_checkmark_ram').html(
                        '<button class="btn btn-secondary btn-sm" disabled><i class="fa-solid fa-check" style="color: #3ac104;font-size: 18px;"></i></button>'
                    );
                } else if (rq_type == 'ssd') {
                    $('#rq_creation_verify_checkmark_ssd').html(
                        '<button class="btn btn-secondary btn-sm" disabled><i class="fa-solid fa-check" style="color: #3ac104;font-size: 18px;"></i></button>'
                    );
                } else if (rq_type == 'bb') {
                    $('#rq_creation_verify_checkmark_bb').html(
                        '<button class="btn btn-secondary btn-sm" disabled><i class="fa-solid fa-check" style="color: #3ac104;font-size: 18px;"></i></button>'
                    );
                }

                $('#requisitionCreationBarcodeScannerModal').modal('hide');
            } else {
                // invalid barcode alert modal
                $("#verify_rq_creation_skd_serial_input_field").val('');
                $("#requisitionCreationBarcodeScannerModal").css("opacity", "0");
                $('#rq_barcode_entry_verify_error_alert_modal').modal('show');
                $('#rq_barcode_verify_error_modal_title').html('Error!');
                $('#rq_barcode_verify_error_modal_text').html('Please scaned all skd barcode.');
                $("#verify_rq_creation_skd_serial_input_field").focus();
            }
        } else {
            $("#rq_error_verify_barcode_item_id").html('Please scan skd items barcode!');
            return;
        }

    }


    function submitRQCreationVerify(rq_id) {
        var rq_creation_all_skd_scanable_barcodes = $('#rq_creation_all_skd_scanable_barcodes').val();
        var total_rq_varyfied_number = parseInt($('#total_rq_creation_skd_stockout_varyfied_number').val());
        if (total_rq_varyfied_number == 3) {
            jQuery.ajax({
                url: '/submit-rq-creation-request-verification',
                data: 'rq_id=' + rq_id + '&skd_serials=' + rq_creation_all_skd_scanable_barcodes + '&_token=' +
                    jQuery("[name='_token']").val(),
                type: 'post',
                success: function (result) {
                    if (result.status == 'success') {
                        $('#kt_drawer_requisition_creation_drawer').html(result.html_text);
                    }
                }
            });
        } else {
            // invalid barcode alert modal
            $('#rq_barcode_entry_verify_error_alert_modal').modal('show');
            $('#rq_barcode_verify_error_modal_title').html('Error!');
            $('#rq_barcode_verify_error_modal_text').html('You need to scan all skd items for submit verification.');
        }
    }

    // open requisition confirm alert message modal
    function confirmRQCreationAlertModal(rq_id) {
        $('#confirmRQCreationAlertModal').modal('show');
        $('#confirm_rq_id').val(rq_id);
    }

    // submit requisition confirm request
    function confirmRQCreationRequest() {
        var data = jQuery('#confirmRQCreationRequestFrm').serialize();
        jQuery.ajax({
            url: '/admin/finished/product/rq/creation/confirm',
            data: data,
            type: 'post',
            success: function (result) {
                if (result.status == 'success') {
                    if (result.all_confirm == 'yes') {
                        window.location.href = window.location.href;
                    } else if (result.all_confirm == 'no') {
                        $('#confirmRQCreationAlertModal').modal('hide');
                        $('#kt_drawer_requisition_creation_drawer').html(result.drawer_html);
                        $('#requisition_table_data').html(result.queueListHtml);
                    }
                } else if (result.status == 'error') {
                    if (result.allready_confirm == 'yes') {
                        alert('Already you confirmed this.');
                    }
                }
            }
        });
    }

    // reject requisition request
    function rejectRQCreationModal(rq_id) {
        $('#rejectRQCreationModal').modal('show');
        $('#reject_rq_id').val(rq_id);
    }

</script>
@endsection
