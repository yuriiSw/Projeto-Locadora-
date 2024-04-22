<?php
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

// Verificar se o ID do usuário foi recebido
if (isset($_POST["id"]) && !empty($_POST["id"])) {
  $idUsuario = $_POST["id"];

  // Consulta SQL para excluir o usuário com o ID fornecido
  $sql = "DELETE FROM usuarios WHERE id_usu = $idUsuario";

  if ($conn->query($sql) === TRUE) {
    echo "Usuário excluído com sucesso.";
  } else {
    echo "Erro ao excluir o usuário: " . $conn->error;
  }
} else {
  echo "ID do usuário não foi fornecido.";
}

$conn->close();
?>
