<?php
    require_once('conexao.php');

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
      $id = $_POST['id'];
    }

    $sql = "UPDATE requisicao
                    SET nome = '$nome', endereco = '$endereco', numero = '$numero', cidade = '$cidade', estado = '$estado', cep = '$cep', telefone = '$telefone', email = '$email', mensagem = '$mensagem'
                      WHERE id = $id ";

    if ( mysqli_query($conn, $sql) )
    {
        function myAlert($msg, $url) {
            echo '<script language= "javascript">alert("'.$msg.'");</script>';
            echo "<script>document.location='$url'</script>";
        }
        myAlert("Alteração efetuada!", "?pg=view&id=$id");
    }
    else
    {
        die('Erro ao atualizar: ' . mysqli_error($conn));
        header('Location:index.php');
    }

    mysqli_close($conn);
?>