@extends('layouts.internal')
@section('title','Edit History Booking Space')
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
                                    <a href="{{ url('/historybookingspace') }}">History Booking Space</a>
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
						            <form action="/historybookingspace/{{ $edit->id }}" method="POST" enctype="multipart/form-data">
									{{ csrf_field() }}
									{{ method_field('PUT') }}
									<div class="table-responsive">
						              <table class="table">
									<tr>
										<td>Code Booking Space</td>
										<td>:</td>
										<td><input type="text" value="{{ $edit->codebookingspace }}" name="codebookingspace"  class="form-control" ></td>
									</tr>
<tr>
										<td>Service</td>
										<td>:</td>
										<td> <select class="form-control" id="id" value="name" name="codeservices">
	   								 				<option value="{{ !empty($edit->services->id) ? $edit->services->id : '' }}">{{ !empty($edit->services->name) ? $edit->services->name : '-- Select Services --' }} </option>
	   												 @foreach($services as $row)
	   								 						<option value="{{ $row->id }}">{{ $row->name }}</option>
	   												 @endforeach
	   								 		</select>
	   								 </td>
									</tr>
									<tr>
										<td>Company Partnership</td>
										<td>:</td>
										<td> <select class="form-control" id="id" value="name" name="codecompanypartnership">
	   								 				<option value="{{ !empty($edit->companypartnership->id) ? $edit->companypartnership->id : '' }}">{{ !empty($edit->companypartnership->name) ? $edit->companypartnership->name : '-- Select Company Partnership --' }} </option>
	   												 @foreach($companypartnership as $row)
	   								 						<option value="{{ $row->id }}">{{ $row->name }}</option>
	   												 @endforeach
	   								 		</select>
	   								 </td>
									</tr>
									<tr>
										<td>Billing Company Service</td>
										<td>:</td>
										<td> <select class="form-control" id="id" value="name" name="codebilling">
	   								 				<option value="{{ !empty($edit->billingcompanyservices->id) ? $edit->billingcompanyservices->id : '' }}">{{ !empty($edit->billingcompanyservices->name) ? $edit->billingcompanyservices->name : '-- Select Billing Company Service --' }} </option>
	   												 @foreach($billingcompanyservices as $row)
	   								 						<option value="{{ $row->id }}">{{ $row->name }}</option>
	   												 @endforeach
	   								 		</select>
	   								 </td>
									</tr>
									<tr>
										<td>User</td>
										<td>:</td>
										<td> <select class="form-control" id="id" value="name" name="codeuser">
	   								 				<option value="{{ !empty($edit->user->id) ? $edit->user->id : '' }}">{{ !empty($edit->user->name) ? $edit->user->name : '-- Select Users --' }} </option>
	   												 @foreach($users as $row)
	   								 						<option value="{{ $row->id }}">{{ $row->name }}</option>
	   												 @endforeach
	   								 		</select>
	   								 </td>
									</tr>
									<tr>
										<td>Invoice</td>
										<td>:</td>
										<td><input type="text" name="invoice"  value="{{ $edit->invoice }}" class="form-control" ></td>
									</tr>
									<tr>
										<td>Name</td>
										<td>:</td>
										<td><input type="text" name="name"  value="{{ $edit->name }}" class="form-control" ></td>
									</tr>
									<tr>
										<td>Email</td>
										<td>:</td>
										<td><input type="email" name="email"  value="{{ $edit->email }}" class="form-control" ></td>
									</tr>
									<tr>
										<td>Phone</td>
										<td>:</td>
										<td><input type="text" name="phone"  value="{{ $edit->phone }}" class="form-control" ></td>
									</tr>
									<tr>
										<td>Address</td>
										<td>:</td>
										<td><input type="text" name="address"  value="{{ $edit->address }}" class="form-control" ></td>
									</tr>
									<tr>
										<td>Quota</td>
										<td>:</td>
										<td><input type="text" name="quota"  value="{{ $edit->quota }}" class="form-control" ></td>
									</tr>
									<tr>
										<td>Quota User</td>
										<td>:</td>
										<td><input type="text" name="quotauser"  value="{{ $edit->quotauser }}" class="form-control" ></td>
									</tr>
									<tr>
										<td>Price</td>
										<td>:</td>
										<td><input type="text" name="price"  value="{{ $edit->price }}" class="form-control" ></td>
									</tr>
									<tr>
										<td>Total Price</td>
										<td>:</td>
										<td><input type="text" name="totalprice"  value="{{ $edit->totalprice }}" class="form-control" ></td>
									</tr>
									<tr>
										<td>Current Quota User</td>
										<td>:</td>
										<td><input type="text" name="currentquotauser"  value="{{ $edit->currentquotauser }}" class="form-control" ></td>
									</tr>
									<tr>
										<td>Now Quota User</td>
										<td>:</td>
										<td><input type="text" name="nowquotauser"  value="{{ $edit->nowquotauser }}" class="form-control" ></td>
									</tr>
									<tr>
										<td>Information</td>
										<td>:</td>
										<td><input type="text" name="information"  value="{{ $edit->information }}" class="form-control" ></td>
									</tr>
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
									    <input class="btn btn-default" type="reset" name="batal" value="Cancel" onclick="location.href='/historybookingspace/'"/></td>
									</tr>
									</table>
								</div>
									</form>
                        </div>
                    </div>
                    </div>
                    <!-- END CONTENT BODY -->
@endsection