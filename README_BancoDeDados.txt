--Executar no phpMyAdmin EM SQL


-- Criação do banco de dados "dblocadora"
CREATE DATABASE dblocadora;

-- Selecionar o banco de dados em uso
USE dblocadora;

-- Criação da tabela "usuarios"

CREATE TABLE usuarios (
  id_usu INT AUTO_INCREMENT PRIMARY KEY,
  nome_usu VARCHAR(255),
  email_usu VARCHAR(255),
  data_nasc DATE,
  senha_usu VARCHAR(255)
);

-- Criação da tabela "filmes"

CREATE TABLE filmes (
  id_filme INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nome_filme VARCHAR(255),
  genero_filme VARCHAR(100),
  classi_filme VARCHAR(10),
  idioma_filme VARCHAR(50),
  data_lanc_filme DATE,
  duracao_filme INT(11),
  produtura_filme VARCHAR(255),
  caminho_imagem VARCHAR(255)
);

--Inserir usuario teste no banco de dados 
INSERT INTO usuarios (nome_usu, email_usu, data_nasc, senha_usu)
VALUES ('Nome do Administrador', 'admin@example.com', '1990-01-01', 'senha123');

