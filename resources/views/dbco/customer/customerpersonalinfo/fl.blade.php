<form class="form" action="{{ route('customer.update') }}" method="POST">
@csrf
@method('PUT')
    <input type="hidden" name="icustomerlegal" value="0">
<!-- ОДНА СТРОКА ФОРМЫ -->
    <div class="container-fluid lk_formContainer">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-2 offset-md-2 col-md-2">
                    {{__('Фамилия')}}:
                </div>
                <div class="col-6">
                    <input type="text" name="ccustomernamef" value="{{ $dbco_customer->ccustomernamef }}" id="ccustomernamef" class="form-control m_formControl" placeholder="{{__('Фамилия')}}" style="max-width: 100%;"/>
                </div>
            </div>
        </div>
    </div>
    <!-- /ОДНА СТРОКА ФОРМЫ -->
    <div class="container-fluid lk_formContainer">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-2 offset-md-2 col-md-2">
                    {{__('Имя')}}:
                </div>
                <div class="col-6">
                    <input type="text" name="ccustomernamei" value="{{ $dbco_customer->ccustomernamei }}" id="ccustomernamei" class="form-control m_formControl" placeholder="{{__('Имя')}}" style="max-width: 100%;"/>
                </div>
            </div>
        </div>
    </div>
    <!-- /ОДНА СТРОКА ФОРМЫ -->
    <div class="container-fluid lk_formContainer">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-2 offset-md-2 col-md-2">
                    {{__('Отчество')}}:
                </div>
                <div class="col-6">
                    <input type="text" name="ccustomernameo" value="{{ $dbco_customer->ccustomernameo }}" id="ccustomernameo" class="form-control m_formControl" placeholder="{{__('Отчество')}}" style="max-width: 100%;"/>
                </div>
            </div>
        </div>
    </div>


    <!-- /ОДНА СТРОКА ФОРМЫ -->
    <div class="container-fluid lk_formContainer">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-2 offset-md-2 col-md-2">
                    {{__('Дата рождения')}}:
                </div>
                <div class="col-6">
                    <input type="text" name="dcustomerbirthday"    value="{{ $dbco_customer->dcustomerbirthday }}" id="dcustomerbirthday" class="form-control m_formControl" placeholder="{{__('Дата рождения')}}" style="max-width: 100%;"/>
                </div>
            </div>
        </div>
    </div>
    <!-- /ОДНА СТРОКА ФОРМЫ -->
    <div class="container-fluid lk_formContainer">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-2 offset-md-2 col-md-2">
                    {{__('Адрес')}}:
                </div>
                <div class="col-6">
                    <input type="text" name="ccustomeraddress" value="{{ $dbco_customer->ccustomeraddress }}" id="ccustomeraddress" class="form-control m_formControl" placeholder="{{__('Адрес')}}" style="max-width: 100%;"/>
                </div>
            </div>
        </div>
    </div>
    <!-- /ОДНА СТРОКА ФОРМЫ -->
    <div class="container-fluid lk_formContainer">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-2 offset-md-2 col-md-2">
                    {{__('ИНН')}}:
                </div>
                <div class="col-6">
                    <input type="text" name="ccustomerinn" value="{{ $dbco_customer->ccustomerinn }}" id="ccustomerinn" class="form-control m_formControl" placeholder="{{__('ИНН')}}" style="max-width: 100%;"/>
                </div>
            </div>
        </div>
    </div>


    <!-- ОДНА СТРОКА ФОРМЫ -->
    <div class="container-fluid lk_formContainer">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-2 offset-md-2 col-md-2">
                    {{__('Телефон')}}:
                </div>
                <div class="col-6">
                    <input type="text" name="ccustomerphone" value="{{ $dbco_customer->ccustomerphone }}" id="ccustomerphone" class="form-control m_formControl" placeholder="" disabled style="max-width: 100%;" />
                </div>
            </div>
        </div>
    </div>
    <!-- /ОДНА СТРОКА ФОРМЫ -->


    <!-- ОДНА СТРОКА ФОРМЫ -->
    <div class="container-fluid lk_formContainer">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-2 offset-md-2 col-md-2">
                    E-mail:
                </div>
                <div class="col-6">
                    <input type="text" name="ccustomermail" value="{{ $dbco_customer->ccustomermail }}" id="ccustomermail" class="form-control m_formControl" placeholder="mail@mail.com" disabled style="max-width: 100%;" />
                </div>
            </div>
        </div>
    </div>
    <!-- /ОДНА СТРОКА ФОРМЫ -->


    <!-- ОДНА СТРОКА ФОРМЫ -->
    <div class="container-fluid lk_formContainer">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-2 offset-md-2 col-md-2">
                    {{__('Комментарии')}}:
                </div>
                <div class="col-6">
                    <textarea name="ccustomernote" value="{{ $dbco_customer->ccustomernote }}" id="ccustomernote" class="form-control m_formControl" rows="3">{{ $dbco_customer->ccustomernote }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <!-- /ОДНА СТРОКА ФОРМЫ -->


    <!-- ОДНА СТРОКА ФОРМЫ -->
    <div class="container-fluid lk_formContainerWithoutMargin pt-5 pb-4">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-12 form-check text-center">
                    <input type="checkbox" class="form-check-input" id="Check1" checked>
                    <label class="form-check-label" for="Check1">{{__('Согласие на обработку персональных данных')}}</label>
                </div>
            </div>
        </div>
    </div>



    <div class="container-fluid lk_formContainerWithoutMargin pb-5">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-12 form-check text-center">
                    <button type="submit" class="btn btn-primary standardToggleButton">{{__('Сохранить')}}</button>
                </div>
            </div>
        </div>
    </div>
</form>
