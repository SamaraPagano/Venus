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

require_once('conexao.php');

// Inicializar a variável de pesquisa
$termo_pesquisa = "";
$categoria_id = isset($_GET['categoria']) ? $_GET['categoria'] : null;

// Verificar se o formulário de pesquisa foi enviado
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["pesquisa"])) 
{
    $termo_pesquisa = $_GET["pesquisa"];

    // Consulta livros com base no termo de pesquisa
    $sql = "SELECT * FROM livros WHERE nome LIKE '%$termo_pesquisa%' AND id_categoria = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $categoria_id);
    $stmt->execute();
    $result = $stmt->get_result();
} 
elseif (!empty($categoria_id)) 
{
    // Consultar livros da categoria específica
    $sql = "SELECT * FROM livros WHERE id_categoria = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $categoria_id);
    $stmt->execute();
    $result = $stmt->get_result();
} 
else 
{
    // Consultar todos os livros do banco de dados
    $sql = "SELECT * FROM livros";
    $result = $conn->query($sql);
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
                <li><a href="reviews.php">Reviews</a></li>
                <li><a href="avaliacao.php">Avaliações</a></li>
                <li><a href="livros.php">Livros</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="livros">
            <h2>Livros Disponíveis</h2>
            
            <!-- Adicionar um menu suspenso para selecionar a categoria -->
            <form action="livros.php" method="get">
                <label for="categoria">Filtrar por Categoria:</label>
                <select name="categoria" id="categoria">
                    <option value="">Todas as Categorias</option>
                    <?php
                    // Consultar categorias
                    $sql_categorias = "SELECT * FROM categoria";
                    $result_categorias = $conn->query($sql_categorias);

                    while ($categoria = $result_categorias->fetch_assoc()) 
                    {
                        echo "<option value='" . $categoria['id'] . "'";
                        if ($categoria_id == $categoria['id']) 
                        {
                            echo " selected";
                        }
                        echo ">" . $categoria['nome'] . "</option>";
                    }
                    ?>
                </select>
                <button type="submit">Filtrar</button>
            </form>

            <!-- Resultados da Pesquisa -->
            <?php
            if ($result->num_rows > 0) 
            {
                while ($livro = $result->fetch_assoc()) 
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
                echo "<p>Nenhum livro encontrado.</p>";
            }
            ?>
        </section>
    </main>

    <script src="script.js"></script>
</body>
</html>

