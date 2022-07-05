<?php


require "conecta.php";


/* Usada em posts.php */
function lerPosts(mysqli $conexao, int $idUsuarioLogado, string $tipoUsuarioLogado):array {
  
    /* Se o tipo de usuario for administrador */
    if($tipoUsuarioLogado == 'admin') {

        /* SQL traga todos os posts (administrador e editor) */
        $sql = "SELECT posts.id, posts.titulo, posts.data, usuarios.nome AS autor FROM posts 
        INNER JOIN usuarios ON posts.usuario_id = usuarios.id ORDER BY data DESC";

    } else {

        /* Senão, SQL traga os posts do usuario (editor) */
        $sql = "SELECT id, titulo, data FROM posts WHERE usuario_id = $idUsuarioLogado ORDER BY data DESC";

    }

    $resultado = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

    $posts = [];

    while($post = mysqli_fetch_assoc($resultado)){
        array_push($posts, $post);
    }

    return $posts;

} // fim lerPosts



/* Usada em post-insere.php */
function inserirPost(mysqli $conexao, string $titulo, string $texto, string $resumo, string $imagem, int $idUsuarioLogado){
    
    $sql = "INSERT INTO posts(titulo, texto, resumo, imagem, usuario_id)
            VALUES ('$titulo', '$texto', '$resumo', '$imagem', '$idUsuarioLogado')";
    
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

} 

// fim inserirPost



/* Usada em post-atualiza.php */
function lerUmPost(mysqli $conexao, int $idPost, int $idUsuarioLogado, string $tipoUsuarioLogado):array {  

    /* Se o usuario logado for admin, então pode carregar os dados de qualquer post de qualquer usuario 
    sem alterar a autenticidade do usuario original */
    if( $tipoUsuarioLogado == 'admin' ) {

        $sql = "SELECT titulo, texto, resumo, imagem, usuario_id FROM posts WHERE id = $idPost";

    } else {
        
        /* Caso contrario, siginifica que o usuario editor, so poderá carregar dados dos seus proprios posts */
        $sql = "SELECT titulo, texto, resumo, imagem, usuario_id FROM posts WHERE id = $idPost 
        AND usuario_id = $idUsuarioLogado";

    }

	$resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    return mysqli_fetch_assoc($resultado); 

} // fim lerUmPost



/* Usada em post-atualiza.php */
function atualizarPost(mysqli $conexao, int $idPost, int $idUsuarioLogado, string $tipoUsuarioLogado, string $titulo, 
string $texto, string $resumo, string $imagem) {
    
    if($tipoUsuarioLogado == 'admin') {
        
        $sql="UPDATE posts SET titulo = '$titulo', texto = '$texto', resumo = '$resumo', imagem = '$imagem'
        WHERE id = $idPost ";
    
    } else {

        $sql="UPDATE posts SET titulo = '$titulo', texto = '$texto', resumo = '$resumo', imagem = '$imagem'
        WHERE id = $idPost AND usuario_id = $idUsuarioLogado";

    }

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));   

} // fim atualizarPost



/* Usada em post-exclui.php */
function excluirPost(mysqli $conexao, int $idPost, int $idUsuarioLogado, string $tipoUsuarioLogado){    
    
    if($tipoUsuarioLogado == 'admin') {

        $sql = "DELETE FROM posts WHERE id = $idPost";
    
    } else {

        $sql = "DELETE FROM posts WHERE id = $idPost AND usuario_id = $idUsuarioLogado";

    }   
        
	mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

} // fim excluirPost



/* Funções utilitárias */

/* Usada em post-insere.php e post-atualiza.php */
function upload(array $arquivo){
    
    /* Definindo os tipos de imagens aceitos */
    $tiposValidos = [
                        "image/png",
                        "image/jpeg",
                        "image/gif",
                        "image/svg+xml"
    ];

    /* Verificar se os arquivos enviados NÃO É um dos arquivos aceitos */
    if (!in_array($arquivo['type'],$tiposValidos)) {
        die ("<script>alert('Formato é invalido!'); history.back();</script>");
    }

    /* Acessando apenas o nome do arquivo */    
    $nome = $arquivo['name'];

    /* Acessando dados ou imagens de acesso temporario ao arquivo */
    $temporario = $arquivo['tmp_name'];

    /* Pasta de destino do arquivo que está sendo enviado, voltando na raiz (  ../  ) */
    $destino = "../imagens/$nome";

        /* Se o processo de envio temporario para destino for feito com sucesso,
        então a função retorna verdadeiro (indicando o sucesso no processo) */
        if( move_uploaded_file($temporario, $destino)) {
            return true;
        }
    
} // fim upload



/* Usada em posts.php e páginas da área pública */
function formataData(string $data):string { 
    
    /* Pegamos a data, transformamos em texto (strtotime) e depois aplicamos formato brasileiro (dia/mes/ano) */
    return date("d/m/Y H:i", strtotime($data));
    
} // fim formataData



/*** Funções para a área PÚBLICA do site post-geral.php ***/

/* Usada em post-geral.php */
function lerTodosOsPosts(mysqli $conexao):array {
    $sql = "SELECT id, titulo, imagem, resumo FROM posts ORDER BY data DESC" ;

    /* ORDER BY data DESC = ORDEM DECRESCENTE DE DATA */
    
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    $posts = [];
    while( $post = mysqli_fetch_assoc($resultado) ){
        array_push($posts, $post);
    }
    return $posts; 
} // fim lerTodosOsPosts



/* Usada em post-detalhe.php */
function lerDetalhes(mysqli $conexao, int $idPost):array {    
    $sql = "SELECT posts.id, posts.titulo, posts.imagem, posts.data, posts.texto, 
            usuarios.nome AS autor FROM posts INNER JOIN usuarios 
            ON posts.usuario_id = usuarios.id WHERE posts.id = $idPost";

            /* ON comparação entre duas chaves primaria e estrangeira */
            /* inner join permite a comparação acima */

    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_assoc($resultado); 
} // fim lerDetalhes



/* Usada em search.php */
function busca($conexao, string $termo):array {
    $sql = "SELECT id, titulo, data, resumo FROM posts WHERE titulo LIKE '%$termo%'
            OR resumo LIKE '%$termo%' OR texto LIKE '%$termo%' ORDER BY data DESC";

            /* LIKE significa a palavra digitada deve ser comparada, titulo como termo ou 
            resumo como termo ou texto como termo */
        
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    $posts = [];
    while( $post = mysqli_fetch_assoc($resultado) ){
        array_push($posts, $post);
    }
    return $posts; 
} // fim busca