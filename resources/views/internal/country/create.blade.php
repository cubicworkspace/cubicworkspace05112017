@extends('layouts.internal')
@section('title','Create Country')
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
                                    <a href="{{ url('/country') }}"> Country </a>
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
                                    @if (count($errors)>0)
										<div class="alert alert-danger alert-dismissible">
						                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						                <h4><i class="icon fa fa-ban"></i> Error!</h4>
											@foreach ($errors->all() as $error)
							 				{{$error}}
											@endforeach
											
						              </div>
									@endif
						            <form action="/country/@yield('editForm')" method="POST" enctype="multipart/form-data">
									{{csrf_field()}}
									<div class="table-responsive">
						            <table class="table table-hover table-striped table-bordered">
									<tr>
										<td>Code Country</td>
										<td>:</td>
										<td><input type="text" name="codecountry" value="{{ $no }}"  class="form-control" ></td>
									</tr>
						            <tr>
										<td>Name</td>
										<td>:</td>
										<td><input type="text" name="name"  class="form-control" ></td>
									</tr>
						            <tr>
										<td>Description</td>
										<td>:</td>
										<td><textarea name="description"  class="form-control"></textarea></td>
									</tr>
									<tr>
										<td>Flag</td>
										<td>:</td>
										<td><input type="file" name="flag"  class="form-control" ></td>
									</tr>
									<tr>
										<td>Status</td>
										<td>:</td>
										<td> <label class="radio-inline"> 
						                     <input type="radio" checked="" name="status" id="Y" class="icheck" value="Y"> Y
						                    </label> 
						                     <label class="radio-inline"> 
						                     <input type="radio"  name="status" id="N" class="icheck" value="N"> N
						                   </label> </td>
									</tr>
									<tr>
									<tr>
										<td colspan="3"><button type="submit" class="btn btn-success">Save Data</button>
									    <input class="btn btn-default" type="reset" name="batal" value="Cancel" onclick="location.href='/country/'"/></td>
									</tr>
									</table>
									</div>
									</form>
                        </div>
                    </div>
                    </div>
                    <!-- END CONTENT BODY -->
@endsection