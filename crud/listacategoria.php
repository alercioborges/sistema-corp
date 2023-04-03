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
	<title>Lista de categorias</title>
	<!--inicio imports boostrap-->
	<link rel="stylesheet" href="bootstrap-4.3.1-dist\css\bootstrap.min">
	<!--import arquivo de estilo-->
	<link rel="stylesheet" type="text/css" href="css/style_listacategoria.css">    
	<!--import dos icones-->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">  
	<!--inicio imports manual-->
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="jQuery-mask\dist\jquery.mask.min.js"></script>
	<!--script consulta cep-->
	<script src="js/script_listacategoria.js"></script>
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
					<li class="breadcrumb-item active">Criar categoria de curso</li>
				</ol>

				<!-- Area Chart Example-->				
				<div class="card-header">
					<i class="fas fa-table"></i>
					Area de criação de nova categoria de curso
				</div>

				<!--inicio da customização-->
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th scope="col">Id</th>
									<th scope="col">Nome</th>
									<th scope="col">Categoria-pai</th>
									<th scope="col"></th>
									<th scope="col"></th>				
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th scope="col" class="justify-content-center justify-content-md-center">Id</th>
									<th scope="col">Nome</th>
									<th scope="col">Categoria-pai</th>
									<th scope="col"></th>
									<th scope="col"></th>				
								</tr>
							</tfoot>
							<tbody>
								<?php
								include('conexao.php');
								$banco = abritBanco();
								$banco->set_charset('utf8');

								$sql = "SELECT ct.idcategoria, ct.nome, ct.descricao, cp.nome as 'nomecategoriapai' from categoria_curso ct INNER JOIN catego_pai cp ON ct.idcategoria = cp.id_categoria";

								$resultado = $banco->query($sql); ?>
								<?php if($resultado->num_rows > 0) { ?>
									<?php while($row = $resultado->fetch_assoc()): ?>
										<tr>
											<td>												
												<span data-toggle="tooltip" data-placement="top" title="Detalhes">
													<a href="#" data-toggle="modal" data-target="#modal<?php echo $row['idcategoria']; ?>">
														<?php echo htmlspecialchars($row['idcategoria']); ?>
													</a>
												</span><!--end ID categoria-->
												<!--Inicio do modal-->
												<div class="modal fade" id="modal<?php echo $row['idcategoria']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-lg" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel">
																	Detalhes da categoria <?php echo $row['nome']; ?>
																</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																Categoria pai: <?php echo $row['nomecategoriapai']; ?>
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
											</td><!--end coluna-->
											<td>
												<?php echo htmlspecialchars($row['nome']); ?>
											</td>
											<td>
												<?php echo htmlspecialchars( $row['nomecategoriapai'] ) ; ?>
											</td>
											<td>
												<div data-toggle="tooltip" data-placement="top" title="Editar">
													<form name="alterarCategoria" action="alterarcategoria.php" method="POST" class="d-flex justify-content-center justify-content-md-center" >
														<input type="hidden" name="id" value="<?php echo $row["idcategoria"]; ?>" />             
														<input type="image" src="imagem/pencil-alt-solid-black.svg" width="20" height="20"  name="alterarCategoria" />   
													</form>
												</div>
											</td>
											<td>
												<div data-toggle="tooltip" data-placement="top" title="Excluir">
													<form name="excluirCategoria" action="excluircategoria.php" method="POST" class="d-flex justify-content-center justify-content-md-center">
														<input type="hidden" name="id" value="<?php echo htmlspecialchars( $row['idcategoria'] ); ?>" />
														<input type="image" src="imagem/trash-alt-solid-black.svg" width="20" height="20"  name="excluirCategoria" class="confirm" />
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
