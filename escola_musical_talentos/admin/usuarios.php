<?php 
require "../inc/funcoes-usuarios.php";
require "../inc/cabecalho-admin.php"; 
verificaAcessoAdmin();

$usuarios = lerUsuarios($conexao);
$quantidade = count($usuarios);
?>
<!-- TESTE <pre><?=var_dump($usuarios)?></pre> -->

<div class="conteudo limitador">
	<article class="">
		
		<h2>
		Usuários <span class="button-count"><?= $quantidade ?></span>
		</h2>

		<p>
				<a class="button-insere" href="usuario-insere.php">Inserir Novo</a>
		</p>
				
		<div class="">
		
			<table id="customers">
				<thead class="">
					<tr>
						<th>Nome</th>
						<th>E-mail</th>
						<th>Tipo</th>
						<th colspan="2" class="">Operações</th>
					</tr>
				</thead>

				<tbody>
<?php foreach( $usuarios as $usuario ) { ?>

					<tr>
						<td> <?=$usuario['nome']?> </td>
						<td> <?=$usuario['email']?> </td>
						<td> <?=$usuario['tipo']?> </td>
						<td class="">
							<a class="button-atualiza" 
							href="usuario-atualiza.php?id=<?=$usuario['id']?>"> <!-- para concatenar, colocar antes da ultima " um & e o testo que desejar -->
								Atualizar
							</a>
						</td>
						<td class="">
							<a class="button-exclui" 
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

<?php require "../inc/rodape-admin.php"; ?> 