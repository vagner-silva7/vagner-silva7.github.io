<?php

require '../includes/funcoes-produtos.php';
require "../includes/funcoes-sessao.php";

verificaAcesso();


/* recuperando os dados da sessão usuarios sessao */
$idUsuarioLogado = $_SESSION['id'];
$tipoUsuarioLogado = $_SESSION['tipo'];

/* ao solicitar funcoes-produtos.php, chama tambem conecta.php */
$listaDeProdutos = lerProdutos( $conexao, $idUsuarioLogado, $tipoUsuarioLogado);

?>


<?php include "../includes/cabecalho.php"; ?>

    <div class="container">

        <h2>Listar produtos</h2>
        
            <p> Para cadastrar produtos, clique:  <a href="inserir.php">Inserir </a> </p>
            <hr>
                
            <p><a href="../entrada.php">Pagina inicial</a>   -   
            <a href="../contato.php">Contato</a>   -   
            <a href="../posts/post-geral.php">Posts</a></p>
            <hr>

        <div class="row">
            <?php foreach( $listaDeProdutos as $produto ) { ?>

                <article>
                    <h3><?= $produto ['produto'] ?> </h3>
                        <p><b>Preço:</b> <?= formataMoeda($produto ['preco']) ?>  </p>
                        <p><b>Quantidade:</b> <?= $produto ['quantidade'] ?> </p>
                        <p><b>Descrição:</b> <?= $produto ['descricao'] ?> </p>
                        <p><b>Fabricante:</b> <?= $produto ['fabricante'] ?> </p>

                            <?php if($tipoUsuarioLogado == 'admin') { ?>

                                <p><b>Usuario:</b> <?= $produto ['digitador']?> </p>

                            <?php } ?>

                        <p class="text-center"></p>
                            <a class="btn btn-warning btn-sm" href="atualizar.php?id=<?= $produto ['id'] ?>">Atualizar</a>
                        <p class="text-center"></p>    
                            <a class="btn btn-danger btn-sm" href="excluir.php?id=<?= $produto ['id'] ?>">Excluir</a>

                </article>

            <?php } ?>    

        </div>        

    </div>
<?php include "../includes/rodape.php" ?>