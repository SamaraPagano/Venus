<?php
//Verificar se o formulário foi submetido
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include 'db.php';

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT senha FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        if(password_verify($senha, $row['senha']))
        {
            //Senha correta, redirecionar para a página principal
            header("Location: index.php");
        }
        else
        {
            //Senha incorreta
            echo "Senha incorreta!";
        }
    }
    else
    {
        //E-mail não encontrado
        echo "E-mail não encontrado!";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
    <title>Login - Venus</title>
</head>
<body>
   <form action="" method="post" class="center-form">
    <div class="main">
        <div class="left-login">
            <h1>Venus</h1>
            <img class="img-book" src="book-lover-animate.svg" alt="">
        </div>
        <div class="right-login">
            <div class="card-login">
                <h1>Login</h1>
                <div class="textfield">
                    <label for="email"><i class="fas fa-envelope" style="color: #514869;"></i>E-mail:</label>
                    <input type="email" name="email" id="email" placeholder="E-mail" required>
                </div>
                <div class="textfield">
                    <label for="senha"><i class="fas fa-lock" style="color: #514869;"></i>Senha:</label>
                    <input type="password" name="senha" id="senha" placeholder="Senha" required>
                </div>
                <button type="submit" class="btn-login">Login</button>
            </div>
        </div>
       </div>
   </form>
</body>
</html>
