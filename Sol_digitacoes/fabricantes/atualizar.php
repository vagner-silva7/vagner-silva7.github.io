<?php

require "../includes/funcoes-fabricantes.php";
require "../includes/funcoes-sessao.php";

verificaAcesso();

/* Pegar os dados de ssessão do usuario logado */
$idUsuarioLogado = $_SESSION['id'];
$tipoUsuarioLogado = $_SESSION['tipo'];

/* captura das informações e o parametro id da url, 
atualizar e excluir, da pasta listar.php */

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

/* Chamamos a função que irá retornar os dados de um fabricante */

$dados = lerUmFabricante($conexao, $id, $idUsuarioLogado, $tipoUsuarioLogado);

/* Detectar o acionamento do botao atualizar, para alterar... */
if( isset($_POST['atualizar'])){

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $usuario_id = filter_input(INPUT_POST,'usuario_id', FILTER_SANITIZE_NUMBER_INT);
    
    atualizarFabricante($conexao, $id, $nome, $idUsuarioLogado, $tipoUsuarioLogado);
    
    /* redirecionamento ou voltar para paginar listar.php */
    header("location:listar.php");

}


?>



<?php include "../includes/cabecalho.php" ?>

    <div class="container">

        <h2>Atualizar fabricantes</h2>
            
            <p><a href="../entrada.php">Pagina inicial</a>   -   
            <a href="../contato.php">Contato</a>   -   
            <a href="../posts/post-geral.php">Posts</a></p>
            <hr>

                <p>Digite o formulário abaixo para atualizar os dados de um fabricante.</p>

        <form action="" method="post" class="w-50 mx-auto">

	        <p>
                <label for="nome">Nome:</label><br>
	            <input value="<?=$dados['nome']?>" type="text" name="nome" id="nome" required>
            </p>  

            <button name="atualizar">Atualizar fabricante</button>

            <P></P>

	    </form>	

    </div>
            
<?php include "../includes/rodape.php" ?>