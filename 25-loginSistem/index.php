<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
</head>
<body>
  <?php 
  //conexao
  require_once 'dbConnect.php';
  //sessao
  session_start();
  //se o botao submit foi gerado no post...
  if (isset($_POST['submit'])) {
    $errors = [];
    $login = mysqli_escape_string($connect, $_POST['login']);
    $pass = mysqli_escape_string($connect, $_POST['pass']);

    $sql = "SELECT LOGIN FROM usuarios WHERE LOGIN = '$login'";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
      $pass = md5($pass);
      $sql = "SELECT * FROM usuarios WHERE LOGIN = '$login' AND SENHA = '$pass'";
      $result = mysqli_query($connect, $sql);
      if (mysqli_num_rows($result) == 1) {
        $dados = mysqli_fetch_array($result);
        mysqli_close($connect);
        $_SESSION['logged'] = true;
        $_SESSION['usuId'] = $dados['ID'];
        header("location: home.php");
      }
      else {
        $errors[] = "Senha inválida";
      }
    }
    else {
      $errors[] = "Login Inválido";
    }
  }
  //tratamento de errors
  if (!empty($errors)) {
      echo "<ul>";
      foreach ($errors as $erro) {
        echo "<li> $erro </li>";
      }
      echo "</ul>";
  };
  
  ?>
  <main>
    <hr>
    <h1>Sistema de login</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <label for="login">Login*:</label>
    <input placeholder="minimo 4 digitos" minlength="4" required type="text" name="login" id="loginId">
    <label for="pass">Senha*:</label>
    <input placeholder="minimo 6 digitos" minlength="6" required type="password" name="pass" id="passID">
    <input name="submit" type="submit" value="fazer login">
    </form>
  </main>
</body>
</html>