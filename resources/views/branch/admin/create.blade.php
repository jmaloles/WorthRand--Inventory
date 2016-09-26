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
                                <i class="fa fa-plus-circle"></i> ADD {{ strtoupper($customer->name) }} BRANCH
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-success" href="#" onclick='document.getElementById("createCustomerBranchForm").submit();'><i class="fa fa-check"></i>&nbsp; Create Branch</a>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form class="form-horizontal" id="createCustomerBranchForm" action="{{ route('admin_post_create_branch', $customer->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="customer_id" value="{{ $customer->id }}">

                                        <div class=" form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-lg-pull-1 col-md-5 control-label">Branch Name</label>

                                            <div class="col-lg-pull-1 col-md-7">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class=" form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                            <label for="address" class="col-lg-pull-1 col-md-5 control-label">Address</label>

                                            <div class="col-lg-pull-1 col-md-7">
                                                <textarea id="address" class="form-control" name="address" required></textarea>

                                                @if ($errors->has('address'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class=" form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                            <label for="city" class="col-lg-pull-1 col-md-5 control-label">City</label>

                                            <div class="col-lg-pull-1 col-md-7">
                                                <input id="city" type="text" class="form-control" name="city" required>

                                                @if ($errors->has('city'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('city') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class=" form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
                                            <label for="postal_code" class="col-lg-pull-1 col-md-5 control-label">Postal Code</label>

                                            <div class="col-lg-pull-1 col-md-7">
                                                <input id="postal_code" type="text" class="form-control" name="postal_code" required>

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
