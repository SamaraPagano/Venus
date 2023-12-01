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

// Obter todos os reviews do banco de dados
$query = "SELECT r.avaliacao, r.review, u.nome AS nome_usuario, l.nome AS nome_livro
          FROM avaliacao r
          JOIN usuarios u ON r.id_usuario = u.id
          JOIN livros l ON r.id_livro = l.id";
$result = $conn->query($query);
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
                <li><a href="perfil.php">Perfil</a></li>
                <li><a href="avaliacao.php">Avaliações</a></li>
                <li><a href="livros.php">Livros</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="reviews">
            <h2>Reviews dos Usuários</h2>
            <?php
            if ($result->num_rows > 0) 
            {
                while ($row = $result->fetch_assoc()) 
                {
                    echo "<div class='review'>";
                    echo "<p><strong>Usuário:</strong> " . $row['nome_usuario'] . "</p>";
                    echo "<p><strong>Livro:</strong> " . $row['nome_livro'] . "</p>";
                    echo "<p><strong>Avaliação:</strong> " . $row['avaliacao'] . " estrelas</p>";
                    echo "<p><strong>Review:</strong> " . $row['review'] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nenhum review encontrado.</p>";
            }
            ?>
        </section>
    </main>

    <script src="script.js"></script>
</body>
</html>
