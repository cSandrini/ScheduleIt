<?php

include( __DIR__.'/../../controller/protect.php');
require_once __DIR__.'/../funcoesUteis.php';
require_once __DIR__.'/../../model/conexaobd.php';
require_once __DIR__.'/../../model/funcionarioDAO.php';

$conexao = conectarBD();
excluirFuncionario($conexao, $idSala, $idUsuario);
header("Location:/sala/$idSala");

?>