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
        
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
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

        @if(request()->is('appointments'))

        <!--begin::Page Vendor Stylesheets(used by this page)-->
        <link href="{{ asset('dashboard/plugins/custom/datatables/datatables.bundle.css') }} " rel="stylesheet" type="text/css" />
        <!--end::Page Vendor Stylesheets-->

        @endif

        @if(request()->is('listings*'))

        <link href="https://releases.transloadit.com/uppy/v2.12.1/uppy.min.css" rel="stylesheet">

        <style type="text/css">
            .grid-item { width: 33%;}

            .empty-cart {
              width: 50vw;
              margin: 0 auto;
              text-align: center;
            }

        </style>

        @endif

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

        <script>var hostUrl = "assets/";</script>
        <!--begin::Javascript-->
        <!--begin::Global Javascript Bundle(used by all pages)-->
        <script src="{{ asset('dashboard/plugins/global/plugins.bundle.js') }} "></script>
        <script src="{{ asset('dashboard/js/scripts.bundle.js') }} "></script>
        <!--end::Global Javascript Bundle-->

        <script src="{{ asset('dashboard/js/custom/modals/two-factor-authentication.js') }}"></script>

        <!--begin::Page Custom Javascript(used by this page)-->
        @if(request()->is('statistics*'))

        <script src="{{ asset('dashboard/js/custom/widgets.js') }}"></script>

        @endif

        <script src="{{ asset('dashboard/js/custom/apps/chat/chat.js') }}"></script>
        <!-- <script src="{{ asset('dashboard/js/custom/modals/upgrade-plan.js') }}"></script> -->
        <!--end::Page Custom Javascript-->
        <script src="{{ asset('assets/js/TweenMax.min.js') }}"></script>
        <!--end::Javascript-->

        <script src="{{ asset('js/loader.js') }}"></script>

        <script type="module">
            import { identiconSvg } from "{{ asset('js/minidenticons.min.js')}}"
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                // show the alert
                setTimeout(function() {
                    $(".alert").alert('close');
                }, 4000);
            });
        </script>

        @if(request()->is('subscription') || request()->is('subscription/*'))

        <script src="{{ asset('dashboard/js/custom/modals/create-app.js') }}"></script>
        <script src="{{ asset('dashboard/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>

        <script type="text/javascript">
            $('#name').maxlength({
                threshold: 60,
                warningClass: "badge badge-primary",
                limitReachedClass: "badge badge-success"
            });

            $('#description').maxlength({
                threshold: 200,
                warningClass: "badge badge-primary",
                limitReachedClass: "badge badge-success"
            });

        </script>

        <script type="text/javascript">
            $('.kt_feature_repeater_basic').each(function() {
                $(this).repeater({
                    initEmpty: false,
                   
                    show: function() {
                        $(this).slideDown();
                    },

                    hide: function(deleteElement) {
                        $(this).slideUp(deleteElement);
                    }
                });
            });

        </script>

        <script type="text/javascript">
            // Elements to indicate
            var buttons = document.querySelectorAll("#kt_feautures_button");
            // Handle button click event
            buttons.forEach(function(button) {
                button.addEventListener("click", function() {
                    // Activate indicator
                    button.setAttribute("data-kt-indicator", "on");

                    let sub_id = button.getAttribute('data-sub-id');

                    // Handle form submission
                    // Get the form associated with this button using a common class
                    var formData = $('#kt_modal_add_features_form-'+sub_id).serializeArray();

                    // Create an empty object to store the form values
                    var formValues = {};

                    // Loop through the form data and extract the form values
                    formData.forEach(function(input) {
                        var inputName = input.name;
                        var inputValue = input.value;

                        // Check if the input is part of a repeated field
                        if (inputName.indexOf('[') !== -1) {
                            var inputNameParts = inputName.split('[');
                            var repeatedFieldName = inputNameParts[0];
                            var repeatedFieldIndex = inputNameParts[1].replace(']', '');

                            // Check if the repeated field already exists in the form values
                            if (!formValues.hasOwnProperty(repeatedFieldName)) {
                                formValues[repeatedFieldName] = [];
                            }

                            // Check if the repeated field index already exists in the form values
                            if (!formValues[repeatedFieldName][repeatedFieldIndex]) {
                                formValues[repeatedFieldName][repeatedFieldIndex] = {};
                            }

                            // Add the repeated field value to the form values
                            formValues[repeatedFieldName][repeatedFieldIndex][inputNameParts[2].replace(']', '')] = inputValue;
                        } else {
                            // Add the input value to the form values
                            formValues[inputName] = inputValue;
                        }
                    });

                    let subscription_id = $('input[name = subscription_id]').val();


                    var token = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        url: '/feature',
                        type: 'POST',
                        data: { '_token' : token, formValues},
                        success: function(response) 
                        {
                            if(response.status == 200)

                                Swal.fire({
                                    text: "Success, "+response.message,
                                    icon: "success",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-light"
                                    }
                                }).then((function() {
                                    button.removeAttribute("data-kt-indicator");
                                    $('#kt_modal_add_features_form-'+sub_id).trigger("reset");
                                    $('.modal').modal('hide');
                                    location.reload(); // reload the page
                                }));
                        },
                        error:function (e) {
                            Swal.fire({
                                text: "Sorry, looks like there are some errors detected, please try again.",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-light"
                                }
                            }).then((function() {
                                button.removeAttribute("data-kt-indicator");
                            }));
                        }
                    });
                });
            });
        </script>

        @endif

        @if(request()->is('invoice') || request()->is('invoice/*'))

        <script src="{{ asset('dashboard/js/custom/apps/invoices/create.js') }}"></script>

        @endif

    </body>
    <!--end::Body-->
</html>