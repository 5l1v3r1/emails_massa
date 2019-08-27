<?php
require 'autoload.php';
$sql = new Dados();

$emails = $sql->getEmails();

if (isset($_GET['id']) && !empty($_GET['id'])) {
  $id = addslashes($_GET['id']);

  $sql->delEmail($id);
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>E-mail em massa</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <div class="container">
    <h1>Cadastrar E-mail</h1>
    <center>
      <form method="POST" action="registerEmail.php">
        <input type="email" name="email" placeholder="E-mail" required="">
        <br><br>
        <button>Registrar</button>
      </form>
      <hr>
      <div class="email">
        <h1>E-mail Registrados</h1>
        <table>
          <tr>
            <th>E-mail</th>
            <th>Ação</th>
          </tr>
          <?php if(!empty($emails)): ?>
            <?php foreach($emails as $e): ?>
              <tr>
                <td><?=htmlspecialchars($e['email']); ?></td>
                <td width="100"><a href="?id=<?=$e['id']; ?>"><button class="btn">Excluir</button></a></td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
          
        </table>
      </div>
      <hr>
      <div class="email_enviar">
        <form method="POST" action="enviarEmail.php">
          <textarea placeholder="Digite sua mensagem" name="mensagem" required=""></textarea>
          <br>
          <button>Enviar</button>
          <br><br>
        </form>
      </div>
    </center>
    <br>
  </div>

</body>
</html>