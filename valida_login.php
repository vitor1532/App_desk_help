<?php

	//iniciar o recurso de sessão
	session_start();
	
	//variavel que verifica se a autenticação foi realizada
	$usuario_autenticado = false;
	//variavel de id do usuario
	$usuario_id = null;
	$usuario_perfil_id = null;
	//array dos perfis
	$perfis = [1 => 'Administrativo', 2 => 'Usuário'];


	//usuarios do sistema
	$usuarios_app = [
		array('id' => 1 ,'email' => 'adm@teste.com', 'senha' => '123456', 'perfil_id' => 1),
		array('id' => 2 ,'email' => 'user@teste.com', 'senha' => 'abcd', 'perfil_id' => 1),
		array('id' => 3 ,'email' => 'vitor@teste.com', 'senha' => '456789', 'perfil_id' => 2),
		array('id' => 4 ,'email' => 'jose@teste.com', 'senha' => '1234', 'perfil_id' => 2)
	];

	/*
	echo '<pre>';
	print_r($usuarios_app);
	echo '</pre>';

	print_r($_GET);
	echo '<br>';
	echo $_GET['email'];
	echo '<br>';
	echo $_GET['senha'];
	*/

	//percorre os arrays de $usuarios_app como $user comparando com os dados inseridos
	foreach($usuarios_app as $user) {

		if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {

			$usuario_autenticado = true;
			//seta a variavel de id do usuario para cada $user
			$usuario_id = $user['id'];
			$usuario_perfil_id = $user['perfil_id'];

		}

	}

	if($usuario_autenticado) {
		echo 'Usuário autenticado.';
		//caso autenticado, criar um indice na variavel de sessão
		$_SESSION['autenticado'] = 'SIM';
		//relacionando a id do usuario com a sessão
		$_SESSION['id'] = $usuario_id;
		//redireciona para home
		header('Location: home.php');
	} else {
		$_SESSION['autenticado'] = 'NAO';
		//força o redirecionamento
		header('Location: index.php?login=erro');
	}
	//mudança aleatoria deletar esse comentario depois
	/*
	print_r($_POST);
	echo '<br>';
	echo $_POST['email'];
	echo '<br>';
	echo $_POST['senha'];
	*/
?>