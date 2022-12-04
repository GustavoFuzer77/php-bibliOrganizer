<?php

require_once 'global.php';
require_once 'db.connect.php';
require_once 'models/Genero.class.php';
require_once 'assets/utils/snackBar.php';
require_once 'classes/dao/GeneroDAO.php';


$message = new SnackBar($URL);
$generoDAO = new GeneroDAO($connect, $URL);
//resgata o tipo do form
$type = filter_input(INPUT_POST, 'type'); // esse filter_input ele é uma função do php que pega os valores "cru" do input, no caso o type do form enviado pelo input_post

if ($type === 'criarGenero') {
  $descritivo = filter_input(INPUT_POST, 'descritivo');
  if ($descritivo) {
    //se existir cai aqui
    if ($generoDAO->findByDescritivo($descritivo) === false) {
      $booktype = new Genero();
      // criar um token exclusivo para o usuario e dar hash(criptografar para salvar no banco de dados) na senha
      $booktype->descritivo = $descritivo;

      $generoDAO->create($booktype, true);
    } else {
      $message->setMessage('Gênero ja existente, tente outro nome', 'error', 'back');
    }
  } else {
    // se não existir cai aqui e envia para a variavel msg e mostra a snack bar na tela
    $message->setMessage('Preencha todos os campos.', 'error', 'back');
  }
  // if ($descritivo) {
  //   //se existir cai aqui
  //   if ($generoDAO->findByDescritivo($descritivo) === false) {
  //     $genero = new Genero();
  //     // aqui a gente aloca o valor da varaivel $descritivo no genero->descritivo
  //     $genero->descritivo = $descritivo;
  //     // e passamos para o generoDAO o valor e o true para dar o redirect para o HOME
  //     $generoDAO->create($descritivo);
  //   } else {
  //     $message->setMessage('Gênero já existe.', 'error', 'back');
  //   }
  // } else {
  //   // se não existir cai aqui e envia para a variavel msg e mostra a snack bar na tela
  //   $message->setMessage('O Nome não pode ser em branco.', 'error', 'back');
  // }
} else if ($type === 'update') {
}
