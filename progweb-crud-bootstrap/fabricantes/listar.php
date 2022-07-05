<?php

require "../includes/funcoes-fabricantes.php";
/* ao solicitar funcoes-fabricantes.php, chama tambem conecta.php */

$listaDeFabricantes = lerFabricantes($conexao);

?>

<!-- teste -->
<!-- ver arquivo - readme.md - com descrição do teste-->


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Fabricantes | SELECT - CRUD com PHP e MySQL </title>

<!-- link bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

<!-- Alterar uma classe, para cor não disponvel, no bootstrap -->

<style>

.btn-primary{
    background-color: darkblue;
}

</style>    


</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Recursos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Preço</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled">desabilitado</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
    <h1>Fabricantes | SELECT -
    <a href="../index.php">Home</a> </h1>
</div>
      

<div class="container">
    
    <h2>Lendo e carregando todos os fabricantes</h2>
    <p><a class="btn btn-primary btn-lg" href="inserir.php">Inserir</a></p>    

    <table class="table table-striped">
        <caption> Lista de Fabricantes </caption>
        <thead class="thead-dark">
            <tr>
                <th>Item</th>
                <th>id</th>
                <th>Nome</th>
                <th>Operação</th>

            </tr>
        </thead>
                
        <tbody>

        <?php 
            $contador = 1;
                foreach( $listaDeFabricantes as $fabricante ){ ?>        
                    <tr>
                        <td> <?= $contador." ) "?> </td>
                        <td> <?= $fabricante["id"]. " --- " ?> </td>
                        <td> <?= $fabricante["nome"] ?> </td>
                        <td> 
                            <a class="btn btn-warning" href="atualizar.php?id=<?= $fabricante ["id"] ?>">Atualizar</a> 
                            <a class="btn btn-danger" href="excluir.php?id=<?= $fabricante ["id"] ?>">Excluir</a>
                        </td>
                    </tr> 
<?php 
$contador++;
} 

require "../includes/desconecta.php"; // opcional
?>

        </tbody>

    </table>
 
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>
</html>