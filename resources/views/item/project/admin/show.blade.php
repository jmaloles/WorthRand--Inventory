@extends('layouts.app')

@section('header')
    @include('layouts.header')
@stop

@section('content')
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <nav class="col-lg-2 col-md-3 col-sm-3 col-xs-12 sidebar" {{--style="background-color: #565656;"--}}>
                    <ul class="nav nav-pills nav-stacked col-lg-12 col-md-12 col-sm-12 col-xs-12" style="font-size: 14px;">
                        <li class="nav-item"><a class="nav-link"  href="{{ route('admin_project_information', $project->id) }}"><i class="fa fa-info-circle"></i>&nbsp; Information</a></li>
                        <li class="nav-item"><a class="nav-link"  href="{{ route('admin_project_pricing_history_index', $project->id) }}"><i class="fa fa-th-list"></i>&nbsp; Pricing History</a></li>
                        <li class="nav-item"><a class="nav-link"  href="{{ route('admin_project_index') }}"><i class="fa fa-arrow-left"></i>&nbsp; back</a></li>
                    </ul>
                </nav>

                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ strtoupper($project->name) }}
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
                                                    <a href="{{ route('admin_after_market_show', $after_market->id) }}" class="btn btn-sm btn-success">View After Market</a>
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
