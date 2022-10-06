drop database if exists db_fitnessmanager;
create database db_fitnessmanager;
use db_fitnessmanager;

create table tb_funcionarios(
fun_codigo int auto_increment,
fun_cpf varchar(15) not null,
fun_senha varchar(20) not null,
fun_nome varchar(100) not null,
fun_tipo int(1) not null,
fun_melhoremail varchar(100) not null,
fun_telefoneprincipal varchar(15) not null,
 constraint pk_funcionarios primary key (fun_codigo)
);

create table tb_clientes(
cli_codigo int auto_increment,
cli_nome varchar(100) not null,
cli_cpf varchar(15) not null,
cli_idade int not null,
cli_melhoremail varchar(100) ,
cli_telefoneprincipal varchar(15) ,
constraint pk_clientes primary key (cli_codigo)
);

create table tb_consultaclientes(
cnc_codigo int auto_increment,
cnc_cli_codigo int not null,
cnc_fun_codigo int not null,
constraint pk_consultaclientes primary key (cnc_codigo),
constraint fk_cli_cnc foreign key (cnc_cli_codigo) references tb_clientes (cli_codigo),
constraint fk_fun_cnc foreign key (cnc_fun_codigo) references tb_funcionarios (fun_codigo)
);

create table tb_maquinas(
maq_codigo int auto_increment,
maq_nome varchar(50),
constraint pk_maquinas primary key (maq_codigo)
);

create table tb_avaliacaomaquinas(
avm_codigo int auto_increment,
avm_fun_codigo int not null,
avm_maq_codigo int not null,
avm_estadodeconservacao int(1) not null,
constraint pk_avaliacaomaquinas primary key (avm_codigo),
constraint fk_maq_avm foreign key (avm_maq_codigo) references tb_maquinas (maq_codigo),
constraint fk_fun_avm foreign key (avm_fun_codigo) references tb_funcionarios (fun_codigo)
);

insert into tb_funcionarios (fun_nome, fun_cpf, fun_senha, fun_tipo, fun_melhoremail, fun_telefoneprincipal)
values
('Arthur', '666.777.000-22', '123', 1, 'arthurgoku@gmail.com', '(84)92222-2222'),
('Julio', '666.888.000-22', '456', 2, 'juliouchiha@gmail.com', '(84)93333-3333'); 

insert into tb_clientes (cli_nome, cli_cpf, cli_idade, cli_melhoremail, cli_telefoneprincipal)
values
('Samuel', '556.777.000-22', 22, 'samueld@gmail.com', '(84)92222-2222'),
('Julio', '666.888.000-22',  19,null, null); 

insert into tb_maquinas(maq_nome)
values
('Supino'),
('Leg Press');

insert into tb_avaliacaomaquinas(avm_fun_codigo, avm_maq_codigo, avm_estadodeconservacao)
values
( 1,2,2),
(1,1, 1);

