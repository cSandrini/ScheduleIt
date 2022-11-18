<?php
 error_reporting(E_ALL); //REPORTAR ERROS
 ini_set('display_errors', 1); //REPORTAR ERROS
 
    $json = file_get_contents('php://input');
    // Converts it into a PHP object
    $data = json_decode($json);

    $idFuncionario = $data[0]->idFuncionario;
    if(isset($data[0]->idUsuario)) {
        $idUsuario = $data[0]->idUsuario;
    }
    $dataDMA = $data[0]->dataDMA;
    $idHorario = $data[0]->idHorario;
    $type = $data[0]->type;

    require_once '../../../model/agendaDAO.php';
    require_once '../../../model/conexaobd.php';
    $con = conectarBD();
    if ($type==1) {
        agendar($con, $idFuncionario, $idUsuario, $dataDMA, $idHorario);
    } 
    if ($type==2) {
        deletar($con, $idFuncionario, $dataDMA, $idHorario);
    }
?>