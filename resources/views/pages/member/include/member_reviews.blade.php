<!--begin::View component-->
<div id="kt_drawer_rating_advanced" class="bg-white" data-kt-drawer="true" data-kt-drawer-activate="true" data-kt-drawer-toggle="#kt_drawer_rating_{{$member->business_id}}" 
    data-kt-drawer-close="#kt_drawer_rating_close_{{$member->business_id}}" data-kt-drawer-name="docs" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}" 
    data-kt-drawer-direction="end" style="z-index: 9999999;" >
        <div class="card w-100 rounded-0">
            <!--begin::Card header-->
            <div class="card-header pe-5 justify-content-between">
                <!--begin::Title-->
                <div class="card-title">
                    <!--begin::User-->
                    <div class="d-flex justify-content-center flex-column me-3">
                        <h3 class="fs-4 fw-bolder text-gray-900 cursor-none me-1 lh-1">
                            Reviews <small style="margin-left: 1em; cursor: pointer !important;">{{$member->business_name}}</small> </h3>
                    </div>
                    <!--end::User-->
                </div>
                <!--end::Title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_rating_close_{{$member->business_id}}">
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
            <div class="card-body scroll">
                @foreach($ratings as $key=>$rating)
                    @if($rating->business_id == $member->business_id)
                        <div class="d-flex flex-row align-items-basline ">
                            <identicon-svg username="{{$key+1}}" class="me-5"></identicon-svg>
                            <!--begin::Text-->
                            <div class="d-flex flex-column mb-5">
                                <p class="text-gray-800 fw-normal"><span class="badge badge-info me-5">{{$rating->status}}</span>{{$rating->review}}  </p>
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center mb-5">
                                    <a href="#" class="btn btn-sm btn-light btn-color-muted 
                                    @if($rating->rating == 'Fair') btn-active-light-secondary @endif
                                    @if($rating->rating == 'Satisfied') btn-active-light-success @endif
                                    @if($rating->rating == 'Meeh') btn-active-light-info @endif
                                    @if($rating->rating == 'Disappointed') btn-active-light-warning @endif
                                    @if($rating->rating == 'Aggrevated') btn-active-light-danger @endif
                                    px-4 py-2 me-4">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M12 22C13.6569 22 15 20.6569 15 19C15 17.3431 13.6569 16 12 16C10.3431 16 9 17.3431 9 19C9 20.6569 10.3431 22 12 22Z" fill="black"/>
                                            <path d="M19 15V18C19 18.6 18.6 19 18 19H6C5.4 19 5 18.6 5 18V15C6.1 15 7 14.1 7 13V10C7 7.6 8.7 5.6 11 5.1V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V5.1C15.3 5.6 17 7.6 17 10V13C17 14.1 17.9 15 19 15ZM11 10C11 9.4 11.4 9 12 9C12.6 9 13 8.6 13 8C13 7.4 12.6 7 12 7C10.3 7 9 8.3 9 10C9 10.6 9.4 11 10 11C10.6 11 11 10.6 11 10Z" fill="black"/>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->{{$rating->rating}}</a>
                                    <a href="#" class="btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2 like-button @if($rating->liked_rating_user_id == auth()->user()->id) active @endif" data-review-id="{{ $rating->id }}" data-review-count="{{ $rating->review_count }}">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="black"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon--><span class="review-count">{{ $rating->review_count }}</span></a>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Text-->
                        </div>
                        @foreach($responses as $key=>$response)
                            @if($response->ratings_id == $rating->id)
                                <!--begin::Replies-->
                                <div class="mb-7 ps-10">
                                    <!--begin::Reply-->
                                    <div class="d-flex mb-5">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-45px me-2">
                                            <identicon-svg username="{{$member->business_name}}"></identicon-svg>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-column flex-row-fluid">
                                            <!--begin::Info-->
                                            <div class="d-flex align-items-center flex-wrap">
                                                <a href="#" class="text-gray-800 text-hover-primary fw-bolder me-2">{{$member->business_name}}</a>
                                                @php
                                                    $givenDate = \Carbon\Carbon::parse($response->updated_at);
                                                    $daysDifference = $givenDate->diffInDays(\Carbon\Carbon::now());
                                                @endphp
                                                <span class="text-gray-400 fw-bold fs-7">{{ $daysDifference }} days</span>
                                                <a href="#" class="ms-auto text-gray-400 text-hover-primary fw-bold fs-7">Response</a>
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Post-->
                                            <span class="text-gray-800 fs-7 fw-normal pt-1">{{$response->response}} </span>
                                            <!--end::Post-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Reply-->
                                </div>
                                <!--end::Replies-->
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
            <!--end::Card body-->
        </div>
</div>
<!--end::View component-->