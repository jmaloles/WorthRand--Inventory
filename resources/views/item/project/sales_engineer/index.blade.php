@extends('layouts.app')

@section('header')
    @include('layouts.header')
@stop

@section('content')
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                @include('layouts.se-sidebar')
                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                PROJECT
                            </div>
                        </div>
                    </div>

                    @if(count($projects) != 0)
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>No. of After Markets</th>
                                            <th>Model</th>
                                            <th>Serial Number</th>
                                            <th>Tag Number</th>
                                            <th>Drawing Number</th>
                                            <th>Actions</th>
                                        </thead>
                                        <tbody>
                                        @foreach($projects as $project)
                                            <tr>
                                                <td>{{ $project->id }}</td>
                                                <td>{{ $project->name }}</td>
                                                <td>{{ count($project->after_markets) }}</td>
                                                <td>{{ $project->model }}</td>
                                                <td>{{ $project->serial_number }}</td>
                                                <td>{{ $project->tag_number }}</td>
                                                <td>{{ $project->drawing_number }}</td>
                                                <td>
                                                    <a href="{{ route('se_project_show', $project->id) }}" class="btn btn-sm btn-success">View Project</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="alert alert-danger" role="alert" style="background-color: #d9534f; border-color: #b52b27; color: white;">There are no currently available Projects</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
