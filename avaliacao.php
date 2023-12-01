<?php
//Iniciar sessão
session_start();

//Verificar se o usuário está autenticado
if (!isset($_SESSION["user_id"]))
{
    //Se não estiver autenticado, redirecionar para a página de login
    header("Location: login.php");
    exit();
}

require_once('conexao.php');

//inicializar as variáveis
$livro_id = isset($_GET['livro']) ? $_GET['livro'] : null;
$avaliacao = isset($_POST['avaliacao']) ? $_POST['avaliacao'] : null;
$review = isset($_POST['review']) ? $_POST['review'] : null;

//Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    //Validar os dados do formuçário
    if (empty($avaliacao) || empty($review))
    {
        $mensagemErro = "Por favor, preencha todos os campos.";
    }
    else
    {
        //Inserir a avaliação no banco de dados
        $usuario_id = $_SESSION["user_id"];
        $sql = "INSERT INTO avaliacao (id_usuario, id_livro, avaliacao, review) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiis", $usuario_id, $livro_id, $avaliacao, $review);
        if ($stmt->execute())
        {
            $mensagemSucesso = "Avaliação enviada com sucesso!";
        }
        else
        {
            $mensagemErro = "Erro ao enviar a avaliação. Tente novamente.";
        }
        $stmt->close();
    }
}

//Consultar informações do livro
$sql_info_livro = "SELECT nome FROM livros WHERE id = ?";
$stmt_info_livro = $conn->prepare($sql_info_livro);
$stmt_info_livro->bind_param("i", $livro_id);
$stmt_info_livro->execute();
$stmt_info_livro->bind_result($nome_livro);
$stmt_info_livro->fetch();
$stmt_info_livro->close();


//Consultar avaliação do livro
$sql_avaliacoes = "SELECT u.nome as nome_usuario, a.avaliacao, a.review
                  FROM avaliacao a
                  JOIN usuarios u ON a.id_usuario = u.id
                  WHERE a.id_livro = ?";
$stmt_avaliacoes = $conn->prepare($sql_avaliacoes);
$stmt_avaliacoes->bind_param("i", $livro_id);
$stmt_avaliacoes->execute();
$result_avaliacoes = $stmt_avaliacoes->get_result();
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
        <nav>
            <ul>
                <li><a href="perfil.php">Perfil</a></li>
                <li><a href="reviews.php">Reviews</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main>

        <section id="avaliacao">
            <h2>Avaliação de "<?php echo $nome_livro; ?>"</h2>

            <?php
            // Exibir mensagens de sucesso ou erro
            if (isset($mensagemSucesso)) 
            {
                echo "<p class='sucesso'>$mensagemSucesso</p>";
            } elseif (isset($mensagemErro)) 
            {

                echo "<p class='erro'>$mensagemErro</p>";
            }
            ?>

            <!-- Formulário de Avaliação -->
        <form action="avaliacao.php?livro=<?php echo $livro_id; ?>" method="post" onsubmit="event.preventDefault(); enviarAvaliacao();">
            <label for="avaliacao">Avaliação:</label>
            <div id="estrelas">
                <?php
                // Exibir estrelas vazias
                for ($i = 1; $i <= 5; $i++) 
                {
                    echo "<img id='estrela$i' src='estrela_vazia.png' alt='Estrela' onclick='preencherEstrelas($i)'>";
                }
                ?>
            </div>
            <input type="hidden" name="avaliacao" id="avaliacaoInput" value="0">
            <br>
            <label for="review">Review:</label>
            <textarea name="review" id="review" rows="4" required></textarea>
            <br>
            <button type="submit">Enviar Avaliação</button>
        </form>

            <!-- Avaliações Existentes -->
            <h3>Avaliações dos Usuários:</h3>
            <?php
            while ($avaliacao_usuario = $result_avaliacoes->fetch_assoc())  
            {
                echo "<div class='avaliacao-usuario'>";
                echo "<p><strong>Usuário:</strong> " . $avaliacao_usuario['nome_usuario'] . "</p>";
                echo "<p><strong>Avaliação:</strong> " . $avaliacao_usuario['avaliacao'] . "</p>";
                echo "<p><strong>Review:</strong> " . $avaliacao_usuario['review'] . "</p>";                
                echo "</div>";
            }
            ?>
        </section>
    </main>

    <script>
        function preencherEstrelas(n) {
            
            //Preencher as estrelas até a classificação fornecida
            for (let i = 1; i <= 5; i++) 
            {
                const estrela = document.getElementById(`estrela${i}`);
                if (i <= n) 
                {
                    estrela.src = 'estrela_cheia.png';
                } 
                else 
                {
                    estrela.src = 'estrela_vazia.png';
                }
            }
        }

        function enviarAvaliacao() 
        {
            // Obter a avaliação selecionada pelo usuário
            const avaliacao = document.querySelector('input[name="avaliacao"]:checked').value;

            // Exibir mensagem de sucesso
            alert(`Avaliação enviada com sucesso: ${avaliacao} estrelas!`);
        }


    </script>
</body>
</html>