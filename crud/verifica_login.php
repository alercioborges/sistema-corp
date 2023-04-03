<?php
session_start();
if(!$_SESSION['nomeUsuario']) {
	header('Location: login.php');
	exit();
}
