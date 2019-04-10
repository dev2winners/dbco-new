@extends('dbco.layouts.main')

@section('content')
<div class="content" id="maincontent">
	<div class="title m-b-md text-center">
		<h1>{{ isset($page['content'][0]['title']) ? $page['content'][0]['title'] : 'DBCO inc.' }}</h1>
		{!! isset($page['content'][0]['text']) ? $page['content'][0]['text'] : '' !!}
	</div>
	
	
	
	
	<div class="container-fluid offer4 mt-5">
		<div class="container" style="height:100%">
			<div class="row" style="height:100%">
				
				<div class="col-6 d-none d-lg-block offer4_img_block">
					
				</div>
				
				<div class="col-12 col-lg-6 offer4_right pl-5 pb-4">
					<h3 class="my-4">{{ isset($page['content'][1]['title']) ? $page['content'][1]['title'] : '' }}</h3>
					{!! isset($page['content'][1]['text']) ? $page['content'][1]['text'] : '' !!}
					<a href="{{ route('resources.main') }}" role="button" class="btn btn-secondary but1 px-4">Попробовать прямо сейчас</a>
				</div>
				
			</div>
		</div>
	</div>
	
	<div class="col-12 text-center mt-5 px-4">
		{!! isset($page['content'][2]['title']) ? $page['content'][2]['title'] : '' !!}
		{!! isset($page['content'][2]['text']) ? $page['content'][2]['text'] : '' !!}
	</div>	
	
	<div class="container-fluid offer4 mt-5">
		<div class="container" style="height:100%">
			<div class="row" style="height:100%">
				
				
				
				<div class="col-12 col-lg-6 offer4_right pr-5 pb-4">
					<h3 class="my-4">{{ isset($page['content'][3]['title']) ? $page['content'][3]['title'] : '' }}</h3>
					{!! isset($page['content'][3]['text']) ? $page['content'][3]['text'] : '' !!}
				</div>
				
				<div class="col-6 d-none d-lg-block offer5_img_block">
					
				</div>
				
			</div>
		</div>
	</div>
	
	<div class="col-12 text-center mt-5 px-4">
		{!! isset($page['content'][4]['title']) ? $page['content'][4]['title'] : '' !!}
		{!! isset($page['content'][4]['text']) ? $page['content'][4]['text'] : '' !!}
	</div>
	
	<div class="mt-5 col-12 text-center">
		<h1>Новинки</h1>
	</div>

	<div class="col-12 text-center mt-5 px-4">
		{!! isset($page['content'][5]['title']) ? $page['content'][5]['title'] : '' !!}
		{!! isset($page['content'][5]['text']) ? $page['content'][5]['text'] : '' !!}
	</div>
	
	<div>
		@if (count($solutions) > 0)
		<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->
		<div class="container-fluid topReshen mt-5 mb-5">
			<div class="container" style="height:100%">
				<div class="row">	
					
					@foreach ($solutions->sortByDesc('dsolutiondate') as $solution)
					<!-- КАРТОЧКА -->
					<div class="col-12 col-md-6 col-lg-4 col-xl-3 topReshCol pb-4">
						<div class="card p-3">
							<div class="stars text-right"><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i></div>
							<a href="{{ route('dbcosolution.single', ['id' => $solution->isolutionid]) }}">
								<img src="{{ $solution->csolutionpicture }}" class="img-fluid d-flex m-auto" style="width:108px;" />
								<h2 class="text-center mt-4">{{ $solution->csolutionname }}</h2>
							</a>
							<p class="mt-3 mb-1">{{ $solution->csolutiontext }}</p>
							<p class="my-0"><span>Автор: </span> {{ $authors[$solution->isolutionid] }}</p>
							<p class="my-0"><span>Дата: </span> {{ date_create($solution->dsolutiondate)->Format('Y-m-d') }}</p>
							
							
							
							<div class="circle">
								<div class="custom-control custom-switch">
									<input type="checkbox" solid="{{ $solution->isolutionid }}" class="custom-control-input" id="checkbox-switch-{{ $solution->isolutionid }}"
									name="checkbox-switch-{{ $solution->isolutionid }}"
									{{ ($solution->isOwned) ? 'checked' : '' }}>
									<label class="custom-control-label" for="checkbox-switch-{{ $solution->isolutionid }}"></label>
								</div>
							</div>
						</div>
					</div>
					<!-- /КАРТОЧКА -->
					
					@break(4 == $loop->iteration)
					@endforeach	
					
				</div>
			</div>
		</div>
		<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->	
		
		
		
		@else
		Что-то пошло не так...
		@endif
	</div>
	
	<div class="mt-4" style="text-align:center;">
		<h1>Самые популярные</h1>
	</div>
	
	<div class="col-12 text-center mt-5 px-4">
		{!! isset($page['content'][6]['title']) ? $page['content'][6]['title'] : '' !!}
		{!! isset($page['content'][6]['text']) ? $page['content'][6]['text'] : '' !!}
	</div>
	
	<div>
		@if (count($solutions) > 0)
		<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->
		<div class="container-fluid topReshen mt-5 mb-5">
			<div class="container" style="height:100%">
				<div class="row">	
					
					@foreach ($solutions->sortByDesc('isolutioncount') as $solution)
					<!-- КАРТОЧКА -->
					<div class="col-12 col-md-6 col-lg-4 col-xl-3 topReshCol pb-4">
						<div class="card p-3">
							<div class="stars text-right"><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i></div>
							<a href="{{ route('dbcosolution.single', ['id' => $solution->isolutionid]) }}">
								<img src="{{ $solution->csolutionpicture }}" class="img-fluid d-flex m-auto" style="width:108px;" />
								<h2 class="text-center mt-4">{{ $solution->csolutionname }}</h2>
							</a>
							<p class="mt-3 mb-1">{{ $solution->csolutiontext }}</p>
							<p class="my-0"><span>Автор: </span> {{ $authors[$solution->isolutionid] }}</p>
							<p class="my-0"><span>Дата: </span> {{ date_create($solution->dsolutiondate)->Format('Y-m-d') }}</p>
							
							
							
							<div class="circle">
								<div class="custom-control custom-switch">
									<input type="checkbox" solid="{{ $solution->isolutionid }}" class="custom-control-input" id="checkbox-switch-{{ $solution->isolutionid }}"
									name="checkbox-switch-{{ $solution->isolutionid }}"
									{{ ($solution->isOwned) ? 'checked' : '' }}>
									<label class="custom-control-label" for="checkbox-switch-{{ $solution->isolutionid }}"></label>
								</div>
							</div>
						</div>
					</div>
					<!-- /КАРТОЧКА -->
					
					@break(4 == $loop->iteration)
					@endforeach	
					
				</div>
			</div>
		</div>
		<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->	
		
		
		
		@else
		Что-то пошло не так...
		@endif
	</div>
	
	<div class="col-12 text-center mt-5 px-4">
		{!! isset($page['content'][7]['title']) ? $page['content'][7]['title'] : '' !!}
		{!! isset($page['content'][7]['text']) ? $page['content'][7]['text'] : '' !!}
	</div>
	
	<div class="links">
		<!--<a href="https://yandex.ru/">Yandex</a>-->
	</div>
</div>
@endsection