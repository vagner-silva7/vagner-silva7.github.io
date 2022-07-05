<?php

/* funcoes-fabricantes.php */

require "conecta.php";

function lerFabricantes($conexao){

    // 1) Montar a string do comando SQL
    $sql = "SELECT id, nome FROM fabricantes";

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


function inserirFabricantes($conexao, $nome){
    $sql = "INSERT INTO fabricantes(nome) VALUES('$nome')";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}


/* -------------------------------------------- */


function lerUmFabricante($conexao, $id){

    // 1) Montar a string do comando SQL
    $sql = "SELECT id, nome FROM fabricantes WHERE id = $id";

    //  2) Executar o comando - select
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    /* retorno de função formatado, coma array associativo. */
    return mysqli_fetch_assoc ($resultado);
}

/* ----------------------------------------------- */

function atualizarFabricante($conexao, $id, $nome){

    $sql = "UPDATE fabricantes SET nome = '$nome' WHERE id = $id";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

/* ----------------------------------------------- */

function excluirFabricante($conexao, $id){

    $sql = "DELETE FROM fabricantes WHERE id = $id";
    /* mysqli_query($conexao, $sql) or die(mysqli_error($conexao)); */

        // Se não for possivel deletar o fabricante, informar o motivo e retornar a tela listar.php
    	if( !mysqli_query($conexao, $sql) ){
            die("   <p> Não é possível deletar o fabricante porque há produtos associados a ele.</p>
                    <p> <a href='listar.php'>Voltar para lista</a></p>");

        }

}


?>