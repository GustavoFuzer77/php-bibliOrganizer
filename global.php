<?php
  //ARQUIVO COM TODAS AS VARIAVEIS GLOBAIS DA APLICAÇÃO. SESSION INCLUIDO PARA QUE TODAS AS PAGINAS INICIE COM SESSION


session_start();
//ISSO È UM PATH STATIC PARA FACILITAR OS CAMINHOS DOS ARQUIVOS
// $URL = 'http://' . $_SERVER["SERVER_NAME"] . dirname($_SERVER["REQUEST_URI"] . "?") . "/";
$URL = 'http://' . $_SERVER["SERVER_NAME"] . dirname($_SERVER["REQUEST_URI"] . "?");
$URLROOT = $_SERVER['DOCUMENT_ROOT'] . '/trabalho/site/';
