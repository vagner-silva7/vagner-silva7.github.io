<?php

require '../includes/funcoes-fabricantes.php';

/* captura das informações e o parametro id da url, 
atualizar e excluir, da pasta listar.php */

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

/* Chamamos a função que irá retornar os dados de um fabricante excluidos*/

excluirFabricante($conexao, $id);

header("location:listar.php");