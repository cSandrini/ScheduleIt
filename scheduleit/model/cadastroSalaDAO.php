<?php
require_once "../funcoesUteis.php";


function cadastrarSala($conexao, $idProprietario, $email, $cnpj, $nomeFantasia, $cep, $estado, $cidade, $bairro, $rua, $numero, $complemento, $telefone, $descricao, $imagem) {
   $sql = "INSERT INTO scheduleit.sala (idProprietario, email, cnpj, nomeFantasia, cep, estado, cidade, bairro, rua, numero, complemento, telefone, classificacao, descricao, imgLogo) VALUES ('$idProprietario', '$email', '$cnpj', '$nomeFantasia', '$cep', '$estado', '$cidade', '$bairro', '$rua', '$numero', '$complemento', '$telefone', '0', '$descricao', '$imagem');";
   $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}

?>
