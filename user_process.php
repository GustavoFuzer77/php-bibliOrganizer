<?php

require_once("./global.php");
require_once("./db.connect.php");
require_once("./models/Usuario.class.php");
require_once("./assets/utils/snackBar.php");
require_once("./classes/dao/UsuarioDAO.php");

$message = new SnackBar($URL);

$userDao = new UsuarioDAO($connect, $URL);

// Resgata o tipo do formulário; no caso vai ser o tipo de de update (isso pega no input hidden)
$type = filter_input(INPUT_POST, "type");

// Atualizar usuário
if ($type === "update") {

  // Resgata dados do usuário para comparar com os dados do banco
  $userData = $userDao->verifyToken();

  // Receber dados do post
  $nome = filter_input(INPUT_POST, "nome");
  $email = filter_input(INPUT_POST, "email");
  $descritivo = filter_input(INPUT_POST, "descritivo");

  // Criar um novo objeto de usuário
  $user = new Usuario();

  // Preencher os dados do usuário
  $userData->nome = $nome;
  $userData->email = $email;
  $userData->descritivo = $descritivo;

  // Upload da imagem                                     //tmp_name é onde a imagem fica salva temporariamente.
  if (isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])) {

    $image = $_FILES["image"];

    $imageTypes = ["image/jpeg", "image/jpg", "image/png"]; // tipos permitidos de imagem
    $jpgArray = ["image/jpeg", "image/jpg"]; // mesma coisa da variavel do $imageType, diferença é que aqui é para validar se é jpg ou jpeg, sem contar a png

    // Checagem de tipo de imagem
    if (in_array($image["type"], $imageTypes)) { // aqui vemos se existe uma chave chamada type no array, é tipo on operator 'in' no javascript

      $ext = strtolower(substr($_FILES['image']['name'], -4)); //Pegando extensão do arquivo
      $new_name = $user->imageGenerateName() . $ext; //Definindo um novo nome para o arquivo
      $dir = './assets/img/users/'; //Diretório para uploads
      move_uploaded_file($_FILES['image']['tmp_name'], $dir . $new_name);
      $pathToSave = $dir . $new_name;

      $userData->imagem = $pathToSave;
    }
  }

  $userDao->update($userData, true);
}
