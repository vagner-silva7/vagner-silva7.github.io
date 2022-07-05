<?php

require "../includes/funcoes-posts.php";
require "../includes/cabecalho.php";

$idPost = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$post = lerDetalhes($conexao, $idPost);


?>
<div>
	<!-- INÍCIO ROW -->

		<h2> <?=$post['titulo']?> </h2>
		<p class="font-weight-light">
			<time>
				<?=formataData($post['data'])?>
			</time> - <span><?=$post['autor']?></span>
		</p>

		<img src="../imagens/<?=$post['imagem']?>" alt="Imagem de destaque do post" class="float-left pr-2 img-fluid">

		<p><?=nl2br($post['texto'])?></p>

		<!-- nl2br serve para quebrar linha entre paragrafos -->

</div> <!-- FIM ROW -->

<p><a href="../entrada.php">Voltar a pagina inicial</a></p>

<?php
require "../includes/rodape.php";
?>