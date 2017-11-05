<div class="modal fade modal-login modal-border-transparent" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<button type="button" class="btn btn-close close" data-dismiss="modal" aria-label="Close">
					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
				</button>
				
				<div class="clear"></div>
				
				<!-- Begin # DIV Form -->
				<div id="modal-login-form-wrapper">
					
					<!-- Begin # Login Form -->
					<form id="login-form" method="POST" action="{{ url('eksternal') }}">
					{{csrf_field()}}
					
						<div class="modal-body pb-5">					
							<h4 class="text-center heading mt-10 mb-20">Sign-in Member</h4>
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
							   Sign-in with Google</a>
							<div class="modal-seperator">
								<span>or</span>
							</div>
							
							<div class="form-group"> 
								<input name="email" class="form-control" placeholder="Email" type="text" required> 
							</div>
							<div class="form-group"> 
								<input name="password" class="form-control" placeholder="password" type="password" required> 
							</div>
			
						<!-- 	<div class="form-group">
								<div class="row gap-5">
									<div class="col-xs-6 col-sm-6 col-md-6">
										<div class="checkbox-block fa-checkbox"> 
											<input id="remember_me_checkbox" name="remember_me_checkbox" class="checkbox" value="First Choice" type="checkbox"> 
											<label class="" for="remember_me_checkbox">remember</label>
										</div>
									</div>
									<!-- <div class="col-xs-6 col-sm-6 col-md-6 text-right"> 
										<button id="login_lost_btn" type="button" class="btn btn-link">forgot pass?</button>
									</div> 
								</div>
							</div> -->
						
						</div>
						
						<div class="modal-footer">
						
							<div class="row gap-10">
								<div class="col-xs-6 col-sm-6 mb-10">
									<button type="submit" class="btn btn-primary btn-block">Sign-in Member</button>
								</div>
								<div class="col-xs-6 col-sm-6 mb-10">
									<button type="submit" class="btn btn-primary btn-block btn-inverse" data-dismiss="modal" aria-label="Close">Cancel</button>
								</div>
							</div>
							<div class="text-left">
								No account? 
								<a href="{{ url('website/loginmember') }}" id="login_register_btn" class="btn btn-link">Register</a>
							</div>
							
						</div>
					</form>
					<!-- End # Login Form -->
								
					<!-- Begin | Lost Password Form -
					<form id="lost-form" style="display:none;">
						<div class="modal-body pb-5">
						
							<h3 class="text-center heading mt-10 mb-20">Forgot password</h3>
							<div class="form-group mb-10"> 
								<input id="lost_email" class="form-control" type="text" placeholder="Enter Your Email">
							</div>
							
							<div class="text-center">
								<button id="lost_login_btn" type="button" class="btn btn-link">Sign-in</button> or 
								<button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
							</div>
							
						</div>
						
						<div class="modal-footer mt-10">
							
							<div class="row gap-10">
								<div class="col-xs-6 col-sm-6">
									<button type="submit" class="btn btn-primary btn-block">Submit</button>
								</div>
								<div class="col-xs-6 col-sm-6">
									<button type="submit" class="btn btn-primary btn-inverse btn-block" data-dismiss="modal" aria-label="Close">Cancel</button>
								</div>
							</div>
							
						</div>
						
					</form>
					<!-- End | Lost Password Form -->
								
					<!-- Begin | Register Form -->
					<form id="register-form" style="display:none;" action="/website/register" method="POST">
					{{csrf_field()}}
						<div class="modal-body pb-5">
						
							<h3 class="text-center heading mt-10 mb-20">Register</h3>
							
							<div class="modal-seperator">
								<span>or</span>
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
							

						</div>
							
						<div class="modal-footer mt-10">
						
							<div class="row gap-10">
								<div class="col-xs-6 col-sm-6 mb-10">
									<button type="submit" class="btn btn-primary btn-block">Register</button>
								</div>
								<div class="col-xs-6 col-sm-6 mb-10">
									<button type="submit" class="btn btn-primary btn-inverse btn-block" data-dismiss="modal" aria-label="Close">Cancel</button>
								</div>
							</div>
							
							<div class="text-left">
									Already have account? <button id="register_login_btn" type="button" class="btn btn-link">Sign-in</button>
							</div>
							
						</div>
							
					</form>
					<!-- End | Register Form -->
								
				</div>
				<!-- End # DIV Form -->
								
			</div>
		</div>
	</div>
	<!-- END # MODAL LOGIN -->
	
	<!-- start Container Wrapper -->
	<div class="container-wrapper">

		<!-- start Header -->
		<header id="header">
	  
			<!-- start Navbar (Header) -->
			<nav class="navbar navbar-primary navbar-fixed-top navbar-sticky-function">

				<div class="navbar-top">
				
					<div class="container">
						
						<div class="flex-row flex-align-middle">
							<div class="flex-shrink flex-columns">
								<a class="navbar-logo" href="index.php">
									<img src="{{ asset('frontend/images/logo-white.png') }}" alt="Logo" />
								</a>
							</div>
							<div class="flex-columns">
								<div class="pull-right">
								
									<div class="navbar-mini">
										<ul class="clearfix">
											 @guest
											<li class="user-action">
												<a data-toggle="modal" href="#loginModal" class="btn">Sign up/in</a>
											</li>
				                        @else
				                        	<li class="dropdown bt-dropdown-click hidden-xs">
												<a id="language-dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
													<i class="ion-social-users hidden-xss"></i> 
				                                    {{ Auth::user()->name }} <span class="caret"></span>
												</a>
												<ul class="dropdown-menu" aria-labelledby="language-dropdown">
													<!-- <li><a href="{{ url('personal/dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li> -->
													<li><a href="{{ url('personal/booking') }}/{{ Auth::user()->id }}/{{ Auth::user()->email }}"><i class="fa fa-archive"></i> Booking</a></li>
													<li><a href="{{ url('personal/profile') }}/{{ Auth::user()->id }}/{{ Auth::user()->email }}"><i class="fa fa-user"></i> Edit Profile</a></li>
												</ul>
											</li>
											<li class="user-action">
												<a href="{{ route('logout') }}" class="btn" 
				                                            onclick="event.preventDefault();
				                                                     document.getElementById('logout-form').submit();">Logout</a>
												<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				                                            {{ csrf_field() }}
				                                        </form>
											</li>
				                        @endguest
										</ul>
									</div>
						
								</div>
							</div>
						</div>

					</div>
					
				</div>
				
				<div class="navbar-bottom hidden-sm hidden-xs">
				
					<div class="container">
					
						<div class="row">
						
							<div class="col-sm-9">
								
								<div id="navbar" class="collapse navbar-collapse navbar-arrow">
									<ul class="nav navbar-nav" id="responsive-menu">
										<li><a href="{{ url('') }}">Home</a></li>
										<li><a href="{{ url('/website/package') }}">Package</a></li>
										<li><a href="{{ url('/website/partnership') }}">Partnership</a></li>
										<li><a href="{{ url('/website/about') }}">About Us</a></li>
										<li><a href="{{ url('/website/events') }}">Event</a></li>
										<li><a href="{{ url('/website/contact') }}">Contact us</a></li>
									</ul>
								</div><!--/.nav-collapse -->
								
							</div>
							
							<div class="col-sm-3">
							
								<div class="navbar-phone"><i class="fa fa-phone"></i> Call us: {{ $identitas->phone }}</div>
							
							</div>

						</div>
						
					</div>
				
				</div>

				<div id="slicknav-mobile"></div>
				
			</nav>
			<!-- end Navbar (Header) -->

		</header>