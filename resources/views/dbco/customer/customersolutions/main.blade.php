@extends('dbco.layouts.main')

@section('content')

<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР. ШАПКА -->
<div class="container mt-5">
	<div class="row">
		<div class="col-12 text-center">
			<h1>Мой кабинет</h1>
		</div>
		
		@include('dbco.layouts.customertopmenu')
		
		<div class="col-12 text-center mt-4">
			<p class="text-center"></p>
		</div>
		
	</div>
</div>
<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР. ШАПКА -->

<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->
<div class="container-fluid lk_formContainerWithoutMargin mt-5 pt-5">
<div class="container">
<div class="row">
	<div class="col-12 text-center">
		<h2>Ваши решения</h2>
	</div>
</div>
</div>
</div>

<div class="container-fluid lk_formContainerWithoutMargin pb-5">
<div class="container">
<div class="row">
	<div class="col-12">
		<table class="table lk_table">
		<tbody>
			<tr style="border-bottom:solid 2px #ff4300">
			<th class="text-left" style="width:20%">Название продукта</th>
			<th class="text-left" style="width:20%">Дата начала активации</th>
			<th class="text-left" style="width:20%">Окончание активации</th>
			<th class="text-left" style="width:20%">Размер базы данных</th>
			<th class="text-left" style="width:20%">Состояние</th>
			</tr>
			
			<tr class="ttr">
			<td><a href="#">Название</a></td>
			<td>08.08.18</td>
			<td>08.08.18</td>
			<td>123Mb</td>
			<td class="status_active">Активно</td>
			</tr>
			
			<tr class="ttr">
			<td><a href="#">Название</a></td>
			<td>08.08.18</td>
			<td>08.08.18</td>
			<td>123Mb</td>
			<td>Неактивно</td>
			</tr>
			
			<tr class="ttr">
			<td><a href="#">Название</a></td>
			<td>08.08.18</td>
			<td>08.08.18</td>
			<td>123Mb</td>
			<td class="status_payWait">Ожидает оплаты</td>
			</tr>

		</tbody>
		</table>
	</div>
</div>
</div>
</div>



<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. ФОРМА -->

@endsection