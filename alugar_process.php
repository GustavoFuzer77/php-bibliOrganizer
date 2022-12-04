<?php
require_once("./global.php");
require_once("./db.connect.php");
require_once("./assets/utils/snackBar.php");
require_once './classes/dao/LivroDAO.php';

$livroDao = new LivroDAO($connect, $URL);
$message = new SnackBar($URL);

// Resgata o tipo do formulário; no caso vai ser o tipo de delete (isso pega no input hidden)
$type = filter_input(INPUT_POST, "type");


if ($type == 'delete') {
  $delete = $_POST['deleteLivro']; // pega o value do button de delete, no caso o id do livro
  $livroDao->deleteLivroById($delete);
}
