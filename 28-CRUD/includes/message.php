<?php 
// código para exibir a mensagem usando o Toast do Materialize
if (isset($_SESSION['mensage'])) {
  echo '<script>
          window.onload = function () {
            M.toast({html: "' . $_SESSION['mensage'] . '"});
          }
        </script>';
  session_unset(); // Limpa a variável de sessão após exibir a mensagem
}
?>

