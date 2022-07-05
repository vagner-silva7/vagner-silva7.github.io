<?php 

require "../includes/cabecalho.php";
require "../includes/funcoes-sessao.php";
require "../includes/funcoes-usuarios.php";

/* carregaremos os dados da pessoa logada na sessão ($_SESSION['id']   */
$usuario = lerUmUsuario($conexao, $_SESSION['id']);

if(isset($_POST['atualizar'])) {
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $tipo = $_SESSION['tipo'];    /* recuperando o tipo de usuario */
  $id = $_SESSION['id'];     /* recuperando o id do usuario */

  /* --------------------------------------------------------------------- */
  
  /* Lógica da senha

  1) Se o campo da senha no formulario estiver vazio,
  então siginifica que o usuario NÃO MUDOU A SENHA

    2) Caso contrario, se o usuario, preencheu alguma coisa 
  no campo de senha, precisaremos verificar a senha digitada.
  */

  /* ---------------------------------------------------------------------- */



  /* logica 1 */

  if( empty ( $_POST ['senha']) ) {
    $senha = $usuario['senha'];
  } else {

  /* logica 2 */  
    $senha = verificaSenha ( $_POST ['senha'], $usuario ['senha']);
                          /* senha formulario, senha banco de dados */

  }

  /* teste de comparação de senhas do if / else
  echo "banco de dados ".$usuario['senha'];
  echo "<br>";
  echo "formulario ".$senha; */

  atualizarUsuario($conexao, $id, $nome, $email, $senha, $tipo);
  header("location:../entrada.php");

}



?>
  <div class="container">

      <h2>Atualizar meu perfil</h2>

      <form action="" method="post" id="form-atualizar" name="form-atualizar">

        <div>
          <label for="nome">Nome:</label>
          <input value=" <?= $usuario['nome'] ?> " required type="text" id="nome" name="nome" placeholder="Nome (obrigatório)">
        </div>
        <div>
          <label for="email">E-mail:</label>
          <input value=" <?= $usuario['email'] ?> " required type="email" id="email" name="email" placeholder="E-mail (obrigatório)">
        </div>
        <div>
          <label for="senha">Senha</label>
          <input type="password" id="senha" name="senha"  placeholder="Preencha apenas se for alterar">
        </div>

        <p></p>

        <button name="atualizar">Atualizar fabricante</button>

        <p></p>

      </form>

  </div>

<?php
require "../includes/rodape.php"; 
?>