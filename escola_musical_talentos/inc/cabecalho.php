<?php ob_start();?>

<?php
// Parte 01: Identificar o arquivo aberto
$pagina = basename($_SERVER['PHP_SELF']); /* Essa função consegue extrair o nome do arquivo aberto - $_SERVER['PHP_SELF'] - é um array pré configurado, do PHP */


/* Parte 2: Condicional para avaliar qual pagina está aberta
e defini qual titulo usar */

switch ( $pagina ) {
    case 'admin/index.php':$titulo = "Pagina inicial"; Break;
    case 'admin/meu-perfil.php':$titulo = "Meu perfil"; Break;
    case 'admin/usuario-atualiza.php':$titulo = "Usuario - atualizar"; Break;
    case 'admin/usuario-exclui.php':$titulo = "Usuario - excluir"; Break;
    case 'admin/usuario-insere.php':$titulo = "Usuario - inserir"; Break;
    case 'admin/usuarios.php':$titulo = "Usuarios - listar"; Break;
    case 'admin/post-atualiza.php':$titulo = "Posts - atualizar"; Break;
    case 'admin/post-exclui.php':$titulo = "Posts - exclui"; Break;
    case 'admin/post-insere.php':$titulo = "Posts - inserir"; Break;
    case 'admin/posts.php':$titulo = "Posts - listar"; Break;
    case 'search.php':$titulo = "Posts - procura"; Break;
    case 'login.php':$titulo = "Login de usuarios"; Break;
    case 'index.php':$titulo = "home"; Break;
    case 'post-detalhe.php':$titulo = "detalhes"; Break;
    default: $titulo = "Contato"; break; 
}

// echo $titulo


?>



<!DOCTYPE html>
<html lang="PT-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>

    <!-- Atalho CTRL+clicar no link, cria pasta e arquivo automaticamente -->
    <!-- Formatação para pasta index.php e login.php -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- Cabeçalho -->
    <header>

        <div class="menu navbar nav">

	    <a href="index.php"><img src="imagens/cabecalho/logo-musical-talentos.jpg" alt="" width="75" height="75"></a>

            <a class="navbar-brand" href="index.php">Musical Talentos</a>

            <button class="navbar-toggler" aria-expanded="false" aria-controls="navbarDropdown">
                <span>&#9776;</span>
            </button>

            <ul class="navbar-nav">
                <li class="nav-link"><a href="index.php">Home</a></li>
                <li class="nav-link"><a href="instrumentos.php">Instrumentos</a></li>
                <li class="nav-link"><a href="comunicados.php">Comunicados</a></li>
                <li class="nav-link"><a href="contatoinscricoes.php">Inscrições</a></li>
                <li class="nav-link"><a href="login.php">Acesso Restrito</a></li>
            </ul>

        </div>

    </header>
    <main>