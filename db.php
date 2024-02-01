<?php
//Conexão com o banco
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teste";

//Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);


//Checando a conexão
if($conn->connect_error)
{
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}