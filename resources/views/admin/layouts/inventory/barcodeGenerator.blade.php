@extends('admin.master')

@section('admin-content')
<style>
    .card .card-body {
        padding: 1rem 1.25rem;
        background: #ededed;
        padding-top: 3rem !important;
    }

    button:disabled,
    button[disabled] {
        cursor: pointer;
    }

    #br-qty {
        display: none;
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

    /* Loading Spinner Css Start */
    .spinner-container {
        min-width: 225px;
        position: absolute;
        top: 50%;
        left: 50%;
        text-align: center;
        transform: translate(-50%, -50%);
        display: none;
    }

    .loading-text {
        color: #808080;
        font: 2.25rem 'Montserrat' !important;
        letter-spacing: 3px;
    }

    /* Loading Spinner Css End*/


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

    #barcode-scan-field {
        display: none;
    }

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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Barcode Generator</h1>
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
                    <li class="breadcrumb-item text-dark">Barcode</li>
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
    <div class="post d-flex flex-column-fluid" id="kt_post inventory-setup-contain">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Products-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">

                        @if(App\Models\User::hasPermission(["skd_barcode_generate"]))
                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                            <button type="button" class="btn btn-md btn-primary" data-bs-toggle="modal"
                                data-bs-target="#barcodeGenerateModal" data-bs-whatever="@mdo">Generate Barcode</button>
                        </div>
                        @endif

                        @if(App\Models\User::hasPermission(["entry_skd"]))
                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                            <button type="button" class="btn btn-md btn-primary" data-bs-toggle="modal"
                                data-bs-target="#entryItemsModal" data-bs-whatever="@mdo">Entry SKD</button>
                        </div>
                        @endif
                        <!--end::Add product-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <!-- <div class="card-body pt-0">
                    <p>{!! DNS1D::getBarcodeSVG('$barcodes->serial_no', 'C128',1,60,'black') !!}</p>
                </div> -->


                <!--end::Card body-->
            </div>
            <!--end::Products-->
        </div>

        <!--end::Container-->
    </div>
    <!--end::Post-->

    <!-- Loading Spinner Start -->
    <div class="spinner-container">
        <span class="loading-text me-3">LOADING</span>
        <span>
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </span>
    </div>
    <!-- Loading Spinner End -->

</div>
<!--end::Content-->

<!-- Modal for Generate SKD Items Barcode-->
<div class="modal fade" id="barcodeGenerateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generate New Barcode</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">

                <form action="{{route('barcode.processing')}}" id="productRegForm" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="message-text" class="col-form-label">SKD Category</label>
                            <select id="select-box1" class="form-select form-select-solid coupon_status"
                                data-hide-search="true" data-placeholder="Status" name="skd_type"
                                data-kt-ecommerce-product-filter="status">
                                <option value="">Select Types</option>
                                <option value="skd_bb">Barebone</option>
                                <option value="skd_ram">RAM</option>
                                <option value="skd_ssd">SSD</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div id="skd_ram" class="tab-content1">
                                <label for="message-text" class="col-form-label">Ram Size</label>
                                <select class="form-select form-select-solid" data-hide-search="true"
                                    data-placeholder="Select Ram Size" name="skd_ram_sizes"
                                    data-kt-ecommerce-product-filter="status" id="ram_sizes"
                                    onclick="barcodeGenerateQtyField('ram')">
                                    <option value="">Select Ram Size</option>
                                    <option value="2">4 GB</option>
                                    <option value="3">8 GB</option>
                                    <option value="4">16 GB</option>
                                    <option value="5">32 GB</option>
                                </select>
                                <p id="error_ram_sizes"
                                    style="display:none; color: rgb(237, 61, 61); font-size: 14px; font-weight: 500;">

                                </p>
                            </div>
                            <div id="skd_ssd" class="tab-content1">
                                <label for="message-text" class="col-form-label">SSD Size</label>
                                <select class="form-select form-select-solid" data-hide-search="true"
                                    data-placeholder="Select Ram Size" name="skd_ssd_sizes"
                                    data-kt-ecommerce-product-filter="status" id="ssd_sizes"
                                    onclick="barcodeGenerateQtyField('ssd')">
                                    <option value="">Select SSD Size</option>
                                    <option value="8">256 GB</option>
                                    <option value="9">512 GB</option>
                                    <option value="0">1 TB</option>
                                </select>
                                <p id="error_ssd_sizes"
                                    style="display:none; color: rgb(237, 61, 61); font-size: 14px; font-weight: 500;">

                                </p>
                            </div>
                            <div id="skd_bb" class="tab-content1">
                                <label for="message-text" class="col-form-label">Barebone Processor</label>
                                <select class="form-select form-select-solid" data-hide-search="true"
                                    data-placeholder="Select Ram Size" name="skd_bb_sizes"
                                    data-kt-ecommerce-product-filter="status" id="bb_type"
                                    onclick="barcodeGenerateQtyField('bb')">
                                    <option value="">Select BB Type</option>
                                    <option value="3">i3</option>
                                    <option value="5">i5</option>
                                    <option value="7">i7</option>
                                </select>
                                <p id="error_bb_type"
                                    style="display:none; color: rgb(237, 61, 61); font-size: 14px; font-weight: 500;">

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    </div>
                    <div class="mb-3" id="br-qty">
                        <label for="message-text" class="col-form-label">Enter the Quantity Of Barcode you need to
                            Genarate</label>
                        <input type="text" name="qantity" id="qantity" class="form-control form-control-solid"
                            onkeyup="GetBarcodeValue()">
                    </div>
                    <p id="error" style="display:none; color: rgb(237, 61, 61); font-size: 14px; font-weight: 500;"></p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" style="cursor: pointer;" id="myBtn" type="submit" disabled
                            formtarget="_blank">Continue</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>



<!-- Modal for Entry SKD Materials -->
<div class="modal fade" id="entryItemsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" id="entrySkdModalBody">
        <div class="modal-content">
            <div class="modal-header" style="justify-content: center;">
                <h5 class="modal-title" id="exampleModalLabel">Entry SKD Details</h5>
            </div>
            <div class="modal-body">

                <form action="" id="entryItemsForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="recipient-name" class="col-form-label">Purchase ID</label>
                            <input type="text" name="purchase_id" id="purchase_id"
                                class="form-control form-control-solid">
                            <p class="text-danger mt-2" id="error-purchase_id"></p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="message-text" class="col-form-label">SKD Category</label>
                            <select id="select-box" class="form-select form-select-solid coupon_status"
                                data-hide-search="true" data-placeholder="Status" name="product_type"
                                data-kt-ecommerce-product-filter="status">
                                <option value="">Select Types</option>
                                <option value="Barebone">Barebone</option>
                                <option value="RAM">RAM</option>
                                <option value="SSD">SSD</option>
                            </select>
                            <p class="text-danger mt-2" id="error-product_type"></p>
                        </div>
                    </div>

                    <div class="row">

                        <div id="SSD" class="tab-content">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="message-text" class="col-form-label">SSD Brand</label>
                                    <select id="select-ssd_brand" class="form-select form-select-solid coupon_status"
                                        data-hide-search="true" name="ssd_brand" data-placeholder="Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="">Select Brand</option>
                                        @foreach($ssd_brand as $key=> $brand)
                                        <option value="{{$brand->brand}}">{{$brand->brand}}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger mt-2" id="error-ssd_brand"></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="message-text" class="col-form-label">SSD Type</label>
                                    <select id="select_ssd_type" class="form-select form-select-solid coupon_status"
                                        data-hide-search="true" name="ssd_type" data-placeholder="Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="">Select Type</option>
                                        @foreach($ssd_type as $key=> $type)
                                        <option value="{{$type->skd_type}}">{{$type->skd_type}}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger mt-2" id="error-ssd_type"></p>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="message-text" class="col-form-label">M.2 Type</label>
                                    <select id="select_m2_type" class="form-select form-select-solid coupon_status"
                                        data-hide-search="true" name="m2_type" data-placeholder="Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="">Select M.2</option>
                                        @foreach($m2_type as $key=> $type)
                                        <option value="{{$type->skd_others}}">{{$type->skd_others}}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger mt-2" id="error-m2_type"></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="message-text" class="col-form-label">SSD Size</label>
                                    <select onchange="showScanField('ssd')" id="select-ssd-size"
                                        class="form-select form-select-solid coupon_status" data-hide-search="true"
                                        name="ssd_size" data-placeholder="Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="">Select Size</option>
                                        @foreach($ssd_size as $key=> $size)
                                        <option value="{{$size->skd_size}}">
                                            {{$size->skd_size}} {{($size->skd_size)<= 10?'TB':'GB'}}
                                        </option>

                                        @endforeach
                                    </select>
                                    <p class="text-danger mt-2" id="error-ssd_size"></p>
                                </div>
                            </div>
                        </div>

                        <div id="RAM" class="tab-content">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="message-text" class="col-form-label">Ram Brand</label>
                                    <select id="select_ram_brand" class="form-select form-select-solid coupon_status"
                                        data-hide-search="true" name="ram_brand" data-placeholder="Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="">Select Brand</option>
                                        @foreach($ram_brand as $key=> $brand)
                                        <option value="{{$brand->brand}}">{{$brand->brand}}</option>
                                        @endforeach

                                    </select>
                                    <p class="text-danger mt-2" id="error-ram_brand"></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="message-text" class="col-form-label">Ram Type</label>
                                    <select id="select_ram_type" class="form-select form-select-solid coupon_status"
                                        data-hide-search="true" name="ram_type" data-placeholder="Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="">Select Type</option>
                                        @foreach($ram_type as $key=> $type)
                                        <option value="{{$type->skd_type}}">{{$type->skd_type}}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger mt-2" id="error-ram_type"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="message-text" class="col-form-label">Ram Size</label>
                                    <select onchange="showScanField('ram')" id="select-ram-size"
                                        class="form-select form-select-solid coupon_status" data-hide-search="true"
                                        name="ram_size" data-placeholder="Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="">Select Size</option>
                                        @foreach($ram_size as $key=> $size)
                                        <option value="{{$size->skd_size}}">{{$size->skd_size}} GB</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger mt-2" id="error-ram_size"></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="message-text" class="col-form-label">Bus Speed</label>
                                    <select id="bus_speed" class="form-select form-select-solid coupon_status"
                                        data-hide-search="true" name="bus_speed" data-placeholder="Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="">Select Speed</option>
                                        @foreach($ram_speed as $key=> $speed)
                                        <option value="{{$speed->skd_others}}">{{$speed->skd_others}} MHz</option>
                                        @endforeach
                                    </select>
                                    <!-- <input type="text" name="bus_speed" id="bus_speed"
                                        class="form-control form-control-solid"> -->
                                    <p class="text-danger mt-2" id="error-bus_speed"></p>
                                </div>
                            </div>
                        </div>
                        <div id="Barebone" class="tab-content">
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="message-text" class="col-form-label">Barebone Brand</label>
                                    <select id="select_bb_brand" class="form-select form-select-solid coupon_status"
                                        data-hide-search="true" name="bb_brand" data-placeholder="Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="">Select Brand</option>
                                        @foreach($barebone_brand as $key=> $brand)
                                        <option value="{{$brand->brand}}">{{$speed->brand}}</option>
                                        @endforeach

                                    </select>
                                    <p class="text-danger mt-2" id="error-bb_brand"></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="message-text" class="col-form-label">Barebone Series</label>
                                    <select id="select_bb_type" class="form-select form-select-solid coupon_status"
                                        data-hide-search="true" name="bb_type" data-placeholder="Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="">Select Series</option>
                                        @foreach($Product_Series as $key=> $Series_Name)
                                        <option value="{{$Series_Name->series}}">{{$Series_Name->series}}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger mt-2" id="error-bb_type"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="message-text" class="col-form-label">Barebone Model</label>
                                    <select id="select_bb_model" onchange="showScanField('barebone')"
                                        class="form-select form-select-solid coupon_status" data-hide-search="true"
                                        name="bb_model" data-placeholder="Status"
                                        data-kt-ecommerce-product-filter="status">
                                        <option value="">Select Model</option>
                                    </select>
                                    <p class="text-danger mt-2" id="error-bb_model"></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="message-text" class="col-form-label">Barebone Processor</label>
                                    <p id="barebone-processor">
                                        <input class="form-control form-control-solid" id="select-barebone-processor"
                                            readonly />
                                    </p>
                                    <p class="text-danger mt-2" id="error-bb_processor"></p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="mb-3" id="barcode-scan-field">
                        <label for="recipient-name" class="col-form-label">Scan SKD's Barcode</label>
                        <textarea type="text" name="barcode_scan_id" id="barcode_scan_id" readonly
                            onclick="barcodeFieldFocus()" class="form-control form-control-solid" rows="6" cols="5"
                            placeholder="Example :&#x0a;XX450XXXXX,XX450XXXXX"></textarea>
                        <div id="error-barcode_item_id" class="text-danger mb-2 mt-3"></div>
                    </div>
                    <textarea type="text" name="barcode_item_id" id="barcode_item_id"
                        class="form-control form-control-solid" rows="1" cols="5" style="display: none;"></textarea>
                    <input style="background: transparent;border: none;outline: none;color: #1E1E2D;" type="text"
                        class="test" id="serial_number_input_field" value="" onchange="entryAllSerialNumber()" />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="closeEntryItemsModal()">Close</button>
                        <button class="btn btn-primary" type="button" onclick="addSKDMaterials()">Continue</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- SKD Barcode Scaning Error Modal-->
<div class="modal fade " id="barcode_entry_error_alert_modal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="barcode_entry_error_alert_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h1 class="text-center error-cross-icon"><i class="fa-solid fa-xmark"
                        style="color: #ff00008a;font-size: 30px;"></i></h1>
                <h1 class="text-center mt-5" id="barcode_error_modal_title">Double Entry!</h1>
                <p class="text-center mt-5" id="barcode_error_modal_text">You already scan this barcode. Please try new
                    one.</p>
            </div>
            <div class="mx-auto mt-5 mb-5">
                <button type="button" class="btn btn-secondary" style="margin-bottom: 20px;" data-bs-dismiss="modal"
                    onclick="closeBarcodeEntryErrorAlertModal()">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- SKD Entry Success Modal-->
<div class="modal fade " id="skd_entry_success_alert_modal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="skd_entry_success_alert_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="subscribe_success_circle">
                    <img style="padding-top: 11px;padding-left: 10px;" src="{{ asset('success_icon.png') }}"
                        alt="success" />
                </div>

                <h1 class="text-center mt-5">Success!</h1>
                <p class="text-center mt-5 lh-lg">Total <span id="total_skd_entry_number">0</span> Pcs SKD successfully
                    entry. <span id="skd_entry_message">Now Need to confirmation for add into inventory.</span></p>
            </div>
            <div class="mx-auto mt-5 mb-5">
                <button type="button" class="btn btn-secondary" style="margin-bottom: 20px;" data-bs-dismiss="modal"
                    onclick="closeSuccessBarcodeEntryAlert()">OK</button>
            </div>
        </div>
    </div>
</div>



<!-- Script Start -->

<script type="text/javascript" src="https://code.jquery.com/jquery.js"></script>
<script>
    // Barcode Generate Qty Field Function
    function barcodeGenerateQtyField(type) {
        $('#qantity').val('');
        $('#error').html('');
        if (type == 'ram') {
            let ram_sizes = $("#ram_sizes").val();
            if (ram_sizes != '') {
                var ram_sizes_error = document.getElementById("error_ram_sizes");
                ram_sizes_error.style.display = "none";
                $("#br-qty").css("display", "block");
            } else if (ram_sizes == '') {
                var ram_sizes_error = document.getElementById("error_ram_sizes");
                ram_sizes_error.style.display = "block";
                $("#br-qty").css("display", "none");
                $("#myBtn").attr("disabled", true);
            }
        } else if (type == 'ssd') {
            let ssd_sizes = $("#ssd_sizes").val();
            if (ssd_sizes != '') {
                var ssd_sizes_error = document.getElementById("error_ssd_sizes");
                ssd_sizes_error.style.display = "none";
                $("#br-qty").css("display", "block");
            } else if (ssd_sizes == '') {
                var ssd_sizes_error = document.getElementById("error_ssd_sizes");
                ssd_sizes_error.style.display = "block";
                $("#br-qty").css("display", "none");
                $("#myBtn").attr("disabled", true);
            }
        } else if (type == 'bb') {
            let bb_type = $("#bb_type").val();
            if (bb_type != '') {
                var bb_type_error = document.getElementById("error_bb_type");
                bb_type_error.style.display = "none";
                $("#br-qty").css("display", "block");
            } else if (bb_type == '') {
                var bb_type_error = document.getElementById("error_bb_type");
                bb_type_error.style.display = "block";
                $("#br-qty").css("display", "none");
                $("#myBtn").attr("disabled", true);
            }
        }
    }


    // Retrive Barcode Qty with validation
    function GetBarcodeValue() {
        let x = $("#qantity").val();
        let y = $("#ram_sizes").val();
        if (x != '') {
            if (x <= 30) {
                var block = document.getElementById("error");

                block.style.display = "none";
                document.getElementById("myBtn").disabled = false;

            } else {
                var block = document.getElementById("error");
                block.style.display = "block";
                block.innerHTML = 'Enter the Quantity Of Barcode less then 30';
                document.getElementById("myBtn").disabled = true;
            }
        } else {
            var block = document.getElementById("error");
            block.style.display = "block";
            block.innerHTML = 'Enter the Quantity Of Barcode you need to Genarate';
            var btn = document.getElementById("myBtn");
            btn.style.cursor = 'pointer';
            btn.disabled = true;
        }
        btnunlock(x);
    }

    // Barcode Field Auto Focus For Scanning SKD Items Barcode
    function barcodeFieldFocus() {
        $("#serial_number_input_field").focus();
    }

    // Enter Serial Number With Validation By Scanning Barcode
    function entryAllSerialNumber() {
        var text = $('#serial_number_input_field').val();
        // alert(text);
        var br_c = $('#barcode_scan_id').val();
        var skd_name = $('#select-box').val();

        var skd_type_val = '';
        if (skd_name == 'RAM') {
            skd_type_val = $('#select-ram-size').val();
        } else if (skd_name == 'SSD') {
            skd_type_val = $('#select-ssd-size').val();
        } else if (skd_name == 'Barebone') {

            skd_type_val = $('#select-barebone-processor').val();
        }
        if (text) {
            jQuery.ajax({
                url: '/check-valid-barcode-entry',
                data: 'bar_codes=' + br_c + '&cur_code=' + text + '&skd_name=' + skd_name + '&skd_type_val=' +
                    skd_type_val + '&_token=' + jQuery("[name='_token']").val(),
                type: 'post',
                success: function (result) {

                    // invalid barcode alert modal
                    if (result.status == "not_valid") {
                        $("#serial_number_input_field").val('');
                        $("#entrySkdModalBody").css("opacity", "0");
                        $('#barcode_entry_error_alert_modal').modal('show');
                        $('#barcode_error_modal_title').html('Invalid Barcode!');
                        $('#barcode_error_modal_text').html(
                            'Your barcode is not valid. Please scan a valid barcode.');
                        $("#serial_number_input_field").focus();
                    }

                    // already exists barcode alert modal
                    if (result.status == "already_exist") {
                        $("#serial_number_input_field").val('');
                        $("#entrySkdModalBody").css("opacity", "0");
                        $('#barcode_entry_error_alert_modal').modal('show');
                        $('#barcode_error_modal_title').html('Already Exist!');
                        $('#barcode_error_modal_text').html(
                            'Your barcode is already entry before. Please try new one.');
                        $("#serial_number_input_field").focus();
                    }

                    // double entry barcode alert modal
                    if (result.status == "present") {
                        $("#serial_number_input_field").val('');
                        $("#entrySkdModalBody").css("opacity", "0");
                        $('#barcode_entry_error_alert_modal').modal('show');
                        $('#barcode_error_modal_title').html('Double Entry!');
                        $('#barcode_error_modal_text').html(
                            'You already scan this barcode. Please try new one.');
                        $("#serial_number_input_field").focus();
                    }

                    //add valid serial number into skd scanner field
                    if (result.status == "not_present") {
                        if (br_c) {
                            var n_br = br_c + ',' + text;
                            $('#barcode_scan_id').val(n_br);
                            $("#serial_number_input_field").val('');
                        } else {
                            $('#barcode_scan_id').val(text);
                            $("#error-barcode_item_id").html('');
                            $("#serial_number_input_field").val('');
                        }

                    }

                }
            });
        } else {
            return false;
        }

    }

    // close Error Message Modal for invalid barcode scanning
    function closeBarcodeEntryErrorAlertModal() {
        $('#barcode_entry_error_alert_modal').modal('hide');
        $("#entrySkdModalBody").css("opacity", "1");
        $("#serial_number_input_field").focus();
    }

    // close Success Message Modal for valid barcode scanning
    function closeSuccessBarcodeEntryAlert() {
        $('#skd_entry_success_alert_modal').modal('hide');
        $("#entrySkdModalBody").css("opacity", "1");
        $("#select-box").val('');
        $("#purchase_id").val('');
        $("#select_ssd_type").val('');
        $("#select_m2_type").val('');
        $("#select_ssd_size").val('');
        $("#select_ram_type").val('');
        $("#select-ram-size").val('');
        $("#bus_speed").val('');
        $("#select_bb_type").val('');
        $("#bb_model").val('');
        $("#select-barebone-processor").val('');
        $(".tab-content").css("display", "none");
        $("#barcode-scan-field").css("display", "none");
    }

    function closeEntryItemsModal() {
        $("#error-purchase_id").html('');
        $("#error-product_type").html('');
        $("#error-ssd_type").html('');
        $("#error-m2_type").html('');
        $("#error-ssd_size").html('');
        $("#error-ram_type").html('');
        $("#error-ram_size").html('');
        $("#error-ram_brand").html('');
        $("#error-bus_speed").html('');
        $("#error-bb_type").html('');
        $("#error-bb_model").html('');
        $("#error-bb_processor").html('');
        $("#error-barcode_item_id").html('');
        $("#select-box").val('');
        $("#purchase_id").val('');
        $("#select_ssd_type").val('');
        $("#select_m2_type").val('');
        $("#select_ssd_size").val('');
        $("#select_ram_type").val('');
        $("#select-ram-size").val('');
        $("#bus_speed").val('');
        $("#select_bb_type").val('');
        $("#bb_model").val('');
        $("#select-barebone-processor").val('');
        $(".tab-content").css("display", "none");
        $("#barcode-scan-field").css("display", "none");
        $("#entryItemsModal").modal('hide');
    }


    $('.tab-content').hide();

    //show the tab content depend on SKD Type
    $('#select-box').change(function () {
        dropdown = $('#select-box').val();
        if (dropdown == '') {
            $('#barcode_scan_id').val('');
            $('#barcode-scan-field').css("display", "none");
        }

        //first hide all tabs again when a new option is selected
        $('.tab-content').hide();
        //then show the tab content of whatever option value was selected
        $('#' + dropdown).show();
    });

    // Display/Show SKD Barcode Scanning Field
    function showScanField(type) {
        if (type == 'ram') {
            let ram_size = $('#select-ram-size').val();
            if (ram_size == '') {
                $('#barcode_scan_id').val('');
                $('#barcode-scan-field').css("display", "none");
            } else {
                let skd_type = $('#select-box').val();
                if (skd_type == '') {
                    $('#barcode_scan_id').val('');
                    $('#barcode-scan-field').css("display", "none");
                } else {
                    $('#barcode_scan_id').val('');
                    $('#barcode-scan-field').css("display", "block");
                }
            }
        } else if (type == 'ssd') {
            let ssd_size = $('#select-ssd-size').val();
            if (ssd_size == '') {
                $('#barcode_scan_id').val('');
                $('#barcode-scan-field').css("display", "none");
            } else {
                let skd_type = $('#select-box').val();
                if (skd_type == '') {
                    $('#barcode_scan_id').val('');
                    $('#barcode-scan-field').css("display", "none");
                } else {
                    $('#barcode_scan_id').val('');
                    $('#barcode-scan-field').css("display", "block");
                }
            }
        } else if (type == 'barebone') {
            let barebone_model = $('#select_bb_model').val();

            if (barebone_model == '') {
                $('#barcode_scan_id').val('');
                $('#barcode-scan-field').css("display", "none");
            } else {
                let skd_type = $('#select-box').val();
                if (skd_type == '') {
                    $('#barcode_scan_id').val('');
                    $('#barcode-scan-field').css("display", "none");
                } else {
                    $('#barcode_scan_id').val('');
                    $('#barcode-scan-field').css("display", "block");
                }
            }
        }

    }


    // add skd materials for confirmation after scanning barcode
    function addSKDMaterials() {
        $('#entryItemsModal').modal('hide');
        $('#inventory-setup-contain').css("display", "none");
        $('.spinner-container').css("display", "block");
        $("#error-purchase_id").html('');
        $("#error-product_type").html('');
        $("#error-ssd_type").html('');
        $("#error-m2_type").html('');
        $("#error-ssd_size").html('');
        $("#error-ram_type").html('');
        $("#error-ram_size").html('');
        $("#error-ram_brand").html('');
        $("#error-bus_speed").html('');
        $("#error-bb_type").html('');
        $("#error-bb_model").html('');
        $("#error-bb_processor").html('');
        $("#error-barcode_item_id").html('');
        var items_id = $("#barcode_scan_id").val();
        $('#barcode_scan_id').val($('#barcode_scan_id').val().replace(/^,/, '').replace(/,+$/, '').trim());
        let item_ids = $('#barcode_scan_id').val().replace(/\n/g, ',').split(',');
        $('#barcode_item_id').val(item_ids);
        var data = jQuery('#entryItemsForm').serialize();
        jQuery.ajax({
            url: '/add-skd-items',
            data: data,
            type: 'post',
            success: function (result) {
                $('#entryItemsModal').modal('show');
                $('#inventory-setup-contain').css("display", "block");
                $('.spinner-container').css("display", "none");
                if (result.status == "error") {
                    $.each(result.errors, function (i, error) {
                        $("#error-" + i).html(error);
                    });
                } else if (result.status == "success") {
                    $('#barcode_entry_error_alert_modal').modal('hide');
                    $("#entrySkdModalBody").css("opacity", "0");
                    $('#skd_entry_success_alert_modal').modal('show');
                    $('#total_skd_entry_number').html(result.total_entry);
                    if (result.confermation_needed == 'yes') {
                        $('#skd_entry_message').html(' Now Need to confirmation for add into inventory.')
                    } else {
                        $('#skd_entry_message').html(' And also skd added into inventory.')
                    }


                }

            }
        });

    }


    $('.tab-content1').hide();
    //show the first tab content
    $('#select-box1').change(function () {
        dropdown = $('#select-box1').val();
        //first hide all tabs again when a new option is selected
        $('.tab-content1').hide();
        //then show the tab content of whatever option value was selected
        $('#' + dropdown).show();
    });


    $("input").on("paste", function (e) {

        // var c_v = $('#serial_number_input_field').val();
        // alert(c_v);
    });

    // get model
    jQuery(document).ready(function () {

        jQuery('#select_bb_type').change(function () {
            jQuery('#select_bb_model').html('');
            jQuery('#barebone-processor').html(
                ' <input class="form-control form-control-solid" id="select-barebone-processor" readonly />'
            );
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
    });
    // get processor
    jQuery(document).ready(function () {

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
    });

</script>

@endsection
