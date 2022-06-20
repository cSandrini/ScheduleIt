<?php
    require_once '../funcoesUteis.php';

    // PASSO 1 - RECEBER OS DADOS DO FORMULARIO
    $nome = $_POST["txtNome"];
    $sobrenome = $_POST["txtSobrenome"];
    $cpf = converterNumerico($_POST["txtCpf"]);
    $numero = converterNumerico($_POST["txtNumero"]);
    $email = $_POST["txtEmail"];
    $senha = $_POST["txtSenha"];
    $senha2 = $_POST["txtSenhaConf"];

    // PASSO 2 - VALIDAR OS DADOS
    $msgErro = validarDados($nome, $sobrenome, $cpf, $numero, $email, $senha, $senha2);
    
    if ( empty($msgErro) ) {            
        
        // CONECTAR
        require_once '../../model/conexaobd.php';
        require_once '../../model/cadastrosDAO.php';
        $conexao = conectarBD();
        cadastrarUsuario($conexao, $nome, $sobrenome, $cpf, $numero, $email, $senha);
        header("Location:../../view/pages/cadastro/cadastro.php?msg=Enviado com sucesso.");
    } else {
        header("Location:../../view/pages/cadastro/cadastro.php?msg=$msgErro");
    }

?>
