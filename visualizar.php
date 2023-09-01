<?php
require_once "src/funcoes-alunos.php";


$listaDeAlunos = lerAlunos($conexao);

$quantidade = count($listaDeAlunos);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Lista de alunos</h1>
    <hr>
    <p><a href="inserir.php">Inserir novo aluno</a></p>

   <!-- Aqui você deverá criar o HTML que quiser e o PHP necessários
para exibir a relação de alunos existentes no banco de dados.

Obs.: não se esqueça de criar também os links dinâmicos para
as páginas de atualização e exclusão. -->

<table>
        <caption>Lista de alunos: <b><?=$quantidade?></b></caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Nota1</th>
                <th>Nota2</th>
                <th>Media</th>
                <th>Situação</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach ($listaDeAlunos as $aluno) { ?>
    <tr>
        <td> <?= $aluno["id"] ?>  </td>
        <td> <?= $aluno["nome_aluno"] ?> </td>
        <td> <?= $aluno["nota1"] ?> </td>
        <td> <?= $aluno["nota2"] ?> </td>
        <?php
        $resultadoMedia = calcularMedia($aluno["nota1"], $aluno["nota2"]);
        $situacao = situacaoAluno($resultadoMedia);
        ?>
        <td> <?= $resultadoMedia ?> </td>
        <td> <?= $situacao ?> </td>
        <td>
            <a href="atualizar.php?id=<?= $aluno["id"] ?>">Editar</a>
            <a class="excluir" href="excluir.php?id=<?= $aluno["id"] ?>">Excluir</a>
        </td>
    </tr>
<?php } ?>
        </tbody>
    </table>

    <script src="../js/confirma-exclusao.js"></script>

    <p><a href="index.php">Voltar ao início</a></p>
</div>

</body>
</html>