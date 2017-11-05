@extends('layouts.internal')
@section('title','Edit Admin')
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
                                    <a href="{{ url('/admin') }}">Admin</a>
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
						                <button type="button" class="close" data-dismiss="alert" aria-hcodeadminden="true">&times;</button>
						                <h4><i class="icon fa fa-ban"></i> Error!</h4>
											@foreach ($errors->all() as $error)
							 				{{$error}}
											@endforeach
											
						              </div>
									@endif
						            <form action="/admin/{{ $edit->id }}" method="POST" enctype="multipart/form-data">
									{{ csrf_field() }}
									{{ method_field('PUT') }}
									<div class="table-responsive">
						              <table class="table table-hover table-striped table-bordered">
									<tr>
										<td>Code Admin</td>
										<td>:</td>
										<td><b>{{ $edit->codeadmin }}</b></td>
									</tr>
						              <tr>
										<td>User</td>
										<td>:</td>
										<td> <select class="form-control" id="id" value="name" name="codeuser">
	   								 				<option value="{{ !empty($edit->user->name) ? $edit->user->name : '' }}">{{ !empty($edit->user->name) ? $edit->user->name : '-- Select Users --' }} </option>
	   												 @foreach($user as $row)
	   								 						<option value="{{ $row->id }}">{{ $row->name }}</option>
	   												 @endforeach
	   								 		</select>
	   								 </td>
									</tr>
									<tr>
										<td>Phone</td>
										<td>:</td>
										<td><input type="text" name="phone"  value="{{ $edit->phone }}" class="form-control" ></td>
									</tr>
								@if ($edit->image)
									<tr>
										<td>Image</td>
										<td>:</td>
										<td><img src="{{ asset('upload/admin') }}/{{ $edit->image }}" width="80"></td>
									</tr>
									<tr>
										<td>Edit Image</td>
										<td>:</td>
										<td><input type="file" name="image"  value="" class="form-control" ></td>
									</tr>
								@else
									<tr>
										<td>Image</td>
										<td>:</td>
										<td><input type="file" name="image"  value="{{ $edit->image }}" class="form-control" ></td>
									</tr>
								@endif
									<tr>
										<td>Status</td>
										<td>:</td>
										<td><label class="radio-inline"> 
						                     <input type="radio" name="status" codeadmin="Y" value="Y" {{ $y = ($edit->status=='Y')?'checked':''}}> Y
						                    </label> 
						                     <label class="radio-inline"> 
						                     <input type="radio"  name="status" codeadmin="N" value="N"  {{ $n = ($edit->status=='N')?'checked':''}}> N
						                   </label></td>
									</tr>
						              <tr>
										<td>Category Admin</td>
										<td>:</td>
										<td> <select class="form-control" id="id"  name="codecategoryadmin">
	   								 				<option value="{{ !empty($edit->categoryadmin->id) ? $edit->categoryadmin->id : '' }}">{{ !empty($edit->categoryadmin->name) ? $edit->categoryadmin->name : '-- Select Category Admin --' }} </option>
	   												 @foreach($categoryadmin as $row)
	   								 						<option value="{{ $row->id }}">{{ $row->name }}</option>
	   												 @endforeach
	   								 		</select>
	   								 </td>
									</tr>
									<tr>
										<td colspan="3"><button type="submit" class="btn btn-success">Save Data</button>
									    <input class="btn btn-default" type="reset" name="batal" value="Cancel" onclick="location.href='/admin/'"/></td>
									</tr>
									</table>
								</div>
									</form>
                        </div>
                    </div>
                    </div>
                    <!-- END CONTENT BODY -->
@endsection