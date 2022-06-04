CREATE DATABASE grantFood;
USE grantFood;

-- funcionario 
create table usuario(
    idFunc int primary KEY auto_increment,
    nome varchar(100),
    tipo VARCHAR(15), 
    senha VARCHAR(100),
    usuario varchar(40),
    genero varchar(20),
    cpf char(11),
    salario decimal(7,2),
    cargaHoraria int , 
    ponto varchar(15),
    dica varchar(50)
);



ALTER TABLE usuario modify tipo VARCHAR(15);
DESC usuario
INSERT INTO usuario (idFunc,nome,tipo,senha,usuario,genero,cpf,salario,cargaHoraria,ponto,dica) VALUES(1,"Gabriel",1,"123456","gabrielhyds","masculino","1234567890",1000.00,5,4,"Josefina");
SELECT * FROM usuario WHERE usuario = 'gabrielhyds' && dica = 'josefina'

DROP TABLE endereco,telefone,usuario;
create table endereco(
    idEndereco int primary key auto_increment,
    cep CHAR(9),
    logradouro varchar(100),
    bairro varchar(100),
    cidade varchar(50),
    estado char(2),
    complemento varchar(50),
    codEndereco int ,
    numero INT,
    foreign key(codEndereco) references usuario(idFunc)
);
INSERT INTO endereco (cep,logradouro,bairro,cidade,estado,complemento,codEndereco,numero) VALUES('13184556',"sebastina ramos","jd santana","hortolandia","sp","",1,49);
SELECT * FROM endereco
DELETE FROM `endereco`,`usuario`,`telefone` WHERE idEndereco = '5' && idFunc = '5' && id = '5'
create table telefone(
    id int primary key auto_increment,
    ddd char(3),
    telefone varchar(9),
    tipo varchar(15),
    codTelefone INT , 
    foreign key(codTelefone) references usuario(idFunc)
);

INSERT INTO telefone (ddd,telefone,tipo,codTelefone) VALUES('11','99999999','Residencial','1');
SELECT * FROM telefone

create table gastos(
    id int primary key auto_increment,
    estoque decimal(7,2),
    salario decimal(7,2),
    utensilios decimal(7,2),
    conta decimal(7,2),
    manutencaoGeral decimal(7,2)
);

-- CARDAPIO
create table mesa(
	numero int(11) primary key,
	STATUS varchar(30) DEFAULT NULL,
	link varchar(255) DEFAULT NULL,
	qtdUsada int(11) DEFAULT NULL
);

CREATE TABLE sessao (
  codSessao varchar(30) primary key,
  codMesa int(11) DEFAULT NULL,
  dataHora datetime DEFAULT NULL,
  foreign key(codMesa) references mesa(numero)
);

create table produtos(
    id int(5) NOT NULL primary key auto_increment,
	nome varchar(100) NOT NULL,
	descricao varchar(255) DEFAULT NULL,
	image varchar(255) NOT NULL,
	preco double(10,2) NOT NULL,
	categoria varchar(233) NOT NULL
);

create table pedido(
    id int(5) NOT NULL primary key auto_increment,
	sessao varchar(255) NOT NULL,
	mesa int(11) NOT NULL DEFAULT 0,
	preco double(10,2) NOT NULL,
	status varchar(255) NOT NULL DEFAULT 'Enviado',
	numero int(255) NOT NULL,
	data varchar(50) NOT NULL,
    foreign key(mesa) references mesa(numero),
    foreign key(sessao) references sessao(codSessao)
);

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

-- gerente/adm
create table relatorioVendas(
    id int primary key auto_increment,
    idGastos int,
    idMesa int,
    foreign key(idGastos) references gastos(id),
    foreign key(idMesa) references mesa(numero)
);

-- cliente.
create table pedidoCliente(
    id int primary key auto_increment,
    obs varchar(255),
    cupomPromocao varchar(15)
);

create table fechaConta(
    id int primary key auto_increment,
    formaPagamento varchar(50)
);

create  table avaliar(
    id int primary key auto_increment,
    qtdEstrela char(5),
    idPedido int,
    foreign key(idPedido) references pedido(id)
);
