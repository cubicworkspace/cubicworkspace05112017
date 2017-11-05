<footer class="footer">
			
			<div class="container">
			
				<div class="main-footer">
				
					<div class="row">
				
						<div class="col-xs-12 col-sm-5 col-md-3">
						
							<div class="footer-logo">
								<img src="{{ asset('frontend/images/logo-white.png') }}" alt="Logo" />
							</div>
							
							<p class="footer-address">{{ $identitas->address }} - Jawa Barat <br/> <i class="fa fa-phone"></i> {{ $identitas->phone }} <br/> <i class="fa fa-envelope-o"></i> <a href="#">{{ $identitas->email }}</a></p>
							
							<div class="footer-social">
							@foreach($sosialmedia as $row)
										<a href="{{ $row->url }}" data-toggle="tooltip" data-placement="top" title="{{ $row->name }}" target="_blank"><i class="{{ $row->description }}"></i></a>
										@endforeach
							
							</div>
							
							<p class="copy-right">&#169; {{ date('Y') }} {{ $identitas->name }}. All Rights Reserved</p>
							
						</div>
						
						<div class="col-xs-12 col-sm-7 col-md-9">

							<div class="row gap-10">
							
								<div class="col-xs-12 col-sm-4 col-md-3 col-md-offset-3 mt-30-xs">
								
									
									
								</div>
								
								<div class="col-xs-12 col-sm-4 col-md-3 mt-30-xs">

									<h5 class="footer-title">Customer service</h5>
									
									<ul class="footer-menu">
										<li><a href="#">Payment</a></li>
										<li><a href="#">Contact us</a></li>
										<li><a href="#">FAQ</a></li>
										<li><a href="#">Site map</a></li>
									</ul>
									
								</div>
								
								<div class="col-xs-12 col-sm-4 col-md-3 mt-30-xs">

									<h5 class="footer-title">About Workspace</h5>
									
									<ul class="footer-menu">
										<li><a href="#">Who we are</a></li>
										<li><a href="#">Company history</a></li>
										<li><a href="#">Partners</a></li>
										<li><a href="#">Privacy notice</a></li>
									</ul>
									
								</div>
								
							</div>

						</div>
						
					</div>

				</div>
				
			</div>
			
		</footer>