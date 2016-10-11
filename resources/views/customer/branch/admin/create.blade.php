@extends('layouts.app')

@section('header')
    @include('layouts.header')
@stop

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert" style="margin-top: -2.3rem; border-radius: 0px 0px 0px 0px;">
            <div class="container"><i class="fa fa-check"></i>&nbsp;&nbsp;{{ Session::get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
        </div>
    @endif
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                @include('layouts.admin-sidebar')

                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-plus-circle"></i> ADD CUSTOMER
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <a class="nav-link" href="#" onclick='document.getElementById("createCustomerForm").submit();'><i class="fa fa-check"></i>&nbsp; Create Branches</a>
                            <a class="nav-link"  href="{{ route('admin_customer_index') }}"><i class="fa fa-arrow-left"></i>&nbsp; Back</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form class="form-horizontal" id="createCustomerForm" action="{{ route('post_create_customer') }}" method="POST">
                                        {{ csrf_field() }}

                                        <div class=" form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-lg-pull-1 col-md-5 control-label">Customer Name</label>

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

                                        <div class=" form-group{{ $errors->has('operation_customer_account_no') ? ' has-error' : '' }}">
                                            <label for="postal_code" class="col-lg-pull-1 col-md-5 control-label">Operation Customer Account Number</label>

                                            <div class="col-lg-pull-1 col-md-7">
                                                <input id="operation_customer_account_no" type="text" class="form-control" name="operation_customer_account_no" required>

                                                @if ($errors->has('operation_customer_account_no'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('operation_customer_account_no') }}</strong>
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
