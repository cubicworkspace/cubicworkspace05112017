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
								<li><span>Event</span></li>
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
								<!-- events -->
							@if (count($events) > 0)
							@foreach($events as $row)
								<div class="blog-item">
								@if($row->url == '')
									<div class="blog-media">
										<div class="overlay-box">
											<a class="blog-image" href="{{ url('/website/events/detail') }}/{{ $row->id }}/{{ str_slug($row->title) }}">
												<img src="{{ asset('upload/event') }}/{{ $row->image }}" alt="" />
												<div class="image-overlay">
													<div class="overlay-content">
														<div class="overlay-icon"><i class="pe-7s-link"></i></div>
													</div>
												</div>
											</a>
										</div>
									</div>	
								@else
									<div class="blog-media">
										<div class="flex-video vimeo"> 
											<iframe src="{{ $row->url }}" allowfullscreen></iframe> 
										</div>
									</div>
								@endif

									<div class="blog-content">
										<h3><a href="{{ url('/website/events/detail') }}/{{ $row->id }}/{{ str_slug($row->title) }}" class="inverse">{{ $row->title }}</a></h3>
										<ul class="blog-meta clearfix">
											<li>by <a href="#">Admin</a></li>
											<li>{{ date('d F Y', strtotime($row->created_at))}}</li>
											<!-- <li>in <a href="#">Adventure</a>, <a href="#">Backpack</a></li>
											<li>32 comments</li> -->
										</ul>
										<div class="blog-entry">  
											{{ $row->description }}
										</div>
										<a href="{{ url('/website/events/detail') }}/{{ $row->id }}/{{ str_slug($row->title) }}" class="btn-blog">Read More <i class="fa fa-long-arrow-right"></i></a>
									</div>								
								</div>
								@endforeach
								@else
	           					 <p><b>No data events.</b></p>
	       						@endif
								<!-- events-->
								
								
								<div class="clear"></div>
								
								<div class="pager-wrappper mt-0 clearfix">
			
									<div class="pager-innner">
									
										<div class="flex-row flex-align-middle">
												
											<div class="flex-column flex-sm-12">
												Showing reslut 1 to 10 from {{ $count_events }}
											</div>
											
											<div class="flex-column flex-sm-12">
												<nav class="pager-right">
												<ul class="pagination">
													<li>
               										 {{ $events->links() }}
													</li>
												</ul>
												</nav>
											</div>
										
										</div>
										
									</div>
									
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