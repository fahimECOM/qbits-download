@extends('admin.master')

@section('admin-content')
<style>
    .ck.ck-reset,
    .ck.ck-reset_all,
    .ck.ck-reset_all * {
        background-color: #1E1E2D;
        color: white;
        border-color: #323248 !important;
    }

    .ck.ck-list__item .ck-button .ck-button__label {
        background: #1E1E2D;
    }



    .ck.ck-list__item .ck-button.ck-on {
        background: #1E1E2D;
        color: #e1e1e1;
    }

    .ck.ck-list__item .ck-button:hover:not(.ck-disabled) {
        background: #0d0d0d;
    }

    .ck.ck-list__item .ck-button.ck-on:hover:not(.ck-disabled) {
        background: #1E1E2D !important;
    }

    .ck.ck-list__item .ck-button.ck-on:hover {
        background: #1E1E2D !important;
    }

    .ck.ck-button.ck-on:not(.ck-disabled):hover,
    a.ck.ck-button.ck-on:not(.ck-disabled):hover {
        background: #1E1E2D;
    }

    .ck.ck-dropdown .ck-button.ck-dropdown__button {
        width: 100%;
        background-color: #1E1E2D;
    }

    .ck.ck-dropdown .ck-button.ck-dropdown__button:hover {
        width: 100%;
        background-color: #1E1E2D;
    }

    .ck.ck-editor__main>.ck-editor__editable {
        background-color: #1E1E2D;
    }

    .ck-content {

        border-color: #323248 !important;
    }

    .ck-content.ck-focused {

        border-color: #4c4c68 !important;
    }

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

</style>
<div id="kt_content_container" class="container-xxl">
    <!--begin::Form-->
    <form action="{{ route('product.update',$products->id) }}" method="POST" enctype="multipart/form-data"
        id="choice_form" class="form d-flex flex-column flex-lg-row">
        <!--begin::Aside column-->
        @csrf
        @method('PUT')
        <input type="hidden" name="added_by" value="admin">
        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
            <!--begin::Thumbnail settings-->
            <!-- <div class="form-group col-md-3">
                    						<label for="">Image</label>
                   							 <input type="file" name="" class="form-control form-control-sm" id="image">
                 						</div>
                 						<div class="form-group col-md-3">
                  						  	<img  src="{{url($products->galary_photo)}}" alt="" style="width:70px;height:80px;">
                 						</div> -->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>{{'Thumbnail'}}</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body text-center pt-0">
                    <!--begin::Image input-->
                    <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true"
                        style="">
                        <!--begin::Preview existing avatar-->
                        <div class="image-input-wrapper w-250px h-250px"
                            style="background-image: url(/{{$products->galary_photo}}); border-radius: 0.475rem; background-repeat: no-repeat;background-size: contain;background-position: center;">
                        </div>

                        <!--end::Preview existing avatar-->
                        <!--begin::Label-->
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                            <i class="bi bi-pencil-fill fs-7"></i>
                            <!--begin::Inputs-->
                            <input type="file" name="g_image" accept=".png, .jpg, .jpeg" />
                            <input type="hidden" name="avatar_remove" />
                            <!--end::Inputs-->
                        </label>
                        <!--end::Label-->
                        <!--begin::Cancel-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                        <!--end::Cancel-->
                        <!--begin::Remove-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                        <!--end::Remove-->
                    </div>
                    <!--end::Image input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image
                        files are accepted</div>
                    <!--end::Description-->
                </div>
                <!--end::Card body-->
            </div>
            <div class="card card-flush py-4">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Category</h2>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <select class="form-select" name="category" data-placeholder="Select"
                        data-kt-ecommerce-catalog-add-product="product_option">

                        <option></option>
                        <option value="Laptop" {{ $products->category == 'Laptop' ? 'selected' : '' }}>Laptop</option>
                        <option value="Mini PC" {{ $products->category == 'Mini PC' ? 'selected' : '' }}>Mini PC
                        </option>
                        <option value="Accessory" {{ $products->category == 'Accessory' ? 'selected' : '' }}>Accessory
                        </option>
                    </select>
                </div>
            </div>
            <div class="card card-flush py-4">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Sub Category
                        </h2>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <select class="form-select" name="sub_category" data-placeholder="Select"
                        data-kt-ecommerce-catalog-add-product="product_option">
                        <option></option>
                        <option value="Sigma" {{ $products->sub_category == 'Sigma' ? 'selected' : '' }}>Sigma</option>
                        <option value="Lania" {{ $products->sub_category == 'Lania' ? 'selected' : '' }}>Lania
                        </option>
                        <option value="backpack" {{ $products->sub_category == 'backpack' ? 'selected' : '' }}>Backpack
                        </option>
                        <option value="keyboard-mouse"
                            {{ $products->sub_category == 'keyboard-mouse' ? 'selected' : '' }}>
                            Keyboard & Mouse</option>
                        <option value="ram" {{ $products->sub_category == 'ram' ? 'selected' : '' }}>Ram</option>
                        <option value="ssd" {{ $products->sub_category == 'ssd' ? 'selected' : '' }}>SSD</option>
                        <option value="monitor" {{ $products->sub_category == 'monitor' ? 'selected' : '' }}>Monitor
                        </option>

                    </select>
                </div>
            </div>
            <div class="card card-flush py-4">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Status</h2>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <select class="form-select" name="status" data-placeholder="Select"
                        data-kt-ecommerce-catalog-add-product="product_option">
                        <option></option>
                        <option value="1" {{ $products->status == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $products->status == '0' ? 'selected' : '' }}>In Active</option>
                    </select>
                </div>
            </div>

        </div>
        <!--end::Aside column-->
        <!--begin::Main column-->
        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
            <!--begin:::Tabs-->
            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                <!--begin:::Tab item-->
                <li class="nav-item" style="padding: 0px 10px;">
                    <a class="nav-link text-active-primary ml-2 pb-4 active" data-bs-toggle="tab"
                        href="#kt_ecommerce_add_product_general">General</a>
                </li>
                <!--end:::Tab item-->
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                        href="#kt_ecommerce_add_product_advanced">Advanced</a>
                </li>
                <!--end:::Tab item-->
            </ul>
            <!--end:::Tabs-->
            <!--begin::Tab content-->
            <div class="tab-content">
                <!--begin::Tab pane-->
                <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        <!--begin::General options-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>General</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label">Product Title</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="name" class="form-control mb-2" placeholder="Product title"
                                        onchange="update_sku()" value="{{$products->name}}" required />
                                    <!--end::Input-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">A Product Title is required.</div>
                                    <!--end::Description-->
                                </div>
                                <div class="mb-10 fv-row">
                                    <div class="row mb-3">
                                        <div class="col-md-6 mb-3">
                                            <label class="required form-label">Series Name</label>
                                            <select id="series_name_info"
                                                class="form-select form-select-solid form-select-lg fw-bold"
                                                aria-label="" name="series_name" required data-control="select2"
                                                data-placeholder="Select Series">
                                                <option value="">Select Series</option>
                                                @foreach($product_series as $key=> $series)
                                                <option value="{{$series->series}}" {{ $products->series_name == $series->series ? 'selected' : ''
                                                    }}>{{$series->series}}</option>
                                                @endforeach
                                            </select>
                                            <div class="text-muted fs-7">
                                                A Series Name is required.
                                            </div>
                                            @error('product_catagory')<span
                                                class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="required form-label">Model Name</label>
                                            <select id="model_name"
                                                class="form-select form-select-solid form-select-lg fw-bold"
                                                aria-label="" name="prod_model" required data-control="select2"
                                                data-placeholder="Select Model">
                                                <option value="">Select Model</option>
                                                @foreach($product_models as $key=> $model)
                                                <option value="{{$model->model}}" {{ $products->prod_model == $model->model ? 'selected' : ''
                                                }}>{{$model->model}}</option>
                                                @endforeach
                                            </select>
                                            <div class="text-muted fs-7">
                                                A Model Name is required.
                                            </div>
                                            @error('product_catagory')<span
                                                class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>

                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div>
                                    <!--begin::Label-->
                                    <label class="form-label">Description</label>
                                    <!-- nrs -->
                                    <textarea name="editor" id="editor" cols="30"
                                        rows="10">{{$products->description}}</textarea>
                                    @error('editor')<span class="text-danger">{{ $message }}</span>@enderror
                                    <!-- end nrs -->
                                    <!--end::Label-->
                                    <!--begin::Editor-->
                                    <!-- <div class="">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <textarea rows="7" style="overflow: auto;width: 100%; min-height: 95px;"
                                                    class="form-control"
                                                    name="description">{{$products->description}}</textarea>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!--end::Editor-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Set a description to the product for better visibility.
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::General options-->
                        <!--begin::Media-->
                        <div class="card card-flush py-4">

                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Media</h2>
                                </div>
                            </div>


                            @php
                            $photos = explode('|', $products->photos);
                            // dd($photos);
                            @endphp
                            <div class="card-body text-center pt-0">
                                <!--begin::Image input-->
                                @foreach ($photos as $key=>$photo)
                                <div class="image-input image-input-empty image-input-outline mb-3"
                                    data-kt-image-input="true" style="">
                                    <!--begin::Preview existing avatar-->

                                    <div class="image-input-wrapper w-150px h-150px"
                                        style="background-image: url(/{{$photo}}); background-repeat: no-repeat;background-size: contain;background-position: center;">

                                    </div>

                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="t_image[]" accept=".png, .jpg, .jpeg" multiple />
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
                                @endforeach
                                <!--end::Image input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and
                                    *.jpeg image files are accepted</div>
                                <!--end::Description-->
                            </div>
                            <div class="card-body pt-0">
                                <div class="fv-row mb-2">
                                    <!-- <div class="dropzone" id="kt_ecommerce_add_product_media">
																	<div class="dz-message needsclick">
																		<i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
																		<div class="ms-4">
																			<h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload.</h3>
																			<span class="fs-7 fw-bold text-gray-400">Upload up to 10 files</span>
																		</div>
																	</div> 
																</div>-->
                                </div>
                                <div class="text-muted fs-7">Set the product media gallery.</div>
                            </div>
                        </div>
                        <!--end::Media-->
                        <!--begin::Pricing-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Pricing</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label">Base Price</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" name="base_price" class="form-control mb-2"
                                        placeholder="Product price" value="{{$products->base_price}}" />
                                    <!--end::Input-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Set the product price.</div>
                                    <!--end::Description-->
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <label class="form-label">Fixed Tax Price</label>
                                        <input type="number" name="tax_price" value="{{$products->tax}}"
                                            class="form-control mb-2" placeholder="Tax price" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Fixed Tax Type</label>
                                        <select name="tax_type" aria-label="" required data-control="select2"
                                            data-placeholder="Select  ..."
                                            class="form-select form-select-solid form-select-lg fw-bold coupon_types">
                                            <option>Select Types</option>
                                            <option value="1" {{ $products->tax_type == '1' ? 'selected' : '' }}>
                                                Amount</option>
                                            <option value="0" {{ $products->tax_type == '0' ? 'selected' : '' }}>
                                                Percentage</option>
                                        </select>
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <!-- <div class="fv-row mb-10">

                                    <label class="fs-6 fw-bold mb-2">Tax
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                            title="Select a discount type that will be applied to this product"></i></label>
                                    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9"
                                        data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
                                        <div class="col">
                                            <label
                                                class="btn btn-outline btn-outline-dashed btn-outline-default active d-flex text-start p-6"
                                                data-kt-button="true">
                                                <span
                                                    class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                    <input class="form-check-input" type="radio" name="discount_option"
                                                        value="0" checked="checked" />
                                                </span>
                                                <span class="ms-5">
                                                    <span class="fs-4 fw-bolder text-gray-800 d-block">No Tax</span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="col">

                                            <label
                                                class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6"
                                                data-kt-button="true">

                                                <span
                                                    class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                    <input class="form-check-input" type="radio" name="discount_option"
                                                        value="2" />
                                                </span>

                                                <span class="ms-5">
                                                    <span class="fs-4 fw-bolder text-gray-800 d-block">Percentage
                                                        %</span>
                                                </span>

                                            </label>

                                        </div>


                                        <div class="col">

                                            <label
                                                class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6"
                                                data-kt-button="true">

                                                <span
                                                    class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                    <input class="form-check-input" type="radio" name="discount_option"
                                                        value="3" />
                                                </span>


                                                <span class="ms-5">
                                                    <span class="fs-4 fw-bolder text-gray-800 d-block">Add Tax</span>
                                                </span>

                                            </label>

                                        </div>

                                    </div>

                                </div> -->
                                <div class="d-none mb-10 fv-row" id="kt_ecommerce_add_product_discount_percentage">
                                    <label class="form-label">Set Discount Percentage</label>
                                    <div class="d-flex flex-column text-center mb-5">
                                        <div class="d-flex align-items-start justify-content-center mb-7">
                                            <span class="fw-bolder fs-3x"
                                                id="kt_ecommerce_add_product_discount_label">0</span>
                                            <span class="fw-bolder fs-4 mt-1 ms-2">%</span>
                                        </div>
                                        <div id="kt_ecommerce_add_product_discount_slider" class="noUi-sm"></div>
                                    </div>
                                    <div class="text-muted fs-7">Set a percentage discount to be applied on this
                                        product.</div>
                                </div>
                                <!-- <div class="row">
                                    <div class="d-none mb-10" style="display: inline-flex;"
                                        id="kt_ecommerce_add_product_discount_fixed">
                                        <div class="col-md-8 mx-3">
                                            <label class="form-label">Fixed Tax Price</label>
                                            <input type="number" name="tax_price" value="{{$products->tax}}"
                                                class="form-control mb-2" placeholder="Discounted price" />
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Fixed Tax Type</label>
                                            <select name="tax_type" aria-label="" required data-control="select2"
                                                data-placeholder="Select  ..."
                                                class="form-select form-select-solid form-select-lg fw-bold coupon_types">
                                                <option>Select Types</option>
                                                <option value="1" {{ $products->tax_type == '1' ? 'selected' : '' }}>
                                                    Amount</option>
                                                <option value="0" {{ $products->tax_type == '0' ? 'selected' : '' }}>
                                                    Percentage</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Fixed Discounted Price</label>
                                            <input type="text" name="dicsounted_price" class="form-control mb-2"
                                                placeholder="Discounted price" />
                                        </div>

                                    </div>
                                </div> -->
                                <!-- <div class="d-flex flex-wrap gap-5">

                                    <div class="fv-row w-100 flex-md-root">

                                        <label class="required form-label">Tax Class</label>

                                        <select class="form-select mb-2" name="tax" data-control="select2"
                                            data-hide-search="true" data-placeholder="Select an option">
                                            <option></option>
                                            <option value="0">Tax Free</option>
                                            <option value="1">Taxable Goods</option>
                                            <option value="2">Downloadable Product</option>
                                        </select>

                                        <div class="text-muted fs-7">Set the product tax class.</div>

                                    </div>

                                    <div class="fv-row w-100 flex-md-root">

                                        <label class="form-label">VAT Amount (%)</label>

                                        <input type="text" class="form-control mb-2" value="" />

                                        <div class="text-muted fs-7">Set the product VAT about.</div>

                                    </div>

                                </div> -->

                            </div>
                        </div>

                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Search Option</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-md-3 mb-10 fv-row">
                                        <label class=" form-label">Ram</label>
                                        <select id="ram" class="form-select form-select-solid " name="ram"
                                            data-placeholder="Select Ram" required data-control="select2"
                                            class="form-select form-select-solid form-select-lg fw-bold">
                                            <option value="">Select Ram</option>
                                            @foreach($ram_size as $key=> $size)
                                            <option value="{{$size->skd_size}} GB" {{$products->ram == $size->skd_size.
                                                ' GB' ? 'selected' : '' }}>
                                                {{$size->skd_size}} GB</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-10 fv-row">
                                        <label class=" form-label">Processor</label>
                                        <p id="processor">
                                            <input type="text" name="processor" id="select-barebone-processor"
                                                class="form-control form-control-solid" value="{{$products->processor}}"
                                                readonly>
                                        </p>
                                    </div>
                                    <div class=" col-md-3 mb-10 fv-row">
                                        <label class=" form-label">Screen Size</label>
                                        <select id="screen_size" class="form-select form-select-solid "
                                            name="screen_size" data-placeholder="Select Processor" required
                                            data-control="select2"
                                            class="form-select form-select-solid form-select-lg fw-bold">
                                            <option value="">Select Screen Size</option>
                                            <option value="15.6 Inches"
                                                {{$products->screen_size == '15.6 Inches' ? 'selected' : '' }}>15.6
                                                Inches</option>
                                            <option value="16 Inches"
                                                {{$products->screen_size == '16 Inches' ? 'selected' : '' }}>16
                                                Inches</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-10 fv-row">
                                        <label class=" form-label">Storage</label>
                                        <select id="storage" class="form-select form-select-solid " name="storage"
                                            data-placeholder="Select Processor" required data-control="select2"
                                            class="form-select form-select-solid form-select-lg fw-bold">
                                            <option value="">Select Storage</option>
                                            @foreach($ssd_size as $key=> $size)
                                            <option value="{{$size->skd_size}} {{($size->skd_size)<= 10?'TB':'GB'}}"
                                                {{($products->storage == $size->skd_size.' GB')|| ($products->storage ==$size->skd_size.' TB')? 'selected' : '' }}>
                                                {{$size->skd_size}} {{($size->skd_size)<= 10?'TB':'GB'}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::Pricing-->
                    </div>
                </div>
                <!--end::Tab pane-->
                <!--begin::Tab pane-->
                <div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        <!--begin::Inventory-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Inventory</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label">SKU</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="sku" class="form-control mb-2" placeholder="SKU Number"
                                        value="{{$products->sku}}" />
                                    <!--end::Input-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Enter the product SKU.</div>
                                    <!--end::Description-->
                                </div>
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label">SLUG</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="slug" class="form-control mb-2" placeholder="Slug Number"
                                        value="{{$products->slug}}" />
                                    <!--end::Input-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Enter the product SKU.</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->

                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <!-- <div class="mb-10 fv-row">
																
																<label class="required form-label">Quantity</label>
																<div class="d-flex gap-3">
																	<input type="number" name="min_qty" class="form-control mb-2" placeholder="On shelf" value="{{$products->min_qty}}" />
																	<input type="number" name="max_qty" class="form-control mb-2" placeholder="In warehouse" value="{{$products->max_qty}}" />
																</div> 
																<div class="text-muted fs-7">Enter the product quantity.</div>
																
															</div> -->
                                <!-- <div class="mb-10 fv-row">
                                    <label class="required form-label">Current Stock</label>
                                    <input type="number" name="current_stock" class="form-control mb-2"
                                        placeholder="Current Stock" value="{{$products->current_stock}}" />
                                    <div class="text-muted fs-7">Enter the product SKU.</div>
                                </div> -->

                                <!--end::Input group-->
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::Inventory-->
                        <!--begin::Variations-->

                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Attributes</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0" id="kt_ecommerce_add_product_media">
                                <!--begin::Input group-->
                                <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                                    <!--begin::Label-->
                                    <label class="form-label">Add Product Variations</label>
                                    <!--end::Label-->
                                    <!--begin::Repeater-->
                                    <div id="kt_ecommerce_add_product_options">
                                        <!--begin::Form group-->
                                        <div class="form-group">
                                            <div data-repeater-list="kt_ecommerce_add_product_options"
                                                class="d-flex flex-column gap-3">
                                                @foreach (json_decode($products->attributes) as $key => $choice)
                                                <div data-repeater-item="" class="form-group d-flex flex-wrap gap-5">
                                                    <!--begin::Select2-->
                                                    <div class="w-100 w-md-300px">
                                                        <select class="form-select" name="attribute_name"
                                                            data-placeholder="Select a variation"
                                                            data-kt-ecommerce-catalog-add-product="product_option">
                                                            @foreach($attribute as $key=>$name)
                                                            <option value="{{$name->attribute_name}}" {{ $choice->attribute_name == $name->attribute_name
                                                                ? 'selected' : '' }}>
                                                                {{$name->attribute_name}}</option>
                                                            @endforeach

                                                            <!-- 
                                                                {{ $choice->attribute_name == 'brand' ? 'selected' : '' }}>
                                                                Brand</option>
                                                            <option value="model"
                                                                {{ $choice->attribute_name == 'model' ? 'selected' : '' }}>
                                                                Model</option>
                                                            <option value="series"
                                                                {{ $choice->attribute_name == 'series' ? 'selected' : '' }}>
                                                                Series</option>
                                                            <option value="ram"
                                                                {{ $choice->attribute_name == 'ram' ? 'selected' : '' }}>
                                                                Ram</option>
                                                            <option value="processor"
                                                                {{ $choice->attribute_name == 'processor' ? 'selected' : '' }}>
                                                                Processor</option>
                                                            <option value="storage"
                                                                {{ $choice->attribute_name == 'storage' ? 'selected' : '' }}>
                                                                Storage</option>
                                                            <option value="graphics"
                                                                {{ $choice->attribute_name == 'graphics' ? 'selected' : '' }}>
                                                                Graphics</option>
                                                            <option value="display"
                                                                {{ $choice->attribute_name == 'display' ? 'selected' : '' }}>
                                                                Display</option>
                                                            <option value="battery"
                                                                {{ $choice->attribute_name == 'battery' ? 'selected' : '' }}>
                                                                Battery</option>
                                                            <option value="operating system"
                                                                {{ $choice->attribute_name == 'operating system' ? 'selected' : '' }}>
                                                                Operating System</option>
                                                            <option value="keyboard"
                                                                {{ $choice->attribute_name == 'keyboard' ? 'selected' : '' }}>
                                                                Keyboard</option>
                                                            <option value="fingerprint sensor"
                                                                {{ $choice->attribute_name == 'fingerprint sensor' ? 'selected' : '' }}>
                                                                Fingerprint Sensor</option>
                                                            <option value="networking"
                                                                {{ $choice->attribute_name == 'networking' ? 'selected' : '' }}>
                                                                Networking</option>
                                                            <option value="bluetooth"
                                                                {{ $choice->attribute_name == 'bluetooth' ? 'selected' : '' }}>
                                                                Bluetooth</option>
                                                            <option value="audio"
                                                                {{ $choice->attribute_name == 'audio' ? 'selected' : '' }}>
                                                                Audio</option>
                                                            <option value="webcam"
                                                                {{ $choice->attribute_name == 'webcam' ? 'selected' : '' }}>
                                                                Webcam</option>
                                                            <option value="ports & connectors"
                                                                {{ $choice->attribute_name == 'ports' ? 'selected' : '' }}>
                                                                Ports & Connectors</option>
                                                            <option value="audio"
                                                                {{ $choice->attribute_name == 'audio' ? 'selected' : '' }}>
                                                                Audio</option>
                                                            <option value="color"
                                                                {{ $choice->attribute_name == 'speed' ? 'selected' : '' }}>
                                                                Speed</option>
                                                            <option value="color"
                                                                {{ $choice->attribute_name == 'size' ? 'selected' : '' }}>
                                                                Size</option>
                                                            <option value="color"
                                                                {{ $choice->attribute_name == 'type' ? 'selected' : '' }}>
                                                                Type</option>
                                                            <option value="color"
                                                                {{ $choice->attribute_name == 'resolution' ? 'selected' : '' }}>
                                                                Resolution</option>
                                                            <option value="color"
                                                                {{ $choice->attribute_name == 'capacity' ? 'selected' : '' }}>
                                                                Capacity</option>
                                                            <option value="color"
                                                                {{ $choice->attribute_name == 'interface' ? 'selected' : '' }}>
                                                                Interface</option>
                                                            <option value="color"
                                                                {{ $choice->attribute_name == 'color' ? 'selected' : '' }}>
                                                                Color</option>
                                                            <option value="weight"
                                                                {{ $choice->attribute_name == 'weight' ? 'selected' : '' }}>
                                                                Weight</option>
                                                            <option value="warranty"
                                                                {{ $choice->attribute_name == 'warranty' ? 'selected' : '' }}>
                                                                Warranty</option> -->
                                                        </select>
                                                    </div>
                                                    <!--end::Select2-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control mw-100 w-300px"
                                                        name="attribute_value" value="{{$choice->attribute_value}}"
                                                        placeholder="Variation" />
                                                    <!--end::Input-->
                                                    <button type="button" data-repeater-delete=""
                                                        class="btn btn-sm btn-icon btn-light-danger">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                                        <span class="svg-icon svg-icon-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.5" x="7.05025" y="15.5356" width="12"
                                                                    height="2" rx="1"
                                                                    transform="rotate(-45 7.05025 15.5356)"
                                                                    fill="currentColor" />
                                                                <rect x="8.46447" y="7.05029" width="12" height="2"
                                                                    rx="1" transform="rotate(45 8.46447 7.05029)"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>
                                        <!--end::Form group-->
                                        <!--begin::Form group-->
                                        <div class="form-group mt-5">
                                            <button type="button" data-repeater-create=""
                                                class="btn btn-sm btn-light-primary">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1"
                                                            transform="rotate(-90 11 18)" fill="currentColor" />
                                                        <rect x="6" y="11" width="12" height="2" rx="1"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->Add another variation</button>
                                        </div>
                                        <!--end::Form group-->
                                    </div>
                                    <!--end::Repeater-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::Variations-->

                        <!--begin::Meta options-->
                        <!-- <div class="card card-flush py-4">

                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Meta Options</h2>
                                </div>
                            </div>

                            <div class="card-body pt-0">
                                <div class="mb-10">
                                    <label class="form-label">Meta Tag Title</label>
                                    <input type="text" class="form-control mb-2" value="{{$products->meta_title}}"
                                        name="meta_title" placeholder="Meta tag name" />
                                    <div class="text-muted fs-7">Set a meta tag title. Recommended to be simple and
                                        precise keywords.</div>
                                </div>
                                <div class="mb-10">
                                    <label class="form-label">Meta Tag Description</label>
                                    <div class="">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <textarea class="form-control"
                                                    name="meta_description">{{$products->current_stock}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-muted fs-7">Set a description to the product for better visibility.
                                    </div>
                                </div>
                                <div>

                                    <label class="form-label">Meta Tag Keywords</label>

                                    <input id="kt_ecommerce_add_product_meta_keywords"
                                        name="kt_ecommerce_add_product_meta_keywords" class="form-control mb-2" />

                                    <div class="text-muted fs-7">Set a list of keywords that the product is related to.
                                        Separate the keywords by adding a comma
                                        <code>,</code>between each keyword.</div>

                                </div>

                            </div>
                        </div> -->
                        <!--end::Meta options-->
                    </div>
                </div>
                <!--end::Tab pane-->
            </div>

            <!--end::Tab content-->
            <div class="d-flex justify-content-end">
                <!--begin::Button-->
                <a href="../../demo1/dist/apps/ecommerce/catalog/products.html" id="kt_ecommerce_add_product_cancel"
                    class="btn btn-light me-5">Cancel</a>
                <!--end::Button-->
                <!--begin::Button-->
                <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                    <span type="submit" name="button" value="publish" class="indicator-label">Save Changes</span>
                    <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
                <!--end::Button-->
            </div>
        </div>
        <!--end::Main column-->
    </form>
    <!--end::Form-->
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery.js"></script>
<script>
    //get model
    $(document).ready(function () {
        $('#series_name_info').on("select2:select", function (e) {
            jQuery('#model_name').html('<option value="NULL">Select Model</option>');
            let inid = jQuery(this).val();
            jQuery.ajax({
                url: '/get/model',
                type: 'post',
                data: 'inid=' + inid + '&_token={{csrf_token()}}',
                success: function (result) {
                    jQuery('#model_name').html(result)
                }
            })
        });
    });
    //get processor
    $(document).ready(function () {
        $('#model_name').on("select2:select", function (e) {

            let inid = jQuery(this).val();
            jQuery.ajax({
                url: '/get/product/processor',
                type: 'post',
                data: 'inid=' + inid + '&_token={{csrf_token()}}',
                success: function (result) {
                    jQuery('#processor').html(result)
                }
            })
        });
    });

</script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

</script>

@endsection
