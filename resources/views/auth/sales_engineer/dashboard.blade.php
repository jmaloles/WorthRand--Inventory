@extends('layouts.app')

@section('header')
    @include('layouts.header')
@stop

@section('content')
    <div class="container">
        <div class="col-lg-12">
            <div class="row">
                @include('layouts.user-sidebar')
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DASHBOARD
                        </div>
                    </div>

                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
