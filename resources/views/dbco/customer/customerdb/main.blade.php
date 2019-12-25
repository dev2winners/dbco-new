@extends('dbco.layouts.customer')

@section('customercontent')

<!-- ПЕРЕКЛЮЧАТЕЛЬ БАЗЫ -->
<div id="backupdbcloud">
	<div class="container-fluid lk_formContainerWithoutMargin pb-5">
		<div class="container">
			<div class="row">
				<div class="col-2 offset-md-4 col-md-6">
					
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" name="icustomerservertype" id="cloudDb" value="1" class="custom-control-input" {{ ($dbco_customer->icustomerservertype) ? 'checked' : '' }}>
						<label class="custom-control-label" for="cloudDb">{{__('База данных в облаке dbco')}}</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" name="icustomerservertype" id="localDb" value="0" class="custom-control-input" {{ ($dbco_customer->icustomerservertype) ? '' : 'checked' }}>
						<label class="custom-control-label" for="localDb">
							{{__('Моя база данных')}}</label>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ПЕРЕКЛЮЧАТЕЛЬ БАЗЫ -->


<div id="backupcloud">
	<!-- ОДНА СТРОКА ФОРМЫ -->
	<div class="container-fluid lk_formContainer">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-2 offset-md-2 col-md-2">
					{{__('Сервер')}}:
				</div>
				<div class="col-6">
					<input type="text" name="server" value="cloud.dbco.ru" id="" class="form-control m_formControl" placeholder="" disabled  style="width: 100%!important;max-width: 600px" />
				</div>
			</div>
		</div>
	</div>
	<!-- /ОДНА СТРОКА ФОРМЫ -->
	<!-- ОДНА СТРОКА ФОРМЫ -->
	<div class="container-fluid lk_formContainer">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-2 offset-md-2 col-md-2">
					{{__('Имя базы данных')}}:
				</div>
				<div class="col-6" >
					<input type="text" name="ccustomerguid" value="DB_{{ str_replace(['{','}','-'],'',$dbco_customer->ccustomerguid) }}" id="ccustomerguid" class="form-control m_formControl" placeholder=""  style="width: 100%!important;max-width: 600px" disabled />
				</div>
			</div>
		</div>
	</div>
	<!-- /ОДНА СТРОКА ФОРМЫ -->
	<!-- ОДНА СТРОКА ФОРМЫ -->
	<div class="container-fluid lk_formContainer">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-2 offset-md-2 col-md-2">
					{{__('Пользователь')}}:
				</div>
				<div class="col-6">
					<input type="text" name="db_ccustomerguid" value="DB_{{ str_replace(['{','}','-'],'',$dbco_customer->ccustomerguid) }}_Administrator" id="mcustomerbalance" class="form-control m_formControl" placeholder="" disabled  style="width: 100%!important;max-width: 600px" />
				</div>
			</div>
		</div>
	</div>
	<!-- /ОДНА СТРОКА ФОРМЫ -->
	<!-- ОДНА СТРОКА ФОРМЫ -->
	<div class="container-fluid lk_formContainer">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-2 offset-md-2 col-md-2">
					{{__('Пароль')}}:
				</div>
				<div class="col-4 col-md-4">
					<input type="text" name="pass" value="" id="" class="form-control m_formControl" placeholder="*******" disabled />
				</div>
				<div class="col-2 col-md-2">
					<form action="{{ route('tickets.store') }}" method="POST">
						@csrf
						@method('POST')
						<input type="hidden" class="form-control" id="ctickettext" value="502" name="ctickettext">
						<input type="hidden" class="form-control" id="itickettype" value="502" name="itickettype">
						<button type="submit" class="btn btn-secondary ml-auto standardToggleButton">{{__('Сменить и выслать')}}</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /ОДНА СТРОКА ФОРМЫ -->	
	
	<!-- ОДНА СТРОКА ФОРМЫ -->
	{{--<div class="container-fluid lk_formContainer">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-6 offset-md-2 col-md-4">
					
				</div>
				<div class="col-6">
					<form action="{{ route('tickets.store') }}" method="POST">
						@csrf
						@method('POST')
						<input type="hidden" class="form-control" id="ctickettext" value="502" name="ctickettext">
						<input type="hidden" class="form-control" id="itickettype" value="502" name="itickettype">
						<button type="submit" class="btn btn-secondary ml-auto standardToggleButton">{{__('Сменить и выслать пароль')}}</button>
					</form>
				</div>
			</div>
		</div>
	</div>--}}
	<!-- /ОДНА СТРОКА ФОРМЫ -->
	
	<!-- ОДНА СТРОКА ФОРМЫ -->
	<div class="container-fluid lk_formContainer">
		<div class="container">
			<form action="{{ route('customerdb.update') }}" method="POST">		
				@csrf
				@method('PUT')
				<div class="row d-flex align-items-center">
					<div class="col-2 offset-md-2 col-md-2">
						{{__('Резервная копия')}}:
					</div>
					<div class="col-4 col-md-4">
						<select class="custom-select form-control m_formControl" id="icustomerbackup" name="icustomerbackup">
							<option value="0" {{ (168 != $dbco_customer->icustomerbackup) ? 'selected' : '' }}>{{__('Не создавать')}}</option>
							<option value="168" {{ (168 == $dbco_customer->icustomerbackup) ? 'selected' : '' }}>{{__('Создавать еженедельно')}}</option>
						</select>
					</div>

					<div class="col-2 col-md-2"><form action="{{ route('tickets.store') }}" method="POST">
							@csrf
							@method('POST')
							<input type="hidden" class="form-control" id="ctickettext" value="701" name="ctickettext">
							<input type="hidden" class="form-control" id="itickettype" value="701" name="itickettype">
							<button type="submit" class="btn btn-primary ml-auto standardToggleButton">{{__('Создать сейчас')}}</button>
						</form></div>
				</div>
			</form>
		</div>
	</div>
	<!-- /ОДНА СТРОКА ФОРМЫ -->
	

	<!-- ОДНА СТРОКА ФОРМЫ -->
{{--	<div class="container-fluid lk_formContainer">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-6 offset-md-2 col-md-4">
					<form action="{{ route('tickets.store') }}" method="POST">		
						@csrf
						@method('POST')
						<input type="hidden" class="form-control" id="ctickettext" value="701" name="ctickettext">
						<input type="hidden" class="form-control" id="itickettype" value="701" name="itickettype">
						<button type="submit" class="btn btn-primary ml-auto standardToggleButton"><img src="{{ asset('dbco/images/buttons/b2.png') }}" alt="Запросить создание резервной копии" class="mr-2" />{{__('Запросить создание резервной копии')}}</button>
					</form>
				</div>
			</div>
		</div>
	</div>--}}
	<!-- /ОДНА СТРОКА ФОРМЫ -->
	
	
	<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->
	
	<div class="container-fluid lk_formContainerWithoutMargin pb-5">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<table class="table lk_table">
						<tbody>
							<tr style="border-bottom:solid 2px #ff4300">
								<th class="text-left" style="width:20%">{{__('Дата')}}</th>
								<th class="text-left" style="width:60%">{{__('Комментарий')}}</th>
								<th class="text-left" style="width:20%"></th>
							</tr>
							
							@if (count($backups) > 0)
							@foreach ($backups as $backup)
							<tr class="ttr">
								<td>{{ $backup->dbackupdate }}</td>
								<td>{{ $backup->cbackupnote }}</td>
								<td>
									<form action="{{ route('tickets.store') }}" method="POST">		
										@csrf
										@method('POST')
										<input type="hidden" class="form-control" id="ctickettext" value="702" name="ctickettext">
										<input type="hidden" class="form-control" id="itickettype" value="702" name="itickettype">
										<input type="hidden" class="form-control" id="ibackupid" value="{{ $backup->ibackupid }}" name="ibackupid">
										<button type="submit" class="btn btn-primary ml-auto standardToggleButton">{{__('Восстановить')}}</button>
									</form>
								</td>
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
	
	
	
	<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. ФОРМА -->
	
</div>

<div id="backuplocal" style="display: none;">
	
	<form action="{{ route('customerdb.update') }}" method="POST">		
		@csrf
		@method('PUT')
		
		<!-- ОДНА СТРОКА ФОРМЫ -->
		<div class="container-fluid lk_formContainer">
			<div class="container">
				<div class="row d-flex align-items-center">
					<div class="col-2 offset-md-2 col-md-2">
						{{__('Сервер')}}:
					</div>
					<div class="col-6">
						<input type="text" name="ccustomerservername" value="{{ $dbco_customer->ccustomerservername }}" id="ccustomerservername" class="form-control m_formControl" placeholder=""  style="width: 100%!important;max-width: 600px" />
					</div>
				</div>
			</div>
		</div>
		<!-- /ОДНА СТРОКА ФОРМЫ -->
		<!-- ОДНА СТРОКА ФОРМЫ -->
		<div class="container-fluid lk_formContainer">
			<div class="container">
				<div class="row d-flex align-items-center">
					<div class="col-2 offset-md-2 col-md-2">
						{{__('Имя базы данных')}}:
					</div>
					<div class="col-6">
						<input type="text" name="ccustomerserverdatabase" value="{{ $dbco_customer->ccustomerserverdatabase }}" id="ccustomerserverdatabase" class="form-control m_formControl" placeholder=""  style="width: 100%!important;max-width: 600px"/>
					</div>
				</div>
			</div>
		</div>
		<!-- /ОДНА СТРОКА ФОРМЫ -->
		<!-- ОДНА СТРОКА ФОРМЫ -->
		<div class="container-fluid lk_formContainer">
			<div class="container">
				<div class="row d-flex align-items-center">
					<div class="col-2 offset-md-2 col-md-2">
						{{__('Пользователь')}}:
					</div>
					<div class="col-6">
						<input type="text" name="ccustomerserverlogin" value="{{ $dbco_customer->ccustomerserverlogin }}" id="ccustomerserverlogin" class="form-control m_formControl" placeholder=""  style="width: 100%!important;max-width: 600px"/>
					</div>
				</div>
			</div>
		</div>
		<!-- /ОДНА СТРОКА ФОРМЫ -->
		<!-- ОДНА СТРОКА ФОРМЫ -->
		<div class="container-fluid lk_formContainer">
			<div class="container">
				<div class="row d-flex align-items-center">
					<div class="col-2 offset-md-2 col-md-2">
						{{__('Пароль')}}:
					</div>
					<div class="col-6">
						<input type="text" name="ccustomerserverpassword" value="" id="ccustomerserverpassword" class="form-control m_formControl" placeholder=""  style="width: 100%!important;max-width: 600px"/>
					</div>
				</div>
			</div>
		</div>
		<!-- /ОДНА СТРОКА ФОРМЫ -->	
		<!-- /ОДНА СТРОКА ФОРМЫ -->
		
		<!-- ОДНА СТРОКА ФОРМЫ -->
		<div class="container-fluid lk_formContainer">
			<div class="container">
				<div class="row d-flex align-items-center">
					<div class="col-6 offset-md-6 col-md-6">
						
						<button type="submit" class="btn btn-primary ml-auto standardToggleButton">{{__('Сохранить')}}</button>

					</div>
				</div>
			</div>
		</div>
		<!-- /ОДНА СТРОКА ФОРМЫ -->
		
	</form>
</div>



@endsection			