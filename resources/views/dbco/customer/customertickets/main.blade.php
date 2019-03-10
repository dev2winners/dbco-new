@extends('dbco.layouts.customer')

@section('customercontent')

<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->
<form class="form" action="{{ route('tickets.store') }}" method="POST">
	@csrf
	@method('POST')
	
	<div class="container-fluid lk_formContainerWithoutMargin pb-5">
		<div class="container py-5" style="background:#fff">
			<div class="form-group row">
				<label for="f_tema" class="col-2 col-form-label text-right">Тема:</label>
				<div class="col-8">
					<input type="text" class="form-control" id="f_tema" value="">
				</div>
			</div>
			
			<div class="form-group row">
				<label for="ctickettext" class="col-2 col-form-label text-right">Сообщение:</label>
				<div class="col-8">
					<textarea class="form-control" rows="10" id="ctickettext" value="" name="ctickettext"></textarea>
				</div>
			</div>
			
			<div class="form-group row">
				<div class="offset-2 col-10">
					<a href="#" class="f_file">Прикрепить файл</a>
				</div>
			</div>
			
			<div class="form-group row">
				<div class="offset-2 col-10">
					<button type="submit" class="btn btn-danger formSubmit">Отправить</button>
				</div>
			</div>
		</div>
	</div>
</form>


<div class="container-fluid lk_formContainerWithoutMargin pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<table class="table lk_table">
					<tbody>
						<tr style="border-bottom:solid 2px #ff4300">
							<th class="text-left" style="width:20%">ID</th>
							<th class="text-left" style="width:60%">Тема</th>
							<th class="text-left" style="width:20%">Дата</th>
						</tr>
						@if (count($tickets) > 0)
						@foreach ($tickets as $ticket)
						<tr class="ttr">
							<td>{{ $ticket->iticketid }}</td>
							<td><a href="#" onclick="return false">{{ $ticket->ctickettext }}</a></td>
							<td>{{ $ticket->dticketdate }}</td>
						</tr>
						@endforeach	
						@else
						
						@endif
						
					</tbody>
				</table>
				{!! $tickets->links() !!}
			</div>
		</div>
	</div>
</div>

<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. ФОРМА -->

@endsection