<?php
// sessao
session_start();

// conexao com o banco de dados
require_once '../dbConnect.php';

//clear
function clear ($input){
    global $connect;
    //sql injection
    $var = mysqli_escape_string($connect, $input);
    //XSS
    $var = htmlspecialchars($var);
    return $var;
}

if (isset($_POST['submit-form'])) {
    $name = clear($_POST['name']);
    $surname = clear($_POST['surname']);
    $email = clear($_POST['email']);
    $age = clear($_POST['age']);  // não é necessário escapar aqui, mas escapei por segurança

    // verifica se o valor de age é numérico, se não, exibe um erro e redireciona
    if (!is_numeric($age)) {
        $_SESSION['mensage'] = "Invalid age. Please enter a valid numeric value.";
        header("location: ../index.php");
        exit;
    }

    // converte age para um valor inteiro, pois pode ser um numérico float
    $age = intval($age);

    $sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$name','$surname','$email','$age')";

    if (mysqli_query($connect, $sql)) {
        $_SESSION['mensage'] = "Successfully registered!";
        header("location: ../index.php");
    } else {
        $_SESSION['mensage'] = "There was an error with your registration, please try again later.";
        header("location: ../index.php");
    }
} else {
    $_SESSION['mensage'] = "Error found, please redo your form";
    header("location: ../index.php");
}
?>
