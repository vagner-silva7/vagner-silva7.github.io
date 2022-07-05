<?php 


require "../includes/cabecalho.php";
require "../includes/funcoes-sessao.php";
require "../includes/funcoes-usuarios.php";


verificaAcessoAdmin();

$usuarios = lerUsuarios($conexao);
$quantidade = count($usuarios);

?>
 
 <div class="container">

		<h2>Lista de usuarios</h2>

			<p> Para cadastrar usuarios, clique:  <a href="usuario-insere.php">Inserir </a> </p>
			<hr>

			<p><a href="../entrada.php">Pagina inicial</a>   -   <a href="../contato.php">Contato</a></p>
			<hr>

 	<div>

		<article>

			<h2 class="text-center">Usuários <span class="badge badge-primary"> <?=$quantidade?></span>
			</h2>
			
				<div class="table-responsive">
		
					<table class="table table-hover">
						<thead class="thead-light">
							<tr>
								<th>Nome</th>
								<th>E-mail</th>
								<th>Tipo</th>
								<th colspan="2" class="text-center">Operações</th>
							</tr>
						</thead>

						<tbody>

							<?php foreach ( $usuarios as $usuario ) { ?>

								<tr>
									<td> <?=$usuario['nome']?> </td>
									<td> <?=$usuario['email']?> </td>
									<td> <?=$usuario['tipo']?> </td>
									<td class="text-center">
										<a class="btn btn-warning btn-sm" 
										href="usuario-atualiza.php?id=<?=$usuario['id']?>">
										Atualizar
										</a>
									</td>
									<td class="text-center">
										<a class="btn btn-danger btn-sm excluir" 
										href="usuario-exclui.php?id=<?=$usuario['id']?>">
										Excluir
										</a>
									</td>
								</tr>

							<?php } ?>
						</tbody>                
					</table>
				</div>
		</article>
	</div>
</div>

<?php require "../includes/rodape.php"; ?> 