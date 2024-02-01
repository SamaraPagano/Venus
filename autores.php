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
                <a href="catalogo.php"><i class="fas fa-book"></i>Catálogo</a>
                <a href="perfil.php"><i class="fas fa-user"></i>Perfil</a>
                <a href="carrinho.php"><i class="fas fa-shopping-cart"></i>Carrinho de Compras</a>
            </nav>
        </nav>
    </header>

    <!-- Contúdo principal da página dos Autores -->
    <div class="autores">
        <?php
        include 'db.php';

        $sql = "SELECT * FROM autores";
        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            echo "<ul class='lista-autores'>";
            while($row = $result->fetch_assoc())
            {
                echo "<li>" . $row['nome_autor'] . "</li>";
            }
            echo "</ul>";
        }
        else
        {
            echo "Não há autores cadastrados.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>