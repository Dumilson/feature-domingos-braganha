-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 17, 2023 at 06:07 PM
-- Server version: 5.7.33
-- PHP Version: 8.0.23RC1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caastra_2u`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cep`
--

CREATE TABLE `tb_cep` (
  `id_cep_pk` int(11) NOT NULL,
  `cep` varchar(110) NOT NULL,
  `endereco` varchar(110) DEFAULT NULL,
  `localidade` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_cep`
--

INSERT INTO `tb_cep` (`id_cep_pk`, `cep`, `endereco`, `localidade`, `bairro`, `created_at`, `updated_at`) VALUES
(1, '59600380', 'Rua Flávio de Oliveira', 'Mossoró', 'Alto da Conceição', '2023-01-17 17:54:17', '2023-01-17 17:54:17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_endereco`
--

CREATE TABLE `tb_endereco` (
  `id_endereco_pk` int(11) NOT NULL,
  `pessoa_fk` int(11) NOT NULL,
  `cep_fk` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_endereco`
--

INSERT INTO `tb_endereco` (`id_endereco_pk`, `pessoa_fk`, `cep_fk`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-01-17 17:54:17', '2023-01-17 17:54:17'),
(2, 2, 1, '2023-01-17 17:55:20', '2023-01-17 17:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pessoa`
--

CREATE TABLE `tb_pessoa` (
  `id_pessoa_pk` int(11) NOT NULL,
  `nome_pessoa` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_pessoa`
--

INSERT INTO `tb_pessoa` (`id_pessoa_pk`, `nome_pessoa`, `created_at`, `updated_at`) VALUES
(1, 'Domingos Afonso', '2023-01-17 17:54:17', '2023-01-17 17:54:17'),
(2, 'Ester', '2023-01-17 17:55:20', '2023-01-17 17:55:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cep`
--
ALTER TABLE `tb_cep`
  ADD PRIMARY KEY (`id_cep_pk`);

--
-- Indexes for table `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD PRIMARY KEY (`id_endereco_pk`),
  ADD KEY `cep_fk` (`cep_fk`),
  ADD KEY `pessoa_fk` (`pessoa_fk`);

--
-- Indexes for table `tb_pessoa`
--
ALTER TABLE `tb_pessoa`
  ADD PRIMARY KEY (`id_pessoa_pk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cep`
--
ALTER TABLE `tb_cep`
  MODIFY `id_cep_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_endereco`
--
ALTER TABLE `tb_endereco`
  MODIFY `id_endereco_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pessoa`
--
ALTER TABLE `tb_pessoa`
  MODIFY `id_pessoa_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD CONSTRAINT `tb_endereco_ibfk_1` FOREIGN KEY (`cep_fk`) REFERENCES `tb_cep` (`id_cep_pk`),
  ADD CONSTRAINT `tb_endereco_ibfk_2` FOREIGN KEY (`pessoa_fk`) REFERENCES `tb_pessoa` (`id_pessoa_pk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
