<?php
require_once('conexao.php');

if(isset($_GET['id'])){
   $id = $_GET['id'];
}
  $sql = "DELETE FROM requisicao WHERE id = '$id'";
  $resultado = mysqli_query($conn, $sql);
  if($resultado){
	  function myAlert($msg, $url){
		  echo '<script language="javascript">alert("' .$msg. '");</script>';
		  echo "<script>document.location = '$url'</script>";
	  }
	  myAlert("Cliente excluído!","index.php");
  }else{
	die('Não foi possível excluir: ' . mysqli_error($conn));
  }
?>