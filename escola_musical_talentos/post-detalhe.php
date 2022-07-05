<?php 
require "inc/funcoes-posts.php";
require "inc/cabecalho.php";

$idPost = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$post = lerDetalhes ($conexao, $idPost);



?>

<div>
	<!-- INÍCIO ROW -->

	<article  class="noticias limitador">
		<h2> <?=$post['titulo'] ?> </h2>
			<div>
					<p>
						<time>
						<?=formataData($post['data']) ?>
						</time> - <span><?=$post['autor'] ?></span>
					</p>
			</div>
			<div>
					<img src="imagens/<?=$post['imagem']?>" alt="Imagem de destaque do post"> 
			</div>

			<div class="teste">
					<p><?=nl2br($post['texto']) ?></p> <!-- nl2br - uma função que da espaçamento ao texto -->
				
			</div>

	</article>

</div> <!-- FIM ROW -->

<?php
require "inc/rodape.php";
?>