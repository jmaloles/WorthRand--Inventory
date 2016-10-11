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
                        <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#assignCustomerToSalesEngineerModal"><i class="fa fa-map-marker"></i>&nbsp; Assign Customer</a></li>
                        <li>
                            <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-cog"></i>&nbsp; {{ $sales_engineer->name }}</a>
                                <ul class="sub">
                                    <li><a href="{{ route('admin_show_sales_engineer', $sales_engineer->id) }}"><i class="fa fa-cog"></i>&nbsp;Profile</a></li>
                                    <li><a href="{{ route('admin_edit_sales_engineer_information', $sales_engineer->id) }}"><i class="fa fa-pencil"></i>&nbsp;Edit</a></li>
                                </ul>
                            </li>
                        </li>

                        <li>
                            <li class="nav-item"><a class="nav-link"  href="#"><i class="fa fa-th-list"></i>&nbsp; Branch</a>
                                <ul class="sub">
                                    <li><a href="{{ route('admin_customer_branch_list', $sales_engineer->id) }}"><i class="fa fa-th-list"></i>&nbsp;Branch List</a></li>
                                    <li class="nav-item"><a class="nav-link"  href="{{ route('admin_create_branch', $sales_engineer->id) }}"><i class="fa fa-plus"></i>&nbsp; Add Branch</a></li>
                                </ul>
                            </li>
                        </li>


                        <li class="nav-item"><a class="nav-link"  href="{{ route('admin_customer_index') }}"><i class="fa fa-arrow-left"></i>&nbsp; back</a></li>
                    </ul>
                </div>

                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 col-lg-offset-2 col-sm-offset-3 main">

                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                {{ strtoupper($sales_engineer->name) }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form class="form-horizontal">

                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">Name:</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ $sales_engineer->name }}" disabled autofocus>

                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-4 control-label">E-Mail Address:</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ $sales_engineer->email }}" disabled autofocus>

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                            <label for="city" class="col-md-4 control-label">City:</label>

                                            <div class="col-md-6">
                                                <input id="city" type="text" class="form-control" name="city" value="{{ $sales_engineer->city }}" disabled autofocus>

                                                @if ($errors->has('city'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('city') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
                                            <label for="postal_code" class="col-md-4 control-label">Part Number:</label>

                                            <div class="col-md-6">
                                                <input id="postal_code" type="text" class="form-control" name="postal_code" value="{{ $sales_engineer->postal_code }}" disabled autofocus>

                                                @if ($errors->has('postal_code'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('postal_code') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="assignCustomerToSalesEngineerModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Assign Customer</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="assignCustomerToUser" method="POST" action="{{ route('admin_save_customer') }}" >
                        {{ csrf_field() }}
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="item" id="customer_dropdown" required autofocus />
                        <input type="hidden" name="customer_id" id="customer_id">
                        <input type="hidden" name="user_id" value="{{ $sales_engineer->id }} ">

                        @if ($errors->has('customer_id'))
                            <span class="help-block">
                                                            <strong>{{ $errors->first('customer_id') }}</strong>
                                                        </span>
                        @endif
                      </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" OnClick='document.getElementById("assignCustomerToUser").submit();'>Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        $('#customer_dropdown').autocomplete({
            serviceUrl: "{{ URL::to('/') }}/{{ Auth::user()->role }}/fetch_customers/",
            dataType: 'json',
            type: 'get',
            onSelect: function (suggestions) {
                document.getElementById('customer_id').value = suggestions.data;
            }
        });
    </script>
@endsection
