<?php
	include_once('conexao.php');

	function corrigir($texto) {
        $texto=trim($texto);
		setlocale(LC_CTYPE,'pt_BR','pt_BR.iso-8859-1','pt_BR.utf-8','portuguese',
		'ptb','portuguese-brasil','bra','brasil','br');
		$texto=strtoupper($texto);
		return $texto;
		while(strpos($texto,'  ')!==false)
		{	$texto=str_replace('  ',' ',$texto); }
		return $texto;
	}

	//recuperando
	if( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {
		$nome = corrigir($_POST['nome']);
		$endereco = corrigir($_POST['endereco']);
		$numero = $_POST['numero'];
		$cidade = corrigir($_POST['cidade']);
		$estado = $_POST['estado'];
		if (isset($_POST['cep'])) {
			$cep = $_POST['cep'];
			$cep = preg_replace("/[^0-9]/", "", $cep);
		  }
		if (isset($_POST['telefone'])) {
			$telefone = $_POST['telefone'];
			$telefone = preg_replace("/[^0-9]/", "", $telefone);
		  }
		$email = strtolower(trim($_POST['email']));
		$mensagem =  corrigir($_POST['mensagem']);
	}
	//criando a linha de INSERT
	$sql = "INSERT INTO requisicao( nome, endereco, numero, cidade, estado, cep, telefone, email, mensagem )
						VALUES( '$nome', '$endereco', '$numero', '$cidade', '$estado', '$cep', '$telefone', '$email', '$mensagem' )";

	$resultado = mysqli_query( $conn, $sql );

	if( $resultado ) {
		function myAlert( $msg, $url ) {
				echo '<script language= "javascript">alert("'.$msg.'");</script>';
				echo "<script>document.location='$url'</script>";
			} myAlert( "Requisição cadastrada com sucesso!", "index.php" );
	} else {
		die( 'Erro ao cadastrar Contrato: ' . mysqli_error( $conn ) );
	}
	mysqli_close( $conn );
?>