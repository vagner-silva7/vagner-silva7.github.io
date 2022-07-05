<?php

require "../inc/funcoes-posts.php";
require "../inc/cabecalho-admin.php";
verificaAcesso();

$idPost = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$idUsuarioLogado = $_SESSION['id'];
$tipoUsuarioLogado = $_SESSION['tipo'];

excluirPost($conexao, $idPost, $idUsuarioLogado, $tipoUsuarioLogado);

header("location:posts.php");

?>
