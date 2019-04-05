@extends('dbco.layouts.customer')

@section('customercontent')

<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->

<div class="container-fluid lk_formContainerWithoutMargin pb-5" id="maincontent">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<table class="table lk_table">
					<tbody>
						<tr style="border-bottom:solid 2px #ff4300">
							<th class="text-left" style="width:50%">Название решения</th>
							<th class="text-left" style="width:20%">Версия</th>
							<th class="text-left" style="width:10%">Установлено</th>
							<th class="text-left" style="width:10%">Удалено</th>
							<th class="text-left" style="width:10%">Состояние</th>
						</tr>
						@if (count($solutions) > 0)
						@foreach ($solutions as $solution)
						<tr class="ttr">
							<td><a href="{{ route('dbcosolution.single',['id' => $solution->isolutionid]) }}">{{ $solution->csolutionname }}</a></td>
							<td>{{ $viewversions[$solution->isolutionid] }}</td>
							<td>{{ $solution->pivot->created_at }}</td>
							<td>{{ ($solution->pivot->iinstallstate) ? '' : $solution->pivot->updated_at }}</td>
							<td class="status_payWait">
								<div class="custom-control custom-switch">
									<input type="checkbox" solid="{{ $solution->isolutionid }}" class="custom-control-input" id="checkbox-switch-{{ $solution->isolutionid }}"
									name="checkbox-switch-{{ $solution->isolutionid }}"
									{{ ($solution->isOwned) ? 'checked' : '' }}>
									<label class="custom-control-label" for="checkbox-switch-{{ $solution->isolutionid }}"></label>
								</div>	
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