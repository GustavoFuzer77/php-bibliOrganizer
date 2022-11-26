<header>
  <aside class="nav-bar-menu" id='nav-bar-menu'>
    <div class="profile-location">
      <span class="profile-icon-location" onclick="openProfileData()"></span>
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
      <!-- <a class="modal-login-a" onclick="openModalLogin(this)"><span>🔑</span>Logar</a> -->
      <a href="<?= $URL ?>/pages/login/login.php"><span>🔑</span>Logar</a>
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
