-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Set-2021 às 15:26
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `chupeta`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `cpf`, `telefone`) VALUES
(1, 'Júlia', '12345678910', '123456789'),
(2, 'Maitê', '23456789010', NULL),
(3, 'Mell', '34567890101', '987654321'),
(4, 'Rafaela', '56789012345', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `tamanho` varchar(30) NOT NULL,
  `cor` varchar(20) NOT NULL,
  `estampa` varchar(20) DEFAULT NULL,
  `material` varchar(20) NOT NULL,
  `valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `marca`, `tamanho`, `cor`, `estampa`, `material`, `valor`) VALUES
(1, 'ChupaChups', 'XXG', 'Azul Royal', 'Oncinha', 'Látex', 15.99),
(2, 'Bico Bico Surubico', 'M', 'Ciano', 'Passarinho fofo', 'Silicone', 20),
(3, 'ParaPobres', 'PP', 'Branco', 'Arranhão', 'O que tiver', 1.99),
(4, 'Anãozinho', 'XXP', 'Vermelho', NULL, 'Madeira', 5.5),
(11, 'Segue funcionando', 'Gg', 'verde', 'frutas', 'plastico', 6),
(18, 'Chupetinhas On', 'XG', 'Laranja', 'florida', 'Látex', 10.5),
(22, 'Amogos', 'Among', 'azul', 'Cofia', 'Imposto', 77);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id_venda`, `id_cliente`, `id_produto`, `valor`, `data`, `quantidade`) VALUES
(1, 1, 1, '48', '2021-08-20', 3),
(2, 2, 2, '20', '2021-08-18', 1),
(3, 3, 2, '60', '2021-08-15', 3),
(4, 4, 1, '16', '2021-08-19', 1),
(5, 4, 2, '20', '2021-08-19', 1),
(6, 4, 3, '2', '2021-08-19', 1),
(7, 4, 4, '6', '2021-08-19', 1),
(8, 1, 3, '4', '2021-08-21', 2),
(9, 2, 1, '16', '2021-07-19', 1),
(10, 2, 2, '20', '2021-07-19', 1),
(11, 2, 3, '2', '2021-07-19', 1),
(12, 2, 4, '6', '2021-07-19', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_produto` (`id_produto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `venda_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
