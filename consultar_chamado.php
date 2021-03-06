<? require_once "validador_acesso.php" ?>
<?php

  //arr de chamados
  $chamados =[];
  //abrir o arquivo.txt
  $arquivo = fopen('../../app_help_desk/arquivo.txt', 'r');

  //percorrer o arquivo enquanto houver registros(linhas) a seren recuperados
  while(!feof($arquivo)) {//eof = end of file
      //testa pelo fim de um arquivo
    //linhas
    $registro =  explode('#', fgets($arquivo));//com base no arquivo aberto e na posição do 'cursor', le a linha até encontrar o final da linha
    //se o id de perfil for 2, ou seja, o perfil "usuario" e o id no registro do arquivo for igual ao id da sessão, mostrar apenas o chamado do usuário, se o id de perfil for 1, ou seja, 'administrativo', mostrar todos os chamados
    if( $_SESSION['perfil_id'] == 2 && $registro[0] == $_SESSION['id'] || $_SESSION['perfil_id'] == 1) {

      $chamados[] = $registro;//inserir registros recuperados no array chamado

    } else {//se as informações não baterem, ignore e continue o processo while
      continue;
    }
  }

  //fechar o arquivo aberto
  fclose($arquivo);

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">Sair</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">

              <? foreach($chamados as $chamado) { ?>

                <?php

                  //$chamado_dados = explode('#', $chamado); // explode as informações que são retornados em arrays 
                  /*
                  //identificar o perfil do user
                  if($_SESSION['perfil_id'] == 2) {
                    //só exibir o chamado se foi criado pelo usuario
                    if($_SESSION['id'] != $chamado_dados[0]) {
                      continue;                      
                    }

                  }
                  */
                  if(count($chamado) < 3) {//verifica se os arrays contém todos os dados
                    continue;
                  }

                 ?>
              
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?= $chamado[1]; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $chamado[2]; ?></h6>
                    <p class="card-text"><?= $chamado[3]; ?></p>

                  </div>
                </div>

              <? } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>