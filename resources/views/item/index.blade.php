@extends('layouts.app')

@section('header')
    @include('layouts.header')
@stop

@section('content')
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                @include('layouts.admin-sidebar')
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            ITEMS
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <a href="{{ route('admin_create_category') }}" class="btn btn-success"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Add Category</a>
                                <a href="{{ route('admin_create_user') }}" class="btn btn-success"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;Add Project</a>
                                <a href="{{ route('admin_create_user') }}" class="btn btn-success"><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;Add Aftermarket</a>
                                <a href="{{ route('admin_create_user') }}" class="btn btn-success"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;Add Seal</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-12">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
