<?php
include('verifica_login.php');
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
	<title>Cadastrar Usuário</title>
	<meta charset="utf-8">
	<!--inicio imports boostrap-->
	<link rel="stylesheet" href="bootstrap-4.3.1-dist\css\bootstrap.min">
	<!--import arquivo de estilo-->
	<link rel="stylesheet" type="text/css" href="css/style_inserir.css">
	<!--import dos icones-->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">	
	<!--inicio imports manual-->
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="jQuery-mask\dist\jquery.mask.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<!--script consulta cep-->
	<script src="js/script_inserir.js"></script>
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
					<li class="breadcrumb-item active">Cadasttrar usuário</li>
				</ol>

				<!-- Area Chart Example-->				
				<div class="card-header">
					<i class="fas fa-user-plus"></i>
					Area de cadastro de novo usuário
				</div>
				

				<form name="dadosUsuario" id="dadosUsuario" action="conexao.php" method="POST" enctype="multipart/form-data">
					<div class="row">
						<!--<div class="col-md-3"></div>-->
						<div class="col-md-12 form">
							<label for="username">Nome de usuário</label>
							<div class="form-group input-group  mb-3">						
								<span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
								<input type="text" required name="username" minlength="3" maxlength="30" id="username" class="form-control" />
							</div>
							<label for="password">Senha</label>
							<div class="form-group input-group  mb-3">						
								<span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
								<input class="form-control" type="password" required name="password" id="password" minlength="3" maxlength="255" />
							</div>
							<label for="firstname">Nome</label>
							<div class="form-group input-group  mb-3">					
								<span class="input-group-text" id="basic-addon1"><i class="fas fa-file-signature"></i></span>
								<input style="margin-right: 1%;" class="form-control" type="text" required id="firstname" name="firstname" minlength="3" maxlength="30" placeholder="Nome" />
								<input style="margin-left: 1%;" class="form-control" type="text" required name="lastname" minlength="3" maxlength="30" placeholder="Sobrenome" />	
							</div>
							<label for="masculino">Gênero</label>
							<div>
								<div class="form-check form-check-inline">				
									<span class="input-group-text" id="basic-addon1"><i class="fas fa-venus-mars"></i></span>
									<INPUT TYPE="radio" id="masculino" class="form-check-input" NAME="sexo" VALUE="MASCULINO" CHECKED><label class="form-check-label" for="masculino"> Masculino</label>
								</div>
								<div class="form-check form-check-inline">
									<INPUT TYPE="radio"  id="feminino" class="form-check-input" NAME="sexo" VALUE="FEMININO"><label class="form-check-label" for="feminino"> Feminino</label>
								</div>
							</div>					
							<label for="email">Email</label>
							<div class="form-group input-group  mb-3">
								<span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
								<input type="email" class="form-control" required id="email" name="email" />
							</div>
							<label for="nascimento">Data de nascimento</label>
							<div class="form-group input-group  mb-3">
								<span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
								<input type="date" class="form-control" required name="nascimento" id="nascimento" max="<?php echo date("Y-m-d"); ?>" />
							</div><!--End nascimento-->
							<!--<label for="imagem">Imagem do perfil</label>
							<div class="form-group input-group  mb-3">
								<span class="input-group-text" id="basic-addon1"><i class="fas fa-user-circle"></i></span>
								<input type="file" class="form-control" id="arquivo" name="arquivo" />
							</div> end imagem do perfil  -->
							<label for="telefone">Telefone</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text" for="telefone"><i class="fas fa-phone-square"></i></label>
								</div>
								<select class="custom-select" name="tipo" required aria-required="true">
									<option value="">SELECIONE</option>
									<option value="cel">CELULAR</option>
									<option value="res">RESIDENCIAL</option>
									<option value="com">COMERCIAL</option>
								</select>
								<input name="telefone" class="form-control telefone" id="telefone" type="text" minlength="14" required />
							</div><!-- ens telefone-->
							<label for="cep">CEP</label>
							<div class="form-group input-group  mb-3">
								<span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span>
								<input name="cep" required id="cep" type="text" class="form-control" />
							</div>
							<div class="row">
								<div class="col-md-6 mb-3">
									<label for="numcasa">Número</label>					
									<input type="text" class="form-control" required id="numcasa" name="numcasa" maxlength="30" />
								</div>
								<div class="col-md-6 mb-3">
									<label for="complemento">Complemento</label>				
									<input type="text" class="form-control" name="complemento" id="complemento" maxlength="30" />
								</div>
							</div><!--en row-->
							<label>Logradouro</label>
							<div class="form-group input-group  mb-3">
								<input type="text" required id="logradouro" name="logradouro" class="form-control" readonly />
							</div>							
							<label>Bairro</label>
							<div class="form-group input-group  mb-3">
								<input type="text" class="form-control" id="bairro" name="bairro" readonly/>
							</div>
							<div class="row">
								<div class="col-md-8 mb-3">
									<label>Cidade</label>
									<input type="text" class="form-control" id="cidade" name="cidade" readonly />
								</div>
								<div class="col-md-4 mb-3">
									<label>Estado</label>
									<input type="text" id="estado" class="form-control" name="estado" readonly />
								</div>
							</div><!--end bairro / UF-->							
							<!-- input de cadastro -->
							<input type="hidden" name="acao" value="inserir" />
							<input class="btn btn-primary btn-block" type="submit" value="Criar usuário" />
						</div><!--end col-md-6-->
						<!--<div class="col-md-3"></div>-->
					</div><!--end row-->
				</form><!--fim do formulário-->
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