<?php ob_start();?>

<?php
  require "funcoes-sessao.php"; 
  verificaAcesso();


//Detectanto quando o "sair" é acionado
if(isset($_GET['sair'])) {
  //chamamos a função logout
  logout();

}


// Guardando o nome da página atual
$pagina = basename($_SERVER['PHP_SELF']);


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
<!doctype html>
<html lang="pt-br">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <title>Musical Talentos - Restrito</title>

    <!-- Atalho CTRL+clicar no link, cria pasta e arquivo automaticamente -->
    <!-- Formatação para demais pastas em diretorios diferentes -->
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>

  <header>
    <nav>
      <div class="menu navbar nav">

	    <a href="index.php"><img src="../imagens/cabecalho/logo-musical-talentos.jpg" alt="" width="75" height="75"></a>

      <a class="navbar-brand" href="index.php">Musical Talentos</a>

            <button class="navbar-toggler" aria-expanded="false" aria-controls="navbarDropdown">
                <span>&#9776;</span>
            </button>

         <ul class="navbar-nav">
            <li class="nav-link"><a href="index.php">Home</a></li>
            <li class="nav-link"><a href="meu-perfil.php">Meu perfil</a></li>
            <li class="nav-link"><a href="posts.php">Comunicados</a></li>

            <?php if($_SESSION['tipo'] == 'admin'){ ?>
            <li class="nav-link"><a href="usuarios.php">Usuários</a></li>
            <?php }?>

            <li class="nav-link"><a href="../index.php" target="_blank">Área pública</a></li>
            <li class="nav-link"><a href="?sair">&times; Sair</a></li>
          </ul>
      </div>
    </nav>

  </header>

  <main class="conteudo limitador">