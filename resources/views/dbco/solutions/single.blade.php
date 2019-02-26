@extends('dbco.layouts.main')

@section('content')
<div class="col-md-12">
	
	<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР. ОДНО РЕШЕНИЕ, КАРТОЧКА ТОВАРА -->
	<div class="container oneSolution mt-5">
		<div class="row">
			<div class="col-12 col-md-6 col-lg-4">
				<img src="{{ $solution->csolutionpicture }}" class="img-fluid" />
			</div>
			<div class="col-12 col-md-6 col-lg-8">
				<h1>{{ $solution->csolutionname }}</h1>
				<p>{{ $solution->csolutiontext }}</p>
				<p class="my-2"><span>Производитель: </span> {{ $solution->isolutiondeveloper }}</p>
				<p class="my-2"><span>Версия: </span> {{ $solution->isolutionversion }}</p>
				<p class="my-2"><span>Дата: </span> {{ $solution->dsolutiondate }}</p>
				<p class="mt-4">
				<form action="{{ route('dbcosolution.toggle', $solution->isolutionid) }}" method="POST">		
					@csrf					
					<button type="submit" class="btn btn-{{ $buttonState[$solution->isolutionid]['state'] }} ml-auto abtn">{{ $buttonState[$solution->isolutionid]['text'] }}</button>	
				</form>
				</p>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-12">
				<a href="#" class="dopHref">Обзор</a>
				<a href="#" class="dopHref_active ">Технические характеристики</a>
			</div>
		</div>
	</div>
	<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР. ОДНО РЕШЕНИЕ, КАРТОЧКА ТОВАРА -->
	
</div>
@endsection