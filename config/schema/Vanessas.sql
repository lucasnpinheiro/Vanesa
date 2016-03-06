-- MySQL dump 10.13  Distrib 5.7.9, for linux-glibc2.5 (x86_64)
--
-- Host: 127.0.0.1    Database: vanessa
-- ------------------------------------------------------
-- Server version	5.5.5-10.0.23-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `apagar`
--

DROP TABLE IF EXISTS `apagar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apagar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_documento` varchar(15) DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '1 - Aberto | 2 - Baixado',
  `pessoa_id` int(11) DEFAULT NULL,
  `data_vencimento` date DEFAULT NULL,
  `valor_codumento` float(10,2) DEFAULT NULL,
  `tipo` int(1) DEFAULT NULL COMMENT '1 - A Vista | 2 - A Prazo',
  `historico` varchar(45) DEFAULT NULL,
  `data_pagamento` date DEFAULT NULL,
  `valor_pagamento` float(10,2) DEFAULT NULL,
  `valor_acrescimo` float(10,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apagar`
--
-- ORDER BY:  `id`

LOCK TABLES `apagar` WRITE;
/*!40000 ALTER TABLE `apagar` DISABLE KEYS */;
/*!40000 ALTER TABLE `apagar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caixas_diarios`
--

DROP TABLE IF EXISTS `caixas_diarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caixas_diarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `terminal` int(11) DEFAULT NULL,
  `pessoa_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caixas_diarios`
--
-- ORDER BY:  `id`

LOCK TABLES `caixas_diarios` WRITE;
/*!40000 ALTER TABLE `caixas_diarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `caixas_diarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caixas_movimentos`
--

DROP TABLE IF EXISTS `caixas_movimentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caixas_movimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caixas_diario_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '1 - Abertura | 2 - Entrada | 3 - Saida | 4 - Sangria',
  `valor` float(10,2) DEFAULT NULL,
  `descricao` varchar(185) DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caixas_movimentos`
--
-- ORDER BY:  `id`

LOCK TABLES `caixas_movimentos` WRITE;
/*!40000 ALTER TABLE `caixas_movimentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `caixas_movimentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `endereco` varchar(65) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  `inscricao` varchar(18) DEFAULT NULL,
  `fone1` varchar(15) DEFAULT NULL,
  `fone2` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--
-- ORDER BY:  `id`

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupos`
--

DROP TABLE IF EXISTS `grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(65) DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '1 - Ativo | 2 - Inativo | 9 - Excluido',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos`
--
-- ORDER BY:  `id`

LOCK TABLES `grupos` WRITE;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupos_estoques`
--

DROP TABLE IF EXISTS `grupos_estoques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupos_estoques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `estoque_global` int(11) DEFAULT NULL COMMENT 'produto que ira entrar/baixar estoque',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos_estoques`
--
-- ORDER BY:  `id`

LOCK TABLES `grupos_estoques` WRITE;
/*!40000 ALTER TABLE `grupos_estoques` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupos_estoques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ficha` int(11) DEFAULT NULL,
  `data_pedido` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '0 - Aberto | 1 - Recebido | 2 - Cancelado | 9 - Excluido',
  `nome_cliente` varchar(45) DEFAULT NULL,
  `valor_total` float(10,2) DEFAULT NULL,
  `valor_desconto` float(10,2) DEFAULT NULL,
  `valor_liquido` float(10,2) DEFAULT NULL,
  `valor_dinheiro` float(10,2) DEFAULT NULL,
  `valor_cheque` float(10,2) DEFAULT NULL,
  `valor_cartao` float(10,2) DEFAULT NULL,
  `valor_recebe` float(10,2) DEFAULT NULL,
  `valor_troco` float(10,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--
-- ORDER BY:  `id`

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos_itens`
--

DROP TABLE IF EXISTS `pedidos_itens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos_itens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `valor_venda` float(10,2) DEFAULT NULL,
  `quantidade` float(6,4) DEFAULT NULL,
  `valor_total` float(10,2) DEFAULT NULL,
  `perc_desconto` float(4,2) DEFAULT NULL,
  `valor_desconto` float(10,2) DEFAULT NULL,
  `valor_liquido` float(10,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos_itens`
--
-- ORDER BY:  `id`

LOCK TABLES `pedidos_itens` WRITE;
/*!40000 ALTER TABLE `pedidos_itens` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos_itens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoas`
--

DROP TABLE IF EXISTS `pessoas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(2555) DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '1 - Ativo | 2 - Inativo | 9 - Excluido',
  `endereco` varchar(65) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `fone1` varchar(15) DEFAULT NULL,
  `fone2` varchar(15) DEFAULT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  `incricao` varchar(18) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `root` int(1) DEFAULT '0' COMMENT '0 - Não | 1 - Sim',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas`
--
-- ORDER BY:  `id`

LOCK TABLES `pessoas` WRITE;
/*!40000 ALTER TABLE `pessoas` DISABLE KEYS */;
INSERT  IGNORE INTO `pessoas` (`id`, `nome`, `status`, `endereco`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `fone1`, `fone2`, `cnpj`, `incricao`, `username`, `senha`, `created`, `modified`, `root`) VALUES (1,'Administrador Geral do Sistema',1,'Rua Joaquim Francisco Galeano','109','Vila Guiomar','Ribeirão Preto','SP','14031010','16 39191956','16 992660128','','','super','$2y$10$o/yJEQxcHBQntbM1SMPtUO9ZVkQmqFUDlwdRJKO6KVGb94863xeyO','2016-03-06 17:21:38','2016-03-06 17:26:35',1);
/*!40000 ALTER TABLE `pessoas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoas_tipos`
--

DROP TABLE IF EXISTS `pessoas_tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoas_tipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(11) DEFAULT NULL,
  `tipo` int(1) DEFAULT NULL COMMENT '1 - Usuario | 2 - Cliente | 3 - Fornecedor | 4 - Vendedor | 5 - Operador Caixa | 6 - Funcionario',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas_tipos`
--
-- ORDER BY:  `id`

LOCK TABLES `pessoas_tipos` WRITE;
/*!40000 ALTER TABLE `pessoas_tipos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pessoas_tipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `unidade` varchar(2) DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '1 - Ativo | 2 - Inativo | 9 - Excluido',
  `grupo_estoque_id` int(11) DEFAULT NULL,
  `peso_baixa_estoque` float(4,4) DEFAULT NULL,
  `desconto_pedido` int(1) DEFAULT NULL COMMENT '0 - Nao | 1 - Sim',
  `quantidade_pedido` int(1) DEFAULT NULL COMMENT '0 - Nao | 1 - Sim',
  `compra` float(10,2) DEFAULT NULL,
  `margem` float(4,4) DEFAULT NULL,
  `venda` float(10,2) DEFAULT NULL,
  `promocao` float(10,2) DEFAULT NULL,
  `estoque_minimo` float(6,4) DEFAULT NULL,
  `estoque_atual` float(6,4) DEFAULT NULL,
  `atalho` int(1) DEFAULT NULL COMMENT '0 - Nao | 1 - Sim',
  `nome_atalho` varchar(15) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--
-- ORDER BY:  `id`

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicoes`
--

DROP TABLE IF EXISTS `requisicoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_documento` varchar(15) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `tipo` int(1) DEFAULT NULL COMMENT '1 - Entradas | 2 - Saidas',
  `quantidade` float(6,4) DEFAULT NULL,
  `motivo` varchar(85) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicoes`
--
-- ORDER BY:  `id`

LOCK TABLES `requisicoes` WRITE;
/*!40000 ALTER TABLE `requisicoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `requisicoes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-06 16:59:28
