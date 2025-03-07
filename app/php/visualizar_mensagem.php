<?php 
    require_once __DIR__."/../data/conexao.php";
    if (!isset($_SESSION)) {
        session_start();
    }   

    if (isset($_GET['idLogado']) && isset($_GET['idDestinatario'])) {
        if (!empty($_GET['idLogado']) && !empty($_GET['idDestinatario'])) {
            $idLogado = intval(limpar_texto($_GET['idLogado']));
            $idDestinatario = intval(limpar_texto($_GET['idDestinatario']));
            $atulizar_status = $conexao->query("UPDATE mv_mensagens SET mensagem_visualizada = 1, data_recebimento = NOW() WHERE id_destinatario = $idLogado AND id_remetente = $idDestinatario  AND mensagem_visualizada = 0");
            echo json_encode("status => ok, mensagem => Mensagem visualizada com sucesso");
        }

    }