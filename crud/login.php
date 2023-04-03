<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
	<title>Acessar</title>
	<meta charset="utf-8">
	<!--inicio imports boostrap-->
	<link rel="stylesheet" href="bootstrap-4.3.1-dist\css\bootstrap.min">
	<!--import arquivo de estilo-->
	<link rel="stylesheet" type="text/css" href="css/style_login.css">
	<!--import dos icones-->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">	
	<!--inicio imports manual-->
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="jQuery-mask\dist\jquery.mask.min.js"></script>
	<!--script consulta cep-->
	<script src="js/script_login.js"></script>
</head>
<body class="text-center">
	<form class="boxBody form-signin" action="conexao.php" method="POST">		
		<img class="mb-4" src="imagem/logo.png" alt="" width="70" height="75">
		<h1 class="h3 mb-3 font-weight-normal">Entar</h1>
		<!--exibindo a msg de login inválido-->
		<?php
		if(isset($_SESSION['nao_autenticado'])):
			?>
			<div class="alert alert-danger text-center"><i class="iconAlert fas fa-exclamation"></i><span class="text-alert"> Nome de usuário ou senha inválidos</span></div>
			<?php
		endif;
		unset($_SESSION['nao_autenticado']);
		?>

		<label for="inputUsername" class="sr-only">Nome de usuário</label>
		<input type="text" id="inputUsername" name="nomeUsuario" class="form-control" placeholder="Nome de usuário" required autofocus>
		<label for="inputPassword" class="sr-only">Senha</label>
		<input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required>
		<div class="checkbox mb-3">
			<label>
				<input type="checkbox" value="remember-me"> Remember me
			</label>
		</div>
		<input type="hidden" name="acao" value="logar" />
		<button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-entrar">Acessar</button>
		<p class="mt-5 mb-3 text-muted">&copy; Alercio's Corporation</p>
	</form>
</body>
</body>
</html>