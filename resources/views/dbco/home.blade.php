@extends('dbco.layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Добро пожаловать в волшебный мир DBCO Inc!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    После подтверждения email вы можете <a href="{{ url('/customer') }}">изменить свой профайл</a> или <a href="{{ url('/dbcosolution') }}">выбрать решения DBCO</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
