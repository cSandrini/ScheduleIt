<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    require_once __DIR__ . '/../../model/conexaobd.php';
    require_once __DIR__ . '/../../model/usuarioDAO.php';
    require_once __DIR__ . '/../funcoesUteis.php';

    $id = $_GET["id"];
    $conexao = conectarBD();
    $dados = carregarConfig($conexao, $id);

    // PASSO 1 - RECEBER OS DADOS DO FORMULARIO
    $senhaModal = criptografar($_POST["senhaModal"]);
    if(!empty($_POST["txtEmail"])){
        $email = $_POST["txtEmail"];
    } else {
        $email = $dados['email'];
    }
    if(!empty($_POST["txtTelefone"])){
        $telefone = converterNumerico($_POST["txtTelefone"]);
    } else {
        $telefone = $dados['telefone'];
    }
    if(!empty($_POST["txtNome"])){
        $nome = $_POST["txtNome"];
    } else {
        $nome = $dados['nome'];
    }
    if(!empty($_POST["txtSobrenome"])){
        $sobrenome = $_POST["txtSobrenome"];
    } else {
        $sobrenome = $dados['sobrenome'];
    }
    if(!empty($_POST["txtCpf"])){
        $cpf = converterNumerico($_POST["txtCpf"]);
    } else {
        $cpf = $dados['cpf'];
    }
    if($_FILES['imgPerfil']['size'] > 0 ) {
        $imagem = $_FILES['imgPerfil'];
        $msgErro = validarImg($imagem);
        if (empty($msgErro)) {            
            editarImgUsuario($conexao, $imagem, $id);
        }
    } 
    if($senhaModal != $dados['senha']) {
        $msgErro = $msgErro . "Senha inválida <br>";
    }


    if (empty($msgErro)) {            
        // CONECTAR
        if(!empty($_POST["txtSenha"])){
            $senhaNova = criptografar($_POST["txtSenha"]);
        } else {
            $senhaNova = $dados['senha'];
        }
        editarUsuario($conexao, $id, $nome, $sobrenome, $cpf, $telefone, $email, $senhaNova);
        header("Location:/configuracoes?msg=0&msgType=1&img=");
    } else {
        header("Location:/configuracoes?msg=$msgErro&msgType=3");
    }
?>
