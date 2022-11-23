<?php
    include('../../controller/protect.php');
    require_once '../funcoesUteis.php';
    require_once '../../model/conexaobd.php';
    require_once '../../model/salasDAO.php';
    

    $conexao = conectarBD();
    $idSala = $_GET["idSala"];
    $cpf = $_POST["cpf"];

    echo "$cpf, $idSala";

        try {
            $con = conectarBDPDO();
            $sth = $con->prepare("SELECT id FROM usuario WHERE cpf=".$cpf.";");
            $sth->setFetchMode(PDO:: FETCH_OBJ);
            $sth->execute();
            $row=$sth->fetch();
            $idUsuario = $row->id;
        } catch(PDOException $e) {
            echo "Error: ". $e->getMessage();
        }
        echo"<br>$idUsuario";
        require_once '../../model/funcionarioDAO.php';
        adicionarFuncionario($conexao, $idSala, $idUsuario);
        header("Location:../../view/pages/sala/sala.php?idSala=$idSala");


?>