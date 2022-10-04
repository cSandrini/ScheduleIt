<?php
    include('../../controller/protect.php');
    require_once '../../model/conexaobd.php';
    require_once '../../model/perfilDAO.php';
    require_once '../funcoesUteis.php';

    $id = $_POST["id"];
    $conexao = conectarBD();
    $dados = carregarConfig($conexao, $id);
    $senhaAntiga = $dados["senha"];

    // PASSO 1 - RECEBER OS DADOS DO FORMULARIO

    if(isset($_POST["txtEmail"])){
        $email = $_POST["txtEmail"];
    }
    if(isset($_POST["txtTelefone"])){
        $telefone = converterNumerico($_POST["txtTelefone"]);
    }
    if(isset($_POST["txtSenha"])){
        $senhaNova = $_POST["txtSenha"];
    } else {
        $senhaNova = $senhaAntiga;
    }
    if(isset($_POST["txtNome"])){
        $nome = $_POST["txtNome"];
    }
    if(isset($_POST["txtSobrenome"])){
        $sobrenome = $_POST["txtSobrenome"];
    }
    if(isset($_POST["txtCpf"])){
        $cpf = converterNumerico($_POST["txtCpf"]);
    }
    $senha = $_POST["senhaModal"];
    $id = $_POST["idProprietario"];


    // PASSO 2 - VALIDAR OS DADOS
    //$msgErro = validarDadosAttUsuario($id, $imagemPerfil, $senha);
    
    if (empty($msgErro)) {            
        // CONECTAR
        require_once '../../model/conexaobd.php';
        require_once '../../model/cadastroUsuarioDAO.php';
        $conexao=conectarBD();
        editarUsuario($conexao, $nome, $sobrenome, $cpf, $telefone, $email, $senhaNova);
        header("Location:../../view/pages/config/config.php?id=$id&msg=0.");
    } else {
        header("Location:../../view/pages/config/config.php?id=$id&msg=$msgErro");
    }

?>
