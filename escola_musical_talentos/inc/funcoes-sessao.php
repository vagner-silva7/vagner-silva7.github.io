<?php
/* Aqui programaremos futuramente
os recursos de login/logout e verificação 
de permissão de acesso dos usuários */


/* VERIFICANDO SE NÃO EXISTE UMA SESSÃO EM FUNCIONAMENTO */

if(!isset($_SESSION)){
    session_start();

}
//ESSA FUNÇÃO DEVE SER COLOCADA EM TODAS AS ÁREAS ADMINISTRATIVAS
function verificaAcesso(){
    //verifica se NÃO existe uma variável de sessão relacionada ao id do usuário logado
    if(!isset($_SESSION['id'])){
        //significa que ele não está logado, portanto apague qualquer resquício de sessão e force o usuário a ir para o login.php
        session_destroy();
        header('location:../login.php');
        die();
    }
}


/* Usado na página login.php */

function login( int $id, string $nome, string $email, $tipo ){
    //criando variaveis de sessão ao logar
    $_SESSION['id'] = $id;
    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;
    $_SESSION['tipo'] = $tipo;

}

/* usado nas pags administrativas ao clicar em sair */
function logout(){
    session_start();
    session_destroy();
    header("location:../login.php?logout");
    die();

}

function verificaAcessoAdmin(){
    //se o tipo de usuario logado NÃO for admin
    if($_SESSION['tipo'] != 'admin'){
        //redirecione para a pagina não autorizado
        header("location:nao-autorizado.php");
        die(); //ou exit
    }
}