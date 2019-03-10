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
	<strong>Ой!</strong> У нас проблемы.<br><br>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР. ШАПКА -->
<div class="container mt-5">
	<div class="row">
		
		@include('dbco.layouts.customertopmenu')
		
		<div class="col-12 text-center mt-4">
			<p class="text-center"></p>
		</div>
		
	</div>
</div>
<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР. ШАПКА -->

@yield('customercontent')

@endsection