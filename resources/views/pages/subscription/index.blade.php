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
			
		<div class="card ">
			<div class="card-header card-header-stretch justify-content-between">
				<h3 class="card-title">Plans</h3>
				<div class="card-toolbar">
					<ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
						<li class="nav-item">
							<a href="/feature" style="padding-top: 1.7em; margin-right: 3em;">Features</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" data-bs-toggle="tab" href="#agency">Agency</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-bs-toggle="tab" href="#individual">Individual</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="card-body">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="agency" role="tabpanel">
						<!--begin::Row-->
						<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
							@if(count($subscriptions) > 0)
								@foreach($subscriptions as $key=>$subscription)
									@if($subscription->account_type == 'agency')

										@include('pages.subscription.include.agency_plans')

										<!--end:: Modal-->
									@endif
								@endforeach
							@endif
							
						</div>
					</div>
		
					<div class="tab-pane fade" id="individual" role="tabpanel">
						<!--begin::Row-->
						<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
							@if(count($subscriptions) > 0)
								@foreach($subscriptions as $key=>$subscription)
									@if($subscription->account_type == 'individual')
							
										@include('pages.subscription.include.individual_plans')

										<!--end:: Modal-->

									@endif
								@endforeach
							@endif
						</div>
					</div>
				</div>
			</div>
			<!--end:: Modal-->
		</div>
		
	</div>
	<!--end::Container-->
</div>
<!--end::Content-->

@endsection