<?php
require "inc/cabecalho.php";
require "inc/funcoes-sessao.php";
require "inc/funcoes-usuarios.php";


/* Mensagens para os processos de erros no login */
if( isset($_GET['acesso_proibido']) ){ //usar GET sempre que for da URL
  $feedback = "Você deve logar primeiro!";
} elseif( isset($_GET['logout']) ) {
  $feedback = "Você saiu do sistema!";
} elseif( isset($_GET['nao_encontrado']) ) {
  $feedback = "Usuário não encontrado!";
} elseif( isset($_GET['senha_incorreta']) ) {
  $feedback = "Senha incorreta!";          
} elseif( isset($_GET['campos_obrigatorios']) ) {
  $feedback = "Preencha Usuário e Senha!";
} else {
  $feedback = "";
}


// 1) [IF] se o botão entrar for acionado
if( isset($_POST['entrar']) ){

  // 2) [IF/ELSE] se os  campos estão vazio
  if(empty($_POST['email']) || empty($_POST['senha'])){

    //Redireciona para login com parametro indicando campos obrigatorios
    header ("location:login.php?campos_obrigatorios");
  } else{

    //caso contrario, peque o email e a senha digitados
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];

    //verificando no banco se existe alguem com o email informado
    $usuario = buscarUsuario($conexao, $email);

   /* teste
    var_dump($usuario); */

    //3) [IF/ELSE] verifica se usuario é diferente de nulo (ou seja, se o usuario existe)
    if($usuario != null){ 
    
      // 4) [IF/ELSE] se as senhas forem iguais
      if(password_verify($senha, $usuario['senha'])){

        //Então inicia o login
        login(
          $usuario['id'], $usuario['nome'], $usuario['email'], $usuario['tipo'] 
        );
        header("location:admin/index.php");

      }else {
      //caso contrário, continua na pagina login e diga que a senha está incorreta
        header("location:login.php?senha_incorreta");
      }

    //caso contrario, não existe o usuario
    } else{
      header("location:login.php?nao_encontrado");
    }
  }
}
?>
<div class="conteudo limitador">
  <article class="">
    <h2>Acesso Restrito</h2>

    <form action="" method="post" id="form-login" name="form-login" class="">

      <p class="">
        <?=$feedback?>
      </p>

      <div class="">
        <label for="email">E-mail:</label>
        <input class="" type="email" id="email" name="email">
      </div>
      <div class="">
        <label for="senha">Senha:</label>
        <input class="" type="password" id="senha" name="senha">
      </div>

      <button class="button" name="entrar" type="submit">Entrar</button>

    </form>
  </article>

</div>

<?php
require "inc/rodape.php";
?>