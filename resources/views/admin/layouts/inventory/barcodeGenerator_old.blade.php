@extends('admin.master')

@section('admin-content')

<style>
    .card .card-body {
        padding: 1rem 1.25rem;
        background: #ededed;
        padding-top: 3rem !important;
    }

    .alert-modal {
        border: 0px solid #2b2b40;
        justify-content: center;
    }

    .alert-modal-close-btn {
        margin-bottom: 50px;
    }

    #alert-modal-desc2 {
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
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Products-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">

                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                            <button type="button" class="btn btn-md btn-primary" data-bs-toggle="modal"
                                data-bs-target="#barcodeGenerateModal" data-bs-whatever="@mdo">Generate Barcode</button>
                        </div>

                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                            <button type="button" class="btn btn-md btn-primary" data-bs-toggle="modal"
                                data-bs-target="#entryItemsModal" data-bs-whatever="@mdo">Entry Items</button>
                        </div>
                        <!--end::Add product-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <p>{!! DNS1D::getBarcodeSVG('$barcodes->serial_no', 'C128',1,60,'black') !!}</p>
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

<!-- Modal for Generate Barcode-->
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
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Purchase ID</label>
                        <input type="text" name="purchase_id" class="form-control form-control-solid">
                    </div>
                    <div class="row tab-container">
                        <div class="col-md-6 mb-3">
                            <label for="message-text" class="col-form-label">Product Type</label>
                            <select id="select-box" class="form-select form-select-solid coupon_status"
                                data-hide-search="true" data-placeholder="Status" name="product_type"
                                data-kt-ecommerce-product-filter="status">
                                <option>Select Types</option>
                                <option value="SSD">SSD</option>
                                <option value="RAM">RAM</option>
                                <option value="Barebone">Barebone</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="message-text" class="col-form-label">Quantity</label>
                            <input type="text" name="qantity" class="form-control form-control-solid">
                        </div>
                        <input type="hidden" name="flow_type" class="form-control  form-control-solid" value="inflow">
                    </div>

                    <div class="row">

                        <div id="SSD" class="tab-content">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="message-text" class="col-form-label">SSD Type</label>
                                    <input type="text" name="ssd_type" class="form-control form-control-solid">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="message-text" class="col-form-label">M.2 Type</label>
                                    <input type="text" name="m2_type" class="form-control form-control-solid">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="message-text" class="col-form-label">SSD Size</label>
                                    <input type="text" name="ssd_size" class="form-control form-control-solid">
                                </div>
                            </div>
                        </div>

                        <div id="RAM" class="tab-content">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="message-text" class="col-form-label">Ram Type</label>
                                    <input type="text" name="ram_type" class="form-control form-control-solid">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="message-text" class="col-form-label">Ram Size</label>
                                    <input type="text" name="ram_size" class="form-control form-control-solid">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="message-text" class="col-form-label">Bus Speed</label>
                                    <input type="text" name="bus_speed" class="form-control form-control-solid">
                                </div>
                            </div>
                        </div>
                        <div id="Barebone" class="tab-content">
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <label for="message-text" class="col-form-label">Barebone Series</label>
                                    <select id="select-box" class="form-select form-select-solid coupon_status"
                                        data-hide-search="true" data-placeholder="Status" name="bb_type"
                                        data-kt-ecommerce-product-filter="status" data-control="select2">
                                        <option>Select Types</option>
                                        <option value="Sigma">Sigma 15</option>
                                        <option value="Lania">Lania</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="message-text" class="col-form-label">Barebone Model</label>
                                    <input type="text" name="bb_model" class="form-control form-control-solid">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="message-text" class="col-form-label">Barebone Processor</label>
                                    <input type="text" name="bb_processor" class="form-control form-control-solid">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="err_serial" class="text-danger mb-2"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Continue</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>


<!-- Modal for Entry Raw Materials -->
<div class="modal fade" id="entryItemsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="justify-content: center;">
                <h5 class="modal-title" id="exampleModalLabel">Entry Raw Material</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">

                <form action="" id="entryItemsForm">
                    @csrf
                    <div class="row">

                        <div class="col-md-12 mb-3">
                            <label for="message-text" class="col-form-label">Product Type</label>
                            <select id="select-type-scan-raw" class="form-select form-select-solid coupon_status"
                                data-hide-search="true" data-placeholder="Status" name="product_type"
                                data-kt-ecommerce-product-filter="status">
                                <option value="">Select Types</option>
                                <option value="RAM,8,DDR4,3200">RAM (8GB DDR4 3200)</option>
                                <option value="RAM,4,DDR4,3200">RAM (4GB DDR4 3200)</option>
                                <option value="SSD,512,M.2,NVME">SSD (512 M.2 NVME)</option>
                                <option value="Barebone,Sigma,core i3">Barebone (Sigma 15 Core i3)</option>
                                <option value="Barebone,Sigma,core i5">Barebone (Sigma 15 Core i5)</option>
                                <option value="Barebone,Sigma,core i7">Barebone (Sigma 15 Core i7)</option>
                                <option value="Barebone,Lania,core i7">Barebone (Lania Core i7)</option>
                            </select>
                        </div>
                        <div id="err_prod_type_select" class="text-danger mb-2"></div>

                    </div>
                    <div class="mb-3" id="">
                        <label for="recipient-name" class="col-form-label">Scan Item's Barcode</label>
                        <textarea required type="text" name="barcode_scan_id" id="barcode_scan_id" class="form-control form-control-solid" rows="4" cols="5" placeholder="Example :&#x0a;XX450-120321-2-XXXX,XX450-120321-2-XXXX"></textarea>
                        <small class="form-text text-muted">Please click enter key after scan each item barcode.</small>
                    </div>
                    <div id="err_barcode_scan_field" class="text-danger mb-2"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="button" onclick="addRowMaterials()">Continue</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="raw_material_entry_alert_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="justify-content: center;">
                <h1 class="modal-title pt-5 pb-5" id="alert-modal-header-title">8GB DDR4 RAM</h1>
            </div>
            <div class="modal-body">
                <h2 class="pt-5 pb-5 mx-auto lh-lg" id="alert-modal-desc1">You have already total <span id="available_serial_scan">10 8GB DDR4 RAM</span> Printed barcode available which are not scaned. If already attached those barcode with <span>RAM</span>, Please scan those barcode for entry raw materials.</h2> 
                <h2 class="pt-5 pb-5 mx-auto lh-lg" id="alert-modal-desc2">You don't have any available printed barcode for scaned. Please generate barcode first and after that scaned those barcode for entry materials.</h2> 
            </div>
            <div class="modal-footer alert-modal pb-5">
                <button type="button" class="btn btn-secondary text-center alert-modal-close-btn" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery.js"></script>
<script>
    $('.tab-content').hide();
    //show the first tab content


    $('#select-box').change(function () {
        dropdown = $('#select-box').val();
        //first hide all tabs again when a new option is selected
        $('.tab-content').hide();
        //then show the tab content of whatever option value was selected
        $('#' + dropdown).show();
    });

    $('#select-type-scan-raw').change(function () {
        var type = $('#select-type-scan-raw').val();
        if(type == ""){
            retrurn;
        } else {
            jQuery.ajax({
                url: '/check-unused-serial',
                data: 'type=' + type + '&_token=' + jQuery("[name='_token']").val(),
                type: 'post',
                success: function (result) {
                    
                    if (result.status == 'success') {
                        $('#raw_material_entry_alert_modal').modal('show');
                        if(result.type == 'RAM'){
                            $('#alert-modal-header-title').html(result.ram_size+'GB '+ result.ram_type + ' ' + result.bus_speed + ' ' + result.type);
                            if(result.total_unused_sl > 0){
                                $('#available_serial_scan').html(result.total_unused_sl + ' ');
                            } else {
                                $('#alert-modal-desc').html("You don't have any available printed barcode for scaned. Please generate barcode first and after that scaned those barcode for entry materials.");
                            }
                            
                        }
   
                    } else if (result.status == 'error') {

                    }
                }
            });
        }
    });
    
    // $('#barcode_scan_id').on({
    //     keypress: function(event) {
    //         const key = event.originalEvent.key;
    //         if(key == 'Enter') {
    //         event.target.value += ',';
    //         }
    //     },
    // });
    

    function addRowMaterials() {
        var items_id = $("#barcode_scan_id").val();
        var type = $('#select-type-scan-raw').val();
        $('#err_barcode_scan_field').html('');
        $('#err_prod_type_select').html('');

        if(type == ''){
            $('#err_prod_type_select').html('Please select product type!');
            if(items_id == ''){
                $('#err_barcode_scan_field').html('Please scan barcode of your items before submit!');
            }
            return;
        } else if(items_id == '') {
            $('#err_barcode_scan_field').html('Please scan barcode of your items before submit!');
            if(type == ''){
                $('#err_prod_type_select').html('Please select product type!');
            }
            return;
        } else {
            $('#barcode_scan_id').val( $('#barcode_scan_id').val().replace(/^,/, '').replace(/,+$/, '').trim() );
            let item_ids   = $('#barcode_scan_id').val().replace(/\n/g, ',').split(',');
            var data = jQuery('#entryItemsForm').serialize();
            jQuery.ajax({
            url: '/add-raw-items',
            data: 'item_ids=' + item_ids + '&_token=' + jQuery("[name='_token']").val(),
            type: 'post',
            success: function (result) {

                // if (result.status == 'success') {

                // } else if (result.status == 'error') {
                // }
            }
        });
        }

    }

</script>

@endsection
