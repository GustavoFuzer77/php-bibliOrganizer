<?php
require_once './models/Livro.class.php';
require_once './global.php';
require_once './assets/utils/snackBar.php';

class LivroDAO
{
  public $connect;
  public $url;
  public $message;

  function __construct(PDO $connect, $url)
  {
    $this->connect = $connect;
    $this->url = $url;
    $this->message = new SnackBar($url);
  }

  public function buildClassLivro($data) // mesma coisa da class de usuario, aqui eu MONTO a classe com os dados e depois com isso eu trabalho no resto dos metodos
  {

    $livro = new Livros($data);

    $livro->id_livro = $data['id_livro'];
    $livro->id_genero = $data['id_genero'];
    $livro->titulo = $data['titulo'];
    $livro->descritivo = $data['descritivo'];
    $livro->imagem = $data['imagem'];
    $livro->autor = $data['autor'];


    return $livro;
  }

  public function create(Livros $livro, $redirect) // metodo para criar livros
  {
    $sql = $this->connect->prepare("INSERT INTO livros(
      titulo ,descritivo, imagem, autor, id_genero
    ) VALUES (
       :titulo, :descritivo, :imagem, :autor, :id_genero
    )");

    $sql->bindParam(":titulo", $livro->titulo);
    $sql->bindParam(":descritivo", $livro->descritivo);
    $sql->bindParam(":imagem", $livro->imagem);
    $sql->bindParam(":autor", $livro->autor);
    $sql->bindParam(":id_genero", $livro->id_genero);

    $sql->execute();

    $this->message->setMessage("Livro criado com sucesso!", "success", "/index.php");
  }


  public function getAllLivros()
  {
    $sql = "SELECT livros.* FROM livros";
    //prepara a frase sql antes de executar
    $stm = $this->connect->prepare($sql);
    //executa a frase sql no BD
    $stm->execute();
    //fecha a conexao com o BD
    $this->connect = null;
    //returna o resultado no formato de OBJETOS
    return $stm->fetchAll(PDO::FETCH_OBJ);
  }

  public function getLivrosByGenero($idGenero)
  {
    if ($idGenero !== '') {
      $stmt = $this->connect->prepare("SELECT * FROM livros WHERE id_genero = :id_genero");

      $stmt->bindParam(":id_genero", $idGenero);

      $stmt->execute();

      if ($stmt->rowCount() > 0) {

        $data = $stmt->fetchAll(PDO::FETCH_OBJ);
        // $livro = $this->buildClassLivro($data);

        return $data;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function getLivroById($id)
  {
    if ($id !== '') {
      $stmt = $this->connect->prepare("SELECT * FROM livros WHERE id_livro = :id_livro");

      $stmt->bindParam(":id_livro", $id);

      $stmt->execute();

      if ($stmt->rowCount() > 0) {

        $livroId = $stmt->fetch();
        $data = $this->buildClassLivro($livroId);
        return $data;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function deleteLivroById($id)
  {
    $sql = $this->connect->prepare("DELETE FROM livros WHERE id_livro = :id");
    $sql->bindParam(":id", $id);
    $sql->execute();

    $this->message->setMessage("Livro apagado com sucesso!", "success", "/index.php");
  }

  public function getLivrosByTitle($title)
  {
    if ($title !== '') {
      $stmt = $this->connect->prepare("SELECT * FROM livros WHERE titulo LIKE '%$title%'"); // aqui usei um wildcard tipo LIKE, ele pega valores parecidos e procura no banco. Ex:
      // eu pesquiso por 'dun' porem no banco não tem nenhum dado com titulo 'dun', então ele procura o mais proximo: 'duna' e traz o dado em um array[]

      // $stmt->bindParam(':titulo', $title);

      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        // retornar um array para dar um forEach
        $data = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $data;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function findByBook($book)
  {

    if ($book != "") {

      $stmt = $this->connect->prepare("SELECT * FROM livros WHERE titulo = :book");

      $stmt->bindParam(":book", $book);

      $stmt->execute();

      if ($stmt->rowCount() > 0) {

        $data = $stmt->fetch();
        $livro = $this->buildClassLivro($data);

        return $livro;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
}
