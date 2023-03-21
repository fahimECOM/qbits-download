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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Edit Order</h1>
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
                    <li class="breadcrumb-item text-muted">Sales</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Edit Order</li>
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
            <!--begin::Form-->
            <form action="{{ route('order.update',$orderData[0]->id)}}" method="POST" enctype="multipart/form-data"
                id="kt_ecommerce_edit_order_form" class="form d-flex flex-column flex-lg-row">
                <!-- <form id="kt_ecommerce_edit_order_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="../../demo1/dist/apps/ecommerce/sales/listing.html"> -->
                <!--begin::Aside column-->
                @csrf

                <!--end::Aside column-->
                <!--begin::Main column-->

                <!--begin::Aside column-->


                <div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
                    <!-- <div class="card card-flush py-4">									
											<div class="card-header">
												<div class="card-title">
													<h2>Select Products</h2>
												</div>
											</div>
											<div class="card-body pt-0">
												<div class="d-flex flex-column gap-10">
													<div>
														<label class="form-label">Add products to this order</label>
														<div  class="row row-cols-1 row-cols-xl-3 row-cols-md-2 border border-dashed rounded pt-3 pb-1 px-2 mb-5 mh-300px overflow-scroll" id="kt_ecommerce_edit_order_selected_products">
															<span class="w-100 text-muted d-none">Select one or more products from the list below by ticking the checkbox.</span>
														</div>
														<div class="fw-bolder fs-4">Total Cost: $
														<span id="kt_ecommerce_edit_order_total_price"></span></div>
													</div>
													<div class="separator"></div>
													<div class="d-flex align-items-center position-relative mb-n7">
														<span class="svg-icon svg-icon-1 position-absolute ms-4">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
																<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
															</svg>
														</span>
														<input type="text" data-kt-ecommerce-edit-order-filter="search" class="form-control form-control-solid w-100 w-lg-50 ps-14" placeholder="Search Products" />
													</div>
													<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_edit_order_product_table">
														<thead>
															<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
																<th class="w-25px pe-2"></th>
																<th class="min-w-200px">Product</th>
																<th class="min-w-100px text-end pe-5">Qty Remaining</th>
															</tr>
														</thead>
														<tbody class="fw-bold text-gray-600">
															@foreach($products as $key=>$product)
															<tr>
																<td>
																	<div class="form-check form-check-sm form-check-custom form-check-solid">
																		<input class="form-check-input" type="checkbox" value="1" />
																	</div>
																</td>
																<td>
																	<div class="d-flex align-items-center" data-kt-ecommerce-edit-order-filter="product" data-kt-ecommerce-edit-order-id="product_1">
																		<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
																			<span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/1.gif);"></span>
																		</a>
																		<div class="ms-5">
																			<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bolder">{{$product->name}}</a>
																			<div class="fw-bold fs-7">Price: $
																			<span data-kt-ecommerce-edit-order-filter="price">{{$product->unit_price}}</span></div>
																			<div class="text-muted fs-7">SKU: 04757004</div>
																		</div>
																	</div>
																</td>
																<td class="text-end pe-5" data-order="8">
																	<span class="badge badge-light-warning">Low stock</span>
																	<span class="fw-bolder text-warning ms-3">8</span>
																</td>
															</tr>
															@endforeach
														</tbody>
													</table>
												</div>
											</div>
										</div> -->

                    <!--begin::Actions-->
                    <!--begin::Sign-in Method-->
                    <div class="card mb-5 mb-xl-10">
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
                                <div class="row mb-2">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Street Address</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-3 fv-row">
                                        <input type="text" name="address"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Street Address" value="{{$orderData[0]->shipping_address}}" />
                                    </div>
                                    <label class="col-lg-2 col-form-label fw-bold fs-6">City</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-3 fv-row">
                                        <input type="text" name="city"
                                            class="form-control form-control-lg form-control-solid" placeholder="City"
                                            value="{{$orderData[0]->city}}" />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-2">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">State / zilla</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-3 fv-row">
                                        <input type="text" name="zilla"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="State / zilla" value="{{$orderData[0]->zilla}}" />
                                    </div>
                                    <label class="col-lg-2 col-form-label fw-bold fs-6">Postal / Zip Code</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-3 fv-row">
                                        <input type="text" name="postal_code"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Postal / Zip Code" value="{{$orderData[0]->postal_code}}" />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                                        <span class="required">Country</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Country of origination"></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <select name="country" aria-label="Select a Country" data-control="select2"
                                            data-placeholder="Select a country..."
                                            class="form-select form-select-solid form-select-lg fw-bold">
                                            <option value="">Select a Country...</option>

                                            <option value="Bangladesh"
                                                {{ $orderData[0]->country == 'Bangladesh' ? 'selected' : '' }}>
                                                Bangladesh</option>


                                        </select>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Sign-in Method-->


                    <!--end::Actions-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <!-- <a href="../../demo1/dist/apps/ecommerce/catalog/products.html" id="kt_ecommerce_edit_order_cancel" class="btn btn-light me-5">Cancel</a> -->
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_edit_order_submit" class="btn btn-primary">
                            <span class="indicator-label">Save Changes</span>
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
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>


<!--end::Content-->


@endsection
