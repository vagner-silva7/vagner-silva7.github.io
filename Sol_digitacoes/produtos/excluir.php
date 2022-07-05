<?php

require "../includes/funcoes-produtos.php";
require "../includes/funcoes-sessao.php";

verificaAcesso();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$idUsuarioLogado = $_SESSION['id'];
$tipoUsuarioLogado = $_SESSION['tipo'];

excluirProduto($conexao, $id, $idUsuarioLogado, $tipoUsuarioLogado);

header("location:listar.php");

?>

<?php include "../includes/cabecalho.php" ?>

    <div class="container">

        <h2>Excluir produtos</h2>
            
            <p><a href="../entrada.php">Pagina inicial</a>   -   
            <a href="../contato.php">Contato</a>   -   
            <a href="../posts/post-geral.php">Posts</a></p>
            <hr>

    </div>

<?php include "../includes/rodape.php" ?>