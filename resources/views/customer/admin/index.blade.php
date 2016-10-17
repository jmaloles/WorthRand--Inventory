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

                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                CUSTOMERS
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-success" href="{{ route('admin_customer_create') }}">Add Customer</a>
                        </div>
                    </div>

                    <br>

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
                                            <td><a href="{{ route('admin_show_customer', $customer->id) }}" class="btn btn-primary btn-sm">View</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="alert alert-danger" role="alert" style="background-color: #d9534f; border-color: #b52b27; color: white;">You have 0 records for Customers.</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
