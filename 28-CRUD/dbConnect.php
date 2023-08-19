<?php 

// conexão com o banco de dados  
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "crud";

$connect = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($connect, "utf8");

// verifica se houve falha na conexão
if (mysqli_connect_error()) {
  echo "falha na conexão do db: " . mysqli_connect_error();
};
?>
