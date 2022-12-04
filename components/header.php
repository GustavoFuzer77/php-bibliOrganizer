<?php
require_once 'global.php';
require_once 'db.connect.php';
require_once 'assets/utils/snackBar.php';
require_once 'classes/dao/UsuarioDAO.php';


$message = new SnackBar($URL);
$userDao = new UsuarioDAO($connect, $URL);


$SnackBarMessages = $message->getMessage();
//se a mensagem estiver vazia !empty, eu limpo ela
if (!empty($SnackBarMessages['msg'])) {
  $message->clearMessage();
}

$userData = $userDao->verifyToken(false); // rota do header não é protegida, todos podem acessa-la. Portanto, colocamos false


if (isset($userData)) {
  $admV = $userData->adm == 'true'; // metodo para validar se o adm é true, e fazer o mesmo da rota
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/index.style.css">

  <title>BibliOrganizer</title>
</head>
<header>
  <aside class="nav-bar-menu" id='nav-bar-menu'>
    <div class="profile-location">
      <span style="background-image: url('<?= isset($userData->imagem) ? $userData->imagem : './assets/img/users/user.jpg' ?>'); background-size: cover;" class="profile-icon-location" onclick="openProfileData()"></span>
    </div>
    <div class="body-menu">
      <nav>
        <?php if (isset($userData) && $admV) : ?>
          <div title="Adicionaro Livros">
            <a href="<?= $URL ?>/criarLivro.php">⬆</a>
            <div>
              <span>Adicionar Livros</span>
            </div>
          </div>
          <div title="Criar gênero">
            <a href="<?= $URL ?>/genero.php">📖</a>
            <div>
              <span>Adicionar Gêneros</span>
            </div>
          </div>
        <?php endif; ?>
        <div title="HOME">
          <a href="<?= $URL ?>/index.php">🏠</a>
          <div>
            <span>Home</span>
          </div>
        </div>
        <div title="Buscar por Gêneros">
          <a href="./buscarPorGenero.php">📚</a>
          <div>
            <span>Livros por gêneros</span>
          </div>
        </div>

      </nav>
    </div>
    <div class="login-location">
      <?php if ($userData) : ?>
        <a href="<?= $URL ?>/logOut.php">Deslogar</a>
      <?php else : ?>
        <a href="<?= $URL ?>/login.php">Logar</a>
      <?php endif; ?>
      <!-- <a class="modal-login-a" onclick="openModalLogin(this)"><span>🔑</span>Logar</a> -->
    </div>
  </aside>
</header>
<!-- VALIDAÇÃO DE MENSAGENS CASO TENHA ERROS -->
<?php if (!empty($SnackBarMessages['msg'])) : ?>
  <div class="snackBar-message">
    <i class="fa-solid fa-circle-exclamation  fa-xl"></i>
    <p class="msg"><?= $SnackBarMessages['msg'] ?></p>
  </div>
<?php endif; ?>
