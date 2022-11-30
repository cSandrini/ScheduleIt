<?php
    error_reporting(E_ALL); //REPORTAR ERROS
    ini_set('display_errors', 1); //REPORTAR ERROS
    require_once '../../model/conexaobd.php';
    require_once '../../model/salasDAO.php';
    if(isset($_GET['idSala'])) {
        $idSala = $_GET['idSala'];
        $con = conectarBD();
        $assinatura = date("Y/m/d");
        $plano = $_POST["plano"];
        publicarSala($con, $idSala, $assinatura, $plano);
        header("Location:../../view/pages/home/home.php");
    }
?>