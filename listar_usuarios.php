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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Locadora de filmes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/Filmes.css">
  <style>
    /* Estilos personalizados */
    .table-dark tbody tr:hover {
      background-color: rgba(0, 0, 0, 0.15); /* Adiciona efeito de escurecimento ao passar o mouse */
    }
  </style>
</head>

<body>
  <div class="nome text-center">
    <h1>Locadora de filmes</h1>
  </div>
  <nav class="navbar navbar-expand-lg navbar-dark cor1">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
        aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link" href="Filmes.html">HOME</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link custom-login" href="Login.html" role="button" data-bs-toggle="dropdown"
              aria-expanded="true">FILMES</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Cadastrar Filme</a></li>
              <li><a class="dropdown-item" href="#">Listar / Editar Filmes</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link custom-login" href="Login.html" role="button" data-bs-toggle="dropdown"
              aria-expanded="true">USUARIOS</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Listar / Editar Usuarios</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
          <button class="btn btn-custom" type="submit">Procurar</button>
        </form>
      </div>
    </div>
  </nav>

  <!-- Tabela de usuários -->
  <div class="container mt-5">
    <h2>Usuários Cadastrados</h2>
    <table class="table table-dark table-bordered">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">E-mail</th>
          <th scope="col">Data de Nascimento</th>
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
            echo "<td>" . $row["data_nasc"] . "</td>";
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
</body>

</html>


</html>
