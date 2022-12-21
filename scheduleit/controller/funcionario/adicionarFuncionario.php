<?php
    include(__DIR__.'/../../controller/protect.php');
    require_once __DIR__.'/../funcoesUteis.php';
    require_once __DIR__.'/../../model/conexaobd.php';
    require_once __DIR__.'/../../model/salasDAO.php';
    
    $conexao = conectarBD();
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
    require_once __DIR__.'/../../model/notificacaoDAO.php';
    if (empty($msgErro)) {
        $dataAtual = date("Y-m-d");
        convidarFuncionario($conexao, $idSala, $idUsuario, $dataAtual);
        header("Location:/sala/$idSala");
    } else {
        header("Location:/sala/$idSala?msg=$msgErro&msgType=");
    }
?>