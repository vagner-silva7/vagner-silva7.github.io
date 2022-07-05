<?php 
require "../inc/funcoes-posts.php";
require "../inc/cabecalho-admin.php"; 



$posts = lerPosts($conexao, $_SESSION['id'], $_SESSION['tipo']);
$quantidade = count($posts);

?>      
    
<div class="conteudo limitador">
  <article class="">
    <h2 class="">Comunicado <span class="button-count"><?= $quantidade ?></span></h2>
    <p class="">
      <a class="button-insere" href="post-insere.php">Inserir Novo</a>
    </p>
            
    <div class=""> 

      <table id="customers">
        <thead>
          <tr>
            <th>Título</th>
            <th>Data</th>
            
            <?php if($_SESSION['tipo'] == 'admin'){ ?> <!-- mostrar autor somente se for admin, afinal o autor só vê seus próprios posts -->
            <th>Autor</th>
            <?php } ?>
            
            <th colspan="2">Operações</th>
          </tr>
        </thead>
      
        <tbody>

  <?php foreach( $posts as $post ) { ?>

    <tr>
      <td> <?=$post['titulo']?> </td>
      <td> <?=formataData($post['data'])?> </td>

      <?php if($_SESSION['tipo'] == 'admin'){ ?> <!-- mostrar autor somente se for admin, afinal o autor só vê seus próprios posts -->
      <td> <?=$post['autor']?> </td>
      <?php } ?>

      <td>
          <a class="button-atualiza"
            href="post-atualiza.php?id=<?=$post['id']?>"> 
            Atualizar
          </a>
      </td>
      <td>
          <a class="button-exclui" 
            href="post-exclui.php?id=<?=$post['id']?>">
            Excluir
          </a>
      </td>
    </tr>

<?php } ?>
        </tbody>                
      </table>
      
    </div>
  </article>
</div>
     

<?php require "../inc/rodape-admin.php"; ?> 