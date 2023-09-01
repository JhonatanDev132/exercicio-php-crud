<?php


if (isset($_POST['inserir'])) {
	
	require_once 'src/funcoes-alunos.php';

	$nome_aluno = filter_input(INPUT_POST, 'nome_aluno', FILTER_SANITIZE_SPECIAL_CHARS);

	$nota1 = filter_input(INPUT_POST, 'nota1', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

	$nota2 = filter_input(INPUT_POST, 'nota2', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

	inserirAluno($conexao, $nome_aluno, $nota1, $nota2);
	
	header("location:visualizar.php");

}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastrar um novo aluno - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<h1>Cadastrar um novo aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para cadastrar um novo aluno.</p>

	<form action="" method="post">
	    <p><label for="nome_aluno">Nome:</label>
	    <input type="text" name="nome_aluno" id="nome_aluno" required></p>
        
      <p><label for="nota1">Primeira nota:</label>
	    <input type="number" id="nota1" name="nota1" step="0.01" min="0.00" max="10.00" required></p>
	    
	    <p><label for="nota2">Segunda nota:</label>
	    <input type="number" id="nota2" name="nota2" step="0.01" min="0.00" max="10.00" required></p>
	    
      <button  type="submit" name="inserir">Cadastrar aluno</button>
	</form>

    <hr>
    <p><a href="index.php">Voltar ao início</a></p>
</div>

</body>
</html>