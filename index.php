<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/home/index.style.css">
  <script src="https://morgan3d.github.io/include.js/include.min.js" defer></script>
  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous" defer></script>
  <title>BibliOrganizer</title>
</head>


<body>
  <header>
    <aside class="nav-bar-menu" id='nav-bar-menu'>
      <div class="profile-location">
        <span></span>
      </div>
      <div class="body-menu">
        <nav>
          <div>
            <a href="">📚</a>
            <div>
              <span>Categorias</span>
            </div>
          </div>
          <div>
            <a href="">⬆</a>
            <div>
              <span>Adicionar livros</span>
            </div>
          </div>
          <div>
            <a href="">🍷</a>
            <div>
              <span>Lorem ipsum dolor sit amet</span>
            </div>
          </div>
        </nav>
      </div>
      <div class="login-location">
        <a class="modal-login-a" onclick="openModalLogin(this)"><span>🔑</span>Logar</a>
      </div>
    </aside>
  </header>
  <main>
    <!-- LOGIN MODAL -->
    <div class="login-modal close">
      <div class="body-modal-login">
        <div class="body-content-login">
          <form action="">
            <div>
              <label for="email">Digite seu email:</label>
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
    <!-- LOGIN MODAL -->
    <!-- LIVRO POR ID MODAL -->
    <div class="livro-per-id-modal">
      <div class="modal-content-idlivro">
        <div class="info-section-idLivro-modal">
          <div class="info-image-description">
            <div class="image-section"></div>
            <div class="text-section">
              <span>Título</span>
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum dolor odit corrupti hic voluptatem dolorum maiores eum assumenda perspiciatis commodi doloremque aperiam molestiae, eos inventore nihil nisi, voluptates dignissimos provident.</p>
            </div>
          </div>
          <div class="about-actor-section">
            <span>Sobre o autor</span>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid minima ab possimus similique cupiditate. Aspernatur cum fugiat, neque ab ipsam, asperiores minus cumque, consequatur quaerat vero maxime dolorum ad pariatur.</p>
          </div>
          <span>titulos semelhantes</span>
          <div class="more-books-from-actor">
            <div class="image-section list"></div>
            <div class="image-section list"></div>
            <div class="image-section list"></div>
            <div class="image-section list"></div>
            <div class="image-section list"></div>
          </div>
        </div>
      </div>

    </div>
    <!-- LIVRO POR ID MODAL -->

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
              <img src="./assets/img/duna.jpg" alt="">
              <p>Duna</p>
            </div>
            <div class="image-section-perfil list">
              <img src="./assets/img/duna.jpg" alt="">
              <p>Duna</p>
            </div>
            <div class="image-section-perfil list">
              <img src="./assets/img/duna.jpg" alt="">
              <p>Duna</p>
            </div>
            <div class="image-section-perfil list">
              <img src="./assets/img/duna.jpg" alt="">
              <p>Duna</p>
            </div>
            <div class="image-section-perfil list">
              <img src="./assets/img/duna.jpg" alt="">
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
          <div>
            <input type="text" placeholder="digite o nome do livro para buscar">
            <div>🔍</div>
          </div>
        </div>
        <div class="space-to-content-list">
          <div class="content-listagem-livros">
            <div>
              <img src="./assets/img/duna.jpg" alt="">
              <p>Duna</p>
            </div>
            <div>
              <img src="./assets/img/duna.jpg" alt="">
              <p>Duna</p>
            </div>
            <div>
              <img src="./assets/img/duna.jpg" alt="">
              <p>Duna</p>
            </div>
            <div>
              <img src="./assets/img/duna.jpg" alt="">
              <p>Duna</p>
            </div>
            <div>
              <img src="./assets/img/duna.jpg" alt="">
              <p>Duna</p>
            </div>
            <div>
              <img src="./assets/img/duna.jpg" alt="">
              <p>Duna</p>
            </div>
            <div>
              <img src="./assets/img/duna.jpg" alt="">
              <p>Duna</p>
            </div>
            <div>
              <img src="./assets/img/duna.jpg" alt="">
              <p>Duna</p>
            </div>
            <div>
              <img src="./assets/img/duna.jpg" alt="">
              <p>Duna</p>
            </div>
            <div>
              <img src="./assets/img/duna.jpg" alt="">
              <p>Duna</p>
            </div>
            <div>
              <img src="./assets/img/duna.jpg" alt="">
              <p>Duna</p>
            </div>
            <div>
              <img src="./assets/img/duna.jpg" alt="">
              <p>Duna</p>
            </div>
            <div>
              <img src="./assets/img/duna.jpg" alt="">
              <p>Duna</p>
            </div>
            <div>
              <img src="./assets/img/duna.jpg" alt="">
              <p>Duna</p>
            </div>

          </div>
        </div>
      </div>
    </div>

  </main>

</body>
<script src='./assets/scriptHome.js' defer></script>

</html>
