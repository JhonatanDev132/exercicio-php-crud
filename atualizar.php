<?php
/* Importando as funções de fabricantes */
require_once "src/funcoes-alunos.php";


$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);


$aluno = lerUmAluno($conexao, $id);

$resultadoMedia = calcularMedia($aluno["nota1"], $aluno["nota2"]);

$situacao = situacaoAluno($resultadoMedia);

/* Verificar se o formulário foi acionado */
if( isset($_POST['atualizar']) ){
    $nomeDoAluno = filter_input(INPUT_POST, "nome_aluno", FILTER_SANITIZE_SPECIAL_CHARS);
    $nota1 = filter_input(INPUT_POST, "nota2", FILTER_SANITIZE_NUMBER_FLOAT);
    $nota2 = filter_input(INPUT_POST, "nota1", FILTER_SANITIZE_NUMBER_FLOAT);
    atualizarAluno($conexao, $nomeDoAluno, $nota1, $nota2, $id);
    
    header("location:visualizar.php?status=sucesso");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Atualizar dados - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Atualizar dados do aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para atualizar os dados do aluno.</p>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?=$aluno['id']?>">

	    <p><label for="nome_aluno">Nome:</label>
	    <input type="text" value="<?=$aluno['nome_aluno']?>" name="nome_aluno" id="nome_aluno" required></p>
        
        <p><label for="nota1">Primeira nota:</label>
	    <input name="nota1" value="<?=$aluno['nota1']?>" type="number" id="nota1" step="0.01" min="0.00" max="10.00" required></p>
	    
	    <p><label for="nota2">Segunda nota:</label>
	    <input name="nota2" value="<?=$aluno['nota2']?>" type="number" id="nota2" step="0.01" min="0.00" max="10.00" required></p>

        <p>
        <!-- Campo somente leitura e desabilitado para edição.
        Usado apenas para exibição do valor da média -->
            <label for="resultadoMedia">Média:</label>
            <input name="resultadoMedia" value="<?=$resultadoMedia?>" type="number" id="resultadoMedia" step="0.01" min="0.00" max="10.00" readonly disabled>
        </p>

        <p>
        <!-- Campo somente leitura e desabilitado para edição 
        Usado apenas para exibição do texto da situação -->
            <label for="situacao">Situação:</label>
	        <input type="text" value="<?=$situacao?>" name="situacao" id="situacao" readonly disabled>
        </p>
	    
        <button type="submit" name="atualizar">Atualizar dados do aluno</button>
	</form>    
    
    <hr>
    <p><a href="visualizar.php">Voltar à lista de alunos</a></p>

</div>


</body>
</html>