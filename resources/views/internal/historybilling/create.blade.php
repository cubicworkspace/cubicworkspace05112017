@extends('layouts.internal')
@section('title','Create History Billing Company Services')
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
                                    <a href="{{ url('/historybilling') }}">History Billing Company Services</a>
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
						            <form action="/historybilling/@yield('editForm')" method="POST" enctype="multipart/form-data">
									{{csrf_field()}}
									<div class="table-responsive">
						              <table class="table">
									<tr>
										<td>Code Billing</td>
										<td>:</td>
										<td><input type="text" name="codebilling"  class="form-control" ></td>
									</tr>
						            <tr>
										<td>Name</td>
										<td>:</td>
										<td><input type="text" name="name"  class="form-control" ></td>
									</tr>
									<tr>
										<td>Quota</td>
										<td>:</td>
										<td><input type="number" name="quota"  class="form-control" ></td>
									</tr>
									<tr>
										<td>Current Quota</td>
										<td>:</td>
										<td><input type="number" name="currentquota"  class="form-control" ></td>
									</tr>
									<tr>
										<td>Used Quota</td>
										<td>:</td>
										<td><input type="number" name="usedquota"  class="form-control" ></td>
									</tr>
									<tr>
										<td>Current Quota User</td>
										<td>:</td>
										<td><input type="number" name="currentquotauser"  class="form-control" ></td>
									</tr>
									<tr>
										<td>Now Quota User</td>
										<td>:</td>
										<td><input type="number" name="nowquotauser"  class="form-control" ></td>
									</tr>
									<tr>
										<td>Price</td>
										<td>:</td>
										<td><input type="number" name="price"  class="form-control" ></td>
									</tr>
									<tr>
										<td>Information</td>
										<td>:</td>
										<td><textarea name="information"  class="form-control" ></textarea></td>
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
										<td>Company Partnership</td>
										<td>:</td>
										<td>
	   								 {!! Form::select('codecompanypartnership', $companypartnership, null,
	   								  ['class' => 'form-control', 'id' => 'id','value' => 'name',
	   								  	'placeholder' => '-- Select Company Partnership --'
	   								 ]) !!}</td>
									</tr>
									<tr>
										<td>Company Service</td>
										<td>:</td>
										<td>
	   								 {!! Form::select('codecompanyservices', $companyservices, null,
	   								  ['class' => 'form-control', 'id' => 'id','value' => 'name',
	   								  	'placeholder' => '-- Select Services --'
	   								 ]) !!}</td>
									</tr>
									<tr>
										<td colspan="3"><button type="submit" class="btn btn-success">Save Data</button>
									    <input class="btn btn-default" type="reset" name="batal" value="Cancel" onclick="location.href='/historybilling/'"/></td>
									</tr>
									</table>
									</div>
									</form>
                        </div>
                    </div>
                    </div>
                    <!-- END CONTENT BODY -->
@endsection