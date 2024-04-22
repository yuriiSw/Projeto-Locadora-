<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "dblocadora"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $data_nasc = $_POST['data_nasc'];

  // Criptografa a senha
  $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

  $sql = "INSERT INTO usuarios (nome_usu, email_usu, senha_usu, data_nasc) VALUES ('$nome', '$email', '$senha_criptografada', '$data_nasc')";

  if ($conn->query($sql) === TRUE) {
    //CSS para a mensagem  de retorno de sucesso de cadastro
    echo '<style>
        body {
          margin: 0;
          padding: 0;
          background-color: #666666;
        }

        .container {
          width: 100%;
          height: 100vh;
          display: flex;
          justify-content: center;
          align-items: center;
          font-family: Arial, sans-serif;
          color: #fff;
        }

        .sucesso {
          background-color: rgba(0, 0, 0, 0.8);
          padding: 30px;
          border-radius: 10px;
          text-align: center;
          box-shadow: 0px 0px 10px 0px rgba(255,255,255,0.3);
          max-width: 500px;
        }

        .sucesso h2 {
          font-size: 28px;
          margin-bottom: 20px;
        }

        .sucesso p {
          font-size: 18px;
          margin-bottom: 20px;
        }

        .voltar-link {
          text-decoration: none;
          color: #fff;
          font-size: 18px;
          display: inline-block;
          margin-top: 20px;
          background-color: #e50914;
          padding: 15px 25px;
          border-radius: 50px;
          transition: background-color 0.3s ease;
        }

        .voltar-link:hover {
          background-color: #fc1722;
        }
      </style>';

echo "<div class='container'>
        <div class='sucesso'>
          <h2>Cadastro realizado com sucesso!</h2>
          <p>Agora você está pronto para explorar nosso catálogo de filmes e séries.</p>
          <a href='http://localhost/Projeto-Locadora-/' class='voltar-link'>Voltar para a página inicial</a>
        </div>
      </div>";

  } else {
    echo "Erro ao cadastrar: " . $conn->error;
  }
}

$conn->close();
?>