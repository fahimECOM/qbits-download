@extends('admin.master')

@section('admin-content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Hero card-->
        <div class="card mb-12">
            <!--begin::Hero body-->
            <div class="card-body flex-column p-5">
                <!--begin::Hero content-->

                <!--end::Hero content-->
                <!--begin::Hero nav-->
                <div class="card-rounded bg-light d-flex flex-stack flex-wrap p-5">
                    <!--begin::Nav-->
                    <ul class="nav flex-wrap border-transparent fw-bolder">
                        <!--begin::Nav item-->
                        <li class="nav-item my-1">
                            <a class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase"
                                href="{{route ('admin.support.center')}}">Overview</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item my-1">
                            <a class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase active"
                                href="{{route ('admin.support.ticket.list')}}">tickets</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item my-1">
                            <a class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase"
                                href="{{route('admin.support.faq')}}">FAQ</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item my-1">
                            <a class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase "
                                href="{{route('admin.support.licenses')}}">Licenses</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item my-1">
                            <a class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase"
                                href="{{route('admin.support.contact')}}">Contact US</a>
                        </li>
                        <!--end::Nav item-->
                    </ul>
                    <!--end::Nav-->
                    <!--begin::Action-->
                    <!-- <a href="{{route('admin.support.ticket.create')}}"  class="btn btn-primary fw-bolder fs-8 fs-lg-base">Create Ticket</a> -->
                    <!--end::Action-->
                </div>
                <!--end::Hero nav-->
            </div>
            <!--end::Hero body-->
        </div>
        <!--end::Hero card-->
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-xl-row p-7">
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid me-xl-15 mb-20 mb-xl-0">
                        <!--begin::Tickets-->
                        <div class="mb-0">
                            <!--begin::Search form-->
                            <!--end::Heading-->
                            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                <!--begin:Form-->

                                <form action="{{route('admin.send.email')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if(Session::has('error'))
                                    <div class="alert alert-danger">
                                        {{Session::get('error')}}
                                    </div>
                                    @endif
                                    @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{Session::get('success')}}
                                    </div>
                                    @endif
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Name</label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Your Name" name="name" value="{{Auth::user()->name}}"
                                                readonly />
                                            @error('name')<span class="text-danger">{{$message}}</span>@enderror
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Your Name" name="user_id" value="{{Auth::user()->id}}"
                                                hidden />
                                        </div>
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Email</label>
                                            @error('email')<span class="text-danger">{{$message}}</span>@enderror
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Your Email" value="{{Auth::user()->email}}" readonly
                                                name="email" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Subject</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                title="Specify a subject for your issue"></i>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Enter your ticket subject" name="subject" autocomplete='off' />
                                        @error('subject')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Product Catagory</label>
                                            <select class="form-select form-select-solid" data-control="select2"
                                                data-hide-search="true" data-placeholder="Select a product"
                                                name="product_catagory">
                                                <option value="">Select a product...</option>
                                                <option value="LAPTOP">LAPTOP</option>
                                                <option value="ACCESSORIES">ACCESSORIES</option>
                                                <option value="SOFTWARE">SOFTWARE</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Product Name</label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Product Name" name="product_name" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Status</label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Product Name" value="Open" name="status" readonly />
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            @php
                                            $date = date('d M Y');
                                            @endphp
                                            <label class="required fs-6 fw-bold mb-2">Date</label>
                                            <!--begin::Input-->
                                            <div class="position-relative d-flex align-items-center">
                                                <!--begin::Icon-->
                                                <div class="symbol symbol-20px me-4 position-absolute ms-4">
                                                </div>
                                                <!--end::Icon-->
                                                <!--begin::Datepicker-->
                                                <input class="form-control form-control-solid ps-12" value="{{$date}}"
                                                    placeholder="Date" name="date" readonly />
                                                <!--end::Datepicker-->
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->

                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <label class="fs-6 fw-bold mb-2">Description</label>
                                        <textarea class="form-control form-control-solid" rows="4" name="message"
                                            placeholder="Type your ticket description"></textarea>
                                        @error('subject')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <label class="fs-6 fw-bold mb-2">Photos</label>
                                        <!--begin::Media-->
                                        <div class="card card-flush py-4">
                                            <div class="card-body text-center pt-0">
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-empty image-input-outline mb-3"
                                                    data-kt-image-input="true"
                                                    style="background-image: url(assets/media/svg/files/blank-image.svg)">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-150px h-150px"></div>
                                                    <!--end::Preview existing avatar-->
                                                    <!--begin::Label-->
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Change avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="t_image[]" accept=".png, .jpg, .jpeg"
                                                            multiple />
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
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">Set the product thumbnail image. Only
                                                    *.png, *.jpg and *.jpeg image files are accepted</div>
                                                <!--end::Description-->
                                            </div>

                                        </div>
                                        <!--end::Media-->
                                    </div>
                                    <div class="text-center">
                                        <button type="reset" id="kt_modal_new_ticket_cancel"
                                            class="btn btn-light me-3">Cancel</button>
                                        <button type="submit" id="kt_modal_new_ticket_submit" class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                </form>
                                <!--end:Form-->
                            </div>
                        </div>
                        <!--end::Tickets-->
                    </div>
                    <!--end::Content-->

                </div>
                <!--end::Layout-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
        <!--begin::Modal - Support Center - Create Ticket-->
        <div class="modal fade" id="kt_modal_new_ticket" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-750px">
                <!--begin::Modal content-->
                <div class="modal-content rounded">
                    <!--begin::Modal header-->
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                        transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--begin::Modal header-->

                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Support Center - Create Ticket-->
    </div>
    <!--end::Container-->
</div>

@endsection