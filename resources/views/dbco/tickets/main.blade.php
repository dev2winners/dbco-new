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
		<div class="col-12 text-center">
			<h1>Мой кабинет</h1>
		</div>
		
		<div class="col-12 offset-md-2 col-md-8 offset-md-2 topReshenSubMenu pb-4 d-md-flex align-items-center justify-content-between text-center mt-4">
			<a href="#">Персональная информация</a>
			<a href="#">Ваши решения</a>
			<a href="#">Финансы</a>
			<a href="#" class="active">Обращения</a>
			<a href="#">База данных</a>
		</div>
		
		<div class="col-12 text-center mt-4">
			<p class="text-center"></p>
		</div>
		
	</div>
</div>
<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР. ШАПКА -->


<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->
<form class="form" action="{{ route('tickets.store') }}" method="POST">
	@csrf
	@method('POST')
	<div class="container-fluid lk_formContainerWithoutMargin mt-5 pt-5">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<h2>Помощь и поддержка</h2>
				</div>
				<div class="col-12 text-center mt-4">
					<p class="text-center"></p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container-fluid lk_formContainerWithoutMargin pb-5">
		<div class="container py-5" style="background:#fff">
			<div class="form-group row">
				<label for="f_tema" class="col-2 col-form-label text-right">Тема:</label>
				<div class="col-8">
					<input type="text" class="form-control" id="f_tema" value="">
				</div>
			</div>
			
			<div class="form-group row">
				<label for="ctickettext" class="col-2 col-form-label text-right">Сообщение:</label>
				<div class="col-8">
					<textarea class="form-control" rows="10" id="ctickettext" value="" name="ctickettext"></textarea>
				</div>
			</div>
			
			<div class="form-group row">
				<div class="offset-2 col-10">
					<a href="#" class="f_file">Прикрепить файл</a>
				</div>
			</div>
			
			<div class="form-group row">
				<div class="offset-2 col-10">
					<button type="submit" class="btn btn-danger formSubmit">Отправить</button>
				</div>
			</div>
		</div>
	</div>
</form>


<div class="container-fluid lk_formContainerWithoutMargin pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<table class="table lk_table">
					<tbody>
						<tr style="border-bottom:solid 2px #ff4300">
							<th class="text-left" style="width:20%">ID</th>
							<th class="text-left" style="width:60%">Тема</th>
							<th class="text-left" style="width:20%">Дата</th>
						</tr>
						@if (count($tickets) > 0)
						@foreach ($tickets as $ticket)
						<tr class="ttr">
							<td>{{ $ticket->iticketid }}</td>
							<td><a href="#" onclick="return false">{{ $ticket->ctickettext }}</a></td>
							<td>{{ $ticket->dticketdate }}</td>
						</tr>
						@endforeach	
						@else
						
						@endif
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

{!! $tickets->links() !!}

<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. ФОРМА -->


<div class="container mt-5">
	&nbsp; <!--ОТСТУП-->
</div>

@endsection