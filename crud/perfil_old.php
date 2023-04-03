<?php
include('verifica_login.php');
include ("conexao.php");
$usuario = selectIdUsuario(intval($_GET["id"]));
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
	<meta charset="utf-8">
	<title>Perfil do usuário</title>
	<!--inicio imports boostrap-->
	<link rel="stylesheet" href="bootstrap-4.3.1-dist\css\bootstrap.min">
	<!--import arquivo de estilo-->
	<link rel="stylesheet" type="text/css" href="css/style_perfil.css">
	<!--import dos icones-->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">	
	<!--inicio imports manual-->
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="jQuery-mask\dist\jquery.mask.min.js"></script>
	<!--script consulta cep-->
	<script src="js/script_perfil.js"></script>
</head>
<body>	
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="corpo">
					<div class="cabecalho">
						<span class="txtCabecalho">Perfil de usuário</span>
					</div><!--end cabeçalho-->
					<div class="boxTop">												
						<div class="icones">							
							<div  class="iconDelete">
								<div class="titleIcon" data-toggle="tooltip" data-placement="top" title="Excluir">					
									<input type="image" src="imagem/trash-alt-solid.svg" width="25" height="25" data-toggle="modal" data-target="#ExemploModalCentralizado" name="excluir" />			
								</div><!--end tooltip-->								
							</div><!--end iconeDelete-->
							<!-- Modal para excluir -->
							<div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="TituloModalCentralizado">Excluir usuário</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
												<span aria-hidden="true">&times;</span>
											</button>
										</div><!--endmodal-header-->
										<div class="modal-body">
											<span>Deseja excluir este usuário</span>
										</div><!--end modal-body-->
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
											<form name="excluir" action="conexao.php" method="POST">
												<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" /> 
												<input type="hidden" name="acao" value="excluir" />
												<input type="submit" class="btn btn btn-danger" value="Excluir" name="excluir" />
											</form><!--end form excluir-->
										</div><!--end modal-footer-->
									</div><!--end modal-content-->
								</div><!--end modal-dialog modal-dialog-centered-->
							</div><!--end modal ecluir-->
							<!--inicio icone editar-->
							<div class="iconEdit">
								<div class="titleIcon" data-toggle="tooltip" data-placement="top" title="Editar">
									<form name="alterar" action="alterar.php" method="POST">
										<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />       
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
					<div class="boxBot">
						<label>Nome de usuário</label>
						<div class="input-group  mb-3">						
							<span class="input-group-text">
								<i class="fas fa-user"></i>
							</span>
							<span id="username" class=""><?=$usuario["username"]?></span>
						</div><!--end nome de usuário-->						
						<label>Gênero</label>						
						<div class="input-group  mb-3">						
							<span class="input-group-text">
								<i class="fas fa-venus-mars"></i>
							</span>
							<span id="" class=""><?=$usuario["sexo"]?></span>
						</div><!--end genero-->
						<label>Email</label>
						<div class="input-group  mb-3">						
							<span class="input-group-text">
								<i class="fas fa-envelope"></i>
							</span>
							<span id="" class=""><?=$usuario["email"]?></span>
						</div><!--end emial-->
						<label>Data de nascimento</label>
						<div class="input-group  mb-3">						
							<span class="input-group-text">
								<i class="far fa-calendar-alt"></i>
							</span>
							<span id="" class=""><?=$usuario["nascimento"]?></span>
						</div><!--end nascimento-->
						<div class="input-group  mb-3 d-flex justify-content-center justify-content-md-center">						
							<span class="input-group-text">
								<i class="fas fa-map-marker-alt"></i>
							</span>
							<span id="" class="">Endereço</span>
						</div>
						<label>CEP</label>
						<div class="input-group  mb-3">						
							<span class="input-group-text"></span>							
							<span id="" class=""><?=$usuario["cep"]?></span>
						</div><!--end CEP-->
						<label>Logradouro</label>
						<div class="input-group  mb-3">						
							<span class="input-group-text"></span>
						</span>
						<span id="" class=""><?=$usuario["logradouro"]?></span>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label>Número</label>
							<div class="input-group  mb-3">							
								<span class="input-group-text"></span>
								<span id="" class=""><?=$usuario["numcasa"]?></span>
							</div><!--end numero da casa-->
						</div><!--end col-md-6 mb-3-->
						<div class="col-md-6 mb-3">
							<label>Complemento</label>			
							<div class="input-group  mb-3">							
								<span class="input-group-text"></span>
								<span id="" class=""><?=$usuario["complemento"]?></span>
							</div><!--end complemento-->
						</div><!--end col-md-6 mb-3-->
					</div><!--en row-->
					<label>Bairro</label>
					<div class="input-group  mb-3">						
						<span class="input-group-text"></span>							
						<span id="" class=""><?=$usuario["bairro"]?></span>
					</div><!--end bairro-->
					<div class="row"><!--linha cidade e UF-->
						<div class="col-md-8 mb-3">
							<label>Cidade</label>
							<div class="input-group  mb-3">						
								<span class="input-group-text"></span>					
								<span id="" class=""><?=$usuario["cidade"]?></span>
							</div><!--end cidade-->
						</div><!--end col-md-6-->
						<div class="col-md-4 mb-3">
							<label>Estado</label>
							<div class="input-group  mb-3">						
								<span class="input-group-text"></span>					
								<span id="" class=""><?=$usuario["estado"]?></span>
							</div><!--end estado-->
						</div><!--end col-md-4-->
					</div><!--end linha cidade e UF-->
					<label>Telefone</label>
					<div class="input-group  mb-3">						
						<span class="input-group-text">
							<i class="fas fa-phone-square"></i>
						</span>
						<span id="tipoTel" class=""><?=$usuario["tipo"]?></span>
						<span id="" class=""><?=$usuario["numero"]?></span>
					</div><!--end telefone-->
				</div><!--end boxBot-->
			</div><!--end corpo-->
		</div><!--end col-md-6-->
		<div class="col-md-2"></div>
	</div><!--end row-->		
</div><!--end container-->
</body>
</html>