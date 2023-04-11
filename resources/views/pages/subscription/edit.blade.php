@extends('pages.business.layouts.app')

@section('content')

<div id="kt_header" class="header">
	<!--begin::Container-->
	<div class="container d-flex align-items-center justify-content-between" id="kt_header_container">
		<!--begin::Page title-->
		<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
			<!--begin::Heading-->
			<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Edit Listing</h1>
			<!--end::Heading-->
			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
				<li class="breadcrumb-item text-muted">Home</li>
				<li class="breadcrumb-item text-muted">Property Listing</li>
				<li class="breadcrumb-item text-dark">Edit Listing</li>
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
			@include('pages.business.include.mobile.mobile')
			<!--end::Logo-->
		</div>
		<!--end::Wrapper-->
		<!--begin::Topbar-->
			@include('pages.business.include.topbar.index')
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
			<!--begin::Card body-->
			<div class="card-body pb-0">
				<!--begin::Heading-->
				<div class="py-lg-10 px-lg-10">
					<!--begin::Stepper-->
					<div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_modal_create_app_stepper">
						<!--begin::Aside-->
						<div class="d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px">
							<!--begin::Nav-->
							<div class="stepper-nav ps-lg-10">
								<!--begin::Step 1-->
								<div class="stepper-item" data-kt-stepper-element="nav">
									<!--begin::Line-->
									<div class="stepper-line w-40px"></div>
									<!--end::Line-->
									<!--begin::Icon-->
									<div class="stepper-icon w-40px h-40px">
										<i class="stepper-check fas fa-check"></i>
										<span class="stepper-number">1</span>
									</div>
									<!--end::Icon-->
									<!--begin::Label-->
									<div class="stepper-label">
										<h3 class="stepper-title">Details</h3>
										<div class="stepper-desc">Name your Listing</div>
									</div>
									<!--end::Label-->
								</div>
								<!--end::Step 1-->
								<!--begin::Step 2-->
								<div class="stepper-item" data-kt-stepper-element="nav">
									<!--begin::Line-->
									<div class="stepper-line w-40px"></div>
									<!--end::Line-->
									<!--begin::Icon-->
									<div class="stepper-icon w-40px h-40px">
										<i class="stepper-check fas fa-check"></i>
										<span class="stepper-number">2</span>
									</div>
									<!--end::Icon-->
									<!--begin::Label-->
									<div class="stepper-label">
										<h3 class="stepper-title">Description</h3>
										<div class="stepper-desc">Provide your Listing features</div>
									</div>
									<!--end::Label-->
								</div>
								<!--end::Step 2-->
								<!--begin::Step 3-->
								<div class="stepper-item" data-kt-stepper-element="nav">
									<!--begin::Line-->
									<div class="stepper-line w-40px"></div>
									<!--end::Line-->
									<!--begin::Icon-->
									<div class="stepper-icon w-40px h-40px">
										<i class="stepper-check fas fa-check"></i>
										<span class="stepper-number">3</span>
									</div>
									<!--begin::Icon-->
									<!--begin::Label-->
									<div class="stepper-label">
										<h3 class="stepper-title">Location</h3>
										<div class="stepper-desc">Plot your listing location</div>
									</div>
									<!--begin::Label-->
								</div>
								<!--end::Step 3-->
								<!--begin::Step 4-->
								<div class="stepper-item" data-kt-stepper-element="nav">
									<!--begin::Line-->
									<div class="stepper-line w-40px"></div>
									<!--end::Line-->
									<!--begin::Icon-->
									<div class="stepper-icon w-40px h-40px">
										<i class="stepper-check fas fa-check"></i>
										<span class="stepper-number">4</span>
									</div>
									<!--end::Icon-->
									<!--begin::Label-->
									<div class="stepper-label">
										<h3 class="stepper-title">Amenities</h3>
										<div class="stepper-desc">Provide payment details</div>
									</div>
									<!--end::Label-->
								</div>
								<!--end::Step 4-->
								<!--begin::Step 5-->
								<div class="stepper-item" data-kt-stepper-element="nav">
									<!--begin::Line-->
									<div class="stepper-line w-40px"></div>
									<!--end::Line-->
									<!--begin::Icon-->
									<div class="stepper-icon w-40px h-40px">
										<i class="stepper-check fas fa-check"></i>
										<span class="stepper-number">5</span>
									</div>
									<!--end::Icon-->
									<!--begin::Label-->
									<div class="stepper-label">
										<h3 class="stepper-title">Completed</h3>
										<div class="stepper-desc">Review and Submit</div>
									</div>
									<!--end::Label-->
								</div>
								<!--end::Step 5-->
							</div>
							<!--end::Nav-->
						</div>
						<!--begin::Aside-->
						<!--begin::Content-->
						<div class="flex-row-fluid py-lg-5 px-lg-15">
							<!--begin::Form-->
							<form class="form" novalidate="novalidate" id="kt_modal_create_listing_form">
								<!--begin::Step 1-->
								<div class="current" data-kt-stepper-element="content">
									<div class="w-100">
										<!--begin::Input group-->
										<div class="fv-row mb-10">
											<!--begin::Label-->
											<label class="d-flex align-items-center fs-5 fw-bold mb-2">
												<span class="required">Listing Name</span>
											</label>
											<!--end::Label-->

											<input type="hidden" name="route" value="edit">

											<input type="hidden" name="listing_id" value="{{$Listing->id}}">

											<!--begin::Input-->
											<input type="text" class="form-control form-control-lg form-control-solid" value="{{$Listing->name}}" id="name" name="name" maxlength="60" />
											<!--end::Input-->
										</div>
										<!--end::Input group-->								

										<!--begin::Input group-->
										<div class="fv-row">
											<!--begin::Label-->
											<label class="d-flex align-items-center fs-5 fw-bold mb-4">
												<span class="required">Category</span>
											</label>
											<!--end::Label-->
											<!--begin:Options-->
											<div class="fv-row">
												<!--begin:Option-->
												<label class="d-flex flex-stack mb-5 cursor-pointer">
													<!--begin:Label-->
													<span class="d-flex align-items-center me-2">
														<!--begin:Icon-->
														<span class="symbol symbol-50px me-6">
															<span class="symbol-label bg-light-danger">
																<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-success">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
														</span>
														<!--end:Icon-->
														<!--begin:Info-->
														<span class="d-flex flex-column">
															<span class="fw-bolder fs-6">Rent</span>
															<span class="fs-7 text-muted">If you have available properties up for rent</span>
														</span>
														<!--end:Info-->
													</span>
													<!--end:Label-->
													<!--begin:Input-->
													<span class="form-check form-check-custom form-check-solid">
														<input class="form-check-input" type="radio" name="category" value="Rent" @if($Listing->category == "Rent") checked @endif  />
													</span>
													<!--end:Input-->
												</label>
												<!--end::Option-->
												<!--begin:Option-->
												<label class="d-flex flex-stack mb-5 cursor-pointer">
													<!--begin:Label-->
													<span class="d-flex align-items-center me-2">
														<!--begin:Icon-->
														<span class="symbol symbol-50px me-6">
															<span class="symbol-label bg-light-danger">
																<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-danger">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
														</span>
														<!--end:Icon-->
														<!--begin:Info-->
														<span class="d-flex flex-column">
															<span class="fw-bolder fs-6">Sale</span>
															<span class="fs-7 text-muted">If you have available properties up for Sale</span>
														</span>
														<!--end:Info-->
													</span>
													<!--end:Label-->
													<!--begin:Input-->
													<span class="form-check form-check-custom form-check-solid">
														<input class="form-check-input" type="radio" name="category" value="Sale" @if($Listing->category == "Sale") checked @endif />
													</span>
													<!--end:Input-->
												</label>
												<!--end::Option-->
											</div>
											<!--end:Options-->
										</div>
										<!--end::Input group-->
									</div>
								</div>
								<!--end::Step 1-->
								<!--begin::Step 2-->
								<div data-kt-stepper-element="content">
									<div class="w-100">
										<div class="row">
											<div class="col-md-12">
												<div class="fv-row">
													<!--begin::Label-->
													<label class="d-flex align-items-center fs-5 fw-bold mb-4">
														<span class="required">Property Type</span>
													</label>
													<!--end::Label-->
													<!--begin::Input group-->
													<div class="fv-row mb-10">
														<!--begin::Input-->
														<select name="type" class="form-select form-select-solid" data-control="select2" data-hide-search="false" data-placeholder="Select Property Type" name="type">
												    		<option value="{{$Listing->type}}">{{$Listing->type}}</option>
												    		<option value="Apartment" @if($Listing->type == "Apartment") class="remove" @endif>Apartment</option>
												    		<option value="House"  @if($Listing->type == "House") class="remove" @endif>House</option>
														</select>
														<!--end::Input-->
													</div>
													<!--end::Input group-->
												</div>
											</div>
											<div class="col-md-12">
												<!--begin::Input group-->
												<div class="fv-row">
													<!--begin::Label-->
													<label class="d-flex align-items-center fs-5 fw-bold mb-4">
														<span>Select Listing Complex</span>
														<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Your listing will use the selected complex's location"></i>
													</label>
													<!--end::Label-->
													<!--begin::Input group-->
													<div class="fv-row mb-10">
														<!--begin::Input-->
														<select class="form-select form-select-solid county" data-control="select2" data-hide-search="false" data-placeholder="Select Complex" id="complex_id" name="complex_id">
															@if(!empty($listing_complex))
																<option value="{{$listing_complex->id}}">{{$listing_complex->title}}</option>
																@if(count($complexes) > 0)
																	@foreach($complexes as $complex)
															    		<option id="{{$complex->slug}}" value="{{$complex->id}}" @if($complex->id == $listing_complex->id) class="remove" @endif>{{$complex->title}}</option>
														    		@endforeach
																@endif
															@else
																<option></option>
																@if(count($complexes) > 0)
																	@foreach($complexes as $complex)
															    		<option id="{{$complex->slug}}" value="{{$complex->id}}">{{$complex->title}}</option>
														    		@endforeach
																@endif
															@endif
																														
														</select>
														<!--end::Input-->
													</div>
													<!--end::Input group-->
												</div>
												<!--end::Input group-->
											</div>
											<div class="col-md-4">
												<!--begin::Input group-->
												<div class="fv-row">
													<!--begin::Label-->
													<label class="d-flex align-items-center fs-5 fw-bold mb-4">
														<span class="required">Furnishing</span>
													</label>
													<!--end::Label-->
													<!--begin::Input group-->
													<div class="fv-row mb-10">
														<!--begin::Input-->
														<select name="furnishing" class="form-select form-select-solid county" data-control="select2" data-hide-search="false" data-placeholder="Select Furnishing" id="furnishing" name="furnishing">
															<option value="{{$Listing->furnishing}}">{{$Listing->furnishing}}</option>
												    		<option value="Unfurnished" @if($Listing->furnishing == 'Unfurnished') class="remove" @endif>Unfurnished</option>
												    		<option value="Furnished" @if($Listing->furnishing == 'Furnished') class="remove" @endif>Furnished</option>
														</select>
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<div id="map"></div>
												</div>
												<!--end::Input group-->
											</div>
											<div class="col-md-4">
												<!--begin::Input group-->
												<div class="fv-row">
													<!--begin::Label-->
													<label class="d-flex align-items-center fs-5 fw-bold mb-4">
														<span class="required">Bedrooms</span>
													</label>
													<!--end::Label-->
													<!--begin::Input group-->
													<div class="fv-row mb-10">
														<!--begin::Input-->
														<select name="bedrooms" class="form-select form-select-solid county" data-control="select2" data-hide-search="false" data-placeholder="How many Bedrooms" id="bedrooms" name="bedrooms">
															<option value="{{$Listing->bedrooms}}">{{$Listing->bedrooms}}</option>
															@if(count($bedrooms) > 0)
																@foreach($bedrooms as $bedroom)
														    		<option value="{{$bedroom->bedrooms}}" @if($Listing->bedrooms == $bedroom->bedrooms) class="remove" @endif>{{$bedroom->bedrooms}}</option>
													    		@endforeach
															@endif
														</select>
														<!--end::Input-->
													</div>
													<!--end::Input group-->
												</div>
												<!--end::Input group-->
											</div>
											<div class="col-md-4">
												<!--begin::Input group-->
												<div class="fv-row">
													<!--begin::Label-->
													<label class="d-flex align-items-center fs-5 fw-bold mb-4">
														<span class="required">Bathrooms</span>
													</label>
													<!--end::Label-->
													<!--begin::Input group-->
													<div class="fv-row mb-10">
														<!--begin::Input-->
														<select name="bathrooms" class="form-select form-select-solid county" data-control="select2" data-hide-search="false" data-placeholder="How many Bathrooms" id="bathrooms" name="bathrooms">
															<option value="{{$Listing->bathrooms}}">{{$Listing->bathrooms}}</option>
															@if(count($bathrooms) > 0)
																@foreach($bathrooms as $bathroom)
														    		<option value="{{$bathroom->bathrooms}}" @if($Listing->bathrooms == $bathroom->bathrooms) class="remove" @endif>{{$bathroom->bathrooms}}</option>
													    		@endforeach
															@endif
														</select>
														<!--end::Input-->
													</div>
													<!--end::Input group-->
												</div>
												<!--end::Input group-->
											</div>
											<div class="col-md-12">
												<!--begin::Input group-->
												<div class="fv-row">
													<!--begin::Label-->
													<label class="required fs-5 fw-bold mb-2">Floor area</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input type="number" class="form-control form-control-lg form-control-solid" name="sq_area" value="{{$Listing->sq_area}}"/>
													<div class="form-text">Format:  <code>00 sqm</code></div>
													<!--end::Input-->
												</div>
												<!--end::Input group-->
											</div>

										</div>
									</div>
								</div>
								<!--end::Step 2-->
								<!--begin::Step 3-->
								<div data-kt-stepper-element="content">
									<div class="w-100">
										<div class="row">
											<div class="col-md-12">
												<!--begin::Input group-->
												<div class="fv-row">
													<!--begin::Label-->
													<label class="d-flex align-items-center fs-5 fw-bold mb-4">
														<span class="required">County</span>
													</label>
													<!--end::Label-->
													<!--begin::Input group-->
													<div class="fv-row mb-5">
														<!--begin::Input-->
														<p>Select the county your listing is located in.</p>
														<select class="form-select form-select-solid location" data-control="select2" data-hide-search="false" data-placeholder="Select Property Location" name="county"  id="county">
															<option value="{{$Listing->county}}">{{$Listing->county}}</option>
															@if(count($counties) > 0)
																@foreach($counties as $county)
																	<option value="{{$county->county}}">{{$county->county}}</option>
															    @endforeach
													    	@endif
														</select>
														<!--end::Input-->
													</div>

													<div class="fv-row mb-10">
														<!--begin::Input-->
														<p>Please specify the location from the drop down below.</p>
														<select class="form-select form-select-solid location" data-control="select2" data-hide-search="false" data-placeholder="Select Specific Property Location"  name="county_specific" id="county_specific">
															<option value="{{$Listing->county_specific}}">{{$Listing->county_specific}}</option>
															@if(count($counties) > 0)
																@foreach($wards as $ward)
															        <option value="{{$ward->ward}}">{{$ward->ward}}</option>
														        @endforeach
												        	@endif
														</select>
														<!--end::Input-->
													</div>
													<!--end::Input group-->
												</div>
												<!--end::Input group-->
											</div>
											<div class="col-md-12">
												<!--begin::Input group-->
		                                        <div class="mb-7 fv-row">
		                                            <!--begin::Label-->
		                                            <label class="form-label mb-3 required ">Location Co-ordinates</label>
		                                            <!--end::Label-->
		                                            <div class="row">
			                                            <div class="col-md-6">
				                                            <!--begin::Input-->
				                                            <input type="number" class="form-control form-control-lg form-control-solid" name="longitude" placeholder="Specify Location Longitude" value="{{$Listing->longitude}}"/>
				                                            <!--end::Input-->
			                                           </div>
			                                           <div class="col-md-6">
				                                            <!--begin::Input-->
				                                            <input type="number" class="form-control form-control-lg form-control-solid" name="latitude" placeholder="Specify Location Latitude" value="{{$Listing->latitude}}"/>
				                                            <!--end::Input-->
			                                           </div>
			                                       </div>
		                                        </div>
		                                        <!--end::Input group-->
											</div>
											<div class="col-md-12">
												<!--begin::Input group-->
		                                        <div class="mb-7 fv-row">
		                                            <!--begin::Label-->
		                                            <label class="form-label mb-3 required ">Location Description</label>
		                                            <!--end::Label-->
		                                            <!--begin::Input-->
		                                            <textarea class="form-control form-control form-control-solid" data-kt-autosize="true" id="location_description" id="location_description" name="location_description" maxlength="200" rows="4" required>{{$Listing->location_description}}</textarea >
		                                            <!--end::Input-->
		                                        </div>
		                                        <!--end::Input group-->
											</div>
										</div>
										
									</div>
								</div>
								<!--end::Step 3-->
								<!--begin::Step 4-->
								<div data-kt-stepper-element="content">
									<div class="w-100">
										<div class="row">
											<div class="col-xl-6">
												<!--begin::Input group-->
												<div class="mb-7 fv-row">
													<!--begin::Label-->
													<label class="form-label mb-3 required ">Amount</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input type="number" class="form-control form-control-lg form-control-solid" name="amount" value="{{$Listing->amount}}"/>
													<div class="form-text">Format:  <code>Ksh. 00.00</code></div>
													<!--end::Input-->
												</div>
												<!--end::Input group-->
											</div>
											<div class="col-xl-6">
												<!--begin::Input group-->
												<div class="mb-7 fv-row">
													<!--begin::Label-->
													<label class="form-label mb-3 ">Viewing Fees</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input type="number" class="form-control form-control-lg form-control-solid" name="viewing_fee" @if($Listing->viewing_fee) value="{{$Listing->viewing_fee}}" @endif/>
													<div class="form-text">Format:  <code>Ksh. 00.00</code></div>
													<!--end::Input-->
												</div>
												<!--end::Input group-->
											</div>
										</div>
										<!--begin::Input group-->
                                        <div class="mb-7 fv-row">
                                            <!--begin::Label-->
                                            <label class="form-label mb-3 required ">Property Description</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <textarea class="form-control form-control form-control-solid" data-kt-autosize="true" id="property_description" id="property_description" name="property_description" maxlength="200" rows="4" required>{{$Listing->property_description}}</textarea >
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
										<h3 class="text-dark fw-bolder mb-7">Nearby</h3>	
										<!--begin::Input group-->
										<div class="d-flex flex-column mb-7 fv-row">
											<!--begin::Label-->
											<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
												<span>Other Amenities</span>
												<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Press 'Enter' when you've typed an amenity to add another i.e. Hospital, School, Shopping Mall etc."></i>
											</label>
											<!--end::Label-->
											<input type="text" class="form-control form-control-solid" name="nearby_amenities" id="nearby_amenities"
											value="
											@foreach($amenities as $amenity)
												@if($amenity->type == 'Nearby Amenities')
													{{$amenity->amenity}},
												@endif
											@endforeach
											"
											 />
											<div class="form-text">Press "Enter" when you've typed an amenity to add another i.e. Hospital, School, Shopping Mall etc.</div>
										</div>
										<!--end::Input group-->
										<div class="row gy-5 g-xl-8">
											<div class="col-xl-6">
												<h3 class="text-dark fw-bolder mb-7">External Features</h3>
												<!--begin::Input group-->
												<div class="d-flex flex-column mb-7 fv-row">
													<!--begin::Label-->
													<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
														<span>Other Amenities</span>
														<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Press 'Enter' when you've typed an amenity to add another i.e. 2 Parking Spaces, Borehole, 24hr security etc."></i>
													</label>
													<!--end::Label-->
													<input type="text" class="form-control form-control-solid" name="external_amenities" id="external_amenities" 
													value=" 
														@foreach($amenities as $amenity)
															@if($amenity->type == 'External Amenities')
																{{$amenity->amenity}},
															@endif
														@endforeach
													"
													/>
													<div class="form-text">Press "Enter" when you've typed an amenity to add another i.e. 2 Parking Spaces, Borehole, 24hr security etc.</div>
												</div>
												<!--end::Input group-->
											</div>
											<div class="col-xl-6">
												<h3 class="text-dark fw-bolder mb-7">Internal Features</h3>
												<!--begin::Input group-->
												<div class="d-flex flex-column mb-7 fv-row">
													<!--begin::Label-->
													<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
														<span>Other Amenities</span>
														<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Press 'Enter' when you've typed an amenity to add another i.e. Backup Generator, Fibre Internet etc."></i>
													</label>
													<!--end::Label-->
													<input type="text" class="form-control form-control-solid" name="internal_amenities" id="internal_amenities" 
													value=" 
														@foreach($amenities as $amenity)
															@if($amenity->type == 'Internal Amenities')
																{{$amenity->amenity}},
															@endif
														@endforeach
													"
													/>
													<div class="form-text">Press "Enter" when you've typed an amenity to add another i.e. Backup Generator, Fibre Internet etc.</div>
												</div>
												<!--end::Input group-->
											</div>
										</div>
										
									</div>
								</div>
								<!--end::Step 4-->
								<!--begin::Step 5-->
								<div data-kt-stepper-element="content">
									<div class="w-100 text-center">
										<!--begin::Heading-->
										<h1 class="fw-bolder text-dark mb-3">Success!</h1>
										<!--end::Heading-->
										<!--begin::Description-->
										<div class="text-muted fw-bold fs-3">Your listing has been successfully updated. Please make your way to the listings page and add your listing images if you haven't.</div>
										<!--end::Description-->
										<!--begin::Illustration-->
										<div class="text-center px-4 py-15">
											<img src="{{asset('include/dashboard/media/illustrations/dozzy-1/9.png')}}" alt="" class="mw-100 mh-300px" />
										</div>
										<!--end::Illustration-->
									</div>
								</div>
								<!--end::Step 5-->
								<!--begin::Actions-->
								<div class="d-flex flex-stack pt-10">
									<!--begin::Wrapper-->
									<div class="me-2">
										<button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
										<span class="svg-icon svg-icon-3 me-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="black" />
												<path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->Back</button>
									</div>
									<!--end::Wrapper-->
									<!--begin::Wrapper-->
									<div>
										<button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
											<span class="indicator-label">Submit
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
											<span class="svg-icon svg-icon-3 ms-2 me-0">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
													<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon--></span>
											<span class="indicator-progress">Please wait...
											<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										</button>
										<button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
										<span class="svg-icon svg-icon-3 ms-1 me-0">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
												<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon--></button>
									</div>
									<!--end::Wrapper-->
								</div>
								<!--end::Actions-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Content-->
					</div>
					<!--end::Stepper-->
				</div>
				<!--end::Heading-->

			</div>
			<!--end::Card body-->
		</div>
		<!--end::Card-->
	</div>
	<!--end::Container-->
</div>
<!--end::Content-->

@endsection