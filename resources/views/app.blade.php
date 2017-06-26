<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laravel</title>

	<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="{{ URL::asset('vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('vendor/jquery.steps/build/css/jquery.steps.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('vendor/jquery.steps/build/css/main.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<!-- dataTables -->
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
  <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"> -->
  <!-- Bootstrap CSS -->
  <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> -->

	@stack('css')
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script> -->
	<script src="{{ URL::asset('vendor/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('vendor/js.cookie.js') }}"></script>
	<script src="{{ URL::asset('vendor/jquery.steps/build/jquery.steps.min.js') }}"></script>
</head>
<body>
	@stack('scripts-head')
	<header>
		<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
	  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <a class="navbar-brand" href="#">Paragourmet</a>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
	      </li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('checkout.index') }}">Produtos</a>
				</li>
	      <li class="nav-item">
	        <a class="nav-link" href="{{ route('cart.checkout') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> {{Cart::total()}}</a>
	      </li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Painel <span class="caret"></span></a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="{{ route('clients.index') }}">Clientes</a>
							<a class="dropdown-item" href="{{ route('restaurants.index') }}">Restaurantes</a>
							<a class="dropdown-item" href="{{ route('orders.index') }}">Pedidos</a>
							<a class="dropdown-item" href="{{ route('categories.index') }}">Categorias</a>
							<a class="dropdown-item" href="{{ route('products.index') }}">Produtos</a>
					</div>
				</li>
				@if(auth()->guest())
					@if(!Request::is('auth/login'))
						<li class="nav-item"><a class="nav-link" href="{{ url('/auth/login') }}">Login</a></li>
					@endif
					@if(!Request::is('auth/register'))
						<li class="nav-item"><a class="nav-link" href="{{ url('/auth/register') }}">Register</a></li>
					@endif
				@else
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="{{ url('/auth/logout') }}">Logout</a>
						</div>
					</li>
				@endif
			</ul>
	  </div>
	</nav>
</header>
<div class="container">
 	@include('flash::message')

	@yield('content')
</div>

	<!-- Scripts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<!-- DataTables -->
	<!-- <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> -->
	<!-- <script src="/vendor/datatables/buttons.server-side.js"></script> -->
	<!-- <script src="{{ URL::asset('vendor/jquery-ujs/src/rails.js') }}"></script> -->
	<script src="{{ URL::asset('js/app.js') }}"></script>
	<script>
    $('#flash-overlay-modal').modal();
 	</script>
	@stack('scripts')
	<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
</body>
</html>
