@extends('admin.master')

@section('admin-content')


<style>
    input[type="date"] {
        position: relative;
        padding: 10px;
    }

    ::-webkit-calendar-picker-indicator {
        filter: invert(0.8);
    }

    .table.table-row-bordered tr {
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-bottom-color: #2b2b4000;
    }

    .shipping-modal {
        transition: opacity .15s linear !important;
        background: #5e5e5e42 !important;
        backdrop-filter: blur(15px) !important;
    }

    .main_item_height {
        height: 100px;
    }

    .sub_item_height {
        height: 100px;
    }

    .serial_err {
        display: none;
        margin-top: 5px;
    }

    .order-cancel-modal-nobtn {
        padding-left: 40px !important;
        padding-right: 40px !important;
        margin-right: 20px;
    }

    .order-cancel-modal-yesbtn {
        padding-left: 40px !important;
        padding-right: 40px !important;
    }

    .modal-header.center-text {
        place-content: center;
        padding: 30px;
    }

    .modal-footer {
        padding: 0px !important;
        padding-top: 16px !important;
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

    .order-cancel-modal-title {
        /* padding-top: 50px !important; */
    }

    .order-cancel-modal-text {
        padding-bottom: 30px;
    }

    .order-cancel-btn-field {
        padding-bottom: 40px;
    }

    .refund-modal-title {
        padding-top: 40px !important;
        font-weight: 400 !important;
    }

    .product-return-field {
        margin-right: 3rem !important;
    }

    .hr-line {
        width: 275px;
        margin: 15px auto;
    }

    .refund-continue-btn-field {
        padding-bottom: 30px;
    }

    .return-product-modal-text {
        color: rgb(177 167 167);
        font-weight: 300;
    }

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }


    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .refund-amount {
        width: 300px;
        height: 30px;
        margin: 0 auto;
    }

    .refund-note-textbox {
        width: 300px;
        height: 50px;
        margin: 0 auto;
    }

    #return-note {
        display: none;
    }

    #return-amount {
        display: none;
    }

    #note-err-area {
        display: none;
    }

    #amount-err-area {
        display: none;
    }

    #return-product-err-area {
        display: none;
    }

    #refund-type-err-area {
        display: none;
    }

    @media (max-width: 480px) {
        .main_item_height {
            height: 220px;
        }

        .sub_item_height {
            height: 80px;
        }
    }

    @media (min-width: 821px) and (max-width: 1280) {
        .main_item_height {
            height: 200px;
        }
    }

</style>

<script>
    function serialCheck(sl) {
        var serial_n = document.getElementById('product_serial_hidden_' + sl).value;
        var all_valid_product_serials = document.getElementById('all_valid_product_serial').value;
        var product_id = document.getElementById('product_id_'+sl).value;
        var product_scaned = document.getElementById('product_serial_'+sl).value;
        if(product_scaned){
            $('#warrantCardIssueModal').css('opacity','0');
            $('#product_serial_hidden_'+sl).val('');
            $('#shipment_product_scanned_error_modal').modal('show');
            $('#shipment_product_scanned_error_modal_title').html('Error!');
            $('#shipment_product_scanned_error_modal_text').html('Already scanned this product.');
        } else {
            if (serial_n) {
                jQuery.ajax({
                    type: 'post',
                    url: '/check_product_serial',
                    data: 'cur_serial_number=' + serial_n + '&all_product_serials=' + all_valid_product_serials + '&product_id=' + product_id + '&_token=' + jQuery("[name='_token']").val(),
                    success: function (result) {
                        if (result.status == 'success') {
                            $('#product_serial_'+sl).val(serial_n);
                            $('#product_serial_hidden_' + sl).val('');
                            if(all_valid_product_serials) {
                                var update_all_serial = all_valid_product_serials + "," + serial_n;
                                $('#all_valid_product_serial').val(update_all_serial);
                            } else {
                                $('#all_valid_product_serial').val(serial_n);
                            }
                        } else if(result.status == 'error') {
                            document.getElementById('product_serial_'+sl).value = '';
                            document.getElementById('product_serial_hidden_' + sl).value = '';
                            $('#warrantCardIssueModal').css('opacity','0');
                            $('#shipment_product_scanned_error_modal').modal('show');
                            $('#shipment_product_scanned_error_modal_title').html(result.error_type);
                            $('#shipment_product_scanned_error_modal_text').html(result.message);
                        }
                        // if (result.status == 'success') {
                        //     if (result.serialExist == 'yes') {
                        //         $('#serial_err_' + sl).style.display = 'block';
                        //         $('#serial_exist_' + sl).value = '1';
                        //     } else {
                        //         $('#serial_err_' + sl).style.display = 'none';
                        //         $('#serial_exist_' + sl).value = '0';
                        //     }
                        // }
                    }
                });
            } else {
                return;
            }
        }
    }
</script>


<!--begin::Content-->
<!-- <div class="content d-flex flex-column flex-column-fluid" id="kt_content"> -->
<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Order Details</h1>
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
                <li class="breadcrumb-item text-dark">Order Details</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <a href="{{route('admin.order.listing')}}" class="btn  btn-light-primary btn-sm ms-auto me-lg-n1">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="24" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                        fill="currentColor" />
                </svg>Back
            </span>
            <!--end::Svg Icon-->
        </a>
    </div>

    <!--end::Container-->
</div>
<!--end::Toolbar-->


@php
$time = substr(time(),-4);
$invoice_id= 'INV'.rand(0000,9999).$time;
@endphp


<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Order details page-->
        <div class="d-flex flex-column gap-7 gap-lg-10">
            <div class="d-flex flex-wrap flex-stack gap-5 gap-lg-10">
                <!--begin:::Tabs-->
                <ul
                    class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-lg-n2 me-auto">
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                            href="#kt_ecommerce_sales_order_summary">Order Summary</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <!--end:::Tab item-->
                </ul>
                <!--end:::Tabs-->
                <!--begin::Button-->


                <!-- <a href="" class="btn btn-light-primary btn-sm me-lg-n7">Edit Order</a>
										<a href="{{route('admin.order.add')}}" class="btn btn-light-primary btn-sm">Add New Order</a> -->

            </div>
            <!--begin::Order summary-->
            <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                <!--begin::Order details-->
                <div class="card card-flush py-4 flex-row-fluid">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Order Details</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                <!--begin::Table body-->
                                <tbody class="fw-bold text-gray-600">
                                    <!--begin::Date-->
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/files/fil002.svg-->
                                                <span class="svg-icon svg-icon-2 me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                                        viewBox="0 0 20 21" fill="none">
                                                        <path opacity="0.3"
                                                            d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->Date Added</div>
                                        </td>
                                        <td class="fw-bolder text-end">{{date('d/m/Y',strtotime($orderData->date))}}
                                        </td>
                                    </tr>
                                    <!--end::Date-->
                                    <!--begin::Payment method-->
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/finance/fin008.svg-->
                                                <span class="svg-icon svg-icon-2 me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3"
                                                            d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z"
                                                            fill="currentColor" />
                                                        <path opacity="0.3"
                                                            d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->Order No</div>
                                        </td>
                                        <td class="fw-bolder text-end">{{$orderData->order_no}}

                                    </tr>
                                    <?php if($orderData->invoice){?>
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/finance/fin008.svg-->
                                                <span class="svg-icon svg-icon-2 me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3"
                                                            d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z"
                                                            fill="currentColor" />
                                                        <path opacity="0.3"
                                                            d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->Invoice No</div>
                                        </td>
                                        <td class="fw-bolder text-end">{{$orderData->invoice}}

                                    </tr>
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/files/fil002.svg-->
                                                <span class="svg-icon svg-icon-2 me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                                        viewBox="0 0 20 21" fill="none">
                                                        <path opacity="0.3"
                                                            d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->Invoice date</div>
                                        </td>
                                        <td class="fw-bolder text-end">
                                            {{date('d/m/Y',strtotime($orderData->invoice_date))}}
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <!--end::Payment method-->
                                    <!--begin::Date-->
                                    <!-- <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                         
                                                <span class="svg-icon svg-icon-2 me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M20 8H16C15.4 8 15 8.4 15 9V16H10V17C10 17.6 10.4 18 11 18H16C16 16.9 16.9 16 18 16C19.1 16 20 16.9 20 18H21C21.6 18 22 17.6 22 17V13L20 8Z"
                                                            fill="currentColor" />
                                                        <path opacity="0.3"
                                                            d="M20 18C20 19.1 19.1 20 18 20C16.9 20 16 19.1 16 18C16 16.9 16.9 16 18 16C19.1 16 20 16.9 20 18ZM15 4C15 3.4 14.6 3 14 3H3C2.4 3 2 3.4 2 4V13C2 13.6 2.4 14 3 14H15V4ZM6 16C4.9 16 4 16.9 4 18C4 19.1 4.9 20 6 20C7.1 20 8 19.1 8 18C8 16.9 7.1 16 6 16Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                             Shipping Method</div>
                                        </td>
                                        <td class="fw-bolder text-end">{{$orderData->shipping_method}}</td>
                                    </tr> -->
                                    <!--end::Date-->
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Order details-->
                <!--begin::Customer details-->
                <div class="card card-flush py-4 flex-row-fluid">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Customer Details</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                <!--begin::Table body-->
                                <tbody class="fw-bold text-gray-600">
                                    <!--begin::Customer name-->
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                <span class="svg-icon svg-icon-2 me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3"
                                                            d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->Customer</div>
                                        </td>
                                        <td class="fw-bolder text-end">
                                            <div class="d-flex align-items-center justify-content-end">
                                                <!--begin:: Avatar -->
                                                <div class="symbol symbol-circle symbol-25px overflow-hidden me-3">
                                                    <a href="../../demo1/dist/apps/ecommerce/customers/details.html">
                                                        <div class="symbol-label">
                                                            <img src="{{(!empty($orderData['customer']['avatar']))?url($orderData['customer']['avatar']):url('/avatar.png')}}"
                                                                alt="Dan Wilson" class="w-100" />
                                                        </div>
                                                    </a>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Name-->
                                                <a href="../../demo1/dist/apps/ecommerce/customers/details.html"
                                                    class="text-gray-600 text-hover-primary">{{$orderData['customer']['name']}}</a>
                                                <!--end::Name-->
                                            </div>
                                        </td>
                                    </tr>
                                    <!--end::Customer name-->
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                <span class="svg-icon svg-icon-2 me-2">
                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Shield-check.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path
                                                                d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                                                fill="currentColor" opacity="0.3" />
                                                            <path
                                                                d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z"
                                                                fill="currentColor" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon--></span>
                                                <!--end::Svg Icon-->User Type</div>
                                        </td>
                                        <td class="fw-bolder text-end">
                                            <a href="../../demo1/dist/apps/user-management/users/view.html"
                                                class="text-gray-600 text-hover-primary">
                                                <?php if($orderData['customer']['user_type_status'] == 'reg'){?>
                                                Registered user
                                                <?php } else {?>
                                                Guest user
                                                <?php } ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <!--begin::Customer email-->
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                <span class="svg-icon svg-icon-2 me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3"
                                                            d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->Email</div>
                                        </td>
                                        <td class="fw-bolder text-end">
                                            <a href="../../demo1/dist/apps/user-management/users/view.html"
                                                class="text-gray-600 text-hover-primary">{{$orderData['customer']['email']}}</a>
                                        </td>
                                    </tr>
                                    <!--end::Payment method-->
                                    <!--begin::Date-->
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/electronics/elc003.svg-->
                                                <span class="svg-icon svg-icon-2 me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M5 20H19V21C19 21.6 18.6 22 18 22H6C5.4 22 5 21.6 5 21V20ZM19 3C19 2.4 18.6 2 18 2H6C5.4 2 5 2.4 5 3V4H19V3Z"
                                                            fill="currentColor" />
                                                        <path opacity="0.3" d="M19 4H5V20H19V4Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->Phone</div>
                                        </td>
                                        <td class="fw-bolder text-end">{{$orderData['customer']['phone']}}</td>
                                    </tr>
                                    <!--end::Date-->
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Customer details-->
                <!--begin::Documents-->
                <div class="card card-flush py-4 flex-row-fluid min-w-350px">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Order Status</h2>

                        </div>

                    </div>
                    <div class=" mx-5 px-5 card-title">
                        <?php if($orderData->refund_request == 'Order Refunded'){?>
                        <h2 class=" badge badge-light-success">{{$orderData->refund_request}}</h2>
                        <?php } else {?>
                        <h2 class=" badge badge-light-success">{{ucfirst($orderData->delivery_status)}}</h2>
                        <?php }?>
                    </div>
                    <!--end::Card header-->
                    <!-- status edit -->
                    <!--begin::Form-->
                    <form action="{{ route('admin.order.update',$orderData->id) }}" method="POST"
                        enctype="multipart/form-data" id="choice_form" class="form d-flex flex-column flex-lg-row">
                        <!-- <form id="kt_ecommerce_edit_order_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="../../demo1/dist/apps/ecommerce/sales/listing.html"> -->
                        <!--begin::Aside column-->
                        @csrf
                        <input type="hidden" name="order_id_no" value="{{$orderData->order_no}}">

                        <div class="w-100 flex-lg-row-auto w-lg-300px mb-7 me-2 me-lg-1">
                            <!--begin::Order details-->
                            <div class="card card-flush py-4">

                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class="d-flex flex-column gap-10">
                                        <!--begin::Input group-->

                                        <div class="fv-row">
                                            <!--begin::Label-->
                                            @if($orderData->delivery_status == 'pending' && $orderData->comments ==
                                            '' )
                                            <label class=" form-label">Select Capture For Shipment Process</label>
                                            @endif
                                            @if($orderData->delivery_status == 'processing' && $orderData->comments ==
                                            '' )
                                                @if($orderData->warranty_card == '1')
                                                    <label class=" form-label">Press Shipment to enter details</label>
                                                @else
                                                    @if($orderData->product_serials != null)
                                                        <label class=" form-label">Press to download warranty card.</label>
                                                    @else
                                                        <label class=" form-label">Press to generate warranty card.</label>
                                                    @endif
                                                @endif
                                            @endif
                                            @if($orderData->delivery_status == 'processing' && $orderData->comments ==
                                            'delivery process' )
                                            <label class=" form-label">This order is now delivery process</label>
                                            @endif
                                            @if($orderData->delivery_status == 'completed' && $orderData->comments ==
                                            '' )
                                            <label class=" form-label">This order has been completed</label>
                                            @endif
                                            <!--end::Label-->
                                            <!--begin::Select2-->
                                            <!-- <select onchange="updateItems(this)" class="form-select mb-2"
                                                data-control="select2" data-hide-search="true"
                                                data-placeholder="Select an option" name="delivery_status"
                                                id="kt_ecommerce_edit_order_shipping">
                                                <option></option>

                                                <option value="Pending"
                                                    {{ $orderData->delivery_status == 'pending' ? 'selected' : '' }}>
                                                    Pending</option>
                                                <option value="Processing"
                                                    {{ $orderData->delivery_status == 'processing' ? 'selected' : '' }}>
                                                    Processing</option>
                                                <option value="Completed"
                                                    {{ $orderData->delivery_status == 'completed' ? 'selected' : '' }}>
                                                    Completed</option>
                                                <option value="Cancelled"
                                                    {{ $orderData->delivery_status == 'cancelled' ? 'selected' : '' }}>
                                                    Cancelled</option>

                                            </select> -->
                                            <!--end::Select2-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--                                    
                                    <div class="form-group"><label for="" class="col-12 col-form-label">Invoice
                                            Number</label>
                                        <div class="col-12"><input type="text" value="{{$orderData->invoice}}"
                                                name="invoice" id="invoice" class="form-control"></div>
                                    </div>

                                 
                                    <div id="results"></div> -->
                                </div>

                                <!--end::Card header-->
                                <div class="card-body pt-0">
                                    <div class="d-flex  gap-7">
                                        <!--begin::Button-->
                                        <!--end::Button-->
                                        <!--begin::Button-->
                                        @if($orderData->delivery_status == 'pending' && $orderData->comments ==
                                        '' )
                                        @if(App\Models\User::hasPermission(["capture_cancel_sales_order"]))
                                        <button type="submit" id="kt_ecommerce_edit_order_submit"
                                            class="btn btn-light  btn-primary">
                                            <span class="indicator-label">Capture/invoice</span>

                                            <input name="delivery_status" value="processing" hidden>
                                            <input value="{{Auth::id()}}" name="user_id" hidden>
                                            <input name="invoice_id" value="{{$invoice_id}}" hidden>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <a href="../../demo1/dist/apps/ecommerce/catalog/products.html"
                                            id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5"
                                            data-bs-toggle="modal" data-bs-target="#orderCancelModal"
                                            data-bs-whatever="@mdo">Cancel</a>
                                        @endif
                                        @endif
                                        @if($orderData->delivery_status == 'processing' && $orderData->comments ==
                                        '')
                                        @if(App\Models\User::hasPermission(["shipment_cancel_sales_invoice"]))
                                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                                            @if($orderData->warranty_card == 1)
                                            <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#shipmentAddModal"
                                                data-bs-whatever="@mdo">Shipment</button>
                                            @else
                                                @if($orderData->product_serials != null)
                                                    <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#warrantyCardDownloadModal"
                                                        data-bs-whatever="@mdo">Warranty Download</button>
                                                @else
                                                    <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#warrantCardIssueModal" data-bs-whatever="@mdo">Generate Warranty</button>
                                                @endif
                                            @endif
                                        </div>
                                        <button class="btn btn-lg btn-light me-5">
                                        <a href="javascript:void()" class="text-white"
                                            id="kt_ecommerce_add_product_cancel"
                                            data-bs-toggle="modal" data-bs-target="#orderCancelModal"
                                            data-bs-whatever="@mdo">Cancel</a></button>
                                        @endif

                                        @endif
                                        @if($orderData->delivery_status == 'processing' && $orderData->comments ==
                                        'delivery process')
                                        @if(App\Models\User::hasPermission(["complete_sales_invoice"]))
                                        <?php if($orderData->refund_request != 'Order Refunded'){?>
                                        <button type="submit" id="kt_ecommerce_edit_order_submit"
                                            class="btn btn-light  btn-primary">
                                            <span class="indicator-label">Complete</span>

                                            <input name="delivery_status" value="completed" hidden>
                                            <input value="{{Auth::id()}}" name="user_id" hidden>
                                            <input name="invoice_id" value="{{$orderData->invoice}}" hidden>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <?php } ?>
                                        @endif

                                        @if(App\Models\User::hasPermission(["complete_refund_order"]))
                                        <?php if($orderData->refund_request == 'Order Refunded'){?>
                                        <button type="button" class="btn btn-md btn-light" style="cursor: not-allowed;"
                                            disabled>Refund</button>
                                        <?php } else {?>

                                        <button type="button" class="btn btn-md btn-light" data-bs-toggle="modal"
                                            data-bs-target="#refundAddModal" data-bs-whatever="@mdo">Refund</button>

                                        <?php } ?>
                                        @endif
                                        @endif
                                        @if($orderData->delivery_status == 'completed' && $orderData->comments ==
                                        '')
                                        @if(App\Models\User::hasPermission(["complete_refund_order"]))
                                        <?php if($orderData->refund_request == 'Order Refunded'){?>
                                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                                            <button type="button" class="btn btn-md btn-light"
                                                style="cursor: not-allowed;" disabled>Refund</button>
                                        </div>
                                        <?php } else {?>
                                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                                            <button type="button" class="btn btn-md btn-light" data-bs-toggle="modal"
                                                data-bs-target="#refundAddModal" data-bs-whatever="@mdo">Refund</button>

                                        </div>
                                        <?php } ?>
                                        @endif
                                        @endif
                                        <!--end::Button-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Order details-->

                        </div>
                        <!--end::Aside column-->

                        <!--end::Main column-->

                    </form>
                    <!--end::Form-->
                    <!-- end status edit -->

                </div>

                <!--end::Documents-->
            </div>
            <!--end::Order summary-->
            <!--begin::Tab content-->
            <div class="tab-content">
                <!--begin::Tab pane-->
                <div class="tab-pane fade show active" id="kt_ecommerce_sales_order_summary" role="tab-panel">
                    <!--begin::Orders-->
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                            <!--begin::Payment address-->
                            <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                <!--begin::Background-->
                                <!-- <div class="position-absolute top-0 end-0 opacity-10 pe-none text-end">
                                    <img src="assets/media/icons/duotune/ecommerce/ecm001.svg" class="w-175px" />
                                </div> -->
                                <!--end::Background-->
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Payment details</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 text-white-50 fs-6">
                                    <!-- <div class="row">
                                        <div class="col-md-6">
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <span class="svg-icon svg-icon-2 me-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                                            viewBox="0 0 20 21" fill="none">
                                                            <path opacity="0.3"
                                                                d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z"
                                                                fill="currentColor" />
                                                            <path
                                                                d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>Payment Date</div>
                                            </td>

                                        </div>
                                        <div class="col-md-6">
                                            <span
                                                class=" px-2 text-white">{{date('d/m/Y',strtotime($orderData->date))}}</span>
                                        </div>
                                    </div> -->
                                    <div class="row pb-5">
                                        <div class="col-md-6">
                                            <!--begin::Svg Icon | path: icons/duotune/finance/fin008.svg-->
                                            <span class="svg-icon svg-icon-2 me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3"
                                                        d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.3"
                                                        d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Payment Method
                                        </div>
                                        <div class="col-md-6">
                                            <span class=" px-2 text-white">{{$orderData->payment_type}}</span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--begin::Svg Icon | path: icons/duotune/finance/fin008.svg-->
                                            <span class="svg-icon svg-icon-2 me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3"
                                                        d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.3"
                                                        d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Payment Status
                                        </div>
                                        <div class="col-md-6">
                                            <span
                                                class=" px-2 text-white">{{ucfirst($orderData->payment_status)}}</span>
                                        </div>
                                    </div>

                                    <!-- <span class=" pt-0">Country: <span
                                            class=" px-2 text-white">{{$orderData['customer']['country']}}</span>
                                    </span><br> -->
                                </div>

                                <!--end::Card body-->
                            </div>
                            <!--end::Payment address-->
                            <!--begin::Payment address-->
                            <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                <!--begin::Background-->
                                <!-- <div class="position-absolute top-0 end-0 opacity-10 pe-none text-end">
                                    <img src="assets/media/icons/duotune/ecommerce/ecm001.svg" class="w-175px" />
                                </div> -->
                                <!--end::Background-->
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Billing Address</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 text-white-50 fs-6">
                                    <div class="row pb-5">
                                        <div class="col-md-6">
                                            <span class=" pt-0">Flat/ Road/ Post Office:
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class=" px-2 text-white">{{$orderData->billing_flat}}</span>
                                        </div>
                                    </div>
                                    <div class="row pb-5">
                                        <div class="col-md-6">
                                            <span class=" pt-0">Thana:
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class=" px-2 text-white">{{$orderData->billing_thana}}</span>
                                        </div>
                                    </div>
                                    <div class="row pb-5">
                                        <div class="col-md-6">
                                            <span class=" pt-0">District:
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class=" px-2 text-white">{{$orderData->billing_district}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class=" pt-0">Division
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class=" px-2 text-white">{{$orderData->billing_division}}</span>
                                        </div>
                                    </div>
                                    <!-- <span class=" pt-0">Country: <span
                                            class=" px-2 text-white">{{$orderData['customer']['country']}}</span>
                                    </span><br> -->
                                </div>

                                <!--end::Card body-->
                            </div>
                            <!--end::Payment address-->
                            <!--begin::Shipping address-->
                            <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                <!--begin::Background-->
                                <!-- <div class="position-absolute top-0 end-0 opacity-10 pe-none text-end">
                                    <img src="assets/media/icons/duotune/ecommerce/ecm006.svg" class="w-175px" />
                                </div> -->
                                <!--end::Background-->
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Shipping Address</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 text-white-50 fs-6">
                                    <div class="row pb-5">
                                        <div class="col-md-6">
                                            <span class=" pt-0">Flat/ Road/ Post Office:
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class=" px-2 text-white">{{$orderData->shipping_flat}}</span>
                                        </div>
                                    </div>
                                    <div class="row pb-5">
                                        <div class="col-md-6">
                                            <span class=" pt-0">Thana:
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class=" px-2 text-white">{{$orderData->shipping_thana}}</span>
                                        </div>
                                    </div>
                                    <div class="row pb-5">
                                        <div class="col-md-6">
                                            <span class=" pt-0">District:
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class=" px-2 text-white">{{$orderData->shipping_district}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class=" pt-0">Division
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class=" px-2 text-white">{{$orderData->shipping_division}}</span>
                                        </div>
                                    </div>
                                    <!-- <span class=" pt-0">Country: <span
                                            class=" px-2 text-white">{{$orderData['customer']['country']}}</span>
                                    </span><br> -->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Shipping address-->
                        </div>


                        <?php
                    $invoice_no = App\Models\Order::where('order_no',$orderData->order_no)->select('invoice')->first();
                    if($invoice_no) {
                        $order_details = App\Models\Product_Srial_Number::where('invoice_no', $invoice_no->invoice)->where('user_id', $orderData->user_id)->where('status',1)->get();
                    }
                    if(isset($order_details[0])){
                ?>

                        <!--begin::Product List-->
                        <div class="card card-flush py-4 flex-row-fluid overflow-hidden mb-5">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Invoice No: &nbsp;{{$orderData->invoice}}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="min-w-250px">Product</th>
                                                <th class="min-w-100px">SERIAL NO</th>
                                                <th class="min-w-100px">SKU</th>
                                                <th class="min-w-70px">Qty</th>
                                                <th class="min-w-100px">Unit Price</th>
                                                <th class="min-w-150px">Total</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fw-bold text-gray-600">
                                            <!--begin::Products-->
                                            <?php $sub_total = 0;?>
                                            @foreach($order_details as $key=>$detail)
                                            <?php
                                        $product_unit_price = $detail['product_unit_price'] + $detail['ram_unit_price'] + $detail['ssd_unit_price'];
                                        $sub_total = $sub_total + ($detail['quantity'] * $product_unit_price);
                                        //bag information
                                        if($detail['bag_id']){
                                            $bag_name = '';
                                            $bag_color = '';
                                            $bag_price = $detail['bag_unit_price'] * $detail['quantity'];
                                            $bags = App\Models\Product::where('sub_category','backpack')->where('id',$detail['bag_id'])->where('status','1')->first();
                                            if($bags) {
                                                $bag_name = $bags->name;
                                                $bag_color = json_decode($bags->attributes)[0]->attribute_value;
                                            }
                                            $sub_total = $sub_total + $bag_price;
                                        }
                                        
                                        //keyboard information
                                        if($detail['keyboard_id']){
                                            $keyboard_name = '';
                                            $keyboard_price = $detail['keyboard_unit_price'] * $detail['quantity'];
                                            $keyboard_details = App\Models\Product::where('sub_category','keyboard-mouse')->where('id',$detail['keyboard_id'])->where('status','1')->first();
                                            if($keyboard_details){
                                                $keyboard_name = $keyboard_details->name;
                                            }
                                            $sub_total = $sub_total + $keyboard_price;
                                        }
    
                                        //ram information
                                        $ram_name = '';
                                        if($detail['ram_id']){
                                            $ram_details = App\Models\Product::where('sub_category','ram')->where('id',$detail['ram_id'])->where('status','1')->first();
                                            if($ram_details){
                                                $ram_name = $ram_details->name;
                                            }
                                        }
    
                                        //ssd information 
                                        $ssd_name = '';
                                        if($detail['ssd_id']){
                                            $ssd_details = App\Models\Product::where('sub_category','ssd')->where('id',$detail['ssd_id'])->where('status','1')->first();
                                            if($ssd_details){
                                                $ssd_name = $ssd_details->name;
                                            }
                                        }

                                        $discountPrice = 0;
                                        $order_coupon_amount = App\Models\Order::where('order_no',$detail['order_no'])->select('coupon_amount')->first();
                                        $discountPrice = $order_coupon_amount->coupon_amount;
                                        
                                    ?>
                                            <tr>
                                                <!--begin::Product-->
                                                <?php if($detail['productid']['sub_category'] == 'Lania'){?>
                                                <td class="mx-5">
                                                    <div class="">
                                                        <div class="d-flex align-items-center main_item_height">
                                                            <!--begin::Thumbnail-->
                                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                class="symbol symbol-50px">
                                                                <img src="{{(!empty($detail['productid']['galary_photo']))?url($detail['productid']['galary_photo']):url('/avatar.png')}}"
                                                                    alt="Product Img" class="w-100" />
                                                            </a>
                                                            <!--end::Thumbnail-->
                                                            <!--begin::Title-->
                                                            <div class="ms-5" style="width: 60%;">
                                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                    class="fw-bolder text-gray-600 text-hover-primary">{{$detail['productid']['name']}}
                                                                    {{$ram_name}} {{$ssd_name}}</a>
                                                                <div class="fs-7 text-muted"></div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                        <?php if($detail['bag_id']) {?>
                                                        <div class="d-flex align-items-center sub_item_height">
                                                            <!--begin::Thumbnail-->
                                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                class="symbol symbol-50px">
                                                                <img src="{{(!empty($bags->galary_photo))?url($bags->galary_photo):url('/avatar.png')}}"
                                                                    alt="Free Backpack" class="w-100" />
                                                            </a>
                                                            <!--end::Thumbnail-->
                                                            <!--begin::Title-->
                                                            <div class="ms-5">
                                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                    class="fw-bolder text-gray-600 text-hover-primary"
                                                                    style="margin-left: 10px;">{{$bag_name. ' : ' .$bag_color}}</a>
                                                                <div class="fs-7 text-muted"></div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                        <?php } ?>

                                                        <?php if($detail['keyboard_id']) {?>
                                                        <div class="d-flex align-items-center sub_item_height">
                                                            <!--begin::Thumbnail-->
                                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                class="symbol symbol-50px">
                                                                <img src="{{(!empty($keyboard_details->galary_photo))?url($keyboard_details->galary_photo):url('/avatar.png')}}"
                                                                    alt="Free Backpack" class="w-100" />
                                                            </a>
                                                            <!--end::Thumbnail-->
                                                            <!--begin::Title-->
                                                            <div class="ms-5">
                                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                    class="fw-bolder text-gray-600 text-hover-primary">{{$keyboard_name}}</a>
                                                                <div class="fs-7 text-muted"></div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </td>

                                                <td class="mx-5">
                                                    <div class="">
                                                        <div class="d-flex align-items-center main_item_height">
                                                            {{$detail['serial_number']}}
                                                        </div>
                                                        <?php if($detail['bag_id']) {?>
                                                        <div class="d-flex align-items-center sub_item_height"></div>
                                                        <?php } ?>
                                                        <?php if($detail['keyboard_id']) {?>
                                                        <div class="d-flex align-items-center sub_item_height"></div>
                                                        <?php } ?>
                                                    </div>
                                                </td>

                                                <td class="mx-5">
                                                    <div class="">
                                                        <div class="d-flex align-items-center main_item_height">
                                                            {{$detail['productid']['sku']}}
                                                        </div>
                                                        <?php if($detail['bag_id']) {?>
                                                        <div class="d-flex align-items-center sub_item_height">
                                                            {{$bags->sku}}
                                                        </div>
                                                        <?php } ?>
                                                        <?php if($detail['keyboard_id']) {?>
                                                        <div class="d-flex align-items-center sub_item_height">
                                                            {{$keyboard_details->sku}}
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </td>

                                                <td class="mx-5">
                                                    <div class="">
                                                        <div class="d-flex align-items-center main_item_height">
                                                            {{$detail['quantity']}} Pcs
                                                        </div>
                                                        <?php if($detail['bag_id']) {?>
                                                        <div class="d-flex align-items-center sub_item_height">
                                                            {{$detail['quantity']}} Pcs
                                                        </div>
                                                        <?php } ?>
                                                        <?php if($detail['keyboard_id']) {?>
                                                        <div class="d-flex align-items-center sub_item_height">
                                                            {{$detail['quantity']}} Pcs
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </td>

                                                <td class="mx-5">
                                                    <div class="">
                                                        <div class="d-flex align-items-center main_item_height">
                                                            &#2547;{{number_format($product_unit_price)}}
                                                        </div>
                                                        <?php if($detail['bag_id']) {?>
                                                        <div class="d-flex align-items-center sub_item_height">
                                                            &#2547;{{number_format($detail['bag_unit_price'])}}
                                                        </div>
                                                        <?php } ?>
                                                        <?php if($detail['keyboard_id']) {?>
                                                        <div class="d-flex align-items-center sub_item_height">
                                                            &#2547;{{number_format($detail['keyboard_unit_price'])}}
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </td>

                                                <td class="mx-5">
                                                    <div class="">
                                                        <div class="d-flex align-items-center main_item_height">
                                                            &#2547;{{number_format(($detail['quantity'] * $product_unit_price),2, '.', ',')}}
                                                        </div>
                                                        <?php if($detail['bag_id']) {?>
                                                        <div class="d-flex align-items-center sub_item_height">
                                                            &#2547;{{number_format(($detail['quantity'] * $detail['bag_unit_price']),2, '.', ',')}}
                                                        </div>
                                                        <?php } ?>
                                                        <?php if($detail['keyboard_id']) {?>
                                                        <div class="d-flex align-items-center sub_item_height">
                                                            &#2547;{{number_format(($detail['quantity'] * $detail['keyboard_unit_price']),2, '.', ',')}}
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                                <?php } elseif($detail['productid']['sub_category'] == 'Sigma') { ?>
                                                <td class="mx-5">
                                                    <div class="">
                                                        <div class="d-flex align-items-center main_item_height">
                                                            <!--begin::Thumbnail-->
                                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                class="symbol symbol-50px">
                                                                <img src="{{(!empty($detail['productid']['galary_photo']))?url($detail['productid']['galary_photo']):url('/avatar.png')}}"
                                                                    alt="Product Img" class="w-100" />
                                                            </a>
                                                            <!--end::Thumbnail-->
                                                            <!--begin::Title-->
                                                            <div class="ms-5" style="padding-top: 15px;width: 60%;">
                                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                    class="fw-bolder text-gray-600 text-hover-primary">{{$detail['productid']['name']}}</a>
                                                                <div class="fs-7 text-muted"></div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                        <?php if($detail['bag_id']) {?>
                                                        <div class="d-flex align-items-center sub_item_height">
                                                            <!--begin::Thumbnail-->
                                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                class="symbol symbol-50px">
                                                                <img src="{{(!empty($bags->galary_photo))?url($bags->galary_photo):url('/avatar.png')}}"
                                                                    alt="Free Backpack" class="w-100" />
                                                            </a>
                                                            <!--end::Thumbnail-->
                                                            <!--begin::Title-->
                                                            <div class="ms-5">
                                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                    class="fw-bolder text-gray-600 text-hover-primary"
                                                                    style="margin-left: 10px;">{{$bag_name. ' : ' .$bag_color}}</a>
                                                                <div class="fs-7 text-muted"></div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </td>

                                                <td class="mx-5">
                                                    <div class="">
                                                        <div class="d-flex align-items-center main_item_height">
                                                            {{$detail['serial_number']}}
                                                        </div>
                                                        <?php if($detail['bag_id']) {?>
                                                        <div class="d-flex align-items-center sub_item_height"></div>
                                                        <?php } ?>
                                                    </div>
                                                </td>

                                                <td class="mx-5">
                                                    <div class="">
                                                        <div class="d-flex align-items-center main_item_height">
                                                            {{$detail['productid']['sku']}}
                                                        </div>
                                                        <?php if($detail['bag_id']) {?>
                                                        <div class="d-flex align-items-center sub_item_height">
                                                            {{$bags->sku}}
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </td>

                                                <td class="mx-5">
                                                    <div class="">
                                                        <div class="d-flex align-items-center main_item_height">
                                                            {{$detail['quantity']}} Pcs
                                                        </div>
                                                        <?php if($detail['quantity']) {?>
                                                        <div class="d-flex align-items-center sub_item_height">
                                                            {{$detail['quantity']}} Pcs
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </td>

                                                <td class="mx-5">
                                                    <div class="">
                                                        <div class="d-flex align-items-center main_item_height">
                                                            &#2547;{{number_format($product_unit_price)}}
                                                        </div>
                                                        <?php if($detail['bag_id']) {?>
                                                        <div class="d-flex align-items-center sub_item_height">
                                                            &#2547;{{number_format($detail['bag_unit_price'])}}
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </td>

                                                <td class="mx-5">
                                                    <div class="">
                                                        <div class="d-flex align-items-center main_item_height">
                                                            &#2547;{{number_format(($detail['quantity'] * $product_unit_price),2, '.', ',')}}
                                                        </div>
                                                        <?php if($detail['bag_id']) {?>
                                                        <div class="d-flex align-items-center sub_item_height">
                                                            &#2547;{{number_format(($detail['quantity'] * $detail['bag_unit_price']),2, '.', ',')}}
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                                <?php } else {?>
                                                <td class="mx-5">
                                                    <div class="">
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Thumbnail-->
                                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                class="symbol symbol-50px">
                                                                <img src="{{(!empty($detail['productid']['galary_photo']))?url($detail['productid']['galary_photo']):url('/avatar.png')}}"
                                                                    alt="Product Img" class="w-100" />
                                                            </a>
                                                            <!--end::Thumbnail-->
                                                            <!--begin::Title-->
                                                            <div class="ms-5">
                                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                    class="fw-bolder text-gray-600 text-hover-primary">{{$detail['productid']['name']}}</a>
                                                                <div class="fs-7 text-muted"></div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="mx-5">
                                                    <div class="">
                                                        <div class="d-flex align-items-center main_item_height">
                                                            {{$detail['serial_number']}}
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="">
                                                    <div class="">
                                                        <div class="d-flex align-items-center">
                                                            {{$detail['productid']['sku']}}
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="">
                                                    <div class="">
                                                        <div class="d-flex align-items-center">
                                                            {{$detail['quantity']}} Pcs
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="">
                                                    <div class="">
                                                        <div class="d-flex align-items-center">
                                                            &#2547;{{number_format($product_unit_price)}}
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class=">
                                                <div class="">
                                                    <div class=" d-flex align-items-center">
                                                    &#2547;{{number_format(($detail['quantity'] * $product_unit_price),2, '.', ',')}}
                                </div>
                            </div>
                            </td>
                            <?php } ?>
                            <!-- <td class="text-end mx-5">
                                            <div class="">
                                                <div class="d-flex align-items-center">
                                                    <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                    class="symbol symbol-50px">
                                                        <img src="{{(!empty($detail['productid']['galary_photo']))?url($detail['productid']['galary_photo']):url('/avatar.png')}}"
                                                            alt="Ethan Wilder" class="w-100" />
                                                    </a>
                                                    <div class="ms-5">
                                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                            class="fw-bolder text-gray-600 text-hover-primary">{{$detail['productid']['name']}}</a>
                                                        <div class="fs-7 text-muted"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end mx-5">{{$detail['productid']['sku']}}</td>
                                        
                                        <td class="text-end mx-5">{{$detail->quantity}}</td>
                                        
                                        <td class="text-end mx-5">{{$detail['productid']['unit_price']}}</td>
                                        
                                        <td class="text-end mx-5">{{$detail->price}}</td> -->

                            </tr>
                            @endforeach
                            <!--end::Products-->
                            <!--begin::Subtotal-->
                            <tr>
                                <td colspan="5" class="text-end">Subtotal</td>
                                <td class="">&#2547;{{number_format(($sub_total),2, '.', ',')}}</td>
                                <!-- <td class="">&#2547;{{number_format(($OrderPrice),2, '.', ',')}}</td> -->
                            </tr>

                            <?php if($discountPrice > 0){
                        $sub_total = $sub_total -  $discountPrice; 
                    ?>
                            <tr>
                                <td colspan="5" class="text-end">Discount(-)</td>
                                <td class="">&#2547;{{number_format(($discountPrice),2, '.', ',')}}</td>
                                <!-- <td class="">&#2547;{{number_format(($OrderPrice),2, '.', ',')}}</td> -->
                            </tr>
                            <?php } ?>
                            <!--end::Subtotal-->
                            <!--begin::VAT-->
                            <!-- <tr>
                                        <td colspan="4" class="text-end">VAT (0%)</td>
                                        <td class="text-end">$0.00</td>
                                    </tr> -->
                            <!--end::VAT-->
                            <!--begin::Shipping-->
                            @php
                            $total = $sub_total;
                            @endphp
                            <!-- <tr>
                                        <td colspan="4" class="text-end">Shipping Rate</td>
                                        <td class="text-end">{{5}}</td>
                                    </tr> -->

                            <tr>
                                <td colspan="5" class="fs-3 text-dark text-end">Grand Total</td>
                                <td class="text-dark fs-3 fw-boldest">&#2547;{{number_format(($total),2, '.', ',')}}
                                </td>
                            </tr>
                            <!--end::Grand total-->

                            </tbody>
                            <!--end::Table head-->
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Product List-->
                <?php } else { ?>

                <!--begin::Product List-->
                <div class="card card-flush py-4 flex-row-fluid overflow-hidden mb-5">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <?php if($orderData->invoice){?>
                            <h2>Invoice No: &nbsp;{{$orderData->invoice}}</h2>
                            <?php } else {?>
                            <h2>Order No: &nbsp;{{$orderData->order_no}}</h2>
                            <?php } ?>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-250px">Product</th>
                                        <th class="min-w-100px">SKU</th>
                                        <th class="min-w-70px">Qty</th>
                                        <th class="min-w-100px">Unit Price</th>
                                        <th class="min-w-150px">Total</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-bold text-gray-600">
                                    <!--begin::Products-->
                                    <?php $sub_total = 0;?>
                                    @foreach($OrderDetail as $key=>$detail)
                                    <?php
                                $product_unit_price = $detail['productid']['unit_price'] + $detail['ram_unit_price'] + $detail['ssd_unit_price'];
                                $sub_total = $sub_total + ($detail['quantity'] * $product_unit_price);
                                //bag information
                                if($detail['bag_id']){
                                    $bag_name = '';
                                    $bag_color = '';
                                    $bag_price = $detail['bag_unit_price'] * $detail['bag_quanity'];
                                    $bags = App\Models\Product::where('sub_category','backpack')->where('id',$detail['bag_id'])->where('status','1')->first();
                                    if($bags) {
                                        $bag_name = $bags->name;
                                        $bag_color = json_decode($bags->attributes)[0]->attribute_value;
                                    }
                                    $sub_total = $sub_total + $bag_price;
                                }
                                
                                //keyboard information
                                if($detail['keyboard_id']){
                                    $keyboard_name = '';
                                    $keyboard_price = $detail['keyboard_unit_price'] * $detail['keyboard_qty'];
                                    $keyboard_details = App\Models\Product::where('sub_category','keyboard-mouse')->where('id',$detail['keyboard_id'])->where('status','1')->first();
                                    if($keyboard_details){
                                        $keyboard_name = $keyboard_details->name;
                                    }
                                    $sub_total = $sub_total + $keyboard_price;
                                }

                                //ram information
                                $ram_name = '';
                                if($detail['ram_id']){
                                    $ram_details = App\Models\Product::where('sub_category','ram')->where('id',$detail['ram_id'])->where('status','1')->first();
                                    if($ram_details){
                                        $ram_name = $ram_details->name;
                                    }
                                }

                                //ssd information 
                                $ssd_name = '';
                                if($detail['ssd_id']){
                                    $ssd_details = App\Models\Product::where('sub_category','ssd')->where('id',$detail['ssd_id'])->where('status','1')->first();
                                    if($ssd_details){
                                        $ssd_name = $ssd_details->name;
                                    }
                                }

                                $discountPrice = 0;
                                $order_coupon_amount = App\Models\Order::where('order_no',$detail['order_id'])->select('coupon_amount')->first();
                                $discountPrice = $order_coupon_amount->coupon_amount;
                                
                            ?>
                                    <tr>
                                        <!--begin::Product-->
                                        <?php if($detail['productid']['sub_category'] == 'Lania'){?>
                                        <td class="mx-5">
                                            <div class="">
                                                <div class="d-flex align-items-center main_item_height">
                                                    <!--begin::Thumbnail-->
                                                    <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                        class="symbol symbol-50px">
                                                        <img src="{{(!empty($detail['productid']['galary_photo']))?url($detail['productid']['galary_photo']):url('/avatar.png')}}"
                                                            alt="Product Img" class="w-100" />
                                                    </a>
                                                    <!--end::Thumbnail-->
                                                    <!--begin::Title-->
                                                    <div class="ms-5" style="width: 60%;">
                                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                            class="fw-bolder text-gray-600 text-hover-primary">{{$detail['productid']['name']}}
                                                            {{$ram_name}} {{$ssd_name}}</a>
                                                        <div class="fs-7 text-muted"></div>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                                <?php if($detail['bag_id']) {?>
                                                <div class="d-flex align-items-center sub_item_height">
                                                    <!--begin::Thumbnail-->
                                                    <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                        class="symbol symbol-50px">
                                                        <img src="{{(!empty($bags->galary_photo))?url($bags->galary_photo):url('/avatar.png')}}"
                                                            alt="Free Backpack" class="w-100" />
                                                    </a>
                                                    <!--end::Thumbnail-->
                                                    <!--begin::Title-->
                                                    <div class="ms-5">
                                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                            class="fw-bolder text-gray-600 text-hover-primary"
                                                            style="margin-left: 10px;">{{$bag_name. ' : ' .$bag_color}}</a>
                                                        <div class="fs-7 text-muted"></div>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                                <?php } ?>

                                                <?php if($detail['keyboard_id']) {?>
                                                <div class="d-flex align-items-center sub_item_height">
                                                    <!--begin::Thumbnail-->
                                                    <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                        class="symbol symbol-50px">
                                                        <img src="{{(!empty($keyboard_details->galary_photo))?url($keyboard_details->galary_photo):url('/avatar.png')}}"
                                                            alt="Free Backpack" class="w-100" />
                                                    </a>
                                                    <!--end::Thumbnail-->
                                                    <!--begin::Title-->
                                                    <div class="ms-5">
                                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                            class="fw-bolder text-gray-600 text-hover-primary">{{$keyboard_name}}</a>
                                                        <div class="fs-7 text-muted"></div>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td class="mx-5">
                                            <div class="">
                                                <div class="d-flex align-items-center main_item_height">
                                                    {{$detail['productid']['sku']}}
                                                </div>
                                                <?php if($detail['bag_id']) {?>
                                                <div class="d-flex align-items-center sub_item_height">
                                                    {{$bags->sku}}
                                                </div>
                                                <?php } ?>
                                                <?php if($detail['keyboard_id']) {?>
                                                <div class="d-flex align-items-center sub_item_height">
                                                    {{$keyboard_details->sku}}
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td class="mx-5">
                                            <div class="">
                                                <div class="d-flex align-items-center main_item_height">
                                                    {{$detail['quantity']}} Pcs
                                                </div>
                                                <?php if($detail['bag_id']) {?>
                                                <div class="d-flex align-items-center sub_item_height">
                                                    {{$detail['bag_quanity']}} Pcs
                                                </div>
                                                <?php } ?>
                                                <?php if($detail['keyboard_id']) {?>
                                                <div class="d-flex align-items-center sub_item_height">
                                                    {{$detail['keyboard_qty']}} Pcs
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td class="mx-5">
                                            <div class="">
                                                <div class="d-flex align-items-center main_item_height">
                                                    &#2547;{{number_format($product_unit_price)}}
                                                </div>
                                                <?php if($detail['bag_id']) {?>
                                                <div class="d-flex align-items-center sub_item_height">
                                                    &#2547;{{number_format($detail['bag_unit_price'])}}
                                                </div>
                                                <?php } ?>
                                                <?php if($detail['keyboard_id']) {?>
                                                <div class="d-flex align-items-center sub_item_height">
                                                    &#2547;{{number_format($detail['keyboard_unit_price'])}}
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td class="mx-5">
                                            <div class="">
                                                <div class="d-flex align-items-center main_item_height">
                                                    &#2547;{{number_format(($detail['quantity'] * $product_unit_price),2, '.', ',')}}
                                                </div>
                                                <?php if($detail['bag_id']) {?>
                                                <div class="d-flex align-items-center sub_item_height">
                                                    &#2547;{{number_format(($detail['bag_quanity'] * $detail['bag_unit_price']),2, '.', ',')}}
                                                </div>
                                                <?php } ?>
                                                <?php if($detail['keyboard_id']) {?>
                                                <div class="d-flex align-items-center sub_item_height">
                                                    &#2547;{{number_format(($detail['keyboard_qty'] * $detail['keyboard_unit_price']),2, '.', ',')}}
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </td>
                                        <?php } elseif($detail['productid']['sub_category'] == 'Sigma') { ?>
                                        <td class="mx-5">
                                            <div class="">
                                                <div class="d-flex align-items-center main_item_height">
                                                    <!--begin::Thumbnail-->
                                                    <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                        class="symbol symbol-50px">
                                                        <img src="{{(!empty($detail['productid']['galary_photo']))?url($detail['productid']['galary_photo']):url('/avatar.png')}}"
                                                            alt="Product Img" class="w-100" />
                                                    </a>
                                                    <!--end::Thumbnail-->
                                                    <!--begin::Title-->
                                                    <div class="ms-5" style="padding-top: 15px;width: 60%;">
                                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                            class="fw-bolder text-gray-600 text-hover-primary">{{$detail['productid']['name']}}</a>
                                                        <div class="fs-7 text-muted"></div>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                                <?php if($detail['bag_id']) {?>
                                                <div class="d-flex align-items-center sub_item_height">
                                                    <!--begin::Thumbnail-->
                                                    <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                        class="symbol symbol-50px">
                                                        <img src="{{(!empty($bags->galary_photo))?url($bags->galary_photo):url('/avatar.png')}}"
                                                            alt="Free Backpack" class="w-100" />
                                                    </a>
                                                    <!--end::Thumbnail-->
                                                    <!--begin::Title-->
                                                    <div class="ms-5">
                                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                            class="fw-bolder text-gray-600 text-hover-primary"
                                                            style="margin-left: 10px;">{{$bag_name. ' : ' .$bag_color}}</a>
                                                        <div class="fs-7 text-muted"></div>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td class="mx-5">
                                            <div class="">
                                                <div class="d-flex align-items-center main_item_height">
                                                    {{$detail['productid']['sku']}}
                                                </div>
                                                <?php if($detail['bag_id']) {?>
                                                <div class="d-flex align-items-center sub_item_height">
                                                    {{$bags->sku}}
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td class="mx-5">
                                            <div class="">
                                                <div class="d-flex align-items-center main_item_height">
                                                    {{$detail['quantity']}} Pcs
                                                </div>
                                                <?php if($detail['bag_id']) {?>
                                                <div class="d-flex align-items-center sub_item_height">
                                                    {{$detail['bag_quanity']}} Pcs
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td class="mx-5">
                                            <div class="">
                                                <div class="d-flex align-items-center main_item_height">
                                                    &#2547;{{number_format($product_unit_price)}}
                                                </div>
                                                <?php if($detail['bag_id']) {?>
                                                <div class="d-flex align-items-center sub_item_height">
                                                    &#2547;{{number_format($detail['bag_unit_price'])}}
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td class="mx-5">
                                            <div class="">
                                                <div class="d-flex align-items-center main_item_height">
                                                    &#2547;{{number_format(($detail['quantity'] * $product_unit_price),2, '.', ',')}}
                                                </div>
                                                <?php if($detail['bag_id']) {?>
                                                <div class="d-flex align-items-center sub_item_height">
                                                    &#2547;{{number_format(($detail['bag_quanity'] * $detail['bag_unit_price']),2, '.', ',')}}
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </td>
                                        <?php } else {?>
                                        <td class="mx-5">
                                            <div class="">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Thumbnail-->
                                                    <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                        class="symbol symbol-50px">
                                                        <img src="{{(!empty($detail['productid']['galary_photo']))?url($detail['productid']['galary_photo']):url('/avatar.png')}}"
                                                            alt="Product Img" class="w-100" />
                                                    </a>
                                                    <!--end::Thumbnail-->
                                                    <!--begin::Title-->
                                                    <div class="ms-5">
                                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                            class="fw-bolder text-gray-600 text-hover-primary">{{$detail['productid']['name']}}</a>
                                                        <div class="fs-7 text-muted"></div>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                            </div>
                                        </td>

                                        <td class="">
                                            <div class="">
                                                <div class="d-flex align-items-center">
                                                    {{$detail['productid']['sku']}}
                                                </div>
                                            </div>
                                        </td>

                                        <td class="">
                                            <div class="">
                                                <div class="d-flex align-items-center">
                                                    {{$detail['quantity']}} Pcs
                                                </div>
                                            </div>
                                        </td>

                                        <td class="">
                                            <div class="">
                                                <div class="d-flex align-items-center">
                                                    &#2547;{{number_format($product_unit_price)}}
                                                </div>
                                            </div>
                                        </td>

                                        <td class=">
                                        <div class="">
                                            <div class=" d-flex align-items-center">
                                            &#2547;{{number_format(($detail['quantity'] * $product_unit_price),2, '.', ',')}}
                        </div>
                    </div>
                    </td>
                    <?php } ?>
                    <!-- <td class="text-end mx-5">
                                                    <div class="">
                                                        <div class="d-flex align-items-center">
                                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                            class="symbol symbol-50px">
                                                                <img src="{{(!empty($detail['productid']['galary_photo']))?url($detail['productid']['galary_photo']):url('/avatar.png')}}"
                                                                    alt="Ethan Wilder" class="w-100" />
                                                            </a>
                                                            <div class="ms-5">
                                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                    class="fw-bolder text-gray-600 text-hover-primary">{{$detail['productid']['name']}}</a>
                                                                <div class="fs-7 text-muted"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end mx-5">{{$detail['productid']['sku']}}</td>
                                                
                                                <td class="text-end mx-5">{{$detail->quantity}}</td>
                                                
                                                <td class="text-end mx-5">{{$detail['productid']['unit_price']}}</td>
                                                
                                                <td class="text-end mx-5">{{$detail->price}}</td> -->

                    </tr>
                    @endforeach
                    <!--end::Products-->
                    <!--begin::Subtotal-->
                    <tr>
                        <td colspan="4" class="text-end">Subtotal</td>
                        <td class="">&#2547;{{number_format(($sub_total),2, '.', ',')}}</td>
                        <!-- <td class="">&#2547;{{number_format(($OrderPrice),2, '.', ',')}}</td> -->
                    </tr>

                    <?php if($discountPrice > 0){
                                $sub_total = $sub_total -  $discountPrice; 
                            ?>
                    <tr>
                        <td colspan="4" class="text-end">Discount(-)</td>
                        <td class="">&#2547;{{number_format(($discountPrice),2, '.', ',')}}</td>
                        <!-- <td class="">&#2547;{{number_format(($OrderPrice),2, '.', ',')}}</td> -->
                    </tr>
                    <?php } ?>
                    <!--end::Subtotal-->
                    <!--begin::VAT-->
                    <!-- <tr>
                                                <td colspan="4" class="text-end">VAT (0%)</td>
                                                <td class="text-end">$0.00</td>
                                            </tr> -->
                    <!--end::VAT-->
                    <!--begin::Shipping-->
                    @php
                    $total = $sub_total;
                    @endphp
                    <!-- <tr>
                                                <td colspan="4" class="text-end">Shipping Rate</td>
                                                <td class="text-end">{{5}}</td>
                                            </tr> -->

                    <tr>
                        <td colspan="4" class="fs-3 text-dark text-end">Grand Total</td>
                        <td class="text-dark fs-3 fw-boldest">&#2547;{{number_format(($total),2, '.', ',')}}
                        </td>
                    </tr>
                    <!--end::Grand total-->

                    </tbody>
                    <!--end::Table head-->
                    </table>
                    <!--end::Table-->
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Product List-->
        <?php } ?>


        <?php
                    $invoice_no = App\Models\Order::where('order_no',$orderData->order_no)->select('invoice')->first();
                    if($invoice_no){
                        $shipping_info = App\Models\Shipment_Details::where('invoice_number',$invoice_no->invoice)->first();
                        if($shipping_info){
                ?>
        <!--begin::Product List-->
        <div class="card card-flush py-4 flex-row-fluid overflow-hidden mb-5">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">
                    <h2>Shipping information</h2>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-200px">Tracking Number</th>
                                <th class="min-w-200px">Shipping Carrier</th>
                                <th class="min-w-200px">Address</th>
                                <th class="min-w-200px">Cost</th>
                                <th class="min-w-200px">Date</th>
                                <th class="min-w-200px">Status</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            <!--begin::Products-->
                            <tr>
                                <!--begin::Product-->

                                <td class="mx-5">
                                    <div class="">
                                        <div class="d-flex align-items-center main_item_height">
                                            {{$shipping_info->tracking_number}}
                                        </div>
                                    </div>
                                </td>

                                <td class="">
                                    <div class="">
                                        <div class="d-flex align-items-center">
                                            {{$shipping_info->shipping_service_name}}
                                        </div>
                                    </div>
                                </td>

                                <td class="">
                                    <div class="">
                                        <div class="d-flex align-items-center">
                                            {{$shipping_info->shipping_address}}
                                        </div>
                                    </div>
                                </td>

                                <td class="">
                                    <div class="">
                                        <div class="d-flex align-items-center">
                                            &#2547;{{number_format($shipping_info->shipping_cost)}}
                                        </div>
                                    </div>
                                </td>

                                <td class="">
                                    <div class="">
                                        <div class="d-flex align-items-center">
                                            {{date("d/m/Y",strtotime($shipping_info->created_at))}}
                                        </div>
                                    </div>
                                </td>

                                <td class="">
                                    <div class="">
                                        <div class="d-flex align-items-center">
                                            {{ucfirst($shipping_info->shipping_status)}}
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <!--end::Products-->

                        </tbody>
                        <!--end::Table head-->
                    </table>
                    <!--end::Table-->
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Product List-->
        <?php } } ?>

        <?php
                    $action_info = App\Models\Action_History::where('order_id',$orderData->order_no)->first();
                    if($action_info){
                        $action_details = App\Models\Action_History::where('order_id',$orderData->order_no)->orderBy('id', 'desc')->get();
                ?>
        <!--begin::Product List-->
        <div class="card card-flush py-4 flex-row-fluid overflow-hidden mb-5">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">
                    <h2>Action History</h2>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-200px">Name</th>
                                <th class="min-w-200px">Role</th>
                                <th class="min-w-200px">Status</th>
                                <th class="min-w-200px">Date</th>
                                <th class="min-w-200px">Time</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            <!--begin::Products-->
                            @foreach($action_details as $key=>$action)
                            <?php
                                                $dateTimeArr = explode(' ', $action->created_at);
                                                $time = $dateTimeArr[1];
                                            ?>
                            <tr>
                                <!--begin::Product-->

                                <td class="mx-5">
                                    <div class="">
                                        <div class="d-flex align-items-center main_item_height">
                                            {{ucfirst($action->user_name)}}
                                        </div>
                                    </div>
                                </td>

                                <td class="">
                                    <div class="">
                                        <div class="d-flex align-items-center">
                                            <?php if($action->user_role == 'super_admin'){?>
                                            Super Admin
                                            <?php } else {?>
                                            {{ucfirst($action->user_role)}}
                                            <?php } ?>
                                        </div>
                                    </div>
                                </td>

                                <td class="">
                                    <div class="">
                                        <div class="d-flex align-items-center">
                                            {{ucfirst($action->action_status)}}
                                        </div>
                                    </div>
                                </td>

                                <td class="">
                                    <div class="">
                                        <div class="d-flex align-items-center">
                                            {{date("d-m-Y",strtotime($action->created_at))}}
                                        </div>
                                    </div>
                                </td>

                                <td class="">
                                    <div class="">
                                        <div class="d-flex align-items-center">
                                            {{$time}}
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                            <!--end::Products-->

                        </tbody>
                        <!--end::Table head-->
                    </table>
                    <!--end::Table-->
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Product List-->
        <?php } ?>




    </div>
    <!--end::Orders-->
</div>
<!--end::Tab pane-->

</div>
<!--end::Tab content-->
</div>
<!--end::Order details page-->
</div>
<!--end::Container-->
</div>
<!--end::Post-->
<!-- </div> -->
<!--end::Content-->

<!--
@php
    $all_products = App\Models\Product_Srial_Number::where('invoice_no',$orderData->invoice)->where('status',1)->get();
    foreach($all_products as $key => $product) {
        $product_name = App\Models\Product::where('id',$product->product_id)->select('name')->first();
    }
    
@endphp
-->

<div class="shipping-modal modal fade" id="warrantCardIssueModal" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header center-text">
                <h5 class="order-cancel-modal-title" id="exampleModalLabel">Scanned Product Barcode to Generate Warranty Card</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <?php 
                    $total_product_qty = 0;
                    $sl_n = 0;
                ?>

                <form id="productWarrantyIssueFrm" method="post" onsubmit="return warrantyIssueForm(event);">
                    @csrf
                    <input type="hidden" name="orderId" id="orderId" value="{{$orderData->id}}">
                    <input type="hidden" value="{{$orderData->invoice}}" name="order_invoice_no"
                                class="form-control form-control-solid" readonly>
                    <div class="row">
                        <div class="col-md-6 mb-3"> <label for="message-text" class="col-form-label">Product
                                name</label></div>
                        <div class="col-md-6 mb-3"><label for="message-text" class="col-form-label">Serial
                                Number</label></div>


                        @foreach($OrderDetail as $key=>$detail)
                        @php

                        $total_product_qty = $total_product_qty + $detail->quantity;
                        @endphp
                        @for($i = 0; $i < $detail->quantity; $i++) <div class="col-md-6 mb-3">
                                <input type="text" name="product_name_{{$sl_n}}"
                                    value="{{$detail['productid']['name']}}" class="form-control form-control-solid"
                                    hidden>
                                <p>{{$detail['productid']['name']}}
                                    <?php if($detail->ram_id && $detail->ssd_id) echo '( '.$detail->ram_name.' RAM and '.$detail->ssd_name.' SSD )';?>
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">

                                <input type="text" id="product_serial_{{$sl_n}}" name="product_serial_{{$sl_n}}"
                                    class="form-control form-control-solid" onclick="serialScanFieldFocus('{{$sl_n}}')" readonly required>
                                <input type="text" id="product_serial_hidden_{{$sl_n}}" name="product_serial_hidden_{{$sl_n}}"
                                    class="form-control form-control-solid" onchange="serialCheck('{{$sl_n}}')" style="background: transparent;border: none;outline: none;color: #1E1E2D;height: 1px;" autocomplete="off">
                                <input type="hidden" name="product_id_{{$sl_n}}" id="product_id_{{$sl_n}}" value="{{$detail['productid']['id']}}">
                                <div class="serial_err" id="serial_err_{{$sl_n}}">
                                    <p style="color: red">This field should not empty!</p>
                                </div>
                                <input type="hidden" id="serial_exist_{{$sl_n}}" value='0'>
                            </div>
                            <input type="hidden" name="product_id_{{$sl_n}}" value="{{$detail->product_id}}">
                            <!-- <input type="hidden" name="ram_id_{{$sl_n}}" value="{{$detail->ram_id}}"> -->
                            <!-- <input type="hidden" name="ssd_id_{{$sl_n}}" value="{{$detail->ssd_id}}">  -->
                            <input type="hidden" name="bag_id_{{$sl_n}}" value="{{$detail->bag_id}}">
                            <input type="hidden" name="keyboard_id_{{$sl_n}}" value="{{$detail->keyboard_id}}">
                            <input type="hidden" name="user_id_{{$sl_n}}" value="{{$detail->seller_id}}">
                            <input type="hidden" name="product_unit_price_{{$sl_n}}"
                                value="{{$detail->price / $detail->quantity}}">
                            <!-- <input type="hidden" name="ram_unit_price_{{$sl_n}}" value="{{$detail->ram_unit_price}}"> -->
                            <!-- <input type="hidden" name="ssd_unit_price_{{$sl_n}}" value="{{$detail->ssd_unit_price}}"> -->
                            <!-- <input type="hidden" name="keyboard_unit_price_{{$sl_n}}" value="{{$detail->keyboard_unit_price}}"> -->
                            <input type="hidden" name="total_price_{{$sl_n}}"
                                value="{{($detail->price / $detail->quantity)}}">
                            <input type="hidden" name="order_details_id_{{$sl_n}}" value="{{$detail->id}}">
                            <?php $sl_n++; ?>
                            @endfor

                            @endforeach
                            <textarea type="text" name="all_valid_product_serial" id="all_valid_product_serial" class="form-control form-control-solid" rows="1" cols="5" style="display: none;"></textarea>
                            <input type="hidden" name="order_no_id" value="{{$orderData->order_no}}">
                            <input type="hidden" name="order_date" value="{{$orderData->date}}">
                            <input type="hidden" name="order_invoice_date" value="{{$orderData->invoice_date}}">
                            <input type="hidden" name="total_product" id="total_product" value="{{$total_product_qty}}">

                    </div>

                    <div id="err_serial" class="text-danger mb-2"></div>
                    <div class="modal-footer justify-content-center">
                        <button style="padding-left: 30px !important;padding-right: 30px !important;" type="button"
                            class="btn btn-secondary me-5" onclick="cancelWarrantyIssueModal()">Cancel</button>
                        <input name="delivery_status" value="processing" hidden>
                        <button class="btn btn-primary" type="submit" id="warrrantyIssueBtn">Continue</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>

<div class="shipping-modal modal fade" id="warrantyCardDownloadModal" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header center-text">
                <h5 class="order-cancel-modal-title" id="exampleModalLabel">Download all products warranty card</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <?php 
                    $sl_n = 0;
                ?>

                    <div class="row">
                        <div class="col-md-6 mb-3"> <label for="message-text" class="col-form-label">Product
                                Name</label></div>
                        <div class="col-md-6 mb-3"><label for="message-text" class="col-form-label">Warranty
                                Card</label></div>


                        @foreach($all_products as $key => $product)
                        @php
                            $product_name = App\Models\Product::where('id',$product->product_id)->select('name')->first();
                        @endphp
                            <div class="col-md-6 mb-3">
                                <p>{{$product_name->name}}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <button class="btn btn-light">
                                    <a class="me-1" target="_blank" href="{{route('warranty.download',[$product->serial_number,$product->invoice_no])}}">
                                        <i class=" fa-solid fs-3 text-white fa-circle-down"></i> <span class="text-white">Download Warranty Card</span>
                                    </a>
                                </button>
                                
                            </div>
                            <?php $sl_n++; ?>
                            @endforeach

                    </div>

                    <div id="err_serial" class="text-danger mb-2"></div>
                    <div class="modal-footer justify-content-center">
                        <button style="padding-left: 30px !important;padding-right: 30px !important;" type="button"
                            class="btn btn-secondary me-5" data-bs-dismiss="modal">Close</button>
                        <input name="delivery_status" value="processing" hidden>
                        
                        <a href="{{route('warranty.download.complete',$orderData->invoice)}}"><button class="btn btn-primary" type="button" >Complete</button></a>
                    </div>
            </div>

        </div>
    </div>

</div>

<div class="shipping-modal modal fade" id="shipmentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header center-text">
                <h5 class="order-cancel-modal-title" id="exampleModalLabel">Shipping information</h5>
            </div>
            <div class="modal-body">

                <form id="shipmentFrm" method="post" onsubmit="return shipmentForm(event);">
                    @csrf
                    <input type="hidden" name="order_no_id" value="{{$orderData->order_no}}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="message-text" class="col-form-label">Shipping Carrier </label>
                            <input type="text" name="shipping_service_name" class="form-control form-control-solid"
                                required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="message-text" class="col-form-label">Tracking Number</label>
                            <input type="text" name="tracking_number" class="form-control form-control-solid" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="message-text" class="col-form-label">Date</label>
                            <input type="date" name="date" class="form-control form-control-solid" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="message-text" class="col-form-label">Invoice Number</label>
                            <input type="text" value="{{$orderData->invoice}}" name="order_invoice_no"
                                class="form-control form-control-solid" readonly>
                        </div>

                    </div>
                    <input type="hidden" name="seller_user_id" value="{{$detail->seller_id}}">
                    <div class="modal-footer justify-content-center">
                        <button style="padding-left: 30px !important;padding-right: 30px !important;" type="button"
                            class="btn btn-secondary me-5" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit" id="shippingBtn">Continue</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>

<div class="shipping-modal modal fade" id="refundAddModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md p-5">
        <div class="modal-content p-5">
            <div class="modal-body">
                <h5 class="refund-modal-title text-center pb-2 fs-3" id="exampleModalLabel">Refund Confirmation</h5>
                <form id="refundForm" method="post" onsubmit="return refundForm(event);">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3 justify-content-center text-center">
                            <label for="message-text" class="col-form-label fs-5 return-product-modal-text">Did the
                                customer return the
                                product</label>
                            <div class="d-flex justify-content-center pt-3">
                                <div class="form-check form-check-inline product-return-field">
                                    <input class="form-check-input  border-light" type="radio" name="product_return"
                                        id="inlineRadio1" value="yes" onclick="productReturn('yes')">
                                    <label class="form-check-label return-product-modal-text"
                                        for="inlineRadio1">YES</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input border-light" type="radio" name="product_return"
                                        id="inlineRadio2" value="no" onclick="productReturn('no')">
                                    <label class="form-check-label return-product-modal-text"
                                        for="inlineRadio2">NO</label>
                                </div>
                            </div>
                            <div class="pt-3" id="return-product-err-area">
                                <p style="color: red;"><i class="fa fa-exclamation-triangle me-2"
                                        style="color: red;"></i><b>This field is required.</b></p>
                            </div>
                        </div>
                        <div id="hr-line">
                            <hr class="text-center hr-line">
                        </div>

                        <div class="col-md-12 mb-3 justify-content-center text-center" id="refund-method">
                            <label for="message-text" class="col-form-label fs-5 return-product-modal-text">Select
                                refund method</label>
                            <div class="d-flex justify-content-center py-5">
                                <div class="form-check form-check-inline product-return-field">
                                    <input class="form-check-input  border-light" type="radio" name="refund_type"
                                        id="inlineRadio3" value="Full" onclick="refundTypes('Full','{{$total}}')">
                                    <label class="form-check-label return-product-modal-text" for="inlineRadio1">Full
                                        Refund</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input border-light" type="radio" name="refund_type"
                                        id="inlineRadio4" value="Partial" onclick="refundTypes('Partial','{{$total}}')">
                                    <label class="form-check-label return-product-modal-text" for="inlineRadio2">Partial
                                        Refund</label>
                                </div>
                            </div>
                            <div id="refund-type-err-area">
                                <p style="color: red;"><i class="fa fa-exclamation-triangle me-2"
                                        style="color: red;"></i><b>This field is required.</b></p>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3 justify-content-center text-center" id="return-note">
                            <label for="message-text" class="col-form-label fs-5 return-product-modal-text">Why customer
                                didn't return the product?</label>
                            <input type="text" name="return_note_text" id="return_note_text"
                                class="form-control refund-note-textbox mb-2 mt-2">
                            <div id="note-err-area" class="pt-2">
                                <p style="color: red;" id="note-err-text"><i class="fa fa-exclamation-triangle me-2"
                                        style="color: red;"></i><b>This field is required.</b></p>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3 justify-content-center text-center" id="return-amount">
                            <label for="message-text" class="col-form-label fs-5 return-product-modal-text">Enter the
                                amount to return the customer</label>
                            <input type="number" name="return_amount_text" id="return_amount_text"
                                class="form-control refund-amount mb-2 mt-2" min="1">
                            <div id="amount-err-area" class="pt-3">
                                <p style="color: red;" id="amount-err-text"><i class="fa fa-exclamation-triangle me-2"
                                        style="color: red;"></i><b>This field is required.</b></p>
                            </div>
                        </div>

                        <div id="err_serial" class="text-danger mb-2"></div>
                        <div class="text-center justify-content-center refund-continue-btn-field">
                            <button type="submit" class="btn btn-primary">Continue</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>


<div class="shipping-modal modal fade" id="refundConfirmModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md p-5">
        <div class="modal-content p-5">
            <div class="modal-body">
                <h5 class="order-cancel-modal-title text-center pb-2 fs-3" id="exampleModalLabel">Refund Confirmation
                </h5>
                <form id="cancelOrder">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3 justify-content-center text-center">
                            <label for="message-text" class="col-form-label order-cancel-modal-text fs-5">Are you sure
                                you want to give<span id="refund_amount_text"></span>?</label>
                            <div class="d-flex justify-content-center order-cancel-btn-field">
                                <div class="text-center justify-content-center">
                                    <button type="button" class="btn btn-light order-cancel-modal-nobtn"
                                        data-bs-dismiss="modal">No</button>
                                </div>
                                <div class="text-center justify-content-center">
                                    <button type="button" class="btn btn-primary order-cancel-modal-yesbtn"
                                        id="refund-confirm-btn" onclick="confirmRefund()">Yes</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- product scanned error message -->
<div class="modal fade " id="shipment_product_scanned_error_modal" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="shipment_product_scanned_error_modalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h1 class="text-center error-cross-icon"><i class="fa-solid fa-xmark"
                        style="color: #ff00008a;font-size: 30px;"></i></h1>
                <h1 class="text-center mt-5" id="shipment_product_scanned_error_modal_title">Error!</h1>
                <p class="text-center mt-5" id="shipment_product_scanned_error_modal_text">Something went wrong. Please try
                    some time later.</p>
            </div>
            <div class="mx-auto mt-5 mb-5">
                <button type="button" class="btn btn-secondary" style="margin-bottom: 20px;" data-bs-dismiss="modal"
                    onclick="closeProductScannedErrorAlertModal()">Close</button>
            </div>
        </div>
    </div>
</div>

<?php
    $user_email = $orderData['customer']['email'];
    $user_name = $orderData['customer']['name'];
?>

<div class="shipping-modal modal fade" id="orderCancelModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md p-5">
        <div class="modal-content p-5">
            <div class="modal-body">
                <h5 class="order-cancel-modal-title text-center pb-2 fs-3" id="exampleModalLabel">Cancel Order</h5>
                <form id="cancelOrder">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3 justify-content-center text-center">
                            <label for="message-text" class="col-form-label order-cancel-modal-text fs-5">Do you want to
                                cancel the order?</label>
                            <div class="d-flex justify-content-center order-cancel-btn-field">
                                <div class="text-center justify-content-center">
                                    <button type="button" class="btn btn-light order-cancel-modal-nobtn"
                                        data-bs-dismiss="modal">No</button>
                                </div>
                                <div class="text-center justify-content-center">
                                    <button type="button" class="btn btn-primary order-cancel-modal-yesbtn"
                                        id="order-cancel-modal-yesbtn"
                                        onclick="orderCanceled('{{$orderData->order_no}}','{{$orderData->date}}','{{$orderData->user_id}}','{{$user_email}}', '{{$user_name}}')">Yes</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>
@php
$order = $orderData->id;
$b = App\Models\Order::where('id',$order)->first()->order_no;

@endphp
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    function serialScanFieldFocus(sl_n) {
        // alert(sl_n);
        $('#product_serial_hidden_'+sl_n).focus();
    };

    function closeProductScannedErrorAlertModal() {
        $('#shipment_product_scanned_error_modal').modal('hide');
        $('#warrantCardIssueModal').css('opacity','1');
        
        // var tot_input_field = parseInt($('#total_product').val());
        // for (let i = 0; i < tot_input_field; i++) {
        //     document.getElementById('product_serial_' + i).value = '';
        //     document.getElementById('product_serial_hidden_' + i).value = '';
        // }

    }


    function cancelWarrantyIssueModal() {
        $('#warrantCardIssueModal').modal('hide');

        var tot_input_field = parseInt($('#total_product').val());
        for (let i = 0; i < tot_input_field; i++) {
            document.getElementById('product_serial_' + i).value = '';
            document.getElementById('product_serial_hidden_' + i).value = '';
        }
    }
    

    function warrantyIssueForm(e) {
        e.preventDefault();
        var total_input_field = parseInt($('#total_product').val());
        var empty_input = 0;
        for (let i = 0; i < total_input_field; i++) {
            document.getElementById('serial_err_'+i).style.display = 'none';
            var input_field = $('#product_serial_' + i).val();
            if (!input_field) {
                document.getElementById('serial_err_'+i).style.display = 'block';
                empty_input = 1;
            }
        }
        if (empty_input == '0') {
            var data = jQuery('#productWarrantyIssueFrm').serialize();
            var spinner =
                '<div class="spinner-border me-1" role="status" style="height: 12px;width: 12px;"><span class="visually-hidden">Loading...</span></div>Wait...';
            $('#warrrantyIssueBtn').html(spinner);
            jQuery.ajax({
                url: '/add/serial',
                data: data,
                type: 'post',
                success: function (result) {
                    $('#warrrantyIssueBtn').html('Continue');
                    if (result.status == 'success') {
                        // $('#warrantCardIssueModal').modal('hide');
                        // $('#warrantyCardDownloadModal').modal('show');
                        window.location.reload();
                    }
                }
            });
        } else {
            return false;
        }
    }


    function shipmentForm(e) {
        e.preventDefault();
        var data = jQuery('#shipmentFrm').serialize();
        var spinner =
            '<div class="spinner-border me-1" role="status" style="height: 12px;width: 12px;"><span class="visually-hidden">Loading...</span></div>Wait...';
        $('#shippingBtn').html(spinner);
        jQuery.ajax({
            url: '/order/shipment/process',
            data: data,
            type: 'post',
            success: function (result) {
                $('#shippingBtn').html('Continue');
                if (result.status == 'success') {
                    // $('#warrantCardIssueModal').modal('hide');
                    // $('#warrantyCardDownloadModal').modal('show');
                    window.location.reload();
                }
            }
        });
    }


    function orderCanceled(order_no, order_date, user_id, user_email, user_name) {
        var spinner =
            '<div class="spinner-border me-1" role="status" style="height: 12px;width: 12px;"><span class="visually-hidden">Loading...</span></div>Wait...';
        $('#order-cancel-modal-yesbtn').html(spinner);
        jQuery.ajax({
            url: '/cancel/order',
            data: 'order_no=' + order_no + '&order_date=' + order_date + '&user_id=' + user_id +
                '&user_email=' + user_email + '&user_name=' + user_name + '&_token=' + jQuery("[name='_token']")
                .val(),
            type: 'post',
            success: function (result) {
                $('#order-cancel-modal-yesbtn').html('Yes');
                $('#order-cancel-modal-yesbtn').attr('disabled', true);
                if (result.status == 'success') {
                    window.location.href = window.location.href;
                }
            }
        });
    }

    function productReturn(val) {
        if (val == 'yes') {
            document.getElementById('productReturn').value = 'yes';
            document.getElementById('hr-line').style.display = 'block';
            document.getElementById('refund-method').style.display = 'block';
            document.getElementById('return-note').style.display = 'none';
            document.getElementById('return-amount').style.display = 'none';
            // $('#return_note_text').removeAttr('required');​​​​​
            // $('#return_amount_text').removeAttr('required');​​​​​
        }

        if (val == 'no') {
            document.getElementById('productReturn').value = 'no';
            document.getElementById('hr-line').style.display = 'none';
            document.getElementById('refund-method').style.display = 'none';
            document.getElementById('return-note').style.display = 'block';
            document.getElementById('return-amount').style.display = 'block';
            // $('#return_note_text').attr("required", "true");​​​​​
            // $('#return_amount_text').attr("required", "true");​​​​​
        }
    }

    function refundTypes(type, total) {
        if (type == 'Full') {
            document.getElementById('refundType').value = 'Full';
            document.getElementById('return-amount').style.display = 'none';
            document.getElementById('refundAmount').value = total;

            // $('#return_amount_text').removeAttr('required');​​​​​
            // document.getElementById('hr-line').style.display = 'block';
        }

        if (type == 'Partial') {
            document.getElementById('refundType').value = 'Partial';
            document.getElementById('return-amount').style.display = 'block';
            // document.getElementById('hr-line').style.display = 'none';
            // $('#return_amount_text').attr("required", "true");​​​​​
        }
    }

    function refundForm(e) {
        e.preventDefault();
        document.getElementById('note-err-area').style.display = 'none';
        document.getElementById('amount-err-area').style.display = 'none';
        document.getElementById('return-product-err-area').style.display = 'none';
        document.getElementById('refund-type-err-area').style.display = 'none';
        var note = document.getElementById('return_note_text').value;
        var amount = document.getElementById('return_amount_text').value;

        var productReturn = document.getElementById('productReturn').value;
        var r_type = document.getElementById('refundType').value;

        if (productReturn == '') {
            document.getElementById('return-product-err-area').style.display = 'block';
            return false;
        } else {
            if (productReturn == 'yes') {
                if (r_type == '') {
                    document.getElementById('refund-type-err-area').style.display = 'block';
                    return false;
                }
            }
        }

        if (productReturn == 'no') {
            var is_return = 'no';
            if (!note) {
                document.getElementById('note-err-area').style.display = 'block';
                is_return = 'yes';
            }
            if (!amount) {
                document.getElementById('amount-err-area').style.display = 'block';
                is_return = 'yes';
            }

            if (is_return == 'yes') {
                return false;
            }
        }

        if (productReturn == 'yes' && r_type == 'Partial') {
            if (!amount) {
                document.getElementById('amount-err-area').style.display = 'block';
                return false;
            }
        }



        if (note) {
            document.getElementById('returnNote').value = note;
        }

        if (amount > 0) {
            document.getElementById('refundAmount').value = amount;
        }

        if (productReturn == 'no') {
            document.getElementById('refund_amount_text').innerText = ' refund ৳' + amount;
        } else {
            if (r_type == 'Partial') {
                document.getElementById('refund_amount_text').innerText = ' refund ৳' + amount;
            }

            if (r_type == 'Full') {
                document.getElementById('refund_amount_text').innerText = ' a full refund';
            }
        }

        $('#refundAddModal').modal('hide');
        $('#refundConfirmModal').modal('show');
    }

    function confirmRefund() {
        var spinner =
            '<div class="spinner-border me-1" role="status" style="height: 12px;width: 12px;"><span class="visually-hidden">Loading...</span></div>Wait...';
        $('#refund-confirm-btn').html(spinner);
        var data = $("#refundInfofrm").serialize();
        jQuery.ajax({
            url: '/refund/confirm',
            data: data,
            type: 'post',
            success: function (result) {
                $('#refund-confirm-btn').html('Yes');
                $('#refund-confirm-btn').attr('disabled', true);
                if (result.status == 'success') {
                    window.location.href = window.location.href;
                }
            }
        });
    }


    

</script>

<script>
    function updateItems(_this) {
        var ItemCount = _this.value //get the value
        var count = 1;
        var results = document.querySelector('#results') //append results
        results.innerHTML = '' //clear the results on each update
        //   for (var i = 1; i <= ItemCount; i++) {
        //     var input = document.createElement('input') //create input
        //     var label = document.createElement("label"); //create label
        //     label.innerText = 'Input ' + i
        //     input.type = "text";
        //     input.placeholder = "Type text here"; //add a placeholder
        //     input.className = "my-inputs"; // set the CSS class
        //     results.appendChild(label); //append label
        //     results.appendChild(document.createElement("br"));
        //     results.appendChild(input); //append input
        //     results.appendChild(document.createElement("br"));
        //   }
        if (ItemCount == 'Completed') {
            var res = $('#invoice').val();
            if (!res) {
                for (var i = 1; i <= 3; i++) {
                    //     var input = document.createElement('input') //create input
                    // var label = document.createElement("label"); //create label
                    // label.innerText = count 
                    // input.type = "text";
                    // input.placeholder = "Type text here"; //add a placeholder
                    // input.className = "form-control form-control-lg "; // set the CSS class
                    // results.appendChild(label); //append label
                    // results.appendChild(document.createElement("br"));
                    // results.appendChild(input); //append input
                    // results.appendChild(document.createElement("br"));
                    var $section = $(
                        '<div class="form-group"><label for="" class="col-12 col-form-label">Invoice Number</label><div class="col-12"><input type="text" value="INV{{$b}}" name="invoice" id="invoice" class="form-control" required></div></div>'
                    );
                    if ($('#results').children().length < 1) {
                        $('#results').append($section);
                    }

                }
            }

        }

    }

</script>



{{--  <script
   src="https://code.jquery.com/jquery-3.3.1.js"integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous">
   </script> --}}
{{--    <h4>Experience Section</h4>
 <div class="form-group row">
  <label for="experienceNo" class="col-4 col-form-label"> No of company add for experience</label>
  <div class="col-6">
    <select name="experienceNo" id="experienceNo" class="custom-select mb-2 mr-sm-2 mb-sm-0"> 
    <option value="">Select Value</option>`enter code here`
    <option value="0">0</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    </select>
    </div>
  </div>
  <div id="experienceSection"></div>
 <div class="form-group row"> 
 <div class="col-6"> 
 <button type="submit" name="genrate" class="btn btn-
 primary">Genrate</button> --}}

{{-- <script>
     $(document).ready(function(){
         $("#experienceNo").on("change",function(){
         var numInputs = $(this).val();
         $('#experienceSection').html('');
         for(var i=0; i < numInputs; i++)
         {
             var j = i*1;
            var $section =  $('<div class="form-group"><label for="" class="col-4 col-form-label">Company Name '+j+'</label><div class="col-6"><input type="text" name="companyname[]" class="form-control" required></div></div>');
            $('#experienceSection').append($section);
        }
    });
    });
 </script> --}}

<form id="refundInfofrm">
    @csrf
    <input type="hidden" name="productReturn" id="productReturn">
    <input type="hidden" name="refundType" id="refundType">
    <input type="hidden" name="returnNote" id="returnNote">
    <input type="hidden" name="refundAmount" id="refundAmount">
    <input type="hidden" name="userEmail" id="userEmail" value="{{$user_email}}">
    <input type="hidden" name="userID" id="userId" value="{{$orderData->user_id}}">
    <input type="hidden" name="userName" id="userName" value="{{$user_name}}">
    <input type="hidden" name="orderNo" id="orderNo" value="{{$orderData->order_no}}">
</form>

@endsection
