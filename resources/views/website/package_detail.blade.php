@extends('layouts.website')
@section('content')

<!-- start end Page title -->
			<div class="page-title detail-page-title" style="background-image:url('{{ asset('frontend/images/detail/header.jpg')  }}');">
				
				<div class="container">
				
					<div class="flex-row">
						
						<div class="flex-column flex-md-8 flex-sm-12">
							
							<h1 class="hero-title">{{ $companyservices->name }}</h1>
							<p class="line18">{{ $companyservices->information }}</p>
							
							<ul class="list-col clearfix">
								<li class="rating-box">
									<div class="rating-wrapper">
										<div class="raty-wrapper"><!-- 
											<span style="display: block;"> <b>7 Space Type</b></span> -->
										</div>
									</div>
								</li>
								
															

								
							</ul>
							
						</div>
						
						<div class="flex-column flex-md-4 flex-align-bottom flex-sm-12 mt-20-sm">
							<div class="text-right text-left-sm">
								<a href="#section-5" class="anchor btn btn-primary">See dates &amp; Book Now</a>
							</div>

						</div>
					
					</div>

				</div>
				
			</div>
			<!-- end Page title -->
			
			
			
			<div class="content-wrapper">
			
				<div class="container">
			
					<div class="row">
					
						<div class="col-md-9" role="main">

							<div class="detail-content-wrapper">
								
									<div id="section-0" class="detail-content">
										
										<div class="section-title text-left">
											<h4>Highlights</h4>
										</div>
										

										<p>{{ strip_tags($companyservices->companypartnership->profile) }}</p>

									</div>
									
									<div id="section-1" class="detail-content">
									
										<div class="section-title text-left">
											<h4>Gallery</h4>
										</div>
										
										<div class="slick-gallery-slideshow">
					
											<div class="slider gallery-slideshow">
												@if(count($mediacompanyservices) > 0)
													@foreach ($mediacompanyservices as $row)
													<div><div class="image"><img src="{{ asset('upload/mediacompanyservices') }}/{{ $row->image }}" alt="Image" /></div></div>
													@endforeach
												@else													
						                  		<div class="alert alert-danger alert-dismissible" role="alert">
						                   			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								                    <i class="fa fa-warning"></i> Gallery not available</b>
						                  		</div>
												@endif
											</div>
											<div class="slider gallery-nav">
												@if(count($mediacompanyservices) > 0)
													@foreach ($mediacompanyservices as $row)
													<div><div class="image"><img src="{{ asset('upload/mediacompanyservices') }}/{{ $row->image }}" alt="Image" /></div></div>
													@endforeach
												@else	
												@endif
											</div>
											
										</div>

									</div>
									
								
									
									
									
									<div id="section-4" class="detail-content">
									
										<div class="section-title text-left">
											<h4>Space Type</h4>
										</div>
										
										<ul class="list-with-icon with-heading">
										
											<li>
												<i class="fa fa-check-circle text-primary"></i>
												<h6 class="heading mt-0">{{ $companyservices->services->name }}</h6>
												<p>{{ $companyservices->information }}</p>
											</li><!-- 											
											<li>
												<i class="fa fa-check-circle text-primary"></i>
												<h6 class="heading mt-0">Team Tabel</h6>
												<p>4 breakfast &amp; 3 dinners </p>
											</li>
											
											<li>
												<i class="fa fa-check-circle text-primary"></i>
												<h6 class="heading mt-0">Residence Room</h6>
												<p>Modern air conditioned coach with reclining seats, TV for showing DVDs, and toilet</p>
											</li> -->
											
										</ul>
										
										
							
									</div>
									<div id="section-3">
									
										<div class="section-title text-left">
											<h4>Maps</h4>
										</div>
										
										<div class="hotel-item-wrapper">
                                   		<div id="map" style="width:auto; height: 400px;"></div> 										
										</div>
										
										<!-- <p>Unpacked now declared put you confined daughter improved. Celebrated imprudence few interested especially reasonable off one. Wonder bed elinor family secure met. It want gave west into high no in.</p> -->
									</div>
										<!--<div id="section-3" class="detail-content">
									
									 <div class="section-title text-left">
											<h4>Accommodation</h4>
										</div>
										
										<div class="hotel-item-wrapper">
										
											<div class="row gap-1">
											
												<div class="col-sm-xss-12 col-xs-6 col-sm-4 col-md-4">
												
													<div class="hotel-item mb-1">
														<a href="#">
															<div class="image">
																<img src="images/accomodation/01.jpg" alt="Hotel" />
															</div>
															<div class="content">
																<h6>Beach Hilton Hotel</h6>
															</div>
														</a>
													</div>
													
												</div>
												
												<div class="col-sm-xss-12 col-xs-6 col-sm-4 col-md-4">
												
													<div class="hotel-item mb-1">
														<a href="#">
															<div class="image">
																<img src="images/accomodation/02.jpg" alt="Hotel" />
															</div>
															<div class="content">
																<h6>The Privilege Floor @ Croatia</h6>
															</div>
														</a>
													</div>
													
												</div>
												
												<div class="col-sm-xss-12 col-xs-6 col-sm-4 col-md-4">
												
													<div class="hotel-item mb-1">
														<a href="#">
															<div class="image">
																<img src="images/accomodation/03.jpg" alt="Hotel" />
															</div>
															<div class="content">
																<h6>Croatia Grande Palace Hotel</h6>
															</div>
														</a>
													</div>
													
												</div>
											
											</div>
										
										</div>
										
										<p>Unpacked now declared put you confined daughter improved. Celebrated imprudence few interested especially reasonable off one. Wonder bed elinor family secure met. It want gave west into high no in.</p>
									</div> -->
									
									<br>
									<div id="section-5">
									<form method="GET" action="/website/package/searchroom" accept-charset="UTF-8">
									 <!-- <input type="hidden" name="q" value="{{ $companyservices->companypartnership->id }}"> -->
									 <input type="hidden" name="codecompanyservices" value="{{ $companyservices->id }}">
										<div class="section-title text-left">
											<h4>Availability</h4>
										</div>
										<div class="row mb-20">
											<div class="col-sm-6">
												<p>Start Mouth</p>
												<div class="form-group">
													<div class="input-group">
														 <input type="date" name="datein" class="form-control" value="" required><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<p>End Mouth</p>
												<div class="form-group">
													<div class="input-group">
														 <input type="date" name="dateout" class="form-control" value="" required><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
													</div>
												</div>
											</div>
											<div class="text-left mt-30">
          							  		&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="submit">Check Availabily</button>						
											</div>
										</form>
										</div>

										<div class="availabily-wrapper">
											<ul class="availabily-list">
												<li class="availabily-heading clearfix">
													<div class="date-from">Room</div>
													<div class="status">Status</div>
													<div class="price">Price</div>
													<div class="action">&nbsp;</div>
												</li>
												@if($companyservices->quota > 0)
												<li class="availabily-content clearfix">
													<div class="date-from">
														<span class="availabily-heading-label">start:</span>
														<span>{{ $companyservices->name }}</span>
													</div>
													<div class="status">
														<span class="availabily-heading-label">status:</span>
														<span>@if($companyservices->status == 'Y') Available @elseif($companyservices->status == 'N') Not Available @endif</span>
													</div>
													<div class="price">
														<span class="availabily-heading-label">price:</span>
														<span>Rp {{ number_format($companyservices->price, 2) }}</span>
													</div>
													<div class="action">
														@if(\Auth::check())
														<a href="{{ url('/website/package/booking') }}/{{ $companyservices->id }}/{{ str_slug($companyservices->name) }}" class="btn btn-primary btn-sm btn-inverse">Book now</a>
														@else
														<a href="{{ url('/website/loginmember') }}" class="btn btn-primary btn-sm btn-inverse">Book now</a>
														@endif
													</div>
												</li>
												@else
						                  		<div class="alert alert-danger alert-dismissible" role="alert">
						                   			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								                    <i class="fa fa-warning"></i> Quota not available</b>
						                  		</div>
												@endif												
												
											</ul>											
										</div>										
									</div>
									<br>
									<div id="section-5" class="detail-content">
										<div class="section-title text-left">
											<h4>Booking Tour</h4>
										</div>
										<div class="row mb-20">				
												<form action="/website/bookingtour" method="POST">
													{{csrf_field()}}
													<input type="hidden" name="codecompanyservices" value="{{ $companyservices->id }}">
													<input type="hidden" name="codecompanypartnership" value="{{ $companyservices->companypartnership->id }}">
													<div class="col-sm-6">
														<div class="form-group">
															<p>Email</p>
															<input name="email" class="form-control" placeholder="Email" required type="email"> 
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<p>Phone</p>
															<input name="phone" class="form-control" placeholder="Phone" required type="phone"> 
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<p>Date</p>
															<div class="input-group date">
																 <input type="text" name="date" class="form-control" placeholder="dd/mm/yyyy" required><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
															</div>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<p>Time</p>
															<input name="time" class="form-control" placeholder="Timw" required type="Time"> 
														</div>
													</div>
													<div class="col-sm-12">
													<input type="submit" name="bookingtour" value="Booking Tour" class="btn btn-primary bt-sm btn-inverse" >
											</div>
												</form>
										</div>
									</div>
									
																		
									<div id="section-6" class="detail-content">
									
										<div class="section-title text-left">
											<h4>Information &amp; FAQ</h4>
										</div>
										
										<p>Useful things to know before you go</p>
										
										<div class="row">
										
											<div class="col-sm-12 col-md-12 mb-15">
											
												<div class="read-more-div" data-collapsed-height="107">
			
													<div class="read-more-div-inner">
													<!-- <h5 class="heading mt-0">Heading Information 1</h5> -->
														{{ strip_tags($companyservices->companypartnership->faq) }}

													</div>
													
												</div>

											</div>
											
											
										</div>
									</div>
									<!-- 
									
									<div class="call-to-action">
									
										Question? <a href="#" class="btn btn-primary btn-sm btn-inverse">Make an inquiry</a> or call +66 28 878 5452
									
									</div>
										 -->
								</div>
							
						</div>

						<div class="col-sm-3 hidden-sm hidden-xs">
						
							<div class="scrollspy-sidebar sidebar-detail" role="complementary">
							
								<ul class="scrollspy-sidenav">
								
									<li>
										<ul class="nav">
											<li><a href="#section-0" class="anchor">Highlights</a></li>
											<li><a href="#section-1" class="anchor">Gallery</a></li>
											
											<li><a href="#section-4" class="anchor">Space Type</a></li>

											<li><a href="#section-3" class="anchor">Maps</a></li>
											<li><a href="#section-5" class="anchor">Availabilities & Booking Tour</a></li>
											<li><a href="#section-6" class="anchor">Information &amp; FAQ</a></li>
											
										</ul>
									</li>

								</ul>
								
								
							</div>

						</div>

					</div>
				
				</div>
					
			</div>
			  <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyBMnj6Gqf0MIGbsrjEoyqOoRMVs4af-FfM&sensor=false"></script>
			<script type="text/javascript">              
              var myLatlng = new google.maps.LatLng({{ $companyservices->companypartnership->maps }});
              var myOptions = {
                  zoom: 15,
                  center: myLatlng
              };              
              var map = new google.maps.Map(document.getElementById("map"), myOptions);
              var marker = new google.maps.Marker({
                   position: myLatlng,
                   map: map,
                   title:"Monas"
              });
        </script> 

<script type='text/javascript' src='http://code.jquery.com/jquery-1.8.3.js'></script>
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
@endsection