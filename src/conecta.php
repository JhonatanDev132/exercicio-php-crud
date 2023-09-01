<?php
// conecta.php

/* Script de conexão ao servidor de Banco de Dados */

// Parâmetros de acesso
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "crud_escola_jhonatan";

/* Configurações para conexão 
(API/Driver de conexão: PDO (PHP Data Object)) */

try {
    // Instância/Objeto PDO para conexão
    $conexao = new PDO(
        "mysql:host=$servidor;dbname=$banco;charset=utf8",
        $usuario, $senha
    ); 
    
    // Habilitar a verificaçõ e sinalização de erros (exceções)
    $conexao->setAttribute(
        PDO::ATTR_ERRMODE, 
        PDO::ERRMODE_EXCEPTION
    );
} catch(Exception $erro){
    /* Exception é uma classe/tipo de dados
    voltado para tratamento de exceções (erros) */
    die("Deu ruim: ".$erro->getMessage());
}

