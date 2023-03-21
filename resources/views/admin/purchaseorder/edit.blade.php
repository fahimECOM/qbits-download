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
                        <form action="{{ route('purchaseorder.update',$purchaseorder->id)}}" method="POST" id="kt_invoice_form">
                            @csrf
                            @method('PUT')
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
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Vendor Information</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                                        <!--begin::Input group-->
                                                            <div class="input-group d-flex flex-column mb-7 fv-row" id="vendor_name">

                                                                <!--begin::Input-->
                                                                <select name="vendor_id" id="vendor_id" class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-hide-search="false" data-dropdown-parent="#vendor_name">
                                                                    <option></option>
                                                                    @foreach (\App\Models\User::all() as $vendor)
                                                                    <option value="{{ $vendor->id }}" @if($purchaseorder->agent_id == $vendor->id) selected @endif>{{ $vendor->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <!--end::Input-->

                                                                <div id="vendor_show_id"></div>


                                                            </div>
                                                    <!--end::Input group-->
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
                                <div class="table-responsive mb-10">
                                    <!--begin::Table-->
                                    <table class="table g-5 gs-0 mb-0 fw-bolder text-gray-700" data-kt-element="items">
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

                                            

                                            @foreach($orderproducts as $item => $orderproduct) 


                                                <tr class="border-bottom border-bottom-dashed" data-kt-element="item" id="raw_material">
                                                    <td class="pe-7">
                                                        <select name="name[]" id="material_id" class="form-select form-select-solid mb-2 product_type_selection" data-control="select2" data-placeholder="Select an option" data-hide-search="false" data-dropdown-parent="#raw_material">
                                                            <option></option>
                                                            {{-- @foreach (\App\Models\Product::all() as $product)
                                                                <option value="{{ $product->id }}" @if($orderproduct->product_id == $product->id) selected @endif>{{ $product->name }}</option>
                                                            @endforeach --}}

                                                             {{-- <option></option> --}}
                                                            @foreach($products as $product)
                                                                <option value="{{ $product->name }}" @if($orderproduct->product_name == $product->name) selected @endif>{{ $product->name }}</option>
                                                            @endforeach
                                                            
                                                        </select>
                                                        {{-- <input type="text" class="form-control form-control-solid mb-2" name="name[]" placeholder="Item name" /> --}}
                                                        <input type="text" class="form-control form-control-solid" name="description[]" placeholder="Description" value="{{$orderproduct->comments}}"/>
                                                    </td>

                                                    <td>
                                                        <select id="unit_type" name="unit[]" class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-hide-search="true">
                                                            <option></option>
                                                            <option value="Gram">Gram</option>
                                                            <option value="Piece">Piece</option>
                                                        </select>
                                                    </td>

                                                
                                                    <td class="ps-0">
                                                        <input class="form-control form-control-solid" type="number" min="1" name="quantity[]" placeholder="1" value="{{ $orderproduct->qty}}" data-kt-element="quantity"/>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control form-control-solid text-end" name="price[]" placeholder="0.00" data-kt-element="price" value="{{ $orderproduct->unit_price}}"/>
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
                                            @endforeach
                                        </tbody>
                                        <!--end::Table body-->
                                        <!--begin::Table foot-->
                                        <tfoot>
                                            <tr class="border-top border-top-dashed align-top fs-6 fw-bolder text-gray-700">
                                                <th class="text-primary">
                                                    <button class="btn btn-link py-1" data-kt-element="add-item" disabled>Add item</button>
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
                                <!--end::Table-->
                                <!--begin::Item template-->
                                <table class="table d-none" data-kt-element="item-template">
                                    <tr class="border-bottom border-bottom-dashed" data-kt-element="item" id="raw_material">
                                        <td class="pe-7">
                                            <select name="name[]" class="form-select form-select-solid mb-2" data-placeholder="Select an option" data-hide-search="false" disabled>
                                                <option></option>
                                                @foreach($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endforeach
                                               
                                            </select>
                                            {{-- <input type="text" class="form-control form-control-solid mb-2" name="name[]" placeholder="Item name" /> --}}
                                            <input type="text" class="form-control form-control-solid" name="description[]" placeholder="Description" disabled/>
                                        </td>

                                        <td>
                                            <select name="unit[]" class="form-select form-select-solid"  data-placeholder="Select an option" data-hide-search="true" disabled>
                                                <option></option>
                                                <option value="Gram">Gram</option>
                                                <option value="Piece">Piece</option>
                                            </select>
                                        </td>

                                        <td class="ps-0">
                                            <input class="form-control form-control-solid" type="number" min="1" name="quantity[]" placeholder="1" data-kt-element="quantity" disabled/>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-solid text-end" name="price[]" placeholder="0.00" data-kt-element="price" disabled/>
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
                                    <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="Thanks for your business" >{{$orderproduct->comments}}</textarea>
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

                            <select id="vendor_pay_method" name="pay_method" data-control="select2" data-placeholder="Select Payment Method" class="form-select form-select-solid" data-hide-search="true">

                                <option></option>
                                @foreach (\App\Models\Bank::all() as $vendor_payment)
                                <option value="{{ $vendor_payment->name }}" @if($purchaseorder->bank_name == $vendor_payment->name) selected @endif>{{ $vendor_payment->name }}</option>
                                @endforeach
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
                                <select name="payment_status_id" id="my_bank_payment_status_id" class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-hide-search="true">
                                    <option></option>
                                    @foreach (\App\Models\PaymentStatus::all() as $payment_status)
                                    <option value="{{ $payment_status->name }}" @if($purchaseorder->payment_status == $payment_status->name) selected @endif>{{ $payment_status->name }}</option>
                                    @endforeach
                                </select> 
                            </label>
                            <!--end::Option-->
                            <!--begin::Option-->
                            <label class="form-check form-switch form-check-custom form-check-solid flex-stack mb-5">
                                <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Payment Date</span>
                                <input disabled name="date" class="form-control form-control-solid" placeholder="Payment Date" id="kt_daterangepicker_3" value="{{ $purchaseorder->date}}"/>
                            </label>
                            <!--end::Option-->
                            <!--begin::Option-->
                            <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Bank Name</span>
                                 <!--begin::Select-->
                            <select name="my_pay_method" id="my_own_bank_payment_status_id" data-control="select2" data-placeholder="Select Payment Method" class="form-select form-select-solid" data-hide-search="true">
                                <option></option>
                                @foreach($own_banks as $own_bank)
                                    <option value="{{ $own_bank->name }}" @if($purchaseorder->bank_name == $own_bank->name) selected @endif>{{ $own_bank->name}}</option>
                                 @endforeach
                            </select>
                            <!--end::Select-->
                            </label>
                            <!--end::Option-->
                             <!--begin::Option-->
                             <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Cheque Number</span>
                                <input disabled type="text" class="form-control form-control-solid" name="check_no" placeholder="cheque Number" id="my_own_bank_chk_id" value="{{ $purchaseorder->check_no}}"/>
                            </label>
                            <!--end::Option-->

                            <div class="separator separator-dashed mb-8"></div>

                            <!--begin::Option-->
                            <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Order Status</span>
                                <select name="order_status_id" disabled id="purchase_order_status_id" class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-hide-search="true">
                                    <option></option>
                                    @foreach (\App\Models\OrderStatus::all() as $order_status)
                                    <option value="{{ $order_status->id }}" @if($purchaseorder->order_status_id == $order_status->id) selected @endif>{{ $order_status->name }}</option>
                                    @endforeach
                                    
                                </select> 
                            </label>
                            <!--end::Option-->

                            <!--begin::Option-->
                            <label class="form-check form-switch form-check-custom form-check-solid flex-stack mb-5">
                                <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Receival Date</span>
                                <input disabled name="receive_date" class="form-control form-control-solid" placeholder="Receival Date" id="kt_daterangepicker_new" value="{{ $purchaseorder->receive_date}}"/>
                                {{-- <input name="receive_date" id="purchase_order_status_receival_id" class="form-control form-control-solid" placeholder="Receival Date" id="kt_daterangepicker_3"/> --}}
                            </label>
                            <!--end::Option-->
                              <!--begin::Option-->
                              <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">P.O. No</span>
                                <select name="PO_transport" id="PO_transport_id" class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-hide-search="true">
                                    @foreach (\App\Models\PurchaseOrder::all()->where('order_type','transport')->where('order_status_id','1') as $po_status)
                                    <option value="{{ $po_status->id }}" @if($po_numbers_purchases->PO_TPO_related_id === $po_status->code) selected @endif>{{ $po_status->code }}</option>
                                    @endforeach
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
    </div>
    <!--end::Container-->
</div>
<!--end::Content-->

@endsection



