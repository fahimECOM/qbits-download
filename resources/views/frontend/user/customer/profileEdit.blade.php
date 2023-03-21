@extends('frontend.user.dashboard.master')

@section('admin-content')

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
            <!--end::Page title-->
            <!--begin::Actions-->

            <!--end::Actions-->
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
                                        <!-- <a href="#">
                                              
                                                <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                        <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF" />
                                                        <path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white" />
                                                    </svg>
                                                </span>
                                              
                                            </a>
                                            <a href="#" class="btn btn-sm btn-light-success fw-bolder ms-2 fs-8 py-1 px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade to Pro</a> -->
                                    </div>
                                    <!--end::Name-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                        <!-- <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                         
                                            <span class="svg-icon svg-icon-4 me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black" />
                                                    <path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black" />
                                                </svg>
                                            </span>
                                           {{ Auth::user()->user_type }}</a> -->
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
                                href="{{route('user-profile')}}">Overview</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5 active"
                                href="{{route('user-profile-edit')}}">Settings</a>
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
                    <form method="post" action="{{route('customer.profile.update')}}" id=""
                        enctype="multipart/form-data">
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
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-6 fv-row">
                                            <input type="text" name="first_name"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="First name" value="{{ Auth::user()->name }}" />
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-6 fv-row">
                                            <input type="text" name="last_name"
                                                class="form-control form-control-lg form-control-solid"
                                                placeholder="Last name" value="{{ Auth::user()->lname }}" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
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





                        </div>
                        <!--end::Card body-->
                        <!--begin::Actions-->
                        <!--begin::Sign-in Method-->
                        <div class="card ">
                            <!--begin::Card header-->
                            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                                data-bs-target="#kt_account_signin_method">
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">Address</h3>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Content-->
                            <div id="kt_account_settings_signin_method" class="collapse show">
                                <!--begin::Card body-->
                                <div class="card-body border-top p-9">


                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Address</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <input type="text" name="address"
                                                class="form-control form-control-lg form-control-solid"
                                                placeholder="Street Address" value="{{ $editData[0]->address }}" />
                                        </div>
                                    </div>


                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                                            <span class="">Division</span>
                                            <i class="fas  ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Division of Bangladesh"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row myModal">
                                            <select name="division" id="division" aria-label="Select Division"
                                                data-control="select2" data-placeholder="Select Division"
                                                class="form-select form-select-solid form-select-lg fw-bold division2">
                                                <option value="">Select Division</option>

                                                <option value="Barishal"
                                                    {{ $editData[0]->division == 'Barishal' ? 'selected' : '' }}>
                                                    Barishal</option>
                                                <option value="Chattogram"
                                                    {{ $editData[0]->division == 'Chattogram' ? 'selected' : '' }}>
                                                    Chattogram</option>
                                                <option value="Dhaka"
                                                    {{ $editData[0]->division == 'Dhaka' ? 'selected' : '' }}>
                                                    Dhaka</option>
                                                <option value="Khulna"
                                                    {{ $editData[0]->division == 'Khulna' ? 'selected' : '' }}>
                                                    Khulna</option>
                                                <option value="Mymensingh"
                                                    {{ $editData[0]->division == 'Mymensingh' ? 'selected' : '' }}>
                                                    Mymensingh</option>
                                                <option value="Rajshahi"
                                                    {{ $editData[0]->division == 'Rajshahi' ? 'selected' : '' }}>
                                                    Rajshahi</option>
                                                <option value="Rangpur"
                                                    {{ $editData[0]->division == 'Rangpur' ? 'selected' : '' }}>
                                                    Rangpur</option>
                                                <option value="Sylhet"
                                                    {{ $editData[0]->division == 'Sylhet' ? 'selected' : '' }}>
                                                    Sylhet</option>

                                            </select>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                                            <span class="">District</span>
                                            <i class="fas  ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Districrt of Bangladesh"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <?php 
                                            $allDistrict = App\Models\AddressDetail::getAllDistrict($editData[0]->division);
                                        ?>
                                        <div class="col-lg-8 fv-row">
                                            <select name="district" id="district" aria-label="Select District"
                                                data-control="select2" data-placeholder="Select District"
                                                class="form-select form-select-solid form-select-lg fw-bold">
                                                <?php if(count($allDistrict) > 0) {
                                                    for($i=0; $i < count($allDistrict); $i++){
                                                ?>
                                                <option value="{{ $allDistrict[$i]->district}}"
                                                    {{ $editData[0]->district == $allDistrict[$i]->district ? 'selected' : '' }}>
                                                    {{ $allDistrict[$i]->district}}</option>
                                                <?php } } else {?>
                                                <option value="">Select District</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                                            <span class="">Thana</span>
                                            <i class="fas  ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Thana of Bangladesh"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <?php 
                                            $allThana = App\Models\AddressDetail::getAllThana($editData[0]->district);
                                        ?>
                                        <div class="col-lg-8 fv-row">
                                            <select name="thana" id="thana" aria-label="Select Thana"
                                                data-control="select2" data-placeholder="Select Thana"
                                                class="form-select form-select-solid form-select-lg fw-bold">
                                                <?php if(count($allThana) > 0) {
                                                    for($i=0; $i < count($allThana); $i++){
                                                ?>
                                                <option value="{{ $allThana[$i]->thana}}"
                                                    {{ $editData[0]->thana == $allThana[$i]->thana ? 'selected' : '' }}>
                                                    {{ $allThana[$i]->thana}}</option>
                                                <?php } } else {?>
                                                <option value="">Select Thana</option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->

                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Postal Code</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="text" name="postal_code"
                                                class="form-control form-control-lg form-control-solid"
                                                placeholder="Postal Code" value="{{ Auth::user()->postal_code }}" />
                                        </div>
                                    </div>

                                    <!-- <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Postal / Zip Code</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="text" name="postal_code"
                                                class="form-control form-control-lg form-control-solid"
                                                placeholder="Postal / Zip Code"
                                                value="{{ Auth::user()->postal_code }}" />
                                        </div>
                                    </div> -->

                                    <!--begin::Input group-->
                                    <!-- <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                                            <span class="">Country</span>
                                            <i class="fas  ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Country of origination"></i>
                                        </label>
                                        
                                        <div class="col-lg-8 fv-row">
                                            <select name="country" aria-label="Select a Country" data-control="select2"
                                                data-placeholder="Select a country..."
                                                class="form-select form-select-solid form-select-lg fw-bold">
                                                <option value="">Select a Country...</option>

                                                <option value="Bangladesh"
                                                    {{ $editData[0]->country == 'Bangladesh' ? 'selected' : '' }}>
                                                    Bangladesh</option>

                                            </select>
                                        </div>
                                    </div> -->
                                    <!--end::Input group-->

                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Sign-in Method-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <!-- <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button> -->
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>

                        <!--end::Actions-->
                    </form>
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

</script>

<form id="addressFrm">
    @csrf
    <input type="hidden" id="addressName" name="addressName" value="">
    <input type="hidden" id="addressType" name="addressType" value="">
</form>

@endsection