@extends('dbco.layouts.main')

@section('content')
<div class="col-md-12">
	
	<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. ЗАГОЛОВОК -->
	<div class="container-fluid offer2">
		<div class="text-center mt-4">
			<h1>Все решения</h1>
		</div>
	</div>
	<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->
	
	@if ($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
	@endif
	
	
	<div>
		@if (count($solutions) > 0)
		<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->
		<div class="container-fluid topReshen mt-5 mb-5">
			<div class="container" style="height:100%">
				<!-- кнопка фильтрации по категориям -->
				<div class="row">
					<div class="col-12 pb-4">
						<div class="btn-group">
							<div class="dropdown">
								<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Выберите категорию
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="{{ url('/dbcosolution/2') }}">Вторая категория</a>
									<a class="dropdown-item" href="{{ url('/dbcosolution/3') }}">Третья категория</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- кнопка фильтрации по категориям -->
				<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->
				<div class="row">	
					
					@foreach ($solutions as $solution)
					<!-- КАРТОЧКА -->
					<div class="col-12 col-md-6 col-lg-4 col-xl-3 topReshCol pb-4">
						<div class="card p-3">
							<div class="stars text-right"><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i></div>
							<img src="{{ $solution->csolutionpicture }}" class="img-fluid d-flex m-auto"/>
							<h2 class="text-center mt-4">{{ $solution->csolutionname }}</h2>
							<p class="mt-3 mb-1">{{ $solution->csolutiontext }}</p>
							<p class="my-0"><span>Производитель: </span> {{ $solution->isolutiondeveloper }}</p>							
							<p class="my-0"><span>Дата: </span> {{ $solution->dsolutiondate }}</p>
							<div class="d-flex mt-3">
								<div>
									<a href="{{ route('dbcosolution.single', ['id' => $solution->isolutionid]) }}" role="button" class="btn btn-outline-secondary abtn">ПОДРОБНЕЕ</a>						
								</div>
								<div class="ml-auto">
									<form action="{{ route('dbcosolution.toggle', $solution->isolutionid) }}" method="POST">		
										@csrf
										
										<button type="submit" class="btn btn-{{ $buttonState[$solution->isolutionid]['state'] }} ml-auto abtn">{{ $buttonState[$solution->isolutionid]['text'] }}</button>	
									</form>
								</div>
							</div>
							
							
							<div class="circle circle_grey"><i class="fas fa-circle"></i></div>
						</div>
					</div>
					<!-- /КАРТОЧКА -->
					@endforeach	
					
				</div>
			</div>
		</div>
		<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->	
		
		
		
		@else
		Что-то пошло не так...
		@endif
	</div>
	
	
	{!! $solutions->links() !!}
	
</div>
@endsection