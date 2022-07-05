<?php require "../inc/cabecalho-admin.php"; 

?> 
    
        
    <article class="conteudo limitador">
      <h2 class="display-4">
          Olá, <?=$_SESSION['nome']?> 
      </h2>
      <p class="lead">Você está no <b>painel de controle e administração</b> do
  site Musical Talentos.
      </p>
      <hr class="my-4">
      <p class="lead">
        <a class="button" href="meu-perfil.php" >Meu perfil</a>
        <a class="button" href="posts.php">Gerenciar comunicados</a>

        <?php if($_SESSION['tipo'] == 'admin'){ ?>
        <a class="button" href="usuarios.php">Gerenciar Usuários</a>
        <?php } ?>

        <br>

       
      </p>
    </article>
        


<?php require "../inc/rodape-admin.php"; ?>  