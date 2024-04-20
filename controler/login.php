<?php
// Conexão com o banco de dados
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "dblocadora"; 

// Obtém os dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}

// Consulta SQL para verificar se o usuário existe
$sql = "SELECT * FROM usuarios WHERE email_usu = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Usuário encontrado e verifica a senha
  $row = $result->fetch_assoc();
  if (password_verify($senha, $row['senha_usu'])) {
    // Senha correta, usuário autenticado
    // Redirecionar para filmes.html
    header("Location: ../filmes.html");
    exit(); 
  } else {
    echo "Senha incorreta!";
  }
} else {
  echo "Usuário não encontrado!";
}

// Fecha a conexão
$conn->close();
?>
