@extends('layouts.website')
@section('content')
			<div class="breadcrumb-wrapper bg-light-2">				
				<div class="container">
					<ol class="breadcrumb-list booking-step">
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><a href="{{ url('/website/package') }}">Package</a></li>
						<li><a href="{{ url('/website/package/detail/') }}/{{ $companyservices->id }}/{{ str_slug($companyservices->name) }}">{{ $companyservices->name }}</a></li>
						<li><a href="{{ url('/website/package/booking/') }}/{{ $companyservices->id }}/{{ str_slug($companyservices->name) }}">Booking</a></li>
						<li><span>Confirmation</span></li>
					</ol>
					
				</div>
				
			</div>
			
			<div class="content-wrapper">
			
				<div class="container">
			
					<div class="row">
					
						<div class="col-sm-8 col-md-9">
	
							<div class="confirmation-wrapper">
							
								
							
								<div class="confirmation-content">
								
									<div class="section-title text-left">
										<h4>Confirmation </h4>
									</div>
								<form  action="/website/package/bookingroom/send" method="POST" enctype="multipart/form-data">
								{{csrf_field()}}
								<input type="hidden" name="totalprice" value="{{ $total }}">
								<input type="hidden" name="codebookingspace" value="{{ $no }}">
								<input type="hidden" name="codecompanypartnership" value="{{ $companyservices->companypartnership->id }}">
								<input type="hidden" name="codeservices" value="{{ $companyservices->services->id }}">
								@foreach ($data as $name => $row )
								<input type="hidden" name="{{ $name }}" value="{{  $booking[] = $row }}">
								@endforeach
									<ul class="book-sum-list">
										<li><span class="font600">Booking Number: </span>{{ $booking[10] }}</li>
										<li><span class="font600">Space : </span>{{ $companyservices->name }}</li>
										<li><span class="font600">Type : </span>{{ $companyservices->services->name }}</li>
										<li><span class="font600">User Name: </span>{{ $booking[5] }}</li>
										<li><span class="font600">Billing Email: </span>{{ $booking[6] }}</li>
										<li><span class="font600">Phone: </span>{{ $booking[7] }}</li>
										<li><span class="font600">Start Date: </span> {{ date('d F Y', strtotime($booking[3])) }}</li>
										<li><span class="font600">End Date: </span>{{ date('d F Y', strtotime($booking[4])) }}</li>
										<li><span class="font600">Pricing: </span>Rp {{ number_format($companyservices->price, 2) }}</li>
										<li><span class="font600">Result : </span>{{ $hari }} Days * {{ number_format($companyservices->price, 2) }}</li>
										<li><span class="font600">Total Payment: </span>Rp {{ number_format($total, 2) }}</li>
									</ul>
									
								</div>
								
								
								
								<div class="confirmation-content">
								
									<div class="section-title text-left">
										<h4>Additional Information</h4>
									</div>
									
									<p>Abilities or he perfectly pretended so strangers be exquisite. Oh to another chamber pleased imagine do in. Went me rank at last loud shot an draw. Excellent so to no sincerity smallness. Removal request delight if on he we. Unaffected in we by apartments astonished to decisively themselves. Offended ten old consider speaking.</p>
								
								</div>
								
								<!-- <button class="btn btn-primary" onclick="location.href='/website/package/booking/{{ $companyservices->id }}/{{ str_slug($companyservices->name) }}/'"><i class="fa fa-arrow-left"></i> Back</button> -->
								<a href="thanks.php"><button class="btn btn-primary btn-inverse"><i class="fa fa-check"></i> Submit</button></a>
							</div>
							
							</form>
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