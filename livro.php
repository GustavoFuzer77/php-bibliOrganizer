<?php
require_once 'global.php';
require_once 'db.connect.php';
require_once 'classes/dao/LivroDAO.php';
require_once 'classes/dao/UsuarioDAO.php';

$userDao = new UsuarioDAO($connect, $URL);
$userData = $userDao->verifyToken(false);


$idGet = $_GET['id']; // pega o id da url

$livro = new LivroDAO($connect, $URL);
$livroData = $livro->getLivroById($idGet); // pega os livros pelo id da url


if (isset($userData)) {
  $admV = $userData->adm == 'true'; // metodo para validar se o adm é true, e fazer o mesmo da rota
}


?>

<body>
  <?php require_once 'components/header.php'; ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.css" integrity="sha512-drnvWxqfgcU6sLzAJttJv7LKdjWn0nxWCSbEAtxJ/YYaZMyoNLovG7lPqZRdhgL1gAUfa+V7tbin8y+2llC1cw==" crossorigin="anonymous" />

  <div class="livro-finded-by-id">
    <form action="<?= $URL ?>/alugar_process.php" method="POST">
      <?php if ($livroData) : ?>
        <div class="name-image">
          <div class="imagem-capa" style="background-image: url('<?= $livroData->imagem ?>'); background-size: cover;"></div>
          <div class="descritivo-titulo">
            <h1><?= $livroData->titulo ?></h1>
            <p><?= $livroData->descritivo ?></p>
            <p>escrito por: <span><?= $livroData->autor ?></span></p>
            <div>
              <button class="btn card-btn btn-primary">Alugar</button>
              <button class="btn btn-secondary" disabled>Devolver</button>
              <?php if (isset($userData) && $admV) : ?>
                <input type="hidden" name="type" value="delete" />
                <button name="deleteLivro" class="btn btn-danger" value="<?= $idGet ?>">Apagar livro</button>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php else : ?>
        <p class="not-found">ID não encontrado.</p>
      <?php endif; ?>
    </form>
  </div>
</body>

</html>
