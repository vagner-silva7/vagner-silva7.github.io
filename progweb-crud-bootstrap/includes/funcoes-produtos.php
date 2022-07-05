<?php

/* funcoes-Produtos.php */

require "conecta.php";

function lerProdutos($conexao){
    
    // 1) Montar a string do comando SQL (sem inner join ou sem relacionamento)
    /*     $sql = "SELECT id, nome, preco, quantidade, descricao, fabricante_id
    FROM produtos ORDER BY nome"; */

    // 1) Montar a string do comando SQL (com inner join ou com relacionamento )
    $sql = "SELECT produtos.id, produtos.nome AS produto, produtos.quantidade, 
    produtos.preco, produtos.descricao, fabricantes.nome AS fabricante
    FROM produtos INNER JOIN fabricantes
    ON produtos.fabricante_id = fabricantes.id ORDER BY produto";


    //  2) Executar o comando - select
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    //  3) Criar um array vazio para receber os resultados
    $produtos = [];  /* Arrray Pai */

    //  4) Loop - enquanto - iterando em cada resultado e a cada produto
    // que for localizado, ele é acrescentado ao array produtos
    While($produto = mysqli_fetch_assoc($resultado)){
        
        // array_push(nome do array principal, nome do array individual)
        array_push($produtos, $produto);

    }

    //  5) Retornando para fora da função os produtos localizados
    return $produtos; /* /* Lista de fabricantes (Matriz) */
}


/* -------------------------------------------- */


/*  Teste */

/* http://localhost/progweb-crud/includes/ */
/* Clicar no arquivo funcoes-produtos.php */

/* var_dump(lerprodutos($conexao)); */


/* -------------------------------------------- */


function inserirProdutos($conexao, $nome, $preco, $quantidade, $descricao, 
$fabricante_id){
    $sql = "INSERT INTO produtos (nome, preco, quantidade, descricao, 
    fabricante_id) VALUES ('$nome', $preco, $quantidade, '$descricao', 
    $fabricante_id)";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}


/* -------------------------------------------- */


function lerUmProduto($conexao, $id){

    // 1) Montar a string do comando SQL
    $sql = "SELECT id, nome, preco, quantidade, descricao, fabricante_id 
    FROM produtos WHERE id = $id";

    //  2) Executar o comando - select
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    /* retorno de função formatado, coma array associativo. */
    return mysqli_fetch_assoc ($resultado);
}

/* ----------------------------------------------- */

function atualizarProduto($conexao, $id, $nome, $preco, $quantidade, $descricao, 
$fabricante_id){

    $sql = "UPDATE produtos SET nome = '$nome', preco = $preco, 
        quantidade = $quantidade, descricao = '$descricao', 
        fabricante_id = $fabricante_id
    WHERE id = $id";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

/* ----------------------------------------------- */

function excluirProduto($conexao, $id){

    $sql = "DELETE FROM produtos WHERE id = $id";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

}

/*  --------------------------------------------- */

function formataMoeda($valor) {
    return "R$ ".number_format($valor, 2, ",", ".");
    /* De 5000.00  para  R$ 5.000,00 */
}


?>