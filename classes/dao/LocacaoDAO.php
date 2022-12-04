<?php
require_once './models/Locacao.class.php';
require_once './global.php';

class LocacaoDAO
{
  public $connect;

  function __construct(PDO $connect)
  {
    $this->connect = $connect;
  }

  // public function buildClassLocacao($data) // mesma coisa da class de usuario, aqui eu MONTO a classe com os dados e depois com isso eu trabalho no resto dos metodos
  // {

  //   $locacao = new Locacao($data);

  //   $locacao->id_locacao = $data['id_locacao'];
  //   $locacao->id_usuario = $data['id_usuario'];
  //   $locacao->dataloc = $data['dataloc'];
  //   $locacao->datadev = $data['datadev'];

  //   return $locacao;
  // }

  public function getDataLoc(Usuario $user)
  {
    $sql = "SELECT l.dataloc FROM locacao l
            INNER JOIN usuario u ON (l.id_usuario = u.?)";

    $stm = $this->connect->prepare($sql);
    $stm->bindValue(1, $user->id_usuario); // pego o id do usuario
    $stm->execute();
    $this->connect = null;

    // $user = $this->buildClassLocacao($stm);
    return $stm->fetch(PDO::FETCH_OBJ);
  }

  public function getDataDev(Usuario $user)
  {
    $sql = "SELECT l.datadev FROM locacao l
            INNER JOIN usuario u ON (l.id_usuario = u.?)";

    $stm = $this->connect->prepare($sql);
    $stm->bindValue(1, $user->id_usuario); // pego o id do usuario
    $stm->execute();
    $this->connect = null;

    // $user = $this->buildClassLocacao($stm);
    return $stm->fetch(PDO::FETCH_OBJ);
  }
}
