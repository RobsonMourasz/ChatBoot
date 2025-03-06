<?php
include_once __DIR__ . "/../data/conexao.php";
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_GET['idlogado']) && !empty($_GET['idlogado'])) {
    $idLogado = intval(limpar_texto($_GET['idlogado']));
    if (isset($_GET['idPessoa']) && !empty($_GET['idPessoa'])) {
        $idPessoa = intval(limpar_texto($_GET['idlogado']));
        $mensagens = "SELECT 
        a.*, 

        CASE
            WHEN a.id_remetente = ? THEN cd.nome
            ELSE cr.nome
        END AS usuario,

        CASE 
            WHEN a.id_remetente = ? THEN cd.ultimo_acesso
            ELSE cr.ultimo_acesso
        END AS ultimo_acesso	

            FROM mv_mensagens a 
            LEFT JOIN cad_login cr ON a.id_remetente = cr.id_login
            LEFT JOIN cad_login cd ON a.id_destinatario = cd.id_login
                WHERE (a.id_remetente IN(?) OR a.id_destinatario IN(?))
                ORDER BY a.data_envio asc
";
        $temp = $conexao->prepare($mensagens);
        $temp->bind_param("iiii", $idLogado, $idLogado, $idPessoa, $idPessoa);
        $temp->execute();
        $resultado = $temp->get_result();
        $mensagens = $resultado->fetch_all(MYSQLI_ASSOC);
        $temp->close();
        echo json_encode($mensagens);
        exit;
    }
}
