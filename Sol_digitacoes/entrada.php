<?php 

include "includes/cabecalho.php";
require "includes/funcoes-sessao.php";
verificaAcesso();

?>


    <h2>Bem-vindo ao site, sr(a) <?= $_SESSION['nome'] ?> e seu nível de acesso é <?= $_SESSION['tipo'] ?>.</h2>
        <p> Para sair da pagina do usuario, clique:  <a href="login.php">Sair</a></p>

        <hr>

            <p>

            <p> Esta é a pagina principal, destinado exclusivamente para 
            digitação de informações em sistema - via formulário.</p>

            <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit.
           Quidem enim sed aliquam maiores omnis excepturi aperiam laborum 
           laudantium tenetur quaerat delectus reiciendis, officiis voluptate. 
           Cum laboriosam magnam illo dolore soluta?</p>

            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Recusandae ex consectetur mollitia doloremque laudantium odit 
            culpa nostrum nihil soluta reiciendis vel, quidem nam dolore natus. 
            Libero repellat sequi magni facere! </P> 

            <hr>    
            
                    <p> Em caso de duvida no cadastro, acesse: <a href="contato.php">Contato</a> <br> </p>

                    <p> Para leitura de noticias internas do site, acesse: <a href="posts/post-geral.php">Posts</a> <br> </p>

                    <p> Para acessar o perfil do usuario, acesse:  <a href="admin/meu-perfil.php" >Meu perfil</a> <br> </p>


                    <?php if($_SESSION ['tipo'] == 'digitador') {?>
                        <p> Para cadastrar o campo fabricantes, clique:  <a href="fabricantes/listar.php">Fabricantes</a> <br> </p>
                        <p> Para cadastrar o campo produtos, clique:  <a href="produtos/listar.php">Produtos</a> <br> </p>
                    <?php } ?>

                    <?php if($_SESSION ['tipo'] == 'editor') { ?>
                        <p> Para cadastrar o campo posts, clique:  <a href="posts/posts.php">Posts de noticias</a> <br> </p>
                    <?php } ?>

                    <hr>

                    <?php if($_SESSION ['tipo'] == 'admin') { ?>
                        <p> Para cadastrar o campo fabricantes, clique:  <a href="fabricantes/listar.php">Fabricantes</a> <br> </p>
                        <p> Para cadastrar o campo produtos, clique:  <a href="produtos/listar.php">Produtos</a> <br> </p>
                        <p> Para cadastrar o campo posts, clique:  <a href="posts/posts.php">Posts de noticias</a> <br> </p>  
                        <p> Para acessar o gerenciador de usuarios, clique: <a href="admin/usuarios.php">Gerenciar Usuários</a> <br> </p>
                    <?php } ?>
                
<?php include "includes/rodape.php" ?>