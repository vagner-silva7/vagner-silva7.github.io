-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Maio-2022 às 19:01
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
-- Banco de dados: `vendas_vagner`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fabricantes`
--

CREATE TABLE `fabricantes` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fabricantes`
--

INSERT INTO `fabricantes` (`id`, `nome`) VALUES
(1, 'Asus'),
(2, 'Dell'),
(3, 'Apple'),
(4, 'LG do Brasil'),
(5, 'Samsung'),
(6, 'Microsoft do Brasil'),
(7, 'Brastemp'),
(8, 'HP'),
(9, 'ITAU'),
(10, 'Sony'),
(16, 'Xiaomi');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `preco` decimal(8,2) NOT NULL,
  `quantidade` smallint(6) DEFAULT NULL,
  `descricao` text NOT NULL,
  `fabricante_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `quantidade`, `descricao`, `fabricante_id`) VALUES
(1, 'TV Led', '2000.00', 5, 'Tv de ultima geração', 5),
(2, 'iPhone XYZ', '5500.79', 8, ' Smartphone caro pra caramba mas compensa', 3),
(3, 'Geladeira frostfree', '1500.00', 10, ' Refrigerador Frost-free com acesso à Internet das Coisas e bla bla bla ', 7),
(4, 'iPad Mini', '5000.00', 20, ' Tablet Apple com tela retina display de 4k, memória interna de 64GB, acesso ao iCloud. ', 3),
(6, 'Ultrabook', '4500.68', 12, 'Equipamento com processador AMD Ryzen5, 12GB de RAM, placa de vídeo RTX', 1),
(7, 'Headset', '300.00', 9, ' Fone de ouvido USB com alta qualidade ', 6),
(8, 'Tablet Android', '4999.00', 3, 'Tablet com a versão 12 do sistema operacional da Google, possui tela de 10 polegadas e armazenamento de 64GB.', 5),
(9, 'computador 1000', '2000.55', 5, ' memoria ram 16 gb com dvd-r', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `fabricantes`
--
ALTER TABLE `fabricantes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produtos_fabricantes` (`fabricante_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fabricantes`
--
ALTER TABLE `fabricantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_produtos_fabricantes` FOREIGN KEY (`fabricante_id`) REFERENCES `fabricantes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
