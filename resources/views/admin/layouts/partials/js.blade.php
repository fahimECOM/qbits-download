<!--end::Scrolltop-->
<!--end::Main-->
<script>
    var hostUrl = "assets/";

</script>

<!--begin::Page Custom Javascript(used by this page)-->

<script src="{{asset('backend/assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('backend/assets/js/scripts.bundle.js')}}"></script>

<!--end::Page Vendors Javascript-->
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{asset('backend/assets/js/custom/apps/ecommerce/customers/listing/listing.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/apps/ecommerce/customers/listing/add.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/apps/ecommerce/customers/listing/export.js')}}"></script>

<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->


<!--begin::Page Vendors Javascript(used by this page)-->

<script src="{{asset('backend/assets/plugins/custom/vis-timeline/vis-timeline.bundle.js')}}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{asset('backend/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{asset('backend/assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/modals/create-app.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/modals/upgrade-plan.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/apps/customers/view/add-payment.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/apps/customers/view/adjust-balance.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/apps/customers/view/invoices.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/apps/customers/view/payment-method.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/apps/customers/view/payment-table.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/apps/customers/view/statement.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/apps/customers/update.js')}}"></script>
<!-- new chart js -->

<!--end::Page Custom Javascript-->
<!--end::Javascript-->
<script src="{{asset('backend/assets/js/custom/apps/ecommerce/sales/listing.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/apps/ecommerce/sales/save-order.js')}}"></script>
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{asset('backend/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/apps/ecommerce/catalog/products.js')}}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{asset('backend/assets/js/custom/utilities/modals/users-search.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/account/settings/signin-methods.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/account/settings/profile-details.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/account/settings/deactivate-account.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/apps/ecommerce/catalog/save-product.js')}}"></script>
<script src="{{asset('backend/assets/js/widgets.bundle.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/widgets.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/apps/customers/list/export.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/apps/customers/list/list-ecc.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/apps/customers/view/add-ecc.js')}}"></script>
<script src="{{asset('backend/aassets/js/custom/apps/customers/list/list.js')}}"></script>

<!--end::Page Custom Javascript-->
{{-- <script src="{{asset('backend/assets/js/custom/apps/customers/update-ecc.js')}}"></script> --}}
<script src="{{asset('backend/assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>


{{-- <script src="{{asset('backend/assets/js/custom-ecc.js')}}"></script> --}}
@include('sweetalert::alert')
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

<script>
    $('#kt_docs_repeater_basic').repeater({
        initEmpty: false,

        defaultValues: {
            'text-input': 'foo'
        },

        show: function () {
            $(this).slideDown();
        },

        hide: function (deleteElement) {
            $(this).slideUp(deleteElement);
        }
    });

</script>

</body>
<!--end::Body-->

</html>
