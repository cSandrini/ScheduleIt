<?php
    error_reporting(E_ALL); //REPORTAR ERROS
    ini_set('display_errors', 1); //REPORTAR ERROS
    require_once __DIR__.'/../../model/conexaobd.php';
    require_once __DIR__.'/../../model/funcionarioDAO.php';
    require_once __DIR__.'/../../model/notificacaoDAO.php';
    $conexao = conectarBD();
    try {
        $con = conectarBDPDO();
        $sth = $con->prepare("SELECT * FROM notificacao WHERE idSala='$idSala' AND idUsuario='$idUsuario' AND tipo='2';");
        $sth->setFetchMode(PDO:: FETCH_OBJ);
        $sth->execute();
        $row=$sth->fetch();
        if ($sth->rowCount() > 0) {
            adicionarFuncionario($conexao, $idSala, $idUsuario);
            header("Location:/notificacoes");
        } else {
            $msgErro = "O convite expirou";
            header("Location:/notificacoes?msg=$msgErro&msgType=3");
        }
    } catch(PDOException $e) {
        echo "Error: ". $e->getMessage();
    }
?>