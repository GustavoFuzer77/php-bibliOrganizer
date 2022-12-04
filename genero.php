<?php
require_once 'global.php';
require_once 'db.connect.php';

require_once("models/Usuario.class.php");
require_once("classes/dao/UsuarioDAO.php");

$user = new Usuario();
$userDao = new UsuarioDAO($connect, $URL);

$userData = $userDao->verifyToken(true); //deixar a rota protegida


?>

<?php require_once './components/header.php' ?>

<body>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.css" integrity="sha512-drnvWxqfgcU6sLzAJttJv7LKdjWn0nxWCSbEAtxJ/YYaZMyoNLovG7lPqZRdhgL1gAUfa+V7tbin8y+2llC1cw==" crossorigin="anonymous" />

  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <div id="main-container" class="container-fluid edit-profile-page mt-5">
    <div class="col-md-12">
      <form action="<?= $URL ?>/genero_process.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="type" value="criarGenero">
        <div class="row">
          <div class="col-md-4">
            <h1>Criar um gênero</h1>
            <p class="page-description">Escreva no formulário abaixo:</p>
            <div class="form-group">
              <label for="descritivo">Nome do gênero:</label>
              <input type="text" class="form-control" id="nome" name="descritivo" placeholder="Digite o nome do gênero">
            </div>
            <button type="submit" class="btn card-btn btn-primary">Criar</button>
          </div>
        </div>
      </form>
    </div>
  </div>

</body>

</html>
