-- MySQL dump 10.13  Distrib 5.7.9, for linux-glibc2.5 (x86_64)
--
-- Host: 127.0.0.1    Database: vanesa
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
  `valor_documento` float(10,2) DEFAULT NULL,
  `tipo` int(1) DEFAULT NULL COMMENT '1 - A Vista | 2 - A Prazo',
  `historico` varchar(45) DEFAULT NULL,
  `data_pagamento` date DEFAULT NULL,
  `valor_pagamento` float(10,2) DEFAULT NULL,
  `valor_acrescimo` float(10,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apagar`
--
-- ORDER BY:  `id`

LOCK TABLES `apagar` WRITE;
/*!40000 ALTER TABLE `apagar` DISABLE KEYS */;
INSERT  IGNORE INTO `apagar` (`id`, `numero_documento`, `status`, `pessoa_id`, `data_vencimento`, `valor_documento`, `tipo`, `historico`, `data_pagamento`, `valor_pagamento`, `valor_acrescimo`, `created`, `modified`) VALUES (1,'123123',1,3,'2016-04-09',5.00,1,'asdasdasd',NULL,NULL,NULL,'2016-03-12 16:36:25','2016-03-12 16:36:25'),(2,'2',2,53,'2016-04-01',500.00,2,'','2016-03-26',600.00,100.00,'2016-03-28 21:39:38','2016-03-29 20:10:06'),(3,'56563423423',2,53,'2016-03-11',500.00,1,'','2016-03-11',500.00,0.00,'2016-03-29 20:19:15','2016-03-29 20:19:15');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caixas_diarios`
--
-- ORDER BY:  `id`

LOCK TABLES `caixas_diarios` WRITE;
/*!40000 ALTER TABLE `caixas_diarios` DISABLE KEYS */;
INSERT  IGNORE INTO `caixas_diarios` (`id`, `data`, `terminal`, `pessoa_id`, `created`, `modified`) VALUES (1,'2016-03-16',1,2,'2016-03-16 20:42:22','2016-03-16 20:42:22');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caixas_movimentos`
--
-- ORDER BY:  `id`

LOCK TABLES `caixas_movimentos` WRITE;
/*!40000 ALTER TABLE `caixas_movimentos` DISABLE KEYS */;
INSERT  IGNORE INTO `caixas_movimentos` (`id`, `caixas_diario_id`, `status`, `valor`, `descricao`, `grupo_id`, `created`, `modified`) VALUES (1,1,1,1.00,'Pagamentos efetuados',1,'2016-03-16 20:52:59','2016-03-16 20:52:59');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--
-- ORDER BY:  `id`

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT  IGNORE INTO `empresas` (`id`, `nome`, `endereco`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `cnpj`, `inscricao`, `fone1`, `fone2`) VALUES (1,'Empresa Teste 1','Rua Joaquim Francisco Galiano','109','Vila Guiomar','Ribeirão Preto','SP','14031-010','16.529.383/0001-20','476.385.398.000','(16) 39191-956','(16) 99266-0128');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos`
--
-- ORDER BY:  `id`

LOCK TABLES `grupos` WRITE;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT  IGNORE INTO `grupos` (`id`, `nome`, `status`, `created`, `modified`) VALUES (1,'Dinheiro',1,'2016-03-12 16:17:29','2016-03-12 16:17:29'),(2,'Cheque',1,'2016-03-12 16:17:44','2016-03-12 16:17:44'),(3,'Cartão',1,'2016-03-12 16:17:58','2016-03-12 16:17:58');
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
) ENGINE=InnoDB AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8 COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos_estoques`
--
-- ORDER BY:  `id`

LOCK TABLES `grupos_estoques` WRITE;
/*!40000 ALTER TABLE `grupos_estoques` DISABLE KEYS */;
INSERT  IGNORE INTO `grupos_estoques` (`id`, `nome`, `estoque_global`, `created`, `modified`) VALUES (1,'SORVETES',189,'2016-03-25 15:57:30',NULL),(2,'CAFE',0,'2016-03-25 15:57:30',NULL),(3,'REFRIGERANTES',0,'2016-03-25 15:57:30',NULL),(4,'AGUA MINERAL',0,'2016-03-25 15:57:30',NULL),(5,'VITAMINAS',0,'2016-03-25 15:57:30',NULL),(6,'COMPLEMENTOS',0,'2016-03-25 15:57:30',NULL),(7,'COBERTURAS QUE NAO PESA',0,'2016-03-25 15:57:30',NULL),(8,'LANCHES NATURAIS',0,'2016-03-25 15:57:30',NULL),(9,'AÇAI',188,'2016-03-25 15:57:30',NULL),(10,'RODIZIO',189,'2016-03-25 15:57:30',NULL),(11,'FRUTAS',0,'2016-03-25 15:57:30',NULL),(12,'SALGADO',0,'2016-03-25 15:57:30',NULL),(13,'SOBREMESA',0,'2016-03-25 15:57:30',NULL),(14,'BEBIDAS',0,'2016-03-25 15:57:30',NULL),(15,'SUCO DE FRUTAS',0,'2016-03-25 15:57:30',NULL),(60,'SORVETE SABORES',189,'2016-03-25 15:57:30',NULL),(70,'COBERTURAS',189,'2016-03-25 15:57:30',NULL),(75,'ACAI GLOBAL',188,'2016-03-25 15:57:30',NULL),(80,'DESCARTAVEIS',0,'2016-03-25 15:57:30',NULL),(90,'MATERIA PRIMA SELF SERVICE',189,'2016-03-25 15:57:30',NULL),(100,'MATERIAL DE LIMPEZA',0,'2016-03-25 15:57:30',NULL),(110,'LEGUMES',0,'2016-03-25 15:57:30',NULL),(999,'TOTAL DO MES',0,'2016-03-25 15:57:30',NULL);
/*!40000 ALTER TABLE `grupos_estoques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parametros`
--

DROP TABLE IF EXISTS `parametros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parametros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `chave` varchar(100) DEFAULT NULL,
  `valor` text,
  `tipo` int(1) DEFAULT NULL COMMENT '1 - Inteiro | 2 - String | 3 - Texto | 4 - Lista | 5 - Float',
  `opcoes` text,
  `grupo` varchar(100) DEFAULT NULL,
  `root` int(1) DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parametros`
--
-- ORDER BY:  `id`

LOCK TABLES `parametros` WRITE;
/*!40000 ALTER TABLE `parametros` DISABLE KEYS */;
INSERT  IGNORE INTO `parametros` (`id`, `nome`, `chave`, `valor`, `tipo`, `opcoes`, `grupo`, `root`, `required`) VALUES (1,'Liberar Desconto em','D_Pedido_Local','I',4,'{\"A\":\"Ambos\", \"I\":\"Item\", \"P\":\"Pedido\"}','Pedido',0,1),(2,'Desconto no Item','D_Pedido_Item','50,0000',6,NULL,'Pedido',0,0),(3,'Desconto no Total do Pedido','D_Pedido','5,0000',6,NULL,'Pedido',0,0),(4,'Casas Decimais','N_Casas_Decimais','3',4,'[0,1,2,3,4]','Produtos',1,1),(5,'Codigo de Acesso','C_Acesso','a:7:{s:12:\"data_geracao\";s:10:\"2016-03-29\";s:13:\"data_validade\";s:10:\"2016-05-13\";s:7:\"cliente\";s:15:\"Empresa Teste 1\";s:4:\"cnpj\";s:18:\"16.529.383/0001-20\";s:5:\"ativo\";i:1;s:3:\"md5\";s:32:\"fecfa16fe82ef15bc533577788239355\";s:5:\"token\";s:324:\"YTo3OntzOjEyOiJkYXRhX2dlcmFjYW8iO3M6MTA6IjIwMTYtMDMtMjkiO3M6MTM6ImRhdGFfdmFsaWRhZGUiO3M6MTA6IjIwMTYtMDUtMTMiO3M6NzoiY2xpZW50ZSI7czoxNToiRW1wcmVzYSBUZXN0ZSAxIjtzOjQ6ImNucGoiO3M6MTg6IjE2LjUyOS4zODMvMDAwMS0yMCI7czo1OiJhdGl2byI7aToxO3M6MzoibWQ1IjtzOjMyOiJmZWNmYTE2ZmU4MmVmMTViYzUzMzU3Nzc4ODIzOTM1NSI7czo1OiJ0b2tlbiI7czowOiIiO30=\";}',2,NULL,'Sistema',1,0),(6,'Data do Ultimo Acesso','C_Acesso_Data','20160329215004',2,NULL,'Sistema',1,0),(7,'Codigo de Acesso da Empresa','C_Acesso_Empresa','fecfa16fe82ef15bc533577788239355',2,NULL,'Sistema',1,0),(8,'Carregar tela pagamento ao finalizar o pedido.','P_Tela_Pagamento','1',4,'[\"Não\",\"Sim\"]','Pedido',0,1),(9,'Quantidade maxima de parcelas','C_Max_Parcelas','5',1,'','Pedido',0,1),(10,'Novo pedido ao finalizar pagamento','P_Tela_Pedido','1',4,'[\"Não\",\"Sim\"]','Pedido',0,1),(11,'Data Validade','C_Acesso_Data_Validade','2016-05-13',2,NULL,'Sistema',1,0);
/*!40000 ALTER TABLE `parametros` ENABLE KEYS */;
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
  `sequencia` int(11) DEFAULT NULL,
  `valor_venda` float(12,2) DEFAULT NULL,
  `quantidade` float(12,4) DEFAULT NULL,
  `valor_total` float(12,2) DEFAULT NULL,
  `perc_desconto` float(12,2) DEFAULT NULL,
  `valor_desconto` float(12,2) DEFAULT NULL,
  `valor_liquido` float(12,2) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas`
--
-- ORDER BY:  `id`

LOCK TABLES `pessoas` WRITE;
/*!40000 ALTER TABLE `pessoas` DISABLE KEYS */;
INSERT  IGNORE INTO `pessoas` (`id`, `nome`, `status`, `endereco`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `fone1`, `fone2`, `cnpj`, `incricao`, `username`, `senha`, `created`, `modified`, `root`) VALUES (1,'SORVETERIA VANESA FABRICA',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(2,'COCA COMPANHIA DE BEBIDAS IPIRANGA',0,'AV.D. PEDRO I , 2270','','IPIRANGA','RIBEIRÃO PRETO','SP','14055630','601-2000','','55960736000101','582115743116',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(3,'MAKRO  ATACADISTA S.A.',0,'AV.PRESIDENTE CASTELO BRANCO, 1835','','LAGOINHA','RIBEIRÃO PRETO','SP','14095000','016 3965 9600','','47427653002754','582139689110',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(4,'MARKETING',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(5,'XAROPE DE GUARANA',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(6,'VERDURAO',0,'RUA AMERICO BRASILIENSE , 1098','','CENTRO','RIBEIRAO PRETO','SP','','16-635-0933','','60280856000190','582248051114',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(7,'RIBERDOCES',0,'RUA DR JOSE RIBEIRO FERREIRA 625','','SAO JOSE','RIBEIRAO PRETO','SP','','16 34345800','','1097594500263','582848972115',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(8,'JOAO BATISTA POLAR DISTR SORVETES',0,'AV.RAPOSO TAVARES, 395','','PAULICEIA','PIRACICABA','SP','13401380','(19) 3434-8311','','44806859000168','535042371113',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(9,'LEAGEL',0,'','','CENTRO','RIBEIRAO PRETO','SP','14010160','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(10,'EBEG EMBALAGENS',0,'AV CASTELO BRANCO','','LAGOINHA','RIBEIRAO PRETO','SP','','(16) 3965-8888','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(11,'DAERP',0,'RUA AMADOR BUENO , 22','','CENTRO','RIBEIRAO PRETO','SP','','','','56022858000101','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(12,'RADIO LUZ',0,'INDEPENDENCIA','','CAMPOS ELISIOS','RIBEIRAO PRETO','SP','14080000','(16) 3961-2511','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(13,'LEITE FAZENDA BELA VISTA CREME LEITE',0,'','','','','','','91855148','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(14,'CPFL COMPANHIA PAULISTA DE FORCA E LUZ',0,'ROD.CAMPINAS MOGI-MIRIM KM 2,5','','','CAMPINAS','SP','13088900','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(15,'MEC TOCA',0,'RUA MARCONDES SALGADO','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(16,'DOCE FESTA RIBEIRAO',0,'RUA CRAVINHOS,508','','JD PAULISTA','RIBEIRAO PRETO','SP','14090.110','627-1825','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(17,'FALTA NO CAIXA',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(18,'CENTRAL DE LIMPEZA',0,'RUA MARECHAL DEODORO,523','','CENTRO','RIBEIRAO PRETO','SP','14091190','(16) 610-6729','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(19,'DOCE E CIA CHICLETES',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(20,'MATERIAL DE LIMPEZA',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(21,'CACOLA & FILHOS LTDA',0,'RUA BOLIVIA, 1300/1318','','VILA MARIANA','RIBEIRAO PRETO','SP','14075250','(16) 628-0303','','49236748000187','582076924113',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(22,'CONTABILIDADE NDS',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(23,'MEL PARA ACAI MERCEARIA CENTRAL',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(24,'DARF SIMPLES',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(25,'PUBLICIDADE E PROPAGANDA',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(26,'SINDICATO',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(27,'JUNINHO BALAS',0,'','','','RIBEIRAO PRETO','SP','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(28,'RESERVA  FERIAS / 13 SALARIO',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(29,'UNIFORME',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(30,'INMETRO/IPEM',0,'AV. MAURILIO BIAGI, 2940','','','RIBEIRAO PRETO','SP','14021000','39163000','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(31,'CHAVEIRO',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(32,'DIPAL DISTRIB IBIT PROD ALIM LTDA',0,'AV DO PARQUE 147','','PARQUE INDUSTRIAL','IBITINGA','SP','14940000','16-3341-9200','','49229289000104','344003267110',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(33,'FGTS EMPREGADOS',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(34,'ADAMS CHICLETES',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(35,'DESENTUPIDORA SUAT SANEAMENTO URBANO',0,'RUA GUIA LOPES 776','','VILA TIBERIO','RIBEIRAO PRETO','SP','','(16) 3633-0990','','03382241000195','mun97353001',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(36,'NET VIRTUA',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(37,'AÇAI - BARRA  - MAURÍCIO',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(38,'LANCHE PARA FUNCIONÁRIOS',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(39,'FRANCOI',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(40,'EXTINTORES J W LTDA',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(41,'SORVETERIA VANESA PROD PARA LOJA',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(42,'SUPERMERCADO SAVEGNAGO LTDA',0,'RUA HENRIQUE DUMONT 745','','JARDIM PAULISTA','RIBEIRÃO PRETO','SP','14090200','','','71322150001999','582669800115',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(43,'BARCELONA COMERCIO VAREJISTA E ATACADISTA S/A',0,'AVENIDA PRESIDENTE CASTELO BRANCO 2395','','PARQUE INDUSTRIAL TANQUINHO','RIBEIRAO PRETO','SP','14095000','','','07170943001345','582756758113',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(44,'MACADAMIA FAZENDIA',0,'','','','JABOTICABAL','SP','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(45,'TONIN ATACADO',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(46,'ISABEL CASCAO',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(47,'CAFETERIA ECOLÓGICA',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(48,'FRUTAS',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(49,'EPS SANEAMENTO',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(50,'DOCEPAN',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:40',NULL,0),(51,'MANUTENÇÃO EDSON',0,'','','','','','','92175549','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(52,'RENAN / INFORMATICA',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(53,'ACRILPRESS',0,'','','','','','','36266282','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(54,'BOLO SORVETE PANK',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(55,'INSS',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(56,'LEITE NINHO ACAI',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(57,'MORANGO ACAI',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(58,'MULTICLINICA SAUDE E SEGURANCA TRABALHO',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(59,'ISOPOR VIAGEM EBEG',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(60,'INOV PROPAGANDA E BANNER',0,'','','','','','','39313191','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(61,'CUCURUCHU FAB ALIMENTOS',0,'ALMIRANTE LOBO 1455','','IPIRANGA','SP','SP','','11-22725545','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(62,'AGUA MINERAL DARCIO',0,'AMERICO BRASILIENSE 1016','','','','','','92982939','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(63,'JB PORTAS DE AÇO',0,'','','','','','','16 30214136','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(64,'PREFEITURA MUNICIPAL',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(65,'LEROY MERLIN',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(66,'SAM\'S CLUB',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(67,'CGS - COMERCIAL PALADINO',0,'RUA ESPIRITO SANTO, 535','','SUMAREZINHO','RIBEIRAO PRETO','SP','140550330','36300485','','07314892000144','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(68,'MONITORAMENTO CAMERAS',0,'AV. ALICE DE MOURA BRAGHETTO, 296','','CITY RIBEIRAO','','','14021140','','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(69,'XEROX',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(70,'DESCONTO CLIENTE - CONVENIO USP-SARDINHA',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(71,'CAFE DA MANHA',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(72,'GRANOLA ACAI',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(73,'SIMONE',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(74,'EMBALAGENS RODRIGUES MELO LTDA',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(75,'EMBALAGENS RODRIGUES MELO LTDA',0,'','','','','','','36327532','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(76,'MOISES',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(77,'NATALIA',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(78,'TAIANE',0,'','','','','','','','','','',NULL,NULL,'2016-03-25 16:09:43',NULL,0),(79,'Administrador Geral do Sistema',1,'','','','','','14031-010','','','','','super','$2y$10$NR95CA/X3Gsr0bCCwkAFS.IvUOqY1zCbud//QfRvkU2BZxTK40.0.','2016-03-25 16:42:12','2016-03-25 16:42:12',1),(80,'Vanesa',1,'','','','','','','','','','','vanesa','$2y$10$mbSDIb0KIJImIO3ESzCPCOLR/hRbdiBbcHOqtbDFNpB4dZVufEREm','2016-03-29 21:44:18','2016-03-29 21:44:18',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas_tipos`
--
-- ORDER BY:  `id`

LOCK TABLES `pessoas_tipos` WRITE;
/*!40000 ALTER TABLE `pessoas_tipos` DISABLE KEYS */;
INSERT  IGNORE INTO `pessoas_tipos` (`id`, `pessoa_id`, `tipo`, `created`, `modified`) VALUES (4,2,3,'2016-03-12 15:20:20','2016-03-12 15:20:20'),(5,4,3,NULL,NULL),(6,5,3,NULL,NULL),(7,6,3,NULL,NULL),(8,7,3,NULL,NULL),(9,8,3,NULL,NULL),(10,9,3,NULL,NULL),(11,10,3,NULL,NULL),(12,11,3,NULL,NULL),(13,12,3,NULL,NULL),(14,13,3,NULL,NULL),(15,14,3,NULL,NULL),(16,15,3,NULL,NULL),(17,16,3,NULL,NULL),(18,17,3,NULL,NULL),(19,18,3,NULL,NULL),(20,19,3,NULL,NULL),(21,20,3,NULL,NULL),(22,21,3,NULL,NULL),(23,22,3,NULL,NULL),(24,23,3,NULL,NULL),(25,24,3,NULL,NULL),(26,25,3,NULL,NULL),(27,26,3,NULL,NULL),(28,27,3,NULL,NULL),(29,28,3,NULL,NULL),(30,29,3,NULL,NULL),(31,30,3,NULL,NULL),(32,31,3,NULL,NULL),(33,32,3,NULL,NULL),(34,33,3,NULL,NULL),(35,34,3,NULL,NULL),(36,35,3,NULL,NULL),(37,36,3,NULL,NULL),(38,37,3,NULL,NULL),(39,38,3,NULL,NULL),(40,39,3,NULL,NULL),(41,40,3,NULL,NULL),(42,41,3,NULL,NULL),(43,42,3,NULL,NULL),(44,43,3,NULL,NULL),(45,44,3,NULL,NULL),(46,45,3,NULL,NULL),(47,46,3,NULL,NULL),(48,47,3,NULL,NULL),(49,48,3,NULL,NULL),(50,49,3,NULL,NULL),(51,50,3,NULL,NULL),(52,51,3,NULL,NULL),(53,52,3,NULL,NULL),(54,53,3,NULL,NULL),(55,54,3,NULL,NULL),(56,55,3,NULL,NULL),(57,56,3,NULL,NULL),(58,57,3,NULL,NULL),(59,58,3,NULL,NULL),(60,59,3,NULL,NULL),(61,60,3,NULL,NULL),(62,61,3,NULL,NULL),(63,62,3,NULL,NULL),(64,63,3,NULL,NULL),(65,64,3,NULL,NULL),(66,65,3,NULL,NULL),(67,66,3,NULL,NULL),(68,67,3,NULL,NULL),(69,68,3,NULL,NULL),(70,69,3,NULL,NULL),(71,70,3,NULL,NULL),(72,71,3,NULL,NULL),(73,72,3,NULL,NULL),(74,73,3,NULL,NULL),(75,74,3,NULL,NULL),(76,75,3,NULL,NULL),(77,76,3,NULL,NULL),(78,77,3,NULL,NULL),(79,78,3,NULL,NULL),(132,79,1,'2016-03-25 16:42:12','2016-03-25 16:42:12'),(133,80,1,'2016-03-29 21:44:18','2016-03-29 21:44:18');
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
  `barra` varchar(13) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `unidade` varchar(2) DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '1 - Ativo | 2 - Inativo | 9 - Excluido',
  `grupos_estoque_id` int(11) DEFAULT NULL,
  `peso_baixa_estoque` float(12,4) DEFAULT NULL,
  `desconto_pedido` int(1) DEFAULT NULL COMMENT '0 - Nao | 1 - Sim',
  `quantidade_pedido` int(1) DEFAULT NULL COMMENT '0 - Nao | 1 - Sim',
  `compra` float(10,2) DEFAULT NULL,
  `margem` float(12,4) DEFAULT NULL,
  `venda` float(10,2) DEFAULT NULL,
  `promocao` float(10,2) DEFAULT NULL,
  `estoque_minimo` float(12,4) DEFAULT NULL,
  `estoque_atual` float(12,4) DEFAULT NULL,
  `atalho` int(1) DEFAULT NULL COMMENT '0 - Nao | 1 - Sim',
  `nome_atalho` varchar(15) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=258 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--
-- ORDER BY:  `id`

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT  IGNORE INTO `produtos` (`id`, `barra`, `nome`, `unidade`, `status`, `grupos_estoque_id`, `peso_baixa_estoque`, `desconto_pedido`, `quantidade_pedido`, `compra`, `margem`, `venda`, `promocao`, `estoque_minimo`, `estoque_atual`, `atalho`, `nome_atalho`, `created`, `modified`) VALUES (1,'1','SORVETE SELF-SERVICE','KG',1,1,0.0000,0,1,15.31,68.6912,48.90,0.00,0.0000,0.0000,0,'','2016-03-25 16:16:26','2016-03-28 21:01:05'),(2,'2','SORVETE CASCAO 2 BOLAS','UN',1,1,0.2000,0,1,2.80,114.2900,6.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(3,'3','SORVETE CASQUINHA 1 BOLA','UN',1,1,0.1250,0,1,0.00,-99.9900,4.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(4,'4','SORVETE VIAGEM','KG',1,1,1.0000,1,1,16.80,197.0200,49.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(5,'5','COLEGIAL','UN',1,1,0.1250,0,1,3.00,450.0000,16.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(6,'6','SUNDAY 2 SABORES','UN',1,1,0.1800,0,1,3.75,473.3300,21.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(7,'7','RODIZIO COBRANCA','UN',1,11,0.0000,0,1,12.00,62.5000,19.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(8,'8','CREME DE PAPAYA','UN',1,1,0.2000,0,1,4.50,133.3300,10.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(9,'9','GOMAS FINI TODAS POR KG','UN',1,70,1.0000,0,0,21.14,68.6800,27.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(10,'10','PETIT GATEAU PRATO','UN',1,1,1.0000,0,1,4.75,321.0500,20.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(11,'11','MILK-SHEIK 300 ML','UN',1,1,0.2000,0,1,2.50,380.0000,12.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(12,'12','SUCO LARANJA COM SORVETE','UN',1,1,0.1500,0,1,2.00,200.0000,6.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(13,'13','VACA PRETA','UN',1,1,0.2000,0,1,2.50,440.0000,13.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(14,'14','BANANA SPLITE 3 SABORES','UN',1,1,0.3600,0,1,6.25,346.4000,27.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(15,'15','EMPADA DE FRANGO','UN',1,12,1.0000,0,1,1.60,100.0000,3.20,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(16,'16','SUCO UVA','UN',1,15,1.0000,0,1,2.90,262.0700,10.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(17,'17','NOZES','KG',1,70,1.0000,0,1,31.90,0.0000,15.75,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(18,'18','RODIZIO PESO','KG',1,1,0.0000,0,1,0.00,0.0000,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(19,'19','BRIGADEIRO CHOCOLATE NESTLE','KG',1,70,1.0000,0,1,12.39,0.0000,13.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(20,'20','TARA PORTA CASCAO','UN',1,1,0.1110,0,1,-14.85,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(21,'21','LANCHE DE PERU','UN',1,8,1.0000,0,1,3.90,207.6900,12.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(22,'22','BUBBALOO TUBO','UN',1,6,1.0000,0,1,0.32,209.2100,1.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(23,'23','ACAI PEQUENO 250 GR','KG',1,9,0.2500,0,1,3.50,317.1400,14.60,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(24,'24','TRIDENT TODOS','UN',1,6,1.0000,0,1,0.71,181.6900,2.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(25,'25','DAMASCO 1,0 KG','UN',1,70,0.0000,0,0,10.90,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(26,'26','LANCHE SALAME','UN',1,8,1.0000,0,1,3.90,171.7900,10.60,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(27,'27','LANCHE RICOTA','UN',1,8,0.0000,0,1,3.40,276.4700,12.80,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(28,'28','MASSA P/ BOLO','UN',1,12,0.0000,0,1,1.75,0.0000,1.48,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(29,'29','SUCO LARANJA COM AMORA','UN',1,15,1.0000,0,1,1.25,260.0000,4.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(30,'30','LANCHE PRESUNTO QUEIJO','UN',1,8,1.0000,0,1,3.75,193.3300,11.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(31,'31','DOCE TATY 800G SELF-SERVICE','KG',1,70,1.0000,0,0,0.29,140.3300,29.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(32,'32','MACADAMIA','KG',1,70,1.0000,0,0,29.35,28.2600,29.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(33,'33','ABACAXI FRUTA','LT',1,15,0.4700,0,0,3.79,0.0000,3.79,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(34,'34','DISQUETE CHOC MINI KG','KG',1,70,0.5000,0,0,16.59,79.2200,29.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(35,'35','SUCO DE LIMÃO','UN',1,15,1.0000,0,1,2.25,122.2200,5.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(36,'36','SUCO MELANCIA','UN',1,15,1.0000,0,1,2.25,211.1100,7.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(37,'37','SUCO CAJU','UN',1,15,1.0000,0,1,2.25,246.6700,7.80,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(38,'38','SORVETE ASSADO','UN',1,1,1.0000,0,1,3.50,211.4300,10.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(39,'39','BOLO SORVETE PROMOCAO','UN',1,1,1.3000,1,1,20.00,37.5000,27.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(40,'40','MISSANGA CHOCOLATE MAVALERIO 500GR','KG',1,90,1.0000,0,1,9.06,243.8200,29.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(41,'41','AÇUCAR','KG',1,90,0.0000,0,1,1.99,0.0000,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(42,'42','PIRULITO MORANGO DO AMOR','UN',1,6,0.0000,0,1,3.99,-99.9900,0.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(43,'43','SUCO GOIABA','UN',1,15,1.0000,0,1,2.35,197.8700,7.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(44,'44','SUCO MANGA','UN',1,15,1.0000,0,1,2.85,145.6100,7.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(45,'45','GAS GARRAFA CHANTILLY','UN',1,70,1.0000,0,0,1.96,400.0000,10.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(46,'46','ESCAMA COLORIDA 500 G','KG',1,70,1.0000,0,0,4.20,358.8800,27.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(47,'47','FLOCOS DE ARROZ 500 GR','KG',1,70,1.0000,1,0,5.20,205.3800,29.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(48,'48','CHICLETS DE 0,15 CENTAVOS','UN',1,6,1.0000,0,1,0.04,-53.4200,0.15,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(49,'49','GRANULADO CONFEITEIRO 1.0 KG','KG',1,70,1.0000,0,0,5.73,604.5500,27.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(50,'50','SUCO MARACUJA','UN',1,12,1.0000,0,1,2.60,303.8500,10.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:26',NULL),(51,'51','SUCO DE LARANJA/MAMAO','UN',1,15,1.0000,0,1,1.50,200.0000,4.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(52,'52','COCA COLA 290ML','UN',1,3,0.0000,0,1,0.83,58.5000,2.00,0.00,0.0000,0.0000,1,'Coca 290ML','2016-03-25 16:16:28','2016-03-29 20:51:04'),(53,'53','COCA COLA ZERO 290ML','UN',1,3,1.0000,0,1,1.12,37.7778,1.80,0.00,0.0000,0.0000,1,'Coca Zero 290ML','2016-03-25 16:16:28','2016-03-29 20:50:50'),(54,'54','CREME DE LEITE','KG',1,70,1.0000,1,0,6.50,-62.9500,10.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(55,'55','FRUTAS EM GERAL','KG',1,9,0.0000,0,0,7.68,2690.0000,27.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(56,'56','OVOMALTINE D400 GR','KG',1,70,1.0000,0,1,5.29,185.8600,27.10,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(57,'57','BALA ICEKISS C/ 150 E TRI BALA','UN',1,6,1.0000,0,1,0.01,2172.7300,0.15,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(58,'58','BOLO FATIA','UN',1,13,0.1500,0,1,2.50,120.0000,5.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(59,'59','FARINHA DE TRIGO PARA BOLO','KL',1,13,1.0000,0,1,1.75,0.0000,1.85,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(60,'60','FANTA LARANJA GARRAFA 290ML','UN',1,3,0.0000,0,1,1.01,181.2500,1.80,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(61,'61','COPO COPAZA 440 ML MILK SHAKE','UN',1,80,1.0000,0,1,11.80,362.0000,4.62,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(62,'62','AGUA C/GAS 500 ML UNIDADE','UN',1,4,1.0000,0,1,0.71,322.5400,3.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(63,'63','AGUA S/GAS 500ML UNIDADE','UN',1,4,1.0000,0,1,0.56,342.4800,2.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(64,'64','AGUA COPO 300ML UNIDADE','UN',1,4,0.0000,0,1,0.00,300.0000,1.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(65,'65','COBERTURA SELECTA 1,3','KG',1,70,1.0000,0,1,5.34,0.0000,5.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(66,'66','POTE FEIJAO','UN',1,80,1.0000,0,0,47.90,-99.9900,4.70,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(67,'67','COPO 100 ML COPAZA','UN',1,80,1.0000,0,0,2.29,-75.7900,0.24,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(68,'68','TAMPA COPAZA P.07','UN',1,80,1.0000,0,1,3.06,0.0000,3.15,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(69,'69','ACAI JUMBO 1 KG','UN',1,9,1.1000,0,1,8.00,125.0000,18.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(70,'70','FLOCOS AO LEITE MAVALERIO','UN',1,70,0.5000,0,0,10.40,83.5500,27.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(71,'71','MARSHMALLOW FINI','UN',1,70,0.0000,0,1,18.68,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(72,'72','LIQUOR VARIOS SABORES STOCK','UN',1,70,1.0000,0,1,38.91,22.9600,27.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(73,'73','SUCO AÇAI COM LARANJA','UN',1,15,1.0000,0,1,2.00,150.0000,5.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(74,'74','PALITOS CHOCOLATE ZABET','KG',1,70,1.0000,0,0,11.78,218.8600,27.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(75,'75','PÃO DE QUEIJO','UN',1,12,1.0000,0,1,1.00,70.0000,1.70,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(76,'76','CANUDO DE BIJU CUCURUCHU','KG',1,70,1.0000,0,0,11.61,179.7000,27.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(77,'77','QUICHE RICOTA E BRÓCOLIS','UN',1,12,1.0000,0,1,1.60,137.5000,3.80,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(78,'78','TAMPA COPAZA P.08','UN',1,80,1.0000,0,1,4.53,0.0000,4.51,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(79,'79','CAIXA TERMICA 2LT','UN',1,80,1.0000,0,0,46.40,-99.9900,65.64,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(80,'80','CAFE','UN',1,2,1.0000,0,1,0.25,1100.0000,3.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(81,'81','BANANA P/ AÇAI CAIXA','KG',1,9,0.0000,0,1,22.00,-28.2000,14.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(82,'82','LEITE NINHO LT 400G P/ACAI','KG',1,9,1.0000,0,0,7.80,88.2400,12.80,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(83,'83','GUARANA KUAT','UN',1,3,0.0000,0,1,1.10,172.3100,3.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(84,'84','TOUCA REDE','UN',1,80,1.0000,0,0,8.40,-99.9900,8.40,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(85,'85','SUCO DE ABACAXI','UN',1,15,0.0000,0,1,1.30,515.3800,8.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(86,'86','SUCO DE LARANJA','UN',1,15,0.0000,0,1,1.08,362.9600,5.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(87,'87','SALADA DE FRUTA COM SORVETE','UN',1,1,0.2000,0,1,4.00,287.5000,15.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(88,'88','POTE OVAL STARPACK','UN',1,80,1.0000,0,1,72.90,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(89,'89','CALDA QUENTE LEARGEL 12 KG','UN',1,70,1.0000,0,0,16.80,66.0700,27.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(90,'90','ADOCANTE','UN',1,2,1.0000,0,0,3.56,256.0000,3.56,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(91,'91','CASCAO V CAIXA  COM 120','UN',1,1,1.0000,0,0,0.31,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(92,'92','CHICLETE POOSH - VARIOS SABORES','UN',1,6,0.0000,0,1,0.08,233.3300,0.20,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(93,'93','MISSANGA COLORIDA','UN',1,90,1.0000,0,0,4.18,318.0000,4.18,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(94,'94','BANDEJA CYOVAC 15X15CM','UN',1,80,1.0000,0,0,15.69,1373.0000,14.73,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(95,'95','VITAMINA','UN',1,15,0.0000,0,1,2.25,211.1100,7.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(96,'96','SUCO DE MORANGO','UN',1,15,2.0000,0,1,1.50,600.0000,10.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(97,'97','PAPEL HIGIENICO','UN',1,100,1.0000,0,0,69.90,2430.0000,25.30,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(98,'98','SACOLA PLASTICA','UN',1,80,1.0000,0,0,28.90,2790.0000,28.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(99,'99','FAROFA CROCANTE ESP 1,0 KG MARVI','KG',1,70,0.0000,0,0,32.11,106.0600,27.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(100,'100','EMPADA DE PALMITO','UN',1,12,1.0000,0,1,1.60,100.0000,3.20,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(101,'101','INTERFOLHA ECO','UN',1,80,1.0000,0,0,42.90,-99.9900,42.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:28',NULL),(102,'102','ACAI GRANDE 700 GR','UN',1,9,0.7000,0,1,7.00,112.8600,14.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(103,'103','CANUDO BISCOITO','UN',1,90,1.0000,0,0,14.92,-99.9900,14.92,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(104,'104','LEITE CONDENSADO','UN',1,90,1.0000,0,0,2.39,-99.9900,2.86,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(105,'105','PETIT GATO VIAGEM 90 GR','UN',1,13,0.0900,0,1,1.40,100.0000,2.80,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(106,'106','ABACATE COM LEITE','UN',1,5,1.0000,0,1,2.50,180.0000,7.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(107,'107','COBERTURA SIBER CARAMELO','UN',1,70,1.0000,0,0,8.69,-99.9900,8.69,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(108,'108','COPO SORVETE BIJU','UN',1,70,0.0000,0,0,10.66,0.0000,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(109,'109','AMÉLIA CHANTIMIX','UN',1,70,0.0000,0,0,6.00,0.0000,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(110,'110','BOLO DE SORVETE','KG',1,1,1.0000,1,1,16.80,125.6000,37.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(111,'111','LEITE LITRO','UN',1,90,1.0000,0,1,1.94,0.0000,1.30,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(112,'112','COBERTURA SIBER CHOCOLATE','UN',1,70,1.0000,0,0,8.62,-99.9900,8.91,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(113,'113','RODIZIO ACAI','UN',1,9,1.0000,0,1,1.25,140.0000,3.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(114,'114','COBERTURA SIBER MORANGO','UN',1,70,1.0000,0,0,3.16,-99.9900,7.24,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(115,'115','SABAO EM PO','UN',1,100,1.0000,0,0,4.60,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(116,'116','PRATO PRATICE LIFE','UN',1,80,1.0000,0,0,10.38,0.0500,10.38,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(117,'117','PANO AZUL - PERFEX C/33','UN',1,100,1.0000,0,0,0.53,0.0000,0.53,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(118,'118','PANO DE PRATO LISO','UN',1,100,1.0000,0,0,16.06,0.0000,16.06,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(119,'119','CESTAO CAIXA 120','UN',1,90,1.0000,0,1,30.12,0.0000,30.12,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(120,'120','TAMPA COPAZA P.06','UN',1,80,1.0000,0,1,3.31,0.0000,2.09,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(121,'121','CAIXA TERMICA 0,400ML','UN',1,80,0.0000,0,0,0.76,0.0000,49.43,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(122,'122','CAFE EM GRAO KG','UN',1,2,1.0000,0,1,25.00,0.0000,25.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(123,'123','LARANJA FRUTA 18 KG','UN',1,15,1.0000,0,1,1.45,0.0000,13.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(124,'124','SACO LIXO 100 LITROS','UN',1,100,1.0000,0,0,15.47,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(125,'125','SMOOTHIE DE ACAI','UN',1,9,1.0000,0,1,0.00,-99.9900,8.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(126,'126','GOIABADA CREMOSA','KG',1,70,1.0000,0,0,4.61,657.3800,34.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(127,'127','UVA PASSA','KG',1,70,1.0000,0,0,8.89,317.9600,34.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(128,'128','CAFE DA MANHA','UN',1,8,1.0000,0,1,9.30,39.7800,13.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(129,'129','SABONETELIQUIDO  PEROLADO','LT',1,100,1.0000,0,0,14.35,0.0000,14.35,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(130,'130','POLPA MORANGO 4 KG','KG',1,70,1.0000,0,1,7.34,406.0200,34.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(131,'131','GUARDANAPO PEROLA 27,5/32','UN',1,100,1.0000,0,0,1.80,0.0000,1.42,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(132,'132','ALCOOL LT','UN',1,100,1.0000,0,0,3.24,0.0000,3.24,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(133,'133','MASSA BRIGADEIRO','UN',1,70,0.0000,0,0,12.39,0.0000,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(134,'134','POTE COPAZA 250ML','UN',1,1,0.0000,0,0,0.08,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(135,'135','COPO VANESA','UN',1,80,0.0000,0,0,0.00,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(136,'136','HOT AFRICANO','UN',1,1,0.3000,0,1,4.50,244.4400,15.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(137,'137','PETITGATEAU','KG',1,6,0.0000,0,0,28.00,0.0000,28.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(138,'138','BANANA COM LEITE','UN',1,5,1.0000,0,1,2.50,100.0000,5.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(139,'139','MAÇA COM LEITE','UN',1,5,1.0000,0,1,2.50,100.0000,5.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(140,'140','MAMÃO COM LEITE','UN',1,5,1.0000,0,1,2.50,180.0000,7.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(141,'141','MORANGO COM LEITE','UN',1,5,1.0000,0,1,2.75,310.9100,11.30,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(142,'142','ÁGUA DE COCO','UN',1,14,1.0000,0,1,2.00,75.0000,3.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(143,'143','CHÁ GELADO- MATE LEÃO','UN',1,14,1.0000,0,1,2.25,100.0000,4.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(144,'144','REFRIGERANTE LATA','UN',1,14,1.0000,0,1,1.50,133.3300,3.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(145,'145','CHOCOLATE','UN',1,14,1.0000,0,1,4.00,0.0000,4.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(146,'146','FLAMBADO DE BANANA','UN',1,13,1.0000,0,1,5.40,416.6700,27.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(147,'147','SALADA DE FRUTAS COM CHANTILLY','UN',1,13,1.0000,0,1,2.90,365.5200,13.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(148,'148','CAFÉ COM CHANTILLY E CANELA','UN',1,2,1.0000,0,1,1.65,187.8800,4.75,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(149,'149','CAFÉ GELADO','UN',1,2,1.0000,0,1,3.75,180.0000,10.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(150,'150','CAPUCCINO','UN',1,2,1.0000,0,1,2.25,33.3300,3.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(151,'151','CAPUCCINO COM CHANTILLY','UN',1,2,1.0000,0,1,2.40,170.8300,6.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(152,'152','CANELA','GR',1,6,0.0000,0,0,1.30,0.0000,1.30,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:30',NULL),(153,'153','PÁ DE LIXO','UN',1,100,0.0000,0,0,1.36,0.0000,1.36,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(154,'154','VASSOURA','UN',1,100,0.0000,0,0,7.19,0.0000,7.19,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(155,'155','RODO','UN',1,100,0.0000,0,0,2.96,0.0000,2.96,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(156,'156','CAIXA TÉRMICA STYROC','UN',1,80,0.0000,0,0,26.46,0.0000,15.69,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(157,'157','CAIXA TERMICA STYROC 2','UN',1,80,0.0000,0,0,38.61,0.0000,26.46,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(158,'158','SACO A LEITOSA EXPK 100','UN',1,80,1.0000,0,0,3.41,0.0000,3.41,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(159,'159','SABONETE ERVA DOCE','GR',1,100,0.0000,0,0,4.66,0.0000,4.66,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(160,'160','DADU GUARDANAPO TV 2000','UN',1,80,1.0000,0,0,5.49,0.0000,5.49,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(161,'161','COPO TRANSLUCIDO 500 ML VIAGEM','UN',1,80,1.0000,0,1,6.51,0.0000,6.51,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(162,'162','TAMPA TRANSLUCIDO','UN',1,80,1.0000,0,1,3.64,0.0000,3.64,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(163,'163','MELANCIA FRUTA','UN',1,11,1.0000,0,0,13.70,0.0000,13.70,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(164,'164','MORANGO FRUTA','UN',1,11,1.0000,0,0,2.39,0.0000,2.39,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(165,'165','MAÇA FRUTA KG','KG',1,11,0.0000,0,0,7.45,0.0000,7.45,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(166,'166','BANANA FRUTA KG','KG',1,11,0.0000,0,0,4.50,0.0000,4.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(167,'167','LIMÃO FRUTA KG','KG',1,110,0.0000,0,0,5.47,0.0000,5.47,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(168,'168','MAMÃO FORMOSA FRUTA KG','UN',1,11,0.0000,0,0,7.07,0.0000,7.07,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(169,'169','PÃO NUTRELLA','UN',1,8,0.0000,0,0,4.49,0.0000,4.49,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(170,'170','MENTOS BALA','UN',1,6,1.0000,0,1,0.00,-99.9900,1.80,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(171,'171','TORTINHA','UN',1,13,0.0000,0,1,0.00,-99.9900,3.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(172,'172','ESFIHA','UN',1,12,0.0000,0,1,0.00,-99.9900,3.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(173,'173','BOLO CASEIRO','UN',1,13,0.0000,0,1,0.00,-99.9900,4.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(174,'174','TROPICÓLIA','UN',1,13,0.0000,0,1,9.00,111.1100,19.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(175,'175','PICOLÉ WHEY','UN',1,1,0.0000,0,0,3.90,51.2800,5.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(176,'176','PICOLE WHEN','UN',1,1,0.0000,0,0,0.00,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(177,'177','PICOLE WHEN','UN',1,1,0.0000,0,1,5.90,0.0000,5.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(178,'178','POTE WHEN','UN',1,1,0.0000,0,1,14.90,0.0000,14.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(179,'179','CROASSANT','UN',1,8,0.0000,0,1,3.00,0.0000,3.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(180,'180','ESFIRRA DE CARNE','UN',1,8,0.0000,0,0,3.00,0.0000,3.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(181,'181','BOMBOM','UN',1,1,0.0000,0,1,0.50,50.0000,0.75,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(182,'204','PIRULITO BIG BIG C/50UN','UN',1,6,0.0000,0,1,0.10,257.1400,0.25,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(183,'960','PAZINHA DE MADEIRA CAIXA','UN',1,80,0.0000,0,0,26.22,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(184,'962','XAROPE DE GUARANA','UN',1,9,1.0000,0,0,28.80,-99.9500,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(185,'970','CAPSULAS DE GAZ UNIDADE','UN',1,80,0.0000,0,0,2.02,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(186,'978','CERA','UN',1,100,0.0000,0,0,14.77,0.0000,53.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(187,'979','COCA COLA LATA','UN',1,3,0.0000,0,1,0.90,70.0000,3.00,0.00,0.0000,0.0000,1,'Coca Lata','2016-03-25 16:16:33','2016-03-29 20:50:38'),(188,'999','ACAI GLOBAL','KG',1,9,0.0000,0,0,11.67,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(189,'1000','SORVETE MASSA GLOBAL','KG',1,60,1.0000,0,1,16.80,43.0508,29.50,0.00,0.0000,0.0000,0,'','2016-03-25 16:16:33','2016-03-25 17:51:41'),(190,'1001','SORVETE ATACADO','UN',1,1,0.0000,0,1,14.90,64.4300,24.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(191,'1003','CASQUINHA DE BIJU UNIDADE','UN',1,7,0.0000,0,1,0.31,111.9500,13.51,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(192,'1007','CASCAO UNIDADE','UN',1,7,0.0000,0,1,0.51,138.1000,0.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(193,'1008','LEQUINHO QUILO','KG',1,70,0.0000,0,0,20.00,0.0000,14.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(194,'1105','CAIXA TERMICA 1KG UNIDADE','UN',1,80,0.0000,0,1,0.94,-1.1100,0.37,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(195,'1106','CAIXA TERMICA 500G UNIDADE','UN',1,80,0.0000,0,0,0.00,13.1500,0.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(196,'1108','CAIXA TERMICA 1,5KG UNIDADE','UN',1,80,0.0000,0,1,0.94,80.3300,1.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(197,'1109','BANDEIJA DE ISOPOR UNIDADE','UN',1,80,0.0000,0,1,14.73,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(198,'1110','COLHER DESCARTAVEL COLORIDA','UN',1,80,0.0000,0,1,20.47,0.0000,3.39,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(199,'1111','GUARDANAPO P/TV','UN',1,80,0.0000,0,0,5.35,0.0000,4.10,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(200,'1209','WAFFER CANUDO POR PESO','KG',1,70,1.0000,0,0,15.30,106.8000,27.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(201,'1215','GRANOLA PACOTE 30 GR','KG',1,9,0.0000,0,1,28.90,-68.2100,1.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(202,'1216','CASTANHA CAJU FINA OU INTEIRA KILO','KG',1,70,1.0000,0,0,23.66,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(203,'1249','BALA DE YOGURTE UNIDADE C/120','UN',1,6,0.0000,0,1,10.00,139.2300,0.10,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:33',NULL),(204,'2003','CEREJAS ENTRADA POR KILO','KG',1,70,1.0000,0,1,20.99,61.8800,28.55,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(205,'2901','DETERGENTE','UN',1,100,0.0000,0,1,0.79,0.0000,0.69,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(206,'2903','POTE OVAL SUNNYVALLE','UN',1,80,0.0000,0,0,47.98,0.0000,8.52,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(207,'2904','POTE OVAL DE ISOPOR','UN',1,80,0.0000,0,0,0.05,0.0000,0.05,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(208,'2905','POTE OVAL FUNDO N.15 C/10','UN',1,80,0.0000,0,0,0.55,0.0000,0.55,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(209,'2908','DESINFETANTE/CLORO/AGUA SANITARIA','UN',1,100,0.0000,0,0,2.19,0.0000,1.07,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(210,'2909','CENOURA KG','KG',1,110,0.0000,0,0,2.89,0.0000,2.89,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(211,'2918','BOMBOM SONHO DE VALSA UN','UN',1,70,0.0000,0,1,13.99,-94.6300,0.75,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(212,'5002','MORANGO SPLITE','UN',1,1,1.0000,0,1,3.50,328.5700,15.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(213,'5008','ACAI MEDIO 500 GR','UN',1,9,0.5000,0,1,5.00,270.0000,18.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(214,'5056','HULA HULA  3 BOLAS','UN',1,1,0.4000,0,1,7.00,400.0000,35.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(215,'5057','SALADA DE FRUTA SEM SORVETE','UN',1,15,1.0000,0,1,2.00,380.0000,9.60,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(216,'5059','COMPLEMENTO ACAI','UN',1,9,1.0000,0,1,0.20,900.0000,2.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(217,'5064','CESTÃO UNIDADE','UN',1,1,1.0000,0,1,0.25,85.7100,0.65,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(218,'9904','CANUDINHO TRUFADO','UN',1,70,0.0000,0,0,16.80,-99.9900,2.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(219,'9909','CHICLETES CAIXINHA PLETS COM 2 UN','UN',1,6,1.0000,0,1,0.11,66.6700,0.25,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(220,'12031','SUCO DE ABACAXI COM HOTELA','UN',1,15,0.0000,0,1,1.00,350.0000,4.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(221,'50001','MEL DE LARANJEIRA 1 LITRO','UN',1,9,1.0000,0,1,12.30,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(222,'50480','MORANGO COMPLEMENTO ACAI','UN',1,9,0.0000,0,1,0.50,200.0000,1.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(223,'50481','MEL COMPLEMENTO ACAI','UN',1,9,1.0000,0,1,0.75,100.0000,1.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(224,'50482','GRANOLA COMPLEMENTO ACAI','UN',1,9,1.0000,0,1,0.47,219.1500,1.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(225,'50483','SAL FRUTA COMPLEMENTO ACAI','UN',1,9,1.0000,0,1,0.50,200.0000,1.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(226,'50484','COMPLEMENTO ACAI SORVETE','UN',1,9,0.1500,0,1,1.30,92.3100,2.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(227,'50485','LEITE CONDENSADO COMPLEMENTO ACAI','UN',1,9,1.0000,0,1,0.50,200.0000,1.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(228,'50486','OVOMALTINE COMPLEMENTO ACAI','UN',1,9,0.0000,0,1,4.80,500.0000,1.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(229,'50487','LEITE ANINHO COMPLEMENTO ACAI','UN',1,9,1.0000,0,1,0.50,200.0000,1.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(230,'50488','AMORA COMPLEMENTO ACAI','UN',1,9,1.0000,0,1,0.50,200.0000,1.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(231,'50489','BANANA EM RODELAS','UN',1,9,0.1700,0,0,0.25,500.0000,1.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(232,'50490','ACAI BALDE  KG','KG',1,9,1.0000,0,1,11.67,54.2900,18.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(233,'878705','MILK SHAKE 500 ML','UN',1,1,0.2000,0,1,3.50,314.2900,14.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(234,'1000000','FONDUE','UN',1,13,1.0000,0,1,0.00,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(235,'1000788','COCA COLA 600 ML ZERO','UN',1,3,0.0000,0,1,1.82,39.3333,3.00,0.00,0.0000,0.0000,1,'Coca Zero 600ML','2016-03-25 16:16:35','2016-03-29 20:50:30'),(236,'7891000004180','LEITE DCONDENSADO 400 GR','UN',1,70,0.4000,0,0,4.12,353.7300,11.57,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(237,'7891000004234','RECHEIO DE CHOCOLATE NESTLE 2,54','UN',1,70,1.0000,0,0,10.03,251.8700,31.07,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(238,'7894900011517','COCA COLA 2LT','UN',1,3,0.0000,0,1,3.69,24.6939,4.90,0.00,0.0000,0.0000,1,'Coca 2LT','2016-03-25 16:16:35','2016-03-29 20:50:08'),(239,'7894900011609','COCA COLA 600ML','UN',1,3,0.0000,0,1,1.82,39.3333,3.00,0.00,0.0000,0.0000,1,'Coca 600ML','2016-03-25 16:16:35','2016-03-29 20:49:55'),(240,'7894900014174','COCA -COLA 1,5 LTS','UN',1,3,0.0000,0,1,2.19,37.4286,3.50,0.00,0.0000,0.0000,1,'Coca 1,5 LTS','2016-03-25 16:16:35','2016-03-29 20:49:43'),(241,'7894900030013','FANTA LARANJA LATA 350ML','UN',1,3,0.0000,0,1,1.27,136.2200,3.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(242,'7894900060010','SPRITE LATA 350ML','UN',1,3,0.0000,0,1,1.39,92.3100,3.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(243,'7894900130010','COCA COLA LATA  ZERO','UN',1,3,0.0000,0,1,1.19,60.3333,3.00,0.00,0.0000,0.0000,1,'Coca Lata Zero','2016-03-25 16:16:35','2016-03-29 20:49:28'),(244,'7894900320015','SCHWEPPEES 350ML','UN',1,3,1.0000,0,1,0.67,130.1800,3.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(245,'7895800300145','HALLS TODOS','UN',1,6,0.0000,0,1,0.41,385.5500,2.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(246,'7896058511086','DISQUETI COLORIDO 1 KG','UN',1,70,1.0000,0,0,15.31,106.8000,29.50,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(247,'7896072641653','CHOCO POWER AO LEITE 500 GR','UN',1,70,0.0000,0,0,9.41,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(248,'7896395101339','COBERTURA CARAMELO 3F 7 KG','UN',1,70,1.0000,0,1,13.24,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(249,'7896395102206','COBERTURA PARA TACA 3F 7 KG','KG',1,70,1.0000,0,0,4.05,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(250,'7896411804503','TOPPING 400 GR PARA CHANTILLY','UN',1,70,0.0000,0,1,7.32,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(251,'7896979500244','COPO P07 250 ML WHISK COPAZA','UN',1,80,1.0000,0,0,3.39,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(252,'7896979500251','POTE 500 ML P08 COPAZA','UN',1,80,0.0000,0,0,0.08,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(253,'7896979501227','COPO 200 ML COPAZA','UN',1,80,0.0000,0,0,2.90,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(254,'7897077800014','GRANULADO HARALD COLORIDO','UN',1,70,1.0000,0,0,6.42,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:35',NULL),(255,'7897077800731','COBERTURA HARALDE DE CHOCOLATE SKIMO','UN',1,70,4.0000,0,0,10.73,366.1700,27.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:37',NULL),(256,'7897077801790','GOTA CHO CHIP HARALD','UN',1,70,1.0000,0,0,10.77,350.0000,27.90,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:37',NULL),(257,'7898173930315','AMENDOIM GRANULADO INAN','UN',1,70,1.0000,0,0,8.05,-99.9900,0.00,0.00,0.0000,0.0000,0,NULL,'2016-03-25 16:16:37',NULL);
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
  `quantidade` float(12,4) DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicoes`
--
-- ORDER BY:  `id`

LOCK TABLES `requisicoes` WRITE;
/*!40000 ALTER TABLE `requisicoes` DISABLE KEYS */;
INSERT  IGNORE INTO `requisicoes` (`id`, `numero_documento`, `data`, `produto_id`, `tipo`, `quantidade`, `motivo`, `created`, `modified`) VALUES (1,'1','2016-03-10',1,1,1000.0000,'','2016-03-11 02:13:32','2016-03-11 02:13:32'),(2,'2','2016-03-10',1,2,50.0000,'','2016-03-11 02:15:21','2016-03-11 02:15:21'),(3,'3','2016-03-25',2,1,10.0000,'add','2016-03-25 17:50:32','2016-03-25 17:50:32'),(4,'4','2016-03-25',2,2,4.0000,'sub','2016-03-25 17:51:41','2016-03-25 17:51:41');
/*!40000 ALTER TABLE `requisicoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `terminais`
--

DROP TABLE IF EXISTS `terminais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `terminais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(500) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terminais`
--
-- ORDER BY:  `id`

LOCK TABLES `terminais` WRITE;
/*!40000 ALTER TABLE `terminais` DISABLE KEYS */;
INSERT  IGNORE INTO `terminais` (`id`, `nome`, `ip`, `created`, `modified`) VALUES (1,'Default','','2016-03-16 20:23:56','2016-03-16 20:23:56');
/*!40000 ALTER TABLE `terminais` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-29 21:51:44
