<?php
function agendar($conexao, $idFuncionario, $idUsuario, $dataDMA, $idHorario) {
    $sql = "INSERT INTO scheduleit.horario (idFuncionario, idUsuario, dataDMA, idHorario) VALUES ('$idFuncionario', '$idUsuario', '$dataDMA', '$idHorario');";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}

function deletar($conexao, $idFuncionario, $dataDMA, $idHorario) {
    $sql = "DELETE FROM horario WHERE dataDMA='$dataDMA' AND idHorario=$idHorario;";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}
?>