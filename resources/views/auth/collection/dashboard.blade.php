@extends('layouts.app')

@section('header')
    @include('layouts.header')
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    @include('layouts.collection-sidebar')
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="
                            background-color: white; border-color: white;
                            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
                            border-radius: 0px 0px 0px 0px; font-size: 22px;
                            ">
                                DASHBOARD
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
