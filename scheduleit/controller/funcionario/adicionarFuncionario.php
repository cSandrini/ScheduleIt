<?php
    include('../../controller/protect.php');
    require_once '../funcoesUteis.php';
    require_once '../../model/conexaobd.php';
    require_once '../../model/salasDAO.php';
    
    $conexao = conectarBD();
    $idSala = $_GET["idSala"];
    $cpf = $_POST["cpf"];
    $msgErro = "";

    try {
        $con = conectarBDPDO();
        $sth = $con->prepare("SELECT * FROM funcionario, usuario WHERE idSala=".$idSala." AND cpf=".$cpf." AND funcionario.idUsuario = usuario.id;");
        $sth->setFetchMode(PDO:: FETCH_OBJ);
        $sth->execute();
        if ($sth->rowCount() > 0) {
            $msgErro = "Funcionário já adicionado.";
        }
        $sth = $con->prepare("SELECT id FROM usuario WHERE cpf=".$cpf.";");
        $sth->setFetchMode(PDO:: FETCH_OBJ);
        $sth->execute();
        $row=$sth->fetch();
        if (isset($row->id)) {
            $idUsuario = $row->id;
        } else {
            $msgErro = "Funcionário não existe.";
        }
    } catch(PDOException $e) {
        echo "Error: ". $e->getMessage();
    }
    require_once '../../model/funcionarioDAO.php';
    if (empty($msgErro)) {
        adicionarFuncionario($conexao, $idSala, $idUsuario);
        header("Location:../../view/pages/sala/sala.php?idSala=$idSala");
    } else {
        header("Location:../../view/pages/sala/sala.php?idSala=$idSala&msg=$msgErro&msgType=");
    }
?>