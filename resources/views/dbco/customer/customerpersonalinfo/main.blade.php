@extends('dbco.layouts.customer')

@section('customercontent')
<https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css
<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. ФОРМА -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css"  >

<div class="container-fluid lk_formContainer">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-2 offset-md-2 col-md-2">
					{{--{{__('Физ./Юр. лицо')}}:--}}
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" name="icustomerlegal"  value="0" id="m2" @if($dbco_customer->icustomerlegal==0) checked @endif  class="custom-control-input icustomerlegal" >
					<label class="custom-control-label"  for="m2"  >{{__('Физическое лицо')}}</label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" name="icustomerlegal"  value="1"   @if($dbco_customer->icustomerlegal==1) checked @endif  class="custom-control-input icustomerlegal" id="m1" >
					<label class="custom-control-label"  for="m1"  >{{__('Юридическое лицо')}}</label>
				</div>


			</div>
		</div>
	</div>


	 <div class="fo_fl" @if($dbco_customer->icustomerlegal==1) style="display: none" @endif >

		 @include('dbco.customer.customerpersonalinfo.fl')
	 </div>
<div class="fo_ul" @if($dbco_customer->icustomerlegal==0) style="display: none" @endif >

	@include('dbco.customer.customerpersonalinfo.ul')
</div>
@endsection