@extends('admin.master')

@section('admin-content')

					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Toolbar-->
						<div class="toolbar" id="kt_toolbar">
							<!--begin::Container-->
							<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
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
								<form action="{{ route('admin.order.update',$orderData->id) }}" method="POST" enctype="multipart/form-data" id="kt_ecommerce_edit_order_form" class="form d-flex flex-column flex-lg-row" >
								<!-- <form id="kt_ecommerce_edit_order_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="../../demo1/dist/apps/ecommerce/sales/listing.html"> -->
									<!--begin::Aside column-->
									@csrf
                                  
									<div class="w-100 flex-lg-row-auto w-lg-300px mb-7 me-7 me-lg-10">
										<!--begin::Order details-->
										<div class="card card-flush py-4">
											<!--begin::Card header-->
											<div class="card-header">
												<div class="card-title">
													<h2>Order Details </h2>
												</div>
											</div>
											<!--end::Card header-->
											<!--begin::Card body-->
											<div class="card-body pt-0">
												<div class="d-flex flex-column gap-10">
													<!--begin::Input group-->
													<div class="fv-row">
														<!--begin::Label-->
														<label class="form-label">Order ID</label>
														<!--end::Label-->
														<!--begin::Auto-generated ID-->
														<div class="fw-bolder fs-3">#{{@$orderData->id}}</div>
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="fv-row">
														<!--begin::Label-->
														<label class="required form-label">Payment Method</label>
														<!--end::Label-->
														<!--begin::Select2-->
														<select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" name="payment_method" id="kt_ecommerce_edit_order_payment">
															<option></option>
															<option value="cod">Cash on Delivery</option>
														</select>
														<!--end::Select2-->
														<!--begin::Description-->
														<div class="text-muted fs-7">Set the date of the order to process.</div>
														<!--end::Description-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="fv-row">
														<!--begin::Label-->
														<label class="required form-label">Shipping Method</label>
														<!--end::Label-->
														<!--begin::Select2-->
														<select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" name="shipping_method" id="kt_ecommerce_edit_order_shipping">
															<option></option>
															<option value="none">N/A - Virtual Product</option>
															<option value="standard" selected="selected">Standard Rate</option>
															<option value="express">Express Rate</option>
															<option value="speed">Speed Overnight Rate</option>
														</select>
														<!--end::Select2-->
														<!--begin::Description-->
														<div class="text-muted fs-7">Set the date of the order to process.</div>
														<!--end::Description-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="fv-row">
														<!--begin::Label-->
														<label class="required form-label">Order Date</label>
														<!--end::Label-->
														<!--begin::Editor-->
														<input id="kt_ecommerce_edit_order_date" name="order_date" placeholder="Select a date" class="form-control mb-2" value="{{@$orderData->date}}" />
														<!--end::Editor-->
														<!--begin::Description-->
														<div class="text-muted fs-7">Set the date of the order to process.</div>
														<!--end::Description-->
													</div>
													<!--end::Input group-->
												</div>
											</div>
											<!--end::Card header-->
										</div>
										<!--end::Order details-->
									</div>
								
              					
									<div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">									

										<div class="card card-flush py-4">
											<!--begin::Card header-->
											<div class="card-header">
												<div class="card-title">
													<h2>Delivery Details</h2>
												</div>
											</div>
											<div class="card-body pt-0">
												<div class="d-flex flex-column gap-5 gap-md-7">
													<div class="fs-3 fw-bolder mb-n2">Billing Address</div>
													<div class="d-flex flex-column flex-md-row gap-5">
														<div class="fv-row flex-row-fluid">
															<label class="required form-label">Address Line 1</label>
															<input class="form-control" name="billing_order_address_1" placeholder="Address Line 1" value="{{$orderData['customer']['address']}}" readonly />
														</div>
													</div>
													
													</div>
													<!--end::Shipping address-->
												</div>
												<!--end::Billing address-->
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Order details-->
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