@extends('dbco.layouts.main')

@section('content')


<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР. ШАПКА -->
<div class="container mt-5">
	<div class="row">
		<div class="col-12 text-center">
			<h1>Мой кабинет</h1>
		</div>
		
		<div class="col-12 text-center mt-4">
			<p class="text-center">Это ваш кабинет. Входите, располагайтесь удобно. Можете заполнить свою анкету, чтобы мы познакомились ближе. Ведь нас ждет долгое плодотворное сотрудничество.</p>
		</div>
		
		@if ($message = Session::get('success'))
		<div class="col-12 text-center mt-4">
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		</div>
		@endif
		
	</div>
</div>
<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР. ШАПКА -->


<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. ФОРМА -->
<form class="form" action="{{ route('customer.update') }}" method="POST">
	@csrf
	@method('PUT')
	<div class="container-fluid lk_formContainer mt-5 pt-5">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<h2>Персональная информация</h2>
				</div>
			</div>
		</div>
	</div>
	
	<!-- ОДНА СТРОКА ФОРМЫ -->
	<div class="container-fluid lk_formContainer">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-6 offset-md-2 col-md-4">
					Ф.И.О.
				</div>
				<div class="col-6">
					<input type="text" name="ccustomername" value="{{ $dbco_customer->ccustomername }}" id="ccustomername" class="form-control m_formControl" placeholder="Ф.И.О." />
				</div>
			</div>
		</div>
	</div>
	<!-- /ОДНА СТРОКА ФОРМЫ -->
	
	
	<!-- ОДНА СТРОКА ФОРМЫ -->
	<div class="container-fluid lk_formContainer">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-6 offset-md-2 col-md-4">
					Телефон
				</div>
				<div class="col-6">
					<input type="text" name="ccustomerphone" value="{{ $dbco_customer->ccustomerphone }}" id="ccustomerphone" class="form-control m_formControl" placeholder="79017773344" disabled />
				</div>
			</div>
		</div>
	</div>
	<!-- /ОДНА СТРОКА ФОРМЫ -->
	
	
	<!-- ОДНА СТРОКА ФОРМЫ -->
	<div class="container-fluid lk_formContainer">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-6 offset-md-2 col-md-4">
					email
				</div>
				<div class="col-6">
					<input type="text" name="ccustomermail" value="{{ $dbco_customer->ccustomermail }}" id="ccustomermail" class="form-control m_formControl" placeholder="mail@mail.com" disabled />
				</div>
			</div>
		</div>
	</div>
	<!-- /ОДНА СТРОКА ФОРМЫ -->
	
	
	<!-- ОДНА СТРОКА ФОРМЫ -->
	<div class="container-fluid lk_formContainer">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-6 offset-md-2 col-md-4">
					Комментарии:
				</div>
				<div class="col-6">
					<textarea name="ccustomernote" value="{{ $dbco_customer->ccustomernote }}" id="ccustomernote" class="form-control m_formControl" rows="3">{{ $dbco_customer->ccustomernote }}</textarea>
				</div>
			</div>
		</div>
	</div>
	<!-- /ОДНА СТРОКА ФОРМЫ -->	
	
	
	<!-- ОДНА СТРОКА ФОРМЫ -->
	<div class="container-fluid lk_formContainerWithoutMargin pt-5 pb-4">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-12 form-check text-center">
					<input type="checkbox" class="form-check-input" id="Check1" checked>
					<label class="form-check-label" for="Check1">Согласие на обработку персональных данных</label>
				</div>
			</div>
		</div>
	</div>
	<!-- /ОДНА СТРОКА ФОРМЫ -->
	
	<!-- ОДНА СТРОКА ФОРМЫ -->
	<div class="container-fluid lk_formContainerWithoutMargin pb-5">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-12 form-check text-center">
					<button type="submit" class="btn btn-danger formSubmit">Сохранить</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /ОДНА СТРОКА ФОРМЫ -->
	</form>
	<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. ФОРМА -->
	
	
	<div class="pull-left">
		<h2></h2>
	</div>
	
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
	
@endsection