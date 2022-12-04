<?php
require_once "global.php";
require_once "db.connect.php";
require_once 'classes/dao/UsuarioDAO.php';
require_once 'classes/dao/LocacaoDAO.php';
require_once 'classes/dao/LivroDAO.php';

$userDao = new UsuarioDAO($connect, $URL);
$locacaoDao = new LocacaoDAO($connect);
$livroDao = new LivroDAO($connect, $URL);

$data = $userDao->verifyToken(false); // rota do header não é protegida, todos podem acessa-la. Portanto, colocamos false



if (empty($_GET['q'])) {
  $livroData = $livroDao->getAllLivros();
} else {
  $livroData = $livroDao->getLivrosByTitle($_GET['q']);
}

?>

<?php require_once 'components/header.php' ?>

<body>
  <main>
    <!-- DADOS PERFIL MODAL -->
    <div class="perfil-dados-modal">
      <div class="modal-content-perfil">
        <div class="info-section-perfil-modal">
          <div class="info-image-description-perfil">
            <div style="background-image: url('<?= $data->imagem ?>');background-size: cover;" class="image-section-perfil"></div>
            <div class="text-section-perfil">
              <span><?= $data->nome ? $data->nome : 'nome do usuário' ?></span>
              <p><?= $data->descritivo ? $data->descritivo : 'descrição do usuário' ?></p>
            </div>
            <button><a href='<?= $URL ?>/editarPerfil.php'>Editar perfil</a></button>
          </div>

          <div style='display:flex; flex-direction:column;'>
            <span style="margin-top: 16px;">Livros alugados</span>
            <div class="livros-alugados-perfil">
              <!-- <div class="image-section-perfil list">
                <img src="<?= $URL ?>/assets/img/bookImg/duna.jpg" alt="">
                <p>Duna</p>
              </div> -->
              <p>Parece que você não tem nenhum livro alugado :(</p>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- DADOS PERFIL MODAL -->

    <div class="home-listagem-livros">
      <div class="content-home-livros">
        <div class="input-location">
          <form action="" method="GET">
            <input type="text" name="q" type="search" placeholder="digite o nome do livro para buscar">
            <div>🔍</div>
          </form>
        </div>
        <div class="space-to-content-list">
          <div class="content-listagem-livros">
            <?php foreach ($livroData as $data) : ?>
              <a class="book-list" href="<?= $URL ?>/livro.php?id=<?= $data->id_livro ?>">
                <img src="<?= $URL . $data->imagem ?>" alt="">
                <p><?= $data->titulo ?></p>
              </a>
            <?php endforeach; ?>
          </div>

        </div>
      </div>
    </div>

  </main>

</body>
<script src='<?= $URL ?>/assets/scriptHome.js' defer></script>

</html>
