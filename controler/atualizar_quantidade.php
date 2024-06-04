<?php
// Conectar ao banco de dados
$conn = new mysqli('localhost', 'usuario', 'senha', 'nome_do_banco_de_dados');

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Obter o ID do filme do corpo da solicitação POST
$id_filme = $_POST['id_filme'];

// Consultar o banco de dados para obter a quantidade atual de filmes
$sql = "SELECT quantidade_filmes FROM filmes WHERE id_filme = $id_filme";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Atualizar a quantidade de filmes no banco de dados
    $row = $result->fetch_assoc();
    $quantidade_atual = $row['quantidade_filmes'];
    if ($quantidade_atual > 0) {
        $nova_quantidade = $quantidade_atual - 1;

        $update_sql = "UPDATE filmes SET quantidade_filmes = $nova_quantidade WHERE id_filme = $id_filme";
        if ($conn->query($update_sql) === TRUE) {
            echo "Quantidade de filmes atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar a quantidade de filmes: " . $conn->error;
        }
    } else {
        echo "Não há mais filmes disponíveis para alugar.";
    }
} else {
    echo "Nenhum filme encontrado com o ID fornecido.";
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
