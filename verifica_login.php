<?php
session_start();
if(!$_SESSION['nomeUsuario']) {
	header('Location: crud/login.php');
	exit();
}