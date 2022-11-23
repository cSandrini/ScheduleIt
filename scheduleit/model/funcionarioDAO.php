<?php

function adicionarFuncionario($conexao, $idSala, $idUsuario){

    $sql = "INSERT INTO scheduleit.funcionario (idSala, IdUsuario) VALUES ('$idSala', '$idUsuario');";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}

function excluirFuncionario($conexao, $idSala, $idUsuario) {
    $idSala = $_GET["idSala"];
    $sql = "DELETE FROM scheduleit.funcionario WHERE idSala = $idSala AND idUsuario = $idUsuario";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
 }

?>