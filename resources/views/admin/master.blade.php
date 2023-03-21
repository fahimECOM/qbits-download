    @include('admin.layouts.partials.styles')
    <!--begin::Body-->

    <body id="kt_body"
        class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
        style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
        <!--begin::Main-->
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="page d-flex flex-row flex-column-fluid">
                @include('admin.layouts.partials.aside')
                <!--begin::Wrapper-->
                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    @include('admin.layouts.partials.header')

                    @yield('admin-content')
                    @yield('script')

                    @include('admin.layouts.partials.footer')

                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>

        @include('admin.layouts.partials.js')
