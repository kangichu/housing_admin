"use strict";
var KTModalNewCard = function() {
    var t, e, n, r, o, i;
    return {
        init: function() {
            (i = document.querySelector(".availability")) && (o = new bootstrap.Modal(i),
            r = document.querySelector("#kt_modal_availability_form"),
            t = document.getElementById("kt_modal_new_card_submit"),
            e = document.getElementById("kt_modal_new_card_cancel"),
            
            n = FormValidation.formValidation(r, {
                fields: {
                    availability: {
                        validators: {
                            notEmpty: {
                                message: "This field is required."
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            }),
            t.addEventListener("click", (function(e) {
                e.preventDefault(),
                n && n.validate().then((function(e) {
                    console.log("validated!"),
                    "Valid" == e ? (t.setAttribute("data-kt-indicator", "on"),
                    t.disabled = !0,
                    setTimeout((function() {
                        t.removeAttribute("data-kt-indicator"),
                        t.disabled = !1,
                        Swal.fire({
                            text: "Form has been successfully submitted!",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then((function(t) {

                            let values = $('#kt_modal_availability_form').serializeArray().reduce((map, input) => {
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

                            var token = $('meta[name="csrf-token"]').attr('content');
                            let listing_id = $('input[name = listing_id]').val();

                            $.ajax({
                                url: '/listings/'+listing_id,
                                type: 'PUT',
                                data: { '_token' : token, values},
                                success: function(response) 
                                {
                                    if(response.status == 200)
                                        window.location.reload();
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

                            
                        }
                        ))
                    }
                    ), 2e3)) : Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    })
                }
                ))
            }
            )),
            e.addEventListener("click", (function(t) {
                t.preventDefault(),
                Swal.fire({
                    text: "Are you sure you would like to cancel?",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Yes, cancel it!",
                    cancelButtonText: "No, return",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-active-light"
                    }
                }).then((function(t) {
                    t.value ? (r.reset(),
                    o.hide()) : "cancel" === t.dismiss && Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    })
                }
                ))
            }
            )))
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTModalNewCard.init()
}
));
