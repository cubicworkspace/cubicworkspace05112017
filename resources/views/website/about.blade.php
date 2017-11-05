@extends('layouts.website')
@section('content')
			<!-- start end Page title -->
			<div class="page-title" style="background-image:url('{{ asset('frontend/images/hero-header/breadcrumb.jpg') }}');">
				
				<div class="container">
				
					<div class="row">
					
						<div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
						
							<h1 class="hero-title">About Us</h1>
							
							<ol class="breadcrumb-list">
								<li><a href="{{ url('/') }}">Home</a></li>
								<li><span>About Us</span></li>
							</ol>
							
						</div>
						
					</div>

				</div>
				
			</div>
			<!-- end Page title -->
			
			<div class="content-wrapper pt-0 pb-0">
			<div class="section pt-60">
				
					<div class="container">

						<p class="font15 mb-30">{{ strip_tags($identitas->profile) }}</p>
						
						<div class="about-us-grid-block GridLex-gap-20-wrappper">
						
							<div class="GridLex-grid-noGutter-equalHeight gap-20">
									
								<div class="GridLex-col-6_xs-12">
									<div class="about-us-grid-block-item mb-20">
										<h4 class="heading mt-0 text-white">Mission</h4>
										<p>{{ $identitas->mision }}</p>
									</div>
								</div>
								
								<div class="GridLex-col-3_xs-12">
									<div class="image-bg mb-20" style="background-image:url('{{ asset('frontend/images/about-us/about-us-image-bg-01.jpg') }}');"></div>
								</div>
								
								<div class="GridLex-col-3_xs-12">
									<div class="image-bg mb-20" style="background-image:url('{{ asset('frontend/images/about-us/about-us-image-bg-02.jpg') }}');"></div>
								</div>
								
							</div>
						
							<div class="GridLex-grid-noGutter-equalHeight gap-20">
			
								<div class="GridLex-col-3_xs-12">
									<div class="image-bg mb-20" style="background-image:url('{{ asset('frontend/images/about-us/about-us-image-bg-03.jpg') }}');"></div>
								</div>
								
								<div class="GridLex-col-6_xs-12">
									<div class="about-us-grid-block-item mb-20">
										<h4 class="heading mt-0 text-white">Vission</h4>
										<p>{{ $identitas->vision }}</p>
									</div>
								</div>
								
								<div class="GridLex-col-3_xs-12 mb-20">
									<div class="image-bg" style="background-image:url('{{ asset('frontend/images/about-us/about-us-image-bg-04.jpg') }}');"></div>
								</div>
								
							</div>
							
							<div class="GridLex-grid-noGutter-equalHeight gap-20">
			
								<div class="GridLex-col-3_xs-12 mb-20">
									<div class="image-bg" style="background-image:url('{{ asset('frontend/images/about-us/about-us-image-bg-05.jpg') }}');"></div>
								</div>

								<div class="GridLex-col-3_xs-12 mb-20">
									<div class="image-bg" style="background-image:url('{{ asset('frontend/images/about-us/about-us-image-bg-06.jpg') }}');"></div>
								</div>
								
								<div class="GridLex-col-6_xs-12">
									<div class="about-us-grid-block-item mb-20">
										<h4 class="heading mt-0 text-white">Description</h4>
										<p>{{ strip_tags($identitas->description) }}</p>
									</div>
								</div>
								
							</div>
						
						</div>
						
			
						
					</div>
						
				</div>
				
				<div class="bg-light section">
				
					<div class="container">

						<div class="row">
								
							<div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
								
								<div class="section-title">
								
									<h3>Our Team</h3>
									<p>Meet with our people behind the move.</p>
									
								</div>
								
							</div>
						
						</div>
						
						<div class="team-wrapper">
						
							<div class="row">
								@foreach($teams as $row)
								<div class="col-xss-12 col-xs-6 col-sm-3 mv-15">								
									<div class="team-item">										
										<div class="image">
											<img src="{{ asset('upload/team') }}/{{ $row->image }}" alt="Team" class="img-circle" />
										</div>										
										<div class="content">										
											<h5 class="uppercase">{{ $row->name }} </h5>
											<p>{{ $row->job }}</p>
											<p>{{ $row->description }}</p>
											<!-- <ul class="social">
												<li><a href="#"><i class="fa fa-facebook"></i></a></li>
												<li><a href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
												<li><a href="#"><i class="fa fa-instagram"></i></a></li>
											</ul> -->											
										</div>										
									</div>								
								</div>
								@endforeach
							</div>
						
						</div>

					</div>
					
				</div>

				<div class="section partner-wrapper bg-primary">
				
					<div class="container">
					
						<div class="row">
						
							<div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
								
								<div class="section-title">
								
									<h4>Partnerhsip</h4>
									
								</div>
								
							</div>
						
						</div>
						
						<div class="partner-image-item">
						
							@foreach($companypartnership as $row)
							<img src="{{ asset('upload/companypartnership') }}/{{ $row->logo }}" alt="partner"  />
							@endforeach
						</div>
					
					</div>
					
				</div>
				
				
			</div>
			
@endsection