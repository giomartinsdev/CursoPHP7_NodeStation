<?php
// sessao
session_start();

// conexao com o banco de dados
require_once '../dbConnect.php';

if (isset($_POST['edit-form'])) {
    $name = mysqli_escape_string($connect, $_POST['name']);
    $surname = mysqli_escape_string($connect, $_POST['surname']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $age = mysqli_escape_string($connect, $_POST['age']);  // não é necessário escapar aqui, mas escapei por segurança
    $id = mysqli_escape_string($connect, $_POST['id']);  // mesma coisa, não precisa mas por segurança faço

    // verifica se o valor de age é numérico, se não, exibe um erro e redireciona
    if (!is_numeric($age)) {
        $_SESSION['mensage'] = "Invalid age. Please enter a valid numeric value.";
        header("location: ../index.php");
        exit;
    }

    // converte age para um valor inteiro, pois pode ser um numérico float
    $age = intval($age);

    $sql = "UPDATE clientes SET nome = '$name', sobrenome = '$surname', email = '$email', idade = '$age' WHERE id = '$id'";

    if (mysqli_query($connect, $sql)) {
        $_SESSION['mensage'] = "Successfully edited!";
        header("location: ../index.php");
    } else {
        $_SESSION['mensage'] = "There was an error with your update, please try again later.";
        header("location: ../index.php");
    }
} else {
    $_SESSION['mensage'] = "Error found, please redo your form";
    header("location: ../index.php");
}
?>
