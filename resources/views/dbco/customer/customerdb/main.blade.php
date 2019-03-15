@extends('dbco.layouts.customer')

@section('customercontent')

<!-- ПЕРЕКЛЮЧАТЕЛЬ БАЗЫ -->
<div id="backupdbcloud">
	<div class="container-fluid lk_formContainerWithoutMargin pb-5">
		<div class="container">
			<div class="row">
				<div class="col-12">
					
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" name="cloudorlocal" id="cloudDb" value="0" onclick="toggleDb()" class="custom-control-input" checked>
						<label class="custom-control-label" for="cloudDb">База данных в облаке dbco</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" name="cloudorlocal" id="localDb" value="1" onclick="toggleDb()" class="custom-control-input">
						<label class="custom-control-label" for="localDb">Моя база данных</label>
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
				<div class="col-6 offset-md-2 col-md-4">
					Сервер:
				</div>
				<div class="col-6">
					<input type="text" name="server" value="cloud.dbco.ru" id="" class="form-control m_formControl" placeholder="" disabled />
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
					Имя базы данных:
				</div>
				<div class="col-6">
					<input type="text" name="ccustomerguid" value="DB_{{ str_replace(['{','}','-'],'',$dbco_customer->ccustomerguid) }}" id="ccustomerguid" class="form-control m_formControl" placeholder="" disabled />
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
					Пользователь:
				</div>
				<div class="col-6">
					<input type="text" name="db_ccustomerguid" value="DB_{{ str_replace(['{','}','-'],'',$dbco_customer->ccustomerguid) }}_Administrator" id="mcustomerbalance" class="form-control m_formControl" placeholder="" disabled />
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
					Пароль:
				</div>
				<div class="col-6">
					<input type="text" name="pass" value="" id="" class="form-control m_formControl" placeholder="*******" disabled />
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
					<form action="{{ route('tickets.store') }}" method="POST">		
						@csrf
						@method('POST')
						<input type="hidden" class="form-control" id="" value="Смените мне пожалуйста пароль для облака" name="ctickettext">
						<button type="submit" class="btn btn-secondary ml-auto abtn">Сменить пароль</button>	
					</form>
				</div>
				<div class="col-6">
					<form action="{{ route('tickets.store') }}" method="POST">		
						@csrf
						@method('POST')
						<input type="hidden" class="form-control" id="" value="Я - тупой осел - храню пароли на бумажке!!! Вышлите мне пожалуйста пароль для облака еще раз! Умоляю на коленях!!!" name="ctickettext">
						<button type="submit" class="btn btn-secondary ml-auto abtn">Выслать пароль</button>	
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /ОДНА СТРОКА ФОРМЫ -->
	
	<!-- ОДНА СТРОКА ФОРМЫ -->
	<div class="container-fluid lk_formContainer">
		<div class="container">
			<form action="{{ route('customerdb.update') }}" method="POST">		
				@csrf
				@method('PUT')
				<div class="row d-flex align-items-center">
					<div class="col-6 offset-md-2 col-md-4">
						Периодичность резервного копирования:<br />
						<strong>{{ (168 == $dbco_customer->icustomerbackup) ? 'Еженедельно' : 'Не сохраняется' }}</strong>
					</div>
					<div class="col-3">
						<select class="custom-select form-control m_formControl" id="icustomerbackup" name="icustomerbackup" style="max-width:400px;">
						    <option value="1" selected>...</option>
							<option value="0">Нет</option>
							<option value="168">Еженедельно</option>
						</select>
					</div>
					<div class="col-3">
						<button type="submit" class="btn btn-secondary ml-auto abtn">Изменить</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- /ОДНА СТРОКА ФОРМЫ -->
	
	
	<!-- ОДНА СТРОКА ФОРМЫ -->
	<div class="container-fluid lk_formContainer">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-6 offset-md-2 col-md-4">
					<form action="{{ route('tickets.store') }}" method="POST">		
						@csrf
						@method('POST')
						<input type="hidden" class="form-control" id="" value="Заклинаю вас всеми святыми! Создайте мне резервную копию моей бесценной базы! Да хранит Вас Господь!" name="ctickettext">
						<button type="submit" class="btn btn-primary ml-auto abtn">Запросить создание резервной копии</button>	
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /ОДНА СТРОКА ФОРМЫ -->
	
	
</div>

<div id="backuplocal" style="display: none;">
	
	<form action="{{ route('customerdb.update') }}" method="POST">		
	@csrf
	@method('PUT')
	
	<!-- ОДНА СТРОКА ФОРМЫ -->
	<div class="container-fluid lk_formContainer">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-6 offset-md-2 col-md-4">
					Сервер:
				</div>
				<div class="col-6">
					<input type="text" name="" value="dbco_customer > ccustomerserverpassword - уверен?" id="" class="form-control m_formControl" placeholder="" />
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
					Имя базы данных:
				</div>
				<div class="col-6">
					<input type="text" name="ccustomerserverdatabase" value="{{ $dbco_customer->ccustomerserverdatabase }}" id="ccustomerserverdatabase" class="form-control m_formControl" placeholder="" />
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
					Пользователь:
				</div>
				<div class="col-6">
					<input type="text" name="ccustomerserverlogin" value="{{ $dbco_customer->ccustomerserverlogin }}" id="ccustomerserverlogin" class="form-control m_formControl" placeholder="" />
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
					Пароль:
				</div>
				<div class="col-6">
					<input type="text" name="ccustomerserverpassword" value="" id="ccustomerserverpassword" class="form-control m_formControl" placeholder="" />
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
				<div class="col-6 offset-md-2 col-md-4">
					
					<button type="submit" class="btn btn-secondary ml-auto abtn">Сохранить</button>	
					
				</div>
			</div>
		</div>
	</div>
	<!-- /ОДНА СТРОКА ФОРМЫ -->
	
	</form>
</div>

<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->

<div class="container-fluid lk_formContainerWithoutMargin pb-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<table class="table lk_table">
					<tbody>
						<tr style="border-bottom:solid 2px #ff4300">
							<th class="text-left" style="width:20%">Дата</th>
							<th class="text-left" style="width:60%">Комментарий</th>
							<th class="text-left" style="width:20%">Восстановить</th>
						</tr>
						
						@if (count($backups) > 0)
						@foreach ($backups as $backup)
						<tr class="ttr">
							<td>{{ $backup['dbackupdate'] }}</td>
							<td>{{ $backup['cbackupnote'] }}</td>
							<td>{{ $backup['testbutton'] }}</td>
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

@endsection			