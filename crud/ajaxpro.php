	
<?php

$hostName = "186.192.160.186:3314";
$username = "crud";
$password = "1234";
$dbname = "crud";

$mysqli = new mysqli($hostName, $username, $password, $dbname);

$sql = "SELECT idusuario, CONCAT(firstname,' ', lastname, ' - ', email) AS dados FROM usuario WHERE CONCAT(firstname,' ', lastname) LIKE '%".$_GET['dados']."%'";

$result = $mysqli->query($sql);

$response = [];
while($row = mysqli_fetch_assoc($result)){
	$response[] = array("idusuario"=>$row['idusuario'], "dados"=>$row['dados']);
}

echo json_encode($response);

