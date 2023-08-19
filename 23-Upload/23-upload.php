<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Uploads</title>
</head>
<body>
  <?php 
    // Verifica se o formulário foi enviado
    if (isset($_POST['submit-form'])) {
      $errors = [];
      $allowedExtensions = ["png", "jpg", "jpeg", "webp"];
      
      // Verifica se arquivos foram enviados
      if (isset($_FILES['file']['name']) && is_array($_FILES['file']['name'])) {
        $filesLength = count($_FILES['file']['name']);
        
        // Percorre os arquivos enviados
        for ($i = 0; $i < $filesLength; $i++) {
          $extension = pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION);
          
          // Verifica se a extensão do arquivo é permitida
          if (!in_array($extension, $allowedExtensions)) {
            $errors[] = "Arquivo no formato incorreto (.$extension),por favor utilize um arquivo do formato padrão de imagens. ";
          } else {
            $dir = "Arquivos/";
            $temp = $_FILES['file']['tmp_name'][$i];
            $newName = uniqid() . ".$extension";
            
            // Move o arquivo enviado para o diretório especificado
            if (move_uploaded_file($temp, $dir . $newName)) {
              echo "Upload feito com sucesso para $dir$newName<br>";
            } else {
              $errors[] = "Não foi possível fazer o upload";
            }
          }
        }
        
        // Exibe erros ou mensagem de sucesso
        if (!empty($errors)) {
          echo "<ul>";
          foreach ($errors as $error) {
            echo "<li>$error</li>";
          }
          echo "</ul>";
        } else {
          echo "<p>Parabéns, os arquivos estão no formato correto</p>";
        }
      } else {
        echo "<p>Nenhum arquivo enviado</p>";
      }
    }
  ?>

  <form action="<?= $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" method="post">
    <input type="file" multiple name="file[]" id="idFile"><br><hr>
    <input type="submit" name="submit-form" value="Enviar Arquivo">
  </form>
</body>
</html>
