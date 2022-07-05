<?php

/* Parametros do servidor banco de dados */

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "vendas_vagner";

/* Conectando ao servidor */
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

/* Habilitar suporte ao charset utf8 - caracter do teclado */
mysqli_set_charset($conexao, "utf8");


/*  Teste */
/* http://localhost/progweb-crud/includes/ */
/* Clicar no arquivo conecta.php, */
/* aparecer a mensagem Tudo OK*/

/* 
if($conexao){
    echo "Tudo ok";
} */