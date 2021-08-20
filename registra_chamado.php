<?php 

	echo '<pre>';
	print_r($_POST);
	echo '</pre>';

	//defnir o que será escrito no arquivo e substituir o caracter de separação por outro para evitar conflitos
	$texto = implode('#', str_replace('#', '-', $_POST)) . PHP_EOL;//PHP_EOL -> função END OF LINE

	//abrir o arquivo
	$arquivo = fopen('arquivo.txt', 'a');// espera dois parametros, o nome do arquivo e se queremos abrir, ler e outras funções

	//escrever no arquivo aberto
	fwrite($arquivo, $texto);

	//fechar o arquivo
	fclose($arquivo);//é necessário fechar o arquivo sempre que for aberto

	header('Location: abrir_chamado.php');
?>
