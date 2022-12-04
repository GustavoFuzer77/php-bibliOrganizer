<?php
class Livros
{
  public $id;
  public $idGenero;
  public $titulo;
  public $descritivo;
  public $imagem;
  public $autor;

  public function imageGenerateNameBook()
  {
    return bin2hex(random_bytes(15));
  }
}
