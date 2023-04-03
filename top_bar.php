<?php include("crud/conexao.php"); ?>

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

	<a class="navbar-brand mr-1" href="index.php"><img src="crud/imagem/logo_transparent.png" width="30" height="30"> Alercio's Corp.</a>

	<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
		<i class="fas fa-bars"></i>
	</button>

	<!-- Navbar Search -->
	<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" style="display: none;">
			<div class="input-group-append" style="display: none;">
				<button class="btn btn-primary" type="button">
					<i class="fas fa-search"></i>
				</button>
			</div>
		</div>
	</form>

	<span style="color: white; padding-right: 5%;">Acessou como <?php echo $_SESSION['firstnameUsuario']; ?></span>

	<!-- Navbar -->
	<ul class="navbar-nav ml-auto ml-md-0">		
		<li class="nav-item dropdown no-arrow">
			<a style="padding: 0%; margin: 0%;" class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i style="font-size: 50px;" class="fas fa-user-circle fa-fw"></i>
			</a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
				<a class="dropdown-item" href="crud/meuperfil.php">Meu perfil</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Sair</a>
			</div>
		</li>
	</ul><!--end icone login-->

</nav>