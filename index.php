<?php
require_once "global.php";
require_once "db.connect.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/home/index.style.css">
  <script src="https://morgan3d.github.io/include.js/include.min.js" defer></script>
  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>BibliOrganizer</title>
</head>


<body>
  <?php require_once 'components/header.php' ?>
  <main>
    <!-- LOGIN MODAL -->
    <div class="login-modal close">
      <div class="body-modal-login">
        <div class="body-content-login">
          <form action="">
            <div>
              <label for="email">Digite seu email:</label>jpg
              <input type="text" name="email">
            </div>
            <div>
              <label for="senha">digite sua senha:</label>
              <input type="password" name="senha">
            </div>
            <button type="submit">Logar</button>
          </form>
        </div>
      </div>
    </div>

    <!-- DADOS PERFIL MODAL -->
    <div class="perfil-dados-modal">
      <div class="modal-content-perfil">
        <div class="info-section-perfil-modal">
          <div class="info-image-description-perfil">
            <div class="image-section-perfil"></div>
            <div class="text-section-perfil">
              <span>Gustavo Fuzer</span>
              <p>descritivo do usuario</p>
            </div>
          </div>
          <div class="about-actor-section-perfil">
            <span>Dados do perfil</span>
            <p>Endereço: Rua Guaruja. N.35</p>
            <p>CPF: 48948826908 </p>
            <p>rg: sdsdadasd</p>
          </div>
          <span>Livros alugados</span>
          <div class="livros-alugados-perfil">
            <div class="image-section-perfil list">
              <img src="<?= $URL ?>/assets/img/bookImg/duna.jpg" alt="">
              <p>Duna</p>
            </div>
            <div class="image-section-perfil list">
              <img src="<?= $URL ?>/assets/img/bookImg/duna.jpg" alt="">
              <p>Duna</p>
            </div>
            <div class="image-section-perfil list">
              <img src="<?= $URL ?>/assets/img/bookImg/duna.jpg" alt="">
              <p>Duna</p>
            </div>
            <div class="image-section-perfil list">
              <img src="<?= $URL ?>/assets/img/bookImg/duna.jpg" alt="">
              <p>Duna</p>
            </div>
            <div class="image-section-perfil list">
              <img src="<?= $URL ?>/assets/img/bookImg/duna.jpg" alt="">
              <p>Duna</p>
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
            <a class="book-list" href="./pages/livroInfo/livro.php?id=1">
              <img src="<?= $URL ?>assets/img/bookImg/duna.jpg" alt="">
              <p>Duna</p>
            </a>
          </div>
        </div>
      </div>
    </div>

  </main>

</body>
<script src='<?= $URL ?>assets/scriptHome.js' defer></script>

</html>
