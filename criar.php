<?php
require_once 'global.php';

?>
<!-- <!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/index.style.css">

  <title>BibliOrganizer</title>
</head> -->

<body>
  <?php require_once 'components/header.php' ?>

  <div class="login-page">
    <div class="Form">
      <a href="<?= $URL ?>/index.php" class="voltar-pagina">Voltar ⤴</a>
      <form method="POST" action="<?= $URL ?>/auth_process.php" class="container-form">
        <!-- input invisivel para pegar o type dele no auth_process -->
        <input type="hidden" name="type" value="register">

        <label for="email">Email</label>
        <input name="email" type="email" placeholder="digite seu e-mail">
        <label for="senha">Senha</label>
        <input name="senha" type="password" placeholder="digite sua senha">
        <label for="nome">nome</label>
        <input name="nome" type="text" placeholder="digite seu nome">

        <button type="submit">Criar conta</button>


      </form>
    </div>
    <div class="images"></div>
  </div>
</body>

</html>
