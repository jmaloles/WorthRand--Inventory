@extends('layouts.app')

@section('header')
    @include('layouts.header')
@stop

@section('content')
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="row">
                @include('layouts.admin-sidebar')
                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                DASHBOARD
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div id="chart"></div>
                            {!! $lava->render('PieChart', 'USERS', 'chart') !!}
                        </div>

                        <div class="col-lg-6">
                            <div id="target_sale_div"></div>
                            {!! $target_chart->render('ColumnChart', 'TARGETSALE', 'target_sale_div') !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <th>ID</th>
                                            <th>Purchase Order</th>
                                            <th>To</th>
                                            <th>Sold To</th>
                                            <th>Status</th>
                                            <th class="text-right">Actions</th>
                                        </thead>

                                        <tbody>
                                        @foreach($indented_proposals as $indented_proposal)
                                            <tr class="
                                                @if($indented_proposal->collection_status == "PENDING")
                                                    bg-warning
                                                @elseif($indented_proposal->collection_status == "DECLINED" || $indented_proposal->collection_status == "DELAYED")
                                                    bg-danger
                                                @else
                                                    bg-success
                                                @endif
                                            ">
                                                <td>{{ ((($indented_proposals->currentPage() - 1) * $indented_proposals->perPage()) + ($ctr++) + 1) }}</td>
                                                <td>{{ $indented_proposal->purchase_order }}</td>
                                                <td>{{ $indented_proposal->customer->name }}</td>
                                                <td>{{ $indented_proposal->branch->name }}</td>
                                                <td>{{ $indented_proposal->collection_status }}</td>
                                                <td class="text-right">
                                                    <a href="{{ route('admin_show_pending_proposal', $indented_proposal->id) }}" class="btn btn-sm btn-primary">View Proposal</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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
                                        <th>ID</th>
                                        <th>Purchase Order</th>
                                        <th>To</th>
                                        <th>Sold To</th>
                                        <th>Status</th>
                                        <th class="text-right">Actions</th>
                                        </thead>

                                        <tbody>
                                        @foreach($buy_and_sell_proposals as $buy_and_sell_proposal)
                                            <tr class="
                                               @if($buy_and_sell_proposal->collection_status == "PENDING")
                                                    bg-warning
                                                @elseif($buy_and_sell_proposal->collection_status == "DECLINED" || $buy_and_sell_proposal->collection_status == "DELAYED")
                                                    bg-danger
                                                @else
                                                    bg-success
                                                @endif
                                                    ">
                                                <td>{{ ((($buy_and_sell_proposals->currentPage() - 1) * $buy_and_sell_proposals->perPage()) + ($ctr++) + 1) }}</td>
                                                <td>{{ $buy_and_sell_proposal->purchase_order }}</td>
                                                <td>{{ $buy_and_sell_proposal->customer->name }}</td>
                                                <td>{{ $buy_and_sell_proposal->branch->name }}</td>
                                                <td>{{ $buy_and_sell_proposal->collection_status }}</td>
                                                <td class="text-right">
                                                    <a href="{{ route('admin_show_pending_buy_and_sell_proposal', $buy_and_sell_proposal->id) }}" class="btn btn-sm btn-primary">View Proposal</a>
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
