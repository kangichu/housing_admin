<script>var hostUrl = "assets/";</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('dashboard/plugins/global/plugins.bundle.js') }} "></script>
<script src="{{ asset('dashboard/js/scripts.bundle.js') }} "></script>
<!--end::Global Javascript Bundle-->

<script src="{{ asset('dashboard/js/custom/modals/two-factor-authentication.js') }}"></script>

<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{ asset('dashboard/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Page Vendors Javascript-->

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

<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('dashboard/js/custom/apps/subscriptions/list/export.js') }}"></script>
<script src="{{ asset('dashboard/js/custom/apps/subscriptions/list/list.js') }}"></script>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('auto-click-button').click();
    });
</script>

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

    $('#footer').maxlength({
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
                $(this).find('[data-kt-repeater="select2"]').select2();
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    });

</script>

<script type="text/javascript">
    $('.kt_feature_repeater_edit').each(function() {
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
        
    var kt_edit_feautures_button = document.querySelector("#kt_edit_feautures_button");

    kt_edit_feautures_button.addEventListener("click", function() {
    
        kt_edit_feautures_button.setAttribute("data-kt-indicator", "on");

        var formValues = [];

        var repeatedItems = $('[data-repeater-item-edit]');

        repeatedItems.each(function() {
            var repeatedItemValues = {};
            var inputs = $(this).find('input');

            inputs.each(function() {
                var input = $(this);
                var inputName = input.attr('name').replace(/kt_feature_repeater_edit\[\d+\]\[/g, '').replace(/\]\[/g, '').replace(/\]/g, '');
                var inputValue = input.val();

                repeatedItemValues[inputName] = inputValue;
            });

            formValues.push(repeatedItemValues);
        });

        console.log(formValues);
        var random = Math.floor(Math.random() * 1000);

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/feature/'+ random,
            type: 'PUT',
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
                        kt_edit_feautures_button.removeAttribute("data-kt-indicator");
                        $('#kt_modal_edit_features_form').trigger("reset");
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
                    kt_edit_feautures_button.removeAttribute("data-kt-indicator");
                }));
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('input[name=subscription_status]').click(function() {
            var subscriptionId = $(this).data('subscription-id');
            var status = $(this).prop('checked') ? 'Active' : 'Pending';
            $.ajax({
                url: '/subscription_status/' + subscriptionId,
                type: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: status
                },
                success: function(data) {
                    Swal.fire({
                        text: "Success, "+data.message,
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
                error: function(xhr, status, error) {
                    // Handle error
                }
            });
        });
    });
</script>

<script type="text/javascript">
    var start = moment().subtract(29, "days");
    var end = moment();

    function cb(start, end) {
        $("#kt_daterangepicker_subscription_valid_period").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
    }

    $("#kt_daterangepicker_subscription_valid_period").daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
        "Next 7 Days": [moment(), moment().add(6, "days") ],
        "Next 30 Days": [moment(), moment().add(29, "days")],
        "This Month": [moment().startOf("month"), moment().endOf("month")],
        "Next Month": [moment().add(1, "month").startOf("month"), moment().add(1, "month").endOf("month")]
        }
    }, cb);

    cb(start, end);
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#customer').select2({
            dropdownParent: $("#kt_modal_add")
        });
    });
</script>

<script type="text/javascript">
    // Elements to indicate
    var button = document.querySelector("#kt_button_add_subscriber");

    // Handle button click event
    button.addEventListener("click", function() {
        // Activate indicator
        button.setAttribute("data-kt-indicator", "on");

        // Handle form submission
        let values = $('#kt_modal_add_subscriber_form').serializeArray().reduce((map, input) => {
            let value;
            if (map.hasOwnProperty(input.name)) {
                value = Array.isArray(map[input.name]) ?
                    map[input.name] : [map[input.name]];
                value.push(input.value);
            } else {
                value = input.value;
            }
            map[input.name] = value;
            return map;
        }, {});

        let subscription_id = $('input[name = subscription_id]').val();

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/subscriber',
            type: 'POST',
            data: { '_token' : token, values},
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
                        $('#kt_modal_add_subscriber_form').trigger("reset");
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
</script>

<script type="text/javascript">
    $(document).ready(function() {
        // create selectButton and add click event listener
        $(document).on('click', '[id^="selectButton"]', function() {
            var featureId = $(this).closest(".features").attr("id");
            var $inputs = $("#"+featureId+" input[type='checkbox']");
            var allChecked = $inputs.length === $inputs.filter(":checked").length;
            $inputs.prop("checked", !allChecked);
            toggleButtonVisibility(featureId);
        });

        // add click event listener to checkboxes
        $(document).on('click', ".features input[type='checkbox']", function() {
            var featureId = $(this).closest(".features").attr("id");
            toggleButtonVisibility(featureId);
        });

        // toggle selectButton and deleteButton visibility
        function toggleButtonVisibility(featureId) {
            var $selectButton = $("#"+featureId+" [id^='selectButton']");
            var $deleteButton = $("#"+featureId+" [id^='deleteButton']");
            var anyChecked = $("#"+featureId+" input[type='checkbox']:checked").length > 0;
            if (anyChecked) {
                $deleteButton.show();
            } else {
                $deleteButton.hide();
            }
            if ($("#"+featureId+" input[type='checkbox']").length === $("#"+featureId+" input[type='checkbox']:checked").length) {
                $selectButton.prop("checked", true);
            } else {
                $selectButton.prop("checked", false);
            }
        }


        // hide deleteButton by default
        $("[id^='deleteButton']").hide();

        // show/hide selectButton and deleteButton on page load
        $(".features").each(function() {
            toggleButtonVisibility($(this).attr("id"));
        });
    });

</script>

<script type="text/javascript">
    // Add event listener to all buttons with class delete_selected_features
    var delete_selected_features = document.querySelectorAll(".delete_selected_features");
    
    delete_selected_features.forEach(function(delete_selected_feature) {
        delete_selected_feature.addEventListener("click", function() {

            // Get the dynamic value from the id attribute
            var dynamicValue = delete_selected_feature.id.split("-")[1];
            delete_selected_feature.setAttribute("data-kt-indicator", "on");
            console.log($('#form-'+dynamicValue));
            // Handle form submission
            let values = $('#form-'+dynamicValue).serializeArray().reduce((map, input) => {
                let value;
                if (map.hasOwnProperty(input.name)) {
                    value = Array.isArray(map[input.name]) ?
                        map[input.name] : [map[input.name]];
                    value.push(input.value);
                } else {
                    value = input.value;
                }
                map[input.name] = value instanceof Array && value.length === 1 ? value[0] : value;
                return map;
            }, {});

            console.log(values);


            // Your code to delete selected features using dynamicValue goes here
            var token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '/bulk/feature/delete',
                type: 'POST',
                data: { '_token' : token, values},
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
                            delete_selected_feature.removeAttribute("data-kt-indicator");
                            $('#delete-selected').modal('hide');
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
                        delete_selected_feature.removeAttribute("data-kt-indicator");
                    }));
                }
            });

        });
    });

</script>

<script type="text/javascript">
    // Elements to indicate
    var kt_limitations_buttons = document.querySelectorAll("#kt_limitations_button");

    // Handle button click event
    kt_limitations_buttons.forEach(function(kt_limitations_button) {
        kt_limitations_button.addEventListener("click", function() {
            // Activate indicator
            kt_limitations_button.setAttribute("data-kt-indicator", "on");

            let sub_id = kt_limitations_button.getAttribute('data-sub-id');

            // Handle form submission
            // Get the form associated with this button using a common class
            var formData = $('#kt_modal_add_limitations_form-'+sub_id).serializeArray();

            // Create an empty object to store the form values
            var formValues = {};

            // Loop through the form data and extract the form values
            var allFieldsFilled = true; // flag to check if all form fields are filled
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

                // check if the input field is empty
                if (inputValue === '') {
                    allFieldsFilled = false;
                    return false; // exit the loop if a field is empty
                }
            });

            var form = $('#kt_modal_add_limitations_form-' + sub_id);

            if (allFieldsFilled) {

                console.log(formValues);

                let subscription_id = $('input[name = subscription_id]').val();

                var token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: '/subscription_limits',
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
                                kt_limitations_button.removeAttribute("data-kt-indicator");
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
                            kt_limitations_button.removeAttribute("data-kt-indicator");
                        }));
                    }
                });
            } else{
                Swal.fire({
                    text: "Sorry, looks like there are some empty fields, please fill them.",
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-light"
                    }
                }).then((function() {

                    button.removeAttribute("data-kt-indicator");
                    
                    form.find(':input[required]:not(:disabled)').each(function() {
                        if ($(this).val() === '') {
                            $(this).addClass('is-invalid');
                        }
                    });
                }));
            }

            var inputs = document.querySelectorAll("#kt_modal_add_limitations_form-" + sub_id + " input");
            inputs.forEach(function(input) {
                input.addEventListener("input", function() {
                    // Remove existing is-invalid class
                    input.classList.remove("is-invalid");

                    // Check if input is empty
                    if (input.value.trim() === "") {
                        // Add is-invalid class
                        input.classList.add("is-invalid");
                    }
                });
            });
        });
    });
</script>

<script type="text/javascript">
    // Elements to indicate
    var kt_subscription_feautures_buttons = document.querySelectorAll("#kt_subscription_feautures_button");

    // Handle button click event
    kt_subscription_feautures_buttons.forEach(function(kt_subscription_feautures_button) {
        kt_subscription_feautures_button.addEventListener("click", function() {
            // Activate indicator
            kt_subscription_feautures_button.setAttribute("data-kt-indicator", "on");

            let sub_id = kt_subscription_feautures_button.getAttribute('data-sub-id');

            // Handle form submission

            // Loop through the form data and extract the form values
            let values = $('#kt_modal_add_subscription_features_form-'+sub_id).serializeArray().reduce((map, input) => {
                let value;
                if (map.hasOwnProperty(input.name)) {
                    value = Array.isArray(map[input.name]) ?
                        map[input.name] : [map[input.name]];
                    value.push(input.value);
                } else {
                    value = input.value;
                }
                map[input.name] = value;
                return map;
            }, {});
            
            // Check if all form inputs have been entered
            let allFieldsFilled = true;
            let formInputs = document.querySelectorAll("#kt_modal_add_subscription_features_form-" + sub_id + " input");
            formInputs.forEach(function(input) {
                if (input.value.trim() === "") {
                    allFieldsFilled = false;
                    input.classList.add("is-invalid");
                }
            });

            if (allFieldsFilled) {

                let subscription_id = $('input[name = subscription_id]').val();

                var token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: '/subscription_features',
                    type: 'POST',
                    data: { '_token' : token, values},
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
                                kt_subscription_feautures_button.removeAttribute("data-kt-indicator");
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
                            kt_subscription_feautures_button.removeAttribute("data-kt-indicator");
                        }));
                    }
                });

            } else{
                Swal.fire({
                    text: "Sorry, looks like there are some empty fields, please fill them.",
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-light"
                    }
                }).then((function() {
                    kt_subscription_feautures_button.removeAttribute("data-kt-indicator");
                }));
            }

        
        });
    });
</script>

@endif

@if(request()->is('invoice') || request()->is('invoice/*'))

<script src="{{ asset('dashboard/js/custom/apps/invoices/create.js') }}"></script>

@endif

@if(request()->is('descriptions')) 

<script type="text/javascript">
    $("#kt_table_descriptions").DataTable({
        "searching": true,
        "responsive": true,
    });
</script>

<!--CKEditor Build Bundles:: Only include the relevant bundles accordingly-->
<script src="{{ asset('dashboard/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // Get the dropdown select input
        const dropdown = $('select[name="type"]');

        // Get the 3 divs with the class name "non-commercial"
        const newTypeContainer = $('#newTypeContainer');
        newTypeContainer.hide();

        // Add an event listener to the dropdown select input
        dropdown.on("change", function() {
            console.log($(this).val());

            // If the selected option is "Commercial Unit"
            if ($(this).val() === "Other") {
                // Hide the 3 divs with fadeOut animation
                newTypeContainer.show(); // Adjust the animation speed as needed
            } else {
                // Show the 3 divs with fadeIn animation
                newTypeContainer.hide(); // Adjust the animation speed as needed
            }
        });
    });
</script>

<script type="text/javascript">
    ClassicEditor
    .create(document.querySelector('#description'))
    .then(editor => instance = editor);

    // Element to indecate
    var button = document.querySelector("#kt_button_description");

    // Handle button click event
    button.addEventListener("click", function() {
        // Activate indicator
        button.setAttribute("data-kt-indicator", "on");

        let values = $('#kt_modal_add_description_form').serializeArray().reduce((map, input) => {
            let value;
            if (map.hasOwnProperty(input.name)) {
                value = Array.isArray(map[input.name]) ?
                    map[input.name] : [map[input.name]];
                value.push(input.value);
            } else {
                value = input.value;
            }
            map[input.name] = value;
            return map;
        }, {});

        var description = instance.getData();

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: 'descriptions',
            type: 'POST',
            data: { '_token' : token, values, description},
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
</script>

<script type="text/javascript">
    const editors = document.querySelectorAll('#description_edit');
    Array.from(editors).forEach((textarea) => {
        ClassicEditor
        .create(textarea)
        .then(editor => {
            // Find the corresponding button for each editor
            var descriptionId = textarea.dataset.descripton_id;
            var button = document.querySelector("#kt_button_description_edit-"+descriptionId);

            // Handle button click event
            button.addEventListener("click", function(event) {
                // Activate indicator
                button.setAttribute("data-kt-indicator", "on");

                var description = editor.getData();

                var token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: 'descriptions/'+descriptionId,
                    type: 'PUT',
                    data: { '_token' : token, description},
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
    });

</script>

@endif

@if(request()->is('descriptions') || request()->is('members') || request()->is('communications'))

<script src="{{ asset('dashboard/js/custom/apps/user-management/users/list/table.js' ) }}"></script>
<script src="{{ asset('dashboard/js/custom/apps/user-management/users/list/export-users.js' ) }}"></script>

@endif

@if(request()->is('feature'))

<script type="text/javascript">
    document.getElementById('routeSearch').addEventListener('input', function() {
        var searchValue = this.value.toLowerCase();
        var routeItems = document.querySelectorAll('.route-item');

        routeItems.forEach(function(item) {
            var label = item.querySelector('label').textContent.toLowerCase();
            if (label.includes(searchValue)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>

<script type="text/javascript">
    document.querySelectorAll('input[id^="routeSearch_"]').forEach(searchInput => {
        searchInput.addEventListener('input', function() {
            var searchValue = this.value.toLowerCase();
            var form = this.closest('form');
            var featureId = this.id.replace('routeSearch_', '');
            var routeItems = form.querySelectorAll('.route-item_' + featureId);

            routeItems.forEach(function(item) {
                var label = item.querySelector('label').textContent.toLowerCase();
                if (label.includes(searchValue)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('auto-click-button').click();
    });
</script>

<script type="text/javascript">
    var kt_add_feautures_button = document.querySelector("#kt_add_feautures_button");

    kt_add_feautures_button.addEventListener("click", function() {
        kt_add_feautures_button.setAttribute("data-kt-indicator", "on");

        let values = $('#kt_modal_add_features_form').serializeArray().reduce((map, input) => {
            let value;
            if (map.hasOwnProperty(input.name)) {
                value = Array.isArray(map[input.name]) ? map[input.name] : [map[input.name]];
                value.push(input.value);
            } else {
                value = input.value;
            }
            map[input.name] = value;
            return map;
        }, {});

        // Adjust the structure for route_groups
        if (values['route_groups[]']) {
            values['route_groups'] = values['route_groups[]'];
            delete values['route_groups[]'];
        }

        console.log(values);

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/feature',
            type: 'POST',
            data: { '_token': token, values },
            success: function(response) {
                if (response.status == 200)
                    Swal.fire({
                        text: "Success, " + response.message,
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-light"
                        }
                    }).then(function() {
                        kt_add_feautures_button.removeAttribute("data-kt-indicator");
                        $('#kt_modal_add_features_form').trigger("reset");
                        $('.modal').modal('hide');
                        location.reload(); // reload the page
                    });
            },
            error: function(e) {
                Swal.fire({
                    text: "Sorry, looks like there are some errors detected, please try again.",
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-light"
                    }
                }).then(function() {
                    kt_add_feautures_button.removeAttribute("data-kt-indicator");
                });
            }
        });
    });
</script>

<script type="text/javascript">
    $("#kt_datatable_features").DataTable({
        "language": {
        "lengthMenu": "Show _MENU_",
    },
        "dom":
        "<'row'" +
        "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
        "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
        ">" +

        "<'table-responsive'tr>" +

        "<'row'" +
        "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
        "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
        ">"
    });
</script>

<script type="text/javascript">
    document.querySelectorAll(".kt_add_feautures_button_edit").forEach(button => {
        button.addEventListener("click", function() {
            var formId = this.getAttribute("id").replace("kt_add_feautures_button_edit_", "kt_modal_add_features_form_edit_");
            var form = document.querySelector("#" + formId);
            var featureId = form.querySelector('input[name="feature_id"]').value;
            var indicator = this;

            indicator.setAttribute("data-kt-indicator", "on");

            let values = $(form).serializeArray().reduce((map, input) => {
                let value;
                if (map.hasOwnProperty(input.name)) {
                    value = Array.isArray(map[input.name]) ? map[input.name] : [map[input.name]];
                    value.push(input.value);
                } else {
                    value = input.value;
                }
                map[input.name] = value;
                return map;
            }, {});

            // Adjust the structure for route_groups
            if (values['route_groups[]']) {
                values['route_groups'] = values['route_groups[]'];
                delete values['route_groups[]'];
            }

            console.log(values);

            var token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '/feature/' + featureId,
                type: 'PUT',
                data: { '_token': token, values },
                success: function(response) {
                    if (response.status == 200)
                        Swal.fire({
                            text: "Success, " + response.message,
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-light"
                            }
                        }).then(function() {
                            indicator.removeAttribute("data-kt-indicator");
                            $(form).trigger("reset");
                            $('.modal').modal('hide');
                            location.reload(); // reload the page
                        });
                },
                error: function(e) {
                    Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-light"
                        }
                    }).then(function() {
                        indicator.removeAttribute("data-kt-indicator");
                    });
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.textarea-maxlength').maxlength({
            warningClass: "badge badge-warning",
            limitReachedClass: "badge badge-success"
        });
    });
</script>

<script type="text/javascript">
    // Element to indecate
    var buttons = document.querySelectorAll(".kt_button_delete_features");

    // Handle button click event
    buttons.forEach(button => {
        button.addEventListener("click", function() {
            // Activate indicator
            var featureId = this.getAttribute('data-feature-id');
            var token = $('meta[name="csrf-token"]').attr('content');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-secondary'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    // Activate indicator
                    button.setAttribute("data-kt-indicator", "on");

                    $.ajax({
                        url: '/feature/' + featureId,
                        type: 'DELETE',
                        data: {
                            '_token': token
                        },
                        success: function(response) {
                            if (response.status == 200) {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: response.message,
                                    icon: 'success',
                                    confirmButtonText: 'Ok',
                                    customClass: {
                                        confirmButton: 'btn btn-light'
                                    },
                                    buttonsStyling: false
                                }).then(() => {
                                    location.reload(); // Reload the page
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: response.message,
                                    icon: 'error',
                                    confirmButtonText: 'Ok',
                                    customClass: {
                                        confirmButton: 'btn btn-light'
                                    },
                                    buttonsStyling: false
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                title: 'Error!',
                                text: 'An error occurred while deleting the feature.',
                                icon: 'error',
                                confirmButtonText: 'Ok',
                                customClass: {
                                    confirmButton: 'btn btn-light'
                                },
                                buttonsStyling: false
                            });
                        },
                        complete: function() {
                            // Disable indicator
                            button.removeAttribute("data-kt-indicator");
                        }
                    });
                }
            });
        });
    });
</script>

@endif

@if(request()->is('socials'))

<script src="{{ asset('dashboard/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('auto-click-button').click();
    });
</script>

<script type="text/javascript">
    $("#kt_table_socials").DataTable({
        "language": {
        "lengthMenu": "Show _MENU_",
    },
        "dom":
        "<'row'" +
        "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
        "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
        ">" +

        "<'table-responsive'tr>" +

        "<'row'" +
        "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
        "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
        ">"
    });
</script>

<script type="text/javascript">
    var options = {
        selector: "#kt_post",
        plugins: "lists advlist autolink charmap print preview hr anchor pagebreak searchreplace wordcount visualblocks visualchars insertdatetime nonbreaking save table directionality emoticons template paste textpattern",
        toolbar: "undo redo | bold italic underline strikethrough | bullist numlist outdent indent | code | insertTagsButton",
        menubar: false, // Disable the menu bar
        setup: function (editor) {
            editor.ui.registry.addButton('insertTagsButton', {
                text: 'Insert Tags',
                onAction: function () {
                    var tags = $('#kt_tags').val(); // Get tags from Tagify input
                    var tagValues = JSON.parse(tags).map(tag => `#${tag.value.trim()}`).join(' ');
                    editor.insertContent(`<p>${tagValues}</p>`);
                }
            });
        }
    };

    if (KTApp.isDarkMode()) {
        options["skin"] = "oxide-dark";
        options["content_css"] = "dark";
    }

    tinymce.init(options);
</script>

<script type="text/javascript">
    $(document).ready(function() {

        var selects = document.querySelectorAll('select');
        var kt_datepicker_schedule = document.querySelector('#kt_datepicker_schedule');
        var kt_datepicker_repeat_ends = document.querySelector('#kt_datepicker_repeat_ends');
        var kt_tags = document.querySelector("#kt_tags");
        
        selects.forEach(select => {
            $(select).select2({
                placeholder: "Select an option",
                allowClear: true,
                dropdownParent: $("#kt_modal_add_post")
            });
        });

        new Tagify(kt_tags);

        kt_datepicker_schedule.flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });

        kt_datepicker_repeat_ends.flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
    });
</script>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var buttons = document.querySelectorAll("[id^='kt_button_delete_']");
    
        buttons.forEach(button => {
            button.addEventListener("click", function() {
                // Activate indicator
                button.setAttribute("data-kt-indicator", "on");
    
                // Submit the form
                var referralCode = button.id.replace('kt_button_delete_', '');
                var form = document.getElementById('delete-social-' + referralCode);
                form.submit();
    
                // Disable indicator after form submission
                setTimeout(function() {
                    button.removeAttribute("data-kt-indicator");
                }, 3000);
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        // Element to indicate
        var button = document.querySelector("#kt_button_description");

        // Handle button click event
        button.addEventListener("click", function() {
            // Activate indicator
            button.setAttribute("data-kt-indicator", "on");

            // Get form values
            var platform = $('#platform').val();
            var tags = $('#kt_tags').val();
            var schedule = $('#kt_datepicker_schedule').val();
            var repeat = $('#repeat').val();
            var status = $('#status').val();
            var repeatEvery = $('#repeat_every').val();
            var repeatEnds = $('#kt_datepicker_repeat_ends').val();
            var avatar = $('input[name="avatar"]')[0].files[0]; // Get the image file

            var token = $('meta[name="csrf-token"]').attr('content');

            let values = $('#kt_modal_add_post_form').serializeArray().reduce((map, input) => {
                let value;
                if (map.hasOwnProperty(input.name)) {
                    value = Array.isArray(map[input.name]) ? map[input.name] : [map[input.name]];
                    value.push(input.value);
                } else {
                    value = input.value;
                }
                map[input.name] = value;
                return map;
            }, {});

            // Add TinyMCE content to values
            values['kt_post'] = tinymce.get('kt_post').getContent();

            // Validate form fields
            var validationErrors = validateFormFields({
                platform: platform,
                tags: tags,
                schedule: schedule,
                repeat: repeat,
                status: status,
                repeatEvery: repeatEvery,
                repeatEnds: repeatEnds,
                kt_post: values['kt_post']
            });

            if (validationErrors.length > 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: validationErrors.join('\n'),
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-light"
                    }
                });
                button.removeAttribute("data-kt-indicator");
                return;
            }

            // If all fields are valid, submit the form via AJAX
            var formData = new FormData();
            formData.append('_token', token);
            for (var key in values) {
                if (values.hasOwnProperty(key)) {
                    formData.append(key, values[key]);
                }
            }
            if (avatar) {
                formData.append('avatar', avatar);
            }

            // If all fields are valid, submit the form via AJAX
            $.ajax({
                url: '/socials', // Replace with your actual post URL
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-light"
                            }
                        }).then(function() {
                            location.reload(); // Reload the page or redirect as needed
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-light"
                            }
                        }).then(function() {
                            button.removeAttribute("data-kt-indicator");
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while submitting the form. Please try again.',
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-light"
                        }
                    }).then(function() {
                        button.removeAttribute("data-kt-indicator");
                    });
                }
            });

        });

        // Initialize Select2 for platform
        $('#platform').select2({
            placeholder: "Select an option",
            allowClear: true,
            dropdownParent: $("#kt_modal_add_post")
        });

        // Initialize date pickers
        $('#kt_datepicker_schedule').datetimepicker({
            format: 'Y-m-d H:i'
        });
        $('#kt_datepicker_repeat_ends').datetimepicker({
            format: 'Y-m-d H:i'
        });
    });

    function validateFormFields(fields) {
        var errors = [];

        if (!fields.platform || fields.platform.length === 0) {
            errors.push('Please select at least one platform.');
        }

        if (!fields.tags) {
            errors.push('Please enter tags.');
        }

        if (!fields.status) {
            errors.push('Please enter status.');
        }

        if (!fields.schedule) {
            errors.push('Please pick a schedule date and time.');
        }

        if (fields.repeat === "1") {
            if (!fields.repeatEvery) {
                errors.push('Please select the repeat interval.');
            }

            if (!fields.repeatEnds) {
                errors.push('Please pick the repeat end date and time.');
            }
        }

        if (!fields.kt_post) {
            errors.push('Please enter the post content.');
        }

        return errors;
    }
</script>

@endif


@if(request()->is('member_badges/*'))

<script type="text/javascript">
    // Element to indecate
    var button = document.querySelector("#kt_button_run_verification");

    // Handle button click event
    button.addEventListener("click", function() {
        // Activate indicator
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to proceed with the verification?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, proceed!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Activate indicator
                button.setAttribute("data-kt-indicator", "on");

                // Disable indicator after 3 seconds
                setTimeout(function() {
                    button.removeAttribute("data-kt-indicator");
                }, 3000);

                // Optionally, you can add additional actions here
                Swal.fire(
                    'Confirmed!',
                    'Your verification has started.',
                    'success'
                );
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Cancelled',
                    'Your verification was cancelled.',
                    'error'
                );
            }
        });
    });
</script>

@endif