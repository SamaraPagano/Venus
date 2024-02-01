<?php
//Verificar se o formulário foi submetido
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include 'db.php';

    //Receber dados dos usuários
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    //Criptografar a senha antes de armazená-la
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    if($conn->query($sql) === TRUE)
    {
        echo "Usuário cadastrado com sucesso!";
    }
    else
    {
        echo "Erro:" . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-... (hash)" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
    <title>Venus</title>
</head>
<body>
   <form action="" method="post" class="center-form">
    <div class="main">
        <div class="left-cadastro">
            <h1>Venus</h1>
            <img class="img-book" src="book-lover-animate.svg" alt="">
        </div>
        <div class="right-cadastro">
            <div class="card-cadastro">
                <h1>Cadastro</h1>
                <div class="textfield">
                    <label for="nome"><i class="fas fa-user" style="color: #514869;"></i>Nome:</label>
                    <input type="text" name="nome" id="nome" placeholder="Nome" required>
                </div>
                <div class="textfield">
                    <label for="email"><i class="fas fa-envelope" style="color: #514869;"></i>E-mail:</label>
                    <input type="email" name="email" id="email" placeholder="E-mail" required>
                </div>
                <div class="textfield">
                    <label for="senha"><i class="fas fa-lock" style="color: #514869;"></i>Senha:</label>
                    <input type="password" name="senha" id="senha" placeholder="Senha" required>
                </div>
                <button type="submit" class="btn-cadastro">Cadastro</button>
            </div>
        </div>
       </div>
   </form>
</body>
</html>
