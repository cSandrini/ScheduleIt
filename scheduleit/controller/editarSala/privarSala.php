<?php
    error_reporting(E_ALL); //REPORTAR ERROS
    ini_set('display_errors', 1); //REPORTAR ERROS
    require_once __DIR__.'/../../model/conexaobd.php';
    require_once __DIR__.'/../../model/salasDAO.php';
    if(isset($idSala)) {
        $con = conectarBD();
        privarSala($con, $idSala);
        header("Location:/minhasSalas");
    }
?>