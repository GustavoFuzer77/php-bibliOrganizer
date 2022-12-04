<?php
// session_start();
class SnackBar
{
  // caminho static da pastar para fazer redirecionamentos
  public $url;

  public function __construct($url)
  {
    $this->url = $url;
  }

  //aqui contruimos uma classe com algumas funcionalidades para dar um dispatch no componente de mensagem

  // o setMessage, ela recebe 3 itens, 1° é a mensagem que pegamos da session, 2° é o tipo da mensagem(erro, informativo, etc) e por ultimo é o redirecionamento
  // ela inicia com o index.php, que é a pagina PRINCIPAL, ou seja, se lançar uma mensagem a gente consegue redirecionar o usuario para qualquer tela que quisermos.
  // Só passar ela como paramentro da função.
  public function setMessage($msg, $type, $redirect = 'index.php')
  {
    $_SESSION['msg'] = $msg;
    $_SESSION['type'] = $type;

    if ($redirect != 'back') {
      header("Location: $this->url" . $redirect);
    } else {
      header('Location: ' . $_SERVER["HTTP_REFERER"]);
      // isso aqui faz com que se a variavel de redirect for passada
      // com 'back' vai cair no else e retornar para a PAGINA ANTERIOR(HTTP_REFERER), ou seja, a mesma pagina do form.
    }
  }

  public function getMessage()
  {
    // verifico se não tem nenhum erro lançado na sessão(da pra ver ela no inspecionar elemento->aplicativos->cookies->sessios),
    // no caso se ela for vazia ela não mostra nada, e o oposto mostra.
    if (!empty($_SESSION['msg'])) {
      return [
        'msg' => $_SESSION['msg'],
        'type' => $_SESSION['type']
      ];
    } else {
      return false;
    }
  }

  public function clearMessage()
  {
    //agora aqui vamos limpar a mensagem da sessão.

    $_SESSION['msg'] = '';
    $_SESSION['type'] = '';
  }
}
