# progweb-crud
 Programação php com SQL

 Primeiro fazer MySQL workbench

 Segundo fazer campos phpMyAdmin

-----------------------------------

Contexto fabricantes: funções para crud de dados

- lerFabricantes
- inserirFabricante
- lerUmFabricante
- atualizarFabricante
- excluirFabricante

contexto produtos: funções para crud de dados

- lerProdutos
- inserirProduto
- lerUmProduto
- atualizarProduto
- excluiProduto

----------------------------------------

Arquivo lista.php

teste var_dump 

<?php

require "../includes/funcoes-fabricantes.php";
/* ao solicitar funcoes-fabricantes.php, chama tambem conecta.php */

$listaDeFabricantes = lerFabricantes($conexao);

?>

<!-- teste -->
<pre> <?=var_dump($listaDeFabricantes)?> </pre>

-----------------------------------------------

Arquivo atualizar.php

teste var_dump

<?php

require '../includes/funcoes-fabricantes.php';

/* captura das informações e o parametro id da url, 
atualizar e excluir, da pasta listar.php */

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

/* Chamamos a função que irá retornar os dados de um fabricante */

$dados = lerUmFabricante($conexao, $id);


?>

<!-- teste -->

<pre><?=var_dump($dados)?></pre>