<?php
include('verifica_login.php');
include ("conexao.php");

$colunaCurso = selectIdCurso($_POST["id"]);

?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
	<title>Inscrever usuário</title>
	<meta charset="utf-8">	
	<!--import arquivo de estilo-->
	<link rel="stylesheet" type="text/css" href="css/style_inscreverusuario.css">
	<!--import dos icones-->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">	
	<!--inicio imports manual-->
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<!--script consulta cep-->
	<script src="js/script_inscreverusuario.js"></script>
	<!-- Custom styles for this template-->
	<link href="../css/sb-admin.css" rel="stylesheet">
	<!--choosen-->	
	<link rel="stylesheet" href="css/docsupport/prism.css">
	<link rel="stylesheet" href="css/chosen.css">
	<!-- Custom fonts for this template-->
	<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<!-- Page level plugin CSS-->
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
					<li class="breadcrumb-item active">Inscrever usuário</li>
				</ol>

				<!-- Area Chart Example-->				
				<div class="card-header">
					<i class="fas fa-user-graduate"></i>
					Area de inscrição de usuário curso <?php echo $colunaCurso['nomecompleto']; ?>
				</div>

				<!--Inicio da customização-->
				<form name="dadosUsuario" id="dadosUsuario" action="conexao.php" method="POST">
					<div class="row">
						<div class="col-md-12 form">
							<label for="usuario[]">Nome do usuario</label>
							<div class="row">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label class="input-group-text"><i class="fas fa-user"></i></label>
									</div>
									<select data-placeholder="Digite o nome do usuário" multiple class="chosen-select" tabindex="8" name="usuario[]" required >
										<option value=""></option>

										<?php
										$banco = abritBanco();
										$banco->set_charset('utf8');

										$sql = "SELECT idusuario, CONCAT(firstname,' ', lastname, ' - ', email) AS dados FROM usuario ORDER BY firstname";

										$resultado = $banco->query($sql); ?>
										<?php if($resultado->num_rows > 0) { ?>
											<?php while($row = $resultado->fetch_assoc()): ?>

												<?php
												$consulUsuarioInsc = "SELECT id_usuario FROM inscricao_curso WHERE id_usuario = " .$row['idusuario'] ." AND id_curso = " .$colunaCurso['idcurso'];

												$resulConsulta = $banco->query($consulUsuarioInsc); ?>
												<?php if($resulConsulta->num_rows > 0) { ?>

												<?php }else{ ?>
													<option value="<?php echo $row['idusuario'];?>"><?php echo htmlspecialchars($row['dados']); ?>

												</option>

											<?php } endwhile; }
											$banco->close(); ?>
										</select><!--end select-->

									</div><!--end row-->
								</div><!--end group select usuario-->
								<input type="hidden" name="acao" value="inscreverUsuario" />
								<input type="hidden" name="idcurso" value="<?php echo $colunaCurso["idcurso"]; ?>" />				
								<input class="btn btn-primary btn-block" type="submit" value="Inscrever usuário" />
							</div><!--end col-md 12-->
						</div><!--end row-->
					</form><!--end form-->

					<?php include("listausuarioinscrito.php") ?>

					<!--Fim da customização-->

				</div><!--end container-fluid-->		
			</div><!--end content-wrapper-->
		</div><!--end wrapper-->

		<!--<?php include("crud_footer.php"); ?>-->

		<!--chosen-->
		<script src="js/chosen.jquery.js" type="text/javascript"></script>
		<script src="js/prism.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/init.js" type="text/javascript" charset="utf-8"></script>
		<!--js bootstrap-->
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- Core plugin JavaScript-->
		<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
		<!-- Custom scripts for all pages-->
		<script src="../js/sb-admin.min.js"></script>
		<!-- Page level plugin JavaScript-->
		<script src="../vendor/datatables/jquery.dataTables.js"></script>
		<script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
		<!-- Demo scripts for this page-->
		<script src="../js/demo/datatables-demo.js"></script>
	</body>
	</html>