<?php 
require "../inc/cabecalho-admin.php"; 
require "../inc/funcoes-posts.php";

if(isset($_POST['inserir'])) {//if = se, isset = for acionado, $_POST['inserir] = o botão
$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
$texto = filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_SPECIAL_CHARS);
$resumo = filter_input(INPUT_POST, 'resumo', FILTER_SANITIZE_SPECIAL_CHARS);

/* UPLOAD DE IMAGENS - nao devem ser armazenadas no banco de dados*/ //Blob (arquivos binários) pdf, jpg, outros

//obtendo dados do arquivo enviado
$imagem = $_FILES['imagem'];

//função upload (envia o arquivo para o HD do servidor)

upload($imagem);

//TESTE
// echo "<pre>";
// var_dump($imagem);
// echo "</pre>";
//die(); - faz com que pare aqui!

//função inserirPost: ATENÇÃO: par o banco da dados vai apenas o name da imagem
inserirPost($conexao, $titulo, $texto, $resumo, $imagem['name'], $_SESSION['id']);

header("location:posts.php");

}

?>
       
  <div class="conteudo limitador">
    <article class="">
      <h2 class="">Inserir Post</h2>

      <!-- Adicionamos o atributo enctype para habilitar o suporte de envio de arquivos via formulário - OBRIGATÓRIO -->
      <form enctype="multipart/form-data"  class="mx-auto w-75" action="" method="post" id="form-inserir" name="form-inserir">

        <div class="">
          <label for="titulo">Título:</label>
          <input class="l" required type="text" id="titulo" name="titulo" >
        </div>

        <div class="">
          <label for="texto">Texto:</label>
          <textarea class="" required name="texto" id="texto" cols="50" rows="10"></textarea>
        </div>

        <div class="">
          <label for="resumo">Resumo (máximo de 300 caracteres):</label>
          <span id="maximo" class="badge badge-danger">0</span>
          <textarea class="" required name="resumo" id="resumo" cols="50" rows="3" maxlength="300"></textarea> 
        </div>
                
        <div class="">
          <label for="imagem" class="form-label">Selecione uma imagem:</label>
          <input required class="l" type="file" id="imagem" name="imagem"
          accept="image/png, image/jpeg, image/gif, image/svg+xml">
        </div>
                
        <button class="button"  id="inserir" name="inserir">Inserir post</button>                
                
      </form>

    </article>
  </div>

<?php require "../inc/rodape-admin.php"; ?> 