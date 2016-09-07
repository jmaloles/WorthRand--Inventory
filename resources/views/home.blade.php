@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-12">
            <div class="row">
                @include('layouts.sidebar')
                <div class="col-lg-9 col-md-8">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="
                            border-radius: 0px 0px 0px 0px; font-size: 18px;
                            ">DASHBOARD</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
