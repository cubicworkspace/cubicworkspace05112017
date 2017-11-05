<ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>

                            <li class="nav-item  ">
                                <a href="{{ url('/home') }}" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                </a>

                            <li class="nav-item {{ Request::segment(1) === 'user' ? 'active' : null }} 
                            {{ Request::segment(1) === 'admin' ? 'active' : null }} 
                            {{ Request::segment(1) === 'categoryadmin' ? 'active' : null }}">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-users"></i>
                                    <span class="title">Administrator</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item ">
                                        <a href="{{ url('/user') }}" class="nav-link ">
                                            <span class="title">User</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/admin') }}" class="nav-link ">
                                            <span class="title">Admin</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/categoryadmin') }}" class="nav-link ">
                                            <span class="title">Category Admin</span>
                                        </a>
                                    </li>
                            </ul>
                            </li>

                            <li class="nav-item {{ Request::segment(1) === 'media' ? 'active' : null }} 
                            {{ Request::segment(1) === 'categorymedia' ? 'active' : null }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-picture"></i>
                                    <span class="title">Media</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{ url('/media') }}" class="nav-link ">
                                            <span class="title">Media</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{ url('/categorymedia') }}" class="nav-link ">
                                            <span class="title">Category Media</span>
                                        </a>
                                    </li>
                                 </ul>
                            </li>

                            <li class="nav-item {{ Request::segment(1) === 'companies/1/edit' ? 'active' : null }} 
                            {{ Request::segment(1) === 'informasicompanies' ? 'active' : null }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-wallet"></i>
                                    <span class="title">Companies</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{ url('/companies/1/edit') }}" class="nav-link ">
                                            <span class="title">Companies</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{ url('/informasicompanies') }}" class="nav-link ">
                                            <span class="title">Informasi Companies</span>
                                        </a>
                                    </li>
                                 </ul>
                            </li>

                            <li class="nav-item {{ Request::segment(1) === 'adminpartnership' ? 'active' : null }} 
                            {{ Request::segment(1) === 'companypartnership' ? 'active' : null }}">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-briefcase"></i>
                                    <span class="title">Partnership</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-ite">
                                        <a href="{{ url('/adminpartnership') }}" class="nav-link ">
                                            <span class="title">Admin Partnership</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{ url('/companypartnership') }}" class="nav-link ">
                                            <span class="title">Company Partnership</span>
                                        </a>
                                    </li>
                                   
                                 </ul>
                            </li>


                            <li class="nav-item">
                                <a href="{{ url('/companyservices') }}" class="nav-link nav-toggle">
                                    <i class="icon-layers"></i>
                                    <span class="title">Company Services</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/mediacompanyservices') }}" class="nav-link nav-toggle">
                                    <i class="icon-camera"></i>
                                    <span class="title">Media Company Services</span>
                                </a>
                            </li> 

                            <li class="nav-item 
                            {{ Request::segment(1) === 'tagservices' ? 'active' : null }}
                            {{ Request::segment(1) === 'services' ? 'active' : null }}
                            {{ Request::segment(1) === 'categoryservices' ? 'active' : null }}">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-settings"></i>
                                    <span class="title">Services</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item ">
                                        <a href="{{ url('/tagservices') }}" class="nav-link ">
                                            <span class="title">Tag Services</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{ url('/services') }}" class="nav-link ">
                                            <span class="title">Services</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{ url('/categoryservices') }}" class="nav-link ">
                                            <span class="title">Category Services</span>
                                        </a>
                                    </li>
                                 </ul>
                            </li>

                            <li class="nav-item 
                            {{ Request::segment(1) === 'billingcompanyservices' ? 'active' : null }}
                            {{ Request::segment(1) === 'historybilling' ? 'active' : null }}
                            {{ Request::segment(1) === 'bookingspace' ? 'active' : null }}
                            {{ Request::segment(1) === 'historybookingspace' ? 'active' : null }}
                            {{ Request::segment(1) === 'bookingtour' ? 'active' : null }}
                            ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-bulb"></i>
                                    <span class="title">Billing & Booking</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-ite">
                                        <a href="{{ url('/billingcompanyservices') }}" class="nav-link ">
                                            <span class="title">Billing Company Services</span>
                                        </a>
                                    </li>
                                   <!--  <li class="nav-item ">
                                        <a href="{{ url('/historybilling') }}" class="nav-link ">
                                            <span class="title">History Billing Company Services</span>
                                        </a>
                                    </li> -->
                                    <li class="nav-item  ">
                                        <a href="{{ url('/bookingspace') }}" class="nav-link ">
                                            <span class="title">Booking Space</span>
                                        </a>
                                    </li>
                                   <!--  <li class="nav-item ">
                                        <a href="{{ url('/historybookingspace') }}" class="nav-link ">
                                            <span class="title">History Booking Space</span>
                                        </a>
                                    </li> -->
                                    <li class="nav-item ">
                                        <a href="{{ url('/bookingtour') }}" class="nav-link ">
                                            <span class="title">Booking Tour</span>
                                        </a>
                                    </li>
                                 </ul>
                            </li>



                            <li class="nav-item  
                            {{ Request::segment(1) === 'paymentmethode' ? 'active' : null }}
                            {{ Request::segment(1) === 'categorypaymentmethode' ? 'active' : null }}
                            ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-docs"></i>
                                    <span class="title">Payment</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{ url('/paymentmethode') }}" class="nav-link ">
                                            <span class="title">Payment Methode</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{ url('/categorypaymentmethode') }}" class="nav-link ">
                                            <span class="title">Category Payment Methode</span>
                                        </a>
                                    </li>
                            </ul>
                            </li>

                            <li class="nav-item  
                            {{ Request::segment(1) === 'country' ? 'active' : null }}
                            {{ Request::segment(1) === 'city' ? 'active' : null }}
                            ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-pointer"></i>
                                    <span class="title">Country & City</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-ite">
                                        <a href="{{ url('/country') }}" class="nav-link ">
                                            <span class="title">Country</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{ url('/city') }}" class="nav-link ">
                                            <span class="title">City</span>
                                        </a>
                                    </li>
                                 </ul>
                            </li>

                             <li class="nav-item
                            {{ Request::segment(1) === 'event' ? 'active' : null }}
                            {{ Request::segment(1) === 'categoryevent' ? 'active' : null }}"">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="glyphicon glyphicon-calendar"></i>
                                    <span class="title">Event</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{ url('/event') }}" class="nav-link ">
                                            <span class="title">Event</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/categoryevent') }}" class="nav-link ">
                                            <span class="title">Category Event</span>
                                        </a>
                                    </li>
                            </ul>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('/team') }}" class="nav-link nav-toggle">
                                    <i class="icon-users"></i>
                                    <span class="title">Team</span>
                                </a>
                            </li>                            
                            <li class="nav-item">
                                <a href="{{ url('/member') }}" class="nav-link nav-toggle">
                                    <i class="glyphicon glyphicon-phone"></i>
                                    <span class="title">Member</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/subscriber') }}" class="nav-link nav-toggle">
                                    <i class="glyphicon glyphicon-thumbs-up"></i>
                                    <span class="title">Subscriber</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/message') }}" class="nav-link nav-toggle">
                                    <i class="glyphicon glyphicon-envelope"></i>
                                    <span class="title">Message</span>
                                </a>
                            </li>

                             <li class="nav-item">
                                <a href="{{ url('/testimonial') }}" class="nav-link nav-toggle">
                                    <i class="glyphicon glyphicon-comment"></i>
                                    <span class="title">Testimonial</span>
                                </a>
                            </li>

                             <li class="nav-item">
                                <a href="{{ url('/sosialmedia') }}" class="nav-link nav-toggle">
                                    <i class="glyphicon glyphicon-phone"></i>
                                    <span class="title">Social Media</span>
                                </a>
                            </li>

</ul>
<!-- END SIDEBAR MENU -->