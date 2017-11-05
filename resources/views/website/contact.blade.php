@extends('layouts.website')
@section('content')
<div class="page-title" style="background-image:url('{{ asset('frontend/images/hero-header/breadcrumb.jpg') }}');">
				
				<div class="container">
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">							<h1 class="hero-title">Contact Us</h1>
							<ol class="breadcrumb-list">
								<li><a href="{{ url('/') }}">Home</a></li>
								<li><span>Contact Us</span></li>
							</ol>
						</div>
						
					</div>

				</div>
				
			</div>
			<!-- end Page title -->
			
			<div class="content-wrapper">
	
				<div class="container">
					
					<div class="row">

						<div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 pb-20">
							
							<div class="section-title">
							
								<h3>{{ $identitas->name }}</h3>
								
								<p>{{ strip_tags($identitas->description) }}</p>
								
							</div>
							
						</div>
					
					</div>
					
				</div>
				
              <div id="map" class="mapbox"></div> 
		
				<div class="bg-light section pt-40 pb-20">
				
					<div class="container">

						<div class="map-contact">
							
							<div class="top-place-inner">
							
								<div id="map_5_list" class="list row gap-0">
									
									@foreach($informasicompanies as $row)
									<div class="col-sm-4">											
											<div class="top-place-item mb-30 maplink">
												<div class="icon"><img src="{{ asset('frontend/images/map-marker/marker.png') }}" alt="map" /></div>
												<div class="content">
													<h5 class="heading mt-0">{{ $row->name }}</h5>
													<ul>
														<li> {{ $row->description }}</li>
													</ul>
												</div>
											</div>
									</div>
									@endforeach


								</div>	
							</div>
						</div>
					</div>
				</div>
				
				<div class="section pt-60 pb-0">
				
					<div class="container">
					
						<div class="row">

							<div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
								
								<div class="section-title">
								
									<h3>Keep in touch</h3>
									
								</div>
								
							</div>
						
						</div>
						
							<div class="row">
							
								<div class="col-sm-4">

									<h5 class="heading mt-5">{{ $identitas->name }}</h5>
									<p>{{ strip_tags($identitas->profile) }}</p>
									
									<div class="boxed-social mb-30-xs clearfix">
										@foreach($sosialmedia as $row)
										<a href="{{ $row->url }}" data-toggle="tooltip" data-placement="top" title="{{ $row->name }}" target="_blank"><i class="{{ $row->description }}"></i></a>
										@endforeach
									
									</div>
								
								</div>
								
								<div class="col-sm-8">
								
									<div class="row">
									
										<div class="col-sm-6">
										
						<form action="/website/messages" method="POST" class="contact-form-wrapper" data-toggle="validator">
						{{csrf_field()}}
											<div class="form-group">
												<label for="inputName">Your Name <span class="font10 text-danger">(required)</span></label>
												<input id="inputName" type="text" name="name" class="form-control" data-error="Your name is required" required>
												<div class="help-block with-errors"></div>
											</div>
											
											<div class="form-group">
												<label for="inputEmail">Your Email <span class="font10 text-danger">(required)</span></label>
												<input id="inputEmail" type="email" name="email" class="form-control" data-error="Your email is required and must be a valid email address" required>
												<div class="help-block with-errors"></div>
											</div>
											
											<div class="form-group">
												<label>Subject <span class="font10 text-danger">(required)</span></label>
												<input type="text" name="subject" class="form-control"  data-error="Your Subject is required " required/>
											</div>
										
										</div>
										
										<div class="col-sm-6">
										
											<div class="form-group">
												<label for="inputMessage">Message <span class="font10 text-danger">(required)</span></label>
												<textarea id="inputMessage" name="description" class="form-control" rows="9" data-minlength="50" data-error="Your message is required and must not less than 50 characters" required></textarea>
												<div class="help-block with-errors"></div>
											</div>
										
										</div>
										
										<div class="col-sm-12 text-right text-left-sm">
											<input type="submit" class="btn btn-primary mt-5" value="Send Message">
										</div>
						
						</form>
									</div>
								</div>
							
							</div>
						
					</div>
					
				</div>
				
			</div>
			  <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyBMnj6Gqf0MIGbsrjEoyqOoRMVs4af-FfM&sensor=false"></script>
			<script type="text/javascript">              
              var myLatlng = new google.maps.LatLng({{ $identitas->maps }});
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
@endsection