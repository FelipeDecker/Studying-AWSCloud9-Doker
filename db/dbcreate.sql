USE univille

CREATE TABLE `usuario` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `sobrenome` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  `sexo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
);



GRANT ALL PRIVILEGES ON univille.* TO 'bob'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;

INSERT INTO `usuario` (nome, sobrenome, email, senha, sexo)
VALUES ('felipe', 'decker', 'felipe@hotmail.com', '123', 'F');

