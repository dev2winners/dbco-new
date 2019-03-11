@extends('dbco.layouts.customer')

@section('customercontent')


<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->


<div class="container-fluid lk_formContainerWithoutMargin pb-5">
	<div class="container">
		<div class="row mx-1">
			<div class="col-12">
				<dl class="row">
					<dt class="col-sm-3 p-3 mb-2 bg-info text-white">Номер контракта для оплаты:</dt>
					<dd class="col-sm-9 p-3 mb-2 bg-white text-dark">{{ $dbco_customer->ccustomeraccount }}</dd>
					
					<dt class="col-sm-3 text-info mb-2 p-3">Текущий остаток на счете в рублях:</dt>
					<dd class="col-sm-9 mb-2 p-3">{{ $dbco_customer->mcustomerbalance }}</dd>
					
					<dt class="col-sm-3 p-3 mb-2 bg-info text-white">Дата приостановления доступа к облачной базе данных:</dt>
					<dd class="col-sm-9 p-3 mb-2 bg-white text-dark">{{ $dbco_customer->dcustomerblock }}</dd>
				</dl>
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