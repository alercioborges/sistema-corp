<?php
include('verifica_login.php');
include('conexao.php');

define('DB_SERVER', '186.192.160.186:3314');
define('DB_USER', 'crud');
define('DB_PASSWORD', '1234');
define('DB_NAME', 'crud');

if (isset($_GET['term'])){
	$return_arr = array();

	try {
		$conn = new PDO("mysql:host=".DB_SERVER.";port=8889;dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare("SELECT CONCAT(firstname,' ', lastname, ' - ', email) AS dados FROM usuario WHERE CONCAT(firstname,' ', lastname) LIKE :term");
		$stmt->execute(array('term' => '%'.$_GET['term'].'%'));

		while($row = $stmt->fetch()) {
			$return_arr[] =  $row['dados'];
		}

	} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}


	/* Toss back results as json encoded array. */
	echo json_encode($return_arr);
}

?>