<?php
    error_reporting(E_ALL); //REPORTAR ERROS
    ini_set('display_errors', 1); //REPORTAR ERROS
    require_once '../../model/conexaobd.php';
    require_once '../../model/salasDAO.php';

    if(isset($_GET['idSala'])) {
        $idSala = $_GET['idSala'];
        $con = conectarBD();
        try {
            $conexao = conectarBDPDO();
            $sth = $conexao->prepare("SELECT * FROM sala WHERE idSala=".$_GET["idSala"].";");
            $sth->setFetchMode(PDO:: FETCH_OBJ);
            $sth->execute();
            $row=$sth->fetch();
            $plano = $row->plano;
        } catch(PDOException $e) {
            echo "Error: ". $e->getMessage();
        }
        if ($plano != null){
            republicarSala($con, $idSala);
            header("Location:../../view/pages/home/home.php");
        }else{
            $assinatura = date("Y/m/d");
            $plano = $_POST["plano"];
            publicarSala($con, $idSala, $assinatura, $plano);
            header("Location:../../view/pages/home/home.php");
        }   
    }
?>