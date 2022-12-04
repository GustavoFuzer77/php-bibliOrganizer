<?php
require_once 'global.php';

?>


<body>
  <?php require_once 'components/header.php' ?>
  <div class="login-page">
    <div class="Form">
      <a href="<?= $URL ?>/index.php" class="voltar-pagina">Voltar ⤴</a>
      <form action="<?= $URL ?>/auth_process.php" method='post' class="container-form">

        <input type="hidden" name="type" value="login">

        <label for="email">Email</label>
        <input name="email" type="email" placeholder="digite seu e-mail">
        <label for="senha">Senha</label>
        <input name="senha" type="password" placeholder="digite sua senha">
        <button type="submit">Logar</button>
        <span class="criar-conta">Não tem uma conta ? Crie uma <a href="<?= $URL ?>/criar.php">agora</a></span>

      </form>
    </div>
    <div class="images">

    </div>
  </div>
</body>

</html>

