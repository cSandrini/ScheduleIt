<?php

require_once __DIR__ . '/../../model/conexaobd.php';

try {
    $con = conectarBDPDO();
    $sth = $con->prepare("SELECT * FROM sala;");
    $sth->setFetchMode(PDO:: FETCH_OBJ);
    $sth->execute();
    if ($sth->rowCount() > 0) {
        while($row=$sth->fetch()) {
            $img = base64_encode($row->imgLogo);
            $nomeFantasia = $row->nomeFantasia;
            $idSala = $row->idSala;
            $descricao = $row->descricao;
            $cep = $row->cep;
            $cidade = $row->cidade;
            $estado = $row->estado;
            $bairro = $row->bairro;
            $rua = $row->rua;
            $numero = $row->numero;
            $complemento = $row->complemento;
            $email = $row->email;
            $telefone = $row->telefone;
            $idProprietario = $row->idProprietario;
            $visibilidade = $row->visibilidade;
            $assinatura = $row->assinatura;
            $plano = $row->plano;
        }
        if ($plano == 1){
            $dataExpiracao = date("Y-m-d", strtotime($assinatura." +1 month"));
        } elseif ($plano == 2){
            $dataExpiracao = date("Y-m-d", strtotime($assinatura." +3 month"));
        } elseif ($plano == 3){
            $dataExpiracao = date("Y-m-d", strtotime($assinatura." +6 month"));
        } elseif ($plano == 4){
            $dataExpiracao = date("Y-m-d", strtotime($assinatura." +1 year"));
        } 

        $dataAtual = date("Y-m-d");
        if (isset($dataExpiracao) && $dataExpiracao <= $dataAtual){
            $conexao = conectarBD();
            expirarSala($conexao, $idSala);
        }
    }

} catch(PDOException $e) {
    echo "Error: ". $e->getMessage();
}

?>