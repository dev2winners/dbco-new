@extends('dbco.layouts.main')

@section('content')
<div class="content">
	<div class="title m-b-md" style="text-align:center;">
		<h1>DBCO™ Inc.</h1>
	</div>
	
	
	<div class="container-fluid offer3 mt-5">
		<div class="container" style="height:100%">
			<div class="row" style="height:100%">
				<div class="col-12 offset-lg-6 col-lg-6 offer3_right pl-4">
					<h3 class="my-4">Всё для построения именно вашего решения</h3>
					<p>Не дайте потеряться нужным разрозненным сведениям, которые не удается сохранить в стандартной учетной системе. Платформа dbco поможет построить именно то, что необходимо вам и вашему бизнесу. Вы лучше других понимаете все потребности и особенности.</p> 
					<p>Просто выберите и включите готовые решения и дополнительные функции – через минуту все готово к использованию.</p>
					<a href="#" role="button" class="btn btn-secondary but1 px-4">Попробовать прямо сейчас</a>
				</div>
			</div>
		</div>
	</div>
	
	
	
	<div>
		@if (count($solutions4) > 0)
		<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->
		<div class="container-fluid topReshen mt-5 mb-5">
			<div class="container" style="height:100%">
				<div class="row">	
					
					
					@foreach ($solutions4 as $solution)
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
										
										<button type="submit" class="btn ml-auto abtn" onClick="return false;">ПОДКЛЮЧИТЬ</button>	
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
	
	<div class="links">
		<!--<a href="https://yandex.ru/">Yandex</a>-->
	</div>
</div>
@endsection