<?php
// Verificar se o ID do filme e os novos dados foram recebidos
if (isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['genero']) && isset($_POST['classificacao']) && isset($_POST['idioma']) && isset($_POST['data_lancamento']) && isset($_POST['duracao']) && isset($_POST['produtora'])) {
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

    // Preparar a instrução SQL para atualizar os dados do filme
    $stmt = $conn->prepare("UPDATE filmes SET nome_filme=?, genero_filme=?, classi_filme=?, idioma_filme=?, data_lanc_filme=?, duracao_filme=?, produtora_filme=? WHERE id_filme=?");
    $stmt->bind_param("ssissssi", $_POST['nome'], $_POST['genero'], $_POST['classificacao'], $_POST['idioma'], $_POST['data_lancamento'], $_POST['duracao'], $_POST['produtora'], $_POST['id']);

    // Executar a instrução SQL
    if ($stmt->execute() === TRUE) {
        echo "Filme editado com sucesso!";
    } else {
        echo "Erro ao editar o filme: " . $conn->error;
    }

    // Fechar conexão
    $stmt->close();
    $conn->close();
} else {
    echo "Dados do filme não recebidos!";
}
?>
