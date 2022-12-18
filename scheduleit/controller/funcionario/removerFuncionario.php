<?php

include('../../controller/protect.php');
require_once '../funcoesUteis.php';
require_once '../../model/conexaobd.php';
require_once '../../model/funcionarioDAO.php';

$conexao = conectarBD();
$idUsuario = $_GET["idUsuario"];
excluirFuncionario($conexao, $idSala, $idUsuario);
header("Location:../../view/pages/sala/sala.php?idSala=$idSala");

?>