<?php
require "conecta.php";

/* Usada em post-insere.php */
function inserirPost(mysqli $conexao, string $titulo, string $texto, string $resumo, string $imagem, int $idUsuarioLogado){
    $sql = "INSERT INTO posts(titulo, texto, resumo, imagem, usuario_id) VALUES('$titulo', '$texto', '$resumo', '$imagem', $idUsuarioLogado)";
    
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
} // fim inserirPost



/* Usada em posts.php */
function lerPosts(mysqli $conexao, int $idUsuarioLogado, string $tipoUsuarioLogado):array {
    /* Se o tipo de usuario for admin */
if($tipoUsuarioLogado == 'admin'){

    //mostrar todos os posts (admin + editor)        
    $sql = "SELECT posts.id, posts.titulo, posts.data, usuarios.nome AS autor FROM posts INNER JOIN usuarios ON posts.usuario_id = usuarios.id ORDER BY data DESC"; // verificando se a chave extrangeira está ligada a chave primaria // ao trabalhar com consultas JOIN - precisa trazer o nome da tabela

} else { 
//se não, SQL mostrar somente os posts do editor
    
    $sql = "SELECT id, titulo, data FROM posts WHERE usuario_id = $idUsuarioLogado ORDER BY data DESC"; //ORDER BY data DESC traz na ordem cronológica
}

    $resultado = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
    $posts = [];
    while($post = mysqli_fetch_assoc($resultado)){
        array_push($posts, $post);
    }
    return $posts; // é um array - colocar ele la em posts.php
} // fim lerPosts


/* Usada em post-atualiza.php */
function lerUmPost(mysqli $conexao, int $idPost, string $idUsuarioLogado, string $tipoUsuarioLogado):array {  
    
    /* Se o usuario logado for admin, poderá carregar os dados de qualquer post de outros usuarios */
   
    if($tipoUsuarioLogado == 'admin'){
        $sql = "SELECT titulo, texto, resumo, imagem, usuario_id FROM posts WHERE id = $idPost";

    } else {
         /* Caso contrário, significa que é um usuário editor, portanto só poderá atualizar seus próprios posts */
        $sql = "SELECT titulo, texto, resumo, imagem, usuario_id FROM posts WHERE id = $idPost AND usuario_id = $idUsuarioLogado";
    }
    
	$resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_assoc($resultado); 
} // fim lerUmPost



/* Usada em post-atualiza.php */
function atualizarPost(mysqli $conexao, int $idPost, int $idUsuarioLogado, string $tipoUsuarioLogado, string $titulo, string $texto, string $resumo, string $imagem){
       if($tipoUsuarioLogado == 'admin'){
        $sql = "UPDATE posts SET titulo = '$titulo', texto = '$texto', resumo = '$resumo', imagem = '$imagem' WHERE id = $idPost"; 

    } else {
         /* Caso contrário, significa que é um usuário editor, portanto só poderá atualizar seus próprios posts */
        $sql = "UPDATE posts SET titulo = '$titulo', texto = '$texto', resumo = '$resumo', imagem = '$imagem' WHERE id = $idPost AND usuario_id = $idUsuarioLogado"; 
    } 

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));       
} // fim atualizarPost



/* Usada em post-exclui.php */
function excluirPost(mysqli $conexao, int $idPost, int $idUsuarioLogado, string $tipoUsuarioLogado){    
    if($tipoUsuarioLogado == 'admin'){
        $sql = "DELETE FROM posts WHERE id = $idPost";
    } else {
        $sql = "DELETE FROM posts WHERE id = $idPost AND usuario_id = $idUsuarioLogado";
    }
    

	mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
} // fim excluirPost




/* Funções utilitárias */

/* Usada em post-insere.php e post-atualiza.php */
function upload(array $arquivo){
    //definindo os tipos de imagens aceitos
    $tiposValidos = ["image/png", "image/jpeg", "image/gif", "image/svg+xml"]; // no array sempre colocar o prefixo image e no caso do svg+xml sempre declarar +xml
    
    //verificar se o arquivo enviando NÃO é aceito
    if( !in_array($arquivo['type'], $tiposValidos) ){ //se o tipo do arquivo não for o tipo valido, faça algo...
        die("<script>alert('Formato inválido!'); history.back();</script>"); //history.back() - volta para a página anterior
    }

    $nome = $arquivo['name']; //precisa ser em ingles por conta do $_FILES - seria o mesmo que $_FILES['arquivo']['name'];

    //Acessando dados de acesso temporário ao arquivo
    $temporario = $arquivo['tmp_name'];

    //Pasta de destino do arquivo que está sendo enviado
    $destino = "../imagens/$nome";

    /* Se o processo de envio temporário para o destino for feito com sucesso, a função retorna como verdadeiro (indicando o sucesso do processo) */

    if( move_uploaded_file($temporario, $destino) ){
        return true;

    }

    
} // fim upload



/* Função de conversão da data - Usada em posts.php e páginas da área pública */
function formataData(string $data):string { 
    /* função transforma a data em texto e aplica o formato brasileiro de data - 'd/m/Y' */
    return date("d/m/Y H:i", strtotime($data));

    
} // fim formataData



/*** Funções para a área PÚBLICA do site ***/

/* Usada em index.php */
function lerTodosOsPosts(mysqli $conexao):array {
    $sql = "SELECT id, titulo, texto, resumo, imagem FROM posts ORDER BY data DESC";
    
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    $posts = [];
    while( $post = mysqli_fetch_assoc($resultado) ){
        array_push($posts, $post);
    }
    return $posts; 
} // fim lerTodosOsPosts



/* Usada em post-detalhe.php */
function lerDetalhes(mysqli $conexao, int $idPost):array {    
    $sql = "SELECT posts.id, posts.titulo, posts.data, posts.texto, posts.imagem, usuarios.nome AS autor FROM posts INNER JOIN usuarios ON posts.usuario_id = usuarios.id WHERE posts.id = $idPost"; /* colocamos posts.id neste caso pq estamos referenciando a tabela de usuarios também, então estamos indicando que o id é da tabela de posts */
    /* ON posts.usuario_id = usuarios.id - estou pedindo para que traga o id do usuario do post que seja igual ao id do usuario na tabela de usuarios (ou seja, os posts daquele usuario apenas) */

    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_assoc($resultado); 
} // fim lerDetalhes



/* Usada em search.php */
function busca(mysqli $conexao, string $termo):array {
    $sql = "SELECT id, titulo, resumo, data FROM posts WHERE titulo like '%$termo%' OR texto like '%$termo%' OR resumo like '%$termo%' ORDER BY data DESC";  /* Aqui no where, vamos colocar os campos onde possa estar a palavra-chave da busca
    like - é usado para busca ampla e a %termo% palabra entre %% serve para procurar em qualquer local do texto, se colocar antes da palavra %termo quando o texto terminar com a palavra-chave e se estiver termo% quando a palavra-chave estiver no inicio da frase */
        
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    $posts = [];
    while( $post = mysqli_fetch_assoc($resultado) ){
        array_push($posts, $post);
    }
    return $posts; 
} // fim busca