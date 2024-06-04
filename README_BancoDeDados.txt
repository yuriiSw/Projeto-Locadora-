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
  quantidade_filmes int(11)
);

--Inserir usuario teste no banco de dados 
INSERT INTO usuarios (nome_usu, email_usu, data_nasc, senha_usu)
VALUES ('Nome do Administrador', 'admin@example.com', '1990-01-01', 'senha123');


--Inserir novo filme teste no banco de dados
INSERT INTO filmes (nome_filme, genero_filme, classi_filme, idioma_filme, data_lanc_filme, duracao_filme, produtura_filme, caminho_imagem) 
VALUES
('Duna 2', 'Ficção Científica, Drama', '14', 'ENG/PT-BR', '2024-02-28', '166', 'Legendary Pictures', 'img/Carrosel/dune.png'),
('O Jogo da Imitação', 'Drama', '12', 'ENG/PT-BR', '2014-11-28', '115', 'Black Bear Pictures', 'img/Carrosel/imitation game.png'),
('Oppenheimer', 'Biografia', '16', 'ENG/PT-BR', '2024-12-25', '235', 'Universal Pictures', 'img/Carrosel/oppenheimer.png'),
('Pobres Criaturas', 'Comédia, Drama, Fantasia, Romance, Ficção Científica', '18', 'ENG/PT-BR', '2022-07-14', '141', 'Walt Disney Pictures', 'img/Carrosel/poor things.png'),
('Uma Vida', 'Documentário', 'Livre', 'ENG/PT-BR', '2024-03-14', '85', 'Diamond Films', 'img/Carrosel/one life.png'),
('Vingadores: Ultimato', 'Ação', '14', 'ENG/PT-BR', '2019-04-26', '181', 'Marvel Studios', 'img/Carrosel/avengers.png'),
('Barbie', 'Animação', '12', 'ENG/PT-BR', '2023-07-21', 'N/A', 'Mattel Entertainment', 'img/Carrosel/barbie.png');


EXECUTAR OS CODIGOS A BAIXO:
--------------------------------------------------------------------------
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
  caminho_imagem VARCHAR(255),
  quantidade_filmes int(11)
);

INSERT INTO usuarios (nome_usu, email_usu, data_nasc, senha_usu)
VALUES ('Nome do Administrador', 'admin@example.com', '1990-01-01', 'senha123');


INSERT INTO filmes (nome_filme, genero_filme, classi_filme, idioma_filme, data_lanc_filme, duracao_filme, produtura_filme, caminho_imagem) 
VALUES
('Duna 2', 'Ficção Científica, Drama', '14', 'ENG/PT-BR', '2024-02-28', '166', 'Legendary Pictures', 'img/Carrosel/dune.png'),
('O Jogo da Imitação', 'Drama', '12', 'ENG/PT-BR', '2014-11-28', '115', 'Black Bear Pictures', 'img/Carrosel/imitation game.png'),
('Oppenheimer', 'Biografia', '16', 'ENG/PT-BR', '2024-12-25', '235', 'Universal Pictures', 'img/Carrosel/oppenheimer.png'),
('Pobres Criaturas', 'Comédia, Drama, Fantasia, Romance, Ficção Científica', '18', 'ENG/PT-BR', '2022-07-14', '141', 'Walt Disney Pictures', 'img/Carrosel/poor things.png'),
('Uma Vida', 'Documentário', 'Livre', 'ENG/PT-BR', '2024-03-14', '85', 'Diamond Films', 'img/Carrosel/one life.png'),
('Vingadores: Ultimato', 'Ação', '14', 'ENG/PT-BR', '2019-04-26', '181', 'Marvel Studios', 'img/Carrosel/avengers.png'),
('Barbie', 'Animação', '12', 'ENG/PT-BR', '2023-07-21', 'N/A', 'Mattel Entertainment', 'img/Carrosel/barbie.png');