-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Out-2019 às 01:10
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alonso_engenharia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `cd_cliente` int(11) NOT NULL,
  `nm_razao_social` varchar(50) NOT NULL,
  `nm_fantasia` varchar(50) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `nm_responsavel` varchar(60) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `celular` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`cd_cliente`, `nm_razao_social`, `nm_fantasia`, `cnpj`, `endereco`, `email`, `telefone`, `nm_responsavel`, `cpf`, `celular`) VALUES
(2, 'Taynah Silva', 'Taynah S', '67876543456787', 'Rua Padre Saboia 298 - Beira Mar - Sï¿½o Vicente -', 'gtaynah@gmail.com', '1334633374', 'Glecielle Silva', '41511074876', '991078026'),
(5, 'teste razao social', 'teste fantasia', '76898765434565', 'Rua A 34, Santos, SC', 'teste@teste.com', '345387678', 'pedro', '67898765434', '13991168288'),
(6, 'Ampli ManutenÃ§Ã£o', 'Ampli Audio e Video', '67865432456787', 'Rua Frei Gaspar 100 sl 2 - SÃ£o Vicente - Sp', 'ampli@teste.com', '34657789', 'Gleydson', '167890876543', '991168288');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_proposta`
--

CREATE TABLE `tb_proposta` (
  `cd_proposta` int(11) NOT NULL,
  `cd_cliente` int(11) NOT NULL,
  `endereco_obra` varchar(70) NOT NULL,
  `valor_total` decimal(10,0) NOT NULL,
  `sinal` decimal(10,0) NOT NULL,
  `qtd_parcelas` int(11) NOT NULL,
  `valor_parcelas` decimal(10,0) NOT NULL,
  `dt_inicio_pag` date NOT NULL,
  `dt_parcelas` varchar(20) NOT NULL,
  `anexo` varchar(60) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_proposta`
--

INSERT INTO `tb_proposta` (`cd_proposta`, `cd_cliente`, `endereco_obra`, `valor_total`, `sinal`, `qtd_parcelas`, `valor_parcelas`, `dt_inicio_pag`, `dt_parcelas`, `anexo`, `status`) VALUES
(1, 2, 'Rua Principal 20 - Centro - Santos', '200000', '50000', 3, '50000', '2019-11-01', 'Dia 01', '2-2019.10.20-12.05.11', '0'),
(2, 6, 'Rua Padre Saboia, 298', '200', '50', 3, '50', '2019-11-01', 'Dia 01', '6-2019.10.19-21.27.33.pdf', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `cd_usuario` int(11) NOT NULL,
  `nm_usuario` varchar(60) NOT NULL,
  `ds_email` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`cd_usuario`, `nm_usuario`, `ds_email`, `senha`) VALUES
(1, 'Taynah Silva', 'gtaynah@gmail.com', 'e10adc3949ba59abbe56'),
(2, 'Teste 1', 'teste@teste.com.br', '25d55ad283aa400af464');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`cd_cliente`);

--
-- Indexes for table `tb_proposta`
--
ALTER TABLE `tb_proposta`
  ADD PRIMARY KEY (`cd_proposta`),
  ADD KEY `fk_cd_cliente` (`cd_cliente`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`cd_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `cd_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_proposta`
--
ALTER TABLE `tb_proposta`
  MODIFY `cd_proposta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `cd_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_proposta`
--
ALTER TABLE `tb_proposta`
  ADD CONSTRAINT `fk_cd_cliente` FOREIGN KEY (`cd_cliente`) REFERENCES `tb_cliente` (`cd_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
