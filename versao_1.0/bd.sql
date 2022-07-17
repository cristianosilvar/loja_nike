-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 06-Jun-2022 às 02:56
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(80) NOT NULL,
  `imagem` varchar(150) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `max_parcelas` int(11) NOT NULL,
  `juros` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `descricao`, `imagem`, `valor`, `max_parcelas`, `juros`, `categoria`, `tipo`) VALUES
(1, 'Camisa Nike Brasil II 2020/21 Torcedor Pro Masculina', 'https://images.lojanike.com.br/500x500/produto/camisa-nike-brasil-ii-202021-torcedor-pro-masculina-CD0688-427-1-11626441450.jpg', '199.00', 4, 3, 1, 1),
(2, 'Camiseta Nike PSG II 2021/22 Torcedor Masculina', 'https://images.lojanike.com.br/860x860/produto/camiseta-nike-psg-ii-202122-torcedor-masculina-CV7902-101-1-11626788835.jpg', '299.99', 7, 1, 1, 1),
(3, 'Camiseta Nike Liverpool II 2021/22 Torcedor Masculina', 'https://images.lojanike.com.br/860x860/produto/camiseta-nike-liverpool-ii-202122-torcedor-masculina-DB2558-111-1-11625665747.jpg', '299.99', 7, 0, 1, 1),
(4, 'Camisa Nike Corinthians I 2020/21 Jogador Masculina', 'https://images.lojanike.com.br/500x500/produto/camisa-nike-corinthians-i-202021-jogador-masculina-CD4194-100-1-11637952829.jpg', '279.99', 7, 1, 1, 1),
(6, 'Jaqueta Jordan Essentials Masculina', 'https://images.lojanike.com.br/500x500/produto/jaqueta-m-j-flight-puffer-jkt-DA9806-010-1-11628870701.jpg', '999.99', 12, 0, 2, 1),
(7, 'Jaqueta Jordan Essentials Feminina', 'https://images.lojanike.com.br/500x500/produto/jaqueta-jordan-essentials-feminina-DD6992-286-1-11643039009.jpg', '499.00', 10, 0, 2, 1),
(8, 'Jaqueta PSG Jordan Masculina', 'https://images.lojanike.com.br/500x500/produto/jaqueta-m-j-psg-anthem-20-jkt-DB6489-100-1.jpg', '269.79', 6, 1, 2, 1),
(9, 'TÃªnis Air Jordan 1 Mid Masculino', 'https://images.lojanike.com.br/500x500/produto/tenis-air-jordan-1-mid-masculino-554724-122-1-11633366394.jpg', '899.99', 12, 0, 2, 2),
(10, 'TÃªnis Nike Air Zoom Pegasus Feminino', 'https://images.lojanike.com.br/500x500/produto/tenis-wmns-nike-air-zoom-pegasus-38-CW7358-004-1-11628867641.jpg', '529.69', 12, 0, 3, 2),
(11, 'TÃªnis Nike Air Zoom Tempo Next% Feminino', 'https://images.lojanike.com.br/500x500/produto/tenis-nike-air-zoom-tempo-next-feminino-CI9924-003-1.jpg', '769.99', 12, 0, 3, 2),
(12, 'Camiseta Nike AeroSwift Feminina', 'https://images.lojanike.com.br/500x500/produto/camiseta-sem-manga-w-nk-aroswft-singlet-CZ9385-702-1-11628867987.jpg', '329.90', 8, 0, 3, 1),
(13, 'Camiseta Nike Dri-FIT Rise 365 Masculina', 'https://images.lojanike.com.br/500x500/produto/camiseta-manga-curta-m-nk-df-rise-365-ss-CZ9184-013-1.jpg', '229.99', 5, 0, 3, 1),
(14, 'Air Jordan 3 Pine Green', 'https://images.lojanike.com.br/515x515/produto/tenis-air-jordan-3-retro-masculino-CT8532-030-1-11634658331.jpg', '1299.99', 12, 0, 4, 2),
(15, 'Air Force 1 Mid Jewel', 'https://images.lojanike.com.br/515x515/produto/air-force-1-mid-jewel-DH5622-100-2-21637952568.jpg', '849.99', 12, 0, 4, 2),
(16, 'Mountain Fly GORE-TEX', 'https://images.lojanike.com.br/500x500/produto/acg-mountain-fly-gore-tex-CT2904-002-2-21637952535.jpg', '1399.99', 12, 0, 4, 2),
(17, 'Jordan ZION 1', 'https://images.lojanike.com.br/500x500/produto/tenis-jordan-zion-1-masculino-DA3130-800-1-11634850052.jpg', '679.99', 10, 0, 4, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`) VALUES
(1, 'admin', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
