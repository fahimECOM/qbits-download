@extends('frontend.user.dashboard.master')

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
													<a class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase " href="{{route ('support.center')}}">Overview</a>
												</li>
												<!--end::Nav item-->
												<!--begin::Nav item-->
												<li class="nav-item my-1">
													<a class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase " href="{{route ('support.ticket.list')}}">tickets</a>
												</li>
												<!--end::Nav item-->

												<!--begin::Nav item-->
												<li class="nav-item my-1">
													<a class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase " href="{{route('support.faq')}}">FAQ</a>
												</li>
												<!--end::Nav item-->
												<!--begin::Nav item-->
												<li class="nav-item my-1">
													<a class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase active" href="{{route('support.licenses')}}">Warranty</a>
												</li>
												<!--end::Nav item-->
												<!--begin::Nav item-->
												<li class="nav-item my-1">
													<a class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase" href="{{route('support.contact')}}">Contact US</a>
												</li>
												<!--end::Nav item-->
											</ul>
											<!--end::Nav-->
											<!--begin::Action-->
											<a href="{{route('support.ticket.create')}}"  class="btn btn-primary fw-bolder fs-8 fs-lg-base">Create Ticket</a>
											<!--end::Action-->
										</div>
										<!--end::Hero nav-->
									</div>
									<!--end::Hero body-->
								</div>
								<!--end::Hero card-->
								<!--begin::About card-->
								<div class="card">
									<!--begin::Body-->
									<div class="card-body p-10 p-lg-15" style="color:#cdcdde">
										<!--begin::Content main-->
										<div class="mb-14" >
											<!--begin::Heading-->
											<div class="mb-6">
												<!--begin::Title-->
												<h1 class="fs-2x  mb-4"></h1>
												<!--end::Title-->
												<!--begin::Text-->
												<div class="  fw-bold">Qbits provides support and services including repair and replacement based on the warranty policy. Upon purchase of the Qbits laptop, customers are provided with its original limited warranty. As per Qbits warranty policy, the date is issued from the day of purchase from the authorized dealer. The customer will get the services for the device or parts/components that are covered by the warranty policy. The service is provided only after being verified by contacting Qbits service centers and authorized service providers.

For Qbits Warranty Service, the customer shall be responsible to carry a valid warranty card along with the original invoice or sales slip indicating the date of purchase, dealer's name, model, and serial no. of the product.</div>
												<!--end::Text-->
											</div>
											<!--end::Heading-->
											<!--begin::Body-->
											<!--begin::Block-->
											<div class="mb-20 pb-lg-20">
												<!--begin::Title-->
												<h2 class="fw-bolder fs-5  mb-8"  style="color:#cdcdde">Qbits warranty terms and policies in brief</h2>
												<!--end::Title-->
												<!--begin::List-->
												<ul class=" fw-bold mb-6">
													<li>
														<span class="">Qbits service centers and authorized service providers provide immediate service for any component or hardware product that manifests a defect or imperfection in craftsmanship during the Limited Warranty Period.</span>
													</li>
													<li class="my-2">
														<span class="">Qbits service centers and authorized service providers offer warranty service for all the products subject to the terms and conditions set forth in this Limited Warranty. The Limited Warranty Period starts on the date of purchase from the Qbits website / authorized seller / dealers / distributor.</span>
													</li>
													<li class="my-2">
														<span class="">The support and services are provided by the Qbits service centers and authorized service providers only after verifying and proving that the product is still under warranty.</span>
													</li>
													<li class="my-2">
														<span class="">The device or parts/component shall be repaired only if they are under coverage mentioned in the warranty card.</span>
													</li>
													<li class="my-2">
														<span class="">Qbits Warranty policy only covers any defect in any parts/components that are being used to manufacture the product.</span>
													</li>
													<li class="my-2">
														<span class="">The customer will get the services at no cost only if the warranty is found valid and the device is purchased from Qbits website / authorized seller / dealers / distributor, provided warranty card along with original invoice or sales slip.</span>
													</li>
													<li class="my-2">
														<span class="">Qbits warranty service, provided by Qbits service centers and authorized service providers, will not be responsible for any defect or damage caused by accidents, drops, spills, floods, fires, or other natural disasters. The product will be considered excluded from the warranty policy and can be repaired only on a chargeable basis directly through the service center.</span>
													</li>
													<li class="my-2">
														<span class="">No claim shall be considered liable or Qbits shall not be responsible for any kind of losses or damages, records, information or data, or economic consequential damages including lost profits due to hardware and software failure, directly or indirectly.</span>
													</li>
													<li class="my-2">
														<span class="">The customers are expected to backup their data, for any loss of data during the repair process, Qbits Servicing Center will not be responsible for any loss of data.</span>
													</li>
													<li class="my-2">
														<span class="">If the product is repaired by any unauthorized service center, the warranty will be void and Qbits service centers and authorized service providers shall not be liable for reimbursements, claims, and damages that may result from the unauthorized repair of the product.

</span>
													</li>
													<li>
														<span class="">Qbits reserves the right to refuse a warranty if the original serial number or authentic information is removed, obliterated, altered, or changed from the original purchase of the product from the dealer.</span>
													</li>
												</ul>
												<!--end::List-->
												<!--begin::Text-->
												<!-- <div class="fs-4 fw-bold  mb-13">If users can free browse and use your website or Admin Panel is used only as interface(eCommerce site) to sell other's products you can use Regular license.
												<br />If you are going to use the item on one domain and multiple subdomains, you only require one Licence.(ex: www.
												<span class="text-dark">domain.com</span>/site1 – site2.
												<span class="text-dark">domain.com</span>– site.3.
												<span class="text-dark">domain.com</span>).</div> -->
												<!--end::Text-->
												<!--begin::Title-->
												<h2 class="fw-bolder fs-5  mb-7"  style="color:#cdcdde">Limitations</h2>
												<!--end::Title-->
												<!--begin::List-->
												<ul>
													<li>
														<span class=" fw-bold ">Qbits warranty does not cover any defect arising from incorrect installation, damage due to non-recommended softwares, in this case, it will be considered as Customer Induced Damage and the defect will be treated as out of warranty coverage.</span>
													</li>
													<li class="my-2">
														<span class=" fw-bold ">The warranty will be treated as invalid if any information, data, name, or seal the serial number that has been damaged or rendered, altered, or changed.</span>
													</li>
													<li class="my-2">
														<span class=" fw-bold "> Qbits warranty does not cover any defect or damage caused by improper handling/usage or any disassembly by end-user or non-authorized repair centers.</span>
													</li>
													<li class="my-2">
														<span class=" fw-bold ">Qbits Warranty will be invalid for any kind of damage due to inconsistent voltage or improper power supply.</span>
													</li>
													<li class="my-2">
														<span class=" fw-bold ">Qbits Warranty invalid if the damage is caused by accident, misuse, liquid spills, abuse, contamination, improper or inadequate maintenance.</span>
													</li>
													<li class="my-2">
														<span class=" fw-bold ">For the display modules, Qbits service centers and authorized service providers will not be liable if there are scratches or defects due to external causes.</span>
													</li>
													<li>
														<span class=" fw-bold ">Qbits service centers and authorized service providers are not responsible for damage or loss in transit.</span>
													</li>
												</ul>
												<!--end::List-->
											</div>
											<!--end::Block-->
											<!--end::Body-->
										</div>
										<!--end::Content main-->

									</div>
									<!--end::Body-->
								</div>
								<!--end::About card-->

							</div>
							<!--end::Container-->
						</div>					

@endsection