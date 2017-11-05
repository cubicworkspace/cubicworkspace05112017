<!-- 	<div class="sidebar-module">
										<div class="sidebar-module-inner">
											<div class="sidebar-mini-search">
												<div class="input-group">
													<input type="text" class="form-control" placeholder="Search for...">
													<span class="input-group-btn">
														<button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
													</span>
												</div>
											</div>
										</div>
									</div> -->
									
									<div class="clear"></div>

									<div class="sidebar-module">
										<h4 class="sidebar-title">Category Eevents</h4>
										<div class="sidebar-module-inner">
											<ul class="sidebar-category">
												@if (count($categoryevents) > 0)
												@foreach($categoryevents as $row)
												<li><a href="#">{{ $row->name }}<span>(25)</span></a></li>
												@endforeach
												@else
					           					 <p><b>No data category events.</b></p>
					       						@endif
											</ul>
										</div>
									</div>
									
								
									
									<div class="clear"></div>
									
									<div class="sidebar-module">
										<h4 class="sidebar-title">Popular Posts</h4>
										<div class="sidebar-module-inner">
											
											<ul class="sidebar-post">
												<li class="clearfix">
													<a href="detail_event.php">
														<div class="image">
															<img src="images/blog/01-sm.jpg" alt="Popular Post" />
														</div>
														<div class="content">
															<h6>Appetite welcomed interest the goodness boy</h6>
															<p class="recent-post-sm-meta"><i class="fa fa-comments mr-5"></i>5 comments</p>
														</div>
													</a>
												</li>
												<li class="clearfix">
													<a href="detail_event.php">
														<div class="image">
															<img src="images/blog/02-sm.jpg" alt="Popular Post" />
														</div>
														<div class="content">
															<h6>Wrong for never ready ham these witty him</h6>
															<p class="recent-post-sm-meta"><i class="fa fa-comments mr-5"></i>5 comments</p>
														</div>
													</a>
												</li>
												<li class="clearfix">
													<a href="detail_event.php">
														<div class="image">
															<img src="images/blog/03-sm.jpg" alt="Popular Post" />
														</div>
														<div class="content">
															<h6>Tell size come hard mrs and four fond are</h6>
															<p class="recent-post-sm-meta"><i class="fa fa-comments mr-5"></i>5 comments</p>
														</div>
													</a>
												</li>
												<li class="clearfix">
													<a href="detail_event.php">
														<div class="image">
															<img src="images/blog/04-sm.jpg" alt="Popular Post" />
														</div>
														<div class="content">
															<h6>Side need at in what dear ever upon</h6>
															<p class="recent-post-sm-meta"><i class="fa fa-comments mr-5"></i>5 comments</p>
														</div>
													</a>
												</li>
												<li class="clearfix">
													<a href="detail_event.php">
														<div class="image">
															<img src="images/blog/05-sm.jpg" alt="Popular Post" />
														</div>
														<div class="content">
															<h6>Same down want joy neat ask pain help</h6>
															<p class="recent-post-sm-meta"><i class="fa fa-comments mr-5"></i>5 comments</p>
														</div>
													</a>
												</li>
											</ul>
										
										</div>
									</div>
									
									<!-- <div class="clear"></div>
									
									<div class="sidebar-module">
										<h4 class="sidebar-title">Archives with numbers</h4>
										<div class="sidebar-module-inner">
											<ul class="sidebar-archives">
												<li><a href="#">January 2015<span>(25)</span></a></li>
												<li class="active"><a href="#">February 2015<span>(2)</span></a></li>
												<li><a href="#">March 2015<span>(14)</span></a></li>
												<li><a href="#">April 2015<span>(157)</span></a></li>
												<li><a href="#">June 2015<span>(87)</span></a></li>
											</ul>
										</div>
									</div>
									
									<div class="clear"></div>
									
									<div class="sidebar-module">
										<h4 class="sidebar-title">Tags</h4>
										<div class="sidebar-module-inner">
											<div class="tag-cloud clearfix">
												<a href="#" class="tag-item">HTML5</a> <a href="#" class="tag-item">CSS3</a> <a href="#" class="tag-item">jQuery</a> 
												<a href="#" class="tag-item">Creative</a> <a href="#" class="tag-item">Design</a> <a href="#" class="tag-item">iOS</a> 
												<a href="#" class="tag-item">Android</a> <a href="#" class="tag-item">Video</a> <a href="#" class="tag-item">Markup</a> 
												<a href="#" class="tag-item">Programming</a> <a href="#" class="tag-item">SEO</a>
											</div>
										</div>
									</div> -->
									
									