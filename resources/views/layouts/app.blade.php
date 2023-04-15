<!DOCTYPE html>
<html lang="en">
    <!--begin::Head-->
    <head>
        <title>{{ config('app.name', 'Tandish') }}</title>
        <meta charset="utf-8" />
        <meta name="description" content="Search apartments, find great deals on homes for sale and manage your properties from one place.">
        <meta name="keywords" content="real estate platform, property search, buy a home, sell a home, rental property management, real estate listings, real estate tools, home buying process, home selling process, rental property listings, real estate management, real estate search, virtual property tours, property valuation calculator, real estate agent directory, home financing assistance, rental application process, real estate market analysis, property management software, landlord resources">
        <meta name="author" content="Tandish">
        <meta name="thumbnail" content="{{asset('dashboard/media/logos/test.svg')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Global Stylesheets Bundle(used by all pages)-->
        <link href="{{ asset('dashboard/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->
        <link href="{{ asset('css/loader.css') }} " rel="stylesheet" type="text/css" />
        <style type="text/css">
            body::-webkit-scrollbar {
                width: .5em;
            }
             
            body::-webkit-scrollbar-track {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            }
             
            body::-webkit-scrollbar-thumb {
              background-color: darkgrey;
              outline: 1px solid slategrey;
            }
        </style>
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_body" class="bg-body">

        <div class="loader-wrap">
            <div class="preloader"></div>
            <div class="layer layer-one"><span class="overlay"></span></div>
            <div class="layer layer-two"><span class="overlay"></span></div>        
            <div class="layer layer-three"><span class="overlay"></span></div>        
        </div>
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root" id="app">
            <!--begin::Authentication - Sign-in -->
            <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(/dashboard/media/illustrations/dozzy-1/14.png">
                @yield('content')
            </div>
            <!--end::Authentication - Sign-in-->
        </div>
        <!--end::Main-->
        <!--begin::Javascript-->
        <!--begin::Global Javascript Bundle(used by all pages)-->
        <script src="{{ asset('dashboard/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('dashboard/js/scripts.bundle.js') }}"></script>
        <!--end::Global Javascript Bundle-->

        @if(request()->is('login*') || request()->is('/'))
        <!--begin::Page Custom Javascript(used by this page)-->
        <script src="{{ asset('dashboard/js/custom/authentication/sign-in/general.js') }}"></script>
        <!--end::Page Custom Javascript-->
        @endif

        @if(request()->is('password/reset'))

        <script src="{{ asset('dashboard/js/custom/authentication/password-reset/password-reset.js') }}"></script>
        
        @endif

        @if(request()->is('password/reset*'))

        <script src="{{ asset('dashboard/js/custom/authentication/password-reset/new-password.js') }}"></script>

        @endif

        <script src="{{ asset('assets/js/TweenMax.min.js') }}"></script>

        <script src="{{ asset('js/loader.js') }}"></script>

        
        <script type="text/javascript">
            $(document).ready(function() {
              $("#codes").select2();
            });
        </script>

        @if(request()->is('register*') || request()->is('business*'))

        <!--end::Javascript-->
        <script language="javascript" type="text/javascript">
            function limitText(limitField, limitNum) {
                if (limitField.value.length > limitNum) {
                    limitField.value = limitField.value.substring(0, limitNum);
                }
            }
        </script>

        <script type="text/javascript">
            function duplicateEmail(element){
                var email = $(element).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: '{{url('checkemail')}}',
                    data: {email:email},
                    dataType: "json",
                    success: function(res) {
                        if(res.exists){
                            Swal.fire({
                                text: "Sorry, looks like that email is taken, please try another.",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-light"
                                }
                            }).then((function() {
                                KTUtil.scrollTop()
                            }));
                        }
                    },
                    error: function (jqXHR, exception) {

                    }
                });
            }

            function businessduplicateEmail(element){
                var email = $(element).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: '{{url('businesscheckemail')}}',
                    data: {email:email},
                    dataType: "json",
                    success: function(res) {
                        if(res.exists){
                            Swal.fire({
                                text: "Sorry, looks like that email is taken, please try another.",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-light"
                                }
                            }).then((function() {
                                KTUtil.scrollTop()
                            }));
                        }
                    },
                    error: function (jqXHR, exception) {

                    }
                });
            }
        </script>

        @endif

    </body>
    <!--end::Body-->
</html>
