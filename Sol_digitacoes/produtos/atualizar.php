<?php


    require '../includes/funcoes-fabricantes.php';
    require '../includes/funcoes-produtos.php';
    require "../includes/funcoes-sessao.php";

    verificaAcesso();

    /* Pegar os dados de ssessão do usuario logado */
    $idUsuarioLogado = $_SESSION['id'];
    $tipoUsuarioLogado = $_SESSION['tipo'];

    /* captura das informações e o parametro id da url, 
    atualizar e excluir, da pasta listar.php */

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


    $listaDeFabricantes = lerTodosFabricantes($conexao);
    $produto = lerUmProduto($conexao, $id, $idUsuarioLogado, $tipoUsuarioLogado);
    
     /* ativar botão atualizar E SANITIZAR CAMPOS DIGITADOS*/
    if(isset($_POST['atualizar'])){
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
        $fabricante_id = filter_input(INPUT_POST,'fabricante', FILTER_SANITIZE_NUMBER_INT);
    
            /* Chamada da função que irá atualizar os dados do novo produto */
            atualizarProduto($conexao, $id, $nome, $preco, $quantidade, $descricao, $fabricante_id, $idUsuarioLogado,  $tipoUsuarioLogado);
    
            /* redirecionar para listar.php */
            header("location:listar.php"); 
    
    }

?>

<?php include "../includes/cabecalho.php" ?>

    <div class="container">

        <h2>Atualizar produtos</h2>
            
            <p><a href="../entrada.php">Pagina inicial</a>   -   
            <a href="../contato.php">Contato</a>   -   
            <a href="../posts/post-geral.php">Posts</a></p>
            <hr>

    
            <p>Digite o formulário abaixo para atualizar os dados de um produto.</p>
    
        <form action="" method="post" class="w-50 mx-auto"> 
        
            <p><label for="nome">Nome:</label>
	        <input value="<?= $produto['nome'] ?>" type="text" name="nome" id="nome" required></p>

            <p>
                <label for="fabricante">Fabricante:</label>
                <select name="fabricante" id="fabricante" required>
                    <option value=""></option>
                
                        <?php foreach ( $listaDeFabricantes as $fabricante ) { ?>
                        
                            <option 

                                <?php if($produto['fabricante_id'] == $fabricante['id']) {
                                echo "selected";
                                } ?>

                                value=" <?= $fabricante['id'] ?>">
                                <?= $fabricante['nome'] ?>

                            </option>

                        <?php } ?> 
                
                    </option>
            
                </select>
            </p>


            <p><label for="preco">Preço:</label>
	        <input value="<?= $produto['preco'] ?>" type="number" name="preco" id="preco" min="0" max="10000" step="0.01" required></p>

            <p><label for="quantidade">Quantidade:</label>
	        <input value="<?= $produto['quantidade'] ?>" type="number" name="quantidade" id="quantidade" min="0" max="50" step="1" required></p>
        
	        <p><label for="descricao">Descrição:</label> <br>
	        <textarea name="descricao" id="descricao" rows="3" cols="40" maxlength="500" required> <?= $produto['descricao'] ?> </textarea>
            </p>
	    

            <button name="atualizar">Atualizar produto</button>

            <p></p>

	    </form>	

    </div>    

<?php include "../includes/rodape.php" ?>