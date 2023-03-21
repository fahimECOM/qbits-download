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
                <h1 class="d-flex text-muted fw-bolder fs-3 align-items-center my-1">Finish Product</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <li class="breadcrumb-item text-dark">Inventory</li>
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
                        <!-- <div class="d-flex align-items-center gap-2 gap-lg-3">
                            <button type="button" class="btn btn-md btn-primary" data-bs-toggle="modal"
                                data-bs-target="#couponAddModal" data-bs-whatever="@mdo">Add Inventory</button>
                        </div> -->
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
                                <th class="text-start min-w-100px">Series Name</th>
                                <th class="text-start min-w-100px">Product titel</th>
                                <th class="text-start min-w-100px">Model</th>
                                <th class="text-start min-w-100px">Ram</th>
                                <th class="text-start min-w-100px">SSD</th>
                                <th class="text-start min-w-100px">Processor</th>
                                <th class="text-start min-w-100px">Quantity</th>
                                <th class=""></th>

                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            @foreach($products as $key=> $product)

                            <tr>
                                <!--begin::Checkbox-->
                                <td>
                                </td>
                                <!--end::Checkbox-->
                                <!--begin::Category=-->

                                <td class="text-start pe-0">
                                    <span class="fw-bolder">{{$product->series_name}}</span>
                                </td>
                                <!--end::Category=-->
                                <!--begin::SKU=-->
                                <td class="text-start pe-0">
                                    <span class="fw-bolder">{{$product->name}}</span>
                                </td>
                                <!--end::SKU=-->
                                <!--begin::Qty=-->
                                <td class="text-start pe-0" data-order="47">
                                    <span class="fw-bolder">{{$product->prod_model}}</span>
                                </td>
                                <!--end::Qty=-->
                                <!--begin::Price=-->
                                <td class="text-start pe-0">
                                    <span class="fw-bolder">{{$product->ram}}</span>
                                </td>
                                <!--end::Price=-->
                                <!--begin::Rating-->
                                <td class="text-start pe-0" data-order="rating-3">
                                    <span class="fw-bolder">{{$product->storage}}</span>
                                </td>
                                <!--end::Rating-->
                                <!--begin::Status=-->
                                <td class="" data-order="0">
                                    <span class="fw-bolder">{{$product->processor}}</span>
                                </td>
                                <!--end::Status=-->
                                <!--begin::Action=-->
                                <td class="text-start">
                                    @php
                                    $product_id = $product->id;
                                    $quantity = App\Models\ProductSerial::where('product_id',$product_id)
                                    ->where('flow_type','inflow')->count();
                                    @endphp
                                    <span class="fw-bolder">{{$quantity}}</span>
                                </td>
                                <!--end::Action=-->
                                <td class=""></td>
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

@endsection
