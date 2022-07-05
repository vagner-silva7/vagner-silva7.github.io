<?php 

require "../includes/funcoes-usuarios.php";
require "../includes/funcoes-sessao.php";


verificaAcesso();
verificaAcessoAdmin();


if( isset($_POST['inserir'])) {
	$nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_SPECIAL_CHARS);
	$email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_SPECIAL_CHARS);
	$tipo = filter_input(INPUT_POST,'tipo', FILTER_SANITIZE_SPECIAL_CHARS);
	$senha = codificaSenha($_POST['senha']);
	inserirusuario($conexao, $nome, $email, $senha, $tipo);
	header("location:usuarios.php");
}


?> 

<?php include "../includes/cabecalho.php" ?>

	<div class="container">

		<h2>Cadastro de usuario</h2>
            
			<p><a href="../entrada.php">Pagina inicial</a>   -   <a href="../contato.php">Contato</a></p>
            <hr>

    
            <p> Digite as informações abaixo, para cadastrar usuarios.</p> 

			<p>Segue as instruções:</p>
            
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Quidem enim sed aliquam maiores omnis excepturi aperiam laborum 
            laudantium tenetur quaerat delectus reiciendis, officiis voluptate. 
            Cum laboriosam magnam illo dolore soluta?</p>

					<!-- Formulario contato -->
               	 	<!-- Action - Envio ao formspree.io (envio de dados para o email cadastrado no site) -->
                	<form action="" method="post">
		
						<div>
							<label for="nome">Nome:</label>
							<input type="text" id="nome" name="nome" required>
						</div>

						<div>
							<label for="email">E-mail:</label>
							<input type="email" id="email" name="email" required>
						</div>

						<div>
							<label for="senha">Senha:</label>
							<input type="password" id="senha" name="senha" required>
						</div>

						<div>
							<label for="tipo">Tipo:</label>
							<select name="tipo" id="tipo" required>
								<option value=""></option>
								<option value="editor">Editor</option>
								<option value="admin">Administrador</option>
								<option value="digitador">Digitador</option>
							</select>
						</div>
			
						<!-- <button class="btn btn-primary" id="inserir" name="inserir">Inserir usuário</button> -->

						<button name="inserir">Inserir usuário</button>

						<p></p>

					</form>
			
	</div>

<?php require "../includes/rodape.php"; ?>