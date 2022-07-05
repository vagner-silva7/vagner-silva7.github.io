<?php  
require "../inc/funcoes-usuarios.php"; //sempre colocar as funções primeiro
require "../inc/cabecalho-admin.php";
verificaAcessoAdmin();

if (isset($_POST['inserir'])){
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
	$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);
	$senha = codificaSenha($_POST['senha']);

	inserirUsuario($conexao, $nome, $email, $senha, $tipo);
	header("location:usuarios.php");

}



?>
       
<div class="conteudo limitador">
	<article class="">
		<h2 class="">Inserir Usuário</h2>
		
		<form class="" action="" method="post" id="form-inserir" name="form-inserir">

			<div class="">
				<label for="nome">Nome:</label>
				<input class="" type="text" id="nome" name="nome" required>
			</div>

			<div class="">
				<label for="email">E-mail:</label>
				<input class="" type="email" id="email" name="email" required>
			</div>

			<div class="">
				<label for="senha">Senha:</label>
				<input class="" type="password" id="senha" name="senha" required>
			</div>

			<div class="">
				<label for="tipo">Tipo:</label>
				<select class="" name="tipo" id="tipo" required>
					<option value=""></option>
					<option value="editor">Editor</option>
					<option value="admin">Administrador</option>
				</select>
			</div>
			
			<button class="button" id="inserir" name="inserir">Inserir usuário</button>
		</form>
			
	</article>
</div>

<?php require "../inc/rodape-admin.php"; ?>