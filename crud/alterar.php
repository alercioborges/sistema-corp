<?php
include('verifica_login.php');
include ("conexao.php");
$usuario = selectIdUsuario(addslashes($_POST["id"]));

$data = $usuario["nascimento"];
$ano= substr($data, 6);
$mes= substr($data, 3,-5);
$dia= substr($data, 0,-8);
$dataNascimento = "$ano-$mes-$dia";

?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
	<title>Editar cadastro de usuário</title>
	<meta charset="utf-8">
	<!--inicio imports boostrap-->
	<link rel="stylesheet" href="bootstrap-4.3.1-dist\css\bootstrap.min">
	<!--import arquivo de estilo-->
	<link rel="stylesheet" type="text/css" href="css/style_alterar.css">
	<!--import dos icones-->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">	
	<!--inicio imports manual-->
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="jQuery-mask\dist\jquery.mask.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<!--script consulta cep-->
	<script src="js/script_alterar.js"></script>
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
					<li class="breadcrumb-item active">Editar cadastro de usuário</li>
				</ol>

				<!-- Area Chart Example-->				
				<div class="card-header">
					<i class="fas fa-user-plus"></i>
					Area de edição de cadastro de usuário
				</div>
				<form name="dadosUsuario" id="dadosUsuario" action="conexao.php" method="POST"><div class="row">
					<div class="col-md-12 form">
						<label for="username">Nome de usuário</label>
						<div class="form-group input-group  mb-3">						
							<span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
							<input type="text" required name="username" minlength="3" maxlength="30" id="username" class="form-control" value="<?=$usuario["username"]?>" />
						</div>
						<label for="password">Senha</label>
						<div class="form-group input-group  mb-3">						
							<span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
							<input class="form-control" type="password" required name="password" id="password" minlength="3" maxlength="255" value="<?=$usuario["password"]?>" />
						</div>
						<label for="firstname">Nome</label>
						<div class="form-group input-group  mb-3">						
							<span class="input-group-text" id="basic-addon1"><i class="fas fa-file-signature"></i></span>
							<input style="margin-right: 1%;" class="form-control" type="text" required id="firstname" name="firstname" minlength="3" maxlength="30" placeholder="Nome" value="<?=$usuario["firstname"]?>" />
							<input style="margin-left: 1%;" class="form-control" type="text" required name="lastname" minlength="3" maxlength="30" placeholder="Sobrenome" value="<?=$usuario["lastname"]?>" />	
						</div>
						<label for="masculino">Gênero</label>
						<div>
							<div class="form-check form-check-inline">					
								<span class="input-group-text" id="basic-addon1"><i class="fas fa-venus-mars"></i></span>
								<INPUT TYPE="radio" id="masculino" class="form-check-input" NAME="sexo"<?php if ( isset( $usuario['sexo'] ) and $usuario['sexo'] == 'MASCULINO' ) echo ' checked="checked" ' ; ?> VALUE="MASCULINO" CHECKED><label class="form-check-label" for="masculino"> Masculino</label>
							</div>
							<div class="form-check form-check-inline">
								<INPUT TYPE="radio"  id="feminino" class="form-check-input" NAME="sexo"<?php if ( isset( $usuario['sexo'] ) and $usuario['sexo'] == 'FEMININO' ) echo ' checked="checked" ' ?> VALUE="FEMININO"><label class="form-check-label" for="feminino"> Feminino</label>
							</div>
						</div>					
						<label for="email">Email</label>
						<div class="form-group input-group  mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
							<input type="email" class="form-control" required id="email" name="email" maxlength="60" value="<?=$usuario["email"]?>" />
						</div>
						<label for="nascimento">Data de nascimento</label>
						<div class="form-group input-group  mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
							<input type="date" class="form-control" required name="nascimento" id="nascimento" value="<?php echo $dataNascimento; ?>" max="<?php echo date("Y-m-d"); ?>" />
						</div><!--end nascimento-->
						<label for="telefone">Telefone</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text" for="telefone"><i class="fas fa-phone-square"></i></label>
							</div>
							<select class="custom-select" name="tipo" id="tipo" required aria-required="true" >
								<option value="cel" <?=$usuario["tipo"]=='CELULAR'?'selected':''?>>CELULAR</option>
								<option value="res" <?=$usuario["tipo"]=='RESIDENCIAL'?'selected':''?>>RESIDENCIAL</option>
								<option value="com" <?=$usuario["tipo"]=='COMERCIAL'?'selected':''?>>COMERCIAL</option>
							</select>
							<input name="telefone" class="form-control telefone" id="telefone" type="text" minlength="14" required value="<?=$usuario["numero"]?>" />		
						</div><!--end telefone-->
						<label for="cep">CEP</label>
						<div class="form-group input-group  mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span>
							<input name="cep" required id="cep" type="text" class="form-control" value="<?=$usuario["cep"]?>" />
						</div>
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="numcasa">Número</label>							
								<input type="text" class="form-control" required id="numcasa" name="numcasa" maxlength="30" value="<?=$usuario["numcasa"]?>" />
							</div>
							<div class="col-md-6 mb-3">
								<label for="complemento">Complemento</label>			
								<input type="text" class="form-control" name="complemento" id="complemento" maxlength="30" value="<?=$usuario["complemento"]?>" />
							</div>
						</div><!--en row-->
						<label>Logradouro</label>
						<div class="form-group input-group  mb-3">
							<input type="text" required id="logradouro" name="logradouro" class="form-control" readonly  value="<?=$usuario["logradouro"]?>" />
						</div>

						<label>Bairro</label>
						<div class="form-group input-group  mb-3">
							<input type="text" class="form-control" id="bairro" name="bairro" readonly value="<?=$usuario["bairro"]?>" />
						</div>
						<div class="row">
							<div class="col-md-8 mb-3">
								<label>Cidade</label>
								<input type="text" class="form-control" id="cidade" name="cidade" readonly value="<?=$usuario["cidade"]?>" />
							</div>
							<div class="col-md-4 mb-3">
								<label>Estado</label>
								<input type="text" id="estado" class="form-control" name="estado" readonly value="<?=$usuario["estado"]?>" />
							</div>
						</div>						<!--inputs que chamam os metodos-->
						<input type="hidden" name="acao" value="alterar" />
						<input type="hidden" name="id" value="<?=$usuario["idusuario"]?>" />
						<input class="btn btn-primary btn-block" type="submit" value="Atualizar cadastro" />
					</div><!--end col-md-6-->
				</div><!--end row-->
			</form><!--fim do formulário-->		
		</div><!--end container-->

		<?php include("crud_footer.php"); ?>

		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="../js/sb-admin.min.js"></script>
	</body>
	</html>