@extends('pages.layouts.app')

@section('content')

<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
	<!--begin::Container-->
	<div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
		<!--begin::Page title-->
		<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0">
			<!--begin::Heading-->
			<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Communications</h1>
			<!--end::Heading-->
			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
				<li class="breadcrumb-item text-muted">Home</li>
				<li class="breadcrumb-item text-dark">Communications</li>
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
				<div class="card-title" style="width: 100%;">
					<!--begin::Search-->
					<div class="d-flex align-items-center position-relative my-1" style="width: 100%;">
						<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
						<span class="svg-icon svg-icon-1 position-absolute ms-6">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
								<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
							</svg>
						</span>
						<!--end::Svg Icon-->
						<input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid ps-14" style="width: 100%;" placeholder="Search Content" />
					</div>
					<!--end::Search-->
				</div>
				<!--begin::Card title-->
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
							<th class="min-w-50px">ID</th>
							<th class="min-w-125px">Subject</th>
							<th class="min-w-125px">Recipient</th>
							<th class="min-w-125px">Content</th>
							<th class="min-w-125px">Date Sent</th>
						</tr>
						<!--end::Table row-->
					</thead>
					<!--end::Table head-->
					<!--begin::Table body-->
					<tbody class="text-gray-600 fw-bold">
						@foreach($communications as $key=>$communication)
							<!--begin::Table row-->
							<tr>
								<!--begin::ID-->
								<td> {{$key+1}} </td>
								<!--end::ID -->
								<!--begin::subject=-->
								<td>{{ $communication->subject }}</td>
								<!--end::subject=-->
								<!--begin::Recipient=-->
								<td>{{ $communication->recipient }}</td>
								<!--end::Recipient=-->
								<!--begin::Content=-->
								<td>{{  Str::limit($communication->content) }}</td>
								<!--end::Content=-->
								<!--begin::Date Sent=-->
								<td>{{ $communication->created_at->formatLocalized('%d %b %Y, %I:%M %p') }}</td>
								<!--end::Date Sent=-->
							</tr>
							<!--end::Table row-->
						@endforeach
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