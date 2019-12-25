@extends('dbco.layouts.customer')

@section('customercontent')

<?php setlocale(LC_MONETARY, 'en_US'); //установили локаль для функции money_format() ?>

<div class="row">
	
	
	<!-- ОДНА СТРОКА ФОРМЫ -->
	<div class="container-fluid lk_formContainer">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-2 offset-md-2 col-md-2">
					{{__('Номер контракта')}}:
				</div>
				<div class="col-6">
					<input type="text" name="ccustomeraccount" value="{{ $dbco_customer->ccustomeraccount }}" id="ccustomeraccount" class="form-control m_formControl" placeholder="" disabled  style="max-width: 100%;"/>
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
					{{__('Текущий остаток')}}:
				</div>
				<div class="col-6">
				
					<input type="text" name="mcustomerbalance" value="{{ money_format('%!i', $dbco_customer->mcustomerbalance) }} руб." id="mcustomerbalance" class="form-control m_formControl" placeholder="" disabled   style="max-width: 100%;"/>
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
					{{__('Окончание контракта')}}:
				</div>
				<div class="col-6">
					<input type="text" name="dcustomerblock" @if(!is_null( $dbco_customer->dcustomerblock))value="{{date('Y-m-d',strtotime( $dbco_customer->dcustomerblock))}}" @endif id="dcustomerblock" class="form-control m_formControl" placeholder="" disabled   style="max-width: 100%;"/>
				</div>
			</div>
		</div>
	</div>
	<!-- /ОДНА СТРОКА ФОРМЫ -->
	
	
</div>


<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->


<div class="container-fluid lk_formContainerWithoutMargin pb-5">
	<div class="container">
		
		<div class="row">
			<div class="col-12">
				<table class="table lk_table">
					<tbody>
						<tr style="border-bottom:solid 2px #ff4300">
							<th class="text-left" style="width:10%">{{__('Дата')}}</th>
							<th class="text-left" style="width:10%">{{__('Номер')}}</th>
							<th class="text-left" style="width:60%">{{__('Назначение документа')}}</th>
							<th class="text-left" style="width:20%">{{__('Сумма')}}</th>
						</tr>
						@if (count($finances) > 0)
						@foreach ($finances as $finance)
						<tr class="ttr">
							<td>{{ $finance->dfinancedate }}</td>
							<td>{{ $finance->cfinancenumber }}</td>
							<td><a href="#">{{ $finance->cfinancepurpose }}</a></td>
							<td class="text-right">{{ money_format('%!i', $finance->mfinancesum) }}</td>
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