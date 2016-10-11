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
                                BRANCHES
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{ route('admin_customer_index') }}" class="bt btn-default"></a>
                        </div>
                    </div>
                    <br>

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
                                    @foreach($branches as $branch)
                                        <tr>
                                            <td>{{ ((($branches->currentPage() - 1) * $branches->perPage()) + ($ctr++) + 1) }}</td>
                                            <td>{{ $branch->name }}</td>
                                            <td>{{ $branch->address }}</td>
                                            <td>{{ $branch->city }}</td>
                                            <td>{{ $branch->postal_code }}</td>
                                            <td><a href="{{ route('admin_show_customer', $branch->id) }}" class="btn btn-primary btn-sm">View</a></td>
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
@endsection
