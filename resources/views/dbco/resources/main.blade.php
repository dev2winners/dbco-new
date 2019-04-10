@extends('dbco.layouts.main')

@section('content')

<div class="col-12 text-center mt-5 px-4">
	{!! isset($page['content'][0]['title']) ? $page['content'][0]['title'] : '' !!}
	{!! isset($page['content'][0]['text']) ? $page['content'][0]['text'] : '' !!}
</div>

<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР. ОДНО РЕШЕНИЕ, КАРТОЧКА ТОВАРА -->

<div class="container-fluid offer4 mt-5">
	<div class="container" style="height:100%">
		<div class="row" style="height:100%">
			
			<div class="col-6 d-none d-lg-block offer7_img_block">
				
			</div>
			
			<div class="col-12 col-lg-6 offer4_right pl-5 pb-4">
				<h3 class="my-4">{!! isset($page['content'][1]['title']) ? $page['content'][1]['title'] : '' !!}</h3>
				{!! isset($page['content'][1]['text']) ? $page['content'][1]['text'] : '' !!}
				<a href="https://download.dbco.ru/dbco.exe" role="button" class="btn btn-danger but1 px-4">Скачать dbco</a>
			</div>
			
		</div>
	</div>
</div>

<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР. ОДНО РЕШЕНИЕ, КАРТОЧКА ТОВАРА -->

<div class="col-12 text-center mt-5 px-4">
	{!! isset($page['content'][2]['title']) ? $page['content'][2]['title'] : '' !!}
	{!! isset($page['content'][2]['text']) ? $page['content'][2]['text'] : '' !!}
</div>

<div class="col-12 text-center mt-5 px-4">
	{!! isset($page['content'][3]['title']) ? $page['content'][3]['title'] : '' !!}
	{!! isset($page['content'][3]['text']) ? $page['content'][3]['text'] : '' !!}
</div>


<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->
<div class="container-fluid lk_formContainerWithoutMargin pb-5">
	<div class="container">
		
		<div class="row">
			<div class="col-12">
				<h1>Локализации</h1>
				{!! isset($page['content'][4]['title']) ? $page['content'][4]['title'] : '' !!}
				{!! isset($page['content'][4]['text']) ? $page['content'][4]['text'] : '' !!}
				<table class="table lk_table">
					<tbody>
						<tr style="border-bottom:solid 2px #ff4300">
							
							<th class="text-left" style="width:30%">Файл</th>
							<th class="text-left" style="width:70%">Название</th>
						</tr>
						@if (count($languages) > 0)
						@foreach ($languages as $language)
						<tr class="ttr">
							
							<td><a href="https://download.dbco.ru/{{ $language->cdownloadfile }}" target="_blank"><img src="https://static.dbco.ru/{{ $language->cdownloadico }}" class="mr-2" /> {{ $language->cdownloadfile }}</a></td>
							<td>{{ $language->cdownloadname }}</td>
						</tr>
						@endforeach	
						@else
						
						@endif
					</tbody>
				</table>
				{!! $languages->links() !!}
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
				<h1>Инструкции</h1>
				{!! isset($page['content'][5]['title']) ? $page['content'][5]['title'] : '' !!}
				{!! isset($page['content'][5]['text']) ? $page['content'][5]['text'] : '' !!}
				<table class="table lk_table">
					<tbody>
						<tr style="border-bottom:solid 2px #ff4300">
							<th class="text-left" style="width:30%">Файл</th>
							<th class="text-left" style="width:70%">Название</th>
						</tr>
						@if (count($docs) > 0)
						@foreach ($docs as $doc)
						<tr class="ttr">
							<td><a href="https://download.dbco.ru/{{ $doc->cdownloadfile }}" target="_blank">{{ $doc->cdownloadfile }}</a></td>
							<td>{{ $doc->cdownloadname }}</td>
						</tr>
						@endforeach	
						@else
						
						@endif
					</tbody>
				</table>
				{!! $languages->links() !!}
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
				<h1>Дополнительно</h1>
				{!! isset($page['content'][6]['title']) ? $page['content'][6]['title'] : '' !!}
				{!! isset($page['content'][6]['text']) ? $page['content'][6]['text'] : '' !!}
				<table class="table lk_table">
					<tbody>
						<tr style="border-bottom:solid 2px #ff4300">
							<th class="text-left" style="width:30%">Файл</th>
							<th class="text-left" style="width:70%">Название</th>
						</tr>
						@if (count($addins) > 0)
						@foreach ($addins as $addin)
						<tr class="ttr">
							<td><a href="https://download.dbco.ru/{{ $addin->cdownloadfile }}" target="_blank">{{ $addin->cdownloadfile }}</a></td>
							<td>{{ $addin->cdownloadname }}</td>
						</tr>
						@endforeach	
						@else
						
						@endif
					</tbody>
				</table>
				{!! $languages->links() !!}
			</div>
		</div>
	</div>
</div>
<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. ФОРМА -->

<div class="col-12 text-center mt-5 px-4">
	{!! isset($page['content'][7]['title']) ? $page['content'][7]['title'] : '' !!}
	{!! isset($page['content'][7]['text']) ? $page['content'][7]['text'] : '' !!}
</div>

@endsection