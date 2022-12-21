<?php

function adicionarFuncionario($conexao, $idSala, $idUsuario){
    //ADICIONAR NA SALA
    $sql = "INSERT INTO scheduleit.funcionario (idSala, IdUsuario) VALUES ('$idSala', '$idUsuario');";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
    //EXCLUIR NOTIFICACAO
    $sql = "DELETE FROM scheduleit.notificacao WHERE idSala = '$idSala' AND idUsuario = '$idUsuario' AND tipo = '2';";
    $resultado2 = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}

function excluirFuncionario($conexao, $idSala, $idUsuario) {
    $sql = "DELETE FROM scheduleit.funcionario WHERE idSala = $idSala AND idUsuario = $idUsuario";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
 }

?>