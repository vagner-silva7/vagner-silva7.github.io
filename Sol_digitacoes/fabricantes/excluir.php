<?php

require '../includes/funcoes-fabricantes.php';
require "../includes/funcoes-sessao.php";

verificaAcesso();

    /* captura das informações e o parametro id da url, 
    atualizar e excluir, da pasta listar.php */

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $idUsuarioLogado = $_SESSION['id'];
    $tipoUsuarioLogado = $_SESSION['tipo'];

    /* Chamamos a função que irá retornar os dados de um fabricante excluidos*/

    excluirFabricante($conexao, $id, $idUsuarioLogado, $tipoUsuarioLogado);

    header("location:listar.php");

?>


<?php include "../includes/cabecalho.php" ?>

    <div class="container">

        <h2>Excluir fabricantes</h2>
        
            <p><a href="../entrada.php">Pagina inicial</a>   -   
            <a href="../contato.php">Contato</a>   -   
            <a href="../posts/post-geral.php">Posts</a></p>
            <hr>

    </div>
            
<?php include "../includes/rodape.php" ?>