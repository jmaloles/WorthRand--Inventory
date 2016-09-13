@extends('layouts.app')

@section('header')
    @include('layouts.header')
@stop

@section('content')
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                @include('layouts.admin-sidebar')
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-5">
                                <a href="{{ route('admin_customer_create') }}" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Add Customer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
