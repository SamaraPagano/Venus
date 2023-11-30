<?php
//Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    //Conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "venus";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error)
    {
        die("Falha na conexão com o banco de dados:" . $conn->connect_error);
    }

    //Receber os dados do jogador do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    //SQL para inserir o jogador
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";

    //Preparar a declaração SQl
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $senha); 

    //Executar a consulta
    if($stmt->execute())
    {
        header("Location: index.php");
    }
    else
    {
        echo "Erro no cadastro do usuário: " . $stmt->error;
    }

    //Fechar a declaração e a conexão
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <li><a href="login.php">Login</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="login">
            <h3>Cadastro</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" required>
                <br><br>
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" required>
                <br><br>
                <label for="senha">Senha: </label>
                <input type="password" name="senha" id="senha" required>
                <br><br>
                <button type="submit">Entrar</button>
            </form>
        </section>
    </main>
</body>
</html>