<?php
require_once 'src/conecta.php';

function lerAlunos(PDO $conexao){
    $sql = "SELECT * FROM alunos ORDER BY id";

    try {
        $consulta = $conexao->prepare($sql);

        $consulta->execute();

        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die('Erro: '.$erro->getMessage());
    }

    return $resultado;
}

function inserirAluno(PDO $conexao, string $nomeDoAluno, float $nota1, float $nota2):void{
    $sql = "INSERT INTO alunos(nome_aluno, nota1, nota2) VALUES(:nome_aluno, :nota1, :nota2)";

    try {
        $consulta = $conexao->prepare($sql);
        
        
        $consulta->bindValue(":nome_aluno", $nomeDoAluno, PDO::PARAM_STR);
        $consulta->bindValue(":nota1", $nota1, PDO::PARAM_STR);
        $consulta->bindValue(":nota2", $nota2, PDO::PARAM_STR);
      

        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao inserir: ".$erro->getMessage());
}
}

function calcularMedia(float $nota1, float $nota2): float {
    $resultadoMedia = ($nota1 + $nota2) / 2;
    return $resultadoMedia;
}

function situacaoAluno(float $resultadoMedia): string {
    if ($resultadoMedia >= 7) {
        return 'Aprovado';
    } else {
        return 'Reprovado mané';
    }
}

function lerUmAluno(PDO $conexao, int $idAluno):array{
    $sql = "SELECT * FROM alunos WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $idAluno, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro ao carregar: ".$erro->getMessage());
    }

    return $resultado;
}

function atualizarAluno(PDO $conexao,string $nomeDoAluno, float $nota1, float $nota2, int $id):void{
    $sql = "UPDATE alunos
     SET nome_aluno = :nome_aluno,
         nota1 = :nota1,
         nota2 = :nota2 
     WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":nome_aluno", $nomeDoAluno, PDO::PARAM_STR);
        $consulta->bindValue(":nota1", $nota1, PDO::PARAM_STR);
        $consulta->bindValue(":nota2", $nota2, PDO::PARAM_STR);
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao atualizar: ".$erro->getMessage());
    }
}

function excluirAluno(PDO $conexao, int $id):void{
    $sql = "DELETE FROM alunos WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao atualizar: ".$erro->getMessage());
    }
}
?>