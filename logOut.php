<?php

require_once 'components/header.php'; // no header já importa o userDao, por isso importei ele

if ($userDao) {
  $userDao->destroyToken();
}
