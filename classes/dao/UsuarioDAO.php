<?php

require_once('models/Usuario.class.php');
require_once('assets/utils/snackBar.php');

class UsuarioDAO implements UsuarioDAOInterface
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

  public function buildUser($data)
  {
    $usuario = new Usuario();

    $usuario->imagem = $data['imagem'];
    $usuario->id_usuario = $data['id_usuario'];
    $usuario->descritivo = $data['descritivo'];
    $usuario->nome = $data['nome'];
    $usuario->email = $data['email'];
    $usuario->senha = $data['senha'];
    $usuario->token = $data['token'];
    $usuario->adm = $data['adm'];

    return $usuario;
  } // montar/contruir classe quando criar a conta

  public function create(Usuario $user, $authUser = false, $adm = false)
  {

    $sql = $this->connect->prepare("INSERT INTO usuario(
        nome ,email, senha, token, adm
      ) VALUES (
         :nome, :email, :senha, :token, 'false'
      )");

    $sql->bindParam(":nome", $user->nome);
    $sql->bindParam(":email", $user->email);
    $sql->bindParam(":senha", $user->senha);
    $sql->bindParam(":token", $user->token);

    $sql->execute();

    // Autenticar usuário, caso auth seja true
    if ($authUser) {
      $this->setTokenToSession($user->token);
    }
  }

  public function update(Usuario $usuario, $redirect = false)
  {

    $sql = $this->connect->prepare("UPDATE usuario SET
      nome = :nome,
      datan = :datan,
      email = :email,
      imagem = :imagem,
      descritivo = :descritivo,
      token = :token
      WHERE id_usuario = :id_usuario
    ");

    $sql->bindParam(":nome", $usuario->nome);
    $sql->bindParam(":datan", $usuario->datan);
    $sql->bindParam(":email", $usuario->email);
    $sql->bindParam(":imagem", $usuario->imagem);
    $sql->bindParam(":descritivo", $usuario->descritivo);
    $sql->bindParam(":token", $usuario->token);
    $sql->bindParam(":id_usuario", $usuario->id_usuario);

    $sql->execute();

    if ($redirect) {

      // Redireciona para o perfil do usuario
      $this->message->setMessage("Dados atualizados com sucesso!", "success", "/editarPerfil.php");
    }
  }

  public function verifyToken($protected = false)
  {

    if (!empty($_SESSION["token"])) {

      // Pega o token da session
      $token = $_SESSION["token"];

      $user = $this->findByToken($token);

      if ($user) {
        return $user;
      } else if ($protected) {

        // Redireciona usuário não autenticado
        $this->message->setMessage("Faça a autenticação para acessar esta página!", "error", "/index.php");
      }
    } else if ($protected) {

      // Redireciona usuário não autenticado
      $this->message->setMessage("Faça a autenticação para acessar esta página!", "error", "/index.php");
    }
  }

  public function setTokenToSession($token, $redirect = true)
  {

    // Salvar token na session
    $_SESSION["token"] = $token;

    if ($redirect) {

      // Redireciona para o perfil do usuario
      $this->message->setMessage("Seja bem-vindo!", "success", "/editarPerfil.php");
    }
  }

  public function authenticateUser($email, $senha)
  {

    $user = $this->findByEmail($email);
    if ($user) {

      // Checar se as senhas batem (aqui ela descriptográfa e verifica)
      if (password_verify($senha, $user->senha)) {

        // Gerar um token e inserir na session
        $token = $user->gerarToken();

        $this->setTokenToSession($token, false); // passa o token e o false é para não redirecionar

        // Atualizar token no usuário
        $user->token = $token;

        $this->update($user, false);

        return true;
      } else {
        return false;
      }
    } else {

      return false;
    }
  }

  public function findByEmail($email)
  {

    if ($email != "") {

      $stmt = $this->connect->prepare("SELECT * FROM usuario WHERE email = :email");

      $stmt->bindParam(":email", $email);

      $stmt->execute();

      if ($stmt->rowCount() > 0) {

        $data = $stmt->fetch();
        $user = $this->buildUser($data);

        return $user;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function findById($id_usuario)
  {

    if ($id_usuario != "") {

      $stmt = $this->connect->prepare("SELECT * FROM usuario WHERE id_usuario = :id_usuario");

      $stmt->bindParam(":id_usuario", $id_usuario);

      $stmt->execute();

      if ($stmt->rowCount() > 0) {

        $data = $stmt->fetch();
        $user = $this->buildUser($data);

        return $user;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function findByToken($token)
  {

    if ($token != "") {

      $stmt = $this->connect->prepare("SELECT * FROM usuario WHERE token = :token");

      $stmt->bindParam(":token", $token);

      $stmt->execute();

      if ($stmt->rowCount() > 0) {

        $data = $stmt->fetch();
        $user = $this->buildUser($data);

        return $user;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function destroyToken()
  {

    // Remove o token da session/ deslogar
    $_SESSION["token"] = "";

    // Redirecionar e apresentar a mensagem de sucesso
    $this->message->setMessage("Você fez o logout com sucesso!", "success", "/index.php");
  }

  public function admVerify($data)
  {
    if ($data) {
      $user = $this->findByAdm($data);
      return $user;
    } else {
      return false;
    }
  }

  public function findByAdm($data)
  {
    if ($data) {

      $sql = $this->connect->prepare("SELECT * FROM usuario WHERE adm = 'true'");
      $sql->execute();

      if ($sql->rowCount() > 0) {

        $data = $sql->fetch();
        $user = $this->buildUser($data);

        return $user;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  // public function changePassword(Usuario $user)
  // {

  //   $stmt = $this->connect->prepare("UPDATE usuario SET
  //     password = :password
  //     WHERE id = :id
  //   ");

  //   $stmt->bindParam(":password", $user->password);
  //   $stmt->bindParam(":id", $user->id);

  //   $stmt->execute();

  //   // Redirecionar e apresentar a mensagem de sucesso
  //   $this->message->setMessage("Senha alterada com sucesso!", "success", "editarPerfil.php");
  // }

}
