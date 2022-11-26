<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./profileEdit.style.css">
  <title>BibliOrganizer</title>
</head>

<body>
  <main>
    <div class="login-page">
      <div class="Form">
        <a href="../../index.php" class="voltar-pagina">Voltar ⤴</a>

        <form method="POST" action="../profilePageEdit/editarPerfil.php" class="container-form">

          <input type="hidden" name="type" value="editProfile">

          <label for="Descritivo">Descritivo</label>
          <input name="Descritivo" type="email" placeholder="fale sobre você">
          <label for="Cpf">Cpf</label>
          <input name="Cpf" type="password" placeholder="digite seu Cpf">
          <label for="RG">RG</label>
          <input name="RG" type="password" placeholder="digite seu RG">
          <label for="Endereco">Endereço</label>
          <input name="Endereco" type="password" placeholder="digite seu Endereço N°">
          <button type="submit">Alterar</button>

        </form>
      </div>
      <div class="images">
        <div class="card-foto">

        </div>
      </div>
    </div>
  </main>

</body>

</html>
