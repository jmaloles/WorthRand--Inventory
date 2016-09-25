@extends('layouts.app')

@section('header')
    @include('layouts.header')
@stop

@section('content')
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">

                <div class="sidebar col-lg-2 col-md-3 col-sm-3 col-xs-12 ">
                    <ul id="accordion" class="nav nav-pills nav-stacked sidebar-menu">
                        <li>
                            <li class="nav-item"><a class="nav-link"  href="{{ route('admin_show_customer', $customer->id) }}"><i class="fa fa-cog"></i>&nbsp; {{ $customer->name }}</a>
                                <ul class="sub">
                                    <li><a href="{{ route('admin_show_customer', $customer->id) }}"><i class="fa fa-cog"></i>&nbsp;Profile</a></li>
                                    <li><a href="{{ route('admin_edit_customer_information', $customer->id) }}"><i class="fa fa-pencil"></i>&nbsp;Update Information</a></li>
                                </ul>
                            </li>
                        </li>

                        <li>
                            <li class="nav-item"><a class="nav-link"  href="#"><i class="fa fa-th-list"></i>&nbsp; Branch</a>
                                <ul class="sub">
                                    <li><a href="{{ route('admin_customer_branch_list', $customer->id) }}"><i class="fa fa-th-list"></i>&nbsp;Branch List</a></li>
                                    <li class="nav-item"><a class="nav-link"  href="{{ route('admin_create_branch', $customer->id) }}"><i class="fa fa-plus"></i>&nbsp; Add Branch</a></li>
                                </ul>
                            </li>
                        </li>


                        <li class="nav-item"><a class="nav-link"  href="{{ route('admin_customer_index') }}"><i class="fa fa-arrow-left"></i>&nbsp; back</a></li>
                    </ul>
                </div>

                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                    @if(Session::has('message'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible" role="alert" style="margin-top: -0.3rem; border-radius: 0px 0px 0px 0px;">
                                <div class="container"><i class="fa fa-check"></i>&nbsp;&nbsp;{{ Session::get('message') }}
                                    <button type="button" class="close" style="margin-right: 4rem;" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                {{ strtoupper($customer->name) }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <button class="btn btn-success" onclick='document.getElementById("UpdateCustomerInformationForm").submit();'><i class="fa fa-check"></i>&nbsp;&nbsp;Update</button>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form class="form-horizontal" action="{{ route('admin_post_edit_customer_information', $customer->id) }}" method="POST" id="UpdateCustomerInformationForm">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}

                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">Name:</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ $customer->name }}" autofocus>

                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                            <label for="address" class="col-md-4 control-label">Main Company Address:</label>

                                            <div class="col-md-6">
                                                <input id="address" type="text" class="form-control" name="address" value="{{ $customer->address }}" autofocus>

                                                @if ($errors->has('address'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                            <label for="city" class="col-md-4 control-label">City:</label>

                                            <div class="col-md-6">
                                                <input id="city" type="text" class="form-control" name="city" value="{{ $customer->city }}" autofocus>

                                                @if ($errors->has('city'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('city') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
                                            <label for="postal_code" class="col-md-4 control-label">Part Number:</label>

                                            <div class="col-md-6">
                                                <input id="postal_code" type="text" class="form-control" name="postal_code" value="{{ $customer->postal_code }}" autofocus>

                                                @if ($errors->has('postal_code'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('postal_code') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
