<?php
include('verifica_login.php');
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Lista de cursos</title>    
	<!--import dos icones-->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">  
	<!--inicio imports manual-->
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="jQuery-mask\dist\jquery.mask.min.js"></script>
	<!--script consulta cep-->
	<script src="js/script_listacurso.js"></script>
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
					<li class="breadcrumb-item active">Lista de cursos</li>
				</ol>

				<!-- Area Chart Example-->				
				<div class="card-header">
					<i class="fas fa-table"></i>
					Area de exibição da lista de curso
				</div>

				<!--inicio da customização-->
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th scope="col">Nome</th>
									<th scope="col">Nome breve</th>
									<th scope="col">Categoria</th>
									<th scope="col"></th>
									<th scope="col"></th>
									<th scope="col"></th>				
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th scope="col">Nome</th>
									<th scope="col">Nome breve</th>
									<th scope="col">Categoria</th>
									<th scope="col"></th>
									<th scope="col"></th>
									<th scope="col"></th>					
								</tr>
							</tfoot>
							<tbody>
								<?php
								include('conexao.php');
								$banco = abritBanco();
								$banco->set_charset('utf8');

								$sql = "SELECT cs.idcurso, cs.nomecompleto, cs.nomebreve, cs.descricao, cc.nome FROM curso cs INNER JOIN categoria_curso cc ON cc.idcategoria = cs.id_categoria";

								$resultado = $banco->query($sql); ?>
								<?php if($resultado->num_rows > 0) { ?>
									<?php while($row = $resultado->fetch_assoc()): ?>

										<tr>
											<td>
												<a href="#" data-toggle="modal" data-target="#modal<?php echo $row['idcurso']; ?>">
													<?php echo htmlspecialchars($row['nomecompleto']);?>
												</a>												
												<!--Inicio do modal-->
												<div class="modal fade" id="modal<?php echo $row['idcurso']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-lg" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel">
																	Detalhes do curso <?php echo $row ['nomecompleto']; ?>
																</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																Nome breve: <?php echo $row['nomebreve']; ?>
															</div>
															<div class="modal-body">
																Categoria: <?php echo $row['nome']; ?>
															</div>
															<div class="modal-body">
																Descrição: <?php echo $row['descricao']; ?>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
															</div>
														</div>
													</div>
												</div><!--end modal-->					
											</td><!--end coluna Nome Completo-->
											<td>
												<?php echo htmlspecialchars($row['nomebreve']);?>
											</td>
											<td>
												<?php echo htmlspecialchars($row['nome']);?>
											</td>
											<td>
												<div data-toggle="tooltip" data-placement="top" title="Editar">
													<form name="alterar" action="alterarcurso.php" method="POST" class="d-flex justify-content-center justify-content-md-center" >
														<input type="hidden" name="id" value="<?php echo $row["idcurso"]; ?>" />   
														<input type="image" src="imagem/pencil-alt-solid-black.svg" width="20" height="20"  name="editar" />   
													</form>
												</div>
											</td>
											<td>
												<div data-toggle="tooltip" data-placement="top" title="Inscrever usuário">
													<form name="inscrever" action="inscreverusuario.php" method="POST" class="d-flex justify-content-center justify-content-md-center" >
														<input type="hidden" name="id" value="<?php echo $row["idcurso"]; ?>" />
														<input type="image" src="imagem/fa-user-tagi.svg" width="20" height="20"  name="" class="" />
													</form>
												</div>
											</td>
											<td>
												<div data-toggle="tooltip" data-placement="top" title="Excluir">
													<form name="excluir" action="conexao.php" method="POST" class="d-flex justify-content-center justify-content-md-center">
														<input type="hidden" name="id" value="<?php echo $row['idcurso']; ?>" />
														<input type="hidden" name="acao" value="excluirCurso" />
														<input type="image" src="imagem/trash-alt-solid-black.svg" width="20" height="20"  name="excluir" class="confirm" />      
													</form>
												</div>
											</td>
										</tr>
									<?php endwhile ; }
									$banco->close(); ?>
								</tbody>
							</table>
						</div>
					</div>              
				</div>
			</div>
			<!-- Sticky Footer -->
			<footer class="sticky-footer">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright © Alercio's Corporation 2019</span>
					</div>
				</div>
			</footer>

		</div>
		<!-- /.content-wrapper -->

	</div>  <!-- /#wrapper -->

	<?php include("crud_footer.php"); ?>

	<!-- Bootstrap core JavaScript-->
	<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Page level plugin JavaScript-->
	<script src="../vendor/datatables/jquery.dataTables.js"></script>
	<script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="../js/sb-admin.min.js"></script>

	<!-- Demo scripts for this page-->
	<script src="../js/demo/datatables-demo.js"></script>

</body>
</html>