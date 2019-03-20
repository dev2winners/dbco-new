@extends('dbco.layouts.main')

@section('content')
<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР. ОДНО РЕШЕНИЕ, КАРТОЧКА ТОВАРА -->
<div class="container oneSolution mt-5">
	<div class="row">
		
		<div class="col-12 col-md-6 col-lg-8">
			<h1>Ресурсы</h1>
			<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>
			<!-- ОДНА СТРОКА ФОРМЫ -->
			<div class="container-fluid lk_formContainerWithoutMargin pb-5">
				<div class="container">
					<div class="row d-flex align-items-center">
						<div class="col-12 form-check text-center">
							<a href="https://download.dbco.ru/dbco.exe" class="btn btn-danger formSubmit">Скачать dbco</a>
						</div>
					</div>
				</div>
			</div>
			<!-- /ОДНА СТРОКА ФОРМЫ -->
			
		</div>
	</div>
	
</div>
<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР. ОДНО РЕШЕНИЕ, КАРТОЧКА ТОВАРА -->

<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->
<div class="container-fluid lk_formContainerWithoutMargin pb-5">
	<div class="container">
		
		<div class="row">
			<div class="col-12">
				<h1>Локализации</h1>
				<table class="table lk_table">
					<tbody>
						<tr style="border-bottom:solid 2px #ff4300">
							<th class="text-left" style="width:30%">Файл</th>
							<th class="text-left" style="width:70%">Название</th>
						</tr>
						@if (count($languages) > 0)
						@foreach ($languages as $language)
						<tr class="ttr">
							<td><a href="https://download.dbco.ru/{{ $language->cdownloadfile }}" target="_blank">{{ $language->cdownloadfile }}</a></td>
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

@endsection