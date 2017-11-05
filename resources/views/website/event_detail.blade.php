@extends('layouts.website')
@section('content')
	<!-- start end Page title -->
			<div class="page-title" style="background-image:url('{{ asset('frontend/images/hero-header/breadcrumb.jpg') }}');">				
				<div class="container">				
					<div class="row">					
						<div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
							<h1 class="hero-title">Event</h1>
							<ol class="breadcrumb-list">
								<li><a href="{{ url('/') }}">Home</a></li>
								<li><a href="{{ url('/website/events') }}">Event</a></li>
								<li><span>{{ $events->title }}</span></li>
							</ol>
						</div>
					</div>
				</div>				
			</div>
			<!-- end Page title -->
			<div class="content-wrapper">
				<div class="container">				
					<div class="row">					
						<div class="col-sm-8 col-md-9">					
							<div class="blog-wrapper">
								<div class="blog-item blog-single">
								@if($events->url == '')
									<div class="blog-media">
										<img src="{{ asset('upload/event') }}/{{ $events->image }}" alt="" />
									</div>	
								@else
									<div class="blog-media">
										<div class="flex-video vimeo"> 
											<iframe src="{{ $events->url }}" allowfullscreen></iframe> 
										</div>
									</div>
								@endif											
									<div class="blog-content">
										<h3>{{ $events->title }}</h3>
										<ul class="blog-meta clearfix">
											<li>by <a href="#">Admin</a></li>
											<li>{{ date('d F Y', strtotime($events->created_at))}}</li>
											<!-- <li>in <a href="#">Adventure</a>, <a href="#">Backpack</a></li>
											<li>32 comments</li> -->
										</ul>
										<div class="blog-entry">  
											<p>{{ $events->description }}</p>
										</div>
									</div>	
									<div class="clear"></div>
									</div>
							</div>
						</div>
						
						<div class="col-sm-4 col-md-3 mt-50-xs">
						
							<aside class="sidebar">
						
								<div class="sidebar-inner no-border for-blog">
								@include('layouts.categoryevent')
								</div>
							
							</aside>
							
						</div>
					
					</div>
					
				</div>
				
			</div>
@endsection