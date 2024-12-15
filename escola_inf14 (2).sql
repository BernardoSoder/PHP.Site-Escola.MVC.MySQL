-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/09/2024 às 02:19
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `escola_inf14`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `id_tipo_materia` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `materia`
--

INSERT INTO `materia` (`id_materia`, `id_tipo_materia`, `descricao`) VALUES
(1, 4, 'Artes'),
(2, 2, 'Biologia'),
(3, 5, 'Espanhol'),
(4, 3, 'Física'),
(5, 4, 'Geografia'),
(6, 4, 'História'),
(7, 5, 'Inglês'),
(8, 5, 'Literatura'),
(9, 3, 'Matemática'),
(10, 5, 'Português'),
(11, 3, 'Química');

-- --------------------------------------------------------

--
-- Estrutura para tabela `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `valor` float(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_materia`
--

CREATE TABLE `tipo_materia` (
  `id_tipo_materia` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipo_materia`
--

INSERT INTO `tipo_materia` (`id_tipo_materia`, `descricao`) VALUES
(1, 'N/D'),
(2, 'Biológicas'),
(3, 'Exatas'),
(4, 'Humanas'),
(5, 'Linguagens');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'Aluno');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_tipo_usuario`, `nome`, `email`, `senha`) VALUES
(1, 1, 'Administrador', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(2, 2, 'Felipe', 'felipe@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(3, 2, 'Bernardo Augusto Soder', 'bernardo@gmail.com', '25d55ad283aa400af464c76d713c07ad');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`);

--
-- Índices de tabela `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Índices de tabela `tipo_materia`
--
ALTER TABLE `tipo_materia`
  ADD PRIMARY KEY (`id_tipo_materia`);

--
-- Índices de tabela `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipo_materia`
--
ALTER TABLE `tipo_materia`
  MODIFY `id_tipo_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
