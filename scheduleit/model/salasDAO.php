<?php
function carregarMinhasSalas($conexao, $id) {
    $idSala = $_GET["idSala"];
    $sql = "SELECT * FROM Sala WHERE idProprietario = '$id' AND idSala = '$idSala'";
    
    // Executar no banco de dados
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
    $registro = mysqli_fetch_assoc( $resultado );
    // Pegar os campos desse resultado
    $dados['nomeFantasia'] = $registro['nomeFantasia'];
    $dados['cnpj'] = $registro['cnpj'];
    $dados['telefone'] = $registro['telefone'];
    $dados['cep'] = $registro['cep'];
    $dados['estado'] = $registro['estado'];
    $dados['cidade'] = $registro['cidade'];
    $dados['bairro'] = $registro['bairro'];
    $dados['rua'] = $registro['rua'];
    $dados['numero'] = $registro['numero'];
    $dados['complemento'] = $registro['complemento'];
    $dados['email'] = $registro['email'];
    $dados['descricao'] = $registro['descricao'];
    
    return $dados;
}

function inserirImagem($conexao, $imagem, $id) {
    $tamanhoImg = $imagem["size"];
    $arqAberto = fopen($imagem["tmp_name"], "r");
    $imagem = addslashes(fread($arqAberto,$tamanhoImg));
    
    $sql = "UPDATE Usuario SET imagem='$imagem' WHERE id=$id";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}
?>