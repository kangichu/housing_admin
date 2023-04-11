"use strict";
var KTCreateApp = function() {
    var e, t, o, r, a, i, n = [];
    return {
        init: function() {
            (e = document.querySelector("#kt_modal_create_app")),
            t = document.querySelector("#kt_modal_create_app_stepper"),
            o = document.querySelector("#kt_modal_create_app_form"),
            r = t.querySelector('[data-kt-stepper-action="submit"]'),
            a = t.querySelector('[data-kt-stepper-action="next"]'),
            (i = new KTStepper(t)).on("kt.stepper.changed", (function(e) {
                3 === i.getCurrentStepIndex() ? (r.classList.remove("d-none"),
                r.classList.add("d-inline-block"),
                a.classList.add("d-none")) : 5 === i.getCurrentStepIndex() ? (r.classList.add("d-none"),
                a.classList.add("d-none")) : (r.classList.remove("d-inline-block"),
                r.classList.remove("d-none"),
                a.classList.remove("d-none"))
            }
            )),
            i.on("kt.stepper.next", (function(e) {
                console.log("stepper.next");
                var t = n[e.getCurrentStepIndex() - 1];
                t ? t.validate().then((function(t) {
                    console.log("validated!"),
                    "Valid" == t ? e.goNext() : Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-light"
                        }
                    }).then((function() {}
                    ))
                }
                )) : (e.goNext(),
                KTUtil.scrollTop())
            }
            )),
            i.on("kt.stepper.previous", (function(e) {
                console.log("stepper.previous"),
                e.goPrevious(),
                KTUtil.scrollTop()
            }
            )),
            r.addEventListener("click", (function(e) {
                n[2].validate().then((function(t) {
                    console.log("validated!"),
                    "Valid" == t ? (e.preventDefault(),
                    r.disabled = !0,
                    r.setAttribute("data-kt-indicator", "on"),
                    setTimeout((function() {
                        Swal.fire({
                            text: "Form has been successfully submitted!",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then((function(t) {
                            i.goNext();
                            $("#kt_modal_create_app_form").submit();
                        }
                        ))
                    }
                    ), 2e3)) : Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-light"
                        }
                    }).then((function() {
                        KTUtil.scrollTop()
                    }
                    ))
                }
                ))
            })),
            n.push(FormValidation.formValidation(o, {
                fields: {
                    account_type: {
                        validators: {
                            notEmpty: {
                                message: "Please make a selection."
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
            })),
            n.push(FormValidation.formValidation(o, {
                fields: {
                    county: {
                        validators: {
                            notEmpty: {
                                message: "County is required",
                            }

                        }
                    },
                    county_specific: {
                        validators: {
                            notEmpty: {
                                message: "Specific Location is required"
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
            })),
            n.push(FormValidation.formValidation(o, {
                fields: {
                    type: {
                        validators: {
                            notEmpty: {
                                message: "Property Type is required"
                            }
                        }
                    },
                    furnishing: {
                        validators: {
                            notEmpty: {
                                message: "This is required"
                            }
                        }
                    },
                    bedrooms: {
                        validators: {
                            notEmpty: {
                                message: "This is required"
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
            }))
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTCreateApp.init()
}
));
