@extends('dbco.layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Добро пожаловать в волшебный мир DBCO Inc!')}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{__('После подтверждения email вы можете')}} <a href="{{ url('/customer') }}">{{__('изменить свой профайл')}}</a> {{__('или')}} <a href="{{ url('/dbcosolution') }}">{{__('выбрать решения DBCO')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
