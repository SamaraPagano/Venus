<?php
// Iniciar a sessão
session_start();

// Verificar se o usuário está autenticado
if (!isset($_SESSION["user_id"])) 
{
    // Se não estiver autenticado, redirecionar para a página de login
    header("Location: login.php");
    exit();
}

// Conectar ao banco de dados
require_once('conexao.php');

// Obter informações do usuário
$user_id = $_SESSION["user_id"];
$query = "SELECT nome, email FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($nome, $email);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
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
                <li><a href="reviews.php">Reviews</a></li>
                <li><a href="avaliacao.php">Avaliações</a></li>
                <li><a href="livros.php">Livros</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="perfil">
            <h2>Perfil do Usuário</h2>
            <p><strong>Nome:</strong> <?php echo $nome; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
          
            <a href="editar_perfil.php">Editar Perfil</a>
            <a href="adicionar_foto.php">Adicionar Foto</a>
        </section>
    </main>

    <script src="script.js"></script>
</body>
</html>
