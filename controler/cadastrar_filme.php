<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dblocadora";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Coleta de dados do formulário
$nome_filme = $_POST['nome_filme'];
$genero_filme = $_POST['genero_filme'];
$classi_filme = $_POST['classi_filme'];
$idioma_filme = $_POST['idioma_filme'];
$data_lanc_filme = $_POST['data_lanc_filme'];
$duracao_filme = $_POST['duracao_filme'];
$produtura_filme = $_POST['produtura_filme'];

// Insere os dados 
$stmt = $conn->prepare("INSERT INTO filmes (nome_filme, genero_filme, classi_filme, idioma_filme, data_lanc_filme, duracao_filme, produtura_filme) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $nome_filme, $genero_filme, $classi_filme, $idioma_filme, $data_lanc_filme, $duracao_filme, $produtura_filme);

if ($stmt->execute()) {
    echo "Filme cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar o filme: " . $conn->error;
}
$stmt->close();

// Fecha a conexão 
$conn->close();
?>
