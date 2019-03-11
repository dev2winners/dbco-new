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
							<th class="text-left" style="width:20%">Название решения</th>
							<th class="text-left" style="width:20%">Версия</th>
							<th class="text-left" style="width:20%">Включено</th>
							<th class="text-left" style="width:20%">Выключено</th>
							<th class="text-left" style="width:20%">Состояние</th>
						</tr>
						@if (count($solutions) > 0)
						@foreach ($solutions as $solution)
						<tr class="ttr">
							<td><a href="{{ route('dbcosolution.single',['id' => $solution->isolutionid]) }}">{{ $solution->csolutionname }}</a></td>
							<td>{{ $versions[$solution->pivot->iinstallversion] }}</td>
							<td>{{ $solution->pivot->dinstalldate }}</td>
							<td>{{ ($solution->pivot->iinstallstate) ? 'пустая база блять' : $solution->pivot->dinstalledit }}</td>
							<td class="status_payWait">завтра вечером надеюсь будет</td>
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