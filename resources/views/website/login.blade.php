@extends('layouts.website')
@section('content')
			<div class="breadcrumb-wrapper bg-light-2">				
				<div class="container">
					<ol class="breadcrumb-list booking-step">
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><span>Login & Register</span></li>
					</ol>
					
				</div>
				
			</div>
			
			<div class="content-wrapper">			
				<div class="container">			
					<div class="row">
						<div class="col-sm-6 col-md-6" role="main">	
							<div class="section-title text-left">
							<!-- Begin # Login Form -->
							<form id="login-form" method="POST" action="{{ url('eksternal') }}">
							{{csrf_field()}}							
								<div class="modal-body pb-5">					
									<h3 class="text-center heading mt-10 mb-20">Sign-in Member</h3>
										@if ($errors->has('email'))
		                                          <div class="alert alert-danger alert-dismissible" role="alert">
		                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                                            <i class="fa fa-times-circle"></i> {{ $errors->first('email') }}
		                                          </div>
		                                    @elseif ($errors->has('password'))
		                                          <div class="alert alert-danger alert-dismissible" role="alert">
		                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                                            <i class="fa fa-times-circle"></i> {{ $errors->first('password') }}
		                                          </div>
		                                    @endif
									<a href="{{ url('/auth/facebook') }}" class="btn btn-facebook btn-block"><span class="fa fa-facebook"></span>  Sign-in with Facebook</a>
									<a href="{{ url('/auth/google') }}" class="btn btn-google btn-block"><span class="fa fa-google-plus"></span>
									   Sign-in with Google</a><br>
									
									<div class="form-group"> 
										<input name="email" class="form-control" placeholder="Email" type="text" required> 
									</div>
									<div class="form-group"> 
										<input name="password" class="form-control" placeholder="password" type="password" required> 
									</div>						
								
									<div class="row gap-10">
										<div class="col-xs-12 col-sm-12 mb-10">
											<button type="submit" class="btn btn-primary btn-block">Submit</button>
										</div>
									</div>
								</div>
							</form>
							</div>
						</div>
						<div class="col-sm-6 col-md-6" role="main">
							<div class="section-title text-left"><br>
							<!-- Begin | Register Form -->
							<form id="register-form" action="/website/register" method="POST" enctype="multipart/form-data">
							{{csrf_field()}}
									<h3 class="text-center heading mt-10 mb-20">Register Member</h3>
									<div class="form-group"> 
										<input type="hidden" name="codeuser" value="{{ $no }}" class="form-control"  required=""> 
									</div>
									<div class="form-group"> 
										<input type="text" name="name" class="form-control" placeholder="Name" required=""> 
									</div>
									<div class="form-group"> 
										<input name="email" class="form-control" type="email" placeholder="Email" required=""> 
									</div>
									<div class="form-group"> 
										<input name="password" class="form-control" type="password" placeholder="Password">
									</div>
									<div class="form-group"> 
										<input type="text" name="institution" class="form-control" placeholder="Institution" required=""> 
									</div>
									<div class="form-group"> 
										<div class="input-group date">
											 <input type="text" name="birthday" class="form-control" placeholder="Birthday" required><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										</div>
									</div>
									<div class="form-group"> 
										<input type="text" name="phone" class="form-control" placeholder="Phone" required=""> 
									</div>
									<div class="form-group"> 
										<textarea name="address" class="form-control" placeholder="Address" required=""></textarea>
									</div>
									<div class="form-group"> 
										<input type="file" name="image" class="form-control" placeholder="Foto" required=""> 
									</div>
									<div class="form-group"> 
										<textarea name="description" class="form-control" placeholder="Description" required=""></textarea>
									</div>
									<div class="form-group"> 
										<textarea name="information" class="form-control" placeholder="Information" required=""></textarea>
									</div>
								</div>
									
								
									<div class="row gap-10">
										<div class="col-xs-12 col-sm-12 mb-10">
											<button type="submit" class="btn btn-primary btn-block">Register</button>
										</div>
									</div>
									
							</form>
							<!-- End | Register Form -->			

								
									
							</div>
									
								
							
						</div>
						
				
				</div>
					
			</div>

			
@endsection