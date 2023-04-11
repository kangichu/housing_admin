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

        @if(request()->is('dashboard*'))

        

        @endif

        @if(request()->is('business_account*'))

        <!--begin::Page Custom Javascript(used by this page)-->
        <script src="{{ asset('dashboard/js/custom/account/settings/signin-methods.js') }}"></script>
        <script src="{{ asset('dashboard/js/custom/account/settings/profile-details.js') }}"></script>
        <script src="{{ asset('dashboard/js/custom/account/settings/deactivate-account.js') }}"></script>

        @endif

        @if(request()->is('subscription') || request()->is('subscription/*'))

        <script src="{{ asset('dashboard/js/custom/modals/create-app.js') }} "></script>

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

        @endif

        @if(request()->is('listings*'))

        <script src="{{ asset('js/masonry.pkgd.min.js') }} "></script>

        <script type="text/javascript">
            $('.grid').masonry({
              // options
              itemSelector: '.grid-item',
              gutter: 3
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                var input = document.getElementById("Search");
                input.addEventListener('keyup', () => {
                    var filter = input.value.toLowerCase();
                    var nodes = document.getElementsByClassName('grid-item');

                    for (i = 0; i < nodes.length; i++) {
                        if (nodes[i].innerText.toLowerCase().includes(filter)) {
                            nodes[i].style.display = "block";
                        } else {
                            nodes[i].style.display = "none";
                        }
                    }
                });
            });
        </script>

        <script src="https://releases.transloadit.com/uppy/v2.12.1/uppy.min.js"></script>

        <!-- Uppy image setup and upload using ajax -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('[id*=drag-drop-area]').each(function(){
                    
                    var listing_id = $(this).attr('class');

                    var uppy = new Uppy.Core({
                        allowMultipleUploadBatches: true,
                        restrictions: {
                            maxFileSize: 100000000,
                            // maxNumberOfFiles: 8,
                            minNumberOfFiles: 3,
                            allowedFileTypes: ['image/*', '.jpg', '.jpeg', '.png']
                        }
                    })
                    .use(Uppy.Dashboard, {
                        inline: true,
                        target: "#"+$(this).attr('id')+""
                    })
                    .use(Uppy.XHRUpload, {
                        endpoint: 'upload',
                        formData: true,
                        bundle: true,
                        headers: {
                            'X-CSRF-Token': " {{ csrf_token() }} "
                        },
                    });

                    uppy.on('upload-success', (file, response) => {
                        response.body.data.forEach(function (item, index) {
                            console.log(listing_id);
                            var token = $('meta[name="csrf-token"]').attr('content');

                            $.ajax({
                                url: 'attach',
                                type: 'POST',
                                data: { '_token' : token, item, listing_id},
                                success: function(response) 
                                {
                                    console.log('Updated');
                                },
                                error:function (e) {
                                    console.log(e);
                                }
                            });
                        });

                        window.location.reload();
                    });


                });
            });
        </script>

        <!-- Submit button animation after submit -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('form').each(function(){
                    $(this).submit(function (event) {
                        if ($(this).hasClass('submitted')) {
                            event.preventDefault();
                        }
                        else {
                            $(this).find(':submit').html('<i class="las la-ellipsis-h" aria-hidden="true"></i>');
                            $(this).addClass('submitted');
                        }
                    });
                });
            });
        </script>

        <script type="text/javascript">
            var table = $('#kt_modal_availability_submit').on('click', function() {
                var $this = $(this);
                $this.button('loading');
                setTimeout(function() {
                   $this.button('reset');
                }, 8000);
            });
        </script>

        @endif

        @if(request()->is('upload/*') || request()->is('listings*'))

        <!--begin::Page Vendors Javascript(used by this page)-->
        <script src="{{ asset('dashboard/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
        <!--end::Page Vendors Javascript-->

        @endif

        @if(request()->is('complex*') || request()->is('complex/*'))

        <script src="{{ asset('dashboard/js/custom/modals/create-complex.js') }} "></script>

        <script type="text/javascript">
            $(document).ready(function() {
                var input = document.getElementById("Search");
                input.addEventListener('keyup', () => {
                    var filter = input.value.toLowerCase();
                    var nodes = document.getElementsByClassName('complex-item');

                    for (i = 0; i < nodes.length; i++) {
                        if (nodes[i].innerText.toLowerCase().includes(filter)) {
                        nodes[i].style.display = "block";
                        } else {
                        nodes[i].style.display = "none";
                        }
                    }
                });
            });
        </script>

        <!-- Setup select2 for all select tags -->
        <script type="text/javascript">
            $(document).ready(function() {
                const selects = document.getElementsByTagName('select');
                Array.from(selects).forEach((e) => {
                    $(e).select2({
                        dropdownParent: $("#kt_modal_create_app")
                    });
                });
            });
        </script>

        <script type="text/javascript">
            $('#title').maxlength({
                threshold: 60,
                warningClass: "badge badge-primary",
                limitReachedClass: "badge badge-success"
            });

            $('#description').maxlength({
                threshold: 300,
                warningClass: "badge badge-primary",
                limitReachedClass: "badge badge-success"
            });

            $('#location_description').maxlength({
                threshold: 400,
                warningClass: "badge badge-primary",
                limitReachedClass: "badge badge-success"
            });
        </script>

        <script type="text/javascript">
            $('.hidden').remove();
        </script>

        @endif

        @if(request()->is('appointments*'))

        <!--begin::Page Vendors Javascript(used by this page)-->
        <script src="{{ asset('dashboard/plugins/custom/datatables/datatables.bundle.js') }}"></script>
        <!--end::Page Vendors Javascript-->

       
        <script type="text/javascript">
            var table = $(".schedules").DataTable({
                "searching": true,
                "responsive": true,
            });

            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
              $($.fn.dataTable.tables(true)).DataTable().columns.adjust().responsive.recalc();
            });  

            $('#search').on( 'keyup', function () {
                table
                    .search( this.value )
                    .draw();
            });
        </script>

        <!--begin::Page Vendors Javascript(used by this page)-->
        <script src="{{ asset('dashboard/plugins/custom/fullcalendar/fullcalendar.bundle.js') }} "></script>
        <!--end::Page Vendors Javascript-->

        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://unpkg.com/tippy.js@6"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $.ajax({
                    url: '/events',
                    type: 'GET',
                    success: function(response) 
                    {
                        // Define colors
                        var green =  KTUtil.getCssVariableValue("--bs-active-success");
                        var red =  KTUtil.getCssVariableValue("--bs-active-danger");

                        // Initialize Fullcalendar -- for more info please visit the official site: https://fullcalendar.io/demos
                        var calendarEl = document.getElementById("calendar");

                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            headerToolbar: {
                                left: "prev,next today",
                                center: "title",
                                right: "dayGridMonth,timeGridWeek,timeGridDay"
                            },
                            height: 650,
                            navLinks: true, // can click day/week names to navigate views
                            businessHours: true, // display business hours
                            editable: true,
                            selectable: true,
                            events:response,
                            eventDidMount: function (info) {
                              var tooltip = tippy(info.el, {
                                content: "Meeting up at " + info.event.extendedProps.time + " for the listing " + info.event.extendedProps.name ,
                                placement: "top",
                                interactive: true,
                                animation: 'scale-subtle',
                                theme: 'tomato',
                              });
                            }
                            });

                        calendar.render();
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
                            document.scrollTop();
                        }));
                    }
                });
            });
        </script>

        <script type="text/javascript">
            const inputs = document.getElementsByClassName('confirm');

            Array.from(inputs).forEach((e) => {
                var max = e.getAttribute('data-max-date');
                var min = e.getAttribute('data-min-date');

                $(e).daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    minDate: min,
                    maxDate: max,
                    minYear: 1901,
                    maxYear: parseInt(moment().format("YYYY"),10)
                });
            });
        </script>

        @endif

        @if(request()->is('billing*'))

        <script type="text/javascript">
            Inputmask({
                "mask" : "(999) 999-999-999"
            }).mask("#mobile");
        </script>

        @endif

        @if(request()->is('subscription*'))

        <script type="text/javascript">
            $(document).ready(function() {
                $(".subscription_plan_submit").on('click', function (e) {

                    var subscription_pan = $(this).attr('id');
                    var token = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        url: '/subscription',
                        type: 'POST',
                        data: { '_token' : token, subscription_pan},
                        success: function(response) 
                        {
                            if(response.status == 200)
                                window.location.reload();

                            if(response.status == 404)
                                Swal.fire({
                                    text: "Sorry, "+response.message,
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-light"
                                    }
                                }).then((function() {
                                    KTUtil.scrollTop()
                                }));

                            if(response.status == 401)
                                Swal.fire({
                                    text: "Sorry, "+response.message,
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-light"
                                    }
                                }).then((function() {
                                    KTUtil.scrollTop()
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
                                KTUtil.scrollTop()
                            }));
                        }
                    });
                });
            });
        </script>


        @endif


    </body>
    <!--end::Body-->
</html>