@extends('pages.layouts.app')

@section('content')

<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
	<!--begin::Container-->
	<div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
		<!--begin::Page title-->
		<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0">
			<!--begin::Heading-->
			<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Member Badges</h1>
			<!--end::Heading-->
			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
				<li class="breadcrumb-item text-muted">Home</li>
				<li class="breadcrumb-item text-dark">Member Badges</li>
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
        <!--begin::View component-->
        <div
            id="kt_drawer_all_badges"

            class="bg-white"
            data-kt-drawer="true"
            data-kt-drawer-activate="true"
            data-kt-drawer-toggle="#kt_drawer_all_badges_button"
            data-kt-drawer-close="#kt_drawer_all_badges_close"
            data-kt-drawer-width="500px"
        >
        <div class="card w-100 rounded-0">
            <!--begin::Card header-->
            <div class="card-header justify-content-between pe-5">
                <!--begin::Title-->
                <div class="card-title">
                    <!--begin::User-->
                    <div class="d-flex justify-content-center flex-column me-3">
                        <a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 lh-1">All Badges</a>
                    </div>
                    <!--end::User-->
                </div>
                <!--end::Title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_all_badges_close">
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
            <div class="card-body hover-scroll-overlay-y">
                <div class="my-5">
                    <h1 class="text-center mb-4">Property Manager Badges</h1>
                    <p class="text-center mb-5">Our badges help you identify trustworthy and high-performing property managers. Here’s what each badge represents:</p>
            
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <h3>Verified Manager</h3>
                            <p>Awarded to managers who have completed identity or business verification.</p>
                        </div>
                        <div class="col-md-6">
                            <h3>Top Listing Manager</h3>
                            <p>Given to managers with the highest number of active listings.</p>
                        </div>
                        <div class="col-md-6">
                            <h3>Trusted for X Years</h3>
                            <p>Awarded to managers with a consistent presence on the platform for 1, 2, 3, or more years.</p>
                        </div>
                        <div class="col-md-6">
                            <h3>Highly Rated</h3>
                            <p>Managers with an average rating above 4.5 from user reviews.</p>
                        </div>
                        <div class="col-md-6">
                            <h3>Poor Rated</h3>
                            <p>Identifies managers with consistently low ratings (below 2 out of 5).</p>
                        </div>
                        <div class="col-md-6">
                            <h3>Responsive Manager</h3>
                            <p>For managers who respond to inquiries within 24 hours.</p>
                        </div>
                        <div class="col-md-6">
                            <h3>Fast Leasing/Selling Manager</h3>
                            <p>Awarded to managers whose listings are leased or sold within 30 days.</p>
                        </div>
                        <div class="col-md-6">
                            <h3>Outstanding Customer Service</h3>
                            <p>Given to managers who receive positive feedback for excellent service.</p>
                        </div>
                        <div class="col-md-6">
                            <h3>Eco-Friendly Properties</h3>
                            <p>Awarded to managers who list properties with sustainable or energy-efficient features.</p>
                        </div>
                        <div class="col-md-6">
                            <h3>Premium Listings</h3>
                            <p>For managers specializing in high-value or luxury properties.</p>
                        </div>
                        <div class="col-md-6">
                            <h3>Most Active Manager</h3>
                            <p>Awarded to managers with frequent listings and regular user engagement.</p>
                        </div>
                        <div class="col-md-6">
                            <h3>Community Builder</h3>
                            <p>For managers who actively engage with users, respond to reviews, or answer questions.</p>
                        </div>
                        <div class="col-md-6">
                            <h3>Elite Manager</h3>
                            <p>A prestigious badge combining "Verified Manager" and "Highly Rated" badges for top performers.</p>
                        </div>
                    </div>
                </div>
            
            </div>
            <!--end::Card body-->
        </div>
        </div>
        <!--end::View component-->
        <div class="scroll h-500px" style="overflow-x: hidden">
            <div class="row g-6 g-xl-9">
                @foreach($badges as $badge)
                    @if(($badge->slug == 'verified-manager' && $member->is_verified == null) || 
                        ($badge->slug == 'top-listing-manager' && $message == 'highest') || 
                        ($badge->slug == 'highly-rated' && $ratings == 'Highly Rated') || 
                        ($badge->slug == 'medium-rated' && $ratings == 'Medium Rated') || 
                        ($badge->slug == 'poorly-rated' && $ratings == 'Poorly Rated'))
                        <div class="col-md-6 col-xl-4">
                            <!--begin::Card-->
                            <a href="#" class="card border-hover-primary">
                                <!--begin::Card header-->
                                <div class="card-header justify-content-between border-0 pt-9">
                                    <!--begin::Card Title-->
                                    <div class="card-title m-0">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-50px bg-light">
                                            <i class="{{ $badge->icon }}"></i>
                                        </div>
                                        <!--end::Avatar-->
                                    </div>
                                    <!--end::Card Title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        @if($member->is_verified == null && $badge->slug == 'verified-manager')
                                            <span class="badge badge-light-primary fw-bolder me-auto px-4 py-3">In Progress</span>
                                        @else
                                            <span class="badge badge-light-success fw-bolder me-auto px-4 py-3">Completed</span>
                                        @endif
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end:: Card header-->
                                <!--begin:: Card body-->
                                <div class="card-body p-9">
                                    <!--begin::Name-->
                                    <div class="fs-3 fw-bolder text-dark">{{ $badge->name }}</div>
                                    <!--end::Name-->
                                    <!--begin::Description-->
                                    <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">{{ $badge->description }}</p>
                                    <!--end::Description-->
                                    <!--begin::Progress-->
                                    <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="" data-bs-original-title="This project @if($member->is_verified == null && $badge->slug == 'verified-manager') 50% @else 100% @endif completed">
                                        <div class="bg-primary rounded h-4px" role="progressbar" 
                                            @if($member->is_verified == null && $badge->slug == 'verified-manager')
                                            style="width: 50%" aria-valuenow="50" 
                                            @else
                                            style="width: 100%" aria-valuenow="100" 
                                            @endif
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--end::Progress-->
                                    @if($member->is_verified == null && $badge->slug == 'verified-manager')
                                        <small>Pending Manager Details Verification</small>
                                        <button type="button" class="btn btn-sm btn-light-primary mt-4 w-100" id="kt_button_run_verification">
                                            <span class="indicator-label">
                                                Run Verification
                                            </span>
                                            <span class="indicator-progress">
                                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                    @endif
                                </div>
                                <!--end:: Card body-->
                            </a>
                            <!--end::Card-->
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <button id="kt_drawer_all_badges_button" class="btn btn-sm btn-light-info float-right mt-5" style="float: right;">All Badges</button>
	</div>
	<!--end::Container-->
</div>
<!--end::Content-->



@endsection