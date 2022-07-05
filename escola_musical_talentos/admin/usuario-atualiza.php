<?php 
require "../inc/funcoes-usuarios.php";
require "../inc/cabecalho-admin.php";
verificaAcessoAdmin();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); //sempre que pegar da URL usar o GET
$usuario = lerUmUsuario($conexao, $id);


if(isset($_POST['atualizar'])){
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);

  /* Lógica para a senha:
  Se o campo da senha do formulário estiver vazio, então significa que o usuário NÃO MUDOU A SENHA. */
  if( empty ($_POST['senha'])){
    $senha = $usuario['senha']; //MANTER a senha existente no banco.

  } else{
  /* Caso contrário, se o usuário digitou alguma coisa no campo senha, precisaremos verificar a senha digitada. */
    $senha = verificaSenha ($_POST['senha'], $usuario['senha']);

  }
/*     teste de senha
    echo "banco de dados:" . $usuario['senha'];
    echo "<br>";
    echo "formulario:" . $senha; */

    atualizarUsuario($conexao, $id, $nome, $email, $senha, $tipo);
    header("location:usuarios.php");
}

?>
       
<div class="conteudo limitador">
  <article class="col-12 bg-white rounded shadow my-1 py-4">
    <h2 class="text-center">Atualizar Usuário</h2>

    <form class="mx-auto w-75" action="" method="post" id="form-atualizar" name="form-atualizar">

      <div class="form-group">
      <b>Nível de acesso do usuário: </b><span class="button-outro"><?=$_SESSION['tipo']?></span> <br>
        
        <label for="nome">Nome: </label>
        <input value=<?=$usuario['nome'] ?>  class="" required type="text" id="nome" name="nome" >
      </div>

      <div class="form-group">
        <label for="email">E-mail:</label>
        <input value=<?=$usuario['email'] ?> class="" required type="email" id="email" name="email" >
      </div>

      <div class="form-group">
        <label for="nova-senha">Senha</label>
        <input class="" type="password" id="senha" name="senha" placeholder="Preencha apenas se for alterar">
      </div>

      <div class="form-group">
        <label for="tipo">Tipo:</label>
        <select class="custom-select" name="tipo" id="tipo" required>
          <option value=""></option>                  
        <option           
          <?php if($usuario['tipo'] == 'editor') echo " selected "; ?>
          value="editor">Editor
        </option>    

        <option	
          <?php if($usuario['tipo'] == 'admin') echo " selected "; ?>
          value="admin">Administrador
        </option>


        </select>
      </div>
      
      <button class="button" name="atualizar">Atualizar usuário</button>
    </form>
      
  </article>
</div>

<?php
require "../inc/rodape-admin.php"; 
?>

