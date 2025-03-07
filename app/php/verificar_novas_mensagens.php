<?php 
    require_once __DIR__."/../data/conexao.php";
    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = intval(limpar_texto($_GET['id']));
        $pesq = $conexao->prepare("SELECT * FROM mv_mensagens WHERE id_destinatario = ? AND mensagem_visualizada = 0");
        $pesq->bind_param("i", $id);
        $pesq->execute();
        $resultado = $pesq->get_result();
        if ($resultado->num_rows > 0) {
            $mv_mensagens = $resultado->fetch_assoc();
            echo json_encode(array("status" => "ok", "msg" => $resultado->num_rows, "pessoa" => $mv_mensagens['id_remetente']));
           exit;
        }
    }