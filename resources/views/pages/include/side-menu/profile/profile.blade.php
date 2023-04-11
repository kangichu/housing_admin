<div class="d-flex align-items-center mb-10" id="kt_header_user_menu_toggle">
	<!--begin::Menu wrapper-->
	<div class="cursor-pointer symbol symbol-40px" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-start" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-dismiss="click" title="User profile">
		<!-- <img src="{{asset('dashboard/media/avatars/blank.png')}}" alt="image" /> -->
		<identicon-svg username="{{auth()->user()->first_name}} {{auth()->user()->last_name}}"></identicon-svg>
	</div>
	<!--begin::Menu-->
	<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
		<!--begin::Menu item-->
		<div class="menu-item px-3">
			<div class="menu-content d-flex align-items-center px-3">
				<!--begin::Avatar-->
				<div class="symbol symbol-50px me-5">
					@if(auth()->user()->avatar == null)
					<!-- <img alt="Logo" src="{{asset('dashboard/media/avatars/blank.png')}}" alt="image" /> -->
					<identicon-svg username="{{auth()->user()->first_name}} {{auth()->user()->last_name}}"></identicon-svg>
					@else
					<img alt="Logo" src='/storage/avatars/{{auth()->user()->avatar}}' alt="image" />
					@endif

				</div>
				<!--end::Avatar-->
				<!--begin::Username-->
				<div class="d-flex flex-column">
					<div class="fw-bolder d-flex align-items-center fs-5">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</div>
					<a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{auth()->user()->email}}</a>
				</div>
				<!--end::Username-->
			</div>
		</div>
		<!--end::Menu item-->
		<!--begin::Menu separator-->
		<div class="separator my-2"></div>
		<!--end::Menu separator-->
		<!--begin::Menu item-->
		<div class="menu-item px-5">
			<a href="/business_account" class="menu-link px-5 {{ (request()->is('business_account')) ? 'active' : '' }}">My Profile</a>
		</div>
		<!--end::Menu item-->
		<!--begin::Menu item-->
		<div class="menu-item px-5">
			<a href="/listings" class="menu-link px-5  {{ (request()->is('listings')) ? 'active' : '' }}">
				<span class="menu-text">My Listings</span>
				<span class="menu-badge">
					<span class="badge badge-light-success badge-circle fw-bolder fs-7">0</span>
				</span>
			</a>
		</div>
		<!--end::Menu item-->
		<!--begin::Menu item-->
		<div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
			<a href="#" class="menu-link px-5 {{ (request()->is('billing') || request()->is('subscription')) ? 'active' : '' }}">
				<span class="menu-title">My Subscription</span>
				<span class="menu-arrow"></span>
			</a>
			<!--begin::Menu sub-->
			<div class="menu-sub menu-sub-dropdown w-175px py-4">
				<!--begin::Menu item-->
				<div class="menu-item px-3">
					<a href="/billing" class="menu-link px-5 {{ (request()->is('billing')) ? 'active' : '' }}">Billing</a>
				</div>
				<!--end::Menu item-->
				<!--begin::Menu item-->
				<div class="menu-item px-3">
					<a href="/subscription" class="menu-link px-5 {{ (request()->is('subscription')) ? 'active' : '' }}">Subscription</a>
				</div>
				<!--end::Menu item-->
			</div>
			<!--end::Menu sub-->
		</div>
		<!--end::Menu item-->
		<!--begin::Menu separator-->
		<div class="separator my-2"></div>
		<!--end::Menu separator-->
		<!--begin::Menu item-->
		<div class="menu-item px-5 my-1">
			<a href="/business_account" class="menu-link px-5 {{ (request()->is('business_account')) ? 'active' : '' }}">Account Settings</a>
		</div>
		<!--end::Menu item-->
		<!--begin::Menu item-->
		<div class="menu-item px-5">
			
             <a href="{{ route('logout') }}"
             		class="menu-link px-5"
                    onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Sign Out') }}
                </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
		</div>
		<!--end::Menu item-->
	</div>
	<!--end::Menu-->
	<!--end::Menu wrapper-->
</div>