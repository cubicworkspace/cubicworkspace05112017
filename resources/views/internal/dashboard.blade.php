@extends('layouts.internal')
@section('title','Dashboard')
@section('content')
                <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
            <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <span>@yield('title')</span>
                                </li>
                            </ul>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> @yield('title')</h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="note note-info">
                            <p> Hello <strong>{{ Auth::user()->name }} [{{ Auth::user()->status }}]</strong>, Welcome to the administrator page of Cubic Workspace </p>
                        </div>
                        <!-- BEGIN DASHBOARD STATS 1-->
                        <div class="row">
                            



                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 blue" href="{{ url('/companyservices') }}">
                                    <div class="visual">
                                        <i class="icon-layers"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="{{ $count_companyservices }}">{{ $count_companyservices }}</span>
                                        </div>
                                        <div class="desc"> Company Services </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 red" href="{{ url('/companypartnership') }}">
                                    <div class="visual">
                                        <i class="icon-briefcase"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="{{ $count_companypartnership }}">{{ $count_companypartnership }}</span></div>
                                        <div class="desc"> Company Partnership </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 green" href="{{ url('/user') }}">
                                    <div class="visual">
                                        <i class="icon-users"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="{{ $count_users }}">{{ $count_users }}</span>
                                        </div>
                                        <div class="desc"> Users </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 purple" href="{{ url('/message') }}">
                                    <div class="visual">
                                    <i class="glyphicon glyphicon-envelope"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="{{ $count_messages }}"></span>{{ $count_messages }}</div>
                                        <div class="desc"> Messages </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="clearfix"></div>

@endsection