<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		
		<title>{{ config('app.name', 'DBCO Inc.') }}</title>
		<meta name="format-detection" content="telephone=no">
		
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous" />
		
		<!-- Scripts 
		<script src="{{ asset('js/app.js') }}" defer></script> -->
		
		<!-- Custom styles for this template -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('dbco/css/style.css') }}" rel="stylesheet"> 
		
	</head>
	<body>
		
		<!-- ШАПКА -->
		<div class="container-fluid c_header">
			<div class="container" style="height:100%">
				<div class="d-flex align-items-center c_header">
					<div class="ml-auto header_right">
						@guest
						<a href="{{ route('login') }}">Вход</a>
						@if (Route::has('register'))
						/ <a href="{{ route('register') }}">Регистрация</a>
						@endif
						@else
						{{ Auth::user()->name }} 
						<a href="{{ route('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
							Выйти
						</a>
						
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
						@endguest
					</div> 
					
					
					<div class="header_flag"><a href="#"><img src="{{ asset('dbco/images/ru.png') }}" title="Русский" alt="Русский" /></a></div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#fff !important">
			<div class="container">
				<a class="navbar-brand" style="margin-right:0" href="/"><img src="{{ asset('dbco/images/logo.png') }}" /></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto ml-auto c_menu" >
						@auth
						<li class="nav-item active p_menu">
							<a class="nav-link" href="{{ url('/customer') }}">Личный кабинет</a>
						</li>
						<li class="nav-item p_menu">
							<a class="nav-link " href="{{ url('/dbcosolution') }}">Решения DBCO</a>
						</li>
						<li class="nav-item p_menu">
							<a class="nav-link " href="{{ route('tickets.main') }}">Поддержка</a>
						</li>
						@else
						<li class="nav-item active p_menu">
							<a class="nav-link" href="{{ route('login') }}">Войти</a>
						</li>
						<li class="nav-item p_menu">
							<a class="nav-link " href="{{ route('register') }}">Зарегистрироваться</a>
						</li>
						<li class="nav-item p_menu">
							<a class="nav-link " href="{{ url('/dbcosolution') }}">Решения DBCO</a>
						</li>
						@endauth	
					</ul>
					<form class="form-inline my-2 my-lg-0">
						<input class="form-control" type="text" placeholder=" ...">
					</form>
				</div>
			</div>
		</nav>
		<!-- /ШАПКА -->
		
		
		
		<main class="py-4">
            @yield('content')
		</main>
		
		
		<!-- ФУТЕР ДО КОНЦА -->
		<section class="footer mt-5">
			<div class="container-fluid mt-3" style="background:#1e1e1e">
				<div class="container">
					<div class="row footer_dark" style="position:relative">
						<div class="col-12 my-4 text-center">
							<div class="f_menu mr-5"><a href="{{ url('/customer') }}">Личный кабинет</a></div>
							<div class="f_menu mr-5"><a href="{{ url('/dbcosolution') }}">Решения DBCO</a></div>
						</div>
						
					</div>
					
					<div class="row" style="position:relative">
						<div class="col-12 my-4 pt-5 pt-md-1 text-center footer_copy">
							&copy; 2002-2019 DBCO. Все права защищены
						</div>
						
					</div>
				</div>
			</div>
		</section>		
		
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		
		
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		
		
		
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		
		<script src="{{ asset('dbco/js/js.js') }}></script>
		
		
		
		</body>
		</html>
		