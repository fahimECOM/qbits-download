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
												
												<!-- <li class="nav-item my-1">
													<a class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase" href="{{route ('admin.support.center')}}">Overview</a>
												</li> -->
												
												
												<li class="nav-item my-1">
													<a class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase active" href="{{route ('admin.support.ticket.list')}}">tickets</a>
												</li>
												
											</ul>
										</div>
										<!--end::Hero nav-->
									</div>
									<!--end::Hero body-->
								</div>
								<!--end::Hero card-->
						<!--begin::Card-->
						<div class="card">
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Products-->
								<div class="card card-flush">
									<!--begin::Card header-->
									<div class="card-header align-items-center py-5 gap-2 gap-md-5">
										<!--begin::Card title-->
										<div class="card-title">
											<!--begin::Search-->
											<div class="d-flex align-items-center position-relative my-1">
												<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
												<span class="svg-icon svg-icon-1 position-absolute ms-4">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
														<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
												<input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Product" />
											</div>
											<!--end::Search-->
										</div>
										<!--end::Card title-->
										<!--begin::Card toolbar-->
										<div class="card-toolbar flex-row-fluid justify-content-end gap-5">
											<div class="w-100 mw-150px">
												<!--begin::Select2-->
												<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-product-filter="status">
													<option></option>
													<option value="all">All</option>
													<option value="published">Published</option>
													<option value="scheduled">Scheduled</option>
													<option value="inactive">Inactive</option>
												</select>
												<!--end::Select2-->
											</div>

										</div>
										<!--end::Card toolbar-->
									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div class="card-body pt-0">
										<!--begin::Table-->
										<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
											<!--begin::Table head-->
											<thead>
												<!--begin::Table row-->
												<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
													<th class="">

													</th>
													<th class="text-start min-w-100px">Traked ID</th>
													<th class="text-start min-w-100px">Case Title</th>
													<th class=""></th>
													<th class="text-start min-w-100px">Case Status</th>
													<th class=""></th>
													<th class="text-start min-w-100px">Created At</th>
													@if(App\Models\User::hasPermission(["view_support_ticket","response_support_ticket"]))
														<th class="text-start min-w-70px">Actions</th>
													@else
														<th class=""></th>
													@endif
												</tr>
												<!--end::Table row-->
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody class="fw-bold text-gray-600">
											@foreach($list as $key=>$lists)
												<!--begin::Table row-->
												<tr>
													<!--begin::Checkbox-->
													<td>

													</td>
													<!--end::Checkbox-->
													<!--begin::Category=-->
													<td>
														<div class="d-flex">
															<div class="">
																<!--begin::Title-->
																<a  class="text-gray-800 text-hover-primary fs-5 fw-bolder" data-kt-ecommerce-product-filter="product_name">{{$lists->Tracking_number}}</a>
																<!--end::Title-->
															</div>
														</div>
													</td>
													<!--end::Category=-->
													<!--begin::SKU=-->
													<td class="text-start pe-0">
														<span class="fw-bolder">{{$lists->subject}} </span>
													</td>

													<td></td>
													<td class="text-start pe-0" data-order="Published">
														<!--begin::Badges-->
														@if($lists->status == "Open")
														<div class="badge badge-light-success">{{$lists->status}}</div>
														@elseif($lists->status == "Processing")
														<div class="badge badge-light-warning ">{{$lists->status}}</div>
														@elseif($lists->status == "Close")
														<div class="badge badge-light-danger">{{$lists->status}}</div>
														@endif
														<!--end::Badges-->
													</td>
													<td class="text-start pe-0" data-order="rating-5">

											</td>
													<td class="text-start pe-0">
														@php
														$date = date('d',strtotime($lists->date));
														$enddate = date('d');
														$month = date('m',strtotime($lists->date));
														$endmonth = date('m');
														$day = $enddate-$date ;
														$month = $endmonth- $month;
														@endphp
														@if($month == 0)
															<span class="fw-bolder text-dark">{{$day}} DAY Ago </span>
														
														@else
															<span class="fw-bolder text-dark"> {{$month}} Month Ago </span>
														
														@endif
													</td>
													<!--end::Status=-->

													<!--begin::Action=-->
													@if(App\Models\User::hasPermission(["view_support_ticket","response_support_ticket"]))
														<td class="text-start">
															<a href="{{ route('admin.support.ticket.userInfo',$lists->id)}}" class="btn btn-sm btn-light btn-active-light-primary">View Details</a>
														</td>
													@else
														<td class=""></td>
													@endif
													<!--end::Action=-->

												</tr>
												<!--end::Table row-->
											@endforeach
											</tbody>
											<!--end::Table body-->
										</table>
										<!--end::Table-->
									</div>
									<!--end::Card body-->
								</div>
								<!--end::Products-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
						</div>
						</div>
							
		    </div>				

@endsection