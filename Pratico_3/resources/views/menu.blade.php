<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestão de Pacientes</title>

    <!-- Google font -->
    <link href="{{ url('https://fonts.googleapis.com/css?family=Hind:400,700') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />


    <!-- Slick -->
    <link type="text/css" rel="stylesheet"  href="{{ asset('css/slick.css') }}" />

    <link type="text/css" rel="stylesheet"  href="{{ asset('css/pushy.css') }}" />
    <link type="text/css" rel="stylesheet"  href="{{ asset('css/demo.css') }}" />
    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <!-- top Header -->
		<div id="top-header">
			<div class="container">
				<div class="pull-left">
					<span>Consultas e exames em um clique!</span>
				</div>
				<div class="pull-right">
					<ul class="header-top-links">
						<li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('register') }}">Cadastrar</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /top Header -->

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="#">
							<img src="{{ asset('img/logo.png') }}" alt="imagem da logo" >
						</a>
					</div>
					<!-- /Logo -->


				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase"> @if ( Auth::check() )Conta do {{Auth::user()->name}}
                  @else Deslogado @endif <i class="fa fa-caret-down"></i></strong>
							</div>
							<a href="home" class="text-uppercase">Entrar | </a>
              <a  href="{{ route('logout') }}" onclick="event.preventDefault();
               document.getElementById('logout-form').submit();"> {{ __('SAIR') }} </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               @csrf
               </form>
							<ul class="custom-menu">
								<li><a href="home"><i class="fa fa-user-o"></i> Minha conta </a></li>
								<li><a href="{{ url('/') }}"><i class="fa fa-heart-o"></i> home</a></li>

							</ul>
						</li>
						<!-- /Account -->

						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
    <div class="row">
      <div class="col-sm-3">
        <div id='cssmenu'>
        <ul>
           <li><a href="{{ route('procedure.index')}}"><span>Geral</span></a></li>
             <li class='active has-sub'><a href='#'><span>Área do Paciente</span></a>
              <ul>
                 <li class='has-sub'><a href='register'><span>Novo Paciente</span></a>
                 </li>
                 @if ( Auth::check() )
                 <li class='has-sub'><a href="{{route('test.index')}}"><span>Minha Conta</span></a>
                 </li>
                 @else
                 <li class='has-sub'><a href="#" onclick="funcao1()" value="Exibir Alert"><span>Minha Conta</span></a>
                 </li>
                 @endif
              </ul>
           </li>
           <li><a href='#'><span>Administradores</span></a></li>

        </ul>
        </div>

      </div>
      <div  class="col-md-6">



        <br><br>
      </div>
    </div>
  </head>
  <body>
    <!-- jQuery Plugins -->
  	<script src="js/jquery.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>
  	<script src="js/slick.min.js"></script>
  	<script src="js/nouislider.min.js"></script>
  	<script src="js/jquery.zoom.min.js"></script>
    <script src="js/pushy.js"></script>
    <script src="js/pushy.min.js"></script>
  	<script src="{{ asset('js/pushy.js') }}"></script>
    <script src="{{ asset('js/pushy..min.js') }}"></script>

    <script>
    function funcao1()
    {
    alert("Efetue Login para Prosseguir");

    }
    </script>

    @yield('conteudo')

   </body>

</html>
