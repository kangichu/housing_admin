@extends('pages.layouts.app')

@section('content')

<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
	<!--begin::Container-->
	<div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
		<!--begin::Page title-->
		<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0">
			<!--begin::Heading-->
			<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Features</h1>
			<!--end::Heading-->
			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
				<li class="breadcrumb-item text-muted">Home</li>
				<li class="breadcrumb-item text-dark">Features</li>
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

        <div class="card">
            <div class="card-header card-header-stretch justify-content-between align-items-center">
                <h3 class="card-title">Features</h3>
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-line-tabs nav-stretchfs-6 border-0">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_view">List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_create">Add</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_edit">Edit</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="kt_tab_pane_view" role="tabpanel">
                        <div class="rounded border p-10">
                            <table id="kt_datatable_features" class="table table-striped table-row-bordered border rounded gy-5 gs-7">
                                <thead>
                                    <tr class="fw-bold fs-6 text-gray-800">
                                        <th>Feature</th>
                                        <th>Description</th>
                                        <th>Routes</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($featureURLS as $feature => $featureRoutes)
                                        <tr>
                                            <td>{{ ucfirst($feature) }}</td>
                                            <td>{{ $featureRoutes->first()->description }}</td>
                                            <td>
                                                <div class="d-flex flex-row flex-wrap">
                                                    @foreach($featureRoutes as $route)
                                                        <span class="badge badge-secondary fw-bold d-block fs-7 mb-2 me-2">{{ ucfirst($route->route_url) }}</span>
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-light-danger me-10 kt_button_delete_features" data-feature-id="{{ $featureRoutes->first()->id }}">
                                                    <span class="indicator-label">
                                                        Delete
                                                    </span>
                                                    <span class="indicator-progress">
                                                        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="kt_tab_pane_create" role="tabpanel">
                        <form class="form" novalidate="novalidate" id="kt_modal_add_features_form">
                            <!--begin::Repeater-->
                            <div class="kt_feature_repeater_basic">
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <div data-repeater-list="kt_feature_repeater_basic">
                                        <div class="form-group row mb-4">
                                            <div class="col-md-12">
                                                <label class="form-label">Feature:</label>
                                                <input type="email" class="form-control mb-4" name="feature" style="width: 100%;" />
                                            </div>
                                            <div class="col-md-12">
                                                <!--begin::basic autosize textarea-->
                                                <label for="" class="form-label">Description</label>
                                                <textarea class="form-control mb-6 textarea-maxlength" name="description" maxlength="500" data-kt-autosize="true"></textarea>
                                                <!--end::basic autosize textarea-->
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row p-4 rounded border p-10">
                                                    <!--begin::Search Input-->
                                                    <input type="text" id="routeSearch" class="form-control mb-5" placeholder="Search routes...">
                                                    <!--begin::Checkboxes-->
                                                    @php
                                                    $groupedRoutes = collect($routes)->groupBy(function ($route) {
                                                        // Non-resource routes are grouped individually
                                                        return $route->url;
                                                    })->sortBy(function ($group, $key) {
                                                        // Sort groups by their keys (group names)
                                                        return $key;
                                                    });
                                                    @endphp
                                                    @foreach($groupedRoutes as $group => $groupedRoute)
                                                        <div class="form-check col-md-4 mb-4 route-item">
                                                            <input class="form-check-input" type="checkbox" value="{{ $group }}" id="route_{{ $group }}" name="route_groups[]">
                                                            <label class="form-check-label" for="route_{{ $group }}" style="word-wrap: break-word; white-space: normal;">
                                                                {{ ucfirst($group) }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Form group-->
                            </div>
                            <!--end::Repeater-->
                            <div class="d-flex flex-row justify-content-between">
                                <button type="button" class="btn btn-primary" id="kt_add_feautures_button">
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
        
                    <div class="tab-pane fade" id="kt_tab_pane_edit" role="tabpanel">
                        <!--begin::Accordion-->
                        <div class="accordion" id="kt_accordion_1">
                            @foreach($featureURLS as $feature => $featureRoutes)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="kt_accordion_{{ $featureRoutes->first()->id }}_header_{{ $featureRoutes->first()->id }}">
                                        <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_{{ $featureRoutes->first()->id }}_body_{{ $featureRoutes->first()->id }}" aria-expanded="false" aria-controls="kt_accordion_{{ $featureRoutes->first()->id }}_body_{{ $featureRoutes->first()->id }}">
                                            <span class="badge badge-primary me-4">Feature</span> <span>{{ ucfirst($feature) }}</span> 
                                        </button>
                                    </h2>
                                    <div id="kt_accordion_{{ $featureRoutes->first()->id }}_body_{{ $featureRoutes->first()->id }}" class="accordion-collapse collapse" aria-labelledby="kt_accordion_{{ $featureRoutes->first()->id }}_header_{{ $featureRoutes->first()->id }}" data-bs-parent="#kt_accordion_1">
                                        <div class="accordion-body">
                                            <form class="form" novalidate="novalidate" id="kt_modal_add_features_form_edit_{{ $featureRoutes->first()->id }}">
                                                <!--begin::Repeater-->
                                                <div class="kt_feature_repeater_basic">
                                                    <!--begin::Form group-->
                                                    <div class="form-group">
                                                        <div data-repeater-list="kt_feature_repeater_basic">
                                                            <input type="hidden" name="feature_id" id="feature_id" value="{{ $featureRoutes->first()->id }}">
                                                            <div class="form-group row mb-4">
                                                                <div class="col-md-12">
                                                                    <label class="form-label">Feature:</label>
                                                                    <input type="email" class="form-control mb-4" name="feature" style="width: 100%;" value="{{ $feature }}"/>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <!--begin::basic autosize textarea-->
                                                                    <label class="form-label">Description</label>
                                                                    <textarea class="form-control mb-6 textarea-maxlength" name="description" maxlength="500" data-kt-autosize="true">{{ $featureRoutes->first()->description }}</textarea>
                                                                    <!--end::basic autosize textarea-->
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="row p-4 rounded border p-10">
                                                                        <!--begin::Search Input-->
                                                                        <input type="text" id="routeSearch_{{ $featureRoutes->first()->id }}" class="form-control mb-5" placeholder="Search routes...">
                                                                        <!--begin::Checkboxes-->
                                                                        @php
                                                                        $groupedRoutes = collect($routes)->groupBy(function ($route) {
                                                                            // Non-resource routes are grouped individually
                                                                            return $route->url;
                                                                        })->sortBy(function ($group, $key) {
                                                                            // Sort groups by their keys (group names)
                                                                            return $key;
                                                                        });
                                                                        @endphp
                                                                        @foreach($groupedRoutes as $group => $groupedRoute)
                                                                            <div class="form-check col-md-4 mb-4 route-item_{{ $featureRoutes->first()->id }}">
                                                                                <input class="form-check-input" type="checkbox" value="{{ $group }}" id="route_{{ $group }}" 
                                                                                    @if($featureRoutes->contains('route_url', $group)) checked @endif name="route_groups[]">
                                                                                <label class="form-check-label" for="route_{{ $group }}" style="word-wrap: break-word; white-space: normal;">
                                                                                    {{ ucfirst($group) }}
                                                                                </label>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Form group-->
                                                </div>
                                                <!--end::Repeater-->
                                                <div class="d-flex flex-row justify-content-between">
                                                    <button type="button" class="btn btn-primary kt_add_feautures_button_edit" id="kt_add_feautures_button_edit_{{ $featureRoutes->first()->id }}">
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
                            @endforeach
                        </div>
                        <!--end::Accordion-->
                    </div>
                   
                </div>
            </div>
        </div>
                        
                   

    </div>
	<!--end::Container-->
</div>
<!--end::Content-->


@endsection