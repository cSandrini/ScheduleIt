<?php
    require_once __DIR__.'/../../model/conexaobd.php';
    require_once __DIR__.'/../../model/notificacaoDAO.php';
    $conexao = conectarBD();
    ignorar($conexao, $idUsuario, $idSala);
    if(isset($_GET['idSala'])) {
        header("Location:/sala/".$_GET['idSala']);
    } else {
        header("Location:/notificacoes");
    }
?>