<?php
    require_once '../funcoesUteis.php';

    // PASSO 1 - RECEBER OS DADOS DO FORMULARIO
    $nome = $_POST["txtNome"];
    $sobrenome = $_POST["txtSobrenome"];
    $cpf = converterNumerico($_POST["txtCpf"]);
    $telefone = converterNumerico($_POST["txtTelefone"]);
    $email = $_POST["txtEmail"];
    $senha = $_POST["txtSenha"];
    $senha2 = $_POST["txtSenhaConf"];

    // PASSO 2 - VALIDAR OS DADOS
    $msgErro = validarDados($nome, $sobrenome, $cpf, $telefone, $email, $senha, $senha2);
    
    if ( empty($msgErro) ) {            
        // CONECTAR
        require_once '../../model/conexaobd.php';
        require_once '../../model/usuarioDAO.php';
        $conexao = conectarBD();
        $senha = criptografar($senha);
        cadastrarUsuario($conexao, $nome, $sobrenome, $cpf, $telefone, $email, $senha);
        header("Location:../../view/pages/cadastro/cadastro.php?msg=0&msgType=1");
    } else {
        header("Location:../../view/pages/cadastro/cadastro.php?msg=$msgErro&msgType=3");
    }

?>
