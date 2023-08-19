<?php // header
include_once('./includes/header.php');

// conexao com o banco de dados
require_once 'dbConnect.php';

// select
if (isset($_GET['id'])) {
  $id = mysqli_escape_string($connect, $_GET['id']);
  $sql = "SELECT * FROM clientes WHERE id = $id";
  $resultado = mysqli_query($connect, $sql);
  $dados = mysqli_fetch_array($resultado);
}
?>

<!-- formulario para cadastrar novo cliente -->
<div class="row">
  <div class="col s12 m6 push-m3">
    <h3 class="light">edit client</h3>
    <form action="./php_action/update.php" method="post">
    <input name="id" type="hidden" value="<?=$dados['Id']?>">
      <div class="input-field col s12">
        <input value="<?=$dados['nome']?>" type="text" name="name" id="nameId">
        <label for="name">name</label>
      </div>

      <div class="input-field col s12">
        <input value="<?=$dados['sobrenome']?>" type="text" name="surname" id="surnameID">
        <label for="name">surname</label>
      </div>

      <div class="input-field col s12">
        <input value="<?=$dados['email']?>" type="text" name="email" id="emailId">
        <label for="email">email</label>
      </div>
      
      <div class="input-field col s12">
        <input value="<?=$dados['idade']?>" type="text" name="age" id="ageId">
        <label for="age">age</label>
      </div>
      
      <!-- botao de enviar formulario e de vizualizar lista de clientes  -->
      <button name="edit-form" type="submit" class="btn blue"><i class="material-icons">edit</i></button>
      <a href="./index.php" class="btn yellow darken-2">customer list</a>

    </form>
  </div>
</div>

<?php // footer
include_once('./includes/footer.php');
?>

