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
													<a class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase" href="{{route ('admin.support.center')}}">Overview</a>
												</li>
												<!--end::Nav item-->
												<!--begin::Nav item-->
												<li class="nav-item my-1">
													<a class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase active" href="{{route ('admin.support.ticket.list')}}">tickets</a>
												</li>
												<!--end::Nav item-->
												<!--begin::Nav item-->
												<!--end::Nav item-->
												<!--begin::Nav item-->
												<li class="nav-item my-1">
													<a class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase" href="{{route('admin.support.faq')}}">FAQ</a>
												</li>
												<!--end::Nav item-->
												<!--begin::Nav item-->
												<li class="nav-item my-1">
													<a class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase "  href="{{route('admin.support.licenses')}}">Licenses</a>
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

	<form action="{{route('admin.support.ticket.status',$Ticket->id)}}" method="POST" enctype="multipart/form-data">
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
					<input type="text" class="form-control form-control-solid" placeholder="Your Name" value="{{$Ticket->name}}" readonly  />
					@error('name')<span class="text-danger">{{$message}}</span>@enderror
				</div>
				<div class="col-md-6 fv-row">
					<label class="required fs-6 fw-bold mb-2">Email</label>
					@error('email')<span class="text-danger">{{$message}}</span>@enderror
					<input type="text" class="form-control form-control-solid" placeholder="Your Email" value="{{$Ticket->email}}" readonly   />
				</div>
				<!--end::Col-->
				</div>
				<div class="d-flex flex-column mb-8 fv-row">
							<!--begin::Label-->
						<label class="d-flex align-items-center fs-6 fw-bold mb-2">
								<span class="required">Subject</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a subject for your issue"></i>
						</label>
							<!--end::Label-->
					<input type="text" class="form-control form-control-solid" placeholder="Enter your ticket subject" value="{{$Ticket->subject}}" readonly  autocomplete='off'  />
					@error('subject')<span class="text-danger">{{$message}}</span>@enderror
				</div>
					<!--begin::Input group-->
						<div class="row g-9 mb-8">
							 <!--begin::Col-->
							<div class="col-md-6 fv-row">
								<label class="required fs-6 fw-bold mb-2">Product Catagory</label>
                                <input type="text" class="form-control form-control-solid" value="{{$Ticket->product_catagory}}" readonly placeholder="Product Name" />
							</div>
							 <!--end::Col-->
							 <!--begin::Col-->
							<div class="col-md-6 fv-row">
								<label class="required fs-6 fw-bold mb-2">Product Name</label>
									<input type="text" class="form-control form-control-solid" value="{{$Ticket->product_name}}" readonly placeholder="Product Name" />
							</div>
							 <!--end::Col-->
						</div>
					<!--end::Input group-->
					<!--begin::Input group-->
						<div class="row g-9 mb-8">
							<!--begin::Col-->
							<div class="col-md-6 fv-row">
								<label class="required fs-6 fw-bold mb-2">Status</label>
                                <select class="form-select form-select-solid"   data-control="select2" data-hide-search="true" data-placeholder="Select a product" name="status">
										<option  value="Open" {{ $Ticket->status == 'Open' ? 'selected' : '' }}>OPEN</option>
										<option  value="Processing" {{ $Ticket->status == 'Processing' ? 'selected' : '' }}>Processing</option>
										<option  value="Close" {{ $Ticket->status == 'Close' ? 'selected' : '' }}>CLOSE</option>
									</select>
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col-md-6 fv-row">

									<label class="required fs-6 fw-bold mb-2">Date</label>
									<!--begin::Input-->
									<div class="position-relative d-flex align-items-center">
									<!--begin::Datepicker-->
										<input class="form-control form-control-solid ps-12" value="{{date('d M Y',strtotime($Ticket->date))}}" placeholder="Date" readonly/>
									<!--end::Datepicker-->
									</div>
									<!--end::Input-->
							</div>
							<!--end::Col-->
						</div>
						<!--end::Input group-->

				<div class="d-flex flex-column mb-8 fv-row">
					<label class="fs-6 fw-bold mb-2">Description</label>
					<textarea class="form-control form-control-solid" rows="4" name="message" readonly placeholder="Type your ticket description">{{$Ticket->description}}</textarea>
					@error('subject')<span class="text-danger">{{$message}}</span>@enderror
				</div>
				<div class="d-flex flex-column mb-8 fv-row">
														<label class="fs-6 fw-bold mb-2">Photos</label>
														<!--begin::Media-->
														<div class="card card-flush py-4">
                                                        @php
	 														 $photo = explode('|', $Ticket->photo);
	  														// dd($photo);
  															@endphp
														<div class="card-body text-center pt-0">
													<!--begin::Image input-->
													@foreach ($photo as $key=>$photos)
													<div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true" style="">
														<!--begin::Preview existing avatar-->
														
														<div class="image-input-wrapper w-150px h-150px" style="background-image: url(/{{$photos}})" >

													</div>

														</div>
														@endforeach
																<!--end::Image input-->
															<!--begin::Description-->

														</div>
														<!--end::Media-->
													</div>
				<div class="text-center">
					<button type="reset" id="kt_modal_new_ticket_cancel" class="btn btn-light me-3">Cancel</button>
						<button type="submit" id="kt_modal_new_ticket_submit" class="btn btn-primary">
							<span class="indicator-label">Submit</span>
							<span class="indicator-progress">Please wait...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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