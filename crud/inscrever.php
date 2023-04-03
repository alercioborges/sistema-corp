<?php
include('verifica_login.php');
include('conexao.php');

?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
	<title>Criar novo curso</title>
	<meta charset="utf-8">
	<!--inicio imports boostrap-->
	<link rel="stylesheet" href="bootstrap-4.3.1-dist\css\bootstrap.min">
	<!--import arquivo de estilo-->
	<link rel="stylesheet" type="text/css" href="css/style_inscrever.css">
	<!--import dos icones-->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">	
	<!--inicio imports manual-->
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="jQuery-mask\dist\jquery.mask.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<!--script consulta cep-->
	<script src="js/script_inscrever.js"></script>
	<!--inmport boostrap theme-->
	<link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="../css/sb-admin.css" rel="stylesheet">
	<!--arquivo css do autocomplete-->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />
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
					<li class="breadcrumb-item active">Inscrever usuário no curso</li>
				</ol>

				<!-- Area Chart Example-->				
				<div class="card-header">
					<i class="fas fa-user-tag"></i>
					Area de inscrição de usuário no curso
				</div>

				<!--Início da customização-->
				<form name="dadosCurso" id="dadosCurso" action="conexao.php" method="POST">
					<div class="row">						
						<div class="col-md-12 form">
							
							<label for="curso">Curso</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text" for="telefone"><i class="fas fa-graduation-cap"></i></label>
								</div>
								<select class="custom-select" name="curso" required aria-required="true">
									<option value="">SELECIONE</option>

									<?php
									$banco = abritBanco();
									$banco->set_charset('utf8');

									$sql = "SELECT cs.idcurso, cs.nomecompleto FROM curso cs";

									$resultado = $banco->query($sql); ?>
									<?php if($resultado->num_rows > 0) { ?>
										<?php while($row = $resultado->fetch_assoc()): ?>

											<option value="<?php echo $row['nomecompleto']; ?>"><?php echo $row['nomecompleto']; ?>
										</option>

									<?php endwhile ; }
									$banco->close(); ?>								
								</select><!--end select curso-->
							</div>
							<!--inicio nome usuario-->							
							<label for="nome">Usuário</label>
							<div class="form-group input-group  mb-3">					
								<span class="input-group-text"><i class="fas fa-user"></i></span>
								<input class="auto form-control" type="text" required id="nome" name="nome" placeholder="Nome" />
							</div>

							<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
							<script type="text/javascript" src="js/jquery-ui.min.js"></script>
							<script type="text/javascript">
								$(function() {
								//autocomplete
								$(".auto").autocomplete({
									source: "search.php",
									minLength: 1
								});
							});
						</script>
						<!--end nome usuarioo--->
					</div>
				</div>
			</form>
			<!--fim da customização-->

		</div><!--end container-fluid-->		
	</div><!--end container-wrapper-->

	<?php include("crud_footer.php"); ?>

	<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="../js/sb-admin.min.js"></script>

</body>
</html>