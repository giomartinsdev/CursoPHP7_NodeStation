<?php // header
include_once('./includes/header.php');
?>

<!-- formulario para cadastrar novo cliente -->
<div class="row">
  <div class="col s12 m6 push-m3">
    <h3 class="light">New Client</h3>
    <form action="./php_action/create.php" method="post">
      <div class="input-field col s12">
        <input type="text" name="name" id="nameId">
        <label for="name">Name</label>
      </div>

      <div class="input-field col s12">
        <input type="text" name="surname" id="surnameID">
        <label for="name">Surname</label>
      </div>

      <div class="input-field col s12">
        <input type="text" name="email" id="emailId">
        <label for="email">Email</label>
      </div>
      
      <div class="input-field col s12">
        <input type="text" name="age" id="ageId">
        <label for="age">Age</label>
      </div>
      
      <!-- botao de enviar formulario e de visualizar lista de clientes  -->
      <button name="submit-form" type="submit" class="btn blue">Register</button>
      <a href="./index.php" class="btn yellow darken-2">Customer list</a>

    </form>
  </div>
</div>

<?php // footer
include_once('./includes/footer.php');
?>
