<?php
// CRIAR VARIAVEIS PARA A CONEXÃO DO BANCO

$dbName = "bibliOrganizer";
$db_host = 'localhost';
$db_user = 'root';
$db_password = "";
// CONEXÃO DO BANCO PASSANDO ESSAS VARIAVEIS NO PDO()
$connect = new PDO("mysql:dbname=" . $dbName . ";host=" . $db_host, $db_user, $db_password);

//DEIXANDO HABILITADOS TRATAMENTOS DE ERRO DO PDO, CASO TENHA ALGUM ERRO NO BANCO, FACILITA NA HORA DE DEBUGAR

$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
