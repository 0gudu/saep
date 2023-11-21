-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/11/2023 às 13:02
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `saep_db`
--



-- --------------------------------------------------------

--
-- Estrutura para tabela `professores`
--

CREATE TABLE `professores` (
  `idprofessores` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `professores`
--

INSERT INTO `professores` (`idprofessores`, `nome`, `email`, `senha`) VALUES
(1, 'Jeferson', 'jeferson_senhasenai@professor.sesi', 'souocoornenador23'),
(2, 'Paulo Simas', 'paulo_simas_senhasenai@professor.sesi', 'souomelhor12'),
(3, 'Djeniffer', 'dj_senhasenai@professor.sesi', 'souamelhoremdados42');

-- --------------------------------------------------------

--
-- Estrutura para tabela `turmas`
--

CREATE TABLE `turmas` (
  `idturmas` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `professor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `turmas`
--

INSERT INTO `turmas` (`idturmas`, `nome`, `professor`) VALUES
(1, 'Engenharia Mecanica 01', 1),
(2, 'Engenharia Mecanica 02', 2),
(3, 'Engenharia Mecanica 03', 3);
-- --------------------------------------------------------

--
-- Estrutura para tabela `atividades`
--

CREATE TABLE `atividades` (
  `idatividades` int(11) NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `descrição` varchar(45) DEFAULT NULL,
  `turmas` int(11) NOT NULL,
  `professor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `atividades`
--

INSERT INTO `atividades` (`idatividades`, `titulo`, `descrição`, `turmas`, `professor`) VALUES
(1, 'Mecanica Basica 01', 'Uma aula sobre mecanica basica', 1, 1),
(2, 'Mecanica Intermediaria 01', 'Uma aula sobre mecanica intermediaria', 2, 2),
(3, 'Mecanica Avançada 01', 'Uma aula sobre mecanica avançada', 3, 3);
--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `atividades`
--
ALTER TABLE `atividades`
  ADD PRIMARY KEY (`idatividades`),
  ADD KEY `fk_atividades_turmas1_idx` (`turmas`,`professor`);

--
-- Índices de tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`idprofessores`);

--
-- Índices de tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`idturmas`),
  ADD KEY `fk_turmas_professores_idx` (`professor`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atividades`
--
ALTER TABLE `atividades`
  MODIFY `idatividades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `idprofessores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `idturmas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `atividades`
--
ALTER TABLE `atividades`
  ADD CONSTRAINT `fk_atividades_turmas1` FOREIGN KEY (`turmas`,`professor`) REFERENCES `turmas` (`idturmas`, `professor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `fk_turmas_professores` FOREIGN KEY (`professor`) REFERENCES `professores` (`idprofessores`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
