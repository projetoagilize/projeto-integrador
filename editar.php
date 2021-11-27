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
				<form class="signin-form" formname="requisicao" action="?pg=atualizar" method="POST">
					<div class="row">
						<div class="form-group col-sm-12">
							<label class="label" for="nome">Nome:</label>
							<input type="hidden" class="form-control" style="width:180px; text-align: center;" id="id"  name="id" size="10" value="<?php echo $dados['id'];?>" />
							<input class="form-control form-control-sm" type="text" id="nome" name="nome" maxlength="50" size="30"  value="<?php echo $dados['nome'];?>" onkeyup="this.value = this.value.toUpperCase();" autofocus  />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-10">
							<label class="label" for="endereco">Endereço:</label>
							<input class="form-control form-control-sm" type="text" id="endereco" name="endereco" maxlength="50" size="30" value="<?php echo $dados['endereco'];?>" onkeyup="this.value = this.value.toUpperCase();" />
						</div>
						<div class="form-group col-sm-2">
							<label class="label" for="numero">Nº:</label>
							<input class="form-control form-control-sm" type="text" id="numero" name="numero" maxlength="5" size="5" value="<?php echo $dados['numero'];?>" />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label class="label" for="cidade">Cidade:</label>
							<input class="form-control form-control-sm" type="text" id="cidade" name="cidade" maxlength="50" size="30" value="<?php echo $dados['cidade'];?>" onkeyup="this.value = this.value.toUpperCase();" />
						</div>
						<div class="form-group col-sm-6">
							<label class="label" for="estado">Estado:</label>
							<select class="form-control form-control-sm" id="estado" name="estado">
								<?php
									$estados = 'AC,AL,AM,AP,BA,CE,DF,ES,GO,MA,MG,MS,MT,PA,PB,PE,PI,PR,RJ,RO,RR,RS,SC,SE,SP,TO' ;
									$estados = explode( ',' , $estados );
									$total = count( $estados );
									for ( $i = 0; $i < $total; $i++ ) {
										//echo "\t\t\t\t\t\t\t\t <option value=\"$estados[$i]\">$estados[$i]</option>\n";
									$aux = '' ;
									if ( $estados[$i] == $dados[ 'estado' ] ) {
										$aux = 'selected' ;
									}
								?>
									<option value = "<?php echo $estados[$i]; ?>"<?php echo $aux; ?>><?php echo $estados[$i]; ?></option>
								<?php
									}
								?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label class="label" for="cep">CEP:</label>
							<input class="form-control form-control-sm" type="text" id="cep" name="cep" size="20" maxlength="10" value="<?php echo $dados['cep'];?>" onkeypress="$(this).mask('00.000-000');" />
						</div>
						<div class="form-group col-sm-6">
							<label class="label" for="telefone">Telefone:</label>
							<input class="form-control form-control-sm" type="text" id="telefone" name="telefone" size="20" maxlength="15" value="<?php echo $dados['telefone'];?>" onkeypress="$(this).mask('(00) 0000-00009');" />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-12">
							<label class="label" for="email">E-Mail:</label>
							<input class="form-control form-control-sm" type="text" id="email" name="email" maxlength="30" size="30" value="<?php echo $dados['email'];?>" onkeyup="this.value = this.value.toLowerCase();" />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-12">
							<label>Mensagem:</label>
							<textarea class="form-control form-control-sm" name="mensagem" cols="60" rows="10" placeholder="Descreva sua solicitação..." onkeyup="this.value = this.value.toUpperCase();" ><?php echo $dados['mensagem'];?></textarea>
						</div>
					</div>
					<hr style='width: auto; height:2px; text-align:center; border:0px; color:#ff9999; background:#FBEAD5;' />
					<div class="submit" align="center">
						<center><button class="btn btn-danger btn-md submit_btn" id="btn-atualizar" name="btn-atualizar" value="btn-atualizar"><i class="fas fa-user-edit"></i>&nbsp;Atualizar</button></center>
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