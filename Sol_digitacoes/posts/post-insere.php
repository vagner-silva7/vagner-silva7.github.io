<?php 

  require "../includes/cabecalho.php"; 
  require "../includes/funcoes-posts.php";
  require "../includes/funcoes-sessao.php";

  verificaAcesso();

  $idUsuarioLogado = $_SESSION['id'];
  $tipoUsuarioLogado = $_SESSION['tipo'];

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

    inserirPost($conexao, $titulo, $texto, $resumo, $imagem['name'], $idUsuarioLogado );

    header("location:posts.php");

    
    /* teste */
    
    /* echo "<pre>";
      var_dump($imagem);
      echo "</pre>"; */

  }

?>

<?php include "../includes/cabecalho.php" ?>

  <div class="container">

    <h2>Cadastro de usuario</h2>
        
            <p><a href="../entrada.php">Pagina inicial</a>   -   
            <a href="../contato.php">Contato</a>   -   
            <a href="../posts/post-geral.php">Posts</a></p>
            <hr>


      <p> Digite as informações abaixo, para cadastrar posts de noticias.</p> 

      <p>Segue as instruções:</p>
        
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
      Quidem enim sed aliquam maiores omnis excepturi aperiam laborum 
      laudantium tenetur quaerat delectus reiciendis, officiis voluptate. 
      Cum laboriosam magnam illo dolore soluta?</p>
       
      <!-- enctype="multipart/form-data, habilita o suporte do formulario para envio de imagens" -->
      <form  enctype="multipart/form-data" action="" method="post">

        <div>
          <label for="titulo">Título:</label>
          <input type="text" id="titulo" name="titulo" required >
        </div>

        <div>
          <label>Texto:</label>
          <textarea name="texto" id="texto" cols="50" rows="10" required></textarea>
        </div>

        <div>
          <label for="resumo">Resumo (máximo de 300 caracteres):</label>
          <textarea name="resumo" id="resumo" cols="50" rows="3" maxlength="300" required></textarea> 
        </div>
                
        <div>
          <label for="imagem">Selecione uma imagem:</label>
          <input required type="file" id="imagem" name="imagem"
          accept="image/png, image/jpeg, image/gif, image/svg+xml">
        </div>
                
        <button name="inserir">Inserir posts de noticias</button>

				<p></p>                
                
      </form>

    </article>
  </div>

<?php require "../includes/rodape.php"; ?> 