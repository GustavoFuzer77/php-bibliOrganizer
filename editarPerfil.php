<?php
// require_once 'components/header.php';
require_once 'global.php';
require_once 'db.connect.php';

require_once("models/Usuario.class.php");
require_once("classes/dao/UsuarioDAO.php");

$user = new Usuario();
$userDao = new UsuarioDAO($connect, $URL);

$userData = $userDao->verifyToken(true);

// para trocar a nova imagem
if ($userData->imagem == "") {
  $userData->imagem = "user.jpg";
}

?>
<?php require_once 'components/header.php' ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.css" integrity="sha512-drnvWxqfgcU6sLzAJttJv7LKdjWn0nxWCSbEAtxJ/YYaZMyoNLovG7lPqZRdhgL1gAUfa+V7tbin8y+2llC1cw==" crossorigin="anonymous" />

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
<div id="main-container" class="container-fluid edit-profile-page mt-5">
  <div class="col-md-12">
    <form action="<?= $URL ?>/user_process.php" method="POST" enctype="multipart/form-data">

      <input type="hidden" name="type" value="update">

      <div class="row">
        <div class="col-md-4">
          <h1><?= $userData->nome ?></h1>
          <p class="page-description">Altere seus dados no formulário abaixo:</p>
          <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o seu nome" value="<?= $userData->nome ?>">
          </div>

          <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="text" readonly class="form-control disabled" id="email" name="email" placeholder="Digite o seu nome" value="<?= $userData->email ?>">
          </div>
          <input type="submit" class="btn card-btn btn-primary" value="Alterar">
        </div>
        <div class="col-md-4">
          <div class="div-image-select-user" style="background-image: url('<?= $userData->imagem ?>')"></div>
          <div class="form-group">
            <label for="image">Foto:</label>
            <input type="file" class="form-control-file" name="image">
          </div>
          <div class="form-group">
            <label for="descritivo">Sobre você:</label>
            <textarea style="resize: none;" class="form-control" name="descritivo" id="bio" rows="5" placeholder="Conte quem você é, o que faz..."><?= $userData->descritivo ?></textarea>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
