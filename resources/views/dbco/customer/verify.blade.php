@extends('dbco.layouts.customer')

@section('customercontent')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header  text-center"  >
                       {{__('Подтверждение регистрации')}}
                    </div>
                </div>


                    <div class="card-body">
                        @if (Session::has('verify_code'))
                            <div class="alert alert-danger">Неверный код подтверждения</div>
                        @endif
                        <form method="POST" action="{{ route('customer.verify') }}">
                            @csrf
<div class="col-md-12 text-center" style="margin-bottom: 15px"> {{__('Введдите код подтверждения приснанный Вам на почту или телефон')}}</div>
                            <div class="form-group row">

                                <label for="email" class="col-md-4 col-form-label text-md-right">{{__('Код подтверждения')}}</label>

                                <div class="col-md-6">
                                    <input id="verify_code" type="text" class="form-control{{ $errors->has('verify_code') ? ' is-invalid' : '' }}" name="verify_code" value="{{ old('verify_code') }}" required autofocus>

                                    @if ($errors->has('verify_code'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('verify_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>





                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary standardAuthButton">
                                        {{__('Подтвертдить')}}
                                    </button>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. ФОРМА -->

@endsection