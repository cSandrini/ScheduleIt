<?php
function publicarSala($conexao, $idResurso, $idSala) {
    $sql = "INSERT INTO scheduleit.Carrinho (idRecursos, idSala) VALUES (idRecursos, idSala);";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}
?>