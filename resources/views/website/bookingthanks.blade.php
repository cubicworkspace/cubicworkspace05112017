@extends('layouts.website')
@section('content')
			<div class="breadcrumb-wrapper bg-light-2">				
				<div class="container">
					<ol class="breadcrumb-list booking-step">
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><a href="{{ url('/website/package') }}">Package</a></li>
						<li><span>Thanks</span></li>
					</ol>
					
				</div>
				
			</div>
			
			<div class="content-wrapper">
			
				<div class="container">
			
					<div class="row">
					
						<div class="col-sm-8 col-md-9">
	
							<div class="confirmation-wrapper">
							
								<div class="payment-success">
								
									<div class="icon">
										<i class="pe-7s-check text-success"></i>
									</div>
								
									<div class="content">
										
										<h2 class="heading uppercase mt-0 text-success">Thank you, your booking is complete!</h2>
										@if (Session::has('thanks'))
						                   {!! session('thanks') !!}
						           		 @endif
										
									</div>
									<br>
									@foreach($bookingspaces as $row)
									@endforeach
									<a href="{{ url('/website/package/invoice/print/') }}/{{ $row->invoice }}" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
									
								</div>
							
								
								
								
							
							</div>
							
						</div>

						<div class="col-sm-4 col-md-3 mt-50-xs">

							<aside class="sidebar with-filter">
							
								<div class="sidebar-inner">
								
									<div class="sidebar-module">
										<h4 class="heading mt-0">Need Booking Help?</h4>
										<div class="sidebar-module-inner">
											<p class="mb-10">Paid was hill sir high 24/7. For him precaution any advantages dissimilar.</p>
											<ul class="help-list">
												<li><span class="font600">Hotline</span>: +1900 12 213 21</li>
												<li><span class="font600">Email</span>: support@tourpacker.com</li>
												<li><span class="font600">Livechat</span>: tourpacker (Skype)</li>
											</ul>
										</div>
									</div>
									
									
									<div class="sidebar-module">
										<h4 class="heading mt-0">Why booking with us?</h4>
										<div class="sidebar-module-inner">
											<ul class="featured-list-sm">
												<li>
													<span class="icon"><i class="fa fa-thumbs-up"></i></span>
													<h6 class="heading mt-0">No Booking Charges</h6>
													We don't charge you an extra fee for booking a hotel room with us
												</li>
												<li>
													<span class="icon"><i class="fa fa-credit-card"></i></span>
													<h6 class="heading mt-0">No Cancellation Sees</h6>
													We don't charge you a cancellation or modification fee in case plans change
												</li>
												<li>
													<span class="icon"><i class="fa fa-inbox"></i></span>
													<h6 class="heading mt-0">Instant Confirmation</h6>
													Instant booking confirmation whether booking online or via the telephone
												</li>
												<li>
													<span class="icon"><i class="fa fa-calendar"></i></span>
													<h6 class="heading mt-0">Flexible Booking</h6>
													You can book up to a whole year in advance or right up until the moment of your stay
												</li>
											</ul>
										</div>
									</div>
									
								</div>
								
							</aside>

						</div>

					</div>
				
				</div>
					
			</div>

					
			</div>

			
@endsection