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
                    @if(Session::has('message'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible" role="alert" style="margin-top: -1.3rem; border-radius: 0px 0px 0px 0px;">
                                <div class="container"><i class="fa fa-check"></i>&nbsp;&nbsp;{{ Session::get('message') }}
                                    <button type="button" class="close" style="margin-right: 4rem;" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span class="glyphicon glyphicon-list-alt"></span>&nbsp;PRICING HISTORY
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{ route('create_project') }}" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add Item</a>
                            <a href="{{ route('create_project') }}" class="btn btn-default"><i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;&nbsp;Proceed to Indented Proposal</a>
                            <a href="{{ route('create_project') }}" class="btn btn-default"><i class="fa fa-money" aria-hidden="true"></i>&nbsp;&nbsp;Proceed to Buy & Sell Proposal</a>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            Spare Parts Description
                                        </div>
                                        <div class="panel-body">
                                            <form class="form-horizontal" id="createProjectForm" action="{{ route('post_project') }}" method="POST">
                                                {{ csrf_field() }}

                                                <div class="form-group{{ $errors->has('item_category') ? ' has-error' : '' }}">
                                                    <label for="item_category" class="col-md-4 control-label">Item Category:</label>

                                                    <div class="col-md-6">
                                                        <select name="item_category" id="item_category" class="form-control" placeholder="Select Item Category">
                                                            <option value="" disabled selected>-- Select Item Category --</option>
                                                            <option value="projects">Project</option>
                                                            <option value="after_markets">AfterMarket</option>
                                                        </select>

                                                        @if ($errors->has('item_category'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('item_category') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                                                    <label for="name" class="col-md-4 control-label">Item Name:</label>

                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" name="item" id="project_dropdown" required autofocus />
                                                        <input type="hidden" name="project_id" id="project_id">

                                                        @if ($errors->has('project_id'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('project_id') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('ccn_number') ? ' has-error' : '' }}">
                                                    <label for="ccn_number" class="col-md-4 control-label">CCN Number:</label>

                                                    <div class="col-md-6">
                                                        <input id="ccn_number" type="text" class="form-control" name="ccn_number" value="{{ old('ccn_number') }}" required autofocus>

                                                        @if ($errors->has('ccn_number'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('ccn_number') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('part_number') ? ' has-error' : '' }}">
                                                    <label for="part_number" class="col-md-4 control-label">Part Number:</label>

                                                    <div class="col-md-6">
                                                        <input id="part_number" type="text" class="form-control" name="part_number" value="{{ old('part_number') }}" required autofocus>

                                                        @if ($errors->has('part_number'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('part_number') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('reference_number') ? ' has-error' : '' }}">
                                                    <label for="reference_number" class="col-md-4 control-label">Reference Number:</label>

                                                    <div class="col-md-6">
                                                        <input id="reference_number" type="text" class="form-control" name="reference_number" value="{{ old('reference_number') }}" required autofocus>

                                                        @if ($errors->has('reference_number'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('reference_number') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('material_number') ? ' has-error' : '' }}">
                                                    <label for="material_number" class="col-md-4 control-label">Material Number:</label>

                                                    <div class="col-md-6">
                                                        <input id="material_number" type="text" class="form-control" name="material_number" value="{{ old('material_number') }}" required autofocus>

                                                        @if ($errors->has('material_number'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('material_number') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('drawing_number') ? ' has-error' : '' }}">
                                                    <label for="drawing_number" class="col-md-4 control-label">Drawing Number:</label>

                                                    <div class="col-md-6">
                                                        <input id="drawing_number" type="text" class="form-control" name="drawing_number" value="{{ old('drawing_number') }}" required autofocus>

                                                        @if ($errors->has('drawing_number'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('drawing_number') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            Pump Details
                                        </div>
                                        <div class="panel-body">
                                            <form class="form-horizontal" id="createProjectForm" action="{{ route('post_project') }}" method="POST">
                                                {{ csrf_field() }}

                                                <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
                                                    <label for="model" class="col-md-4 control-label">Model:</label>

                                                    <div class="col-md-6">
                                                        <input id="model" type="text" class="form-control" name="model" value="{{ old('model') }}" required autofocus>

                                                        @if ($errors->has('model'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('model') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('serial_number') ? ' has-error' : '' }}">
                                                    <label for="serial_number" class="col-md-4 control-label">Serial Number:</label>

                                                    <div class="col-md-6">
                                                        <input id="serial_number" type="text" class="form-control" name="serial_number" value="{{ old('serial_number') }}" required autofocus>

                                                        @if ($errors->has('serial_number'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('serial_number') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('tag_number') ? ' has-error' : '' }}">
                                                    <label for="tag_number" class="col-md-4 control-label">Tag Number:</label>

                                                    <div class="col-md-6">
                                                        <input id="tag_number" type="text" class="form-control" name="tag_number" value="{{ old('tag_number') }}" required autofocus>

                                                        @if ($errors->has('tag_number'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('tag_number') }}</strong>
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

                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            Item History
                                        </div>
                                        <div class="panel-body">
                                            <form class="form-horizontal" id="createProjectForm" action="{{ route('post_project') }}" method="POST">
                                                {{ csrf_field() }}

                                                <div class="form-group{{ $errors->has('purchase_order_number') ? ' has-error' : '' }}">
                                                    <label for="purchase_order_number" class="col-md-4 control-label">P.O Number:</label>

                                                    <div class="col-md-6">
                                                        <input id="purchase_order_number" type="text" class="form-control" name="purchase_order_number" value="{{ old('purchase_order_number') }}" required autofocus>

                                                        @if ($errors->has('purchase_order_number'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('purchase_order_number') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                                                    <label for="year" class="col-md-4 control-label">Year:</label>

                                                    <div class="col-md-6">
                                                        <input id="year" type="text" class="form-control" name="year" value="{{ old('year') }}" required autofocus>

                                                        @if ($errors->has('year'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('year') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                                    <label for="price" class="col-md-4 control-label">Price:</label>

                                                    <div class="col-md-6">
                                                        <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}" required autofocus>

                                                        @if ($errors->has('price'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('price') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('terms') ? ' has-error' : '' }}">
                                                    <label for="terms" class="col-md-4 control-label">Terms:</label>

                                                    <div class="col-md-6">
                                                        <input id="terms" type="text" class="form-control" name="terms" value="{{ old('terms') }}" required autofocus>

                                                        @if ($errors->has('terms'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('terms') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('delivery') ? ' has-error' : '' }}">
                                                    <label for="delivery" class="col-md-4 control-label">Delivery:</label>

                                                    <div class="col-md-6">
                                                        <input id="delivery" type="text" class="form-control" name="delivery" value="{{ old('delivery') }}" required autofocus>

                                                        @if ($errors->has('delivery'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('delivery') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('fpd_reference') ? ' has-error' : '' }}">
                                                    <label for="fpd_reference" class="col-md-4 control-label">FPD Reference:</label>

                                                    <div class="col-md-6">
                                                        <input id="fpd_reference" type="text" class="form-control" name="fpd_reference" value="{{ old('fpd_reference') }}" required autofocus>

                                                        @if ($errors->has('fpd_reference'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('fpd_reference') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('wpc_reference') ? ' has-error' : '' }}">
                                                    <label for="wpc_reference" class="col-md-4 control-label">WPC Reference:</label>

                                                    <div class="col-md-6">
                                                        <input id="wpc_reference" type="text" class="form-control" name="wpc_reference" value="{{ old('wpc_reference') }}" required autofocus>

                                                        @if ($errors->has('wpc_reference'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('wpc_reference') }}</strong>
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
        </div>
    </div>

    <script>
        $('#item_category').change(function () {
            var item_category = "";

            document.getElementById("project_dropdown").value = "";
            document.getElementById("ccn_number").value = "";
            document.getElementById("part_number").value = "";
            document.getElementById("model").value = "";
            document.getElementById("reference_number").value = "";
            document.getElementById("material_number").value = "";
            document.getElementById("drawing_number").value = "";
            document.getElementById("serial_number").value = "";
            document.getElementById("tag_number").value = "";

            $( "select option:selected" ).each(function() {
                item_category += $( this ).val();
            });

            console.log(item_category);

            $('#project_dropdown').autocomplete({
                serviceUrl: "{{ URL::to('/') }}/{{ Auth::user()->role }}/item/" + item_category,
                dataType: 'json',
                type: 'get',
                onSelect: function (suggestions) {
                    document.getElementById("ccn_number").value = suggestions.ccn_number;
                    document.getElementById("part_number").value = suggestions.part_number;
                    document.getElementById("model").value = suggestions.model;
                    document.getElementById("reference_number").value = suggestions.reference_number;
                    document.getElementById("material_number").value = suggestions.material_number;
                    document.getElementById("drawing_number").value = suggestions.drawing_number;
                    document.getElementById("serial_number").value = suggestions.serial_number;
                    document.getElementById("tag_number").value = suggestions.tag_number;
                }
            });
        })
    </script>
@endsection
