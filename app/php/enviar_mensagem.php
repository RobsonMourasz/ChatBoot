<?php
    require_once __DIR__."/../data/conexao.php";

    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_POST) ){
        try {
            $idUsuario = intval(limpar_texto($_POST['idUsuario']));
            $idDestinatario = intval(limpar_texto($_POST['idDestinatario']));
            $mensagem = $_POST['mensagem'];
            $insert = "INSERT INTO mv_mensagens (id_remetente, id_destinatario, mensagem_visualizada, mensagem, data_envio) VALUES (?, ?, 0, ?, NOW())";
            $stmt = $conexao->prepare($insert);
            $stmt->bind_param("iis", $idUsuario, $idDestinatario, $mensagem);
            $stmt->execute();
            echo json_encode(array("status" => "ok", "msg" => "Enviado com sucesso!"));
            exit;
        } catch (\Throwable $th) {
            echo json_encode(array("status" => "error", "msg" => $th->getMessage()));
            exit;
        }
        
    }