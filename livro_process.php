<?php

require_once 'global.php';
require_once 'db.connect.php';
require_once 'models/Livro.class.php';
require_once 'assets/utils/snackBar.php';
require_once 'classes/dao/LivroDAO.php';


$message = new SnackBar($URL);
$livroDAO = new LivroDAO($connect, $URL);
//resgata o tipo do form
$type = filter_input(INPUT_POST, 'type'); // esse filter_input ele é uma função do php que pega os valores "cru" do input, no caso o type do form enviado pelo input_post

if ($type === 'criarLivro') {

  $descritivo = filter_input(INPUT_POST, 'descritivo');
  $tituloLivro = filter_input(INPUT_POST, 'tituloLivro');
  $nomeAutor = filter_input(INPUT_POST, 'nomeAutor');
  $genero = $_POST['genero'];

  $book = new Livros();

  if ($descritivo && $tituloLivro && $nomeAutor && $genero && $_FILES["image"]) {
    //se existir cai aqu
    if ($livroDAO->findByBook($tituloLivro) === false) {
      // criar um token exclusivo para o usuario e dar hash(criptografar para salvar no banco de dados) na senha
      $book->descritivo = $descritivo;
      $book->titulo = $tituloLivro;
      $book->autor = $nomeAutor;
      $book->id_genero = $genero;

      if (isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])) {

        $image = $_FILES["image"];

        $imageTypes = ["image/jpeg", "image/jpg", "image/png"]; // tipos permitidos de imagem
        $jpgArray = ["image/jpeg", "image/jpg"]; // mesma coisa da variavel do $imageType, diferença é que aqui é para validar se é jpg ou jpeg, sem contar a png

        // Checagem de tipo de imagem
        if (in_array($image["type"], $imageTypes)) { // aqui vemos se existe uma chave chamada type no array, é tipo on operator 'in' no javascript

          $ext = strtolower(substr($_FILES['image']['name'], -4)); //Pegando extensão do arquivo
          $new_name = $book->imageGenerateNameBook() . $ext; //Definindo um novo nome para o arquivo
          $dir = './assets/img/bookImg/'; //Diretório para uploads
          move_uploaded_file($_FILES['image']['tmp_name'], $dir . $new_name);
          $pathToSave = $dir . $new_name;

          $book->imagem = $pathToSave;
          $livroDAO->create($book, true);
        }
      }else{
        $message->setMessage('Adicione uma foto de capa', 'error', 'back');
      }

    } else {
      $message->setMessage('Livro já existe', 'error', 'back');
    }
  } else {
    // se não existir cai aqui e envia para a variavel msg e mostra a snack bar na tela
    $message->setMessage('Preencha todos os campos.', 'error', 'back');
  }
}
