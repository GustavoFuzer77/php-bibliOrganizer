<?php
// aqui nessa arquvo, fazemos toda a validação com o model do usuario e o DAO do memso

require_once 'global.php';
require_once 'db.connect.php';
// require_once '../../models/Usuario.class.php';teste@teste.com
require_once 'models/Usuario.class.php';
require_once 'assets/utils/snackBar.php';
require_once 'classes/dao/UsuarioDAO.php';


$message = new SnackBar($URL);
$userDAO = new UsuarioDAO($connect, $URL);
//resgata o tipo do form
$type = filter_input(INPUT_POST, 'type'); // esse filter_input ele é uma função do php que pega os valores "cru" do input, no caso o type do form enviado pelo input_post
// se eu der um echo no $type, ele retonar o tipo do form que eu coloquei, pega daquele input do type='hidden'


//validação dos tipos:
if ($type === 'register') {
  //registra o usuario
  $email = filter_input(INPUT_POST, 'email');
  $senha = filter_input(INPUT_POST, 'senha');
  $nome = filter_input(INPUT_POST, 'nome');


  // verificações
  if ($email && $senha && $nome) {
    //se existir cai aqui
    if ($userDAO->findByEmail($email) === false) {
      $user = new Usuario();
      // criar um token exclusivo para o usuario e dar hash(criptografar para salvar no banco de dados) na senha
      $userToken = $user->gerarToken();
      $passowordHasher = $user->hashPassword($senha);
      $user->email = $email;
      $user->nome = $nome;
      $user->senha = $passowordHasher;
      $user->token = $userToken;

      $auth = true;

      $userDAO->create($user, $auth, true);
    } else {
      $message->setMessage('Usuário já existe.', 'error', 'back');
    }
  } else {
    // se não existir cai aqui e envia para a variavel msg e mostra a snack bar na tela
    $message->setMessage('Preencha todos os campos.', 'error', 'back');
  }
} else if ($type === "login") {

  $email = filter_input(INPUT_POST, "email");
  $senha = filter_input(INPUT_POST, "senha");

  // Tenta autenticar usuário
  if ($userDAO->authenticateUser($email, $senha)) {

    $message->setMessage("Seja bem-vindo!", "success", "/editarPerfil.php");

    // Redireciona o usuário, caso não conseguir autenticar
  } else {

    $message->setMessage("Usuário ou/e senha incorretos.", "error", "back");
  }
} else {

  $message->setMessage("Informações inválidas!", "error", "index.php");
}
