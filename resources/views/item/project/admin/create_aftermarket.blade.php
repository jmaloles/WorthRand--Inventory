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
                        <li class="nav-item"><a class="nav-link"  href="#"><i class="fa fa-cog"></i>&nbsp; {{ $project->name }}</a>
                            <ul class="sub">
                                <li><a href="{{ route('admin_project_show', $project->id) }}"><i class="fa fa-cog"></i>&nbsp;Profile</a></li>
                                <li><a href="{{ route('admin_project_information', $project->id) }}"><i class="fa fa-pencil"></i>&nbsp;Update Information</a></li>
                                <li class="nav-item"><a class="nav-link"  href="{{ route('admin_create_aftermarket_on_project', $project->id) }}"><i class="fa fa-plus"></i>&nbsp; Add AfterMarket</a></li>
                            </ul>
                        </li>
                        </li>

                        <li>
                        <li class="nav-item"><a class="nav-link"  href="#"><i class="fa fa-th-list"></i>&nbsp; Pricing History</a>
                            <ul class="sub">
                                <li><a href="{{ route('admin_project_pricing_history_index', $project->id) }}"><i class="fa fa-th-list"></i>&nbsp;Pricing History List</a></li>
                                <li class="nav-item"><a class="nav-link"  href="{{ route('admin_project_pricing_history_create', $project->id) }}"><i class="fa fa-plus"></i>&nbsp; Add Pricing History</a></li>
                            </ul>
                        </li>
                        </li>


                        <li class="nav-item"><a class="nav-link"  href="{{ route('admin_project_index') }}"><i class="fa fa-arrow-left"></i>&nbsp; back</a></li>
                    </ul>
                </div>

                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                    @if(Session::has('message'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible" role="alert" style="margin-top: -1.3rem; border-radius: 0px 0px 0px 0px;">
                                <div class="container"><i class="fa fa-check"></i>&nbsp;&nbsp;{{ Session::get('message') }}
                                    <button type="button" class="close" style="margin-right: 4rem;" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-plus-circle"></i> ADD AFTER MARKET
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-success" href="#" onclick='document.getElementById("createAfterMarketForm").submit();'><i class="fa fa-check"></i>&nbsp; Create After Market</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form class="form-horizontal" id="createAfterMarketForm" action="{{ route('post_after_market') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="project_id" value="{{ $project->id }}">

                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">Name:</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
                                            <label for="model" class="col-md-4 control-label">Model:</label>

                                            <div class="col-md-6">
                                                <input id="model" type="text" class="form-control" name="model" value="{{ old('model') }}" required autofocus>

                                                @if ($errors->has('model'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('model') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('part_number') ? ' has-error' : '' }}">
                                            <label for="part_number" class="col-md-4 control-label">Part Number:</label>

                                            <div class="col-md-6">
                                                <input id="part_number" type="text" class="form-control" name="part_number" value="{{ old('part_number') }}" required autofocus>

                                                @if ($errors->has('part_number'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('part_number') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('ccn_number') ? ' has-error' : '' }}">
                                            <label for="ccn_number" class="col-md-4 control-label">CCN Number:</label>

                                            <div class="col-md-6">
                                                <input id="ccn_number" type="text" class="form-control" name="ccn_number" value="{{ old('ccn_number') }}" required autofocus>

                                                @if ($errors->has('ccn_number'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('ccn_number') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('reference_number') ? ' has-error' : '' }}">
                                            <label for="reference_number" class="col-md-4 control-label">Reference Number:</label>

                                            <div class="col-md-6">
                                                <input id="reference_number" type="text" class="form-control" name="reference_number" value="{{ old('reference_number') }}" required autofocus>

                                                @if ($errors->has('reference_number'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('reference_number') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('material_number') ? ' has-error' : '' }}">
                                            <label for="material_number" class="col-md-4 control-label">Material Number:</label>

                                            <div class="col-md-6">
                                                <input id="material_number" type="text" class="form-control" name="material_number" value="{{ old('material_number') }}" required autofocus>

                                                @if ($errors->has('material_number'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('material_number') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('serial_number') ? ' has-error' : '' }}">
                                            <label for="serial_number" class="col-md-4 control-label">Serial Number:</label>

                                            <div class="col-md-6">
                                                <input id="serial_number" type="text" class="form-control" name="serial_number" value="{{ old('serial_number') }}" required autofocus>

                                                @if ($errors->has('serial_number'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('serial_number') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('tag_number') ? ' has-error' : '' }}">
                                            <label for="tag_number" class="col-md-4 control-label">Tag Number:</label>

                                            <div class="col-md-6">
                                                <input id="tag_number" type="text" class="form-control" name="tag_number" value="{{ old('tag_number') }}" required autofocus>

                                                @if ($errors->has('tag_number'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('tag_number') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('drawing_number') ? ' has-error' : '' }}">
                                            <label for="drawing_number" class="col-md-4 control-label">Drawing Number:</label>

                                            <div class="col-md-6">
                                                <input id="drawing_number" type="text" class="form-control" name="drawing_number" value="{{ old('drawing_number') }}" required autofocus>

                                                @if ($errors->has('drawing_number'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('drawing_number') }}</strong>
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
