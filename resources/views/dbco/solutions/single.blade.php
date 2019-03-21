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
				<p class="my-2"><span>Автор: </span> {{ $author_name }}</p>
				<p class="my-2"><span>Версия: </span> {{ $version }}</p>
				<p class="my-2"><span>Дата: </span> {{ date_create($solution->dsolutiondate)->Format('Y-m-d') }}</p>
				<p class="mt-4">
					<form action="{{ route('dbcosolution.toggle', $solution->isolutionid) }}" method="POST">		
						@csrf					
						<button type="submit" class="btn btn-{{ $buttonState[$solution->isolutionid]['state'] }} ml-auto abtn">{{ $buttonState[$solution->isolutionid]['text'] }}</button>	
					</form>
				</p>
			</div>
		</div>
	</div>
	<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР. ОДНО РЕШЕНИЕ, КАРТОЧКА ТОВАРА -->
	
	<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. ОПИСАНИЕ -->
	@if ($solution->csolutionhtml)
	<div class="container-fluid mt-2 py-5" style="background:#f3f3f3">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6">
					<p><h4>Обзор</h4></p>
					{!! $solution->csolutionhtml !!}
				</div>
				
				<div class="col-12 col-md-6">
					<img src="" class="img-fluid" alt="" />
				</div>
			</div>
		</div>
	</div>
	@endif
	<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. ОПИСАНИЕ -->
	
	
	<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. ОПИСАНИЕ -->
	@if ($solution->csolutiontechnicshtml)
	<div class="container-fluid mt-2 py-5" style="background:#f3f3f3">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6">
					<p><h4>Технические характеристики</h4></p>
					{!! $solution->csolutiontechnicshtml !!}
				</div>
				
				<div class="col-12 col-md-6">
					<img src="" class="img-fluid" alt="" />
				</div>
			</div>
		</div>
	</div>
	@endif
	<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. ОПИСАНИЕ -->
	
	
	@if ($dother_solutions->count())	
	<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->
	
	<div class="container-fluid lk_formContainerWithoutMargin pb-5">
		<div class="container">
			<div class="row">
				<div class="col-12">
				<p><h4>Опции</h4></p>
					<table class="table lk_table">
						<tbody>
							<tr style="border-bottom:solid 2px #ff4300">
								<th class="text-left" style="width:80%">Название</th>
								<th class="text-left" style="width:20%">Состояние</th>
								
							</tr>
							@foreach ($dother_solutions as $solution)
							<tr class="ttr">
								<td><a href="{{ route('dbcosolution.single',['id' => $solution->isolutionid]) }}">{{ $solution->csolutionname }}</a></td>
								<td class="status_payWait">
									<form action="{{ route('dbcosolution.toggle', $solution->isolutionid) }}" method="POST">		
										@csrf
										
										<button type="submit" class="btn btn-{{ $buttonState[$solution->isolutionid]['state'] }} ml-auto abtn">{{ $buttonState[$solution->isolutionid]['text'] }}</button>	
									</form>	
								</td>
							</tr>
							@endforeach	
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	@endif
	
	
	<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. ФОРМА -->
	
	
	
	
	
</div>
@endsection