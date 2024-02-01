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
    <!-- Seção de navegação -->
    <header>
        <div class="header-logo">
            <img src="logo.png" alt="Logo Venus">
        </div>
        <div class="header-titulo">
            <h1>Venus</h1>
        </div>
        <nav>
            <a href="login.php"><i class="fas fa-sign-in-alt"></i>Login</a>
            <a href="cadastro.php"><i class="fas fa-user-plus"></i>cadastre-se</a>
            <a href="catalogo.php"><i class="fas fa-book"></i>Catálogo</a>
            <a href="autores.php"><i class="fas fa-user"></i>Autores</a>
        </nav>
    </header>

    <!-- Seção principal da Home Page -->
    <section class="main-section">

        <h2>Bem-vindo à sua Biblioteca Online</h2>
        <p>Explore uma vasta coleção de livros e descubra novos mundos literários.</p>

        <!-- Grade de livros em destaque -->
        <?php
        include 'db.php';
        
        //Query para buscar livros em destaque
        $sql = "SELECT * FROM livros ORDER BY ano_publicado DESC LIMIT 6";
        $result = $conn->query($sql);

        $livrosDestaque = array();
        if ($result->num_rows > 0)
        {
            //Adiciona cada livro ao arry
            while($row = $result->fetch_assoc())
            {
                array_push($livrosDestaque, $row);
            }
        }
        else
        {
            echo "Não há livros em Destaque.";
        }
        $conn->close(); 
        ?>

        <div class="featured-books-grid">
            <?php foreach ($livrosDestaque as $livro) { ?>
                <div class="book">
                    <img src="<?php echo $livro['capa']; ?>" alt="<?php echo $livro['titulo']; ?>">
                    <h3><?php echo htmlspecialchars($livro['titulo']); ?></h3>
                    <p>Autor: <?php echo htmlspecialchars($livro['autor']); ?></p>

                </div>
            <?php } ?>
        </div>



        <div class="categorias-section">
            <h2>Categoria</h2>
            <ul>
                <li><a href="ficcao.php"><i class="fas fa-book"></i> Ficção</a></li>
                <li><a href="naoficcao.php"><i class="fas fa-globe"></i> Não Ficção</a></li>
                <li><a href="romance.php"><i class="fas fa-heart"></i> Romance</a></li>
                <li><a href="misterio.php"><i class="fas fa-search"></i> Mistério</a></li>
                <li><a href="fantasia.php"><i class="fas fa-hat-wizard"></i> Fantasia</a></li>
                <li><a href="poesia.php"><i class="fas fa-feather-alt"></i> Poesia</a></li>
                <li><a href="autobiografia.php"><i class="fas fa-book-reader"></i> Autobiografia</a></li>
            </ul>
        </div>

        <!-- Chamata para a ação (CTA) -->
        <div class="cta-section">
            <h2>Encontre seu próximo livro favorito</h2>
            <p>Explore nossa coleção e mergulhe em novas histórias.</p>
            <a href="livros.php" class="cta-button"><i class="fas fa-arrow-right"></i> Explorar Agora</a>

        </div>
    </section>
</body>
</html>