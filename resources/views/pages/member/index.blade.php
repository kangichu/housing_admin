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
					@include('pages.member.include.filter')
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
									
									@if($member->account_type == 'Business')
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="/member_subscription/{{  Crypt::encryptString($member->id)}}" class="menu-link px-3">Subscription</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="/member_badges/{{  Crypt::encryptString($member->id)}}" class="menu-link px-3">Badges</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3" id="kt_drawer_rating_{{$member->business_id}}">Reviews</a>
									</div>
									<!--end::Menu item-->
									
									@endif
									@if($member->is_suspended != 1)
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_{{$member->id}}">Suspend</a>
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

						@include('pages.member.include.member_activation')

						@include('pages.member.include.member_reviews')

						<div class="modal fade" tabindex="-1" id="kt_modal_{{$member->id}}">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Member Suspension</h5>
						
										<!--begin::Close-->
										<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
											<span class="svg-icon svg-icon-2x">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
													<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
												</svg>
											</span>
										</div>
										<!--end::Close-->
									</div>
						
									<div class="modal-body">
										<span class="d-flex flex-wrap align-items-center justify-content-between">
											<span class="d-flex align-items-center ">
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
											</span>
											<span class="badge badge-light-primary">{{$member->account_type}}</span>
										</span>
										<div class="py-5">
											<div class="rounded border d-flex flex-column p-10">
												<label for="" class="form-label">Are you sure you want to suspend this member? If so, please provide a reason for suspension</label>
												<textarea class="form-control" data-kt-autosize="true" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 64px;"></textarea>
											</div>
										</div>
									</div>
						
									<div class="modal-footer">
										<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
										<button type="button" class="btn btn-danger">Suspend</button>
									</div>
								</div>
							</div>
						</div>

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