@extends('layouts.app')

@section('header')
    @include('layouts.header')
@stop

@section('content')
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                @include('layouts.admin-sidebar')
                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            ITEMS
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                            <div class="btn-group" role="group" aria-label="...">
                                <a href="{{ route('admin_create_group') }}" class="btn btn-default"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Add Group</a>
                                <a href="{{ route('admin_create_user') }}" class="btn btn-default"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;Add Project</a>
                                <a href="{{ route('admin_create_user') }}" class="btn btn-default"><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;Add Aftermarket</a>
                                <a href="{{ route('admin_create_user') }}" class="btn btn-default"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;Add Seal</a>
                        </div>
                    </div>
                    
                    <br><br><br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <th>#</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-right">Actions</th>
                                        </thead>
                                        <tbody>
                                        @foreach($groups as $group)
                                            <tr>
                                                <td>{{ $group->id }}</td>
                                                <td class="text-center">{{ $group->name }}</td>
                                                <td class="text-right">
                                                    <a href="" class="btn btn-sm btn-success">View</a>
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
