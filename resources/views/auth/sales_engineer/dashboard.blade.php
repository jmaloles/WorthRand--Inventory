@extends('layouts.app')

@section('header')
    @include('layouts.header')
@stop

@section('content')
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="row">
                @include('layouts.se-sidebar')
                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                DASHBOARD
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
