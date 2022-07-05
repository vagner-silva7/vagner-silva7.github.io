<?php

require "../includes/funcoes-sessao.php";
require "../includes/funcoes-fabricantes.php";

verificaAcesso();

/* recuperando os dados da sessão usuarios sessao */
$idUsuarioLogado = $_SESSION['id'];
$tipoUsuarioLogado = $_SESSION['tipo'];

$listaDeFabricantes = lerFabricantes( $conexao, $idUsuarioLogado, $tipoUsuarioLogado);


/* Se o botao inserir do formulario for acionado, ou seja,
ele passará a ser definido ou existir*/
if(isset($_POST['inserir'])){
    $nome = filter_input(INPUT_POST,'nome', 
    FILTER_SANITIZE_SPECIAL_CHARS);
    $usuario_id = filter_input(INPUT_POST,'usuario_id', 
    FILTER_SANITIZE_NUMBER_INT);

    inserirFabricantes($conexao, $nome, $idUsuarioLogado);

    header("location:listar.php");    /* redirecionamento apos cadastrar */

}
?>


<?php include "../includes/cabecalho.php" ?>

    <div class="container">

        <h2>Cadastro de fabricantes</h2>
            
            <p><a href="../entrada.php">Pagina inicial</a>   -   
            <a href="../contato.php">Contato</a>   -   
            <a href="../posts/post-geral.php">Posts</a></p>
            <hr>

            <p> Digite as informações abaixo, para cadastrar fabricantes.</p> 
            
            <p>Segue as instruções:</p>
            
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Quidem enim sed aliquam maiores omnis excepturi aperiam laborum 
            laudantium tenetur quaerat delectus reiciendis, officiis voluptate. 
            Cum laboriosam magnam illo dolore soluta?</p>

                <!-- Formulario contato -->
                <!-- Action - Envio ao formspree.io (envio de dados para o email cadastrado no site) -->
                <form action="" method="post">

                        <!-- instrução do caixa (Nome:)  -->
                        <!-- for será igual id -->
                        <label for="nome">Nome do fabicante:</label>
                        
                        <!-- caixa de entrada -->
                        <!-- required, não permite envio em branco do item -->
                        <input type="text" name="nome" id="nome" placeholder="Digite nome do fabicante" required>

                            <button name="inserir">Inserir fabricante</button>

                            <p></p>
                       


                <!-- Pode ser assim também: -->
                <!-- <input type="button" value="Enviar dados"> -->
                </form>

    </div>

<?php include "../includes/rodape.php" ?>