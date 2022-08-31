<?php
require_once "../funcoesUteis.php";

function cadastrarUsuario($conexao, $nome, $sobrenome, $cpf, $numero, $email, $senha) {
    $sql = "INSERT INTO scheduleit.usuario (nome, sobrenome, cpf, numero, email, senha, permissao) VALUES ('$nome', '$sobrenome', '$cpf', '$numero', '$email', '$senha', 0);";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}

function alterarUsuário() {
    
}

function excluirUsuário() {
    
}


function cadastrarSala($conexao, $nome, $numero, $email, $endereco, $idProprietario) {
    $sql = "INSERT INTO scheduleit.sala (idProprietario, nome, numero, email, endereco) VALUES ('$idProprietario', '$nome', '$numero', '$email', '$endereco');";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}

?>

