<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dblocadora";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Obtém os valores do formulário de login
$email = $_POST['email'];
$senha = $_POST['senha'];

// Consulta SQL para verificar se o usuário existe e a senha está correta
$sql = "SELECT * FROM usuarios WHERE email_usu = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashedPassword = $row['senha_usu'];

    // Verifica se a senha fornecida corresponde à senha criptografada no banco de dados
    if (password_verify($senha, $hashedPassword)) {
        // Senha correta, usuário autenticado
        // Redireciona para filmes.html
        header("Location: filmes.html");
        exit();
    } else {
        // Senha incorreta
        echo "Senha incorreta.";
    }
} else {
    // Usuário não encontrado
    echo "Usuário não encontrado.";
}

$conn->close();
?>