@extends('layouts.website')
@section('content')
<div class="breadcrumb-wrapper bg-light-2">				
				<div class="container">
					<ol class="breadcrumb-list booking-step">
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><span>{{ $companypartnership->name }}</span></li>
					</ol>
					
				</div>
				
			</div>
			
			
			
			<div class="content-wrapper">
			
				<div class="container">
			
					<div class="row">
					
						<div class="col-md-9" role="main">

							<div class="detail-content-wrapper">
								
									<div id="section-0" class="detail-content">							
										<h1 class="hero-title">{{ $companypartnership->name }}</h1>
										<p class="line18">{{ $companypartnership->address }}</p>
										<p class="line18">{{ $companypartnership->city->name }}, {{ $companypartnership->country->name }} </p>
										<span style="display: block;"> <b>{{ $companypartnership->phone }}</b></span>
									</div>
									<div id="section-0" class="detail-content">
										
										<div class="section-title text-left">
											<h4>Profile</h4>	
										<p>{{ $companypartnership->profile }}</p>
										</div>	
										<b>Visi</b>									
										<p>{{ $companypartnership->vision }}</p>
										<b>Misi</b>									
										<p>{{ $companypartnership->mision }}</p>
										<b>History</b>									
										<p>{{ $companypartnership->history }}</p>

									</div>

									<div id="section-0" class="detail-content">			
										<div class="section-title text-left">
											<h4>Description</h4>
										</div>										
										<p>{{  strip_tags($companypartnership->description) }}</p>

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
									
								
									
									
									
									<!-- <div id="section-4" class="detail-content">
									
										<div class="section-title text-left">
											<h4>Space Type</h4>
										</div>
										
										<ul class="list-with-icon with-heading">
										
											<li>
												<i class="fa fa-check-circle text-primary"></i>
												<h6 class="heading mt-0">CoWorking</h6>
												<p>Adieus except say barton put feebly favour him.</p>
											</li>
											
											<li>
												<i class="fa fa-check-circle text-primary"></i>
												<h6 class="heading mt-0">Team Tabel</h6>
												<p>4 breakfast &amp; 3 dinners </p>
											</li>
											
											<li>
												<i class="fa fa-check-circle text-primary"></i>
												<h6 class="heading mt-0">Residence Room</h6>
												<p>Modern air conditioned coach with reclining seats, TV for showing DVDs, and toilet</p>
											</li>
											
											
											
										</ul>
										
										
							
									</div> -->
									<div id="section-3" class="detail-content">
									
										<div class="section-title text-left">
											<h4>Maps</h4>
										</div>
										
										<div class="hotel-item-wrapper">
                                   		<div id="map" style="width:auto; height: 400px;"></div> 
										
										</div>
									</div>
										

										<div class="availabily-wrapper">
											<ul class="availabily-list">
												<li class="availabily-heading clearfix">
													<div class="date-from">Room</div>
													<div class="status">Status</div>
													<div class="price">Price</div>
													<div class="action">&nbsp;</div>
												</li>
												@if(count($companyservices) > 0)
												@foreach($companyservices as $row)
													@if($row->quota > 0)
												<li class="availabily-content clearfix">
													<div class="date-from">
														<span class="availabily-heading-label">start:</span>
														<span>{{ $row->name }}</span>
													</div>
													<div class="status">
														<span class="availabily-heading-label">status:</span>
														<span>@if($row->status == 'Y') Available @elseif($row->status == 'N') Not Available @endif</span>
													</div>
													<div class="price">
														<span class="availabily-heading-label">price:</span>
														<span>Rp {{ number_format($row->price, 2) }}</span>
													</div>
													<div class="action">
														@if(\Auth::check())
														<a href="{{ url('/website/package/booking') }}/{{ $row->id }}/{{ str_slug($row->name) }}" class="btn btn-primary btn-sm btn-inverse">Book now</a>
														@else
														<a href="{{ url('/website/loginmember') }}" class="btn btn-primary btn-sm btn-inverse">Book now</a>
														@endif
													</div><div class="action">
														
													</div>
												</li>
												@else
						                  		<div class="alert alert-danger alert-dismissible" role="alert">
						                   			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								                    <i class="fa fa-warning"></i> Quota not available</b>
						                  		</div>
												@endif		
												@endforeach
												@else						
						                  		<div class="alert alert-danger alert-dismissible" role="alert">
						                   			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								                    <i class="fa fa-warning"></i> Space not available</b>
						                  		</div>
												@endif
											</ul>											
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
														{{  strip_tags($companypartnership->faq) }}
													</div>
												</div>
											</div>
										</div>
									</div>
							</div>
						</div>

						
						<div class="col-sm-4 col-md-3 mt-50-xs">
							
							<aside class="sidebar with-filter">
							
								<div class="sidebar-inner">
								
									<div class="sidebar-module">
										<h4 class="heading mt-0">Company Partnerships</h4>
										<div class="sidebar-module-inner">
											
											<ul class="help-list">
												<li><span class="font600">
													<img src="{{ asset('upload/companypartnership') }}/{{ $companypartnership->logo }}" alt="Popular Post" />
												</li>
												<li><span class="font600">{{ $companypartnership->name }}</span></li>
												<li><span class="font600">Phone</span>: {{ $companypartnership->phone }}</li>
												<li><span class="font600">Email</span>: {{ $companypartnership->email }}</li>
											</ul>
										</div>
									</div>
									
									
									<div class="sidebar-module">
								
									
								</div>
								

						</div>

					</div>
				
				</div>
					
			</div>
			  <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyBMnj6Gqf0MIGbsrjEoyqOoRMVs4af-FfM&sensor=false"></script>
			<script type="text/javascript">              
              var myLatlng = new google.maps.LatLng({{ $companypartnership->maps }});
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