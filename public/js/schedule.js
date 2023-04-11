$(document).ready(function () {
    $("#kt_modal_schedule_form").submit((e) => {

        e.preventDefault();

        let values = $('#kt_modal_schedule_form').serializeArray().reduce((map, input) => {
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

        $('#schedule_time').val('');
        $('#viewing').modal('hide');

        Swal.fire({
            text: "Form has been successfully submitted!",
            icon: "success",
            buttonsStyling: !1,
            confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        }).then((function(t) {

            var token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "/schedule",
                type: "POST",
                data: { '_token' : token, values},
                success: function(response) 
                {
                    if(response.status == 200)
                        window.location.reload();

                    if(response.status == 405)
                        Swal.fire({
                            text: response.message,
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-light"
                            }
                        }).then((function() {
                            window.location.reload();
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

        }));

        

        

    });
});