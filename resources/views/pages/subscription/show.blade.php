@extends('pages.layouts.app')

@section('content')

<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
	<!--begin::Container-->
	<div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
		<!--begin::Page title-->
		<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0">
			<!--begin::Heading-->
			<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Subscription View</h1>
			<!--end::Heading-->
			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
				<li class="breadcrumb-item text-muted">Home</li>
				<li class="breadcrumb-item text-muted">Subscriptions</li>
				<li class="breadcrumb-item text-dark">Subscription View</li>
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
								<input type="text" data-kt-subscription-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Subscriptions" />
							</div>
							<!--end::Search-->
						</div>
						<!--begin::Card title-->
						<!--begin::Card toolbar-->
						<div class="card-toolbar">
							<!--begin::Toolbar-->
							<div class="d-flex justify-content-end" data-kt-subscription-table-toolbar="base">
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
									<div class="px-7 py-5" data-kt-subscription-table-filter="form">
										<!--begin::Input group-->
										<div class="mb-10">
											<label class="form-label fs-6 fw-bold">Month:</label>
											<select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-subscription-table-filter="month" data-hide-search="true">
												<option></option>
												<option value="jan">January</option>
												<option value="feb">February</option>
												<option value="mar">March</option>
												<option value="apr">April</option>
												<option value="may">May</option>
												<option value="jun">June</option>
												<option value="jul">July</option>
												<option value="aug">August</option>
												<option value="sep">September</option>
												<option value="oct">October</option>
												<option value="nov">November</option>
												<option value="dec">December</option>
											</select>
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="mb-10">
											<label class="form-label fs-6 fw-bold">Status:</label>
											<select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-subscription-table-filter="status" data-hide-search="true">
												<option></option>
												<option value="Active">Active</option>
												<option value="Expiring">Expiring</option>
												<option value="Suspended">Suspended</option>
											</select>
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="mb-10">
											<label class="form-label fs-6 fw-bold">Billing Method:</label>
											<select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-subscription-table-filter="billing" data-hide-search="true">
												<option></option>
												<option value="Auto-debit">Auto-debit</option>
												<option value="Manual - Credit Card">Manual - Credit Card</option>
												<option value="Manual - Cash">Manual - Cash</option>
												<option value="Manual - Paypal">Manual - Paypal</option>
											</select>
										</div>
										<!--end::Input group-->
										<!--begin::Actions-->
										<div class="d-flex justify-content-end">
											<button type="reset" class="btn btn-light btn-active-light-primary fw-bold me-2 px-6" data-kt-menu-dismiss="true" data-kt-subscription-table-filter="reset">Reset</button>
											<button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true" data-kt-subscription-table-filter="filter">Apply</button>
										</div>
										<!--end::Actions-->
									</div>
									<!--end::Content-->
								</div>
								<!--end::Menu 1-->
								<!--end::Filter-->
								<!--begin::Export-->
								<button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_subscriptions_export_modal">
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
								<span class="svg-icon svg-icon-2">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="black" />
										<path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="black" />
										<path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="#C4C4C4" />
									</svg>
								</span>
								<!--end::Svg Icon-->Export</button>
								<!--end::Export-->
								<!--begin::Add subscription-->
								<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add">
									<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
									<span class="svg-icon svg-icon-2">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
											<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
										</svg>
									</span>
									<!--end::Svg Icon-->Add Subscriber
								</a>
								<!--end::Add subscription-->
							</div>
							<!--end::Toolbar-->
							<!--begin::Group actions-->
							<div class="d-flex justify-content-end align-items-center d-none" data-kt-subscription-table-toolbar="selected">
								<div class="fw-bolder me-5">
								<span class="me-2" data-kt-subscription-table-select="selected_count"></span>Selected</div>
								<button type="button" class="btn btn-danger" data-kt-subscription-table-select="delete_selected">Delete Selected</button>
							</div>
							<!--end::Group actions-->
						</div>
						<!--end::Card toolbar-->
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-0">
						<!--begin::Table-->
						<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_subscriptions_table">
							<!--begin::Table head-->
							<thead>
								<!--begin::Table row-->
								<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
									<th class="w-10px pe-2">
										<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
											<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_subscriptions_table .form-check-input" value="1" />
										</div>
									</th>
									<th class="min-w-125px">Customer</th>
									<th class="min-w-125px">Status</th>
									<th class="min-w-125px">Billing</th>
									<th class="min-w-125px">Product</th>
									<th class="min-w-125px">Created Date</th>
									<th class="text-end min-w-70px">Actions</th>
								</tr>
								<!--end::Table row-->
							</thead>
							<!--end::Table head-->
							<!--begin::Table body-->
							<tbody class="text-gray-600 fw-bold">
								@if(count($subscribers) > 0)
									@foreach($subscribers as $subscriber)
										<tr>
											<!--begin::Checkbox-->
											<td>
												<div class="form-check form-check-sm form-check-custom form-check-solid">
													<input class="form-check-input" type="checkbox" value="1" />
												</div>
											</td>
											<!--end::Checkbox-->
											<!--begin::Customer=-->
											<td>
												<a href="/subscriber/{{$subscriber->full_name_slug}}" class="text-gray-800 text-hover-primary mb-1">{{$subscriber->first_name}} {{$subscriber->last_name}}</a>
											</td>
											<!--end::Customer=-->
											<!--begin::Status=-->
											<td>
												<div class="badge badge-light-success">{{$subscriber->active_subscriptions_status}}</div>
											</td>
											<!--end::Status=-->
											<!--begin::Billing=-->
											<td>
												<div class="badge badge-light">Auto-debit</div>
											</td>
											<!--end::Billing=-->
											<!--begin::Product=-->
											<td>{{$subscription->type}}</td>
											<!--end::Product=-->
											<!--begin::Date=-->
											<td>{{$subscriber->active_subscriptions_created_at}}</td>
											<!--end::Date=-->
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
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="/subscriber/{{$subscriber->full_name_slug}}" class="menu-link px-3">View</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" data-kt-subscriptions-table-filter="delete_row" class="menu-link px-3">Delete</a>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu-->
											</td>
											<!--end::Action=-->
										</tr>
									@endforeach
								@endif
							</tbody>
							<!--end::Table body-->
						</table>
						<!--end::Table-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Card-->
				<!--begin::Modals-->
				<!--begin::Modal - Adjust Balance-->
				<div class="modal fade" id="kt_subscriptions_export_modal" tabindex="-1" aria-hidden="true">
					<!--begin::Modal dialog-->
					<div class="modal-dialog modal-dialog-centered mw-650px">
						<!--begin::Modal content-->
						<div class="modal-content">
							<!--begin::Modal header-->
							<div class="modal-header">
								<!--begin::Modal title-->
								<h2 class="fw-bolder">Export Subscriptions</h2>
								<!--end::Modal title-->
								<!--begin::Close-->
								<div id="kt_subscriptions_export_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
								<form id="kt_subscriptions_export_form" class="form" action="#">
									<!--begin::Input group-->
									<div class="fv-row mb-10">
										<!--begin::Label-->
										<label class="fs-5 fw-bold form-label mb-5">Select Export Format:</label>
										<!--end::Label-->
										<!--begin::Input-->
										<select data-control="select2" data-placeholder="Select a format" data-hide-search="true" name="format" class="form-select form-select-solid">
											<option value="excell">Excel</option>
											<option value="pdf">PDF</option>
											<option value="cvs">CVS</option>
											<option value="zip">ZIP</option>
										</select>
										<!--end::Input-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="fv-row mb-10">
										<!--begin::Label-->
										<label class="fs-5 fw-bold form-label mb-5">Select Date Range:</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input class="form-control form-control-solid" placeholder="Pick a date" name="date" />
										<!--end::Input-->
									</div>
									<!--end::Input group-->
									<!--begin::Row-->
									<div class="row fv-row mb-15">
										<!--begin::Label-->
										<label class="fs-5 fw-bold form-label mb-5">Payment Type:</label>
										<!--end::Label-->
										<!--begin::Radio group-->
										<div class="d-flex flex-column">
											<!--begin::Radio button-->
											<label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
												<input class="form-check-input" type="checkbox" value="1" checked="checked" name="payment_type" />
												<span class="form-check-label text-gray-600 fw-bold">All</span>
											</label>
											<!--end::Radio button-->
											<!--begin::Radio button-->
											<label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
												<input class="form-check-input" type="checkbox" value="2" checked="checked" name="payment_type" />
												<span class="form-check-label text-gray-600 fw-bold">Visa</span>
											</label>
											<!--end::Radio button-->
											<!--begin::Radio button-->
											<label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
												<input class="form-check-input" type="checkbox" value="3" name="payment_type" />
												<span class="form-check-label text-gray-600 fw-bold">Mastercard</span>
											</label>
											<!--end::Radio button-->
											<!--begin::Radio button-->
											<label class="form-check form-check-custom form-check-sm form-check-solid">
												<input class="form-check-input" type="checkbox" value="4" name="payment_type" />
												<span class="form-check-label text-gray-600 fw-bold">American Express</span>
											</label>
											<!--end::Radio button-->
										</div>
										<!--end::Input group-->
									</div>
									<!--end::Row-->
									<!--begin::Actions-->
									<div class="text-center">
										<button type="reset" id="kt_subscriptions_export_cancel" class="btn btn-light me-3">Discard</button>
										<button type="submit" id="kt_subscriptions_export_submit" class="btn btn-primary">
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

				<div class="modal fade" tabindex="-1" id="kt_modal_add">
					<div class="modal-dialog modal-dialog-centered mw-650px">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Subscriber</h5>
				
								<!--begin::Close-->
								<div data-bs-dismiss="modal" aria-label="Close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
								<div class="fv-row">
									<!--begin::Label-->
									<label class="d-flex align-items-center fs-5 fw-bold mb-4">
										<span class="required">Select a customer to add:</span>
									</label>
									<!--end::Label-->
									<!--begin::Input group-->
									<div class="fv-row mb-10">
										<!--begin::Input-->
										<select name="type" class="form-select form-select-solid" data-control="select2" data-hide-search="false" data-placeholder="Select Property Type" name="type">
											<option></option>
											@if(count($users) > 0)
												@foreach($users as $user)
													<option value="{{$user->full_name_slug}}">{{$user->first_name}} {{$user->last_name}}</option>
												@endforeach
											@endif
										</select>
										<!--end::Input-->
									</div>
									<!--end::Input group-->
								</div>
							</div>
				
							<div class="modal-footer">
								<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary">Save changes</button>
							</div>
						</div>
					</div>
				</div>
				<!--end::Modal - New Card-->
				<!--end::Modals-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Content-->
		
	</div>
	<!--end::Container-->
</div>
<!--end::Content-->



@endsection