<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validacao de forms em php</title>
</head>
<body>

  <?php 
  //checka se o butao de submit foi clicado
  if (isset($_POST['submit-form'])) {
    $errors = [];

    //sanitize
    $pass = filter_input(INPUT_POST,'pass', FILTER_SANITIZE_NUMBER_INT); 
    if(!filter_input(INPUT_POST, 'pass', FILTER_VALIDATE_INT)){
      $errors[] = 'A senha não pode conter letras ou caracteres especiais';
    };
    
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if(!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){
      $errors[] = 'O Email deve estar no formato padrão';
    };

 
    //checka se existe valor no valor no array de errors e se sim printa os erros numa lista
    if (!empty($errors)) {
      echo "<ul>";
      foreach ($errors as $erro) {
        echo "<li> $erro </li>";
      }
      echo "</ul>";
    }
    else {
      echo "<p>Parabéns, seus dados foram enviados</p>";
    };
  };
  ?>  


  <form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
    <label for="email">Email:</label>
    <input placeholder="exemplo@exemplo.com" name="email" id="emailId" type="text">
    <label for="pass">Senha:</label>
    <input name="pass" id="passId" type="password">
    <input type="submit" name="submit-form" value="Enviar">
  </form>

</body>
</html>