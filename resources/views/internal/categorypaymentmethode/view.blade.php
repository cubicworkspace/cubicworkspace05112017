@extends('layouts.internal')
@section('title','Category Payment Methode')
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
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="btn-group">
                                                        <a href="{{ url ('categorypaymentmethode/create') }}"  class="btn sbold green">Add New
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                               <!--  <div class="col-md-6">
                                                    <div class="btn-group pull-right">
                                                        <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-right">
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-print"></i> Print </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Code</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($view as $no => $row)
                                                <tr class="odd gradeX">
                                                    <td>{{ ++$no }}</td>
                                                    <td>{{ $row->codecategorypaymentmethode }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->description }}</td>
                                                    <td>{{ $row->status }}</td>
                                                    <td>                      
								                      <form action="/categorypaymentmethode/{{$row->id}}" method="POST">
								                      <a href="/categorypaymentmethode/{{$row->id}}/edit" class="btn btn-warning"><i class="fa fa-pencil" title="Edit"></i></a> 
								                      {{ csrf_field() }}
								                      {{ method_field('DELETE') }}
								                      <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this data?')" title="Delete"><i class="fa fa-trash" ></i></button>
								                      </form>
								                    </td>
                                                </tr>
                                               @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
@endsection