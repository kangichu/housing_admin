<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 complex-item">
    <!--begin::Card-->
    <div class="card h-md-100" style="background-color: #f3f6f985 !important;">
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
                <span class="badge badge-light-success mt-5" style="cursor: pointer" data-kt-drawer-show="true" data-kt-drawer-target="#kt_drawer_feature-{{$subscription->id}}">Features</span>
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
<div id="kt_drawer_feature-{{$subscription->id}}" class="bg-white" data-kt-drawer="true" data-kt-drawer-activate="true" 
    data-kt-drawer-toggle="kt_drawer_feature-{{$subscription->id}}_button" data-kt-drawer-close="#kt_drawer_feature-{{$subscription->id}}_close"
    data-kt-drawer-overlay="true" data-kt-drawer-direction="end" data-kt-drawer-width="{default:'300px', 'md': '500px'}" style="margin-top: 0 !important;">
    <div class="card rounded-0 w-100">
        <form id="form-{{$subscription->id}}">
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
                <input type="hidden" name="subscription_id" value="{{$subscription->id}}">
                @foreach($linkedFeatures as $feature)
                    @if($feature->subscription_id == $subscription->id)
                        <!--begin::Item-->
                        <label class="d-flex align-items-center mb-5" style="cursor: pointer">
                            <span class="pe-3">
                                <input type="checkbox" name="feature" value="{{$feature->id}}" style="display: block; margin: 1em auto; cursor: pointer;">
                            </span>
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
            <form class="form" novalidate="novalidate" id="kt_modal_add_subscription_features_form-{{$subscription->id}}">
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
                    <input type="hidden" name="subscription_id" value="{{$subscription->id}}">
                    <!--begin::Select-->
                    <select class="form-select" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple" name="feature_ids">
                        <option></option>
                        @foreach($features as $feature)
                            <option value="{{ $feature->id }}">{{ $feature->feature }}</option>
                        @endforeach
                    </select>
                    <!--end::Select-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary me-10 kt_subscription_feautures_button" id="kt_subscription_feautures_button" data-sub-id="{{$subscription->id}}">
                        <span class="indicator-label">
                            Link Features
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
                    <button type="button" class="btn btn-primary me-10" id="kt_limitations_button" data-sub-id="{{$subscription->id}}">
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