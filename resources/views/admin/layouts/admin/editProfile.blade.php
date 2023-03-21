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

    .pass-show-hide {
        position: absolute;
        font-size: 15px;
        color: grey;
        margin-left: 720px;
        margin-top: -30px;
        cursor: pointer;
    }

</style>

{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Account Settings</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
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
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Account</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Settings</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Navbar-->
            <div class="card mb-5 mb-xl-10">
                <div class="card-body pt-9 pb-0">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                        <!--begin: Pic-->
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                <img src="{{(!empty($editData[0]->avatar))?url($editData[0]->avatar):url('/frontend/assets/logo/qb-white.png')}}"
                                    alt="image" />
                                <!-- <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div> -->
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Info-->
                        <div class="flex-grow-1">
                            <!--begin::Title-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <!--begin::User-->
                                <div class="d-flex flex-column">
                                    <!--begin::Name-->
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#"
                                            class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ Auth::user()->name }}</a>

                                    </div>
                                    <!--end::Name-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                        <a href="#"
                                            class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                            <span class="svg-icon svg-icon-4 me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3"
                                                        d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                        fill="black" />
                                                    <path
                                                        d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->{{ Auth::user()->email }}</a>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User-->

                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Details-->
                    <!--begin::Navs-->
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5 "
                                href="{{route('admin.profile')}}">Overview</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5 active"
                                href="{{route('admin.profile.edit')}}">Settings</a>
                        </li>
                        <!--end::Nav item-->


                        <!--end::Nav item-->
                    </ul>
                    <!--begin::Navs-->
                </div>
            </div>
            <!--end::Navbar-->
            <!--begin::Basic info-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_profile_details" aria-expanded="true"
                    aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Profile Details</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form method="post" action="{{route('admin.profile.update')}}" id="" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Avatar</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: {{ Auth::user()->avatar }}">

                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-125px h-125px"
                                            style="background-image: url(/{{ Auth::user()->avatar }})"></div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change avatar">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Cancel-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::Cancel-->
                                        <!--begin::Remove-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remove avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::Remove-->
                                    </div>
                                    <!--end::Image input-->
                                    <!--begin::Hint-->
                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                    <!--end::Hint-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label  fw-bold fs-6">Full Name</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <input type="text" name="full_name"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="First name" value="{{ Auth::user()->name }}" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="">Contact Phone</span>
                                    <i class="fas  ms-1 fs-7" data-bs-toggle="tooltip"
                                        title="Phone number must be active"></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="tel" name="phone"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="Phone number" value="{{ Auth::user()->phone }}" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->



                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <!-- <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button> -->
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>

                            <!--end::Actions-->
                    </form>

                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <!--begin::Sign-in Method-->
                <div class="card ">

                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_signin_method">
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Password</h3>
                        </div>
                    </div>
                    <form id="updateAdminPasswordFrm">
                        @csrf
                        <div id="kt_account_settings_signin_method" class="collapse show">
                            <div class="card-body border-top p-9">
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Current Password</label>

                                    <div class="col-lg-8 fv-row">
                                        <input type="password" name="check_current_password" id="check_current_password"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Current Password" value="" />
                                        <i class="fa fa-light fa-eye-slash pass-show-hide" id="current_pass_show_hide"
                                            onclick="passShowHide('current')"></i>
                                        <p class="text-danger mt-3" id="error_check_current_password"></p>
                                    </div>
                                </div>


                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">New Password</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="password" name="new_password" id="new_password"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="New Password" value="" />
                                        <i class="fa fa-light fa-eye-slash pass-show-hide" id="new_pass_show_hide"
                                            onclick="passShowHide('new')"></i>
                                        <p class="text-danger mt-3" id="error_new_password"></p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <!-- <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button> -->
                            <button type="button" class="btn btn-primary" onclick="updateAdminPassword()"
                                id="update_pass_btn">Update Password</button>
                        </div>

                    </form>
                </div>
                <!--end::Sign-in Method-->

                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Basic info-->
        <!--end::Modals-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->
</div>
<!--end::Content-->


<!-- Password Change Success Modal-->
<div class="modal fade " id="admin_password_change_success_alert_modal" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="admin_password_change_success_alert_modalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="subscribe_success_circle">
                    <img style="padding-top: 11px;padding-left: 10px;" src="{{ asset('success_icon.png') }}"
                        alt="success" />
                </div>

                <h1 class="text-center mt-5">Success!</h1>
                <p class="text-center mt-5 lh-lg" id="user_permission_success_modal">You Password Successfully Updated.
                </p>
            </div>
            <div class="mx-auto mt-5 mb-5">
                <button type="button" class="btn btn-secondary" style="margin-bottom: 20px;"
                    onclick="closeAdminPasswordChangeSuccessModal()">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    //User Dashboard -> Account Settings -> Address
    $(document).ready(function () {

        $('#division').change(function () {
            var div = $(this).val();
            if (div == '') {
                $('#district').html('<option value="">Select District</option>');
                $('#thana').html('<option value="">Select Thana</option>');
            } else {
                $('#district').html('<option value="">Select District</option>');
                $('#thana').html('<option value="">Select Thana</option>');
                document.getElementById('addressName').value = div;
                document.getElementById('addressType').value = 'division';
                var data = $("#addressFrm").serialize();
                jQuery.ajax({
                    type: 'post',
                    url: '/get_address_data',
                    data: data,
                    success: function (result) {
                        $('#district').append(result);
                    }
                });
            }
        });

        $('#district').change(function () {
            var dist = $(this).val();
            if (dist == '') {
                $('#thana').html('<option value="">Select Thana</option>');
            } else {
                $('#thana').html('<option value="">Select Thana</option>');
                document.getElementById('addressName').value = dist;
                document.getElementById('addressType').value = 'district';
                var data = $("#addressFrm").serialize();
                jQuery.ajax({
                    type: 'post',
                    url: '/get_address_data',
                    data: data,
                    success: function (result) {
                        $('#thana').append(result);
                    }
                });
            }
        });
    });

    function updateAdminPassword() {
        $('#error_check_current_password').html('');
        $('#error_new_password').html('');
        var spinner =
            '<div class="spinner-border me-2" role="status"><span class="visually-hidden">Loading...</span></div> <span style="font-size: 18px;">Wait...</span>';
        var data = $("#updateAdminPasswordFrm").serialize();
        $('#update_pass_btn').html(spinner);
        jQuery.ajax({
            type: 'post',
            url: '/admin/password/update',
            data: data,
            success: function (result) {
                $('#update_pass_btn').html('Update Password');
                if (result.status == "error") {
                    $.each(result.errors, function (i, error) {
                        $("#error_" + i).html(error);
                    });
                }

                if (result.status == "wrong_password") {
                    $("#error_check_current_password").html('Your current password is not valid!');
                    return;
                }

                if (result.status == "success") {
                    $('#admin_password_change_success_alert_modal').modal('show');
                }
            }
        });
    }

    //password show hide
    function passShowHide(type) {

        if (type == 'current') {
            var pswrd = document.getElementById('check_current_password');
        } else if (type == 'new') {
            var pswrd = document.getElementById('new_password');
        }
        var icon = document.getElementById(type + '_pass_show_hide');

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

    function closeAdminPasswordChangeSuccessModal() {
        $('#check_current_password').val('');
        $('#new_password').val('');
        $('#admin_password_change_success_alert_modal').modal('hide');
    }

</script>

<form id="addressFrm">
    @csrf
    <input type="hidden" id="addressName" name="addressName" value="">
    <input type="hidden" id="addressType" name="addressType" value="">
</form>

@endsection
