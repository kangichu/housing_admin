@extends('pages.layouts.app')

@section('content')

<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
	<!--begin::Container-->
	<div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
		<!--begin::Page title-->
		<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0">
			<!--begin::Heading-->
			<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Subscription</h1>
			<!--end::Heading-->
			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
				<li class="breadcrumb-item text-muted">Home</li>
				<li class="breadcrumb-item text-muted">Property Listing</li>
				<li class="breadcrumb-item text-dark">Subscription</li>
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

		<!--begin::Search -->
		<div class="fv-row mb-2">
			<!--begin::Input-->
			<input type="text" id="Search" class="form-control form-control-lg form-control-solid"  placeholder="Please enter a search term...." title="Type in a Complex">
			<!--end::Input-->
		</div>
		<!--end::Search -->

		<!--begin::Row-->
		<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
			<!--begin::Add new card-->
			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
				<!--begin::Card-->
				<div class="card h-md-100">
					<!--begin::Card body-->
					<div class="card-body d-flex flex-center">
						<!--begin::Button-->
						<a type="button" href="/subscription/create" class="btn btn-clear d-flex flex-column flex-center">
							<!--begin::Illustration-->
							<img src="{{asset('dashboard/media/illustrations/dozzy-1/1.png')}}" alt="" class="mw-100 mh-150px mb-7" />
							<!--end::Illustration-->
							<!--begin::Label-->
							<div class="fw-bolder fs-3 text-gray-600 text-hover-primary">New Subscription</div>
							<!--end::Label-->
                        </a>
						<!--begin::Button-->
					</div>
					<!--begin::Card body-->
				</div>
				<!--begin::Card-->
			</div>
			<!--end::Add new card-->
			<!--begin::Col-->
			
			<!--end::Card-->
		</div>
		<!--end::Row-->
		
	</div>
	<!--end::Container-->
</div>
<!--end::Content-->



@endsection