@extends('dbco.layouts.main')

@section('content')

@if ($message = Session::get('success'))
<div class="col-12 text-center mt-4">
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger">
	<strong>{{__('Ой')}}!</strong> {{__('У нас проблемы')}}.<br><br>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР. ШАПКА -->
<div class="container my-1">
	<div class="row">
		
		@include('dbco.layouts.customertopmenu')
		
	</div>
</div>
<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР. ШАПКА -->

@yield('customercontent')

@endsection