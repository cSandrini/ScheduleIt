<?php
require_once "/opt/lampp/htdocs/0082/EzBook/ezbook/controller/cadastro/funcoesUteis.php";

function cadastrarUsuario($conexao, $nome, $sobrenome, $cpf, $numero, $email, $senha) {
    $sql = "INSERT INTO ezbook.usuarios (nome, sobrenome, cpf, numero, email, senha) VALUES ('$nome', '$sobrenome', '$cpf', '$numero', '$email', '$senha');";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}

function alterarUsuário() {
    
}

function excluirUsuário() {
    
}

?>

