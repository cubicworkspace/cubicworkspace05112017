@extends('layouts.internal')
@section('title','Edit Companies')
@section('content')  
 <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="{{ url('/dashboard') }}">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <a href="{{ url('/companies') }}">Companies</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>@yield('title')</span>
                                </li>
                            </ul>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">@yield('title')  </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-md-12">							
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase"> Managed @yield('title')</span>
                                        </div>
                                    </div>
                                    @if (Session::has('success'))
						                    <div class="alert alert-success alert-dismissible" role="alert">
						                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						                    <i class="fa fa-check-circle"></i> {!! session('success') !!}
						                  </div>
						            @elseif (Session::has('warning'))
						                  <div class="alert alert-warning alert-dismissible" role="alert">
						                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						                    <i class="fa fa-warning"></i> {!! session('warning') !!}
						                  </div>
						            @elseif (Session::has('error'))
						                  <div class="alert alert-danger alert-dismissible" role="alert">
						                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						                    <i class="fa fa-times-circle"></i> {!! session('error') !!}
						                  </div>
						            @endif
                                    @if (count($errors)>0)
										<div class="alert alert-danger alert-dismissible">
						                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						                <h4><i class="icon fa fa-ban"></i> Error!</h4>
											@foreach ($errors->all() as $error)
							 				{{$error}}
											@endforeach
											
						              </div>
									@endif
						            <form action="/companies/{{ $edit->id }}" method="POST" enctype="multipart/form-data">
									{{ csrf_field() }}
									{{ method_field('PUT') }}
									{{csrf_field()}}
									<div class="table-responsive">
						              <table class="table table-hover table-striped table-bordered">
						            <tr>
										<td>Name</td>
										<td>:</td>
										<td><input type="text" name="name" value="{{ $edit->name }}" class="form-control" ></td>
									</tr>
									@if ($edit->favicon)
									<tr>
										<td>Favicon</td>
										<td>:</td>
										<td><img src="{{ asset('upload/companies') }}/{{ $edit->favicon }}" width="80"></td>
									</tr>
									<tr>
										<td>Edit Favicon</td>
										<td>:</td>
										<td><input type="file" name="favicon" class="form-control" ></td>
									</tr>
									@else
									<tr>
										<td>Favicon</td>
										<td>:</td>
										<td><input type="file" name="favicon" class="form-control" ></td>
									</tr>
									@endif
									@if ($edit->logo)
									<tr>
										<td>Logo</td>
										<td>:</td>
										<td><img src="{{ asset('upload/companies') }}/{{ $edit->logo }}" width="80"></td>
									</tr>
									<tr>
										<td>Edit Logo</td>
										<td>:</td>
										<td><input type="file" name="logo" class="form-control" ></td>
									</tr>
									@else
									<tr>
										<td>Logo</td>
										<td>:</td>
										<td><input type="file" name="logo" class="form-control" ></td>
									</tr>
									@endif
						            <tr>
										<td>Email</td>
										<td>:</td>
										<td><input type="email" name="email" value="{{ $edit->email }}" class="form-control" ></td>
									</tr>
									<tr>
										<td>Phone</td>
										<td>:</td>
										<td><input type="text" name="phone" value="{{ $edit->phone }}" class="form-control" ></td>
									</tr>
									<tr>
										<td>Fax</td>
										<td>:</td>
										<td><input type="text" name="fax" value="{{ $edit->fax }}" class="form-control" ></td>
									</tr>
									<tr>
										<td>Address</td>
										<td>:</td>
										<td><textarea name="address" class="form-control" >{{ $edit->address }}</textarea></td>
									</tr>
									<tr>
										<td>Maps</td>
										<td>:</td>
										<td><input type="text" name="maps" value="{{ $edit->maps }}" class="form-control" ></td>
									</tr>
									<tr>
										<td>Profile</td>
										<td>:</td>	
										<td><textarea class="ckeditor form-control" name="profile" rows="6" data-error-container="#editor2_error">{{ $edit->profile }}</textarea></td>
									</tr>
									<tr>
										<td>History</td>
										<td>:</td>
										<td><input type="text" name="history" value="{{ $edit->history }}" class="form-control" ></td>
									</tr>
									<tr>
										<td>Description</td>
										<td>:</td>
										<td><textarea class="ckeditor form-control" name="description" rows="6" data-error-container="#editor2_error">{{ $edit->description }}</textarea></td>
									</tr>
									<tr>
										<td>Vision</td>
										<td>:</td>
										<td><textarea name="vision"  class="form-control" >{{ $edit->vision }}</textarea></td>
									</tr>
									<tr>
										<td>Mision</td>
										<td>:</td>
										<td><textarea name="mision"  class="form-control" >{{ $edit->mision }}</textarea></td>
									</tr>
									<tr>
										<td>Faq</td>
										<td>:</td>
										<td><textarea class="ckeditor form-control" name="faq" rows="6" data-error-container="#editor2_error">{{ $edit->faq }}</textarea></td>
									</tr>
									<tr>
										<td>Status</td>
										<td>:</td>
										<td><label class="radio-inline"> 
						                     <input type="radio" name="status" id="Y" value="Y" {{ $y = ($edit->status=='Y')?'checked':''}}> Y
						                    </label> 
						                     <label class="radio-inline"> 
						                     <input type="radio"  name="status" id="N" value="N"  {{ $n = ($edit->status=='N')?'checked':''}}> N
						                   </label></td>
									</tr>
									<tr>
										<td colspan="3"><button type="submit" class="btn btn-success">Save Data</button></td>
									</tr>
									</table>
									</div>
									</form>
                        </div>
                    </div>
                    </div>
                    <!-- END CONTENT BODY -->
@endsection