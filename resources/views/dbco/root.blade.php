@extends('dbco.layouts.main')

@section('content')
<div class="content">
	<div class="title m-b-md" style="text-align:center;">
		<h1>DBCO Inc.</h1>
	</div>
	
	
	
	
	<div class="container-fluid offer4 mt-5">
		<div class="container" style="height:100%">
			<div class="row" style="height:100%">
			
				<div class="col-6 d-none d-lg-block offer4_img_block">
					
				</div>
				
				<div class="col-12 col-lg-6 offer4_right pl-5 pb-4">
					<h3 class="my-4">Всё для построения именно вашего решения</h3>
					<p>Не дайте потеряться нужным разрозненным сведениям, которые не удается сохранить в стандартной учетной системе. Платформа dbco поможет построить именно то, что необходимо вам и вашему бизнесу. Вы лучше других понимаете все потребности и особенности.</p> 
					<p>Просто выберите и включите готовые решения и дополнительные функции – через минуту все готово к использованию.</p>
					<a href="{{ route('resources.main') }}" role="button" class="btn btn-secondary but1 px-4">Попробовать прямо сейчас</a>
				</div>
				
			</div>
		</div>
	</div>
	
	
	<div class="container-fluid offer4 mt-5">
		<div class="container" style="height:100%">
			<div class="row" style="height:100%">
			
				
				
				<div class="col-12 col-lg-6 offer4_right pr-5 pb-4">
					<h3 class="my-4">Что такое решение dbco</h3>
					<p>Пользовательские решения — это приложение на рабочем столе, включающее все решения, которые пользователь загрузил, создал или адаптировал под свои нужды с помощью платформы dbco.</p> 
					<p>Готовые решения умеют управлять контактами, отслеживать продажи и запасы, планировать мероприятия и многое другое. Специально созданные решения автоматизируют любой нестандартный и уникальный процесс.</p>
					<p>Местом хранения данных может быть на выбор - пользовательский локальный компьютер, корпоративный сервер или облако cloud.dbco.ru. В последнем случае, получить результат можно без специальных навыков и помощи ИТ-специалистов.</p>
				</div>
				
				<div class="col-6 d-none d-lg-block offer5_img_block">
					
				</div>
				
			</div>
		</div>
	</div>
	
	
	<div class="mt-5" style="text-align:center;">
		<h1>Новинки</h1>
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
							<img src="{{ $solution->csolutionpicture }}" class="img-fluid d-flex m-auto" style="width:108px;" />
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
							<img src="{{ $solution->csolutionpicture }}" class="img-fluid d-flex m-auto" style="width:108px;" />
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
	
	<div class="links">
		<!--<a href="https://yandex.ru/">Yandex</a>-->
	</div>
</div>
@endsection