			<div class="card xl-12 col-xl-12"><br />
				<a name="topo"></a>
				<form class="signin-form" formname="requisicao" action="?pg=cadastrar" method="POST">
					<div class="row">
						<div class="form-group col-sm-12">
							<label class="label" for="nome">Nome:</label>
							<input class="form-control form-control-sm" type="text" id="nome" name="nome" maxlength="50" size="30" onkeyup="this.value = this.value.toUpperCase();" autofocus />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-10">
							<label class="label" for="endereco">Endereço:</label>
							<input class="form-control form-control-sm" type="text" id="endereco" name="endereco" maxlength="50" size="30" onkeyup="this.value = this.value.toUpperCase();" />
						</div>
						<div class="form-group col-sm-2">
							<label class="label" for="numero">Nº:</label>
							<input class="form-control form-control-sm" type="text" id="numero" name="numero" maxlength="5" size="5" />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label class="label" for="cidade">Cidade:</label>
							<input class="form-control form-control-sm" type="text" id="cidade" name="cidade" maxlength="50" size="30" onkeyup="this.value = this.value.toUpperCase();" />
						</div>
						<div class="form-group col-sm-6">
							<label class="label" for="estado">Estado:</label>
							<select class="form-control form-control-sm" id="estado" name="estado">
								<option value="AC">Acre</option>
								<option value="AL">Alagoas</option>
								<option value="AP">Amapá</option>
								<option value="AM">Amazonas</option>
								<option value="BA">Bahia</option>
								<option value="CE">Ceará</option>
								<option value="DF">Distrito Federal</option>
								<option value="ES">Espírito Santo</option>
								<option value="GO">Goiás</option>
								<option value="MA">Maranhão</option>
								<option value="MT">Mato Grosso</option>
								<option value="MS">Mato Grosso do Sul</option>
								<option value="MG">Minas Gerais</option>
								<option value="PA">Pará</option>
								<option value="PB">Paraiba</option>
								<option value="PR">Paraná</option>
								<option value="PE">Pernambuco</option>
								<option value="PI">Piauí</option>
								<option value="RJ">Rio de Janeiro</option>
								<option value="RN">Rio Grande do Norte</option>
								<option value="RS">Rio Grande do Sul</option>
								<option value="RO">Rondônia</option>
								<option value="RR">Roraima</option>
								<option value="SC">Santa Catarina</option>
								<option value="SP" selected>São Paulo</option>
								<option value="SE">Sergipe</option>
								<option value="TO">Tocantins</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label class="label" for="cep">CEP:</label>
							<input class="form-control form-control-sm" type="text" id="cep" name="cep" size="20" maxlength="10" onkeypress="$(this).mask('00.000-000');" />
						</div>
						<div class="form-group col-sm-6">
							<label class="label" for="telefone">Telefone:</label>
							<input class="form-control form-control-sm" type="text" id="telefone" name="telefone" size="20" maxlength="15" onkeypress="$(this).mask('(00) 0000-00009');" />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-12">
							<label class="label" for="email">E-Mail:</label>
							<input class="form-control form-control-sm" type="text" id="email" name="email" maxlength="30" size="30" onkeyup="this.value = this.value.toLowerCase();" />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-12">
							<label>Mensagem:</label>
							<textarea class="form-control form-control-sm" name="mensagem" cols="60" rows="10" placeholder="Descreva sua solicitação..." onkeyup="this.value = this.value.toUpperCase();" ></textarea>
						</div>
					</div>
					<hr style='width: auto; height:2px; text-align:center; border:0px; color:#ff9999; background:#FBEAD5;' />
					<div class="submit" align="center">
						<input type="submit" class="btn btn-danger btn-sm" name="botao" id="btnEnviar" value="Enviar" /><br /><br /><br />
					</div>
				</form>
				<div class="form-group" align="center">
					<?php if ( isset( $_SERVER[ 'HTTP_REFERER' ] ) ): ?>
						<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-light btn-sm"><i class="fas fa-backward"></i>&nbsp;Voltar</a>
					<?php endif ?>
						<a href="#topo" class="btn btn-success btn-sm"><i class="fas fa-arrow-circle-up"></i>&nbsp;Topo</a>
						<a href="index.php" class="btn btn-light btn-sm"><i class="fas fa-home"></i>&nbsp;Home</a><br /><br />
				</div>
			</div>