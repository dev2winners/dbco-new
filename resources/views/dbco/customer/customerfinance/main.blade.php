@extends('dbco.layouts.customer')

@section('customercontent')


<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->


<div class="container-fluid lk_formContainerWithoutMargin pb-5">
<div class="container">
<div class="row">
	<div class="col-12">
		<table class="table lk_table">
		<tbody>
			<tr style="border-bottom:solid 2px #ff4300">
			<th class="text-left" style="width:20%">Дата</th>
			<th class="text-left" style="width:20%">Номер</th>
			<th class="text-left" style="width:40%">Назначение</th>
			<th class="text-left" style="width:20%">Сумма</th>
			</tr>
			
			<tr class="ttr">
			<td>08.08.18</td>
			<td>4445</td>
			<td><a href="#">Назначение</a></td>
			<td>808.8</td>
			</tr>
			
			<tr class="ttr">
			<td>08.08.18</td>
			<td>4445</td>
			<td><a href="#">Назначение</a></td>
			<td>808.8</td>
			</tr>
			
			<tr class="ttr">
			<td>08.08.18</td>
			<td>4445</td>
			<td><a href="#">Назначение</a></td>
			<td>808.8</td>
			</tr>
			

		</tbody>
		</table>
	</div>
</div>
</div>
</div>



<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. ФОРМА -->

@endsection