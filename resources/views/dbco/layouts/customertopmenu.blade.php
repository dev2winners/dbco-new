<div class="col-12 offset-md-2 col-md-8 offset-md-2 topReshenSubMenu pb-4 d-md-flex align-items-center justify-content-between text-center mt-4">
	
	<a href="{{ route('customer.main') }}" class="{{ ('customer.main' == Route::currentRouteName()) ? 'active' : '' }}">Персональная информация</a>
	<a href="{{ route('customersolutions.main') }}" class="{{ ('customersolutions.main' == Route::currentRouteName()) ? 'active' : '' }}">Мои решения</a>
	<a href="{{ route('customerfinance.main') }}" class="{{ ('customerfinance.main' == Route::currentRouteName()) ? 'active' : '' }}">Финансы</a>
	<a href="{{ route('tickets.main') }}" class="{{ ('tickets.main' == Route::currentRouteName()) ? 'active' : '' }}">Поддержка</a>
	<a href="{{ route('customerdb.main') }}" class="{{ ('customerdb.main' == Route::currentRouteName()) ? 'active' : '' }}">База данных</a>
	
</div>