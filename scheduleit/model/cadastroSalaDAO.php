<?php
require_once "../funcoesUteis.php";


function cadastrarSala($conexao, $nome, $cnpj, $telefone, $cep, $estado, $cidade, $bairro, $rua, $telefone, $email, $descricao, $imgLogo) {
   $sql = "INSERT INTO scheduleit.sala (idProprietario, email, cnpj, nomeFantasia, cep, estado, cidade, bairro, rua, numero, complemento, telefone, classificacao, descricao, imgLogo) VALUES ('$idProprietario', '$nome', '$cnpj', '$telefone', '$cep', '$estado', '$cidade', '$bairro', '$rua', '$numero', '$email', '$descricao', '$imgLogo');";
   $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}

?>
