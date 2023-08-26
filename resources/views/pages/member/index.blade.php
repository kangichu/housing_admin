@extends('pages.layouts.app')

@section('content')

<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
	<!--begin::Container-->
	<div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
		<!--begin::Page title-->
		<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0">
			<!--begin::Heading-->
			<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Members</h1>
			<!--end::Heading-->
			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
				<li class="breadcrumb-item text-muted">Home</li>
				<li class="breadcrumb-item text-dark">Members</li>
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
		@if (session('error'))
            <div class="alert fade show alert-danger">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column">
                    <!--begin::Content-->
                    <span>{{ session('error') }}</span>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
        @endif
        @if (session('success'))
            <div class="alert fade show alert-success">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column">
                    <!--begin::Content-->
                    <span>{{ session('success') }}</span>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
        @endif

		<!--begin::Card-->
		<div class="card">
			<!--begin::Card header-->
			<div class="card-header border-0 pt-6">
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
						<input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Member" />
					</div>
					<!--end::Search-->
				</div>
				<!--begin::Card title-->
				<!--begin::Card toolbar-->
				<div class="card-toolbar">
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
					<div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
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
				</div>
				<!--end::Card toolbar-->
			</div>
			<!--end::Card header-->
			<!--begin::Card body-->
			<div class="card-body pt-0">
				<!--begin::Table-->
				<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
					<!--begin::Table head-->
					<thead>
						<!--begin::Table row-->
						<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
							<th class="w-10px pe-2">
								<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
									<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
								</div>
							</th>
							<th class="min-w-125px">User</th>
							<th class="min-w-125px">Role</th>
							<th class="min-w-125px">Ratings</th>
							<th class="min-w-125px">Suspended</th>
							<th class="min-w-125px">Joined Date</th>
							<th class="text-end min-w-100px">Actions</th>
						</tr>
						<!--end::Table row-->
					</thead>
					<!--end::Table head-->
					<!--begin::Table body-->
					<tbody class="text-gray-600 fw-bold">
						<!--begin::Table row-->
						@foreach($members as $key=>$member)
						<tr>
							<!--begin::Checkbox-->
							<td>
								<div class="form-check form-check-sm form-check-custom form-check-solid">
									<input class="form-check-input" type="checkbox" value="1" />
								</div>
							</td>
							<!--end::Checkbox-->
							<!--begin::User=-->
							<td class="d-flex align-items-center">
								<!--begin:: Avatar -->
								<div class="symbol symbol-50px overflow-hidden me-3">
									<a href="#">
										<div class="symbol-label">
											<identicon-svg class="pt-1" username="
											@if($member->account_type == "Business") 
												{{$member->business_name}}
											@else
												{{$member->first_name}} {{$member->last_name}}
											@endif
											"></identicon-svg>
										</div>
									</a>
								</div>
								<!--end::Avatar-->
								<!--begin::User details-->
								<div class="d-flex flex-column">
									<a href="#" class="text-gray-800 text-hover-primary mb-1">
										@if($member->account_type == "Business") 
											{{$member->business_name}}
										@else
											{{$member->first_name}} {{$member->last_name}}
										@endif
									</a>
									<span>{{$member->email}}</span>
								</div>
								<!--begin::User details-->
							</td>
							<!--end::User=-->
							<!--begin::Role=-->
							<td>{{$member->account_type}}</td>
							<!--end::Role=-->
							<!--begin::Two step=-->
							<td>
								@if($member->account_type == "Business") 
									@foreach($businessesWithAverageRatings as $business)
										@if($business['business_id'] == $member->business_id)
											<small class="badge 
												@if ($business['actual_average_rating'] === 'Fair')
													badge-muted
												@elseif ($business['actual_average_rating'] === 'Satisfied')
													badge-success
												@elseif ($business['actual_average_rating'] === 'Unsure')
													badge-info
												@elseif ($business['actual_average_rating'] === 'Disappointed')
													badge-wanging
												@elseif ($business['actual_average_rating'] === 'Aggrevated')
													badge-danger
												@endif
											me-4"
											>{{ $business['actual_average_rating'] }}</small>
										@else
											<small class="badge badge-secondary">No Reviews</small> 
										@endif
									@endforeach
								@else
									<small class="badge badge-secondary">Not Applicable</small>
								@endif
							</td>
							<!--end::Two step=-->
							<!--begin::Suspended=-->
							<td>
								@if($member->is_suspended == 1) 
								<div class="badge badge-danger fw-bolder cursor-pointer" data-bs-toggle="modal" data-bs-target="#kt_modal_suspended_{{$key+1}}">Suspended</div>
								@else <div class="badge badge-light fw-bolder">Active</div> @endif
							</td>
							<!--end::Suspended=-->
							<!--begin::Joined-->
							<td>{{ DateTime::createFromFormat('Y-m-d H:i:s', $member->created_at)->format('l, jS M Y H:i') }}</td>
							<!--begin::Joined-->
							<!--begin::Action=-->
							<td class="text-end">
								<a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
								<span class="svg-icon svg-icon-5 m-0">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
									</svg>
								</span>
								<!--end::Svg Icon--></a>
								<!--begin::Menu-->
								<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
									@if($member->is_suspended != 1)
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Suspend</a>
									</div>
									<!--end::Menu item-->
									@endif
									@if($member->account_type == 'Business')
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Subscription</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3" id="kt_drawer_rating_{{$member->business_id}}">Reviews</a>
									</div>
									<!--end::Menu item-->
									@endif
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
									</div>
									<!--end::Menu item-->
								</div>
								<!--end::Menu-->
							</td>
							<!--end::Action=-->
						</tr>

						<div class="modal fade" tabindex="-1" id="kt_modal_suspended_{{$key+1}}">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<!--begin::Modal title-->
										<h2 class="fw-bolder">Activate Member</h2>
										<!--end::Modal title-->

										<!--begin::Close-->
										<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
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
						
									<div class="modal-body">
										<p>This account was suspended @if($member->incorrect_attempts == 3) after exceeding the number of login attempts @else  @endif. Are you sure you 
											want to activate it?</p>
									</div>
						
									<div class="modal-footer">
										<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary">Save changes</button>
									</div>
								</div>
							</div>
						</div>

						<!--begin::View component-->
						<div id="kt_drawer_rating_advanced" class="bg-white" data-kt-drawer="true" data-kt-drawer-activate="true" data-kt-drawer-toggle="#kt_drawer_rating_{{$member->business_id}}" 
						data-kt-drawer-close="#kt_drawer_rating_close_{{$member->business_id}}" data-kt-drawer-name="docs" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}" 
						data-kt-drawer-direction="end" style="z-index: 9999999;" >
							<div class="card w-100 rounded-0">
								<!--begin::Card header-->
								<div class="card-header pe-5 justify-content-between">
									<!--begin::Title-->
									<div class="card-title">
										<!--begin::User-->
										<div class="d-flex justify-content-center flex-column me-3">
											<h3 class="fs-4 fw-bolder text-gray-900 cursor-none me-1 lh-1">
												Reviews <small style="margin-left: 1em; cursor: pointer !important;">{{$member->business_name}}</small> </h3>
										</div>
										<!--end::User-->
									</div>
									<!--end::Title-->
									<!--begin::Card toolbar-->
									<div class="card-toolbar">
										<!--begin::Close-->
										<div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_rating_close_{{$member->business_id}}">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
													<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
												</svg>
											</span>
											<!--end::Svg Icon-->
										</div>
										<!--end::Close-->
									</div>
									<!--end::Card toolbar-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body scroll">
									@foreach($ratings as $key=>$rating)
										@if($rating->business_id == $member->business_id)
											<div class="d-flex flex-row align-items-basline ">
												<identicon-svg username="{{$key+1}}" class="me-5"></identicon-svg>
												<!--begin::Text-->
												<div class="d-flex flex-column mb-5">
													<p class="text-gray-800 fw-normal"><span class="badge badge-info me-5">{{$rating->status}}</span>{{$rating->review}}  </p>
													<!--begin::Toolbar-->
													<div class="d-flex align-items-center mb-5">
														<a href="#" class="btn btn-sm btn-light btn-color-muted 
														@if($rating->rating == 'Fair') btn-active-light-secondary @endif
														@if($rating->rating == 'Satisfied') btn-active-light-success @endif
														@if($rating->rating == 'Meeh') btn-active-light-info @endif
														@if($rating->rating == 'Disappointed') btn-active-light-warning @endif
														@if($rating->rating == 'Aggrevated') btn-active-light-danger @endif
														px-4 py-2 me-4">
														<!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
														<span class="svg-icon svg-icon-3">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.3" d="M12 22C13.6569 22 15 20.6569 15 19C15 17.3431 13.6569 16 12 16C10.3431 16 9 17.3431 9 19C9 20.6569 10.3431 22 12 22Z" fill="black"/>
																<path d="M19 15V18C19 18.6 18.6 19 18 19H6C5.4 19 5 18.6 5 18V15C6.1 15 7 14.1 7 13V10C7 7.6 8.7 5.6 11 5.1V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V5.1C15.3 5.6 17 7.6 17 10V13C17 14.1 17.9 15 19 15ZM11 10C11 9.4 11.4 9 12 9C12.6 9 13 8.6 13 8C13 7.4 12.6 7 12 7C10.3 7 9 8.3 9 10C9 10.6 9.4 11 10 11C10.6 11 11 10.6 11 10Z" fill="black"/>
															</svg>
														</span>
														<!--end::Svg Icon-->{{$rating->rating}}</a>
														<a href="#" class="btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2 like-button @if($rating->liked_rating_user_id == auth()->user()->id) active @endif" data-review-id="{{ $rating->id }}" data-review-count="{{ $rating->review_count }}">
														<!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
														<span class="svg-icon svg-icon-2">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="black"></path>
															</svg>
														</span>
														<!--end::Svg Icon--><span class="review-count">{{ $rating->review_count }}</span></a>
													</div>
													<!--end::Toolbar-->
												</div>
												<!--end::Text-->
											</div>
											@foreach($responses as $key=>$response)
												@if($response->ratings_id == $rating->id)
													<!--begin::Replies-->
													<div class="mb-7 ps-10">
														<!--begin::Reply-->
														<div class="d-flex mb-5">
															<!--begin::Avatar-->
															<div class="symbol symbol-45px me-2">
																<identicon-svg username="{{$member->business_name}}"></identicon-svg>
															</div>
															<!--end::Avatar-->
															<!--begin::Info-->
															<div class="d-flex flex-column flex-row-fluid">
																<!--begin::Info-->
																<div class="d-flex align-items-center flex-wrap">
																	<a href="#" class="text-gray-800 text-hover-primary fw-bolder me-2">{{$member->business_name}}</a>
																	@php
																		$givenDate = \Carbon\Carbon::parse($response->updated_at);
																		$daysDifference = $givenDate->diffInDays(\Carbon\Carbon::now());
																	@endphp
																	<span class="text-gray-400 fw-bold fs-7">{{ $daysDifference }} days</span>
																	<a href="#" class="ms-auto text-gray-400 text-hover-primary fw-bold fs-7">Response</a>
																</div>
																<!--end::Info-->
																<!--begin::Post-->
																<span class="text-gray-800 fs-7 fw-normal pt-1">{{$response->response}} </span>
																<!--end::Post-->
															</div>
															<!--end::Info-->
														</div>
														<!--end::Reply-->
													</div>
													<!--end::Replies-->
												@endif
											@endforeach
										@endif
									@endforeach
								</div>
								<!--end::Card body-->
							</div>
						</div>
						<!--end::View component-->

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