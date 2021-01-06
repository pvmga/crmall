create database crmall character set UTF8 collate utf8_general_ci

create table clientes 
(
	codigo integer auto_increment primary key, 
	nome varchar(50), 
	data_nascimento date, 
	sexo char(1),
    cep varchar(9),
    endereco varchar(100),
    numero varchar(10),
    complemento varchar(100),
    bairro varchar(50),
    estado char(2),
    cidade varchar(50)
)


INSERT INTO `clientes` (`codigo`, `nome`, `data_nascimento`, `sexo`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `estado`, `cidade`) VALUES ('1', 'Paulo Vinicius', '1993-07-17', 'M', '87047-570', 'Av. das industrias','1060', 'Bloco 3 apartamento 607', 'Jardim America', 'PR', 'Maringá');