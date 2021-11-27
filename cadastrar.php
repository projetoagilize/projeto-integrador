<?php
	include_once('conexao.php');
	//recuperando
	$nome = $_POST['nome'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];
	$mensagem = $_POST['mensagem'];
	

	//criando a linha de INSERT
	$sqlinsert = "insert into tab_agilize(nome, telefone, email, mensagem)
				values ('$nome','$telefone', '$email', '$mensagem')";

	//executando instrução SQL
	$resultado = @mysqli_query($conexao, $sqlinsert);
	if (!$resultado) {
		die('Query Inválida: ' .@mysqli_error($conexao));
	} else {
		echo "<script language='javascript' type='text/javascript'>alert('Sua Solicitação foi Enviada!');window.location.href='pedido.html'</script>";
	}
	mysqli_close($conexao);
?>