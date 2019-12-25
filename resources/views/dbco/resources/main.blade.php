@extends('dbco.layouts.main')

@section('content')

<div class="col-12 text-center mt-5 px-4">
	{!! isset($page['resources_1']->cparagraphtitle) ? $page['resources_1']->cparagraphtitle : '' !!}
	{!! isset($page['resources_1']->cparagraphtext ) ? $page['resources_1']->cparagraphtext  : 'resources_1' !!}
</div>

<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР. ОДНО РЕШЕНИЕ, КАРТОЧКА ТОВАРА -->

<div class="container-fluid offer4 mt-5">
	<div class="container" style="height:100%">
		<div class="row" style="height:100%">
			
			<div class="col-6 d-none d-lg-block offer7_img_block">
				
			</div>
			
			<div class="col-12 col-lg-6 offer4_right pl-5 pb-4">
				<h3 class="my-4">		{!! isset($page['resources_2']->cparagraphtitle) ? $page['resources_2']->cparagraphtitle : '' !!}</h3>

				{!! isset($page['resources_2']->cparagraphtext ) ? $page['resources_2']->cparagraphtext  : 'resources_2' !!}
				<a href="/download/dbco.exe" role="button" class="btn btn-danger but1 px-4">{{__('Скачать dbco')}}</a>
			</div>
			
		</div>
	</div>
</div>

<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР. ОДНО РЕШЕНИЕ, КАРТОЧКА ТОВАРА -->

<div class="col-12 text-center mt-5 px-4">
	{!! isset($page['resources_3']->cparagraphtitle) ? $page['resources_3']->cparagraphtitle : '' !!}
	{!! isset($page['resources_3']->cparagraphtext ) ? $page['resources_3']->cparagraphtext  : 'resources_3' !!}
</div>

<div class="col-12 text-center mt-5 px-4">
	{!! isset($page['resources_4']->cparagraphtitle) ? $page['resources_4']->cparagraphtitle : '' !!}
	{!! isset($page['resources_4']->cparagraphtext ) ? $page['resources_4']->cparagraphtext  : 'resources_4' !!}
</div>


<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->
<div class="container-fluid lk_formContainerWithoutMargin pb-5">
	<div class="container">
		
		<div class="row">
			<div class="col-12">
				<h1>{{__('Локализации')}}</h1>
				{!! isset($page['resources_5']->cparagraphtitle) ? $page['resources_5']->cparagraphtitle : '' !!}
				{!! isset($page['resources_5']->cparagraphtext ) ? $page['resources_5']->cparagraphtext  : 'resources_5' !!}
				<table class="table lk_table">
					<tbody>
						<tr style="border-bottom:solid 2px #ff4300">
							
							<th class="text-left" style="width:30%">{{__('Файл')}}</th>
							<th class="text-left" style="width:70%">{{__('Название')}}</th>
						</tr>
						@if (count($languages) > 0)
						@foreach ($languages as $language)
						<tr class="ttr">
							
							<td><a href="/download/{{ $language->cdownloadfile }}" target="_blank" download><img src="https://dbco.ru/images/{{ $language->cdownloadico }}" class="mr-2" /> {{ $language->cdownloadfile }}</a></td>
							<td>{{ $language->cdownloadname }}</td>
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

<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->
<div class="container-fluid lk_formContainerWithoutMargin pb-5">
	<div class="container">
		
		<div class="row">
			<div class="col-12">
				<h1>{{__('Инструкции')}}</h1>
				{!! isset($page['resources_6']->cparagraphtitle) ? $page['resources_6']->cparagraphtitle : '' !!}
				{!! isset($page['resources_6']->cparagraphtext ) ? $page['resources_6']->cparagraphtext  : 'resources_6' !!}
				<table class="table lk_table">
					<tbody>
						<tr style="border-bottom:solid 2px #ff4300">
							<th class="text-left" style="width:30%">{{__('Файл')}}</th>
							<th class="text-left" style="width:70%">{{__('Название')}}</th>
						</tr>
						@if (count($docs) > 0)
						@foreach ($docs as $doc)
						<tr class="ttr">
							<td><a href="/download/{{ $doc->cdownloadfile }}" target="_blank" download>{{ $doc->cdownloadfile }}</a></td>
							<td>{{ $doc->cdownloadname }}</td>
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

<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->
<div class="container-fluid lk_formContainerWithoutMargin pb-5">
	<div class="container">
		
		<div class="row">
			<div class="col-12">
				<h1>{{__('Дополнительно')}}</h1>
				{!! isset($page['resources_7']->cparagraphtitle) ? $page['resources_7']->cparagraphtitle : '' !!}
				{!! isset($page['resources_7']->cparagraphtext ) ? $page['resources_7']->cparagraphtext  : 'resources_7' !!}
				<table class="table lk_table">
					<tbody>
						<tr style="border-bottom:solid 2px #ff4300">
							<th class="text-left" style="width:30%">{{__('Файл')}}</th>
							<th class="text-left" style="width:70%">{{__('Название')}}</th>
						</tr>
						@if (count($addins) > 0)
						@foreach ($addins as $addin)
						<tr class="ttr">
							<td><a href="/download/{{ $addin->cdownloadfile }}" target="_blank" download>{{ $addin->cdownloadfile }}</a></td>
							<td>{{ $addin->cdownloadname }}</td>
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

<div class="col-12 text-center mt-5 px-4">
	{!! isset($page['resources_8']->cparagraphtitle) ? $page['resources_8']->cparagraphtitle : '' !!}
	{!! isset($page['resources_8']->cparagraphtext ) ? $page['resources_8']->cparagraphtext  : 'resources_8' !!}
</div>

@endsection