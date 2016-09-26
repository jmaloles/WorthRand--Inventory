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
                            <li class="nav-item"><a class="nav-link"  href="{{ route('admin_show_customer', $customer->id) }}"><i class="fa fa-cog"></i>&nbsp; {{ $customer->name }}</a>
                                <ul class="sub">
                                    <li><a href="{{ route('admin_show_customer', $customer->id) }}"><i class="fa fa-cog"></i>&nbsp;Profile</a></li>
                                    <li><a href="{{ route('admin_edit_customer_information', $customer->id) }}"><i class="fa fa-pencil"></i>&nbsp;Update Information</a></li>
                                </ul>
                            </li>
                        </li>

                        <li>
                            <li class="nav-item"><a class="nav-link"  href="#"><i class="fa fa-code-fork"></i>&nbsp; Branch</a>
                                <ul class="sub">
                                    <li><a href="{{ route('admin_customer_branch_list', $customer->id) }}"><i class="fa fa-th-list"></i>&nbsp;Branch List</a></li>
                                    <li class="nav-item"><a class="nav-link"  href="{{ route('admin_create_branch', $customer->id) }}"><i class="fa fa-plus"></i>&nbsp; Add Branch</a></li>
                                </ul>
                            </li>
                        </li>


                        <li class="nav-item"><a class="nav-link"  href="{{ route('admin_customer_index') }}"><i class="fa fa-arrow-left"></i>&nbsp; back</a></li>
                    </ul>
                </div>

                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ strtoupper($customer->name) }} BRANCH LIST
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>City</th>
                                            <th>Postal Code</th>
                                            <th>Actions</th>
                                        </thead>
                                        <tbody>
                                        @foreach($branches as $branch)
                                            <tr>
                                                <td>{{ ((($branches->currentPage() - 1) * $branches->perPage()) + ($ctr++) + 1) }}</td>
                                                <td>{{ $branch->name }}</td>
                                                <td>{{ $branch->city }}</td>
                                                <td>{{ $branch->postal_code }}</td>
                                                <td>
                                                    <a href="" class="btn btn-sm btn-success">View Branch</a>
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
