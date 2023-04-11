

<div class="aside-footer d-flex flex-column align-items-center flex-column-auto" id="kt_aside_footer">
	<!--begin::Activities-->
	<div class="d-flex align-items-center mb-3">
		<!--begin::Drawer toggle-->
		<div class="btn btn-icon btn-active-color-primary btn-color-gray-400 btn-active-light" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-start" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-dismiss="click" title="Activity Logs" id="kt_activities_toggle">
			<!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
			<span class="svg-icon svg-icon-2 svg-icon-lg-1">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect x="8" y="9" width="3" height="10" rx="1.5" fill="black" />
					<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black" />
					<rect x="18" y="11" width="3" height="8" rx="1.5" fill="black" />
					<rect x="3" y="13" width="3" height="6" rx="1.5" fill="black" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::drawer toggle-->
	</div>
	<!--end::Activities-->
	<!--begin::User-->
	@include('pages.include.side-menu.profile.profile')
	<!--end::User-->
</div>