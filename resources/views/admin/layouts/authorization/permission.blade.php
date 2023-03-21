@extends('admin.master')

@section('admin-content')
<style>
    .permission_name {
        min-width: 150px;
    }

    .form-check.form-check-custom .form-check-label {
        margin-left: 0.55rem;
        width: 180px;
    }

    .permission_heading {
        margin-left: 0%;
        width: 71%;
        font-size: 14px;
        color: #b3b3b3;
        text-align: center;
        /* margin-left: 26%;
        width: 100%;
        font-size: 14px;
        color: #b3b3b3; */
        /* text-transform: uppercase; */
    }

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

    .spinner-border {
        width: 1.2rem;
        height: 1.2rem;
    }

    .pass-show-hide {
        position: absolute;
        font-size: 15px;
        color: grey;
        margin-left: 280px;
        margin-top: -30px;
        cursor: pointer;
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

    #enable_user_btn{
        display: none;
    }

    .modal_close_btn {
        font-size: 22px;
    }

    .HeaderTwo_employeeTitle__MCXVH {
        font-size: 20px;
        font-weight: 700;
    }

    .HeaderTwo_employeeInfo__3vNlV {
        font-size: 15px;
        font-weight: 400;
    }

</style>

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Permission</h1>
                <!--end::Title-->

                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->

                <!--== =================================================================================== ==-->
                <!--== ==============================  START::Breadcrumb   =============================== ==-->
                <!--== =================================================================================== ==-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                    </li>

                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>

                    <li class="breadcrumb-item text-dark">Permission</li>
                </ul>
                <!--== =================================================================================== ==-->
                <!--== ===============================  END::Breadcrumb   ================================ ==-->
                <!--== =================================================================================== ==-->

            </div>
            <!--end::Page title-->
        </div>
    </div>

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card card-flush">
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">

                    <div class="card-title">

                        <!--== =================================================================================== ==-->
                        <!--== ===========================  START::Users From Table   ============================ ==-->
                        <!--== =================================================================================== ==-->
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
                        <!--== =================================================================================== ==-->
                        <!--== ============================  END::Users From Table   ============================= ==-->
                        <!--== =================================================================================== ==-->

                    </div>

                    <!--== =================================================================================== ==-->
                    <!--== =======================  START::Add User Permission Button   ====================== ==-->
                    <!--== =================================================================================== ==-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        <div class="w-100 mw-150px">
                        </div>
                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                            @if(App\Models\User::hasPermission(["add_user_permission"]))
                            <button type="button" class="btn btn-md btn-primary" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_add_user_role" data-bs-whatever="@mdo">Add User
                                Permission</button>
                            @endif
                        </div>
                    </div>
                    <!--== =================================================================================== ==-->
                    <!--== ========================  END::Add User Permission Button   ======================= ==-->
                    <!--== =================================================================================== ==-->
                
                </div>


                <!--== =================================================================================== ==-->
                <!--== ==========================  START::Display All Users   ============================ ==-->
                <!--== =================================================================================== ==-->

                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                        <thead>
                            <tr class="text-end text-gray-400 fw-bolder fs-7 text-uppercase gs-2">
                                <th class="">
                                </th>
                                <th class="text-start min-w-100px">Full Name</th>
                                <th class="text-start min-w-100px">Email</th>
                                <th class="text-start min-w-100px">Designation</th>
                                <th class="text-start min-w-100px">Date</th>
                                <th class="text-start min-w-100px">Status</th>
                                <th class=""></th>
                                @if(App\Models\User::hasPermission(["edit_user_permission","remove_user_permission"]))
                                    <th class="text-start min-w-100px">Actions</th>
                                @else
                                    <th class=""></th>
                                @endif
                            </tr>
                        </thead>

                        <tbody class="fw-bold text-gray-600" id="user-permission-list">
                            @foreach($admins as $key=> $admin)
                            <tr>
                                <td></td>

                                <td class="text-start pe-0">
                                    <span class="fw-bolder">{{$admin->name}}</span>
                                </td>

                                <td class="text-start pe-0">
                                    <span class="fw-bolder">{{$admin->email}}</span>
                                </td>

                                <td class="text-start pe-0" data-order="47">
                                    <span class="fw-bolder ms-3">{{$admin->designation}}</span>
                                </td>

                                <td class="text-start pe-0">
                                    <div class="fw-bolder ">{{date('d M Y',strtotime($admin->created_at))}}</div>
                                </td>

                                <td class="text-start pe-0" data-order="rating-3">
                                    @if($admin->status == 0)
                                    <div class="badge badge-light-danger">Deactive</div>
                                    @elseif ($admin->status == 1)
                                    <div class="badge badge-light-success">Active</div>
                                    @endif
                                </td>

                                <td class="" data-order="0"></td>

                                @if(App\Models\User::hasPermission(["edit_user_permission","remove_user_permission"]))
                                    <td class="text-start">
                                        <div class="">
                                            @if(App\Models\User::hasPermission(["edit_user_permission"]))
                                                <button type="button" class="btn menu-link px-3" 
                                                onclick="getUserPermission('{{$admin->id}}')" data-toggle="tooltip" data-placement="bottom" title="Edit"><i
                                                    class="fa-solid fa-pen-to-square text-primary"></i></button>
                                            @endif

                                            @if(App\Models\User::hasPermission(["remove_user_permission"]))
                                                <button type="button" class="btn menu-link px-3" onclick="removeUserLoginConfirmModal('{{$admin->id}}')" data-toggle="tooltip" data-placement="bottom" title="Remove"><i class="fa-solid fa-trash-can text-danger"></i></button>
                                            @endif
                                        </div>

                                    </td>
                                @else
                                    <td class=""></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!--== =================================================================================== ==-->
                <!--== ==========================  END::Display All Users   ============================ ==-->
                <!--== =================================================================================== ==-->

            </div>
        </div>
    </div>
</div>
<!--end::Content-->


<!--== =================================================================================== ==-->
<!--== ===================  START::Modal - Add User Permission Role   ==================== ==-->
<!--== =================================================================================== ==-->

<div class="modal fade" id="kt_modal_add_user_role" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-750px">
        <div class="modal-content">

            <!--begin::Modal header-->
            <div class="modal-header">
                <h2 class="fw-bolder">Add User Permission</h2>
                <button type="button"  data-bs-dismiss="modal" aria-label="Close" style="outline: none;background: none;border: none;">
                    <i class="fa-solid fa-xmark modal_close_btn"></i>
                </button>
            </div>
            <!--end::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 my-5">
                <!--begin::Form-->
                <form id="addUserPermissionForm" class="form">
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_role_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_role_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_role_scroll" data-kt-scroll-offset="300px">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="message-text" class="col-form-label">Full Name*</label>
                                <input type="text" name="full_name" class="form-control form-control-solid" required>
                                <p class="text-danger mt-2" id="error_full_name"></p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="message-text" class="col-form-label">Designation*</label>
                                <input type="text" name="designation" class="form-control form-control-solid" required>
                                <p class="text-danger mt-2" id="error_designation"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="message-text" class="col-form-label">Email*</label>
                                <input type="email" name="email" class="form-control form-control-solid" required>
                                <p class="text-danger mt-2" id="error_email"></p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="message-text" class="col-form-label">Password (default: 123456789)</label>
                                <input type="password" id="password" name="password" value="123456789"
                                    class="form-control form-control-solid">
                                <i class="fa fa-light fa-eye-slash pass-show-hide" id="pass-show-hide"
                                    onclick="passShow('')"></i>
                            </div>
                        </div>

                        <!--begin::Permissions-->
                        <div class="fv-row">
                            <label class="fs-4 fw-bolder form-label my-3">Permissions Setup</label>
                            <div class="table-responsive">

                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-bold">

                                        <tr class="my-5">
                                            <td class="permission_name text-gray-800 ">All Permission
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                    title="Allows a full access to the system"></i></td>
                                            <td>
                                                <label
                                                    class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                                    <input class="form-check-input add-form-check-input" type="checkbox"
                                                        value="" id="add-checked-all-permission"
                                                        onclick="checkedAllPermission('add')" />
                                                    <span class="form-check-label" for="">Select
                                                        all</span>
                                                </label>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-gray-800">
                                                <span class="menu-link">
                                                    <span class="menu-icon">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                                                                    fill="currentColor"></path>
                                                                <rect opacity="0.3" x="8" y="3" width="8" height="8"
                                                                    rx="4" fill="currentColor"></rect>
                                                            </svg>
                                                        </span>
                                                        <span class="menu-title">User Permission</span>
                                                        <span class="menu-arrow"></span>
                                                    </span>
                                                </span>
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="add_add_user_permission"
                                                            onclick="addUserPermission('add_user_permission','add')" />
                                                        <span class="form-check-label">Add user </span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid ">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="add_edit_user_permission"
                                                            onclick="addUserPermission('edit_user_permission','add')" />
                                                        <span class="form-check-label">Edit user </span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="add_remove_user_permission"
                                                            onclick="addUserPermission('remove_user_permission','add')" />
                                                        <span class="form-check-label">Remove user </span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-gray-800">
                                                <span class="menu-link">
                                                    <span class="menu-icon">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                                                                    fill="currentColor"></path>
                                                                <rect opacity="0.3" x="8" y="3" width="8" height="8"
                                                                    rx="4" fill="currentColor"></rect>
                                                            </svg>
                                                        </span>
                                                        <span class="menu-title">Product</span>
                                                        <span class="menu-arrow"></span>
                                                    </span>
                                                </span>
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20 ">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_view_product"
                                                            onclick="addUserPermission('view_product','add')" />
                                                        <span class="form-check-label">View Product</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_add_product"
                                                            onclick="addUserPermission('add_product','add')" />
                                                        <span class="form-check-label">Add Product</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid ">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_edit_product"
                                                            onclick="addUserPermission('edit_product','add')" />
                                                        <span class="form-check-label">Edit Product</span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-gray-800">
                                                <span class="menu-icon">
                                                    <span class="svg-icon svg-icon-primary svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1"
                                                            class="kt-svg-icon">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path
                                                                    d="M4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 Z"
                                                                    fill="currentColor" opacity="0.3" />
                                                                <path
                                                                    d="M18.5,11 L5.5,11 C4.67157288,11 4,11.6715729 4,12.5 L4,13 L8.58578644,13 C8.85100293,13 9.10535684,13.1053568 9.29289322,13.2928932 L10.2928932,14.2928932 C10.7456461,14.7456461 11.3597108,15 12,15 C12.6402892,15 13.2543539,14.7456461 13.7071068,14.2928932 L14.7071068,13.2928932 C14.8946432,13.1053568 15.1489971,13 15.4142136,13 L20,13 L20,12.5 C20,11.6715729 19.3284271,11 18.5,11 Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M5.5,6 C4.67157288,6 4,6.67157288 4,7.5 L4,8 L20,8 L20,7.5 C20,6.67157288 19.3284271,6 18.5,6 L5.5,6 Z"
                                                                    fill="currentColor" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <span class="menu-title">SKD Materials</span>
                                                    <span class="menu-arrow"></span>
                                                </span>
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">Inventory Setup</span>
                                                    </label>
                                                </div>

                                                <br>
                                                
                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="add_skd_barcode_generate"
                                                            onclick="addUserPermission('skd_barcode_generate','add')" />
                                                        <span class="form-check-label">SKD Barcode generate</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid ">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_entry_skd"
                                                            onclick="addUserPermission('entry_skd','add')" />
                                                        <span class="form-check-label">Entry SKD</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">SKD Queue List</span>
                                                    </label>
                                                </div>
                                            
                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid  me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_view_ens_request"
                                                            onclick="addUserPermission('view_ens_request','add')" />
                                                        <span class="form-check-label">View ENS </span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid ">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="add_confirm_reject_ens_request"
                                                            onclick="addUserPermission('confirm_reject_ens_request','add')" />
                                                        <span class="form-check-label">Confirm/Reject</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid ">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="add_verify_ens_request"
                                                            onclick="addUserPermission('verify_ens_request','add')" />
                                                        <span class="form-check-label">Verify</span>
                                                    </label>
                                                </div>

                                                <br>
                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">SKD Inventory</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid  me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_view_skd_inventory_history"
                                                            onclick="addUserPermission('view_skd_inventory_history','add')" />
                                                        <span class="form-check-label">View SKD Inventory </span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-gray-800">
                                                <span class="menu-icon">
                                                    <span class="svg-icon svg-icon-primary svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1"
                                                            class="kt-svg-icon">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path
                                                                    d="M4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 Z"
                                                                    fill="currentColor" opacity="0.3" />
                                                                <path
                                                                    d="M18.5,11 L5.5,11 C4.67157288,11 4,11.6715729 4,12.5 L4,13 L8.58578644,13 C8.85100293,13 9.10535684,13.1053568 9.29289322,13.2928932 L10.2928932,14.2928932 C10.7456461,14.7456461 11.3597108,15 12,15 C12.6402892,15 13.2543539,14.7456461 13.7071068,14.2928932 L14.7071068,13.2928932 C14.8946432,13.1053568 15.1489971,13 15.4142136,13 L20,13 L20,12.5 C20,11.6715729 19.3284271,11 18.5,11 Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M5.5,6 C4.67157288,6 4,6.67157288 4,7.5 L4,8 L20,8 L20,7.5 C20,6.67157288 19.3284271,6 18.5,6 L5.5,6 Z"
                                                                    fill="currentColor" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <span class="menu-title">Finish Products</span>
                                                    <span class="menu-arrow"></span>
                                                </span>
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">Inventory</span>
                                                    </label>
                                                </div>

                                                <br>
                                                
                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="add_view_finish_inventory"
                                                            onclick="addUserPermission('view_finish_inventory','add')" />
                                                        <span class="form-check-label">View</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">Requisition Creation Process</span>
                                                    </label>
                                                </div>
                                            
                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_view_requisition_request"
                                                            onclick="addUserPermission('view_requisition_request','add')" />
                                                        <span class="form-check-label">View</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid ">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="add_requisition_create"
                                                            onclick="addUserPermission('requisition_create','add')" />
                                                        <span class="form-check-label">Requisition Create</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="add_verify_requisition_request"
                                                            onclick="addUserPermission('verify_requisition_request','add')" />
                                                        <span class="form-check-label">Verify</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid ">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="add_confirm_reject_requisition_request"
                                                            onclick="addUserPermission('confirm_reject_requisition_request','add')" />
                                                        <span class="form-check-label">Confirm/Reject</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">Requisition Building Process</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid  me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_view_requisition_building_process"
                                                            onclick="addUserPermission('view_requisition_building_process','add')" />
                                                        <span class="form-check-label">View</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid  me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_assembling_parts"
                                                            onclick="addUserPermission('assembling_parts','add')" />
                                                        <span class="form-check-label">Assembling Parts</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid  me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_lasering_dcover"
                                                            onclick="addUserPermission('lasering_dcover','add')" />
                                                        <span class="form-check-label">Lasering</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid  me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_dcover_joining_assemble_parts"
                                                            onclick="addUserPermission('dcover_joining_assemble_parts','add')" />
                                                        <span class="form-check-label">D-Cover</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid  me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_finalize_product_building"
                                                            onclick="addUserPermission('finalize_product_building','add')" />
                                                        <span class="form-check-label">Finalize</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">Requisition Stock In</span>
                                                    </label>
                                                </div>

                                                <br>
                                                
                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="add_view_requisition_stockin_queuelist"
                                                            onclick="addUserPermission('view_requisition_stockin_queuelist','add')" />
                                                        <span class="form-check-label">View</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="add_confirm_reject_requisition_stockin"
                                                            onclick="addUserPermission('confirm_reject_requisition_stockin','add')" />
                                                        <span class="form-check-label">Confirm/Reject</span>
                                                    </label>
                                                </div>

                                                <br>
                                                
                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="add_verify_requisition_stockin"
                                                            onclick="addUserPermission('verify_requisition_stockin','add')" />
                                                        <span class="form-check-label">Verify</span>
                                                    </label>
                                                </div>

                                            </td> 
                                        </tr>

                                        <tr>
                                            <td class="text-gray-800">
                                                <span class="menu-link">
                                                    <span class="menu-icon">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2">
                                                            <!--begin::Svg Icon -->
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path
                                                                        d="M4.00246329,12.2004927 L13,14 L13,4.06189375 C16.9463116,4.55399184 20,7.92038235 20,12 C20,16.418278 16.418278,20 12,20 C7.64874861,20 4.10886412,16.5261253 4.00246329,12.2004927 Z"
                                                                        fill="currentColor" opacity="0.3" />
                                                                    <path
                                                                        d="M3.0603968,10.0120794 C3.54712466,6.05992157 6.91622084,3 11,3 L11,11.6 L3.0603968,10.0120794 Z"
                                                                        fill="currentColor" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    <span class="menu-title">Sales</span>
                                                    <span class="menu-arrow"></span>
                                                </span>
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">Orders</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_view_sales_order"
                                                            onclick="addUserPermission('view_sales_order','add')" />
                                                        <span class="form-check-label">View Orders</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm Sales form-check-custom form-check-solid ">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="add_capture_cancel_sales_order"
                                                            onclick="addUserPermission('capture_cancel_sales_order','add')" />
                                                        <span class="form-check-label">Capture/Cancel</span>
                                                    </label>
                                                </div>
                                                
                                                <br>

                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">Invoices</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm Sales form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_view_sales_invoice"
                                                            onclick="addUserPermission('view_sales_invoice','add')" />
                                                        <span class="form-check-label">View Invoice</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="add_shipment_cancel_sales_invoice"
                                                            onclick="addUserPermission('shipment_cancel_sales_invoice','add')" />
                                                        <span class="form-check-label">Shipment/Cancel</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm Sales form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="add_complete_sales_invoice"
                                                            onclick="addUserPermission('complete_sales_invoice','add')" />
                                                        <span class="form-check-label">Complete Invoice</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm Sales form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_view_pdf_invoice"
                                                            onclick="addUserPermission('view_pdf_invoice','add')" />
                                                        <span class="form-check-label">PDF Invoice</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">Refunds</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_view_refund_order"
                                                            onclick="addUserPermission('view_refund_order','add')" />
                                                        <span class="form-check-label">View Refund</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm Sales form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="add_complete_refund_order"
                                                            onclick="addUserPermission('complete_refund_order','add')" />
                                                        <span class="form-check-label">Complete Refund </span>
                                                    </label>
                                                </div>

                                                <br>

                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-gray-800">
                                                <span class="menu-icon">
                                                    <span class="menu-icon">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2">
                                                            <!--begin::Svg Icon -->
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path
                                                                        d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                                                        fill="currentColor" opacity="0.3" />
                                                                    <path
                                                                        d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                                                        fill="currentColor" />
                                                                    <rect fill="#000000" opacity="0.3" x="10" y="9"
                                                                        width="7" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="7" y="9"
                                                                        width="2" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="7" y="13"
                                                                        width="2" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="10" y="13"
                                                                        width="7" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="7" y="17"
                                                                        width="2" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="10" y="17"
                                                                        width="7" height="2" rx="1" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                </span>
                                                <span class="menu-title">Attributes</span>
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_view_attribute"
                                                            onclick="addUserPermission('view_attribute','add')" />
                                                        <span class="form-check-label">View Attribute</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_add_attribute"
                                                            onclick="addUserPermission('add_attribute','add')" />
                                                        <span class="form-check-label">Add Attribute</span>
                                                    </label>
                                                </div>

                                                <br>
                                                
                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_edit_attribute"
                                                            onclick="addUserPermission('edit_attribute','add')" />
                                                        <span class="form-check-label">Edit Attribute</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_delete_attribute"
                                                            onclick="addUserPermission('delete_attribute','add')" />
                                                        <span class="form-check-label">Delete Attribute</span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-gray-800">
                                                <span class="menu-icon">
                                                    <span class="svg-icon svg-icon-primary svg-icon-2">
                                                        <!--begin::Svg Icon -->
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path
                                                                    d="M3,10.0500091 L3,8 C3,7.44771525 3.44771525,7 4,7 L9,7 L9,9 C9,9.55228475 9.44771525,10 10,10 C10.5522847,10 11,9.55228475 11,9 L11,7 L21,7 C21.5522847,7 22,7.44771525 22,8 L22,10.0500091 C20.8588798,10.2816442 20,11.290521 20,12.5 C20,13.709479 20.8588798,14.7183558 22,14.9499909 L22,17 C22,17.5522847 21.5522847,18 21,18 L11,18 L11,16 C11,15.4477153 10.5522847,15 10,15 C9.44771525,15 9,15.4477153 9,16 L9,18 L4,18 C3.44771525,18 3,17.5522847 3,17 L3,14.9499909 C4.14112016,14.7183558 5,13.709479 5,12.5 C5,11.290521 4.14112016,10.2816442 3,10.0500091 Z M10,11 C9.44771525,11 9,11.4477153 9,12 L9,13 C9,13.5522847 9.44771525,14 10,14 C10.5522847,14 11,13.5522847 11,13 L11,12 C11,11.4477153 10.5522847,11 10,11 Z"
                                                                    fill="currentColor"
                                                                    transform="translate(12.500000, 12.500000) rotate(-45.000000) translate(-12.500000, -12.500000) " />
                                                                <polygon fill="currentColor" opacity="0.3"
                                                                    points="6 8 6 16 18 16 18 8" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                                <span class="menu-title">Coupon</span>
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_view_coupon"
                                                            onclick="addUserPermission('view_coupon','add')" />
                                                        <span class="form-check-label">View Coupon</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_add_coupon"
                                                            onclick="addUserPermission('add_coupon','add')" />
                                                        <span class="form-check-label">Add Coupon</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_edit_coupon"
                                                            onclick="addUserPermission('edit_coupon','add')" />
                                                        <span class="form-check-label">Edit Coupon</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_delete_coupon"
                                                            onclick="addUserPermission('delete_coupon','add')" />
                                                        <span class="form-check-label">Delete Coupon</span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="text-gray-800">
                                                <span class="menu-icon">
                                                    <span class="svg-icon svg-icon-primary svg-icon-2">
                                                        <!--begin::Svg Icon -->
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path
                                                                    d="M10,4 L21,4 C21.5522847,4 22,4.44771525 22,5 L22,7 C22,7.55228475 21.5522847,8 21,8 L10,8 C9.44771525,8 9,7.55228475 9,7 L9,5 C9,4.44771525 9.44771525,4 10,4 Z M10,10 L21,10 C21.5522847,10 22,10.4477153 22,11 L22,13 C22,13.5522847 21.5522847,14 21,14 L10,14 C9.44771525,14 9,13.5522847 9,13 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M10,16 L21,16 C21.5522847,16 22,16.4477153 22,17 L22,19 C22,19.5522847 21.5522847,20 21,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,17 C9,16.4477153 9.44771525,16 10,16 Z"
                                                                    fill="currentColor" />
                                                                <rect fill="currentColor" opacity="0.3" x="2" y="4"
                                                                    width="5" height="16" rx="1" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                                <span class="menu-title">Customers</span>
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name="" id="add_view_customer"
                                                            onclick="addUserPermission('view_customer','add')" />
                                                        <span class="form-check-label">View Customer</span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-gray-800">
                                                <span class="menu-link">
                                                    <span class="menu-icon">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="currentColor">
                                                                <path
                                                                    d="M13 5.91517C15.8 6.41517 18 8.81519 18 11.8152C18 12.5152 17.9 13.2152 17.6 13.9152L20.1 15.3152C20.6 15.6152 21.4 15.4152 21.6 14.8152C21.9 13.9152 22.1 12.9152 22.1 11.8152C22.1 7.01519 18.8 3.11521 14.3 2.01521C13.7 1.91521 13.1 2.31521 13.1 3.01521V5.91517H13Z"
                                                                    fill="currentColor" />
                                                                <path opacity="0.3"
                                                                    d="M19.1 17.0152C19.7 17.3152 19.8 18.1152 19.3 18.5152C17.5 20.5152 14.9 21.7152 12 21.7152C9.1 21.7152 6.50001 20.5152 4.70001 18.5152C4.30001 18.0152 4.39999 17.3152 4.89999 17.0152L7.39999 15.6152C8.49999 16.9152 10.2 17.8152 12 17.8152C13.8 17.8152 15.5 17.0152 16.6 15.6152L19.1 17.0152ZM6.39999 13.9151C6.19999 13.2151 6 12.5152 6 11.8152C6 8.81517 8.2 6.41515 11 5.91515V3.01519C11 2.41519 10.4 1.91519 9.79999 2.01519C5.29999 3.01519 2 7.01517 2 11.8152C2 12.8152 2.2 13.8152 2.5 14.8152C2.7 15.4152 3.4 15.7152 4 15.3152L6.39999 13.9151Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <span class="menu-title">Support Center</span>
                                                    </span>
                                                </span>
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">Product Registration</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="add_view_registered_product_list"
                                                            onclick="addUserPermission('view_registered_product_list','add')" />
                                                        <span class="form-check-label">View Registered Product</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">Tickets</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="add_view_support_ticket"
                                                            onclick="addUserPermission('view_support_ticket','add')" />
                                                        <span class="form-check-label">View Tickets</span>
                                                    </label>

                                                    <label class="form-check form-check-custom form-check-solid ">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="add_response_support_ticket"
                                                            onclick="addUserPermission('response_support_ticket','add')" />
                                                        <span class="form-check-label">Response Ticket</span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-gray-800">
                                                <span class="menu-link">
                                                    <span class="menu-icon">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2">
                                                            <!--begin::Svg Icon-->
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                                    <path
                                                                        d="M3.52270623,14.028695 C2.82576459,13.3275941 2.82576459,12.19529 3.52270623,11.4941891 L11.6127629,3.54050571 C11.9489429,3.20999263 12.401513,3.0247814 12.8729533,3.0247814 L19.3274172,3.0247814 C20.3201611,3.0247814 21.124939,3.82955935 21.124939,4.82230326 L21.124939,11.2583059 C21.124939,11.7406659 20.9310733,12.2027862 20.5869271,12.5407722 L12.5103155,20.4728108 C12.1731575,20.8103442 11.7156477,21 11.2385688,21 C10.7614899,21 10.3039801,20.8103442 9.9668221,20.4728108 L3.52270623,14.028695 Z M16.9307214,9.01652093 C17.9234653,9.01652093 18.7282432,8.21174298 18.7282432,7.21899907 C18.7282432,6.22625516 17.9234653,5.42147721 16.9307214,5.42147721 C15.9379775,5.42147721 15.1331995,6.22625516 15.1331995,7.21899907 C15.1331995,8.21174298 15.9379775,9.01652093 16.9307214,9.01652093 Z"
                                                                        fill="currentColor" fill-rule="nonzero"
                                                                        opacity="0.9" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    <span class="menu-title">MISC</span>
                                                </span>
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">Post sell serial No</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="add_view_post_sell_serial_no"
                                                            onclick="addUserPermission('view_post_sell_serial_no','add')" />
                                                        <span class="form-check-label">View</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">System History</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input add-form-check-input add-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="add_view_system_history"
                                                            onclick="addUserPermission('view_system_history','add')" />
                                                        <span class="form-check-label">View System History</span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->

                                <!--begin::Hidden Input Fields-->
                                <textarea name="permission_scopes" id="add_permission_scopes"
                                    class="form-control form-control-solid" rows="2" cols="5"
                                    style="display:none;"></textarea>
                                <input type="hidden" name="form_type" value="add">
                                <!--end::Hidden Input Fields-->

                            </div>
                        </div>
                        <!--end::Permissions-->
                    </div>

                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-roles-modal-action="cancel"
                            data-bs-dismiss="modal">Discard</button>
                        <button type="button" class="btn btn-primary" id="permission-submit-btn"
                            onclick="submitUserPermissionForm('add')">
                            <span class="indicator-label">Submit</span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>

<!--== =================================================================================== ==-->
<!--== ===================  END::Modal - ADD User Permission Role   ====================== ==-->
<!--== =================================================================================== ==-->





<!--== =================================================================================== ==-->
<!--== =================  START::Modal - Update User Permission Role   =================== ==-->
<!--== =================================================================================== ==-->

<div class="modal fade" id="kt_modal_update_user_role" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-750px" id="kt_modal_update_user_role_body">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Update User Permission</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <button type="button"  data-bs-dismiss="modal" aria-label="Close" style="outline: none;background: none;border: none;">
                    <i class="fa-solid fa-xmark modal_close_btn"></i>
                </button>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 my-7">
                <!--begin::Form-->
                <form id="updateUserPermissionForm" class="form">
                    @csrf
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_user_role_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_user_role_header"
                        data-kt-scroll-wrappers="#kt_modal_update_user_role_scroll" data-kt-scroll-offset="300px">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="message-text" class="col-form-label">Full Name*</label>
                                <input type="text" id="update_full_name" name="full_name"
                                    class="form-control form-control-solid" readonly required>
                                <p class="text-danger mt-2" id="error_update_full_name"></p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="message-text" class="col-form-label">Designation*</label>
                                <input type="text" id="update_designation" name="designation"
                                    class="form-control form-control-solid" required>
                                <p class="text-danger mt-2" id="error_update_designation"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9 mb-3">
                                <label for="message-text" class="col-form-label">Email*</label>
                                <input type="email" id="update_email" name="email"
                                    class="form-control form-control-solid" readonly required>
                                <p class="text-danger mt-2" id="error_update_email"></p>
                            </div>
                            <!-- <div class="col-md-6 mb-3">
                                <label for="message-text" class="col-form-label">Password (default: 123456789)</label>
                                <input type="password" id="update_password" name="password" value="123456789"
                                    class="form-control form-control-solid">
                                <i class="fa fa-light fa-eye-slash pass-show-hide" id="update_pass-show-hide"
                                    onclick="passShow('update_')"></i>
                            </div> -->
                            <div class="col-md-3 mb-3">
                                <button type="button" class="btn btn-primary me-3" style="margin-top: 40px;" onclick="viewUserProfile()">
                                    <span class="indicator-label">View Profile</span>
                                </button>
                            </div>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Permissions-->
                        <div class="fv-row">
                            <!--begin::Label-->
                            <label class="fs-4 fw-bolder form-label my-3">Permissions Setup</label>
                            <!--end::Label-->
                            <!--begin::Table wrapper-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-bold">
                                        <tr class="my-5">
                                            <td class="permission_name text-gray-800 ">All Permission
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                    title="Allows a full access to the system"></i></td>
                                            <td>
                                                <label
                                                    class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                                    <input class="form-check-input update-form-check-input"
                                                        type="checkbox" value="" id="update-checked-all-permission"
                                                        onclick="checkedAllPermission('update')" />
                                                    <span class="form-check-label" for="">Select
                                                        all</span>
                                                </label>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-gray-800">
                                                <span class="menu-link">
                                                    <span class="menu-icon">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                                                                    fill="currentColor"></path>
                                                                <rect opacity="0.3" x="8" y="3" width="8" height="8"
                                                                    rx="4" fill="currentColor"></rect>
                                                            </svg>
                                                        </span>
                                                        <span class="menu-title">User Permission</span>
                                                        <span class="menu-arrow"></span>
                                                    </span>
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_add_user_permission"
                                                            onclick="addUserPermission('add_user_permission','update')" />
                                                        <span class="form-check-label">Add user </span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid ">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_edit_user_permission"
                                                            onclick="addUserPermission('edit_user_permission','update')" />
                                                        <span class="form-check-label">Edit user </span>
                                                    </label>
                                                </div>
                                                
                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_remove_user_permission"
                                                            onclick="addUserPermission('remove_user_permission','update')" />
                                                        <span class="form-check-label">Remove user </span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-gray-800">
                                                <span class="menu-link">
                                                    <span class="menu-icon">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                                                                    fill="currentColor"></path>
                                                                <rect opacity="0.3" x="8" y="3" width="8" height="8"
                                                                    rx="4" fill="currentColor"></rect>
                                                            </svg>
                                                        </span>
                                                        <span class="menu-title">Product</span>
                                                        <span class="menu-arrow"></span>
                                                    </span>
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20 ">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name="" id="update_view_product"
                                                            onclick="addUserPermission('view_product','update')" />
                                                        <span class="form-check-label">View Product</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name="" id="update_add_product"
                                                            onclick="addUserPermission('add_product','update')" />
                                                        <span class="form-check-label">Add Product</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid ">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name="" id="update_edit_product"
                                                            onclick="addUserPermission('edit_product','update')" />
                                                        <span class="form-check-label">Edit Product</span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-gray-800">
                                                <span class="menu-icon">
                                                    <span class="svg-icon svg-icon-primary svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1"
                                                            class="kt-svg-icon">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path
                                                                    d="M4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 Z"
                                                                    fill="currentColor" opacity="0.3" />
                                                                <path
                                                                    d="M18.5,11 L5.5,11 C4.67157288,11 4,11.6715729 4,12.5 L4,13 L8.58578644,13 C8.85100293,13 9.10535684,13.1053568 9.29289322,13.2928932 L10.2928932,14.2928932 C10.7456461,14.7456461 11.3597108,15 12,15 C12.6402892,15 13.2543539,14.7456461 13.7071068,14.2928932 L14.7071068,13.2928932 C14.8946432,13.1053568 15.1489971,13 15.4142136,13 L20,13 L20,12.5 C20,11.6715729 19.3284271,11 18.5,11 Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M5.5,6 C4.67157288,6 4,6.67157288 4,7.5 L4,8 L20,8 L20,7.5 C20,6.67157288 19.3284271,6 18.5,6 L5.5,6 Z"
                                                                    fill="currentColor" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <span class="menu-title">SKD Materials</span>
                                                    <span class="menu-arrow"></span>
                                                </span>
                                            </td>
                                            
                                            <td>
                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">Inventory Setup</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_skd_barcode_generate"
                                                            onclick="addUserPermission('skd_barcode_generate','update')" />
                                                        <span class="form-check-label">SKD Barcode generate</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid ">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name="" id="update_entry_skd"
                                                            onclick="addUserPermission('entry_skd','update')" />
                                                        <span class="form-check-label">Entry SKD</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">SKD Queue List</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid  me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_view_ens_request"
                                                            onclick="addUserPermission('view_ens_request','update')" />
                                                        <span class="form-check-label">View ENS </span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid ">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_confirm_reject_ens_request"
                                                            onclick="addUserPermission('confirm_reject_ens_request','update')" />
                                                        <span class="form-check-label">Confirm/Reject</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid ">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_verify_ens_request"
                                                            onclick="addUserPermission('verify_ens_request','update')" />
                                                        <span class="form-check-label">Verify</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">SKD Inventory</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid  me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name="" id="update_view_skd_inventory_history"
                                                            onclick="addUserPermission('view_skd_inventory_history','update')" />
                                                        <span class="form-check-label">View SKD Inventory </span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-gray-800">
                                                <span class="menu-icon">
                                                    <span class="svg-icon svg-icon-primary svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1"
                                                            class="kt-svg-icon">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path
                                                                    d="M4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 Z"
                                                                    fill="currentColor" opacity="0.3" />
                                                                <path
                                                                    d="M18.5,11 L5.5,11 C4.67157288,11 4,11.6715729 4,12.5 L4,13 L8.58578644,13 C8.85100293,13 9.10535684,13.1053568 9.29289322,13.2928932 L10.2928932,14.2928932 C10.7456461,14.7456461 11.3597108,15 12,15 C12.6402892,15 13.2543539,14.7456461 13.7071068,14.2928932 L14.7071068,13.2928932 C14.8946432,13.1053568 15.1489971,13 15.4142136,13 L20,13 L20,12.5 C20,11.6715729 19.3284271,11 18.5,11 Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M5.5,6 C4.67157288,6 4,6.67157288 4,7.5 L4,8 L20,8 L20,7.5 C20,6.67157288 19.3284271,6 18.5,6 L5.5,6 Z"
                                                                    fill="currentColor" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <span class="menu-title">Finish Products</span>
                                                    <span class="menu-arrow"></span>
                                                </span>
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">Inventory</span>
                                                    </label>
                                                </div>

                                                <br>
                                                
                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_view_finish_inventory"
                                                            onclick="addUserPermission('view_finish_inventory','update')" />
                                                        <span class="form-check-label">View</span>
                                                    </label>
                                                </div>

                                                <br> 

                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">Requisition Creation Process</span>
                                                    </label>
                                                </div>
                                            
                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name="" id="update_view_requisition_request"
                                                            onclick="addUserPermission('view_requisition_request','update')" />
                                                        <span class="form-check-label">View</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid ">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_requisition_create"
                                                            onclick="addUserPermission('requisition_create','update')" />
                                                        <span class="form-check-label">Requisition Create</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_verify_requisition_request"
                                                            onclick="addUserPermission('verify_requisition_request','update')" />
                                                        <span class="form-check-label">Verify</span>
                                                    </label>
                                                    
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid ">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_confirm_reject_requisition_request"
                                                            onclick="addUserPermission('confirm_reject_requisition_request','update')" />
                                                        <span class="form-check-label">Confirm/Reject</span>
                                                    </label>
                                                </div>

                                                <br> 

                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">Requisition Building Process</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid  me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name="" id="update_view_requisition_building_process"
                                                            onclick="addUserPermission('view_requisition_building_process','update')" />
                                                        <span class="form-check-label">View</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid  me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name="" id="update_assembling_parts"
                                                            onclick="addUserPermission('assembling_parts','update')" />
                                                        <span class="form-check-label">Assembling Parts</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid  me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name="" id="update_lasering_dcover"
                                                            onclick="addUserPermission('lasering_dcover','update')" />
                                                        <span class="form-check-label">Lasering</span>
                                                    </label>
                                                    
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid  me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name="" id="update_dcover_joining_assemble_parts"
                                                            onclick="addUserPermission('dcover_joining_assemble_parts','update')" />
                                                        <span class="form-check-label">D-Cover</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid  me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name="" id="update_finalize_product_building"
                                                            onclick="addUserPermission('finalize_product_building','update')" />
                                                        <span class="form-check-label">Finalize</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">Requisition Stock In</span>
                                                    </label>
                                                </div>

                                                <br>
                                                
                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_view_requisition_stockin_queuelist"
                                                            onclick="addUserPermission('view_requisition_stockin_queuelist','update')" />
                                                        <span class="form-check-label">View</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_confirm_reject_requisition_stockin"
                                                            onclick="addUserPermission('confirm_reject_requisition_stockin','update')" />
                                                        <span class="form-check-label">Confirm/Reject</span>
                                                    </label>
                                                </div>

                                                <br>
                                                
                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_verify_requisition_stockin"
                                                            onclick="addUserPermission('verify_requisition_stockin','update')" />
                                                        <span class="form-check-label">Verify</span>
                                                    </label>
                                                </div>

                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-gray-800">
                                                <span class="menu-link">
                                                    <span class="menu-icon">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2">
                                                            <!--begin::Svg Icon-->
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path
                                                                        d="M4.00246329,12.2004927 L13,14 L13,4.06189375 C16.9463116,4.55399184 20,7.92038235 20,12 C20,16.418278 16.418278,20 12,20 C7.64874861,20 4.10886412,16.5261253 4.00246329,12.2004927 Z"
                                                                        fill="currentColor" opacity="0.3" />
                                                                    <path
                                                                        d="M3.0603968,10.0120794 C3.54712466,6.05992157 6.91622084,3 11,3 L11,11.6 L3.0603968,10.0120794 Z"
                                                                        fill="currentColor" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    <span class="menu-title">Sales</span>
                                                    <span class="menu-arrow"></span>
                                                </span>
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">Orders</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_view_sales_order"
                                                            onclick="addUserPermission('view_sales_order','update')" />
                                                        <span class="form-check-label">View Orders</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm Sales form-check-custom form-check-solid ">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_capture_cancel_sales_order"
                                                            onclick="addUserPermission('capture_cancel_sales_order','update')" />
                                                        <span class="form-check-label">Capture/Cancel</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">Invoices</span>
                                                    </label>
                                                </div>

                                                <br>
                                                
                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm Sales form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_view_sales_invoice"
                                                            onclick="addUserPermission('view_sales_invoice','update')" />
                                                        <span class="form-check-label">View Invoice</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_shipment_cancel_sales_invoice"
                                                            onclick="addUserPermission('shipment_cancel_sales_invoice','update')" />
                                                        <span class="form-check-label">Shipment/Cancel</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm Sales form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_complete_sales_invoice"
                                                            onclick="addUserPermission('complete_sales_invoice','update')" />
                                                        <span class="form-check-label">Complete Invoice</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm Sales form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_view_pdf_invoice"
                                                            onclick="addUserPermission('view_pdf_invoice','update')" />
                                                        <span class="form-check-label">PDF Invoice</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">Refunds</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_view_refund_order"
                                                            onclick="addUserPermission('view_refund_order','update')" />
                                                        <span class="form-check-label">View Refund</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm Sales form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_complete_refund_order"
                                                            onclick="addUserPermission('complete_refund_order','update')" />
                                                        <span class="form-check-label">Complete Refund </span>
                                                    </label>
                                                </div>

                                                <br>

                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-gray-800">
                                                <span class="menu-icon">
                                                    <span class="menu-icon">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2">
                                                            <!--begin::Svg Icon -->
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path
                                                                        d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                                                        fill="currentColor" opacity="0.3" />
                                                                    <path
                                                                        d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                                                        fill="currentColor" />
                                                                    <rect fill="#000000" opacity="0.3" x="10" y="9"
                                                                        width="7" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="7" y="9"
                                                                        width="2" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="7" y="13"
                                                                        width="2" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="10" y="13"
                                                                        width="7" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="7" y="17"
                                                                        width="2" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="10" y="17"
                                                                        width="7" height="2" rx="1" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                </span>
                                                <span class="menu-title">Attributes</span>
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name="" id="update_view_attribute"
                                                            onclick="addUserPermission('view_attribute','update')" />
                                                        <span class="form-check-label">View Attribute</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name="" id="update_add_attribute"
                                                            onclick="addUserPermission('add_attribute','update')" />
                                                        <span class="form-check-label">Add Attribute</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name="" id="update_edit_attribute"
                                                            onclick="addUserPermission('edit_attribute','update')" />
                                                        <span class="form-check-label">Edit Attribute</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_delete_attribute"
                                                            onclick="addUserPermission('delete_attribute','update')" />
                                                        <span class="form-check-label">Delete Attribute</span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-gray-800">
                                                <span class="menu-icon">
                                                    <span class="svg-icon svg-icon-primary svg-icon-2">
                                                        <!--begin::Svg Icon -->
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path
                                                                    d="M3,10.0500091 L3,8 C3,7.44771525 3.44771525,7 4,7 L9,7 L9,9 C9,9.55228475 9.44771525,10 10,10 C10.5522847,10 11,9.55228475 11,9 L11,7 L21,7 C21.5522847,7 22,7.44771525 22,8 L22,10.0500091 C20.8588798,10.2816442 20,11.290521 20,12.5 C20,13.709479 20.8588798,14.7183558 22,14.9499909 L22,17 C22,17.5522847 21.5522847,18 21,18 L11,18 L11,16 C11,15.4477153 10.5522847,15 10,15 C9.44771525,15 9,15.4477153 9,16 L9,18 L4,18 C3.44771525,18 3,17.5522847 3,17 L3,14.9499909 C4.14112016,14.7183558 5,13.709479 5,12.5 C5,11.290521 4.14112016,10.2816442 3,10.0500091 Z M10,11 C9.44771525,11 9,11.4477153 9,12 L9,13 C9,13.5522847 9.44771525,14 10,14 C10.5522847,14 11,13.5522847 11,13 L11,12 C11,11.4477153 10.5522847,11 10,11 Z"
                                                                    fill="currentColor"
                                                                    transform="translate(12.500000, 12.500000) rotate(-45.000000) translate(-12.500000, -12.500000) " />
                                                                <polygon fill="currentColor" opacity="0.3"
                                                                    points="6 8 6 16 18 16 18 8" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                                <span class="menu-title">Coupon</span>
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name="" id="update_view_coupon"
                                                            onclick="addUserPermission('view_coupon','update')" />
                                                        <span class="form-check-label">View Coupon</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name="" id="update_add_coupon"
                                                            onclick="addUserPermission('add_coupon','update')" />
                                                        <span class="form-check-label">Add Coupon</span>
                                                    </label>
                                                </div>

                                                <br>
                                                
                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name="" id="update_edit_coupon"
                                                            onclick="addUserPermission('edit_coupon','update')" />
                                                        <span class="form-check-label">Edit Coupon</span>
                                                    </label>

                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name="" id="update_delete_coupon"
                                                            onclick="addUserPermission('delete_coupon','update')" />
                                                        <span class="form-check-label">Delete Coupon</span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-gray-800">
                                                <span class="menu-icon">
                                                    <span class="svg-icon svg-icon-primary svg-icon-2">
                                                        <!--begin::Svg Icon -->
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path
                                                                    d="M10,4 L21,4 C21.5522847,4 22,4.44771525 22,5 L22,7 C22,7.55228475 21.5522847,8 21,8 L10,8 C9.44771525,8 9,7.55228475 9,7 L9,5 C9,4.44771525 9.44771525,4 10,4 Z M10,10 L21,10 C21.5522847,10 22,10.4477153 22,11 L22,13 C22,13.5522847 21.5522847,14 21,14 L10,14 C9.44771525,14 9,13.5522847 9,13 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M10,16 L21,16 C21.5522847,16 22,16.4477153 22,17 L22,19 C22,19.5522847 21.5522847,20 21,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,17 C9,16.4477153 9.44771525,16 10,16 Z"
                                                                    fill="currentColor" />
                                                                <rect fill="currentColor" opacity="0.3" x="2" y="4"
                                                                    width="5" height="16" rx="1" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                                <span class="menu-title">Customers</span>
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name="" id="update_view_customer"
                                                            onclick="addUserPermission('view_customer','update')" />
                                                        <span class="form-check-label">View Customer</span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-gray-800">
                                                <span class="menu-link">
                                                    <span class="menu-icon">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="currentColor">
                                                                <path
                                                                    d="M13 5.91517C15.8 6.41517 18 8.81519 18 11.8152C18 12.5152 17.9 13.2152 17.6 13.9152L20.1 15.3152C20.6 15.6152 21.4 15.4152 21.6 14.8152C21.9 13.9152 22.1 12.9152 22.1 11.8152C22.1 7.01519 18.8 3.11521 14.3 2.01521C13.7 1.91521 13.1 2.31521 13.1 3.01521V5.91517H13Z"
                                                                    fill="currentColor" />
                                                                <path opacity="0.3"
                                                                    d="M19.1 17.0152C19.7 17.3152 19.8 18.1152 19.3 18.5152C17.5 20.5152 14.9 21.7152 12 21.7152C9.1 21.7152 6.50001 20.5152 4.70001 18.5152C4.30001 18.0152 4.39999 17.3152 4.89999 17.0152L7.39999 15.6152C8.49999 16.9152 10.2 17.8152 12 17.8152C13.8 17.8152 15.5 17.0152 16.6 15.6152L19.1 17.0152ZM6.39999 13.9151C6.19999 13.2151 6 12.5152 6 11.8152C6 8.81517 8.2 6.41515 11 5.91515V3.01519C11 2.41519 10.4 1.91519 9.79999 2.01519C5.29999 3.01519 2 7.01517 2 11.8152C2 12.8152 2.2 13.8152 2.5 14.8152C2.7 15.4152 3.4 15.7152 4 15.3152L6.39999 13.9151Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <span class="menu-title">Support Center</span>

                                                    </span>
                                                </span>
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">Product Registration</span>
                                                    </label>
                                                </div>
                                                <br>
                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_view_registered_product_list"
                                                            onclick="addUserPermission('view_registered_product_list','update')" />
                                                        <span class="form-check-label">View Registered Product</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">Tickets</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_view_support_ticket"
                                                            onclick="addUserPermission('view_support_ticket','update')" />
                                                        <span class="form-check-label">View Tickets</span>
                                                    </label>

                                                    <label class="form-check form-check-custom form-check-solid ">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_response_support_ticket"
                                                            onclick="addUserPermission('response_support_ticket','update')" />
                                                        <span class="form-check-label">Response Ticket</span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-gray-800">
                                                <span class="menu-link">
                                                    <span class="menu-icon">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2">
                                                            <!--begin::Svg Icon-->
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                                    <path
                                                                        d="M3.52270623,14.028695 C2.82576459,13.3275941 2.82576459,12.19529 3.52270623,11.4941891 L11.6127629,3.54050571 C11.9489429,3.20999263 12.401513,3.0247814 12.8729533,3.0247814 L19.3274172,3.0247814 C20.3201611,3.0247814 21.124939,3.82955935 21.124939,4.82230326 L21.124939,11.2583059 C21.124939,11.7406659 20.9310733,12.2027862 20.5869271,12.5407722 L12.5103155,20.4728108 C12.1731575,20.8103442 11.7156477,21 11.2385688,21 C10.7614899,21 10.3039801,20.8103442 9.9668221,20.4728108 L3.52270623,14.028695 Z M16.9307214,9.01652093 C17.9234653,9.01652093 18.7282432,8.21174298 18.7282432,7.21899907 C18.7282432,6.22625516 17.9234653,5.42147721 16.9307214,5.42147721 C15.9379775,5.42147721 15.1331995,6.22625516 15.1331995,7.21899907 C15.1331995,8.21174298 15.9379775,9.01652093 16.9307214,9.01652093 Z"
                                                                        fill="currentColor" fill-rule="nonzero"
                                                                        opacity="0.9" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    <span class="menu-title">MISC</span>
                                                </span>
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">Post sell serial No</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_view_post_sell_serial_no"
                                                            onclick="addUserPermission('view_post_sell_serial_no','update')" />
                                                        <span class="form-check-label">View</span>
                                                    </label>
                                                </div>

                                                <br>

                                                <div class="d-flex">
                                                    <label class="permission_heading">
                                                        <span class="">System History</span>
                                                    </label>
                                                </div>

                                                <br>
                                                
                                                <div class="d-flex">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="form-check-input update-form-check-input update-permission-check"
                                                            type="checkbox" value="" name=""
                                                            id="update_view_system_history"
                                                            onclick="addUserPermission('view_system_history','update')" />
                                                        <span class="form-check-label">View System History</span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->

                                <!--start::Hidden Input Fields-->
                                <textarea name="permission_scopes" id="update_permission_scopes"
                                    class="form-control form-control-solid" rows="2" cols="5"
                                    style="display:none;"></textarea>

                                <input type="hidden" name="form_type" value="update">
                                <input type="hidden" name="user_id" id="user_id" value="">
                                <input type="hidden" name="user_dependency" id="user_dependency" value="false">
                                <input type="hidden" name="remaining_ens_number_dependency" id="remaining_ens_number_dependency" value="">
                                <input type="hidden" name="remaining_requisition_creation_process_number_dependency" id="remaining_requisition_creation_process_number_dependency" value="">
                                <input type="hidden" name="remaining_requisition_stockin_queuelist_number_dependency" id="remaining_requisition_stockin_queuelist_number_dependency" value="">
                                <!--end::Hidden Input Fields-->

                            </div>
                            <!--end::Table wrapper-->
                        </div>
                        <!--end::Permissions-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="button" class="btn btn-primary me-3" id="permission-update-btn"
                            onclick="submitUserPermissionForm('update')">
                            <span class="indicator-label">Update</span>
                        </button>
                        <button type="button" id="enable_user_btn" class="btn" style="color: #0af344;border: 1px solid #0af344;display:inline-block;"
                            onclick="enableUserLoginAlertModal()">Enable User Login</button>
                        <button type="button" id="disable_user_btn" class="btn" style="color: #f44336;border: 1px solid #f44336;"
                            onclick="disableUserLoginConfirmModal()">Disable User Login</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>

<!--== =================================================================================== ==-->
<!--== ==================  END::Modal - Update User Permission Role   ==================== ==-->
<!--== =================================================================================== ==-->





<!--== =================================================================================== ==-->
<!--== ==========  START::Modal - User Permission Create Success Alert Message   ========= ==-->
<!--== =================================================================================== ==-->
<div class="modal fade " id="user_permission_create_success_alert_modal" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="user_permission_create_success_alert_modalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="subscribe_success_circle">
                    <img style="padding-top: 11px;padding-left: 10px;" src="{{ asset('success_icon.png') }}"
                        alt="success" />
                </div>

                <h1 class="text-center mt-5">Success!</h1>
                <p class="text-center mt-5 lh-lg" id="user_permission_success_modal">New User Permission Successfully
                    Created.</p>
            </div>
            <div class="mx-auto mt-5 mb-5">
                <button type="button" class="btn btn-secondary" style="margin-bottom: 20px;" data-bs-dismiss="modal"
                    onclick="closeSuccessUserPermissionCreateAlert()">OK</button>
            </div>
        </div>
    </div>
</div>
<!--== =================================================================================== ==-->
<!--== ===========  END::Modal - User Permission Create Success Alert Message   ========== ==-->
<!--== =================================================================================== ==-->



<!--== =================================================================================== ==-->
<!--== =========  START::Modal - User Permission Dependency Error Alert Message   ======== ==-->
<!--== =================================================================================== ==-->
<div class="modal fade " id="permission_dependency_error_alert_modal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="permission_dependency_error_alert_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h1 class="text-center error-cross-icon"><i class="fa-solid fa-xmark"
                        style="color: #ff00008a;font-size: 30px;"></i></h1>
                <h1 class="text-center mt-5">Not Allowed!</h1>
                <p class="text-center mt-5 fs-4" id="dependency_error_message"></p>
                <p class="text-center mt-5 fs-4" id="dependency_error_message1"></p>
                <p class="text-center mt-5 fs-4" id="dependency_error_message2"></p>
            </div>
            <div class="mx-auto mt-5 mb-5">
                <button type="button" class="btn btn-secondary" style="margin-bottom: 20px;" data-bs-dismiss="modal"
                    onclick="closePermissionDependencyErrorAlertModal()">Close</button>
            </div>
        </div>
    </div>
</div>
<!--== =================================================================================== ==-->
<!--== ==========  END::Modal - User Permission Dependency Error Alert Message   ========= ==-->
<!--== =================================================================================== ==-->



<!--== =================================================================================== ==-->
<!--== ========  START::Modal - User Remove / Disable Confirmation Alert Message  ======== ==-->
<!--== =================================================================================== ==-->
<div class="modal fade" id="confirmUserDisableRemoveModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="confirmUserDisableRemoveModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md p-5" id="confirmUserDisableRemoveModalBody">
        <div class="modal-content p-5">
            <div class="modal-body">
                <h1 class="text-center alert-question-icon"><i class="fa-solid fa-question"
                    style="color: #f8e00cfa;font-size: 30px;"></i></h1>
                <h1 class="text-center pb-2 mb-5">Are you sure ?</h1>
                    <form id="confirmUserDisableRemoveModalFrm">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3 justify-content-center text-center">
                                <input type="hidden" name="userId" id="userId" value="">
                                <input type="hidden" name="remove_disable" id="remove-disable" value="">
                                <div class="d-flex justify-content-center mt-5">
                                    <button type="button" class="btn btn-secondary me-5"
                                        onclick="dismissconfirmUserDisableRemoveModal()">No</button>
                                    <button type="button" class="btn btn-primary"
                                        onclick="confirmDisableRemove()">Yes</button>
                                </div>

                            </div>
                        </div>
                    </form>
            </div>

        </div>
    </div>
</div>
<!--== =================================================================================== ==-->
<!--== =========  END::Modal - User Remove / Disable Confirmation Alert Message  ========= ==-->
<!--== =================================================================================== ==-->



<!--== =================================================================================== ==-->
<!--== =============  START::Modal - User Enable Confirmation Alert Message  ============= ==-->
<!--== =================================================================================== ==-->
<div class="modal fade" id="confirmUserEnableModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="confirmUserEnableModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md p-5" id="confirmUserEnableModalBody">
        <div class="modal-content p-5">
            <div class="modal-body">
                <h1 class="text-center alert-question-icon"><i class="fa-solid fa-question"
                    style="color: #f8e00cfa;font-size: 30px;"></i></h1>
                <h1 class="text-center pb-2 mb-5">Are you sure ?</h1>
                    <form id="confirmUserEnableModalFrm">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3 justify-content-center text-center">
                                <input type="hidden" name="enable_userId" id="enable_userId" value="">
                                <div class="d-flex justify-content-center mt-5">
                                    <button type="button" class="btn btn-secondary me-5"
                                        onclick="dismissconfirmUserEnableModal()">No</button>
                                    <button type="button" class="btn btn-primary"
                                        onclick="enableUserLogin()">Yes</button>
                                </div>

                            </div>
                        </div>
                    </form>
            </div>

        </div>
    </div>
</div>
<!--== =================================================================================== ==-->
<!--== ==============  END::Modal - User Enable Confirmation Alert Message  ============== ==-->
<!--== =================================================================================== ==-->



<!--== =================================================================================== ==-->
<!--== ==================  START::Modal - User Profile View With Photo  ================== ==-->
<!--== =================================================================================== ==-->
<div class="fade modal" id="viewProfileModal" tabindex="-1" style="padding-right: 17px;" aria-labelledby="viewProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" style="background-color: rgb(237, 235, 255);">
                <div class="row" style="margin: 0px;">
                    <div class="col-md-6 col-sm-12" style="padding: 20px;">
                        <h4 style="text-align: center; color: rgb(0, 51, 102); font-weight: 700; margin-bottom: 30px;"></h4>
                        <div class="mx-3 text-center border border-1 p-3">
                            @if(Auth::user()->avatar)
                                <img class="img-fluid" src="{{ asset(Auth::user()->avatar) }}" alt="" style="width: 170px; height: 150px;">
                            @else
                                <img class="img-fluid" src="https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-business-user-profile-vector-png-image_1541960.jpg" alt="" style="width: 170px; height: 150px;">
                            @endif
                        </div><hr>
                    </div>
                    <div class="col-md-6 col-sm-12" style="background-color: rgb(0, 51, 102); padding: 20px; color: white; text-align: center; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <h6 class="HeaderTwo_employeeTitle__MCXVH">Name<span class="HeaderTwo_employeeInfo__3vNlV"><br></span><hr></h6><br>
                        <h6 class="HeaderTwo_employeeTitle__MCXVH">Designation<span class="HeaderTwo_employeeInfo__3vNlV"><br>   </span><hr></h6>
                        <h6 class="HeaderTwo_employeeTitle__MCXVH">Email<span class="HeaderTwo_employeeInfo__3vNlV"><br></span><hr></h6>
                        <h6 class="HeaderTwo_employeeTitle__MCXVH">Phone<span class="HeaderTwo_employeeInfo__3vNlV"><br></span></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== =================================================================================== ==-->
<!--== ===================  END::Modal - User Profile View With Photo  =================== ==-->
<!--== =================================================================================== ==-->



<!--== =================================================================================== ==-->
<!--== ================================  START::Script  ================================== ==-->
<!--== =================================================================================== ==-->
<script>

    //** Use this function for checked/unchecked all permissiuon **//
    function checkedAllPermission(type) {
        //For All Checked
        if ($('#' + type + '-checked-all-permission').is(":checked")) {
            $('#' + type + '-checked-all-permission').prop('checked', true);
            $('.' + type + '-form-check-input').prop('checked', true);
            $('#' + type + '_permission_scopes').val('*');

        }
        //For All Unchecked
        else {
            //For Update User Permission Modal Form
            if(type == 'update') {
                var user_depend = $('#user_dependency').val();
                var remaining_ens_number_dependency = $('#remaining_ens_number_dependency').val();
                if(user_depend == 'true'){
                    $('#' + type + '-checked-all-permission').prop('checked', true);
                    $("#kt_modal_update_user_role_body").css("opacity", "0");
                    $('#permission_dependency_error_alert_modal').modal('show');
                    if(remaining_ens_number_dependency) {
                        $('#dependency_error_message').html(remaining_ens_number_dependency + ' need to be Confirm/Reject first. After that you can remove this permission.');
                    }
                } else {
                    $('#' + type + '-checked-all-permission').prop('checked', false);
                    $('.' + type + '-form-check-input').prop('checked', false);
                    $('#' + type + '_permission_scopes').val('');
                }
            }
            //For ADD User Permission Modal Form
            else {
                $('#' + type + '-checked-all-permission').prop('checked', false);
                $('.' + type + '-form-check-input').prop('checked', false);
                $('#' + type + '_permission_scopes').val('');
            }
            
        }
    }

    //*** Use this function for Add/Remove User Permission ***//
    function addUserPermission(permissionName, type) {
        // all permission list in a string variable
        var allPermissionList =
            'add_user_permission,edit_user_permission,remove_user_permission,view_product,add_product,edit_product,skd_barcode_generate,entry_skd,view_ens_request,confirm_reject_ens_request,verify_ens_request,view_skd_inventory_history,view_finish_inventory,view_requisition_request,requisition_create,verify_requisition_request,confirm_reject_requisition_request,view_requisition_building_process,assembling_parts,lasering_dcover,dcover_joining_assemble_parts,finalize_product_building,view_requisition_stockin_queuelist,confirm_reject_requisition_stockin,verify_requisition_stockin,view_sales_order,capture_cancel_sales_order,view_sales_invoice,shipment_cancel_sales_invoice,complete_sales_invoice,view_pdf_invoice,view_refund_order,complete_refund_order,view_attribute,add_attribute,edit_attribute,delete_attribute,view_coupon,add_coupon,edit_coupon,delete_coupon,view_customer,view_registered_product_list,view_support_ticket,response_support_ticket,view_post_sell_serial_no,view_system_history';


        //get user dependency boolean value
        var user_dependency = $('#user_dependency').val();

        //get ens request confirmation remaining dependency
        var remaining_ens_number_dependency = $('#remaining_ens_number_dependency').val();

        //get Requisition Creation Process confirmation remaining dependency
        var remaining_requisition_creation_process_number_dependency = $('#remaining_requisition_creation_process_number_dependency').val();

        //get Requisition Stockin Process confirmation remaining dependency
        var remaining_requisition_stockin_queuelist_number_dependency = $('#remaining_requisition_stockin_queuelist_number_dependency').val();

            //For checked a permission
            if ($('#' + type + '_' + permissionName).is(":checked")) {
                //get previous permissions from scopes field
                var prev_permissions = $('#' + type + '_permission_scopes').val();

                //if found any permission from prev permission scopes
                if (prev_permissions) {
                    //get unchecked permissions total number
                    var uncheck_count = $('.' + type + '-permission-check:not(:checked)').length;
                    if (uncheck_count == 0) {
                        //All permission checked
                        $('#' + type + '_permission_scopes').val('*');
                        $('#' + type + '-checked-all-permission').prop('checked', true);
                    }
                    else {
                        //checking permission name is ('SKD Queue List > Verify' as 'verify_ens_request') 
                        if(permissionName == 'verify_ens_request'){
                            //checking permission 'SKD Queue List > Confirm/Reject' is checked
                            if($('#' + type + '_confirm_reject_ens_request').is(":checked")){
                                var new_permissions = prev_permissions + ',' + permissionName;
                                $('#' + type + '_permission_scopes').val(new_permissions);
                            } else {
                                $('#' + type + '_confirm_reject_ens_request').prop('checked', true);
                                var new_permissions = prev_permissions + ',' + permissionName + ',confirm_reject_ens_request';
                                $('#' + type + '_permission_scopes').val(new_permissions);
                            }
                        } 
                        //checking permission name is ('Requisition Creation Process > Verify' as 'verify_requisition_request') 
                        else if(permissionName == 'verify_requisition_request'){
                            //checking permission 'Requisition Creation Process > Confirm/Reject' is checked
                            if($('#' + type + '_confirm_reject_requisition_request').is(":checked")){
                                var new_permissions = prev_permissions + ',' + permissionName;
                                $('#' + type + '_permission_scopes').val(new_permissions);
                            } else {
                                $('#' + type + '_confirm_reject_requisition_request').prop('checked', true);
                                var new_permissions = prev_permissions + ',' + permissionName + ',confirm_reject_requisition_request';
                                $('#' + type + '_permission_scopes').val(new_permissions);
                            }
                        }
                        //checking permission name is ('Requisition Stockin Queue List > Verify' as 'verify_requisition_stockin') 
                        else if(permissionName == 'verify_requisition_stockin'){
                            //checking permission 'Requisition Stockin Queue List > Confirm/Reject' is checked
                            if($('#' + type + '_confirm_reject_requisition_stockin').is(":checked")){
                                var new_permissions = prev_permissions + ',' + permissionName;
                                $('#' + type + '_permission_scopes').val(new_permissions);
                            } else {
                                $('#' + type + '_confirm_reject_requisition_stockin').prop('checked', true);
                                var new_permissions = prev_permissions + ',' + permissionName + ',confirm_reject_requisition_stockin';
                                $('#' + type + '_permission_scopes').val(new_permissions);
                            }
                        }
                        else {
                            var new_permissions = prev_permissions + ',' + permissionName;
                            $('#' + type + '_permission_scopes').val(new_permissions);
                        }
                        
                    }
                }
                //if not found any permission from prev permission scopes
                else {
                    //checking permission name is ('SKD Queue List > Verify' as 'verify_ens_request') 
                    if(permissionName == 'verify_ens_request'){
                        $('#' + type + '_confirm_reject_ens_request').prop('checked', true);
                        var new_permissions = permissionName + ',confirm_reject_ens_request';
                        $('#' + type + '_permission_scopes').val(new_permissions);
                        
                    } 
                    //checking permission name is ('Requisition Creation Process > Verify' as 'verify_requisition_request') 
                    else if(permissionName == 'verify_requisition_request'){
                        $('#' + type + '_confirm_reject_requisition_request').prop('checked', true);
                        var new_permissions = prev_permissions + ',' + permissionName + ',confirm_reject_requisition_request';
                        $('#' + type + '_permission_scopes').val(new_permissions);
                    }
                    //checking permission name is ('Requisition Stockin Queue List > Verify' as 'verify_requisition_stockin') 
                    else if(permissionName == 'verify_requisition_stockin'){
                        $('#' + type + '_confirm_reject_requisition_stockin').prop('checked', true);
                        var new_permissions = prev_permissions + ',' + permissionName + ',confirm_reject_requisition_stockin';
                        $('#' + type + '_permission_scopes').val(new_permissions);
                    }
                    else {
                        $('#' + type + '_permission_scopes').val(permissionName);
                    }
                    
                }
            }
            //For unchecked a permission
            else {   
                //set default removed value is true             
                var removed = true;

                var dependency_err_message = '';

                //checked permission modal type is 'update'
                if(type == 'update') {
                    //checking dependency for 'SKD Materials > SKD Queue List > Confirm/Reject'
                    if(permissionName == 'confirm_reject_ens_request' || permissionName == 'verify_ens_request') {
                        if(remaining_ens_number_dependency == '') {
                            removed = true;
                        } else {
                            removed = false;
                            dependency_err_message = remaining_ens_number_dependency;
                        }
                    } 
                    else if(permissionName == 'confirm_reject_requisition_request' || permissionName == 'verify_requisition_request') {
                        if(remaining_requisition_creation_process_number_dependency == '') {
                            removed = true;
                        } else {
                            removed = false;
                            dependency_err_message = remaining_requisition_creation_process_number_dependency;
                        }
                    } else if(permissionName == 'confirm_reject_requisition_stockin' || permissionName == 'verify_requisition_stockin') {
                        if(remaining_requisition_stockin_queuelist_number_dependency == '') {
                            removed = true;
                        } else {
                            removed = false;
                            dependency_err_message = remaining_requisition_stockin_queuelist_number_dependency;
                        }
                    }
                    else {
                        removed = true;
                    }
                    
                } else {
                }
                
                //if removed variable value is true
                if(removed) {
                    //
                    if ($('#' + type + '-checked-all-permission').is(":checked")) {
                        if(permissionName == 'confirm_reject_ens_request'){
                            $('#' + type + '_verify_ens_request').prop('checked', false); 
                        } else if(permissionName == 'confirm_reject_requisition_request'){
                            $('#' + type + '_verify_requisition_request').prop('checked', false); 
                        } else if(permissionName == 'confirm_reject_requisition_stockin'){
                            $('#' + type + '_verify_requisition_stockin').prop('checked', false); 
                        }
                        var prev_permissions = allPermissionList;
                        $('#' + type + '-checked-all-permission').prop('checked', false);
                    } else {
                        if(permissionName == 'confirm_reject_ens_request'){
                            $('#' + type + '_verify_ens_request').prop('checked', false); 
                        } else if(permissionName == 'confirm_reject_requisition_request'){
                            $('#' + type + '_verify_requisition_request').prop('checked', false); 
                        } else if(permissionName == 'confirm_reject_requisition_stockin'){
                            $('#' + type + '_verify_requisition_stockin').prop('checked', false); 
                        }
                        var prev_permissions = $('#' + type + '_permission_scopes').val();
                    }
                    
                    //ajax request for remove permission from scopefields
                    jQuery.ajax({
                        url: '/remove-permission-from-scopesfield',
                        data: 'prev_permissions=' + prev_permissions + '&new_permission=' + permissionName + 
                            '&_token=' + jQuery("[name='_token']").val(),
                        type: 'post',
                        success: function (result) {
                            if (result.status == 'success') {
                                $('#' + type + '_permission_scopes').val(result.all_permission_arr);
                            }
                        }
                    });
                }
                //if removed variable value is false
                else {
                    $('#' + type + '_'+permissionName).prop('checked', true);
                    $("#kt_modal_update_user_role_body").css("opacity", "0");
                    // user permission dependency error alert modal display
                    $('#permission_dependency_error_alert_modal').modal('show');
                    //Error message for ENS Request Confirm/Reject dependency
                    if(remaining_ens_number_dependency) {
                        $('#dependency_error_message').html(remaining_ens_number_dependency + ' need to be Confirm/Reject first. After that you can remove this permission.');
                    }
                    if(remaining_requisition_creation_process_number_dependency) {
                        $('#dependency_error_message1').html(remaining_requisition_creation_process_number_dependency + ' need to be Confirm/Reject first for start building process. After that you can remove this permission.');
                    }
                    if(remaining_requisition_stockin_queuelist_number_dependency) {
                        $('#dependency_error_message2').html(remaining_requisition_stockin_queuelist_number_dependency + ' need to be Confirm/Reject for stockin product. After that you can remove this permission.');
                    }
                }
                
            }      
    }



    // Use this function for submit Add/Update User Permission Form
    function submitUserPermissionForm(type) {
        //set spinner in a variable
        var spinner =
            '<div class="spinner-border me-2" role="status"><span class="visually-hidden">Loading...</span></div> <span style="font-size: 18px;">Wait...</span>';

        //checking submitted form for added
        if (type == 'add') {
            $("#error_full_name").html('');
            $("#error_designation").html('');
            $("#error_email").html('');
            var data = jQuery('#addUserPermissionForm').serialize();
            $('#permission-submit-btn').html(spinner);
        }
        //checking submitted form for updated
        else if (type == 'update') {
            $("#error_update_full_name").html('');
            $("#error_update_designation").html('');
            $("#error_update_email").html('');
            var data = jQuery('#updateUserPermissionForm').serialize();
            $('#permission-update-btn').html(spinner);
        }

        //ajax request send for add permission form data into database
        jQuery.ajax({
            url: '/add-update-new-user-permission',
            data: data,
            type: 'post',
            success: function (result) {

                //For added user permission data
                if (type == 'add') {
                    $('#permission-submit-btn').html('Submit');
                    if (result.status == "error") {
                        $.each(result.errors, function (i, error) {
                            $("#error_" + i).html(error);
                        });
                    }

                    if (result.status == 'exist') {
                        $("#error_email").html("This email is already registered!");
                    }

                    if (result.status == 'success') {
                        $("#addUserPermissionForm").trigger("reset");
                        $('#kt_modal_add_user_role').modal('hide');
                        $('#user-permission-list').html(result.html);
                        $('#user_permission_create_success_alert_modal').modal('show');
                        $('#user_permission_success_modal').html(
                            'New User Permission Successfully Created.');
                    }
                }

                //For updated user permission data
                if (type == 'update') {
                    $('#permission-update-btn').html('Update');
                    if (result.status == 'success') {
                        $('#kt_modal_update_user_role').modal('hide');
                        $('#user-permission-list').html(result.html);
                        $('#user_permission_create_success_alert_modal').modal('show');
                        $('#user_permission_success_modal').html('User Permission Successfully Updated.');
                    }
                }

            }
        });
    }


    //Use this function for get single users details with permissions
    function getUserPermission(uid) {
        //set user dependency default boolean value
        $('#user_dependency').val(false);
        $('#remaining_ens_number_dependency').val('');
        $('#remaining_requisition_creation_process_number_dependency').val('');
        $('#remaining_requisition_stockin_queuelist_number_dependency').val('');
        //reset update user permission form
        $("#updateUserPermissionForm").trigger("reset");
        //if found any user id
        if (uid) {
            //ajax request send for get user details with permissions
            jQuery.ajax({
                url: '/get-user-permission',
                data: 'user_id=' + uid + '&_token=' + jQuery("[name='_token']").val(),
                type: 'post',
                success: function (result) {

                    //for success response
                    if (result.status == 'success') {
                        //for all permission checked
                        if(result.permissions[0] == '*'){
                            $('#update-checked-all-permission').prop('checked', true);
                            $('.update-form-check-input').prop('checked', true);
                        }
                        else {
                            for (var i = 0; i < result.permissions.length; i++) {
                                $('#update_' + result.permissions[i]).prop('checked', true);
                            }
                        }
                        
                        //updated user dependency boolean value
                        $('#user_dependency').val(result.is_user_dependency);
                        //updated confirmation remaining ens number 
                        $('#remaining_ens_number_dependency').val(result.ens_verify_remaining);
                        //updated confirmation remaining requisition creation request number
                        $('#remaining_requisition_creation_process_number_dependency').val(result.requisition_creation_process_verify_remaining);
                        //updated confirmation remaining requisition stockin request number
                        $('#remaining_requisition_stockin_queuelist_number_dependency').val(result.requisition_stockin_process_verify_remaining);
                        
                        //set user profile detalis value which comes from database
                        $('#update_full_name').val(result.user.name);
                        $('#update_designation').val(result.user.designation);
                        $('#update_email').val(result.user.email);
                        // $('#update_password').val('');
                        $('#user_id').val(uid);

                        //set permission scopes hidden textfield value which comes from database
                        $('#update_permission_scopes').val(result.permissions);
                        //update user permission modal display
                        $('#kt_modal_update_user_role').modal('show');

                        //For deactive user
                        if(result.user.status == 0){
                            $('#enable_user_btn').show();
                            $('#disable_user_btn').hide();
                            $('#permission-update-btn').prop("disabled", true);
                        }

                        //For active user
                        if(result.user.status == 1){
                            $('#enable_user_btn').hide();
                            $('#disable_user_btn').show();
                            $('#permission-update-btn').prop("disabled", false);
                        }
                    }

                }
            });
        } else {
            return false;
        }
    }


    // close User Permission Create Success Modal
    function closeSuccessUserPermissionCreateAlert() {
        $('#user_permission_create_success_alert_modal').modal('hide');
        // window.location.href = window.location.href;
    }


    // close Error Message Modal for permission dependency error
    function closePermissionDependencyErrorAlertModal() {
        $('#permission_dependency_error_alert_modal').modal('hide');
        $("#kt_modal_update_user_role_body").css("opacity", "1");
    }

    //password show hide
    function passShow(type) {
        var pswrd = document.getElementById(type+'password');
        var icon = document.getElementById(type+'pass-show-hide');
        if (pswrd.type === "password") {
            pswrd.type = "text";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        } else {
            pswrd.type = "password";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        }
    }

    //checking any permiussion dependency 
    function checkPermissionAnyDependency(permission,uid) {
        jQuery.ajax({
            url: '/check-permission-any-dependency',
            data: 'permission=' + permission + '&user_id=' + uid + '&_token=' + jQuery("[name='_token']").val(),
            type: 'post',
            success: function (result) {
                $('#user_dependency').val(result.is_dependency);
                $('#remaining_ens_number_dependency').val(result.ens_verify_remaining);
                return;
            }
        });
    }


    //display disable user confirmation modal
    function disableUserLoginConfirmModal(){
        var uid = $('#user_id').val();
        $('#confirmUserDisableRemoveModal').modal('show');
        $('#remove-disable').val('disable');
        $('#userId').val(uid);
        $("#kt_modal_update_user_role_body").css("opacity", "0");
    }

    //display remove user confirmation modal
    function removeUserLoginConfirmModal(u_id){
        $('#confirmUserDisableRemoveModal').modal('show');
        $('#remove-disable').val('remove');
        $('#userId').val(u_id);
    }

    
    // close user confirmation modal for remove/disable
    function dismissconfirmUserDisableRemoveModal() {
        $('#confirmUserDisableRemoveModal').modal('hide');
        $("#kt_modal_update_user_role_body").css("opacity", "1");
    }

    //Use this function for submit user remove/disable request through ajax
    function confirmDisableRemove(){
        var data = $('#confirmUserDisableRemoveModalFrm').serialize();
        jQuery.ajax({
            url: '/user-remove-disable',
            data: data,
            type: 'post',
            success: function (result) {
                if(result.status == 'error'){
                    $('#confirmUserDisableRemoveModal').modal('hide');
                    $("#kt_modal_update_user_role_body").css("opacity", "0");
                    $('#permission_dependency_error_alert_modal').modal('show');
                }

                if(result.status == 'success'){
                    window.location.href = window.location.href;
                }
            }
        });
    }


    //Display user access enable confirmation modal 
    function enableUserLoginAlertModal() {
        var uid = $('#user_id').val();
        $('#confirmUserEnableModal').modal('show');
        $('#enable_userId').val(uid);
        $("#kt_modal_update_user_role_body").css("opacity", "0");
        
    }

    // close user access enable confirmation modal
    function dismissconfirmUserEnableModal(){
        $('#confirmUserEnableModal').modal('hide');
        $("#kt_modal_update_user_role_body").css("opacity", "1");
    }


    //Use this function to send request for enable user access through ajax
    function enableUserLogin() {
        var uid = $('#enable_userId').val();
        jQuery.ajax({
            url: '/user-enable',
            data: 'user_id=' + uid + '&_token=' + jQuery("[name='_token']").val(),
            type: 'post',
            success: function (result) {
                if(result.status == 'success'){
                    window.location.href = window.location.href;
                }
            }
        });
    }

    //Display view user profile modal with photo
    function viewUserProfile(){
        $("#viewProfileModal").modal("show");
    }
    

</script>
<!--== =================================================================================== ==-->
<!--== ================================  END::Script  ================================== ==-->
<!--== =================================================================================== ==-->
@endsection

