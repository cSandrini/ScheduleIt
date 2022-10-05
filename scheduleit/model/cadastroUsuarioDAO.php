<?php
require_once "../funcoesUteis.php";

function cadastrarUsuario($conexao, $nome, $sobrenome, $cpf, $telefone, $email, $senha) {
    $sql = "INSERT INTO scheduleit.Usuario (nome, sobrenome, cpf, telefone, email, senha, permissao) VALUES ('$nome', '$sobrenome', '$cpf', '$telefone', '$email', '$senha', 0);";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}

function editarUsuario($conexao, $id, $nome, $sobrenome, $cpf, $telefone, $email, $senha) {
    require_once "../funcoesUteis.php";
    $sql = "UPDATE scheduleit.Usuario SET nome='$nome', sobrenome='$sobrenome', cpf='$cpf', telefone=$telefone, email='$email', senha='$senha' WHERE id=$id;";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}

function validarDadosBD($conexao, $cpf, $email) {

    $msgErro = "";

    $sqlCPF = "SELECT * FROM `usuario` WHERE cpf = '$cpf'";
    $resultado = mysqli_query( $conexao, $sqlCPF ) or die( mysqli_error($conexao) );
    if ($resultado->num_rows > 0) {
        $msgErro = $msgErro . "CPF já cadastrado! <BR>";
    }

    $sqlEmail = "SELECT * FROM `usuario` WHERE email = '$email'";
    $resultado = mysqli_query( $conexao, $sqlEmail ) or die( mysqli_error($conexao) );
    if ($resultado->num_rows > 0) {
        $msgErro = $msgErro . "EMAIL já cadastrado! <BR>";
    }

    return $msgErro;
}

function excluirUsuario($conexao, $id) {
    $sql = "DELETE FROM scheduleit.Usuario WHERE id = $id";
}


//function cadastrarSala($conexao, $nome, $cnpj, $telefone, $cep, $estado, $cidade, $bairro, $rua, $telefone, $email, $descricao, $imgLogo) {
   // $sql = "INSERT INTO scheduleit.sala (idProprietario, email, cnpj, nomeFantasia, cep, estado, cidade, bairro, rua, numero, complemento, telefone, classificacao, descricao, imgLogo) VALUES ('$idProprietario', '$nome', '$cnpj', '$telefone', '$cep', '$estado', '$cidade', '$bairro', '$rua', '$numero', '$email', '$descricao', '$imgLogo');";
   // $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
//}

?>

