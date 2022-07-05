<?php ob_start();?>

<!-- Inserir o nome para titulo de acordo com cada pagina -->

<!-- Parte 1: Identificar o arquivo aberto
$_SERVER[´PHP_SELF´] -> traz os dados completo do endereço da pagina
basename($_SERVER[´PHP_SELF´] -> Eextrai apenas o nome.extensão-->

<?php

// Guardando o nome da página atual
$pagina = basename($_SERVER['PHP_SELF']);


/* Parte 2: Condicional para avaliar qual pagina está aberta
e defini qual titulo usar */

    switch ( $pagina ) {
        case 'index.php':$titulo = "Pagina inicial"; Break;
        case 'produtos/atualizar.php':$titulo = "Produtos - atualizar"; Break;
        case 'produtos/excluir.php':$titulo = "Produtos - excluir"; Break;
        case 'produtos/inserir.php':$titulo = "Produtos - inserir"; Break;
        case 'produtos/listar.php':$titulo = "Produtos - listar"; Break;
        case 'fabricantes/atualizar.php':$titulo = "Fabricantes - atualizar"; Break;
        case 'fabricantes/excluir.php':$titulo = "Fabricantes - excluir"; Break;
        case 'fabricantes/inserir.php':$titulo = "Fabricantes - inserir"; Break;
        case 'fabricantes/listar.php':$titulo = "Fabricantes - listar"; Break;
        case 'admin/usuario-atualiza.php':$titulo = "Usuario - atualizar"; Break;
        case 'admin/usuario-exclui.php':$titulo = "Usuario - excluir"; Break;
        case 'admin/usuario-insere.php':$titulo = "Usuario - inserir"; Break;
        case 'admin/usuarios.php':$titulo = "Usuarios - listar"; Break;
        case 'posts/post-atualiza.php':$titulo = "Posts - atualizar"; Break;
        case 'posts/post-detalhe.php':$titulo = "Posts - detalhes"; Break;
        case 'posts/post-exclui.php':$titulo = "Posts - exclui"; Break;
        case 'posts/post-insere.php':$titulo = "Posts - inserir"; Break;
        case 'posts/posts.php':$titulo = "Posts - listar"; Break;
        case 'posts/search.php':$titulo = "Posts - procura"; Break;
        case 'login.php':$titulo = "Login de usuarios"; Break;
        case 'entrada.php':$titulo = "entrada"; Break;
        case 'contato.php':$titulo = "contato"; Break;
        default: $titulo = "Contato"; break; 
    }

    // echo $titulo
?>

<!-- --------------------------------------------------- -->

<!--  HTML  -->

<!DOCTYPE html>
<html lang="Pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<!-- Parte 3: Colocar o nome do arquivo (variavel)
no titulo da pagina-->    
    
    <title> <?= $titulo ?> - Sol -  Digitação de dados</title>

    <!-- formatação pasta fabricantes e produtos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos.css">

    <!-- formatação pasta index e contatos -->
    <link rel="stylesheet" href="css/estilos.css">

</head>
<body>

    <header>
        <h1> Empresa Sol Ltda</h1>
            <p>Digitação de dados</p>
        </h1>
    </header>

    <main>