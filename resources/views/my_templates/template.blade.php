<!DOCTYPE html>
<html lang="en"><head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title> @yield('title','Encuesta UNERG / Direccion de Informatica') </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
        <link href="{{asset('css/admin.css')}}" rel="stylesheet">
		<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
    </head>
    
    <body>
        <!-- Header -->
		<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				  <span class="icon-toggle"></span>
			  </button>
			  <a class="navbar-brand" href="{{ url('/') }}"> @yield('title','Encuesta UNERG / Direccion de Informatica')</a>
			</div>
			<div class="navbar-collapse collapse">
			  <ul class="nav navbar-nav navbar-right">
				@guest
                    <p class="h5" style="margin-top: 10px; background: #009; padding: 5px; border-radius: 10px; color:white;">Registrate o Inicia sesion para acceder a la encuesta!</p>
                @else
                <li>
				  <a class="btn">{{Auth::user()->name}}</a>
				</li>
                @if(Auth::user()->role_id=='1')
			  	<li><a href="{{route('preguntas.index')}}">Administrar</a></li>
			  	@endif
				<li>
					<a href="{{route('home')}}">Ir a Encuesta</a>
				</li>
				<li>
					<a class="btn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
				</li>
                @endguest
			  </ul>
			</div>
		  </div><!-- /container -->
		</div>
		<!-- /Header -->

		<!-- Main -->
		<div class="container">
			<div class="row">
				@yield('content')
			</div>
		</div>
		<!-- /Main -->

		<footer class="text-center"> <p class="h4"> @yield('footer','Hecho por Jhonny Pérez') </p> </footer>
        
        <script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
        <script type="text/javascript">

        $(document).ready(function() {
            $(".alert").addClass("in").fadeOut(4500);
			$('[data-toggle=collapse]').click(function(){
				$(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
			});
        });

        </script>
    
</body></html>