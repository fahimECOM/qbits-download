@extends('admin.master')

@section('admin-content')
<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
<script src="assets/js/scripts.bundle.js"></script>
<style>
    /* td.text-start.pe-0.quantity-flex {
        display: flex;
        justify-content: space-evenly;
        gap: 54px;
        flex-direction: column;
        align-items: center;
    } */
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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Queue Listing</h1>
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
                    <li class="breadcrumb-item text-dark">Queue Listing</li>
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
                                <th class="text-start min-w-100px">ENS No</th>
                                <th class="text-start min-w-100px">Category</th>
                                <th class="text-start min-w-100px">Brand</th>
                                <th class="text-start min-w-100px">Quantity</th>
                                <th class="text-start min-w-100px">Created Date</th>
                                <th class="text-start min-w-100px">Status</th>
                                <th class="text-start min-w-100px">Created by</th>
                                <th class="text-start min-w-100px">Confirmation</th>
                                @if(App\Models\User::hasPermission(["view_ens_request","confirm_reject_ens_request"]))
                                <th class="text-start min-w-100px">Action</th>
                                @else
                                <th class=""></th>
                                @endif
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600" id="skd-queue-list-table">
                            @foreach($queues as $key=>$queue)

                            @if($queue['rawInventoryDetails']['needed_confirm'] !=
                            $queue['rawInventoryDetails']['total_confirmed'] && $queue['rawInventoryDetails']['status']
                            == 0)

                            <tr>
                                <td data-kt-ecommerce-order-filter="order_id">
                                    <span style="text-transform: uppercase" href=""
                                        class="px-0 mx-0 fw-bolder">ENS{{$queue['rawInventoryDetails']['ens_id']}}</span>
                                </td>


                                <td>
                                    <div class="d-flex align-items-start">

                                        <div class="ms-2">
                                            <!--begin::Title-->
                                            <a href=""
                                                class="text-gray-600 fw-bolder">{{$queue['rawInventoryDetails']['product_type']}}</a>
                                            <!--end::Title-->
                                        </div>
                                    </div>
                                </td>
                                <!-- <td>
                                    <div class="ms-2 d-flex align-items-start">
                                        @if($queue->product_type == 'RAM')
                                        <span class="fw-bolder">{{$queue->ram_size}}</span>
                                        @elseif($queue->product_type == 'SSD')
                                        <span class="fw-bolder">{{$queue->ssd_size}}</span>
                                        @elseif($queue->product_type == 'Barebone')
                                        <span class="fw-bolder">{{$queue->bb_processor}}</span>
                                        @endif
                                    </div>

                                </td> -->

                                <td class="text-start pe-0 quantity-flex">
                                    <span class="fw-bolder">{{$queue->skd_brand}}</span>
                                </td>

                                <td class="text-start pe-0 quantity-flex">

                                    <span class="fw-bolder">{{$queue->total}}</span>

                                </td>
                                <td class="text-start pe-0">

                                    <span class="fw-bolder">{{date('d M Y',
                                        strtotime($queue->created_at))}}</span>
                                </td>
                                <td class="text-start pe-0" data-order="Completed">
                                    <!--begin::Badges-->

                                    <div class="badge badge-light-primary">
                                        @if($queue->status == 0)
                                        <span class="fw-bolder">Wating for confirmation</span>
                                        @endif
                                    </div>
                                    <br>
                                    <!--end::Badges-->
                                </td>
                                <!--end::Status=-->
                                <!--begin::Total=-->

                                <td>
                                    @php
                                    $user_name =
                                    App\Models\User::getUsersName([$queue['rawInventoryDetails']->created_by]);
                                    @endphp
                                    <span class="fw-bolder">{{$user_name[0]}}</span>
                                </td>
                                <td>
                                    @php
                                    $needed_confirm_ids = $queue['rawInventoryDetails']['needed_confirm_ids'];
                                    $needed_confirm_ids_str = str_replace( array( '[', ']', '"' ), '',
                                    $needed_confirm_ids);
                                    $needed_confirm_ids_arr = explode (",", $needed_confirm_ids_str);

                                    $confirm_ids = $queue['rawInventoryDetails']['confirmed_ids'];
                                    $confirm_ids_str = str_replace( array( '[', ']', '"' ), '', $confirm_ids);
                                    $confirm_ids_arr = explode (",", $confirm_ids_str);



                                    if(count($confirm_ids_arr) > 0){
                                    $skd_confirmation_names = App\Models\User::getUsersName($confirm_ids_arr);
                                    } else {
                                    $skd_confirmation_names = [];
                                    }


                                    $new_needed_confirm_ids_arr = [];
                                    for($i = 0; $i < count($needed_confirm_ids_arr); $i++){
                                        if(!in_array($needed_confirm_ids_arr[$i], $confirm_ids_arr)){
                                        array_push($new_needed_confirm_ids_arr,$needed_confirm_ids_arr[$i]); } }
                                        if(count($needed_confirm_ids_arr)> 0){
                                        $skd_remaining_confirmation_names =
                                        App\Models\User::getUsersName($new_needed_confirm_ids_arr);
                                        } else {
                                        $skd_remaining_confirmation_names = [];
                                        }



                                        $needed_confirm = $queue['rawInventoryDetails']['needed_confirm'];
                                        $total_confirmed = $queue['rawInventoryDetails']['total_confirmed'];
                                        $confirm = $needed_confirm - $total_confirmed;

                                        @endphp
                                        @for($x = 0; $x< $total_confirmed; $x++) <button type="button" class="btn-icon"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true"
                                            title="{{$skd_confirmation_names[$x]}}"><i
                                                class="fa-solid fa-check"></i></button>
                                            @endfor
                                            @for($x = 0; $x< $confirm; $x++) <button type="button" class="btn-icon"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true"
                                                title="{{$skd_remaining_confirmation_names[$x]}}"><i
                                                    class="fa-solid fa-minus"></i></button>
                                                @endfor

                                </td>

                                <!--end::Total=-->

                                @if(App\Models\User::hasPermission(["view_ens_request","confirm_reject_ens_request"]))
                                <!--begin::Action=-->
                                <td class="text-start">
                                    <div class="menu-item">
                                        <a id="kt_drawer_example_permanent_toggle" data-kt-drawer-permanent="true"
                                            href="" class="menu-link ens_id_no"
                                            onclick="getENSID('{{$queue->ens_id}}')">View</a>

                                    </div>
                                </td>
                                @else
                                <td class=""></td>
                                @endif
                                <!--end::Action=-->
                            </tr>
                            @endif
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



<!--begin:: ENS View Drawer -->
<div id="kt_drawer_example_permanent" class="" data-kt-drawer="true" data-kt-drawer-activate="true"
    data-kt-drawer-toggle="#kt_drawer_example_permanent_toggle"
    data-kt-drawer-close="#kt_drawer_example_permanent_close" data-kt-drawer-overlay="false"
    data-kt-drawer-permanent="true" data-kt-drawer-width="{default:'400px', 'md': '600px'}">
    <div class="card rounded-0 w-100"></div>

</div>
<!--end:: ENS View Drawer-->

<!--begin:: ENS Verify Drawer -->
<div id="kt_drawer_verify_ens_serial" class="" data-kt-drawer="true" data-kt-drawer-activate="true"
    data-kt-drawer-toggle="#kt_drawer_verify_ens_serial_permanent_toggle"
    data-kt-drawer-close="#kt_drawer_verify_ens_serial_permanent_close" data-kt-drawer-overlay="false"
    data-kt-drawer-permanent="true" data-kt-drawer-width="{default:'400px', 'md': '600px'}">

    <div class="card rounded-0 w-100">
        <div id="skd-serial-list">


        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- reject modal -->
<!-- Button trigger modal -->
<div class="shipping-modal modal fade" id="rejectModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md p-5">
        <div class="modal-content p-5">
            <div class="modal-body">
                <h1 class="text-center alert-question-icon"><i class="fa-solid fa-question"
                        style="color: #f8e00cfa;font-size: 30px;"></i></h1>
                <h1 class="text-center pb-2 mb-5">Are you sure ?</h1>
                <form action="{{route('skd.reject')}}" id="SKDrejectvalue" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3 justify-content-center text-center">
                            <label for="message-text" class="col-form-label order-cancel-modal-text fs-5"><span
                                    id="refund_amount_text"></span></label>
                            <div class="d-flex justify-content-center order-cancel-btn-field">
                                <button type="button" class="btn btn-secondary mx-5"
                                    data-bs-dismiss="modal">Close</button>
                                <input type="hidden" id="rejectbtn" name="rejectbtnvalue" value="">
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>

<!-- Modal -->

<!-- Confirm ENS Alert modal -->
<div class="modal fade" id="confirmENSAlertModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md p-5">
        <div class="modal-content p-5">
            <div class="modal-body">
                <h1 class="text-center alert-question-icon"><i class="fa-solid fa-question"
                        style="color: #f8e00cfa;font-size: 30px;"></i></h1>
                <h1 class="text-center pb-2 mb-5">Are you sure ?</h1>
                <form id="confirmENSRequestFrm">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3 justify-content-center text-center">
                            <label for="message-text" class="col-form-label order-cancel-modal-text fs-5"><span
                                    id="refund_amount_text"></span></label>
                            <div class="d-flex justify-content-center order-cancel-btn-field">
                                <button type="button" class="btn btn-secondary mx-5"
                                    data-bs-dismiss="modal">Close</button>
                                <input type="hidden" id="confirm_ens_id" name="confirm_ens_id" value="">
                                <button type="button" class="btn btn-primary"
                                    onclick="confirmENSRequest()">Confirm</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>


<div class="modal fade" id="skdBarcodeScannerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1"
    aria-labelledby="skdBarcodeScannerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md p-5">
        <div class="modal-content p-5">

            <div class="modal-body">
                <h2 class="text-center mb-5">Scan All SKD's Barcode</h2>
                <div class="mb-3">
                    <textarea type="text" name="verify_barcode_scan_id" id="verify_barcode_scan_id" readonly
                        onclick="verifyBarcodeFieldFocus()" class="form-control form-control-solid" rows="6" cols="5"
                        placeholder="Example :&#x0a;XX450XXXXX,XX450XXXXX"></textarea>
                    <div id="error_verify_barcode_item_id" class="text-danger mb-2 mt-3"></div>
                </div>
                <input type="text" style="background: transparent;border: none;outline: none;color: #1E1E2D;"
                    class="test" id="verify_serial_number_input_field" value=""
                    onchange="entryAllSerialNumberForVerify()" />
                <textarea type="text" name="verify_barcode_item_id" id="verify_barcode_item_id"
                    class="form-control form-control-solid" rows="1" cols="5" style="display: none;"></textarea>
            </div>
            <input type="hidden" name="verify_ens_number" id="verify_ens_number" value="">
            <div class="mx-auto mb-5">
                <button type="button" class="btn btn-secondary me-5"
                    onclick="closeSKDBarcodeScannerModal()">Close</button>
                <button class="btn btn-primary" type="button" onclick="submitAllSerialsForVerify()"
                    id="submit-serial-verify-btn">Submit</button>
            </div>

        </div>
    </div>

</div>

<!-- SKD Barcode Scaning Error Modal-->
<div class="modal fade " id="barcode_entry_verify_error_alert_modal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="barcode_entry_verify_error_alert_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h1 class="text-center error-cross-icon"><i class="fa-solid fa-xmark"
                        style="color: #ff00008a;font-size: 30px;"></i></h1>
                <h1 class="text-center mt-5" id="barcode_verify_error_modal_title">Double Entry!</h1>
                <p class="text-center mt-5" id="barcode_verify_error_modal_text">You already scan this barcode. Please
                    try new
                    one.</p>
            </div>
            <div class="mx-auto mt-5 mb-5">
                <button type="button" class="btn btn-secondary" style="margin-bottom: 20px;" data-bs-dismiss="modal"
                    onclick="closeBarcodeEntryVerifyErrorAlertModal()">Close</button>
            </div>
        </div>
    </div>
</div>


<!--== =================================================================================== ==-->
<!--== ============  START::Modal - Verified SKD serial Error Alert Message   ============ ==-->
<!--== =================================================================================== ==-->
<div class="modal fade " id="skd_serial_verified_error_alert_modal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="skd_serial_verified_error_alert_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h1 class="text-center error-cross-icon"><i class="fa-solid fa-xmark"
                        style="color: #ff00008a;font-size: 30px;"></i></h1>
                <h1 class="text-center mt-5">Error!</h1>
                <p class="text-center mt-5 fs-4" id="dependency_error_message">You need to be Verified all skd serials
                    according to this ENS number.</p>
            </div>
            <div class="mx-auto mt-5 mb-5">
                <button type="button" class="btn btn-secondary" style="margin-bottom: 20px;" data-bs-dismiss="modal"
                    onclick="closeSKDSerialVerifiedErrorAlertModal()">Close</button>
            </div>
        </div>
    </div>
</div>
<!--== =================================================================================== ==-->
<!--== =============  END::Modal - Verified SKD serial Error Alert Message   ============= ==-->
<!--== =================================================================================== ==-->

<script>
    function confirmENSAlertModal(ens_id) {
        $('#confirmENSAlertModal').modal('show');
        $('#confirm_ens_id').val(ens_id);
    }

    function rejectModal(ens_id) {
        $('#rejectModal').modal('show');
        const test = $('#rejectbtn').val(ens_id);
    }

    function getENSID(id) {
        var spinnerText =
            '<div class="spinner-container"><span class="loading-text me-3">LOADING</span><span><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></span></div>';
        $('#kt_drawer_example_permanent').html(spinnerText);
        jQuery.ajax({
            url: '/admin/skd/get-ens-details-by-id',
            data: 'ens_id=' + id + '&_token=' + jQuery("[name='_token']").val(),
            type: 'post',
            success: function (result) {
                $('#kt_drawer_example_permanent').html(result);
            }
        });

    }

    function confirmENSRequest() {
        var data = jQuery('#confirmENSRequestFrm').serialize();
        jQuery.ajax({
            url: '/admin/skd/ens/confirm',
            data: data,
            type: 'post',
            success: function (result) {
                if (result.status == 'success') {
                    if (result.all_confirm == 'yes') {
                        window.location.href = window.location.href;
                    } else if (result.all_confirm == 'no') {
                        $('#confirmENSAlertModal').modal('hide');
                        $('#kt_drawer_example_permanent').html(result.drawer_html);
                        $('#skd-queue-list-table').html(result.queueListHtml);
                    }
                } else if (result.status == 'error') {
                    if (result.allready_confirm == 'yes') {
                        alert('Already you confirmed this.');
                    }
                }
            }
        });
    }

    function verifyENSDrawer(ensId) {
        var spinnerText =
            '<div class="spinner-container"><span class="loading-text me-3">LOADING</span><span><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></span></div>';
        $('#skd-serial-list').html(spinnerText);
        jQuery.ajax({
            url: '/admin/skd/get-verified-ens-skd-serials-list',
            data: 'ens_id=' + ensId + '&_token=' + jQuery("[name='_token']").val(),
            type: 'post',
            success: function (result) {
                $('#skd-serial-list').html(result.html);
            }
        });
    }

    function openBarcodeScaningModal(ens_id) {
        $('#skdBarcodeScannerModal').modal('show');
        $('#verify_barcode_scan_id').val('');
        $('#verify_serial_number_input_field').val('');
        $('#verify_barcode_item_id').val('');
        $("#error_verify_barcode_item_id").html('');
        $('#verify_ens_number').val(ens_id);
        $("#kt_drawer_example_permanent").css("opacity", "0");
        $("#kt_drawer_verify_ens_serial").css("opacity", "0");

    }

    function closeSKDBarcodeScannerModal() {
        $('#skdBarcodeScannerModal').modal('hide');
        var btn = document.getElementById('kt_drawer_verify_ens_serial_permanent_toggle');
        btn.click();
        setTimeout(() => {
            $("#kt_drawer_example_permanent").css("opacity", "1");
            $("#kt_drawer_verify_ens_serial").css("opacity", "1");
        }, 270);
    }


    function closeSKDSerialVerifiedErrorAlertModal() {
        $('#skd_serial_verified_error_alert_modal').modal('hide');
        $("#kt_drawer_example_permanent").css("opacity", "1");
        $("#kt_drawer_verify_ens_serial").css("opacity", "1");
    }


    function submitVerifyENSRequest(ens_id) {
        let total_skd_serial = $('#total_veryfing_ens_serial').val();
        let total_veryfied_skd_serial = $('#total_veryfied_ens_serial').val();
        if (total_skd_serial == total_veryfied_skd_serial) {
            jQuery.ajax({
                url: '/admin/skd/ens/verify/submit',
                data: 'ens_id=' + ens_id + '&_token=' + jQuery("[name='_token']").val(),
                type: 'post',
                success: function (result) {
                    if (result.status == 'success') {
                        $('#kt_drawer_example_permanent').html(result.drawer_html);
                        var btn = document.getElementById('kt_drawer_verify_ens_serial_permanent_close');
                        btn.click();
                    }
                    if (result.status == 'error') {
                        return false;
                    }
                    // $('#skd-serial-list').html(result.html);
                }
            });
        } else {
            $('#skd_serial_verified_error_alert_modal').modal('show');
            $("#kt_drawer_example_permanent").css("opacity", "0");
            $("#kt_drawer_verify_ens_serial").css("opacity", "0");
        }

    }


    // Barcode Field Auto Focus For Scanning SKD Items Barcode
    function verifyBarcodeFieldFocus() {
        $("#verify_serial_number_input_field").focus();
    }


    // Enter Serial Number With Validation By Scanning Barcode
    function entryAllSerialNumberForVerify() {
        var text = $('#verify_serial_number_input_field').val();
        var br_c = $('#verify_barcode_scan_id').val();

        if (text) {
            jQuery.ajax({
                url: '/check-valid-barcode-for-verify',
                data: 'bar_codes=' + br_c + '&cur_code=' + text + '&_token=' + jQuery("[name='_token']").val(),
                type: 'post',
                success: function (result) {

                    // invalid barcode alert modal
                    if (result.status == "not_valid") {
                        $("#verify_serial_number_input_field").val('');
                        $("#skdBarcodeScannerModal").css("opacity", "0");
                        $('#barcode_entry_verify_error_alert_modal').modal('show');
                        $('#barcode_verify_error_modal_title').html('Invalid Barcode!');
                        $('#barcode_verify_error_modal_text').html(
                            'Your barcode is not valid. Please scan a valid barcode.');
                        $("#verify_serial_number_input_field").focus();
                    }

                    // double entry barcode alert modal
                    if (result.status == "present") {
                        $("#verify_serial_number_input_field").val('');
                        $("#skdBarcodeScannerModal").css("opacity", "0");
                        $('#barcode_entry_verify_error_alert_modal').modal('show');
                        $('#barcode_verify_error_modal_title').html('Double Entry!');
                        $('#barcode_verify_error_modal_text').html(
                            'You already scan this barcode. Please try new one.');
                        $("#verify_serial_number_input_field").focus();
                    }

                    // add valid serial number into skd scanner field
                    if (result.status == "not_present") {
                        if (br_c) {
                            var n_br = br_c + ',' + text;
                            $('#verify_barcode_scan_id').val(n_br);
                            $("#verify_serial_number_input_field").val('');
                        } else {
                            $('#verify_barcode_scan_id').val(text);
                            $("#error_verify_barcode_item_id").html('');
                            $("#verify_serial_number_input_field").val('');
                        }

                    }

                }
            });
        } else {
            return false;
        }

    }

    // add skd materials for confirmation after scanning barcode
    function submitAllSerialsForVerify() {
        $("#error_verify_barcode_item_id").html('');
        var items_id = $("#verify_barcode_scan_id").val();
        if (items_id) {
            var spinner =
                '<div class="spinner-border me-2" role="status"><span class="visually-hidden">Loading...</span></div> <span style="font-size: 18px;">Wait...</span>';
            $('#submit-serial-verify-btn').html(spinner);
            $('#verify_barcode_scan_id').val($('#verify_barcode_scan_id').val().replace(/^,/, '').replace(/,+$/, '')
                .trim());
            var item_ids = $('#verify_barcode_scan_id').val().replace(/\n/g, ',').split(',');
            $('#verify_barcode_item_id').val(item_ids);
            var final_items_id = $('#verify_barcode_item_id').val();
            var ens_number = $('#verify_ens_number').val();
            var btn = document.getElementById('kt_drawer_verify_ens_serial_permanent_toggle');
            btn.click();
            var spinnerText =
                '<div class="spinner-container"><span class="loading-text me-3">LOADING</span><span><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></span></div>';
            $('#skd-serial-list').html(spinnerText);
            jQuery.ajax({
                url: '/submit-skd-serial-for-verify',
                data: 'final_items_id=' + final_items_id + '&ens_number=' + ens_number + '&_token=' + jQuery(
                    "[name='_token']").val(),
                type: 'post',
                success: function (result) {
                    $('#submit-serial-verify-btn').html('Submit');
                    $('#skdBarcodeScannerModal').modal('hide');
                    $('#skd-serial-list').html(result.html);
                    $("#kt_drawer_example_permanent").css("opacity", "1");
                    $("#kt_drawer_verify_ens_serial").css("opacity", "1");

                }
            });
        } else {
            $("#error_verify_barcode_item_id").html('Please scan skd items barcode!');
            return;
        }

    }

    // close Error Message Modal for invalid barcode scanning
    function closeBarcodeEntryVerifyErrorAlertModal() {
        $('#barcode_entry_verify_error_alert_modal').modal('hide');
        $("#skdBarcodeScannerModal").css("opacity", "1");
        $("#verify_serial_number_input_field").focus();
    }

</script>
@endsection
