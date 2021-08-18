<?php

  session_start();

  //Checar se a sessão foi autenticada ou tem o valor diferente de SIM, se não for o caso, abrir tela de erro
  if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {

    header('Location: index.php?login=erro2');

  }

?>