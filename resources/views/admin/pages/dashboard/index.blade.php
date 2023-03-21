@extends('admin.master')

@section('admin-content')

					<!--begin::Content-->
				
						<!--begin::Toolbar-->
						<div class="toolbar" id="kt_toolbar">
							<!--begin::Container-->
							<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1"> Dashboard</h1>
									<!--end::Title-->
								</div>
								<!--end::Page title-->
								<!--begin::Actions-->

								<!--end::Actions-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Toolbar-->
						<!--begin::Post-->
						@php
						$res = DB::table('order_details')->first();
					
						if($res == ''){
							$everyMonth = 0;
							$everyYear = 0;
							$everyday =0;
							$everyYearOrder =0;
							$everyMonthOrder=0;
							$everydayOrder=0;
						}
						@endphp


						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Row-->
								<div class="row g-2 g-xl-10 mt-xl-10">
								
									<div class="col-md-6 col-lg-6 col-xl-6 col-xxl-5 mb-md-5 mb-xl-10">
										<!--begin::Card widget 4-->
										<div class="card card-flush h-md-100 mb-1 mb-xl-10">
											<!--begin::Header-->
											<div class="card-header pt-5">
												<!--begin::Title-->
												<div class="card-title d-flex flex-column">
													<!--begin::Info-->
													<div class="d-flex align-items-center">
														<!--begin::Currency-->
														<span class="fs-4 fw-bold text-gray-400 me-1 align-self-start"></span>
														<!--end::Currency-->
														<!--begin::Amount-->
														<span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">Earnings Summary</span>
														<!--end::Amount-->
														<!--begin::Badge-->
														<!--end::Badge-->
													</div>
													<!--end::Info-->
													<!--begin::Subtitle-->
													<span class="text-gray-400 pt-1 fw-bold fs-6">Earnings</span>
													<!--end::Subtitle-->
												</div>
												<!--end::Title-->
											</div>
											<!--end::Header-->
											<!--begin::Card body-->
											<div class="card-body pt-5 pb-4 d-flex align-items-center">
												<!--begin::Chart-->
												<div class="d-flex flex-center me-5 pt-2">
													<div id="donut_single" style="width: 200px; height: 210px;"  data-kt-size="80" data-kt-line="15">
													
												</div>
												
												</div>
												<!--end::Chart-->
												<!--begin::Labels-->
												<div class="d-flex flex-column pt-5 content-justify-center w-100">
													<!--begin::Label-->
													<div class="d-flex fs-6 fw-bold align-items-center">
														<!--begin::Bullet-->
														<div class="bullet w-8px h-6px rounded-2  me-3" style="background-color: #ff9900"></div>
														<!--end::Bullet-->
														<!--begin::Label-->
														<div class="text-gray-500 flex-grow-1 me-4">This Day</div>
														<!--end::Label-->
														<!--begin::Stats-->
													
														<div class="fw-boldest text-gray-700 text-xxl-end">&#2547;{{$everyday}}</div>
														
														<!--end::Stats-->
													</div>
													<!--end::Label-->
													<!--begin::Label-->
													<div class="d-flex fs-6 fw-bold align-items-center my-3">
														<!--begin::Bullet-->
														<div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
														<!--end::Bullet-->
														<!--begin::Label-->
														<div class="text-gray-500 flex-grow-1 me-4">This Month</div>
														<!--end::Label-->
														<!--begin::Stats-->
														
														<div class="fw-boldest text-gray-700 text-xxl-end">&#2547;{{$everyMonth}}</div>
														
														<!--end::Stats-->
													</div>
													<!--end::Label-->
													<!--begin::Label-->
													<div class="d-flex fs-6 fw-bold align-items-center">
														<!--begin::Bullet-->
														<div class="bullet w-8px h-6px rounded-2 me-3" style="background-color: #dc3912"></div>
														<!--end::Bullet-->
														<!--begin::Label-->
														<div class="text-gray-500 flex-grow-1 me-4">This Year</div>
														<!--end::Label-->
														<!--begin::Stats-->
													
														<div class="fw-boldest text-gray-700 text-xxl-end">&#2547;{{$everyYear}}</div>
													
														<!--end::Stats-->
													</div>
													<!--end::Label-->
												</div>
												<!--end::Labels-->
											</div>
											<!--end::Card body-->
										</div>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-6 col-xxl-5 mb-md-5 mb-xl-10">
										<!--begin::Card widget 6-->
										<div class="card card-flush h-md-100 mb-5 mb-xl-10">
											<!--begin::Header-->
											<div class="card-header pt-5">
												<!--begin::Title-->
												<div class="card-title d-flex flex-column">
													<!--begin::Info-->
													<div class="d-flex align-items-center">
														<!--begin::Currency-->
														<span class="fs-4 fw-bold text-gray-400 me-1 align-self-start"></span>
														<!--end::Currency-->
														<!--begin::Amount-->
														<span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">Order Summary</span>
														<!--end::Amount-->
														<!--begin::Badge-->

														<!--end::Badge-->
													</div>
													<!--end::Info-->
													<!--begin::Subtitle-->
													<span class="text-gray-400 pt-1 fw-bold fs-6">order</span>
													<!--end::Subtitle-->
												</div>
												<!--end::Title-->
											</div>
											<!--end::Header-->
											<!--begin::Card body-->
											<div class="card-body pt-5 pb-4 d-flex align-items-center">
											<div id="columnchart_values"></div>
											<div class="card-body d-flex align-items-end px-0 pb-0">
												<!--begin::Chart-->
											
												<!--end::Chart-->
											</div>
											</div>
											

											<!--end::Card body-->
										</div>
										<!--end::Card widget 6-->
	
									</div>
									<div style="min-height: 350px;" class="col-md-6 col-lg-6 col-xl-6 col-xxl-5 mb-md-5 mb-xl-10">
										

										<!--begin::Card widget 7-->
										<div class="card card-flush h-md-100 mb-xl-10">
											<!--begin::Header-->
											<div class="card-header pt-5">
												<!--begin::Title-->
												<div class="card-title d-flex flex-column">
													<!--begin::Amount-->
													<span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">{{$customerCount}} New Customers</span>
													<!--end::Amount-->
													<!--begin::Subtitle-->
													<span class="text-gray-400 pt-1 fw-bold fs-6"> This Month</span>
													<!--end::Subtitle-->
												</div>
												<!--end::Title-->
											</div>
											<!--end::Header-->
											<!--begin::Card body-->
											<div class="card-body d-flex flex-column justify-content-end pe-0">
												<!--begin::Title-->
												<span class="fs-6 fw-boldest text-gray-800 d-block mb-5">Today’s Heroes</span>
												<!--end::Title-->
												<!--begin::Users group-->
												<div class="symbol-group symbol-hover flex-nowrap">
											
												@foreach($customer as $key=>$customers)
													
													<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="{{$customers->name}}">
													<img class="symbol-label  text-inverse-warning fw-bolder" src="{{(!empty($customers->avatar))?url($customers->avatar):url('/avatar.png')}}" alt="image" />
													</div>
													@endforeach
													<a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
														<span class="symbol-label bg-light text-gray-400 fs-8 fw-bolder">+{{$customerCount}}</span>
													</a>
											
												</div>
												
												<!--end::Users group-->
											</div>
											<!--end::Card body-->
										</div>
									
										<!--end::Card widget 7-->
									</div>
									<!--begin::Col-->
								
									<!--end::Col-->
								</div>
					
								<!-- <div class="row gy-5 g-xl-10">
							
									<div class="col-xl-6 mb-xl-10">
									
										<div class="card h-md-100">
										
											<div class="card-header align-items-center border-0">
										
												<h3 class="fw-bolder text-gray-900 m-0">Recent Orders</h3>
							
											</div>
										
											<div class="card-body pt-2">
											
												<ul class="nav nav-pills nav-pills-custom mb-3">

											
													<li class="nav-item mb-3 me-3 me-lg-6">
													
														<a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_2_tab_3">
															
															<div class="nav-icon">
																<img alt="" src="assets/media/svg/products-categories/watch.svg" class="" />
															</div>
												
															<span class="nav-text text-gray-600 fw-bolder fs-6 lh-1">Sigma</span>
												
															<span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
												
														</a>
													
													</li>
											
													<li class="nav-item mb-3 me-3 me-lg-6">
													
														<a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_2_tab_4">
															
															<div class="nav-icon">
																<img alt="" src="assets/media/svg/products-categories/gloves.svg" class="nav-icon" />
															</div>
													
															<span class="nav-text text-gray-600 fw-bolder fs-6 lh-1">Alpha</span>
												
															<span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
													
														</a>
													
													</li>
											
													<li class="nav-item mb-3">
														
														<a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_2_tab_5">
													
															<div class="nav-icon">
																<img alt="" src="assets/media/svg/products-categories/shoes.svg" class="nav-icon" />
															</div>
													
															<span class="nav-text text-gray-600 fw-bolder fs-6 lh-1">Caliph</span>
														
															<span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
														
														</a>
												
													</li>
												
												</ul>
								
												<div class="tab-content">
										
													<div class="tab-pane fade show active" id="kt_stats_widget_2_tab_1">
												
														<div class="table-responsive">
														
															<table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
															
																<thead>
																	<tr class="fs-7 fw-bolder text-gray-500 border-bottom-0">
																		<th class="ps-0 w-50px">ITEM</th>
																		<th class="min-w-140px"></th>
																		<th class="text-end min-w-140px">QTY</th>
																		<th class="pe-0 text-end min-w-120px">PRICE</th>
																		<th class="pe-0 text-end min-w-120px">TOTAL PRICE</th>
																	</tr>
																</thead>
													
																<tbody>
																	<tr>
																		<td>
																			<img src="assets/media/stock/ecommerce/210.gif" class="w-50px ms-n1" alt="" />
																		</td>
																		<td class="ps-0">
																			<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6 text-start pe-0">Elephant 1802</a>
																			<span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">Item: #XDG-2347</span>
																		</td>
																		<td>
																			<span class="text-gray-800 fw-bolder d-block fs-6 ps-0 text-end">x1</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$72.00</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$126.00</span>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<img src="assets/media/stock/ecommerce/215.gif" class="w-50px ms-n1" alt="" />
																		</td>
																		<td class="ps-0">
																			<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6 text-start pe-0">Red Laga</a>
																			<span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">Item: #XDG-1321</span>
																		</td>
																		<td>
																			<span class="text-gray-800 fw-bolder d-block fs-6 ps-0 text-end">x2</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$45.00</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$76.00</span>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<img src="assets/media/stock/ecommerce/209.gif" class="w-50px ms-n1" alt="" />
																		</td>
																		<td class="ps-0">
																			<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
																			<span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">Item: #XDG-4312</span>
																		</td>
																		<td>
																			<span class="text-gray-800 fw-bolder d-block fs-6 ps-0 text-end">x3</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$84.00</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$168.00</span>
																		</td>
																	</tr>
																</tbody>
																
															</table>
														</div>
														
													</div>
											
													<div class="tab-pane fade" id="kt_stats_widget_2_tab_2">
													
														<div class="table-responsive">
														
															<table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
															
																<thead>
																	<tr class="fs-7 fw-bolder text-gray-500 border-bottom-0">
																		<th class="ps-0 w-50px">ITEM</th>
																		<th class="min-w-140px"></th>
																		<th class="text-end min-w-140px">QTY</th>
																		<th class="pe-0 text-end min-w-120px">PRICE</th>
																		<th class="pe-0 text-end min-w-120px">TOTAL PRICE</th>
																	</tr>
																</thead>
															
																<tbody>
																	<tr>
																		<td>
																			<img src="assets/media/stock/ecommerce/197.gif" class="w-50px ms-n1" alt="" />
																		</td>
																		<td class="ps-0">
																			<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6 text-start pe-0">Elephant 1802</a>
																			<span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">Item: #XDG-4312</span>
																		</td>
																		<td>
																			<span class="text-gray-800 fw-bolder d-block fs-6 ps-0 text-end">x1</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$32.00</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$312.00</span>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<img src="assets/media/stock/ecommerce/178.gif" class="w-50px ms-n1" alt="" />
																		</td>
																		<td class="ps-0">
																			<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6 text-start pe-0">Red Laga</a>
																			<span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">Item: #XDG-3122</span>
																		</td>
																		<td>
																			<span class="text-gray-800 fw-bolder d-block fs-6 ps-0 text-end">x2</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$53.00</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$62.00</span>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<img src="assets/media/stock/ecommerce/22.gif" class="w-50px ms-n1" alt="" />
																		</td>
																		<td class="ps-0">
																			<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
																			<span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">Item: #XDG-1142</span>
																		</td>
																		<td>
																			<span class="text-gray-800 fw-bolder d-block fs-6 ps-0 text-end">x3</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$74.00</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$139.00</span>
																		</td>
																	</tr>
																</tbody>
															
															</table>
														</div>
											
													</div>
										
													<div class="tab-pane fade" id="kt_stats_widget_2_tab_3">
													
														<div class="table-responsive">
												
															<table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
																
																<thead>
																	<tr class="fs-7 fw-bolder text-gray-500 border-bottom-0">
																		<th class="ps-0 w-50px">ITEM</th>
																		<th class="min-w-140px"></th>
																		<th class="text-end min-w-140px">QTY</th>
																		<th class="pe-0 text-end min-w-120px">PRICE</th>
																		<th class="pe-0 text-end min-w-120px">TOTAL PRICE</th>
																	</tr>
																</thead>
															
																<tbody>
																	<tr>
																		<td>
																			<img src="assets/media/stock/ecommerce/1.gif" class="w-50px ms-n1" alt="" />
																		</td>
																		<td class="ps-0">
																			<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6 text-start pe-0">Elephant 1324</a>
																			<span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">Item: #XDG-1523</span>
																		</td>
																		<td>
																			<span class="text-gray-800 fw-bolder d-block fs-6 ps-0 text-end">x1</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$43.00</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$231.00</span>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<img src="assets/media/stock/ecommerce/24.gif" class="w-50px ms-n1" alt="" />
																		</td>
																		<td class="ps-0">
																			<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6 text-start pe-0">Red Laga</a>
																			<span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">Item: #XDG-5314</span>
																		</td>
																		<td>
																			<span class="text-gray-800 fw-bolder d-block fs-6 ps-0 text-end">x2</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$71.00</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$53.00</span>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<img src="assets/media/stock/ecommerce/71.gif" class="w-50px ms-n1" alt="" />
																		</td>
																		<td class="ps-0">
																			<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
																			<span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">Item: #XDG-4222</span>
																		</td>
																		<td>
																			<span class="text-gray-800 fw-bolder d-block fs-6 ps-0 text-end">x3</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$23.00</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$213.00</span>
																		</td>
																	</tr>
																</tbody>
																
															</table>
														</div>
													
													</div>
											
													<div class="tab-pane fade" id="kt_stats_widget_2_tab_4">
														
														<div class="table-responsive">
														
															<table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
															
																<thead>
																	<tr class="fs-7 fw-bolder text-gray-500 border-bottom-0">
																		<th class="ps-0 w-50px">ITEM</th>
																		<th class="min-w-140px"></th>
																		<th class="text-end min-w-140px">QTY</th>
																		<th class="pe-0 text-end min-w-120px">PRICE</th>
																		<th class="pe-0 text-end min-w-120px">TOTAL PRICE</th>
																	</tr>
																</thead>
													
																<tbody>
																	<tr>
																		<td>
																			<img src="assets/media/stock/ecommerce/41.gif" class="w-50px ms-n1" alt="" />
																		</td>
																		<td class="ps-0">
																			<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6 text-start pe-0">Elephant 2635</a>
																			<span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">Item: #XDG-1523</span>
																		</td>
																		<td>
																			<span class="text-gray-800 fw-bolder d-block fs-6 ps-0 text-end">x1</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$65.00</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$163.00</span>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<img src="assets/media/stock/ecommerce/63.gif" class="w-50px ms-n1" alt="" />
																		</td>
																		<td class="ps-0">
																			<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6 text-start pe-0">Red Laga</a>
																			<span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">Item: #XDG-2745</span>
																		</td>
																		<td>
																			<span class="text-gray-800 fw-bolder d-block fs-6 ps-0 text-end">x2</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$64.00</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$73.00</span>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<img src="assets/media/stock/ecommerce/59.gif" class="w-50px ms-n1" alt="" />
																		</td>
																		<td class="ps-0">
																			<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
																			<span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">Item: #XDG-5173</span>
																		</td>
																		<td>
																			<span class="text-gray-800 fw-bolder d-block fs-6 ps-0 text-end">x3</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$54.00</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$173.00</span>
																		</td>
																	</tr>
																</tbody>
												
															</table>
														</div>
												
													</div>
											
													<div class="tab-pane fade" id="kt_stats_widget_2_tab_5">
													
														<div class="table-responsive">
												
															<table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
													
																<thead>
																	<tr class="fs-7 fw-bolder text-gray-500 border-bottom-0">
																		<th class="ps-0 w-50px">ITEM</th>
																		<th class="min-w-140px"></th>
																		<th class="text-end min-w-140px">QTY</th>
																		<th class="pe-0 text-end min-w-120px">PRICE</th>
																		<th class="pe-0 text-end min-w-120px">TOTAL PRICE</th>
																	</tr>
																</thead>
											
																<tbody>
																	<tr>
																		<td>
																			<img src="assets/media/stock/ecommerce/10.gif" class="w-50px ms-n1" alt="" />
																		</td>
																		<td class="ps-0">
																			<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6 text-start pe-0">Nike</a>
																			<span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">Item: #XDG-2163</span>
																		</td>
																		<td>
																			<span class="text-gray-800 fw-bolder d-block fs-6 ps-0 text-end">x1</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$64.00</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$287.00</span>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<img src="assets/media/stock/ecommerce/96.gif" class="w-50px ms-n1" alt="" />
																		</td>
																		<td class="ps-0">
																			<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6 text-start pe-0">Adidas</a>
																			<span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">Item: #XDG-2162</span>
																		</td>
																		<td>
																			<span class="text-gray-800 fw-bolder d-block fs-6 ps-0 text-end">x2</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$76.00</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$51.00</span>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<img src="assets/media/stock/ecommerce/13.gif" class="w-50px ms-n1" alt="" />
																		</td>
																		<td class="ps-0">
																			<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6 text-start pe-0">Puma</a>
																			<span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">Item: #XDG-1537</span>
																		</td>
																		<td>
																			<span class="text-gray-800 fw-bolder d-block fs-6 ps-0 text-end">x3</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$27.00</span>
																		</td>
																		<td class="text-end pe-0">
																			<span class="text-gray-800 fw-bolder d-block fs-6">$167.00</span>
																		</td>
																	</tr>
																</tbody>
												
															</table>
														</div>
												
													</div>
											
												</div>
											
											</div>
										
										</div>
								
									</div>
							
									<div class="col-xl-6 mb-5 mb-xl-10">
									
										<div class="card card-flush overflow-hidden h-md-100">
									
											<div class="card-header py-5">
								
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bolder text-dark">Discounted Product Sales</span>
													<span class="text-gray-400 mt-1 fw-bold fs-6">Users from all channels</span>
												</h3>
						
											</div>
							
											<div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
											
												<div class="px-9 mb-5">
												
													<div class="d-flex align-items-center mb-2">
													
														<span class="fs-4 fw-bold text-gray-400 align-self-start me-1">$</span>
											
														<span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2">3,706</span>
											
														<span class="badge badge-success fs-base">
														
														<span class="svg-icon svg-icon-5 svg-icon-white ms-n1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
																<path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor" />
															</svg>
														</span>
														4.5%</span>
														
													</div>
											
													<span class="fs-6 fw-bold text-gray-400">Total Discounted Sales This Month</span>
												
												</div>
										
												<div id="kt_charts_widget_4" class="min-h-auto ps-4 pe-6" style="height: 300px"></div>
									
											</div>
								
										</div>
							
									</div>
						
								</div>
								
								<div class="row gy-5 g-xl-10">
							
									<div class="col-xl-4">
								
										<div class="card card-flush h-xl-100">
											
											<div class="card-header pt-7">
											
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bolder text-dark">Product Delivery</span>
													<span class="text-gray-400 mt-1 fw-bold fs-6">1M Products Shipped so far</span>
												</h3>
										
												<div class="card-toolbar">
													<a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="btn btn-sm btn-light">Order Details</a>
												</div>
										
											</div>
								
											<div class="card-body">
										
												<div class="hover-scroll-overlay-y pe-6 me-n6" style="height: 415px">
												
													<div class="rounded border-gray-300 border-1 border-gray-300 border-dashed px-7 py-3">
													
														<div class="d-flex flex-stack mb-3">
												
															<div class="me-3">
														
																<img src="assets/media/stock/ecommerce/192.gif" class="w-50px ms-n1 me-1" alt="" />
												
													
																<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fw-bolder">Yellow Stone</a>
														
															</div>
								
															<div class="m-0">
														
																<button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
																
																	<span class="svg-icon svg-icon-1">
																		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																			<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor" />
																			<rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
																			<rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
																			<rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
																		</svg>
																	</span>
															
																</button>
																
																<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px" data-kt-menu="true">
													
																	<div class="menu-item px-3">
																		<div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Quick Actions</div>
																	</div>
													
																	<div class="separator mb-3 opacity-75"></div>
															
																	<div class="menu-item px-3">
																		<a href="#" class="menu-link px-3">New Ticket</a>
																	</div>
											
																	<div class="menu-item px-3">
																		<a href="#" class="menu-link px-3">New Customer</a>
																	</div>
															
																	<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
																		
																		<a href="#" class="menu-link px-3">
																			<span class="menu-title">New Group</span>
																			<span class="menu-arrow"></span>
																		</a>
																
																		<div class="menu-sub menu-sub-dropdown w-175px py-4">
																	
																			<div class="menu-item px-3">
																				<a href="#" class="menu-link px-3">Admin Group</a>
																			</div>
																		
																			<div class="menu-item px-3">
																				<a href="#" class="menu-link px-3">Staff Group</a>
																			</div>
																	
																			<div class="menu-item px-3">
																				<a href="#" class="menu-link px-3">Member Group</a>
																			</div>
															
																		</div>
														
																	</div>
																
																	<div class="menu-item px-3">
																		<a href="#" class="menu-link px-3">New Contact</a>
																	</div>
															
																	<div class="separator mt-3 opacity-75"></div>
															
																	<div class="menu-item px-3">
																		<div class="menu-content px-3 py-3">
																			<a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
																		</div>
																	</div>
																	
																</div>
															
															</div>
													
														</div>
											
														<div class="d-flex flex-stack">
													
															<span class="text-gray-400 fw-bolder">To:
															<a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bolder">Kevin Leonard</a></span>
													
															<span class="badge badge-light-danger">Confirmed</span>
														
														</div>
												
													</div>
										
												</div>
										
											</div>
									
										</div>
							
									</div>
							
									<div class="col-xl-8">
								
										<div class="card card-flush h-xl-100">
										
											<div class="card-header pt-7">
											
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bolder text-dark">Stock Report</span>
													<span class="text-gray-400 mt-1 fw-bold fs-6">Total 2,356 Items in the Stock</span>
												

												</h3>
											
												<div class="card-toolbar">
										
													<div class="d-flex flex-stack flex-wrap gap-4">
											
														<div class="d-flex align-items-center fw-bolder">
												
															<div class="text-muted fs-7 me-2">Cateogry</div>
														
															<select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bolder py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Select an option">
																<option></option>
																<option value="Show All" selected="selected">Show All</option>
																<option value="a">Category A</option>
																<option value="b">Category B</option>
															</select>
												
														</div>
												
														<div class="d-flex align-items-center fw-bolder">
											
															<div class="text-muted fs-7 me-2">Status</div>
											
															<select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bolder py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Select an option" data-kt-table-widget-5="filter_status">
																<option></option>
																<option value="Show All" selected="selected">Show All</option>
																<option value="In Stock">In Stock</option>
																<option value="Out of Stock">Out of Stock</option>
																<option value="Low Stock">Low Stock</option>
															</select>
															
														</div>
								
														<a href="../../demo1/dist/apps/ecommerce/catalog/products.html" class="btn btn-light btn-sm">View Stock</a>
											
													</div>
								
												</div>
							
											</div>
				
											<div class="card-body">
								
												<table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
									
													<thead>
												
														<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
															<th class="min-w-100px">Item</th>
															<th class="text-end pe-3 min-w-100px">Product ID</th>
															<th class="text-end pe-3 min-w-150px">Date Added</th>
															<th class="text-end pe-3 min-w-100px">Price</th>
															<th class="text-end pe-3 min-w-50px">Status</th>
															<th class="text-end pe-0 min-w-25px">Qty</th>
														</tr>
									
													</thead>
										
													<tbody class="fw-bolder text-gray-600">

														<tr>
											
															<td>
																<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-dark text-hover-primary">Google Pixel 6 Pro</a>
															</td>
										
															<td class="text-end">#XVR-425</td>
											
															<td class="text-end">27 Dec, 2022</td>
											
															<td class="text-end">$1,060</td>
															
															<td class="text-end">
																<span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
															</td>
														
															<td class="text-end" data-order="124">
																<span class="text-dark fw-bolder">124 PCS</span>
															</td>
															
														</tr>
													</tbody>
											
												</table>
										
											</div>
									
										</div>
						
									</div>
							
								</div> -->
								<!--end::Row-->
							</div>
							<!--end::Container-->
						</div>


	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
	 
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Effort', 'Amount given'],
          ['This Month',     {{$everyMonth}}],
          ['This Year',     {{$everyYear}}],
          ['To Day',     {{$everyday}}],
        ]);

        var options = {
          pieHole: 0.5,
          pieSliceTextStyle: {
            color: 'white',
          },
		  backgroundColor: {
        fill: 'transparent',
        fillOpacity: 0.8
      },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
        chart.draw(data, options);
      }
    </script>


	<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["This Year", {{$everyYearOrder}}, ""],
        ["Ths Month", {{$everyMonthOrder}}, ""],
        ["This Day", {{$everydayOrder}}, ""]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "",
        width: 377,
        height: 260,
        bar: {groupWidth: "75%"},
        legend: { position: "none" },
		pieSliceTextStyle: {
            color: 'white',
          },
		  hAxis:{
			textStyle:{
				color: 'white',
				fill: 'white',
			  },
			},

		backgroundColor: {
        fill: 'transparent',
        fillOpacity: 0.8
      },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>


@endsection