@extends('dbco.layouts.customer')

@section('customercontent')
	<script>
		var solution_in_load=[];
		@if(count($isInLoad)>0)
		@for($i=0;$i<count($isInLoad);$i++)
		solution_in_load.push({{$isInLoad[$i]}});
		@endfor


		@endif
	</script>
<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->
	<div class="row">
		<div class="container-fluid lk_formContainer">
			<div class="container">
				<div class="row d-flex align-items-center">
					<div class="col-2 offset-md-2 col-md-2">
						{{__('Автообновление:')}}
					</div>
					<div class="col-6">
						<div class="custom-control custom-switch">
							<input type="checkbox"   class="custom-control-input" solid="update" id="checkbox-switch-update"
								   name="checkbox-switch-update"
									{{ ($customer->icustomerautoupdatesolution) ? 'checked' : '' }} >
							<label class="custom-control-label" for="checkbox-switch-update"></label>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
<div class="container-fluid lk_formContainerWithoutMargin pb-5" id="maincontent">
	<div class="container">
		<div class="row">@if($errors->any())
				<h4>{{$errors->first()}}</h4>
			@endif
			<div class="col-12">
				@if (session('update_ok'))
					 				<div class="alert alert-success" role="alert">
						{{ __('Запрос на обновление успешно создан') }}
					</div>
				@endif





					<table class="table lk_table">
					<tbody>
						<tr style="border-bottom:solid 2px #ff4300">
							<th class="text-left" style="width:50%">{{__('Название решения')}}</th>
							<th class="text-left" style="width:20%">{{__('Версия')}}</th>
							<th class="text-left" style="width:10%">{{__('Установлено')}}</th>
							<th class="text-left" style="width:10%">{{__('Состояние')}}</th>
							<th class="text-left" style="width:10%">{{__('Оценка')}}</th>

						</tr>
						@if (count($solutions) > 0)
						@foreach ($solutions as $solution)
						<tr class="ttr">
							<td><a href="{{ route('dbcosolution.single',['id' => $solution->isolutionid]) }}"> {{  $solution->translate(\App::getLocale())['csolutionname']}}</a></td>
							<td style=" white-space:nowrap" class="row">
								<div class="col-md-3">@isset($viewversions_install[$solution->isolutionid]){{$viewversions_install[$solution->isolutionid]}}@endif</div>

 {{--				<div class="col-md-6">@if($solution->pivot->iinstallversion!=$solution->iinstallversion)  --}}

								<div class="col-md-6">@if($solution->pivot->iinstallversion!=$solution->isolutionversion)

									<form method="post" action="/lk/solutions/getupdate">@csrf
										<input type="hidden" name="isolutionid" value="{{$solution->isolutionid}}">
						 				<button type="submit" class="btn btn-primary   standardToggleButton " style=" white-space:nowrap; height:30px; padding-top: 3px; margin-top: -2px; height: 27px;
" title="{{__('Обновить до версии')}} {{ $viewversions[$solution->isolutionid] }}"> >>  @isset($viewversions[$solution->isolutionid] ){{ $viewversions[$solution->isolutionid] }}@endif</button></form>

								@endif</div>
							</td>
							<td> <div>{{date('Y-m-d H:i',strtotime($solution->pivot->created_at))}}</div>
							     <div><font color="red">{{ ($solution->pivot->iinstallstate) ? '' : date('Y-m-d H:i',strtotime($solution->pivot->updated_at)) }}</font></div></td>
							<td class="status_payWait">
								<div class="  sol_id_{{ $solution->isolutionid }}" id="sol_id_{{ $solution->isolutionid }}">
									@if(in_array( $solution->isolutionid,$isInLoad))
										<div class="spinner-border @if(($solution->iinstallstate==0)&&($solution->iinstallstateext==1))  color_not_blue  @endif
										@if(($solution->iinstallstate==1)&&($solution->iinstallstateext==0))  color_blue  @endif" role="status">
											<span class="sr-only">Loading...</span>
										</div>

									@else<div class="custom-control custom-switch">
										<input type="checkbox" solid="{{ $solution->isolutionid }}" class="custom-control-input" id="checkbox-switch-{{ $solution->isolutionid }}"
											   name="checkbox-switch-{{ $solution->isolutionid }}"
												{{ ($solution->isOwned) ? 'checked' : '' }}>
										<label class="custom-control-label" for="checkbox-switch-{{ $solution->isolutionid }}"></label>
									</div>   @endif

								</div>
							</td>
							<td id="rating_fild_{{ $solution->isolutionid }}">@for($i=1;$i<=5;$i++)
									<i class="fas fa-star mr-1 mrm-{{$i}} star_cabinet @if($solution->pivot->iinstallraiting<$i) mr-not @else mr-ys @endif" data-rating="{{$i}}" title="{{$i}}" data-solid="{{ $solution->isolutionid }}" ></i>

								@endfor</td>



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