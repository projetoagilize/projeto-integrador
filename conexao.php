<?php
	$host = "localhost";
	$user = "edcmnet_univesp";
	$pass = "univesp2021";
	$banco = "edcmnet_univesp1";

	$conn = mysqli_connect($host, $user, $pass, $banco);
		mysqli_set_charset ($conn, "utf8");

	if (!$conn) {
		die ("Falha na conexao: " . mysqli_connect_error());
	}
		else {
			//echo "Conexao realizada com sucesso";
			//header("Location: index.php");
			//exit();
	}
?>