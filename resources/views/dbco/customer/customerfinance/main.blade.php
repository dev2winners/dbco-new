@extends('dbco.layouts.customer')

@section('customercontent')


<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->


<div class="container-fluid lk_formContainerWithoutMargin pb-5">
	<div class="container">
		<div class="row mb-4">
			<div class="col-12">
					
					<!-- ОДНА СТРОКА ФОРМЫ -->
					<div class="container-fluid lk_formContainer">
						<div class="container">
							<div class="row d-flex align-items-center">
								<div class="col-6 col-md-4">
									Номер контракта для оплаты:
								</div>
								<div class="col-6">
									<input type="text" name="ccustomeraccount" value="{{ $dbco_customer->ccustomeraccount }}" id="ccustomeraccount" class="form-control m_formControl" placeholder="" disabled />
								</div>
							</div>
						</div>
					</div>
					<!-- /ОДНА СТРОКА ФОРМЫ -->
					<!-- ОДНА СТРОКА ФОРМЫ -->
					<div class="container-fluid lk_formContainer">
						<div class="container">
							<div class="row d-flex align-items-center">
								<div class="col-6 col-md-4">
									Текущий остаток на счете в рублях:
								</div>
								<div class="col-6">
									<input type="text" name="mcustomerbalance" value="{{ $dbco_customer->mcustomerbalance }} руб." id="mcustomerbalance" class="form-control m_formControl" placeholder="" disabled />
								</div>
							</div>
						</div>
					</div>
					<!-- /ОДНА СТРОКА ФОРМЫ -->
					<!-- ОДНА СТРОКА ФОРМЫ -->
					<div class="container-fluid lk_formContainer">
						<div class="container">
							<div class="row d-flex align-items-center">
								<div class="col-6 col-md-4">
									Дата приостановления доступа к облачной базе данных:
								</div>
								<div class="col-6">
									<input type="text" name="dcustomerblock" value="{{ $dbco_customer->dcustomerblock }}" id="dcustomerblock" class="form-control m_formControl" placeholder="" disabled />
								</div>
							</div>
						</div>
					</div>
					<!-- /ОДНА СТРОКА ФОРМЫ -->
				
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<table class="table lk_table">
					<tbody>
						<tr style="border-bottom:solid 2px #ff4300">
							<th class="text-left" style="width:20%">Дата</th>
							<th class="text-left" style="width:20%">Номер</th>
							<th class="text-left" style="width:40%">Назначение документа</th>
							<th class="text-left" style="width:20%">Сумма</th>
						</tr>
						@if (count($finances) > 0)
						@foreach ($finances as $finance)
						<tr class="ttr">
							<td>{{ $finance->dfinancedate }}</td>
							<td>{{ $finance->cfinancenumber }}</td>
							<td><a href="#">{{ $finance->cfinancepurpose }}</a></td>
							<td>{{ $finance->mfinancesum }}</td>
						</tr>
						@endforeach	
						@else
						
						@endif
					</tbody>
				</table>
				{!! $finances->links() !!}
			</div>
		</div>
	</div>
</div>



<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. ФОРМА -->

@endsection	