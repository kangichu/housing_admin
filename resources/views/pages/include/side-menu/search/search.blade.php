<div class="m-0">
	<!--begin::Projects-->
	<div class="m-0 mt-5">
		<!--begin::Heading-->
		<h1 class="text-gray-800 fw-bold mb-6 mx-5">Tickets</h1>
		<!--end::Heading-->
		<!--begin::Items-->
		<div class="mb-10">
			@foreach($tickets as $ticket)
				<!--begin::Item-->
				<a href="#" class="custom-list d-flex align-items-center px-5 py-4">
					<!--begin::Symbol-->
					<div class="symbol symbol-40px me-5">
						<span class="symbol-label">
							<i class="las la-ticket-alt"></i>
						</span>
					</div>
					<!--end::Symbol-->
					<!--begin::Description-->
					<div class="d-flex flex-column flex-grow-1">
						<!--begin::Title-->
						<h5 class="custom-list-title fw-bold text-gray-800 mb-1">{{$ticket->topic}}</h5>
						<!--end::Title-->
						<!--begin::Link-->
						<span class="text-gray-400 fw-bold">{{ Str::limit($ticket->description, 50) }}</span>
						<!--end::Link-->
					</div>
					<!--begin::Description-->
				</a>
				<!--end::Item-->
			@endforeach
		</div>
		<!--end::Items-->
	</div>
	<!--end::Projects-->
</div>