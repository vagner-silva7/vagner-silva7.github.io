<?php
require "../inc/cabecalho-admin.php"; 
require "../inc/funcoes-posts.php";

$idPost = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);


/* Pegar os dados de ssessão do usuario logado */
$idUsuarioLogado = $_SESSION['id'];
$tipoUsuarioLogado = $_SESSION['tipo'];

/* Chhamamos a função passando os parametros e pegamos o resultado dela */
$post = lerUmPost($conexao, $idPost, $idUsuarioLogado, $tipoUsuarioLogado);


/* acionar botao */
if( isset ($_POST['atualizar'])) {

  $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
  $texto = filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_SPECIAL_CHARS);
  $resumo = filter_input(INPUT_POST, 'resumo', FILTER_SANITIZE_SPECIAL_CHARS);


      /* 1 ) Se o campo imagem estiver estiver vazio, significa que o usuario prefere 
      permanecer com a imagem atual ou existente. */
      if( empty($_FILES['imagem']['name'])) {
          $imagem = $_POST['imagem-existente'];

      } else {


      /* 2 ) Senão, pegue a referencia da nova imagem, e faça o processo de upload 
      para o servidor */
      $imagem = $_FILES['imagem']['name'];
      upload($_FILES['imagem']); 
      }  

      /* Somente depois do processo de upload (se necessário), chamaremos 
      a função de atualizarPost */
  
      atualizarPost($conexao, $idPost, $idUsuarioLogado, $tipoUsuarioLogado, $titulo,
      $texto, $resumo, $imagem);

  header("location:posts.php");

  
  /* teste */
  
  /* echo "<pre>";
    var_dump($imagem);
    echo "</pre>"; */

}



?>
       
<div class="row">
  <article class="col-12 bg-white rounded shadow my-1 py-4">
    <h2 class="text-center">Atualizar Post</h2>

    <form enctype="multipart/form-data" class="mx-auto w-75" action="" method="post" id="form-atualizar" name="form-atualizar"> 
        
      <div class="form-group">
        <label for="titulo">Título:</label>
        <input value="<?=$post['titulo']?>" class="form-control" type="text" id="titulo" name="titulo" required>
      </div>
      
      <div class="form-group">
        <label for="texto">Texto:</label>
        <textarea class="form-control" name="texto" id="texto" cols="50" rows="10" required><?=$post['texto']?></textarea>
      </div>
      
      <div class="form-group">
        <label for="resumo">Resumo (máximo de 300 caracteres):</label>
        <span id="maximo" class="badge badge-success">0</span>
        <textarea class="form-control" name="resumo" id="resumo" cols="50" rows="3" required maxlength="300"><?=$post['resumo']?></textarea>
      </div>
      
      <div class="form-group">
        <label for="imagem-existente">Imagem do post:</label>
        <!-- campo somente leitura, meramente informativo -->
        <input value="<?=$post['imagem']?>" class="form-control" type="text" id="imagem-existente" name="imagem-existente" readonly>
      </div>            
          
      <div class="form-group">
        <label for="imagem" class="form-label">Caso queira mudar, selecione outra imagem:</label>
        <input class="form-control" type="file" id="imagem" name="imagem"
        accept="image/png, image/jpeg, image/gif, image/svg+xml">
      </div>
        
        <button class="btn btn-primary" name="atualizar">Atualizar post</button>
    </form>
      
  </article>
</div>

<?php
require "../inc/rodape-admin.php"; 
?>