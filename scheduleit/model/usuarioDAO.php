<?php
function carregarConfig($conexao, $id) {
    $sql = "SELECT * FROM usuario WHERE id = $id";
    // Executar no banco de dados
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
    $registro = mysqli_fetch_assoc( $resultado );
    // Pegar os campos desse resultado
    $dados['nome'] = $registro["nome"];
    $dados['sobrenome'] = $registro["sobrenome"];
    $dados['cpf'] = $registro["cpf"];
    $dados['telefone'] = $registro["telefone"];
    $dados['email'] = $registro["email"];
    $dados['senha'] = $registro["senha"];
    if(isset($registro["foto"])){
        $dados['imagem'] = base64_encode($registro["foto"]);
    }
    return $dados;
}

function cadastrarUsuario($conexao, $nome, $sobrenome, $cpf, $telefone, $email, $senha) {
    $sql = "INSERT INTO scheduleit.usuario (nome, sobrenome, cpf, telefone, email, senha, permissao) VALUES ('$nome', '$sobrenome', '$cpf', '$telefone', '$email', '$senha', 0);";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}

function editarUsuario($conexao, $id, $nome, $sobrenome, $cpf, $telefone, $email, $senha) {
    require_once __DIR__ . "/../controller/funcoesUteis.php";
    $sql = "UPDATE scheduleit.usuario SET nome='$nome', sobrenome='$sobrenome', cpf='$cpf', telefone=$telefone, email='$email', senha='$senha' WHERE id=$id;";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}

function editarImgUsuario($conexao, $imagem, $id) {
    $tamanhoImg = $imagem["size"];
    $arqAberto = fopen($imagem["tmp_name"], "r");
    $imagem = addslashes(fread($arqAberto,$tamanhoImg));
    $sql = "UPDATE usuario SET foto='$imagem' WHERE id=$id";
    $resultado = mysqli_query( $conexao, $sql ) or die( mysqli_error($conexao) );
}
?>