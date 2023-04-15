<!--begin::Topbar-->
<div class="d-flex flex-shrink-0">
	<!--begin::Create Complex-->
	<div class="d-flex ms-3">
		<a href="/subscription/create" class="btn btn-flex flex-center bg-body btn-color-gray-700 btn-active-color-primary w-40px w-md-auto h-40px px-0 px-md-6 {{ (request()->is('subscription/create')) ? 'active' : '' }}" tooltip="New Subscription">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
			<span class="svg-icon svg-icon-2 svg-icon-primary me-0 me-md-2">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
					<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
				</svg>
			</span>
			<!--end::Svg Icon-->
			<span class="d-none d-md-inline">New Subscription</span>
		</a>
	</div>
	<!--end::Create Complex-->
	<!--begin::Create Listing-->
	<div class="d-flex ms-3">
		<a href="/listing" class="btn btn-flex flex-center bg-body btn-color-gray-700 btn-active-color-primary w-40px w-md-auto h-40px px-0 px-md-6 {{ (request()->is('listing')) ? 'active' : '' }}" tooltip="New Listing"  id="kt_toolbar_primary_button">
			<!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
			<span class="svg-icon svg-icon-2 svg-icon-primary me-0 me-md-2">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM15 17C15 16.4 14.6 16 14 16H8C7.4 16 7 16.4 7 17C7 17.6 7.4 18 8 18H14C14.6 18 15 17.6 15 17ZM17 12C17 11.4 16.6 11 16 11H8C7.4 11 7 11.4 7 12C7 12.6 7.4 13 8 13H16C16.6 13 17 12.6 17 12ZM17 7C17 6.4 16.6 6 16 6H8C7.4 6 7 6.4 7 7C7 7.6 7.4 8 8 8H16C16.6 8 17 7.6 17 7Z" fill="black" />
					<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
				</svg>
			</span>
			<!--end::Svg Icon-->
			<span class="d-none d-md-inline">New Tickets</span>
		</a>
	</div>
	<!--end::Create Listing-->
	<!--begin::Chat-->
	<div class="d-flex align-items-center ms-3">
		<!--begin::Menu wrapper-->
		<div class="btn btn-icon btn-primary w-40px h-40px pulse pulse-white" id="kt_drawer_chat_toggle">
			<!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
			<span class="svg-icon svg-icon-2">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
				<path opacity="0.3" d="M12 22C13.6569 22 15 20.6569 15 19C15 17.3431 13.6569 16 12 16C10.3431 16 9 17.3431 9 19C9 20.6569 10.3431 22 12 22Z" fill="black"/>
				<path d="M19 15V18C19 18.6 18.6 19 18 19H6C5.4 19 5 18.6 5 18V15C6.1 15 7 14.1 7 13V10C7 7.6 8.7 5.6 11 5.1V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V5.1C15.3 5.6 17 7.6 17 10V13C17 14.1 17.9 15 19 15ZM11 10C11 9.4 11.4 9 12 9C12.6 9 13 8.6 13 8C13 7.4 12.6 7 12 7C10.3 7 9 8.3 9 10C9 10.6 9.4 11 10 11C10.6 11 11 10.6 11 10Z" fill="black"/>
				</svg>
			</span>
			<!--end::Svg Icon-->
			<span class="pulse-ring"></span>
		</div>
		<!--end::Menu wrapper-->
	</div>
	<!--end::Chat-->
</div>
<!--end::Topbar-->