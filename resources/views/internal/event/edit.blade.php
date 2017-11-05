@extends('layouts.internal')
@section('title','Edit Event')
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
                                    <a href="{{ url('/event') }}">Event</a>
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
						            <form action="/event/{{ $edit->id }}" method="POST" enctype="multipart/form-data">
									{{ csrf_field() }}
									{{ method_field('PUT') }}
									<div class="table-responsive">
						              <table class="table table-hover table-striped table-bordered">
									<tr>
										<td>Code Event</td>
										<td>:</td>
										<td><b>{{ $edit->codeevent }}</b></td>
									</tr>
						              <tr>
										<td>Category Event</td>
										<td>:</td>
										<td> <select class="form-control" id="id" value="name" name="codecategoryevent">
										<option value="{{ !empty($edit->categoryevent->id) ? $edit->categoryevent->id : '' }}">{{ !empty($edit->categoryevent->name) ? $edit->categoryevent->name : '-- Select Category Event --' }} </option>
	   												 @foreach($categoryevent as $row)
	   								 						<option value="{{ $row->id }}">{{ $row->name }}</option>
	   												 @endforeach
	   								 		</select>
	   								 </td>
									</tr>
									<tr>
										<td>Title</td>
										<td>:</td>
										<td><input type="title" name="title"  value="{{ $edit->title }}" class="form-control" ></td>
									</tr>
									<tr>
										<td>Url</td>
										<td>:</td>
										<td><input type="text" name="url"  value="{{ $edit->url }}" class="form-control" ></td>
									</tr>
									<tr>
										<td>Description</td>
										<td>:</td>
										<td><textarea name="description" class="form-control" >{{ $edit->description }}</textarea></td>
									</tr>
									<tr>
										<td>Quota</td>
										<td>:</td>
										<td><input type="text" name="quota"  value="{{ $edit->quota }}" class="form-control" ></td>
									</tr>
								@if ($edit->image)
									<tr>
										<td>Image</td>
										<td>:</td>
										<td><img src="{{ asset('upload/event') }}/{{ $edit->image }}" width="80"></td>
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
										<td>Address</td>
										<td>:</td>
										<td><textarea name="address" class="form-control" >{{ $edit->address }}</textarea></td>
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
										<td colspan="3"><button type="submit" class="btn btn-success">Save Data</button>
									    <input class="btn btn-default" type="reset" name="batal" value="Cancel" onclick="location.href='/event/'"/></td>
									</tr>
									</table>
								</div>
									</form>
                        </div>
                    </div>
                    </div>
                    <!-- END CONTENT BODY -->
@endsection