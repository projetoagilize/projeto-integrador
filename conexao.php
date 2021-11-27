<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$banco = "bd_agilize";

	$conexao = @mysqli_connect($host,$user,$pass,$bd_agilize)
	or die ("Problemas com a conexão do Banco de Dados");
?>