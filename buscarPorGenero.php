<?php
require_once 'global.php';
require_once 'db.connect.php';
require_once("classes/dao/generoDAO.php");
require_once("classes/dao/LivroDAO.php");

$genero = new GeneroDAO($connect, $URL);
$generoData = $genero->getAllGenero();

if ($_GET) {
  $livro = new LivroDAO($connect, $URL);
  $livroData = $livro->getLivrosByGenero($_GET['generoToSearch']);
}


?>

<?php require_once 'components/header.php' ?>
<div class="home-listagem-livros">
  <div class="content-home-livros">
    <div class="input-location">
      <form action="" method="GET">
        <select name="generoToSearch">
          <option value="0">Selecione o gênero para buscar</option>
          <?php foreach ($generoData as $data) : ?>
            <option value="<?= $data->id_genero ?>"><?= $data->descritivo ?></option>
          <?php endforeach; ?>
        </select>
        <button type="submit">🔎Filtrar por gênero</button>
      </form>
    </div>
    <div class="space-to-content-list">
      <?php if (isset($livroData) && $livroData) : ?>
        <div class="content-listagem-livros">
          <?php foreach ($livroData as $data) : ?>
            <a class="book-list" href="<?= $URL ?>/livro.php?id=<?= $data->id_livro ?>">
              <img src="<?= $URL . $data->imagem ?>" alt="">
              <p><?= $data->titulo ?></p>
            </a>
          <?php endforeach; ?>
        </div>
      <?php else : ?>
        <P>Nenhum livro encontrado com esse gênero 😭</P>
      <?php endif; ?>
    </div>
  </div>
</div>
