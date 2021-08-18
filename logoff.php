<?php
	
	session_start();

	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';

	//remover indices do array de sessão
	//unset($_SESSION['indice'])

	//destruir a variável de sessão completamente
	session_destroy();
	//forçar um redirecionamento
	header('Location: index.php');

?>