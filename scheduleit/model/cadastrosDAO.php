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

?>

