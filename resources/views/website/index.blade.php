@extends('layouts.website')
@section('content')

	<div id="introLoader" class="introLoading"></div>
<!-- start hero-header with windows height -->
			<div class="hero" style="background-image:url('{{ asset('upload/media') }}/{{ $media->image }}');">
			
				<div class="container">
				
					<div class="row">
					
						<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						
							<h1 class="hero-title">{{ $media->name}}</h1>
							<p class="lead">{{ $media->writer }}</p>

						</div>
						
					</div>
					<div class="main-search-wrapper full-width">
					
						<div class="inner">						
								{!! Form::open(['url' => 'website/package/search', 'method' => 'GET', 'id' => 'form-pencarian']) !!}
							<div class="column-item">							
								<div class="form-group">
								{!! Form::select('codecity', $city, (! empty($id) ? $id : null), ['id' => 'codecity', 'class' => 'select2-multi form-control', 
								'required' => 'required', 'data-placeholder' => 'Choose a Location', 'multiple']) !!}
								</div>
							
							</div>
							
							<div class="column-item">							
								<div class="form-group">								
								  {!! Form::select('codeservices', $services2, (! empty($id) ? $id : null), ['id' => 'codeservices', 'class' => 'select2-multi form-control', 'required' => 'required', 'data-placeholder' => 'Choose a Type Services', 'multiple']) !!}
								</div>							
							</div>
							
							<!-- <div class="column-item">							
								<div class="form-group">
								{!! Form:: text('q', (! empty($q)) ? $q : null,['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Company Service Name']) !!}			
								</div>							
							</div> -->
							
							<div class="column-item for-btn">							
								<div class="form-group ">
          							  {!! Form::button('Search', ['class' => 'btn btn-primary btn-block', 'type' => 'submit']) !!}								
								</div>							
							</div>
							</form>
						</div>
						
					</div>
				
				</div>
				
			</div>
			<!-- end hero-header with windows height -->
			
			<div class="post-hero bg-light">
			
				<div class="container">
					
					<div class="row">
					
						<!-- informasicompanies -->
						@foreach($header as $row)
						<div class="col-sm-4">
							<div class="featured-count clearfix">
								<div class="icon"><img src="{{ asset('upload/informasicompanies') }}/{{ $row->icon }}" /></div>
								<div class="content">
									<h6>{{ $row->name }}</h6>
									<span>{{ $row->description }}</span>
								</div>
							</div>
						</div>
						@endforeach
						<!-- end informasicompanies -->
						
					</div>
					
				</div>
				
			</div>

			<section>
			
				<div class="container">
				
					<div class="row">
						
						<div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
							
							<div class="section-title">
							
								<h3>Top Basecamp</h3>
								
							</div>
							
						</div>
					
					</div>
					
					<div class="grid destination-grid-wrapper">

					<!-- top basecamp -->
					@foreach($topbasecamp as $row)
					<div class="grid-item" data-colspan="5" data-rowspan="6">
							<a href="{{ url('/website/partnership') }}/{{ $row->id }}/{{ str_slug($row->name) }}" class="top-destination-image-bg" style="background-image:url('{{ asset('upload/companypartnership') }}/{{ $row->favicon }}');">
								<div class="relative">
									<h4>{{ $row->name }}</h4>
									<span>{{ $row->city->name }} - {{ $row->country->name }}</span>
								</div>
							</a>
						</div>
						@endforeach
					<!-- end top basecamp -->
						
					</div>
					
				</div>
				
			</section>
			
			<section class="bg-light">
			
				<div class="container">
				
					<div class="row">
						
						<div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
							
							<div class="section-title">
							
								<h3>Special Packages</h3>
								<p>Of distrusts immediate enjoyment curiosity do. Marianne numerous saw thoughts the humoured.</p>
								
							</div>
							
						</div>
					
					</div>
					
					<div class="GridLex-gap-30-wrappper package-grid-item-wrapper">
						
						<div class="GridLex-grid-noGutter-equalHeight">
						
						<!-- end specialpackages -->
							@foreach($specialpackages as $row)
							<div class="GridLex-col-4_sm-6_xs-12 mb-30">
								<div class="package-grid-item"> 
									<a href="{{ url('/website/package/detail') }}/{{ $row->id }}/{{ str_slug($row->name) }}">
										<div class="image">
											<img src="{{ asset('upload/companypartnership') }}/{{ $row->companypartnership->favicon }}" alt="Tour Package" />
											<div class="absolute-in-image">
												<div class="duration"><span>{{ $row->companypartnership->name }}  - {{ $row->quota }}</span></div>
											</div>
										</div>
										<div class="content clearfix">
											<h5>{{ $row->name }}</h5>
											<div class="rating-wrapper">
												<div class="raty-wrapper">
													Lokasi : {{ $row->companypartnership->address }} <span> / 7 review</span>
												</div>
											</div>
											<div class="absolute-in-content">
												<span class="btn"><i class="fa fa-heart-o"></i></span>
												<div class="price">Rp {{ number_format($row->price, 2) }}</div>
											</div>
										</div>
									</a>
								</div>
							</div>
						@endforeach
						<!-- end specialpackages -->
						</div>
					
					</div>
					
				</div>
				
			</section>
			
			<section class="overflow-hidden why-us-half-image-wrapper">
			
				<div class="GridLex-grid-noGutter-equalHeight">
						
					<div class="GridLex-col-6_sm-12">
						
						<div class="why-us-half-image-content">
						
							<div class="section-title text-left">
							
								<h3>Why Booking With Us ?</h3>
								<p></p>
								
							</div>
							
						<!-- informasicompanies -->
						@foreach($services as $row)
							<div class="featured-item">
								<h4>{{ $row->name }}</h4>
								<div class="content clearfix">
									<div class="icon">
										<i class="{{ $row->title }}"></i>
									</div>
									<p>{{ $row->description }}</p>
								</div>
							</div>
						@endforeach
						<!-- end informasicompanies -->
							
						</div>
						
					</div>
					
					<div class="GridLex-col-6_sm-12 image-bg">
						<div class="image-bg" style="background-image:url('{{ asset('frontend/images/image-01.jpg') }}');"></div>
					</div>
				
				</div>
				
			</section>
			
			<section class="bg-light">
			
				<div class="container">
				
					<div class="row">
						
						<div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
							
							<div class="section-title">
							
								<h3>Testimonial</h3>
								<p>What our customers say about us</p>
							</div>
							
						</div>
					
					</div>
					
					<div class="testimonial-wrapper">
					
						<div class="row">
							
						<!-- testimonial -->
						@foreach($testimonial as $row)
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="testimonial-item clearfix">
									<div class="image">
										<img src="{{ asset('upload/testimonial') }}/{{ $row->image }}" alt="Man" />
									</div>
									<div class="content">
										<h4>{{ $row->name}}</h4>
										<p>"{{ strip_tags($row->description) }}"</p>
									</div>
								</div>
							</div>
						@endforeach
						<!-- end testimonial -->

						</div>
						
					</div>
					
				</div>
				
			</section>
			
			<div class="newsletter-wrapper">
			
				<div class="container">
				
					<div class="flex-row flex-align-middle flex-gap-30">
						
						<div class="flex-column flex-sm-12">
							<div class="newsletter-text clearfix">
								<div class="icon">
									<i class="pe-7s-mail"></i>
								</div>
								<div class="content">
									<h3>Signup for Newsletter</h3>
									<p>Affronting everything discretion men now own did. Still round match we to. Frankness pronounce daughters remainder extensive has but.</p>
								</div>
							</div>
						</div>
						
						<div class="flex-columns flex-sm-12">
							<div class="newsletter-form">
								<form action="/website/subscriber/tambah" method="POST">
									{{csrf_field()}}
									<div class="input-group">
										<input type="email" required class="form-control" name="email" placeholder="Newsletter..">
										<span class="input-group-btn">
											<input type="submit" class="btn btn-primary" type="button" value="Signup"> <i class="fa fa-long-arrow-right"></i>
										</span>
									</div>
								</form>
							</div>
						</div>
					
					</div>
					
				</div>
				
			</div>
			
			<div class="overflow-hidden">
			
				<div class="instagram-wrapper">
					<div id="instagram" class="instagram"></div>
				</div>
				
			</div>
@endsection