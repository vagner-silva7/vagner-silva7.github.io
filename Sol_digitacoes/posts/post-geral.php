<?php 

require "../includes/cabecalho.php";
require "../includes/funcoes-posts.php";

$posts = lerTodosOsPosts($conexao);

?>  

    <p><a href="../entrada.php">Pagina inicial</a>   -   
    <a href="../contato.php">Contato</a></p>
    <hr>


<div>
        
        <!-- INÍCIO ROW -->

        <?php foreach($posts AS $post) {?>

            <!-- INÍCIO Card -->
            <div>
                    <a href="post-detalhe.php?id=<?=$post['id']?>" class="card-link">
                        <img src="../imagens/<?=$post['imagem']?>" alt="Imagem de capa do card">
                            <div>
                                <p><?=$post['titulo']?></p>
                                <p><?=$post['resumo']?></p>
                            </div>
                    </a>
            </div>

            <br>

            <!-- FIM Card -->

        <?php } ?>

	</div>

    <hr>

<?php include "../includes/rodape.php" ?> 