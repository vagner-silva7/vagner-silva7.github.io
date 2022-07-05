<?php

require "../includes/cabecalho.php";
require "../includes/funcoes-fabricantes.php";
require "../includes/funcoes-sessao.php";

verificaAcesso();


/* recuperando os dados da sessão usuarios sessao */
$idUsuarioLogado = $_SESSION['id'];
$tipoUsuarioLogado = $_SESSION['tipo'];

/* ao solicitar funcoes-fabricantes.php, chama tambem conecta.php */
$listaDeFabricantes = lerFabricantes( $conexao, $idUsuarioLogado, $tipoUsuarioLogado);


?>

<!-- teste -->
<!-- ver arquivo - readme.md - com descrição do teste-->


    <div class="container">

        <h2>Listar fabricantes</h2>

            <p> Para cadastrar fabricantes, clique:  <a href="inserir.php">Inserir </a> </p>
            <hr>
            
            <p><a href="../entrada.php">Pagina inicial</a>   -   
            <a href="../contato.php">Contato</a>   -   
            <a href="../posts/post-geral.php">Posts</a></p>
            <hr>

                <div>

                    <article>

                        <div class="table-responsive">

                        <table class="table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Item</th>
                                        <th>id</th>
                                        <th>Nome</th>

                                            <?php if($tipoUsuarioLogado == 'admin') { ?>

                                                <th>Digitador</th>

                                            <?php } ?>
                                        <th colspan="2" class="text-center">Operações</th>
                                    </tr>
                                </thead>
                
                            <tbody>

                                <?php 
                                    $contador = 1;
                                        foreach( $listaDeFabricantes as $fabricante ){ ?>        
                                            <tr>
                                                <td> <?= $contador."  )  "?> </td>
                                                <td> <?= $fabricante["id"]. " " ?> </td>
                                                <td> <?= $fabricante["nome"] ?> </td>

                                                    <?php if($tipoUsuarioLogado == 'admin') { ?>

                                                    <td> <?=$fabricante['digitador']?> </td>

                                                    <?php } ?>

                                                <td class="text-center"> 
                                                    <a class="btn btn-warning btn-sm" href="atualizar.php?id=<?= $fabricante ["id"] ?>">Atualizar</a>
                                                </td>
                                                <td class="text-center">     
                                                    <a class="btn btn-danger btn-sm" href="excluir.php?id=<?= $fabricante ["id"] ?>">Excluir</a>
                                                </td>
                                            </tr> 
                                <?php 
                                $contador++;
                                } ?>

                                <?php require "../includes/desconecta.php"; ?>     <!-- opcional -->

                            </tbody>

                        </table>
                    </article>
                </div>    
    </div>

<?php include "../includes/rodape.php" ?>