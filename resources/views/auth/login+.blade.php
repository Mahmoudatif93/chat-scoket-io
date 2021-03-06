@extends('layouts.app')

@section('content')
<div class="container"  >
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="height: 400px;">
                <div class="panel-heading" style="text-align: center;font-size: 18px;">تسجيل الدخول</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            

                            <div class="col-md-8" style="float:right;margin-right: 140px;">
                                <input id="email" type="email" style="text-align:center" placeholder="أدخل اسم المستخدم" class="form-control" name="email" value="{{ old('email') }}" required autofocus >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            

                            <div class="col-md-8" style="float:right;margin-right: 140px;">
                                <input id="password" type="password" placeholder="أدخل كلمة السر" style="text-align:center" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" >
                            <div class="col-md-8 col-md-offset-4">
                                <div class="checkbox" style="float: right;
    margin-right: 150px;">
                                    <label>
                                    <span style="padding-right: 30px;
    font-size: large;">ذكرنى</span>  <input type="checkbox" name="remember" style="width: 20px;
    height: 20px;" {{ old('remember') ? 'checked' : '' }}>  
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group"   >
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="width: 150px;
    height: 50px;
    border-radius: 5px;">
                                    تسجيل الدخول
                                </button>
<!--
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                                -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
