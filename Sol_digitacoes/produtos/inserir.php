<?php

    require "../includes/funcoes-sessao.php";
    require "../includes/funcoes-fabricantes.php";
    require "../includes/funcoes-produtos.php";

    verificaAcesso();

    /* recuperando os dados da sessão usuarios sessao */
    $idUsuarioLogado = $_SESSION['id'];
    $tipoUsuarioLogado = $_SESSION['tipo'];

    $listaDeFabricantes = lerTodosFabricantes($conexao);
    $listaDeProdutos= lerProdutos( $conexao, $idUsuarioLogado, $tipoUsuarioLogado);

  
    /* ativar botão inserir E SANITIZAR CAMPOS DIGITADOS*/
    if (isset($_POST['inserir'])) {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
        $fabricante_id = filter_input(INPUT_POST,'fabricante_id', FILTER_SANITIZE_NUMBER_INT);
        $usuario_id = filter_input(INPUT_POST,'usuario_id', FILTER_SANITIZE_NUMBER_INT);
            
            /* Chamada da função que irá inserir os dados do novo produto */
            inserirProdutos($conexao, $nome, $preco, $quantidade, $descricao, $fabricante_id, $idUsuarioLogado);
    
            /* redirecionar para listar.php */
            header("location:listar.php"); 
    
    }

?>




<?php include "../includes/cabecalho.php" ?>

    <div class="container">    

        <h2>Cadastro de produtos</h2>
            
            <p><a href="../entrada.php">Pagina inicial</a>   -   
            <a href="../contato.php">Contato</a>   -   
            <a href="../posts/post-geral.php">Posts</a></p>
            <hr>
            
            <p> Digite as informações abaixo, para cadastrar produtos.</p> 
            
            <p>Segue as instruções:</p>
            
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Quidem enim sed aliquam maiores omnis excepturi aperiam laborum 
            laudantium tenetur quaerat delectus reiciendis, officiis voluptate. 
            Cum laboriosam magnam illo dolore soluta?</p>

                <!-- Formulario contato -->
                <!-- Action - Envio ao formspree.io (envio de dados para o email cadastrado no site) -->
                
                <form action="" method="post">
                
                        <p>
                            <label for="nome">Nome:</label>
	                        <input type="text" name="nome" id="nome" required>
                        </p>

                        <p>
                            <label for="fabricante_id">Fabricante:</label>
                            <select name="fabricante_id" id="fabricante_id" required>
                                <option value=""></option>

                                    <?php foreach ( $listaDeFabricantes as $fabricante ) { ?>
                        
                                        <option value="<?= $fabricante['id']?>">
                                        <?= $fabricante['nome'] ?>

                                     <?php } ?>                
         
                            </select>
                        </p>

                        <p>
                            <label for="preco">Preço:</label>
	                        <input type="number" name="preco" id="preco" min="0" max="10000" step="0.01" required>
                        </p>

                        <p>
                            <label for="quantidade">Quantidade:</label>
	                        <input type="number" name="quantidade" id="quantidade" min="0" max="50" step="1" required>
                        </p>

	                    <p>
                            <label for="descricao">Descrição:</label> <br>
	                        <textarea name="descricao" id="descricao" rows="3" cols="40" maxlength="500" required></textarea>
                        </p>
	    
                        <button name="inserir">Inserir produto</button>

                        <P></P>
	            
                </form>	

    </div>

<?php include "../includes/rodape.php" ?>


<!-- Exercício Formulário HTML com PHP
1) Crie um novo arquivo e nele faça um formulário para cadastro (simulação) de produtos com os seguintes campos:

    Nome do produto (campo de texto)
    Fabricante (select de opções com pelo menos 4 nomes de fabricantes)
    ***** Preço (campo de número com valor mínimo de 100 e máximo de 10000, além de suporte à 2 casas decimais para os centavos)
    Quantidade (campo de número com valor mínimo de 0 e máximo de 50)
    Descrição (área de texto)

Desafio: as opções do campo select (Fabricante) devem ser carregadas a partir dos dados de um 
***** array PHP com os nomes dos fabricantes. Portanto, crie um array simples contendo uma lista com o nome de 4 fabricantes (exemplo: Asus, Microsoft, LG, Brastemp) e use um loop para gerar as opções dentro do select.

2) Faça a programação de processamento do formulário considerando o envio/recebimento dos dados via POST. Os dados devem ser exibidos no HTML usando as tags de sua preferência (parágrafos, listas, divs etc).

Desafio: pesquise sobre funções de filtros de sanitização e validação de campos de formulário e tente aplicar pelo menos um desses filtros em algum campo.
ENTREGA: Até 16/05/2022

Coloque os arquivos do exercício em seu repositório progweb-php no GitHub ou me envie por e-mail (professor.tiagobsantos@gmail.com). -->