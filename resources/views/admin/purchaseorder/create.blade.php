@extends('admin.master')

@section('admin-content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-fluid" id="kt_content_container">
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Content-->
            <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body p-12">
                        <!--begin::Form-->
                        <form action="{{ route('purchaseorder.store')}}" method="POST" id="kt_invoice_form">
                            @csrf
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-start flex-xxl-row">
                                <!--begin::Input group-->
                                <div class="d-flex align-items-center flex-equal fw-row me-4 order-2" data-bs-toggle="tooltip" data-bs-trigger="hover">
                                    <!--begin::Date-->
                                    <div class="fs-6 fw-bolder text-gray-700 text-nowrap">
                                        <img alt="Logo" src="{{ asset('backend/assets/media/logos/logo-1-dark.svg') }}"><br><br>
                                        <span>Address:</span>
                                    </div>
                                    <!--end::Date-->
                                    <!--begin::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4" data-bs-toggle="tooltip" data-bs-trigger="hover">
                                    <span class="fs-2x fw-bolder text-gray-800">Purchase Order</span>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="d-flex align-items-center justify-content-end flex-equal order-3 fw-row" data-bs-toggle="tooltip" data-bs-trigger="hover">
                                    <!--begin::Date-->
                                    {{-- <div class="fs-6 fw-bolder text-gray-700 text-nowrap" >
                                        <span>P. O. No.:</span><br><br>
                                        <span>P. O. Date:</span>
                                    </div> --}}
                                    <!--end::Date-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Top-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-10"></div>
                            <!--end::Separator-->
                            <!--begin::Wrapper-->
                            <div class="mb-0">
                                <!--begin::Row-->
                                <div class="row gx-10 mb-5">
                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                                            <li class="nav-item">
                                                <a class="nav-link text-gray-700 fw-bolder active" data-bs-toggle="tab" href="#kt_tab_pane_1">Vendor</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-gray-700 fw-bolder" data-bs-toggle="tab" href="#kt_tab_pane_2">Transport</a>
                                            </li>
                                            {{-- <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_3">Link 3</a>
                                            </li> --}}
                                        </ul>
                                        <div class="">
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_1">
                                                    <div class="mb-5">
                                                        <!--begin::Input group-->
                                                            <div class="input-group d-flex flex-column mb-7 fv-row" id="vendor_name">
                                                                <!--begin::Input-->
                                                                <select name="vendor_id" id="vendor_id" class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-hide-search="false" data-dropdown-parent="#vendor_name">
                                                                    <option></option>
                                                                    @foreach($vendors as $vendor)
                                                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <!--end::Input-->
            
                                                                <div id="vendor_show_id"></div>
                                                            </div>
                                                    <!--end::Input group-->
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel" aria-labelledby="kt_tab_pane_2">
                                                    <div class="mb-5">
                                                        <!--begin::Input group-->
                                                            <div class="input-group d-flex flex-column mb-7 fv-row" id="transport_name">
                                                                <!--begin::Input-->
                                                                <select name="transport_id" id="transport_id" class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-hide-search="false" data-dropdown-parent="#transport_name">
                                                                    <option></option>
                                                                    @foreach($transports as $transport)
                                                                        <option value="{{ $transport->id }}">{{ $transport->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <!--end::Input-->
            
                                                                <div id="transport_show_id"></div>
                                                            </div>
                                                    <!--end::Input group-->
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel" aria-labelledby="kt_tab_pane_3">
                                                    ...
                                                </div>
                                            </div>
                                        </div>

                                        <!--end::Input group-->
                                        {{-- <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" class="form-control form-control-solid" placeholder="Email" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="Who is this invoice from?"></textarea>
                                        </div>
                                        <!--end::Input group--> --}}
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Ship To</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">

                                            <span>
                                                YOLO Edible Oil Limited 
                                                    Address  : 293/1, Sanarpar, Dholeshor,East Dogair, Demra , Dhaka
                                            </span>

                                            {{-- <input type="text" class="form-control form-control-solid" placeholder="Name" /> --}}
                                        </div>
                                        <!--end::Input group-->
                                        {{-- <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" class="form-control form-control-solid" placeholder="Email" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="What is this invoice for?"></textarea>
                                        </div>
                                        <!--end::Input group--> --}}
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Table wrapper-->
                                <div class="table-responsive mb-10" id="kt_tab_pane_1">
                                    <!--begin::Table-->

                                        <table class="table g-5 gs-0 mb-0 fw-bolder text-gray-700" data-kt-element="items" id="item_table">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="border-bottom fs-7 fw-bolder text-gray-700 text-uppercase">
                                                    <th class="min-w-300px w-475px">Item</th>
                                                    <th class="min-w-100px w-100px">QTY Type</th>
                                                    <th class="min-w-100px w-100px">QTY</th>
                                                    <th class="min-w-150px w-150px">Price</th>
                                                    <th class="min-w-100px w-150px text-end">Total</th>
                                                    <th class="min-w-75px w-75px text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                <tr class="border-bottom border-bottom-dashed" data-kt-element="item" id="raw_material">
                                                    <td class="pe-7">
                                                        <select name="name[]" id="material_id" class="form-select form-select-solid mb-2 product_type_selection" data-control="select2" data-placeholder="Select an option" data-hide-search="false" data-dropdown-parent="#raw_material">
                                                            <option></option>
                                                            @foreach($products as $product)
                                                                <option value="{{ $product->name}}">{{ $product->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        {{-- <input type="text" class="form-control form-control-solid mb-2" name="name[]" placeholder="Item name" /> --}}
                                                        <input type="text" class="form-control form-control-solid" name="description[]" placeholder="Description" />
                                                    </td>
    
                                                    <td>
                                                        <select id="unit_type" name="unit[]" class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-hide-search="true">
                                                            {{-- <option></option>
                                                            <option value="Gram">Gram</option>
                                                            <option value="Piece">Piece</option> --}}
                                                        </select>
                                                    </td>
    
                                                
                                                    <td class="ps-0">
                                                        <input class="form-control form-control-solid" type="number" min="1" name="quantity[]" placeholder="1" value="1" data-kt-element="quantity" />
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control form-control-solid text-end"  name="price[]" placeholder="0.00" value="0.00" data-kt-element="price" />
                                                    </td>
                                                    <td class="pt-8 text-end text-nowrap">$
                                                    <span data-kt-element="total">0.00</span></td>
                                                    <td class="pt-5 text-end">
                                                        <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-kt-element="remove-item">
                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <!--end::Table body-->
                                            <!--begin::Table foot-->
                                            <tfoot>
                                                <tr class="border-top border-top-dashed align-top fs-6 fw-bolder text-gray-700">
                                                    <th class="text-primary">
                                                        <button class="btn btn-link py-1" data-kt-element="add-item">Add item</button>
                                                    </th>
                                                    <th colspan="2" class="border-bottom border-bottom-dashed ps-0">
                                                        <div class="d-flex flex-column align-items-start">
                                                            <div class="fs-5">Subtotal</div>
                                                            {{-- <button class="btn btn-link py-1" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Coming soon">Add tax</button>
                                                            <button class="btn btn-link py-1" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Coming soon">Add discount</button> --}}
                                                        </div>
                                                    </th>
                                                    <th colspan="2" class="border-bottom border-bottom-dashed text-end">$
                                                    <span data-kt-element="sub-total">0.00</span></th>
                                                </tr>
                                                {{-- <tr class="align-top fw-bolder text-gray-700">
                                                    <th></th>
                                                    <th colspan="2" class="fs-4 ps-0">Total</th>
                                                    <th colspan="2" class="text-end fs-4 text-nowrap">$
                                                    <span data-kt-element="grand-total">0.00</span></th>
                                                </tr> --}}
                                            </tfoot>
                                            <!--end::Table foot-->
                                        </table>

                                    
                                </div>


                                <table class="table g-5 gs-0 mb-0 fw-bolder text-gray-700" data-kt-element="items" id="item_table2" style="display: none;">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="border-bottom fs-7 fw-bolder text-gray-700 text-uppercase">
                                            <th class="min-w-300px w-475px">Item</th>
                                            <th class="min-w-300px w-475px">Qty</th>
                                            <th class="min-w-150px w-150px">Price</th>
                                            <th class="min-w-100px w-150px text-end">Total</th>
                                            <th class="min-w-75px w-75px text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        <tr class="border-bottom border-bottom-dashed" data-kt-element="item" id="transport_detail">
                                            <td class="pe-7">
                                                <select name="transport_detail_name[]" id="transport_detail_id" class="form-select form-select-solid mb-2 product_type_selection" data-control="select2" data-placeholder="Select an option" data-hide-search="true" data-dropdown-parent="#transport_detail">
                                                    {{-- <option></option>
                                                    @foreach($transport_details as $transport_detail)
                                                        <option value="{{ $transport_detail->id }}">{{ $transport_detail->amount }}</option>
                                                    @endforeach --}}
                                                </select>

                                                {{-- <input type="text" class="form-control form-control-solid mb-2" name="name[]" placeholder="Realated PO name" /> --}}

                                                <div class="fv-row mb-7" id="PO_name">
                                                    <!--begin::Label-->
                                                    <!--end::Label-->
                                                    <!--begin::Input-->

                                                    <select class="form-select form-control-solid"  data-control="select2" data-placeholder="Select an option" name="PO_name[]" data-dropdown-parent="#PO_name" multiple="multiple">
                                                        <option></option>
                                                        @foreach ($purchase_order_mains as $order_status)
                                                        <option value="{{ $order_status->code }}">{{ $order_status->code }}</option>
                                                        @endforeach
                                                    </select>

                                                    {{-- <select class="form-select form-control-solid"  data-control="select2" data-placeholder="Select an option" name="miller_id[]" data-dropdown-parent="#miller_name" multiple="multiple">
                                                        <option></option>
                                                        @foreach (\App\Models\PoList::all() as $order_status)
                                                        <option value="{{ $order_status->id }}">{{ $order_status->product_name }}</option>
                                                        @endforeach
                                                    </select> --}}
                                                    <!--end::Input-->
                                                </div>

                                                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">
                                                    <i class="fas fa-plus"></i>
                                                </button> --}}

                                                {{-- <select name="transport_related_po[]" id="transport_related_po" class="form-select form-select-solid mb-2 product_type_selection" data-control="select2" data-placeholder="Select an option" data-hide-search="true" data-dropdown-parent="#transport_detail">
                                                    
                                                    <option></option>
                                                    @foreach($purchase_order_mains as $purchase_order_main)
                                                        <option value="{{ $purchase_order_main->code }}">{{ $purchase_order_main->code}}</option>
                                                    @endforeach
                                                </select> --}}
                                            </td>

                                        
                                            
                                            <td class="ps-0">
                                                <input class="form-control form-control-solid" type="number" min="1" name="quantity[]" placeholder="1" value="1" data-kt-element="quantity" />
                                            </td>

                                            <td id="tpo_price">
                                                {{-- <input type="number" class="form-control form-control-solid text-end" name="price[]" placeholder="0.00" value="0.00" data-kt-element="price" /> --}}
                                            </td>
                                            <td class="pt-8 text-end text-nowrap">$
                                            <span data-kt-element="total">0.00</span></td>
                                            <td class="pt-5 text-end">
                                                <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-kt-element="remove-item">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                    <!--begin::Table foot-->
                                    <tfoot>
                                        <tr class="border-top border-top-dashed align-top fs-6 fw-bolder text-gray-700">
                                            <th class="text-primary">
                                                <button class="btn btn-link py-1" data-kt-element="add-item">Add item</button>
                                            </th>
                                            <th colspan="2" class="border-bottom border-bottom-dashed ps-0">
                                                <div class="d-flex flex-column align-items-start">
                                                    <div class="fs-5">Subtotal</div>
                                                    {{-- <button class="btn btn-link py-1" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Coming soon">Add tax</button>
                                                    <button class="btn btn-link py-1" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Coming soon">Add discount</button> --}}
                                                </div>
                                            </th>
                                            <th colspan="2" class="border-bottom border-bottom-dashed text-end">$
                                            <span data-kt-element="sub-total">0.00</span></th>
                                        </tr>
                                        {{-- <tr class="align-top fw-bolder text-gray-700">
                                            <th></th>
                                            <th colspan="2" class="fs-4 ps-0">Total</th>
                                            <th colspan="2" class="text-end fs-4 text-nowrap">$
                                            <span data-kt-element="grand-total">0.00</span></th>
                                        </tr> --}}
                                    </tfoot>
                                    <!--end::Table foot-->
                                </table>


                                <!--end::Table-->
                                <!--begin::Item template-->
                                <table class="table d-none" data-kt-element="item-template">
                                    <tr class="border-bottom border-bottom-dashed" data-kt-element="item" id="raw_material">
                                        <td class="pe-7">
                                            <select name="name[]" class="form-select form-select-solid mb-2" data-placeholder="Select an option" data-hide-search="false">
                                                <option></option>
                                                @foreach($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                            {{-- <input type="text" class="form-control form-control-solid mb-2" name="name[]" placeholder="Item name" /> --}}
                                            <input type="text" class="form-control form-control-solid" name="description[]" placeholder="Description" />
                                        </td>

                                        <td>
                                            <select name="unit[]" class="form-select form-select-solid"  data-placeholder="Select an option" data-hide-search="true">
                                                <option></option>
                                                <option value="Gram">Gram</option>
                                                <option value="Piece">Piece</option>
                                            </select>
                                        </td>

                                        <td class="ps-0">
                                            <input class="form-control form-control-solid" type="number" min="1" name="quantity[]" placeholder="1" data-kt-element="quantity" />
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-solid text-end" name="price[]" placeholder="0.00" data-kt-element="price" />
                                        </td>
                                        <td class="pt-8 text-end">$
                                        <span data-kt-element="total">0.00</span></td>
                                        <td class="pt-5 text-end">
                                            <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-kt-element="remove-item">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                                <table class="table d-none" data-kt-element="empty-template">
                                    <tr data-kt-element="empty">
                                        <th colspan="5" class="text-muted text-center py-10">No items</th>
                                    </tr>
                                </table>
                                <!--end::Item template-->
                                <!--begin::Notes-->
                                <div class="mb-0">
                                    <label class="form-label fs-6 fw-bolder text-gray-700">Notes</label>
                                    <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="Thanks for your business"></textarea>
                                </div>
                                <!--end::Notes-->
                                

                            </div>
                            
                            <!--end::Wrapper-->
                        
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content-->
            <!--begin::Sidebar-->
            <div class="flex-lg-auto min-w-lg-300px">
                <!--begin::Card-->
                <div class="card" data-kt-sticky="true" data-kt-sticky-name="invoice" data-kt-sticky-offset="{default: false, lg: '200px'}" data-kt-sticky-width="{lg: '250px', lg: '300px'}" data-kt-sticky-left="auto" data-kt-sticky-top="150px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
                    <!--begin::Card body-->
                    <div class="card-body p-10">
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bolder fs-6 text-gray-700">Payment Method</label>
                            <!--end::Label-->
                            <!--begin::Select-->
                            <select id="vendor_pay_method" name="pay_method" data-control="select2" data-placeholder="Select Payment Method" class="form-select form-select-solid" data-hide-search="true" class="select2">
                                {{-- @foreach (\App\Models\Bank::all() as $po_status)
                                    <option value="{{ $po_status->id }}" >{{ $po_status->name  }}</option>
                                @endforeach --}}
                               
                               
                                {{-- <option value="cash">Cash</option> --}}
                                {{-- <option></option>
                                @foreach($agents_banks as $agents_bank)
                                    <option value="{{ $agents_bank->id }}">{{ $agents_bank->name}} - {{ $agents_bank->acc_no}}</option>
                                 @endforeach --}}
                            </select>
                            <!--end::Select-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed mb-8"></div>
                        <!--end::Separator-->
                        <!--begin::Input group-->
                        <div class="mb-8">
                            <!--begin::Option-->
                            <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Payment Status</span>
                                <select name="payment_status" id="my_bank_payment_status_id" class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-hide-search="true">
                                    {{-- <option></option> --}}
                                    @foreach($payment_statuses as $payment_status)
                                        <option value="{{ $payment_status->name  }}" {{$payment_status->name == 'Pending' ? 'selected' : '' }}>{{ $payment_status->name }}</option>
                                    @endforeach
                                </select> 
                            </label>
                            <!--end::Option-->
                            <!--begin::Option-->
                            <label class="form-check form-switch form-check-custom form-check-solid flex-stack mb-5">
                                <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Payment Date</span>
                                <input disabled name="date" class="form-control form-control-solid" placeholder="Payment Date" id="kt_daterangepicker_3"/>
                            </label>
                            <!--end::Option-->
                            <!--begin::Option-->
                            <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Bank Name</span>
                                 <!--begin::Select-->
                            <select name="my_pay_method" disabled id="my_own_bank_payment_status_id" data-control="select2" data-placeholder="Select Payment Method" class="form-select form-select-solid" data-hide-search="true">
                                <option></option>
                                @foreach($own_banks as $own_bank)
                                    <option value="{{ $own_bank->id }}">{{ $own_bank->name}}</option>
                                 @endforeach
                            </select>
                            <!--end::Select-->
                            </label>
                            <!--end::Option-->
                             <!--begin::Option-->
                             <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Cheque Number</span>
                                <input disabled type="text" class="form-control form-control-solid" name="check_no" placeholder="cheque Number" id="my_own_bank_chk_id"/>
                            </label>
                            <!--end::Option-->

                            <div class="separator separator-dashed mb-8"></div>

                            <!--begin::Option-->
                            <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Order Status</span>
                                <select name="order_status_id" disabled id="purchase_order_status_id" class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-hide-search="true">
                                    <option></option>
                                    @foreach($order_statuses as $order_status)
                                        <option value="{{ $order_status->id }}" {{$order_status->id == '1' ? 'selected' : '' }}>{{ $order_status->name }}
                                        </option>
                                    @endforeach
                                </select> 
                            </label>
                            <!--end::Option-->

                            <!--begin::Option-->
                            <label class="form-check form-switch form-check-custom form-check-solid flex-stack mb-5">
                                <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Receival Date</span>
                                <input disabled name="receive_date" class="form-control form-control-solid" placeholder="Payment Date" id="kt_daterangepicker_new"/>
                                {{-- <input name="receive_date" id="purchase_order_status_receival_id" class="form-control form-control-solid" placeholder="Receival Date" id="kt_daterangepicker_3"/> --}}
                            </label>
                            <!--end::Option-->
                             <!--begin::Option-->
                             <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Transport PO</span>
                                <select name="PO_transport" id="PO_transport_id" class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-hide-search="true">
                                    <option></option>
                                    {{-- @foreach($purchase_order_transport_mains as $purchase_order_transport_main)
                                        <option value="{{ $purchase_order_transport_main->code }}" {{$purchase_order_transport_main->code == $purchase_order_transport_main->code ? 'selected' : '' }}>{{ $purchase_order_transport_main->code }}
                                        </option>
                                    @endforeach --}}
                                </select> 
                            </label>
                            <!--end::Option-->




                            {{-- <!--begin::Option-->
                            <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Notes</span>
                                <input class="form-check-input" type="checkbox" value="" />
                            </label>
                            <!--end::Option--> --}}
                        </div>
                        <!--end::Input group-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed mb-8"></div>
                        <!--end::Separator-->
                        <!--begin::Actions-->
                        <div class="mb-0">
                            <!--begin::Row-->
                            {{-- <div class="row mb-5">
                                <!--begin::Col-->
                                <div class="col">
                                    <a href="#" class="btn btn-light btn-active-light-primary w-100">Preview</a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col">
                                    <a href="#" class="btn btn-light btn-active-light-primary w-100">Download</a>
                                </div>
                                <!--end::Col-->
                            </div> --}}
                            {{-- <!--end::Row-->
                            <button type="submit" href="#" class="btn btn-primary w-100" id="kt_invoice_submit_button">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen016.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M15.43 8.56949L10.744 15.1395C10.6422 15.282 10.5804 15.4492 10.5651 15.6236C10.5498 15.7981 10.5815 15.9734 10.657 16.1315L13.194 21.4425C13.2737 21.6097 13.3991 21.751 13.5557 21.8499C13.7123 21.9488 13.8938 22.0014 14.079 22.0015H14.117C14.3087 21.9941 14.4941 21.9307 14.6502 21.8191C14.8062 21.7075 14.9261 21.5526 14.995 21.3735L21.933 3.33649C22.0011 3.15918 22.0164 2.96594 21.977 2.78013C21.9376 2.59432 21.8452 2.4239 21.711 2.28949L15.43 8.56949Z" fill="black" />
                                    <path opacity="0.3" d="M20.664 2.06648L2.62602 9.00148C2.44768 9.07085 2.29348 9.19082 2.1824 9.34663C2.07131 9.50244 2.00818 9.68731 2.00074 9.87853C1.99331 10.0697 2.04189 10.259 2.14054 10.4229C2.23919 10.5869 2.38359 10.7185 2.55601 10.8015L7.86601 13.3365C8.02383 13.4126 8.19925 13.4448 8.37382 13.4297C8.54839 13.4145 8.71565 13.3526 8.85801 13.2505L15.43 8.56548L21.711 2.28448C21.5762 2.15096 21.4055 2.05932 21.2198 2.02064C21.034 1.98196 20.8409 1.99788 20.664 2.06648Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Send Invoice</button> --}}

                            <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>



                            {{-- <button type="submit" class="btn btn-primary">Save</button> --}}

                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Sidebar-->
        </form>
        </div>
        <!--end::Layout-->


        <div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-fullscreen">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Form-->
                    <form class="form" action="{{ route('admin.polist')}}" id="kt_modal_add_customer_form" method="POST">
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
                        <!--begin::Modal body-->
                        <div class="modal-body py-10 px-lg-17">
                            <!--begin::Scroll-->
                            <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
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
                                                            <th class="min-w-125px">Code</th>
                                                            <th class="min-w-125px">Vendor Name</th>
                                                            <th class="min-w-125px">Name</th>
                                                            <th class="min-w-125px">Order Type</th>
                                                            <th class="min-w-125px">Payment Status</th>
                                                            <th class="min-w-125px">Order Status</th>
                                                        </tr>
                                                        <!--end::Table row-->
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody class="fw-bold text-gray-600">
                                                        @foreach($purchase_orders as $key=>$purchase_order)
                                                        <tr>
                                                            <!--begin::Checkbox-->
                                                            <td>
                                                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                                    <input class="form-check-input" type="checkbox" name="checked[]" value="{{ $purchase_orders[$key]->id}}" />
                                                                </div>
                                                            </td>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Name=-->
                                                            <td>

                                                                <a href="../../demo7/dist/apps/customers/view.html" name="code[]" class="text-gray-800 text-hover-primary mb-1">{{ $purchase_order->code}}</a>
                                                            </td>
                                                            <td>

                                                                <a href="../../demo7/dist/apps/customers/view.html" name="vendor_name[]" class="text-gray-800 text-hover-primary mb-1">{{ $purchase_order->user->name}}</a>
                                                            </td>
                                                            <td>


                                                                <a href="../../demo7/dist/apps/customers/view.html" name="product_name[]" class="text-gray-800 text-hover-primary mb-1">{{ $purchase_order->product_name}}</a>
                                                            </td>
                                                            <td name="order_type[]">{{ $purchase_order->order_type}}</td>
                                                            <!--end::Name=-->
                                                            <!--begin::Email=-->
                                                            <td>
                                                                <a href="#" class="text-gray-600 text-hover-primary mb-1" name="payment_status[]">{{ $purchase_order->payment_status}}</a>
                                                            </td>
                                                            <!--end::Email=-->
                                                            <!--begin::Company=-->
                                                            
                                                            <td>{{ $purchase_orders[$key]->orderstatus->name}}</td>
                                                            <!--end::Company=-->
                                                            <!--begin::Payment method=-->
                                                            {{-- <td data-filter="mastercard">{{ $order->orderstatus->name}}</td> --}}
                                                            <!--end::Payment method=-->
                                                            <!--begin::Date=-->
                                                            {{-- <td>{{ $miller->created_at}}</td> --}}
                                                            <!--end::Date=-->
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
                                    </div>
                                    <!--end::Container-->
                                </div>
                                <!--end::Content-->
                                                            </div>
                                                            <!--end::Scroll-->
                                                        </div>
                                                        <!--end::Modal body-->
                                                        <!--begin::Modal footer-->
                                                        <div class="modal-footer flex-center">
                                                            <!--begin::Button-->
                                                            <button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light me-3">Discard</button>
                                                            <!--end::Button-->
                                                            <!--begin::Button-->
                                                            {{-- <button type="submit" class="btn btn-primary">Save</button> --}}
                                                            <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                                                                <span class="indicator-label">Submit</span>
                                                                <span class="indicator-progress">Please wait...
                                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                            </button>
                                                            <!--end::Button-->
                                                        </div>
                                                        <!--end::Modal footer-->
                                                    </form>
                                                    <!--end::Form-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Container-->
                                </div>
<!--end::Content-->

@endsection



