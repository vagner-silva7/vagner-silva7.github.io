<?php

/* funcoes-Produtos.php */

require "conecta.php";

function lerProdutos(mysqli $conexao, int $idUsuarioLogado, string $tipoUsuarioLogado):array {
    
    // 1) Montar a string do comando SQL (sem inner join ou sem relacionamento)
    /*     $sql = "SELECT id, nome, preco, quantidade, descricao, fabricante_id
    FROM produtos ORDER BY nome"; */

    // 1) Montar a string do comando SQL (com inner join ou com relacionamento )
    /*     $sql = "SELECT produtos.id, produtos.nome AS produto, produtos.quantidade, 
    produtos.preco, produtos.descricao, fabricantes.nome AS fabricante
    FROM produtos INNER JOIN fabricantes
    ON produtos.fabricante_id = fabricantes.id ORDER BY produto"; */

    // 1) Montar a string do comando SQL (com inner join ou com relacionamento )

        /* Se o tipo de usuario for administrador */
        if($tipoUsuarioLogado == 'admin') {

            /* SQL traga todos os posts (administrador e editor) */
            $sql = "SELECT produtos.id, produtos.nome As produto, produtos.preco, produtos.quantidade, 
            produtos.descricao, fabricantes.nome AS fabricante, usuarios.nome As digitador
            FROM produtos 
            INNER JOIN fabricantes ON produtos.fabricante_id = fabricantes.id 
            INNER JOIN usuarios ON produtos.usuario_id = usuarios.id";
    
        } else {
    
            /* Senão, SQL traga os posts do usuario (editor) */
            $sql = "SELECT produtos.id, produtos.nome As produto, produtos.preco, produtos.quantidade, 
            produtos.descricao, fabricantes.nome AS fabricante
            FROM produtos 
            INNER JOIN fabricantes ON produtos.fabricante_id = fabricantes.id
            INNER JOIN usuarios ON produtos.usuario_id = usuarios.id WHERE usuarios.id = $idUsuarioLogado";
    
        }


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


function inserirProdutos(mysqli $conexao, string $nome, float $preco, int $quantidade, string $descricao, int $fabricante_id, int $idUsuarioLogado){
    
    $sql = "INSERT INTO produtos (nome, preco, quantidade, descricao, fabricante_id, usuario_id) 
            VALUES ('$nome', $preco, $quantidade, '$descricao', $fabricante_id, $idUsuarioLogado)";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}


/* -------------------------------------------- */


function lerUmProduto(mysqli $conexao, int $id, int $idUsuarioLogado, string $tipoUsuarioLogado) {

    /* Se o usuario logado for admin, então pode carregar os dados de qualquer post de qualquer usuario 
    sem alterar a autenticidade do usuario original */
    if( $tipoUsuarioLogado == 'admin' ) {
        
        // 1) Montar a string do comando SQL
        $sql = "SELECT id, nome, preco, quantidade, descricao, fabricante_id, usuario_id FROM produtos WHERE id = $id";
        
    } else {

        /* Caso contrario, siginifica que o usuario editor, so poderá carregar dados dos seus proprios posts */
        $sql = "SELECT id, nome, preco, quantidade, descricao, fabricante_id, usuario_id FROM produtos WHERE id = $id 
        AND usuario_id = $idUsuarioLogado";

    }

    //  2) Executar o comando - select
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    /* retorno de função formatado, coma array associativo. */
    return mysqli_fetch_assoc ($resultado);
}

/* ----------------------------------------------- */

function atualizarProduto(mysqli $conexao, int $id, string $nome, int $preco, int $quantidade, string $descricao, int $fabricante_id, int $idUsuarioLogado, string $tipoUsuarioLogado){

    if($tipoUsuarioLogado == 'admin') {
        
        $sql="UPDATE produtos SET nome = '$nome', preco = $preco, quantidade = $quantidade, descricao = '$descricao', fabricante_id = $fabricante_id WHERE id = $id";
    
    } else {
    
        $sql="UPDATE produtos SET nome = '$nome', preco = $preco, quantidade = $quantidade, descricao = '$descricao', fabricante_id = $fabricante_id
        WHERE id = $id AND usuario_id = $idUsuarioLogado";
    
    }

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

/* ----------------------------------------------- */

function excluirProduto(mysqli $conexao, int $id, int $idUsuarioLogado, string $tipoUsuarioLogado){

    if($tipoUsuarioLogado == 'admin') {

        $sql = "DELETE FROM produtos 
        WHERE id = $id";
    
    } else {

        $sql = "DELETE FROM produtos
        WHERE id = $id AND usuario_id = $idUsuarioLogado";

    }   

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

}

/*  --------------------------------------------- */

function formataMoeda($valor) {
    return "R$ ".number_format($valor, 2, ",", ".");
    /* De 5000.00  para  R$ 5.000,00 */
}


?>