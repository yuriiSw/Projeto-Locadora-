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

// Consulta SQL para listar usuários
$sql = "SELECT id_usu, nome_usu, email_usu, data_nasc FROM usuarios";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Locadora de Filmes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="shortcut icon" type="imagex/jpg" href="img/iconsite.jpg">
  <link rel="stylesheet" href="css/Filmes.css" />
</head>

<body>
  <br />
  <div class="fixed-top"></div>
  <div class="fixed-top navbar-dark cor1">
    <nav>
      <a href="../Projeto-Locadora-/Filmes.html">
        <h1 id="titulosite" class="mr-auto">LOCADORA DE FILMES</h1>
    </a>
    
      <div class="mobile-menu">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
      <ul class="nav-list">
        <li><a href="../Projeto-Locadora-/Filmes.html">INICIO</a></li>
        <li class="dropdown">
          <a href="#" class="dropbtn">FILMES</a>
          <div class="dropdown-content">
            <a href="listar_filmes.php">LISTAR E EDITAR</a>
            <a href="cadastro_filmes.html">CADASTRAR</a>
          </div>
        </li>
        <li class="dropdown">
          <a href="#" class="dropbtn">USUÁRIOS</a>
          <div class="dropdown-content">
            <a href="listar_usuarios.php">LISTAR E EDITAR</a>
          </div>
        </li>
      </ul>
      
      <button class="botaoexit" onclick="window.location.href='../Projeto-Locadora-/index.php'">Sair</button>

    </nav>
  </div>
  <br />
  <br />
  <br />
  <br />
  <br />
  <!-- Tabela de usuários -->
  <div class="container mt-5">
    <h2>USUARIOS CADASTRADOS</h2>
    <br>
    <table class="table table-dark table-bordered">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">E-mail</th>
          <th scope="col">Ação</th> <!-- Adicionando uma coluna para ação (exclusão) -->
        </tr>
      </thead>
      <tbody>
        <?php
        // Iterar sobre os resultados da consulta
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id_usu"] . "</td>";
            echo "<td>" . $row["nome_usu"] . "</td>";
            echo "<td>" . $row["email_usu"] . "</td>";
            echo "<td>
            <button class='btn btn-danger btn-sm' onclick='deletarUsuario(" . $row["id_usu"] . ")'>Excluir</button>
            <a href='controler/editar_usuarios.php?id=" . $row["id_usu"] . "' class='btn btn-primary btn-sm'>Editar</a>
          </td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='5'>Nenhum usuário encontrado.</td></tr>";
        }
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>

  <script>
    // Função para deletar o usuário
    function deletarUsuario(idUsuario) {
      if (confirm("Tem certeza que deseja excluir este usuário?")) {
        // Fazer uma solicitação AJAX para excluir o usuário
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "controler/excluir_usuario.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText); // Mostrar a resposta do servidor
            location.reload(); // Recarregar a página após a exclusão
          }
        };
        xhr.send("id=" + idUsuario); // Enviar o ID do usuário para excluir
      }
    }
  </script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>
<footer>
  <div class="footer-content">
      <div class="footer-text">
          <p>&copy; 2024 Locadora de Filmes</p>
          <p><a href="footer/sobrenos.html">Sobre</a> | <a href="footer/contatoform.html">Contato</a> | <a href="footer/politicaprivacidade.html">Política de Privacidade</a></p>
      </div>
      <div class="icons-container">
          <!-- Conteúdo dos ícones aqui -->
          <div class="icon">
            <a href="https://www.whatsapp.com"target="_blank">
              <img src="img/whatsappicon.png" alt="Ícone 1">
            </a>
          </div>
          <div class="icon">
            <a href="https://www.instagram.com" target="_blank">
              <img src="img/instagramicon.png" alt="Ícone 2">
            </a>
          </div>
          <div class="icon">
            <a href="https://www.facebook.com" target="_blank">
            <img src="img/facebookicon.png" alt="Ícone 2">
            </a>
        </div>
      </div>
  </div>
</footer>



</html>