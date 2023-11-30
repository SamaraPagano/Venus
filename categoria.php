<?php
//Iniciar a sessão
session_start();

//Verificar se o usuário está autenticado
if (!isset($_SESSION["user_id"]))
{
    //Se não estiver autenticado, redirecionar para a página de login
    header("Location: login.php");
    exit();
}

require_once ('conexao.php');

//Verificar se o parêmetro de categoria foi fornecido na URL
if (isset($_GET['categoria']))
{
    $categoria_id = $_GET['categoria'];

    //Consultar o nome da categoria
    $sql_categoria = "SELECT nome FROM categoria WHERE id = ?";
    $stmt_categoria = $conn->prepare($sql_categoria);
    $stmt_categoria->bind_param("i", $categoria_id);
    $stmt_categoria->execute();
    $stmt_categoria->bind_result($categoria_nome);
    $stmt_categoria->fetch();
    $stmt_categoria->close();

    //Consultar livros da categoria específica
    $sql_livros = "SELECT * FROM livros WHERE id_categoria = ?";
    $stmt_livros = $conn->prepare($sql_livros);
    $stmt_livros->bind_param("i", $categoria_id);
    $stmt_livros->execute();
    $result_livros = $stmt_livros->get_result();
}
else
{
    //Se o parâmetro de categoria não estiver presente, redirecionar para a página de livros
    header("Location: livros.php");
    exit();
}
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
                <li><a href="review.php">Reviews</a></li>
                <li><a href="avaliacao.php">Avaliações</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="livros">
            <h2>Livros da Categoria <?php echo $categoria_nome; ?></h2>

            <!-- Exibir livros da cetegoria -->
            <?php
            if ($result_livros->num_rows > 0)
            {
                while ($livro = $result_livros->fetch_assoc())
                {
                    echo "<div class='livro'>";
                    echo "<h3>" . $livro['nome'] . "</h3>";
                    echo "<p>Autor: " . $livro['autor'] . "</p>";
                    echo "<p>Ano de Publicação: " . $livro['ano_publicacao'] . "</p>";

                    // Adicionar a imagem da capa
                    $capa_path = "caminho/para/as/capas/" . $livro['id'] . ".jpg";
                    echo "<img src='$capa_path' alt='Capa do Livro'>";

                    echo "<a href='#'>Mais Detalhes</a>";
                    echo "</div>";
                }
            }
            else
            {
                echo "<p>Nunhum livro encontrado nesta categoria.</p>"
            }
            ?>
        </section>
    </main>

    <script src="script.js"></script>
</body>
</html>