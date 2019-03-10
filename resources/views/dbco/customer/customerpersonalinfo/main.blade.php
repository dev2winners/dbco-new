@extends('dbco.layouts.customer')

@section('customercontent')

<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. ФОРМА -->
<form class="form" action="{{ route('customer.update') }}" method="POST">
	@csrf
	@method('PUT')
	
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
					<input type="text" name="ccustomerphone" value="{{ $dbco_customer->ccustomerphone }}" id="ccustomerphone" class="form-control m_formControl" placeholder="" disabled />
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

@endsection