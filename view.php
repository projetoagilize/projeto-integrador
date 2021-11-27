<?php
	require_once('conexao.php');

	if( isset( $_GET['id'] ) ) {
	$id = $_GET[ 'id' ];

	$sql = "SELECT * FROM requisicao WHERE id = '$id' ";
	$resultado = mysqli_query( $conn, $sql );
	$dados = mysqli_fetch_array( $resultado );
	}
?>
			<div class="card xl-12 col-xl-12"><br />
				<a name="topo"></a>
				<form class="signin-form" formname="requisicao" action="?pg=cadastrar" method="POST">
					<div class="row">
						<div class="form-group col-sm-12">
							<label class="label" for="nome">Nome:</label>
							<input class="form-control form-control-sm" type="text" id="nome" name="nome" maxlength="50" size="30"  value="<?php echo $dados['nome'];?>" readonly />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-10">
							<label class="label" for="endereco">Endereço:</label>
							<input class="form-control form-control-sm" type="text" id="endereco" name="endereco" maxlength="50" size="30" value="<?php echo $dados['endereco'];?>" readonly />
						</div>
						<div class="form-group col-sm-2">
							<label class="label" for="numero">Nº:</label>
							<input class="form-control form-control-sm" type="text" id="numero" name="numero" maxlength="5" size="5" value="<?php echo $dados['numero'];?>" readonly />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label class="label" for="cidade">Cidade:</label>
							<input class="form-control form-control-sm" type="text" id="cidade" name="cidade" maxlength="50" size="30" value="<?php echo $dados['cidade'];?>" readonly />
						</div>
						<div class="form-group col-sm-6">
							<label class="label" for="estado">Estado:</label>
							<input class="form-control form-control-sm" type="text" id="estado" name="estado" maxlength="50" size="30" value="<?php echo $dados['estado'];?>" readonly />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label class="label" for="cep">CEP:</label>
							<input class="form-control form-control-sm" type="text" id="cep" name="cep" size="20" maxlength="10" value="<?php echo $dados['cep'];?>" readonly />
						</div>
						<div class="form-group col-sm-6">
							<label class="label" for="telefone">Telefone:</label>
							<input class="form-control form-control-sm" type="text" id="telefone" name="telefone" size="20" maxlength="15" value="<?php echo $dados['telefone'];?>" readonly />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-12">
							<label class="label" for="email">E-Mail:</label>
							<input class="form-control form-control-sm" type="text" id="email" name="email" maxlength="30" size="30" value="<?php echo $dados['email'];?>" readonly />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-12">
							<label>Mensagem:</label>
							<textarea class="form-control form-control-sm" name="mensagem" cols="60" rows="10" readonly><?php echo $dados['mensagem'];?></textarea>
						</div>
					</div>
					<hr style='width: auto; height:2px; text-align:center; border:0px; color:#ff9999; background:#FBEAD5;' />
					<div class="submit" align="center">
						<a href="?pg=editar&id=<?php echo $dados['id']; ?>" class="btn btn-outline-primary"><i class="fas fa-edit"></i>&nbsp;Editar</a>
						<a href="?pg=deletar&id=<?php echo $dados['id']; ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar este Registro?')"><i class="fas fa-trash-alt"></i>&nbsp;Excluir</a>
					</div><br /><br />
				</form>
				<div class="form-group" align="center">
					<?php if ( isset( $_SERVER[ 'HTTP_REFERER' ] ) ): ?>
						<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-light btn-sm"><i class="fas fa-backward"></i>&nbsp;Voltar</a>
					<?php endif ?>
						<a href="#topo" class="btn btn-success btn-sm"><i class="fas fa-arrow-circle-up"></i>&nbsp;Topo</a>
						<a href="index.php" class="btn btn-light btn-sm"><i class="fas fa-home"></i>&nbsp;Home</a><br /><br />
				</div>
			</div>