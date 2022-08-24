<?php
function carregarMinhasSalas($conexao, $id) {
    $sql = "SELECT * FROM sala WHERE idProprietario = '$id'";
    
    // Executar no banco de dados
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
    $registro = mysqli_fetch_assoc( $resultado );
    // Pegar os campos desse resultado
    $dados['nome'] = $registro["nome"];
    
    return $dados;
}
?>