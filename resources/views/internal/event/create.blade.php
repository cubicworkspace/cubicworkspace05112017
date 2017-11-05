@extends('layouts.internal')
@section('title','Create Event')
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
                                     <div class="alert alert-warning alert-dismissible" role="alert">
						                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						                    <i class="fa fa-warning"></i> Kosongkan URL jika Event berbentuk Gambar!
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
						            <form action="/event/@yield('editForm')" method="POST" enctype="multipart/form-data">
									{{csrf_field()}}
									<div class="table-responsive">
						              <table class="table table-hover table-striped table-bordered">
									<tr>
										<td>Code Event</td>
										<td>:</td>
										<td><input type="text" value="{{ $no }}" name="codeevent"  class="form-control" ></td>
									</tr>
						              <tr>
										<td>Title</td>
										<td>:</td>
										<td><input type="title" name="title"  class="form-control" ></td>
									</tr>
									<tr>
										<td>Category Event</td>
										<td>:</td>
										<td>
	   								 {!! Form::select('codecategoryevent', $categoryevent, null,
	   								  ['class' => 'form-control', 'id' => 'id','value' => 'name',
	   								  	'placeholder' => '-- Select Category Event --'
	   								 ]) !!}
									</td>
									</tr>
									<tr>
										<td>Url</td>
										<td>:</td>
										<td><input type="text" name="url"  class="form-control" ></td>
									</tr>
									<tr>
										<td>Description</td>
										<td>:</td>
										<td><textarea name="description" class="form-control" ></textarea></td>
									</tr>
									<tr>
										<td>Quota</td>
										<td>:</td>
										<td><input type="text" name="quota"  class="form-control" ></td>
									</tr>
									<tr>
										<td>Image</td>
										<td>:</td>
										<td><input type="file" name="image"  class="form-control" ></td>
									</tr>
									<tr>
										<td>Address</td>
										<td>:</td>
										<td><textarea name="address" class="form-control" ></textarea></td>
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