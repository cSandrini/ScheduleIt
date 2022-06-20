<?php
require_once "../funcoesUteis.php";

function cadastrarUsuario($conexao, $nome, $sobrenome, $cpf, $numero, $email, $senha) {
    $sql = "INSERT INTO ezbook.usuarios (nome, sobrenome, cpf, numero, email, senha) VALUES ('$nome', '$sobrenome', '$cpf', '$numero', '$email', '$senha');";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}

function alterarUsuário() {
    
}

function excluirUsuário() {
    
}

?>

