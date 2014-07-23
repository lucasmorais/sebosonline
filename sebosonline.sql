-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03-Jul-2014 às 20:40
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sebosonline`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `id_admin` int(2) NOT NULL AUTO_INCREMENT,
  `primeiro_nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `ultimo_nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `usuario` varchar(14) COLLATE utf8_bin NOT NULL,
  `senha` varchar(30) COLLATE utf8_bin NOT NULL,
  `status_admin` int(1) NOT NULL,
  `tipo` int(1) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id_admin`, `primeiro_nome`, `ultimo_nome`, `email`, `usuario`, `senha`, `status_admin`, `tipo`) VALUES
(2, 'admin', 'admin', 'admin', 'admin', 'admin', 0, 1),
(3, 'Sistema', '', '', 'sistema', 'yobrothers', 0, 1),
(4, 'Sistema', '', '', 'sistema', 'yobrothers', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `afiliado`
--

CREATE TABLE IF NOT EXISTS `afiliado` (
  `id_afiliado` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `cidade` varchar(255) COLLATE utf8_bin NOT NULL,
  `estado` varchar(255) COLLATE utf8_bin NOT NULL,
  `endereco` varchar(255) COLLATE utf8_bin NOT NULL,
  `numero` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `senha` varchar(255) COLLATE utf8_bin NOT NULL,
  `tipo` int(1) NOT NULL,
  PRIMARY KEY (`id_afiliado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `afiliado`
--

INSERT INTO `afiliado` (`id_afiliado`, `nome`, `cidade`, `estado`, `endereco`, `numero`, `email`, `senha`, `tipo`) VALUES
(2, 'marcelo', 'Marcelolandia', 'São Paulo', 'rua do yo', 67, 'marcelo@marcelo.com', 'yobros', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `telefone` varchar(255) COLLATE utf8_bin NOT NULL,
  `cep` int(255) NOT NULL,
  `senha` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `id_compra` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_afiliado` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracao`
--

CREATE TABLE IF NOT EXISTS `configuracao` (
  `id_site` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `razao_social` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `n` int(11) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `telefone2` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `celular2` varchar(255) NOT NULL,
  `celular3` varchar(255) NOT NULL,
  `celular4` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `horario_comercial` varchar(255) NOT NULL,
  `dia_util` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `tumblr` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  PRIMARY KEY (`id_site`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `configuracao`
--

INSERT INTO `configuracao` (`id_site`, `nome`, `url`, `razao_social`, `cep`, `cidade`, `estado`, `rua`, `bairro`, `n`, `fax`, `telefone`, `telefone2`, `celular`, `celular2`, `celular3`, `celular4`, `email`, `horario_comercial`, `dia_util`, `facebook`, `youtube`, `twitter`, `tumblr`, `linkedin`) VALUES
(1, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria_produto`
--

CREATE TABLE IF NOT EXISTS `galeria_produto` (
  `id_imagem` int(4) NOT NULL AUTO_INCREMENT,
  `id_produto` int(4) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  PRIMARY KEY (`id_imagem`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=91 ;

--
-- Extraindo dados da tabela `galeria_produto`
--

INSERT INTO `galeria_produto` (`id_imagem`, `id_produto`, `imagem`) VALUES
(1, 8, 'c04696a1eb1e8a1cbf3589facc016789.jpg'),
(2, 8, 'ffcf6f80fcf4e68febe2ce856a463832.jpg'),
(3, 8, '290a8b3ff2265bb9462f082a202dbeb2.jpg'),
(4, 13, '9e9895cedcd7783d24ba6da377ee29d8.jpg'),
(5, 13, 'a85f23ffbe48557e214317ab0120a6da.jpg'),
(6, 13, '1a7a613f4905f9bd2e62d5f90731eabf.jpg'),
(9, 9, '3e90c65a8d3b1b9c05a30377fda2c0a9.jpg'),
(10, 9, '8f65a88cad644b62cc864bc0ddd21492.jpg'),
(12, 9, 'bce21d0555348f71b98d9ad1f09444ef.jpg'),
(19, 9, '776f1f724c12f14420af1bddb0b2acef.jpg'),
(21, 7, 'c60c6558d246242551f865c855ec0733.jpg'),
(22, 15, 'c2c70d3d5b4e81178c0dbc0575222787.jpg'),
(23, 15, '6c8c7a9cb7d1fb9563da5536e0b2c831.jpg'),
(24, 15, '665c3122a244183f34ddba94acbdb495.jpg'),
(25, 15, '8fdfd1fc7f3b23408b7eddba4125cf82.jpg'),
(26, 15, '3f235b6bf2514ae83d4facef29e12dfa.jpg'),
(27, 15, '461575a1fd519edf272c411d1dba37a5.jpg'),
(28, 15, 'f705a3e8d5090e4ca13d276c11a4a73f.jpg'),
(31, 16, 'e63d5865843a97e48709e33889cd3673.jpg'),
(32, 16, '201e1a178b8e5bc02f3f05a2fdc453a7.jpg'),
(36, 16, '8bf6fe7b97acbdb8e8f1fd4c837dc693.jpg'),
(37, 16, 'e58d3bb41ca1df3b9ddd2d6bb79a7694.jpg'),
(38, 16, '7c9f1af94f901ea933f18968ec5cad42.jpg'),
(39, 18, 'c762891050c674e9675516deb8677ef8.jpg'),
(40, 10, '44627099bb9352106e114c2cb9121155.jpg'),
(41, 10, 'e984ac26292858fec6fb3a8230294dc3.jpg'),
(42, 10, '8fe84dc4d111447c03a269786c58c404.jpg'),
(43, 10, '583cea39307fa87820c9b1d028f6426b.jpg'),
(44, 10, '10ecb7a5605950130c6389f7b2c554e1.jpg'),
(45, 10, 'd49a4fd696c8a2a850058bc44ecca860.jpg'),
(46, 10, 'dbf1be52f77d7636234cc346a814e6cf.jpg'),
(47, 10, 'a0c908dbfd15888c13db36f563a7fe39.jpg'),
(48, 10, '9b98c07d9803e2f907afeaa26ac4c273.jpg'),
(50, 17, '3e3fc211ccb279aeb87df1b2fc58a8c6.jpg'),
(51, 17, '66c261d121779b98f04b90b6ecd25ebb.jpg'),
(52, 17, 'a1a86257b98ff1fcb92f8806ff95bea0.jpg'),
(53, 17, '485534d2ff6e1ed8429e92121bda8390.jpg'),
(54, 17, 'b5fbb98ffbd5e4ba28b4aaed3b53750b.jpg'),
(55, 17, 'd30031dab5315a6b2420f9288f4dc972.jpg'),
(56, 17, '9bdd9243f35c30d25f397ae2aa1a9bfd.jpg'),
(58, 17, '0fc31becd2a126a6bfb91d42d0949688.jpg'),
(59, 17, '71956982926fe6e505feb87357a1dd8e.jpg'),
(60, 17, 'e6e2bab14c2eb190d595e200a7ca419b.jpg'),
(61, 17, '6ffc083898f8ff2a357ad3239a512edf.jpg'),
(62, 17, 'a29ed6a18416475e152f76e0d681ec5c.jpg'),
(63, 7, '68d31aa583680534526a33c3042d0402.jpg'),
(64, 7, '0ff813ae24a86d01d36ffc41da59e43f.jpg'),
(65, 7, 'e5c93a120319bd04f95fe9aa9f19d0c9.jpg'),
(66, 7, 'd04bbeb10b664ea25270f93ebc00e033.jpg'),
(67, 7, '9230c5cede965ff09e8a89fa90ed00e4.jpg'),
(68, 7, '5d2fbf25b3df7b609b3540f92884127a.jpg'),
(69, 7, 'de93ed6622beffdfde13d41364e1b08b.jpg'),
(70, 7, '0f2a72c4d0b40f900697d81982652f78.jpg'),
(72, 16, 'd033d99f1f7ca85860249167c21a73c2.jpg'),
(73, 16, '09ec733930c2c95a1e5ba9cb57ba5054.jpg'),
(74, 16, '514ebc5df3f4f995d91810bf3fd094ac.jpg'),
(75, 16, '437fbb456aee9b9a1e210daf4af1b767.jpg'),
(76, 16, '517ab66af5fdb7106722cfb1cdd90f9f.jpg'),
(77, 15, '5015f65dd9a6af70ed3c880a081fe5aa.jpg'),
(78, 15, '447acf8e5f64e017ffb5f3b88351c0d2.jpg'),
(79, 15, '6640e6cbe46f91d91d1e54164d166efd.jpg'),
(80, 15, '0e05f9842a1257a2c891c2756d0d0c04.jpg'),
(81, 15, '0c73dba90b26fe9c129f799673a21a80.jpg'),
(82, 15, 'c4ca80ed75a6aae25d38f00676f6ab24.jpg'),
(83, 15, '74b6e792a29a5d111aead547a492f257.jpg'),
(84, 9, '4bc54b5b903e453b73ef58eb0cd27eef.jpg'),
(85, 9, '2968613fdb9fca123a5b5ec37b8f10f9.jpg'),
(86, 9, '37352f1b3d28b27bd7bd5ac03c92957e.jpg'),
(87, 9, 'd883635569a25a6b7e6ce48fa126ac45.jpg'),
(88, 9, '2121bc7c0beb4aeb079a3269c13614ef.jpg'),
(89, 9, '43ecf669503b10c221a30e7af6778d96.jpg'),
(90, 9, 'fa1a4f00b731829480c863a6f14ebfa1.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE IF NOT EXISTS `imagem` (
  `id_imagem` int(11) NOT NULL AUTO_INCREMENT,
  `id_pagina` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  PRIMARY KEY (`id_imagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagina`
--

CREATE TABLE IF NOT EXISTS `pagina` (
  `id_pagina` int(2) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  PRIMARY KEY (`id_pagina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_bin NOT NULL,
  `titulo_abstrato` varchar(255) COLLATE utf8_bin NOT NULL,
  `descricao` varchar(255) COLLATE utf8_bin NOT NULL,
  `descricao_abstrato` varchar(255) COLLATE utf8_bin NOT NULL,
  `preco` float NOT NULL,
  `imagem` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `id_tipo`, `titulo`, `titulo_abstrato`, `descricao`, `descricao_abstrato`, `preco`, `imagem`) VALUES
(0, 0, 'oioi', 'hihi', '<p>oi</p>\r\n', '<p>oi</p>\r\n', 30, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
