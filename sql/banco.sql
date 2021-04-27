create database fatec_web3_2021;

use fatec_web3_2021;

CREATE TABLE categoria (
  id int NOT NULL AUTO_INCREMENT,
  descricao varchar(150) DEFAULT NULL,
  data_cadastro timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

CREATE TABLE produto (
  id int AUTO_INCREMENT,
  id_categoria int,
  descricao varchar(255),
  preco double,
  data_cadastro timestamp default CURRENT_TIMESTAMP,
  PRIMARY key (id),
  FOREIGN KEY (id_categoria) references categoria(id)
);

CREATE TABLE usuario (
  id int NOT NULL AUTO_INCREMENT,
  nome varchar(150) DEFAULT NULL,
  usuario varchar(150) DEFAULT NULL,
  senha varchar(150) DEFAULT NULL,
  data_cadastro timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);