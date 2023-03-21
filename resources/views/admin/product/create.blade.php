@extends('admin.master') @section('admin-content')



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
<!--begin::Container-->
<div id="kt_content_container" class="container-xxl">
    <!--begin::Form-->
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" id="choice_form"
        class="form d-flex flex-column flex-lg-row">
        <!--begin::Aside column-->
        @csrf
        <input type="hidden" name="added_by" value="admin" />
        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
            <!--begin::Thumbnail settings-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>{{ "Thumbnail" }}</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body text-center pt-0">
                    <!--begin::Image input-->
                    <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true"
                        style="
                            background-image: url(assets/media/svg/files/blank-image.svg);
                            background-repeat: no-repeat;
                            background-size: contain;
                            background-position: center;
                        ">
                        <!--begin::Preview existing avatar-->
                        <div class="image-input-wrapper w-150px h-150px" style="
                        background-image: url(assets/media/svg/files/blank-image.svg);
                        background-repeat: no-repeat;
                        background-size: contain;
                        background-position: center;
                    "></div>
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
                        @error('g_image')<span class="text-danger">{{
                            $message
                        }}</span>@enderror
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
                    <div class="text-muted fs-7">
                        Set the product thumbnail image. Only *.png, *.jpg and
                        *.jpeg image files are accepted
                    </div>
                    <!--end::Description-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Thumbnail settings-->

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
                        <option value="Laptop" selected="selected">
                            Laptop
                        </option>
                        <option value="Mini PC">Mini PC</option>
                        <option value="Accessory">Accessory</option>
                    </select>
                </div>
            </div>
            <div class="card card-flush py-4">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Sub Category</h2>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <select class="form-select" name="sub_category" data-placeholder="Select"
                        data-kt-ecommerce-catalog-add-product="product_option">
                        <option></option>
                        <option value="Sigma" selected="selected">Sigma</option>
                        <option value="Lania">Lania</option>
                        <option value="backpack">Backpack</option>
                        <option value="keyboard-mouse">Keyboard & Mouse</option>
                        <option value="ram">Ram</option>
                        <option value="ssd">SSD</option>
                        <option value="monitor">Monitor</option>

                        <!-- <option value="Caliph">Caliph</option> -->
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
                        <option value="1" selected="selected">Active</option>
                        <option value="0">In Active</option>
                    </select>
                </div>
            </div>
            <!--end::Status-->
            <!--begin::Category & tags-->
            <!-- <div class="card card-flush py-4">
											
											<div class="card-header">
											
												<div class="card-title">
													<h2>Product Details</h2>
												</div>
											
											</div>
										
											<div class="card-body pt-0">
												
												<label class="form-label">Categories</label>
												
												<select class="form-select mb-2" name="category_id" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
													<option></option>
													<option value="Computers">Computers</option>
													<option value="Watches">Watches</option>
													<option value="Headphones">Headphones</option>
													<option value="Footwear">Footwear</option>
													<option value="Cameras">Cameras</option>
													<option value="Shirts">Shirts</option>
													<option value="Household">Household</option>
													<option value="Handbags">Handbags</option>
													<option value="Wines">Wines</option>
													<option value="Sandals">Sandals</option>
												</select>
										
												<div class="text-muted fs-7 mb-7">Add product to a category.</div>
											
												<a href="../../demo1/dist/apps/ecommerce/catalog/add-category.html" class="btn btn-light-primary btn-sm mb-10">
											
												<span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
														<rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor" />
													</svg>
												</span>
												Create new category</a>
						
												<label class="form-label d-block">Tags</label>
											
												<input id="kt_ecommerce_add_product_tags" name="kt_ecommerce_add_product_tags" class="form-control mb-2" value="" />
												
												<div class="text-muted fs-7">Add tags to a product.</div>
												
											</div>
										
										</div> -->
            <!--end::Category & tags-->
            <!--begin::Weekly sales-->
            <!-- <div class="card card-flush py-4">

                <div class="card-header">

                    <div class="card-title">
                        <h2>Weekly Sales</h2>
                    </div>

                </div>

                <div class="card-body pt-0">
                    <span class="text-muted">No data available. Sales data will begin capturing once product has been
                        published.</span>
                </div>

            </div> -->
            <!--end::Weekly sales-->
            <!--begin::Template settings-->
            <!-- <div class="card card-flush py-4">

                <div class="card-header">

                    <div class="card-title">
                        <h2>Product Template</h2>
                    </div>

                </div>

                <div class="card-body pt-0">

                    <label for="kt_ecommerce_add_product_store_template" class="form-label">Select a product
                        template</label>

                    <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                        data-placeholder="Select an option" id="kt_ecommerce_add_product_store_template">
                        <option></option>
                        <option value="default" selected="selected">Default template</option>
                        <option value="electronics">Electronics</option>
                        <option value="office">Office stationary</option>
                        <option value="fashion">Fashion</option>
                    </select>

                    <div class="text-muted fs-7">Assign a template from your current theme to define how a single
                        product is displayed.</div>

                </div>

            </div> -->
            <!--end::Template settings-->
        </div>
        <!--end::Aside column-->
        <!--begin::Main column-->
        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
            <!--begin:::Tabs-->
            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                <!--begin:::Tab item-->
                <li class="nav-item" style="padding: 0px 10px">
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
                                        onchange="update_sku()" value="" required />
                                    @error('product_catagory')<span class="text-danger">{{ $message }}</span>@enderror
                                    <!--end::Input-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">
                                        A product Title is required.
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <div class="row mb-3">
                                        <div class="col-md-6 mb-3">
                                            <label class="required form-label">Series Name</label>
                                            <select id="series_name_info"
                                                class="form-select form-select-solid form-select-lg fw-bold"
                                                aria-label="" name="series_name" required data-control="select2"
                                                data-placeholder="Select Series">
                                                <option value="NULL">Select Series</option>
                                                @foreach($product_series as $key=> $series)

                                                <option value="{{$series->series}}">{{$series->series}}</option>
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

                                            </select>
                                            <div class="text-muted fs-7">
                                                A Model Name is required.
                                            </div>
                                            @error('product_catagory')<span
                                                class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>

                                    <!--end::Label-->
                                    <!--begin::Input-->

                                    <!--end::Input-->
                                    <!--begin::Description-->

                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->

                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="form-label">Description</label>

                                    <!-- nrs -->
                                    <textarea name="editor" id="editor" cols="30" rows="10"></textarea>
                                    @error('editor')<span class="text-danger">{{ $message }}</span>@enderror
                                    <!-- end nrs -->
                                    <!--end::Label-->
                                    <!--begin::Editor-->
                                    <!-- <div class="">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <textarea rows="7" style="
                                                        overflow: auto;
                                                        width: 100%;
                                                        min-height: 95px;
                                                    " class="form-control" name="description"></textarea>
                                           
                                            </div>
                                        </div>
                                    </div> -->
                                    <!--end::Editor-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">
                                        Set a description to the product for
                                        better visibility.
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
                            <div class="card-body text-center pt-0">
                                <!--begin::Image input-->
                                <div class="image-input image-input-empty image-input-outline mb-3"
                                    data-kt-image-input="true" style="
                                        background-image: url(assets/media/svg/files/blank-image.svg);
                                        background-repeat: no-repeat;
                                        background-size: contain;
                                        background-position: center;
                                    ">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-150px h-150px" style="
                                    background-image: url(assets/media/svg/files/blank-image.svg);
                                    background-repeat: no-repeat;
                                    background-size: contain;
                                    background-position: center;"></div>
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
                                    @error('t_image')<span class="text-danger">{{ $message }}</span>@enderror
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
                                <div class="text-muted fs-7">
                                    Set the product thumbnail image. Only *.png,
                                    *.jpg and *.jpeg image files are accepted
                                </div>
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
                                <div class="text-muted fs-7">
                                    Set the product media gallery.
                                </div>
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
                                        placeholder="Product price" value="" required />
                                    <!--end::Input-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">
                                        Set the product price.
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <label class="form-label">Fixed Tax Price</label>
                                        <input type="number" name="tax_price" class="form-control mb-2"
                                            placeholder="Tax price" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Fixed Tax Type</label>
                                        <select name="tax_type" aria-label="" required data-control="select2"
                                            data-placeholder="Select  ..."
                                            class="form-select form-select-solid form-select-lg fw-bold coupon_types">
                                            <option>Select Types</option>
                                            <option value="1">Amount</option>
                                            <option value="0">Percentage</option>
                                        </select>
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <!-- <div class="fv-row mb-10" id="">
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
                                                        value="10" checked="checked" />
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
                                <div class="d-none mb-10 fv-row" id="">
                                    <label class="form-label">Set Discount Percentage</label>
                                    <div class="d-flex flex-column text-center mb-5">
                                        <div class="d-flex align-items-start justify-content-center mb-7">
                                            <span class="fw-bolder fs-3x"
                                                id="kt_ecommerce_add_product_discount_label">0</span>
                                            <span class="fw-bolder fs-4 mt-1 ms-2">%</span>
                                        </div>
                                        <div id="kt_ecommerce_add_product_discount_slider" class="noUi-sm"></div>
                                    </div>
                                    <div class="text-muted fs-7">
                                        Set a percentage discount to be applied
                                        on this product.
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="d-none mb-10" style="display: inline-flex;"
                                        id="kt_ecommerce_add_product_discount_fixed">
                                        <div class="col-md-8 mx-3">
                                            <label class="form-label">Fixed Tax Price</label>
                                            <input type="number" name="tax_price" class="form-control mb-2"
                                                placeholder="Discounted price" />
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Fixed Tax Type</label>
                                            <select name="tax_type" aria-label="" required data-control="select2"
                                                data-placeholder="Select  ..."
                                                class="form-select form-select-solid form-select-lg fw-bold coupon_types">
                                                <option>Select Types</option>
                                                <option value="1">Amount</option>
                                                <option value="0">Percentage</option>
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
                                            <option value="{{$size->skd_size}} GB">{{$size->skd_size}} GB</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-10 fv-row">
                                        <label class=" form-label">Processor</label>
                                        <p id="processor">
                                            <input type="text" name="processor" id="select-barebone-processor"
                                                class="form-control form-control-solid" value="" readonly>
                                        </p>
                                    </div>
                                    <div class="col-md-3 mb-10 fv-row">
                                        <label class=" form-label">Screen Size</label>
                                        <select id="screen_size" class="form-select form-select-solid "
                                            name="screen_size" data-placeholder="Select Processor" required
                                            data-control="select2"
                                            class="form-select form-select-solid form-select-lg fw-bold">
                                            <option value="">Select Screen Size</option>
                                            <option value="15.6 Inches">15.6 Inches</option>
                                            <option value="16 Inches">16 Inches</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-10 fv-row">
                                        <label class=" form-label">Storage</label>
                                        <select id="storage" class="form-select form-select-solid " name="storage"
                                            data-placeholder="Select Processor" required data-control="select2"
                                            class="form-select form-select-solid form-select-lg fw-bold">
                                            <option value="">Select Storage</option>
                                            @foreach($ssd_size as $key=> $size)
                                            <option value="{{$size->skd_size}} {{($size->skd_size)<= 10?'TB':'GB'}}">
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
                                        value="" required />
                                    <!--end::Input-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">
                                        Enter the product SKU.
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label">SLUG</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="slug" class="form-control mb-2" placeholder="Slug Number"
                                        value="" required />
                                    <!--end::Input-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">
                                        Enter the product unique slug number.
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->

                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <!-- <div class="mb-10 fv-row">

																<label class="required form-label">Quantity</label>

																<div class="d-flex gap-3">
																	<input type="number" name="min_qty" class="form-control mb-2" placeholder="On shelf" value="" />
																	<input type="number" name="max_qty" class="form-control mb-2" placeholder="In warehouse" />
																</div>

																<div class="text-muted fs-7">Enter the product quantity.</div>

															</div> -->
                                <!-- <div class="mb-10 fv-row">
                                    <label class="required form-label">Current Stock</label>
                                    <input type="number" name="current_stock" class="form-control mb-2"
                                        placeholder="Current Stock" value="" required />
                                    <div class="text-muted fs-7">
                                        Enter the product current stock.
                                    </div>
                                </div> -->


                                <!--end::Input group-->
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::Inventory-->
                        <!--begin::Variations-->

                        <div class="card card-flush py-4" id="kt_ecommerce_add_product_media">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Attributes</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
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
                                                data-live-search="true" class="d-flex flex-column gap-3">
                                                @foreach($attribute as $key=>$name)
                                                <div data-repeater-item="" class="form-group d-flex flex-wrap gap-5">
                                                    <!--begin::Select2-->
                                                    <div class="w-100 w-md-300px">
                                                        <input type="text" class="form-control" name="attribute_name"
                                                            value="{{$name->attribute_name}}" readonly>
                                                        <!--   <select class="form-control" name="attribute_name"
                                                            data-placeholder="Select"
                                                            data-kt-ecommerce-catalog-add-product="product_option">

                                                            <option value="{{$name->attribute_name}}">
                                                                {{$name->attribute_name}}</option>

                                                           <option></option>
                                                            <option value="brand">Brand</option>
                                                            <option value="model">Model</option>
                                                            <option value="series">Series</option>
                                                            <option value="processor">Processor</option>
                                                            <option value="ram">Ram</option>
                                                            <option value="storage">Storage</option>
                                                            <option value="graphics">Graphics</option>
                                                            <option value="display">Display</option>
                                                            <option value="battery">Battery</option>
                                                            <option value="operating system">Operating System</option>
                                                            <option value="keyboard">Keyboard</option>
                                                            <option value="fingerprint sensor">Fingerprint Sensor
                                                            </option>
                                                            <option value="networking">Networking</option>
                                                            <option value="bluetooth">Bluetooth</option>
                                                            <option value="audio"> Audio</option>
                                                            <option value="webcam">Webcam</option>
                                                            <option value="ports & connectors">Ports &Connectors
                                                            </option>
                                                            <option value="speed">Speed</option>
                                                            <option value="size">Size</option>
                                                            <option value="type">Type</option>
                                                            <option value="resolution">Resolution</option>
                                                            <option value="capacity">Capacity</option>
                                                            <option value="interface">Interface</option>
                                                            <option value="color">Color</option>
                                                            <option value="weight">Weight</option>
                                                            <option value="warranty">Warranty </option> 
                                                        </select>-->
                                                    </div>
                                                    <!--end::Select2-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control mw-100 w-300px"
                                                        name="attribute_value" placeholder="Variation" />
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
                                        <!-- <div class="form-group mt-5">
                                            <button type="button" data-repeater-create=""
                                                class="btn btn-sm btn-light-primary">
                                              
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1"
                                                            transform="rotate(-90 11 18)" fill="currentColor" />
                                                        <rect x="6" y="11" width="12" height="2" rx="1"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                Add another
                                                variation
                                            </button> 
                                    </div>-->
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
                                    <input type="text" class="form-control mb-2" name="meta_title"
                                        placeholder="Meta tag name" required />
                                    <div class="text-muted fs-7">
                                        Set a meta tag title. Recommended to be
                                        simple and precise keywords.
                                    </div>
                                </div>
                                <div class="mb-10">
                                    <label class="form-label">Meta Tag Description</label>
                                    <div class="">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <textarea class="form-control" name="meta_description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-muted fs-7">
                                        Set a description to the product for
                                        better visibility.
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

@endsection @section('script')
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


    ClassicEditor.create(document.querySelector("#task-textarea"))
        .then((editor) => {
            console.log(editor);
        })
        .catch((error) => {
            console.error(error);
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
