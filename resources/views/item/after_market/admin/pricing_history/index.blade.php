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
                        <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-cog"></i>&nbsp; {{ $afterMarket->name }}</a>
                            <ul class="sub">
                                <li><a href="{{ route('admin_after_market_show', $afterMarket->id) }}"><i class="fa fa-cog"></i>&nbsp;Profile</a></li>
                                <li><a href="{{ route('admin_after_market_information', $afterMarket->id) }}"><i class="fa fa-pencil"></i>&nbsp;Update Information</a></li>
                                <li class="nav-item"><a class="nav-link"  href="{{ route('admin_after_market_pricing_history_create', $afterMarket->id) }}"><i class="fa fa-plus"></i>&nbsp; Add AfterMarket</a></li>
                            </ul>
                        </li>
                        </li>

                        <li>
                        <li class="nav-item"><a class="nav-link"  href="#"><i class="fa fa-th-list"></i>&nbsp; Pricing History</a>
                            <ul class="sub">
                                <li><a href="{{ route('admin_after_market_pricing_history_index', $afterMarket->id) }}"><i class="fa fa-th-list"></i>&nbsp;Pricing History List</a></li>
                                <li class="nav-item"><a class="nav-link"  href="{{ route('admin_after_market_pricing_history_create', $afterMarket->id) }}"><i class="fa fa-plus"></i>&nbsp; Add Pricing History</a></li>
                            </ul>
                        </li>
                        </li>


                        <li class="nav-item"><a class="nav-link"  href="{{ route('admin_project_index') }}"><i class="fa fa-arrow-left"></i>&nbsp; back</a></li>
                    </ul>
                </div>

                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ strtoupper($afterMarket->name) }} PRICING HISTORY
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <th>#</th>
                                        <th>P.O Number</th>
                                        <th>Year</th>
                                        <th>Price</th>
                                        <th>Terms</th>
                                        <th>Delivery</th>
                                        <th>FPD Reference</th>
                                        <th>WPC Reference</th>
                                        </thead>

                                        <tbody>
                                        @foreach($afterMarket->after_market_pricing_history as $pricing_history)
                                            <tr>
                                                <td></td>
                                                <td>{{ $pricing_history->po_number }}</td>
                                                <td>{{ $pricing_history->pricing_date }}</td>
                                                <td>{{ $pricing_history->price }}</td>
                                                <td>{{ $pricing_history->terms }}</td>
                                                <td>{{ $pricing_history->delivery }}</td>
                                                <td>{{ $pricing_history->fpd_reference }}</td>
                                                <td>{{ $pricing_history->wpc_reference }}</td>
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
