@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="row">
                <div class="sidebar col-lg-2 col-md-3 col-sm-3 col-xs-12 ">
                    <ul id="accordion" class="nav nav-pills nav-stacked sidebar-menu">
                        <li class="nav-item"><a class="nav-link" href="#" onclick='document.getElementById("UpdateSalesEngineerForm").submit();'><i class="fa fa-map-marker"></i>&nbsp; Update</a></li>

                        <li class="nav-item"><a class="nav-link"  href="{{ route('admin_show_sales_engineer', $sales_engineer->id) }}"><i class="fa fa-arrow-left"></i>&nbsp; Back</a></li>
                    </ul>
                </div>

                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">

                    @if(Session::has('message'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible" role="alert" style="margin-top: -1.3rem; margin-bottom: 1rem; border-radius: 0px 0px 0px 0px;">
                                <div class="container"><i class="fa fa-check"></i>&nbsp;&nbsp;{{ Session::get('message') }}
                                    <button type="button" class="close" style="margin-right: 4rem;" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                {{ strtoupper($sales_engineer->name) }}
                            </div>
                        </div>
                    </div>

                    <form class="form-horizontal" action="{{ route('admin_update_sales_engineer', $sales_engineer->id) }}" method="POST" id="UpdateSalesEngineerForm">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ $sales_engineer->id }}">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $sales_engineer->name }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $sales_engineer->email }}" autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('target_sale') ? ' has-error' : '' }}">
                            <label for="target_sale" class="col-md-4 control-label">Set Target Sale:</label>

                            <div class="col-md-6">
                                <input id="target_sale" type="text" class="form-control" name="target_sale" value="{{ count($sales_engineer->target_revenue) == 0 ? '0.00' : $sales_engineer->target_revenue->target_sale }}" autofocus>

                                @if ($errors->has('target_sale'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('target_sale') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@stop