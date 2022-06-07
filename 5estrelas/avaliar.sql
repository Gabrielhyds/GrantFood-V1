CREATE DATABASE avaliar;
USE avaliar;


CREATE TABLE avaliacao(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	qtdEstrela CHAR(1) NOT NULL ,
	data_hora DATETIME NOT NULL

);


SELECT * FROM avaliacao