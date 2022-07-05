<?php 


require "../includes/cabecalho.php"; 
require "../includes/funcoes-sessao.php";
require "../includes/funcoes-posts.php";

verificaAcesso();


/* recuperando os dados da sessão usuarios sessao */
$idUsuarioLogado = $_SESSION['id'];
$tipoUsuarioLogado = $_SESSION['tipo'];

$posts = lerPosts($conexao, $idUsuarioLogado, $tipoUsuarioLogado);
$quantidade = count($posts);

?>      
    
  <div class="container">

      <h2>Lista de posts de noticias</h2>

        <p> Para cadastrar posts de noticias, clique:  <a href="post-insere.php">Inserir </a> </p>
        <hr>

            <p><a href="../entrada.php">Pagina inicial</a>   -   
            <a href="../contato.php">Contato</a>   -   
            <a href="../posts/post-geral.php">Posts</a></p>
            <hr>

    <div>

      <article>

        <h2 class="text-center">Posts <span class="badge badge-primary"> <?=$quantidade?> </span></h2>
            
          <div class="table-responsive"> 

            <table class="table table-hover">
              <thead class="thead-light">
                <tr>
                  <th>Título</th>
                  <th>Data</th>

                    <?php if($tipoUsuarioLogado == 'admin') { ?>

                      <th>Autor</th>

                    <?php } ?>

                  <th colspan="2" class="text-center">Operações</th>
                </tr>
                </thead>
      
                <tbody>

                  <?php foreach ( $posts as $post ) { ?>

                    <tr>
                      <td> <?=$post['titulo']?> </td>
                      <td> <?=formataData($post['data'])?> </td>
            
                        <?php if($tipoUsuarioLogado == 'admin') { ?>

                          <td> <?=$post['autor']?> </td>
            
                        <?php } ?>
            
                      <td class="text-center">
                        <a class="btn btn-warning btn-sm" 
                        href="post-atualiza.php?id=<?=$post['id']?> ">Atualizar</a></td>
                      <td class="text-center">
                        <a class="btn btn-danger btn-sm excluir"
                        href="post-exclui.php?id=<?=$post['id']?> ">Excluir</a></td>
                    </tr>

                  <?php } ?>

                </tbody>                
            </table>
      
          </div>

        </article>

  </div>
     

<?php require "../includes/rodape.php"; ?> 