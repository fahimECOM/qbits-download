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


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Finish Product</h1>
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <li class="breadcrumb-item text-muted">
                        <a href="javascript:void()" class="text-muted text-hover-primary">Requisition</a>
                    </li>

                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>

                    <li class="breadcrumb-item text-dark">Stockin Queue</li>
                </ul>
            </div>

        </div>
    </div>
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card card-flush">
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
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
                            <input type="text" data-kt-ecommerce-product-filter="search"
                                class="form-control form-control-solid w-250px ps-14" placeholder="Search Product" />
                        </div>
                    </div>

                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        <div class="w-100 mw-150px">
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                        <thead>
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
                                <th class=""></th>
                                <th class="text-start min-w-100px">Quantity</th>
                                <th class="text-start min-w-100px">Created by</th>
                                <th class="text-start min-w-100px">Created date</th>
                                <th class="text-start min-w-100px mx-3">Confirmation</th>
                                <th class="text-start min-w-100px">Actions</th>

                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600" id="prod_stockin_queue_table_data">
                            @foreach($requisitions as $key=>$requisition)
                            <tr>
                                <td>
                                </td>

                                <td class="text-start pe-0">
                                    <span class="fw-bolder">RQ{{$requisition->rq_id}}</span>
                                </td>

                                <td class="text-start pe-0">
                                    <span class="fw-bolder">{{$requisition->product_type}}</span>
                                </td>

                                <td>
                                </td>

                                <td class="text-start pe-0">
                                    <span class="fw-bolder">{{$requisition->quantity}}</span>
                                </td>

                                <td class="" data-order="0">

                                    <span class="fw-bolder">{{$requisition['userDetails']['name']}}</span>

                                </td>

                                <td class="text-start">

                                    <span class="fw-bolder">{{date('d M Y',
                                        strtotime($requisition->created_at))}}</span>
                                </td>

                                <td class="text-start pe-0" data-order="rating-3">
                                    @php
                                    $needed_confirm_ids = $requisition->product_stockin_needed_confirm_ids;

                                    $needed_confirm_ids_str = str_replace( array( '[', ']', '"' ), '',
                                    $needed_confirm_ids);
                                    $needed_confirm_ids_arr = explode (",", $needed_confirm_ids_str);
                                    $confirm_ids = $requisition->product_stockin_confirmed_ids;
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




                                        $needed_confirm = $requisition->product_stockin_needed_confirm;
                                        $total_confirmed = $requisition->product_stockin_total_confirmed;
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

                                <td class="text-start">

                                    <div class="menu-item">
                                        <a id="requisition_details_drawer" data-kt-drawer-permanent="true" href=""
                                            class="menu-link rq_id_no"
                                            onclick="getRQID('{{$requisition->rq_id}}')">View</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Requisition Stockin View Drawer -->
<div id="product_stockin_queueList_drawer" class="" data-kt-drawer="true" data-kt-drawer-activate="true"
    data-kt-drawer-toggle="#requisition_details_drawer" data-kt-drawer-close="#product_stockin_queueList_drawer_close"
    data-kt-drawer-overlay="false" data-kt-drawer-permanent="true"
    data-kt-drawer-width="{default:'400px', 'md': '600px'}">
    <div class="card rounded-0 w-100"></div>

</div>


<!-- Confirm RQ stockin alert modal -->
<div class="modal fade" id="confirmRQStockinAlertModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="confirmRQStockinAlertModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md p-5">
        <div class="modal-content p-5">
            <div class="modal-body">
                <h1 class="text-center alert-question-icon"><i class="fa-solid fa-question"
                        style="color: #f8e00cfa;font-size: 30px;"></i></h1>
                <h1 class="text-center pb-2 mb-5">Are you sure ?</h1>
                <form id="confirmRQStockinQueueFrm">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3 justify-content-center text-center">
                            <div class="d-flex justify-content-center order-cancel-btn-field">
                                <button type="button" class="btn btn-secondary mx-5"
                                    data-bs-dismiss="modal">Close</button>
                                <input type="hidden" id="stockin_confirm_rq_id" name="stockin_confirm_rq_id" value="" />
                                <button type="button" class="btn btn-primary"
                                    onclick="confirmRQStockinRequest()">Confirm</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Product stockin error alert message -->
<div class="modal fade " id="prod_stockin_error_alert_modal" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="prod_stockin_error_alert_modalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h1 class="text-center error-cross-icon"><i class="fa-solid fa-xmark"
                        style="color: #ff00008a;font-size: 30px;"></i></h1>
                <h1 class="text-center mt-5" id="prod_stockin_error_alert_modal_title">Error!</h1>
                <p class="text-center mt-5" id="prod_stockin_error_alert_modal_text">Something went wrong. Please try
                    some time later.</p>
            </div>
            <input type="hidden" id="prod_stockin_error_type" value="">
            <div class="mx-auto mt-5 mb-5">
                <button type="button" class="btn btn-secondary" style="margin-bottom: 20px;"
                    onclick="closeProdStockinErrorAlertModal()">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- product barcode scanner modal for stockin product -->
<div class="modal fade" id="prod_barcode_scanner_modal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="1" aria-labelledby="prod_barcode_scanner_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md p-5">
        <div class="modal-content p-5">
            <div class="modal-body">
                <h2 class="text-center mb-5">Scan Product Barcode</h2>
                <div class="mb-3">
                    <textarea type="text" name="verify_prod_barcode_scan_id" id="verify_prod_barcode_scan_id" readonly
                        onclick="focusProdBarcodeScanField()" class="form-control form-control-solid" rows="2" cols="5"></textarea>
                </div>
                <input type="text" style="background: transparent;border: none;outline: none;color: #1E1E2D;"
                    class="test" id="verify_prod_serial_input_field" value="" onchange="checkValidProdSerial()" />
            </div>
            <input type="hidden" name="verify_prod_serial_number" id="verify_prod_serial_number" value="">
            <div class="mx-auto mb-5 text-center">
                <button type="button" class="btn btn-secondary me-5" onclick="closeProdBarcodeScannerModal()">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    // requisition id get
    function getRQID(id) {
        var spinnerText =
            '<div class="spinner-container"><span class="loading-text me-3">LOADING</span><span><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></span></div>';
        $('#product_stockin_queueList_drawer').html(spinnerText);
        jQuery.ajax({
            url: '/admin/finished/product/get-stockin-queue-details-by-id',
            data: 'rq_id=' + id + '&_token=' + jQuery("[name='_token']").val(),
            type: 'post',
            success: function (result) {
                $('#product_stockin_queueList_drawer').html(result);
            }
        });

    }


    //requisition stockin queue confirm alert modal show
    function confirmRQStockinAlertModal(rq_id) {
        $('#confirmRQStockinAlertModal').modal('show');
        $('#stockin_confirm_rq_id').val(rq_id);
    }


    // submit requisition stockin confirm request
    function confirmRQStockinRequest() {
        var data = jQuery('#confirmRQStockinQueueFrm').serialize();
        jQuery.ajax({
            url: '/admin/finished/product/rq/stockin/confirm',
            data: data,
            type: 'post',
            success: function (result) {
                if (result.status == 'success') {
                    if (result.all_confirm == 'yes') {
                        window.location.href = window.location.href;
                    } else if (result.all_confirm == 'no') {
                        $('#confirmRQStockinAlertModal').modal('hide');
                        $('#product_stockin_queueList_drawer').html(result.drawer_html);
                        $('#prod_stockin_queue_table_data').html(result.queueListHtml);
                    }
                } else if (result.status == 'error') {
                    if (result.allready_confirm == 'yes') {
                        alert('Already you confirmed this.');
                    }
                }
            }
        });
    }

    //product stockin verification submit request
    function submitProdStockinVerify(rq_id, total_prod) {
        var total_product_verified = parseInt($('#total_rq_product_stockin_varyfied_number').val());
        if (total_product_verified == total_prod) {
            jQuery.ajax({
                url: '/submit-product-stockin-verification',
                data: 'rq_id=' + rq_id + '&_token=' + jQuery("[name='_token']").val(),
                type: 'post',
                success: function (result) {
                    if (result.status == 'success') {
                        $('#product_stockin_queueList_drawer').html(result.html_text);
                    }
                }
            });
        } else {
            // invalid barcode alert modal
            $('#prod_stockin_error_alert_modal').modal('show');
            $('#prod_stockin_error_type').val('');
            $('#prod_stockin_error_alert_modal_title').html('Error!');
            $('#prod_stockin_error_alert_modal_text').html('You need to scan all products for submit verification.');
        }
    }


    // close product stockin error message alert modal
    function closeProdStockinErrorAlertModal() {
        let error_type = $('#prod_stockin_error_type').val();
        $('#prod_stockin_error_alert_modal').modal('hide');
        if(error_type == 'scan') {
            $("#prod_barcode_scanner_modal").modal('show');
        }
        $("#verify_prod_serial_input_field").focus();
    }


    function openVerifyProductBarcodeScaningModal(prod_sl) {
        $('#prod_barcode_scanner_modal').modal('show');
        $("#verify_prod_serial_input_field").focus();
        $('#verify_prod_serial_number').val(prod_sl);
    }


    function checkValidProdSerial() {
        let text = $('#verify_prod_serial_input_field').val().replace(/\s/g, '');
        var prod_serial = $('#verify_prod_serial_number').val();

        if (text == prod_serial) {
            $('#verify_prod_serial_number').val('');
            $('#verify_prod_serial_input_field').val('');
            $('#prod_barcode_scanner_modal').modal('hide');
            $('#total_rq_product_stockin_varyfied_number').val(parseInt($('#total_rq_product_stockin_varyfied_number').val()) + 1);
            $('#rq_stockin_verify_checkmark_'+prod_serial).html(`<button class="btn btn-secondary btn-sm" disabled><i class="fa-solid fa-check" style="color: #3ac104;font-size: 18px;"></i></button>`);
                                
        } else {
            // invalid barcode alert modal
            $("#verify_prod_serial_input_field").val('');
            $('#prod_barcode_scanner_modal').modal('hide');
            $('#prod_stockin_error_alert_modal').modal('show');
            $('#prod_stockin_error_type').val('scan');
            $('#prod_stockin_error_alert_modal_title').html('Error!');
            $('#prod_stockin_error_alert_modal_text').html('Please scan a valid barcode for verify.');
            $("#verify_prod_serial_input_field").focus();
                    
        }

    }

    // Barcode Field Auto Focus For Scanning Product Barcode
    function focusProdBarcodeScanField() {
        document.getElementById("verify_prod_serial_input_field").focus();
    }

    //close product barcode scaner modal
    function closeProdBarcodeScannerModal() {
        $('#prod_barcode_scanner_modal').modal('hide');
    }

</script>

@endsection
