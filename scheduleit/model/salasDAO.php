<?php
function carregarMinhasSalas($conexao, $id) {
    $idSala = $_GET["idSala"];
    $sql = "SELECT * FROM sala WHERE idProprietario = '$id' AND idSala = '$idSala'";
    
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

function cadastrarSala($conexao, $idProprietario, $email, $cnpj, $nomeFantasia, $cep, $estado, $cidade, $bairro, $rua, $numero, $complemento, $telefone, $descricao, $imagem) {
   $sql = "INSERT INTO scheduleit.sala (idProprietario, email, cnpj, nomeFantasia, cep, estado, cidade, bairro, rua, numero, complemento, telefone, classificacao, descricao, imgLogo) VALUES ('$idProprietario', '$email', '$cnpj', '$nomeFantasia', '$cep', '$estado', '$cidade', '$bairro', '$rua', '$numero', '$complemento', '$telefone', '0', '$descricao', '$imagem');";
   $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}

function editarSala($conexao, $email, $cnpj, $nomeFantasia, $cep, $estado, $cidade, $bairro, $rua, $numero, $complemento, $telefone, $descricao) {
   require_once "../funcoesUteis.php";
   $idSala = $_GET["idSala"];
   $sql = "UPDATE scheduleit.sala SET email='$email', cnpj='$cnpj', nomeFantasia='$nomeFantasia', cep='$cep', estado='$estado', cidade='$cidade', bairro='$bairro', rua='$rua', numero='$numero', complemento='$complemento', telefone='$telefone', descricao='$descricao' WHERE idSala=$idSala";
   $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}

function excluirSala($conexao, $id) {
   $idSala = $_GET["idSala"];
   $sql = "DELETE FROM scheduleit.sala WHERE idSala = $idSala";
   $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}

function editarImgLogo($conexao, $imgLogo) {
    $idSala = $_GET["idSala"];
    $tamanhoImg = $imgLogo["size"];
    $arqAberto = fopen($imgLogo["tmp_name"], "r");
    $imgLogo = addslashes(fread($arqAberto,$tamanhoImg));
    
    $sql = "UPDATE sala SET imgLogo='$imgLogo' WHERE idSala=$idSala";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}
?>