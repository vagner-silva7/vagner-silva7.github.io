<?php
require "conecta.php";

// Função inserirUsuario: usada em usuario-insere.php
function inserirUsuario(mysqli $conexao, string $nome, string $email, string $senha, string $tipo){ //definindo os tipos de dados na função (boa prática)
    $sql = "INSERT INTO usuarios(nome, email, senha, tipo)
    VALUES('$nome', '$email', '$senha', '$tipo')";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao)); //comando de execução
}
// fim inserirUsuario



// Função codificaSenha: usada em usuario-insere.php e usuario-atualiza.php

function codificaSenha(string $senha):string{ 
    return password_hash($senha, PASSWORD_DEFAULT); //existe também a função md5, porém esta é uma criptografia fixa e mais facil de burlar. Usar password_hash sempre

}

// fim codificaSenha


// Função lerUsuarios: usada em usuarios.php

function lerUsuarios(mysqli $conexao):array{ //:array - com isso sabemos que essa função retorna um array
    $sql = "SELECT id, nome, email, tipo FROM usuarios ORDER BY nome"; 
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    $usuarios = []; //sempre que trabalhar com o SELECT vai ter um resultado que vai gerar um arrayzão
    while($usuario = mysqli_fetch_assoc($resultado)){
        array_push($usuarios, $usuario);
    }
    return $usuarios;
} /* tudo lindo aqui, agora no HTML chamar um foreach */

// fim lerUsuarios



// Função excluirUsuario: usada em usuario-exclui.php
function excluirUsuario(mysqli $conexao, int $id){
    $sql = "DELETE FROM usuarios WHERE id = $id";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));   

}
// fim excluirUsuario



// Função lerUmUsuario: usada em usuario-atualiza.php
function lerUmUsuario(mysqli $conexao, int $id):array{ 
    $sql = "SELECT id, nome, email, senha, tipo FROM usuarios
    WHERE id = $id";
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_assoc($resultado);
    

}

// fim lerUmUsuario


// Função verificaSenha: usada em usuario-atualiza.php
function verificaSenha(string $senhaFormulario, string $senhaBanco){
    /* Usamos password_verificy para comparar as duas senhas: a digitada no formulário e a existente no banco. */
    if( password_verify($senhaFormulario, $senhaBanco) ){
        /* Se forem iguais, significa que o usuário não mudou nada. Portanto, simplesmente mantemos a senha existente */
        return $senhaBanco; //Se a senha for igual será mantida

    } else {
        /* Se forem diferentes, pegamos a senha digitada no formulário e a codificamos antes de enviar para o banco */
        return codificaSenha ($senhaFormulario);
    }

}
// fim verificaSenha



// Função atualizarUsuario: usada em usuario-atualiza.php
function atualizarUsuario( 
    mysqli $conexao, int $id, string $nome, string $email, string $senha, string $tipo){
        $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha', tipo = '$tipo' WHERE id = $id"; //update TEM que ter WHERE se não atualiza tudo

        mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    }

// fim atualizarUsuario



// Função buscarUsuario: usada em login.php
function buscarUsuario(mysqli $conexao, string $email){
    $sql = "SELECT id, nome, email, tipo, senha FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_assoc($resultado);

}
// fim buscarUsuario






