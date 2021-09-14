-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25-Set-2017 às 17:33
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `radiologia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_convenio`
--

CREATE TABLE IF NOT EXISTS `tb_convenio` (
  `cod_convenio` int(11) NOT NULL AUTO_INCREMENT,
  `nome_empresa` varchar(45) NOT NULL,
  `cnpj` varchar(45) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `outros_doc` varchar(45) DEFAULT NULL,
  `endereco` varchar(60) DEFAULT NULL,
  `cep` varchar(12) DEFAULT NULL,
  `cidade` varchar(20) DEFAULT NULL,
  `contato` varchar(30) NOT NULL,
  `telefone` varchar(18) DEFAULT NULL,
  `celular` varchar(18) DEFAULT NULL,
  `status` enum('A','C') DEFAULT 'A',
  PRIMARY KEY (`cod_convenio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Extraindo dados da tabela `tb_convenio`
--

INSERT INTO `tb_convenio` (`cod_convenio`, `nome_empresa`, `cnpj`, `cpf`, `outros_doc`, `endereco`, `cep`, `cidade`, `contato`, `telefone`, `celular`, `status`) VALUES
(3, 'ESQUINAO DA CARNE', '22.398.005/0001-57', '000.000.000-00', NULL, 'RUA CRUZEIRO DO SUL, NÂº 319', '69900000', 'RIO BRANCO', 'SEM CONTATO', '(68)99969-6634', NULL, 'A'),
(5, 'COMERCIAL CAMPOS', '22.534.656/0001-27', '', NULL, 'RUA URAPURU, NÂº 1162', '69900000', 'RIO BRANCO', 'SEM CONTATO', '(68)3228-9858', NULL, 'A'),
(8, 'DR. SAUDE', '26.209.408/0001-61', '', NULL, 'AV. CEARA, NÂº 1221, SL 2', '69900000', 'RIO BRANCO', 'SEM CONTATO', '(68)2102-2154', NULL, 'A'),
(9, 'OTICA MAIS', '01.050.825/000-07', '', NULL, 'AV. CEARA (GALERIA CUNHA) - SL 01', '69900000', 'RIO BRANCO', 'SEM CONTATO', '(68)99905-5166', NULL, 'A'),
(10, 'CHURRASCARIA SHEKINAH', '00.050.825/000-07', '', NULL, 'CENTRO - PRACA DA BANDEIRA', '69900000', 'RIO BRANCO', 'SEM CONTATO', '(68)99949-2060', NULL, 'A'),
(11, 'CORRENTAO MATERIAL DE CONSTRUCAO', '63.592.987/0001-54', '', NULL, 'ROD. BR 364, (RIO BRANCO - PORTO VELHO)', '69900000', 'RIO BRANCO', 'SEM CONTATO', '(68)99985-1232', NULL, 'A'),
(12, 'OTICA COPACABANA', '17.605.316/001-00', '', NULL, 'AVENIDA GETULIO VARGAS, NÂº 1237', '69900000', 'RIO BRANCO', 'SIDNEY', '(68)99987-1628', NULL, 'A'),
(14, 'DR. ANDRE LUIZ MAIA', '', '', 'CRO 318', 'AV. GETULIO VARGAS, N 1939', '68.900-000', 'RIO BRANCO', 'DR. ANDRE', '(68) 3223-9968', NULL, 'A'),
(15, 'ELEONICE PINHEIRO', '', '', 'CRM 679/AC', 'RUA GOLDWASSEN SANTOS, N 61, BAIRRO BOQUES', '69.900-000', 'RIO BRANCO', 'ELEONICE PINHEIRO', '(68) 3223-6516', NULL, 'A'),
(16, 'ANA PAULA B. PESSOA PEDIATRIA NEFRO', '', '', 'CRM 783/AC', 'RUA GOLDWASSEN SANTOS, N 61, BAIRRO BOQUES', '69.900-000', 'RIO BRANCO', 'ANA PAULA', '(68) 3223-6516', NULL, 'A'),
(17, 'DRA. VIVIANE DA SILVA FREITAS', '', '', 'CRM/AC 870', 'RUA 19 DE NOVEMBRO, N 64, BAIRRO BOSQUE', '69.900-614', 'RIO BRANCO', 'DRA VIVIANE', '(68) 3222-8948', '(68) 99991-3686', 'A'),
(18, 'Dra. JAQUELINE DURCO PACO OFTAM', '', '', 'CRO 464/AC', 'RUA ALVORADA, N 526, BAIRRO BOSQUE', '69.900-000', 'RIO BRANCO', 'JAQUELINE', '(68) 3223-6697', '(68) 3223-9569', 'A'),
(19, 'MEDPREV RIO BRANCO ACRE', '19.642.881/0001-70', '', '', 'AV. EPAMINONDAS JACOMO, N 2.792, BAIRRO CENTRO', '69.900-056', 'RIO BRANCO', 'MICHEL BATISTA', '(00) 0000-0000', NULL, 'A'),
(20, 'RODRIGO RODRIGUES MARIANO', '', '632.542.391-72', 'CRM/AC 853', 'AV. GETULIO VARGAS, N 1.227, BAIRRO BOSQUE', '69.900-000', 'RIO BRANCO', 'RODRIGO RODRIGUES', '(68) 3223-4798', NULL, 'A'),
(21, 'ELOINA PAULA DE MELLO', '15.412.285/0001-45', '663.642.057-04', 'CRM 357', 'RUA ALVORADA, N 152, BAIRRO BOSQUE', '69.900-000', 'RIO BRANCO', 'ELOINA PAULA', '(68) 3223-2985', NULL, 'A'),
(22, 'JAKSON ROBERTO RAMOS DA SILVA', '18.412.451/0001-00', '', 'CRM/AC 372', 'RUA ALVORADA, N 806, ALTOS DO HEMOCARDIO H. SANTA JULIANA', '69.900-000', 'RIO BRANCO', 'JAKSON ROBERTO', '(68) 3224-3891', '(68) 99956-2799', 'A'),
(23, 'CLAUDIANA C. L. VIEIRA', '', '', 'CRM 1379', 'RUA HUGO CARNEIRO, N 234, BAIRRO BOSQUE', '69.900-000', 'RIO BRANCO', 'JANILSON LOPES', '(68) 3223-4087', NULL, 'A'),
(24, 'GLAUCIA HAGE', '', '', 'CRM 1561', 'RUA HUGO CARNEIRO, N 234, BAIRRO BOSQUE', '69.900-000', 'RIO BRANCO', 'JANILSON LOPES', '(68) 3223-4087', NULL, 'A'),
(25, 'JANILSON LEITE', '', '', 'CRM 1444', 'RUA HUGO CARNEIRO, N 234, BAIRRO BOSQUE', '69.900-000', 'RIO BRANCO', 'JANILSON LOPES', '(68) 3223-4087', NULL, 'A'),
(26, 'MARIA SANTIAGO', '', '', 'CRM 1502', 'RUA HUGO CARNEIRO, N 234, BAIRRO BOSQUE', '69.900-000', 'RIO BRANCO', 'JANILSON LOPES', '(68) 3223-4087', NULL, 'A'),
(27, 'MARCOS PARENTE', '', '', 'CRM 1482', 'RUA HUGO CARNEIRO, N 234, BAIRRO BOSQUE', '69.900-000', 'RIO BRANCO', 'JANILSON LOPES', '(68) 3223-4087', NULL, 'A'),
(28, 'ANTONIO LISBOA C. BRAGA', '', '091.334.883-04', 'CRM/AC 205', 'RUA MANOEL CESARIO, N 564, BAIRRO JOSE AUGUSTO', '69.900-000', 'RIO BRANCO', 'ANTONIO LISBOA', '(00) 0000-0000', '(68) 99983-6440', 'A'),
(29, 'JOSE ROBERTO RICARTE DE O', '', '885.944.594-91', 'CRM/AC 627', 'RUA HUGO CARNEIRO, N 486, BAIRRO BOSQUE', '69.900-000', 'RIO BRANCO', 'JOSE ROBERTO', '(68) 3223-1297', NULL, 'A'),
(30, 'DEISE MARA BERTOLINO', '', '332.611.548-29', 'CRM 3463 7 REGIAO', 'RUA ALVORADA, N 806, BAIRRO BOSQUE,  ALTOS DO HEMOCARDIO H. ', '69.900-000', 'RIO BRANCO', 'DEISE MARA', '(68) 3224-3891', NULL, 'A'),
(31, 'DAM R. MARIANO', '', '', 'CRM/AC 724', 'RUA ISAURA PARENTE, N 2892, BAIRRO ESTACAO EXPERIMENTAL', '69.900-000', 'RIO BRANCO', 'DAM RODRIGUES', '(68) 3226-6841', NULL, 'A'),
(32, 'Papelaria Arnaldo', '04.517.439/0001-47', '', '', 'Rua Rui Barbosa', '69.900-000', 'RIO BRANCO', 'Arnaldo', '(68) 3224-3077', NULL, 'A'),
(33, 'ACRE JET', '06.082.078/0001-89', '', '', 'AV. CEARA 1546 , BAIRRO CENTRO', '69.900-000', 'RIO BRANCO', 'NETO', '(68) 9996-3881', NULL, 'A'),
(34, 'DROGARIA DOSE CERTA', '', '', '', 'RUA RIO DE JANEIRO -FLORESTA', '69.900-000', 'RIO BRANCO', 'LARA', '(68) 9966-2122', NULL, 'A'),
(35, 'G.V. LINS', '12.974.699/0001-65', '', '', 'AV. BRASIL-49  (TERMINAL URBANO)', '69.900-000', 'RIO BRANCO', 'GIL', '(68) 3223-5864', NULL, 'A'),
(36, 'RESTAURANTE CASA DO CUPIM', '', '', 'RG 236050', 'AV.GETULIO VARGAS -1241', '69.900-000', 'RIO BRANCO', 'MARIA IOLANDA', '(68) 9922-8237', NULL, 'A'),
(37, 'FATIMA MODAS', '', '', '', 'RUA EPAMINONDAS JACOMEN', '69.900-000', 'RIO BRANCO', 'MARIA DE FATIMA', '(68) 3026-2921', NULL, 'A'),
(38, 'POSTO BONZAO LTDA', '14.315.998/0001-28', '', '', 'RUA DOM BOSCO, NÂº 257, BAIRRO BOSQUE', '69.900-000', 'RIO BRANCO', 'FRANCISCA', '(68) 3224-1030', NULL, 'A'),
(39, 'CAMPOS MATERIAL DE CONSTRUCAO', '26.510.435/0001-70', '', '', 'RODOVIA AC 40 NÂº 4230, SALA A', '69.900-000', 'RIO BRANCO', 'MAYDOSN', '(68) 9993-2695', NULL, 'A'),
(40, 'CAMPOS MATERIAL DE CONSTRUÃ‡AO', '', '', '', 'RODOVIA AC 40 KM 07, 3084- VILA ACRE', '00.000-000', 'RIO BRANCO', 'MARICELIO', '(68) 9932-6957', NULL, 'A'),
(41, 'PATRICK', '01.641.316/0001-25', '', '', 'RUA MARECHAL DEODPRP, NÂº 672, BAIRRO CENTRO', '69.900-000', 'RIO BRANCO', 'PATRICK D. LEAO', '(68) 3223-8840', NULL, 'A'),
(42, 'OTICA FLORAL', '02.424.382/0001-41', '', '', 'AV. NAÃ‡Ã•ES UNIDAS, NÂº 2726, BAIRRO ESTAÃ‡ÃƒO EXPERIMENTAL', '69.900-000', 'RIO BRANCO', 'VITO/ANA', '(68) 3226-2665', NULL, 'A'),
(43, 'CASA BELA PORTAS E VIDROS', '12.322.317/0001-23', '', '', 'ESTRADA DA FLORESTA, NÂº 703, SALA 1', '69.900-000', 'RIO BRANCO', 'SEU JOAQUIM', '(68) 3225-2273', NULL, 'A'),
(44, 'GERASTUR', '19.533.891/0001-70', '', '', 'AV. CEARÃ, NÂº 1195', '69.900-000', 'RIO BRANCO', 'THIAGO/JERA', '(68) 3227-2875', NULL, 'A'),
(45, 'LABORATORIO BIOMED', '', '', '', 'RUA CORONEL JOSE GALDINO', '69.900-000', 'RIO BRANCO', 'SEM CONTATO', '(68) 9999-9999', NULL, 'A'),
(46, 'VERDE VIDA', '10.231.523/0001-00', '', '', 'RUA JOSE GALDINO, N 626, BAIRRO BOSQUE', '69.900-000', 'RIO BRANCO', 'ALEXANDRE', '(68) 3224-7731', NULL, 'A'),
(47, 'AMAZON AR CONDICIONADO', '05.580.940/0001-09', '', '', 'AV.GETULIO VARGAS -1858', '69.900-000', 'RIO BRANCO', 'SEM CONTATO', '(99) 9999-9999', NULL, 'A'),
(48, 'MADEIREIRA CONSTRUINDO', '07.468.492/0001-93', '', '', 'RUA-WALDOMIRO LOPES -1278', '69.900-000', 'RIO BRANCO', 'SEM CONTATO', '(68) 3228-4505', NULL, 'A'),
(49, 'CANTINHO PIZZARIA E CHURRASCARIA', '09.577.695/0001-43', '', '', 'AV. NACOES UNIDAS, NÂº 1348', '69.900-000', 'RIO BRANCO', 'SEM CONTATO', '(68) 3227-2231', NULL, 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cred_cheque`
--

CREATE TABLE IF NOT EXISTS `tb_cred_cheque` (
  `id_cred_cheque` int(11) NOT NULL AUTO_INCREMENT,
  `cod_socio` int(11) NOT NULL,
  `cod_convenio` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `data_cad` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `mes_desc` date NOT NULL,
  `qtd_parcelas` int(11) DEFAULT NULL,
  `parcela` int(10) DEFAULT NULL,
  `valor_parc` decimal(10,2) DEFAULT NULL,
  `situacao` enum('E','C') DEFAULT NULL,
  PRIMARY KEY (`id_cred_cheque`),
  KEY `fk_tb_cred_cheque_tb_convenio1_idx` (`cod_convenio`),
  KEY `fk_tb_cred_cheque_tb_socio1_idx` (`cod_socio`),
  KEY `fk_tb_cred_cheque_tb_usuario1_idx` (`cod_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=221 ;

--
-- Extraindo dados da tabela `tb_cred_cheque`
--

INSERT INTO `tb_cred_cheque` (`id_cred_cheque`, `cod_socio`, `cod_convenio`, `cod_usuario`, `data_cad`, `valor`, `mes_desc`, `qtd_parcelas`, `parcela`, `valor_parc`, `situacao`) VALUES
(5, 6, 5, 1, '2017-03-17', '120.00', '2017-03-31', 1, 1, '120.00', NULL),
(6, 3, 5, 1, '2017-03-17', '180.00', '2017-03-31', 1, 1, '180.00', NULL),
(7, 3, 5, 1, '2017-03-17', '200.00', '2017-03-31', 1, 1, '200.00', NULL),
(8, 3, 5, 1, '2017-03-17', '180.00', '2017-03-31', 1, 1, '180.00', NULL),
(9, 3, 5, 1, '2017-03-17', '200.00', '2017-03-31', 1, 1, '200.00', NULL),
(10, 6, 5, 1, '2017-03-17', '120.00', '2017-03-31', 1, 1, '120.00', NULL),
(11, 6, 5, 1, '2017-03-17', '1.00', '2017-03-31', 1, 1, '1.00', NULL),
(12, 4, 20, 2, '2017-03-17', '150.00', '2017-03-31', 1, 1, '150.00', NULL),
(13, 6, 17, 2, '2017-03-17', '1.00', '2017-03-31', 1, 1, '1.00', NULL),
(14, 1, 22, 2, '2017-03-17', '1.00', '2017-03-31', 1, 1, '1.00', NULL),
(15, 6, 5, 2, '2017-03-17', '120.00', '2017-03-31', 1, 1, '120.00', NULL),
(16, 6, 32, 2, '2017-03-17', '1.00', '2017-03-31', 1, 1, '1.00', NULL),
(17, 6, 3, 2, '2017-03-17', '300.00', '2017-03-31', 1, 1, '300.00', NULL),
(18, 2, 12, 1, '2017-03-20', '700.00', '2017-04-30', 5, 1, '140.00', NULL),
(19, 2, 12, 1, '2017-03-20', '700.00', '2017-05-30', 5, 2, '140.00', NULL),
(20, 2, 12, 1, '2017-03-20', '700.00', '2017-06-30', 5, 3, '140.00', NULL),
(21, 2, 12, 1, '2017-03-20', '700.00', '2017-07-30', 5, 4, '140.00', NULL),
(22, 2, 12, 1, '2017-03-20', '700.00', '2017-08-30', 5, 5, '140.00', NULL),
(23, 1, 9, 1, '2017-03-20', '10.00', '2017-03-31', 1, 1, '10.00', NULL),
(24, 1, 10, 1, '2017-03-20', '10.00', '2017-04-30', 1, 1, '10.00', NULL),
(25, 6, 5, 1, '2017-03-20', '120.00', '2017-03-31', 1, 1, '120.00', NULL),
(26, 6, 5, 1, '2017-03-20', '120.00', '2017-03-31', 1, 1, '120.00', NULL),
(27, 3, 5, 1, '2017-03-20', '200.00', '2017-03-31', 1, 1, '200.00', NULL),
(28, 3, 5, 1, '2017-03-20', '180.00', '2017-03-31', 1, 1, '180.00', NULL),
(29, 6, 33, 1, '2017-03-20', '1.00', '2017-03-31', 1, 1, '1.00', NULL),
(30, 9, 3, 1, '2017-03-21', '300.00', '2017-05-02', 1, 1, '300.00', NULL),
(31, 6, 34, 2, '2017-03-22', '1.00', '2017-03-31', 1, 1, '1.00', NULL),
(32, 6, 34, 2, '2017-03-22', '1.00', '2017-03-31', 1, 1, '1.00', NULL),
(33, 6, 34, 2, '2017-03-22', '1.00', '2017-03-31', 1, 1, '1.00', NULL),
(34, 6, 34, 2, '2017-03-22', '1.00', '2017-03-31', 1, 1, '1.00', NULL),
(35, 10, 5, 2, '2017-03-23', '100.00', '2017-03-31', 1, 1, '100.00', NULL),
(36, 3, 34, 2, '2017-03-23', '60.00', '2017-03-31', 1, 1, '60.00', NULL),
(37, 1, 5, 1, '2017-03-23', '100.00', '2017-03-31', 1, 1, '100.00', NULL),
(38, 6, 36, 2, '2017-03-24', '1.00', '2017-03-31', 1, 1, '1.00', NULL),
(39, 6, 35, 2, '2017-03-24', '1.00', '2017-03-31', 1, 1, '1.00', NULL),
(40, 9, 5, 2, '2017-03-24', '100.00', '2017-03-31', 1, 1, '100.00', NULL),
(41, 9, 5, 2, '2017-03-24', '150.00', '2017-03-31', 1, 1, '150.00', NULL),
(42, 9, 5, 2, '2017-03-24', '50.00', '2017-03-31', 1, 1, '50.00', NULL),
(43, 11, 5, 2, '2017-04-03', '250.00', '2017-04-28', 1, 1, '250.00', NULL),
(44, 10, 5, 2, '2017-04-03', '100.00', '2017-04-28', 1, 1, '100.00', NULL),
(45, 6, 37, 2, '2017-04-05', '1.00', '2017-04-28', 1, 1, '1.00', NULL),
(46, 13, 5, 2, '2017-04-05', '1.00', '2017-04-30', 1, 1, '1.00', NULL),
(48, 6, 33, 2, '2017-04-05', '1.00', '2017-04-30', 1, 1, '1.00', NULL),
(49, 3, 5, 2, '2017-04-05', '200.00', '2017-04-30', 1, 1, '200.00', NULL),
(50, 9, 3, 2, '2017-04-05', '300.00', '2017-04-30', 1, 1, '300.00', NULL),
(51, 10, 33, 1, '2017-04-05', '503.00', '2017-04-30', 5, 1, '100.60', NULL),
(52, 10, 33, 1, '2017-04-05', '503.00', '2017-05-30', 5, 2, '100.60', NULL),
(53, 10, 33, 1, '2017-04-05', '503.00', '2017-06-30', 5, 3, '100.60', NULL),
(54, 10, 33, 1, '2017-04-05', '503.00', '2017-07-30', 5, 4, '100.60', NULL),
(55, 10, 33, 1, '2017-04-05', '503.00', '2017-08-30', 5, 5, '100.60', NULL),
(56, 14, 12, 2, '2017-04-06', '133.33', '2017-04-28', 6, 1, '22.22', NULL),
(57, 14, 12, 2, '2017-04-06', '133.33', '2017-05-28', 6, 2, '22.22', NULL),
(58, 14, 12, 2, '2017-04-06', '133.33', '2017-06-28', 6, 3, '22.22', NULL),
(59, 14, 12, 2, '2017-04-06', '133.33', '2017-07-28', 6, 4, '22.22', NULL),
(60, 14, 12, 2, '2017-04-06', '133.33', '2017-08-28', 6, 5, '22.22', NULL),
(61, 14, 12, 2, '2017-04-06', '133.33', '2017-09-28', 6, 6, '22.22', NULL),
(62, 3, 5, 1, '2017-04-06', '200.00', '2017-04-30', 1, 1, '200.00', NULL),
(63, 6, 5, 1, '2017-04-06', '150.00', '2017-04-30', 1, 1, '150.00', NULL),
(64, 6, 33, 1, '2017-04-07', '543.50', '2017-04-30', 3, 1, '181.17', NULL),
(65, 6, 33, 1, '2017-04-07', '543.50', '2017-05-30', 3, 2, '181.17', NULL),
(66, 6, 33, 1, '2017-04-07', '543.50', '2017-06-30', 3, 3, '181.17', NULL),
(67, 6, 32, 1, '2017-04-07', '178.39', '2017-04-30', 2, 1, '89.20', NULL),
(68, 6, 32, 1, '2017-04-07', '178.39', '2017-05-30', 2, 2, '89.20', NULL),
(69, 3, 5, 2, '2017-04-10', '588.00', '2017-04-28', 1, 1, '588.00', NULL),
(70, 11, 5, 2, '2017-04-11', '150.00', '2017-04-28', 1, 1, '150.00', NULL),
(71, 6, 5, 2, '2017-04-11', '250.00', '2017-04-28', 1, 1, '250.00', NULL),
(73, 9, 3, 2, '2017-04-12', '300.00', '2017-04-28', 1, 1, '300.00', NULL),
(74, 6, 36, 1, '2017-04-18', '20.00', '2017-04-30', 1, 1, '20.00', NULL),
(75, 6, 3, 1, '2017-04-18', '300.00', '2017-04-30', 1, 1, '300.00', NULL),
(76, 6, 3, 1, '2017-04-18', '330.00', '2017-04-30', 1, 1, '330.00', NULL),
(77, 9, 3, 1, '2017-04-18', '120.00', '2017-04-30', 1, 1, '120.00', NULL),
(78, 6, 36, 2, '2017-04-19', '20.00', '2017-04-28', 1, 1, '20.00', NULL),
(79, 15, 5, 2, '2017-04-20', '200.00', '2017-04-28', 1, 1, '200.00', NULL),
(80, 15, 3, 2, '2017-04-20', '40.00', '2017-04-28', 1, 1, '40.00', NULL),
(81, 6, 36, 2, '2017-04-20', '30.00', '2017-04-28', 1, 1, '30.00', NULL),
(82, 3, 5, 2, '2017-04-20', '100.00', '2017-04-28', 1, 1, '100.00', NULL),
(83, 11, 3, 2, '2017-04-24', '150.00', '2017-04-30', 1, 1, '150.00', NULL),
(84, 3, 3, 1, '2017-04-24', '120.00', '2017-04-30', 1, 1, '120.00', NULL),
(85, 9, 3, 2, '2017-04-25', '300.00', '2017-04-28', 1, 1, '300.00', NULL),
(86, 6, 36, 2, '2017-04-25', '10.00', '2017-04-28', 1, 1, '10.00', NULL),
(87, 3, 36, 1, '2017-04-28', '50.00', '2017-04-30', 1, 1, '50.00', NULL),
(88, 1, 12, 1, '2017-05-02', '650.00', '2017-05-31', 4, 1, '162.50', NULL),
(89, 1, 12, 1, '2017-05-02', '650.00', '0000-00-00', 4, 2, '162.50', NULL),
(90, 1, 12, 1, '2017-05-02', '650.00', '2017-07-31', 4, 3, '162.50', NULL),
(91, 1, 12, 1, '2017-05-02', '650.00', '2017-08-31', 4, 4, '162.50', NULL),
(92, 6, 38, 1, '2017-05-05', '1.00', '2017-05-31', 1, 1, '1.00', NULL),
(93, 6, 39, 1, '2017-05-05', '1.00', '2017-05-31', 1, 1, '1.00', NULL),
(94, 9, 3, 1, '2017-05-05', '300.00', '2017-05-31', 1, 1, '300.00', NULL),
(95, 16, 8, 1, '2017-05-09', '75.00', '2017-05-31', 1, 1, '75.00', NULL),
(96, 1, 5, 1, '2017-05-12', '200.00', '2017-05-31', 1, 1, '200.00', NULL),
(97, 1, 40, 2, '2017-05-17', '950.00', '2017-05-31', 6, 1, '158.33', NULL),
(98, 1, 40, 2, '2017-05-17', '950.00', '0000-00-00', 6, 2, '158.33', NULL),
(99, 1, 40, 2, '2017-05-17', '950.00', '2017-07-31', 6, 3, '158.33', NULL),
(100, 1, 40, 2, '2017-05-17', '950.00', '2017-08-31', 6, 4, '158.33', NULL),
(101, 1, 40, 2, '2017-05-17', '950.00', '0000-00-00', 6, 5, '158.33', NULL),
(102, 1, 40, 2, '2017-05-17', '950.00', '2017-10-31', 6, 6, '158.33', NULL),
(103, 6, 42, 1, '2017-05-17', '1.00', '2017-05-31', 1, 1, '1.00', NULL),
(104, 6, 41, 1, '2017-05-17', '1.00', '2017-05-31', 1, 1, '1.00', NULL),
(105, 6, 41, 1, '2017-05-17', '1.00', '2017-05-31', 1, 1, '1.00', NULL),
(106, 6, 42, 1, '2017-05-17', '1.00', '2017-05-31', 1, 1, '1.00', NULL),
(107, 6, 36, 2, '2017-05-19', '20.00', '2017-05-31', 1, 1, '20.00', NULL),
(108, 9, 38, 1, '2017-05-19', '230.00', '2017-05-31', 1, 1, '230.00', NULL),
(109, 9, 41, 1, '2017-05-22', '260.00', '2017-05-31', 4, 1, '65.00', NULL),
(110, 9, 41, 1, '2017-05-22', '260.00', '0000-00-00', 4, 2, '65.00', NULL),
(111, 9, 41, 1, '2017-05-22', '260.00', '2017-07-31', 4, 3, '65.00', NULL),
(112, 9, 41, 1, '2017-05-22', '260.00', '2017-08-31', 4, 4, '65.00', NULL),
(113, 3, 5, 2, '2017-05-23', '200.00', '2017-05-31', 1, 1, '200.00', NULL),
(114, 9, 8, 1, '2017-05-24', '75.00', '2017-05-31', 1, 1, '75.00', NULL),
(115, 15, 5, 1, '2017-05-25', '200.00', '2017-05-31', 1, 1, '200.00', NULL),
(116, 15, 3, 1, '2017-05-25', '40.00', '2017-05-31', 1, 1, '40.00', NULL),
(117, 6, 43, 1, '2017-05-25', '1.00', '2017-05-31', 1, 1, '1.00', NULL),
(118, 6, 44, 1, '2017-05-25', '1.00', '2017-05-31', 1, 1, '1.00', NULL),
(119, 3, 38, 1, '2017-05-25', '140.00', '2017-05-31', 1, 1, '140.00', NULL),
(120, 3, 38, 1, '2017-05-25', '140.00', '2017-05-31', 1, 1, '140.00', NULL),
(121, 9, 38, 1, '2017-05-25', '220.00', '2017-05-31', 1, 1, '220.00', NULL),
(122, 6, 45, 1, '2017-05-25', '1.00', '2017-05-01', 1, 1, '1.00', NULL),
(123, 6, 43, 1, '2017-05-26', '880.00', '2017-05-31', 4, 1, '220.00', NULL),
(124, 6, 43, 1, '2017-05-26', '880.00', '0000-00-00', 4, 2, '220.00', NULL),
(125, 6, 43, 1, '2017-05-26', '880.00', '2017-07-31', 4, 3, '220.00', NULL),
(126, 6, 43, 1, '2017-05-26', '880.00', '2017-08-31', 4, 4, '220.00', NULL),
(127, 3, 5, 1, '2017-05-26', '100.00', '2017-05-31', 1, 1, '100.00', NULL),
(128, 17, 38, 2, '2017-05-30', '81.00', '2017-05-31', 1, 1, '81.00', NULL),
(129, 11, 5, 1, '2017-05-30', '250.00', '2017-05-31', 1, 1, '250.00', NULL),
(130, 11, 38, 1, '2017-05-30', '65.00', '2017-05-31', 1, 1, '65.00', NULL),
(131, 11, 38, 1, '2017-05-30', '35.00', '2017-05-31', 1, 1, '35.00', NULL),
(132, 6, 33, 1, '2017-05-30', '1.00', '2017-05-31', 1, 1, '1.00', NULL),
(133, 6, 5, 1, '2017-05-30', '200.00', '2017-05-31', 1, 1, '200.00', NULL),
(134, 9, 38, 1, '2017-05-30', '100.00', '2017-05-31', 1, 1, '100.00', NULL),
(135, 9, 38, 1, '2017-05-30', '100.00', '2017-05-31', 1, 1, '100.00', NULL),
(136, 6, 46, 1, '2017-05-31', '1.00', '2017-05-31', 1, 1, '1.00', NULL),
(138, 1, 39, 1, '2017-06-01', '2.00', '2017-06-30', 2, 1, '1.00', NULL),
(139, 1, 39, 1, '2017-06-01', '2.00', '2017-07-30', 2, 2, '1.00', NULL),
(140, 6, 39, 1, '2017-06-01', '2.00', '2017-06-30', 2, 1, '1.00', NULL),
(141, 6, 39, 1, '2017-06-01', '2.00', '2017-07-30', 2, 2, '1.00', NULL),
(142, 1, 39, 1, '2017-06-01', '2.00', '2017-06-30', 2, 1, '1.00', NULL),
(143, 1, 39, 1, '2017-06-01', '2.00', '2017-07-30', 2, 2, '1.00', NULL),
(144, 19, 39, 1, '2017-06-01', '2.00', '2017-06-30', 2, 1, '1.00', NULL),
(145, 19, 39, 1, '2017-06-01', '2.00', '2017-07-30', 2, 2, '1.00', NULL),
(154, 19, 39, 1, '2017-06-01', '1900.00', '2017-06-30', 6, 1, '316.67', NULL),
(155, 19, 39, 1, '2017-06-01', '1900.00', '2017-07-30', 6, 2, '316.67', NULL),
(156, 19, 39, 1, '2017-06-01', '1900.00', '2017-08-30', 6, 3, '316.67', NULL),
(157, 19, 39, 1, '2017-06-01', '1900.00', '2017-09-30', 6, 4, '316.67', NULL),
(158, 19, 39, 1, '2017-06-01', '1900.00', '2017-10-30', 6, 5, '316.67', NULL),
(159, 19, 39, 1, '2017-06-01', '1900.00', '2017-11-30', 6, 6, '316.67', NULL),
(172, 6, 16, 1, '2017-06-01', '1.00', '2017-06-30', 1, 1, '1.00', NULL),
(173, 16, 45, 2, '2017-06-01', '22.62', '2017-06-30', 1, 1, '22.62', NULL),
(174, 6, 39, 2, '2017-06-06', '450.00', '2017-06-30', 3, 1, '150.00', NULL),
(175, 6, 39, 2, '2017-06-06', '450.00', '2017-07-30', 3, 2, '150.00', NULL),
(176, 6, 39, 2, '2017-06-06', '450.00', '2017-08-30', 3, 3, '150.00', NULL),
(177, 15, 38, 1, '2017-06-07', '20.00', '2017-06-30', 1, 1, '20.00', NULL),
(178, 15, 3, 1, '2017-06-07', '70.00', '2017-06-30', 1, 1, '70.00', NULL),
(179, 6, 47, 2, '2017-06-07', '1.00', '2017-06-30', 1, 1, '1.00', NULL),
(180, 6, 48, 2, '2017-06-07', '1.00', '2017-06-30', 1, 1, '1.00', NULL),
(182, 19, 38, 1, '2017-06-09', '48.00', '2017-06-30', 1, 1, '48.00', NULL),
(183, 9, 38, 1, '2017-06-09', '100.00', '2017-06-30', 1, 1, '100.00', NULL),
(184, 9, 38, 1, '2017-06-09', '100.00', '2017-06-30', 1, 1, '100.00', NULL),
(185, 9, 38, 1, '2017-06-09', '100.00', '2017-06-30', 1, 1, '100.00', NULL),
(186, 20, 8, 1, '2017-06-13', '75.00', '2017-06-30', 1, 1, '75.00', NULL),
(187, 19, 33, 1, '2017-06-16', '1753.30', '2017-06-30', 6, 1, '292.22', NULL),
(188, 19, 33, 1, '2017-06-16', '1753.30', '2017-07-30', 6, 2, '292.22', NULL),
(189, 19, 33, 1, '2017-06-16', '1753.30', '2017-08-30', 6, 3, '292.22', NULL),
(190, 19, 33, 1, '2017-06-16', '1753.30', '2017-09-30', 6, 4, '292.22', NULL),
(191, 19, 33, 1, '2017-06-16', '1753.30', '2017-10-30', 6, 5, '292.22', NULL),
(192, 19, 33, 1, '2017-06-16', '1753.30', '2017-11-30', 6, 6, '292.22', NULL),
(193, 3, 38, 1, '2017-06-20', '130.00', '2017-06-30', 1, 1, '130.00', NULL),
(194, 3, 38, 1, '2017-06-20', '130.00', '2017-06-30', 1, 1, '130.00', NULL),
(195, 6, 38, 1, '2017-06-20', '129.00', '2017-06-30', 1, 1, '129.00', NULL),
(196, 6, 49, 1, '2017-06-20', '1.00', '2017-06-30', 1, 1, '1.00', NULL),
(197, 3, 12, 1, '2017-06-22', '700.00', '2017-06-30', 5, 1, '140.00', NULL),
(198, 3, 12, 1, '2017-06-22', '700.00', '2017-07-30', 5, 2, '140.00', NULL),
(199, 3, 12, 1, '2017-06-22', '700.00', '2017-08-30', 5, 3, '140.00', NULL),
(200, 3, 12, 1, '2017-06-22', '700.00', '2017-09-30', 5, 4, '140.00', NULL),
(201, 3, 12, 1, '2017-06-22', '700.00', '2017-10-30', 5, 5, '140.00', NULL),
(204, 14, 45, 1, '2017-06-23', '240.83', '2017-06-30', 1, 1, '240.83', NULL),
(205, 19, 8, 2, '2017-06-27', '75.00', '2017-06-30', 1, 1, '75.00', NULL),
(206, 1, 33, 1, '2017-06-29', '1.00', '2017-06-26', 1, 1, '1.00', NULL),
(207, 14, 45, 1, '2017-06-30', '128.68', '2017-06-30', 1, 1, '128.68', NULL),
(208, 21, 43, 2, '2017-07-04', '1468.00', '2017-07-31', 6, 1, '244.67', NULL),
(209, 21, 43, 2, '2017-07-04', '1468.00', '2017-08-31', 6, 2, '244.67', NULL),
(210, 21, 43, 2, '2017-07-04', '1468.00', '0000-00-00', 6, 3, '244.67', NULL),
(211, 21, 43, 2, '2017-07-04', '1468.00', '2017-10-31', 6, 4, '244.67', NULL),
(212, 21, 43, 2, '2017-07-04', '1468.00', '0000-00-00', 6, 5, '244.67', NULL),
(213, 21, 43, 2, '2017-07-04', '1468.00', '2017-12-31', 6, 6, '244.67', NULL),
(214, 1, 47, 1, '2017-08-04', '0.10', '2017-08-31', 1, 1, '0.10', NULL),
(215, 3, 9, 2, '2017-08-31', '1078.00', '2017-08-31', 6, 1, '179.67', NULL),
(216, 3, 9, 2, '2017-08-31', '1078.00', '0000-00-00', 6, 2, '179.67', NULL),
(217, 3, 9, 2, '2017-08-31', '1078.00', '2017-10-31', 6, 3, '179.67', NULL),
(218, 3, 9, 2, '2017-08-31', '1078.00', '0000-00-00', 6, 4, '179.67', NULL),
(219, 3, 9, 2, '2017-08-31', '1078.00', '2017-12-31', 6, 5, '179.67', NULL),
(220, 3, 9, 2, '2017-08-31', '1078.00', '0000-00-00', 6, 6, '179.67', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_estado_civil`
--

CREATE TABLE IF NOT EXISTS `tb_estado_civil` (
  `cod_estad_civil` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cod_estad_civil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_socio`
--

CREATE TABLE IF NOT EXISTS `tb_socio` (
  `cod_socio` int(11) NOT NULL AUTO_INCREMENT,
  `cod_matri` int(11) NOT NULL,
  `orgao_contrat` varchar(45) DEFAULT NULL,
  `nome` varchar(80) NOT NULL,
  `sexo` enum('F','M') DEFAULT NULL,
  `data_nasc` date NOT NULL,
  `naturalidade` varchar(45) DEFAULT NULL,
  `nacionalidade` varchar(45) DEFAULT NULL,
  `rg` varchar(20) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `endereco` varchar(60) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cep` varchar(12) DEFAULT NULL,
  `cidade` varchar(20) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `telefone` varchar(18) DEFAULT NULL,
  `celular` varchar(18) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `lotacao` varchar(60) DEFAULT NULL,
  `cargo` varchar(60) DEFAULT NULL,
  `limite_cred` decimal(10,2) DEFAULT NULL,
  `cred_utilizado` decimal(10,2) DEFAULT '0.00',
  `cred_saldo` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`cod_socio`),
  UNIQUE KEY `cod_matri_UNIQUE` (`cod_matri`),
  UNIQUE KEY `rg_UNIQUE` (`rg`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Extraindo dados da tabela `tb_socio`
--

INSERT INTO `tb_socio` (`cod_socio`, `cod_matri`, `orgao_contrat`, `nome`, `sexo`, `data_nasc`, `naturalidade`, `nacionalidade`, `rg`, `cpf`, `endereco`, `bairro`, `cep`, `cidade`, `uf`, `telefone`, `celular`, `email`, `lotacao`, `cargo`, `limite_cred`, `cred_utilizado`, `cred_saldo`) VALUES
(1, 333, 'SESACRE', 'Gerson Correia Lima Neto', 'M', '1988-04-09', 'Rio Branco', 'Brasileiro', '430720', '936.956.832-87', 'Conj Xavier Maia', 'Placas', '33333333', 'RB', 'AC', '333333333', '333333333', 'gerson.correia@hotmail.com', 'Folha', 'Estagio', '300.00', '2190.90', '-480.64'),
(2, 123, 'SGA', 'Francisca Eulalia da Silva Lima', 'F', '2017-03-01', 'Cruzeiro', 'Brasileira', '1234', '132.123.345-87', 'Conj. Xavier Maia', 'Placas', '69.903-064', 'RB', 'AC', '6832233060', '68999747214', 'francisca@hotmail.com', 'Gabinete Civil', 'Chefe', '500.00', '0.00', '360.00'),
(3, 10101, 'SESACRE', 'MANOEL DE LIMA MOURA', 'M', '2000-01-01', 'RIO BRANCO', 'BRASILEIRO', '000000', '000.000.000-00', 'AV. CEARA (GALERIA CUNHA) - SL 01', 'PLACAS', '69900000', 'RB', 'AC', '(68)99999-9999', '(68)99999-9999', 'moura.m@gmail.com', 'RADIOLOGIA', 'CHEFE', '1000.00', '4316.00', '-1857.67'),
(4, 361347, 'ATRLASAC', 'ERIKA DA COSTA VIEIRA', 'F', '1983-03-01', 'RIO BRANCO', 'BRASILEIRO', '361347', '741.530.482-91', 'RUA LIBERDADE NÂº129', 'SOBRAL', '69900000', 'RB', 'AC', '32254437', '999994334', 'erikasol@bol.com.br', 'ATRLASAC', 'SECRETARIA', '300.00', '150.00', '150.00'),
(6, 10203, 'ATRLASAC', 'ASSOCIACAO DOS TECNICOS EM RADIOLOGIA, LAB E AUXI', 'M', '2010-01-01', 'RIO BRANCO', 'BRASILEIRO', '00000', '111.111.111-11', 'AV. GETULIO VARGAS, NÂº 1158', 'BOSQUE', '69.900-000', 'RB', 'AC', '(68) 3333-3333', '(68)99999-9999', 'atrlasac@gmail.com', 'ATRLASAC', 'GERAL', '500.00', '3783.00', '-2777.70'),
(9, 10303, 'ATRLASAC', 'ELISANGELA JUCA DE MIRANDA', 'M', '1976-06-22', 'RIO BRANCO', 'BRASILEIRA', '010203', '434.111.342-91', 'RUA JOAQUIM NABUCO', 'CONJUNTO ESPERANÃ‡A', '69.900-000', 'RB', 'AC', '(68) 9999-9999', '(68)99999-9999', 'teste@gmail.com', 'ASSOCIACAO', 'CONSULTORA', '500.00', '3505.00', '-2810.00'),
(10, 274046, 'SAÃšDE', 'JOAO GONCALVES ESPINDOLA', 'M', '1974-09-08', 'BOCA DO ACRE', 'BRASILEIRO', '385742', '466.086.992-04', 'RESIDENCIAL ROSA LINDA NÂº 21 QUADRA 2 CASA 21', 'BELO JARDIM', '69.900-000', 'RB', 'AC', '(68) 9950-0506', '(68)99939-0812', 'JOAAO@HOTMAIL.COM', 'ACOLHIMENTO CID DO POVO', 'AGENTE ADMINISTRATIVO', '200.00', '703.00', '-100.60'),
(11, 741791, 'SEPLAN', 'FRANCISCO DE LIMA MOURA', 'F', '1948-04-04', 'TARAUACA', 'BRASILEIRO', '80499 SSP/AC', '030.556.982-15', 'RUA MARIA DAS DORES NÂº 675 COJ. ESPERANÃ‡A Q. 25 CA.18', 'FLORESTA', '69.900-000', 'RB', 'AC', '', '(68)99247-0913', 'SEMVALIDADE@HOTMAIL.COM.BR', 'TRANSPORTE', 'MOT. OFICIAL', '300.00', '900.00', '-600.00'),
(12, 3226468, 'FUNDHACRE', 'MARIA RUTE NOGUEIRA DE OLIVEIRA', 'F', '1972-11-29', 'CRUZEIRO DO SUL', 'BRASILEIRA', '239396', '434.080.442-87', 'GDEÃ•ES  NÂº95', 'SANTA HELENA', '69.900-000', 'RB', 'AC', '', '(68)99992-8090', 'SEMVALIDADE@HOTMAIL.COM.BR', 'CAC/ FUNDHACRE', 'COPEIRA', '200.00', '0.00', '200.00'),
(13, 93319, '-', 'OLIRIA UMBELINA OLIVEIRA', 'F', '1946-08-25', 'RIO BRANCO', 'BRASILEIRA', '18876', '078.604.392-04', 'RUA EDMUNDO PINTO, N 81, Q 4, CS 16', 'GUIOMARD SANTOS I', '69.900-000', 'RB', 'AC', '(68) 9908-8775', '(68)99208-2324', 'sememail@hotmail.com', '-', 'AGENTE ADMINISTRATIVO', '800.00', '1.00', '799.00'),
(14, 9214895, 'SEC DE SAUDE', 'JUCELINO DA SILVA MELO', 'M', '1978-06-30', 'RIO BRANCO', 'BRASILEIRO', '0295269', '625.034.212-53', 'RUA AZALÃ‰IAS NÂº105', 'JARDIM PRIMAVERA', '69.900-000', 'RB', 'AC', '', '(68)99961-3612', 'demolaygyn@gmail.com', 'HUERB', 'TEC RADIOLOGIA', '5.00', '909.02', '-791.22'),
(15, 0, 'AUTONOMO', 'KELLY CRISTINA SALDANHA MOURA', 'F', '1981-10-20', 'RIO BRANCO', 'BRASILEIRA', '0332242', '652.552.672-87', 'RUA MARIA DAS DORES NÂº 675', 'ESPERANÃ‡A', '69.915-154', 'RB', 'AC', '', '(68)99954-2158', 'KELYDEMOURA31@GMAIL.COM', 'PATRONAL', 'AUTONOMO', '300.00', '570.00', '-270.00'),
(16, 1234569, 'SEM', 'MARLYS DAIANNY DOS SANTOS FREITAS', 'F', '1991-05-11', 'RIO BRANCO', 'BRASILEIRA', '1006222-0', '969.087.262-15', 'SEM', 'SEM', '69.900-000', 'RB', 'AC', '(68) 9999-9999', '(68)99999-9999', 'sememail@hotmail.com', 'SEM', 'SEM', '300.00', '97.62', '203.00'),
(17, 10151, 'SEM', 'FRANCISCO IRINELDO BARROS DE MESQUITA', 'M', '1972-10-22', 'RIO BRANCO', 'BRASILEIRO', '206048', '359.741.502-44', 'CONJ. XAVIER MAIA', 'PLACAS', '69.903-064', 'RB', 'AC', '(68) 9999-9999', '(68)99900-4544', 'sememail@hotmail.com', 'SEM', 'SEM', '500.00', '81.00', '419.00'),
(19, 102001, 'SEM', 'ROBERTO ARAUJO DE MORAES', 'M', '1990-10-23', 'RIO BRANCO', 'BRASILEIRO', '10201823', '008.650.132-17', 'RUA VALDOMIRO LOPES', 'CONQUISTA', '69.918-850', 'RB', 'AC', '(68) 3248-1225', '(68)99972-8491', 'endriosrobert@gmail.com', 'SEM', 'SEM', '3000.00', NULL, '-1000.31'),
(20, 235, 'PATRONAL', 'MIRIAN MENDONCA DA SILVA', 'F', '1994-07-16', 'PLACIDO DE CASTRO', 'BRASILEIRA', '11569638', '913.604.092-62', 'AV. GETULIO VARGAS 1145', 'BOSQUE', '69.900-000', 'RB', 'AC', '(68) 9999-9999', '(68)99999-9999', 'sememail@hotmail.com', 'SEM LOTAÃ‡ÃƒO', 'SECRETARIA', '500.00', '75.00', '425.00'),
(21, 25021967, 'PATRONAL', 'JANIO SAADY DE SOUZA', 'M', '1967-02-25', 'XAPURI', 'BRASILEIRA', '0136498', '196.025.612-20', 'RUA CASTELO BRANCO NÂ°139-141', 'DOCA FURTADO', '69.918-146', 'RB', 'AC', '(68) 9994-3408', '(68)99994-3408', 'RRRR@HOTMAIL.COM', 'JS ELETRONICA', 'SEC', '500.00', '1468.00', '255.33'),
(22, 1, 'SAÃšDE', 'EDILENE VIEIRA DA SILVA', 'F', '1982-10-07', 'RIO BRANCO', 'BRASILEIRA', '384111', '717.568.412-68', 'AV.07 DE SETEMBRO  NÂº1008', 'FLORESTA', '00.000-000', 'RB', 'AC', '', '(68)99942-8489', 'edilenevieira_ac@hotmail.com', 'POSTO SAÃšDE VILA IVONETE', 'TEC. DE LABORATÃ“RIO', '500.00', '0.00', '500.00'),
(23, 2, 'PATRONAL', 'SIDNEY SANTOS SILVA', 'M', '1971-10-08', 'RIO BRANCO', 'BRASILEIRA', '262843', '434.385.392-68', 'RUA HEMORGENES BELMONTE NÂº1490', 'CENTRO', '00.000-000', 'RB', 'AC', '', '(68)99938-8712', 'sememail@hotmail.com', 'AUTONOMO', 'AUTONOMO', '300.00', '0.00', '300.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `cod_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `nivel` int(11) NOT NULL,
  `data_cad` datetime DEFAULT NULL,
  `status` enum('A','D') DEFAULT 'A',
  PRIMARY KEY (`cod_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`cod_usuario`, `nome`, `senha`, `nivel`, `data_cad`, `status`) VALUES
(1, 'gerson', '0805f861d15b391c909f637c337fde1dc06a7cc5c67faed66ba6fe9ba2f6ac896e92aac4fb9c8c7c027eb6811ff65dfee117f44dfaa1596a276edc4879570ca7', 3, '2017-03-08 00:00:00', 'A'),
(2, 'erika', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 3, '2017-03-15 00:00:00', 'A'),
(3, 'moura', '8cad69f7c329a90944bccf09a9f18929a5c7adcef9531b6f707b8e3ddf95910c16dd3a5c0e3d1461530b350c084fd0040ca3a19d7edd64ff74ebe920d7adc649', 3, '2017-06-29 00:00:00', 'A');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_cred_cheque`
--
ALTER TABLE `tb_cred_cheque`
  ADD CONSTRAINT `fk_tb_cred_cheque_tb_convenio1` FOREIGN KEY (`cod_convenio`) REFERENCES `tb_convenio` (`cod_convenio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_cred_cheque_tb_socio1` FOREIGN KEY (`cod_socio`) REFERENCES `tb_socio` (`cod_socio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_cred_cheque_tb_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `tb_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
