<?php
// Verificar se o ID do filme foi recebido
if (isset($_POST['id'])) {
    // Conectar ao banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dblocadora";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Preparar a instrução SQL para excluir o filme
    $stmt = $conn->prepare("DELETE FROM filmes WHERE id_filme = ?");
    $stmt->bind_param("i", $_POST['id']);

    // Executar a instrução SQL
    if ($stmt->execute() === TRUE) {
        echo "Filme excluído com sucesso!";
    } else {
        echo "Erro ao excluir o filme: " . $conn->error;
    }

    // Fechar conexão
    $stmt->close();
    $conn->close();
} else {
    echo "ID do filme não recebido!";
}
?>
