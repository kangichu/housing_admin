@extends('pages.layouts.app')

@section('content')

<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
	<!--begin::Container-->
	<div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
		<!--begin::Page title-->
		<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0">
			<!--begin::Heading-->
			<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Subscriptions</h1>
			<!--end::Heading-->
			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
				<li class="breadcrumb-item text-muted">Home</li>
				<li class="breadcrumb-item text-dark">Subscriptions</li>
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

		<!--begin::Row-->
		<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9 mt-2">
			<!--begin::Col-->
			@if(count($subscriptions) > 0)
				@foreach($subscriptions as $key=>$subscription)
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 complex-item">
						<!--begin::Card-->
						<div class="card h-md-100">
							<div class="card-header ribbon ribbon-top">
								<div class="ribbon-label bg-primary">{{$subscription->category}}</div>
								<div class="d-flex card-title justify-content-between">USD {{$subscription->amount}}</div>
							</div>
							<!--begin::Body-->
							<div class="card-body pt-4">
								<!--begin::User-->
								<div class="ms-1" style="position: relative; float: right;">
									<!--begin::Menu-->
									<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-primary btn-active-color-white border-0 me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
										<!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
										<span class="svg-icon svg-icon-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000"></rect>
													<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
													<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
													<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
												</g>
											</svg>
										</span>
										<!--end::Svg Icon-->
									</button>
									<!--begin::Menu 3-->
									<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true" style="">
										<!--begin::Heading-->
										<div class="menu-item px-3">
											<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Actions</div>
										</div>
										<!--end::Heading-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#features-{{$subscription->id}}">Outline Features</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link flex-stack px-3"  data-bs-toggle="modal" data-bs-target="#limitations-{{$subscription->id}}">Outline Limitations
											<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" 
											data-bs-original-title="Specify limits in relation to listings and complexes" aria-label="Specify limits in relation to listings and complexes"></i></a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3">Outline Offers</a>
										</div>
										<!--end::Menu item-->
									</div>
									<!--end::Menu 3-->
									<!--end::Menu-->
								</div>
								<div class="d-flex flex-column align-items-center mt-3 mb-3">
									<!--begin::Pic-->
									<div class="flex-shrink-0 mr-4">
										<div class="symbol symbol-45px">
											<identicon-svg username="{{$subscription->type}}" style="height: 10em; width: 10em;"></identicon-svg>
										</div>
									</div>
									<!--end::Pic-->
									<!--begin::Title-->
									<div class="d-flex flex-column">
										<a href="#" style="font-size: 2em; font-family: fantasy;">{{$subscription->type}}</a>
									</div>
									<!--end::Title-->
								</div>
								<!--end::User-->
								
								<!--begin::Desc-->
								<p class="mb-4">
									{{ Str::words($subscription->description) }} 
									<span class="badge badge-light-success" style="cursor: pointer" data-kt-drawer-show="true" data-kt-drawer-target="#kt_drawer_feature-{{$subscription->type}}">Features</span>
								</p>
								{{-- @if($subscription->recommended == "yes")<span class="badge badge-primary mb-4">Recommended</span>@endif --}}

								<!--end::Desc-->
								<div class="row">
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
										<a href="{{'/subscription/' . \Crypt::encryptString($subscription->id)  }}" class="btn btn-block btn-sm btn-light-info font-weight-bolder text-uppercase py-4 mb-4" style="width: 100%">
											<i class="las la-eye"></i></a>
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
										<a href="{{'/subscription/' . \Crypt::encryptString($subscription->id) .'/edit'}}" class="btn btn-block btn-sm btn-light-primary font-weight-bolder text-uppercase py-4 mb-4" style="width: 100%">
											<i class="las la-edit"></i></a>
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
										<button class="btn btn-block btn-sm btn-light-danger font-weight-bolder text-uppercase py-4 mb-7" style="width: 100%" 
										data-bs-toggle="modal" data-bs-target="#delete-{{$key+1}}"><i class="las la-trash-alt"></i></button>
									</div>
								</div>

								<label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
									<span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Active Package</span>
									<input class="form-check-input" type="checkbox" name="subscription_status" @if($subscription->status == "Active") checked="checked" @endif data-subscription-id="{{ $subscription->id }}">
								</label>
							</div>
							<!--end::Body-->
						</div>
						<!--end:: Card-->
					</div>

					<!--begin::View component-->
					<div id="kt_drawer_feature-{{$subscription->type}}" class="bg-white" data-kt-drawer="true" data-kt-drawer-activate="true" 
						data-kt-drawer-toggle="kt_drawer_feature-{{$subscription->type}}_button" data-kt-drawer-close="#kt_drawer_feature-{{$subscription->type}}_close"
						data-kt-drawer-overlay="true" data-kt-drawer-direction="end" data-kt-drawer-width="{default:'300px', 'md': '500px'}" style="margin-top: 0 !important;">
						<div class="card rounded-0 w-100">
							<form id="form-{{$subscription->type}}">
								<!--begin::Card header-->
								<div class="card-header pe-5 justify-content-between">
									<!--begin::Title-->
									<div class="card-title">
										<!--begin::User-->
										<div class="d-flex justify-content-center flex-column me-3">
											<a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 lh-1">{{$subscription->type}} Features</a>
										</div>
										<!--end::User-->
									</div>
									<!--end::Title-->
									<!--begin::Card toolbar-->
									<div class="card-toolbar">
										<!--begin::Close-->
										<div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_feature-{{$subscription->type}}_close">
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
								<div class="card-body hover-scroll-overlay-y features" id="{{$subscription->type}}">

									<div class="d-flex flex-row mb-7 justify-content-between">
										<a href="#" id="deleteButton-{{$subscription->type}}">
											<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-selected-{{$subscription->type}}">
												<span class="svg-icon svg-icon-2 rotate-180">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"/>
														<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"/>
														<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"/>
													</svg>
												</span>
												Delete
											</button>
										</a>
										<a href="#">
											<button type="button" class="btn btn-sm btn-light" id="selectButton-{{$subscription->type}}">
												<span class="svg-icon svg-icon-2 rotate-180">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"/>
														<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black"/>
													</svg>
												</span>
												Select All
											</button>
										</a>
									</div>
									@foreach($features as $feature)
										@if($feature->subscription_id == $subscription->id)
											<!--begin::Item-->
											<label class="d-flex align-items-center mb-5" style="cursor: pointer">
												<span class="pe-3"><input type="checkbox" name="feature" value="{{$feature->id}}" style="display: block; margin: 1em auto; cursor: pointer;"></span>
												<span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">{{$feature->feature}}</span>
												<!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
												<span class="svg-icon svg-icon-1 svg-icon-success">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"></rect>
														<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor"></path>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</label>
											<!--end::Item-->
										@endif
									@endforeach
									
								</div>
								<!--end::Card body-->
							</form>
						</div>
					</div>
					<!--end::View component-->

					<!--begin::Modal-->

					<div class="modal fade" tabindex="-1" id="features-{{$subscription->id}}">
						<div class="modal-dialog modal-dialog-centered mw-500px">
						  	<div class="modal-content">
								<form class="form" novalidate="novalidate" id="kt_modal_add_features_form-{{$subscription->id}}">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">Subscription Features</h5>
										<!--begin::Close-->
										<div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
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
										<div class="scroll h-150px" style="overflow-x: hidden;">
											<input type="hidden" name="subscription_id" value="{{$subscription->id}}">
											<!--begin::Repeater-->
											<div class="kt_feature_repeater_basic">
												<!--begin::Form group-->
												<div class="form-group">
													<div data-repeater-list="kt_feature_repeater_basic">
														<div data-repeater-item class="form-group row mb-4">
															<div class="col-md-8">
																<label class="form-label">Feature:</label>
																<input type="email" class="form-control mb-2 mb-md-0" name="feature" style="width: 100%;" />
															</div>
															<div class="col-md-4">
																<a href="javascript:;" data-repeater-delete class="btn btn-lg btn-light-danger mt-3 mt-md-8" style="widht: 100%;">
																	<i class="la la-trash-o"></i>Delete
																</a>
															</div>
														</div>
													</div>
												</div>
												<!--end::Form group-->

												<!--begin::Form group-->
												<div class="form-group mt-5">
													<a href="javascript:;" data-repeater-create class="btn btn-light-primary">
														<i class="la la-plus"></i>Add
													</a>
												</div>
												<!--end::Form group-->
											</div>
											<!--end::Repeater-->
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary me-10 kt_feautures_button" id="kt_feautures_button" data-sub-id="{{$subscription->id}}">
											<span class="indicator-label">
												Save Features
											</span>
											<span class="indicator-progress">
												Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
											</span>
										</button>
									</div>
								</form>
						  	</div>
						</div>
					</div>

					<div class="modal fade" tabindex="-1" id="limitations-{{$subscription->id}}">
						<div class="modal-dialog modal-dialog-centered mw-500px">
						  	<div class="modal-content">
								<form class="form" novalidate="novalidate" id="kt_modal_add_limitations_form-{{$subscription->id}}">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">Subscription Limitations</h5>
										<!--begin::Close-->
										<div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
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
										<input type="hidden" name="subscription_id" value="{{$subscription->id}}">
										<div class="d-flex flex-wrap">
											<!--begin::Input group-->
											<div class="input-group mb-4">
												<span class="input-group-text">Listings  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </span>
												<input type="number" class="form-control" name="Listing" 
													@foreach($limits as $limit)
														@if($limit->subscription_id == $subscription->id )
															@if($limit->type == 'Listing' )
																value="{{$limit->limit}}"
															@endif
														@endif
													@endforeach
												required>
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="input-group">
												<span class="input-group-text">Complexes</span>
												<input type="number" class="form-control" name="Complex" 
													@foreach($limits as $limit)
														@if($limit->subscription_id == $subscription->id )
															@if($limit->type == 'Complex' )
																value="{{$limit->limit}}"
															@endif
														@endif
													@endforeach
												required>
											</div>
											<!--end::Input group-->
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary me-10 kt_feautures_button" id="kt_limitations_button" data-sub-id="{{$subscription->id}}">
											<span class="indicator-label">
												Save Limits
											</span>
											<span class="indicator-progress">
												Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
											</span>
										</button>
									</div>
								</form>
						  	</div>
						</div>
					</div>

					<div class="modal fade" tabindex="-1" id="delete-{{$key+1}}">
					    <div class="modal-dialog modal-sm">
					        <div class="modal-content">
					        	{!! Form::open(['action' => ['App\Http\Controllers\Features\SubscriptionController@destroy', $subscription->id], 'method' => 'DELETE'])!!}

					        		{{Form::hidden('_method', 'DELETE')}}

						            <div class="modal-header">
						                <h5 class="modal-title">Delete Subscription</h5>
						                
						                <!--begin::Close-->
										<div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
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
										<span class="badge badge-secondary">{{$subscription->type}}</span>
										<div class="d-flex align-items-center mt-5"><p>Are you sure you want to delete this subscription plan?</p></div>
						            </div>

						            <div class="modal-footer" style="justify-content: center !important;">
						                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
						                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
						            </div>
						        {!! Form::close() !!}
					        </div>
					    </div>
					</div>

					<div class="modal fade" tabindex="-1" id="delete-selected-{{$subscription->type}}" >
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Delete Selected</h5>
									
									<!--begin::Close-->
									<div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
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
									<h5 class="breadcrumb-item" style="font-weight: 100;">Are you sure you want to delete these features for the {{$subscription->type}} bundle?</h5> 
								</div>

								<div class="modal-footer" style="justify-content: center !important;">
									<button type="button" class="btn btn-danger me-10 delete_selected_features" id="delete_selected_features-{{$subscription->type}}" style="width: 100%">
										<span class="indicator-label">
											Delete
										</span>
										<span class="indicator-progress">
											Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
										</span>
									</button>
								</div>
							</div>
						</div>
					</div>

					<!--end:: Modal-->
					
				@endforeach
			@endif
			<!--end::Card-->
		</div>
		<!--end::Row-->
		
	</div>
	<!--end::Container-->
</div>
<!--end::Content-->



@endsection