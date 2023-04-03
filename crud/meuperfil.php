<?php
include ('verifica_login.php');
include ("conexao.php");

$idUsuario = $_SESSION['idUsuario'];

$usuario = selectIdUsuario($idUsuario);

?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
	<title>Cadastrar Usuário</title>
	<meta charset="utf-8">
	<!--inicio imports boostrap-->
	<link rel="stylesheet" href="bootstrap-4.3.1-dist\css\bootstrap.min">
	<!--import arquivo de estilo-->
	<link rel="stylesheet" type="text/css" href="css/style_meuperfil.css">
	<!--import dos icones-->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">	
	<!--inicio imports manual-->
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="jQuery-mask\dist\jquery.mask.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<!--script consulta cep-->
	<script src="js/script_perfil.js"></script>
	<!--inmport boostrap theme-->
	<link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="../css/sb-admin.css" rel="stylesheet">	
</head>
<body id="page-top">
	<?php include('crud_top_bar.php'); ?>
	<div id="wrapper">		
		<?php include('crud_sidebar.php'); ?>
		<div id="content-wrapper">
			<div class="container-fluid">

				<!-- Breadcrumbs-->
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="../index.php">Dashboard</a>
					</li>
					<li class="breadcrumb-item active">Meu perfil</li>
				</ol>

				<!-- Area Chart Example-->				
				<div class="card-header">
					<i class="fas fa-address-card"></i>
					Dados do meu perfil de usuário
				</div>
				
				<!--inicio da customização-->
				<div class="corpo justify-content-center justify-content-md-center">		

					<div class="boxTop">
						<div class="icones">							
							<div  class="iconDelete">
								<div class="titleIcon">				
									<div class="iconeOculto"></div>		
								</div><!--end tooltip-->								
							</div><!--end iconeDelete-->
							
							<!--inicio icone editar-->
							<div class="iconEdit">
								<div class="titleIcon" data-toggle="tooltip" data-placement="top" title="Editar">
									<form name="alterar" action="alterar.php" method="POST">
										<input type="hidden" name="id" value="<?php echo $idUsuario ; ?>" />       
										<input type="image" src="imagem/pencil-alt-solid" width="25" height="25"  name="editar" />
									</form><!--end f-->
								</div><!--end tooltip-->
							</div><!--end iconEdit-->
						</div><!--end iconsBox-->
						<div class="row">
							<div class="col-4"></div>
							<div class="col-4">
								<div class="iconUser d-flex justify-content-center justify-content-md-center fas fa-user"></div>
							</div><!--end col-4-->
							<div class="col-4"></div>
						</div><!--end row-->
						<div class="nameUser">
							<span><?=$usuario["firstname"]?> <?=$usuario["lastname"]?></span>
						</div><!--END NAMEuSER-->						
					</div><!--end boxTop-->

					<div class="box">					
						<div class="input-group  mb-3">						
							<span class="input-group-text">
								<i class="fas fa-user"></i>
							</span>
							<span id="username" class=""><?=$usuario["username"]?></span>
						</div><!--end nome de usuário-->						
						<div class="input-group  mb-3">						
							<span class="input-group-text">
								<i class="fas fa-venus-mars"></i>
							</span>
							<span id="" class=""><?=$usuario["sexo"]?></span>
						</div><!--end genero-->					
						<div class="input-group  mb-3">						
							<span class="input-group-text">
								<i class="fas fa-envelope"></i>
							</span>
							<span id="" class=""><?=$usuario["email"]?></span>
						</div><!--end emial-->					
						<div class="input-group  mb-3">						
							<span class="input-group-text">
								<i class="far fa-calendar-alt"></i>
							</span>
							<span id="" class=""><?=$usuario["nascimento"]?></span>
						</div><!--end nascimento-->					
						<div class="input-group  mb-3">						
							<span class="input-group-text">
								<i class="fas fa-phone-square"></i>
							</span>
							<span id="tipoTel" class=""><?=$usuario["tipo"]?> </span>
							<span id="" class=""> <?=$usuario["numero"]?></span>
						</div><!--end telefone-->
						<div class="input-group  mb-3">						
							<span class="input-group-text">
								<i class="fas fa-map-marker-alt"></i>
							</span>
							<span id="" class="">Endereço:</span>
						</div>
						<div class="grupo-endereco">
							<div class="input-group  mb-3">
								<label>CEP:</label>						
								<span class="input-group-text"></span>						
								<span id="" class=""><?=$usuario["cep"]?></span>
							</div><!--end CEP-->
							<div class="input-group  mb-3">
								<label>Logradouro:</label>						
								<span class="input-group-text"></span>
							</span>
							<span id="" class=""><?=$usuario["logradouro"]?></span>
						</div>
						<div class="input-group  mb-3">
							<label>Número:</label>							
							<span class="input-group-text"></span>
							<span id="" class=""><?=$usuario["numcasa"]?></span>
						</div><!--end numero da casa-->
						<div class="input-group  mb-3">
							<label>Complemento:</label>							
							<span class="input-group-text"></span>
							<span id="" class=""><?=$usuario["complemento"]?></span>
						</div><!--end complemento-->
						<div class="input-group  mb-3">
							<label>Bairro:</label>						
							<span class="input-group-text"></span>							
							<span id="" class=""><?=$usuario["bairro"]?></span>
						</div><!--end bairro-->
						<div class="input-group  mb-3">
							<label>Cidade:</label>						
							<span class="input-group-text"></span>					
							<span id="" class=""><?=$usuario["cidade"]?></span>
						</div><!--end cidade-->
						<div class="input-group  mb-3">
							<label>Estado:</label>						
							<span class="input-group-text"></span>					
							<span id="" class=""><?=$usuario["estado"]?></span>
						</div><!--end estado-->
					</div><!--end box-->
				</div><!--end corpe-->


				<!--fim da customização-->
			</div><!--end container-fluid-->
			<!-- Sticky Footer -->
			<footer class="sticky-footer">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright © Alercio's Corporation 2019</span>
					</div><!--end copyright text-center my-auto-->
				</div><!--container my-auto-->
			</footer><!--end footer-->
		</div><!--end container-wrapper-->
	</div><!--end wrapper-->

	<?php include("crud_footer.php"); ?>

	<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="../js/sb-admin.min.js"></script>

</body>
</html>