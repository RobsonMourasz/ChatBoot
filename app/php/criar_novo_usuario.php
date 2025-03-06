<?php
require_once __DIR__.'/../data/conexao.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tempSenha = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO cad_login (user_ativo, usuario, nome, senha,ultimo_acesso, data_cadastro) VALUES (0,?,?,?,NOW(), NOW())";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sss", $email, $nome, $tempSenha);
    $stmt->execute();
    header("Location: ../../index.html");
    exit();
}