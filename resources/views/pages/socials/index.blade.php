@extends('pages.layouts.app')

@section('content')

<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
	<!--begin::Container-->
	<div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
		<!--begin::Page title-->
		<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0">
			<!--begin::Heading-->
			<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Socials</h1>
			<!--end::Heading-->
			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
				<li class="breadcrumb-item text-muted">Home</li>
				<li class="breadcrumb-item text-dark">Socials</li>
			</ul>
			<!--end::Breadcrumb-->
		</div>
		<!--end::Page title=-->
		<!--begin::Wrapper-->
		<div class="d-flex d-lg-none align-items-center ms-n2 me-2">
			<!--begin::Aside mobile toggle-->
			<div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
				<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
				<span class="svg-icon svg-icon-1 mt-1">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
						<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
					</svg>
				</span>
				<!--end::Svg Icon-->
			</div>
			<!--end::Aside mobile toggle-->
			<!--begin::Logo-->
			@include('pages.include.mobile.mobile')
			<!--end::Logo-->
		</div>
		<!--end::Wrapper-->
		<!--begin::Topbar-->
			@include('pages.include.topbar.index')
		<!--end::Topbar-->
	</div>
	<!--end::Container-->
</div>
<!--end::Header-->

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Container-->
	<div class="container-xxl" id="kt_content_container">
		
        <!--begin::Card-->
		<div class="card">
			<!--begin::Card header-->
			<div class="card-header border-0 pt-6 justify-content-between">
				<!--begin::Card title-->
				<div class="card-title">
					<!--begin::Search-->
					<div class="d-flex align-items-center position-relative my-1">
						<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
						<span class="svg-icon svg-icon-1 position-absolute ms-6">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
								<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
							</svg>
						</span>
						<!--end::Svg Icon-->
						<input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Posts" />
					</div>
					<!--end::Search-->
				</div>
				<!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <!--begin::Add Post-->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_post">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Add Post</button>
                        <!--end::Add Post-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Modal - Add task-->
                    <div class="modal fade" id="kt_modal_add_post" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Modal header-->
                                <div class="modal-header" id="kt_modal_add_user_header">
                                    <!--begin::Modal title-->
                                    <h2 class="fw-bolder">Add Post</h2>
                                    <!--end::Modal title-->
                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
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
                                <div class="modal-body scroll-y">
                                    <!--begin::Form-->
                                    <form id="kt_modal_add_post_form" class="form">
                                        <!--begin::Scroll-->
                                        <div class="d-flex flex-column " style="overflow-x: hidden !important;" id="kt_modal_add_post_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_post_header" data-kt-scroll-wrappers="#kt_modal_add_post_scroll" data-kt-scroll-offset="200px">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">Platform</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" data-dropdown-parent="#kt_modal_add_post" name="platform" id="platform" multiple>
                                                    <option></option>
                                                    <option value="Facebook">Facebook</option>
                                                    <option value="Twitter">Twitter</option>
                                                    <option value="Instagram">Instagram</option>
                                                    <option value="LinkedIn">LinkedIn</option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <div class="row">
                                                <!--begin::Input group-->
                                                <div class="col-md-6 fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">Tags</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control" id="kt_tags" name="kt_tags"/>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="col-md-6 fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">Schedule</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid" placeholder="Pick date & time" id="kt_datepicker_schedule" name="kt_datepicker_schedule"/>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <div class="row">
                                                <!--begin::Input group for Repeat-->
                                                <div class="col-md-4 fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="fw-bold fs-6 mb-2">Repeat</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select class="form-select form-select-solid" name="repeat" id="repeat">
                                                        <option></option>
                                                        <option value="0">No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group for Repeat Every-->
                                                <div class="col-md-4 fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="fw-bold fs-6 mb-2">Repeat Every</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select class="form-select form-select-solid" name="repeat_every" id="repeat_every">
                                                        <option></option>
                                                        <option value="daily">Daily</option>
                                                        <option value="weekly">Weekly</option>
                                                        <option value="monthly">Monthly</option>
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group for Repeat Ends-->
                                                <div class="col-md-4 fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="fw-bold fs-6 mb-2">Repeat Ends</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid" placeholder="Pick end date & time" id="kt_datepicker_repeat_ends" name="repeat_ends"/>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Image input-->
                                                <div class="col-md-12 py-5">
                                                    <div class="rounded border p-10">
                                                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(/assets/media/avatars/blank.png)">
                                                            <!--begin::Image preview wrapper-->
                                                            <div class="image-input-wrapper w-500px h-125px" style="background-image: url(/assets/media/avatars/150-2.jpg)"></div>
                                                            <!--end::Image preview wrapper-->
            
                                                            <!--begin::Edit button-->
                                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                            data-kt-image-input-action="change"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-dismiss="click"
                                                            title="Change avatar">
                                                                <i class="bi bi-pencil-fill fs-7"></i>
            
                                                                <!--begin::Inputs-->
                                                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                                <input type="hidden" name="avatar_remove" />
                                                                <!--end::Inputs-->
                                                            </label>
                                                            <!--end::Edit button-->
            
                                                            <!--begin::Cancel button-->
                                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                            data-kt-image-input-action="cancel"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-dismiss="click"
                                                            title="Cancel Image">
                                                                <i class="bi bi-x fs-2"></i>
                                                            </span>
                                                            <!--end::Cancel button-->
            
                                                            <!--begin::Remove button-->
                                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                            data-kt-image-input-action="remove"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-dismiss="click"
                                                            title="Remove Image">
                                                                <i class="bi bi-x fs-2"></i>
                                                            </span>
                                                            <!--end::Remove button-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Image input-->
                                            </div>
                                            
                                           
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <textarea id="kt_post" name="kt_post" class="tox-target">
                                                </textarea>
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group for Repeat Every-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">Status</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select class="form-select form-select-solid" name="status" id="status">
                                                    <option></option>
                                                    <option value="draft">Draft</option>
                                                    <option value="scheduled">Scheduled</option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Scroll-->
                                        <!--begin::Actions-->
                                        <div class="modal-footer text-center">
                                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
                                            <button type="button" class="btn btn-primary me-10" id="kt_button_description">
                                                <span class="indicator-label">
                                                    Submit
                                                </span>
                                                <span class="indicator-progress">
                                                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
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
                    <!--end::Modal - Add task-->
                </div>
			</div>
			<!--end::Card header-->
			<!--begin::Card body-->
			<div class="card-body pt-0">
				<!--begin::Table-->
				<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_socials">
					<!--begin::Table head-->
					<thead>
						<!--begin::Table row-->
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_socials .form-check-input" value="1" />
                                </div>
                            </th>
                            <th class="min-w-225px">Post</th>
                            <th class="min-w-125px">Platform</th>
                            <th class="min-w-125px">Status</th>
                            <th class="min-w-125px">Schedule</th>
                            <th class="text-end min-w-100px">Actions</th>
                        </tr>
						<!--end::Table row-->
					</thead>
					<!--end::Table head-->
					<!--begin::Table body-->
					<tbody class="text-gray-600 fw-bold">
						<!--begin::Table row-->
                        @foreach($socials as $social)
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />        
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="fw-bolder text-hover-primary mb-1">{!!$social->post !!}</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span class="fw-bolder text-hover-primary mb-1">{{ $social->platform }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span class="fw-bolder text-hover-primary mb-1">{{ $social->status }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span class="fw-bolder text-hover-primary mb-1">{{ $social->schedule }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-shrink-0">
                                    <a href="{{ route('socials.edit', $social->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M21.7071 2.29289C22.0976 2.68342 22.0976 3.31658 21.7071 3.70711L20.4142 5H18V7.41421L21.5858 11H20V13H17V16H15V17.5858L18.5858 21.1716L17.1716 22.5858L13.5858 18.9999H12V20.5858L10.4142 19H9V15H6V13H3V10H2V8H3V5.41421L5.41421 3H7V2H9V3H11V6H14V8H15.4142L18 5.41421V4H19.4142L21.7071 2.70711C22.0976 2.31658 22.0976 2.68342 21.7071 2.29289ZM15 8V6H13V8H15ZM13 10H15V12H13V10ZM11 8H9V10H11V8ZM9 12H11V14H9V12ZM11 16H9V18H11V16ZM11 20H9V22H11V20ZM13 18H15V20H13V18ZM17 14H19V16H17V14Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <a href="{{ route('socials.destroy', $social->id) }}" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-social-{{ $social->id }}').submit();">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M3 5.99988C3 5.73476 3.10536 5.48043 3.29289 5.29289C3.68342 4.90237 4.31658 4.90237 4.70711 5.29289L12 12.5858L19.2929 5.29289C19.6834 4.90237 20.3166 4.90237 20.7071 5.29289C21.0976 5.68342 21.0976 6.31658 20.7071 6.70711L13.4142 14.0001L20.7071 21.293C21.0976 21.6835 21.0976 22.3166 20.7071 22.7071C20.3166 23.0976 19.6834 23.0976 19.2929 22.7071L12 15.4142L4.70711 22.7071C4.31658 23.0976 3.68342 23.0976 3.29289 22.7071C2.90237 22.3166 2.90237 21.6835 3.29289 21.293L10.5858 14.0001L3.29289 6.70711C3.10536 6.51957 3 6.26524 3 5.99988Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <form id="delete-social-{{ $social->id }}" action="{{ route('socials.destroy', $social->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
						
						<!--end::Table row-->
					</tbody>
					<!--end::Table body-->
				</table>
				<!--end::Table-->
			</div>
			<!--end::Card body-->
		</div>
		<!--end::Card-->
		
		
	</div>
	<!--end::Container-->
</div>
<!--end::Content-->



@endsection