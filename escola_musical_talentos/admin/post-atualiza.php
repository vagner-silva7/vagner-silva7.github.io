<?php
require "../inc/funcoes-posts.php";
require "../inc/cabecalho-admin.php"; 

//Pegar o ID do post que vem da URL
$idPost = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//Pegar os dados de sessão do usuário logado
$idUsuarioLogado = $_SESSION['id'];
$tipoUsuarioLogado = $_SESSION['tipo'];

//Chama a função e passa os paramêtros - e pega o resultado
$post = lerUmPost($conexao, $idPost, $idUsuarioLogado, $tipoUsuarioLogado);



if(isset($_POST['atualizar'])) {//if = se, isset = for acionado, $_POST['atualizar] = o botão
  $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
  $texto = filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_SPECIAL_CHARS);
  $resumo = filter_input(INPUT_POST, 'resumo', FILTER_SANITIZE_SPECIAL_CHARS);
  
  
  //Lógica de atualização de imagem

  /* 1) Se o campo imagem estiver vazio, significa que o usuario não vai trocá-la, então a programação mantem a imagem existente. */
if( empty ($_FILES['imagem']['name']) ){
  $imagem = $_POST['imagem-existente'];



/* 2) Caso contrario, pegar a referencia da nova imagem e fazer o upload para o servidor. */
} else {
  $imagem = $_FILES['imagem']['name'];
  upload($_FILES['imagem']);
}


/* Somente depois do processo de upload (se necessário), chamaremos a função atualizar.post */
atualizarPost($conexao, $idPost, $idUsuarioLogado, $tipoUsuarioLogado, $titulo, $texto, $resumo, $imagem);

header("location:posts.php");
  
}


//TESTE
// echo "<pre>";
// var_dump($post);
// echo "</pre>";
?>
       
<div class="conteudo limitador">
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
        
        <button class="button" name="atualizar">Atualizar post</button>
    </form>
      
  </article>
</div>

<?php
require "../inc/rodape-admin.php"; 
?>