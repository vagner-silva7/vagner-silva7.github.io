# Comandos SQL para modelagem fisica ( criação e tabelas)

## Criar banco de dados

CREATE DATABASE digitacao_de_dados CHARACTER SET utf8mb4;

## Entrar no banco de dados criado

USE DATABASE digitacao_de_dados

## Criar tabela fabricantes FEITOS NA MODELAGEM LOGICA

CREATE TABLE fabricantes(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nome VARCHAR(45) NOT NULL
);

## Criar tabela produtos FEITOS NA MODELAGEM LOGICA

CREATE TABLE produtos(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nome VARCHAR(45) NOT NULL,
    preco DECIMAL(8,2) NOT NULL,
    quantidade SMALLINT NULL,
    descricao TEXT(1000) NOT NULL,
    fabricante_id INT
);

## Alterar a tabela para criar relacionamento por meio da chave estrangeira

ALTER TABLE produtos
    ADD CONSTRAINT fk_produtos_fabricantes
    FOREIGN KEY(fabricante_id) REFERENCES fabricantes(id);