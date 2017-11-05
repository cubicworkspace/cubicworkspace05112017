@extends('layouts.website')
@section('content')
<!-- start Main Wrapper -->
		<div class="main-wrapper">
			<div class="breadcrumb-wrapper bg-light-2">
				<div class="container">
					<ol class="breadcrumb-list booking-step">
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><span>Personal Infromation</span></li>
					</ol>
				</div>
			</div>
			
			<div class="content-wrapper">
			
				<div class="container">
			
					<div class="row">
						<div class="col-sm-4 col-md-3 mt-50-xs">
						@foreach($editmember as $edit)
						@include('personal.personal')
						@endforeach
						</div>
						<div class="col-sm-8 col-md-9">
						<ul class="nav nav-tabs">
						  <!-- <li><a href="{{ url('personal/dashboard') }}">Dashboard</a></li> -->
						  <li><a href="{{ url('personal/booking') }}/{{ Auth::user()->id }}/{{ Auth::user()->email }}"><i class="fa fa-archive"></i> List Booking Information</a></li>
						  <li class="active"><a href="{{ url('personal/profile') }}/{{ Auth::user()->id }}/{{ Auth::user()->email }}"> <i class="fa fa-user"></i> Personal Information</a></li>
						</ul>
						<div class="payment-success">
								</div>
						<div class="section-title text-left">
							<h4>Edit Personal Information</h4>
						</div>

						<form id="register-form" action="/personal/profile/edit/{{ $edit->id }}/{{ $edit->email }}" method="POST" enctype="multipart/form-data">
							{{csrf_field()}}
									<div class="form-group"> 

										<input type="hidden" name="id" class="form-control"  value="{{ $edit->id }}"> 
										<input type="hidden" name="codeuser" class="form-control"  value="{{ Auth::user()->id }}"> 
									</div>
									@if ($edit->image)
									<div class="form-group">
									</div>
									<div class="form-group"> 
										<input type="file" name="image" class="form-control" placeholder="Foto"> 
									</div>
									@else
									<div class="form-group"> 
										<input type="file" name="image"  value="{{ $edit->image }}" class="form-control" >
									</div>
									@endif
									<div class="form-group"> 
										<input name="email" class="form-control" type="email" placeholder="Email" value="{{ Auth::user()->email }}"  readonly=""> 
									</div>
									<div class="form-group"> 
										<input type="text" name="name" class="form-control" placeholder="Name" value="{{ Auth::user()->name }}"> 
									</div>
									<!-- <div class="form-group"> 
										<input name="password" class="form-control" type="password" placeholder="Password">
									</div> -->
									<div class="form-group"> 
										<input type="text" name="institution" class="form-control" placeholder="Institution" value="{{ $edit->institution }}" required=""> 
									</div>
									<div class="form-group"> 
										<div class="input-group date">
											 <input type="text" name="birthday" class="form-control" placeholder="Birthday" value="{{ $edit->birthday }}" required><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										</div>
									</div>
									<div class="form-group"> 
										<input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ $edit->phone }}" required=""> 
									</div>
									<div class="form-group"> 
										<textarea name="address" class="form-control" placeholder="Address" required="">{{ $edit->address }}</textarea>
									</div>
									<div class="form-group"> 
										<textarea name="description" class="form-control" placeholder="Description" required="">{{ $edit->description }}</textarea>
									</div>
									<div class="form-group"> 
										<textarea name="information" class="form-control" placeholder="Information" required="">{{ $edit->information }}</textarea>
									</div>
									<div class="row gap-10">
										<div class="col-xs-12 col-sm-12 mb-10">
											<button type="submit" class="btn btn-primary btn-block">Save Profile</button>
										</div>
									</div>
								</div>
						</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end Main Wrapper -->
@endsection