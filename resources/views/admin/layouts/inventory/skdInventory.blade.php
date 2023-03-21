@extends('admin.master')
@section('admin-content')
<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
<script src="assets/plugins/global/plugins.bundle.js"></script>

<style>
    /* td.text-start.pe-0.quantity-flex {
        display: flex;
        justify-content: space-evenly;
        gap: 54px;
        flex-direction: column;
        align-items: center;
    } */
    .inventory_jurnal {
        margin: 0;
        width: 90%;
    }

    .ens_no {
        cursor: pointer;
        color: rgb(183, 183, 183);
    }

    input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(90%);
    }

    button.btn-icon {
        background: #0000006d;
        border: 1px solid rgba(64, 64, 64, 0.351);
        width: 30px;
        height: 30px;
        border-radius: 50px;
        margin: 0;
        padding: 0;
        cursor: default;
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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">SKD INventory</h1>
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
                    <li class="breadcrumb-item text-dark">SKD INventory</li>
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
        <div id="kt_content_container" class="container-xxl ">
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
                            <input type="text" data-kt-ecommerce-order-filter="search"
                                class="form-control form-control-solid w-250px ps-14" placeholder="Search Order" />
                        </div>
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
                                <th class=""></th>
                                <th class="text-start min-w-100px">SKD Category</th>
                                <th class=""></th>
                                <th class="text-start min-w-100px">SKD Type</th>

                                <th class="text-start min-w-100px">SKD Brand</th>

                                <th class="text-start min-w-100px">Size/Processor</th>
                                <th class="text-start min-w-10px">SKD Quantity</th>
                                <!-- <th class=""></th>
                                <th class=""></th> -->
                                @if(App\Models\User::hasPermission(["view_skd_inventory_history"]))
                                <th class="text-start min-w-10px">Action</th>
                                @else
                                <th class=""></th>
                                @endif
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            @foreach($inventorys as $key=>$inventory)
                            <tr>
                                <td></td>

                                <td data-kt-ecommerce-order-filter="order_id">
                                    <span style="text-transform: uppercase" href=""
                                        class="px-0 mx-0 fw-bolder">{{$inventory->product_type}}</span>
                                </td>
                                <td> </td>


                                <td>
                                    <div class="d-flex align-items-start">
                                        <div class="">
                                            <div class=" d-flex align-items-start">
                                                @if($inventory->product_type == 'RAM')
                                                <span class="fw-bolder">{{$inventory->ram_type}}</span>
                                                @elseif($inventory->product_type == 'SSD')
                                                <span class="fw-bolder">{{$inventory->ssd_type}}</span>
                                                @elseif($inventory->product_type == 'Barebone')
                                                <span class="fw-bolder">{{$inventory->bb_type}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-start">
                                        <div class="">
                                            <div class=" d-flex align-items-start">
                                                @if($inventory->product_type == 'RAM')
                                                <span class="fw-bolder">{{$inventory->ram_brand}}</span>
                                                @elseif($inventory->product_type == 'SSD')
                                                <span class="fw-bolder">{{$inventory->ssd_brand}}</span>
                                                @elseif($inventory->product_type == 'Barebone')
                                                <span class="fw-bolder">{{$inventory->bb_brand}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>





                                <td class="text-start pe-0 quantity-flex">

                                    @if($inventory->product_type == 'RAM')
                                    <span class="fw-bolder">{{$inventory->ram_size}} GB</span>
                                    @elseif($inventory->product_type == 'SSD')
                                    <span class="fw-bolder">{{$inventory->ssd_size}} {{$inventory->ssd_size > 10 ? 'GB' : 'TB'}}</span>
                                    @elseif($inventory->product_type == 'Barebone')
                                    <span class="fw-bolder">Core {{$inventory->bb_processor}}</span>
                                    @endif

                                </td>

                                <td class="text-start pe-0">
                                    @if($inventory->product_type == 'RAM')
                                    @php
                                    $ram_ens_id =
                                    App\Models\RawInventory::where('ram_size',$inventory->ram_size)->get('ens_id');
                                    $ram_total_ens =
                                    App\Models\RawInventory::where('ram_size',$inventory->ram_size)->count();
                                    $enstotalram = $ram_total_ens;
                                    $ramqty = 0;
                                    for($ram_count = 0; $ram_count< $enstotalram; $ram_count++){
                                        $ram_qtn=App\Models\SkdSerial::whereIn('flow_type', ['inflow','booked'])->
                                        where('skd_brand',$inventory->ram_brand)->
                                        where('ens_id',$ram_ens_id[$ram_count]->ens_id)->count();
                                        $ramqty = $ramqty + $ram_qtn;
                                        }
                                        @endphp <span class="fw-bolder">{{$ramqty}}</span>

                                        @elseif($inventory->product_type == 'SSD')
                                        @php
                                        $ssd_ens_id =
                                        App\Models\RawInventory::where('ssd_size',$inventory->ssd_size)->get('ens_id');
                                        $ssd_total_ens =
                                        App\Models\RawInventory::where('ssd_size',$inventory->ssd_size)->count();
                                        $enstotalssd = $ssd_total_ens;
                                        $ssdqty = 0;
                                        for($ssd_count = 0; $ssd_count< $enstotalssd; $ssd_count++){
                                            $ssd_qtn=App\Models\SkdSerial::whereIn('flow_type', ['inflow','booked'])->
                                            where('skd_brand',$inventory->ssd_brand)->
                                            where('ens_id',$ssd_ens_id[$ssd_count]->ens_id)->count();
                                            $ssdqty = $ssdqty + $ssd_qtn;
                                            }
                                            @endphp
                                            <span class="fw-bolder">{{$ssdqty}}</span>
                                            @elseif($inventory->product_type == 'Barebone')
                                            @php
                                            $bb_ens_id =
                                            App\Models\RawInventory::where('bb_processor',$inventory->bb_processor)->get('ens_id');
                                            $bb_total_ens =
                                            App\Models\RawInventory::where('bb_processor',$inventory->bb_processor)->count();
                                            $enstotalbb = $bb_total_ens;
                                            $bbqty = 0;
                                            for($bb_count = 0; $bb_count< $enstotalbb; $bb_count++){
                                                $bb_qtn=App\Models\SkdSerial::whereIn('flow_type',
                                                ['inflow','booked'])->where('skd_brand',$inventory->bb_brand)->
                                                where('ens_id',$bb_ens_id[$bb_count]->ens_id)->count();
                                                $bbqty = $bbqty + $bb_qtn;
                                                }
                                                @endphp
                                                <span class="fw-bolder">{{$bbqty}}</span>
                                                @endif

                                </td>

                                <!-- <td class="text-start pe-0" data-order="Completed">
                                    <div class="badge badge-light-primary">
                                        <span class="fw-bolder">Available in Warehouse</span>
                                    </div>
                                    <br>
                                </td>
                                <td class="text-start pe-0">
                                    <div class="d-flex align-items-start">
                                        @if($inventory->product_type == 'RAM')
                                        @if($ramqty < 3) <span class="fw-bolder">Low</span>
                                            @else
                                            <span class="fw-bolder">high</span>
                                            @endif
                                            @elseif($inventory->product_type == 'SSD')
                                            @if($ssd_qtn < 3) <span class="fw-bolder">Low</span>
                                                @else
                                                <span class="fw-bolder">high</span>
                                                @endif
                                                @elseif($inventory->product_type == 'Barebone')
                                                @if($bb_qtn < 3) <span class="fw-bolder">Low</span>
                                                    @else
                                                    <span class="fw-bolder">high</span>
                                                    @endif
                                                    @endif
                                    </div>
                                </td> -->

                                @if(App\Models\User::hasPermission(["view_skd_inventory_history"]))
                                <!--begin::Action=-->
                                <td class="text-start">
                                    <div class="menu-item">

                                        <div class="ms-2 d-flex align-items-start">
                                            @if($inventory->product_type == 'RAM')
                                            <a id="skd_inventory_history_toggle" data-kt-drawer-permanent="true" href=""
                                                class="menu-link ens_id_no " value=""
                                                onclick="getInventorySKD(`{{$inventory->product_type}}`,`{{$inventory->ram_size}}`)"><i
                                                    class="fa-solid fa-clock-rotate-left text-primary fs-3"></i></a>
                                            @elseif($inventory->product_type == 'SSD')
                                            <a id="skd_inventory_history_toggle" data-kt-drawer-permanent="true" href=""
                                                class="menu-link ens_id_no " value=""
                                                onclick="getInventorySKD(`{{$inventory->product_type}}`,`{{$inventory->ssd_size}}`)"><i
                                                    class="fa-solid fa-clock-rotate-left text-primary fs-3"></i></a>

                                            @elseif($inventory->product_type == 'Barebone')
                                            <a id="skd_inventory_history_toggle" data-kt-drawer-permanent="true" href=""
                                                class="menu-link ens_id_no " value=""
                                                onclick="getInventorySKD(`{{$inventory->product_type}}`,`{{$inventory->bb_processor}}`)"><i
                                                    class="fa-solid fa-clock-rotate-left text-primary fs-3"></i></a>

                                            @endif
                                        </div>
                                    </div>
                                </td>
                                @else
                                <td class=""></td>
                                @endif
                                <!--end::Action=-->
                            </tr>
                            @endforeach

                            <!--end::Table row-->
                        </tbody>
                        <!--end::Table body-->
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


<!--begin:: SKD INVENTORY Drawer -->
<div id="skd_inventory_history" class="bg-white" data-kt-drawer="true" data-kt-drawer-activate="true"
    data-kt-drawer-toggle="#skd_inventory_history_toggle" data-kt-drawer-close="#kt_drawer_example_permanent_close"
    data-kt-drawer-overlay="false" data-kt-drawer-permanent="true"
    data-kt-drawer-width="{default:'400px', 'md': '650px'}">
    <div class="card rounded-0 w-100"></div>

</div>
<!--end:: ENS Drawer-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="modal fade" id="ens_serial_no_modal_alert" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h2 class="text-gray-700" id="exampleModalLabel">Serial No</h2>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">

                <form id="ensSerialNoModalForm">
                    <div id="ens-all-serial">

                    </div>
                    <div class="text-center justify-content-center mt-5">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>


<!-- Modal -->

<!-- end confirm modal -->
<script>
    function getInventorySKD(skd_category, search_type) {
        jQuery.ajax({
            url: '/admin/skd/get-inventory-details',
            data: 'skd_category=' + skd_category + '&search_type=' + search_type +
                '&_token=' + jQuery("[name='_token']").val(),
            type: 'post',
            success: function (result) {
                $('#skd_inventory_history').html(result.html);
            }
        });

    }

    // function getENSHistory() {
    //     var ens_id = $('#ens_select_name').val();
    //     jQuery.ajax({
    //         url: '/admin/skd/get-ens-history',
    //         data: 'ensId=' + ens_id + '&_token=' + jQuery("[name='_token']").val(),
    //         type: 'post',
    //         success: function (result) {
    //             $('#ens_id_details').html(result.html);
    //         }
    //     });
    // }

    function getSKDHistoryByDate() {
        var start_date = $('#startDate').val();
        var end_date = $('#endDate').val();
        var skd_category = $('#skd_category').val();
        var skd_search_type = $('#skd_search_type').val();
        if (start_date && end_date) {
            jQuery.ajax({
                url: '/admin/skd/get-skd-history-by-date',
                data: 'start_date=' + start_date + '&end_date=' + end_date + '&skd_category=' + skd_category +
                    '&skd_search_type=' + skd_search_type + '&_token=' + jQuery(
                        "[name='_token']").val(),
                type: 'post',
                success: function (result) {
                    $('#ens_id_details').html(result.html);
                }
            });
        } else {
            return false;
        }
    }


    function openENSSerialModal(ensId) {
        jQuery.ajax({
            url: '/admin/skd/get-skd-serial-on-modal-by-ens-number',
            data: 'ens_id=' + ensId + '&_token=' + jQuery(
                "[name='_token']").val(),
            type: 'post',
            success: function (result) {
                $('#ens_serial_no_modal_alert').modal('show');
                $('#ens-all-serial').html(result.html);
            }
        });

    }

    // function downloadSKDInventoryHistory1() {
    //     var start_date = $('#startDate').val();
    //     var end_date = $('#endDate').val();
    //     if (start_date && end_date) {
    //         jQuery.ajax({
    //             url: '/admin/skd/get-history-date-for-download',
    //             data: 'start_date=' + start_date + '&end_date=' + end_date + '&_token=' + jQuery(
    //                 "[name='_token']").val(),
    //             type: 'post',
    //             success: function (data) {
    //                 var url = window.URL || window.webkitURL;
    //                 var objectUrl = url.createObjectURL(data);
    //                 window.open(objectUrl);
    //             }
    //         });
    //     } else {
    //         return false;
    //     }
    // }

</script>
@endsection
