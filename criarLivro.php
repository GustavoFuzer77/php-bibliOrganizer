<?php
// require_once 'components/header.php';
require_once 'global.php';
require_once 'db.connect.php';

require_once("models/Livro.class.php");
require_once("classes/dao/LivroDAO.php");
require_once("classes/dao/generoDAO.php");


$livro = new Livros();
$livroData = new LivroDAO($connect, $URL);

// $livro = $livroDAO->(true);
// $livroData =

// // para trocar a nova imagem
$genero = new GeneroDAO($connect, $URL);
$generoData = $genero->getAllGenero();

if ($livro->imagem == "") {
  $livro->imagem = "user.jpg";
}

?>
<?php require_once 'components/header.php' ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.css" integrity="sha512-drnvWxqfgcU6sLzAJttJv7LKdjWn0nxWCSbEAtxJ/YYaZMyoNLovG7lPqZRdhgL1gAUfa+V7tbin8y+2llC1cw==" crossorigin="anonymous" />

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
<div id="main-container" class="container-fluid edit-profile-page mt-5">
  <div class="col-md-12">
    <form action="<?= $URL ?>/livro_process.php" method="POST" enctype="multipart/form-data">

      <input type="hidden" name="type" value="criarLivro">

      <div class="row">
        <div class="col-md-4">
          <h1>Adicionar livros</h1>
          <p class="page-description">Adicione as informações do livro no formulário abaixo:</p>
          <div class="form-group">
            <label for="tituloLivro">Titulo:</label>
            <input required type="text" class="form-control" id="titulo" name="tituloLivro" placeholder="Digite o titulo do livro">
          </div>

          <div class="form-group">
            <label for="nomeAutor">Nome do autor:</label>
            <input required type="text" class="form-control" id="nomeAutor" name="nomeAutor" placeholder="Digite o nome do autor">
          </div>

          <div class="form-group">
            <label for="nomeAutor">Adicionar no gênero:</label>
            <select name="genero">
              <option value="0">Selecione o gênero</option>
              <?php foreach ($generoData as $data) : ?>
                <option value="<?= $data->id_genero ?>"><?= $data->descritivo ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <input type="submit" class="btn card-btn btn-primary" value="Adicionar">
        </div>
        <div class="col-md-4">
          <div class="div-image-select-user" style="background-image: url('<?= $livroData->imagem ?>')"></div>
          <div class="form-group">
            <label for="image">Adicionar a capa do livro:</label>
            <input type="file" class="form-control-file" name="image">
          </div>
          <div class="form-group">
            <label for="descritivo">Descrição do livro:</label>
            <textarea required style="resize: none;" class="form-control" name="descritivo" id="descritivo" rows="5" placeholder="Conte quem você é, o que faz e onde trabalha..."></textarea>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
