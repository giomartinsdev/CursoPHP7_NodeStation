<?php 
session_start();
$_SESSION['cor'] = "Vermelho";
$_SESSION['carro'] = "Onix";
echo $_SESSION['cor'] ."<br>". $_SESSION['carro'];

?>