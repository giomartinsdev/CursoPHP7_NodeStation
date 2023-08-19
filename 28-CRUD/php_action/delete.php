<?php
// sessao
session_start();

// conexao com o banco de dados
require_once '../dbConnect.php';

if (isset($_POST['delete-form'])) {
    $id = mysqli_escape_string($connect, $_POST['id']);

    $sql = "DELETE from clientes WHERE id = '$id'";

    if (mysqli_query($connect, $sql)) {
        $_SESSION['mensage'] = "Successfully deleted!";
        header("location: ../index.php");
    } else {
        $_SESSION['mensage'] = "There was an error with your delete, please try again later.";
        header("location: ../index.php");
    }
} else {
    $_SESSION['mensage'] = "Error found, please redo your form";
    header("location: ../index.php");
}
?>
