<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dblocadora";

// Recebe o ID do filme a ser alugado do JavaScript
$id_filme = $_POST['id_filme'];

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Atualiza a quantidade de filmes disponíveis
$sql_atualizar = "UPDATE filmes SET quantidade_filmes = quantidade_filmes - 1 WHERE id_filme = $id_filme";

if ($conn->query($sql_atualizar) === TRUE) {
    $response = array("success" => true, "message" => "Filme alugado com sucesso!");
} else {
    $response = array("success" => false, "message" => "Erro ao alugar o filme: " . $conn->error);
}

echo json_encode($response);

$conn->close();
?>
