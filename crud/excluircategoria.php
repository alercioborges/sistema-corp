<?php
include('verifica_login.php');
include ("conexao.php");

$categoriaCurso = selectIdCategoria(addslashes($_POST["id"]));
//var_dump($categoriaCurso);
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
	<title>Excluir categoria de curso</title>
	<meta charset="utf-8">
	<!--inicio imports boostrap-->
	<link rel="stylesheet" href="bootstrap-4.3.1-dist\css\bootstrap.min">
	<!--import arquivo de estilo-->
	<link rel="stylesheet" type="text/css" href="css/style_excluircategoria.css">
	<!--import dos icones-->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">	
	<!--inicio imports manual-->
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="jQuery-mask\dist\jquery.mask.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<!--script consulta cep-->
	<script src="js/script_excluircategoria.js"></script>
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
					<li class="breadcrumb-item active">Excluir categoria de curso</li>
				</ol>

				<!-- Area Chart Example-->				
				<div class="card-header">
					<i class="fas fa-trash-alt"></i>
					Area de exclusão de categoria de curso
				</div>

				<!--inicio da customização-->
				<form name="excluirCategoria" id="excluirCategoria" action="conexao.php" method="POST">
					<div class="row">
						<div class="col-md-12 form">
							<label for="opcao">O que fazer</label>
							<div class="form-group input-group  mb-3">					
								<span class="input-group-text" id="basic-addon1"><i class="fas fa-clipboard-check"></i></span>
								<select class="custom-select" name="opcao" id="opcao" required aria-required="true" tabindex="0" aria-label="Drop-down List">
									<option data-user-option="" value="">SELECIONE</option>
									<option data-user-option="" value="moverCategoria">Mover conteúdo para categoria</option>
									<option data-user-option="" class="excluirCategoria" value="excluirCategoria">Excluir todos - não pode ser desfeito</option>				
								</select>
							</div><!--end o que fazer-->
							<label class="categoria" style="display:none;" for="categoria">Categoria de cursos</label>
							<div class="input-group mb-3 categoria" style="display:none;">
								<div class="input-group-prepend">
									<label class="input-group-text" for="categoria"><i class="far fa-object-ungroup"></i></label>
								</div>
								<select class="custom-select" name="categoria" id="categoria"  aria-required="true">
									<option value="">SELECIONE</option>
									
									<?php
									
									$banco = abritBanco();
									$banco->set_charset('utf8');

									$sql = "select c.nome from categoria_curso c order by c.nome";

									$resultado = $banco->query($sql); ?>
									<?php if($resultado->num_rows > 0) { ?>
										<?php while($row = $resultado->fetch_assoc()): ?>

											<?php if($categoriaCurso["nome"] == $row['nome']){ ?>
												
											<?php }else{ ?>
												<option value="<?php echo htmlspecialchars($row['nome']); ?>"><?php echo htmlspecialchars($row['nome']); ?>
												
											</option>
										<?php	} ?>
									<?php endwhile ; }
									$banco->close(); ?>								
								</select>
							</div>						

							<input type="hidden" name="acao" value="excluirCategoria" />
							<input type="hidden" name="id" value="<?php echo $categoriaCurso["idcategoria"]; ?>" />
							<input class="btn btn-primary btn-block" type="submit" value="Excluir categoria" />

						</div><!--end col-md-6-->
					</div><!--end row-->
				</form><!--fim do formulário-->
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