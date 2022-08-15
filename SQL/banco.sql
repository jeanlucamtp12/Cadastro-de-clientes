CREATE DATABASE registros

CREATE TABLE `clientes` (
  `ID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `Nome` varchar(255) NOT NULL,
  `Nascimento` date  NOT NULL,
  `CPF` bigint(11)  NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Celular` bigint(12) NOT NULL,
  `Endereco` varchar(255)  NOT NULL,
  `Obs` varchar(300)
) 

