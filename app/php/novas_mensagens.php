<?php

require_once __DIR__ . '/../data/conexao.php';

if (isset($_GET['idUser']) && !empty($_GET['idUser'])) {
    $id = intval(limpar_texto($_GET['idUser']));

    $consulta = "WITH UltimasMensagens AS (
SELECT 
        id, 
        id_remetente, 
        id_destinatario, 
        mensagem_visualizada, 
        mensagem, 
        data_envio,
        ROW_NUMBER() OVER (PARTITION BY GREATEST(id_remetente, id_destinatario), LEAST(id_remetente, id_destinatario) ORDER BY data_envio DESC) AS rn
    FROM mv_mensagens
    WHERE id_remetente IN(?) OR id_destinatario IN(?)
)

SELECT 
    a.id, 
    a.id_remetente, 
    cr.usuario AS usuario_remetente,
    a.id_destinatario, 
    cd.usuario AS usuario_destinatario,
    
    CASE
        WHEN a.id_remetente = ? THEN cd.ultimo_acesso
        ELSE cr.ultimo_acesso
    END AS 'visto_ultimo',
    
    CASE
        WHEN a.id_remetente = ? THEN cd.nome
        ELSE cr.nome
    END AS 'usuario',
    
    CASE
	    WHEN a.id_remetente = ? THEN ud.situacao
	    ELSE ur.situacao
    END AS 'situacao',

    CASE
        WHEN a.id_remetente = ? THEN cd.foto
        ELSE cr.foto
    END AS 'foto',
    a.mensagem_visualizada, 
    a.mensagem, 
    a.data_envio
FROM UltimasMensagens a
LEFT JOIN cad_login cr ON a.id_remetente = cr.id_login
LEFT JOIN cad_login cd ON a.id_destinatario = cd.id_login
LEFT JOIN usuarios_ativos ur ON a.id_remetente = ur.id_usuario
LEFT JOIN usuarios_ativos ud ON a.id_destinatario = ud.id_usuario
WHERE a.rn = 1 
GROUP BY a.id
ORDER BY a.data_envio DESC;";

    $stmt = $conexao->prepare($consulta);
    $stmt->bind_param('iiiiii', $id, $id, $id, $id, $id, $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $mensagens = $resultado->fetch_all(MYSQLI_ASSOC);
    echo json_encode($mensagens);
    exit;
} else {
    echo json_encode(['error' => 'ID de usuário inválido']);
    exit;
}
