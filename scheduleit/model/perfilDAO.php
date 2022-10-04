<?php
function carregarConfig($conexao, $id) {
    $sql = "SELECT * FROM Usuario WHERE id = $id";
    
    // Executar no banco de dados
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
    $registro = mysqli_fetch_assoc( $resultado );
    // Pegar os campos desse resultado
    $dados['nome'] = $registro["nome"];
    $dados['sobrenome'] = $registro["sobrenome"];
    $dados['cpf'] = $registro["cpf"];
    $dados['telefone'] = $registro["telefone"];
    $dados['email'] = $registro["email"];
    $dados['senha'] = $registro["senha"];
    $dados['imagem'] = $registro["foto"];
    return $dados;
}

function editarImgUsuario($conexao, $imagem, $id) {

    $tamanhoImg = $imagem["size"];
    $arqAberto = fopen($imagem["tmp_name"], "r");
    $imagem = addslashes(fread($arqAberto,$tamanhoImg));

    $sql = "UPDATE Usuario SET foto='$imagem' WHERE id=$id";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}
?>