<?php

require '../includes/funcoes-produtos.php';
$listaDeProdutos = lerProdutos($conexao);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Produtos | SELECT - CRUD com PHP e MySQL </title>

<!-- link bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>

<div class="container">
    <h1>Produtos | SELECT -
    <a href="../index.php">Home</a> </h1>
</div>

<div class="container">
    
    <h2>Lendo e carregando todos os produtos</h2>
    <p><a href="inserir.php">Inserir</a></p>  

    <hr>

<div class="row">
    <?php foreach( $listaDeProdutos as $produto ) { ?>

    <article class="col-sm-6 col-md-4">
        <h3><?= $produto ['produto'] ?> </h3>
            <p><b>Preço:</b> <?= formataMoeda($produto ['preco']) ?>  </p>
            <p><b>Quantidade:</b> <?= $produto ['quantidade'] ?> </p>
            <p><b>Descrição:</b> <?= $produto ['descricao'] ?> </p>
            <p><b>Fabricante:</b> <?= $produto ['fabricante'] ?> </p>
            <p>
                <a class="btn btn-warning" href="atualizar.php?id=<?= $produto ['id'] ?>">Atualizar</a>
                <a class="btn btn-danger" href="excluir.php?id=<?= $produto ['id'] ?>">Excluir</a>
            </p>
        </article>

        <?php } ?>    

</div>

</div>


</body>
</html>