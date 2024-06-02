<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../Projeto-Locadora-/css/style.css">
    <title>Login</title>
</head>

<body>

    <?php
    // Conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dblocadora";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

    // Função para criptografar a senha
    function encryptPassword($password)
    {
        // Aqui você pode usar qualquer algoritmo de criptografia seguro, como bcrypt ou argon2
        return password_hash($password, PASSWORD_DEFAULT);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Se o formulário de login for enviado
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            // Consulta para encontrar o usuário
            $sql = "SELECT * FROM usuarios WHERE email_usu = '$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Usuário encontrado, verificar a senha
                $row = $result->fetch_assoc();
                if (password_verify($senha, $row['senha_usu'])) {
                    // Senha correta, redireciona para filmes.html
                    header("Location: filmes.html");
                    exit();
                } else {
                    echo "Senha incorreta!";
                }
            } else {
                echo "Usuário não encontrado!";
            }
        } elseif (isset($_POST['cadastrar'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = encryptPassword($_POST['senha']); // Criptografa a senha

            // Verifica se o usuário já existe no banco de dados
            $check_user_sql = "SELECT * FROM usuarios WHERE email_usu = '$email'";
            $check_user_result = $conn->query($check_user_sql);

            if ($check_user_result->num_rows > 0) {
                echo "Este e-mail já está cadastrado!";
            } else {
                // Insere o novo usuário no banco de dados
                $insert_user_sql = "INSERT INTO usuarios (nome_usu, email_usu, senha_usu) VALUES ('$nome', '$email', '$senha')";

                if ($conn->query($insert_user_sql) === TRUE) {
                    echo "Usuário cadastrado com sucesso!";
                } else {
                    echo "Erro ao cadastrar o usuário: " . $conn->error;
                }
            }
        }
    }
    ?>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="post" action="">
                <h1>Criar sua Conta</h1>
                <span>use seu email para se cadastrar</span>
                <input type="text" placeholder="Nome" name="nome">
                <input type="email" placeholder="E-mail" name="email">
                <input type="password" placeholder="Senha" name="senha">
                <button type="submit" name="cadastrar">Cadastrar-se</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="post" action="">
                <h1>Login</h1>
                <span>use seu e-email e senha</span>
                <input type="email" placeholder="E-mail" name="email">
                <input type="password" placeholder="Senha" name="senha">
                <button type="submit" name="login">Entrar</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Bem vindo de volta!</h1>
                    <p>Insira seus dados pessoais para usar todos os recursos do site</p>
                    <button class="hidden" id="login">Entrar</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Olá, Cinéfilo!</h1>
                    <p>Registre-se com seus dados pessoais para usar todos os recursos do site</p>
                    <button class="hidden" id="register">Cadastrar-se </button>
                </div>
            </div>
        </div>
    </div>

    <script src="../Projeto-Locadora-/js/script.js"></script>
</body>

</html>