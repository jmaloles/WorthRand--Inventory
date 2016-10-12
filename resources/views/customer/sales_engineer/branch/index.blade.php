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
                        <li class="nav-item"><a class="nav-link" href="{{ route('show_customer', $customer->id) }}"><i class="fa fa-cog"></i>&nbsp; {{ $customer->name }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('customer_branch_list', $customer->id) }}"><i class="fa fa-th-list"></i>&nbsp; Branches</a></li>


                        <li class="nav-item"><a class="nav-link"  href="{{ route('customer_index') }}"><i class="fa fa-arrow-left"></i>&nbsp; Back</a></li>
                    </ul>
                </div>

                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">

                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Branches
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-reponsive">
                                <table class="table table-striped">
                                    <thead>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Postal Code</th>
                                    <th>Actions</th>
                                    </thead>
                                    <tbody>
                                    @foreach($branches as $customer)
                                        <tr>
                                            <td>{{ ((($branches->currentPage() - 1) * $branches->perPage()) + ($ctr++) + 1) }}</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->address }}</td>
                                            <td>{{ $customer->city }}</td>
                                            <td>{{ $customer->postal_code }}</td>
                                            <td><a href="{{ route('show_customer', $customer->id) }}" class="btn btn-primary btn-sm">View</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $branches->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
