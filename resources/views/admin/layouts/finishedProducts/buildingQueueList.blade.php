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
                    <li class="breadcrumb-item text-dark">Building Queue</li>
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
                        </div>
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
                                <th class="text-start min-w-100px">Requisition ID</th>
                                <th class="text-start min-w-100px">Product</th>
                                <th class="text-start min-w-100px">Processor</th>
                                <th class="text-start min-w-100px">Quantity</th>
                                <th class="text-start min-w-100px">Created by</th>
                                <th class="text-start min-w-100px">Created date</th>
                                <th class="text-start min-w-100px mx-3">Status</th>
                                <th class="text-start min-w-100px">Actions</th>

                            </tr>

                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600" id="requisition_table_data">
                            @foreach($requisitions as $key=>$requisition)
                            <tr>
                                <!--begin::Checkbox-->
                                <td>
                                </td>
                                <!--end::Checkbox-->
                                <!--begin::Category=-->

                                <td class="text-start pe-0">
                                    <span class="fw-bolder">RQ{{$requisition->rq_id}}</span>
                                </td>
                                <!--end::Category=-->
                                <!--begin::SKU=-->
                                <td class="text-start pe-0">
                                    <span class="fw-bolder">{{$requisition->product_type}}</span>
                                </td>
                                <!--end::SKU=-->
                                <!--begin::Qty=-->
                                <td class="text-start pe-0" data-order="47">
                                    <span class="fw-bolder">Core {{$requisition->bb_processor}}</span>
                                </td>
                                <!--end::Qty=-->
                                <!--begin::Price=-->
                                <td class="text-start pe-0">
                                    <span class="fw-bolder">{{$requisition->quantity}}</span>
                                </td>
                                <!--end::Price=-->
                                <!--begin::Status=-->
                                <td class="" data-order="0">

                                    <span class="fw-bolder">{{$requisition['userDetails']['name']}}</span>

                                </td>
                                <!--end::Status=-->

                                <!--begin::Action=-->
                                <td class="text-start">

                                    <span class="fw-bolder">{{date('d M Y',
                                        strtotime($requisition->created_at))}}</span>
                                </td>
                                <!--end::Action=-->
                                <!--begin::Rating-->
                                <td class="text-start pe-0" data-order="rating-3">
                                    <span class="fw-bolder">Pending</span>
                                </td>
                                <!--end::Rating-->
                                <td class="text-start">
                                    <a class="fw-bold text-primary"
                                        href="{{ route('building.details',$requisition->rq_id)}}" )>
                                        view</a>

                                </td>
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
