<?php 

require "../includes/funcoes-usuarios.php";
require "../includes/funcoes-sessao.php";


verificaAcesso();
verificaAcessoAdmin();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$usuario = lerUmUsuario( $conexao, $id );

if(isset($_POST['atualizar'])) {
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);

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
  header("location:usuarios.php");  /* location:index.php */

}

?>

<?php include "../includes/cabecalho.php" ?>

  <div class="container">

    <h2>Atualizar usuario</h2>
    
      <p><a href="../entrada.php">Pagina inicial</a>   -   <a href="../contato.php">Contato</a></p>
      <hr>

        <p>Digite o formulário abaixo para atualizar os dados de um usuario.</p>

          <form action="" method="post" class="w-50 mx-auto">

            <div>
              <label for="nome">Nome:</label>
              <input value="<?=$usuario['nome']?>" required type="text" id="nome" name="nome">
            </div>

            <div>
              <label for="email">E-mail:</label>
              <input value="<?=$usuario['email']?>" required type="email" id="email" name="email">
            </div>

            <div>
              <label for="nova-senha">Senha</label>
              <input type="password" id="senha" name="senha" placeholder="Preencha apenas se for alterar">
            </div>

            <div>
              <label for="tipo">Tipo:</label>
              <select name="tipo" id="tipo" required>

                <option value=""></option> 

                <option 
                  <?php if( $usuario ['tipo'] == 'editor') echo " selected " ?>
                  value="editor">Editor</option>  

                <option	
                  <?php if( $usuario ['tipo'] == 'admin') echo " selected " ?>
                  value="admin">Administrador</option>

                <option	
                  <?php if( $usuario ['tipo'] == 'digitador') echo " selected " ?>
                value="digitador">Digitador</option>
              </select>

              <button name="atualizar">Atualizar usuário</button>

              <P></P>

          </form>
  </div>

<?php
require "../includes/rodape.php"; 
?>