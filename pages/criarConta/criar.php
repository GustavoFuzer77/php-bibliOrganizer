<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./create.style.css">
  <title>BibliOrganizer</title>
</head>

<body>
  <div class="login-page">
    <div class="Form">
      <a href="../../index.php" class="voltar-pagina">Voltar ⤴</a>

      <form method="POST" action="../profilePageEdit/editarPerfil.php" class="container-form">

        <input type="hidden" name="type" value="register">

        <label for="email">Email</label>
        <input name="email" type="email" placeholder="digite seu e-mail">
        <label for="senha">Senha</label>
        <input name="senha" type="password" placeholder="digite sua senha">

        <button type="submit">Criar conta</button>


      </form>
    </div>
    <div class="images"></div>
  </div>
</body>

</html>
