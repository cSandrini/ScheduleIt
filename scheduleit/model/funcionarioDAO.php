<?php

function adicionarFuncionario($conexao, $idSala, $idUsuario){

    $sql = "INSERT INTO scheduleit.funcionario (idSala, IdUsuario) VALUES ('$idSala', '$idUsuario');";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}

?>