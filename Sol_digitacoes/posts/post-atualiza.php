<?php
require "../includes/cabecalho.php"; 
require "../includes/funcoes-posts.php";
require "../includes/funcoes-sessao.php";

verificaAcesso();

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
       
<div class="container">

  <h2>Atualizar posts de noticias</h2>
    
    <p><a href="../entrada.php">Pagina inicial</a>   -   <a href="../contato.php">Contato</a></p>
    <hr>


    <p>Digite o formulário abaixo para atualizar os posts de noticias.</p>

      <form enctype="multipart/form-data" action="" method="post" class="w-50 mx-auto"> 
        
        <div>
          <label for="titulo">Título:</label>
          <input value="<?=$post['titulo']?>" type="text" id="titulo" name="titulo" required>
        </div>
      
        <div>
          <label for="texto">Texto:</label>
          <textarea name="texto" id="texto" cols="50" rows="10" required><?=$post['texto']?></textarea>
        </div>
      
        <div>
          <label for="resumo">Resumo (máximo de 300 caracteres):</label>
          <textarea name="resumo" id="resumo" cols="50" rows="3" required maxlength="300"><?=$post['resumo']?></textarea>
        </div>
      
        <div>
          <label for="imagem-existente">Imagem do post:</label>
          <!-- campo somente leitura, meramente informativo -->
          <input value="<?=$post['imagem']?>" type="text" id="imagem-existente" name="imagem-existente" readonly>
        </div>            
          
        <div>
          <label for="imagem" >Caso queira mudar, selecione outra imagem:</label>
          <input type="file" id="imagem" name="imagem"
          accept="image/png, image/jpeg, image/gif, image/svg+xml">
        </div>
        
          <button name="atualizar">Atualizar post</button>

          <p></p>

      </form>
      
</div>

<?php
require "../includes/rodape.php"; 
?>