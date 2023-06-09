-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/06/2023 às 16:58
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `movielist`
--
CREATE DATABASE IF NOT EXISTS `movielist` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `movielist`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `idFilme` int(11) NOT NULL,
  `usuarios_username` varchar(255) NOT NULL,
  `mensagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `generoId` int(11) NOT NULL,
  `anoLancamento` year(4) DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `trailer` varchar(255) DEFAULT NULL,
  `assistido` tinyint(1) DEFAULT 0,
  `dataCadastro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `filmes`
--

INSERT INTO `filmes` (`id`, `titulo`, `generoId`, `anoLancamento`, `poster`, `trailer`, `assistido`, `dataCadastro`) VALUES
(3, 'Vingadores: Ultimato', 1, '2019', 'View/images/vingadores.jpg', 'https://www.youtube.com/watch?v=TcMBFSGVi1c', 0, '2023-04-15 01:16:57'),
(4, 'Deadpool 2', 2, '2018', 'View/images/deadpool2.jpg', 'https://www.youtube.com/watch?v=20bpjtCbCz0', 1, '2023-04-15 01:16:57'),
(6, 'Interestelar', 4, '2014', 'View/images/interestelar.jpg', 'https://www.youtube.com/watch?v=0vxOhd4qlnA', 1, '2023-04-15 01:16:57'),
(7, 'Batman: O Cavaleiro das Trevas', 1, '2008', 'View/images/batman.jpg', 'https://www.youtube.com/watch?v=EXeTwQWrcwY', 0, '2023-04-15 01:18:17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `generos`
--

INSERT INTO `generos` (`id`, `nome`) VALUES
(1, 'Comédia'),
(2, 'Ação'),
(3, 'Drama'),
(4, 'Suspense'),
(5, 'Ficção científica');

-- --------------------------------------------------------

--
-- Estrutura para tabela `meus_filmes`
--

CREATE TABLE `meus_filmes` (
  `usuarios_username` varchar(255) NOT NULL,
  `filmes_id` int(11) NOT NULL,
  `assistido` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `meus_filmes`
--

INSERT INTO `meus_filmes` (`usuarios_username`, `filmes_id`, `assistido`) VALUES
('paodequeijo', 6, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`username`, `password`) VALUES
('paodequeijo', '1234'),
('queijo', '1234');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentarios_ibfk_1` (`idFilme`),
  ADD KEY `fk_comentarios_usuarios1` (`usuarios_username`);

--
-- Índices de tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filmes_ibfk_1` (`generoId`);

--
-- Índices de tabela `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `meus_filmes`
--
ALTER TABLE `meus_filmes`
  ADD PRIMARY KEY (`usuarios_username`,`filmes_id`),
  ADD KEY `fk_usuarios_has_filmes_filmes1` (`filmes_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`idFilme`) REFERENCES `filmes` (`id`),
  ADD CONSTRAINT `fk_comentarios_usuarios1` FOREIGN KEY (`usuarios_username`) REFERENCES `usuarios` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `filmes`
--
ALTER TABLE `filmes`
  ADD CONSTRAINT `filmes_ibfk_1` FOREIGN KEY (`generoId`) REFERENCES `generos` (`id`);

--
-- Restrições para tabelas `meus_filmes`
--
ALTER TABLE `meus_filmes`
  ADD CONSTRAINT `fk_meus_filmes_usuarios1` FOREIGN KEY (`usuarios_username`) REFERENCES `usuarios` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_filmes_filmes1` FOREIGN KEY (`filmes_id`) REFERENCES `filmes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
