# Comandos para criação do banco de dados (parte física) do Microblog

## 1) Criar banco de dados (ajuste para conter seu nome)
CREATE DATABASE progweb_microblog_marilia CHARACTER SET "utf8mb4";

## 2) Criar tabela de usuários
CREATE TABLE usuarios(
	id SMALLINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(45) NOT NULL,
	email VARCHAR(40) NOT NULL UNIQUE, -- UNIQUE garante que o e-mail será único
  	senha VARCHAR(255) NOT NULL,
	tipo ENUM('admin','editor') NOT NULL -- ENUM permite mais de uma opção, neste caso 'admin','editor'
); 

## 3) Criar tabela de posts
CREATE TABLE posts(
	id SMALLINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	data DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, -- pega a data atual no momento
	titulo VARCHAR(100) NOT NULL,
	texto TEXT NOT NULL,
	resumo TEXT NOT NULL,
  	imagem VARCHAR(40) NOT NULL, -- aqui guardaremos somente o nome.ext da imagem, não queremos um banco pesado
  	usuario_id SMALLINT NOT NULL
);

## 4) Criar chave estrangeira para relacionamento entre as tabelas
ALTER TABLE posts 
  ADD CONSTRAINT fk_posts_usuarios 
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id); 




  ## 5) informações do Vagner para adicionar outras informações importantes

  -- Extraindo dados da tabela `usuarios`
-- 



INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `tipo`) VALUES
(1, ' vagner', 'vagner@gmail.com', '$2y$10$nEU6ZJpWW0cAXT4eGjeHnus8n4lluSsvppAEbBi2n/GBmNtZFJqTi', 'admin'),
(2, 'henrique', 'henrique@gmail.com', '$2y$10$GIYUtmOvGIw/BdrdCW1Fr.qVrI9RVx2G.dBsHFWU1/zhSvTT9UTPe', 'editor'),
(3, 'jose', 'jose@gmail.com', '$2y$10$6mdPUu7IJQdxbKL4h763iuQ7TgX.un75sX3LOTDk2d.KOqkNOUAxi', 'digitador');





--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
ADD PRIMARY KEY (`id`),
ADD KEY `fk_posts_usuarios1` (`usuario_id`);







--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `email` (`email`);



--
-- AUTO_INCREMENT de tabelas despejadas



--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;



--


--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;









--
-- Limitadores para a tabela `posts`
--
ALTER TABLE `posts`
ADD CONSTRAINT `fk_posts_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);




-- Limitadores para a tabela `produtos`

ALTER TABLE `produtos`
ADD CONSTRAINT `fk_produtos_fabricantes` FOREIGN KEY (`fabricante_id`) REFERENCES `fabricantes` (`id`),
ADD CONSTRAINT `fk_produtos_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;