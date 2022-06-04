CREATE DATABASE grantFood;
use grantFood;


CREATE TABLE `sistema` (
  `id` int(5) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `pedidos` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `sistema` (`id`, `status`, `pedidos`) VALUES
(1, 'On', 0);

-- CARDAPIO
create table mesa(
	numero int(11) primary key,
	STATUS varchar(30) DEFAULT NULL,
	link varchar(255) DEFAULT NULL,
	qtdUsada int(11) DEFAULT NULL
);

insert into mesa VALUES (6, 1, 'google.com', 0);

CREATE TABLE sessao (
  codSessao varchar(30) primary key,
  codMesa int(11) DEFAULT NULL,
  dataHora datetime DEFAULT NULL,
  foreign key(codMesa) references mesa(numero)
);


DELIMITER $$
	CREATE TRIGGER tgr_sessao_delete AFTER DELETE
    ON sessao
    FOR EACH ROW
    BEGIN
		INSERT INTO logSessao (codSessao,codMesa,dataHora) VALUES (old.codSessao, old.codMesa, old.dataHora);
    END $$
DELIMITER ;


create table logSessao(
  codSessao varchar(30) primary key,
  codMesa int(11) DEFAULT NULL,
  dataHora datetime DEFAULT NULL
);


create table produtos(
    id int(5) NOT NULL primary key auto_increment,
	nome varchar(100) NOT NULL,
	descricao varchar(255) DEFAULT NULL,
	image varchar(255) NOT NULL,
	preco double(10,2) NOT NULL,
	categoria varchar(233) NOT NULL
);

SELECT * FROM pedido;
insert INTO PRODUTOS VALUES (1,'Batata', 'batata e creme', 'Batata.png', 24.00, 'fries');
insert INTO PRODUTOS VALUES (2,'Pizza Frango', 'frango', 'Pizza Frango.png', 55.00, 'pizza');

create table pedido(
   id int NOT NULL primary key,
	sessao varchar(255) NOT NULL,
	mesa int NOT NULL DEFAULT 0,
	preco double(10,2) NOT NULL,
	status varchar(255) DEFAULT 'Enviado',
	data varchar(50) NOT NULL,
    foreign key(mesa) references mesa(numero),
    foreign key(sessao) references sessao(codSessao)
);

create table logPedido(
	id int NOT NULL primary key auto_increment,
	sessao varchar(255) NOT NULL,
	mesa int NOT NULL DEFAULT 0,
	preco double(10,2) NOT NULL,
    data varchar(50) NOT NULL
);

DELIMITER $$
	CREATE TRIGGER tgr_pedido_delete AFTER DELETE
    ON pedido
    FOR EACH ROW
    BEGIN
		INSERT INTO logPedido (sessao,mesa,preco,data) VALUES (old.sessao, old.mesa, old.preco, old.data);
    END $$
DELIMITER ;

create table pedidoitem(
   id int(5) NOT NULL primary key auto_increment,
   mesa int(50) NOT NULL,
   codPedido int(5) NOT NULL,
   sessao varchar(50) NOT NULL,
   item varchar(255) NOT NULL,
   quantidade varchar(50) NOT NULL DEFAULT 0,
   preco double(10,2) NOT NULL,
   total varchar(50) NOT NULL DEFAULT 0,
   foreign key(codPedido) references pedido(id),
   foreign key(mesa) references mesa(numero),
   foreign key(sessao) references sessao(codSessao)
);


create table logPedidoItem(
	id int NOT NULL primary key auto_increment,
	mesa int(50) NOT NULL,
   codPedido int(5) NOT NULL,
   sessao varchar(50) NOT NULL,
   item varchar(255) NOT NULL,
   quantidade varchar(50) NOT NULL DEFAULT 0,
   preco double(10,2) NOT NULL,
   total varchar(50) NOT NULL DEFAULT 0
);


DELIMITER $$
	CREATE TRIGGER tgr_pedidoitem_delete AFTER DELETE
    ON pedidoitem
    FOR EACH ROW
    BEGIN
		INSERT INTO logPedidoItem (mesa,codPedido,sessao,item,quantidade,preco,total) VALUES (old.mesa, old.codpedido, old.sessao,old.item,old.quantidade, old.preco, old.total);
    END $$
DELIMITER ;


-- gerente/adm
create table fechaConta(
    id int primary key auto_increment,
    codPedido INT,
    formaPagamento varchar(50),
    DATA DATETIME
);

create  table avaliar(
    id int primary key auto_increment,
    qtdEstrela char(5),
    idPedido int,
    foreign key(idPedido) references pedido(id)
);


select * from pedidoitem;
SELECT * FROM pedido;
SELECT * FROM sistema;
SELECT id FROM pedidoite;
select * from mesa;
select * from sessao;

DELETE FROM sessao WHERE codMesa = 3;

SHOW TRIGGERs;