@extends('layouts.app')

@section('content')

<div class="d-flex flex-column flex-root">
	<!--begin::Authentication - Multi-steps-->
	<div class="d-flex flex-column flex-lg-row flex-column-fluid stepper stepper-pills stepper-column" id="kt_create_account_stepper">
		<!--begin::Body-->
		<div class="d-flex flex-column flex-lg-row-fluid py-10">

			<style>html,body { padding: 0; margin:0; }</style>
			<div style="font-family:Arial,Helvetica,sans-serif; line-height: 1.5; font-weight: normal; font-size: 15px; color: #2F3044; min-height: 100%; margin:0; padding:0; width:100%;">
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;margin:0 auto; padding:0; max-width:600px">
					<tbody>
						<tr>
							<td align="center" valign="center" style="text-align:center; padding: 40px">
								<a href="https://tandish.com" rel="noopener" target="_blank">
									<img alt="Logo" src="{{secure_asset('include/dashboard/media/logos/test.svg')}}" class="h-60px" />
								</a>
							</td>
						</tr>
						<tr>
							<td align="left" valign="center">
								<div style="text-align:left; margin: 0 20px; background-color:#ffffff; border-radius: 6px">
									<!--begin:Email content-->
									<div style="padding-bottom: 30px; font-size: 17px;">
										<strong>Welcome to {{ config('app.name') }}!</strong>
									</div>
									@if ($user->role === 'business')
									<div style="padding-bottom: 30px">Thank you for joining {{ config('app.name') }} as a property manager/landlord. Our platform provides you with powerful tools to manage your properties and connect with potential tenants. Whether you have residential or commercial properties, you can maximize your rental income and streamline your operations with ease.</div>
									<div style="padding-bottom: 30px">We are thrilled to have you as part of our community and look forward to helping you achieve success in your property management endeavors. Start exploring the features and opportunities available on {{ config('app.name') }} today!</div>
									@else
									<div style="padding-bottom: 30px">{{$message}}</div>
									@endif
									<!--end:Email content-->
									<div style="padding-bottom: 10px">Best regards,
									<br>{{ config('app.name') }}</div>
									<tr>
										<td align="center" valign="center" style="font-size: 13px; text-align:center;padding: 20px; color: #6d6e7c;">
											<p>Floor 5, 450 Avenue of the Red Field, SF, 10050, USA.</p>
											<p>Copyright ©
											<a href="https://tandish.com" rel="noopener" target="_blank">{{ config('app.name') }}</a>.</p>
										</td>
									</tr>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>


@endsection