@extends('dbco.layouts.main')

@section('content')
<div class="content" id="maincontent">
	<div class="title m-b-md text-center">
		<h1>{{ isset($page['content'][0]['title']) ? $page['content'][0]['title'] : 'DBCO | DataBase Collection' }}</h1>
		{!! isset($page['content'][0]['text']) ? $page['content'][0]['text'] : '' !!}
	</div>
	
	
	
	
	<div class="container-fluid offer4 mt-5">
		<div class="container" style="height:100%">
			<div class="row" style="height:100%">
				
				<div class="col-6 d-none d-lg-block offer4_img_block">
					
				</div>
				
				<div class="col-12 col-lg-6 offer4_right pl-5 pb-4">
					<h3 class="my-4">{{ isset($page['main_1']->cparagraphtitle) ? $page['main_1']->cparagraphtitle : '' }}</h3>
					{!! isset($page['main_1']->cparagraphtext) ? $page['main_1']->cparagraphtext : '' !!}
					<a href="{{ route('resources.main') }}" role="button" class="btn btn-secondary but1 px-4">{{__('Попробовать прямо сейчас')}}</a>
				</div>
				
			</div>
		</div>
	</div>
	
	<div class="col-12 text-center mt-5 px-4">
		{!! isset($page['main_2']->cparagraphtitle) ? $page['main_2']->cparagraphtitle : 'main_2' !!}
		{!! isset($page['main_2']->cparagraphtext) ? $page['main_2']->cparagraphtext : '' !!}
	</div>	
	
	<div class="container-fluid offer4 mt-5">
		<div class="container" style="height:100%">
			<div class="row" style="height:100%">
				
				
				
				<div class="col-12 col-lg-6 offer4_right pr-5 pb-4">
					<h3 class="my-4">{{ isset($page['main_3']->cparagraphtitle) ? $page['main_3']->cparagraphtitle : '' }}</h3>
					{!! isset($page['main_3']->cparagraphtext) ? $page['main_3']->cparagraphtext : 'main_3' !!}
				</div>
				
				<div class="col-6 d-none d-lg-block offer5_img_block">
					
				</div>
				
			</div>
		</div>
	</div>
	
	<div class="col-12 text-center mt-5 px-4">
		{!! isset($page['main_4']->cparagraphtitle) ? $page['main_4']->cparagraphtitle : '' !!}
		{!! isset($page['main_4']->cparagraphtext ) ? $page['main_4']->cparagraphtext  : 'main_4' !!}
	</div>
	
	<div class="mt-5 col-12 text-center">
		<h1>{{__('Новинки')}}</h1>
	</div>

	<div class="col-12 text-center mt-5 px-4">
		{!! isset($page['main_7']->cparagraphtitle) ? $page['main_7']->cparagraphtitle : '' !!}
		{!! isset($page['main_7']->cparagraphtext ) ? $page['main_7']->cparagraphtext  : 'main_7' !!}
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
								<img src="/images/{{ $solution->csolutionpicture }}" class="img-fluid d-flex m-auto" style="width:108px;" />
								<h2 class="text-center mt-4">{{ $solution->csolutionname }}</h2>
							</a>
							<p class="mt-3 mb-1">{{ $solution->csolutiontext }}</p>
							<p class="my-0"><span>{{__('Автор')}}: </span> {{ $authors[$solution->isolutionid] }}</p>
							<p class="my-0"><span>{{__('Дата')}}: </span> {{ date_create($solution->dsolutiondate)->Format('Y-m-d') }}</p>
							
							
							
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
		{{__('Что-то пошло не так')}}...
		@endif
	</div>
	
	<div class="mt-4" style="text-align:center;">
		<h1>{{__('Самые популярные')}}</h1>
	</div>
	
	<div class="col-12 text-center mt-5 px-4">
		{!! isset($page['main_5']->cparagraphtitle) ? $page['main_5']->cparagraphtitle : '' !!}
		{!! isset($page['main_5']->cparagraphtext ) ? $page['main_5']->cparagraphtext  : 'main_5' !!}
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
								<img src="/images/{{ $solution->csolutionpicture }}" class="img-fluid d-flex m-auto" style="width:108px;" />
								<h2 class="text-center mt-4">{{ $solution->csolutionname }}</h2>
							</a>
							<p class="mt-3 mb-1">{{ $solution->csolutiontext }}</p>
							<p class="my-0"><span>{{__('Автор')}}: </span> {{ $authors[$solution->isolutionid] }}</p>
							<p class="my-0"><span>{{__('Дата')}}: </span> {{ date_create($solution->dsolutiondate)->Format('Y-m-d') }}</p>
							
							
							
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
		{!! isset($page['main_6']->cparagraphtitle) ? $page['main_6']->cparagraphtitle : '' !!}
		{!! isset($page['main_6']->cparagraphtext ) ? $page['main_6']->cparagraphtext  : 'main_6' !!}
	</div>
	
	<div class="links">
		<!--<a href="https://yandex.ru/">Yandex</a>-->
	</div>
</div>
@endsection