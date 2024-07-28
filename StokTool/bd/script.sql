create database stoktool;
use stoktool;
/*create table LOGIN(
    NOME varchar(45) not null,
    USUARIO varchar(45) not null primary key,
    SENHA varchar(60) not null,
    TIPO varchar(10) not null  
    ) engine=InnoDB default charset=utf8;
    select * from login;*/
    create table LOGIN(
    USUARIO varchar(45) not null primary key,
    SENHA varchar(60) not null,
    TIPO varchar(10) not null,
    ATIVO varchar(10) default 'true'
    ) engine=InnoDB default charset=utf8;

	select * from vendedor;

create table VENDEDOR(
    CPF bigint not null primary key,
    NOME varchar(45) not null,
    USUARIO varchar(45) not null,
    FOREIGN KEY (USUARIO) REFERENCES LOGIN(USUARIO)
    ) engine=InnoDB default charset=utf8;
    
     /*ALTER TABLE vendedor DROP COLUMN TELEFONE;
       select * from vendedor;
        insert into vendedor(cpf,nome,telefone,usuario) values (46832493835,'Vinicius Rodrigues','11111111','vinirod');
      create table VENDEDOR(
    CPF bigint(11) primary key not null,
    NOME varchar(45) not null,
    TELEFONE int null
    ) engine=InnoDB default charset=utf8;*/

create table CLIENTE(
    CPFCNPJ bigint primary key not null,
    NOME_C varchar(50) not null,
    LOGRADOURO varchar(50),
    TELEFONE varchar(20),
    ATIVO varchar (10) default 'true'
    ) engine=InnoDB default charset=utf8;
    /*insert into cliente(cpfcnpj,nome,logradouro,telefone)
    values(53201706000188,'Start Adega e conveniencia','Rua doutor Serafin Vieira de Almeida 700',1639811977);
    ALTER TABLE CLIENTE CHANGE COLUMN NOME NOME_C varchar(50);

    ALTER TABLE CLIENTE MODIFY COLUMN TELEFONE VARCHAR(20);

    
    select * from cliente;
    
create table VENDA(
    NF int primary key auto_increment not null,
    DATAVENDA  datetime(6),
    CPF int not null,
    CPFCNPJ bigint not null,
    FOREIGN KEY (CPF) REFERENCES VENDEDOR(CPF),
    FOREIGN KEY (CPFCNPJ) REFERENCES CLIENTE(CPFCNPJ)
    ) engine=InnoDB default charset=utf8;
create table ITEM_VENDA(
    FOREIGN KEY (COD_PROD) REFERENCES PRODUTO(COD_PROD),
    COD_PROD int not null,
    QTD_VENDA int
    ) engine=InnoDB default charset=utf8;*/
    
    
create table PRODUTO(
    COD_PROD int auto_increment primary key,
    NOME varchar(45) not null,
    IMAGEM varchar(70) DEFAULT NULL,
    VALOR int,
    QTD_ESTOQ int,
    ATIVO varchar(10) DEFAULT "true"
    ) engine=InnoDB default charset=utf8;
    /*select * from produto;
    update produto set qtd_estoq = 100 where cod_prod = 1;

alter table cliente add column ativo varchar (10)default 'true';

alter table carrinho add column cpfcnpj bigint,
add foreign key (cpfcnpj) references cliente(cpfcnpj);

select * from carrinho;

ALTER TABLE vendedor ADD column USUARIO varchar(45) not null;
ALTER TABLE vendedor ADD FOREIGN KEY (usuario) REFERENCES login(usuario);
 
select * from  item_carrinho;*/

CREATE TABLE CARRINHO (
    COD_CARRINHO INT AUTO_INCREMENT PRIMARY KEY,
    CPF VARCHAR(20) NOT NULL,
    CPFCNPJ VARCHAR(20) NOT NULL,
    ATIVO varchar(10) DEFAULT "true",
    FOREIGN KEY (CPF) REFERENCES VENDEDOR(CPF),
	FOREIGN KEY (CPFCNPJ) REFERENCES CLIENTE(CPFCNPJ)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
create table item_Carrinho(
	cod_itemcarrinho int auto_increment primary key,
	cod_carrinho int,
	foreign key(cod_carrinho) references carrinho(cod_carrinho),
	cod_prod int not null,
	valor_total int,
	qtd int not null,
	foreign key(cod_prod) references produto(cod_prod)
);
/*
SELECT cpfcnpj, nome_c, logradouro, telefone from cliente where ativo = 'true' order by nome_c desc;

select * from item_carrinho;

ALTER TABLE vendedor ADD column USUARIO varchar(45) not null;
ALTER TABLE vendedor ADD FOREIGN KEY (usuario) REFERENCES login(usuario);
ALTER TABLE vendedor ADD CONSTRAINT id_fk_usuario
FOREIGN KEY(usuario) REFERENCES login (usuario);
select * from vendedor;
ALTER TABLE vendedor modify usuario FOREIGN KEY (USUARIO) REFERENCES LOGIN(USUARIO);
START TRANSACTION;
INSERT INTO login (usuario, senha, tipo) VALUES ("admin3", "seUc7O/85EPvQ", "admin");
update login set cpf=11 where usuario="admin3";
INSERT INTO vendedor (cpf, nome, usuario) VALUES (11, "vini", "admin3");
alter table vendedor drop column usuario;
ALTER TABLE vendedor
DROP FOREIGN KEY fk_vendedor_usuario;
COMMIT;
insert into LOGIN(NOME,USUARIO,SENHA,TIPO)
values('Vinicius Henrique', 'admin10','seUc7O/85EPvQ','admin');
select l.cpf, v.nome, v.cpf from login l inner join vendedor v on l.cpf=v.cpf ;
SELECT login.usuario, login.cpf as 'login', vendedor.cpf as 'vendedor', vendedor.nome FROM login INNER JOIN vendedor ON login.cpf = vendedor.cpf WHERE login.usuario = 'teste1' ;
select * from vendedor;
update LOGIN set TIPO='ADMIN' where USUARIO='admin1';
INSERT INTO LOGIN(USUARIO) VALUES ("ADMIN1");
insert into PRODUTO(NOME, VALOR, QTD_ESTOQ,IMAGEM) value ("Beats", 72, 8, "beats.png" );
update PRODUTO set VALOR = 220 where VALOR = 72;
ALTER TABLE PRODUTO modify column imagem varchar(70) default null;
ALTER TABLE PRODUTO ADD COLUMN imagem varchar(70) default null;
update produto set imagem = 'indisponivel.png' where cod_prod = 6;
select nome, valor, imagem as foto from produto order by NOME;
select * from login;

SELECT login.cpf, vendedor.cpf, login.usuario, vendedor.nome, login.senha, login.tipo, login.ativo
FROM login
INNER JOIN vendedor ON login.cpf = vendedor.cpf;
select login.cpf as 'login', vendedor.cpf as 'vendedor', login.usuario, vendedor.nome, login.senha, login.tipo, login.ativo from login inner join vendedor on login.cpf=vendedor.cpf;
alter table login add column ATIVO varchar(10) default 'true';
select vendedor.cpf, login.usuario, login.senha, login.tipo, vendedor.nome from login inner join vendedor on login.usuario = vendedor.usuario where login.usuario='teste1' and vendedor.cpf=1;
select l.cpf as 'cpf Login', v.cpf from login l inner join vendedor v on l.cpf=v.cpf ;
SELECT vendedor.cpf, login.usuario, vendedor.nome, login.ativo, login.tipo FROM vendedor INNER JOIN login ON vendedor.usuario = login.usuario;
SELECT * FROM CARRINHO;
SELECT * FROM item_Carrinho;
select * from produto;
SET SQL_SAFE_UPDATES=0;
update produto set ativo='true' where ativo='ativo';
select * from vendedor;
select * from login;
alter table login  drop column CPF;
    alter table login add foreign key(CPF) references VENDEDOR(CPF);
    alter table login add constraint oi foreign key(cpf) references vendedor(cpf);
    insert into vendedor(cpf) values (12);
select * from usuario;
alter table vendedor drop column usuario;
select l.cpf as 'cpf Login', v.cpf from login l inner join vendedor v on l.cpf=v.cpf ;
SHOW CREATE TABLE vendedor;
drop table vendedor;
alter table login drop foreign key fk_login_cpf;*/