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
							<p class="my-0"><span>Версия: </span> {{ $solution->isolutionversion }}</p>
							<p class="my-0"><span>Дата: </span> {{ $solution->dsolutiondate }}</p>
							<div class="d-flex mt-3">
								<div>
									<form action="" method="POST">										
										<button type="submit" class="btn btn-outline-secondary abtn" onClick="return false;">ПОДРОБНЕЕ</button>	
									</form>
								</div>
								<div class="ml-auto">
									<form action="{{ route('dbcosolution.toggle', $solution->isolutionid) }}" method="POST">		
										@csrf
										
										<button type="submit" class="btn btn-{{ $danger_or_success[$solution->isolutionid]['state'] }} ml-auto abtn">{{ $danger_or_success[$solution->isolutionid]['text'] }}</button>	
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
		
		<!--<div class="table-responsive">
			<table class="table table-bordered">
			<tr>
			<th>Номер</th>
			<th>Название</th>
			<th>Изображение</th>
			<th>Описание</th>
			<th width="70px">$$$</th>
			</tr>
			@foreach ($solutions as $solution)
			<tr>
			<td>{{ $solution->isolutionid }}</td>
			<td>{{ $solution->csolutionname }}</td>
			<td><img src="{{ $solution->csolutionpicture }}" class="img-fluid" alt="DBCO"></td>
			<td>{{ $solution->csolutiontext }}</td>
			<td>
			<form action="{{ route('dbcosolution.toggle', $solution->isolutionid) }}" method="POST">		
			@csrf
			<button type="submit" class="btn btn-{{ $danger_or_success[$solution->isolutionid]['state'] }}">{{ $danger_or_success[$solution->isolutionid]['text'] }}</button>
			
			</form>
			</td>
			</tr>
			@endforeach
			</table>
		</div>-->
		{!! $solutions->links() !!}
		
	</div>
@endsection