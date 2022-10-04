<?php
require_once "../funcoesUteis.php";

$idSala = $_GET["idSala"];

function cadastrarSala($conexao, $idProprietario, $email, $cnpj, $nomeFantasia, $cep, $estado, $cidade, $bairro, $rua, $numero, $complemento, $telefone, $descricao, $imagem) {
   $sql = "INSERT INTO scheduleit.Sala (idProprietario, email, cnpj, nomeFantasia, cep, estado, cidade, bairro, rua, numero, complemento, telefone, classificacao, descricao, imgLogo) VALUES ('$idProprietario', '$email', '$cnpj', '$nomeFantasia', '$cep', '$estado', '$cidade', '$bairro', '$rua', '$numero', '$complemento', '$telefone', '0', '$descricao', '$imagem');";
   $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}

function editarSala($conexao, $email, $cnpj, $nomeFantasia, $cep, $estado, $cidade, $bairro, $rua, $numero, $complemento, $telefone, $descricao) {
   require_once "../funcoesUteis.php";
   $idSala = $_GET["idSala"];
   $sql = "UPDATE scheduleit.Sala SET email='$email', cnpj='$cnpj', nomeFantasia='$nomeFantasia', cep='$cep', estado='$estado', cidade='$cidade', bairro='$bairro', rua='$rua', numero='$numero', complemento='$complemento', telefone='$telefone', descricao='$descricao' WHERE idSala=$idSala";
   $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}


?>
