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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Locadora de Filmes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="shortcut icon" type="imagex/jpg" href="../img/iconsite.jpg">
  <link rel="stylesheet" href="../css/Filmes.css" />
</head>
<br>
<br>
<br>
<br>

<body>
<br>
  <div class="fixed-top"></div>
  <div class="fixed-top navbar-dark cor1">
    <nav>
      <a href="../Filmes.html">
        <h1 id="titulosite" class="mr-auto">LOCADORA DE FILMES</h1>
    </a>
    
      <div class="mobile-menu">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
      <ul class="nav-list">
        <li><a href="../Filmes.html">INICIO</a></li>
        <li class="dropdown">
          <a href="#" class="dropbtn">FILMES</a>
          <div class="dropdown-content">
            <a href="../listar_filmes.php">LISTAR E EDITAR</a>
            <a href="../cadastro_filmes.html">CADASTRAR</a>
          </div>
        </li>
        <li class="dropdown">
          <a href="#" class="dropbtn">USUÁRIOS</a>
          <div class="dropdown-content">
            <a href="../listar_usuarios.php">LISTAR E EDITAR</a>
          </div>
        </li>
      </ul>
      
      <button class="botaoexit" onclick="window.location.href='../index.php'">Sair</button>

    </nav>
  </div>

  <div class="container mt-5">
    <h2 class="text-center">EDITAR USUÁRIO</h2>
    <br>
    <form method="post" class="text-center" id="editarUsuarioForm">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control form-control-sm w-50 mx-auto" id="nome" name="nome" value="<?php echo $nome; ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" class="form-control form-control-sm w-50 mx-auto" id="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Nova Senha:</label>
            <input type="password" class="form-control form-control-sm w-50 mx-auto" id="senha" name="senha">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-custom" id="submit-btn">Salvar Alterações</button>
        </div>
    </form>
</div>

<script>
    document.getElementById("editarUsuarioForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Evita o envio padrão do formulário

        // Exibe o pop-up de confirmação
        if (confirm("Tem certeza de que deseja salvar as alterações?")) {
            // Aqui você pode adicionar código para enviar os dados via AJAX ou realizar outras ações necessárias
            alert("Alterações salvas com sucesso!");
            // Submeta o formulário após a confirmação
            this.submit();
        }
    });
</script>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="../js/script.js"></script>
</body>
<footer>
  <div class="footer-content">
      <div class="footer-text">
          <p>&copy; 2024 Locadora de Filmes</p>
          <p><a href="../footer/sobrenos.html">Sobre</a> | <a href="../footer/contatoform.html">Contato</a> | <a href="../footer/politicaprivacidade.html">Política de Privacidade</a></p>
      </div>
      <div class="icons-container">
          <!-- Conteúdo dos ícones aqui -->
          <div class="icon">
            <a href="https://www.whatsapp.com"target="_blank">
              <img src="../img/whatsappicon.png" alt="Ícone 1">
            </a>
          </div>
          <div class="icon">
            <a href="https://www.instagram.com" target="_blank">
              <img src="../img/instagramicon.png" alt="Ícone 2">
            </a>
          </div>
          <div class="icon">
            <a href="https://www.facebook.com" target="_blank">
            <img src="../img/facebookicon.png" alt="Ícone 2">
            </a>
        </div>
      </div>
  </div>
</footer>



</html>