@extends('admin.master')

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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Coupon</h1>
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
                    <li class="breadcrumb-item text-dark">Coupon</li>
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

                        @if(App\Models\User::hasPermission(["add_coupon"]))
                        <!--begin::Add Coupon-->
                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                            <button type="button" class="btn btn-md btn-primary" data-bs-toggle="modal"
                                data-bs-target="#couponAddModal" data-bs-whatever="@mdo">Add Coupon</button>
                        </div>
                        <!--end::Add Coupon-->
                        @endif

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
                                <th class="text-start min-w-100px">Coupon Name</th>
                                <th class="text-start min-w-100px">Amount</th>
                                <th class="text-start min-w-100px">Min Order Amount</th>
                                <th class="text-start min-w-100px">Coupon Types</th>
                                <th class="text-start min-w-100px mx-3">Status</th>
                                <th class=""></th>
                                @if(App\Models\User::hasPermission(["edit_coupon","delete_coupon"]))
                                    <th class="text-start min-w-100px">Actions</th>
                                @else
                                    <th class=""></th>
                                @endif
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            @foreach($coupon as $key=>$coupons)

                            <tr>
                                <!--begin::Checkbox-->
                                <td>
                                </td>
                                <!--end::Checkbox-->
                                <!--begin::Category=-->

                                <td class="text-start pe-0">
                                    <span class="fw-bolder">{{$coupons->coupon_name}}</span>
                                </td>
                                <!--end::Category=-->
                                <!--begin::SKU=-->
                                <td class="text-start pe-0">
                                    <span class="fw-bolder">{{$coupons->coupon_amount}}</span>
                                </td>
                                <!--end::SKU=-->
                                <!--begin::Qty=-->
                                <td class="text-start pe-0" data-order="47">
                                    <span class="fw-bolder">&#2547;{{number_format($coupons->min_order_amount)}}</span>
                                </td>
                                <!--end::Qty=-->
                                <!--begin::Price=-->
                                <td class="text-start pe-0">
                                    @php
                                    $type = $coupons->coupon_types
                                    @endphp
                                    @if($type == 0)
                                    <div class="fw-bolder ">%</div>
                                    @elseif($type == 1)
                                    <div class="fw-bolder ">Amount</div>
                                    @endif
                                </td>
                                <!--end::Price=-->
                                <!--begin::Rating-->
                                <td class="text-start pe-0" data-order="rating-3">
                                    @php
                                    $status = $coupons->coupon_status
                                    @endphp
                                    @if($status == 0)
                                    <div class="badge badge-light-primary">In Active</div>
                                    @elseif($status == 1)
                                    <div class="badge badge-light-success">Active</div>
                                    @endif
                                </td>
                                <!--end::Rating-->
                                <!--begin::Status=-->
                                <td class="" data-order="0">
                                    <!--begin::Badges-->

                                    <!--end::Badges-->
                                </td>
                                <!--end::Status=-->

                                @if(App\Models\User::hasPermission(["edit_coupon","delete_coupon"]))
                                    <!--begin::Action=-->
                                    <td class="text-start">
                                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon--></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            @if(App\Models\User::hasPermission(["edit_coupon"]))
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <button type="button" class="btn menu-link px-3" data-bs-toggle="modal"
                                                        data-bs-whatever="@mdo"
                                                        onclick="editCoupon('{{$coupons->id}}')">Edit</button>
                                                </div>
                                                <!--end::Menu item-->
                                            @endif

                                            @if(App\Models\User::hasPermission(["delete_coupon"]))
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <button type="button" class="btn menu-link px-3" data-bs-toggle="modal"
                                                    data-bs-whatever="@mdo"
                                                    onclick="deleteCoupon('{{$coupons->id}}')">Delete</button>
                                            </div>
                                            <!--end::Menu item-->
                                            @endif

                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                @else
                                    <td class=""></td>
                                @endif
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

<!-- Modal for Add-->
<div class="modal fade" id="couponAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register New Coupon</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">

                <form action="{{route('coupon.store')}}" id="productRegForm" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Coupon Type</label>
                        <select name="coupon_types" aria-label="" required data-control="select2"
                            data-placeholder="Select  ..."
                            class="form-select form-select-solid form-select-lg fw-bold coupon_types">
                            <option>Select Types</option>
                            <option value="1">Amount</option>
                            <option value="0">Percentage</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="message-text" class="col-form-label">Coupon Name</label>
                            <input type="text" name="coupon_name" class="form-control form-control-solid" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="message-text" class="col-form-label">Amount</label>
                            <input type="text" name="coupon_amount" class="form-control form-control-solid" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="message-text" class="col-form-label">Min Order Amount</label>
                            <input type="text" name="min_order_amount" class="form-control form-control-solid">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="message-text" class="col-form-label">Coupon Status</label>
                            <select class="form-select form-select-solid coupon_status" data-control="select2"
                                data-hide-search="true" data-placeholder="Status" name="coupon_status"
                                data-kt-ecommerce-product-filter="status">
                                <option>Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">In Active</option>
                            </select>
                        </div>
                    </div>

                    <div id="err_serial" class="text-danger mb-2"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>

<!-- Modal for edit-->
<div class="modal fade" id="editCouponModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Coupon</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">

                <form id="couponEditFrm">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Coupon Type</label>
                        <select id="coupon_types_edit" name="coupon_types_edit" aria-label="" required
                            data-control="select2" data-placeholder="Select  ..."
                            class="form-select form-select-solid form-select-lg fw-bold coupon_types_edit">
                            <option value="1">Amount</option>
                            <option value="0">Persentence</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="message-text" class="col-form-label">Coupon Name</label>
                            <input type="text" name="coupon_name_edit" id="coupon_name_edit"
                                class="form-control form-control-solid" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="message-text" class="col-form-label">Amount</label>
                            <input type="text" name="coupon_amount_edit" id="coupon_amount_edit"
                                class="form-control form-control-solid" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="message-text" class="col-form-label">Min Order Amount</label>
                            <input type="text" name="min_order_amount_edit" id="min_order_amount_edit"
                                class="form-control form-control-solid">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="message-text" class="col-form-label">Coupon Status</label>
                            <select class="form-select form-select-solid coupon_status_edit" data-control="select2"
                                data-hide-search="true" data-placeholder="Status" name="coupon_status_edit"
                                data-kt-ecommerce-product-filter="status">
                                <option value="1">Active</option>
                                <option value="0">In Active</option>
                            </select>
                        </div>
                    </div>

                    <div id="err_serial" class="text-danger mb-2"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="button" onclick="updateCouponDetails()">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>


<script>
    function editCoupon(c_id) {
        if (c_id) {
            jQuery.ajax({
                url: '/admin/coupon/get_coupon_details',
                data: 'coupon_id=' + c_id + '&_token=' + jQuery("[name='_token']").val(),
                type: 'post',
                success: function (result) {
                    if (result.status == 'success') {
                        $('#editCouponModal').modal('show');
                        $('.coupon_types_edit option[value=' + result.coupon_details[0].coupon_types + ']')
                            .attr('selected', 'selected');
                        document.getElementById('coupon_name_edit').value = result.coupon_details[0]
                            .coupon_name;
                        document.getElementById('coupon_name_edit').value = result.coupon_details[0]
                            .coupon_name;
                        document.getElementById('coupon_amount_edit').value = result.coupon_details[0]
                            .coupon_amount;
                        document.getElementById('min_order_amount_edit').value = result.coupon_details[0]
                            .min_order_amount;
                        $('.coupon_status_edit option[value=' + result.coupon_details[0].coupon_status +
                            ']').attr('selected', 'selected');
                    }
                }
            });
        } else {
            return false;
        }
    }


    function updateCouponDetails() {
        var data = $('#couponEditFrm').serialize();
        jQuery.ajax({
            url: '/admin/coupon/update_coupon_details',
            data: data,
            type: 'post',
            success: function (result) {
                if (result.status == 'success') {
                    window.location.href = window.location.href;
                }
            }
        });
    }


    function deleteCoupon(c_id) {
        if (c_id) {
            jQuery.ajax({
                url: '/admin/coupon/delete_coupon_details',
                data: 'coupon_id=' + c_id + '&_token=' + jQuery("[name='_token']").val(),
                type: 'post',
                success: function (result) {
                    if (result.status == 'success') {
                        window.location.href = window.location.href;
                    }
                }
            });
        } else {
            return false;
        }
    }

</script>

@endsection