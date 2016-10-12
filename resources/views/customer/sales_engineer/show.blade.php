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
                        <li class="nav-item"><a class="nav-link" href="{{ route('show_customer', $customer->id) }}"><i class="fa fa-cog"></i>&nbsp; {{ $customer->name }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('customer_branch_list', $customer->id) }}"><i class="fa fa-th-list"></i>&nbsp; Branches</a></li>


                        <li class="nav-item"><a class="nav-link"  href="{{ route('customer_index') }}"><i class="fa fa-arrow-left"></i>&nbsp; Back</a></li>
                    </ul>
                </div>

                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">

                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                {{ strtoupper($customer->name) }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form class="form-horizontal">

                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">Name:</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ $customer->name }}" disabled autofocus>

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
                                                <input id="address" type="text" class="form-control" name="address" value="{{ $customer->address }}" disabled autofocus>

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
                                                <input id="city" type="text" class="form-control" name="city" value="{{ $customer->city }}" disabled autofocus>

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
                                                <input id="postal_code" type="text" class="form-control" name="postal_code" value="{{ $customer->postal_code }}" disabled autofocus>

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
