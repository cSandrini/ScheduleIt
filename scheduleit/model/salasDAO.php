<?php
function carregarMinhasSalas($conexao, $id) {
    $sql = "SELECT * FROM sala WHERE idProprietario = '$id'";
    
    // Executar no banco de dados
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
    $registro = mysqli_fetch_assoc( $resultado );
    // Pegar os campos desse resultado
    $dados['nome'] = $registro["nome"];
    $dados['cnpj'] = $registro["cnpj"];
    $dados['telefone'] = $registro["telefone"];
    $dados['cep'] = $registro["cep"];
    $dados['estado'] = $registro["estado"];
    $dados['cidade'] = $registro["cidade"];
    $dados['bairro'] = $registro["bairro"];
    $dados['rua'] = $registro["rua"];
    $dados['numero'] = $registro["numero"];
    $dados['email'] = $registro["email"];
    $dados['descricao'] = $registro["descricao"];
    
    return $dados;
}

function inserirImagem($conexao, $imagem, $id) {
    $tamanhoImg = $imagem["size"];
    $arqAberto = fopen($imagem["tmp_name"], "r");
    $imagem = addslashes(fread($arqAberto,$tamanhoImg));
    
    $sql = "UPDATE usuario SET imagem='$imagem' WHERE id=$id";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}
?>