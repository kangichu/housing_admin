<!DOCTYPE html>
<html lang="en">
    <!--begin::Head-->
    <head><base href="">
        <title>{{ config('app.name', 'Tandish') }}</title>
        <meta charset="utf-8" />
        <!-- <meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
        <meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" /> -->
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
        <meta property="og:url" content="https://keenthemes.com/metronic" />
        <meta property="og:site_name" content="Keenthemes | Metronic" />
        <link rel="canonical" href="https://preview.keenthemes.com/metronic8" /> -->
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link rel="shortcut icon" href="{{ asset('home.png') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('home.png') }}" type="image/x-icon">
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Page Vendor Stylesheets(used by this page)-->
        <link href="{{ asset('dashboard/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Page Vendor Stylesheets-->
        <!--begin::Global Stylesheets Bundle(used by all pages)-->
        <link href="{{ asset('dashboard/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('dashboard/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->

        <link href="{{ asset('css/loader.css') }} " rel="stylesheet" type="text/css" />

        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

        <!--begin::Page Vendor Stylesheets(used by this page)-->
        <link href="{{ asset('dashboard/plugins/custom/datatables/datatables.bundle.css') }} " rel="stylesheet" type="text/css" />
        <!--end::Page Vendor Stylesheets-->

        <style type="text/css">
            #map {
              height: 100%;
              border-radius: .85rem;
            }

            .select2-results__group {
                padding: 1em !important;
                background-color: #c5bebe;
            }
            
            body::-webkit-scrollbar {
                width: .5em;
            }
             
            body::-webkit-scrollbar-track {
                -webkit-box-shadow: inset 0 0 6px #F3F6F9;
            }
             
            body::-webkit-scrollbar-thumb {
              background-color: darkgrey;
              outline: 1px solid #fff;
            }
        </style>

        <style type="text/css" media="screen, print">
            identicon-svg {
                width: 50px;
                height: 50px;
                /*background-color: #EEF;*/
                display: inline-block;
                margin: 5px;
            }
        </style>
        
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_body" style="background-image: url()" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-enabled">

        <div class="loader-wrap">
            <div class="preloader"></div>
            <div class="layer layer-one"><span class="overlay"></span></div>
            <div class="layer layer-two"><span class="overlay"></span></div>        
            <div class="layer layer-three"><span class="overlay"></span></div>        
        </div>

        <!--begin::Root-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="page d-flex flex-row flex-column-fluid">
                <!--begin::Aside-->
                @include('pages.include.side-menu.aside')
                <!--end::Aside-->
                <!--begin::Wrapper-->
                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    @yield('content')

                    <!--begin::Footer-->
                    @include('pages.include.footer.footer')
                    <!--end::Footer-->
                </div>
            </div>
        </div>
        
        <!--begin::Activities drawer-->
        @include('pages.include.activity_log.index')
        <!--end::Activities drawer-->

        <!--begin::Chat drawer--> <!-- Notification -->
        @include('pages.include.notification.index')
        <!--end::Chat drawer-->

        <!--begin::Scrolltop-->
        @include('pages.include.scrolltop.scrolltop')
        <!--end::Scrolltop-->

        <!--begin::Scripts-->
        @include('pages.layouts.scripts.script')
        <!--end::Scripts-->

    </body>
    <!--end::Body-->
</html>