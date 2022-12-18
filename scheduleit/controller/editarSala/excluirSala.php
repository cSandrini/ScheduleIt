<?php
include(__DIR__.'/../../controller/protect.php');
require_once __DIR__.'/../funcoesUteis.php';
require_once __DIR__.'/../../model/conexaobd.php';
require_once __DIR__.'/../../model/salasDAO.php';

$conexao=conectarBD();

excluirSala($conexao, $idSala);
    header("Location:/minhasSalas?msg=0&msgType=2");
?>