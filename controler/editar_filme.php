<?php
// Verifica se o método de requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o campo 'id_filme' está definido no formulário
    if (isset($_POST["id_filme"])) {
        // Conecta ao banco de dados (substitua as credenciais de acordo com o seu ambiente)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dblocadora";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Erro de conexão: " . $conn->connect_error);
        }

        // Prepara as instruções SQL para atualizar os dados do filme
        $sql = "UPDATE filmes SET 
                nome_filme = '" . $_POST['nome_filme'] . "',
                genero_filme = '" . $_POST['genero_filme'] . "',
                classi_filme = '" . $_POST['classi_filme'] . "',
                idioma_filme = '" . $_POST['idioma_filme'] . "',
                data_lanc_filme = '" . $_POST['data_lanc_filme'] . "',
                duracao_filme = '" . $_POST['duracao_filme'] . "',
                caminho_imagem = '" . $_POST['caminho_imagem'] . "',
                quantidade_filmes = '" . $_POST['quantidade_filmes'] . "'
                WHERE id_filme = " . $_POST['id_filme'];

        // Executa a consulta
        if ($conn->query($sql) === TRUE) {
            echo "Dados do filme atualizados com sucesso.";
        } else {
            echo "Erro ao atualizar os dados do filme: " . $conn->error;
        }

        // Fecha a conexão
        $conn->close();
    } else {
    }
}

// Recupera os detalhes do filme do banco de dados para preencher o formulário
if (isset($_GET['id'])) {
    // Conecta ao banco de dados (substitua as credenciais de acordo com o seu ambiente)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dblocadora";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Prepara e executa a consulta para recuperar os detalhes do filme
    $id_filme = $_GET['id'];
    $sql = "SELECT * FROM filmes WHERE id_filme = $id_filme";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Nenhum filme encontrado com o ID fornecido.";
        exit();
    }

    // Fecha a conexão
    $conn->close();
} else {
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Locadora de Filmes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="shortcut icon" type="imagex/jpg" href="../img/iconsite.jpg">
    <link rel="stylesheet" href="../css/Filmes.css" />
</head>
<br>
<br>
<br>
<br>

<body>
    <br />
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

            <button class="botaoexit" onclick="window.location.href='../Projeto-Locadora-/index.php'">Sair</button>

        </nav>
    </div>

    <div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <h2 class="text-center">EDITAR FILME</h2>
        <BR>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="edit-form">
        <input type="hidden" name="id_filme" value="<?php echo isset($row['id_filme']) ? $row['id_filme'] : ''; ?>">
                
                <div class="form-group">
                    <label for="nome_filme">Nome do Filme:</label>
                    <input type="text" class="form-control" name="nome_filme" value="<?php echo isset($row['nome_filme']) ? $row['nome_filme'] : ''; ?>">
                </div>
<BR>
                <div class="form-group">
                    <label for="genero_filme">Gênero do Filme:</label>
                    <input type="text" class="form-control" name="genero_filme" value="<?php echo isset($row['genero_filme']) ? $row['genero_filme'] : ''; ?>">
                </div>
                <BR>

                <div class="form-group">
                    <label for="classi_filme">Classificação do Filme:</label>
                    <input type="text" class="form-control" name="classi_filme" value="<?php echo isset($row['classi_filme']) ? $row['classi_filme'] : ''; ?>">
                </div>
                <BR>

                <div class="form-group">
                    <label for="idioma_filme">Idioma do Filme:</label>
                    <input type="text" class="form-control" name="idioma_filme" value="<?php echo isset($row['idioma_filme']) ? $row['idioma_filme'] : ''; ?>">
                </div>
                <BR>

                <div class="form-group">
                    <label for="data_lanc_filme">Data de Lançamento:</label>
                    <input type="date" class="form-control" name="data_lanc_filme" value="<?php echo isset($row['data_lanc_filme']) ? $row['data_lanc_filme'] : ''; ?>">
                </div>
                <BR>

                <div class="form-group">
                    <label for="duracao_filme">Duração do Filme:</label>
                    <input type="text" class="form-control" name="duracao_filme" value="<?php echo isset($row['duracao_filme']) ? $row['duracao_filme'] : ''; ?>">
                </div>
                <BR>

                <div class="form-group">
                    <label for="caminho_imagem">Caminho da Imagem:</label>
                    <input type="text" class="form-control" name="caminho_imagem" value="<?php echo isset($row['caminho_imagem']) ? $row['caminho_imagem'] : ''; ?>">
                </div>
                <BR>

                <div class="form-group">
                    <label for="quantidade_filmes">Quantidade de Filmes:</label>
                    <input type="number" class="form-control" name="quantidade_filmes" value="<?php echo isset($row['quantidade_filmes']) ? $row['quantidade_filmes'] : ''; ?>">
                </div>
<br>
<br>
<input type="submit" class="mb-3 d-grid gap-2 col-6 mx-auto btn btn-custom" value="Salvar Alterações" id="submit-btn">
            </form>

        </div>
    </div>
</div>


<script>
    document.getElementById("edit-form").addEventListener("submit", function(event) {
        event.preventDefault(); // Evita o envio padrão do formulário

        // Exibe o pop-up de confirmação
        if (confirm("Tem certeza de que deseja salvar as alterações?")) {
            // Aqui você pode adicionar código para enviar os dados via AJAX ou realizar outras ações necessárias
            alert("As alterações foram salvas com sucesso!");
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