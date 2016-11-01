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
                                MY CUSTOMERS
                            </div>
                        </div>
                    </div>

                    @if(count($customers) != 0)
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
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td>{{ ((($customers->currentPage() - 1) * $customers->perPage()) + ($ctr++) + 1) }}</td>
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
                            {{ $customers->render() }}
                        </div>
                    </div>
                    @else
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="alert alert-danger" role="alert" style="background-color: #d9534f; border-color: #b52b27; color: white;">There are no Customers assigned to you yet.</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
