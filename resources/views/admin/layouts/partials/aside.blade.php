@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
<style>
    img.img-responsive.qbits_logo {
        color: white;
        width: 100%;
        height: 40px;
    }

    .aside .aside-logo {
        background: rgba(0, 0, 0, 0) !important;
        align-self: center;
    }

</style>
<!--end::Head-->
<!--begin::Body-->
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column ">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Aside-->
        <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
            data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
            data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
            data-kt-drawer-toggle="#kt_aside_mobile_toggle">
            <!--begin::Brand-->
            <div class="aside-logo flex-column-auto" id="kt_aside_logo">
                <!--begin::Logo-->
                <a href="{{ route('admin.dashboard')}}">
                    <img src="{{ asset('frontend/assets/logo/qbits_logo.svg')}}" alt="qbits Logo"
                        class="img-responsive qbits_logo">
                </a>
                <!--end::Logo-->
                <!--begin::Aside toggler-->
                <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
                    data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                    data-kt-toggle-name="aside-minimize">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
                    <!-- <span class="svg-icon svg-icon-1 rotate-180">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor" />
									<path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor" />
								</svg>
							</span> -->
                    <!--end::Svg Icon-->
                </div>
                <!--end::Aside toggler-->
            </div>
            <!--end::Brand-->
            <!--begin::Aside menu-->
            <div class="aside-menu flex-column-fluid">
                <!--begin::Aside Menu-->
                <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
                    data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
                    data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
                    data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
                    <!--begin::Menu-->
                    <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                        id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <!-- <span class="menu-link">
										<span class="menu-icon">
											<i class="bi bi-grid fs-3"></i>
										</span>
										<span class="menu-title">Dashboards</span>
										<span class="menu-arrow"></span>
									</span> -->
                            <div class="menu-sub menu-sub-accordion menu-active-bg">

                            </div>

                            <div class="menu-item">
                                <a class="menu-link {{($route=='admin.dashboard')? 'active': '' }}"
                                    href="{{ route('admin.dashboard')}}">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
                                                    fill="currentColor" />
                                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
                                                    fill="currentColor" />
                                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-title">Dashboard</span>
                                </a>
                            </div>
                            @php
                            $prod_permissions = ["view_product","add_product","edit_product"];
                            $user_permissions = ["add_user_permission","edit_user_permission","remove_user_permission"];
                            $skd_materials_permissions =
                            ["skd_barcode_generate","entry_skd","view_ens_request","confirm_reject_ens_request","view_skd_inventory_history"];
                            $sales_permissions =
                            ["view_sales_order","capture_cancel_sales_order","view_sales_invoice","shipment_cancel_sales_invoice","complete_sales_invoice","view_pdf_invoice","view_refund_order","complete_refund_order"];
                            $attributes_permissions =
                            ["view_attribute","add_attribute","edit_attribute","delete_attribute"];
                            $coupon_permissions = ["view_coupon","add_coupon","edit_coupon","delete_coupon"];
                            $customers_permissions = ["view_customer"];
                            $support_center_permissions =
                            ["view_registered_product_list","view_support_ticket","response_support_ticket"];
                            $misc_permissions = ["view_post_sell_serial_no","view_system_history"];

                            $have_prod_permission = App\Models\User::hasPermission($prod_permissions);
                            $have_user_permission = App\Models\User::hasPermission($user_permissions);
                            $have_skd_materials_permission = App\Models\User::hasPermission($skd_materials_permissions);
                            $have_sales_permission = App\Models\User::hasPermission($sales_permissions);
                            $have_attributes_permission = App\Models\User::hasPermission($attributes_permissions);
                            $have_coupon_permission = App\Models\User::hasPermission($coupon_permissions);
                            $have_customers_permission = App\Models\User::hasPermission($customers_permissions);
                            $have_support_center_permission =
                            App\Models\User::hasPermission($support_center_permissions);
                            $have_misc_permission = App\Models\User::hasPermission($misc_permissions);



                            $skd_materials_inventory_setup_permissions = ["skd_barcode_generate","entry_skd"];
                            $skd_materials_queue_list_permissions = ["view_ens_request","confirm_reject_ens_request"];
                            $skd_materials_inventory_permissions = ["view_skd_inventory_history"];
                            $sales_order_permissions = ["view_sales_order","capture_cancel_sales_order"];
                            $sales_invoice_permissions =
                            ["view_sales_invoice","shipment_cancel_sales_invoice","complete_sales_invoice","view_pdf_invoice"];
                            $sales_refund_permissions = ["view_refund_order","complete_refund_order"];
                            $support_center_prod_registration_permissions = ["view_registered_product_list"];
                            $support_center_ticket_permissions = ["view_support_ticket","response_support_ticket"];
                            $misc_post_sell_serial_no_permissions = ["view_post_sell_serial_no"];
                            $misc_view_system_history_permissions = ["view_system_history"];

                            $have_materials_inventory_setup_permission =
                            App\Models\User::hasPermission($skd_materials_inventory_setup_permissions);
                            $have_skd_materials_queue_list_permission =
                            App\Models\User::hasPermission($skd_materials_queue_list_permissions);
                            $have_skd_materials_inventory_permission =
                            App\Models\User::hasPermission($skd_materials_inventory_permissions);
                            $have_sales_order_permission = App\Models\User::hasPermission($sales_order_permissions);
                            $have_sales_invoice_permission = App\Models\User::hasPermission($sales_invoice_permissions);
                            $have_sales_refund_permission = App\Models\User::hasPermission($sales_refund_permissions);
                            $have_support_center_prod_registration_permission =
                            App\Models\User::hasPermission($support_center_prod_registration_permissions);
                            $have_support_center_ticket_permission =
                            App\Models\User::hasPermission($support_center_ticket_permissions);
                            $have_misc_post_sell_serial_no_permission =
                            App\Models\User::hasPermission($misc_post_sell_serial_no_permissions);
                            $have_misc_view_system_history_permission =
                            App\Models\User::hasPermission($misc_view_system_history_permissions);

                            @endphp

                            @if($have_prod_permission)
                            <div class="menu-item">
                                <a class="menu-link  {{($route=='product.index')? 'active': '' }}"
                                    href="{{ route('product.index')}}">
                                    <span class="menu-icon">
                                        <span class="svg-icon svg-icon-primary svg-icon-2">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Devices/Laptop.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M6,8 L6,16 L18,16 L18,8 L6,8 Z M20,16 L21.381966,16 C21.7607381,16 22.1070012,16.2140024 22.2763932,16.5527864 L22.5,17 C22.6706654,17.3413307 22.5323138,17.7563856 22.190983,17.927051 C22.0950363,17.9750244 21.9892377,18 21.881966,18 L2.11803399,18 C1.73641461,18 1.42705098,17.6906364 1.42705098,17.309017 C1.42705098,17.2017453 1.45202663,17.0959467 1.5,17 L1.7236068,16.5527864 C1.89299881,16.2140024 2.23926193,16 2.61803399,16 L4,16 L4,8 C4,6.8954305 4.8954305,6 6,6 L18,6 C19.1045695,6 20,6.8954305 20,8 L20,16 Z"
                                                        fill="currentColor" fill-rule="nonzero" />
                                                    <polygon fill="currentColor" opacity="0.3"
                                                        points="6 8 6 16 18 16 18 8" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon--></span>
                                    </span>
                                    <span class="menu-title">Product</span>
                                </a>
                            </div>
                            @endif

                            @if($have_skd_materials_permission)
                            <!-- Raw mettarial -->
                            <div data-kt-menu-trigger="click"
                                class="menu-item  menu-accordion {{($prefix =='/admin/skd') ? 'show': ''}}">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 Z"
                                                    fill="currentColor" opacity="0.3" />
                                                <path
                                                    d="M18.5,11 L5.5,11 C4.67157288,11 4,11.6715729 4,12.5 L4,13 L8.58578644,13 C8.85100293,13 9.10535684,13.1053568 9.29289322,13.2928932 L10.2928932,14.2928932 C10.7456461,14.7456461 11.3597108,15 12,15 C12.6402892,15 13.2543539,14.7456461 13.7071068,14.2928932 L14.7071068,13.2928932 C14.8946432,13.1053568 15.1489971,13 15.4142136,13 L20,13 L20,12.5 C20,11.6715729 19.3284271,11 18.5,11 Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M5.5,6 C4.67157288,6 4,6.67157288 4,7.5 L4,8 L20,8 L20,7.5 C20,6.67157288 19.3284271,6 18.5,6 L5.5,6 Z"
                                                    fill="currentColor" />
                                            </g>
                                        </svg>

                                    </span>
                                    <span class="menu-title">SKD Materials</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion">
                                    @if($have_materials_inventory_setup_permission)
                                    <div class="menu-item ps-5">
                                        <a class="menu-link {{request()->routeIs('barcode.generator') ? 'active': '' }}"
                                            href="{{route('barcode.generator')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Inventory Setup</span>
                                        </a>
                                    </div>
                                    @endif

                                    @if($have_skd_materials_queue_list_permission)
                                    <div class="menu-item ps-5">
                                        <a class="menu-link {{request()->routeIs('queue.list') ? 'active': '' }}"
                                            href="{{route('queue.list')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">SKD Queue List</span>
                                        </a>
                                    </div>
                                    @endif

                                    @if($have_skd_materials_inventory_permission)
                                    <div class="menu-item ps-5">
                                        <a class="menu-link {{request()->routeIs('skd.inventory') ? 'active': '' }}"
                                            href="{{route('skd.inventory')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">SKD Inventory</span>
                                        </a>
                                    </div>
                                    @endif


                                </div>
                            </div>
                            @endif

                            <!-- Finished Product mettarial -->
                            <div data-kt-menu-trigger="click"
                                class="menu-item  menu-accordion {{($prefix =='/admin/finished/product') ? 'show': ''}}">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 Z"
                                                    fill="currentColor" opacity="0.3" />
                                                <path
                                                    d="M18.5,11 L5.5,11 C4.67157288,11 4,11.6715729 4,12.5 L4,13 L8.58578644,13 C8.85100293,13 9.10535684,13.1053568 9.29289322,13.2928932 L10.2928932,14.2928932 C10.7456461,14.7456461 11.3597108,15 12,15 C12.6402892,15 13.2543539,14.7456461 13.7071068,14.2928932 L14.7071068,13.2928932 C14.8946432,13.1053568 15.1489971,13 15.4142136,13 L20,13 L20,12.5 C20,11.6715729 19.3284271,11 18.5,11 Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M5.5,6 C4.67157288,6 4,6.67157288 4,7.5 L4,8 L20,8 L20,7.5 C20,6.67157288 19.3284271,6 18.5,6 L5.5,6 Z"
                                                    fill="currentColor" />
                                            </g>
                                        </svg>

                                    </span>
                                    <span class="menu-title">Finish Product</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion">

                                    <div class="menu-item ps-5">
                                        <a class="menu-link {{request()->routeIs('inventory.view') ? 'active': '' }}"
                                            href="{{route('inventory.view')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Inventory</span>
                                        </a>
                                    </div>
                                    <!-- <div class="menu-item ps-5">
                                        <a class="menu-link {{request()->routeIs('requisition.view') ? 'active': '' }}"
                                            href="{{route('requisition.view')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Requisition</span>
                                        </a>
                                    </div> -->
                                    <div data-kt-menu-trigger="click"
                                        class="menu-item menu-accordion mb-1 ps-5 {{ (request()->routeIs('requisition.view')||request()->routeIs('requisition.creation')||request()->routeIs('building.queue.list')|| request()->routeIs('stocking.queue.list'))  ? 'show': '' }}">
                                        <span class="menu-link">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Requisition</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                        <div class="menu-sub menu-sub-accordion">

                                            <div class="menu-item">
                                                <a class="menu-link {{request()->routeIs('requisition.view')||request()->routeIs('requisition.creation') ? 'active': '' }}"
                                                    href="{{route ('requisition.view')}}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Creation Process</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link {{request()->routeIs('building.queue.list') ? 'active': '' }}"
                                                    href="{{route ('building.queue.list')}}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Building Queue</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link {{request()->routeIs('stocking.queue.list') ? 'active': '' }}"
                                                    href="{{route ('stocking.queue.list')}}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Stockin Queue</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="menu-item ps-5">
                                        <a class="menu-link {{request()->routeIs('building.queue.list') ? 'active': '' }}"
                                            href="{{route('building.queue.list')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Building Queue List</span>
                                        </a>
                                    </div> -->
                                </div>
                            </div>


                            @if($have_attributes_permission)
                            <div class="menu-item">
                                <a class="menu-link  {{($route=='attributes.view')? 'active': '' }}"
                                    href="{{ route('attributes.view')}}">
                                    <span class="menu-icon">
                                        <span class="svg-icon svg-icon-primary svg-icon-2">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Clipboard-list.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                                        fill="currentColor" opacity="0.3" />
                                                    <path
                                                        d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                                        fill="currentColor" />
                                                    <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2"
                                                        rx="1" />
                                                    <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2"
                                                        rx="1" />
                                                    <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2"
                                                        rx="1" />
                                                    <rect fill="#000000" opacity="0.3" x="10" y="13" width="7"
                                                        height="2" rx="1" />
                                                    <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2"
                                                        rx="1" />
                                                    <rect fill="#000000" opacity="0.3" x="10" y="17" width="7"
                                                        height="2" rx="1" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon--></span>

                                        <!--end::Svg Icon--></span>
                                    </span>
                                    <span class="menu-title">Attributes</span>
                                </a>
                            </div>
                            @endif

                            @if($have_coupon_permission)
                            <div class="menu-item">
                                <a class="menu-link  {{($route=='coupon.view')? 'active': '' }}"
                                    href="{{ route('coupon.view')}}">
                                    <span class="menu-icon">
                                        <span class="svg-icon svg-icon-primary svg-icon-2">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Devices/Laptop.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M3,10.0500091 L3,8 C3,7.44771525 3.44771525,7 4,7 L9,7 L9,9 C9,9.55228475 9.44771525,10 10,10 C10.5522847,10 11,9.55228475 11,9 L11,7 L21,7 C21.5522847,7 22,7.44771525 22,8 L22,10.0500091 C20.8588798,10.2816442 20,11.290521 20,12.5 C20,13.709479 20.8588798,14.7183558 22,14.9499909 L22,17 C22,17.5522847 21.5522847,18 21,18 L11,18 L11,16 C11,15.4477153 10.5522847,15 10,15 C9.44771525,15 9,15.4477153 9,16 L9,18 L4,18 C3.44771525,18 3,17.5522847 3,17 L3,14.9499909 C4.14112016,14.7183558 5,13.709479 5,12.5 C5,11.290521 4.14112016,10.2816442 3,10.0500091 Z M10,11 C9.44771525,11 9,11.4477153 9,12 L9,13 C9,13.5522847 9.44771525,14 10,14 C10.5522847,14 11,13.5522847 11,13 L11,12 C11,11.4477153 10.5522847,11 10,11 Z"
                                                        fill="currentColor"
                                                        transform="translate(12.500000, 12.500000) rotate(-45.000000) translate(-12.500000, -12.500000) " />
                                                    <polygon fill="currentColor" opacity="0.3"
                                                        points="6 8 6 16 18 16 18 8" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon--></span>
                                    </span>
                                    <span class="menu-title">Coupon</span>
                                </a>
                            </div>
                            @endif

                            @if($have_customers_permission)
                            <div class="menu-item">
                                <a class="menu-link {{($route=='admin.customer')? 'active': '' }}"
                                    href="{{ route('admin.customer')}}">
                                    <span class="menu-icon">
                                        <span class="svg-icon svg-icon-primary svg-icon-2">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Layout/Layout-left-panel-2.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M10,4 L21,4 C21.5522847,4 22,4.44771525 22,5 L22,7 C22,7.55228475 21.5522847,8 21,8 L10,8 C9.44771525,8 9,7.55228475 9,7 L9,5 C9,4.44771525 9.44771525,4 10,4 Z M10,10 L21,10 C21.5522847,10 22,10.4477153 22,11 L22,13 C22,13.5522847 21.5522847,14 21,14 L10,14 C9.44771525,14 9,13.5522847 9,13 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M10,16 L21,16 C21.5522847,16 22,16.4477153 22,17 L22,19 C22,19.5522847 21.5522847,20 21,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,17 C9,16.4477153 9.44771525,16 10,16 Z"
                                                        fill="currentColor" />
                                                    <rect fill="currentColor" opacity="0.3" x="2" y="4" width="5"
                                                        height="16" rx="1" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon--></span>
                                    </span>
                                    <span class="menu-title">Customers</span>
                                </a>
                            </div>
                            @endif

                            @if($have_sales_permission)
                            <!-- Sales -->
                            <div data-kt-menu-trigger="click"
                                class="menu-item  menu-accordion {{($prefix =='/admin/order') ? 'show': ''}}">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <span class="svg-icon svg-icon-primary svg-icon-2">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Chart-pie.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M4.00246329,12.2004927 L13,14 L13,4.06189375 C16.9463116,4.55399184 20,7.92038235 20,12 C20,16.418278 16.418278,20 12,20 C7.64874861,20 4.10886412,16.5261253 4.00246329,12.2004927 Z"
                                                        fill="currentColor" opacity="0.3" />
                                                    <path
                                                        d="M3.0603968,10.0120794 C3.54712466,6.05992157 6.91622084,3 11,3 L11,11.6 L3.0603968,10.0120794 Z"
                                                        fill="currentColor" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon--></span>
                                    </span>
                                    <span class="menu-title">Sales</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion">
                                    @if($have_sales_order_permission)
                                    <div class="menu-item ps-5">
                                        <a class="menu-link {{request()->routeIs('admin.order.listing') ? 'active': '' }}"
                                            href="{{route('admin.order.listing')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Orders</span>
                                        </a>
                                    </div>
                                    @endif

                                    @if($have_sales_invoice_permission)
                                    <div class="menu-item ps-5">
                                        <a class="menu-link {{request()->routeIs('admin.invoice.listing') ? 'active': '' }}"
                                            href="{{route('admin.invoice.listing')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Invoice Listing</span>
                                        </a>
                                    </div>
                                    @endif

                                    @if($have_sales_refund_permission)
                                    <div class="menu-item ps-5">
                                        <a class="menu-link {{request()->routeIs('admin.refund.request') ? 'active': '' }}"
                                            href="{{route('admin.refund.request')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Refund Request</span>
                                        </a>
                                    </div>
                                    @endif

                                </div>
                            </div>
                            @endif

                            @if($have_support_center_permission)
                            <!-- end sales -->
                            <div data-kt-menu-trigger="click"
                                class="menu-item  menu-accordion mb-1 {{($prefix =='/admin/support')  ? 'show': ''}}">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra006.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M13 5.91517C15.8 6.41517 18 8.81519 18 11.8152C18 12.5152 17.9 13.2152 17.6 13.9152L20.1 15.3152C20.6 15.6152 21.4 15.4152 21.6 14.8152C21.9 13.9152 22.1 12.9152 22.1 11.8152C22.1 7.01519 18.8 3.11521 14.3 2.01521C13.7 1.91521 13.1 2.31521 13.1 3.01521V5.91517H13Z"
                                                    fill="currentColor" />
                                                <path opacity="0.3"
                                                    d="M19.1 17.0152C19.7 17.3152 19.8 18.1152 19.3 18.5152C17.5 20.5152 14.9 21.7152 12 21.7152C9.1 21.7152 6.50001 20.5152 4.70001 18.5152C4.30001 18.0152 4.39999 17.3152 4.89999 17.0152L7.39999 15.6152C8.49999 16.9152 10.2 17.8152 12 17.8152C13.8 17.8152 15.5 17.0152 16.6 15.6152L19.1 17.0152ZM6.39999 13.9151C6.19999 13.2151 6 12.5152 6 11.8152C6 8.81517 8.2 6.41515 11 5.91515V3.01519C11 2.41519 10.4 1.91519 9.79999 2.01519C5.29999 3.01519 2 7.01517 2 11.8152C2 12.8152 2.2 13.8152 2.5 14.8152C2.7 15.4152 3.4 15.7152 4 15.3152L6.39999 13.9151Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-title">Support Center</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion">
                                    @if($have_support_center_prod_registration_permission)
                                    <div class="menu-item ps-5">
                                        <a class="menu-link {{request()->routeIs('admin.registered.product.list') ? 'active': '' }}"
                                            href="{{route('admin.registered.product.list')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Product Registration List</span>
                                        </a>
                                    </div>
                                    @endif

                                    @if($have_support_center_ticket_permission)
                                    <div data-kt-menu-trigger="click"
                                        class="menu-item menu-accordion mb-1 ps-5 {{ ($route=='admin.support.ticket.list') || ($route=='admin.support.ticket.userInfo')  ? 'show': '' }}">
                                        <span class="menu-link">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Tickets</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                        <div class="menu-sub menu-sub-accordion">
                                            @if(App\Models\User::hasPermission(["view_support_ticket","response_support_ticket"]))
                                            <div class="menu-item">
                                                <a class="menu-link {{request()->routeIs('admin.support.ticket.list') ? 'active': '' }}"
                                                    href="{{route ('admin.support.ticket.list')}}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Tickets List</span>
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endif

                            @if($have_misc_permission)
                            <!-- misc -->
                            <div data-kt-menu-trigger="click"
                                class="menu-item  menu-accordion mb-1 {{($prefix =='/admin/misc')  ? 'show': ''}}">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra006.svg-->
                                        <span class="svg-icon svg-icon-primary svg-icon-2">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Price1.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M3.52270623,14.028695 C2.82576459,13.3275941 2.82576459,12.19529 3.52270623,11.4941891 L11.6127629,3.54050571 C11.9489429,3.20999263 12.401513,3.0247814 12.8729533,3.0247814 L19.3274172,3.0247814 C20.3201611,3.0247814 21.124939,3.82955935 21.124939,4.82230326 L21.124939,11.2583059 C21.124939,11.7406659 20.9310733,12.2027862 20.5869271,12.5407722 L12.5103155,20.4728108 C12.1731575,20.8103442 11.7156477,21 11.2385688,21 C10.7614899,21 10.3039801,20.8103442 9.9668221,20.4728108 L3.52270623,14.028695 Z M16.9307214,9.01652093 C17.9234653,9.01652093 18.7282432,8.21174298 18.7282432,7.21899907 C18.7282432,6.22625516 17.9234653,5.42147721 16.9307214,5.42147721 C15.9379775,5.42147721 15.1331995,6.22625516 15.1331995,7.21899907 C15.1331995,8.21174298 15.9379775,9.01652093 16.9307214,9.01652093 Z"
                                                        fill="currentColor" fill-rule="nonzero" opacity="0.9" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon--></span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-title">MISC</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion">
                                    @if($have_misc_post_sell_serial_no_permission)
                                    <div class="menu-item ps-5">
                                        <a class="menu-link {{request()->routeIs('post.sell.serial.list') ? 'active': '' }}"
                                            href="{{route('post.sell.serial.list')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Post sell serial No</span>
                                        </a>
                                    </div>
                                    @endif

                                    @if($have_misc_view_system_history_permission)
                                    <div class="menu-item ps-5">
                                        <a class="menu-link {{request()->routeIs('system.history') ? 'active': '' }}"
                                            href="{{route('system.history')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">System History</span>
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <!-- end misc -->
                            @endif


                            @if($have_user_permission)
                            <!-- authorization mettarial -->
                            <div data-kt-menu-trigger="click"
                                class="menu-item  menu-accordion {{($prefix =='/admin/authorization') ? 'show': ''}}">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                                                fill="currentColor"></path>
                                            <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4"
                                                fill="currentColor"></rect>
                                        </svg>
                                    </span>
                                    <span class="menu-title">User Permission</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion">
                                    <div class="menu-item ps-5">
                                        <a class="menu-link {{request()->routeIs('permission') ? 'active': '' }}"
                                            href="{{route('permission')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Permission Setup</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--End authorization mettarial -->
                            @endif

                        </div>

                        <!--end::Menu-->
                    </div>


                    <!--end::Menu-->

                </div>

                <!--end::Aside Menu-->

            </div>
            <!--end::Aside menu-->
            <!--begin::Footer-->

            <!--end::Footer-->
        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->

        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->
<!--begin::Drawers-->
<!--begin::Activities drawer-->

<!--end::Activities drawer-->
<!--begin::Chat drawer-->




<!--end::Body-->

</html>
