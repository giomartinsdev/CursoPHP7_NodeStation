<?php 
// sessao
session_start();

// header
include_once('./includes/header.php');

// conexao com o banco de dados
require_once 'dbConnect.php';
?>

<!-- tabela que mostra todos os usuarios cadastrados -->
<div class="row">
  <div class="col s12 m6 push-m3">
    <h3 class="light">Clients DATA</h3>
    <p class="bold">only admins can do changes, please if you dont as admin, dont touch*.</p>
    <table class="striped">
      <thead>
        <th>name</th>
        <th>surname</th>
        <th>email</th>
        <th>age</th>
      </thead>
      <tbody>
        <?php 
          // consulta SQL para selecionar todos os clientes
          $sql = "SELECT * FROM clientes";
          $result = mysqli_query($connect, $sql);

          // verifica se há resultados
          if (mysqli_num_rows($result) > 0):
            while ($data = mysqli_fetch_array($result)):
        ?>
              <tr>
                <td><?=$data['nome']?></td>
                <td><?=$data['sobrenome']?></td>
                <td><?=$data['email']?></td>
                <td><?=$data['idade']?></td>
                <td><a href="editClient.php?id=<?=$data['Id']?>" class="btn-floating"><i class="material-icons blue">edit</i></a></td>
                <td><a href="#modal<?=$data['Id']?>" class="modal-trigger btn-floating red"><i class="material-icons">delete</i></a></td>
                <div id="modal<?=$data['Id']?>" class="modal">
                  <div class="modal-content">
                    <h4>are you sure of this?</h4>
                    <p>this action gona to <b>delete</b> this client of our database</p>
                  </div>
                  <div class="modal-footer">
                  <form action="php_action/delete.php" method="post">
                    <input type="hidden" name="id" value="<?=$data['Id']?>">
                    <button class="btn red" type="submit" name="delete-form">yes, iam sure</button>
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">cancel</a>
                  </form>
                  </div>
                </div>
              </tr>
              <?php 
              endwhile;
              else: ?>
            <tr>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
            </tr> 
            <?php endif; ?>
      </tbody>
    </table>
    <br>
    <!-- botao para adicionar cliente -->
    <a href="./addClient.php" class="btn blue">add client</a>
  </div>
</div>

<?php 
// footer e toast de mensagem, para erro e cadastro
include_once('./includes/footer.php');
include_once('./includes/message.php')
?>
