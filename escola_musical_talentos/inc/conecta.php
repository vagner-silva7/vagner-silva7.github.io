<?php
$servidor = "localhost"; 
$usuario = "root";	
$senha = ""; 
$banco = "musical-talentos-noticias"; 

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

mysqli_set_charset($conexao, "utf8");

// Após o teste de conexão, apague ou comente as linhas abaixo:
/*  if($conexao){
    echo "Tudo ok!";
 } */