-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Jun-2022 às 18:49
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `musical-talentos-noticias`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp(),
  `titulo` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `resumo` text NOT NULL,
  `imagem` varchar(40) NOT NULL,
  `usuario_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `data`, `titulo`, `texto`, `resumo`, `imagem`, `usuario_id`) VALUES
(3, '2022-06-22 16:06:19', 'Teste', 'jadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnaknd', 'jadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnakndjadfjksadfjadjkkjandfjadjfnaknd', 'musica.png', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` smallint(6) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` enum('admin','editor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `tipo`) VALUES
(1, 'thalia', 'moraesthalia.silva@gmail.com', '$2y$10$nEU6ZJpWW0cAXT4eGjeHnus8n4lluSsvppAEbBi2n/GBmNtZFJqTi', 'admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_posts_usuarios` (`usuario_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
