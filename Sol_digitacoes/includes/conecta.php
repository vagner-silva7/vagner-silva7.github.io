<?php

/* Parametros do servidor banco de dados */

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "empresa_sol";

/* Conectando ao servidor */
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

/* Habilitar suporte ao charset utf8 - caracter do teclado */
mysqli_set_charset($conexao, "utf8");


/*  Teste */
/* http://localhost/exercicio_1605_php_crud/includes/ */
/* Clicar no arquivo conecta.php, */
/* aparecer a mensagem Tudo OK*/


/* if($conexao){
    echo "Tudo ok";
}  */