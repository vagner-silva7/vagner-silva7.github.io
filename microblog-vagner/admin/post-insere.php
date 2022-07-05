<?php 

  require "../inc/cabecalho-admin.php"; 
  require "../inc/funcoes-posts.php";

  /* acionamento do botao */

  if( isset ($_POST['inserir'])) {

    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
    $texto = filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_SPECIAL_CHARS);
    $resumo = filter_input(INPUT_POST, 'resumo', FILTER_SANITIZE_SPECIAL_CHARS);

    /* upload de imagens */
    /* configurar formulario com atributo - form  enctype="multipart/form-data" */
    /* obtendo dados do arquivo imagem */
    /* $_POST É PARA FORMULARIOS   $_URL É PARA ENDEREÇOS    $_GET É PARA BANCO DE DADOS */
    
    $imagem = $_FILES['imagem'];

    /* função de upload */

    upload($imagem);

    /* função inserirPost */

    inserirPost($conexao, $titulo, $texto, $resumo, $imagem['name'], $_SESSION['id'] );

    header("location:posts.php");

    
    /* teste */
    
    /* echo "<pre>";
      var_dump($imagem);
      echo "</pre>"; */

  }

?>
       
  <div class="row">
    <article class="col-12 bg-white rounded shadow my-1 py-4">
      <h2 class="text-center">Inserir Post</h2>

      <!-- enctype="multipart/form-data, habilita o suporte do formulario para envio de imagens" -->
      <form  enctype="multipart/form-data" class="mx-auto w-75" action="" method="post" id="form-inserir" name="form-inserir">

        <div class="form-group">
          <label for="titulo">Título:</label>
          <input class="form-control" required type="text" id="titulo" name="titulo" >
        </div>

        <div class="form-group">
          <label for="texto">Texto:</label>
          <textarea class="form-control" required name="texto" id="texto" cols="50" rows="10"></textarea>
        </div>

        <div class="form-group">
          <label for="resumo">Resumo (máximo de 300 caracteres):</label>
          <span id="maximo" class="badge badge-danger">0</span>
          <textarea class="form-control" required name="resumo" id="resumo" cols="50" rows="3" maxlength="300"></textarea> 
        </div>
                
        <div class="form-group">
          <label for="imagem" class="form-label">Selecione uma imagem:</label>
          <input required class="form-control" type="file" id="imagem" name="imagem"
          accept="image/png, image/jpeg, image/gif, image/svg+xml">
        </div>
                
        <button class="btn btn-primary"  id="inserir" name="inserir">Inserir post</button>                
                
      </form>

    </article>
  </div>

<?php require "../inc/rodape-admin.php"; ?> 