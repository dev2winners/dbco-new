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
							<th class="text-left" style="width:50%">Название решения</th>
							<th class="text-left" style="width:10%">Версия</th>
							<th class="text-left" style="width:10%">Дата создания</th>
							<th class="text-left" style="width:10%">Дата изменения</th>
							<th class="text-left" style="width:20%">Состояние</th>
						</tr>
						@if (count($solutions) > 0)
						@foreach ($solutions as $solution)
						<tr class="ttr">
							<td><a href="{{ route('dbcosolution.single',['id' => $solution->isolutionid]) }}">{{ $solution->csolutionname }}</a></td>
							<td>{{ ($solution->pivot->iinstallversion) ? $versions[$solution->pivot->iinstallversion] : 'нет данных' }}</td>
							<td>{{ $solution->pivot->created_at }}</td>
							<td>{{ ($solution->pivot->iinstallstate) ? 'нет данных' : $solution->pivot->updated_at }}</td>
							<td class="status_payWait">
								<form action="{{ route('dbcosolution.toggle', $solution->isolutionid) }}" method="POST">		
									@csrf					
									<button type="submit" class="btn btn-{{ ($solution->pivot->iinstallstate) ? 'success' : 'secondary' }} ml-auto abtn">{{ ($solution->pivot->iinstallstate) ? 'УЖЕ МОЁ' : 'ПОДКЛЮЧИТЬ' }}</button>	
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

@endsection