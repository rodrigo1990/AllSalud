<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/estilos.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">


	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	
	<header id="myNavbar">
		<div  class="row">
			<div class="container-fluid">
				<div class="col-md-2 hidden-sm hidden-xs ">
					<a href="index.php">
						<img src="<?php echo asset("storage/img/logo.png")?>"></img> 

					</a>
				</div>

				<div class="col-md-10 hidden-sm hidden-xs btn-cont">
					<ul>
						<li><a href="" class="link-gal" >Conocé AllSalud</a></li>
						<li><a href="">Quiero ser Socio</a></li>
						<li><a href="">Atención al Socio</a></li>
						<li><a href="" class="scroll-spy">Cartilla</a></li>
						<li><a href="" class="scroll-spy">Contacto</a></li>
					</ul>
				</div>

			</div>
			<div class="hidden-lg hidden-md col-sm-12 col-xs-12 text-center xs-row " style="padding: 5%;">
				<a href="index.php">
					<img src="<?php echo asset("storage/img/logo.png")?>" width="150px"></img> 
				</a>
					<a onClick="mostrarMenu(); return false">
						<i class="fa fa-bars"  id="abrirMenu"></i>
					</a>
				</div>
		</div>
	</header>
	<ul class="overlay-xs-menu">
		<div class="row">
			<a onClick="cerrarMenu()" class="close-menu-xs">
				<i class="fas fa-times"></i>
			</a>
		</div>
		<li><a href="index.php#galeria" class="xs-btn link-gal">GALERÍA</a></li>
		<li><a href="salones.php" class="xs-btn">SALONES</a></li>
		<li><a href="eventos.php" class="xs-btn">EVENTOS</a></li>
		<li><a href="#contacto" class="xs-btn" id="cont-xs">CONTACTO</a></li>
		<li class="center-block">
			<a href="https://www.instagram.com/darwin.tortugas/" class="xs-btn left" target="_blank">
				<i class="fab fa-instagram"></i>
			</a>

			<a href="https://www.facebook.com/Darwin-Tortugas-333188340810073/" class="xs-btn left" target="_blank">
				<i class="fab fa-facebook-f"></i>
			</a>
		</li>
	</ul>
	@yield('content')


	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
	<script type="text/javascript" src="/js/slider.js"></script>
</body>
</html>