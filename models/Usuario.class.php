<?php
class Usuario
{
  public $id_usuario;
  public $nome;
  // public $sexo;
  // public $dataNiver;
  public $email;
  public $senha;
  public $imagem;
  public $descritivo;
  public $token;
  // public $cpf
  // public $rg;
  // public $endereco;
  public $adm = 'false'; // 'true' quando for administrados

  public function gerarToken()
  {
    return bin2hex(random_bytes(40)); // metodo para gerar valores aleatorio com 40 caracteres
  }

  public function hashPassword($senha)
  {
    return password_hash($senha, PASSWORD_DEFAULT); // nas docs do php, fala pra usar essa PASSWORD_DEFAULT, mas isso ai seria o metodo de criptografia
    //por curiosidade o nome dela é bcrypt
  }

  public function imageGenerateName()
  {
    return bin2hex(random_bytes(15));
  }
}

// aqui criamos um inteface para fazer implements lá na classe de DAO do usuario(classe que vai estar conectado no banco de dados)
// o intuito dessa interface é para montar os métodos na classe de forma obrigatória(poderia ter passado direto no construtor, mas assim fica mais organizado);

interface UsuarioDAOInterface
{
  public function buildUser($data); // montar classe
  public function create(Usuario $user, $authUser = false, $adm = false); // criar usuario
  public function update(Usuario $user, $redirect = true); // dar um update no usuario e dar redirect
  public function verifyToken($protected = false); // proteger rotas, precisa estar logado para isso ficar true
  public function setTokenToSession($token, $redirect = true); // setar o token nos headers do navegador
  public function authenticateUser($email, $password); // fazer o login do usuario
  public function admVerify($data); // proteger rotas para quem não é administrador
  public function findByEmail($email); // procurar no banco de dados pelo email e retornar para o php
  public function findById($id_usuario); // procurar pelo id do usuario e retonar o mesmo pelo id
  public function findByToken($token);  // procurar pelo token unico do usuario e retornar para o php
  public function findByAdm($data); // verificar se o usuario é administrador e retonar para o php
  public function destroyToken();
}
