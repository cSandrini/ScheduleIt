<?php
function notificar($conexao, $idFuncionario, $idUsuario, $dataDMA, $idHorario, $type) {
    if ($type==1) {
        $sql = "INSERT INTO scheduleit.notificacao (idFuncionario, idUsuario, dataDMA, idHorario, tipo) VALUES ('$idFuncionario', '$idUsuario', '$dataDMA', '$idHorario', '$type');";
        $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
    } else if ($type==2) {
        $sql = "DELETE FROM scheduleit.notificacao WHERE idFuncionario = '$idFuncionario' AND idUsuario = '$idUsuario' AND dataDMA = '$dataDMA' AND idHorario = '$idHorario';";
        $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
    }
    
}

function deletarNotificacoesAntigas($conexao, $dataDMA) {
    $sql = "DELETE FROM scheduleit.notificacao WHERE dataDMA < '$dataDMA';";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}
?>