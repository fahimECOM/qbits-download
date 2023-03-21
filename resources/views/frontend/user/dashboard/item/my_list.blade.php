@extends('frontend.user.dashboard.master')

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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">My Products</h1>
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
                    <li class="breadcrumb-item text-muted">eCommerce</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">My Products</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">My list</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                    data-bs-target="#prodRegModal" data-bs-whatever="@mdo">Register My Product</button>
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Navbar-->
            @foreach($myproduct as $key=>$product)

            <div class="card mb-5 mb-xl-10">
                <div class="card-body pt-9 pb-0">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                        <!--begin: Pic-->
                        <div class="row">
                            <div class="col-md-1 me-7 mb-4">
                                <div class="symbol symbol-50px symbol-lg-70px symbol-fixed position-relative">
                                    <img src="{{(!empty($product['productname']['galary_photo']))?url($product['productname']['galary_photo']):url('/avatar.png')}}"
                                        alt="image" />
                                </div>
                            </div>
                            <!--end::Pic-->
                            <!--begin::Info-->
                            <div class="col-md-5 me-7 flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <!--begin::User-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Name-->
                                        <div class="d-flex align-items-center mb-2">
                                            <a class="text-gray-900  fs-4 fw-bolder me-1">
                                                Peoduct Name </a>
                                        </div>
                                        <!--end::Name-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-wrap  fs-6 mb-4 pe-2">
                                            <a class="text-gray-900  fs-6  me-1">
                                                {{ $product['productname']['name']}} </a>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->

                                </div>
                                <!--end::Title-->
                            </div>
                            <div class="col-md-2 flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <!--begin::User-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Name-->
                                        <div class="d-flex align-items-center mb-2">
                                            <a class="text-gray-900  fs-4 fw-bolder me-1">
                                                Peoduct Model </a>
                                        </div>
                                        <!--end::Name-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-wrap  fs-6 mb-4 pe-2">
                                            <a class="text-gray-900  fs-6  me-1">
                                                {{ $product['productname']['series_name']}} </a>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->

                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Info-->
                            <div class="col-md-2 flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <!--begin::User-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Name-->
                                        <div class="d-flex align-items-center mb-2">
                                            <a class="text-gray-900  fs-4 fw-bolder me-1">
                                                Serial Number </a>
                                        </div>
                                        <!--end::Name-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-wrap  fs-6 mb-4 pe-2">
                                            <a class="text-gray-900  fs-6  me-1">
                                                {{ $product->serial_no}} </a>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->

                                </div>
                                <!--end::Title-->
                            </div>
                            <!-- <div class="col-md-1 flex-grow-1">
                                
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                
                                    <div class="d-flex flex-column">
                                
                                        <div class="d-flex align-items-center mb-2">
                                            <a class="text-gray-900  fs-4 fw-bolder me-1">
                                            </a>
                                        </div>
 
                                        <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                            <a class="text-gray-900  fs-6 fw-bolder me-1">
                                                Create Ticket </a>
                                        </div>
                               
                                    </div>
                              

                                </div>
                       
                            </div> -->
                        </div>
                        <!--end::Info-->
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!--end::Container-->
    </div>

    <!-- <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                        transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <input type="text" data-kt-customer-table-filter="search"
                                class="form-control form-control-solid w-250px ps-15" placeholder="Search Customers" />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end align-items-center d-none"
                            data-kt-customer-table-toolbar="selected">
                            <div class="fw-bolder me-5">
                                <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
                            <button type="button" class="btn btn-danger"
                                data-kt-customer-table-select="delete_selected">Delete Selected</button>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                </th>
                                <th class="min-w-125px"></th>
                                <th class="min-w-125px"></th>
                                <th class="min-w-125px"></th>
                                <th class="min-w-125px"> </th>
                                <th class="min-w-125px"> </th>
                                <th class="text-end min-w-70px"></th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach($myproduct as $key=>$product)

                            <tr>
                                <td>
                                </td>
                                <td>
                                    <img src="/{{$product['productname']['galary_photo']}}" alt="" width="100"
                                        height="100">
                                    <a href=""
                                        class="text-gray-800 text-hover-primary mb-1">{{$product->model_name}}</a>
                                </td>
                                <td>
                                    <a href="#"
                                        class="text-gray-600 text-hover-primary mb-1">{{$product['productname']['name']}}</a>
                                </td>
                                <td>
                                    <div class="badge badge-light-danger">Locked</div>
                                </td>
                                <td>164.68.28.242</td>
                                <td>25 Jul 2022, 8:43 pm</td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <span class="svg-icon svg-icon-5 m-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span></a>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <a href="../../demo1/dist/apps/customers/view.html"
                                                class="menu-link px-3">View</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-customer-table-filter="delete_row">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
    </div> -->
</div>
<!--end::Content-->
<div class="modal fade" id="prodRegModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register My Product</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">

                <form id="productRegForm">
                    @csrf
                    <input type="text" class="form-control" hidden value="{{Auth::user()->name}}" name="username">
                    <input type="text" class="form-control" hidden value="{{Auth::user()->email}}" name="email">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Model Name</label>
                        <select id="model_name" name="model_name" aria-label="" required data-control="select2"
                            data-placeholder="Select Model Name ..."
                            class="form-select form-select-solid form-select-lg fw-bold">
                            <option value="">Select Products</option>
                            @foreach($model_name as $key=>$name)

                            <option value="{{$name->series_name}}">{{$name->series_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Serial No</label>
                        <input type="text" name="serial_no" id="serial_no" class="form-control form-control-solid">
                    </div>
                    <div id="err_serial" class="text-danger mb-2"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="prodRegBtn()">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function prodRegBtn() {
        document.getElementById("err_serial").style.display = "none";
        var data = jQuery('#productRegForm').serialize();
        jQuery.ajax({
            url: '/prod_reg_submit',
            data: data,
            type: 'post',
            success: function (result) {

                if (result.status == 'success') {
                    document.getElementById("err_serial").style.display = "none";
                    $("#err_serial").html('');
                    window.location.href = "{{route('view')}}";
                } else if (result.status == 'error') {
                    document.getElementById("err_serial").style.display = "block";
                    $("#err_serial").html(result.msg);
                    // alert(result.msg);
                    // swal("Oops...","This serial number already exist.","error");
                }
            }
        });
    }

</script>
@endsection
