<?php
include('verifica_login.php');
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
	<title>Criar novo curso</title>
	<meta charset="utf-8">
	<!--inicio imports boostrap-->
	<link rel="stylesheet" href="bootstrap-4.3.1-dist\css\bootstrap.min">
	<!--import arquivo de estilo-->
	<link rel="stylesheet" type="text/css" href="css/style_curso.css">
	<!--import dos icones-->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">	
	<!--inicio imports manual-->
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="jQuery-mask\dist\jquery.mask.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<!--script consulta cep-->
	<script src="js/script_curso.js"></script>
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
					<li class="breadcrumb-item active">Criar novo curso</li>
				</ol>

				<!-- Area Chart Example-->				
				<div class="card-header">
					<i class="fas fa-user-graduate"></i>
					Area de criação de novo curso
				</div>

				<!--inicio da customização-->
				<form name="dadosCurso" id="dadosCurso" action="conexao.php" method="POST">
					<div class="row">						
						<div class="col-md-12 form">
							<label for="categoria">Categoria</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text" for="categoria"><i class="far fa-object-ungroup"></i></label>
								</div>
								<select class="custom-select" name="categoria" required aria-required="true">
									<option value="">SELECIONE</option>
									
									<?php
									include('conexao.php');
									$banco = abritBanco();
									$banco->set_charset('utf8');

									$sql = "select c.idcategoria, c.nome from categoria_curso c order by c.nome";

									$resultado = $banco->query($sql); ?>
									<?php if($resultado->num_rows > 0) { ?>
										<?php while($row = $resultado->fetch_assoc()): ?>
											<option value="<?php echo $row['idcategoria']  ; ?>"><?php echo htmlspecialchars( $row['nome'] ) ; ?></option>										
										<?php endwhile ; }
										$banco->close(); ?>								
									</select>
								</div><!--end dropdaqn-->
								<label for="nomecurso">Nome do curso</label>
								<div class="form-group input-group  mb-3">					
									<span class="input-group-text" id="basic-addon1"><i class="fas fa-file-signature"></i></span>
									<input type="text" required name="nomecurso" maxlength="254" id="nomecurso" class="form-control" />
								</div><!--end input -->
								<label for="nomebrevecurso">Nome breve do curso</label>
								<div class="form-group input-group  mb-3">					
									<span class="input-group-text" id="basic-addon1"><i class="fas fa-file-signature"></i></span>
									<input type="text" required name="nomebrevecurso" maxlength="254" id="nomebrevecurso" class="form-control" />
								</div><!--end input-->
								<label for="descricao">Descrição do curso</label>
								<div class="form-group input-group  mb-3">					
									<span class="input-group-text" id="basic-addon1"><i class="fas fa-file-alt"></i></span>
									<textarea required name="descricao" maxlength="254" id="descricao" class="form-control" rows="3"></textarea>
								</div><!--end textarea-->
								<input type="hidden" name="acao" value="curso" />
								<input class="btn btn-primary btn-block" type="submit" value="Criar curso" />
							</div><!--end row-->
						</div><!--end col-md-12-->
					</form><!--end formulario-->
					<!--inicio da customização-->

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