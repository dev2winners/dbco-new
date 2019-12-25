@extends('dbco.layouts.main', ['page' => $page])

@section('content')
	<script>
		var solution_in_load=[];
		@if(count($isInLoad)>0)
		@for($i=0;$i<count($isInLoad);$i++)
		solution_in_load.push({{$isInLoad[$i]}});
		@endfor


		@endif
	</script>
<div class="col-md-12" id="maincontent">
	
	<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР. ОДНО РЕШЕНИЕ, КАРТОЧКА ТОВАРА -->
	<div class="container oneSolution mt-5">
		<div class="row">
			<div class="col-12 col-md-6 col-lg-4">
				<img src="/images/{{ $solution->csolutionpicture }}" class="img-fluid" />
			</div>
			<div class="col-12 col-md-6 col-lg-8">
				<h1>{{ $solution->translate(\App::getLocale())['csolutionname'] }}</h1>
				<p>{{ $solution->translate(\App::getLocale())['csolutiontext'] }}</p>
				<p class="my-2"><span>{{__('Автор')}}: </span> {{ $author_name }}</p>
				<p class="my-2"><span>{{__('Версия')}}: </span> {{ $version }}</p>
				<p class="my-2"><span>{{__('Дата')}}: </span> {{ date_create($solution->dsolutiondate)->Format('Y-m-d') }}</p>
				<p class="my-2"><span>{{__('Установок')}}: </span> {{ $solution->isolutioncount}}</p>

				<div class="  sol_id_{{ $solution->isolutionid }}" id="sol_id_{{ $solution->isolutionid }}">
					@if(in_array( $solution->isolutionid,$isInLoad))
						<div class="spinner-border @if(($solution->iinstallstate==0)&&($solution->iinstallstateext==1))  color_not_blue  @endif
						@if(($solution->iinstallstate==1)&&($solution->iinstallstateext==0))  color_blue  @endif" role="status">
							<span class="sr-only">Loading...</span>
						</div>

					@else<div class="custom-control custom-switch">
						<input type="checkbox" solid="{{ $solution->isolutionid }}" class="custom-control-input" id="checkbox-switch-{{ $solution->isolutionid }}"
							   name="checkbox-switch-{{ $solution->isolutionid }}"
								{{ ($solution->isOwned) ? 'checked' : '' }}>
						<label class="custom-control-label" for="checkbox-switch-{{ $solution->isolutionid }}"></label>
					</div>   @endif

				</div>
				
			</div>
		</div>
	</div>
	<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР. ОДНО РЕШЕНИЕ, КАРТОЧКА ТОВАРА -->
	
	<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. ОПИСАНИЕ -->
	@if ($solution->translate(\App::getLocale())['csolutionhtml'])
	<div class="container-fluid mt-2 py-5" style="background:#f3f3f3">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-12">
					<p><h4>{{__('Обзор')}}</h4></p>
					 {!!  $solution->translate(\App::getLocale())['csolutionhtml']  !!}
				</div>
			</div>
		</div>
	</div>
	@endif
	<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. ОПИСАНИЕ -->
	
	
	<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. ОПИСАНИЕ -->
	@if ($solution->translate(\App::getLocale())['csolutiontechnicshtml'])
	<div class="container-fluid mt-2 py-5" style="background:#f3f3f3">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-12">
					<p><h4>{{__('Технические характеристики')}}</h4></p>
					{!! $solution->translate(\App::getLocale())['csolutiontechnicshtml']		 !!}
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
								<th class="text-left" style="width:80%">{{__('Название')}}</th>
								<th class="text-left" style="width:20%">{{__('Состояние')}}</th>
								
							</tr>
							@foreach ($dother_solutions as $solution)
							<tr class="ttr">
								<td><a href="{{ route('dbcosolution.single',['id' => $solution->isolutionid]) }}">{{  $solution->translate(\App::getLocale())['csolutionname']}}</a></td>
								<td class="status_payWait">
									asa<div class="circle sol_id_{{ $solution->isolutionid }}" id="sol_id_{{ $solution->isolutionid }}">
										@if(in_array( $solution->isolutionid,$isInLoad))
											<div class="spinner-border" role="status">
												<span class="sr-only">Loading...</span>
											</div>

										@else<div class="custom-control custom-switch">
											<input type="checkbox" solid="{{ $solution->isolutionid }}" class="custom-control-input" id="checkbox-switch-{{ $solution->isolutionid }}"
												   name="checkbox-switch-{{ $solution->isolutionid }}"
													{{ ($solution->isOwned) ? 'checked' : '' }}>
											<label class="custom-control-label" for="checkbox-switch-{{ $solution->isolutionid }}"></label>
										</div>   @endif

									</div>
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