<?php

/* funcoes-fabricantes.php */

require "conecta.php";

function lerFabricantes(mysqli $conexao, int $idUsuarioLogado, string $tipoUsuarioLogado):array {

        /* Se o tipo de usuario for administrador */
        if($tipoUsuarioLogado == 'admin') {

            /* SQL traga todos os posts (administrador e editor) */
            $sql = "SELECT fabricantes.id, fabricantes.nome, usuarios.nome AS digitador 
            FROM fabricantes 
            INNER JOIN usuarios ON fabricantes.usuario_id = usuarios.id";  
        
        } else {
    
            // 1) Montar a string do comando SQL
            $sql = "SELECT id, nome FROM fabricantes WHERE usuario_id = $idUsuarioLogado";

        }

    //  2) Executar o comando - select
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    //  3) Criar um array vazio para receber os resultados
    $fabricantes = [];     /* ARRAY PAI */

    //  4) Loop - enquanto - iterando em cada resultado e a cada fabricante
    // que for localizado, ele é acrescentado ao array fabricantes
    While($fabricante = mysqli_fetch_assoc ($resultado)){

        // array_push(nome do array principal, nome do array individual)
        array_push($fabricantes, $fabricante);
    }

    //  5) Retornando para fora da função os fabricantes localizados
    return $fabricantes;     /* Lista de fabricantes (Matriz) */   
}


/* -------------------------------------------- */


/*  Teste */

/* http://localhost/progweb-crud/includes/ */
/* Clicar no arquivo funcoes-fabricantes.php */

/* var_dump(lerFabricantes($conexao)); */


/* -------------------------------------------- */


function inserirFabricantes(mysqli $conexao, string $nome, int $idUsuarioLogado){

    $sql = "INSERT INTO fabricantes(nome, usuario_id) 
            VALUES('$nome','$idUsuarioLogado')";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    
}


/* -------------------------------------------- */


function lerUmFabricante(mysqli $conexao, int $id, int $idUsuarioLogado, string $tipoUsuarioLogado){

    /* Se o usuario logado for admin, então pode carregar os dados de qualquer post de qualquer usuario 
    sem alterar a autenticidade do usuario original */
    
    if( $tipoUsuarioLogado == 'admin' ) {

        // 1) Montar a string do comando SQL
        $sql = "SELECT id, nome, usuario_id FROM fabricantes WHERE id = $id";

    } else {

        /* Caso contrario, siginifica que o usuario editor, so poderá carregar dados dos seus proprios posts */
        // 1) Montar a string do comando SQL
        $sql = "SELECT id, nome, usuario_id FROM fabricantes WHERE id = $id 
        AND usuario_id = $idUsuarioLogado";

    }

    //  2) Executar o comando - select
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    /* retorno de função formatado, coma array associativo. */
    return mysqli_fetch_assoc ($resultado);
}

/* ----------------------------------------------- */

function atualizarFabricante(mysqli $conexao, int $id, string $nome, int $idUsuarioLogado, string $tipoUsuarioLogado){

    if($tipoUsuarioLogado == 'admin') {
        
        $sql="UPDATE fabricantes SET nome = '$nome' WHERE id = $id ";
    
    } else {

        $sql="UPDATE fabricantes SET nome = '$nome' WHERE id = $id AND usuario_id = $idUsuarioLogado";
    
    }

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

/* ----------------------------------------------- */

function excluirFabricante(mysqli $conexao, int $id, int $idUsuarioLogado, string $tipoUsuarioLogado){

    if($tipoUsuarioLogado == 'admin') {

        $sql = "DELETE FROM fabricantes WHERE id = $id";
    
    } else {

        $sql = "DELETE FROM fabricantes WHERE id = $id AND usuario_id = $idUsuarioLogado";
    
    }
    /* mysqli_query($conexao, $sql) or die(mysqli_error($conexao)); */

        // Se não for possivel deletar o fabricante, informar o motivo e retornar a tela listar.php
        if( !mysqli_query($conexao, $sql) ){

            die(" <p> Não é possível deletar o fabricante porque há produtos associados a ele.</p>
                  <p> <a href='listar.php'>Voltar para lista</a></p>");

        }

}

/* ----------------------------------------------- */

/* Função para atender atualiza produtos */

function lerTodosFabricantes(mysqli $conexao):array {

        /* SQL traga todos os posts (administrador e editor) */
        $sql = "SELECT fabricantes.id, fabricantes.nome, usuarios.nome AS digitador 
        FROM fabricantes 
        INNER JOIN usuarios ON fabricantes.usuario_id = usuarios.id";  

//  2) Executar o comando - select
$resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

//  3) Criar um array vazio para receber os resultados
$fabricantes = [];     /* ARRAY PAI */

//  4) Loop - enquanto - iterando em cada resultado e a cada fabricante
// que for localizado, ele é acrescentado ao array fabricantes
While($fabricante = mysqli_fetch_assoc ($resultado)){

    // array_push(nome do array principal, nome do array individual)
    array_push($fabricantes, $fabricante);
}

//  5) Retornando para fora da função os fabricantes localizados
return $fabricantes;     /* Lista de fabricantes (Matriz) */   
}

?>