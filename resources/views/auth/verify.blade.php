@extends('dbco.layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Подтвердите ваш E-mail</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    Пожалуйста проверьте свой почтовый ящик (включая папку "Спам")
                    Если вы не получили от нас письмо со ссылкой, <a href="{{ route('verification.resend') }}">нажмите здесь, чтобы повторить запрос</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
