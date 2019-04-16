<!DOCTYPE html>
<html lang="en">
<head>
	<script async type="text/javascript" src="/js/preloader.js"></script>
	<meta charset="UTF-8">
	<title>AllSalud || Brindamos lo mejor para tu salud</title>
	<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/estilos.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="/css/animate.css">


	<meta name="description" content="AllSalud brinda a cada uno de sus socios la posibilidad de elegir libremente la mejor atención médica. Con el objetivo de generar un vínculo ideal, AllSalud cuenta con un programa de planes abiertos que brinda acceso directo al mejor servicio de salud con sólo presentar la credencial y el DNI. Vos decidís dónde y con quién atenderte, en el momento que lo necesites. Contamos con los reconocidos Centros de Médicos, dando cobertura a todos los niveles de complejidad" />

	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<!-- ALERT -->
		 <div class="confirm-alert-bk" id="alert" style="display:none">
		    <div class="panel" >
		        <h2></h2>
		        <div class="row">
		        	<a id="btnAccept" class="form-btn center-block"><h2>ACEPTAR</h2></a>
		        </div>
		    </div>
		</div>
	<div id="main-content">
	
		<header id="menu-center" >
			<div  class="row">
				<div class="container-fluid">
					<div class="col-md-2 hidden-sm hidden-xs ">
						<a href="index.php">
							<img src="<?php echo asset("storage/img/logo.png")?>"></img> 

						</a>
					</div>

					<div class="col-md-10 hidden-sm hidden-xs btn-cont">
						<ul id="nav">
							<li><a href="#conoce-all" class=" scroll-spy link-gal" data-offset="50" >Conocé AllSalud</a></li>
							<li><a href="#quiero-ser-socio" class="scroll-spy" data-offset="-50">Quiero ser socio</a></li>
							<li><a href="#cartilla"  data-toggle="modal" data-target="#cartilla-modal" >Cartilla</a></li>

							<li><a href="#atencion-al-socio" class="scroll-spy" data-offset="50">Atención al socio</a></li>
							
							<li><a href="#contacto" class="scroll-spy" data-offset="50">Contacto</a></li>
						</ul>
					</div>

				</div>
				<div class="hidden-lg hidden-md col-sm-12 col-xs-12 text-center xs-row " style="padding: 5%;">
					<a href="index.php">
						<img src="<?php echo asset("storage/img/logo.png")?>" width="150px"></img> 
					</a>
						<a id="abrirMenu">
							<i class="fa fa-bars"  id="abrirMenu"></i>
						</a>
					</div>
			</div>
		</header>
		<ul id="xsMenu" class="overlay-xs-menu menu">
			<div class="row">
				<a id="cerrarMenu"  class="close-menu-xs">
					<i class="fas fa-times"></i>
				</a>
			</div>
			<li><a href="#conoce-all" class=" xs-btn scroll-spy link-gal" data-offset="50" >Conocé AllSalud</a></li>
			<li><a href="#quiero-ser-socio" class="xs-btn scroll-spy" data-offset="-50">Quiero ser Socio</a></li>
			<li><a href="#cartilla" class="xs-btn" data-toggle="modal" data-target="#cartilla-modal" >Cartilla</a></li>

			<li><a href="#atencion-al-socio" class="xs-btn scroll-spy" data-offset="50">Atención al Socio</a></li>
			
			<li><a href="#contacto" class="xs-btn scroll-spy" data-offset="50">Contacto</a></li>
		</ul>
		@yield('content')
	</div>
	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
	<script type="text/javascript" src="/js/slider.js"></script>
	<script type="text/javascript" src="/js/buscarCiudadSegunProvincia.js"></script>
	<script type="text/javascript" src="/js/alertar.js"></script>
	<script type="text/javascript" src="/js/headerFunctions.js"></script>
	<script type="text/javascript" src="/js/scroll-spy.js"></script>
	<script type="text/javascript" src="/js/manejoDeMenus.js"></script>
	<script type="text/javascript" src="/js/validarYEnviarMails.js"></script>
	

	@yield('scripts')
</body>
</html>