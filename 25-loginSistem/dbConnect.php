<?php 

//conexao com o banco de dados  
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "sistemalogin";

$connect = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_error()) {
  echo "falha na conexão do db". mysqli_connect_error();
};