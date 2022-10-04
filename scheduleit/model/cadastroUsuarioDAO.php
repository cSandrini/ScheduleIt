<?php
require_once "../funcoesUteis.php";

function cadastrarUsuario($conexao, $nome, $sobrenome, $cpf, $telefone, $email, $senha) {
    $sql = "INSERT INTO scheduleit.Usuario (nome, sobrenome, cpf, telefone, email, senha, permissao) VALUES ('$nome', '$sobrenome', '$cpf', '$telefone', '$email', '$senha', 0);";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}

function editarUsuario($conexao, $nome, $sobrenome, $cpf, $telefone, $email, $senha) {
    require_once "../funcoesUteis.php";
    $id = $_GET["id"];
    $sql = "UPDATE scheduleit.Usuario SET nome='$nome', sobrenome='$sobrenome', cpf='$cpf', telefone=$telefone, email='$email', senha='$senha' WHERE id=$id;";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}



function excluirUsuario() {
    
}


//function cadastrarSala($conexao, $nome, $cnpj, $telefone, $cep, $estado, $cidade, $bairro, $rua, $telefone, $email, $descricao, $imgLogo) {
   // $sql = "INSERT INTO scheduleit.sala (idProprietario, email, cnpj, nomeFantasia, cep, estado, cidade, bairro, rua, numero, complemento, telefone, classificacao, descricao, imgLogo) VALUES ('$idProprietario', '$nome', '$cnpj', '$telefone', '$cep', '$estado', '$cidade', '$bairro', '$rua', '$numero', '$email', '$descricao', '$imgLogo');";
   // $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
//}

?>

