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
													<a class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase active" href="{{route ('admin.support.center')}}">Overview</a>
												</li>
												<!--end::Nav item-->
												<!--begin::Nav item-->
												<li class="nav-item my-1">
													<a class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase " href="{{route ('admin.support.ticket.list')}}">tickets</a>
												</li>
												<!--end::Nav item-->

												<!--begin::Nav item-->
												<li class="nav-item my-1">
													<a class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase " href="{{route('admin.support.faq')}}">FAQ</a>
												</li>
												<!--end::Nav item-->
												<!--begin::Nav item-->
												<li class="nav-item my-1">
													<a class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase" href="{{route('admin.support.licenses')}}">Licenses</a>
												</li>
												<!--end::Nav item-->
												<!--begin::Nav item-->
												<li class="nav-item my-1">
													<a class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase" href="{{route('admin.support.contact')}}">Contact US</a>
												</li>
												<!--end::Nav item-->
											</ul>
											<!--end::Nav-->
											<!--begin::Action-->
											<!-- <a href="{{route('support.ticket.create')}}"  class="btn btn-primary fw-bolder fs-8 fs-lg-base">Create Ticket</a> -->
											<!--end::Action-->
										</div>
										<!--end::Hero nav-->
									</div>
									<!--end::Hero body-->
								</div>
								<!--end::Hero card-->
								<!--begin::Row-->
								<div class="row gy-0 mb-6 mb-xl-12">
									<!--begin::Col-->
									<div class="col-md-6">
										<!--begin::Card-->
										<div class="card card-md-stretch me-xl-3 mb-md-0 mb-6">
											<!--begin::Body-->
											<div class="card-body p-10 p-lg-15">
												<!--begin::Header-->
												<div class="d-flex flex-stack mb-7">
													<!--begin::Title-->
													<h1 class="fw-bolder text-dark">Popular Tickets</h1>
													<!--end::Title-->
													<!--begin::Section-->
													<div class="d-flex align-items-center">
														<!--begin::Link-->
														<a href="https://keenthemes.com/support" class="text-primary fw-bolder me-1">Support</a>
														<!--begin::Link-->
														<!--begin::Arrow-->
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
														<span class="svg-icon svg-icon-2 svg-icon-primary">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
																<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
														<!--end::Arrow-->
													</div>
													<!--end::Section-->
												</div>
												<!--end::Header-->
												<!--begin::Accordion-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_support_1_1">
														<!--begin::Icon-->
														<div class="ms-n1 me-5">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon toggle-on svg-icon-primary svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
															<span class="svg-icon toggle-off svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</div>
														<!--end::Icon-->
														<!--begin::Section-->
														<div class="d-flex align-items-center flex-wrap">
															<!--begin::Title-->
															<h3 class="text-gray-800 fw-bold cursor-pointer me-3 mb-0">What admin theme does?</h3>
															<!--end::Title-->
															<!--begin::Label-->
															<span class="badge badge-light my-1 d-block">React</span>
															<!--end::Label-->
														</div>
														<!--end::Section-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_support_1_1" class="collapse show fs-6 ms-10">
														<!--begin::Block-->
														<div class="mb-4">
															<!--begin::Text-->
															<span class="text-muted fw-bold fs-5">By Keenthemes to save tons and more to time money projects are listed and outstanding</span>
															<!--end::Text-->
															<!--begin::Link-->
															<a href="#" class="fs-5 link-primary fw-bold">Check Out</a>
															<!--end::Link-->
														</div>
														<!--end::Block-->
													</div>
													<!--end::Content-->
												</div>
												<!--end::Body-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_support_1_2">
														<!--begin::Icon-->
														<div class="ms-n1 me-5">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon toggle-on svg-icon-primary svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
															<span class="svg-icon toggle-off svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</div>
														<!--end::Icon-->
														<!--begin::Section-->
														<div class="d-flex align-items-center flex-wrap">
															<!--begin::Title-->
															<h3 class="text-gray-800 fw-bold cursor-pointer me-3 mb-0">How Extended Licese works?</h3>
															<!--end::Title-->
															<!--begin::Label-->
															<span class="badge badge-light my-1 d-block">Laravel</span>
															<!--end::Label-->
														</div>
														<!--end::Section-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_support_1_2" class="collapse fs-6 ms-10">
														<!--begin::Block-->
														<div class="mb-4">
															<!--begin::Text-->
															<span class="text-muted fw-bold fs-5">By Keenthemes to save tons and more to time money projects are listed and outstanding</span>
															<!--end::Text-->
															<!--begin::Link-->
															<a href="#" class="fs-5 link-primary fw-bold">Check Out</a>
															<!--end::Link-->
														</div>
														<!--end::Block-->
													</div>
													<!--end::Content-->
												</div>
												<!--end::Body-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_support_1_3">
														<!--begin::Icon-->
														<div class="ms-n1 me-5">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon toggle-on svg-icon-primary svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
															<span class="svg-icon toggle-off svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</div>
														<!--end::Icon-->
														<!--begin::Section-->
														<div class="d-flex align-items-center flex-wrap">
															<!--begin::Title-->
															<h3 class="text-gray-800 fw-bold cursor-pointer me-3 mb-0">How to install on a local machine?</h3>
															<!--end::Title-->
															<!--begin::Label-->
															<span class="badge badge-light my-1 d-block">VueJS</span>
															<!--end::Label-->
														</div>
														<!--end::Section-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_support_1_3" class="collapse fs-6 ms-10">
														<!--begin::Block-->
														<div class="mb-4">
															<!--begin::Text-->
															<span class="text-muted fw-bold fs-5">By Keenthemes to save tons and more to time money projects are listed and outstanding</span>
															<!--end::Text-->
															<!--begin::Link-->
															<a href="#" class="fs-5 link-primary fw-bold">Check Out</a>
															<!--end::Link-->
														</div>
														<!--end::Block-->
													</div>
													<!--end::Content-->
												</div>
												<!--end::Body-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_support_1_4">
														<!--begin::Icon-->
														<div class="ms-n1 me-5">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon toggle-on svg-icon-primary svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
															<span class="svg-icon toggle-off svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</div>
														<!--end::Icon-->
														<!--begin::Section-->
														<div class="d-flex align-items-center flex-wrap">
															<!--begin::Title-->
															<h3 class="text-gray-800 fw-bold cursor-pointer me-3 mb-0">How can I import Google fonts?</h3>
															<!--end::Title-->
															<!--begin::Label-->
															<span class="badge badge-light my-1 d-block">Angular 9</span>
															<!--end::Label-->
														</div>
														<!--end::Section-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_support_1_4" class="collapse fs-6 ms-10">
														<!--begin::Block-->
														<div class="mb-4">
															<!--begin::Text-->
															<span class="text-muted fw-bold fs-5">By Keenthemes to save tons and more to time money projects are listed and outstanding</span>
															<!--end::Text-->
															<!--begin::Link-->
															<a href="#" class="fs-5 link-primary fw-bold">Check Out</a>
															<!--end::Link-->
														</div>
														<!--end::Block-->
													</div>
													<!--end::Content-->
												</div>
												<!--end::Body-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_support_1_5">
														<!--begin::Icon-->
														<div class="ms-n1 me-5">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon toggle-on svg-icon-primary svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
															<span class="svg-icon toggle-off svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</div>
														<!--end::Icon-->
														<!--begin::Section-->
														<div class="d-flex align-items-center flex-wrap">
															<!--begin::Title-->
															<h3 class="text-gray-800 fw-bold cursor-pointer me-3 mb-0">How long the license is valid?</h3>
															<!--end::Title-->
															<!--begin::Label-->
															<span class="badge badge-light my-1 d-block">Bootstrap 5</span>
															<!--end::Label-->
														</div>
														<!--end::Section-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_support_1_5" class="collapse fs-6 ms-10">
														<!--begin::Block-->
														<div class="mb-4">
															<!--begin::Text-->
															<span class="text-muted fw-bold fs-5">By Keenthemes to save tons and more to time money projects are listed and outstanding</span>
															<!--end::Text-->
															<!--begin::Link-->
															<a href="#" class="fs-5 link-primary fw-bold">Check Out</a>
															<!--end::Link-->
														</div>
														<!--end::Block-->
													</div>
													<!--end::Content-->
												</div>
												<!--end::Body-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_support_1_6">
														<!--begin::Icon-->
														<div class="ms-n1 me-5">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon toggle-on svg-icon-primary svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
															<span class="svg-icon toggle-off svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</div>
														<!--end::Icon-->
														<!--begin::Section-->
														<div class="d-flex align-items-center flex-wrap">
															<!--begin::Title-->
															<h3 class="text-gray-800 fw-bold cursor-pointer me-3 mb-0">How many end projects I can build?</h3>
															<!--end::Title-->
															<!--begin::Label-->
															<span class="badge badge-light my-1 d-block">PHP</span>
															<!--end::Label-->
														</div>
														<!--end::Section-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_support_1_6" class="collapse fs-6 ms-10">
														<!--begin::Block-->
														<div class="mb-4">
															<!--begin::Text-->
															<span class="text-muted fw-bold fs-5">By Keenthemes to save tons and more to time money projects are listed and outstanding</span>
															<!--end::Text-->
															<!--begin::Link-->
															<a href="#" class="fs-5 link-primary fw-bold">Check Out</a>
															<!--end::Link-->
														</div>
														<!--end::Block-->
													</div>
													<!--end::Content-->
												</div>
												<!--end::Body-->
												<!--end::Accordion-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-md-6">
										<!--begin::Card-->
										<div class="card card-md-stretch ms-xl-3">
											<!--begin::Body-->
											<div class="card-body p-10 p-lg-15">
												<!--begin::Header-->
												<div class="d-flex flex-stack mb-7">
													<!--begin::Title-->
													<h1 class="fw-bolder text-dark">FAQ</h1>
													<!--end::Title-->
													<!--begin::Section-->
													<div class="d-flex align-items-center">
														<!--begin::Link-->
														<a href="https://keenthemes.com/faqs" class="text-primary fw-bolder me-1">Full FAQ</a>
														<!--begin::Link-->
														<!--begin::Arrow-->
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
														<span class="svg-icon svg-icon-2 svg-icon-primary">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
																<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
														<!--end::Arrow-->
													</div>
													<!--end::Section-->
												</div>
												<!--end::Header-->
												<!--begin::Accordion-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_support_2_1">
														<!--begin::Icon-->
														<div class="ms-n1 me-5">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon toggle-on svg-icon-primary svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
															<span class="svg-icon toggle-off svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</div>
														<!--end::Icon-->
														<!--begin::Section-->
														<div class="d-flex align-items-center flex-wrap">
															<!--begin::Title-->
															<h3 class="text-gray-800 fw-bold cursor-pointer me-3 mb-0">What admin theme does?</h3>
															<!--end::Title-->
															<!--begin::Label-->
															<span class="badge badge-light my-1 d-none">Bootstrap</span>
															<!--end::Label-->
														</div>
														<!--end::Section-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_support_2_1" class="collapse show fs-6 ms-10">
														<!--begin::Block-->
														<div class="mb-4">
															<!--begin::Text-->
															<span class="text-muted fw-bold fs-5">By Keenthemes to save tons and more to time money projects are listed and outstanding</span>
															<!--end::Text-->
															<!--begin::Link-->
															<a href="#" class="d-none"></a>
															<!--end::Link-->
														</div>
														<!--end::Block-->
													</div>
													<!--end::Content-->
												</div>
												<!--end::Body-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_support_2_2">
														<!--begin::Icon-->
														<div class="ms-n1 me-5">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon toggle-on svg-icon-primary svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
															<span class="svg-icon toggle-off svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</div>
														<!--end::Icon-->
														<!--begin::Section-->
														<div class="d-flex align-items-center flex-wrap">
															<!--begin::Title-->
															<h3 class="text-gray-800 fw-bold cursor-pointer me-3 mb-0">How Extended Licese works?</h3>
															<!--end::Title-->
															<!--begin::Label-->
															<span class="badge badge-light my-1 d-none">General</span>
															<!--end::Label-->
														</div>
														<!--end::Section-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_support_2_2" class="collapse fs-6 ms-10">
														<!--begin::Block-->
														<div class="mb-4">
															<!--begin::Text-->
															<span class="text-muted fw-bold fs-5">By Keenthemes to save tons and more to time money projects are listed and outstanding</span>
															<!--end::Text-->
															<!--begin::Link-->
															<a href="#" class="d-none"></a>
															<!--end::Link-->
														</div>
														<!--end::Block-->
													</div>
													<!--end::Content-->
												</div>
												<!--end::Body-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_support_2_3">
														<!--begin::Icon-->
														<div class="ms-n1 me-5">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon toggle-on svg-icon-primary svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
															<span class="svg-icon toggle-off svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</div>
														<!--end::Icon-->
														<!--begin::Section-->
														<div class="d-flex align-items-center flex-wrap">
															<!--begin::Title-->
															<h3 class="text-gray-800 fw-bold cursor-pointer me-3 mb-0">How to install on a local machine?</h3>
															<!--end::Title-->
															<!--begin::Label-->
															<span class="badge badge-light my-1 d-none">React</span>
															<!--end::Label-->
														</div>
														<!--end::Section-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_support_2_3" class="collapse fs-6 ms-10">
														<!--begin::Block-->
														<div class="mb-4">
															<!--begin::Text-->
															<span class="text-muted fw-bold fs-5">By Keenthemes to save tons and more to time money projects are listed and outstanding</span>
															<!--end::Text-->
															<!--begin::Link-->
															<a href="#" class="d-none"></a>
															<!--end::Link-->
														</div>
														<!--end::Block-->
													</div>
													<!--end::Content-->
												</div>
												<!--end::Body-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_support_2_4">
														<!--begin::Icon-->
														<div class="ms-n1 me-5">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon toggle-on svg-icon-primary svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
															<span class="svg-icon toggle-off svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</div>
														<!--end::Icon-->
														<!--begin::Section-->
														<div class="d-flex align-items-center flex-wrap">
															<!--begin::Title-->
															<h3 class="text-gray-800 fw-bold cursor-pointer me-3 mb-0">How can I import Google fonts?</h3>
															<!--end::Title-->
															<!--begin::Label-->
															<span class="badge badge-light my-1 d-none">Angular</span>
															<!--end::Label-->
														</div>
														<!--end::Section-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_support_2_4" class="collapse fs-6 ms-10">
														<!--begin::Block-->
														<div class="mb-4">
															<!--begin::Text-->
															<span class="text-muted fw-bold fs-5">By Keenthemes to save tons and more to time money projects are listed and outstanding</span>
															<!--end::Text-->
															<!--begin::Link-->
															<a href="#" class="d-none"></a>
															<!--end::Link-->
														</div>
														<!--end::Block-->
													</div>
													<!--end::Content-->
												</div>
												<!--end::Body-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_support_2_5">
														<!--begin::Icon-->
														<div class="ms-n1 me-5">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon toggle-on svg-icon-primary svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
															<span class="svg-icon toggle-off svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</div>
														<!--end::Icon-->
														<!--begin::Section-->
														<div class="d-flex align-items-center flex-wrap">
															<!--begin::Title-->
															<h3 class="text-gray-800 fw-bold cursor-pointer me-3 mb-0">How long the license is valid?</h3>
															<!--end::Title-->
															<!--begin::Label-->
															<span class="badge badge-light my-1 d-none">Webpack</span>
															<!--end::Label-->
														</div>
														<!--end::Section-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_support_2_5" class="collapse fs-6 ms-10">
														<!--begin::Block-->
														<div class="mb-4">
															<!--begin::Text-->
															<span class="text-muted fw-bold fs-5">By Keenthemes to save tons and more to time money projects are listed and outstanding</span>
															<!--end::Text-->
															<!--begin::Link-->
															<a href="#" class="d-none"></a>
															<!--end::Link-->
														</div>
														<!--end::Block-->
													</div>
													<!--end::Content-->
												</div>
												<!--end::Body-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_support_2_6">
														<!--begin::Icon-->
														<div class="ms-n1 me-5">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon toggle-on svg-icon-primary svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
															<span class="svg-icon toggle-off svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</div>
														<!--end::Icon-->
														<!--begin::Section-->
														<div class="d-flex align-items-center flex-wrap">
															<!--begin::Title-->
															<h3 class="text-gray-800 fw-bold cursor-pointer me-3 mb-0">How many end projects I can build?</h3>
															<!--end::Title-->
															<!--begin::Label-->
															<span class="badge badge-light my-1 d-none">Laravel</span>
															<!--end::Label-->
														</div>
														<!--end::Section-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_support_2_6" class="collapse fs-6 ms-10">
														<!--begin::Block-->
														<div class="mb-4">
															<!--begin::Text-->
															<span class="text-muted fw-bold fs-5">By Keenthemes to save tons and more to time money projects are listed and outstanding</span>
															<!--end::Text-->
															<!--begin::Link-->
															<a href="#" class="d-none"></a>
															<!--end::Link-->
														</div>
														<!--end::Block-->
													</div>
													<!--end::Content-->
												</div>
												<!--end::Body-->
												<!--end::Accordion-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::Col-->
								</div>
								<!--end::Row-->
								<!--begin::Row-->
								<div class="row gy-0 mb-6 mb-xl-12">
									<!--begin::Col-->
									<div class="col-md-6">
										<!--begin::Card-->
										<div class="card card-md-stretch me-xl-3 mb-md-0 mb-6">
											<!--begin::Body-->
											<div class="card-body p-10 p-lg-15">
												<!--begin::Header-->
												<div class="d-flex flex-stack mb-7">
													<!--begin::Title-->
													<h1 class="fw-bolder text-dark">Tutorials</h1>
													<!--end::Title-->
													<!--begin::Section-->
													<div class="d-flex align-items-center">
														<!--begin::Link-->
														<a href="../../demo1/dist/apps/support-center/tutorials/list.html" class="text-primary fw-bolder me-1">All Tutorials</a>
														<!--begin::Link-->
														<!--begin::Arrow-->
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
														<span class="svg-icon svg-icon-2 svg-icon-primary">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
																<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
														<!--end::Arrow-->
													</div>
													<!--end::Section-->
												</div>
												<!--end::Header-->
												<!--begin::Accordion-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_support_3_1">
														<!--begin::Icon-->
														<div class="ms-n1 me-5">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon toggle-on svg-icon-primary svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
															<span class="svg-icon toggle-off svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</div>
														<!--end::Icon-->
														<!--begin::Section-->
														<div class="d-flex align-items-center flex-wrap">
															<!--begin::Title-->
															<h3 class="text-gray-800 fw-bold cursor-pointer me-3 mb-0">What admin theme does?</h3>
															<!--end::Title-->
															<!--begin::Label-->
															<span class="badge badge-light my-1 d-none">Bootstrap</span>
															<!--end::Label-->
														</div>
														<!--end::Section-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_support_3_1" class="collapse show fs-6 ms-10">
														<!--begin::Block-->
														<div class="mb-4">
															<!--begin::Text-->
															<span class="text-muted fw-bold fs-5">By Keenthemes to save tons and more to time money projects are listed and outstanding</span>
															<!--end::Text-->
															<!--begin::Link-->
															<a href="#" class="fs-5 link-primary fw-bold">Check Out</a>
															<!--end::Link-->
														</div>
														<!--end::Block-->
													</div>
													<!--end::Content-->
												</div>
												<!--end::Body-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_support_3_2">
														<!--begin::Icon-->
														<div class="ms-n1 me-5">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon toggle-on svg-icon-primary svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
															<span class="svg-icon toggle-off svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</div>
														<!--end::Icon-->
														<!--begin::Section-->
														<div class="d-flex align-items-center flex-wrap">
															<!--begin::Title-->
															<h3 class="text-gray-800 fw-bold cursor-pointer me-3 mb-0">How Extended Licese works?</h3>
															<!--end::Title-->
															<!--begin::Label-->
															<span class="badge badge-light my-1 d-none">General</span>
															<!--end::Label-->
														</div>
														<!--end::Section-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_support_3_2" class="collapse fs-6 ms-10">
														<!--begin::Block-->
														<div class="mb-4">
															<!--begin::Text-->
															<span class="text-muted fw-bold fs-5">By Keenthemes to save tons and more to time money projects are listed and outstanding</span>
															<!--end::Text-->
															<!--begin::Link-->
															<a href="#" class="fs-5 link-primary fw-bold">Check Out</a>
															<!--end::Link-->
														</div>
														<!--end::Block-->
													</div>
													<!--end::Content-->
												</div>
												<!--end::Body-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_support_3_3">
														<!--begin::Icon-->
														<div class="ms-n1 me-5">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon toggle-on svg-icon-primary svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
															<span class="svg-icon toggle-off svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</div>
														<!--end::Icon-->
														<!--begin::Section-->
														<div class="d-flex align-items-center flex-wrap">
															<!--begin::Title-->
															<h3 class="text-gray-800 fw-bold cursor-pointer me-3 mb-0">How to install on a local machine?</h3>
															<!--end::Title-->
															<!--begin::Label-->
															<span class="badge badge-light my-1 d-none">React</span>
															<!--end::Label-->
														</div>
														<!--end::Section-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_support_3_3" class="collapse fs-6 ms-10">
														<!--begin::Block-->
														<div class="mb-4">
															<!--begin::Text-->
															<span class="text-muted fw-bold fs-5">By Keenthemes to save tons and more to time money projects are listed and outstanding</span>
															<!--end::Text-->
															<!--begin::Link-->
															<a href="#" class="fs-5 link-primary fw-bold">Check Out</a>
															<!--end::Link-->
														</div>
														<!--end::Block-->
													</div>
													<!--end::Content-->
												</div>
												<!--end::Body-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_support_3_4">
														<!--begin::Icon-->
														<div class="ms-n1 me-5">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon toggle-on svg-icon-primary svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
															<span class="svg-icon toggle-off svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</div>
														<!--end::Icon-->
														<!--begin::Section-->
														<div class="d-flex align-items-center flex-wrap">
															<!--begin::Title-->
															<h3 class="text-gray-800 fw-bold cursor-pointer me-3 mb-0">How can I import Google fonts?</h3>
															<!--end::Title-->
															<!--begin::Label-->
															<span class="badge badge-light my-1 d-none">VueJS</span>
															<!--end::Label-->
														</div>
														<!--end::Section-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_support_3_4" class="collapse fs-6 ms-10">
														<!--begin::Block-->
														<div class="mb-4">
															<!--begin::Text-->
															<span class="text-muted fw-bold fs-5">By Keenthemes to save tons and more to time money projects are listed and outstanding</span>
															<!--end::Text-->
															<!--begin::Link-->
															<a href="#" class="fs-5 link-primary fw-bold">Check Out</a>
															<!--end::Link-->
														</div>
														<!--end::Block-->
													</div>
													<!--end::Content-->
												</div>
												<!--end::Body-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_support_3_5">
														<!--begin::Icon-->
														<div class="ms-n1 me-5">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon toggle-on svg-icon-primary svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
															<span class="svg-icon toggle-off svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</div>
														<!--end::Icon-->
														<!--begin::Section-->
														<div class="d-flex align-items-center flex-wrap">
															<!--begin::Title-->
															<h3 class="text-gray-800 fw-bold cursor-pointer me-3 mb-0">How long the license is valid?</h3>
															<!--end::Title-->
															<!--begin::Label-->
															<span class="badge badge-light my-1 d-none">Angular</span>
															<!--end::Label-->
														</div>
														<!--end::Section-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_support_3_5" class="collapse fs-6 ms-10">
														<!--begin::Block-->
														<div class="mb-4">
															<!--begin::Text-->
															<span class="text-muted fw-bold fs-5">By Keenthemes to save tons and more to time money projects are listed and outstanding</span>
															<!--end::Text-->
															<!--begin::Link-->
															<a href="#" class="fs-5 link-primary fw-bold">Check Out</a>
															<!--end::Link-->
														</div>
														<!--end::Block-->
													</div>
													<!--end::Content-->
												</div>
												<!--end::Body-->
												<!--end::Accordion-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-md-6">
										<!--begin::Card-->
										<div class="card card-md-stretch ms-xl-3">
											<!--begin::Body-->
											<div class="card-body pp-10 p-lg-15">
												<!--begin::Header-->
												<div class="d-flex flex-stack mb-7">
													<!--begin::Title-->
													<h1 class="fw-bolder text-dark">Videos</h1>
													<!--end::Title-->
													<!--begin::Section-->
													<div class="d-flex align-items-center">
														<!--begin::Link-->
														<a href="https://www.youtube.com/c/KeenThemesTuts/videos" target="_blank" class="text-primary fw-bolder me-1">All Videos</a>
														<!--begin::Link-->
														<!--begin::Arrow-->
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
														<span class="svg-icon svg-icon-2 svg-icon-primary">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
																<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
														<!--end::Arrow-->
													</div>
													<!--end::Section-->
												</div>
												<!--end::Header-->
												<!--begin::Video-->
												<div class="mb-3">
													<iframe class="embed-responsive-item card-rounded h-275px w-100" src="https://www.youtube.com/embed/TWdDZYNqlg4" allowfullscreen="allowfullscreen"></iframe>
												</div>
												<!--end::Video-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::Col-->
								</div>
								<!--end::Row-->
								<!--begin::Products Documentations-->
								<div class="card mb-2">
									<!--begin::Card body-->
									<div class="card-body p-10 p-lg-15">
										<!--begin::Title-->
										<h1 class="fw-bolder text-dark mb-12 ps-0">Products Documentations</h1>
										<!--end::Title-->
										<!--begin::Row-->
										<div class="row">
											<!--begin::Col-->
											<div class="col-sm-4">
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-6">
													<!--begin::Icon-->
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
													<span class="svg-icon svg-icon-2 ms-n1 me-4">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
													<!--end::Icon-->
													<!--begin::Subtitle-->
													<a href="#" class="fw-bold text-gray-800 text-hover-primary fs-3 m-0">Free Admin Dashboard</a>
													<!--end::Subtitle-->
												</div>
												<!--begin::Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-6">
													<!--begin::Icon-->
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
													<span class="svg-icon svg-icon-2 ms-n1 me-4">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
													<!--end::Icon-->
													<!--begin::Subtitle-->
													<a href="#" class="fw-bold text-gray-800 text-hover-primary fs-3 m-0">Bootstrap 5 Admin Template</a>
													<!--end::Subtitle-->
												</div>
												<!--begin::Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-6">
													<!--begin::Icon-->
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
													<span class="svg-icon svg-icon-2 ms-n1 me-4">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
													<!--end::Icon-->
													<!--begin::Subtitle-->
													<a href="#" class="fw-bold text-gray-800 text-hover-primary fs-3 m-0">Google Admin Dashboard</a>
													<!--end::Subtitle-->
												</div>
												<!--begin::Item-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-sm-4">
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-6">
													<!--begin::Icon-->
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
													<span class="svg-icon svg-icon-2 ms-n1 me-4">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
													<!--end::Icon-->
													<!--begin::Subtitle-->
													<a href="#" class="fw-bold text-gray-800 text-hover-primary fs-3 m-0">Free Vector Laravel Starter Kit</a>
													<!--end::Subtitle-->
												</div>
												<!--begin::Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-6">
													<!--begin::Icon-->
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
													<span class="svg-icon svg-icon-2 ms-n1 me-4">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
													<!--end::Icon-->
													<!--begin::Subtitle-->
													<a href="#" class="fw-bold text-gray-800 text-hover-primary fs-3 m-0">React Admin Dashboard</a>
													<!--end::Subtitle-->
												</div>
												<!--begin::Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-6">
													<!--begin::Icon-->
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
													<span class="svg-icon svg-icon-2 ms-n1 me-4">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
													<!--end::Icon-->
													<!--begin::Subtitle-->
													<a href="#" class="fw-bold text-gray-800 text-hover-primary fs-3 m-0">HTML Admin Dashboard</a>
													<!--end::Subtitle-->
												</div>
												<!--begin::Item-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-sm-4">
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-6">
													<!--begin::Icon-->
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
													<span class="svg-icon svg-icon-2 ms-n1 me-4">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
													<!--end::Icon-->
													<!--begin::Subtitle-->
													<a href="#" class="fw-bold text-gray-800 text-hover-primary fs-3 m-0">Best VueJS Admin Template</a>
													<!--end::Subtitle-->
												</div>
												<!--begin::Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-6">
													<!--begin::Icon-->
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
													<span class="svg-icon svg-icon-2 ms-n1 me-4">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
													<!--end::Icon-->
													<!--begin::Subtitle-->
													<a href="#" class="fw-bold text-gray-800 text-hover-primary fs-3 m-0">Forest Front-end Template</a>
													<!--end::Subtitle-->
												</div>
												<!--begin::Item-->
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
									</div>
									<!--end::Card body-->
								</div>
								<!--end::Products Documentations-->
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
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
															<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
												<!--end::Close-->
											</div>
											<!--begin::Modal header-->
											<!--begin::Modal body-->
											<div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
												<!--begin:Form-->
												<form id="kt_modal_new_ticket_form" class="form" action="#">
													<!--begin::Heading-->
													<div class="mb-13 text-center">
														<!--begin::Title-->
														<h1 class="mb-3">Create Ticket</h1>
														<!--end::Title-->
														<!--begin::Description-->
														<div class="text-gray-400 fw-bold fs-5">If you need more info, please check
														<a href="" class="fw-bolder link-primary">Support Guidelines</a>.</div>
														<!--end::Description-->
													</div>
													<!--end::Heading-->
													<!--begin::Input group-->
													<div class="d-flex flex-column mb-8 fv-row">
														<!--begin::Label-->
														<label class="d-flex align-items-center fs-6 fw-bold mb-2">
															<span class="required">Subject</span>
															<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a subject for your issue"></i>
														</label>
														<!--end::Label-->
														<input type="text" class="form-control form-control-solid" placeholder="Enter your ticket subject" name="subject" />
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="row g-9 mb-8">
														<!--begin::Col-->
														<div class="col-md-6 fv-row">
															<label class="required fs-6 fw-bold mb-2">Product</label>
															<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a product" name="product">
																<option value="">Select a product...</option>
																<option value="1">HTML Theme</option>
																<option value="1">Angular App</option>
																<option value="1">Vue App</option>
																<option value="1">React Theme</option>
																<option value="1">Figma UI Kit</option>
																<option value="3">Laravel App</option>
																<option value="4">Blazor App</option>
																<option value="5">Django App</option>
															</select>
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col-md-6 fv-row">
															<label class="required fs-6 fw-bold mb-2">Assign</label>
															<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="user">
																<option value="">Select a user...</option>
																<option value="1">Karina Clark</option>
																<option value="2">Robert Doe</option>
																<option value="3">Niel Owen</option>
																<option value="4">Olivia Wild</option>
																<option value="5">Sean Bean</option>
															</select>
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="row g-9 mb-8">
														<!--begin::Col-->
														<div class="col-md-6 fv-row">
															<label class="required fs-6 fw-bold mb-2">Status</label>
															<select class="form-select form-select-solid" data-control="select2" data-placeholder="Open" data-hide-search="true">
																<option value=""></option>
																<option value="1" selected="selected">Open</option>
																<option value="2">Pending</option>
																<option value="3">Resolved</option>
																<option value="3">Closed</option>
															</select>
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col-md-6 fv-row">
															<label class="required fs-6 fw-bold mb-2">Due Date</label>
															<!--begin::Input-->
															<div class="position-relative d-flex align-items-center">
																<!--begin::Icon-->
																<div class="symbol symbol-20px me-4 position-absolute ms-4">
																	<span class="symbol-label bg-secondary">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																		<span class="svg-icon">
																			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																				<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
																				<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
																				<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
																				<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</span>
																</div>
																<!--end::Icon-->
																<!--begin::Datepicker-->
																<input class="form-control form-control-solid ps-12" placeholder="Select a date" name="due_date" />
																<!--end::Datepicker-->
															</div>
															<!--end::Input-->
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="d-flex flex-column mb-8 fv-row">
														<label class="fs-6 fw-bold mb-2">Description</label>
														<textarea class="form-control form-control-solid" rows="4" name="description" placeholder="Type your ticket description"></textarea>
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="fv-row mb-8">
														<label class="fs-6 fw-bold mb-2">Attachments</label>
														<!--begin::Dropzone-->
														<div class="dropzone" id="kt_modal_create_ticket_attachments">
															<!--begin::Message-->
															<div class="dz-message needsclick align-items-center">
																<!--begin::Icon-->
																<!--begin::Svg Icon | path: icons/duotune/files/fil010.svg-->
																<span class="svg-icon svg-icon-3hx svg-icon-primary">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM14.5 12L12.7 9.3C12.3 8.9 11.7 8.9 11.3 9.3L10 12H11.5V17C11.5 17.6 11.4 18 12 18C12.6 18 12.5 17.6 12.5 17V12H14.5Z" fill="currentColor" />
																		<path d="M13 11.5V17.9355C13 18.2742 12.6 19 12 19C11.4 19 11 18.2742 11 17.9355V11.5H13Z" fill="currentColor" />
																		<path d="M8.2575 11.4411C7.82942 11.8015 8.08434 12.5 8.64398 12.5H15.356C15.9157 12.5 16.1706 11.8015 15.7425 11.4411L12.4375 8.65789C12.1875 8.44737 11.8125 8.44737 11.5625 8.65789L8.2575 11.4411Z" fill="currentColor" />
																		<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
																<!--end::Icon-->
																<!--begin::Info-->
																<div class="ms-4">
																	<h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload.</h3>
																	<span class="fw-bold fs-7 text-gray-400">Upload up to 10 files</span>
																</div>
																<!--end::Info-->
															</div>
														</div>
														<!--end::Dropzone-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="mb-15 fv-row">
														<!--begin::Wrapper-->
														<div class="d-flex flex-stack">
															<!--begin::Label-->
															<div class="fw-bold me-5">
																<label class="fs-6">Notifications</label>
																<div class="fs-7 text-gray-400">Allow Notifications by Phone or Email</div>
															</div>
															<!--end::Label-->
															<!--begin::Checkboxes-->
															<div class="d-flex align-items-center">
																<!--begin::Checkbox-->
																<label class="form-check form-check-custom form-check-solid me-10">
																	<input class="form-check-input h-20px w-20px" type="checkbox" name="notifications[]" value="email" checked="checked" />
																	<span class="form-check-label fw-bold">Email</span>
																</label>
																<!--end::Checkbox-->
																<!--begin::Checkbox-->
																<label class="form-check form-check-custom form-check-solid">
																	<input class="form-check-input h-20px w-20px" type="checkbox" name="notifications[]" value="phone" />
																	<span class="form-check-label fw-bold">Phone</span>
																</label>
																<!--end::Checkbox-->
															</div>
															<!--end::Checkboxes-->
														</div>
														<!--end::Wrapper-->
													</div>
													<!--end::Input group-->
													<!--begin::Actions-->
													<div class="text-center">
														<button type="reset" id="kt_modal_new_ticket_cancel" class="btn btn-light me-3">Cancel</button>
														<button type="submit" id="kt_modal_new_ticket_submit" class="btn btn-primary">
															<span class="indicator-label">Submit</span>
															<span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
														</button>
													</div>
													<!--end::Actions-->
												</form>
												<!--end:Form-->
											</div>
											<!--end::Modal body-->
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