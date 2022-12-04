<?php

require_once('models/Genero.class.php');
require_once('assets/utils/snackBar.php');

class GeneroDAO
{
  public $connect;
  public $url;
  public $message;

  public function __construct(PDO $connect, $url)
  {
    $this->connect = $connect;
    $this->url = $url;
    $this->message = new SnackBar($url);
  }

  public function buildClassGenero($data)
  {
    $genero = new Genero();

    $genero->id_genero = $data['id_genero'];
    $genero->descritivo = $data['descritivo'];

    return $genero;
  } // montar/contruir classe quando criar a conta

  public function create(Genero $genero, $redirect = false)
  {
    // var_dump($genero);
    $sql = $this->connect->prepare("INSERT INTO generos(
        descritivo
      ) VALUES (
         :descritivo
      )");

    $sql->bindParam(":descritivo", $genero->descritivo);

    $sql->execute();

    if ($redirect) {
      // Redireciona para a Home
      $this->message->setMessage("Gênero criado com sucesso!", "success", "/index.php");
    }
  }

  public function getAllGenero()
  {
    $sql = "SELECT generos.* FROM generos";
    //prepara a frase sql antes de executar
    $stm = $this->connect->prepare($sql);
    //executa a frase sql no BD
    $stm->execute();
    //fecha a conexao com o BD
    $this->connect = null;
    //returna o resultado no formato de OBJETOS
    return $stm->fetchAll(PDO::FETCH_OBJ);
  }

  // public function update(Genero $genero, $redirect = false)
  // {

  //   $sql = $this->connect->prepare("UPDATE usuario SET
  //     nome = :nome,
  //     datan = :datan,
  //     email = :email,
  //     imagem = :imagem,
  //     descritivo = :descritivo,
  //     token = :token
  //     WHERE id_usuario = :id_usuario
  //   ");

  //   $sql->bindParam(":nome", $genero->nome);
  //   $sql->bindParam(":datan", $genero->datan);
  //   $sql->bindParam(":email", $genero->email);
  //   $sql->bindParam(":imagem", $genero->imagem);
  //   $sql->bindParam(":descritivo", $genero->descritivo);
  //   $sql->bindParam(":token", $genero->token);
  //   $sql->bindParam(":id_genero", $genero->id_usuario);

  //   $sql->execute();

  //   if ($redirect) {

  //     // Redireciona para o perfil do usuario
  //     $this->message->setMessage("Dados atualizados com sucesso!", "success", "/editarPerfil.php");
  //   }
  // }



  public function findByDescritivo($descritivo)
  {

    if ($descritivo != "") {

      $stmt = $this->connect->prepare("SELECT * FROM generos WHERE descritivo = :descritivo");

      $stmt->bindParam(":descritivo", $descritivo);

      $stmt->execute();

      if ($stmt->rowCount() > 0) {

        $data = $stmt->fetch();
        $desc = $this->buildClassGenero($data);

        return $desc;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
}


