<?php

	//iniciar o recurso de sessão
	session_start();
	
	//variavel que verifica se a autenticação foi realizada
	$usuario_autenticado = false;

	//usuarios do sistema
	$usuarios_app = [
		array('email' => 'adm@teste.com', 'senha' => '123456'),
		array('email' => 'user@teste.com', 'senha' => 'abcd'),
		array('email' => 'vitor@teste.com', 'senha' => '456789'),
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

		}

	}

	if($usuario_autenticado) {
		echo 'Usuário autenticado.';
		//caso autenticado, criar um indice na variavel de sessão
		$_SESSION['autenticado'] = 'SIM';
	} else {
		$_SESSION['autenticado'] = 'NAO';
		//força o redirecionamento
		header('Location: index.php?login=erro');
	}

	/*
	print_r($_POST);
	echo '<br>';
	echo $_POST['email'];
	echo '<br>';
	echo $_POST['senha'];
	*/
?>