@extends('layouts.internal')
@section('title','Edit Media')
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
                                    <a href="{{ url('/media') }}">Media</a>
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
						            
						            <form action="/media/{{ $edit->id }}" method="POST" enctype="multipart/form-data">
									{{ csrf_field() }}
									{{ method_field('PUT') }}
									<div class="table-responsive">
						              <table class="table table-hover table-striped table-bordered">
									<tr>
										<td>Code Media</td>
										<td>:</td>
										<td><b>{{ $edit->codemedia }}</b></td>
									</tr>
						            <tr>
										<td>Name</td>
										<td>:</td>
										<td><input type="text" name="name" value="{{ $edit->name }}" class="form-control" ></td>
									</tr>
						            <tr>
										<td>URL</td>
										<td>:</td>
										<td><input type="text" name="url" value="{{ $edit->url }}" class="form-control" ></td>
									</tr>
									<tr>
										<td>Date</td>
										<td>:</td>
										<td><div class="input-group date form_datetime form_datetime bs-datetime">
                                                            <input type="text" name="date" class="form-control" value="{{ $edit->date }}" >
                                                            <span class="input-group-addon">
                                                                <button class="btn default date-set" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                        </div></td>
									</tr>
									<tr>
										<td>Write</td>
										<td>:</td>
										<td><textarea name="writer" class="form-control" >{{ $edit->writer }}</textarea></td>
									</tr>
									@if ($edit->image)
									<tr>
										<td>Image</td>
										<td>:</td>
										<td><img src="{{ asset('upload/media') }}/{{ $edit->image }}" width="80"></td>
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
						                     <input type="radio" name="status" id="Y" value="Y" {{ $y = ($edit->status=='Y')?'checked':''}}> Y
						                    </label> 
						                     <label class="radio-inline"> 
						                     <input type="radio"  name="status" id="N" value="N"  {{ $n = ($edit->status=='N')?'checked':''}}> N
						                   </label></td>
									</tr>
									<tr>
										<td>Category Media</td>
										<td>:</td>
										<td> <select class="form-control" id="id" value="name" name="codecategorymedia">
										<option value="{{ !empty($edit->categorymedia->id) ? $edit->categorymedia->id : '' }}">{{ !empty($edit->categorymedia->name) ? $edit->categorymedia->name : '-- Select Category Media --' }} </option>
	   												 @foreach($categorymedia as $row)
	   								 						<option value="{{ $row->id }}">{{ $row->name }}</option>
	   												 @endforeach
	   								 		</select>
	   								 </td>
									</tr>
									<tr>
										<td colspan="3"><button type="submit" class="btn btn-success">Save Data</button>
									    <input class="btn btn-default" type="reset" name="batal" value="Cancel" onclick="location.href='/media/'"/></td>
									</tr>
									</table>
									</div>
									</form>
                        </div>
                    </div>
                    </div>
                    <!-- END CONTENT BODY -->
@endsection