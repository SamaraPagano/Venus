<?php
// Iniciar a sessão
session_start();

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    //Conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "venus";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error)
    {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    // Verificar as credenciais no banco de dados
    $query = "SELECT id, email, senha FROM usuarios WHERE nome = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $nome);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) 
    {
        $stmt->bind_result($user_id, $user_nome, $user_senha);
        $stmt->fetch();

        // Verificar a senha
        if (password_verify($senha, $user_senha)) 
        {
            $_SESSION["user_id"] = $user_id;
            $_SESSION["user_nome"] = $user_nome;
            header("Location: index.php");
            exit(); 
        } 
        else 
        {
            $mensagemErro = "Senha incorreta. Tente novamente.";
        }
    } 
    else 
    {
        $mensagemErro = "Nome de usuário não encontrado. Registre-se primeiro.";
    }

    // Fechar a declaração e a conexão
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-vr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Venus</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="logo.jpg" alt="Logo Venus">
        </div>
        <h1>Venus</h1>
        <nav>
            <ul>
                <li><a href="perfil.php">Perfil</a></li>
                <li><a href="cadastro.php">Cadastro</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="login">
            <h3>Login</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" required>
                <br><br>
                <label for="senha">Senha: </label>
                <input type="password" name="senha" id="senha" required>
                <br><br>
                <button type="submit">Entrar</button>
            </form>
        </section>
    </main>

    <script src="script.js"></script>
</body>
</html>