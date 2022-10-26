<?php //CARREGAR AGENDA
    require_once '../../../model/conexaobd.php';
    require_once '../../../model/usuarioDAO.php';
    $idFuncionario = $_GET['id'];
    $conexao = conectarBD();
    $dados = carregarConfig($conexao, $idFuncionario)
?>