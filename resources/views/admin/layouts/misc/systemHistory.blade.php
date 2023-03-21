@extends('admin.master')

@section('admin-content')
<style>
    input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(90%);
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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">MISC</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">MISC</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>


                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">System History</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Filter menu-->
                <div class="m-0">
                </div>
            </div>
            <!--end::Actions-->
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
                        <div class="form-group row"
                            style="align-content: center;align-items: center;justify-content: center;">
                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <input type="hidden" value="'.$skd_category.'" id="skd_category">
                                <input type="hidden" value="'.$search_type.'" id="skd_search_type">
                                <div class="" id="">
                                    <input type="date" value="" class="form-control" id="starHistorytDate"
                                        onchange="getHistoryByDate()">
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1" style="width: 39px !important;">
                                <p>To</p>
                            </div>

                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <div class="" id="">
                                    <input type="date" value="" class="form-control" id="endHistoryDate"
                                        onchange="getHistoryByDate()">
                                </div>
                            </div>
                        </div>
                        <a class="btn" href="'.$url.'"> <i class=" fa-solid fs-3 text-success fa-circle-down"></i></a>
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
                            <tr class="text-end text-gray-600 fw-bolder fs-7 text-uppercase gs-2">
                                <th class=""></th>
                                <th class="text-start min-w-150px">Activity</th>
                                <th class=""></th>
                                <th class="text-center min-w-150px">Date</th>
                                <th class=""></th>
                                <th class="text-center min-w-150px">Time</th>
                                <th class=""></th>
                                <th class="text-center min-w-150px">Journal</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody id="historybydate" class="fw-bold text-gray-700">
                            @foreach ($system_history as $key=>$history)
                            <tr>

                                <td></td>

                                <td class="text-start ">
                                    <span class="">{{$history->menu_name}}</span>
                                </td>

                                <td></td>

                                <td class="text-center pe-0">
                                    <span class="">{{date('d M Y',strtotime($history->date))}}</span>
                                </td>
                                <td></td>
                                <td class="text-center pe-0">
                                    <span class="">{{date('h:i A',strtotime($history->created_at))}}</span>
                                </td>

                                <td></td>

                                <td class="text-start pe-0" data-order="47">
                                    @if(@$history->ens_id)

                                    @if($history['rawInventoryDetails']['product_type'] == 'RAM')
                                    <span class=" ">ENS{{$history->ens_id}} {!! $history->journal !!} for
                                        {{$history['rawInventoryDetails']['ram_size']}} GB
                                        {{$history['rawInventoryDetails']['product_type']}}
                                    </span>
                                    @elseif($history['rawInventoryDetails']['product_type'] == 'SSD')
                                    <span class=" ">ENS{{$history->ens_id}} {!! $history->journal !!} for
                                        {{$history['rawInventoryDetails']['ssd_size']}}
                                        {{$history['rawInventoryDetails']['product_type']}}
                                    </span>
                                    @elseif($history['rawInventoryDetails']['product_type'] == 'Barebone')
                                    <span class=" ">ENS{{$history->ens_id}} {!! $history->journal !!} for
                                        Core {{$history['rawInventoryDetails']['bb_processor']}}
                                        {{$history['rawInventoryDetails']['product_type']}}
                                    </span>
                                    @endif
                                    @else
                                    <span class=" "> {!! $history->journal !!}</span>
                                    @endif
                                </td>
                                <!--end::Action=-->
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
<script>
    function getHistoryByDate() {
        var start_date = $('#starHistorytDate').val();
        var end_date = $('#endHistoryDate').val();
        if (start_date && end_date) {
            jQuery.ajax({
                url: '/admin/misc/system-history-get',
                data: 'start_date=' + start_date + '&end_date=' + end_date + '&_token=' + jQuery(
                    "[name='_token']").val(),
                type: 'post',
                success: function (result) {
                    $('#historybydate').html(result.html);
                }
            });
        } else {
            return false;
        }
    }

</script>

@endsection
