<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#fff !important">
	<div class="container">
		<a class="navbar-brand" style="margin-right:0" href="/"><img src="{{ asset('dbco/images/logo.png') }}" /></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto ml-auto c_menu" >
				
				<li class="nav-item p_menu {{ ('root' == Route::currentRouteName()) ? 'active' : '' }}">
					<a class="nav-link" href="{{ route('root') }}">Главная</a>
				</li>
				<li class="nav-item p_menu {{ ('dbcosolution.index' == Route::currentRouteName()) ? 'active' : '' }}">
					<a class="nav-link " href="{{ route('dbcosolution.index') }}">Решения dbco</a>
				</li>
				<li class="nav-item p_menu {{ ('resources.main' == Route::currentRouteName()) ? 'active' : '' }}">
					<a class="nav-link " href="{{ route('resources.main') }}">Ресурсы</a>
				</li>				
				<li class="nav-item p_menu {{ ('customer.main' == Route::currentRouteName()) ? 'active' : '' }}">
					<a class="nav-link" href="{{ route('customer.main') }}">Мой кабинет</a>
				</li>
					
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control" type="text" placeholder=" ...">
			</form>
		</div>
	</div>
</nav>