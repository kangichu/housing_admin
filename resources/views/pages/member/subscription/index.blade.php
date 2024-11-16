@extends('pages.layouts.app')

@section('content')

<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
	<!--begin::Container-->
	<div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
		<!--begin::Page title-->
		<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0">
			<!--begin::Heading-->
			<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Member Subscription</h1>
			<!--end::Heading-->
			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
				<li class="breadcrumb-item text-muted">Home</li>
				<li class="breadcrumb-item text-dark">Member Subscription</li>
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
		
		<div class="row g-xxl-9">
			<!--begin::Col-->
			<div class="col-xxl-12">
				<!--begin::Earnings-->
				<div class="card card-xxl-stretch mb-5 mb-xxl-10">
					<!--begin::Header-->
					<div class="card-header">
						<div class="card-title">
							<h3>Earnings</h3>
						</div>
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body pb-0">
						<span class="fs-5 fw-bold text-gray-600 pb-5 d-block">Last 30 day earnings calculated. Apart from arranging the order of topics.</span>
						<!--begin::Left Section-->
						<div class="d-flex flex-wrap justify-content-between pb-6">
							<!--begin::Row-->
							<div class="d-flex flex-wrap">
								<!--begin::Col-->
								<div class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-6">
									<span class="fs-2x fw-bolder text-gray-800 lh-1">
										<span data-kt-countup="true" data-kt-countup-value="6,840" data-kt-countup-prefix="$" class="counted">$6,840</span>
									</span>
									<span class="fs-6 fw-bold text-gray-400 d-block lh-1 pt-2">Net Earnings</span>
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-6">
									<span class="fs-2x fw-bolder text-gray-800 lh-1">
									<span class="counted" data-kt-countup="true" data-kt-countup-value="80">80</span>%</span>
									<span class="fs-6 fw-bold text-gray-400 d-block lh-1 pt-2">Change</span>
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-6">
									<span class="fs-2x fw-bolder text-gray-800 lh-1">
										<span data-kt-countup="true" data-kt-countup-value="1,240" data-kt-countup-prefix="$" class="counted">$1,240</span>
									</span>
									<span class="fs-6 fw-bold text-gray-400 d-block lh-1 pt-2">Fees</span>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
							<a href="#" class="btn btn-primary px-6 flex-shrink-0 align-self-center">Withdraw Earnings</a>
						</div>
						<!--end::Left Section-->
					</div>
					<!--end::Body-->
				</div>
				<!--end::Earnings-->
			</div>
			<!--end::Col-->
		</div>

		<div class="card">
			<!--begin::Card header-->
			<div class="card-header card-header-stretch border-bottom border-gray-200 justify-content-between">
				<!--begin::Title-->
				<div class="card-title">
					<h3 class="fw-bolder m-0">Billing History</h3>
				</div>
				<!--end::Title-->
				<!--begin::Toolbar-->
				<div class="card-toolbar m-0">
					<!--begin::Tab nav-->
					<ul class="nav nav-stretch nav-line-tabs border-transparent" role="tablist">
						<!--begin::Tab nav item-->
						<li class="nav-item" role="presentation">
							<a id="kt_billing_6months_tab" class="nav-link fs-5 fw-bold me-3 active" data-bs-toggle="tab" role="tab" href="#kt_billing_months">Month</a>
						</li>
						<!--end::Tab nav item-->
						<!--begin::Tab nav item-->
						<li class="nav-item" role="presentation">
							<a id="kt_billing_1year_tab" class="nav-link fs-5 fw-bold me-3" data-bs-toggle="tab" role="tab" href="#kt_billing_year">Year</a>
						</li>
						<!--end::Tab nav item-->
						<!--begin::Tab nav item-->
						<li class="nav-item" role="presentation">
							<a id="kt_billing_alltime_tab" class="nav-link fs-5 fw-bold" data-bs-toggle="tab" role="tab" href="#kt_billing_all">All Time</a>
						</li>
						<!--end::Tab nav item-->
					</ul>
					<!--end::Tab nav-->
				</div>
				<!--end::Toolbar-->
			</div>
			<!--end::Card header-->
			<!--begin::Tab Content-->
			<div class="tab-content">
				<!--begin::Tab panel-->
				<div id="kt_billing_months" class="card-body p-0 tab-pane fade show active" role="tabpanel" aria-labelledby="kt_billing_months">
					<!--begin::Table container-->
					<div class="table-responsive">
						<!--begin::Table-->
						<table class="table table-row-bordered align-middle gy-4 gs-9">
							<thead class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bolder bg-light bg-opacity-75">
								<tr>
									<td class="min-w-150px">Payment Date</td>
									<td class="min-w-150px">Expiry Expiry</td>
									<td class="min-w-150px">Plan</td>
									<td class="min-w-150px">Billing Description</td>
									<td class="min-w-150px">Amount</td>
									<td>Invoice</td>
								</tr>
							</thead>
							<tbody class="fw-bold text-gray-600">
								@if(count($currentMonthHistory) > 0)
									@foreach($currentMonthHistory as $history)
										<!--begin::Table row-->
										<tr>
											<td>{{ date('M d, Y', strtotime($history->created_at)) }}</td>
											<td>{{ date('F j, Y, g:i a', strtotime($history->expiry_date_time)) }}</td>
											<td>{{$history->subscription_type}}</td>
											<td>{{$history->description}}</td>
											<td>${{number_format($history->amount)}}</td>
											<td class="text-right">
												<a href="{{url('/invoice/'.\Crypt::encryptString($history->active_subscriptions_id))}}"  class="btn btn-sm btn-light btn-active-light-primary">View</a>
											</td>
										</tr>
										<!--end::Table row-->
									@endforeach
								@else
									<tr>
										<td class="text-center px-5" colspan="6">
											<p class="mt-14">No Billing History Currently</p>
										</td>
									</tr>
								@endif
							</tbody>
						</table>
						<!--end::Table-->
					</div>
					<!--end::Table container-->
				</div>
				<!--end::Tab panel-->
				
				<!--begin::Tab panel-->
				<div id="kt_billing_year" class="card-body p-0 tab-pane fade" role="tabpanel" aria-labelledby="kt_billing_year">
					<!--begin::Table container-->
					<div class="table-responsive">
						<!--begin::Table-->
						<table class="table table-row-bordered align-middle gy-4 gs-9">
							<thead class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bolder bg-light bg-opacity-75">
								<tr>
									<td class="min-w-150px">Payment Date</td>
									<td class="min-w-150px">Expiry Expiry</td>
									<td class="min-w-150px">Plan</td>
									<td class="min-w-150px">Billing Description</td>
									<td class="min-w-150px">Amount</td>
									<td>Invoice</td>
								</tr>
							</thead>
							<tbody class="fw-bold text-gray-600">
								@if(count($currentYearHistory) > 0)
									@foreach($currentYearHistory as $history)
										<!--begin::Table row-->
										<tr>
											<td>{{ date('M d, Y', strtotime($history->created_at)) }}</td>
											<td>{{ date('F j, Y, g:i a', strtotime($history->expiry_date_time)) }}</td>
											<td>{{$history->subscription_type}}</td>
											<td>{{$history->description}}</td>
											<td>${{number_format($history->amount)}}</td>
											<td class="text-right">
												<a href="{{url('/invoice/'.\Crypt::encryptString($history->active_subscriptions_id))}}"  class="btn btn-sm btn-light btn-active-light-primary">View</a>
											</td>
										</tr>
										<!--end::Table row-->
									@endforeach
								@else
									<tr>
										<td class="text-center px-5" colspan="6">
											<p class="mt-14">No Billing History Currently</p>
										</td>
									</tr>
								@endif
							</tbody>
						</table>
						<!--end::Table-->
					</div>
					<!--end::Table container-->
				</div>
				<!--end::Tab panel-->
				
				<!--begin::Tab panel-->
				<div id="kt_billing_all" class="card-body p-0 tab-pane fade" role="tabpanel" aria-labelledby="kt_billing_all">
					<!--begin::Table container-->
					<div class="table-responsive">
						<!--begin::Table-->
						<table class="table table-row-bordered align-middle gy-4 gs-9">
							<thead class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bolder bg-light bg-opacity-75">
								<tr>
									<td class="min-w-150px">Payment Date</td>
									<td class="min-w-150px">Expiry Expiry</td>
									<td class="min-w-150px">Plan</td>
									<td class="min-w-150px">Billing Description</td>
									<td class="min-w-150px">Amount</td>
									<td>Invoice</td>
								</tr>
							</thead>
							<tbody class="fw-bold text-gray-600">
								@if(count($billing_history) > 0)
									@foreach($billing_history as $history)
										<!--begin::Table row-->
										<tr>
											<td>{{ date('M d, Y', strtotime($history->created_at)) }}</td>
											<td>{{ date('F j, Y, g:i a', strtotime($history->expiry_date_time)) }}</td>
											<td>{{$history->subscription_type}}</td>
											<td>{{$history->description}}</td>
											<td>${{number_format($history->amount)}}</td>
											<td class="text-right">
												<a href="{{url('/invoice/'.\Crypt::encryptString($history->active_subscriptions_id))}}"  class="btn btn-sm btn-light btn-active-light-primary">View</a>
											</td>
										</tr>
										<!--end::Table row-->
									@endforeach
								@else
									<tr>
										<td class="text-center px-5" colspan="6">
											<p class="mt-14">No Billing History Currently</p>
										</td>
									</tr>
								@endif
							</tbody>
						</table>
						<!--end::Table-->
					</div>
					<!--end::Table container-->
				</div>
				<!--end::Tab panel-->
			</div>
			<!--end::Tab Content-->
		</div>
	</div>
	<!--end::Container-->
</div>
<!--end::Content-->



@endsection