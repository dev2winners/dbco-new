@foreach ($solutions as $solution)
    <!-- КАРТОЧКА -->
    <div class="col-12 col-md-6 col-lg-4 col-xl-3 topReshCol pb-4">
        <div class="card p-3">
            <div class="stars text-right">
                @for($i=1;$i<=5;$i++)
                <i class="fas fa-star mr-1 @if($solution->fsolutionraiting<$i) mr-not @endif"></i>

                @endfor
            </div>
            <a href="{{ route('dbcosolution.single', ['id' => $solution->isolutionid]) }}">
                <img src="/images/{{ $solution->csolutionpicture }}" class="img-fluid d-flex m-auto" style="width:108px;" />
                <h2 class="text-center mt-4">{{$solution->translate(\App::getLocale())['csolutionname'] }}</h2>
            </a>
            <p class="mt-3 mb-1">{{ $solution->translate(\App::getLocale())['csolutiontext'] }}</p>
            <p class="my-0"><span>{{__('Автор')}}: </span> {{ $authors[$solution->isolutionid] }}</p>
            <p class="my-0"><span>{{__('Дата')}}: </span> {{ date_create($solution->dsolutiondate)->Format('Y-m-d') }}</p>


           <div class="circle sol_id_{{ $solution->isolutionid }}" id="sol_id_{{ $solution->isolutionid }}">
                   @if(in_array( $solution->isolutionid,$isInLoad))
             <div class="spinner-border
@if(($solution->iinstallstate==0)&&($solution->iinstallstateext==1))  color_not_blue  @endif
                    @if(($solution->iinstallstate==1)&&($solution->iinstallstateext==0))  color_blue  @endif
" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>

                    @else<div class="custom-control custom-switch">
                    <input type="checkbox" solid="{{ $solution->isolutionid }}" class="custom-control-input" id="checkbox-switch-{{ $solution->isolutionid }}"
                           name="checkbox-switch-{{ $solution->isolutionid }}"
                            {{ ($solution->isOwned) ? 'checked' : '' }}>
                    <label class="custom-control-label" for="checkbox-switch-{{ $solution->isolutionid }}"></label>
                </div>   @endif

            </div>
        </div>
    </div>



    <!-- /КАРТОЧКА -->
@endforeach