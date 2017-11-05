@extends('layouts.internal')
@section('title','Detail')
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
                                    <a href="{{ url('/bookingspace') }}">Booking Space</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>@yield('title') <b>Invoice #{{ $detail->invoice }}</b></span>
                                </li>
                            </ul>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">@yield('title') <b>Invoice #{{ $detail->invoice }}</b> </h1>
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
                                   
									<div class="table-responsive">
						             
                                  <div class="col-md-6">						              
                                    <table class="table table-hover table-striped table-bordered">
									<tr>
										<td>Invoice</td>
										<td>:</td>
										<td><b>#{{ $detail->invoice }}</b></td>
									</tr>
						            <tr>
										<td>Service</td>
										<td>:</td>
										<td><b>{{ !empty($detail->services->name) ? $detail->services->name : '-' }}</b></td>								 
	   								</tr>
									<tr>
										<td>Company Partnership</td>
										<td>:</td>
										<td><b>{{ !empty($detail->companypartnership->name) ? $detail->companypartnership->name : '-' }}</b></td>
									</tr>
									<tr>
										<td>Billing Company Service</td>
										<td>:</td>
										<td><b>{{ !empty($detail->billingcompanyservices->name) ? $detail->billingcompanyservices->name : '-' }} </b></td>
									</tr>
									<tr>
										<td>User</td>
										<td>:</td>
										<td><b>{{ !empty($detail->user->name) ? $detail->user->name : '-' }} </b></td>
									</tr>
									<tr>
										<td>Payment Methode</td>
										<td>:</td>
										<td> <b>{{ !empty($detail->paymentmethodes->name) ? $detail->paymentmethodes->name : '-' }}</b> </b>
	   								 </td>
									</tr>
									<tr>
										<td>Name</td>
										<td>:</td>
										<td><b>{{ $detail->name }}</b></td>
									</tr>
									<tr>
										<td>Email</td>
										<td>:</td>
										<td><b>{{ $detail->email }}</b></td>
									</tr>
									<tr>
										<td>Phone</td>
										<td>:</td>
										<td><b>{{ $detail->phone }}</b></td>
									</tr>
									<tr>
										<td>Address</td>
										<td>:</td>
										<td><b>{{ $detail->address }}</b></td>
									</tr>									
									<tr>
										<td>Information</td>
										<td>:</td>
										<td><b>{{ $detail->information }}</b></td>
									</tr>								
								</table>
								</div>
                                <div class="col-md-6">
                                    <table class="table table-hover table-striped table-bordered">
										<input type="hidden" value="{!!
								        $datein     = $detail->datein;
								        $dateout    = $detail->dateout;
								        $selisih    = strtotime($dateout) -  strtotime($datein);
								        $hari       = $selisih/(60*60*24);
								        $total      = ($hari * $detail->price);
								        !!}">
								    <tr>
										<td>Price</td>
										<td>:</td>
										<td><b>Rp.{{ number_format($detail->price, 2) }}</b></td>
									</tr>	
									<tr>
										<td>Date</td>
										<td>:</td>
										<td><b>{{ date('d F Y', strtotime($detail->datein)) }} s/d {{ date('d F Y', strtotime($detail->dateout)) }}</b></td>
									</tr>								
									<tr>
										<td>Status</td>
										<td>:</td>
										<td><b>@if($detail->dateout > $datenow)
														@if($detail->status == 'Y') On @elseif($detail->status == 'N') Off @endif 
														@if($detail->statuspayment == 'N') 
														@if($detail->uploadpayment == '')   @else , <b class="text-warning">Waiting for Verify payment</b>  @endif 
														@else
															, <b class="text-success">Payment has been verified</b> 
														@endif
													@else 
													<span class="label label-sm label-danger">expire</span>
													@endif</td>
									</tr>	
									<tr>
										<td>Result</td>
										<td>:</td>
										<td><b>{{ $hari }} Days  * {{ number_format($detail->price, 2) }}</b></td>
									</tr>
									<tr>
										<td>Total Price</td>
										<td>:</td>
										<td><b>Rp.{{ number_format($detail->totalprice, 2) }}</b></td>
									</tr>									
									<tr>
										<td>Quota</td>
										<td>:</td>
										<td><b>{{ $detail->quota }}</b></td>
									</tr>
									<tr>
										<td>Quota User</td>
										<td>:</td>
										<td><b>{{ $detail->quotauser }}</b></td>
									</tr>

									<tr>
										<td>Current Quota User</td>
										<td>:</td>
										<td><b>{{ $detail->currentquotauser }}</b></td>
									</tr>
									<tr>
										<td>Now Quota User</td>
										<td>:</td>
										<td><b>{{ $detail->nowquotauser }}</b></td>
									</tr>
									<tr>
										<td>Status Payment</td>
										<td>:</td>
										<td>@if($detail->statuspayment == 'Y') 
                                                <span class="label label-sm label-info"> Approved </span>
                                             @else
                                                <span class="label label-sm label-warning"> Pending</span> 
                                            @endif</td>
									</tr>
									<tr>
										<td>Bukti</td>
										<td>:</td>
										<td>@if($detail->uploadpayment == '')
                                                         <img src="{{ asset('upload/noimage.png') }}" width="120px">
                                                       @else
                                                        <a data-toggle="modal" href="#bukti{{$detail->id}}" title="zoom">
                                                        <img src="{{ asset('upload/uploadpayment') }}/{{ $detail->uploadpayment }}" width="120px"></a>
                                                       @endif</td>
									</tr>
									</table>
                                </div>
                                <div class="col-md-12">
									    <input class="btn btn-default" type="reset" name="batal" value="Back" onclick="location.href='/bookingspace/'"/>
                            </div>
									</div>
                        </div>
                    </div>
                    </div>
                    <!-- END CONTENT BODY -->

                    <div class="modal fade" id="bukti{{$detail->id}}" tabindex="-1" role="buki" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                <h4 class="modal-title">Bukti Pembayaran Invoice <b>#{{ $detail->invoice }}</b></h4>
                                                            </div>
                                                            <div class="modal-body"> 
                                                                <center><img src="{{ asset('upload/uploadpayment') }}/{{ $detail->uploadpayment }}" width="320px"></center> </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                                <!-- <button type="button" class="btn green">Save changes</button> -->
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->

@endsection