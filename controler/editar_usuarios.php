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

// Verificar se foi enviado um ID de usuário para edição
if(isset($_GET['id'])) {
    $idUsuario = $_GET['id'];
    
    // Consulta SQL para obter os detalhes do usuário
    $sql = "SELECT nome_usu, email_usu, data_nasc FROM usuarios WHERE id_usu = $idUsuario";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nome = $row['nome_usu'];
        $email = $row['email_usu'];
        $dataNascimento = $row['data_nasc'];
    } else {
        echo "Usuário não encontrado.";
        exit;
    }
} else {
    echo "ID do usuário não especificado.";
    exit;
}

// Processar o formulário de edição quando for enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber e sanitizar os dados do formulário
    $novoNome = $_POST['nome'];
    $novoEmail = $_POST['email'];
    $novaDataNascimento = $_POST['data_nasc'];
    
    // Consulta SQL para atualizar os detalhes do usuário no banco de dados
    $sql = "UPDATE usuarios SET nome_usu = '$novoNome', email_usu = '$novoEmail', data_nasc = '$novaDataNascimento' WHERE id_usu = $idUsuario";
    
    if ($conn->query($sql) === TRUE) {
        echo "Usuário atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar usuário: " . $conn->error;
    }
}

$conn->close();
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


    <div class="container mt-5">
        <h2>Editar Usuário</h2>
        <form method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="mb-3">
                <label for="data_nasc" class="form-label">Data de Nascimento:</label>
                <input type="date" class="form-control" id="data_nasc" name="data_nasc"
                    value="<?php echo $dataNascimento; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>