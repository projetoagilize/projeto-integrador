				<div class="card xl-12 col-xl-12"><br />
                    <a name="topo"></a>
					<div class="row">
						<div class="form-group col-sm-4">
						</div>
						<div class="form-group col-sm-4">
						</div>
						<div class="form-group col-sm-4" align="right">
						<?php if ( isset( $_SERVER[ 'HTTP_REFERER' ] ) ): ?>
							<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-light btn-sm" title="Voltar"><i class="fas fa-backward"></i></a>
						<?php endif ?>
							<a href="#topo" class="btn btn-success btn-sm" title="Topo"><i class="fas fa-arrow-circle-up"></i></a>
							<a href="index.php" class="btn btn-dark btn-sm" title="Home"><i class="fas fa-home"></i></a>
							<a href="?pg=requisicao" class="btn btn-warning btn-sm" title="Cadastrar Requisição"><i class="fa fa-plus"></i></a>
						</div>
					</div>
					<div>
						<!-- INÍCIO DA PESQUISA -->
						<table class="table table-dark table-striped table-hover table-sm" style='border:1px; font-family:sans-serif; font-size:0.8em;'>
							<caption>Resultado da consulta</caption>
								<div class="row">
									<div class="col-sm-6">
										<a href="?pg=requisicao" class="btn btn-info btn-md"><i class="fas fa-plus"></i>&nbsp;Cadastrar Requisição</a>
									</div>
									<div class="col-sm-6">
										<form action="?pg=search" method="POST">
											<button type="submit" class="form-control btn btn-success btn-sm float-right submit_btn" style="width:50px;" name="submit" value="search"><i class="fa fa-search"></i></button>&nbsp;
											<input type="text" class="form-control float-right" style="width:200px;" placeholder="Pesquisar..." name="search" autofocus onkeyup="this.value = this.value.toUpperCase();" />
										</form>
									</div>
								</div>
								<br />
								<thead class="thead-dark">
									<tr>
										<th scope="col">Nome</th>
										<th scope="col">Telefone</th>
										<th scope="col">Cidade</th>
										<th scope="col">Estado</th>
										<th scope="col">E-mail</th>
										<th scope="col" colspan="3">Ações</th>
									</tr>
								</thead>
								<tbody>
                                <?php
                                	require_once('conexao.php');

                                    $search = $_POST[ 'search' ];
                                    $pagina_atual = filter_input( INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT );
                                    $pagina = ( !empty ( $pagina_atual ) ) ? $pagina_atual : 1;
                                    $qnt_result_pg = 20;
                                    $inicio = ( $qnt_result_pg * $pagina ) - $qnt_result_pg;

                                    $sql = "SELECT * FROM requisicao WHERE nome LIKE '%$search%' ORDER By nome DESC LIMIT $inicio, $qnt_result_pg";

                                    $req = mysqli_query( $conn, $sql );
                                    while( $dados = mysqli_fetch_assoc( $req ) ) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $dados[ 'nome' ] ?></th>
                                        <td><?php echo $dados[ 'telefone' ] ?></td>
                                        <td><?php echo $dados[ 'cidade' ] ?></td>
                                        <td><?php echo $dados[ 'estado' ] ?></td>
                                        <td><?php echo $dados[ 'email' ] ?></td>
                                        <td><a href="?pg=view&id=<?php echo $dados[ 'id' ]; ?>" class="btn btn-outline-success" title="Ver"><i class="fas fa-eye"></i></a></td>
                                        <td><a href="?pg=editar&id=<?php echo $dados[ 'id' ]; ?>" class="btn btn-outline-primary" title="Editar"><i class="fas fa-edit"></i></a></td>
                                        <td><a href="?pg=deletar&id=<?php echo $dados['id']; ?>" class="btn btn-danger" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir este Cliente?')"><i class="fas fa-trash-alt"></i></a></td>
                                    </tr>
                                <?php
                                    }

                                    //Paginação - Somar a quantidade de usuários
                                    $result_pg = " SELECT COUNT(id) AS num_result FROM requisicao ";
                                    $resultado_pg = mysqli_query ( $conn, $result_pg );
                                    $row_pg = mysqli_fetch_assoc ( $resultado_pg );
                                    //echo $row_pg['num_result'];

                                    //Quantidade de página
                                    $quantidade_pg = ceil( $row_pg['num_result'] / $qnt_result_pg ); //Comando "ceil" arredonda os valores

                                    //Limitar os links antes/depois
                                    $max_links = 1;

                                    echo "<a href='index.php?pg=search&pagina=1'>Primeira&nbsp;</a> ";

                                    $anterior = $pagina - 1;
                                    if ( $anterior >= 1 ) {
                                            echo "<a href='index.php?pg=search&pagina=$anterior'>|&nbsp;Anterior&nbsp;</a>";
                                        }

                                    for ( $pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
                                        if ( $pag_ant >= 1 ) {
                                            echo "<a href='index.php?pg=search&pagina=$pag_ant'>&nbsp;$pag_ant&nbsp;</a> ";
                                        }
                                    }

                                    echo "<b>$pagina</b>";

                                    for ( $pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
                                        if ( $pag_dep <= $quantidade_pg ) {
                                            echo "<a href='index.php?pg=search&pagina=$pag_dep'>&nbsp;$pag_dep</a> ";
                                        }
                                    }

                                    $proxima = $pagina + 1;
                                    if ( $proxima <= $quantidade_pg ) {
                                            echo "<a href='index.php?pg=search&pagina=$proxima'>&nbsp;&nbsp;Próxima&nbsp;|</a>";
                                        }

                                    echo "<a href='index.php?pg=search&pagina=$quantidade_pg'>&nbsp;Última</a> ";
                                ?>
                            </tbody>
                        </table>
                        <!-- FIM DA PESQUISA-->
					</div>
					<hr />
					<div class="form-group" align="center">
						<?php if ( isset( $_SERVER[ 'HTTP_REFERER' ] ) ): ?>
							<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-light btn-sm"><i class="fas fa-backward"></i>&nbsp;Voltar</a>
						<?php endif ?>
							<a href="#topo" class="btn btn-success btn-sm"><i class="fas fa-arrow-circle-up"></i>&nbsp;Topo</a>
							<a href="index.php" class="btn btn-light btn-sm"><i class="fas fa-home"></i>&nbsp;Home</a><br /><br />
					</div>
				</div>