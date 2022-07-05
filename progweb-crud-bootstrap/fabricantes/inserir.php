<?php


/* Se o botao inserir do formulario for acionado, ou seja,
ele passará a ser definido ou existir*/
if(isset($_POST['inserir'])){
    
    require "../includes/funcoes-fabricantes.php";
    
    $nome = filter_input(INPUT_POST,'nome', 
    FILTER_SANITIZE_SPECIAL_CHARS);

    inserirFabricantes($conexao, $nome);

    header("location:listar.php");    /* redirecionamento apos cadastrar */

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Fabricantes | INSERT - CRUD com PHP e MySQL </title>
<link href="../css/style.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Fabricantes | INSERT -
    <a href="listar.php">Listar</a> - 
    <a href="../index.php">Home</a> </h1>
</div>

<div class="container">
    		
    <h2>Utilize o formulário abaixo para cadastrar um fabricante.</h2>    
    
	<form action="" method="post">
	    <p>
            <label for="nome">Nome:</label><br>
	        <input type="text" name="nome" id="nome" required>
        </p>	    
        <button name="inserir">Inserir fabricante</button>
	</form>	

</div>

</body>
</html>