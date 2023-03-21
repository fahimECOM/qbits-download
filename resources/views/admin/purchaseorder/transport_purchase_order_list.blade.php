{{-- @php
    dd($transorders);
@endphp --}}
@extends('admin.master')

@section('admin-content')


{{-- @php
  dd($orders->productName[0]->name);  
@endphp

@php

dd($orders);

@endphp --}}





<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-fluid" id="kt_content_container">
     <!--begin::Card-->
     <div class="card">
             <!--begin::Card header-->
             <div class="card-header border-0 pt-6">
                 <!--begin::Card title-->
                 <div class="card-title">
                     <!--begin::Search-->
                     <div class="d-flex align-items-center position-relative my-1">
                         <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                         <span class="svg-icon svg-icon-1 position-absolute ms-6">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                 <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                 <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                             </svg>
                         </span>
                         <!--end::Svg Icon-->
                         <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Purchase Order" />
                     </div>
                     <!--end::Search-->
                 </div>
                 <!--begin::Card title-->
                 <!--begin::Card toolbar-->
                 <div class="card-toolbar">
                     {{-- <!--begin::Toolbar-->
                     <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                         <!--begin::Filter-->
                    
                         <!--begin::Add customer-->
                         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-modal-header="Add a Miller" data-bs-target="#kt_modal_add_customer">Add Miller</button>
                         <!--end::Add customer-->
                     </div>
                     <!--end::Toolbar--> --}}
                     <!--begin::Group actions-->
                     <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                         <div class="fw-bolder me-5">
                         <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
                         <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
                     </div>
                     <!--end::Group actions-->
                 </div>
                 <!--end::Card toolbar-->
             </div>
             <!--end::Card header-->
             <!--begin::Card body-->
             <div class="card-body pt-0">
                 <!--begin::Table-->
                 <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                     <!--begin::Table head-->
                     <thead>
                         <!--begin::Table row-->
                         <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                             <th class="w-10px pe-2">
                                 <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                     <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
                                 </div>
                             </th>
                             <th class="min-w-125px">Name</th>
                             <th class="min-w-125px">Product Name</th>
                             <th class="min-w-125px">Payment Method</th>
                             <th class="min-w-125px">Payment Status</th>
                             <th class="min-w-125px">Order Status</th>
                             <th class="text-end min-w-70px">Actions</th>
                         </tr>
                         <!--end::Table row-->
                     </thead>
                     <!--end::Table head-->
                     <!--begin::Table body-->
                     <tbody class="fw-bold text-gray-600">
                         @foreach($transorders as $key=>$transorder)
                         <tr>
                             <!--begin::Checkbox-->
                             <td>
                                 <div class="form-check form-check-sm form-check-custom form-check-solid">
                                     <input class="form-check-input" type="checkbox" value="1" />
                                 </div>
                             </td>
                             <!--end::Checkbox-->
                             <!--begin::Name=-->
                             <td>


                                 <a href="../../demo7/dist/apps/customers/view.html" class="text-gray-800 text-hover-primary mb-1">{{ $transorders[$key]->user_id}}</a>
                             </td>
                             <td>

                                {{-- @foreach ($orders[0]->productName as $object)
                                    {{ $object->name }}
                                @endforeach --}}

                                



                                {{-- @foreach ($order->productName  as $item => $value)
                                        {{ $value->name }}
                                @endforeach --}}


                             </td>
                             <!--end::Name=-->
                             <!--begin::Email=-->
                             <td>
                                 <a href="#" class="text-gray-600 text-hover-primary mb-1">{{ $transorders[$key]->agent_id}}</a>
                             </td>
                             <!--end::Email=-->
                             <!--begin::Company=-->
                             <td>{{ $transorders[$key]->delivery_status}}</td>
                             <!--end::Company=-->
                             <!--begin::Payment method=-->
                             <td data-filter="mastercard">{{ $transorders[$key]->order_type}}</td>
                             <!--end::Payment method=-->
                             <!--begin::Date=-->
                             {{-- <td>{{ $miller->created_at}}</td> --}}
                             <!--end::Date=-->
                             <!--begin::Action=-->
                             <td class="text-end">
                                 <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                 <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                 <span class="svg-icon svg-icon-5 m-0">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                         <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                     </svg>
                                 </span>
                                 <!--end::Svg Icon--></a>
                                 <!--begin::Menu-->
                                 <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                     {{-- <!--begin::Menu item-->
                                     <div class="menu-item px-3">
                                         <a href="../../demo7/dist/apps/customers/view.html" class="menu-link px-3">View</a>
                                     </div>
                                     <!--end::Menu item--> --}}
                                     <!--begin::Menu item-->
                                     <div class="menu-item px-3">
                                        <a href=""> <span class="menu-link px-3" data-kt-customer-table-filter="edit_miller_row" data-ecc-route="" data-modal-header="Update a Purchase Order" data-id="">Edit</span></a>
                                     </div>
                                     <!--end::Menu item-->
                                     <!--begin::Menu item-->
                                     <div class="menu-item px-3">
                                         <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row" data-ecc-route="#" data-id="#">Delete</a>
                                     </div>
                                     <!--end::Menu item-->
                                 </div>
                                 <!--end::Menu-->
                             </td>
                             <!--end::Action=-->
                         </tr>
                         @endforeach
 
                     </tbody>
                     <!--end::Table body-->
                 </table>
                 <!--end::Table-->
             </div>
             <!--end::Card body-->
         </div>
         <!--end::Card-->
         <!--begin::Modals-->
         <!--begin::Modal - Customers - Add-->
         <div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
             <!--begin::Modal dialog-->
             <div class="modal-dialog modal-dialog-centered mw-650px">
                 <!--begin::Modal content-->
                 <div class="modal-content">
                     <!--begin::Form-->
                     <form class="form" action="{{ route('miller.store')}}" id="kt_modal_add_customer_form" method="POST">
                         @csrf
                         <!--begin::Modal header-->
                         <div class="modal-header" id="kt_modal_add_customer_header">
                             <!--begin::Modal title-->
                             <h2 class="fw-bolder">Add a Miller</h2>
                             <!--end::Modal title-->
                             <!--begin::Close-->
                             <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                                 <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                 <span class="svg-icon svg-icon-1">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                         <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                         <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                     </svg>
                                 </span>
                                 <!--end::Svg Icon-->
                             </div>
                             <!--end::Close-->
                         </div>
                         <!--end::Modal header-->
                         
                     </form>
                     <!--end::Form-->
                 </div>
             </div>
         </div>
         <!--end::Modal - Customers - Add-->
         <!--end::Modals-->
     </div>
     <!--end::Container-->
 </div>
 <!--end::Content-->

@endsection



