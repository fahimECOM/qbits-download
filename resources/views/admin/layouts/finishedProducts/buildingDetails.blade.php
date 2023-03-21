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
        padding: 6px;
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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Finish Product</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="javascript:void()" class="text-muted text-hover-primary">Requisition</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->

                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Building Details</li>
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
                    <div class="w-100 flex-lg-row-auto w-lg-100 mb-7 me-7 me-lg-10">
                        <!--begin::Order details-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2 class="text-gray-700">Requisition Details </h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body d-flex flex-lg-row-auto pt-0 "
                                style="justify-content: space-between;">
                                <div class="d-flex flex-column  gap-1">
                                    <!--begin::Input group-->
                                    <div class="fv-row ">
                                        <p class="form-label fs-4 text-gray-700">Requisition ID:
                                            RQ{{@$rq_info[0]->rq_id}}</p>
                                    </div>
                                    <div class="fv-row">
                                        <p class="form-label fs-4 text-gray-700">Requisition Slip No:
                                            {{@$rq_info[0]['RQDetails']['rq_serial_no']}}</p>
                                    </div>
                                </div>
                                <div class="d-flex flex-column mx-5  gap-1">
                                    <div class="fv-row">
                                        <p class="form-label fs-4 text-gray-700">Product Category:
                                            {{@$rq_info[0]['RQDetails']['product_type']}}</p>
                                    </div>
                                    <div class="fv-row">
                                        <p class="form-label fs-4 text-gray-700">Product Quantity:
                                            {{@$rq_info[0]['RQDetails']['quantity']}}</p>
                                    </div>
                                </div>

                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::Order details-->
                    </div>

                    <div class="card-title d-flex justify-content-end" style="width: 100%;">
                        @if ($total_finalized == count($rq_info))
                            @if(App\Models\User::hasPermission(["finalize_product_building"]))
                                <a href="{{route('requisition.building.complete',$rq_info[0]->rq_id)}}"><button class="btn btn-primary">Requisition Complete</button></a>
                            @else
                                <button class="btn btn-secondary" disabled>Requisition Complete</button>
                            @endif
                        @else
                            <button class="btn btn-secondary" disabled>Requisition Complete</button>
                        @endif
                    </div>

                </div>
                <!--end::Card header-->
                <!--begin::Card body-->

                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-end text-gray-400 fw-bolder fs-7 text-uppercase gs-2">
                                @if($rq_details->product_type == 'Laptop')
                                <th class=""></th>
                                <th class="text-start min-w-100px">Product</th>
                                <th class="text-start min-w-100px">Serial No</th>
                                <th class="text-start min-w-100px">Assemble Parts</th>
                                <th class="text-start min-w-100px">Lasering</th>
                                <th class="text-start min-w-100px">C & D Assembly</th>
                                <th class="text-center min-w-100px">Finalizing</th>
                                <!-- <th class="text-start min-w-100px">Block</th> -->
                                <th class=""></th>
                                @elseif($rq_details->product_type == 'Lania')
                                <th class=""></th>
                                <th class="text-start min-w-100px">Product</th>
                                <th class="text-start min-w-100px">Serial No</th>
                                <th class="text-start min-w-200px">Assemble Parts</th>
                                <th class="text-start min-w-200px">Lasering</th>
                                <th class="text-center min-w-200px">Finalizing</th>
                                <!-- <th class="text-start min-w-100px">Block</th> -->
                                <th class=""></th>
                                @endif
                            </tr>
                        </thead>
                        
                        <tbody class=" fw-bold text-gray-600" id="requisition_table_data">
                            @foreach ($rq_info as $key=>$details)
                            <tr>
                                <td></td>
                                <td>
                                    {{@$rq_info[0]['RQDetails']['product_type']}} #{{$key+ 1}}
                                </td>
                                <td>
                                    @if($details->prod_serial)
                                    <span class="">{{$details->prod_serial}}</span>
                                    <a class="ms-2" target="_blank"
                                        href="{{route('serial.download',$details->prod_serial)}}"> <i
                                            class=" fa-solid fs-3 text-success fa-circle-down"
                                            id="serialDownload"></i></a>
                                    @else
                                    <span class="">Not generate</span>
                                    @endif


                                </td>
                                <td>
                                    @if($details->building_progress_status == 0)
                                        @if(App\Models\User::hasPermission(["assembling_parts"]))
                                            <button id="assemble{{$key+ 1}}" type="button" class="btn btn-md btn-primary"
                                            onclick="openSKDBarcodeScannerModalAssembleParts('{{$key+ 1}}','{{$details->id}}')">Assemble</button>
                                        @else
                                            <button id="assemble{{$key+ 1}}" type="button" class="btn btn-md btn-primary" disabled>Assemble</button>
                                        @endif
                                    @elseif($details->building_progress_status > 0)
                                    <button type="button" class="btn btn-md btn-secondary" disabled>Assembled <i
                                            class="fa-solid fa-check text-success ms-2"
                                            style="font-weight: 900; font-size: 18px;"></i></button>
                                    @endif
                                </td>
                                <td>
                                    @if($details->building_progress_status < 1)
                                        @if($rq_details->product_type == 'Laptop')
                                        <button class="btn btn-secondary" disabled>Lasering</button>
                                        @elseif($rq_details->product_type == 'Lania')
                                        <button class="btn btn-secondary" disabled>Start Lasering</button>
                                        @endif
                                    @elseif($details->building_progress_status == 1)
                                        @if($rq_details->product_type == 'Laptop')
                                        <a class="me-1" href="{{route('serial.lasering',[$details->prod_serial,$details->product_id])}}">
                                            <i class=" fa-solid fs-3 text-success fa-circle-down"></i>
                                        </a>
                                        @endif
                                        @if(App\Models\User::hasPermission(["lasering_dcover"]))
                                            @if($rq_details->product_type == 'Laptop')
                                                <button class="btn btn-primary" onclick="openLaseringModal('{{$details->id}}','{{$details->prod_serial}}')">Lasering</button>
                                            @elseif($rq_details->product_type == 'Lania')
                                                <button class="btn btn-primary" onclick="openLaniaLaseringModal('{{$details->id}}','{{$details->prod_serial}}')">Start Lasering</button>
                                            @endif
                                        @else
                                            @if($rq_details->product_type == 'Laptop')
                                            <button class="btn btn-primary" disabled>Lasering</button>
                                            @elseif($rq_details->product_type == 'Lania')
                                            <button class="btn btn-primary" disabled>Start Lasering</button>
                                            @endif
                                        @endif
                                    @elseif($details->building_progress_status > 1)
                                        <a class="me-1" target="_blank" id="dw-btn" style="cursor:pointer;">
                                            <i class=" fa-solid fs-3 text-success fa-circle-down"></i>
                                        </a>
                                        @if($rq_details->product_type == 'Laptop')
                                        <button class="btn btn-secondary" disabled>Lasered
                                            <i class="fa-solid fa-check text-success ms-2"
                                                style="font-weight: 900; font-size: 18px;"></i>
                                        </button>
                                        @elseif($rq_details->product_type == 'Lania')
                                            @if($details->building_progress_status == 2)
                                            <button class="btn btn-primary" onclick="completeLaniaLaseringModal('{{$details->id}}','{{$details->prod_serial}}')">Complete Lasering</button>
                                            @elseif($details->building_progress_status > 2)
                                            <button class="btn btn-secondary" disabled>Lasered
                                                <i class="fa-solid fa-check text-success ms-2"
                                                    style="font-weight: 900; font-size: 18px;"></i>
                                            </button>
                                            @endif
                                        @endif
                                    @endif
                                </td>
                                @if($rq_details->product_type == 'Laptop')
                                <td>
                                    @if($details->building_progress_status < 2) 
                                        <button class="btn btn-secondary" disabled>C & D Assembly</button>
                                    @elseif($details->building_progress_status == 2)
                                        @if(App\Models\User::hasPermission(["dcover_joining_assemble_parts"]))
                                            <button class="btn btn-primary" onclick="openD_C_Cover_ScaningModal('{{$details->id}}','{{$details->prod_serial}}')">C & D Assembly</button>
                                        @else
                                            <button class="btn btn-primary" disabled>C & D Assembly</button>
                                        @endif
                                    @elseif($details->building_progress_status > 2)
                                        <button class="btn btn-secondary" disabled>C & D Assembled<i class="fa-solid fa-check text-success ms-2" style="font-weight: 900; font-size: 18px;"></i></button>
                                    @endif
                                </td>
                                @endif
                                <td>
                                    @if($details->building_progress_status < 3) 
                                        <button class="btn btn-secondary" disabled>Finalizing</button>
                                    @elseif($details->building_progress_status == 3)
                                        @if(App\Models\User::hasPermission(["finalize_product_building"]))
                                            <button class="btn btn-primary" onclick="openFinalizeProductModal(`{{$details->prod_serial}}`)">Finalizing</button>
                                        @else
                                            <button class="btn btn-primary" disabled>Finalizing</button>
                                        @endif
                                    @elseif($details->building_progress_status > 3)
                                        <a class="me-1" target="_blank" href="{{route('serial.label',[$details->prod_serial,$details->product_id])}}"><i class=" fa-solid fs-3 text-success fa-circle-down"></i></a>
                                        <button class="btn btn-secondary" disabled>Finalized <i class="fa-solid fa-check text-success ms-2" style="font-weight: 900; font-size: 18px;"></i></button>
                                    @endif

                                </td>
                                <!-- <td> <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#blockModal"
                                        data-bs-whatever="@mdo">Block</button></td> -->
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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

<div class="modal fade" id="asssemblePartsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" id="entrySkdModalBody">
        <div class="modal-content">
            <div class="modal-header" style="justify-content: center;">
                <h5 class="modal-title fs-4" id="exampleModalLabel">Assemble
                    <span id="assemble_product_type">{{$rq_info[0]['RQDetails']['product_type']}}</span> #<span
                        id="assemble_key_number">1</span> SKD Parts</h5>

            </div>
            <div class="modal-body">

                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                    <thead>
                        <tr class="text-end text-gray-600 fw-bolder fs-7 text-uppercase gs-2">
                            <th class="text-start min-w-100px">SKD type</th>
                            <th class="text-center min-w-0px">Scanned</th>
                        </tr>
                    </thead>
                    <tbody class="fw-bold text-gray-700" id="">
                        <tr>
                            <td> <label for="recipient-name" class="col-form-label">RAM:
                                    <span id="assemble_ram_size">{{$rq_info[0]['RQDetails']['ram_size']}}</span>
                                    GB {{$rq_info[0]['RQDetails']['ram_type']}}
                                    {{$rq_info[0]['RQDetails']['bus_speed']}}</label></td>
                            <td class="text-center pe-0" id="ram-fa-checked"></td>
                        </tr>

                        <tr>
                            <td> <label for="recipient-name" class="col-form-label">SSD:
                                    <span id="assemble_ssd_size">{{$rq_info[0]['RQDetails']['ssd_size']}}</span>
                                    {{$rq_info[0]['RQDetails']['ssd_size'] == '1' ? 'TB ' : 'GB '}}
                                    {{$rq_info[0]['RQDetails']['ssd_type']}}
                                    {{$rq_info[0]['RQDetails']['m2_type']}}</label></td>
                            <td class="text-center pe-0" id="ssd-fa-checked"></td>
                        </tr>
                        <tr>
                            <td> <label for="recipient-name" class="col-form-label">Barebone: Core
                                    <span id="assemble_bb_processor">{{$rq_info[0]['RQDetails']['bb_processor']}}</span>
                                    {{$rq_info[0]['RQDetails']['bb_type']}}
                                    {{$rq_info[0]['RQDetails']['bb_mode']}}</label></td>
                            <td class="text-center pe-0" id="bb-fa-checked"></td>
                        </tr>
                    </tbody>
                </table>

                <h5 class="modal-title text-center fs-4">Scan All SKD's Barcode</h5>
                <div class="mb-3" id="assemble-barcode-scan-field">
                    <br>

                    <textarea type="text" name="assemble_skd_barcode_scan_field" id="assemble_skd_barcode_scan_field"
                        readonly onclick="assembleSKDBarcodeFieldFocus()" class="form-control form-control-solid"
                        rows="3" cols="5"></textarea>
                    <div id="error_assemble_skd_barcode_scan_field" class="text-danger mb-2 mt-3"></div>
                </div>
                <input style="background: transparent;border: none;outline: none;color: #1E1E2D;" type="text"
                        class="test" id="assemble_skd_barcode_input_field" value="" onchange="entryAssembleSKDBarcode()" />
                <input type="hidden" id="total_assemble_skd_scanned" value="0" />
                <input type="hidden" id="total_assemble_skd_scanned_type" value="" />
                <input type="hidden" id="prod_serial_table_id" value="" />
                <div class="text-center">
                    <button type="button" class="btn btn-secondary me-5" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button"
                        onclick="handleSubmitPartsAssembleModal()">Submit</button>
                </div>
            </div>

        </div>
    </div>
</div>



<!-- blockModal -->
<!-- <div class="modal fade" id="blockModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" id="entrySkdModalBody">
        <div class="modal-content">
            <div class="modal-header" style="justify-content: center;">
                <h5 class="modal-title fs-4" id="exampleModalLabel">Why you want to block</h5>
            </div>
            <div class="modal-body">

                <form id="entryItemsForm" action="{{route('serial.generate')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3" id="barcode-scan-field">
                        <textarea type="text" name="barcode_scan_id" id="barcode_scan_id" onclick="barcodeFieldFocus()"
                            class="form-control form-control-solid" rows="6" cols="5"
                            placeholder="Write down the reason. Ex: Ram Problem"></textarea>
                        <div id="error-barcode_item_id" class="text-danger mb-2 mt-3"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                            data-bs-target="#scanBlockModal" data-bs-whatever="@mdo">Continue</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div> -->


<!-- scanBlockModal -->
<!-- <div class="modal fade" id="scanBlockModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" id="">
        <div class="modal-content">
            <div class="modal-header" style="justify-content: center;">
                <h5 class="modal-title fs-4" id="exampleModalLabel">Scan Problematic SKD's Barcode</h5>
            </div>
            <div class="modal-body">

                <form id="entryItemsForm" action="{{route('serial.generate')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf


                    <div class="mb-3" id="barcode-scan-field">
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Continue</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div> -->


<!-- Assemble skd scan error message modal -->
<!-- SKD Barcode Scaning Error Modal-->
<div class="modal fade " id="assemble_skd_scan_error_alert_modal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="assemble_skd_scan_error_alert_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h1 class="text-center error-cross-icon"><i class="fa-solid fa-xmark"
                        style="color: #ff00008a;font-size: 30px;"></i></h1>
                <h1 class="text-center mt-5" id="assemble_skd_scan_error_alert_modal_title">Error!</h1>
                <p class="text-center mt-5" id="assemble_skd_scan_error_alert_modal_text">Something went wrong. Please
                    try some time later.</p>
            </div>
            <div class="mx-auto mt-5 mb-5">
                <button type="button" class="btn btn-secondary" style="margin-bottom: 20px;"
                    onclick="closeAssembleSKDScanErrorAlertModal()">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Requisition Building Success Modal -->
<div class="modal fade " id="requisition_building_success_alert_modal" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="requisition_building_success_alert_modalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="subscribe_success_circle">
                    <img style="padding-top: 11px;padding-left: 10px;" src="{{ asset('success_icon.png') }}"
                        alt="success" />
                </div>

                <h1 class="text-center mt-5">Success!</h1>
                <p class="text-center mt-5 lh-lg" id="requisition_building_success_modal_text">Successfully parts
                    assemble completed!</p>
            </div>
            <div class="mx-auto mt-5 mb-5">
                <button type="button" class="btn btn-secondary" style="margin-bottom: 20px;" data-bs-dismiss="modal"
                    onclick="window.location.reload();">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Requisition Building Error Modal -->
<div class="modal fade " id="requisition_building_error_alert_modal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="requisition_building_error_alert_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h1 class="text-center error-cross-icon"><i class="fa-solid fa-xmark"
                        style="color: #ff00008a;font-size: 30px;"></i></h1>
                <h1 class="text-center mt-5" id="requisition_building_error_alert_modal_title">Error!</h1>
                <p class="text-center mt-5" id="requisition_building_error_alert_modal_text">Something went wrong.
                    Please try after some time!</p>
            </div>
            <div class="mx-auto mt-5 mb-5">
                <button type="button" class="btn btn-secondary" style="margin-bottom: 20px;" data-bs-dismiss="modal"
                    onclick="closeRQBuildingErrorAlertModal()">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- D-Cover & C-Cover Lasering Alert Modal -->
<div class="shipping-modal modal fade" id="laseringConfirmAlertModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="laseringConfirmAlertModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md p-5">
        <div class="modal-content p-5">
            <div class="modal-body">
                <h1 class="text-center alert-question-icon"><i class="fa-solid fa-question"
                        style="color: #f8e00cfa;font-size: 30px;"></i></h1>
                <h3 class="text-center pb-2 mb-5 lh-lg">Do you complete D-Cover & C-Cover Lasering?</h3>
                <form action="{{route('lasering.complete')}}" id="RQCreationrejectvalue" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3 justify-content-center text-center">
                            <div class="d-flex justify-content-center order-cancel-btn-field">
                                <button type="button" class="btn btn-secondary mx-5"
                                    onclick="closeLaseringConfirmAlertModal()">No</button>
                                <input type="hidden" id="prod_sl_table_id" name="prod_sl_table_id" value="">
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<!-- D-Cover & C-Cover Lasering  Modal -->
<div class="shipping-modal modal fade" id="laseringModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="laseringModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md p-5">
        <div class="modal-content p-5">
            <!-- <div class="modal-header">
                <a class="btn btn-primary me-1 text-white" id="d-cover-print" href="" download>
                    <i class=" fa-solid fs-3 text-white fa-circle-down"></i>D-Cover Print</a>
                <a class="btn btn-info me-1" id="c-cover-print" href="" download>
                    <i class=" fa-solid fs-3 text-white fa-circle-down"></i>C-Cover Print
                </a>
            </div> -->
            <div class="modal-body">
                <h3 class="text-center pb-2 mb-5 lh-lg">If you completed D-Cover and C-Cover Lasering then please
                    confirm.</h3>
                <div class="row">
                    <div class="col-md-12 mb-3 justify-content-center text-center">
                        <div class="d-flex justify-content-center order-cancel-btn-field">
                            <button type="button" class="btn btn-secondary mx-5" data-bs-dismiss="modal">Close</button>
                            <input type="hidden" id="prod_sl_id" name="prod_sl_id" value="">
                            <input type="hidden" id="prod_serial" name="prod_serial" value="">
                            <button type="button" class="btn btn-primary"
                                onclick="openLaseringConfirmAlertModal()">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Lania Lasering A-Cover scaning  Modal -->
<div class="shipping-modal modal fade" id="laniaLaseringModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="laniaLaseringModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md p-5">
        <div class="modal-content p-5">
            <div class="modal-body">
                <p class="text-center fs-5">To start lasering please scan Lania A Cover barcode</p>
                <div class="row">
                    <textarea type="text" name="assemble_skd_barcode_scan_field" id="assemble_skd_barcode_scan_field"
                        readonly onclick="assembleSKDBarcodeFieldFocus()" class="form-control form-control-solid"
                        rows="3" cols="5"></textarea>
                    <input style="background: transparent;border: none;outline: none;color: #1E1E2D;" type="text"
                    class="test" id="assemble_skd_barcode_input_field" value="" onchange="entryAssembleSKDBarcode()" />
                    <div class="col-md-12 mb-3 mt-5 justify-content-center text-center">
                        <div class="d-flex justify-content-center order-cancel-btn-field">
                            <button type="button" class="btn btn-secondary mx-5" data-bs-dismiss="modal">Close</button>
                            <input type="hidden" id="prod_sl_id" name="prod_sl_id" value="">
                            <input type="hidden" id="prod_serial" name="prod_serial" value="">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- D Cover & Barebone Assembly modal -->
<div class="modal fade" id="C_D_asssembleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="C_D_asssembleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header " style="justify-content: center;">
                <h5 class="modal-title fs-4 text-gray-600" id="exampleModalLabel">Assemble
                    <span id="assemble_prod_type">{{$rq_info[0]['RQDetails']['product_type']}}</span> <span
                        id="assemble_prod_serial" class="text-gray-600">#{{$rq_info[0]->prod_serial}}</span></h5>

            </div>
            <div class="modal-body">

                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                    <thead>
                        <tr class="text-end text-gray-600 fw-bolder fs-7 text-uppercase gs-2">
                            <th class="text-start min-w-100px">Assemble type</th>
                            <th class="text-center min-w-0px">Scanned</th>
                        </tr>
                    </thead>
                    <tbody class="fw-bold text-gray-700" id="">
                        <!-- <tr>
                            <td> <label for="recipient-name" class="col-form-label">Scan C Cover</span>
                                </label></td>
                            <td class="text-center pe-0" id="ram-fa-checked"><button
                                    class="btn btn-success btn-sm">Scan</button></td>
                        </tr> -->

                        <tr>
                            <td> <label for="recipient-name" class="col-form-label">
                                    <span>Scan D Cover</span></label></td>
                            <td class="text-center pe-0" id="dcover-scan-fa-checked"><button
                                    class="btn btn-success btn-sm" onclick="openModalScanBareboneDCover('D Cover','{{$rq_info[0]->prod_serial}}')">Scan</button></td>
                        </tr>
                        <tr>
                            <td> <label for="recipient-name" class="col-form-label">Scan Barebone
                                    <span></label></td>
                            <td class="text-center pe-0" id="bb-scan-fa-checked"><button
                                    class="btn btn-success btn-sm" onclick="openModalScanBareboneDCover('Barebone','{{$rq_info[0]->prod_serial}}')">Scan</button></td>
                        </tr>
                    </tbody>
                </table>
                <input type="hidden" id="c_d_assemble_prod_serial" value="">
                <input type="hidden" id="total_scan_barebone_dcover_assemble" value="0" />
                <div class="text-center">
                    <button type="button" class="btn btn-secondary me-5" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button" onclick="submitBareboneDCoverAssemble()">Confirm</button>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- D Cover & Barebone scan modal -->
<div class="modal fade" id="dCover_barebone_scan_modal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="1" aria-labelledby="dCover_barebone_scan_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md p-5">
        <div class="modal-content p-5">
            <div class="modal-body">
                <h2 class="text-center mb-5">Scan <span id="dcover_barebone_scan_type">D Cover</span> Barcode</h2>
                <div class="mb-3">
                    <textarea type="text" name="dcover_barebone_scan_field" id="dcover_barebone_scan_field" readonly
                        onclick="focusBareboneDCoverInputField()" class="form-control form-control-solid" rows="3" cols="5"></textarea>
                </div>
                
            </div>
            <input type="hidden" name="dcover_barebone_assemble_serial" id="dcover_barebone_assemble_serial" value="">
            <div class="mx-auto mb-5 text-center">
                <button type="button" class="btn btn-secondary me-5"
                    onclick="closeBareboneDCoverScanModal()">Close</button>
            </div>
            <input type="text" style="background: transparent;border: none;outline: none;color: #1E1E2D;"
                    class="test" id="dcover_barebone_scan_input_field" value=""
                    onchange="verifyBareboneDCoverBarcode()" autocomplete="off"/>
        </div>
    </div>
</div>



<!-- Barebone & D Cover Confirm Error Modal-->
<div class="modal fade " id="barebone_dcover_assemble_error_alert_modal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="barebone_dcover_assemble_error_alert_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h1 class="text-center error-cross-icon"><i class="fa-solid fa-xmark"
                        style="color: #ff00008a;font-size: 30px;"></i></h1>
                <h1 class="text-center mt-5" id="barebone_dcover_assemble_error_modal_title">Error!</h1>
                <p class="text-center mt-5" id="barebone_dcover_assemble_error_modal_text">Something went wrong. Please try some time later.</p>
            </div>
            <input type="hidden" id="barebone_dcover_error_type" value="">
            <div class="mx-auto mt-5 mb-5">
                <button type="button" class="btn btn-secondary" style="margin-bottom: 20px;" data-bs-dismiss="modal"
                    onclick="closeBareboneDCoverErrorAlertModal()">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- product finalize modal -->
<div class="modal fade" id="product_finalize_modal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="1" aria-labelledby="product_finalize_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md p-5">
        <div class="modal-content p-5" id="">
            <div class="modal-body" id="product_finalize_modal_body">
                <div>
                    <h3 class="text-center mb-5 lh-lg text-success">Please scan your product to initiate the finalizing process.</h3>
                    <div class="mb-3">
                        <textarea type="text" name="product_finalize_scan_field" id="product_finalize_scan_field" readonly
                            onclick="focusProductFinalizeInputField()" class="form-control form-control-solid" rows="3" cols="5"></textarea>
                    </div>
                    
                    <input type="hidden" id="finalize_prod_serial" value="">
                    <div class="mx-auto text-center">
                        <button type="button" class="btn btn-secondary mt-5 me-5"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                    <input type="text" style="background: transparent;border: none;outline: none;color: #1E1E2D;"
                            class="test" id="product_finalize_scan_input_field" value=""
                            onchange="verifyProductFinalizeBarcode()" autocomplete="off"/>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Requisition Product Finalize Scan Error Modal-->
<div class="modal fade " id="finalize_product_scan_error_alert_modal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="finalize_product_scan_error_alert_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h1 class="text-center error-cross-icon"><i class="fa-solid fa-xmark"
                        style="color: #ff00008a;font-size: 30px;"></i></h1>
                <h1 class="text-center mt-5">Invalid!</h1>
                <p class="text-center mt-5">Please scan right product to go next process.</p>
            </div>
            <div class="mx-auto mt-5 mb-5">
                <button type="button" class="btn btn-secondary" style="margin-bottom: 20px;" data-bs-dismiss="modal"
                    onclick="closeFinalizeProductScanErrorAlertModal()">Close</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="{{ asset('js/dom-to-image.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/downloadpng.js') }}"></script>
<script>
    // var btn = document.getElementById("assemble");
    // btn.style.cursor = 'not-allowed';
    // btn.disabled = true;


    //open skd barcode scan modal for assemble parts
    function openSKDBarcodeScannerModalAssembleParts(key, prod_sl_id) {
        $('#asssemblePartsModal').modal('show');
        $('#assemble_key_number').html(key);
        $('#prod_serial_table_id').val(prod_sl_id);
        $('#ram-fa-checked').html('<i class="fa-solid fa-xmark skd-not-checked"></i>');
        $('#ssd-fa-checked').html('<i class="fa-solid fa-xmark skd-not-checked"></i>');
        $('#bb-fa-checked').html('<i class="fa-solid fa-xmark skd-not-checked"></i>');
        $('#assemble_skd_barcode_scan_field').val('');
        $('#error_assemble_skd_barcode_scan_field').html('');
        $('#assemble_skd_barcode_input_field').val('');

    }


    //
    function entryAssembleSKDBarcode() {
        $('#error_assemble_skd_barcode_scan_field').html('');
        var total_sccaned = parseInt($('#total_assemble_skd_scanned').val());
        if (total_sccaned == 3) {
            $('#asssemblePartsModal').css("opacity", "0");
            $('#assemble_skd_scan_error_alert_modal').modal('show');
            $('#assemble_skd_scan_error_alert_modal_title').html('Error!');
            $('#assemble_skd_scan_error_alert_modal_text').html('Already scanned all skd barcode for assemble.');
        } else {
            var cur_barcode = $('#assemble_skd_barcode_input_field').val();
            var scanned_skd_type = $('#total_assemble_skd_scanned_type').val();

            var ram_size = $('#assemble_ram_size').html();
            if (ram_size == '4') {
                ram_size = '2';
            } else if (ram_size == '8') {
                ram_size = '3';
            } else if (ram_size == '16') {
                ram_size = '4';
            } else if (ram_size == '32') {
                ram_size = '5'
            }

            var ssd_size = $('#assemble_ssd_size').html();
            if (ssd_size == '256') {
                ssd_size = '8';
            } else if (ssd_size == '512') {
                ssd_size = '9';
            } else if (ssd_size == '1') {
                ssd_size = '0';
            }

            var bb_processor = $('#assemble_bb_processor').html();

            jQuery.ajax({
                url: '/assemble-parts-skd-barcode-check',
                data: 'cur_barcode=' + cur_barcode + '&scanned_skd_type=' + scanned_skd_type + '&ram_size=' +
                    ram_size + '&ssd_size=' + ssd_size + '&bb_processor=' + bb_processor[1] + '&_token=' +
                    jQuery("[name='_token']").val(),
                type: 'post',
                success: function (result) {

                    if (result.status == 'success') {
                        var previous_scaned_skd = $('#assemble_skd_barcode_scan_field').val();
                        if (previous_scaned_skd) {
                            $('#assemble_skd_barcode_scan_field').val(previous_scaned_skd + ',' +
                                cur_barcode);
                        } else {
                            $('#assemble_skd_barcode_scan_field').val(cur_barcode);
                        }
                        $('#assemble_skd_barcode_input_field').val('');

                        var total_skd_scanned = parseInt($('#total_assemble_skd_scanned').val());
                        console.log(scanned_skd_type);

                        $('#total_assemble_skd_scanned').val(total_skd_scanned + 1);

                        if (result.skd_type == 'ram') {
                            $('#ram-fa-checked').html('<i class="fa-solid fa-check skd-checked"></i>');
                            if (scanned_skd_type) {
                                $('#total_assemble_skd_scanned_type').val(scanned_skd_type + ',ram');
                            } else {
                                $('#total_assemble_skd_scanned_type').val('ram');
                            }
                        } else if (result.skd_type == 'ssd') {
                            $('#ssd-fa-checked').html('<i class="fa-solid fa-check skd-checked"></i>');
                            if (scanned_skd_type == null) {
                                $('#total_assemble_skd_scanned_type').val('ssd');
                            } else {
                                $('#total_assemble_skd_scanned_type').val(scanned_skd_type + ',ssd');
                            }
                        } else if (result.skd_type == 'bb') {
                            $('#bb-fa-checked').html('<i class="fa-solid fa-check skd-checked"></i>');
                            if (scanned_skd_type == null) {
                                $('#total_assemble_skd_scanned_type').val('bb');
                            } else {
                                $('#total_assemble_skd_scanned_type').val(scanned_skd_type + ',bb');
                            }
                        }
                    } else if (result.status == 'error') {
                        $('#asssemblePartsModal').css("opacity", "0");
                        $('#assemble_skd_scan_error_alert_modal').modal('show');
                        $('#assemble_skd_scan_error_alert_modal_title').html(result.error_type);
                        $('#assemble_skd_scan_error_alert_modal_text').html(result.message);
                    }
                }
            });
        }
    }

    //submit assemble parts modal
    function handleSubmitPartsAssembleModal() {
        $('#error_assemble_skd_barcode_scan_field').html('');
        var total_sccaned = parseInt($('#total_assemble_skd_scanned').val());
        var prod_serial_table_id = parseInt($('#prod_serial_table_id').val());
        var assemble_skd_barcodes = $('#assemble_skd_barcode_scan_field').val();
        var assemble_product_type = $('#assemble_product_type').html();
        if (total_sccaned == 3) {
            jQuery.ajax({
                url: '/assemble-parts-submit',
                data: 'prod_serial_table_id=' + prod_serial_table_id + '&assemble_skd_barcodes=' +
                    assemble_skd_barcodes + '&assemble_product_type=' + assemble_product_type + '&_token=' +
                    jQuery("[name='_token']").val(),
                type: 'post',
                success: function (result) {
                    if (result.status == 'success') {
                        $('#asssemblePartsModal').modal('hide');
                        $('#requisition_building_success_alert_modal').modal('show');
                        $('#requisition_building_success_modal_text').html(result.message);
                    } else if (result.status == 'error') {
                        $('#asssemblePartsModal').css('opacity', '0');
                        $('#requisition_building_error_alert_modal').modal('show');
                        $('#requisition_building_error_alert_modal_title').html(result.error_type);
                        $('#requisition_building_error_alert_modal_text').html(result.message);
                    }
                }
            });
        } else {
            $('#error_assemble_skd_barcode_scan_field').html('Please scan all skd for assemble!');
            document.getElementById("assemble_skd_barcode_input_field").focus();
        }
    }

    function closeAssembleSKDScanErrorAlertModal() {
        $('#assemble_skd_scan_error_alert_modal').modal('hide');
        $('#asssemblePartsModal').css("opacity", "1");
        $('#assemble_skd_barcode_input_field').val('');
        document.getElementById("assemble_skd_barcode_input_field").focus();
    }

    //focus assemble skd barcode scanner field
    function assembleSKDBarcodeFieldFocus() {
        document.getElementById("assemble_skd_barcode_input_field").focus();
    }

    // close requisition building error modal
    function closeRQBuildingErrorAlertModal() {
        $('#requisition_building_error_alert_modal').modal('hide');
        $('#asssemblePartsModal').css('opacity', '1');
    }

    //open d-cover & c-cover lasering  modal
    function openLaseringModal(prod_sl_table_id, prod_sl) {
        $('#laseringModal').modal('show');
        $('#prod_sl_id').val(prod_sl_table_id);
        $('#prod_serial').val(prod_sl);
        // var base_url = window.location.origin;
        // var d_cover_url = base_url + "/admin/finished/product/serial/lasering/" + prod_sl;
        // var c_cover_url = base_url + "/admin/finished/product/serial/c-cover/" + prod_sl;
        // $('#d-cover-print').attr('href', d_cover_url);
        // $('#c-cover-print').attr('href', c_cover_url);


    }

    //open lania A-Cover, B-Cover & C-Cover lasering  modal
    function openLaniaLaseringModal(prod_sl_table_id, prod_sl) {
        $('#laniaLaseringModal').modal('show');
        $('#prod_sl_id').val(prod_sl_table_id);
        $('#prod_serial').val(prod_sl);
        // var base_url = window.location.origin;
        // var d_cover_url = base_url + "/admin/finished/product/serial/lasering/" + prod_sl;
        // var c_cover_url = base_url + "/admin/finished/product/serial/c-cover/" + prod_sl;
        // $('#d-cover-print').attr('href', d_cover_url);
        // $('#c-cover-print').attr('href', c_cover_url);


    }

    //open d-cover & c-cover lasering alert modal
    function openLaseringConfirmAlertModal() {
        $('#laseringModal').modal('hide');
        $('#laseringConfirmAlertModal').modal('show');
        $('#prod_sl_table_id').val($('#prod_sl_id').val());
    }

    //close d-cover & c-cover lasering alert modal
    function closeLaseringConfirmAlertModal() {
        $('#laseringConfirmAlertModal').modal('hide');
        $('#laseringModal').modal('show');
    }

    //open C & D Cover Asse4mbly Modal
    function openD_C_Cover_ScaningModal(prod_sl_table_id, prod_sl) {
        $('#C_D_asssembleModal').modal('show');
        $('#assemble_prod_serial').html('#'+prod_sl);
        $('#c_d_assemble_prod_serial').val(prod_sl);
        $('#dcover-scan-fa-checked').html(`<button class="btn btn-success btn-sm" onclick="openModalScanBareboneDCover(`+"'D Cover'"+",'"+prod_sl+`')">Scan</button>`);
        $('#bb-scan-fa-checked').html(`<button class="btn btn-success btn-sm" onclick="openModalScanBareboneDCover(`+"'Barebone'"+",'"+prod_sl+`')">Scan</button>`);
        $('#total_scan_barebone_dcover_assemble').val(0);
        $('#dcover_barebone_scan_input_field').val('');
    }

    //open D Cover & Barebone Assembly Scan Modal
    function openModalScanBareboneDCover(type,prod_sl) {
        $('#C_D_asssembleModal').css('opacity','0');
        $('#dCover_barebone_scan_modal').modal('show');
        $('#dcover_barebone_scan_type').html(type);
        $('#dcover_barebone_assemble_serial').val(prod_sl);
        $('#dcover_barebone_scan_input_field').val('');
        $('#barebone_dcover_error_type').val('');
    }

    //close D Cover & Barebone Scan Modal
    function closeBareboneDCoverScanModal() {
        $('#dCover_barebone_scan_modal').modal('hide');
        $('#C_D_asssembleModal').css('opacity','1');
    }


    //submit barebone d cover assemble
    function submitBareboneDCoverAssemble(){
        let prod_sl = $('#c_d_assemble_prod_serial').val();
        let total_scan_barebone_dcover_assemble = parseInt($('#total_scan_barebone_dcover_assemble').val());
        if(total_scan_barebone_dcover_assemble == 2) {
            jQuery.ajax({
                url: '/confirm-barebone-dcover-assemble',
                data: 'prod_sl=' + prod_sl + '&_token=' + jQuery("[name='_token']").val(),
                type: 'post',
                success: function (result) {
                    if(result.status == 'success') {
                        location.reload();
                    }
                }
            });
        } else {
            $('#C_D_asssembleModal').css('opacity','0');
            $('#barebone_dcover_assemble_error_alert_modal').modal('show');
            $('#barebone_dcover_assemble_error_modal_title').html('Error!');
            $('#barebone_dcover_assemble_error_modal_text').html('You need to scan both Barebone & D Cover for confirm.');
            $('#barebone_dcover_error_type').val('confirm_error');
        }
    }


    //error modal of barebone & dcover assemble submit
    function closeBareboneDCoverErrorAlertModal() {
        $('#barebone_dcover_assemble_error_alert_modal').modal('hide');
        if($('#barebone_dcover_error_type').val() == 'confirm_error') {
            $('#C_D_asssembleModal').css('opacity','1');
        } else if ($('#barebone_dcover_error_type').val() == 'scan_error'){
            $('#dCover_barebone_scan_modal').css('opacity','1');
        } 
    }


    //focus barebone & dcover scan field
    function focusBareboneDCoverInputField() {
        document.getElementById("dcover_barebone_scan_input_field").focus();
    }

    //get scan barcode value from this function (barebone & dcover assemble scan)
    function verifyBareboneDCoverBarcode () {
        let cur_code = $('#dcover_barebone_scan_input_field').val();
        let prod_sl = $('#dcover_barebone_assemble_serial').val();
        let type = $('#dcover_barebone_scan_type').html();
        if(type == 'D Cover') {
            if(cur_code == prod_sl){
                $('#dCover_barebone_scan_modal').modal('hide');
                $('#C_D_asssembleModal').css('opacity','1');
                $('#dcover-scan-fa-checked').html('<button class="btn btn-secondary btn-sm" disabled><i class="fa-solid fa-check" style="color: #3ac104;font-size: 18px;"></i></button>');
                $('#total_scan_barebone_dcover_assemble').val(parseInt($('#total_scan_barebone_dcover_assemble').val()) + 1);
                $('#dcover_barebone_scan_input_field').val('');
            } else {
                $('#barebone_dcover_assemble_error_alert_modal').modal('show');
                $('#barebone_dcover_assemble_error_modal_title').html('Invalid!');
                $('#barebone_dcover_assemble_error_modal_text').html('Please scan a valid barcode.');
                $('#dCover_barebone_scan_modal').css('opacity','0');
                $('#dcover_barebone_scan_input_field').val('');
                $('#barebone_dcover_error_type').val('scan_error');

            }
        } else if(type == 'Barebone') {
            if(cur_code) {
                jQuery.ajax({
                    url: '/check-valid-barcode-barebone-assemble-dcover',
                    data: 'cur_code=' + cur_code + '&prod_sl=' + prod_sl + '&_token=' + jQuery("[name='_token']").val(),
                    type: 'post',
                    success: function (result) {
                        if(result.status == 'success') {
                            $('#dCover_barebone_scan_modal').modal('hide');
                            $('#C_D_asssembleModal').css('opacity','1');
                            $('#bb-scan-fa-checked').html('<button class="btn btn-secondary btn-sm" disabled><i class="fa-solid fa-check" style="color: #3ac104;font-size: 18px;"></i></button>');
                            $('#total_scan_barebone_dcover_assemble').val(parseInt($('#total_scan_barebone_dcover_assemble').val()) + 1);
                            $('#dcover_barebone_scan_input_field').val('');
                            $('#barebone_dcover_error_type').val('');
                        } else if(result.status == 'error') {
                            $('#barebone_dcover_assemble_error_alert_modal').modal('show');
                            $('#barebone_dcover_assemble_error_modal_title').html('Invalid!');
                            $('#barebone_dcover_assemble_error_modal_text').html(result.message);
                            $('#dCover_barebone_scan_modal').css('opacity','0');
                            $('#dcover_barebone_scan_input_field').val('');
                            $('#barebone_dcover_error_type').val('scan_error');
                        }
                    }
                });
            } else {
                return;
            }
        }
    }


    //open modal for finalize product
    function openFinalizeProductModal(prod_sl) {
        $('#product_finalize_modal').modal('show');
        $('#finalize_prod_serial').val(prod_sl);
        $('#product_finalize_scan_input_field').val('');
    }

    //focus product finalize scan field
    function focusProductFinalizeInputField() {
        document.getElementById("product_finalize_scan_input_field").focus();
    }

    //check valid scan barcode to start initiate the finalizing process
    function verifyProductFinalizeBarcode() {
        let prod_sl = $('#finalize_prod_serial').val();
        let cur_code = $('#product_finalize_scan_input_field').val();
        if(cur_code == prod_sl) {
            jQuery.ajax({
                url: '/requisition-building-finalize-product-complete',
                data: 'prod_sl=' + prod_sl + '&_token=' + jQuery("[name='_token']").val(),
                type: 'post',
                success: function (result) {
                    if(result.status == 'success') {
                        $('#product_finalize_modal_body').html(result.html);
                    }
                }
            });
        } else {
            $('#product_finalize_modal').css('opacity','0');
            $('#product_finalize_scan_input_field').val('');
            $('#finalize_product_scan_error_alert_modal').modal('show');
        }
    }

    //close finalize product scan error modal
    function closeFinalizeProductScanErrorAlertModal() {
        $('#finalize_product_scan_error_alert_modal').modal('hide');
        $('#product_finalize_modal').css('opacity','1');
    }

</script>

@endsection
