<header id="myNavbar">
		<div  class="row">
			<div class="container">
				<div class="col-md-5 hidden-sm hidden-xs ">
					<a href="index.php">
						<img src="img/logo-white.png" class="logo" alt="">
					</a>
				</div>

				<div class="col-md-7 hidden-sm hidden-xs btn-cont">
					<ul>
						<li><a href="" class="link-gal" >GALERÍA</a></li>
						<li><a href="salones.php">SALONES</a></li>
						<li><a href="eventos.php">EVENTOS</a></li>
						<li><a href="#contacto" class="scroll-spy">CONTACTO</a></li>
						<li>
							<a href="https://www.instagram.com/darwin.tortugas/" target="_blank">
								<i class="fab fa-instagram"></i>
							</a>
						</li>
						<li>
							<a href="https://www.facebook.com/Darwin-Tortugas-333188340810073/" target="_blank">
								<i class="fab fa-facebook-f"></i>
							</a>
						</li>
					</ul>
				</div>

			</div>
			<div class="hidden-lg hidden-md col-sm-12 col-xs-12 text-center xs-row " style="padding: 5%;">
				<a href="index.php">
					<img src="img/logo.png" alt="" width="150px">
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