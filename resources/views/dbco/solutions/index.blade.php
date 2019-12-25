@extends('dbco.layouts.main')

@section('content')
<script>
	var solution_in_load=[];
	@if(count($isInLoad)>0)
@for($i=0;$i<count($isInLoad);$i++)
			solution_in_load.push({{$isInLoad[$i]}});
	@endfor


@endif
</script>


<div class="col-md-12" id="maincontent">
	
	<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. ЗАГОЛОВОК -->
	<div class="container-fluid offer2">
		<div class="text-center mt-4">
			<h1>{{__('Все решения')}}</h1>
		</div>
	</div>
	<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->
	
	@if ($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
	@endif
	
	<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. category -->
<!-- Я	<div class="col-12 offset-md-2 col-md-8 offset-md-2 topReshenSubMenu pb-4 d-md-flex align-items-center justify-content-between text-center mt-4">  -->
	<div class="col-12 offset-md-2 col-md-8 offset-md-2 topReshenSubMenu pb-4 align-items-center justify-content-between text-center mt-4">
		
		@foreach ($categories as $category)
		<a href="{{ route('dbcosolution.index', ['isolutioncategory' => $category->icategoryid]) }}" class="{{ ($category->icategoryid == $isolutioncategory) ? 'active' : '' }}">{{ __($category->ccategoryname) }}</a>
		@endforeach
		
	</div>
	<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. category -->
	
	
	<div>
		@if (count($solutions) > 0)
		<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->
		<div class="container-fluid topReshen mt-5 mb-5">
			<div class="container" style="height:100%">
				
				
				<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->
				<div class="row tbodi_table">

					@include('dbco.solutions.single_block')

						
					</div>
				</div>
			</div>
			<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->	
			
			
			
			@else
			<div class="container-fluid topReshen mt-5 mb-5">
				<div class="container" style="height:100%">				
					<div class="row">
						<div class="alert alert-danger ml-auto mr-auto">
							<p class="">{{__('По вашему запросу решений не найдено')}}...</p>
						</div>
					</div>
				</div>
			</div>
			@endif
		</div>

	<div class="col-md-12 field_for_button text-center">
		@if($solutions->lastPage()>1)
			<button type="button " class="btn btn-primary ticket_add_page col-md-6 standardAuthButton" data-page="1"
					data-url="/dbcosolution/{{$isolutioncategory}}" >Показать еще</button>
		@endif
	</div>

		
	</div>
@endsection