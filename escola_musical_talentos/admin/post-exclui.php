<?php
require "../inc/funcoes-posts.php";
require "../inc/funcoes-sessao.php";
verificaAcesso();



$idPost = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
excluirPost($conexao, $idPost, $_SESSION['id'], $_SESSION['tipo']);
header("location:posts.php");