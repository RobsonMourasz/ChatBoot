<?php
    require_once __DIR__."/../data/conexao.php";
if (!isset($_SESSION)) {
    session_start();
}   

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval(limpar_texto($_GET['id']));
    $pesquisa = $conexao->query("SELECT * FROM usuarios_ativos WHERE id_usuario = $id ORDER BY ultimo_acesso DESC LIMIT 1");
    $pesquisa = $pesquisa->fetch_assoc();
    $idTabelaUsuariosAtivos = $pesquisa['id'];

    $insertSituacao = $conexao->query("UPDATE usuarios_ativos a SET a.ultimo_acesso = NOW(), a.situacao = 'Online' WHERE a.id = $idTabelaUsuariosAtivos;");
    
    if ($insertSituacao) {
        $conexao->query("UPDATE cad_login SET ultimo_acesso = NOW() WHERE id_login = $id");
        echo json_encode(array("status" => "ok", "message" => "Status atualizado com sucesso!"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Erro ao atualizar status!"));
    }
}