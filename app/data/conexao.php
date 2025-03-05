<?php 
    require __DIR__."/env";
    require_once __DIR__."/funcoes.php";
    try {
        $conexao = new mysqli(SERVIDOR, USER, PASSWORD, BASE, PORTA);
    } catch (\Throwable $th) {
        die("Erro ao conectar ao banco de dados = ". $th->getMessage());
    }
