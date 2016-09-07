@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5 col-lg-push-3-9">
            <div class="row">
                <br><br>
                <div class="panel panel-default" style="
                box-shadow: 10px 10px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
                ">
                    <div class="panel-heading" style="font-size: 27px;">Login <i class="fa fa-key" aria-hidden="true"></i></div>
                    <div class="panel-body wr-panel-lg">
                        <form role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="form-group-lg form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                                <input id="email" type="email" placeholder="Enter your Username" class="form-control" name="email" value="{{ old('email') }}"
                                style="border-radius: 0px;">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group-lg form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input id="password" type="password" placeholder="Enter your Password" class="form-control" name="password"
                                           style="border-radius: 0px;">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                            </div>

                            <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i> Login
                                    </button>

                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
