<?php
// Iniciar a sessão
session_start();

// Conectar ao banco de dados
require_once('conexao.php');

// Verificar se o ID do livro foi fornecido na URL
if (isset($_GET['id'])) 
{
    $livro_id = $_GET['id'];

    // Consultar informações detalhadas do livro
    $query = "SELECT * FROM livros WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $livro_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar se o livro foi encontrado
    if ($result->num_rows > 0) 
    {
        $livro = $result->fetch_assoc();

        // Exibir informações detalhadas do livro

    } 
    else 
    {
        echo "<p>Livro não encontrado.</p>";
    }

    $stmt->close();
} 
else 
{
    echo "<p>ID do livro não fornecido.</p>";
}

// Fechar a conexão
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
    <?php
        echo "<h2>Detalhes do Livro</h2>";
        $capa_path = "caminho/para/as/capas/" . $livro['id'] . ".jpg";
        echo "<img src='$capa_path' alt='Capa do Livro'>";
        echo "<p><strong>Nome:</strong> " . $livro['nome'] . "</p>";
        echo "<p><strong>Autor:</strong> " . $livro['autor'] . "</p>";
        echo "<p><strong>Ano de Publicação:</strong> " . $livro['ano_publicacao'] . "</p>";
        echo "<p><strong>Sinopse:</strong> " . $livro['sinopse'] . "</p>";
    ?>
    </main>

    <script src="script.js"></script>
</body>
</html>
