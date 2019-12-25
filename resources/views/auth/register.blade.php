@extends('dbco.layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="row"style="
margin-left: 0px;
margin-right: 0px;
" ><div class="card-header col-md-6 text-center"  style="border-right: 1px solid rgba(0,0,0,.125);">
                        <a href="{{ route('login') }}"  >{{__('Вход')}}</a>       </div>

                    <div class="card-header  col-md-6  text-center" style="background: #fff;border-bottom: 0px" >
                       <span>{{__('Регистрация')}}</span>
                    </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf



                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{__('E-Mail')}}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert"  style="display: block">
                                        <strong>{{  $errors->first('email') }}</strong>
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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{__('Подтвердите пароль')}}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                            <div class="form-group row">
                                <label for="recaptcha_response_field" class="col-md-4 col-form-label text-md-right"> </label>

                                <div class="col-md-6">
                                    {!! Recaptcha::render([ 'lang' => 'ru' ]) !!}
                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ __("Подтвердите что вы не робот") }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary standardAuthButton">
                                    {{__('Зарегистрироваться')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
