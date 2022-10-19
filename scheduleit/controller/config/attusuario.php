<?php
    include('../../controller/protect.php');
    require_once '../../model/conexaobd.php';
    require_once '../../model/usuarioDAO.php';
    require_once '../funcoesUteis.php';

    $id = $_POST["idUsuario"];
    $conexao = conectarBD();
    $dados = carregarConfig($conexao, $id);

    // PASSO 1 - RECEBER OS DADOS DO FORMULARIO

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
    if(!empty($_POST["txtSenha"])){
        $senhaNova = $_POST["txtSenha"];
    } else {
        $senhaNova = $dados['senha'];
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
            require_once '../../model/conexaobd.php';
            require_once '../../model/usuarioDAO.php';
            $conexao=conectarBD();
            editarImgUsuario($conexao, $imagem, $id);
        }
    } 
    $senha = $_POST["senhaModal"];


    if (empty($msgErro)) {            
        // CONECTAR
        require_once '../../model/conexaobd.php';
        require_once '../../model/usuarioDAO.php';
        $conexao=conectarBD();
        $senhaNova = criptografar($senhaNova);
        editarUsuario($conexao, $id, $nome, $sobrenome, $cpf, $telefone, $email, $senhaNova);
        header("Location:../../view/pages/config/config.php?msg=0&msgType=1&img=");
    } else {
        header("Location:../../view/pages/config/config.php?msg=$msgErro&msgType=3");
    }
?>
