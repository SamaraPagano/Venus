<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-... (hash)" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
    <title>Venus</title>
</head>
<body>

    <!--Seção de navegação  -->
    <header>
        <div class="header-logo">
            <img src="logo.png" alt="Logo Venus">
        </div>
        <div class="header-titulo">
            <h1>Venus</h1>
        </div>
            <nav>
                <a href="autores.php"><i class="fas fa-user"></i>Autores</a>
                <a href="perfil.php"><i class="fas fa-user"></i>Perfil</a>
                <a href="carrinho.php"><i class="fas fa-shopping-cart"></i>Carrinho de Compras</a>
            </nav>
        </nav>
    </header>

    <!-- Conteúdo principal do Ctálogo -->
    <div class="catalogo">
        <!-- Os livros serão carregados aqui -->
        <?php
        include 'db.php';      

        $livros_por_pagina = 10; // Verifique se esta linha termina com ponto e vírgula
        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        $pagina = max($pagina, 1); // Garante que $pagina é pelo menos 1
        $offset = ($pagina - 1) * $livros_por_pagina; // Esta é a linha 20
        
        // Consulta SQL com limites para paginação
        $sql = "SELECT * FROM livros LIMIT $livros_por_pagina OFFSET $offset";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) 
        {
            echo "<div class='livros-grid'>";
            while($row = $result->fetch_assoc()) 
            {
                echo "<div class='livro'>";
                // Certifique-se de que as colunas correspondem ao seu banco de dados
                echo "<img src='" . $row['capa'] . "' alt='" . htmlspecialchars($row['titulo']) . "'>";
                echo "<h3>" . htmlspecialchars($row['titulo']) . "</h3>";
                echo "<p>Autor: " . htmlspecialchars($row['autor']) . "</p>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "Não há livros disponíveis.";
        }  
        
        // Calcular o número total de páginas
        $resultTotal = $conn->query("SELECT COUNT(id_livro) AS total FROM livros");
        $rowTotal = $resultTotal->fetch_assoc();
        $total_paginas = ceil($rowTotal['total'] / $livros_por_pagina);
        ?>
    </div>

    <div class="paginacao">
        <?php
        for ($i = 1; $i <=$total_paginas; $i++)
        {
            if ($i == $pagina)
            {
                echo "<span>$i</span>";
            }
            else
            {
                echo "<a href='catalogo.php?pagina=$i'>$i</a>";
            }
        }
        ?>
    </div>
</body>
</html>