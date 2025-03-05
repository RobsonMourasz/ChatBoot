<?php 

require_once __DIR__.'/../data/conexao.php';

if(isset($_GET['idUser']) && !empty($_GET['idUser'])){
    $id = intval(limpar_texto($_GET['idUser']));

    $consulta = "WITH UltimasMensagens AS (
            SELECT 
                id,
                id_remetente,
                id_destinatario,
                mensagem_visualizada,
                mensagem,
                data_envio,
                ROW_NUMBER() OVER (PARTITION BY id_remetente ORDER BY data_envio DESC) AS rn
            FROM mv_mensagens
        )
        SELECT 
            lm.id,
            lm.id_remetente,
            lm.id_destinatario,
            lm.mensagem_visualizada,
            lm.mensagem,
            lm.data_envio,
            cr.usuario AS remetente,
            cd.usuario AS destinatario,
            CASE
                WHEN cr.usuario = 1 THEN ca.situacao
                ELSE cb.situacao
            END AS situacao
        FROM UltimasMensagens lm
        LEFT JOIN cad_login cr ON lm.id_remetente = cr.id_login
        LEFT JOIN cad_login cd ON lm.id_destinatario = cd.id_login
        LEFT JOIN usuarios_ativos ca ON lm.id_remetente = ca.id_usuario
        LEFT JOIN usuarios_ativos cb ON lm.id_destinatario = cb.id_usuario
        WHERE (lm.id_remetente = ? OR lm.id_destinatario = ?)
        GROUP BY lm.mensagem_visualizada
        ORDER BY lm.data_envio DESC, lm.mensagem_visualizada ASC
        LIMIT 1";

    $stmt = $conexao->prepare($consulta);
    $stmt->bind_param('ii', $id, $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $mensagens = $resultado->fetch_all(MYSQLI_ASSOC);
    echo json_encode($mensagens);
    exit;    
} else {
    echo json_encode(['error' => 'ID de usuário inválido']);
    exit;
}