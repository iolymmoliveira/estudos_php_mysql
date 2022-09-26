CREATE DATABASE ecommerce;

USE ecommerce;

CREATE TABLE USUARIOS (
	ID int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Nome varchar(100) NOT NULL,
    Email varchar(100) NOT NULL,
    Senha varchar(100) NOT NULL,
    Endereco varchar(100) NOT NULL
);

CREATE TABLE PRODUTOS (
	ID int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Descricao varchar(250) NOT NULL,
    Valor double NOT NULL,
    Categoria varchar(100),
    Quantidade double NOT NULL
);

CREATE TABLE PEDIDOS (
	ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Valor DOUBLE NOT NULL,
    Status VARCHAR(100),
    Usuario_ID INT NOT NULL,
    FOREIGN KEY (Usuario_ID) REFERENCES Usuarios(ID)
);

CREATE TABLE CARRINHOS (
	ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    QUANTIDADE DOUBLE NOT NULL,
    USUARIO_ID INT NOT NULL,
    PRODUTO_ID INT NOT NULL,
    FOREIGN KEY (USUARIO_ID) REFERENCES USUARIOS(ID),
    FOREIGN KEY (PRODUTO_ID) REFERENCES PRODUTOS(ID)
);

CREATE TABLE PEDIDOS_PRODUTOS (
	ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    VALOR DOUBLE NOT NULL,
    PRODUTO_ID INT NOT NULL,
    PEDIDO_ID INT NOT NULL,
    FOREIGN KEY (PRODUTO_ID) REFERENCES PRODUTOS(ID),
    FOREIGN KEY (PEDIDO_ID) REFERENCES PEDIDOS(ID)
);