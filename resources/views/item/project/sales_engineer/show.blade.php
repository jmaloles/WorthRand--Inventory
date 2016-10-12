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
                        <li class="nav-item {{ Request::route()->getName() == 'se_project_show' ? 'active' : ''}}"><a class="nav-link" href="{{ route('se_project_show', $project->id) }}"><i class="fa fa-cog"></i>&nbsp;{{ $project->name }}</a></li>

                        <li class="nav-item {{ Request::route()->getName() == 'se_project_pricing_history_index' ? 'active' : ''}}"><a class="nav-link" href="{{ route('se_project_pricing_history_index', $project->id) }}"><i class="fa fa-th-list"></i>&nbsp; Pricing History</a>


                        <li class="nav-item {{ Request::route()->getName() == 'se_project_index' ? 'active' : ''}}"><a class="nav-link"  href="{{ route('se_project_index') }}"><i class="fa fa-arrow-left"></i>&nbsp; Back</a></li>
                    </ul>
                </div>

                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ strtoupper($project->name) }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form class="form-horizontal">
                                            <input type="hidden" name="project_id" value="{{ $project->id }}">

                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label for="name" class="col-md-4 control-label">Name:</label>

                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control" name="name" value="{{ $project->name }}" disabled autofocus>

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
                                                    <input id="model" type="text" class="form-control" name="model" value="{{ $project->model }}" disabled autofocus>

                                                    @if ($errors->has('model'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('model') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('ccn_number') ? ' has-error' : '' }}">
                                                <label for="ccn_number" class="col-md-4 control-label">CCN Number:</label>

                                                <div class="col-md-6">
                                                    <input id="ccn_number" type="text" class="form-control" name="ccn_number" value="{{ $project->ccn_number }}" disabled autofocus>

                                                    @if ($errors->has('ccn_number'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('ccn_number') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('part_number') ? ' has-error' : '' }}">
                                                <label for="part_number" class="col-md-4 control-label">Part Number:</label>

                                                <div class="col-md-6">
                                                    <input id="part_number" type="text" class="form-control" name="part_number" value="{{ $project->part_number }}" disabled autofocus>

                                                    @if ($errors->has('part_number'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('part_number') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('reference_number') ? ' has-error' : '' }}">
                                                <label for="reference_number" class="col-md-4 control-label">Reference Number:</label>

                                                <div class="col-md-6">
                                                    <input id="reference_number" type="text" class="form-control" name="reference_number" value="{{ $project->reference_number }}" disabled autofocus>

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
                                                    <input id="material_number" type="text" class="form-control" name="material_number" value="{{ $project->material_number }}" disabled autofocus>

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
                                                    <input id="serial_number" type="text" class="form-control" name="serial_number" value="{{ $project->serial_number }}" disabled autofocus>

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
                                                    <input id="tag_number" type="text" class="form-control" name="tag_number" value="{{ $project->tag_number }}" disabled autofocus>

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
                                                    <input id="drawing_number" type="text" class="form-control" name="drawing_number" value="{{ $project->drawing_number }}" disabled autofocus>

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

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Model</th>
                                        <th>Serial Number</th>
                                        <th>Tag Number</th>
                                        <th>Drawing Number</th>
                                        <th>Actions</th>
                                        </thead>
                                        <tbody>
                                        @foreach($project->after_markets as $after_market)
                                            <tr>
                                                <td>{{ $after_market->id }}</td>
                                                <td>{{ $after_market->name }}</td>
                                                <td>{{ $after_market->model }}</td>
                                                <td>{{ $after_market->serial_number }}</td>
                                                <td>{{ $after_market->tag_number }}</td>
                                                <td>{{ $after_market->drawing_number }}</td>
                                                <td>
                                                    <a href="{{ route('se_after_market_show', $after_market->id) }}" class="btn btn-sm btn-success">View After Market</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
