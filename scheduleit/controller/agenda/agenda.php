<?php //CARREGAR AGENDA
    require_once __DIR__.'/../../model/conexaobd.php';
    require_once __DIR__.'/../../model/usuarioDAO.php';
    $idFuncionario = $id;
    $conexao = conectarBD();
    $dados = carregarConfig($conexao, $idFuncionario);
?>