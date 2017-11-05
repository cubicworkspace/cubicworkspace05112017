@extends('layouts.website')
@section('content')
			<div class="breadcrumb-wrapper bg-light-2">				
				<div class="container">
					<ol class="breadcrumb-list booking-step">
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><a href="{{ url('/website/package') }}">Package</a></li>
						<li><a href="{{ url('/website/package/detail/') }}/{{ $companyservices->id }}/{{ str_slug($companyservices->name) }}">{{ $companyservices->name }}</a></li>
						<li><span>Booking</span></li>
					</ol>
					
				</div>
				
			</div>
			
			<div class="content-wrapper">
			
				<div class="container">
			
					<div class="row">
					
						<!-- <div class="col-sm-12 visible-xs mb-50">

							<div class="price-summary-wrapper">
								
								<h4 class="heading mt-0 text-primary uppercase">My Trip</h4>
							
								<ul class="price-summary-list">
								
									<li>
										<h6 class="heading mt-0 mb-0">Croatia Sailing &amp; Cruising</h6>
										<p class="font12 text-light">4 days 3 nights city tour</p>
									</li>
									
									<li>
										<h6 class="heading mt-0 mb-0">Starts in Dubrovnik, Croatia</h6>
										<p class="font12 text-light">Monday, March 7, 2016</p>
									</li>
									
									<li>
										<h6 class="heading mt-0 mb-0">Ends in Hvar, Croatia</h6>
										<p class="font12 text-light">Thursday, March 10, 2016</p>
									</li>
									
									<li>
										<h6 class="heading mt-0 mb-0">What's included</h6>
										<p class="font12 text-light">Accommodation, Guide, Meals, Bus</p>
									</li>
									
									<li class="divider"></li>
									
									<li>
										<h6 class="heading mt-20 mb-5 text-primary uppercase">Price per person</h6>
										<div class="row gap-10 mt-10">
											<div class="col-xs-7 col-sm-7">
												Brochure Price
											</div>
											<div class="col-xs-5 col-sm-5 text-right">
												$1458
											</div>
										</div>
										<div class="row gap-10 mt-10">
											<div class="col-xs-7 col-sm-7">
												Tax &amp; fee
											</div>
											<div class="col-xs-5 col-sm-5 text-right">
												$0
											</div>
										</div>
									</li>
									
									<li class="divider"></li>
									
									<li class="text-right font600 font14">
										$1458
									</li>
									
									<li class="divider"></li>
									
									<li>
									
										<div class="row gap-10 font600 font14">
											<div class="col-xs-9 col-sm-9">
												Number of Travellers
											</div>
											<div class="col-xs-3 col-sm-3 text-right">
												1
											</div>
										</div>
									
									</li>
									
									<li class="total-price">
									
										<div class="row gap-10">
											<div class="col-xs-6 col-sm-6">
												<h5 class="heading mt-0 mb-0 text-white">Amount due</h5>
												<p class="font12">before departure</p>
											</div>
											<div class="col-xs-6 col-sm-6 text-right">
												<span class="block font20 font600 mb-5">$1458</span>
												<span class="font10 line10 block">**Best Price Guarantee </span>
											</div>
										</div>
									
									</li>
									
								</ul>
								
							</div>
							
						</div> -->

						<div class="col-sm-8 col-md-9" role="main">
	
						<form method="GET" action="/website/package/bookingroom" accept-charset="UTF-8">
							<input type="hidden" name="id" value="{{ $companyservices->id }}">
							<input type="hidden" name="price" value="{{ $companyservices->price }}">
							<input type="hidden" name="codeuser" value="{{ Auth::user()->id }}">
							<div class="section-title text-left">
								
								<h3>{{ $companyservices->name }} <!-- <small> / 4 days 3 nights</small> --></h3>
								
							</div>
							
							<div class="payment-container">
							
									
									<div class="payment-box">
									
										<div class="payment-header clearfix">
										

											<div class="row gap-10">
											
												<div class="col-sm-9">
													<h5 class="heading mt-0">Your selected date</h5>
												</div>
												
												<div class="col-sm-3">
													<button type="button" class="btn btn-primary btn-inverse btn-sm pull-right pull-left-xs mb-20-xss" data-toggle="modal" data-target="#myModal">Change</button>
												</div>
											<!-- Modal -->
											<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											  <div class="modal-dialog" role="document">
											    <div class="modal-content">
											      <div class="modal-header">
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											        <h4 class="modal-title" id="myModalLabel">Set Date</h4>
											      </div>
											      <div class="modal-body">
														<p>Start Mouth</p>
														<div class="form-group">
															<div class="input-group date">
																 <input type="text" name="datein" id="datein" class="form-control" placeholder="dd/mm/yyyy" required><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
															</div>
														</div>
														<p>End Mouth</p>
														<div class="form-group">
															<div class="input-group date">
																 <input type="text" name="dateout" id="dateout" class="form-control" placeholder="dd/mm/yyyy" required><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
															</div>
														</div>
											        <button type="button" class="btn btn-primary" onclick="setDate()">Set Date</button>
											      </div>
											      <div class="modal-footer">
											        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											      </div>
											    </div>
											  </div>
											</div>
											</div>

										</div>
										
										<div class="payment-content">
										
											<div class="payment-content">
												<p>Your date: <span id="dateintext"></span> - <span id="dateouttext"></span></p>
											</div>
											
										</div>
										
									</div>
									<script>
									function setDate() {
									    var x = document.getElementById("datein").value;
									    document.getElementById("dateintext").innerHTML = x;
									    var y = document.getElementById("dateout").value;
									    document.getElementById("dateouttext").innerHTML = y;
									}
									</script>

									<div class="payment-box">
									
										<div class="payment-header clearfix">
										
											<div class="number">
												2
											</div>
											
											<h5 class="heading mt-0">User Details</h5>
										
										</div>
										
										<div class="payment-content">
											
											<div class="payment-traveller">
											
												<div class="row gap-0">
												
													<div class="col-sm-9 col-sm-offser-3 col-md-10 col-md-offset-2">
														
													</div>
													
												</div>
												
												
													
												<div class="form-horizontal">
													<div class="form-group gap-20">
														<label class="col-sm-3 col-md-2 control-label"> Name:</label>
														<div class="col-sm-5 col-md-6">
															<input type="text" class="form-control" value="{{ Auth::user()->name }}" name="name">
														</div>
													</div>
												</div>


												<div class="form-horizontal">
													<div class="form-group gap-20">
														<label class="col-sm-3 col-md-2 control-label">Email:</label>
														<div class="col-sm-5 col-md-6">
															<input type="email" class="form-control" value="{{ Auth::user()->email }}" name="email" >
														</div>
													</div>
												</div>
												
												<div class="form-horizontal">
													<div class="form-group gap-20">
														<label class="col-sm-3 col-md-2 control-label">Phone Number:</label>
														<div class="col-sm-5 col-md-6">
															<input type="phone" class="form-control" required="" name="phone" value="{{ Auth::user()->phone }}">
														</div>
													</div>
												</div>
												
												
												<div class="form-horizontal">
													<div class="form-group gap-20">
														<label class="col-sm-3 col-md-2 control-label">Address:</label>
														<div class="col-sm-8 col-md-6">
															<input type="text" class="form-control" required="" name="address" >
														</div>
													</div>
												</div>
												
												
											</div>
											
											
											
											
											
										</div>
										
									</div>
									
									<div class="payment-box">
									
										<div class="payment-header clearfix">
										
											<div class="number">
												3
											</div>
											
											<h5 class="heading mt-0">Space Address</h5>

										</div>
										
										<div class="payment-content">
											
											<div class="form-horizontal">
												<div class="form-group gap-20">
													<label class="col-sm-3 col-md-2 control-label">Space:</label>
													<div class="col-sm-5 col-md-6">
														<input type="text" class="form-control" value="{{ $companyservices->name }}">
													</div>
												</div>
											</div>
												
											<div class="form-horizontal">
												<div class="form-group gap-20">
													<label class="col-sm-3 col-md-2 control-label">Type:</label>
													<div class="col-sm-5 col-md-6">
														<input type="text" class="form-control" value="{{ $companyservices->services->name }}">
													</div>
												</div>
											</div>
											
											<div class="form-horizontal">
												<div class="form-group gap-20">
													<label class="col-sm-3 col-md-2 control-label">Space Address:</label>
													<div class="col-sm-5 col-md-6">
														<input type="text" class="form-control" value="{{ $companyservices->city->name }}">
													</div>
												</div>
											</div>
											
											
											
										</div>
										
									</div>
									
									<div class="payment-box">
									
										<div class="payment-header clearfix">
										
											<div class="number">
												4
											</div>
											
											<h5 class="heading mt-0">Finish Payment <small>/ <i class="fa fa-lock"></i> secure</small></h5>

										</div>
										
										<div class="payment-content">
											
											<p>Excellent so to no sincerity smallness. Removal request delight if on he we.</p>
											
											<div class="alert alert-info" role="alert"><i class="fa fa-info-circle"></i> Ask especially collecting terminated may son expression.</div>
											
											<div id="paymentOption" class="payment-option-wrapper">
	
												<div class="row">
												@foreach($paymentmethodes as $row)
													<div class="col-sm-12">
														<div class="radio-block">
															<input id="payments{{ $row->id }}" name="codepaymentmethode" type="radio" class="radio" value="{{ $row->id }}" required />
															<label class="" for="payments{{ $row->id }}"><span>{{ $row->name }}</span> <img src="{{ asset('upload/paymentmethode') }}/{{ $row->logo }}" alt="Image"></label>
														</div>
													</div>
													<div class="clear"></div>
												@endforeach
												</div>
												
												
											</div>

										</div>
										
									</div>
									
									<div class="checkbox-block">
										<input id="accept_booking" name="accept_booking" type="checkbox" class="checkbox" value="paymentsCreditCard"/>
										<label class="" for="accept_booking">By submitting a booking request, you accept our <a href="#">terms and conditions</a> as well as the <a href="#">cancellation policy</a> and  <a href="#">House Rules</a> .</label>
									</div>
									
									<div class="row mt-20">
												
										<div class="col-sm-8 col-md-6">
										
											<input type="hidden" name="no" value="{{ $no }}">
											<button class="btn btn-primary" type="submit">Book Now</button>
											
											<p class="line18 mt-10"><span class="font600">Prepared is me marianne</span>: pleasure likewise debating. Wonder an unable except better stairs do ye admire.</p>
										
										</div>
										
									</div>
									
								</form>
								
							</div>
							
						</div>

						<div class="col-sm-4 col-md-3 hidden-xs">

							<div class="price-summary-wrapper">
								
								<h5 class="heading mt-0 text-primary uppercase">My Booking Room</h5>
							
								<ul class="price-summary-list">
								
									<li>
										<h6 class="heading mt-0 mb-0">{{ $companyservices->name }}</h6>
										<!-- <p class="font12 text-light">4 days 3 nights city tour</p> -->
									</li>
									
									
									
									<li class="divider"></li>
									
									<li>
										<h6 class="heading mt-20 mb-5 text-primary uppercase">Price </h6>
										<div class="row gap-10 mt-10">
											
											<div class="col-xs-12 col-sm-12 text-right">
												Rp. {{ number_format($companyservices->price, 2) }}
											</div>
										</div>
										
									</li>
								<!-- 	<li>
										<h6 class="heading mt-20 mb-5 text-primary uppercase">Days </h6>
										<div class="row gap-10 mt-10">
											
											<div class="col-xs-12 col-sm-12 text-right">
												3 Days
											</div>
										</div>
										
									</li> -->
									
									
									
									
									<li class="total-price">
									
										<div class="row gap-10">
											<div class="col-xs-6 col-sm-6">
												<h5 class="heading mt-0 mb-0 text-white">Amount due</h5>
												<p class="font12">before departure</p>
											</div>
											<div class="col-xs-6 col-sm-6 text-right">
												<span class="block font20 font600 mb-5"><p style="font-size: 14px;">Rp {{ number_format($companyservices->price, 2) }}</span>
												<!-- <span class="font10 line10 block">**Best Price Guarantee </span> -->
											</div>
										</div>
									
									</li>
									
								</ul>
								
							</div>
							
						</div>

					</div>
				
				</div>
					
			</div>

			
@endsection