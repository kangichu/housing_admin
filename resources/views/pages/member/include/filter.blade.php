<!--begin::Toolbar-->
<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
    <!--begin::Filter-->
    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
    <span class="svg-icon svg-icon-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
        </svg>
    </span>
    <!--end::Svg Icon-->Filter</button>
    <!--begin::Menu 1-->
    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
        <!--begin::Header-->
        <div class="px-7 py-5">
            <div class="fs-5 text-dark fw-bolder">Filter Options</div>
        </div>
        <!--end::Header-->
        <!--begin::Separator-->
        <div class="separator border-gray-200"></div>
        <!--end::Separator-->
        <!--begin::Content-->
        <div class="px-7 py-5" data-kt-user-table-filter="form">
            <!--begin::Input group-->
            <div class="mb-10">
                <label class="form-label fs-6 fw-bold">Role:</label>
                <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
                    <option></option>
                    @foreach($members->unique('account_type') as $account_type)
                        <option value="{{$account_type->account_type}}">{{$account_type->account_type}}</option>
                    @endforeach
                </select>
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="mb-10">
                <label class="form-label fs-6 fw-bold">Two Step Verification:</label>
                <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="two-step" data-hide-search="true">
                    <option></option>
                    <option value="Enabled">Enabled</option>
                    <option value="Unavailable">Unavailable</option>
                </select>
            </div>
            <!--end::Input group-->
            <!--begin::Actions-->
            <div class="d-flex justify-content-end">
                <button type="reset" class="btn btn-light btn-active-light-primary fw-bold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                <button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Menu 1-->
    <!--end::Filter-->
    <!--begin::Export-->
    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
    <span class="svg-icon svg-icon-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="black" />
            <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="black" />
            <path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="#C4C4C4" />
        </svg>
    </span>
    <!--end::Svg Icon-->Export</button>
</div>
<!--end::Toolbar-->
<!--begin::Group actions-->
<div class="d-flex justify-content-end align-items-center d-none me-5" data-kt-user-table-toolbar="selected">
    <div class="fw-bolder me-5">
    <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
    <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
</div>
<!--end::Group actions-->
<!--begin::Modal - Adjust Balance-->
<div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Export Members</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="kt_modal_export_users_form" class="form">
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold form-label mb-2">Select Roles:</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="role" data-control="select2" data-placeholder="Select a role" data-hide-search="true" class="form-select form-select-solid fw-bolder">
                            <option></option>
                            @foreach($members->unique('account_type') as $account_type)
                                <option value="{{$account_type->account_type}}">{{$account_type->account_type}}</option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="required fs-6 fw-bold form-label mb-2">Select Export Format:</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="format" data-control="select2" data-placeholder="Select a format" data-hide-search="true" class="form-select form-select-solid fw-bolder">
                            <option></option>
                            <option value="excel">Excel</option>
                            <option value="csv">CSV</option>
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Card-->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
    <span class="svg-icon svg-icon-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
        </svg>
    </span>
    <!--end::Svg Icon-->Add Member
</button>
<!--begin::Modal -  New Member-->
<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true" style="display: none;">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Add Member</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="kt_modal_add_user_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px" style="max-height: 465px;">
                        
                        <!--begin::User Details-->
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 fv-plugins-icon-container col-md-6">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">First Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="first" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="First name" required>
                                <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 fv-plugins-icon-container col-md-6">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Last Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="last" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Last name" required>
                                <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 fv-plugins-icon-container col-md-6">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Email</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com"  onblur="duplicateEmail(this)" required>
                                <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 fv-plugins-icon-container col-md-6">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Phone Number</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" name="mobile" class="form-control form-control-solid mb-3 mb-lg-0" required>
                                <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Input group-->
                        </div>
                        <!--end::User Details-->

                        <div class="separator separator-dashed mb-5"></div>

                        <!--begin::Business Details-->
                        <div class="row mt-5">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 fv-plugins-icon-container col-md-6">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Business Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="business_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Business Name" required>
                                <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 fv-plugins-icon-container col-md-6">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Business Registration Number</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="registration_number" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Business Registration Number" required>
                                <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 fv-plugins-icon-container col-md-12">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Date of Incorporation</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input name="date_of_incorporation" id="kt_date_of_incorporation" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Date of Incorporation" required readonly>
                                <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 fv-plugins-icon-container col-md-12">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Business Description</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea name="business_description" class="form-control form-control-lg form-control-solid" rows="3" id="kt_docs_maxlength_business_description" maxlength="500" required></textarea>
                                <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 fv-plugins-icon-container col-md-6">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Business Site</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="link" name="business_site" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Business Site" required>
                                <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 fv-plugins-icon-container col-md-6">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Business Email</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email" name="business_email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Business Email" onblur="businessduplicateEmail(this)" required>
                                <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Business Details-->

                        <div class="separator separator-dashed mb-5"></div>

                        <!--begin::Input group-->
                        <div class="mt-5 mb-15">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-5">Role</label>
                            <!--end::Label-->
                            <!--begin::Roles-->
                            <!--begin::Input row-->
                            <div class="d-flex fv-row">
                                <!--begin::Radio-->
                                <div class="form-check form-check-custom form-check-solid">
                                    <!--begin::Input-->
                                    <input class="form-check-input me-3" name="user_role" type="radio" value="individual" id="kt_modal_update_role_option_0" checked="checked" required>
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <label class="form-check-label" for="kt_modal_update_role_option_0">
                                        <div class="fw-bolder text-gray-800">Individual</div>
                                        <div class="text-gray-600">For individuals looking to rent out or sell their listings</div>
                                    </label>
                                    <!--end::Label-->
                                </div>
                                <!--end::Radio-->
                            </div>
                            <!--end::Input row-->
                            <div class="separator separator-dashed my-5"></div>
                            <!--begin::Input row-->
                            <div class="d-flex fv-row">
                                <!--begin::Radio-->
                                <div class="form-check form-check-custom form-check-solid">
                                    <!--begin::Input-->
                                    <input class="form-check-input me-3" name="user_role" type="radio" value="agency" id="kt_modal_update_role_option_1" required>
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <label class="form-check-label" for="kt_modal_update_role_option_1">
                                        <div class="fw-bolder text-gray-800">Agency</div>
                                        <div class="text-gray-600">For agencies managing multiple listings or working on behalf of others</div>
                                    </label>
                                    <!--end::Label-->
                                </div>
                                <!--end::Radio-->
                            </div>
                            <!--end::Input row-->
                            <!--end::Roles-->
                        </div>
                        <!--end::Input group-->
                        <div class="fv-row mb-7 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack">
                                <!--begin::Label-->
                                <div class="me-5">
                                    <label class="required fs-6 fw-bold">Demo Account</label>
                                    <div class="fs-7 fw-bold text-muted">is this a demo account being created?</div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Checkboxes-->
                                <div class="d-flex">
                                    <!--begin::Checkbox-->
                                    <label class="form-check form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input h-20px w-20px" type="checkbox" value="1" name="demo_account">
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <span class="form-check-label fw-bold">Yes</span>
                                        <!--end::Label-->
                                    </label>
                                    <!--end::Checkbox-->
                                </div>
                                <!--end::Checkboxes-->
                            </div>
                            <!--begin::Wrapper-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
                        <button type="button" class="btn btn-primary me-10" id="kt_button_submit_member_details">
                            <span class="indicator-label">
                                Submit
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                    <!--end::Actions-->
                <div></div></form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Member-->