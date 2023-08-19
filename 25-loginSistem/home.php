<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HOME</title>
</head>
<?php 
  //conexao
  require_once 'dbConnect.php';
  //sessao
  session_start();
  //verificacao
  if (!isset($_SESSION['LOGADO'])) {
    header('location: index.php');
  }

  //dados
  $id = $_SESSION['usuId'];
  $sql = "SELECT * FROM usuarios WHERE ID = $id";  
  $result = mysqli_query($connect, $sql);
  $data = mysqli_fetch_array($result);
  $name = $data['NOME'];
  $login = $data['LOGIN'];
  mysqli_close($connect);

?>
<body>
  <h1>PAGINA RESTRITA PARA LOGADOS</h1>
  <p>olá <b><?=$name?></b> seu usuario é: <b><?=$login?></b> </p>
  <a href="logout.php">SAIR</a>
</body>
</html>