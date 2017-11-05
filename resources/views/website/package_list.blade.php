@extends('layouts.website')
@section('content')
@include('layouts.flash')
<!-- start end Page title -->
			<div class="page-title" style="background-image:url('{{ asset('frontend/images/hero-header/breadcrumb.jpg') }}');">
				
				<div class="container">
				
					<div class="row">
					
						<div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
						
							<h1 class="hero-title">Package list</h1>
							
							
							
						</div>
						
					</div>

				</div>
				
			</div>
			<!-- end Page title -->
			
			<div class="content-wrapper">
			
				<div class="container">
				
					<div class="row">
						
						<div class="col-sm-4 col-md-3">
							
							<aside class="sidebar with-filter">
				
								<div class="sidebar-search-wrapper bg-light-2">
								
									<div class="sidebar-search-header">
										<h4>Search Again</h4>
									</div>
									
									<div class="sidebar-search-content">

								{!! Form::open(['url' => 'website/package/search', 'method' => 'GET', 'id' => 'form-pencarian']) !!}
										<div class="form-group">
								            {!! Form::select('codecity', $city, (! empty($id) ? $id : null), ['id' => 'codecity', 'class' => 'select2-multi form-control', 'data-placeholder' => 'Choose a Location', 'multiple']) !!}
										</div>
									
										<div class="form-group">
								            {!! Form::select('codeservices', $services, (! empty($id) ? $id : null), ['id' => 'codeservices', 'class' => 'select2-multi form-control', 'data-placeholder' => 'Choose a Type Services', 'multiple']) !!}
											
										</div>
										
										<!-- <div class="form-group">
            								{!! Form:: text('q', (! empty($q)) ? $q : null,['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Company Service Name']) !!}
										</div> -->
          							  {!! Form::button('Search', ['class' => 'btn btn-primary btn-block', 'type' => 'submit']) !!}
									
									</div>
									
								</div>
								
								
								
								<div class="sidebar-inner">
									<div class="clear"></div>
									<div class="sidebar-module">
										<h6 class="sidebar-title">Filter Text Inside Sidebar Inner</h6>
										<div class="sidebar-module-inner">
											<p>Park fat she nor does play deal our. Procured sex material his offering humanity laughing moderate can.</p>
										</div>
									</div>
									<div class="clear"></div>
								</div>
							</aside>
							
							
						</div>
						
						<div class="col-sm-8 col-md-9">
							
							<div class="sorting-wrappper">
			
								<div class="sorting-header">
									<h3 class="sorting-title uppercase">Package list</h3>
									<!-- <p class="sorting-lead">587 results found</p> -->
								</div>
								
								<div class="sorting-content">
								
									<div class="row">
									
										<div class="col-sm-12 col-md-8">
											<div class="sort-by-wrapper">
												<label class="sorting-label">Sort by: </label> 
												<div class="sorting-middle-holder">
													<ul class="sort-by">
														<li class="active up"><a href="#">Name <i class="fa fa-long-arrow-down"></i></a></li><!-- 
														<li><a href="#">Price</a></li>
														<li><a href="#">Location</a></li> -->
													</ul>
												</div>
											</div>
										</div>
										
										
									</div>
								
								</div>

							</div>
							
							<div class="package-list-item-wrapper on-page-result-page">
							
							<!-- companyservices -->
							@if (count($companyservices) > 0)
							@foreach($companyservices as $row)
								<div class="package-list-item clearfix">
									<div class="image">
										<img src="{{ asset('upload/companypartnership') }}/{{ $row->companypartnership->favicon }}" alt="{{ $row->name }}" />
										<div class="absolute-in-image">											
										</div>
									</div>									
									<div class="content">
										<h5>{{ $row->name }} <a href="{{ url('/website/package/detail') }}/{{ $row->id }}/{{ str_slug($row->name) }}" class="btn"><i class="fa fa-heart-o"></i></a></h5>
										<div class="row gap-10">
											<div class="col-sm-12 col-md-8">
												<p class="line18">{{ $row->information }}</p>
												<ul class="list-info">
													<li><span class="icon"><i class="fa fa-map-marker"></i></span> <span class="font600">City: </span> {{ $row->city->name }}</li>
													<li><span class="icon"><i class="fa fa-flag"></i></span> <span class="font600">Status:</span> @if($row->status == 'Y') Available @elseif($row->status == 'N') Not Available @endif</li>													
												</ul>
											</div>
											<div class="col-sm-12 col-md-4 text-right text-left-sm">
												<div class="price">Rp {{ number_format($row->price, 2) }}</div>
												<a href="{{ url('/website/package/detail') }}/{{ $row->id }}/{{ str_slug($row->name) }}" class="btn btn-primary btn-sm">view</a>
											</div>
										</div>
									</div>
								</div>
							@endforeach
							@else
           					 <p><b>No data package list.</b></p>
       						@endif
							<!-- companyservices-->
								
								
							<div class="pager-wrappper clearfix">
			
								<div class="pager-innner">
								
									<div class="flex-row flex-align-middle">
											
										<div class="flex-column flex-sm-12">
											Showing reslut 1 to 10 from {{ $count_companyservices}}
										</div>
										
										<div class="flex-column flex-sm-12">
											<nav class="pager-right">
												<ul class="pagination">
													<li>
               										 {{ $companyservices->links() }}
													</li>
												</ul>
											</nav>
										</div>
									
									</div>
									
								</div>
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			

@endsection