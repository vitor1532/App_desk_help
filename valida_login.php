<?php
	
	//usuarios do sistema
	$usuarios_app = [
		array('email' => 'adm@teste.com', 'senha' => '123456'),
		array('email' => 'user@teste.com', 'senha' => 'abcd'),
		array('email' => 'vitor@teste.com', 'senha' => '456789'),
	];

	echo '<pre>';
	print_r($usuarios_app);
	echo '</pre>';

	/*
	print_r($_GET);

	echo '<br>';

	echo $_GET['email'];

	echo '<br>';

	echo $_GET['senha'];
	*/

	print_r($_POST);

	echo '<br>';

	echo $_POST['email'];

	echo '<br>';

	echo $_POST['senha'];

?>