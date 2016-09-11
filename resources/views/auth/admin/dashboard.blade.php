@extends('layouts.app')

@section('header')
    @include('layouts.header')
@stop

@section('content')
    <div class="container">
        <div class="col-lg-12">
            <div class="row">
                @include('layouts.admin-sidebar')
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                DASHBOARD
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div id="chart"></div>
                                {!! $lava->render('PieChart', 'USERS', 'chart') !!}
                            </div>

                            <div class="col-lg-6">
                                <div id="group-chart-div"></div>
                                {!! $group_chart->render('PieChart', 'GROUPS', 'group-chart-div') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
