@extends('dbco.layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card ">
                <div class="row"style="
margin-left: 0px;
margin-right: 0px;
" ><div class="card-header col-md-6 text-center"  style="border-right: 1px solid rgba(0,0,0,.125);background: #fff;border-bottom: 0px">
                       <span>{{__('Вход')}}</span></div>

                <div class="card-header  col-md-6  text-center"  >
                    <a href="{{ route('register') }}" class="{{ ('register' == Route::currentRouteName()) ? 'active' : '' }}">{{__('Регистрация')}}</a>
                </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{__('E-Mail')}}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{__('Пароль')}}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
								<span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{__('Запомнить меня')}}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary standardAuthButton">
                                    {{__('Войти')}}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" style="font-size:0.9rem;" href="{{ route('password.request') }}">
                                        {{__('Забыли пароль?')}}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
